<template>
    <div class="container">
        <waiting :uid='uid' :users='users' :user='user' 
                @kickingUser="kickUser($event)"
                @gameStart="gameStart"
                @gameReset="gameReset"
                v-if="screen.waiting">                       
        </waiting>

        <div class="loading" v-if="screen.loading">
            <div class="row justify-content-center">
                <div class="col-md-8">

                    <h2 class="text-center">Waiting for other user response.</h2>

                    <div class="progress m-2">
                        <div class="progress-bar progress-bar-striped" 
                            :style="progressWidth"
                            :class="progressClass"
                            > {{ Math.floor(progress) }}
                        </div>
                    </div>
                    <img src="/images/loading/bar.svg" class="m-2">
                </div>
            </div>
        </div>
        <!-- <transition name="fade"> -->
            <result :results='results' :lastQuestion='(qid + 1) == questions.length'
                    v-if="screen.result">                       
            </result>
        <!-- <div class="result" v-if="screen.result">
            <div class="card bg-dark text-white">
              <img class="card-img" :src="addImage()">
            </div>
            <div class="card" style="width: 24rem;">
                <div class="card-header">Results</div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item" v-for="(v, i) in results" :key="i">
                            {{ v.name + ' : ' + v.score }}
                        </li>
                    </ul>
                    <div id="counter" class="mt-5" v-if="counter">
                        <h1 class="text-center" style="color:#1BAA8F; height: 4rem;">
                            {{ counter }}
                        </h1>
                    </div>
                    <h1></h1>
                </div>
                <div class="card-footer" v-if="(qid + 1) == questions.length ">
                    <a href="http://quiz.erendevu.net/" class="btn btn-sm btn-secondary text-center">Game List</a>
                </div>
            </div>
        </div> -->
        <!-- </transition> -->
        <div class="winner" v-if="screen.winner">
            <div v-if="user_ranking == 0">
                <h1 class="text-center">Congratulation ! </h1>
                <h3><b>{{ user.name }}</b>, you won this game.</h3>
            </div>
            <div v-else-if="user_ranking == 1">
                <h1 class="text-center">Well Played ! </h1>
                <h3><b>{{ user.name }}</b>, you got second place</h3>
            </div>
            <div v-else>
                <h3 class="text-center"><b>{{ user.name }}</b>, you need more concentration </h3>
            </div>
            <button @click="screen.winner = 0" class="btn btn-sm btn-secondary">Close</button>
            
        </div>

        <div class="row justify-content-center">
            
            <div class="col-md-8">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped" 
                        :style="progressWidth"
                        :class="progressClass"
                        > {{ Math.floor(progress) }}
                    </div>
                </div>
                <div class="card my-4" v-for="question in questions" v-if="question.id == current">
                    <div class="card-body">
                        <span class="q_num text-right text-muted">Question {{ qid + 1 }} of {{ questions.length }}</span>

                        <img v-if="question.more_info_link" class="image w-100 mt-1 rounded" :src="question.more_info_link" style="max-height:70vh">

                        <p v-html="question.question_text" class="my-2 font-bold"></p>
                        <ul class="list-group" v-for="option in question.options">
                            <li @click="checkAnswer(question.id, option.option, option.correct)" 
                                class="list-group-item list-group-item-action cursor my-1">
                                <span v-html="option.option"></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card my-4">
                    <div class="card-header">
                        User List
                        <a @click="gameReset" v-if="user.id == uid && qid > 0 " class="btn btn-sm btn-danger float-right">RESET</a>
                    </div>
                    <div class="card-body">
                        <ul class="list-group ">
                            <li class="list-group-item user-list"
                                v-for="u in users" :key="u.id"
                                :class="{active : u.id == user.id}"
                                >
                                {{ u.name }}
                            </li>
                        </ul>
                    </div>
                </div>

                

                
            
            </div>

        </div>
    </div>
</template>

<script>
    
    import waiting from '../helper/waiting'
    import result from '../helper/result'

    export default {

        props : ['id', 'uid', 'user', 'questions'],

        components: { waiting, result },

        data() {
            return {
                qt:{
                    ms: 0,
                    time:100,
                    timer:null
                },
                users: [],
                answered:0,
                answered_user: 0,
                answered_user_data: [],
                results: [],
                counter: 3,
                timer: null,
                current: 0,
                qid: 0,
                screen:{
                    waiting: 1,
                    loading: 0,
                    result: 0,
                    winner: 0,
                },
                gamedata: {},
                score: [],
                user_ranking: null,
                game_start:0,
                progress: 100,
            
            };
        },

        created(){
            Echo.channel(this.channel)
                .listen('GameStartEvent', (data) => {
                    console.log('GameStartEvent.............')
                    this.game_start = 1 // Game Start from Game Owner...
                    this.screen.waiting = 0
                    this.QuestionTimer() // Set and Start QuestionTimer

                })
                .listen('QuestionClickedEvent', (data) => {
                    console.log('QuestionClickedEvent.............')
                    this.answered_user_data.push(data)
                    this.answered_user ++
                    this.loadingScreen()
                })
                .listen('KickUserEvent', (data) => {
                    console.log('KickUserEvent.............')
                    this.users = this.users.filter( u => u.id !== data.uid )

                    if(this.user.id == data.uid){
                        window.location.href = "http://quiz.erendevu.net"
                    }
                    
                });

        },
       
        mounted() {
            Echo.join(`challenge.${this.id}.${this.uid}`)
                .here((users) => {
                    this.users = users;
                })
                .joining((user) => {
                    this.users.push(user);
                    if(this.game_start){
                        this.kickUser(user.id)
                    }
                })
                .leaving((user) => {
                    this.users = this.users.filter(u => u.id != user.id);
                    console.log(`${user.name} leaving`);
                });

            this.current = this.questions[this.qid].id

            this.externalJS()

        },

        // beforeMount() {
        //     window.addEventListener("beforeunload", this.preventNav);
        //     this.$once("hook:beforeDestroy", () => {
        //       window.removeEventListener("beforeunload", this.preventNav);
        //     });
        //   },

        // beforeRouteLeave(to, from, next) {
        //     if (this.game_start) {
        //       if (!window.confirm("Do You Realy Want to Leave This Game?")) {
        //         return;
        //       }
        //     }
        //     next();
        // },


        methods: {

            // preventNav(event) {
            //   if (!this.game_start) return;
            //   event.preventDefault();
            //   // Chrome requires returnValue to be set.
            //   event.returnValue = "";
            // },

            gameStart(){
                let gd = { channel: this.channel, gameStart:1 }

                axios.post(`/api/gameStart`, gd)

                this.game_start = 1
                this.screen.waiting = 0
                this.QuestionTimer()

            },
            gameReset(){
                this.questionInit()
                this.screen.waiting = 1
                this.answered_user_data = []
                this.results = []
                this.qid = 0
                this.gamedata = {}
                this.score = []
                this.user_ranking = null
                this.game_start = 0
                this.current = this.questions[this.qid].id

            },
            QuestionTimer(){
                let pdec = 100 / (10 * this.qt.time);
                console.log('QuestionTimer started')
                this.qt.timer = 
                    setInterval(() => {
                        if(this.qt.time == 0){
                            if(!this.answered){
                                this.checkAnswer(this.qid, 'Not Answered', 0);
                            }
                            this.questionInit(); 
                            this.resultScreen();
                        }
                        else{
                            this.qt.ms ++
                            this.progress -= pdec

                            if(this.qt.ms == 10){
                                this.qt.time --
                                this.qt.ms=0
                            }

                        }
                        
                    }, 100);
            },

            checkAnswer(q, a, rw){
                this.answered = 1
                this.right_wrong = rw
                this.gamedata.['uid'] = this.user.id
                this.gamedata.['channel'] = this.channel
                this.gamedata.['name'] = this.user.name
                this.gamedata.['question'] = this.questions[this.qid].question_text
                this.gamedata.['answer'] = this.getCorrectAnswertext()
                this.gamedata.['selected'] = a
                this.gamedata.['isCorrect'] = rw == 1? Math.floor(this.progress): 0
                    axios.post(`/api/questionClick`, this.gamedata)
                let clone = {...this.gamedata}
                this.answered_user_data.push(clone)
                this.screen.loading = true
                this.answered_user ++
                this.loadingScreen()
                
            },

            getCorrectAnswertext(){
                return this.questions[this.qid].options.find(o => o.correct == 1).option
            },

            loadingScreen(){
                if(this.users.length == this.answered_user){
                    this.screen.loading = false; 
                    this.resultScreen();
                }
            },
            resultScreen(){
                console.log('resultScreen')
                this.getResult()
                this.screen.result = true
                this.startTimer()
            },
            startTimer(){
                console.log('startTimer')
                this.screen.result = 1
                this.timer = setInterval(() => { this.countDown(); }, 1000);
            },
            countDown(){
                console.log('countDown')
                if(this.counter == 0){

                    this.questionInit()

                    if(this.qid+1 == this.questions.length){
                        this.winner()
                        return
                    }

                    this.qid ++
                    this.current = this.questions[this.qid].id

                    this.QuestionTimer()
                }
                this.counter --
            },
            getResult(){
                console.log('getResult')

                this.results = []
                this.users.forEach(user => {
                    let score = 0;
                    this.answered_user_data
                        .filter(f => f.uid === user.id)
                        .map(u => {
                            score += u.isCorrect
                        })

                    this.results.push({id:user.id, name:user.name, score:score})

                })
                this.results.sort((a, b) => b.score - a.score)
            },
            winner(){
                this.user_ranking = this.results.findIndex(w => w.id == this.user.id)
                this.questionInit()
                this.screen.result = 1
                this.screen.winner = 1
                this.game_start = 0
                if(this.user_ranking == 0 ){
                    confetti({
                        zIndex:999999,
                        particleCount: 200,
                        spread: 120,
                        origin: { y: 0.6 }
                    });
                }
                else{
                    var colors = ['#bb0000', '#ffffff'];

                    confetti({
                        zIndex:999999,
                        particleCount: 100,
                        angle: 60,
                        spread: 55,
                        origin: { x: 0 },
                        colors: colors
                    });
                    confetti({
                        zIndex:999999,
                        particleCount: 100,
                        angle: 120,
                        spread: 55,
                        origin: { x: 1 },
                        colors: colors
                    });

                }
            },
            
            externalJS(){
                let confetti = document.createElement('script')
                confetti.setAttribute('src', 'https://cdn.jsdelivr.net/npm/canvas-confetti@1.3.0/dist/confetti.browser.min.js')
                document.head.appendChild(confetti)

                // let share = document.createElement('script')
                // share.async = true
                // share.setAttribute('src', 'https://platform-api.sharethis.com/js/sharethis.js#property=5e896e693790270019b8aac5&product=inline-share-buttons')
                // document.head.appendChild(share)
            },

            kickUser(id){
                if(id != this.uid){

                    this.users = this.users.filter( u => u.id !== id )

                    let channelUser = { channel: this.channel, uid:id }

                    axios.post(`/api/kickUser`, channelUser)

                }
                
            },
            questionInit(){
                clearInterval(this.timer)
                clearInterval(this.qt.timer)
                this.qt.ms = 0
                this.qt.time = 100
                this.progress = 100
                this.answered = 0
                this.answered_user = 0
                this.counter = 3
                this.screen.waiting = 0
                this.screen.loading = 0
                this.screen.result = 0
                this.screen.winner = 0
            },
            gameStarted(user){
                console.log(['user', user])
            }

        },

        computed: {
            channel(){
                return `challenge.${this.id}.${this.uid}`
            },
            progressClass(){
                return this.progress > 66? 'bg-success': this.progress > 33? 'bg-info': 'bg-danger'
            },
            progressWidth(){
                return {'width':this.progress + '%', }
            }
        }



        

    };
</script>


<style type="text/css" scoped="">
    
    .waiting, .loading, .result, .winner {
        position: fixed;
        z-index: 9999;
        top: 0;
        width: 100vw;
        height: 100vh;
        background: white;
        left: 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        /*background-image: linear-gradient(-225deg, #7DE2FC 0%, #B9B6E5 100%);*/
    }
    .waiting{
        background: #00B4DB;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #0083B0, #00B4DB);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #0083B0, #00B4DB); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    }
    .list-group-item.user-list{
        padding: 0 10px !important;
    }
    
    .q_num {
        position: absolute;
        right: 5px;
        width: 100%;
        top: 0px;
    }


    .fade-enter-active, .fade-leave-active {
      transition: opacity .3s;
    }
    .fade-enter, .fade-leave-to {
      opacity: 0;
    }
</style>
    

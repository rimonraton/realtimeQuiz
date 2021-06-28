<template>
    <div class="container">
        <div class="result-waiting" v-if="screen.resultWaiting">
            <div class="text-center bg-light">
                <img src="/img/quiz/result-waiting.gif" alt="Waiting for game end.">
                <p class="text-center px-5">Please wait result is processing..</p>
            </div>
        </div>

        <transition name="fade">
            <result :results='results' :lastQuestion='(qid + 1) == questions.length'
                    v-if="screen.result">
            </result>
        </transition>

        <div class="winner" v-if="screen.winner">
            <div v-if="user_ranking == 0">
                <h3 class="text-center">{{ pm.perform_message }} </h3>
                <h3><b>{{ user.name }}</b>, you won this game.</h3>
            </div>
            <div v-else-if="user_ranking == 1">
                <h3 class="text-center">{{ pm.perform_message }}</h3>
                <h3><b>{{ user.name }}</b>, you got second place</h3>
            </div>
            <div v-else>
                <h3 class="text-center"><b>{{ user.name }}</b>, you need more concentration </h3>
            </div>
            <button @click="screen.winner = 0" class="btn btn-sm btn-secondary">More Result</button>
            <img class="card-img img-responsive my-3" :src="getUrl('challengeShareResult/'+share.link)" type="image/png" style="width: 500px !important">
            <iframe :src="getShareLink('challengeShareResult/'+share.link)" width="77" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
        </div>

        <waiting :teams="teams" :teamUser="teamUser" :uid='uid' :users='users' :user='user' :time='id.schedule'
                 @kickingUser="kickUser($event)"
                 @gameStart="gameStart"
                 @gameReset="gameReset"
                 v-if="screen.waiting">
        </waiting>

        <team-member :teams="teams" :user="user" @joinTeam="joinTeam($event)"
                     v-if="screen.team == 1">
        </team-member>

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
                    <div class="card-body animate__animated animate__backInRight animate__faster">
                        <span class="q_num text-right text-muted">
                            {{ qne2b(qid, questions.length, user.lang) }}
                        </span>

                        <img v-if="question.more_info_link" class="image w-100 mt-1 rounded" :src="question.more_info_link" style="max-height:70vh">

                        <p v-html="tbe(question.bd_question_text, question.question_text, user.lang)" class="my-2 font-bold"></p>

                        <ul class="list-group" v-for="option in question.options">
                            <li @click="checkAnswer(question.id, option.option, option.correct)"
                                class="list-group-item list-group-item-action cursor my-1">
                                <span v-html="tbe(option.bd_option, option.option, user.lang)"></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4" >
                <div class="card my-4" >
                    <div class="card-header">
                        Score Board
                        <a @click="gameResetCall" v-if="user.id == uid && qid > 0 " class="btn btn-sm btn-danger float-right">RESET</a>
                    </div>
                    <div class="card-body" v-if="results.length>0">
                        <transition-group name="slide-up" class="list-group" tag="ul" appear>
                            <li class="list-group-item user-list"
                                v-for="(res, index) in results" :key="res.id"
                                :class="{active : res.id == user.id}"
                            >
                                <span v-html="getMedel(index)"></span>
                                {{ res.name }} <span class="badge badge-dark float-right mt-1">{{ res.score}}</span>
                            </li>
                        </transition-group>



                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import waiting from '../helper/moderator/waiting'
    import TeamMember from '../helper/TeamMember'
    import result from '../helper/result'

    export default {

        props : ['id', 'uid', 'user', 'questions', 'gmsg','teams'],

        components: { waiting, result,TeamMember },

        data() {
            return {
                qt:{
                    ms: 0,
                    time:50,
                    timer:null
                },
                users: [],
                answered:0,
                end_user: 0,
                answered_user_data: [],
                results: [],
                counter: 2,
                timer: null,
                current: 0,
                qid: 0,
                screen:{
                    waiting: 1,
                    loading: 0,
                    result: 0,
                    resultWaiting: 0,
                    winner: 0,
                    team:1,
                },
                gamedata: {},
                score: [],
                user_ranking: null,
                game_start:0,
                progress: 100,
                share:null,
                pm:'',
                perform:0,
                teamUser:[],
            };
        },

        created(){
            Echo.channel(`challenge.${this.id.id}.${this.uid}`)
                .listen('GameStartEvent', (data) => {
                    console.log(['GameStartEvent.............', data])
                    this.share = data.share
                    this.game_start = 1 // Game Start from Game Owner...
                    this.screen.waiting = 0
                    this.QuestionTimer() // Set and Start QuestionTimer

                })
                .listen('GameResetEvent', (data) => {
                    console.log(['GameResetEvent.............', data])
                    this.gameReset()
                })
                .listen('GameEndUserEvent', (data) => {
                    console.log(['GameEndUserEvent.............', data])
                    this.end_user ++
                    if(this.users.length == this.end_user) {
                        this.winner()
                    }
                })
                .listen('QuestionClickedEvent', (data) => {
                    console.log('QuestionClickedEvent.............')
                    this.answered_user_data.push(data)
                    this.getResult()
                })
                .listen('KickUserEvent', (data) => {
                    console.log('KickUserEvent.............')
                    this.users = this.users.filter( u => u.id !== data.uid )

                    if(this.user.id == data.uid){
                        window.location.href = "http://quiz.test"
                    }

                })
                .listen('TeamJoin', (data) => {
                    console.log(['Team Join.............',data])
                    this.teamUser.push({team: data.team, users: data.user});
                    this.users.map(u=> {
                        if(u.id === data.user.id){
                            u.gid = data.team;
                        }
                    })
                    this.teams.find(team => team.id === data.team).users.push({user:data.user});
                });

        },

        mounted() {
            Echo.join(`challenge.${this.id.id}.${this.uid}`)
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
            gameStart: function () {
                let ids = this.users.map(u => u.id)
                let gd = {channel: this.channel, gameStart: 1, uid: ids, id:this.id.id, users:this.users,host_id:this.uid}
                console.log(gd);
                axios.post(`/api/gameStart`, gd).then(res => this.share = res.data)
                this.game_start = 1
                this.screen.waiting = 0
                this.QuestionTimer()
            },
            gameResetCall() {
                axios.post(`/api/gameReset`, {channel: this.channel }).then(res => console.log(res.data))
                this.gameReset()
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
                this.resultScreen();
                if(this.qid+1 == this.questions.length) {
                    let gr = {result: this.results, 'share_id': this.share.id}
                    axios.post(`/api/challengeResult`, gr).then(res => console.log(res.data))
                }

            },

            getCorrectAnswertext(){
                return this.questions[this.qid].options.find(o => o.correct == 1).option
            },
            resultScreen(){
                console.log('resultScreen')
                this.getResult() //Sorting this.results
                this.countDown()
                this.questionInit()
                if(this.qid+1 == this.questions.length){
                    axios.post(`/api/gameEndUser`, {'channel': this.channel})
                    this.end_user ++
                    if(this.users.length == this.end_user) {
                        this.winner()
                        return
                    }
                    this.screen.resultWaiting = 1;
                    return
                }
                this.qid ++
                this.current = this.questions[this.qid].id
                this.QuestionTimer()
            },
            countDown(){
                console.log('countDown')
                if(this.counter == 0){

                    this.questionInit()

                    if(this.qid+1 == this.questions.length){
                        this.winner()
                        this.counter =0
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
                let user_score = this.results[this.user_ranking].score
                this.perform = Math.round((user_score / ((this.qid +1) * 100)) * 100)
                this.pm = this.gmsg.filter(gm => gm.perform_status >= this.perform)
                    .reduce(function (prev, curr) {
                        return prev.perform_status < curr.perform_status ? prev : curr;
                    });
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
                this.qt.time = 50
                this.progress = 100
                this.answered = 0
                this.counter = 2
                this.screen.waiting = 0
                this.screen.loading = 0
                this.screen.result = 0
                this.screen.winner = 0
            },
            gameStarted(user){
                console.log(['user', user])
            },
            q2bNumber(numb) {
                let numbString = numb.toString();
                let bn = ''
                let eb = {0: '০', 1: '১', 2: '২', 3: '৩', 4: '৪', 5: '৫', 6: '৬', 7: '৭', 8: '৮', 9: '৯'};
                [...numbString].forEach(n => bn += eb[n])
                return bn
            },
            tbe(b, e, l) {
                if(b !== null && e !== null){
                    if(l === 'bd') return b;
                    return e;
                }
                else if(b !== null && e === null) return b;
                else if(b === null && e !== null) return e;
                return b;
            },
            qne2b(q, qn, l) {
                if (l === 'gb')
                    return `Question ${q + 1} of ${qn} `;
                return `প্রশ্ন ${this.q2bNumber(qn)} এর ${this.q2bNumber(q + 1)} `;
            },
            getUrl (path) {
                return location.origin +'/'+ path
            },
            getShareLink(path){
                console.log(['urlencode', encodeURI(this.getUrl(path))]);
                return 'https://www.facebook.com/plugins/share_button.php?href=' + encodeURI(this.getUrl(path)) + '&layout=button&size=large&appId=1086594171698024&width=77&height=28'
            },
            getMedel(index){
                if(index == 0) return '<i class="fas fa-award fa-lg" style="color: gold"></i>'
                if(index == 1) return '<i class="fas fa-award" style="color: silver"></i>'
                if(index == 2) return '<i class="fas fa-award fa-sm" style="color: #CD7F32"></i>'
                return '';
            },
            waitingResult(){
                return 'waiting-result';
            },
            joinTeam(id){
                let obj = {channel: this.channel, team: id, user:this.user}
                this.teamUser.push({team: id, users:this.user});
                this.users.map(u=> {
                    if(u.id === this.user.id){
                        u.gid = id;
                    }
                })
                axios.post(`/api/jointeam`, obj).then(res => this.screen.team = 0)


            },



        },

        computed: {
            channel(){
                return `challenge.${this.id.id}.${this.uid}`
            },
            progressClass(){
                return this.progress > 66? 'bg-success': this.progress > 33? 'bg-info': 'bg-danger'
            },
            progressWidth(){
                return {'width':this.progress + '%', }
            },

        }





    };
</script>

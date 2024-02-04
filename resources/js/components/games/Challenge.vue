<template>
    <div class="container" >
        <div :class="{'preventClick': preventClick}"></div>
        <div class="result-waiting" v-if="screen.resultWaiting">
            <div class="text-center bg-light">
                <img src="/img/quiz/result-waiting.gif" alt="Waiting for game end.">
                <p class="text-center px-5">Please wait result is processing..</p>
            </div>
        </div>

        <transition name="fade" v-if="screen.result">
            <result
                    :results='results'
                    :lastQuestion='qid == questions.length'
                    :resultDetail="answered_user_data"
                    :requestHostUser="requestHostUser"
                    :uid="uid"
                    :user="user"
                    @playAgain="gameResetCall"
                    @newQuiz="newQuiz"
                    @makeHost="makeHost"
                    >
            </result>
        </transition>
        <transition id="Chat"
            name="custom-classes"
            enter-active-class="animate__animated animate__fadeIn animate__slow"
            leave-active-class="animate__animated animate__fadeOut animate__slow"
        >
            <chat :channel="channel" :uid="uid" :user="user" :challenge="challenge" />
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
        </div>

        <waiting :uid='uid' :users='users' :user='user' :time='challenge.schedule' :challenge="challenge" :defTime="qt.defaultTime"
                @kickingUser="kickUser($event)"
                @gameStart="gameStart"
                @gameReset="gameReset"
                v-if="screen.waiting">
        </waiting>

        <div class="row justify-content-center">
            <div class="col-md-8 pxs-0">
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
                        <img v-if="question.fileType == 'image'" class="image w-100 mt-1 rounded img-thumbnail"
                             :src="'/' + question.question_file_link" style="max-height:70vh" alt="">

                        <div>
                            <div v-if="endAVWait">
                                <video v-if="question.fileType == 'video'"
                                    :src="'/'+ question.question_file_link"
                                    @error="audioVideoError()"
                                    @ended="onEnd()"
                                    @play="onStart()"
                                    class="image w-100 mt-1 rounded img-thumbnail"
                                    controls="controls"
                                    playsinline
                                    autoplay
                                >
<!--                                    <source :src="'/'+ question.question_file_link" @error="audioVideoError()" type="video/mp4">-->
                                </video>
                                <div class="audio" v-if="question.fileType == 'audio'">
                                    <audio
                                        :src="'/'+ question.question_file_link"
                                        @error="audioVideoError()"
                                        @ended="onEnd()"
                                        @play="onStart()"
                                        controls
                                        autoplay />
                                    <div id="ar"></div>
                                </div>
                            </div>
                            <div v-else>
                                <div v-if="currentQuestionType == 'audio'" >
                                    <h1>Audio Question... </h1>
                                </div>
                                <div v-if="currentQuestionType == 'video'" >
                                    <h1>Video Question... </h1>
                                </div>
                            </div>

                            <div v-show="av">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center question-title">
                                            <h3 class="text-danger">Q.</h3>
                                            <h5 class="mt-1 ml-2">
                                                {{ tbe(question.bd_question_text, question.question_text, user.lang) }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>

                                <div v-if="sqo" class="animate__animated animate__zoomIn animate__faster d-flex flex-wrap"
                                     :class="{'row justify-content-center justify-item-center': imageOption(question['options'])}"
                                >
                                    <div v-if="question.short_answer > 0" class="col-md-12 mt-4">
    <!--                                    Fill in the blank -->
                                        <form @submit.prevent="smtAnswer(question.id, question.options, shortAnswer)">
                                        <div class="input-group">
                                            <input type="text"
                                                   class="form-control"
                                                   placeholder="Type Your Answer"
                                                   v-model="shortAnswer">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"
                                                        :disabled="shortAnswer != null ? false : true"
                                                        type="submit">Submit</button>
                                            </div>
                                        </div>
                                        </form>

                                    </div>
                                    <div v-else v-for="(option, i) in question.options" class="col-md-6 px-1"
                                         :class="[option.flag == 'img' ? 'col-6' : 'col-12' ]"
                                    >
                                        <div class="list-group" v-if="option.flag != 'img'"
                                             :class="getOptionClass(i, challenge.option_view_time)"
                                        >
                                            <span @click.once="checkAnswer(question.id, tbe(option.bd_option, option.option, user.lang), option.correct)"
                                                  class="list-group-item list-group-item-action cursor my-1"
                                                  v-html="tbe(option.bd_option, option.option, user.lang)" >

                                            </span>
                                        </div>
                                        <div
                                            v-else
                                            @click="checkAnswer(question.id, option.img_link, option.correct)"
                                            class="cursor my-1 "
                                            :class="getOptionClass(i, challenge.option_view_time)"
                                        >
                                            <img  class="imageOption mt-1 rounded img-thumbnail" :src="'/'+ option.img_link" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4" >
                <div class="card my-4" v-if="results.length>0">
                    <div class="card-header">
                        Score Board
<!--                        <a @click="stop"  class="btn btn-sm btn-danger float-left">STOP</a>-->
                        <a @click="gameResetCall" v-if="user.id == uid && qid > 0 " class="btn btn-sm btn-danger float-right">RESET</a>
                    </div>
                    <div class="card-body" >
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

    import waiting from '../helper/waiting'
    import result from '../helper/result'
    import chat from '../helper/Chat'
    import { quizHelpers } from '../mixins/quizHelpers'

    export default {
        mixins: [quizHelpers],

        props : ['challenge', 'hostid', 'user', 'quizquestions', 'gmsg','teams'],

        components: { waiting, result, chat },

        data() {
            return {
                qt:{
                    ms: 0,
                    defaultTime: 30,
                    time: 30,
                    timer:null
              },
                counter: 2,
                timer: null,
                users: [],
                uid: this.hostid,
                questions: this.quizquestions,
                answered:0,
                end_user: 0,
                answered_user_data: [],
                results: [],
                av: true,
                sqo:false,
                qid: 0,
                current: 0,
                screen:{
                    waiting: 1,
                    loading: 0,
                    result: 0,
                    resultWaiting: 0,
                    winner: 0,
                },
                gamedata: {},
                score: [],
                user_ranking: null,
                game_start:0,
                progress: 100,
                share:null,
                pm:'',
                perform:0,
                preventClick: true,
                shortAnswer: null,
                requestHost: false,
                requestHostUser: null,
                endAVWait: false,
                gameEnded: false,
                timerTimeOut: 100
            };
        },

        created(){
            // console.log('challenge created')
            Echo.channel(this.channel)
                .listen('GameStartEvent', (data) => {
                    console.log(['GameStartEvent.............', data])
                    this.share = data.share
                    this.game_start = 1 // Game Start from Game Owner...
                    this.screen.waiting = 0
                    this.sqo = true
                    this.showQuestionOptions(null)
                    this.qt.defaultTime = data.defaultTime
                    this.qt.time = data.defaultTime

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
                .listen('MakeHostEvent', (data) => {
                    console.log('MakeHostEvent.............', data)
                    if (data.status == 'accept'){
                        this.uid = data.user.id
                        this.requestHostUser = null
                    } else if (data.status == 'deny'){
                        this.requestHostUser = null
                    } else{
                        this.requestHostUser = data.user
                    }

                })
                .listen('ChangeQuestionEvent', (data) => {
                    console.log('ChangeQuestionEvent.............', data)
                    this.questions = data.questions
                })
                .listen('KickUserEvent', (data) => {
                    console.log('KickUserEvent.............')
                    this.users = this.users.filter( u => u.id !== data.uid )

                    if(this.user.id == data.uid){
                        window.location.href = "/"
                    }

                });
        },
        // watch: {
        //     questions: {
        //         handler(newQuestion) {
        //             console.log('newQuestion', newQuestion[0])
        //             this.showQuestionOptions(newQuestion[0].fileType, '');
        //         },
        //         // force eager callback execution
        //         immediate: true
        //     },
        // },

        mounted() {
                Echo.join(this.channel)
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
            document.addEventListener("blur", () =>  this.preventLeave());
            document.addEventListener("visibilitychange", () => {
                if(document.hidden) {
                    this.preventLeave()
                }
            })

        },

        // beforeMount() {
        //     console.log('beforeMount')
        //     window.addEventListener("beforeunload", this.preventNav)
        //     this.$once("hook:beforeDestroy", () => {
        //         window.removeEventListener("beforeunload", this.preventNav);
        //     });
        // },
        //
        // beforeRouteLeave(to, from, next) {
        //     console.log('beforeRouteLeave')
        //
        //     if (this.game_start) {
        //       if (!window.confirm("Do You Realy Want to Leave This Game?")) {
        //         return;
        //       }
        //     }
        //     next();
        // },

        methods: {
            gameStart: function (defaultTime = 30) {
                console.log('gameStart...')
                this.sqo = true
                let ids = this.users.map(u => u.id)
                let gd = {
                    channel: this.channel,
                    gameStart: 1,
                    uid: ids,
                    id: this.challenge.id,
                    users:this.users,
                    host_id:this.uid,
                    defaultTime: defaultTime
                }
                this.qt.defaultTime = defaultTime
                this.qt.time = defaultTime
                // console.log(gd);
                axios.post(`/api/gameStart`, gd)
                    .then(res => {
                        this.share = res.data
                        this.game_start = 1
                        this.screen.waiting = 0
                        this.showQuestionOptions(this.questions[0].fileType)
                    })
                // this.QuestionTimer()
            },
            showQuestionOptions (question) {
                if (this.gameEnded) return;
                console.log('showQuestionOptions...')
                let timeout = 1000;
                if(this.challenge.option_view_time != 0) { // this.quiz.quiz_time * 1000
                    timeout = 3500;
                }
                if(question !=='onEnd'){ //onEnd is made up text to check audioVideo end
                    if(this.currentQuestionType == 'audio' || this.currentQuestionType == 'video') {
                        timeout += 3000
                        this.av = false
                        setTimeout(() => {
                            this.endAVWait = true
                        }, timeout) //3000
                    }
                }
                setTimeout(() => {
                    // this.sqo = true
                    this.preventClick = false
                    this.QuestionTimer()
                }, timeout)
            },
            QuestionTimer(){
                console.log('QuestionTimer...')

                if(this.qid == this.questions.length || this.av == false || this.gameEnded === true) {
                    return;
                }
                let pdec = 100 / (10 * this.qt.time);
                // console.log('pdec', pdec)
                // this.preventClick = false
                this.qt.timer =
                    setInterval(() => {
                        console.log('this.qt.time', this.qt.time)
                        if(this.qt.time <= 0){
                            this.questionInit(this.qt.defaultTime);
                            this.checkAnswer(this.qid, 'Not Answered', 0);
                            // this.resultScreen();
                        }
                        else{
                            this.qt.ms ++
                            this.progress -= pdec

                            if(this.qt.ms == 10){
                                this.qt.time--
                                this.qt.ms = 0
                            }

                        }

                    }, this.timerTimeOut);
            },
            checkAnswer(q, a, rw){
                if (this.gameEnded) return;
                this.preventClick = true
                console.log('checkAnswer...', q, a, rw)
                // if(this.gameEnded === true) {
                //     this.stop();
                //     return
                // }
                this.shortAnswer = null
                this.answered = 1
                this.right_wrong = rw
                this.gamedata['uid'] = this.user.id
                this.gamedata['channel'] = this.channel
                this.gamedata['name'] = this.user.name
                this.gamedata['question'] = this.tbe(this.questions[this.qid].bd_question_text, this.questions[this.qid].question_text, this.user.lang)
                this.gamedata['answer'] = this.getCorrectAnswerText()
                this.gamedata['selected'] = a
                this.gamedata['isCorrect'] = rw == 1? Math.floor(this.progress): 0
                let clone = {...this.gamedata}
                this.questionInit(this.qt.defaultTime)
                axios.post(`/api/questionClick`, clone)
                    .then(res => {
                        this.resultScreen();
                    })
                this.answered_user_data.push(clone)
                this.screen.loading = true
            },
            getResult(){
                console.log('getResult...')
                this.results = []
                this.users.forEach(user => {
                    let score = 0;
                    this.answered_user_data
                        .filter(f => f.uid === user.id)
                        .map(u => {
                            score += u.isCorrect
                        })

                    this.results.push({id:user.id, name:user.name, score:score, user:user})

                })
                this.results.sort((a, b) => b.score - a.score)
            },
            smtAnswer(qid, qopt, data){
                console.log('smtAnswer...')
                if(this.gameEnded === true) {
                    this.stop();
                    return
                }

                if (data == null) return
                const correct = qopt.some((opt) => {
                    return opt.option.toLowerCase() == data.toLowerCase() || opt.bd_option == data
                })
                // console.log(qid, qopt, data, correct)

                if(correct){
                    this.checkAnswer(qid, data, 1)
                } else{
                    this.checkAnswer(qid, data, 0)
                }
            },
            preventNav(event) {
                if (!this.game_start) return;
                event.preventDefault();
                // Chrome requires returnValue to be set.
                event.returnValue = "";
            },
            preventLeave() {
                console.log('new notification leave from quiz. blur')
                Notification.requestPermission().then(param => {
                    if(param === 'granted') {
                        new Notification('Leave from Quiz', {
                            body: 'You should not exit this screen without completing the Exam/quiz.!',
                            tag: 'Leave from Quiz',
                        })
                    }
                })
            },
            gameResetCall(isStart = false) {
                console.log('gameResetCall....')
                axios.post(`/api/gameReset`, {channel: this.channel }).then(res => console.log(res.data))
                this.gameReset()
                this.screen.waiting = 0
                if (isStart) this.gameStart();

            },
            gameReset(){
                console.log('gameReset....')

                this.questionInit(this.qt.defaultTime)
                this.screen.waiting = 1
                this.screen.loading = 0
                this.screen.result = 0
                this.screen.resultWaiting = 0
                this.screen.winner = 0
                this.end_user = 0
                this.answered_user_data = []
                this.results = []
                this.qid = 0
                this.gamedata = {}
                this.score = []
                this.user_ranking = null
                this.game_start = 0
                this.current = this.questions[this.qid].id
                this.endAVWait = false
            },

            getCorrectAnswerText(){
                console.log('getCorrectAnswerText....')

               const correctOption = this.questions[this.qid].options.find(o => o.correct == 1)
                // console.log('correctOption....', correctOption)
                if(correctOption.flag == 'img') {
                    return correctOption.img_link
                } else{
                    const correctEngOption = correctOption.option
                    const correctBanOption = correctOption.bd_option
                    return  this.tbe(correctBanOption, correctEngOption, this.user.lang)
                }
            },
            resultScreen(){
                console.log('resultScreen...')
                this.questionInit(this.qt.defaultTime)
                this.getResult() //Sorting this.results
                this.countDown()
                if(this.qid+1 == this.questions.length) {
                    console.log('......resultScreen')
                    this.quizEnd()
                } else {
                    console.log('resultScreen preventClick True')
                    this.preventClick = true
                    this.qid ++
                    this.current = this.questions[this.qid].id
                    this.showQuestionOptions(null)
                }
            },

            countDown(){
                if (this.gameEnded) return;
                console.log('countDown')
                if(this.counter == 0){
                  this.qid ++
                  this.current = this.questions[this.qid].id
                  this.showQuestionOptions(null)
                } else {
                  this.counter --
                }
            },
            winner(){
                console.log('winer....')

                this.user_ranking = this.results.findIndex(w => w.id == this.user.id)
                let user_score = this.results[this.user_ranking].score
                this.perform = Math.round((user_score / ((this.qid +1) * 100)) * 100)
                this.pm = this.gmsg.filter(gm => gm.perform_status >= this.perform)
                    .reduce(function (prev, curr) {
                        return prev.perform_status < curr.perform_status ? prev : curr;
                    });
                this.questionInit(this.qt.defaultTime)
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
                // else{
                //     let colors = ['#bb0000', '#ffffff'];
                //
                //     confetti({
                //         zIndex:999999,
                //         particleCount: 100,
                //         angle: 60,
                //         spread: 55,
                //         origin: { x: 0 },
                //         colors: colors
                //     });
                //     confetti({
                //         zIndex:999999,
                //         particleCount: 100,
                //         angle: 120,
                //         spread: 55,
                //         origin: { x: 1 },
                //         colors: colors
                //     });
                //
                // }
            },
            kickUser(id){
                if(id != this.uid){

                    this.users = this.users.filter( u => u.id !== id )

                    let channelUser = { channel: this.channel, uid:id }

                    axios.post(`/api/kickUser`, channelUser)

                }

            },
            gameStarted(user){
                console.log(['gameStarted, user', user])
            },
            getShareLink(path){
                console.log(['urlencode', encodeURI(this.getUrl(path))]);
                return 'https://www.facebook.com/plugins/share_button.php?href=' + encodeURI(this.getUrl(path)) + '&layout=button&size=large&appId=1086594171698024&width=77&height=28'
            },
            getOptionClass (index, qtime) {
                if(qtime > 0){
                    if(index == 0) {
                        return 'animate__animated animate__lightSpeedInRight';
                    }
                    return 'animate__animated animate__lightSpeedInRight animate__delay-' + index +'s';
                }

                return '';
            },


            async makeHost(uid, status = null){
                console.log('user id..', this.isHost())
                if(this.isHost() && status == null){
                    this.uid = uid
                    this.requestHostUser = null
                    status = 'accept'
                    // this.makeHost(uid, 'accept')
                } else{
                    if (status == 'accept'){
                        this.uid = uid
                        this.requestHostUser = null
                    } else if (status == 'deny'){
                        this.requestHostUser = null
                    } else {
                        this.requestHostUser = this.user
                    }
                }

                return await  axios.post(`/api/makeHost/${uid}/${this.channel}/${status}`)
            },
            async newQuiz(uid){
                let makeHostStatus = await this.makeHost(uid)
                console.log('makeHostStatus..', makeHostStatus.status)
                if(makeHostStatus.status === 200){
                    console.log('inside..', makeHostStatus.status)
                    let data = { channel: this.channel, id:this.challenge.id}
                    axios.post(`/api/newGameQuiz`, data)
                        .then(res => {
                            this.questions = res.data
                            this.gameResetCall(true)
                            // console.log('result...', res)
                            // this.share = res.data
                            // this.game_start = 1
                            // this.screen.waiting = 0
                            // this.showQuestionOptions(this.questions[0].fileType)
                        })
                } else{
                    console.log('makeHostStatus status is not 200')
                }
            },
            quizEnd () {
                console.log('gameEnded quizEnd end')

                if(this.gameEnded) {
                    console.log('gameEnded quizEnd end')
                    return
                }else {
                    // axios.post(`/api/gameEndUser`, {'channel': this.channel})
                    let gameResult = { result: this.results, 'share_id': this.share.id, 'channel': this.channel }
                    axios.post(`/api/challengeResult`, gameResult).then(res => {
                        this.end_user ++
                        console.log('users + end user', this.users.length, this.end_user)
                        if(this.users.length <= this.end_user) {
                            this.winner()
                            return
                        } else {
                            this.gameEnded = true;
                            this.questionInit(this.qt.defaultTime)
                            this.screen.resultWaiting = 1;
                        }
                    })
                }
            },

        },

        computed: {
            currentQuestionType () {
                return this.quizquestions[this.qid].fileType
            }
        }

    };
</script>
<style scoped>
    .imageOption {
        height: 100px;
        width: 100%;
    }
    .preventClick {
        position: absolute;
        height: 100%;
        background: rgba(0, 0, 0, 0.1);
        width: 100%;
        z-index: 999;
        left: 0px;
        top: 0px;
    }
    .share-result-image {
        max-width: fit-content;
    }
    .col-md-6.col-6:hover {
        background-color: #38c172 !important;
    }

    @media screen and (min-width: 480px) {
        .imageOption {
            height: 170px;
            width: 100%;
        }
    }
</style>

<template>
    <div class="container" >
        <div :class="{'preventClick': preventClick}"></div>
        <div class="result-waiting" v-if="screen.resultWaiting">
            <div class="text-center bg-light">
                <img src="/img/quiz/result-waiting.gif" alt="Waiting for game end.">
                <p class="text-center px-5">Please wait for next question...</p>
            </div>
        </div>

        <transition name="fade">
            <single-result  v-if="screen.result"
                :results='results'
                :lastQuestion='qid == questions.length'
                :resultDetail="answered_user_data"
                :uid="uid"
                :user="user"
                >
            </single-result>
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

            <div class="px-2">
                <img
                    class="card-img img-responsive my-3 lazy share-result-image"
                    :src="getUrl('challengeShareResult/'+share.link)"
                    type="image/png"
                >
            </div>

            <iframe
                :src="getShareLink('challengeShareResult/'+share.link)"
                width="77" height="28"
                style="border:none; overflow:hidden"
                scrolling="no"
                frameborder="0"
                allowfullscreen="true"
                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
            ></iframe>
        </div>
        <wait :uid='uid' :users='users' :user='user' :time='challenge.schedule'
              @kickingUser="kickUser($event)"
              @gameStart="gameStart"
              @endAV="onEnd('apiCall')"
              @gameReset="gameReset"
              @onEnd="onEnd"
              v-if="screen.waiting">
        </wait>
        <user_info
            v-if="!user.id"
            :uid='uid'
            :users='users'
            :user='user'
            :time='challenge.schedule'
             @insertUser="insertUser">
        </user_info>
<!--        <qrcode/>-->

        <div class="row justify-content-center">
            <div class="col-md-12">
<!--                Progress Bar-->
                <div class="progress" v-if="uid === user.id">
                    <div class="progress-bar progress-bar-striped"
                         :style="progressWidth"
                         :class="progressClass"
                    > {{ Math.floor(progress) }}
                    </div>
                </div>
                <div class="my-4" v-for="question in questions" v-if="question.id == current">
                     <div class="text-center text-muted">
                            {{ qne2b(qid, questions.length, user.lang) }}
                        </div>
                    <div class="pb-1 animate__animated animate__backInRight animate__faster">
                        <div v-if="uid ===user.id">
                            <img v-if="question.fileType == 'image'" class="image w-100 mt-1 rounded img-thumbnail"
                                 :src="'/' + question.question_file_link" style="max-height:70vh" alt="">
                            <video
                                v-if="question.fileType == 'video' && isHost()"
                                @ended="onEnd('apiCall')"
                                @play="onStart()"
                                class="image w-100 mt-1 rounded img-thumbnail"
                                autoplay
                                controls
                            >
                                <source :src="'/'+ question.question_file_link" type="video/mp4">
                            </video>
                            <div class="audio" v-if="question.fileType == 'audio' && isHost()">
                                <audio
                                    @ended="onEnd('apiCall')"
                                    @play="onStart()"
                                    controls
                                    autoplay>
                                    <source :src="'/'+ question.question_file_link" type="audio/mpeg">
                                </audio>
                                <div id="ar"></div>
                            </div>
                        </div>
                      <div v-show="av">
<!--                          Question Text-->
                            <div class="mt-2" v-if="uid === user.id">
                                <div class="question-title">
                                    <div class="alert alert-info d-flex px-4 py-5 justify-content-center">
<!--                                        <h3 class="text-danger">Q.</h3>-->
                                        <h1 class="ml-1">
                                            {{ tbe(question.bd_question_text, question.question_text, user.lang) }}
                                        </h1>
                                    </div>
                                </div>
                            </div>
                          <div v-if="sqo && uid !==user.id">
                              <div  v-if="showOption"  class="animate__animated animate__zoomIn animate__faster d-flex flex-wrap"
                                   :class="{'row justify-content-center justify-item-center': imageOption(question.options)}"
                              >
                                  <div v-if="question.short_answer > 0" class="col-md-12 mt-4">
                                      <!--                                    {{question.options}}-->
                                      <form @submit.prevent="smtAnswer(question.id, question.options, shortAnswer)">
                                          <div class="input-group">
                                              <input type="text" class="form-control" placeholder="Type Your Answer" v-model="shortAnswer">
                                              <div class="input-group-append">
                                                  <button class="btn btn-primary":disabled="shortAnswer != null ? false : true" type="submit">Submit</button>
                                              </div>
                                          </div>
                                      </form>

                                  </div>
                                  <div v-else v-for="(option, i) in question.options" class="col-md-6 px-1"
                                       :class="[option.flag == 'img' ? 'col-6' : ' col-12' ]"
                                  >
                                      <div class="list-group" v-if="option.flag != 'img'"
                                           :class="getOptionClass(i, challenge.option_view_time)"
                                      >
                                        <span @click="checkAnswer(question.id, tbe(option.bd_option, option.option, user.lang), option.correct)"
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
                              <div v-else>
                                  {{waitForOption}}
                              </div>
                          </div>


                      </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 border-bottom" v-if="uid === user.id">
                <div class="my-4" >
                    <div class="">
                        Score Board
<!--                        <a @click="stop"  class="btn btn-sm btn-danger float-left">STOP</a>-->
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

import qrcode from '../helper/singleDisplay/Qrcode'
import user_info from '../helper/singleDisplay/UserName'
import wait from '../helper/singleDisplay/waiting'
import result from '../helper/result'
import { quizHelpers } from '../mixins/quizHelpers'
import SingleResult from "../helper/singleResult";

export default {
    mixins: [quizHelpers],

    props : ['challenge', 'uid', 'propuser', 'questions', 'gmsg','teams'],

    components: {SingleResult, wait, result, user_info, qrcode },

    data() {
        return {
            qt:{
                ms: 0,
                time:15,
                timer:null
            },
            users: [],
            user: this.propuser,
            answered:0,
            end_user: 0,
            answered_user_data: [],
            results: [],
            counter: 2,
            timer: null,
            current: 0,
            av: true,
            sqo:false,
            showOption:false,
            waitForOption: 'Please wait. You will see the options very quickly.',
            qid: 0,
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
            question_time: 60
        };
    },

    created(){
        Echo.channel(this.channel)
            .listen('SingleDisplay.UserJoinEvent', (data) => {
                console.log(['UserJoinEvent.............', data])
                this.au = true
                !this.users.some(u => u.id === data.user.id) ? this.users.push(data.user) : ''
            })
            .listen('SingleDisplay.AudioVideoEndEvent', (data) => {
                console.log(['apiCallOnEnded log.............', data])
                if(!this.isHost()) {
                    this.av = true
                    this.showQuestionOptions(null)
                    this.showAfter()
                }
            })
            .listen('SingleDisplay.UserJoinUsersEvent', (data) => {
                console.log(['UserJoinUsersEvent.............', data])
                !this.users.some(u => u.id === data.user.id) ? this.users.push(data.user) : ''
                this.au = true
            })
            .listen('GameStartEvent', (data) => {
                console.log(['GameStartEvent.............', data])
                this.share = data.share
                this.users = data.users
                this.game_start = 1 // Game Start from Game Owner...
                this.screen.waiting = 0
                this.sqo = true
                this.showAfter()
                this.showQuestionOptions(null)
                // this.QuestionTimer() // Set and Start QuestionTimer

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
                this.answered ++

                console.log('QuestionClickedEvent', this.answered_user_data)
                this.getResult()
                if (this.isHost() && this.users.length == this.answered ) {
                    this.answered = 0
                    this.resultScreen()
                }
            })
            .listen('KickUserEvent', (data) => {
                console.log('KickUserEvent.............')
                this.users = this.users.filter( u => u.id !== data.uid )
                if(this.user.id == data.uid){
                    window.location.href = "/"
                }
            })
            .listen('NextQuestionEvent', (data) => {
                console.log('NextQuestionEvent.............',data)
                this.nextQuestion()
                this.showAfter()
                this.waitForOption = 'Please wait. You will see the options very quickly.'
            })
    },

    mounted ()  {
        this.joinUser()

        // Echo.join(this.channel)
        //     .here(() => {
        //         console.log('SingleQuestionDisplay...join Mounted')
        //         //this.users = users;
        //     })
        //     .joining(() => {
        //         console.log( 'useruser Joining')
        //         //this.users.push(user);
        //         // if(this.game_start){
        //         //     this.kickUser(user.id)
        //         // }
        //     })
        //     .leaving(() => {
        //         console.log( 'useruser leaving')
        //         // this.users = this.users.filter(u => u.id != user.id);
        //         // console.log(`${user.name} leaving`);
        //     });

        this.current = this.questions[this.qid].id
        // document.addEventListener("blur", () =>  this.preventLeave());
        // document.addEventListener("visibilitychange", () => {
        //     if(document.hidden) {
        //         this.preventLeave()
        //     }
        // })

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
    //         if (!window.confirm("Do You Realy Want to Leave This Game?")) {
    //             return;
    //         }
    //     }
    //     next();
    // },

    methods: {
        smtAnswer(qid, qopt, data){
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
        showAfter(){
            setTimeout(() => {
                this.showOption = true
            }, 3000)
        },
        async joinUser(){
            let SingleGameUser = JSON.parse(sessionStorage.getItem("SingleGameUser"))
            if (SingleGameUser) {
                this.user = SingleGameUser
                this.user['channel'] = this.channel
                console.log(this.user, 'SingleGameUserFound')
                await axios.post(`/api/userJoin`, {user:this.user})
                return
            }
            if('id' in this.user && this.uid !== this.user.id){
                this.user['channel'] = this.channel
                console.log(this.user, 'SingleGameID')
                await axios.post(`/api/userJoin`, {user:this.user})
            }
        },
        insertUser(newUser) {
            this.user['name'] = newUser.name
            this.user['mobile'] = newUser.mobile
            this.user['id'] = Date.now()
            this.user['channel'] = this.channel
            this.user['avatar'] = ''
            sessionStorage.setItem("SingleGameUser", JSON.stringify(this.user));
            this.joinUser()
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
        gameStart: function () {
            this.sqo = true
            let ids = this.users.map(u => u.id)
            let gd = {channel: this.channel, gameStart: 1, uid: ids, id:this.challenge.id, users:this.users,host_id:this.uid}
            console.log(gd);
            axios.post(`/api/gameStart`, gd)
                .then(res => {
                    this.share = res.data
                    this.game_start = 1
                    this.screen.waiting = 0
                    this.showQuestionOptions(this.questions[0].fileType)
                })
            // this.QuestionTimer()
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
            this.shortAnswer = null
            this.answered = 1
            this.right_wrong = rw
            this.gamedata['uid'] = this.user.id
            this.gamedata['channel'] = this.channel
            this.gamedata['name'] = this.user.name
            this.gamedata['question'] = this.tbe(this.questions[this.qid].bd_question_text, this.questions[this.qid].question_text, this.user.lang)
            this.gamedata['answer'] = this.getCorrectAnswertext()
            this.gamedata['selected'] = a
            this.gamedata['isCorrect'] = rw == 1? Math.floor(this.progress): 0
            let clone = {...this.gamedata}
            this.questionInit()
            console.log('this.questionInit() call.........')
            axios.post(`/api/questionClick`, clone)
                .then(res => {
                    this.resultScreen();
                })
            this.answered_user_data.push(clone)
            this.screen.loading = true
            this.showOption = false
            this.waitForOption = 'Processing'
        },
        getCorrectAnswertext(){
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
            // console.log('resultScreen')
            this.questionInit()
            this.getResult() //Sorting this.results
            this.countDown()
            if(this.qid+1 == this.questions.length){
                console.log('......resultScreen')
                this.quizEnd()
            } else {
                console.log('resultScreen preventClick True')
                if(this.isHost()) {
                    this.preventClick = true
                    this.qid ++
                    this.current = this.questions[this.qid].id
                    let next = { channel: this.channel, qid: this.qid, qtime:this.question_time }
                    axios.post(`/api/nextQuestion`, next).then(() => {
                        this.showQuestionOptions(this.questions[this.qid].fileType)
                    })

                } else{
                    this.screen.resultWaiting = 1
                }
            }
        },
        QuestionTimer(){
            if(this.qid == this.questions.length) return
            if(this.av == false) return
            let pdec = 100 / (5 * this.qt.time);
            // console.log('pdec', pdec)
            this.preventClick = false
            this.qt.timer =
                setInterval(() => {
                    // console.log('this.qt.time', this.qt.time)
                    if(this.qt.time <= 0){
                        this.questionInit();
                        this.checkAnswer(this.qid, 'Not Answered', 0);
                        // this.resultScreen();
                    }
                    else{
                        this.qt.ms ++
                        this.progress -= pdec

                        if(this.qt.ms == 5){
                            this.qt.time --
                            this.qt.ms=0
                        }

                    }

                }, 200);
        },
        countDown(){
            // console.log('countDown')
            if(this.counter <= 0){
                // this.questionInit()
                this.qid ++
                this.current = this.questions[this.qid].id
                this.showQuestionOptions(null)
                // this.QuestionTimer()
            } else {
                this.counter --
            }
        },
        getResult(){
            // console.log('getResult')
            this.results = []
            this.users.forEach(user => {
                let score = 0;
                let correct = 0;
                let incorrect = 0;
                this.answered_user_data
                    .filter(f => f.uid === user.id)
                    .map(u => {
                        score += u.isCorrect
                        if(u.isCorrect > 0){
                            correct += 1
                        } else{
                            incorrect += 1
                        }
                    })

                this.results.push({id:user.id, name:user.name, score:score, correct:correct, incorrect:incorrect})

            })
            this.results.sort((a, b) => b.score - a.score)
        },
        winner(){
            this.user_ranking = this.results.findIndex(w => w.id == this.user.id)
            this.questionInit()
            this.screen.result = 1
            this.game_start = 0
            if(this.user_ranking === -1) return

            let user_score = this.results[this.user_ranking].score
            this.perform = Math.round((user_score / ((this.qid +1) * 100)) * 100)
            this.pm = this.gmsg.filter(gm => gm.perform_status >= this.perform)
                .reduce(function (prev, curr) {
                    return prev.perform_status < curr.perform_status ? prev : curr;
                });

            if(this.user_ranking == 0 ){
                confetti({
                    zIndex:999999,
                    particleCount: 200,
                    spread: 120,
                    origin: { y: 0.6 }
                });
            }
            // else{
            //     var colors = ['#bb0000', '#ffffff'];
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
            console.log(['user', user])
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
                return 'animate__animated animate__lightSpeedInRight animate__delay-' + index  +'s';
            }

            return '';
        },
        showQuestionOptions (question) {
            // console.log('showQuestionOptions', question)
            let timeout = 3000;
            if(this.challenge.option_view_time != 0) {
                timeout = 3500; // this.quiz.quiz_time * 1000
            }
            if(question == null || question == 'image') {
                clearInterval(this.qt.timer);
                setTimeout(() => {
                    // this.sqo = true
                    this.preventClick = false
                    this.QuestionTimer()
                }, timeout)
            }
        },
        quizEnd () {
            // axios.post(`/api/gameEndUser`, {'channel': this.channel})
            let gameResult = { result: this.results, 'share_id': this.share.id, 'channel': this.channel }
            axios.post(`/api/challengeResult`, gameResult).then(res => {
                this.end_user ++
                console.log('users + end user', this.users.length, this.end_user)
                if(this.users.length <= this.end_user) {
                    this.winner()
                    return
                } else {
                    this.screen.resultWaiting = 1;
                    return
                }
            })

        },
        // isHost() {
        //     return this.uid === this.user.id
        // },
        nextQuestion() {
            this.preventClick = true
            this.qid ++
            this.current = this.questions[this.qid].id
            this.screen.resultWaiting = 0
            this.showQuestionOptions(this.questions[this.qid].fileType)
            // this.showQuestionOptions(null)
        },
        // nextQuestion(){
        //     if(this.qid + 1 == this.questions.length){
        //         clearInterval(this.timer);
        //         this.winner()
        //         return
        //     }
        //
        //     this.qid ++
        //     this.current = this.questions[this.qid].id
        //     this.fillPie()
        //     this.answered_group = []
        //     let next = { channel: this.channel, qid: this.qid,qtime:this.question_time }
        //     axios.post(`/api/nextQuestion`, next)
        // },
    },

    computed: {

        // channel(){
        //     return `challenge.${this.challenge.id}.${this.uid}`
        // },
        // progressClass(){
        //     return this.progress > 66? 'bg-success': this.progress > 33? 'bg-info': 'bg-danger'
        // },
        // progressWidth(){
        //     return {'width':this.progress + '%', }
        // }
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

<template>
    <div>
        <div class="container" v-if="screen.resultWaiting">
            <div class="winner">
                <!--                <h2 class="text-center">Quiz Game Over</h2>-->
                <h3>Your exam is submitted. </h3>
                <a class="btn btn-outline-primary btn-sm" :href="'/exams'">Go Exam List Page</a>
            </div>
        </div>
        <div class="container" v-else>
            <div :class="{'preventClick': preventClick}"></div>
            <div class="row justify-content-center" >
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
                            <img v-if="question.fileType == 'image'" class="image w-100 mt-1 rounded img-thumbnail"
                                 :src="'/' + question.question_file_link" style="max-height:70vh" alt="">
                            <video
                                v-if="question.fileType == 'video'"
                                @ended="onEnd()"
                                @play="onStart()"
                                class="image w-100 mt-1 rounded img-thumbnail"
                                autoplay>
                                <source :src="'/'+ question.question_file_link" type="video/mp4">
                            </video>
                            <div class="audio" v-if="question.fileType == 'audio'">
                                <audio
                                    @ended="onEnd()"
                                    @play="onStart()"
                                    controls
                                    autoplay>
                                    <source :src="'/'+ question.question_file_link" type="audio/mpeg">
                                </audio>
                                <div id="ar"></div>
                            </div>
                            <!--                        <img v-if="question.more_info_link" class="image w-100 mt-1 rounded" :src="question.more_info_link" style="max-height:70vh">-->
                            <!--                        <img v-if="question.question_file_link" class="image w-100 mt-1 rounded img-thumbnail"-->
                            <!--                             :src="'/' + question.question_file_link" style="max-height:70vh" alt="">-->
                            <!--                        <p v-html="tbe(question.bd_question_text, question.question_text, user.lang)" class="my-2 font-bold"></p>-->
                            <div v-show="av">
                                <div class="card">
                                    <div class="p-3">
                                        <div class="d-flex flex-row align-items-center question-title">
                                            <h3 class="text-danger">Q.</h3>
                                            <h5 class="mt-1 ml-2 font-weight-bold">{{ tbe(question.bd_question_text, question.question_text, user.lang) }}</h5>
                                        </div>
                                    </div>
                                </div>

                                <!--                            <div :class="{'row justify-content-center justify-item-center': imageOption(question.options)}">-->
                                <!--                                <div v-for="(option, i) in question.options" :class="{'col-6':option.flag == 'img'}">-->
                                <!--                                    <ul class="list-group" v-if="option.flag != 'img'" :class="getOptionClass(i, challenge.option_view_time)">-->
                                <!--                                        <li @click="checkAnswer(question.id, tbe(option.bd_option, option.option, user.lang), option.correct)"-->
                                <!--                                            class="list-group-item list-group-item-action cursor my-1"-->
                                <!--                                            v-html="tbe(option.bd_option, option.option, user.lang)" >-->

                                <!--                                        </li>-->
                                <!--                                    </ul>-->
                                <!--                                    <div v-else @click="checkAnswer(question.id, option.img_link, option.correct)" class="cursor my-1 imageDiv" :class="getOptionClass(i, challenge.option_view_time)">-->
                                <!--                                        <img  class="imageOption image mt-1 rounded img-thumbnail" :src="'/'+ option.img_link" alt="">-->
                                <!--                                    </div>-->
                                <!--                                </div>-->
                                <!--                            </div>-->

                                <div v-if="sqo" class="animate__animated animate__zoomIn animate__faster d-flex flex-wrap"
                                     :class="{'row justify-content-center justify-item-center': imageOption(question.options)}"
                                >
                                    <div v-for="(option, i) in question.options" class="col-md-6 px-1"
                                         :class="[option.flag == 'img' ? 'col-6' : ' col-12' ]"
                                    >
                                        <div class="list-group" v-if="option.flag != 'img'"
                                             :class="getOptionClass(i, challenge.option_view_time)"
                                        >
                                        <span @click="checkAnswer(question, tbe(option.bd_option, option.option, user.lang), option.correct)"
                                              class="list-group-item list-group-item-action cursor my-1"
                                              v-html="tbe(option.bd_option, option.option, user.lang)" >

                                        </span>
                                        </div>
                                        <div
                                            v-else
                                            @click="checkAnswer(question, option.img_link, option.correct)"
                                            class="cursor my-1 imageDiv"
                                            :class="getOptionClass(i, challenge.option_view_time)"
                                        >
                                            <img  class="imageOption mt-1 rounded img-thumbnail" :src="'/'+ option.img_link" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--                        <ul class="list-group" v-for="option in question.options">-->
                            <!--                            <li @click="checkAnswer(question.id, option.option, option.correct)"-->
                            <!--                                class="list-group-item list-group-item-action cursor my-1">-->
                            <!--                                <span v-html="tbe(option.bd_option, option.option, user.lang)" v-if="option.flag != 'img'"></span>-->
                            <!--                            </li>-->
                            <!--                            <li @click="checkAnswer(question.id, option.img_link, option.correct)"-->
                            <!--                                class="list-group-item list-group-item-action cursor my-1" v-if="option.flag == 'img'" >-->
                            <!--                                <img  class="image mt-1 rounded img-thumbnail"-->
                            <!--                                      :src="'/'+ option.img_link" style="max-height:15vh;width:200px" alt="">-->

                            <!--                            </li>-->
                            <!--                        </ul>-->
                        </div>
                    </div>
                </div>
                <div class="col-md-4" >
                    <div class="card shadow" >
                        <div class="p-3 border-bottom">
                            {{user.lang == 'gb' ?'Exam Details' : 'পরীক্ষার বিবরণ'}}
                            <!--                        <a @click="gameResetCall" v-if="user.id == uid && qid > 0 " class="btn btn-sm btn-danger float-right">RESET</a>-->
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between flex-column">
                                <span class="p-1"> {{ user.lang == 'gb' ? 'Exam Name' : 'পরীক্ষার নাম' }} : {{ tbe(challenge.exam_bn,challenge.exam_en,user.lang) }}</span>
                                <span class="p-1 "> {{ user.lang == 'gb' ? 'Total Time' : 'মোট সময়' }} : {{ totalTime() }}</span>
                                <span class="p-1 ">{{user.lang == 'gb' ? 'Time per question' : 'প্রতি প্রশ্নের সময়'}} : {{ perQTime() }}</span>
                                <span class="p-1 ">{{user.lang == 'gb' ? 'Marks per question' : 'প্রতি প্রশ্নের নম্বর'}} : {{ user.lang == 'gb'? challenge.each_question_mark : q2bNumber(challenge.each_question_mark) }}</span>
                                <span class="text-danger p-1 ">{{user.lang == 'gb' ? 'Negative mark' : 'নেগেটিভ নম্বর'}} : <span class="font-weight-bold">{{ user.lang == 'gb' ? negativeMark() :  q2bNumber(negativeMark())}}</span> </span>
                                <span class="p-1 "> {{ user.lang == 'gb' ? 'Total Number' : 'মোট নম্বর' }} : {{ user.lang == 'gb' ? questions.length * challenge.each_question_mark : q2bNumber(questions.length * challenge.each_question_mark)}}</span>
                            </div>
                        </div>
                        <!--                    <div class="card-body" v-if="results.length>0">-->
                        <!--                        <transition-group name="slide-up" class="list-group" tag="ul" appear>-->
                        <!--                            <li class="list-group-item user-list"-->
                        <!--                                v-for="(res, index) in results" :key="res.id"-->
                        <!--                                :class="{active : res.id == user.id}"-->
                        <!--                            >-->
                        <!--                                <span v-html="getMedel(index)"></span>-->
                        <!--                                {{ res.name }} <span class="badge badge-dark float-right mt-1">{{ res.score}}</span>-->
                        <!--                            </li>-->
                        <!--                        </transition-group>-->
                        <!--                    </div>-->
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

        props : ['challenge', 'uid', 'user', 'questions', 'gmsg','teams'],

        components: { waiting, result },

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
                av: true,
                sqo:false,
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
                preventClick: true

            };
        },

        // created(){
        //     Echo.channel(this.channel)
        //         .listen('GameStartEvent', (data) => {
        //             console.log(['GameStartEvent.............', data])
        //             this.share = data.share
        //             this.game_start = 1 // Game Start from Game Owner...
        //             this.screen.waiting = 0
        //             this.showQuestionOptions(null)
        //             this.sqo = true
        //             // this.QuestionTimer() // Set and Start QuestionTimer
        //
        //         })
        //         .listen('GameResetEvent', (data) => {
        //             console.log(['GameResetEvent.............', data])
        //             this.gameReset()
        //         })
        //         .listen('GameEndUserEvent', (data) => {
        //             console.log(['GameEndUserEvent.............', data])
        //             this.end_user ++
        //             if(this.users.length == this.end_user) {
        //                 this.winner()
        //             }
        //         })
        //         .listen('QuestionClickedEvent', (data) => {
        //             console.log('QuestionClickedEvent.............')
        //             this.answered_user_data.push(data)
        //             this.getResult()
        //         })
        //         .listen('KickUserEvent', (data) => {
        //             console.log('KickUserEvent.............')
        //             this.users = this.users.filter( u => u.id !== data.uid )
        //
        //             if(this.user.id == data.uid){
        //                 window.location.href = "http://quiz.test"
        //             }
        //
        //         });
        //
        // },
        // watch: {
        //     questions: {
        //         handler(newQuestion) {
        //             console.log('newQuestion', newQuestion[0])
        //             this.showQuestionOptions(newQuestion[0].fileType, '');
        //         },
        //         // force eager callback execution
        //         immediate: true
        //     }
        // },

        mounted() {
            // Echo.join(`challenge.${this.challenge.id}.${this.uid}`)
            //     .here((users) => {
            //         this.users = users;
            //     })
            //     .joining((user) => {
            //         this.users.push(user);
            //         if(this.game_start){
            //             this.kickUser(user.id)
            //         }
            //     })
            //     .leaving((user) => {
            //         this.users = this.users.filter(u => u.id != user.id);
            //         console.log(`${user.name} leaving`);
            //     });

            this.gameStart()
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
            negativeMark(){
                return this.challenge.negative_mark > 0 ? (this.challenge.each_question_mark * this.challenge.negative_mark)/100 : 0
            },

            // preventNav(event) {
            //   if (!this.game_start) return;
            //   event.preventDefault();
            //   // Chrome requires returnValue to be set.
            //   event.returnValue = "";
            // },

            gameStart: function () {
                this.sqo = true
                let ids = this.users.map(u => u.id)
                let gd = {channel: this.channel, gameStart: 1, uid: ids, id:this.challenge.id, users:this.users,host_id:this.uid}
                console.log(gd);
                // this.share = res.data
                this.game_start = 1
                this.screen.waiting = 0
                this.showQuestionOptions(this.questions[0].fileType)
                // axios.post(`/api/gameStart`, gd)
                //     .then(res => {
                //         this.share = res.data
                //         this.game_start = 1
                //         this.screen.waiting = 0
                //         this.showQuestionOptions(this.questions[0].fileType)
                //     })
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
                this.answered = 1
                this.right_wrong = rw
                this.gamedata['id'] = q.id
                this.gamedata['option'] = q.options[0].flag == 'img' ? null : a
                this.gamedata['correct'] = rw
                this.gamedata['question'] = this.tbe(q.bd_question_text, q.question_text, this.user.lang)
                this.gamedata['correctOption'] = rw == 0  ? this.tbe(q.options.find(o => o.correct == 1).bd_option , q.options.find(o => o.correct == 1).option, this.user.lang) : null
                this.gamedata['img_link'] = q.options[0].flag == 'img' ? a : null
                this.gamedata['correct_img_link'] = q.options[0].flag == 'img' ?  (rw == 0 ? q.options.find(o => o.correct == 1).img_link : null) : null
                let clone = {...this.gamedata}
                this.questionInit()
                console.log('this.questionInit() call.........')

                // axios.post(`/api/questionClick`, clone)
                //     .then(res => {
                //         this.resultScreen();
                //     })
                this.answered_user_data.push(clone)
                this.resultScreen();
                this.screen.loading = true
            },
            getCorrectAnswertext(){
                return this.questions[this.qid].options.find(o => o.correct == 1).option
            },
            resultScreen(){
                console.log('resultScreen')
                this.questionInit()
                this.getResult() //Sorting this.results
                this.countDown()
                if(this.qid+1 == this.questions.length){
                    console.log('......resultScreen')
                    // this.quizEnd()
                    this.submitExam()

                } else {
                    console.log('resultScreen preventClick True')
                    this.preventClick = true
                    this.qid ++
                    this.current = this.questions[this.qid].id
                    this.showQuestionOptions(null)
                }
            },
            QuestionTimer(){
                if(this.qid == this.questions.length){
                    this.submitExam()
                    return
                }
                let pdec = 100 / (5 * this.qt.time);
                console.log('pdec', pdec)
                this.preventClick = false
                this.qt.timer =
                    setInterval(() => {
                        // console.log('this.qt.time', this.qt.time)
                        if(this.qt.time <= 0){
                            this.questionInit();
                            // this.checkAnswer(this.qid, 'Not Answered', 0);
                            this.resultScreen();
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
                console.log('countDown')
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
                this.qt.time = 30
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
                let eb = {0: '০', 1: '১', 2: '২', 3: '৩', 4: '৪', 5: '৫', 6: '৬', 7: '৭', 8: '৮', 9: '৯', '.': '.'};
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
            imageOption(objArray){
                return  objArray.some(a => a.flag == 'img')
            },
            onEnd() {
                this.av = true
                this.showQuestionOptions(null)
            },
            onStart() {
                setTimeout(() => this.questionInit(), 1000)
                this.av = false
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
            showQuestionOptions (question) {
                console.log('showQuestionOptions', question)
                let timeout = 1000;
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
            submitExam(){
                const resultValue = {
                    'user_id': this.user.id,
                    'examination_id': this.challenge.id,
                    'results': this.answered_user_data
                }
                axios.post('/api/save-results', resultValue).then((res) => {
                    console.log(res, 'response from server')
                    this.screen.resultWaiting = 1
                })
            },
            totalTime(){
                let hasHours
                let hasMinutes
                let hasSeconds
                const hours = this.challenge.question_time > 3600 ? Math.floor(this.challenge.question_time/3600) : 0
                const minutes = Math.floor(this.challenge.question_time/60)
                const seconds = Math.floor(this.challenge.question_time % 60)
                console.log(hours, minutes, seconds , 'times...')
                if(this.user.lang == 'gb') {
                    // return hours + this.hourOrHours(hours) + ' ' + minutes + this.minuteOrMinutes(minutes) + ' ' + seconds + this.secondOrSeconds(seconds)
                    if(hours) {
                        hasHours = hours + this.hourOrHours(hours)
                    }
                    if (minutes) {
                        hasMinutes = minutes + this.minuteOrMinutes(minutes)
                    }
                    if (seconds) {
                        hasSeconds = seconds + this.secondOrSeconds(seconds)
                    }
                    return ( hasHours == undefined ? '' : hasHours ) + ( hasMinutes == undefined ? '' : hasMinutes ) + ( hasSeconds == undefined ? '' : hasSeconds )
                } else {
                    if(hours) {
                        hasHours = this.q2bNumber(hours) + ' ঘণ্টা'
                    }
                    if (minutes) {
                        hasMinutes = this.q2bNumber(minutes) + ' মিনিট'
                    }
                    if (seconds) {
                        hasSeconds = this.q2bNumber(seconds) + ' সেকেন্ড'
                    }
                    return ( hasHours == undefined ? '' : hasHours ) + ( hasMinutes == undefined ? '' : hasMinutes ) + ( hasSeconds == undefined ? '' : hasSeconds )
                }
            },
            hourOrHours(data){
                if (data > 1) {
                    return ' hours'
                }
                return ' hour'
            },
            minuteOrMinutes(data){
                if (data > 1) {
                    return ' minutes'
                }
                return ' minute'
            },
            secondOrSeconds(data){
                if (data > 1) {
                    return ' seconds'
                }
                return ' second'
            },
            perQTime(){
                let hasMinutes
                let hasSeconds
                const qTime = this.challenge.question_time/this.questions.length
                const minutes = Math.floor(qTime/60)
                const seconds = Math.floor(qTime % 60)
                if(this.user.lang == 'gb') {
                    if(minutes) {
                        hasMinutes =  minutes + this.minuteOrMinutes(minutes)
                    }
                    if (seconds) {
                        hasSeconds =  seconds + this.secondOrSeconds(seconds)
                    }
                    return ( hasMinutes == undefined ? '' : hasMinutes ) + ( hasSeconds == undefined ? '' : hasSeconds )
                } else {
                    if(minutes) {
                        hasMinutes =  this.q2bNumber(minutes) + ' মিনিট '
                    }
                    if (seconds) {
                        hasSeconds =  this.q2bNumber(seconds) + ' সেকেন্ড'
                    }
                    return ( hasMinutes == undefined ? '' : hasMinutes ) + ( hasSeconds == undefined ? '' : hasSeconds )
                }

            }
        },

        // methods: {
        //
        //     // preventNav(event) {
        //     //   if (!this.game_start) return;
        //     //   event.preventDefault();
        //     //   // Chrome requires returnValue to be set.
        //     //   event.returnValue = "";
        //     // },
        //
        //     gameStart: function () {
        //         this.sqo = true
        //         // let ids = this.users.map(u => u.id)
        //         // let gd = {channel: this.channel, gameStart: 1, uid: ids, id:this.challenge.id, users:this.users,host_id:this.uid}
        //         // console.log(gd);
        //         // axios.post(`/api/gameStart`, gd).then(res => this.share = res.data)
        //         this.game_start = 1
        //         this.screen.waiting = 0
        //         this.showQuestionOptions(this.questions[0].fileType)
        //         // this.QuestionTimer()
        //     },
        //     gameResetCall() {
        //         axios.post(`/api/gameReset`, {channel: this.channel }).then(res => console.log(res.data))
        //         this.gameReset()
        //     },
        //     gameReset(){
        //         this.questionInit()
        //         this.screen.waiting = 1
        //         this.answered_user_data = []
        //         this.results = []
        //         this.qid = 0
        //         this.gamedata = {}
        //         this.score = []
        //         this.user_ranking = null
        //         this.game_start = 0
        //         this.current = this.questions[this.qid].id
        //     },
        //     checkAnswer(q, a, rw){
        //         console.log(q, a, rw)
        //         this.answered = 1
        //         this.right_wrong = rw
        //         this.gamedata['id'] = q.id
        //         this.gamedata['option'] = q.options[0].flag == 'img' ? null : a
        //         this.gamedata['correct'] = rw
        //         this.gamedata['question'] = this.tbe(q.bd_question_text, q.question_text, this.user.lang)
        //         this.gamedata['correctOption'] = rw == 0  ? this.tbe(q.options.find(o => o.correct == 1).bd_option , q.options.find(o => o.correct == 1).option, this.user.lang) : null
        //         this.gamedata['img_link'] = q.options[0].flag == 'img' ? a : null
        //         this.gamedata['correct_img_link'] = q.options[0].flag == 'img' ?  (rw == 0 ? q.options.find(o => o.correct == 1).img_link : null) : null
        //             // axios.post(`/api/questionClick`, this.gamedata)
        //         let clone = {...this.gamedata}
        //         this.answered_user_data.push(clone)
        //         this.screen.loading = true
        //         this.resultScreen();
        //         this.showQuestionOptions(null)
        //         // if(this.qid+1 == this.questions.length) {
        //         //     let gr = {result: this.results, 'share_id': this.share.id}
        //         //     axios.post(`/api/challengeResult`, gr).then(res => console.log(res.data))
        //         // } else {
        //         //     this.showQuestionOptions(null)
        //         // }
        //
        //     },
        //     getCorrectAnswertext(){
        //         return this.questions[this.qid].options.find(o => o.correct == 1).option
        //     },
        //     resultScreen(){
        //         console.log('resultScreen')
        //         this.getResult() //Sorting this.results
        //         this.countDown()
        //         this.questionInit()
        //         if(this.qid+1 == this.questions.length){
        //             // axios.post(`/api/gameEndUser`, {'channel': this.channel})
        //             // this.end_user ++
        //             // if(this.users.length == this.end_user) {
        //             //     this.winner()
        //             //     return
        //             // }
        //             this.screen.resultWaiting = 1;
        //             return
        //         }
        //         this.qid ++
        //         this.current = this.questions[this.qid].id
        //         this.QuestionTimer()
        //         // this.showQuestionOptions(null)
        //     },
        //     QuestionTimer(){
        //         let pdec = 100 / (5 * this.qt.time);
        //         console.log('QuestionTimer started')
        //         this.qt.timer =
        //             setInterval(() => {
        //                 if(this.qt.time == 0){
        //                     if(!this.answered){
        //                         this.checkAnswer(this.qid, 'Not Answered', 0);
        //                     }
        //                     this.questionInit();
        //                     this.resultScreen();
        //                 }
        //                 else{
        //                     this.qt.ms ++
        //                     this.progress -= pdec
        //
        //                     if(this.qt.ms == 5){
        //                         this.qt.time --
        //                         this.qt.ms=0
        //                     }
        //
        //                 }
        //
        //             }, 200);
        //     },
        //     countDown(){
        //         console.log('countDown')
        //         if(this.counter == 0){
        //
        //             this.questionInit()
        //
        //             if(this.qid+1 == this.questions.length){
        //                 this.winner()
        //                 this.counter =0
        //                 return
        //             }
        //
        //             this.qid ++
        //             this.current = this.questions[this.qid].id
        //
        //             this.QuestionTimer()
        //         }
        //         this.counter --
        //     },
        //     getResult(){
        //         console.log('getResult')
        //         this.results = []
        //         this.users.forEach(user => {
        //             let score = 0;
        //             this.answered_user_data
        //                 .filter(f => f.uid === user.id)
        //                 .map(u => {
        //                     score += u.isCorrect
        //                 })
        //
        //             this.results.push({id:user.id, name:user.name, score:score})
        //
        //         })
        //         this.results.sort((a, b) => b.score - a.score)
        //     },
        //     winner(){
        //         this.user_ranking = this.results.findIndex(w => w.id == this.user.id)
        //         let user_score = this.results[this.user_ranking].score
        //         this.perform = Math.round((user_score / ((this.qid +1) * 100)) * 100)
        //         this.pm = this.gmsg.filter(gm => gm.perform_status >= this.perform)
        //             .reduce(function (prev, curr) {
        //                 return prev.perform_status < curr.perform_status ? prev : curr;
        //             });
        //         this.questionInit()
        //         this.screen.result = 1
        //         this.screen.winner = 1
        //         this.game_start = 0
        //         if(this.user_ranking == 0 ){
        //             confetti({
        //                 zIndex:999999,
        //                 particleCount: 200,
        //                 spread: 120,
        //                 origin: { y: 0.6 }
        //             });
        //         }
        //         else{
        //             var colors = ['#bb0000', '#ffffff'];
        //
        //             confetti({
        //                 zIndex:999999,
        //                 particleCount: 100,
        //                 angle: 60,
        //                 spread: 55,
        //                 origin: { x: 0 },
        //                 colors: colors
        //             });
        //             confetti({
        //                 zIndex:999999,
        //                 particleCount: 100,
        //                 angle: 120,
        //                 spread: 55,
        //                 origin: { x: 1 },
        //                 colors: colors
        //             });
        //
        //         }
        //     },
        //     externalJS(){
        //         let confetti = document.createElement('script')
        //         confetti.setAttribute('src', 'https://cdn.jsdelivr.net/npm/canvas-confetti@1.3.0/dist/confetti.browser.min.js')
        //         document.head.appendChild(confetti)
        //     },
        //     kickUser(id){
        //         if(id != this.uid){
        //
        //             this.users = this.users.filter( u => u.id !== id )
        //
        //             let channelUser = { channel: this.channel, uid:id }
        //
        //             axios.post(`/api/kickUser`, channelUser)
        //
        //         }
        //
        //     },
        //     questionInit(){
        //         clearInterval(this.timer)
        //         clearInterval(this.qt.timer)
        //         this.qt.ms = 0
        //         this.qt.time = 50
        //         this.progress = 100
        //         this.answered = 0
        //         this.counter = 2
        //         this.screen.waiting = 0
        //         this.screen.loading = 0
        //         this.screen.result = 0
        //         this.screen.winner = 0
        //     },
        //     gameStarted(user){
        //         console.log(['user', user])
        //     },
        //     q2bNumber(numb) {
        //         let numbString = numb.toString();
        //         let bn = ''
        //         let eb = {0: '০', 1: '১', 2: '২', 3: '৩', 4: '৪', 5: '৫', 6: '৬', 7: '৭', 8: '৮', 9: '৯'};
        //         [...numbString].forEach(n => bn += eb[n])
        //         return bn
        //     },
        //     tbe(b, e, l) {
        //         if(b !== null && e !== null){
        //             if(l === 'bd') return b;
        //             return e;
        //         }
        //         else if(b !== null && e === null) return b;
        //         else if(b === null && e !== null) return e;
        //         return b;
        //     },
        //     qne2b(q, qn, l) {
        //         if (l === 'gb')
        //             return `Question ${q + 1} of ${qn} `;
        //         return `প্রশ্ন ${this.q2bNumber(qn)} এর ${this.q2bNumber(q + 1)} `;
        //     },
        //     getUrl (path) {
        //         return location.origin +'/'+ path
        //     },
        //     getShareLink(path){
        //         console.log(['urlencode', encodeURI(this.getUrl(path))]);
        //         return 'https://www.facebook.com/plugins/share_button.php?href=' + encodeURI(this.getUrl(path)) + '&layout=button&size=large&appId=1086594171698024&width=77&height=28'
        //     },
        //     getMedel(index){
        //         if(index == 0) return '<i class="fas fa-award fa-lg" style="color: gold"></i>'
        //         if(index == 1) return '<i class="fas fa-award" style="color: silver"></i>'
        //         if(index == 2) return '<i class="fas fa-award fa-sm" style="color: #CD7F32"></i>'
        //         return '';
        //     },
        //     waitingResult(){
        //         return 'waiting-result';
        //     },
        //     imageOption(objArray){
        //        return  objArray.some(a => a.flag == 'img')
        //     },
        //     onEnd() {
        //         this.av = true
        //         this.QuestionTimer()
        //         this.showQuestionOptions(null)
        //     },
        //     onStart() {
        //         this.av = false
        //         clearInterval(this.qt.timer);
        //     },
        //     getOptionClass (index, qtime) {
        //         if(qtime > 0){
        //             if(index == 0) {
        //                 return 'animate__animated animate__lightSpeedInRight';
        //             }
        //             return 'animate__animated animate__lightSpeedInRight animate__delay-' + index +'s';
        //         }
        //
        //         return '';
        //     },
        //     showQuestionOptions (question) {
        //         let timeout = 0;
        //         if(this.challenge.option_view_time != 0) {
        //             timeout = 3000; // this.quiz.quiz_time * 1000
        //         }
        //         if(question == null || question == 'image') {
        //             clearInterval(this.qt.timer);
        //             setTimeout(() => {
        //                 // this.sqo = true
        //                 this.QuestionTimer()
        //             }, timeout)
        //         }
        //     },
        //     totalTime(){
        //         let hasHours
        //         let hasMinutes
        //         let hasSeconds
        //         const hours = this.challenge.question_time > 3600 ? Math.floor(this.challenge.question_time/3600) : 0
        //         const minutes = Math.floor(this.challenge.question_time/60)
        //         const seconds = Math.floor(this.challenge.question_time % 60)
        //         console.log(hours, minutes, seconds , 'times...')
        //         if(this.user.lang == 'gb') {
        //             // return hours + this.hourOrHours(hours) + ' ' + minutes + this.minuteOrMinutes(minutes) + ' ' + seconds + this.secondOrSeconds(seconds)
        //             if(hours) {
        //                 hasHours = hours + this.hourOrHours(hours)
        //             }
        //             if (minutes) {
        //                 hasMinutes = minutes + this.minuteOrMinutes(minutes)
        //             }
        //             if (seconds) {
        //                 hasSeconds = seconds + this.secondOrSeconds(seconds)
        //             }
        //             return ( hasHours == undefined ? '' : hasHours ) + ( hasMinutes == undefined ? '' : hasMinutes ) + ( hasSeconds == undefined ? '' : hasSeconds )
        //         } else {
        //             if(hours) {
        //                 hasHours = this.q2bNumber(hours) + ' ঘণ্টা'
        //             }
        //             if (minutes) {
        //                 hasMinutes = this.q2bNumber(minutes) + ' মিনিট'
        //             }
        //             if (seconds) {
        //                 hasSeconds = this.q2bNumber(seconds) + ' সেকেন্ড'
        //             }
        //             return ( hasHours == undefined ? '' : hasHours ) + ( hasMinutes == undefined ? '' : hasMinutes ) + ( hasSeconds == undefined ? '' : hasSeconds )
        //         }
        //     },
        //     hourOrHours(data){
        //         if (data > 1) {
        //             return ' hours'
        //         }
        //         return ' hour'
        //     },
        //     minuteOrMinutes(data){
        //         if (data > 1) {
        //             return ' minutes'
        //         }
        //         return ' minute'
        //     },
        //     secondOrSeconds(data){
        //         if (data > 1) {
        //             return ' seconds'
        //         }
        //         return ' second'
        //     },
        //     perQTime(){
        //         let hasMinutes
        //         let hasSeconds
        //         const qTime = this.challenge.question_time/this.questions.length
        //         const minutes = Math.floor(qTime/60)
        //         const seconds = Math.floor(qTime % 60)
        //         if(this.user.lang == 'gb') {
        //             if(minutes) {
        //                 hasMinutes =  minutes + this.minuteOrMinutes(minutes)
        //             }
        //             if (seconds) {
        //                 hasSeconds =  seconds + this.secondOrSeconds(seconds)
        //             }
        //             return ( hasMinutes == undefined ? '' : hasMinutes ) + ( hasSeconds == undefined ? '' : hasSeconds )
        //         } else {
        //             if(minutes) {
        //                 hasMinutes =  this.q2bNumber(minutes) + ' মিনিট'
        //             }
        //             if (seconds) {
        //                 hasSeconds =  this.q2bNumber(seconds) + ' সেকেন্ড'
        //             }
        //             return ( hasMinutes == undefined ? '' : hasMinutes ) + ( hasSeconds == undefined ? '' : hasSeconds )
        //         }
        //
        //     }
        // },

        computed: {
            // channel(){
            //     return `challenge.${this.challenge.id}.${this.uid}`
            // },
            progressClass(){
                return this.progress > 66? 'bg-success': this.progress > 33? 'bg-info': 'bg-danger'
            },
            progressWidth(){
                return {'width':this.progress + '%', }
            }
        }
    };
</script>
<style>
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

    @media screen and (min-width: 480px) {
        .imageOption {
            height: 170px;
            width: 100%;
        }
    }
</style>

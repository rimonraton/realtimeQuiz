<template>
    <div class="container">
        <div class="winner" v-if="winner_screen">
            <h2 class="text-center">Quiz Game Over</h2>
            <h3>{{ pm.perform_message }} </h3>
            <resultdetails :results='results' :ws="winner_screen" :correct="correct" :wrong="wrong"/>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card my-4" v-for="question in questions" v-if="question.id === current" >
                    <!-- <transition name="fade" mode="out-in"> -->
                    <div class="card-body animate__animated animate__backInRight animate__faster" :key="qid">
                        <span class="q_num text-right text-muted">
                            {{ qne2b(qid, questions.length, user.lang) }}
                        </span>
<!--                        <div>-->
<!--                            {{getImageVideoAudio(question)}}-->
                            <img v-if="question.fileType == 'image'" class="image w-50 mt-1 rounded img-thumbnail"
                                 :src="'/' + question.question_file_link" style="max-height:50vh" alt="">
                            <video
                                v-if="question.fileType == 'video'"
                                @ended="onEnd()"
                                @play="onStart()"
                                class="image w-100 mt-1 rounded img-thumbnail"
                                autoplay
                                controls
                            >
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
                                <div ></div>
                            </div>
<!--                        </div>-->
                        <div v-show="av">
<!--                            <p class="my-1 font-bold"-->
<!--                               v-html="tbe(question.bd_question_text, question.question_text, user.lang)">-->
<!--                            </p>-->
<!--                            <div class="card shadow-1" v-html="tbe(question.bd_question_text, question.question_text, user.lang)"></div>-->
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex flex-row align-items-center question-title">
                                        <h3 class="text-danger">Q.</h3>
                                        <h5 class="mt-1 ml-2">{{ tbe(question.bd_question_text, question.question_text, user.lang) }}</h5>
                                    </div>
<!--                                   <h3 class="text-danger">Q. </h3> {{ tbe(question.bd_question_text, question.question_text, user.lang) }}-->
                                </div>
                            </div>
                            <div v-if="sqo" class="animate__animated animate__zoomIn animate__faster"
                                :class="{'row justify-content-center justify-item-center': imageOption(question.options)}"
                            >
                                <div v-for="(option, i) in question.options" :class="{'col-6':option.flag == 'img'}">
                                    <ul class="list-group" v-if="option.flag != 'img'">
                                        <li @click="checkAnswer(question.id, tbe(option.bd_option, option.option, user.lang), option.correct)"
                                            class="list-group-item list-group-item-action cursor my-1"
                                            v-html="tbe(option.bd_option, option.option, user.lang)" >

                                        </li>

    <!--                                    <li @click="checkAnswer(question.id, option.img_link, option.correct)"-->
    <!--                                        class="list-group-item list-group-item-action cursor my-1" v-if="option.flag == 'img'" >-->
    <!--                                        <img  class="image mt-1 rounded img-thumbnail"-->
    <!--                                              :src="'/'+ option.img_link" style="max-height:15vh;width:200px" alt="">-->

    <!--                                    </li>-->

                                    </ul>
                                    <div v-else @click="checkAnswer(question.id, option.img_link, option.correct)" class="cursor my-1 imageDiv">
                                        <img  class="image mt-1 rounded img-thumbnail" :src="'/'+ option.img_link" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- </transition>                  -->
                </div>
            </div>
            <div class="col-md-5">
                <div class="card my-4">
                    <div class="card-header text-center card-title py-1">
                        <strong>{{ __('games.information') }}</strong>
                        <div class="btn btn-sm btn-warning float-right"
                             v-if="qid > 0"
                             @click="reloadPage">Reset
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group text-dark">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ __('games.time_taken') }}
                                <span class="badge badge-light badge-pill">
                            {{ minutes }}: {{ (seconds > 9) ? seconds : ('0' + seconds) }}
                        </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ __('games.correct') }}
                                <span class="badge badge-success badge-pill">{{ correct }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ __('games.wrong') }}
                                <span class="badge badge-danger badge-pill">{{ wrong }}</span>
                            </li>
                            <li v-if="qid > 0"
                                class="list-group-item d-flex justify-content-between align-items-center p-0">
                                <resultdetails :results='results' :ws="winner_screen"/>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import resultdetails from '../helper/practice/resultdetails'


export default {
    props: ['id', 'user', 'questions', 'gmsg'],
    components: {resultdetails},

    data() {
        return {
            results: [],
            current: 0,
            qid: 0,
            winner_screen: false,
            gamedata: {},
            timer: null,
            minutes: 0,
            seconds: 0,
            correct: 0,
            wrong: 0,
            answer_seconds: 0,
            answer_minutes: 0,
            mc: 0,
            pm: '',
            av: true,
            sqo: false
        };
    },
    watch: {
        questions: {
            handler(newQuestion) {
                console.log('newQuestion', newQuestion[0])
                this.showQuestionOptions(newQuestion[0].fileType);
            },
            // force eager callback execution
            immediate: true
        }
    },

    mounted() {
        // console.log('timer start')
        this.current = this.questions[this.qid].id

        let confetti = document.createElement('script')
        confetti.setAttribute('src', 'https://cdn.jsdelivr.net/npm/canvas-confetti@1.3.0/dist/confetti.browser.min.js')
        document.head.appendChild(confetti)
        // this.startTimer()
    },
    methods: {
        startTimer() {
            console.log('timer check av')

            if(this.av == true) {
                console.log('timer start')
                this.timer = setInterval(() => {

                    this.seconds++
                    if (this.seconds > 59) {
                        this.seconds = 0
                        this.minutes++
                    }

                    this.answer_seconds++
                    if (this.answer_seconds > 59) {
                        this.answer_seconds = 0
                        this.answer_minutes++
                    }
                    this.sqo = true
                }, 1000);

            }
        },
        checkAnswer: function (q, a, rw) {
            this.right_wrong = rw
            this.gamedata['id'] = this.qid + 1
            this.gamedata['question'] = this.tbe(this.questions[this.qid].bd_question_text,this.questions[this.qid].question_text,this.user.lang)
            this.gamedata['answer'] = this.getCorrectAnswertext()
            this.gamedata['selected'] = a
            this.gamedata['isCorrect'] = rw
            this.gamedata['time'] = this.answer_minutes + ':' + this.answer_seconds
            rw == 1 ? this.correct++ : this.wrong++

            let clone = {...this.gamedata}
            this.results.push(clone)
            this.answer_minutes = 0
            this.answer_seconds = 0

            if (this.qid + 1 === this.questions.length) {
                clearInterval(this.timer);
                this.winner()
                return
            }

            this.qid++
            this.current = this.questions[this.qid].id
            this.sqo = false
            this.showQuestionOptions()
        },

        getCorrectAnswertext() {
            let qco = this.questions[this.qid].options.find(o => o.correct == 1)
            if(qco.flag=='img')
                return qco.img_link;
            return this.tbe(qco.bd_option, qco.option, this.user.lang)
        },

        winner: function () {
            let perform = this.correct / this.questions.length * 100

            this.pm = this.gmsg.filter(g => g.perform_status >= perform)
                .reduce(function (prev, curr) {
                    return prev.perform_status < curr.perform_status ? prev : curr;
                });
            this.winner_screen = 1
            if (perform === 100) {
                confetti({
                    zIndex: 999999, particleCount: 200, spread: 120, origin: {y: 0.6}
                });
            }
            if (perform >= 75) {
                let colors = ['#bb0000', '#0AE84E'];

                confetti({
                    zIndex: 999999, particleCount: 100, angle: 60, spread: 55, origin: {x: 0}, colors: colors
                });
                confetti({
                    zIndex: 999999, particleCount: 100, angle: 120, spread: 55, origin: {x: 1}, colors: colors
                });
            }
            if (!this.user.log > 0) {
                this.saveQuiz();
            }

        },
        saveQuiz() {
            let gd = {
                user_id: this.user.id,
                game_id: this.gmsg[0].game_id,
                quiz_id: this.id,
                answers: JSON.stringify(this.results),
                start_at: this.user.start_at,
                pm_id: this.pm.id,
            }
            axios.post(`/api/savePractice`, gd).then(response => console.log(response.data))
        },
        reloadPage() {
            window.location.reload()
        },
        tbe(b, e, l) {
            // console.log(b,e,l)
            return l === 'bd' ? (b !== null ? b : e) : (e !== null ? e : b)
        },
        qne2b(q, qn, l) {
            if (l === 'gb')
                return `Question ${q + 1} of ${qn} `;
            return `প্রশ্ন ${this.q2bNumber(qn)} এর ${this.q2bNumber(q + 1)} `;
        },
        onEnd() {
            console.log('onEnded....')
            this.av = true
            this.showQuestionOptions(null)
        },
        onStart() {
            console.log('onStart....')
            clearInterval(this.timer);
            this.av = false
            this.sqo = false
        },
        q2bNumber(numb) {
            let numbString = numb.toString();
            let bn = ''
            let eb = {0: '০', 1: '১', 2: '২', 3: '৩', 4: '৪', 5: '৫', 6: '৬', 7: '৭', 8: '৮', 9: '৯'};
            [...numbString].forEach(n => bn += eb[n])
            return bn
        },
        imageOption(objArray){
            const data = objArray.some(a => a.flag == 'img')
           // const data = objArray.find(a => a.flag == 'img');
           return data
        },
        showQuestionOptions (question) {
            clearInterval(this.timer);
            if(question == null || question == 'image') {
                setTimeout(() => {
                    console.log('setTimeout startTimer')
                    this.startTimer()
                }, 3000)
            }
        }
    }
}
</script>
<style>
#ar {
    position: absolute;
    background: transparent;
    width: 60%;
    height: 50px;
    top: 18px;
}
.shadow-1:before {
    content: "";
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    width: inherit;
    height: inherit;
    z-index: -2;
    box-sizing: border-box;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.13);
}

.shadow-1:after {
    content: "";
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    width: inherit;
    height: inherit;
    z-index: -2;
    box-sizing: border-box;
    box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.08);
}
.imageDiv :hover{
    background-color: #38c172
}
</style>


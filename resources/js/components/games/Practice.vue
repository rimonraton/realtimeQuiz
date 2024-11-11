<template>
    <div class="container mt-3 mt-md-0">
        <div class="winner" v-if="winner_screen">
          <div class="d-flex flex-column justify-content-center w-100">
            <div class="text-center ">

              <img v-if="place == 1" src="/img/quiz/position/1st.gif" alt="" style="width: 100px; margin-right: 15px;">
              <img v-if="place == 2" src="/img/quiz/position/2nd.gif" alt="" style="width: 100px; margin-right: 15px;">
              <img v-if="place == 3" src="/img/quiz/position/3rd.gif" alt="" style="width: 100px; margin: 15px;">

              <p class="h3">
                <strong>
                  {{ tbe(pm.bd_perform_message, pm.perform_message, user.lang) }}
                </strong>
              </p>
            </div>
            <div class="d-flex justify-content-center">
              <resultdetails
                :results='results'
                :ws="winner_screen"
                :correct="correct"
                :wrong="wrong"
                :lang="user.lang"
                :vh="place > 0? '60vh': '70vh'"/>
            </div>

          </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-7 p-md-3">
                <div class="card " v-for="question in questions" v-if="question.id === current" >
                <div class="card-header p-2" v-show="av">
                  <div class="d-flex flex-row align-items-center question-title relative">
                    <h3 class="text-danger mr-2">{{ tbe('প্রশ্ন.', 'Q.', user.lang) }}</h3>
                    <h5 class="mb-0 q_text">
                      {{ tbe(question.bd_question_text, question.question_text, user.lang) }}
                    </h5>
                    <span class="q_num text-muted mt-1">
                      {{ qne2b(qid, questions.length, user.lang) }}
                    </span>
                  </div>
                </div>
                    <div class="card-body p-1 animate__animated animate__backInDown animate__faster" :key="qid">
                        <img v-if="question.fileType == 'image'" class="image w-50 mt-1 rounded img-thumbnail"
                             :src="'/' + question.question_file_link" style="max-height:50vh" alt="">
                        <div v-if="endAVWait">
                          <div class="video" v-if="question.fileType == 'video'">
                              <video
                                  id="myVideo"
                                  v-if="question.fileType == 'video'"
                                  :src="'/'+ question.question_file_link"
                                  @error="audioVideoError()"
                                  @ended="onEnd()"
                                  @play="onStart()"
                                  class="image w-100 mt-1 rounded img-thumbnail"
                                  autoplay
                                  controls
                              />
                          </div>
                          <div class="audio" v-if="question.fileType == 'audio'">
                              <audio
                                  :src="'/'+ question.question_file_link"
                                  @error="audioVideoError()"
                                  @ended="onEnd()"
                                  @play="onStart()"
                                  controls
                                  autoplay />
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
                            <div v-if="sqo" class="animate__animated animate__zoomIn animate__faster d-flex flex-wrap"
                                :class="{'row justify-content-center justify-item-center': imageOption(question.options)}"
                            >
                                <div v-for="(option, i) in question.options" class="col-md-6 px-1"
                                     :class="[option.flag == 'img' ? 'col-6' : ' col-12' ]"
                                >
                                    <div class="list-group" v-if="option.flag != 'img'"
                                        :class="getOptionClass(i, quiz.quiz_time)"
                                    >
                                        <span @click="checkAnswer(question.id, tbe(option.bd_option, option.option, user.lang), option.correct)"
                                            class="list-group-item list-group-item-action cursor my-1"
                                            v-html="tbe(option.bd_option, option.option, user.lang)" >
                                        </span>
                                    </div>
                                    <div
                                        v-else
                                        @click="checkAnswer(question.id, option.img_link, option.correct)"
                                        class="cursor imageDiv p-2"
                                        :class="getOptionClass(i, quiz.quiz_time)"
                                    >
                                        <img  class="imageOption mt-1 rounded img-thumbnail" :src="'/'+ option.img_link" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center" v-else>
                                <img src="/img/loading.gif" style="width: 200px" alt="Loading...">
                            </div>
                        </div>
                    </div>

                    <!-- </transition>                  -->
                </div>

            </div>
            <div class="col-md-5 py-3 p-md-3">
                <div class="card ">
                    <div class="card-header text-center card-title py-1">
                        <strong>{{ __('games.information') }}</strong>
                        <div class="btn btn-sm btn-warning float-right"
                             v-if="qid > 0"
                             @click="reloadPage">
                          {{ tbe('রিসেট', 'Reset', user.lang)}}
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
                                class="list-group-item d-flex justify-content-between align-items-center p-0 py-2">
                                <resultdetails :results='results' :ws="winner_screen" :lang="user.lang" />
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
      <feed-back :user="user" />
    </div>
</template>

<script>

import resultdetails from '../helper/practice/resultdetails'
import feedBack from "../helper/FeedBack.vue";

export default {
    props: ['id', 'user', 'questions', 'gmsg', 'quiz'],
    components: {resultdetails, feedBack},

    data() {
        return {
            results: [],
            current: 0,
            qid: 0,
            winner_screen: false,
            place: 0,
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
            sqo: true,
            endAVWait: false,
            stars:0
        };
    },
    watch: {
        questions: {
            handler(newQuestion) {
                console.log('newQuestion', newQuestion[0].fileType)
                this.showQuestionOptions(newQuestion[0].fileType, 'first');
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
            // this.sqo = false
            this.showQuestionOptions(null)
        },

        getCorrectAnswertext() {
          let qco = this.questions[this.qid].options.find(o => o.correct == 1)
          if(qco.flag === 'img'){
            console.log('qco.img_link', qco.img_link)

            return qco.img_link;
          }
          console.log('this.tbe(qco.bd_option, qco.option, this.user.lang)', this.tbe(qco.bd_option, qco.option, this.user.lang))
          return this.tbe(qco.bd_option, qco.option, this.user.lang)
        },

        firstPlace: function() {
            this.place = 1
            this.stars = 5
            confetti({
              zIndex: 999999, particleCount: 200, spread: 120, origin: {y: 0.6}
            });
            setTimeout(() => {
              confetti({
                zIndex: 999999, particleCount: 200, spread: 120, origin: {y: 0.6}
              });
            }, 500)
        },
        secondPlace: function() {
            this.place = 2
            this.stars = 4
            let colors = ['#bb0000', '#0AE84E'];

            confetti({
              zIndex: 999999, particleCount: 100, angle: 60, spread: 55, origin: {x: 0}, colors: colors
            });
            confetti({
              zIndex: 999999, particleCount: 100, angle: 120, spread: 55, origin: {x: 1}, colors: colors
            });
        },
        thirdPlace: function() {
            this.place = 3
            this.stars = 3
            const defaults = {
              spread: 360,
              ticks: 50,
              gravity: 0,
              decay: 0.94,
              startVelocity: 30,
              shapes: ["star"],
              colors: ["FFE400", "FFBD00", "E89400", "FFCA6C", "FDFFB8"],
            };
              confetti({
                ...defaults,
                zIndex: 999999,
                particleCount: 400,
                scalar: 1.2,
                shapes: ["star"],
              });

              confetti({
                ...defaults,
                zIndex: 999999,
                particleCount: 100,
                scalar: 0.75,
                shapes: ["circle"],
              });
        },

        winner: function () {
            let perform = this.correct / this.questions.length * 100

            this.pm = this.gmsg.filter(g => g.perform_status >= perform)
                .reduce(function (prev, curr) {
                    return prev.perform_status < curr.perform_status ? prev : curr;
                });
            this.winner_screen = 1
            if(perform === 100) {
                this.firstPlace()
            }
            else if(perform >= 85) {
                this.secondPlace()
            }else if(perform >= 75) {
              this.thirdPlace()
            }
            else if(perform >= 50) {
              this.stars = 2
            }
            else if(perform >= 30) {
              this.stars = 1
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
                stars: this.stars,
            }
            axios.post(`/api/savePractice`, gd).then(response => console.log(response.data))
        },
        reloadPage() {
            window.location.reload()
        },
        tbe(b, e, l) {
            console.log(b,e,l)
            return l === 'bd' ? (!!b ? b : e) : (!!e ? e : b)
            // if(l === 'bd') {
            //     if (!!b){
            //         return b
            //     } else {
            //         return e
            //     }
            // } else {
            //     if (!!e){
            //         return e
            //     } else {
            //         return b
            //     }
            // }
        },
        qne2b(q, qn, l) {
          if (l === 'gb')
            // return `Question ${q + 1} of ${qn} `;
            return `${q + 1} of ${qn} `;
          // return `প্রশ্ন ${this.q2bNumber(qn)} এর ${this.q2bNumber(q + 1)} `;
          return `${this.q2bNumber(qn)} এর ${this.q2bNumber(q + 1)} `;
        },
        onEnd() {
          console.log('onEnded....')
          this.av = true
          this.showQuestionOptions('onEnd')
        },
        onStart() {
            console.log('onStart....')
            clearInterval(this.timer);
            this.av = false
        },
        audioVideoError() {
            console.log('audioVideoError....')
            this.onEnd()
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
        showQuestionOptions (question, f) {
            console.log('first time', f, question);
            let timeout = 1000;
            if(this.quiz.quiz_time != 0) {
                timeout = 3000; // this.quiz.quiz_time * 1000
                if(f == 'first') {
                    timeout = timeout / 2;
                }
            }
            if(!question || question == 'image') {
                clearInterval(this.timer);
                setTimeout(() => {
                    // this.sqo = true
                    this.startTimer()
                }, timeout)
            }

          if(question !=='onEnd'){
            if(this.currentQuestionType == 'audio' || this.currentQuestionType == 'video') {
              timeout += 3000
              this.av = false
              setTimeout(() => {
                this.endAVWait = true
              }, 3000)
            }
          }
        },
        startTimer () {
            if(this.av == true) {
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
                }, 1000);
            }
        },
        getOptionClass (index, qtime) {
            if(qtime > 0){
                if(index == 0) {
                    return 'animate__animated animate__lightSpeedInRight';
                }
                return 'animate__animated animate__lightSpeedInRight animate__delay-' + index +'s';
            }

            return '';
        }
    },
    computed: {
      currentQuestionType () {
        return this.questions[this.qid].fileType
      }
    }
};
</script>
<style scoped>
.relative{
  position: relative;
}
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
    .imageDiv:hover {
        background-color: #38c172
    }
    .imageOption {
        height: 100px;
        width: 100%;
    }

    @media screen and (min-width: 480px) {
      .imageOption {
        height: 170px;
        width: 100%;
      }
    }
    @media screen and (max-width: 480px) {
      .q_text{
        font-size: 1rem;
      }
    }

</style>


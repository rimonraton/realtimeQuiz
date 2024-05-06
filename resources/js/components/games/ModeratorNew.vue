<template>
  <div class="container p-0 p-md-2">
    <div :class="{'preventClick': preventClick}" v-if="!isHost()"></div>

    <!--      Message Colored Screen -->
    <transition name="fade" v-if="screen.message && !isHost()">
      <screen :user='user' :results='results'/>
    </transition>

    <!--      Result Waiting-->
    <div class="result-waiting" v-if="screen.resultWaiting">
      <div class="text-center bg-light">
        <img src="/img/quiz/result-waiting.gif" alt="Waiting for game end.">
        <p class="text-center px-5">Please wait result is processing..</p>
        <button v-if="user.id === uid" @click="gameEndHost" class="btn btn-sm btn-danger m-3">End Game</button>
      </div>
    </div>

    <!--      Result-->
    <transition name="fade" v-if="screen.result">
      <result
        v-if="questions.length > 0"
        :results='results'
        :lastQuestion='qid === questions.length'
        :resultDetail="answered_user_data" :requestHostUser="requestHostUser"
        :uid="uid"
        :user="user"
        mode="moderator"
        @playAgain="gameResetCall"
        @newQuiz="newQuiz"
        @makeHost="makeHost">
      </result>
    </transition>

    <!--      Chat-->
    <transition
      id="Chat"
      name="custom-classes"
      enter-active-class="animate__animated animate__fadeIn animate__slow"
      leave-active-class="animate__animated animate__fadeOut animate__slow">
      <chat :channel="channel" :uid="uid" :user="user" :challenge="challenge"/>
    </transition>

    <!--      Winner-->
    <div class="winner" v-if="screen.winner">
      <img v-if="user_ranking === 0" src="/img/quiz/position/1st.gif" alt="" style="width: 100px; margin-right: 15px;">
      <img v-if="user_ranking === 1" src="/img/quiz/position/2nd.gif" alt="" style="width: 100px; margin-right: 15px;">
      <img v-if="user_ranking === 2" src="/img/quiz/position/3rd.gif" alt="" style="width: 100px; margin: 15px;">
      <h3 class="text-center">
        {{ getPerform() }}
      </h3>
      <div v-if="user_ranking === 0">
        <h3><b>{{ user.name }}</b>, you won this game.</h3>
      </div>
      <div v-else-if="user_ranking === 1">
        <h3><b>{{ user.name }}</b>, you got second place</h3>
      </div>
      <div v-else-if="user_ranking === 2">
        <h3><b>{{ user.name }}</b>, you got third place</h3>
      </div>
      <div v-else>
        <h3 class="text-center"><b>{{ user.name }}</b>, you need more concentration </h3>
      </div>
      <button @click="screen.winner = 0" class="btn btn-sm btn-secondary">More Result</button>
    </div>

    <!--      Waiting-->
    <waiting
      :uid='uid' :users='users' :user='user' :time='challenge.schedule' :challenge="challenge" :defTime="qt.defaultTime"
      @kickingUser="kickUser($event)" @gameStart="gameStart" @gameReset="gameReset" v-if="screen.waiting">
    </waiting>

    <!--Game Screen-->
    <div class="row justify-content-center">

      <div class="col-md-12 pxs-0" v-if="gameActive || isHost()">
        <Progress :progress="Math.floor(progress)" v-if="!isHost()"/>
        <div class="card my-4" v-for="question in questions" v-if="question.id === current">
          <div class="card-body animate__animated animate__backInRight animate__faster position-relative">
              <span id="qnum" class="q_num text-right text-muted">
                {{ qne2b(qid, questions.length, user.lang) }}
              </span>

            <img
              v-if="question.fileType === 'image'"
              class="image w-100 mt-1 rounded img-thumbnail"
              :src="'/' + question.question_file_link" style="max-height:70vh" alt="">
            <div>
              <div v-if="endAVWait">
                <video v-if="question.fileType === 'video'" :src="'/'+ question.question_file_link"
                       @error="audioVideoError()" @ended="onEnd()" @play="onStart()"
                       class="image w-100 mt-1 rounded img-thumbnail" controls="controls" playsinline autoplay>
                  <!--                                    <source :src="'/'+ question.question_file_link" @error="audioVideoError()" type="video/mp4">-->
                </video>
                <div class="audio" v-if="question.fileType === 'audio'">
                  <audio :src="'/'+ question.question_file_link" @error="audioVideoError()" @ended="onEnd()"
                         @play="onStart()" controls autoplay/>
                  <div id="ar"></div>
                </div>
              </div>
              <div v-else>
                <div v-if="currentQuestionType === 'audio'">
                  <h1>Audio Question... </h1>
                </div>
                <div v-if="currentQuestionType === 'video'">
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
<!--                options-->
                <div v-if="sqo"
                     class="animate__animated animate__zoomIn animate__faster d-flex flex-wrap"
                     :class="{'row justify-content-center justify-item-center': imageOption(question['options'])}">
                  <div v-if="question.short_answer > 0" class="col-md-12 mt-4">
                    <!--                                    Fill in the blank -->
                    <form @submit.prevent="smtAnswer(question.id, question.options, shortAnswer)">
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Type Your Answer" v-model="shortAnswer">
                        <div class="input-group-append">
                          <button class="btn btn-primary" :disabled="shortAnswer==null" type="submit">
                            Submit
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div v-else v-for="(option, i) in question.options" class="col-md-6 px-1"
                       :class="[option.flag === 'img' ? 'col-6' : 'col-12' ]">
                    <div class="list-group" v-if="option.flag != 'img'"
                         :class="getOptionClass(i, challenge.option_view_time)">
                      <span
                        class="list-group-item cursor my-1"
                        :class="getClass(i)"
                        @click.once="checkAnswer(question.id, tbe(option.bd_option, option.option, user.lang), option.correct)"
                        v-html="tbe(option.bd_option, option.option, user.lang)">
                      </span>
                    </div>
                    <div v-else @click="checkAnswer(question.id, option.img_link, option.correct)"
                         class="cursor my-2 text-center "
                         :class="getOptionClass(i, challenge.option_view_time)">
                      <img class="imageOption mt-1 rounded img-thumbnail" :src="'/'+ option.img_link" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

        <div class="d-flex justify-content-between align-items-center" v-if="isHost()">
          <add-question
            :topics="topics" :user="user"
            @addQuestion="addQuestionFnc($event)"
          />
          <div>
            <a
              class="btn btn-outline-success"
              v-if="isLastQuestion"
              @click="nextQuestion">
              {{ tbe('পরবর্তী প্রশ্ন', 'NEXT QUESTION', user.lang) }}
            </a>
            <a
              v-else
              class="btn btn-sm btn-info"
              @click="quizEnd">
              {{ tbe('খেলা শেষ করুন', 'Game Finish', user.lang) }}
            </a>
          </div>
        </div>
          <info
            color="#00A988"
            :progress="Math.floor(progress)"
            :users="users.length"
            :answered="answered"
            :correct="getCorrectAnswerText()"
            :results="currentQuestionResult"
          />

      </div>
      <div class="col-md-12">
        <div class="card my-4" v-if="results.length>0">
          <div class="card-header">
            Score Board
          </div>
          <div class="card-body">
            <transition-group name="slide-up" class="list-group" tag="ul" appear>
              <li
                class="list-group-item user-list"
                v-for="(res, index) in results"
                :key="res.id"
                :class="{active : res.id === user.id}"
              >
                <span v-html="getMedel(index)"></span>
                {{ res.name }}
                <span class="badge badge-dark float-right mt-1">
                                {{ res.score }}
                              </span>
              </li>
            </transition-group>
          </div>
        </div>
      </div>
    </div>
    <!--    End Game Screen-->
  </div>
</template>
<script>
import waiting from '../helper/waiting'
import result from '../helper/result'
import chat from '../helper/Chat'
import {quizHelpers} from '../mixins/quizHelpers'
import resultdetails from "../helper/practice/resultdetails.vue";
import questionsComp from "../helper/moderator/questions.vue";
import info from '../helper/moderator/info.vue'
import Screen from "../helper/moderator/screen.vue";
import QuestionsModerator from "../helper/moderator/questionsModerator.vue";
import Progress from "../helper/progress.vue";
import AddQuestion from "../helper/AddQuestion.vue";

export default {
  mixins: [quizHelpers],

  props: ['challenge', 'hostid', 'user', 'questionsall', 'gmsg', 'teams', 'topics'],

  components: {
    AddQuestion,
    Progress, QuestionsModerator, Screen, questionsComp, resultdetails, waiting, result, chat, info
  },

  data() {
    return {
      questions: null,
      question_time: 30,
      gameActive: true,
      qt: {
        ms: 0,
        defaultTime: 30,
        time: 30,
        timer: null
      },
      counter: 2,
      timer: null,
      users: [],
      uid: this.hostid,
      answered: 0,
      end_user: 0,
      answered_user_data: [],
      results: [],
      av: true,
      sqo: false,
      qid: 0,
      current: 0,
      screen: {
        waiting: 1,
        loading: 0,
        result: 0,
        resultWaiting: 0,
        winner: 0,
        message: 0,
      },
      gamedata: {},
      score: [],
      user_ranking: null,
      game_start: 0,
      progress: 100,
      share: null,
      pm: '',
      perform: 0,
      preventClick: true,
      shortAnswer: null,
      requestHost: false,
      requestHostUser: null,
      endAVWait: false,
      gameEnded: false,
      timerTimeOut: 100,
    };
  },

  created: function () {
    // console.log('challenge created')
    Echo.channel(this.channel)
      .listen('GameStartEvent', (data) => {
        if (this.game_start === 1) return
        this.gameReset()
        console.log(['GameStartEvent............. gameReset()', data.gameData])
        this.share = data.gameData['share']
        this.game_start = 1 // Game Start from Game Owner...
        this.screen.waiting = 0
        this.screen.message = 0
        this.sqo = true
        this.showQuestionOptions(null)
        this.qt.defaultTime = data.gameData['defaultTime']
        this.qt.time = data.gameData['defaultTime']
      })
      .listen('GameResetEvent', (data) => {
        console.log(['GameResetEvent.............', data])
        this.gameReset()
      })
      .listen('GameEndUserEvent', (data) => {
        console.log(['GameEndUserEvent.............', data])
        // this.end_user++
        // if (this.users.length == this.end_user) {
        //     this.winner()
        // }
        this.winner()

      })
      .listen('GameEndByHostEvent', (data) => {
        console.log(['GameEndByHostEvent.............', data])
        this.winner()
      })
      .listen('QuestionClickedEvent', (data) => {
        console.log('QuestionClickedEvent.............')
        this.answered_user_data.push(data)
        this.answered++
        this.getResult()
      })
      .listen('AddQuestionEvent', (data) => {
        console.log('AddQuestionEvent..........')
        console.log(data);
        this.sqo = false
        data.questions.map(q => this.questions.push(q))
      })
      .listen('MakeHostEvent', (data) => {
        console.log('MakeHostEvent.............', data)
        if (data.status === 'accept') {
          this.uid = data.user.id
          this.requestHostUser = null
        } else if (data.status === 'deny') {
          this.requestHostUser = null
        } else {
          this.requestHostUser = data.user
        }

      })
      .listen('ChangeQuestionEvent', (data) => {
        console.log('ChangeQuestionEvent.............', data)
        this.questions = data.questions
      })
      .listen('KickUserEvent', (data) => {
        console.log('KickUserEvent.............')
        this.users = this.users.filter(u => u.id !== data.uid)

        if (this.user.id === data.uid) {
          window.location.href = "/"
        }

      })
      .listen('NextQuestionEvent', (data) => {
        this.screen.message = 0
        this.answered = 0
        this.screen.resultWaiting = 0
        this.av = true
        this.sqo = true
        console.log('sqo...', this.sqo)
        console.log('NextQuestionEvent.............', data, this.questions[data.qid].id, this.qid, this.questions[this.qid].id, document.getElementById(this.questions[this.qid].id))
        // const qs = this.questions[this.qid - 1].fileType
        if (this.questions[data.qid].fileType === 'video' || this.questions[data.qid].fileType === 'audio') {
          console.log('next page reload...', this.questions[data.qid].id)
          setTimeout(() => {
            document.getElementById(this.questions[data.qid].id).src = '/' + this.questions[data.qid].question_file_link
            document.getElementById(this.questions[data.qid].id).play()
          }, 10)
        }
        this.qid = data.qid
        this.current = this.questions[this.qid].id // Next Question from Moderator...
        this.screen.result = 0
        if (data.qtime > 0) {
          this.TimerInit()
          this.qt.time = data.qtime;
          this.gameActive = true
          // this.QuestionTimer()
          this.showQuestionOptions(this.questions[this.qid].fileType)
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
        this.users = users.filter(u => u.id != this.uid)
      })
      .joining((user) => {
        if (user.id != this.uid)
          this.users.unshift(user);
        console.log(`${user.name} join`);

        // if (this.game_start)
        //     this.kickUser(user.id)
      })
      .leaving((user) => {
        this.users = this.users.filter(u => u.id != user.id);
        console.log(`${user.name} leaving`);
      });

    this.questions = this.questionsall
    this.current = this.questionsall[this.qid].id
    document.addEventListener("blur", () => this.preventLeave());
    document.addEventListener("visibilitychange", () => {
      if (document.hidden) {
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
    async startWebRTC() {
      // Code to initiate WebRTC
      // Capture audio and video, establish peer connection, etc.
    },

    handleSignalingData(data) {
      // Code to handle signaling data
      // Exchange offer, answer, and ICE candidates
    },
    getClass(index) {
      let bgClas = 'list-group-item-success'
      switch (index) {
        case 0:
          bgClas = 'list-group-item-primary'
          break;
        case 1:
          bgClas = 'list-group-item-success'
          break;
        case 2:
          bgClas = 'list-group-item-warning'
          break;
        default:
          bgClas = 'list-group-item-info'
      }
      return bgClas
    },
    nextQuestion() {
      this.answered = 0
      // this.onEnd()
      // this.QuestionTimer()
      console.log('video element.......', document.getElementsByClassName('avf'))
      console.log('NextQuestion Clicked', this.av)
      this.screen.resultWaiting = 0
      if (this.qid + 1 == this.questions.length) {
        clearInterval(this.timer);
        this.winner()
        return
      }

      this.qid++
      this.current = this.questions[this.qid].id
      let next = {channel: this.channel, qid: this.qid, qtime: this.question_time}
      axios.post(`/api/nextQuestion`, next).then(res => {
        this.questionInit(this.qt.defaultTime);
        this.QuestionTimer()
      })
    },
    reloadPage() {
      axios.post(`/api/pageReload`, {channel: this.channel})
        .then((response) => {
          console.log(['page reload event log ', response])
          window.location.reload()
        })
    },
    addQuestionFnc(formData) {
      let ext_qids = this.questions.map(q => {
        return q.id
      });
      axios.post(`/api/addQuestion`, {channel: this.channel, formdata: formData, existing_qids: ext_qids})
        .then(res => res.data.map(q => this.questions.push(q)))
    },
    TimerInit() {
      clearInterval(this.timer)
      clearInterval(this.qt.timer)
      this.qt.ms = 0
      this.qt.time = 0
      this.progress = 100
      this.preventClick = true

    },
    gameStart: function (defaultTime = 30) {
      console.log('gameStart...')
      this.sqo = true
      let ids = this.users.map(u => u.id)
      let gd = {
        channel: this.channel,
        gameStart: 1,
        uid: ids,
        id: this.challenge.id,
        users: this.users,
        host_id: this.uid,
        defaultTime: defaultTime,
        mode: 'moderator'
      }
      this.qt.defaultTime = defaultTime
      this.qt.time = defaultTime
      // console.log(gd);
      axios.post(`/api/gameStart`, gd)
        .then(res => {
          console.log('res.data', res.data)
          this.share = res.data
          this.game_start = 1
          this.screen.waiting = 0
          this.showQuestionOptions(this.questions[0].fileType)
        })
      // this.QuestionTimer()
    },
    showQuestionOptions(question) {
      if (this.gameEnded) return;
      console.log('showQuestionOptions...')
      let timeout = 1000;
      if (question !== 'onEnd') { //onEnd is made up text to check audioVideo end
        if (this.currentQuestionType == 'audio' || this.currentQuestionType == 'video') {
          timeout += 2000
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
    QuestionTimer() {
      console.log('QuestionTimer...')
      if (this.qid == this.questions.length || this.av == false || this.gameEnded === true) {
        return;
      }
      let pdec = 100 / (10 * this.qt.time);
      // console.log('pdec', pdec)
      // this.preventClick = false
      this.qt.timer =
        setInterval(() => {
          // console.log('this.qt.time', this.qt.time)
          if (this.qt.time <= 0) {
            this.questionInit(this.qt.defaultTime);
            if (this.answered == 0) {
              this.checkAnswer(this.qid, 'Not Answered', 0);
            }
            this.screen.resultWaiting = 0
            this.resultScreen();
            this.currentQuestion();
          } else {
            this.qt.ms++
            this.progress -= pdec

            if (this.qt.ms == 10) {
              this.qt.time--
              this.qt.ms = 0
            }

          }

        }, this.timerTimeOut);
    },
    checkAnswer(q, a, rw) {
      if (this.gameEnded) return;
      // this.screen.message = 1
      if (!this.isHost()) {
        this.screen.resultWaiting = 1
      }

      this.preventClick = true
      console.log('checkAnswer...', q, a, rw, this.isHost())
      this.shortAnswer = null
      this.answered = 1
      this.right_wrong = rw
      this.gamedata['uid'] = this.user.id
      this.gamedata['channel'] = this.channel
      this.gamedata['name'] = this.user.name
      this.gamedata['question'] = this.tbe(this.questions[this.qid].bd_question_text, this.questions[this.qid].question_text, this.user.lang)
      this.gamedata['answer'] = this.getCorrectAnswerText()
      this.gamedata['selected'] = a
      this.gamedata['isCorrect'] = rw == 1 ? Math.floor(this.progress) : 0
      let clone = {...this.gamedata}
      axios.post(`/api/questionClick`, clone)
      // .then(res => {
      //     this.resultScreen();
      // })
      this.answered_user_data.push(clone)
      this.screen.loading = true
    },
    getResult() {
      console.log('getResult...')
      this.results = []
      this.users.forEach(user => {
        let score = 0;
        this.answered_user_data
          .filter(f => f.uid === user.id)
          .map(u => {
            score += u.isCorrect
          })

        this.results.push({id: user.id, name: user.name, score: score, user: user})

      })
      this.results.sort((a, b) => b.score - a.score)
    },
    smtAnswer(qid, qopt, data) {
      console.log('smtAnswer...')
      if (this.gameEnded === true) {
        this.stop();
        return
      }

      if (data == null) return
      const correct = qopt.some((opt) => {
        return opt.option.toLowerCase() == data.toLowerCase() || opt.bd_option == data
      })
      // console.log(qid, qopt, data, correct)

      if (correct) {
        this.checkAnswer(qid, data, 1)
      } else {
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
        if (param === 'granted') {
          new Notification('Leave from Quiz', {
            body: 'You should not exit this screen without completing the Exam/quiz.!',
            tag: 'Leave from Quiz',
          })
        }
      })
    },
    gameResetCall(isStart = false) {
      console.log('gameResetCall....')
      axios.post(`/api/gameReset`, {channel: this.channel}).then(res => console.log(res.data))
      this.gameReset()
      // this.screen.waiting = 0
      // if (isStart) this.gameStart();

    },
    gameReset() {
      console.log('gameReset....')
      this.questionInit(this.qt.defaultTime)
      this.screen.waiting = 1
      this.screen.loading = 0
      this.screen.message = 0
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
      this.preventClick = true
      this.gameEnded = false
    },

    getCorrectAnswerText() {
      console.log('getCorrectAnswerText....')

      const correctOption = this.questions[this.qid].options.find(o => o.correct == 1)
      // console.log('correctOption....', correctOption)
      if (correctOption.flag == 'img') {
        return correctOption.img_link
      } else {
        const correctEngOption = correctOption.option
        const correctBanOption = correctOption.bd_option
        return this.tbe(correctBanOption, correctEngOption, this.user.lang)
      }
    },
    resultScreen() {
      console.log('resultScreen...')
      this.questionInit(this.qt.defaultTime)
      this.getResult() //Sorting this.results
      // this.countDown()
      this.gameActive = false
      if (this.qid + 1 == this.questions.length) {
        console.log('......resultScreen')
        this.quizEnd()
        return
      }
      console.log('resultScreen preventClick True')
      // this.qid++
      // this.current = this.questions[this.qid].id
      // this.showQuestionOptions(null)
    },

    countDown() {
      if (this.gameEnded) return;
      console.log('countDown')
      if (this.counter == 0) {
        this.qid++
        this.current = this.questions[this.qid].id
        this.showQuestionOptions(null)
      } else {
        this.counter--
      }
    },
    winner() {
      console.log('winer....')
      this.user_ranking = this.results.findIndex(w => w.id == this.user.id)
      let user_score = this.results[this.user_ranking].score
      this.perform = Math.round((user_score / ((this.qid + 1) * 100)) * 100)
      this.pm = this.gmsg.filter(gm => gm.perform_status >= this.perform)
        .reduce(function (prev, curr) {
          return prev.perform_status < curr.perform_status ? prev : curr;
        });
      this.questionInit(this.qt.defaultTime)
      this.screen.result = 1
      this.screen.winner = 1
      this.screen.message = 0
      this.game_start = 0
      if (this.user_ranking === 0) {
        this.firstPlace()
      } else if (this.user_ranking === 1) {
        this.secondPlace()
      } else if (this.user_ranking === 2) {
        this.thirdPlace()
      }
      // setTimeout(() => {
      //     this.screen.winner = 0
      // }, 5000);
    },
    getPerform() {
      return `${this.pm.perform_message} (${this.questions.length * 100}/${this.results[this.user_ranking].score} ${this.perform}% )`
    },
    kickUser(id) {
      if (id != this.uid) {

        this.users = this.users.filter(u => u.id !== id)

        let channelUser = {channel: this.channel, uid: id}

        axios.post(`/api/kickUser`, channelUser)

      }

    },
    gameStarted(user) {
      console.log(['gameStarted, user', user])
    },
    getShareLink(path) {
      console.log(['urlencode', encodeURI(this.getUrl(path))]);
      return 'https://www.facebook.com/plugins/share_button.php?href=' + encodeURI(this.getUrl(path)) + '&layout=button&size=large&appId=1086594171698024&width=77&height=28'
    },
    getOptionClass(index, qtime) {
      if (qtime > 0) {
        if (index == 0) {
          return 'animate__animated animate__lightSpeedInRight';
        }
        return 'animate__animated animate__lightSpeedInRight animate__delay-' + index + 's';
      }

      return '';
    },

    async makeHost(uid, status = null) {
      console.log('user id..', this.isHost())
      if (this.isHost() && status == null) {
        this.uid = uid
        this.requestHostUser = null
        status = 'accept'
        // this.makeHost(uid, 'accept')
      } else {
        if (status == 'accept') {
          this.uid = uid
          this.requestHostUser = null
        } else if (status == 'deny') {
          this.requestHostUser = null
        } else {
          this.requestHostUser = this.user
        }
      }

      return await axios.post(`/api/makeHost/${uid}/${this.channel}/${status}`)
    },
    async newQuiz(uid) {
      let makeHostStatus = await this.makeHost(uid)
      console.log('makeHostStatus..', makeHostStatus.status)
      if (makeHostStatus.status === 200) {
        console.log('inside..', makeHostStatus.status)
        let data = {channel: this.channel, id: this.challenge.id}
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
      } else {
        console.log('makeHostStatus status is not 200')
      }
    },
    quizEnd() {
      console.log('gameEnded quizEnd end')
      let gameResult = {result: this.results, 'share_id': this.share.id, 'channel': this.channel}
      axios.post(`/api/challengeResult`, gameResult).then(res => {
        this.gameEnded = true;
        this.screen.result = 1
        // this.winner()
      })
    },
    gameEndHost() {
      let gameResult = {result: this.results, 'share_id': this.share.id, 'channel': this.channel, 'host_end': 1}
      axios.post(`/api/challengeResult`, gameResult).then(res => {
        this.winner()
        this.gameEnded = true;
        this.screen.resultWaiting = 0;
      })
    },

  },
  computed: {
    currentQuestionResult() {
      let cq = this.questions[this.qid]
      let qt = this.tbe(cq.bd_question_text, cq.question_text, this.user.lang)
      let results = []
      cq.options.forEach(option => {
        let score = 0;
        let ebOption = ''
        if(option.flag === 'img') {
          ebOption = option.img_link
        }else{
          ebOption = this.tbe(option.bd_option, option.option, this.user.lang)
        }
        this.answered_user_data
          .filter(ad => ad.question === qt)
          .map(ans => {
            if(ans.selected.trim() === ebOption.trim()){
              score ++
            }
          })
        results.push({option: ebOption, score: score, flag: option.flag})
      })
      // results.sort((a, b) => b.score - a.score)
      console.log('question results', results)
      return results;
    },
  }

};
</script>
<style scoped>
.imageOption {
  height: auto;
  max-height: 170px;
  width: 100%;
  max-width: 350px;
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


</style>

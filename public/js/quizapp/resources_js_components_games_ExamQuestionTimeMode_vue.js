"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_components_games_ExamQuestionTimeMode_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/ExamQuestionTimeMode.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/ExamQuestionTimeMode.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helper_waiting__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../helper/waiting */ "./resources/js/components/helper/waiting.vue");
/* harmony import */ var _helper_result__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../helper/result */ "./resources/js/components/helper/result.vue");
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }
function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }
function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }
function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { _defineProperty(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }
function _defineProperty(obj, key, value) { key = _toPropertyKey(key); if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }
function _toPropertyKey(arg) { var key = _toPrimitive(arg, "string"); return _typeof(key) === "symbol" ? key : String(key); }
function _toPrimitive(input, hint) { if (_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//



/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['challenge', 'uid', 'user', 'questions', 'gmsg', 'teams'],
  components: {
    waiting: _helper_waiting__WEBPACK_IMPORTED_MODULE_0__["default"],
    result: _helper_result__WEBPACK_IMPORTED_MODULE_1__["default"]
  },
  data: function data() {
    return {
      qt: {
        ms: 0,
        time: 50,
        timer: null
      },
      users: [],
      answered: 0,
      end_user: 0,
      answered_user_data: [],
      results: [],
      counter: 2,
      timer: null,
      current: 0,
      av: true,
      sqo: false,
      qid: 0,
      screen: {
        waiting: 1,
        loading: 0,
        result: 0,
        resultWaiting: 0,
        winner: 0
      },
      gamedata: {},
      score: [],
      user_ranking: null,
      game_start: 0,
      progress: 100,
      share: null,
      pm: '',
      perform: 0,
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
  mounted: function mounted() {
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

    this.gameStart();
    this.current = this.questions[this.qid].id;
    this.externalJS();
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
    negativeMark: function negativeMark() {
      return this.challenge.negative_mark > 0 ? this.challenge.each_question_mark * this.challenge.negative_mark / 100 : 0;
    },
    // preventNav(event) {
    //   if (!this.game_start) return;
    //   event.preventDefault();
    //   // Chrome requires returnValue to be set.
    //   event.returnValue = "";
    // },

    gameStart: function gameStart() {
      this.sqo = true;
      var ids = this.users.map(function (u) {
        return u.id;
      });
      var gd = {
        channel: this.channel,
        gameStart: 1,
        uid: ids,
        id: this.challenge.id,
        users: this.users,
        host_id: this.uid
      };
      console.log(gd);
      // this.share = res.data
      this.game_start = 1;
      this.screen.waiting = 0;
      this.showQuestionOptions(this.questions[0].fileType);
      // axios.post(`/api/gameStart`, gd)
      //     .then(res => {
      //         this.share = res.data
      //         this.game_start = 1
      //         this.screen.waiting = 0
      //         this.showQuestionOptions(this.questions[0].fileType)
      //     })
      // this.QuestionTimer()
    },
    gameResetCall: function gameResetCall() {
      axios.post("/api/gameReset", {
        channel: this.channel
      }).then(function (res) {
        return console.log(res.data);
      });
      this.gameReset();
    },
    gameReset: function gameReset() {
      this.questionInit();
      this.screen.waiting = 1;
      this.answered_user_data = [];
      this.results = [];
      this.qid = 0;
      this.gamedata = {};
      this.score = [];
      this.user_ranking = null;
      this.game_start = 0;
      this.current = this.questions[this.qid].id;
    },
    checkAnswer: function checkAnswer(q, a, rw) {
      this.answered = 1;
      this.right_wrong = rw;
      this.gamedata['id'] = q.id;
      this.gamedata['option'] = q.options[0].flag == 'img' ? null : a;
      this.gamedata['correct'] = rw;
      this.gamedata['question'] = this.tbe(q.bd_question_text, q.question_text, this.user.lang);
      this.gamedata['correctOption'] = rw == 0 ? this.tbe(q.options.find(function (o) {
        return o.correct == 1;
      }).bd_option, q.options.find(function (o) {
        return o.correct == 1;
      }).option, this.user.lang) : null;
      this.gamedata['img_link'] = q.options[0].flag == 'img' ? a : null;
      this.gamedata['correct_img_link'] = q.options[0].flag == 'img' ? rw == 0 ? q.options.find(function (o) {
        return o.correct == 1;
      }).img_link : null : null;
      var clone = _objectSpread({}, this.gamedata);
      this.questionInit();
      console.log('this.questionInit() call.........');

      // axios.post(`/api/questionClick`, clone)
      //     .then(res => {
      //         this.resultScreen();
      //     })
      this.answered_user_data.push(clone);
      this.resultScreen();
      this.screen.loading = true;
    },
    getCorrectAnswertext: function getCorrectAnswertext() {
      return this.questions[this.qid].options.find(function (o) {
        return o.correct == 1;
      }).option;
    },
    resultScreen: function resultScreen() {
      console.log('resultScreen');
      this.questionInit();
      this.getResult(); //Sorting this.results
      this.countDown();
      if (this.qid + 1 == this.questions.length) {
        console.log('......resultScreen');
        // this.quizEnd()
        this.submitExam();
      } else {
        console.log('resultScreen preventClick True');
        this.preventClick = true;
        this.qid++;
        this.current = this.questions[this.qid].id;
        this.showQuestionOptions(null);
      }
    },
    QuestionTimer: function QuestionTimer() {
      var _this = this;
      if (this.qid == this.questions.length) {
        this.submitExam();
        return;
      }
      var pdec = 100 / (5 * this.qt.time);
      console.log('pdec', pdec);
      this.preventClick = false;
      this.qt.timer = setInterval(function () {
        // console.log('this.qt.time', this.qt.time)
        if (_this.qt.time <= 0) {
          _this.questionInit();
          // this.checkAnswer(this.qid, 'Not Answered', 0);
          _this.resultScreen();
        } else {
          _this.qt.ms++;
          _this.progress -= pdec;
          if (_this.qt.ms == 5) {
            _this.qt.time--;
            _this.qt.ms = 0;
          }
        }
      }, 200);
    },
    countDown: function countDown() {
      console.log('countDown');
      if (this.counter <= 0) {
        // this.questionInit()
        this.qid++;
        this.current = this.questions[this.qid].id;
        this.showQuestionOptions(null);
        // this.QuestionTimer()
      } else {
        this.counter--;
      }
    },
    getResult: function getResult() {
      var _this2 = this;
      console.log('getResult');
      this.results = [];
      this.users.forEach(function (user) {
        var score = 0;
        _this2.answered_user_data.filter(function (f) {
          return f.uid === user.id;
        }).map(function (u) {
          score += u.isCorrect;
        });
        _this2.results.push({
          id: user.id,
          name: user.name,
          score: score
        });
      });
      this.results.sort(function (a, b) {
        return b.score - a.score;
      });
    },
    winner: function winner() {
      var _this3 = this;
      this.user_ranking = this.results.findIndex(function (w) {
        return w.id == _this3.user.id;
      });
      var user_score = this.results[this.user_ranking].score;
      this.perform = Math.round(user_score / ((this.qid + 1) * 100) * 100);
      this.pm = this.gmsg.filter(function (gm) {
        return gm.perform_status >= _this3.perform;
      }).reduce(function (prev, curr) {
        return prev.perform_status < curr.perform_status ? prev : curr;
      });
      this.questionInit();
      this.screen.result = 1;
      this.screen.winner = 1;
      this.game_start = 0;
      if (this.user_ranking == 0) {
        confetti({
          zIndex: 999999,
          particleCount: 200,
          spread: 120,
          origin: {
            y: 0.6
          }
        });
      } else {
        var colors = ['#bb0000', '#ffffff'];
        confetti({
          zIndex: 999999,
          particleCount: 100,
          angle: 60,
          spread: 55,
          origin: {
            x: 0
          },
          colors: colors
        });
        confetti({
          zIndex: 999999,
          particleCount: 100,
          angle: 120,
          spread: 55,
          origin: {
            x: 1
          },
          colors: colors
        });
      }
    },
    externalJS: function externalJS() {
      var confetti = document.createElement('script');
      confetti.setAttribute('src', 'https://cdn.jsdelivr.net/npm/canvas-confetti@1.3.0/dist/confetti.browser.min.js');
      document.head.appendChild(confetti);
    },
    kickUser: function kickUser(id) {
      if (id != this.uid) {
        this.users = this.users.filter(function (u) {
          return u.id !== id;
        });
        var channelUser = {
          channel: this.channel,
          uid: id
        };
        axios.post("/api/kickUser", channelUser);
      }
    },
    questionInit: function questionInit() {
      clearInterval(this.timer);
      clearInterval(this.qt.timer);
      this.qt.ms = 0;
      this.qt.time = 30;
      this.progress = 100;
      this.answered = 0;
      this.counter = 2;
      this.screen.waiting = 0;
      this.screen.loading = 0;
      this.screen.result = 0;
      this.screen.winner = 0;
    },
    gameStarted: function gameStarted(user) {
      console.log(['user', user]);
    },
    q2bNumber: function q2bNumber(numb) {
      var numbString = numb.toString();
      var bn = '';
      var eb = {
        0: '০',
        1: '১',
        2: '২',
        3: '৩',
        4: '৪',
        5: '৫',
        6: '৬',
        7: '৭',
        8: '৮',
        9: '৯'
      };
      _toConsumableArray(numbString).forEach(function (n) {
        return bn += eb[n];
      });
      return bn;
    },
    tbe: function tbe(b, e, l) {
      if (b !== null && e !== null) {
        if (l === 'bd') return b;
        return e;
      } else if (b !== null && e === null) return b;else if (b === null && e !== null) return e;
      return b;
    },
    qne2b: function qne2b(q, qn, l) {
      if (l === 'gb') return "Question ".concat(q + 1, " of ").concat(qn, " ");
      return "\u09AA\u09CD\u09B0\u09B6\u09CD\u09A8 ".concat(this.q2bNumber(qn), " \u098F\u09B0 ").concat(this.q2bNumber(q + 1), " ");
    },
    getUrl: function getUrl(path) {
      return location.origin + '/' + path;
    },
    getShareLink: function getShareLink(path) {
      console.log(['urlencode', encodeURI(this.getUrl(path))]);
      return 'https://www.facebook.com/plugins/share_button.php?href=' + encodeURI(this.getUrl(path)) + '&layout=button&size=large&appId=1086594171698024&width=77&height=28';
    },
    getMedel: function getMedel(index) {
      if (index == 0) return '<i class="fas fa-award fa-lg" style="color: gold"></i>';
      if (index == 1) return '<i class="fas fa-award" style="color: silver"></i>';
      if (index == 2) return '<i class="fas fa-award fa-sm" style="color: #CD7F32"></i>';
      return '';
    },
    waitingResult: function waitingResult() {
      return 'waiting-result';
    },
    imageOption: function imageOption(objArray) {
      return objArray.some(function (a) {
        return a.flag == 'img';
      });
    },
    onEnd: function onEnd() {
      this.av = true;
      this.showQuestionOptions(null);
    },
    onStart: function onStart() {
      var _this4 = this;
      setTimeout(function () {
        return _this4.questionInit();
      }, 1000);
      this.av = false;
    },
    getOptionClass: function getOptionClass(index, qtime) {
      if (qtime > 0) {
        if (index == 0) {
          return 'animate__animated animate__lightSpeedInRight';
        }
        return 'animate__animated animate__lightSpeedInRight animate__delay-' + index + 's';
      }
      return '';
    },
    showQuestionOptions: function showQuestionOptions(question) {
      var _this5 = this;
      console.log('showQuestionOptions', question);
      var timeout = 1000;
      if (this.challenge.option_view_time != 0) {
        timeout = 3500; // this.quiz.quiz_time * 1000
      }

      if (question == null || question == 'image') {
        clearInterval(this.qt.timer);
        setTimeout(function () {
          // this.sqo = true
          _this5.preventClick = false;
          _this5.QuestionTimer();
        }, timeout);
      }
    },
    quizEnd: function quizEnd() {
      var _this6 = this;
      // axios.post(`/api/gameEndUser`, {'channel': this.channel})
      var gameResult = {
        result: this.results,
        'share_id': this.share.id,
        'channel': this.channel
      };
      axios.post("/api/challengeResult", gameResult).then(function (res) {
        _this6.end_user++;
        console.log('users + end user', _this6.users.length, _this6.end_user);
        if (_this6.users.length <= _this6.end_user) {
          _this6.winner();
          return;
        } else {
          _this6.screen.resultWaiting = 1;
          return;
        }
      });
    },
    submitExam: function submitExam() {
      var _this7 = this;
      var resultValue = {
        'user_id': this.user.id,
        'examination_id': this.challenge.id,
        'results': this.answered_user_data
      };
      axios.post('/api/save-results', resultValue).then(function (res) {
        console.log(res, 'response from server');
        _this7.screen.resultWaiting = 1;
      });
    },
    totalTime: function totalTime() {
      var hasHours;
      var hasMinutes;
      var hasSeconds;
      var hours = this.challenge.question_time > 3600 ? Math.floor(this.challenge.question_time / 3600) : 0;
      var minutes = Math.floor(this.challenge.question_time / 60);
      var seconds = Math.floor(this.challenge.question_time % 60);
      console.log(hours, minutes, seconds, 'times...');
      if (this.user.lang == 'gb') {
        // return hours + this.hourOrHours(hours) + ' ' + minutes + this.minuteOrMinutes(minutes) + ' ' + seconds + this.secondOrSeconds(seconds)
        if (hours) {
          hasHours = hours + this.hourOrHours(hours);
        }
        if (minutes) {
          hasMinutes = minutes + this.minuteOrMinutes(minutes);
        }
        if (seconds) {
          hasSeconds = seconds + this.secondOrSeconds(seconds);
        }
        return (hasHours == undefined ? '' : hasHours) + (hasMinutes == undefined ? '' : hasMinutes) + (hasSeconds == undefined ? '' : hasSeconds);
      } else {
        if (hours) {
          hasHours = this.q2bNumber(hours) + ' ঘণ্টা';
        }
        if (minutes) {
          hasMinutes = this.q2bNumber(minutes) + ' মিনিট';
        }
        if (seconds) {
          hasSeconds = this.q2bNumber(seconds) + ' সেকেন্ড';
        }
        return (hasHours == undefined ? '' : hasHours) + (hasMinutes == undefined ? '' : hasMinutes) + (hasSeconds == undefined ? '' : hasSeconds);
      }
    },
    hourOrHours: function hourOrHours(data) {
      if (data > 1) {
        return ' hours';
      }
      return ' hour';
    },
    minuteOrMinutes: function minuteOrMinutes(data) {
      if (data > 1) {
        return ' minutes';
      }
      return ' minute';
    },
    secondOrSeconds: function secondOrSeconds(data) {
      if (data > 1) {
        return ' seconds';
      }
      return ' second';
    },
    perQTime: function perQTime() {
      var hasMinutes;
      var hasSeconds;
      var qTime = this.challenge.question_time / this.questions.length;
      var minutes = Math.floor(qTime / 60);
      var seconds = Math.floor(qTime % 60);
      if (this.user.lang == 'gb') {
        if (minutes) {
          hasMinutes = minutes + this.minuteOrMinutes(minutes);
        }
        if (seconds) {
          hasSeconds = seconds + this.secondOrSeconds(seconds);
        }
        return (hasMinutes == undefined ? '' : hasMinutes) + (hasSeconds == undefined ? '' : hasSeconds);
      } else {
        if (minutes) {
          hasMinutes = this.q2bNumber(minutes) + ' মিনিট';
        }
        if (seconds) {
          hasSeconds = this.q2bNumber(seconds) + ' সেকেন্ড';
        }
        return (hasMinutes == undefined ? '' : hasMinutes) + (hasSeconds == undefined ? '' : hasSeconds);
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
    progressClass: function progressClass() {
      return this.progress > 66 ? 'bg-success' : this.progress > 33 ? 'bg-info' : 'bg-danger';
    },
    progressWidth: function progressWidth() {
      return {
        'width': this.progress + '%'
      };
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/result.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/result.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['results', 'lastQuestion'],
  methods: {
    addImage: function addImage() {
      var random = Math.floor(Math.random() * 4) + 1;
      return "/images/gp/".concat(random, ".jpg");
    },
    back: function back() {
      // window.history.back()
      window.location = '/game/mode/challenge';
    },
    getMedel: function getMedel(index) {
      if (index == 0) return '<span class="badge badge-success m-1">1<sup>st</sup></span> <i class="fas fa-award fa-lg ml-1" style="color: gold"></i>';
      if (index == 1) return '<span class="badge badge-primary m-1">2<sup>nd</sup></span><i class="fas fa-award ml-1" style="color: silver"></i>';
      if (index == 2) return '<span class="badge badge-info m-1">3<sup>rd</sup></span><i class="fas fa-award fa-sm ml-1" style="color: #CD7F32"></i>';
      if (index > 2) return "<span class=\"badge badge-secondary m-1\">".concat(index + 1, "</span>");
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/waiting.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/waiting.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['user', 'uid', 'users', 'time'],
  data: function data() {
    return {
      days: '',
      hours: '',
      minutes: '',
      seconds: '',
      schedule: '',
      timer: null,
      qr: false
    };
  },
  methods: {
    kickingUser: function kickingUser(id) {
      this.$emit("kickingUser", id);
    },
    getAvatar: function getAvatar(link) {
      if (link) return link;
      return '/img/avatar.png';
    },
    getAvatarAlt: function getAvatarAlt(name) {
      return name.substring(0, 2);
    },
    getFlag: function getFlag(country) {
      return 'https://flagcdn.com/40x30/' + country + '.png';
    },
    scheduledTimer: function scheduledTimer() {
      var _this = this;
      var countDownDate = new Date(this.time).getTime();
      this.timer = setInterval(function () {
        var now = new Date().getTime();
        var distance = countDownDate - now;
        _this.days = Math.floor(distance / (1000 * 60 * 60 * 24));
        _this.hours = Math.floor(distance % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
        _this.minutes = Math.floor(distance % (1000 * 60 * 60) / (1000 * 60));
        _this.seconds = Math.floor(distance % (1000 * 60) / 1000);
        _this.schedule = _this.days + "d " + _this.hours + "h " + _this.minutes + "m " + _this.seconds + "s ";
        if (distance < 0) {
          clearInterval(_this.timer);
          _this.schedule = '<i class="fas fa-check"></i>';
        }
      }, 1000);
    }
  },
  created: function created() {
    this.scheduledTimer();
    // console.log('scheduledTimer started')
  },

  computed: {
    getQr: function getQr() {
      return 'https://api.qrserver.com/v1/create-qr-code/?size=430x430&data=' + window.location;
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/ExamQuestionTimeMode.vue?vue&type=style&index=0&lang=css&":
/*!*****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/ExamQuestionTimeMode.vue?vue&type=style&index=0&lang=css& ***!
  \*****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ (function(module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, "\n.imageOption {\n    height: 100px;\n    width: 100%;\n}\n.preventClick {\n    position: absolute;\n    height: 100%;\n    background: rgba(0, 0, 0, 0.1);\n    width: 100%;\n    z-index: 999;\n    left: 0px;\n    top: 0px;\n}\n@media screen and (min-width: 480px) {\n.imageOption {\n        height: 170px;\n        width: 100%;\n}\n}\n", ""]);
// Exports
/* harmony default export */ __webpack_exports__["default"] = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/waiting.vue?vue&type=style&index=0&lang=css&":
/*!*****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/waiting.vue?vue&type=style&index=0&lang=css& ***!
  \*****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ (function(module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, "\n.circle{\n        width: 40px;\n        height: 40px;\n        border-radius: 50%;\n        text-align: center;\n        position: absolute;\n        top: 4px;\n        left: 15px;\n        font-size: 1.5rem;\n        background: gray;\n        color: white;\n}\n.flag{\n\t\tposition: absolute;\n\t\tright: 15px;\n\t\ttop: 8px;\n}\n.close{\n    \tposition: absolute;\n    \ttop: -5px;\n    \tright: 0px;\n    \tcolor: red;\n}\n", ""]);
// Exports
/* harmony default export */ __webpack_exports__["default"] = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/ExamQuestionTimeMode.vue?vue&type=style&index=0&lang=css&":
/*!*********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/ExamQuestionTimeMode.vue?vue&type=style&index=0&lang=css& ***!
  \*********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ExamQuestionTimeMode_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./ExamQuestionTimeMode.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/ExamQuestionTimeMode.vue?vue&type=style&index=0&lang=css&");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ExamQuestionTimeMode_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"], options);



/* harmony default export */ __webpack_exports__["default"] = (_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ExamQuestionTimeMode_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"].locals || {});

/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/waiting.vue?vue&type=style&index=0&lang=css&":
/*!*********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/waiting.vue?vue&type=style&index=0&lang=css& ***!
  \*********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_waiting_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./waiting.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/waiting.vue?vue&type=style&index=0&lang=css&");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_waiting_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"], options);



/* harmony default export */ __webpack_exports__["default"] = (_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_waiting_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"].locals || {});

/***/ }),

/***/ "./resources/js/components/games/ExamQuestionTimeMode.vue":
/*!****************************************************************!*\
  !*** ./resources/js/components/games/ExamQuestionTimeMode.vue ***!
  \****************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ExamQuestionTimeMode_vue_vue_type_template_id_c9d71be4___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ExamQuestionTimeMode.vue?vue&type=template&id=c9d71be4& */ "./resources/js/components/games/ExamQuestionTimeMode.vue?vue&type=template&id=c9d71be4&");
/* harmony import */ var _ExamQuestionTimeMode_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ExamQuestionTimeMode.vue?vue&type=script&lang=js& */ "./resources/js/components/games/ExamQuestionTimeMode.vue?vue&type=script&lang=js&");
/* harmony import */ var _ExamQuestionTimeMode_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./ExamQuestionTimeMode.vue?vue&type=style&index=0&lang=css& */ "./resources/js/components/games/ExamQuestionTimeMode.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");



;


/* normalize component */

var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _ExamQuestionTimeMode_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ExamQuestionTimeMode_vue_vue_type_template_id_c9d71be4___WEBPACK_IMPORTED_MODULE_0__.render,
  _ExamQuestionTimeMode_vue_vue_type_template_id_c9d71be4___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/games/ExamQuestionTimeMode.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/helper/result.vue":
/*!***************************************************!*\
  !*** ./resources/js/components/helper/result.vue ***!
  \***************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _result_vue_vue_type_template_id_3dc21663___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./result.vue?vue&type=template&id=3dc21663& */ "./resources/js/components/helper/result.vue?vue&type=template&id=3dc21663&");
/* harmony import */ var _result_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./result.vue?vue&type=script&lang=js& */ "./resources/js/components/helper/result.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _result_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _result_vue_vue_type_template_id_3dc21663___WEBPACK_IMPORTED_MODULE_0__.render,
  _result_vue_vue_type_template_id_3dc21663___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/helper/result.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/helper/waiting.vue":
/*!****************************************************!*\
  !*** ./resources/js/components/helper/waiting.vue ***!
  \****************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _waiting_vue_vue_type_template_id_8d50a412___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./waiting.vue?vue&type=template&id=8d50a412& */ "./resources/js/components/helper/waiting.vue?vue&type=template&id=8d50a412&");
/* harmony import */ var _waiting_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./waiting.vue?vue&type=script&lang=js& */ "./resources/js/components/helper/waiting.vue?vue&type=script&lang=js&");
/* harmony import */ var _waiting_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./waiting.vue?vue&type=style&index=0&lang=css& */ "./resources/js/components/helper/waiting.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");



;


/* normalize component */

var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _waiting_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _waiting_vue_vue_type_template_id_8d50a412___WEBPACK_IMPORTED_MODULE_0__.render,
  _waiting_vue_vue_type_template_id_8d50a412___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/helper/waiting.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/games/ExamQuestionTimeMode.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************!*\
  !*** ./resources/js/components/games/ExamQuestionTimeMode.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ExamQuestionTimeMode_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./ExamQuestionTimeMode.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/ExamQuestionTimeMode.vue?vue&type=script&lang=js&");
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ExamQuestionTimeMode_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/helper/result.vue?vue&type=script&lang=js&":
/*!****************************************************************************!*\
  !*** ./resources/js/components/helper/result.vue?vue&type=script&lang=js& ***!
  \****************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_result_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./result.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/result.vue?vue&type=script&lang=js&");
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_result_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/helper/waiting.vue?vue&type=script&lang=js&":
/*!*****************************************************************************!*\
  !*** ./resources/js/components/helper/waiting.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_waiting_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./waiting.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/waiting.vue?vue&type=script&lang=js&");
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_waiting_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/games/ExamQuestionTimeMode.vue?vue&type=style&index=0&lang=css&":
/*!*************************************************************************************************!*\
  !*** ./resources/js/components/games/ExamQuestionTimeMode.vue?vue&type=style&index=0&lang=css& ***!
  \*************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ExamQuestionTimeMode_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader/dist/cjs.js!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./ExamQuestionTimeMode.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/ExamQuestionTimeMode.vue?vue&type=style&index=0&lang=css&");


/***/ }),

/***/ "./resources/js/components/helper/waiting.vue?vue&type=style&index=0&lang=css&":
/*!*************************************************************************************!*\
  !*** ./resources/js/components/helper/waiting.vue?vue&type=style&index=0&lang=css& ***!
  \*************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_waiting_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader/dist/cjs.js!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./waiting.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/waiting.vue?vue&type=style&index=0&lang=css&");


/***/ }),

/***/ "./resources/js/components/games/ExamQuestionTimeMode.vue?vue&type=template&id=c9d71be4&":
/*!***********************************************************************************************!*\
  !*** ./resources/js/components/games/ExamQuestionTimeMode.vue?vue&type=template&id=c9d71be4& ***!
  \***********************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ExamQuestionTimeMode_vue_vue_type_template_id_c9d71be4___WEBPACK_IMPORTED_MODULE_0__.render; },
/* harmony export */   "staticRenderFns": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ExamQuestionTimeMode_vue_vue_type_template_id_c9d71be4___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns; }
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ExamQuestionTimeMode_vue_vue_type_template_id_c9d71be4___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./ExamQuestionTimeMode.vue?vue&type=template&id=c9d71be4& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/ExamQuestionTimeMode.vue?vue&type=template&id=c9d71be4&");


/***/ }),

/***/ "./resources/js/components/helper/result.vue?vue&type=template&id=3dc21663&":
/*!**********************************************************************************!*\
  !*** ./resources/js/components/helper/result.vue?vue&type=template&id=3dc21663& ***!
  \**********************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_result_vue_vue_type_template_id_3dc21663___WEBPACK_IMPORTED_MODULE_0__.render; },
/* harmony export */   "staticRenderFns": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_result_vue_vue_type_template_id_3dc21663___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns; }
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_result_vue_vue_type_template_id_3dc21663___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./result.vue?vue&type=template&id=3dc21663& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/result.vue?vue&type=template&id=3dc21663&");


/***/ }),

/***/ "./resources/js/components/helper/waiting.vue?vue&type=template&id=8d50a412&":
/*!***********************************************************************************!*\
  !*** ./resources/js/components/helper/waiting.vue?vue&type=template&id=8d50a412& ***!
  \***********************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_waiting_vue_vue_type_template_id_8d50a412___WEBPACK_IMPORTED_MODULE_0__.render; },
/* harmony export */   "staticRenderFns": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_waiting_vue_vue_type_template_id_8d50a412___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns; }
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_waiting_vue_vue_type_template_id_8d50a412___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./waiting.vue?vue&type=template&id=8d50a412& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/waiting.vue?vue&type=template&id=8d50a412&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/ExamQuestionTimeMode.vue?vue&type=template&id=c9d71be4&":
/*!**************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/ExamQuestionTimeMode.vue?vue&type=template&id=c9d71be4& ***!
  \**************************************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": function() { return /* binding */ render; },
/* harmony export */   "staticRenderFns": function() { return /* binding */ staticRenderFns; }
/* harmony export */ });
var render = function () {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _vm.screen.resultWaiting
      ? _c("div", { staticClass: "container" }, [
          _c("div", { staticClass: "winner" }, [
            _c("h3", [_vm._v("Your exam is submitted. ")]),
            _vm._v(" "),
            _c(
              "a",
              {
                staticClass: "btn btn-outline-primary btn-sm",
                attrs: { href: "/exams" },
              },
              [_vm._v("Go Exam List Page")]
            ),
          ]),
        ])
      : _c("div", { staticClass: "container" }, [
          _c("div", { class: { preventClick: _vm.preventClick } }),
          _vm._v(" "),
          _c("div", { staticClass: "row justify-content-center" }, [
            _c(
              "div",
              { staticClass: "col-md-8" },
              [
                _c("div", { staticClass: "progress" }, [
                  _c(
                    "div",
                    {
                      staticClass: "progress-bar progress-bar-striped",
                      class: _vm.progressClass,
                      style: _vm.progressWidth,
                    },
                    [
                      _vm._v(
                        " " +
                          _vm._s(Math.floor(_vm.progress)) +
                          "\n                    "
                      ),
                    ]
                  ),
                ]),
                _vm._v(" "),
                _vm._l(_vm.questions, function (question) {
                  return question.id == _vm.current
                    ? _c("div", { staticClass: "card my-4" }, [
                        _c(
                          "div",
                          {
                            staticClass:
                              "card-body animate__animated animate__backInRight animate__faster",
                          },
                          [
                            _c(
                              "span",
                              { staticClass: "q_num text-right text-muted" },
                              [
                                _vm._v(
                                  "\n                        " +
                                    _vm._s(
                                      _vm.qne2b(
                                        _vm.qid,
                                        _vm.questions.length,
                                        _vm.user.lang
                                      )
                                    ) +
                                    "\n                    "
                                ),
                              ]
                            ),
                            _vm._v(" "),
                            question.fileType == "image"
                              ? _c("img", {
                                  staticClass:
                                    "image w-100 mt-1 rounded img-thumbnail",
                                  staticStyle: { "max-height": "70vh" },
                                  attrs: {
                                    src: "/" + question.question_file_link,
                                    alt: "",
                                  },
                                })
                              : _vm._e(),
                            _vm._v(" "),
                            question.fileType == "video"
                              ? _c(
                                  "video",
                                  {
                                    staticClass:
                                      "image w-100 mt-1 rounded img-thumbnail",
                                    attrs: { autoplay: "" },
                                    on: {
                                      ended: function ($event) {
                                        return _vm.onEnd()
                                      },
                                      play: function ($event) {
                                        return _vm.onStart()
                                      },
                                    },
                                  },
                                  [
                                    _c("source", {
                                      attrs: {
                                        src: "/" + question.question_file_link,
                                        type: "video/mp4",
                                      },
                                    }),
                                  ]
                                )
                              : _vm._e(),
                            _vm._v(" "),
                            question.fileType == "audio"
                              ? _c("div", { staticClass: "audio" }, [
                                  _c(
                                    "audio",
                                    {
                                      attrs: { controls: "", autoplay: "" },
                                      on: {
                                        ended: function ($event) {
                                          return _vm.onEnd()
                                        },
                                        play: function ($event) {
                                          return _vm.onStart()
                                        },
                                      },
                                    },
                                    [
                                      _c("source", {
                                        attrs: {
                                          src:
                                            "/" + question.question_file_link,
                                          type: "audio/mpeg",
                                        },
                                      }),
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c("div", { attrs: { id: "ar" } }),
                                ])
                              : _vm._e(),
                            _vm._v(" "),
                            _c(
                              "div",
                              {
                                directives: [
                                  {
                                    name: "show",
                                    rawName: "v-show",
                                    value: _vm.av,
                                    expression: "av",
                                  },
                                ],
                              },
                              [
                                _c("div", { staticClass: "card" }, [
                                  _c("div", { staticClass: "card-header" }, [
                                    _c(
                                      "div",
                                      {
                                        staticClass:
                                          "d-flex flex-row align-items-center question-title",
                                      },
                                      [
                                        _c(
                                          "h3",
                                          { staticClass: "text-danger" },
                                          [_vm._v("Q.")]
                                        ),
                                        _vm._v(" "),
                                        _c("h5", { staticClass: "mt-1 ml-2" }, [
                                          _vm._v(
                                            _vm._s(
                                              _vm.tbe(
                                                question.bd_question_text,
                                                question.question_text,
                                                _vm.user.lang
                                              )
                                            )
                                          ),
                                        ]),
                                      ]
                                    ),
                                  ]),
                                ]),
                                _vm._v(" "),
                                _vm.sqo
                                  ? _c(
                                      "div",
                                      {
                                        staticClass:
                                          "animate__animated animate__zoomIn animate__faster d-flex flex-wrap",
                                        class: {
                                          "row justify-content-center justify-item-center":
                                            _vm.imageOption(question.options),
                                        },
                                      },
                                      _vm._l(
                                        question.options,
                                        function (option, i) {
                                          return _c(
                                            "div",
                                            {
                                              staticClass: "col-md-6 px-1",
                                              class: [
                                                option.flag == "img"
                                                  ? "col-6"
                                                  : " col-12",
                                              ],
                                            },
                                            [
                                              option.flag != "img"
                                                ? _c(
                                                    "div",
                                                    {
                                                      staticClass: "list-group",
                                                      class: _vm.getOptionClass(
                                                        i,
                                                        _vm.challenge
                                                          .option_view_time
                                                      ),
                                                    },
                                                    [
                                                      _c("span", {
                                                        staticClass:
                                                          "list-group-item list-group-item-action cursor my-1",
                                                        domProps: {
                                                          innerHTML: _vm._s(
                                                            _vm.tbe(
                                                              option.bd_option,
                                                              option.option,
                                                              _vm.user.lang
                                                            )
                                                          ),
                                                        },
                                                        on: {
                                                          click: function (
                                                            $event
                                                          ) {
                                                            _vm.checkAnswer(
                                                              question,
                                                              _vm.tbe(
                                                                option.bd_option,
                                                                option.option,
                                                                _vm.user.lang
                                                              ),
                                                              option.correct
                                                            )
                                                          },
                                                        },
                                                      }),
                                                    ]
                                                  )
                                                : _c(
                                                    "div",
                                                    {
                                                      staticClass:
                                                        "cursor my-1 imageDiv",
                                                      class: _vm.getOptionClass(
                                                        i,
                                                        _vm.challenge
                                                          .option_view_time
                                                      ),
                                                      on: {
                                                        click: function (
                                                          $event
                                                        ) {
                                                          return _vm.checkAnswer(
                                                            question,
                                                            option.img_link,
                                                            option.correct
                                                          )
                                                        },
                                                      },
                                                    },
                                                    [
                                                      _c("img", {
                                                        staticClass:
                                                          "imageOption mt-1 rounded img-thumbnail",
                                                        attrs: {
                                                          src:
                                                            "/" +
                                                            option.img_link,
                                                          alt: "",
                                                        },
                                                      }),
                                                    ]
                                                  ),
                                            ]
                                          )
                                        }
                                      ),
                                      0
                                    )
                                  : _vm._e(),
                              ]
                            ),
                          ]
                        ),
                      ])
                    : _vm._e()
                }),
              ],
              2
            ),
            _vm._v(" "),
            _c("div", { staticClass: "col-md-4" }, [
              _c("div", { staticClass: "card my-4" }, [
                _c("div", { staticClass: "card-header" }, [
                  _vm._v(
                    "\n                        " +
                      _vm._s(
                        _vm.user.lang == "gb"
                          ? "Exam Details"
                          : "পরীক্ষার বিবরণ"
                      ) +
                      "\n                        "
                  ),
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "card-body" }, [
                  _c(
                    "div",
                    {
                      staticClass: "d-flex justify-content-between flex-column",
                    },
                    [
                      _c("span", [
                        _vm._v(
                          " " +
                            _vm._s(
                              _vm.user.lang == "gb"
                                ? "Exam Name"
                                : "পরীক্ষার নাম"
                            ) +
                            " : " +
                            _vm._s(
                              _vm.tbe(
                                _vm.challenge.exam_bn,
                                _vm.challenge.exam_en,
                                _vm.user.lang
                              )
                            )
                        ),
                      ]),
                      _vm._v(" "),
                      _c("span", [
                        _vm._v(
                          " " +
                            _vm._s(
                              _vm.user.lang == "gb" ? "Total Time" : "মোট সময়"
                            ) +
                            " : " +
                            _vm._s(_vm.totalTime())
                        ),
                      ]),
                      _vm._v(" "),
                      _c("span", [
                        _vm._v(
                          _vm._s(
                            _vm.user.lang == "gb"
                              ? "Time per question"
                              : "প্রতি প্রশ্নের সময়"
                          ) +
                            " : " +
                            _vm._s(_vm.perQTime())
                        ),
                      ]),
                      _vm._v(" "),
                      _c("span", [
                        _vm._v(
                          _vm._s(
                            _vm.user.lang == "gb"
                              ? "Marks per question"
                              : "প্রতি প্রশ্নের নম্বর"
                          ) +
                            " : " +
                            _vm._s(
                              _vm.user.lang == "gb"
                                ? _vm.challenge.each_question_mark
                                : _vm.q2bNumber(
                                    _vm.challenge.each_question_mark
                                  )
                            )
                        ),
                      ]),
                      _vm._v(" "),
                      _c("span", [
                        _vm._v(
                          _vm._s(
                            _vm.user.lang == "gb"
                              ? "Negative mark"
                              : "নেগেটিভ নম্বর"
                          ) +
                            " : " +
                            _vm._s(
                              _vm.user.lang == "gb"
                                ? _vm.negativeMark()
                                : _vm.q2bNumber(_vm.negativeMark())
                            )
                        ),
                      ]),
                      _vm._v(" "),
                      _c("span", [
                        _vm._v(
                          " " +
                            _vm._s(
                              _vm.user.lang == "gb"
                                ? "Total Number"
                                : "মোট নম্বর"
                            ) +
                            " : " +
                            _vm._s(
                              _vm.user.lang == "gb"
                                ? _vm.questions.length *
                                    _vm.challenge.each_question_mark
                                : _vm.q2bNumber(
                                    _vm.questions.length *
                                      _vm.challenge.each_question_mark
                                  )
                            )
                        ),
                      ]),
                    ]
                  ),
                ]),
              ]),
            ]),
          ]),
        ]),
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/result.vue?vue&type=template&id=3dc21663&":
/*!*************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/result.vue?vue&type=template&id=3dc21663& ***!
  \*************************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": function() { return /* binding */ render; },
/* harmony export */   "staticRenderFns": function() { return /* binding */ staticRenderFns; }
/* harmony export */ });
var render = function () {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "result" }, [
    _c("div", { staticClass: "card mt-1", staticStyle: { width: "24rem" } }, [
      _c("div", { staticClass: "card-header" }, [_vm._v("Results")]),
      _vm._v(" "),
      _c("div", { staticClass: "card-body" }, [
        _c(
          "ul",
          { staticClass: "list-group" },
          _vm._l(_vm.results, function (v, i) {
            return _c("li", { key: i, staticClass: "list-group-item" }, [
              _c("span", { domProps: { innerHTML: _vm._s(_vm.getMedel(i)) } }),
              _vm._v("\n                        " + _vm._s(v.name)),
              _c(
                "span",
                {
                  staticClass:
                    "badge badge-primary float-right mt-1 text-white",
                },
                [_vm._v(_vm._s(v.score))]
              ),
            ])
          }),
          0
        ),
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "card-footer" }, [
        _c(
          "button",
          { staticClass: "btn btn-sm btn-success", on: { click: _vm.back } },
          [_vm._v("Dashboard")]
        ),
      ]),
    ]),
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/waiting.vue?vue&type=template&id=8d50a412&":
/*!**************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/waiting.vue?vue&type=template&id=8d50a412& ***!
  \**************************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": function() { return /* binding */ render; },
/* harmony export */   "staticRenderFns": function() { return /* binding */ staticRenderFns; }
/* harmony export */ });
var render = function () {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "waiting" }, [
    _c("div", { staticClass: "card", staticStyle: { "min-width": "24rem" } }, [
      _c("div", { staticClass: "card-header" }, [
        _vm.user.id != _vm.uid
          ? _c("span", { staticClass: "ml-1 text-primary" }, [
              _vm._v("Please wait, the Quiz Host will start the game soon.."),
            ])
          : _vm._e(),
      ]),
      _vm._v(" "),
      _c(
        "div",
        {
          staticClass: "card-body",
          staticStyle: { "max-height": "90vh", overflow: "auto" },
        },
        [
          _vm.qr
            ? _c("img", {
                staticClass: "img-thumbnail",
                attrs: { src: _vm.getQr, alt: "QR Code" },
              })
            : _vm._e(),
          _vm._v(" "),
          _c(
            "ul",
            { staticClass: "list-group" },
            _vm._l(_vm.users, function (u) {
              return _c(
                "li",
                {
                  key: u.id,
                  staticClass: "list-group-item",
                  class: { active: u.id == _vm.user.id },
                },
                [
                  _c("img", {
                    staticClass: "circle mr-2",
                    attrs: {
                      src: _vm.getAvatar(u.avatar),
                      alt: _vm.getAvatarAlt(u.name),
                    },
                  }),
                  _vm._v(" "),
                  _c("span", { staticClass: "ml-5" }, [_vm._v(_vm._s(u.name))]),
                  _vm._v(" "),
                  u.id == _vm.uid
                    ? _c("span", { staticClass: "ml-1 badge badge-info" }, [
                        _vm._v("Host"),
                      ])
                    : _vm._e(),
                  _vm._v(" "),
                  _c("span", { staticClass: "flag" }, [
                    _c("img", { attrs: { src: _vm.getFlag(u.country) } }),
                  ]),
                  _vm._v(" "),
                  u.id != _vm.user.id && _vm.user.id == _vm.uid
                    ? _c(
                        "button",
                        {
                          staticClass: "close",
                          on: {
                            click: function ($event) {
                              return _vm.kickingUser(u.id)
                            },
                          },
                        },
                        [
                          _c("span", { attrs: { title: "Kick User" } }, [
                            _vm._v("×"),
                          ]),
                        ]
                      )
                    : _vm._e(),
                ]
              )
            }),
            0
          ),
          _vm._v(" "),
          _c("div", { staticClass: "d-flex justify-content-between" }, [
            _vm.user.id == _vm.uid
              ? _c(
                  "a",
                  {
                    staticClass:
                      "btn btn-sm btn-outline-success mt-4 pull-right",
                    on: {
                      click: function ($event) {
                        return _vm.$emit("gameStart")
                      },
                    },
                  },
                  [_vm._v("START")]
                )
              : _vm._e(),
            _vm._v(" "),
            _c(
              "a",
              {
                staticClass: "btn btn-sm btn-outline-danger mt-4",
                on: {
                  click: function ($event) {
                    _vm.qr = !_vm.qr
                  },
                },
              },
              [_c("i", { staticClass: "fas fa-check" })]
            ),
          ]),
        ]
      ),
    ]),
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js":
/*!********************************************************************!*\
  !*** ./node_modules/vue-loader/lib/runtime/componentNormalizer.js ***!
  \********************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ normalizeComponent; }
/* harmony export */ });
/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

function normalizeComponent (
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier, /* server only */
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (render) {
    options.render = render
    options.staticRenderFns = staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = 'data-v-' + scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = shadowMode
      ? function () {
        injectStyles.call(
          this,
          (options.functional ? this.parent : this).$root.$options.shadowRoot
        )
      }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functional component in vue file
      var originalRender = options.render
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}


/***/ })

}]);
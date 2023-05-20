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
  props: ['results', 'lastQuestion', 'resultDetail', 'user', 'uid', 'requestHostUser'],
  data: function data() {
    return {
      showResult: true,
      resultDetailData: null,
      makeUid: this.user.id
    };
  },
  mounted: function mounted() {
    // console.log('session data', sessionStorage.SingleGameUser)
    console.log('result data', this.resultDetailData);
  },
  methods: {
    isDisabledHost: function isDisabledHost() {
      return this.uid == this.makeUid;
    },
    isDisabled: function isDisabled() {
      // you can  check your form is filled or not here.
      return this.requestHostUser != null;
      // return this.requestHostUser != null ? (this.user.id == this.requestHostUser.id) : false
    },
    checkURL: function checkURL(url) {
      return url.match(/\.(jpeg|jpg|gif|png)$/) != null;
    },
    selectUid: function selectUid(id) {
      console.log('id data..', id);
      if (this.uid == this.user.id) {
        this.makeUid = id;
      }
    },
    showDetail: function showDetail() {
      var _this = this;
      if (this.resultDetailData != null) {
        this.showResult = !this.showResult;
      } else {
        this.resultDetailData = this.resultDetail.filter(function (user) {
          return user.uid == _this.user.id;
        });
        this.showResult = !this.showResult;
      }
    },
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
/* harmony import */ var qrcode_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! qrcode.vue */ "./node_modules/qrcode.vue/dist/qrcode.vue.esm.js");
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

 // Share Link

/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['user', 'uid', 'users', 'time'],
  components: {
    QrcodeVue: qrcode_vue__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  data: function data() {
    return {
      days: '',
      hours: '',
      minutes: '',
      seconds: '',
      schedule: '',
      timer: null,
      qr: false,
      size: 300,
      defaultTime: 30,
      value: window.location.toString()
    };
  },
  methods: {
    back: function back() {
      // window.history.back()
      window.location = '/game/mode/challenge';
    },
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

/***/ "./node_modules/qrcode.vue/dist/qrcode.vue.esm.js":
/*!********************************************************!*\
  !*** ./node_modules/qrcode.vue/dist/qrcode.vue.esm.js ***!
  \********************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/*!
 * qrcode.vue v1.7.0
 * A Vue component to generate QRCode.
 * © 2017-2019 @scopewu(https://github.com/scopewu)
 * MIT License.
 */
var mode = {
  MODE_NUMBER: 1 << 0,
  MODE_ALPHA_NUM: 1 << 1,
  MODE_8BIT_BYTE: 1 << 2,
  MODE_KANJI: 1 << 3
};

function QR8bitByte(data) {
  this.mode = mode.MODE_8BIT_BYTE;
  this.data = data;
}

QR8bitByte.prototype = {
  getLength: function (buffer) {
    return this.data.length;
  },
  write: function (buffer) {
    for (var i = 0; i < this.data.length; i++) {
      // not JIS ...
      buffer.put(this.data.charCodeAt(i), 8);
    }
  }
};
var _8BitByte = QR8bitByte;

var ErrorCorrectLevel = {
  L: 1,
  M: 0,
  Q: 3,
  H: 2
};

function QRRSBlock(totalCount, dataCount) {
  this.totalCount = totalCount;
  this.dataCount = dataCount;
}

QRRSBlock.RS_BLOCK_TABLE = [// L
// M
// Q
// H
// 1
[1, 26, 19], [1, 26, 16], [1, 26, 13], [1, 26, 9], // 2
[1, 44, 34], [1, 44, 28], [1, 44, 22], [1, 44, 16], // 3
[1, 70, 55], [1, 70, 44], [2, 35, 17], [2, 35, 13], // 4		
[1, 100, 80], [2, 50, 32], [2, 50, 24], [4, 25, 9], // 5
[1, 134, 108], [2, 67, 43], [2, 33, 15, 2, 34, 16], [2, 33, 11, 2, 34, 12], // 6
[2, 86, 68], [4, 43, 27], [4, 43, 19], [4, 43, 15], // 7		
[2, 98, 78], [4, 49, 31], [2, 32, 14, 4, 33, 15], [4, 39, 13, 1, 40, 14], // 8
[2, 121, 97], [2, 60, 38, 2, 61, 39], [4, 40, 18, 2, 41, 19], [4, 40, 14, 2, 41, 15], // 9
[2, 146, 116], [3, 58, 36, 2, 59, 37], [4, 36, 16, 4, 37, 17], [4, 36, 12, 4, 37, 13], // 10		
[2, 86, 68, 2, 87, 69], [4, 69, 43, 1, 70, 44], [6, 43, 19, 2, 44, 20], [6, 43, 15, 2, 44, 16], // 11
[4, 101, 81], [1, 80, 50, 4, 81, 51], [4, 50, 22, 4, 51, 23], [3, 36, 12, 8, 37, 13], // 12
[2, 116, 92, 2, 117, 93], [6, 58, 36, 2, 59, 37], [4, 46, 20, 6, 47, 21], [7, 42, 14, 4, 43, 15], // 13
[4, 133, 107], [8, 59, 37, 1, 60, 38], [8, 44, 20, 4, 45, 21], [12, 33, 11, 4, 34, 12], // 14
[3, 145, 115, 1, 146, 116], [4, 64, 40, 5, 65, 41], [11, 36, 16, 5, 37, 17], [11, 36, 12, 5, 37, 13], // 15
[5, 109, 87, 1, 110, 88], [5, 65, 41, 5, 66, 42], [5, 54, 24, 7, 55, 25], [11, 36, 12], // 16
[5, 122, 98, 1, 123, 99], [7, 73, 45, 3, 74, 46], [15, 43, 19, 2, 44, 20], [3, 45, 15, 13, 46, 16], // 17
[1, 135, 107, 5, 136, 108], [10, 74, 46, 1, 75, 47], [1, 50, 22, 15, 51, 23], [2, 42, 14, 17, 43, 15], // 18
[5, 150, 120, 1, 151, 121], [9, 69, 43, 4, 70, 44], [17, 50, 22, 1, 51, 23], [2, 42, 14, 19, 43, 15], // 19
[3, 141, 113, 4, 142, 114], [3, 70, 44, 11, 71, 45], [17, 47, 21, 4, 48, 22], [9, 39, 13, 16, 40, 14], // 20
[3, 135, 107, 5, 136, 108], [3, 67, 41, 13, 68, 42], [15, 54, 24, 5, 55, 25], [15, 43, 15, 10, 44, 16], // 21
[4, 144, 116, 4, 145, 117], [17, 68, 42], [17, 50, 22, 6, 51, 23], [19, 46, 16, 6, 47, 17], // 22
[2, 139, 111, 7, 140, 112], [17, 74, 46], [7, 54, 24, 16, 55, 25], [34, 37, 13], // 23
[4, 151, 121, 5, 152, 122], [4, 75, 47, 14, 76, 48], [11, 54, 24, 14, 55, 25], [16, 45, 15, 14, 46, 16], // 24
[6, 147, 117, 4, 148, 118], [6, 73, 45, 14, 74, 46], [11, 54, 24, 16, 55, 25], [30, 46, 16, 2, 47, 17], // 25
[8, 132, 106, 4, 133, 107], [8, 75, 47, 13, 76, 48], [7, 54, 24, 22, 55, 25], [22, 45, 15, 13, 46, 16], // 26
[10, 142, 114, 2, 143, 115], [19, 74, 46, 4, 75, 47], [28, 50, 22, 6, 51, 23], [33, 46, 16, 4, 47, 17], // 27
[8, 152, 122, 4, 153, 123], [22, 73, 45, 3, 74, 46], [8, 53, 23, 26, 54, 24], [12, 45, 15, 28, 46, 16], // 28
[3, 147, 117, 10, 148, 118], [3, 73, 45, 23, 74, 46], [4, 54, 24, 31, 55, 25], [11, 45, 15, 31, 46, 16], // 29
[7, 146, 116, 7, 147, 117], [21, 73, 45, 7, 74, 46], [1, 53, 23, 37, 54, 24], [19, 45, 15, 26, 46, 16], // 30
[5, 145, 115, 10, 146, 116], [19, 75, 47, 10, 76, 48], [15, 54, 24, 25, 55, 25], [23, 45, 15, 25, 46, 16], // 31
[13, 145, 115, 3, 146, 116], [2, 74, 46, 29, 75, 47], [42, 54, 24, 1, 55, 25], [23, 45, 15, 28, 46, 16], // 32
[17, 145, 115], [10, 74, 46, 23, 75, 47], [10, 54, 24, 35, 55, 25], [19, 45, 15, 35, 46, 16], // 33
[17, 145, 115, 1, 146, 116], [14, 74, 46, 21, 75, 47], [29, 54, 24, 19, 55, 25], [11, 45, 15, 46, 46, 16], // 34
[13, 145, 115, 6, 146, 116], [14, 74, 46, 23, 75, 47], [44, 54, 24, 7, 55, 25], [59, 46, 16, 1, 47, 17], // 35
[12, 151, 121, 7, 152, 122], [12, 75, 47, 26, 76, 48], [39, 54, 24, 14, 55, 25], [22, 45, 15, 41, 46, 16], // 36
[6, 151, 121, 14, 152, 122], [6, 75, 47, 34, 76, 48], [46, 54, 24, 10, 55, 25], [2, 45, 15, 64, 46, 16], // 37
[17, 152, 122, 4, 153, 123], [29, 74, 46, 14, 75, 47], [49, 54, 24, 10, 55, 25], [24, 45, 15, 46, 46, 16], // 38
[4, 152, 122, 18, 153, 123], [13, 74, 46, 32, 75, 47], [48, 54, 24, 14, 55, 25], [42, 45, 15, 32, 46, 16], // 39
[20, 147, 117, 4, 148, 118], [40, 75, 47, 7, 76, 48], [43, 54, 24, 22, 55, 25], [10, 45, 15, 67, 46, 16], // 40
[19, 148, 118, 6, 149, 119], [18, 75, 47, 31, 76, 48], [34, 54, 24, 34, 55, 25], [20, 45, 15, 61, 46, 16]];

QRRSBlock.getRSBlocks = function (typeNumber, errorCorrectLevel) {
  var rsBlock = QRRSBlock.getRsBlockTable(typeNumber, errorCorrectLevel);

  if (rsBlock == undefined) {
    throw new Error("bad rs block @ typeNumber:" + typeNumber + "/errorCorrectLevel:" + errorCorrectLevel);
  }

  var length = rsBlock.length / 3;
  var list = new Array();

  for (var i = 0; i < length; i++) {
    var count = rsBlock[i * 3 + 0];
    var totalCount = rsBlock[i * 3 + 1];
    var dataCount = rsBlock[i * 3 + 2];

    for (var j = 0; j < count; j++) {
      list.push(new QRRSBlock(totalCount, dataCount));
    }
  }

  return list;
};

QRRSBlock.getRsBlockTable = function (typeNumber, errorCorrectLevel) {
  switch (errorCorrectLevel) {
    case ErrorCorrectLevel.L:
      return QRRSBlock.RS_BLOCK_TABLE[(typeNumber - 1) * 4 + 0];

    case ErrorCorrectLevel.M:
      return QRRSBlock.RS_BLOCK_TABLE[(typeNumber - 1) * 4 + 1];

    case ErrorCorrectLevel.Q:
      return QRRSBlock.RS_BLOCK_TABLE[(typeNumber - 1) * 4 + 2];

    case ErrorCorrectLevel.H:
      return QRRSBlock.RS_BLOCK_TABLE[(typeNumber - 1) * 4 + 3];

    default:
      return undefined;
  }
};

var RSBlock = QRRSBlock;

function QRBitBuffer() {
  this.buffer = new Array();
  this.length = 0;
}

QRBitBuffer.prototype = {
  get: function (index) {
    var bufIndex = Math.floor(index / 8);
    return (this.buffer[bufIndex] >>> 7 - index % 8 & 1) == 1;
  },
  put: function (num, length) {
    for (var i = 0; i < length; i++) {
      this.putBit((num >>> length - i - 1 & 1) == 1);
    }
  },
  getLengthInBits: function () {
    return this.length;
  },
  putBit: function (bit) {
    var bufIndex = Math.floor(this.length / 8);

    if (this.buffer.length <= bufIndex) {
      this.buffer.push(0);
    }

    if (bit) {
      this.buffer[bufIndex] |= 0x80 >>> this.length % 8;
    }

    this.length++;
  }
};
var BitBuffer = QRBitBuffer;

var QRMath = {
  glog: function (n) {
    if (n < 1) {
      throw new Error("glog(" + n + ")");
    }

    return QRMath.LOG_TABLE[n];
  },
  gexp: function (n) {
    while (n < 0) {
      n += 255;
    }

    while (n >= 256) {
      n -= 255;
    }

    return QRMath.EXP_TABLE[n];
  },
  EXP_TABLE: new Array(256),
  LOG_TABLE: new Array(256)
};

for (var i = 0; i < 8; i++) {
  QRMath.EXP_TABLE[i] = 1 << i;
}

for (var i = 8; i < 256; i++) {
  QRMath.EXP_TABLE[i] = QRMath.EXP_TABLE[i - 4] ^ QRMath.EXP_TABLE[i - 5] ^ QRMath.EXP_TABLE[i - 6] ^ QRMath.EXP_TABLE[i - 8];
}

for (var i = 0; i < 255; i++) {
  QRMath.LOG_TABLE[QRMath.EXP_TABLE[i]] = i;
}

var math = QRMath;

function QRPolynomial(num, shift) {
  if (num.length == undefined) {
    throw new Error(num.length + "/" + shift);
  }

  var offset = 0;

  while (offset < num.length && num[offset] == 0) {
    offset++;
  }

  this.num = new Array(num.length - offset + shift);

  for (var i = 0; i < num.length - offset; i++) {
    this.num[i] = num[i + offset];
  }
}

QRPolynomial.prototype = {
  get: function (index) {
    return this.num[index];
  },
  getLength: function () {
    return this.num.length;
  },
  multiply: function (e) {
    var num = new Array(this.getLength() + e.getLength() - 1);

    for (var i = 0; i < this.getLength(); i++) {
      for (var j = 0; j < e.getLength(); j++) {
        num[i + j] ^= math.gexp(math.glog(this.get(i)) + math.glog(e.get(j)));
      }
    }

    return new QRPolynomial(num, 0);
  },
  mod: function (e) {
    if (this.getLength() - e.getLength() < 0) {
      return this;
    }

    var ratio = math.glog(this.get(0)) - math.glog(e.get(0));
    var num = new Array(this.getLength());

    for (var i = 0; i < this.getLength(); i++) {
      num[i] = this.get(i);
    }

    for (var i = 0; i < e.getLength(); i++) {
      num[i] ^= math.gexp(math.glog(e.get(i)) + ratio);
    } // recursive call


    return new QRPolynomial(num, 0).mod(e);
  }
};
var Polynomial = QRPolynomial;

var QRMaskPattern = {
  PATTERN000: 0,
  PATTERN001: 1,
  PATTERN010: 2,
  PATTERN011: 3,
  PATTERN100: 4,
  PATTERN101: 5,
  PATTERN110: 6,
  PATTERN111: 7
};
var QRUtil = {
  PATTERN_POSITION_TABLE: [[], [6, 18], [6, 22], [6, 26], [6, 30], [6, 34], [6, 22, 38], [6, 24, 42], [6, 26, 46], [6, 28, 50], [6, 30, 54], [6, 32, 58], [6, 34, 62], [6, 26, 46, 66], [6, 26, 48, 70], [6, 26, 50, 74], [6, 30, 54, 78], [6, 30, 56, 82], [6, 30, 58, 86], [6, 34, 62, 90], [6, 28, 50, 72, 94], [6, 26, 50, 74, 98], [6, 30, 54, 78, 102], [6, 28, 54, 80, 106], [6, 32, 58, 84, 110], [6, 30, 58, 86, 114], [6, 34, 62, 90, 118], [6, 26, 50, 74, 98, 122], [6, 30, 54, 78, 102, 126], [6, 26, 52, 78, 104, 130], [6, 30, 56, 82, 108, 134], [6, 34, 60, 86, 112, 138], [6, 30, 58, 86, 114, 142], [6, 34, 62, 90, 118, 146], [6, 30, 54, 78, 102, 126, 150], [6, 24, 50, 76, 102, 128, 154], [6, 28, 54, 80, 106, 132, 158], [6, 32, 58, 84, 110, 136, 162], [6, 26, 54, 82, 110, 138, 166], [6, 30, 58, 86, 114, 142, 170]],
  G15: 1 << 10 | 1 << 8 | 1 << 5 | 1 << 4 | 1 << 2 | 1 << 1 | 1 << 0,
  G18: 1 << 12 | 1 << 11 | 1 << 10 | 1 << 9 | 1 << 8 | 1 << 5 | 1 << 2 | 1 << 0,
  G15_MASK: 1 << 14 | 1 << 12 | 1 << 10 | 1 << 4 | 1 << 1,
  getBCHTypeInfo: function (data) {
    var d = data << 10;

    while (QRUtil.getBCHDigit(d) - QRUtil.getBCHDigit(QRUtil.G15) >= 0) {
      d ^= QRUtil.G15 << QRUtil.getBCHDigit(d) - QRUtil.getBCHDigit(QRUtil.G15);
    }

    return (data << 10 | d) ^ QRUtil.G15_MASK;
  },
  getBCHTypeNumber: function (data) {
    var d = data << 12;

    while (QRUtil.getBCHDigit(d) - QRUtil.getBCHDigit(QRUtil.G18) >= 0) {
      d ^= QRUtil.G18 << QRUtil.getBCHDigit(d) - QRUtil.getBCHDigit(QRUtil.G18);
    }

    return data << 12 | d;
  },
  getBCHDigit: function (data) {
    var digit = 0;

    while (data != 0) {
      digit++;
      data >>>= 1;
    }

    return digit;
  },
  getPatternPosition: function (typeNumber) {
    return QRUtil.PATTERN_POSITION_TABLE[typeNumber - 1];
  },
  getMask: function (maskPattern, i, j) {
    switch (maskPattern) {
      case QRMaskPattern.PATTERN000:
        return (i + j) % 2 == 0;

      case QRMaskPattern.PATTERN001:
        return i % 2 == 0;

      case QRMaskPattern.PATTERN010:
        return j % 3 == 0;

      case QRMaskPattern.PATTERN011:
        return (i + j) % 3 == 0;

      case QRMaskPattern.PATTERN100:
        return (Math.floor(i / 2) + Math.floor(j / 3)) % 2 == 0;

      case QRMaskPattern.PATTERN101:
        return i * j % 2 + i * j % 3 == 0;

      case QRMaskPattern.PATTERN110:
        return (i * j % 2 + i * j % 3) % 2 == 0;

      case QRMaskPattern.PATTERN111:
        return (i * j % 3 + (i + j) % 2) % 2 == 0;

      default:
        throw new Error("bad maskPattern:" + maskPattern);
    }
  },
  getErrorCorrectPolynomial: function (errorCorrectLength) {
    var a = new Polynomial([1], 0);

    for (var i = 0; i < errorCorrectLength; i++) {
      a = a.multiply(new Polynomial([1, math.gexp(i)], 0));
    }

    return a;
  },
  getLengthInBits: function (mode$1, type) {
    if (1 <= type && type < 10) {
      // 1 - 9
      switch (mode$1) {
        case mode.MODE_NUMBER:
          return 10;

        case mode.MODE_ALPHA_NUM:
          return 9;

        case mode.MODE_8BIT_BYTE:
          return 8;

        case mode.MODE_KANJI:
          return 8;

        default:
          throw new Error("mode:" + mode$1);
      }
    } else if (type < 27) {
      // 10 - 26
      switch (mode$1) {
        case mode.MODE_NUMBER:
          return 12;

        case mode.MODE_ALPHA_NUM:
          return 11;

        case mode.MODE_8BIT_BYTE:
          return 16;

        case mode.MODE_KANJI:
          return 10;

        default:
          throw new Error("mode:" + mode$1);
      }
    } else if (type < 41) {
      // 27 - 40
      switch (mode$1) {
        case mode.MODE_NUMBER:
          return 14;

        case mode.MODE_ALPHA_NUM:
          return 13;

        case mode.MODE_8BIT_BYTE:
          return 16;

        case mode.MODE_KANJI:
          return 12;

        default:
          throw new Error("mode:" + mode$1);
      }
    } else {
      throw new Error("type:" + type);
    }
  },
  getLostPoint: function (qrCode) {
    var moduleCount = qrCode.getModuleCount();
    var lostPoint = 0; // LEVEL1

    for (var row = 0; row < moduleCount; row++) {
      for (var col = 0; col < moduleCount; col++) {
        var sameCount = 0;
        var dark = qrCode.isDark(row, col);

        for (var r = -1; r <= 1; r++) {
          if (row + r < 0 || moduleCount <= row + r) {
            continue;
          }

          for (var c = -1; c <= 1; c++) {
            if (col + c < 0 || moduleCount <= col + c) {
              continue;
            }

            if (r == 0 && c == 0) {
              continue;
            }

            if (dark == qrCode.isDark(row + r, col + c)) {
              sameCount++;
            }
          }
        }

        if (sameCount > 5) {
          lostPoint += 3 + sameCount - 5;
        }
      }
    } // LEVEL2


    for (var row = 0; row < moduleCount - 1; row++) {
      for (var col = 0; col < moduleCount - 1; col++) {
        var count = 0;
        if (qrCode.isDark(row, col)) count++;
        if (qrCode.isDark(row + 1, col)) count++;
        if (qrCode.isDark(row, col + 1)) count++;
        if (qrCode.isDark(row + 1, col + 1)) count++;

        if (count == 0 || count == 4) {
          lostPoint += 3;
        }
      }
    } // LEVEL3


    for (var row = 0; row < moduleCount; row++) {
      for (var col = 0; col < moduleCount - 6; col++) {
        if (qrCode.isDark(row, col) && !qrCode.isDark(row, col + 1) && qrCode.isDark(row, col + 2) && qrCode.isDark(row, col + 3) && qrCode.isDark(row, col + 4) && !qrCode.isDark(row, col + 5) && qrCode.isDark(row, col + 6)) {
          lostPoint += 40;
        }
      }
    }

    for (var col = 0; col < moduleCount; col++) {
      for (var row = 0; row < moduleCount - 6; row++) {
        if (qrCode.isDark(row, col) && !qrCode.isDark(row + 1, col) && qrCode.isDark(row + 2, col) && qrCode.isDark(row + 3, col) && qrCode.isDark(row + 4, col) && !qrCode.isDark(row + 5, col) && qrCode.isDark(row + 6, col)) {
          lostPoint += 40;
        }
      }
    } // LEVEL4


    var darkCount = 0;

    for (var col = 0; col < moduleCount; col++) {
      for (var row = 0; row < moduleCount; row++) {
        if (qrCode.isDark(row, col)) {
          darkCount++;
        }
      }
    }

    var ratio = Math.abs(100 * darkCount / moduleCount / moduleCount - 50) / 5;
    lostPoint += ratio * 10;
    return lostPoint;
  }
};
var util = QRUtil;

function QRCode(typeNumber, errorCorrectLevel) {
  this.typeNumber = typeNumber;
  this.errorCorrectLevel = errorCorrectLevel;
  this.modules = null;
  this.moduleCount = 0;
  this.dataCache = null;
  this.dataList = [];
} // for client side minification


var proto = QRCode.prototype;

proto.addData = function (data) {
  var newData = new _8BitByte(data);
  this.dataList.push(newData);
  this.dataCache = null;
};

proto.isDark = function (row, col) {
  if (row < 0 || this.moduleCount <= row || col < 0 || this.moduleCount <= col) {
    throw new Error(row + "," + col);
  }

  return this.modules[row][col];
};

proto.getModuleCount = function () {
  return this.moduleCount;
};

proto.make = function () {
  // Calculate automatically typeNumber if provided is < 1
  if (this.typeNumber < 1) {
    var typeNumber = 1;

    for (typeNumber = 1; typeNumber < 40; typeNumber++) {
      var rsBlocks = RSBlock.getRSBlocks(typeNumber, this.errorCorrectLevel);
      var buffer = new BitBuffer();
      var totalDataCount = 0;

      for (var i = 0; i < rsBlocks.length; i++) {
        totalDataCount += rsBlocks[i].dataCount;
      }

      for (var i = 0; i < this.dataList.length; i++) {
        var data = this.dataList[i];
        buffer.put(data.mode, 4);
        buffer.put(data.getLength(), util.getLengthInBits(data.mode, typeNumber));
        data.write(buffer);
      }

      if (buffer.getLengthInBits() <= totalDataCount * 8) break;
    }

    this.typeNumber = typeNumber;
  }

  this.makeImpl(false, this.getBestMaskPattern());
};

proto.makeImpl = function (test, maskPattern) {
  this.moduleCount = this.typeNumber * 4 + 17;
  this.modules = new Array(this.moduleCount);

  for (var row = 0; row < this.moduleCount; row++) {
    this.modules[row] = new Array(this.moduleCount);

    for (var col = 0; col < this.moduleCount; col++) {
      this.modules[row][col] = null; //(col + row) % 3;
    }
  }

  this.setupPositionProbePattern(0, 0);
  this.setupPositionProbePattern(this.moduleCount - 7, 0);
  this.setupPositionProbePattern(0, this.moduleCount - 7);
  this.setupPositionAdjustPattern();
  this.setupTimingPattern();
  this.setupTypeInfo(test, maskPattern);

  if (this.typeNumber >= 7) {
    this.setupTypeNumber(test);
  }

  if (this.dataCache == null) {
    this.dataCache = QRCode.createData(this.typeNumber, this.errorCorrectLevel, this.dataList);
  }

  this.mapData(this.dataCache, maskPattern);
};

proto.setupPositionProbePattern = function (row, col) {
  for (var r = -1; r <= 7; r++) {
    if (row + r <= -1 || this.moduleCount <= row + r) continue;

    for (var c = -1; c <= 7; c++) {
      if (col + c <= -1 || this.moduleCount <= col + c) continue;

      if (0 <= r && r <= 6 && (c == 0 || c == 6) || 0 <= c && c <= 6 && (r == 0 || r == 6) || 2 <= r && r <= 4 && 2 <= c && c <= 4) {
        this.modules[row + r][col + c] = true;
      } else {
        this.modules[row + r][col + c] = false;
      }
    }
  }
};

proto.getBestMaskPattern = function () {
  var minLostPoint = 0;
  var pattern = 0;

  for (var i = 0; i < 8; i++) {
    this.makeImpl(true, i);
    var lostPoint = util.getLostPoint(this);

    if (i == 0 || minLostPoint > lostPoint) {
      minLostPoint = lostPoint;
      pattern = i;
    }
  }

  return pattern;
};

proto.createMovieClip = function (target_mc, instance_name, depth) {
  var qr_mc = target_mc.createEmptyMovieClip(instance_name, depth);
  var cs = 1;
  this.make();

  for (var row = 0; row < this.modules.length; row++) {
    var y = row * cs;

    for (var col = 0; col < this.modules[row].length; col++) {
      var x = col * cs;
      var dark = this.modules[row][col];

      if (dark) {
        qr_mc.beginFill(0, 100);
        qr_mc.moveTo(x, y);
        qr_mc.lineTo(x + cs, y);
        qr_mc.lineTo(x + cs, y + cs);
        qr_mc.lineTo(x, y + cs);
        qr_mc.endFill();
      }
    }
  }

  return qr_mc;
};

proto.setupTimingPattern = function () {
  for (var r = 8; r < this.moduleCount - 8; r++) {
    if (this.modules[r][6] != null) {
      continue;
    }

    this.modules[r][6] = r % 2 == 0;
  }

  for (var c = 8; c < this.moduleCount - 8; c++) {
    if (this.modules[6][c] != null) {
      continue;
    }

    this.modules[6][c] = c % 2 == 0;
  }
};

proto.setupPositionAdjustPattern = function () {
  var pos = util.getPatternPosition(this.typeNumber);

  for (var i = 0; i < pos.length; i++) {
    for (var j = 0; j < pos.length; j++) {
      var row = pos[i];
      var col = pos[j];

      if (this.modules[row][col] != null) {
        continue;
      }

      for (var r = -2; r <= 2; r++) {
        for (var c = -2; c <= 2; c++) {
          if (r == -2 || r == 2 || c == -2 || c == 2 || r == 0 && c == 0) {
            this.modules[row + r][col + c] = true;
          } else {
            this.modules[row + r][col + c] = false;
          }
        }
      }
    }
  }
};

proto.setupTypeNumber = function (test) {
  var bits = util.getBCHTypeNumber(this.typeNumber);

  for (var i = 0; i < 18; i++) {
    var mod = !test && (bits >> i & 1) == 1;
    this.modules[Math.floor(i / 3)][i % 3 + this.moduleCount - 8 - 3] = mod;
  }

  for (var i = 0; i < 18; i++) {
    var mod = !test && (bits >> i & 1) == 1;
    this.modules[i % 3 + this.moduleCount - 8 - 3][Math.floor(i / 3)] = mod;
  }
};

proto.setupTypeInfo = function (test, maskPattern) {
  var data = this.errorCorrectLevel << 3 | maskPattern;
  var bits = util.getBCHTypeInfo(data); // vertical		

  for (var i = 0; i < 15; i++) {
    var mod = !test && (bits >> i & 1) == 1;

    if (i < 6) {
      this.modules[i][8] = mod;
    } else if (i < 8) {
      this.modules[i + 1][8] = mod;
    } else {
      this.modules[this.moduleCount - 15 + i][8] = mod;
    }
  } // horizontal


  for (var i = 0; i < 15; i++) {
    var mod = !test && (bits >> i & 1) == 1;

    if (i < 8) {
      this.modules[8][this.moduleCount - i - 1] = mod;
    } else if (i < 9) {
      this.modules[8][15 - i - 1 + 1] = mod;
    } else {
      this.modules[8][15 - i - 1] = mod;
    }
  } // fixed module


  this.modules[this.moduleCount - 8][8] = !test;
};

proto.mapData = function (data, maskPattern) {
  var inc = -1;
  var row = this.moduleCount - 1;
  var bitIndex = 7;
  var byteIndex = 0;

  for (var col = this.moduleCount - 1; col > 0; col -= 2) {
    if (col == 6) col--;

    while (true) {
      for (var c = 0; c < 2; c++) {
        if (this.modules[row][col - c] == null) {
          var dark = false;

          if (byteIndex < data.length) {
            dark = (data[byteIndex] >>> bitIndex & 1) == 1;
          }

          var mask = util.getMask(maskPattern, row, col - c);

          if (mask) {
            dark = !dark;
          }

          this.modules[row][col - c] = dark;
          bitIndex--;

          if (bitIndex == -1) {
            byteIndex++;
            bitIndex = 7;
          }
        }
      }

      row += inc;

      if (row < 0 || this.moduleCount <= row) {
        row -= inc;
        inc = -inc;
        break;
      }
    }
  }
};

QRCode.PAD0 = 0xEC;
QRCode.PAD1 = 0x11;

QRCode.createData = function (typeNumber, errorCorrectLevel, dataList) {
  var rsBlocks = RSBlock.getRSBlocks(typeNumber, errorCorrectLevel);
  var buffer = new BitBuffer();

  for (var i = 0; i < dataList.length; i++) {
    var data = dataList[i];
    buffer.put(data.mode, 4);
    buffer.put(data.getLength(), util.getLengthInBits(data.mode, typeNumber));
    data.write(buffer);
  } // calc num max data.


  var totalDataCount = 0;

  for (var i = 0; i < rsBlocks.length; i++) {
    totalDataCount += rsBlocks[i].dataCount;
  }

  if (buffer.getLengthInBits() > totalDataCount * 8) {
    throw new Error("code length overflow. (" + buffer.getLengthInBits() + ">" + totalDataCount * 8 + ")");
  } // end code


  if (buffer.getLengthInBits() + 4 <= totalDataCount * 8) {
    buffer.put(0, 4);
  } // padding


  while (buffer.getLengthInBits() % 8 != 0) {
    buffer.putBit(false);
  } // padding


  while (true) {
    if (buffer.getLengthInBits() >= totalDataCount * 8) {
      break;
    }

    buffer.put(QRCode.PAD0, 8);

    if (buffer.getLengthInBits() >= totalDataCount * 8) {
      break;
    }

    buffer.put(QRCode.PAD1, 8);
  }

  return QRCode.createBytes(buffer, rsBlocks);
};

QRCode.createBytes = function (buffer, rsBlocks) {
  var offset = 0;
  var maxDcCount = 0;
  var maxEcCount = 0;
  var dcdata = new Array(rsBlocks.length);
  var ecdata = new Array(rsBlocks.length);

  for (var r = 0; r < rsBlocks.length; r++) {
    var dcCount = rsBlocks[r].dataCount;
    var ecCount = rsBlocks[r].totalCount - dcCount;
    maxDcCount = Math.max(maxDcCount, dcCount);
    maxEcCount = Math.max(maxEcCount, ecCount);
    dcdata[r] = new Array(dcCount);

    for (var i = 0; i < dcdata[r].length; i++) {
      dcdata[r][i] = 0xff & buffer.buffer[i + offset];
    }

    offset += dcCount;
    var rsPoly = util.getErrorCorrectPolynomial(ecCount);
    var rawPoly = new Polynomial(dcdata[r], rsPoly.getLength() - 1);
    var modPoly = rawPoly.mod(rsPoly);
    ecdata[r] = new Array(rsPoly.getLength() - 1);

    for (var i = 0; i < ecdata[r].length; i++) {
      var modIndex = i + modPoly.getLength() - ecdata[r].length;
      ecdata[r][i] = modIndex >= 0 ? modPoly.get(modIndex) : 0;
    }
  }

  var totalCodeCount = 0;

  for (var i = 0; i < rsBlocks.length; i++) {
    totalCodeCount += rsBlocks[i].totalCount;
  }

  var data = new Array(totalCodeCount);
  var index = 0;

  for (var i = 0; i < maxDcCount; i++) {
    for (var r = 0; r < rsBlocks.length; r++) {
      if (i < dcdata[r].length) {
        data[index++] = dcdata[r][i];
      }
    }
  }

  for (var i = 0; i < maxEcCount; i++) {
    for (var r = 0; r < rsBlocks.length; r++) {
      if (i < ecdata[r].length) {
        data[index++] = ecdata[r][i];
      }
    }
  }

  return data;
};

var QRCode_1 = QRCode;

/**
 * Encode UTF16 to UTF8.
 * See: http://jonisalonen.com/2012/from-utf-16-to-utf-8-in-javascript/
 * @param str {string}
 * @returns {string}
 */

function toUTF8String(str) {
  var utf8Str = '';

  for (var i = 0; i < str.length; i++) {
    var charCode = str.charCodeAt(i);

    if (charCode < 0x0080) {
      utf8Str += String.fromCharCode(charCode);
    } else if (charCode < 0x0800) {
      utf8Str += String.fromCharCode(0xc0 | charCode >> 6);
      utf8Str += String.fromCharCode(0x80 | charCode & 0x3f);
    } else if (charCode < 0xd800 || charCode >= 0xe000) {
      utf8Str += String.fromCharCode(0xe0 | charCode >> 12);
      utf8Str += String.fromCharCode(0x80 | charCode >> 6 & 0x3f);
      utf8Str += String.fromCharCode(0x80 | charCode & 0x3f);
    } else {
      // surrogate pair
      i++; // UTF-16 encodes 0x10000-0x10FFFF by
      // subtracting 0x10000 and splitting the
      // 20 bits of 0x0-0xFFFFF into two halves

      charCode = 0x10000 + ((charCode & 0x3ff) << 10 | str.charCodeAt(i) & 0x3ff);
      utf8Str += String.fromCharCode(0xf0 | charCode >> 18);
      utf8Str += String.fromCharCode(0x80 | charCode >> 12 & 0x3f);
      utf8Str += String.fromCharCode(0x80 | charCode >> 6 & 0x3f);
      utf8Str += String.fromCharCode(0x80 | charCode & 0x3f);
    }
  }

  return utf8Str;
}

function generatePath(modules) {
  var margin = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 0;
  var ops = [];
  modules.forEach(function (row, y) {
    var start = null;
    row.forEach(function (cell, x) {
      if (!cell && start !== null) {
        // M0 0h7v1H0z injects the space with the move and drops the comma,
        // saving a char per operation
        ops.push("M".concat(start + margin, " ").concat(y + margin, "h").concat(x - start, "v1H").concat(start + margin, "z"));
        start = null;
        return;
      } // end of row, clean up or skip


      if (x === row.length - 1) {
        if (!cell) {
          // We would have closed the op above already so this can only mean
          // 2+ light modules in a row.
          return;
        }

        if (start === null) {
          // Just a single dark module.
          ops.push("M".concat(x + margin, ",").concat(y + margin, " h1v1H").concat(x + margin, "z"));
        } else {
          // Otherwise finish the current line.
          ops.push("M".concat(start + margin, ",").concat(y + margin, " h").concat(x + 1 - start, "v1H").concat(start + margin, "z"));
        }

        return;
      }

      if (cell && start === null) {
        start = x;
      }
    });
  });
  return ops.join('');
} // @vue/component


var QrcodeVue = {
  props: {
    value: {
      type: String,
      required: true,
      default: ''
    },
    className: {
      type: String,
      default: ''
    },
    size: {
      type: [Number, String],
      default: 100,
      validator: function validator(s) {
        return isNaN(Number(s)) !== true;
      }
    },
    level: {
      type: String,
      default: 'L',
      validator: function validator(l) {
        return ['L', 'Q', 'M', 'H'].indexOf(l) > -1;
      }
    },
    background: {
      type: String,
      default: '#fff'
    },
    foreground: {
      type: String,
      default: '#000'
    },
    renderAs: {
      type: String,
      required: false,
      default: 'canvas',
      validator: function validator(as) {
        return ['canvas', 'svg'].indexOf(as) > -1;
      }
    }
  },
  data: function data() {
    return {
      numCells: 0,
      fgPath: ''
    };
  },
  updated: function updated() {
    this.render();
  },
  mounted: function mounted() {
    this.render();
  },
  methods: {
    render: function render() {
      var value = this.value,
          size = this.size,
          level = this.level,
          background = this.background,
          foreground = this.foreground,
          renderAs = this.renderAs;

      var _size = size >>> 0; // size to number
      // We'll use type===-1 to force QRCode to automatically pick the best type


      var qrCode = new QRCode_1(-1, ErrorCorrectLevel[level]);
      qrCode.addData(toUTF8String(value));
      qrCode.make();
      var cells = qrCode.modules;
      var tileW = _size / cells.length;
      var tileH = _size / cells.length;
      var scale = window.devicePixelRatio || 1;

      if (renderAs === 'svg') {
        this.numCells = cells.length; // Drawing strategy: instead of a rect per module, we're going to create a
        // single path for the dark modules and layer that on top of a light rect,
        // for a total of 2 DOM nodes. We pay a bit more in string concat but that's
        // way faster than DOM ops.
        // For level 1, 441 nodes -> 2
        // For level 40, 31329 -> 2

        this.fgPath = generatePath(cells);
      } else {
        var canvas = this.$refs['qrcode-vue'];
        var ctx = canvas.getContext('2d');
        canvas.height = canvas.width = _size * scale;
        ctx.scale(scale, scale);
        cells.forEach(function (row, rdx) {
          row.forEach(function (cell, cdx) {
            ctx.fillStyle = cell ? foreground : background;
            var w = Math.ceil((cdx + 1) * tileW) - Math.floor(cdx * tileW);
            var h = Math.ceil((rdx + 1) * tileH) - Math.floor(rdx * tileH);
            ctx.fillRect(Math.round(cdx * tileW), Math.round(rdx * tileH), w, h);
          });
        });
      }
    }
  },
  render: function render(createElement) {
    var className = this.className,
        value = this.value,
        level = this.level,
        background = this.background,
        foreground = this.foreground,
        size = this.size,
        renderAs = this.renderAs,
        numCells = this.numCells,
        fgPath = this.fgPath;
    return createElement('div', {
      class: this.class || className,
      attrs: {
        value: value,
        level: level,
        background: background,
        foreground: foreground
      }
    }, [renderAs === 'svg' ? createElement('svg', {
      attrs: {
        height: size,
        width: size,
        shapeRendering: 'crispEdges',
        viewBox: "0 0 ".concat(numCells, " ").concat(numCells)
      },
      style: {
        width: size + 'px',
        height: size + 'px'
      }
    }, [createElement('path', {
      attrs: {
        fill: background,
        d: "M0,0 h".concat(numCells, "v").concat(numCells, "H0z")
      }
    }), createElement('path', {
      attrs: {
        fill: foreground,
        d: fgPath
      }
    })]) : createElement('canvas', {
      attrs: {
        height: size,
        width: size
      },
      style: {
        width: size + 'px',
        height: size + 'px'
      },
      ref: 'qrcode-vue'
    }, [])]);
  }
};

/* harmony default export */ __webpack_exports__["default"] = (QrcodeVue);


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
    !!_vm.requestHostUser && _vm.uid == _vm.user.id
      ? _c("div", { staticClass: "d-flex px-2" }, [
          _c(
            "div",
            {
              staticClass: "alert alert-success page-alert text-center",
              attrs: { id: "alert-1" },
            },
            [
              _c("strong", [_vm._v(_vm._s(_vm.requestHostUser.name))]),
              _vm._v(" requested to host the quiz.\n        "),
              _c("hr"),
              _vm._v(" "),
              _c(
                "button",
                {
                  staticClass: "btn btn-sm btn-success",
                  on: {
                    click: function ($event) {
                      return _vm.$emit(
                        "makeHost",
                        _vm.requestHostUser.id,
                        "accept"
                      )
                    },
                  },
                },
                [_vm._v("Accept")]
              ),
              _vm._v(" "),
              _c(
                "button",
                {
                  staticClass: "btn btn-sm btn-danger",
                  on: {
                    click: function ($event) {
                      return _vm.$emit(
                        "makeHost",
                        _vm.requestHostUser.id,
                        "deny"
                      )
                    },
                  },
                },
                [_vm._v("Deny")]
              ),
            ]
          ),
        ])
      : _vm._e(),
    _vm._v(" "),
    _vm.showResult
      ? _c(
          "div",
          { staticClass: "card mt-1", staticStyle: { width: "24rem" } },
          [
            _vm.uid == _vm.user.id
              ? _c(
                  "div",
                  { staticClass: "d-flex justify-content-between p-2" },
                  [
                    _c(
                      "button",
                      {
                        staticClass: "btn btn-primary",
                        attrs: { type: "button" },
                        on: {
                          click: function ($event) {
                            return _vm.$emit("playAgain", true)
                          },
                        },
                      },
                      [_vm._v("Play again")]
                    ),
                    _vm._v(" "),
                    _c(
                      "button",
                      {
                        staticClass: "btn btn-secondary",
                        attrs: { type: "button" },
                        on: {
                          click: function ($event) {
                            return _vm.$emit("newQuiz", _vm.makeUid)
                          },
                        },
                      },
                      [_vm._v("New quiz")]
                    ),
                    _vm._v(" "),
                    _vm.isDisabledHost()
                      ? _c(
                          "button",
                          {
                            staticClass: "btn btn-secondary disabled",
                            attrs: { type: "button" },
                          },
                          [
                            _vm._v(
                              "\n                    Make host\n                "
                            ),
                          ]
                        )
                      : _c(
                          "button",
                          {
                            staticClass: "btn btn-success",
                            attrs: { type: "button" },
                            on: {
                              click: function ($event) {
                                return _vm.$emit("makeHost", _vm.makeUid)
                              },
                            },
                          },
                          [
                            _vm._v(
                              "\n                    Make host\n                "
                            ),
                          ]
                        ),
                  ]
                )
              : _c(
                  "div",
                  { staticClass: "d-flex justify-content-between p-2" },
                  [
                    _vm.isDisabled()
                      ? _c(
                          "button",
                          {
                            staticClass: "btn btn-secondary disabled",
                            attrs: { type: "button" },
                          },
                          [
                            _vm._v(
                              "\n                Request Pending\n            "
                            ),
                          ]
                        )
                      : _c(
                          "button",
                          {
                            staticClass: "btn btn-success",
                            attrs: { type: "button" },
                            on: {
                              click: function ($event) {
                                return _vm.$emit("makeHost", _vm.makeUid)
                              },
                            },
                          },
                          [
                            _vm._v(
                              "\n                 Make host\n              "
                            ),
                          ]
                        ),
                  ]
                ),
            _vm._v(" "),
            _c("div", { staticClass: "card-header" }, [_vm._v("Results")]),
            _vm._v(" "),
            _c("div", { staticClass: "card-body" }, [
              _c(
                "ul",
                { staticClass: "list-group" },
                _vm._l(_vm.results, function (v, i) {
                  return _c(
                    "li",
                    {
                      key: i,
                      staticClass: "list-group-item",
                      class: [v.id == _vm.makeUid ? "bg-success" : ""],
                      staticStyle: { cursor: "pointer" },
                      on: {
                        click: function ($event) {
                          return _vm.selectUid(v.id)
                        },
                      },
                    },
                    [
                      _c("span", {
                        domProps: { innerHTML: _vm._s(_vm.getMedel(i)) },
                      }),
                      _vm._v(
                        "\n                        " +
                          _vm._s(v.name) +
                          "\n                      "
                      ),
                      v.id == _vm.uid
                        ? _c("span", { staticClass: "ml-1 badge badge-info" }, [
                            _vm._v("Host"),
                          ])
                        : _vm._e(),
                      _vm._v(" "),
                      _vm.requestHostUser
                        ? _c(
                            "span",
                            { staticClass: "ml-1 badge badge-danger" },
                            [
                              _vm._v(
                                _vm._s(
                                  v.id == _vm.requestHostUser.id
                                    ? "Requested"
                                    : ""
                                )
                              ),
                            ]
                          )
                        : _vm._e(),
                      _vm._v(" "),
                      _c(
                        "span",
                        {
                          staticClass:
                            "badge badge-primary float-right mt-1 text-white",
                        },
                        [_vm._v(_vm._s(v.score))]
                      ),
                    ]
                  )
                }),
                0
              ),
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "card-footer" }, [
              _c("div", { staticClass: "d-flex justify-content-between" }, [
                _c(
                  "button",
                  {
                    staticClass: "btn btn-sm btn-success",
                    on: { click: _vm.back },
                  },
                  [_vm._v("Dashboard")]
                ),
                _vm._v(" "),
                _c(
                  "button",
                  {
                    staticClass: "btn btn-sm btn-info",
                    on: { click: _vm.showDetail },
                  },
                  [_vm._v("Show your result")]
                ),
              ]),
            ]),
          ]
        )
      : _c(
          "div",
          { staticClass: "card mt-1", staticStyle: { width: "24rem" } },
          [
            _c("div", { staticClass: "card-header" }, [
              _vm._v("Result Detail"),
            ]),
            _vm._v(" "),
            _c(
              "div",
              {
                staticClass: "card-body overflow-auto",
                staticStyle: { height: "500px" },
              },
              _vm._l(_vm.resultDetailData, function (result, i) {
                return _c("div", { key: "resD" + i }, [
                  _c(
                    "div",
                    {
                      staticClass: "w-100 mb-2",
                      attrs: { id: "accordion" + i },
                    },
                    [
                      _c("div", { staticClass: "card text-white" }, [
                        _c(
                          "div",
                          {
                            staticClass: "card-header p-1 cursor",
                            class: [
                              result.isCorrect > 0 ? "bg-success" : "bg-danger",
                            ],
                            attrs: {
                              id: "heading" + i,
                              "data-toggle": "collapse",
                              "data-target": "#collapse" + i,
                              "aria-expanded": "true",
                              "aria-controls": "collapse" + i,
                            },
                          },
                          [
                            _c(
                              "span",
                              { staticClass: "text-white rounded-circle" },
                              [_vm._v(_vm._s(i + 1))]
                            ),
                            _vm._v(
                              "\n                                " +
                                _vm._s(result.question) +
                                "\n                            "
                            ),
                          ]
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass: "collapse show",
                            attrs: {
                              id: "collapse" + i,
                              "aria-labelledby": "heading" + i,
                              "data-parent": "#accordion" + i,
                            },
                          },
                          [
                            _c("div", { staticClass: "card-body" }, [
                              _c("div", { staticClass: "px-1" }, [
                                result.isCorrect > 0
                                  ? _c("div", { staticClass: "list-group" }, [
                                      _vm.checkURL(result.selected)
                                        ? _c(
                                            "span",
                                            {
                                              staticClass:
                                                "list-group-item list-group-item-action my-1",
                                            },
                                            [
                                              _c("img", {
                                                staticClass:
                                                  "imageOption mt-1 rounded img-thumbnail",
                                                attrs: {
                                                  src: "/" + result.selected,
                                                  alt: "",
                                                },
                                              }),
                                              _vm._v(
                                                "\n                                              (your answer is correct)\n                                              "
                                              ),
                                              _c("i", {
                                                staticClass:
                                                  "fa fa-check text-success",
                                                attrs: {
                                                  "aria-hidden": "true",
                                                },
                                              }),
                                            ]
                                          )
                                        : _c(
                                            "span",
                                            {
                                              staticClass:
                                                "list-group-item list-group-item-action my-1",
                                            },
                                            [
                                              _vm._v(
                                                "\n                                              " +
                                                  _vm._s(result.selected) +
                                                  " (your answer is correct)\n                                              "
                                              ),
                                              _c("i", {
                                                staticClass:
                                                  "fa fa-check text-success",
                                                attrs: {
                                                  "aria-hidden": "true",
                                                },
                                              }),
                                            ]
                                          ),
                                    ])
                                  : _c("div", { staticClass: "list-group" }, [
                                      _vm.checkURL(result.selected)
                                        ? _c(
                                            "span",
                                            {
                                              staticClass:
                                                "list-group-item list-group-item-action my-1",
                                            },
                                            [
                                              _c("img", {
                                                staticClass:
                                                  "imageOption mt-1 rounded img-thumbnail",
                                                attrs: {
                                                  src: "/" + result.selected,
                                                  alt: "",
                                                },
                                              }),
                                              _vm._v(
                                                "\n                                              (your answer)\n                                              "
                                              ),
                                              _c("i", {
                                                staticClass:
                                                  "fa fa-times text-danger",
                                                attrs: {
                                                  "aria-hidden": "true",
                                                },
                                              }),
                                            ]
                                          )
                                        : _c(
                                            "span",
                                            {
                                              staticClass:
                                                "list-group-item list-group-item-action my-1",
                                            },
                                            [
                                              _vm._v(
                                                "\n                                              " +
                                                  _vm._s(result.selected) +
                                                  " (your answer)\n                                              "
                                              ),
                                              _c("i", {
                                                staticClass:
                                                  "fa fa-times text-danger",
                                                attrs: {
                                                  "aria-hidden": "true",
                                                },
                                              }),
                                            ]
                                          ),
                                      _vm._v(" "),
                                      _vm.checkURL(result.answer)
                                        ? _c(
                                            "div",
                                            { staticClass: "list-group" },
                                            [
                                              _c(
                                                "span",
                                                {
                                                  staticClass:
                                                    "list-group-item list-group-item-action my-1",
                                                },
                                                [
                                                  _c("img", {
                                                    staticClass:
                                                      "imageOption mt-1 rounded img-thumbnail",
                                                    attrs: {
                                                      src: "/" + result.answer,
                                                      alt: "",
                                                    },
                                                  }),
                                                  _vm._v(
                                                    "\n                                                    (correct answer)\n                                                    "
                                                  ),
                                                  _c("i", {
                                                    staticClass:
                                                      "fa fa-check text-success",
                                                    attrs: {
                                                      "aria-hidden": "true",
                                                    },
                                                  }),
                                                ]
                                              ),
                                            ]
                                          )
                                        : _c(
                                            "div",
                                            { staticClass: "list-group" },
                                            [
                                              _c(
                                                "span",
                                                {
                                                  staticClass:
                                                    "list-group-item list-group-item-action my-1",
                                                },
                                                [
                                                  _vm._v(
                                                    "\n                                                    " +
                                                      _vm._s(result.answer) +
                                                      " (correct answer)\n                                                    "
                                                  ),
                                                  _c("i", {
                                                    staticClass:
                                                      "fa fa-check text-success",
                                                    attrs: {
                                                      "aria-hidden": "true",
                                                    },
                                                  }),
                                                ]
                                              ),
                                            ]
                                          ),
                                    ]),
                              ]),
                            ]),
                          ]
                        ),
                      ]),
                    ]
                  ),
                ])
              }),
              0
            ),
            _vm._v(" "),
            _c("div", { staticClass: "card-footer" }, [
              _c(
                "button",
                {
                  staticClass: "btn btn-sm btn-success",
                  on: { click: _vm.showDetail },
                },
                [_vm._v("Close")]
              ),
            ]),
          ]
        ),
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
      _c(
        "div",
        {
          staticClass: "d-flex justify-content-between card-header text-center",
        },
        [
          _c(
            "span",
            {
              staticClass: "btn btn-sm btn-danger align-self-start",
              on: { click: _vm.back },
            },
            [_vm._v("Back")]
          ),
          _vm._v(" "),
          _vm.user.id != _vm.uid
            ? _c("span", { staticClass: "ml-1 text-primary" }, [
                _vm._v(
                  "\n                    Please wait, the Quiz Host will start the game soon.\n                "
                ),
              ])
            : _c("span", { staticClass: "ml-1 text-primary" }, [
                _c("span", [_vm._v("User List")]),
              ]),
          _vm._v(" "),
          _c(
            "a",
            {
              staticClass: "btn btn-sm align-self-start",
              class: [_vm.qr ? "btn-dark" : "btn-outline-secondary"],
              on: {
                click: function ($event) {
                  _vm.qr = !_vm.qr
                },
              },
            },
            [
              _vm._v(
                "\n                    " +
                  _vm._s(_vm.qr ? "QR" : "QR") +
                  "\n                "
              ),
            ]
          ),
        ]
      ),
      _vm._v(" "),
      _c(
        "div",
        {
          staticClass: "card-body",
          staticStyle: { "max-height": "90vh", overflow: "auto" },
        },
        [
          _c("div", { attrs: { id: "reader", width: "300px" } }),
          _vm._v(" "),
          _vm.qr
            ? _c("qrcode-vue", {
                staticClass: "text-center",
                attrs: { value: _vm.value, size: _vm.size, level: "H" },
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
          _vm.user.id == _vm.uid
            ? _c("div", { staticClass: "d-flex justify-content-between" }, [
                _c(
                  "a",
                  {
                    staticClass:
                      "btn btn-sm btn-outline-success mt-4 pull-right",
                    on: {
                      click: function ($event) {
                        return _vm.$emit("gameStart", _vm.defaultTime)
                      },
                    },
                  },
                  [_vm._v("START\n                    ")]
                ),
                _vm._v(" "),
                _c("div", { staticClass: "mt-4" }, [
                  _c("div", { staticStyle: { position: "relative" } }, [
                    _c(
                      "span",
                      {
                        staticStyle: {
                          position: "absolute",
                          left: "32px",
                          "font-size": "11px",
                          "padding-top": "7px",
                          color: "gray",
                        },
                      },
                      [_vm._v("Seconds")]
                    ),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.defaultTime,
                          expression: "defaultTime",
                        },
                      ],
                      staticStyle: { width: "100px" },
                      attrs: { type: "number" },
                      domProps: { value: _vm.defaultTime },
                      on: {
                        input: function ($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.defaultTime = $event.target.value
                        },
                      },
                    }),
                  ]),
                ]),
              ])
            : _vm._e(),
        ],
        1
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
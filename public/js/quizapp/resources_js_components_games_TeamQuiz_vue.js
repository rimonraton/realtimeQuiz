"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_components_games_TeamQuiz_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/TeamQuiz.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/TeamQuiz.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helper_moderator_waiting__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../helper/moderator/waiting */ "./resources/js/components/helper/moderator/waiting.vue");
/* harmony import */ var _helper_TeamMember__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../helper/TeamMember */ "./resources/js/components/helper/TeamMember.vue");
/* harmony import */ var _helper_result__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../helper/result */ "./resources/js/components/helper/result.vue");
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




/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['id', 'uid', 'user', 'questions', 'gmsg', 'teams'],
  components: {
    waiting: _helper_moderator_waiting__WEBPACK_IMPORTED_MODULE_0__["default"],
    result: _helper_result__WEBPACK_IMPORTED_MODULE_2__["default"],
    TeamMember: _helper_TeamMember__WEBPACK_IMPORTED_MODULE_1__["default"]
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
      qid: 0,
      screen: {
        waiting: 1,
        loading: 0,
        result: 0,
        resultWaiting: 0,
        winner: 0,
        team: 1
      },
      gamedata: {},
      score: [],
      user_ranking: null,
      game_start: 0,
      progress: 100,
      share: null,
      pm: '',
      perform: 0,
      teamUser: []
    };
  },
  created: function created() {
    var _this = this;
    Echo.channel("challenge.".concat(this.id.id, ".").concat(this.uid)).listen('GameStartEvent', function (data) {
      console.log(['GameStartEvent.............', data]);
      _this.share = data.share;
      _this.game_start = 1; // Game Start from Game Owner...
      _this.screen.waiting = 0;
      _this.QuestionTimer(); // Set and Start QuestionTimer
    }).listen('GameResetEvent', function (data) {
      console.log(['GameResetEvent.............', data]);
      _this.gameReset();
    }).listen('GameEndUserEvent', function (data) {
      console.log(['GameEndUserEvent.............', data]);
      _this.end_user++;
      if (_this.users.length == _this.end_user) {
        _this.winner();
      }
    }).listen('QuestionClickedEvent', function (data) {
      console.log('QuestionClickedEvent.............');
      _this.answered_user_data.push(data);
      _this.getResult();
    }).listen('KickUserEvent', function (data) {
      console.log('KickUserEvent.............');
      _this.users = _this.users.filter(function (u) {
        return u.id !== data.uid;
      });
      if (_this.user.id == data.uid) {
        window.location.href = "http://quiz.test";
      }
    }).listen('TeamJoin', function (data) {
      console.log(['Team Join.............', data]);
      _this.teamUser.push({
        team: data.team,
        users: data.user
      });
      _this.users.map(function (u) {
        if (u.id === data.user.id) {
          u.gid = data.team;
        }
      });
      _this.teams.find(function (team) {
        return team.id === data.team;
      }).users.push({
        user: data.user
      });
    });
  },
  mounted: function mounted() {
    var _this2 = this;
    Echo.join("challenge.".concat(this.id.id, ".").concat(this.uid)).here(function (users) {
      _this2.users = users;
    }).joining(function (user) {
      _this2.users.push(user);
      if (_this2.game_start) {
        _this2.kickUser(user.id);
      }
    }).leaving(function (user) {
      _this2.users = _this2.users.filter(function (u) {
        return u.id != user.id;
      });
      console.log("".concat(user.name, " leaving"));
    });
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
    // preventNav(event) {
    //   if (!this.game_start) return;
    //   event.preventDefault();
    //   // Chrome requires returnValue to be set.
    //   event.returnValue = "";
    // },
    QuestionTimer: function QuestionTimer() {
      var _this3 = this;
      var pdec = 100 / (10 * this.qt.time);
      console.log('QuestionTimer started');
      this.qt.timer = setInterval(function () {
        if (_this3.qt.time == 0) {
          if (!_this3.answered) {
            _this3.checkAnswer(_this3.qid, 'Not Answered', 0);
          }
          _this3.questionInit();
          _this3.resultScreen();
        } else {
          _this3.qt.ms++;
          _this3.progress -= pdec;
          if (_this3.qt.ms == 10) {
            _this3.qt.time--;
            _this3.qt.ms = 0;
          }
        }
      }, 100);
    },
    gameStart: function gameStart() {
      var _this4 = this;
      var ids = this.users.map(function (u) {
        return u.id;
      });
      var gd = {
        channel: this.channel,
        gameStart: 1,
        uid: ids,
        id: this.id.id,
        users: this.users,
        host_id: this.uid
      };
      console.log(gd);
      axios.post("/api/gameStart", gd).then(function (res) {
        return _this4.share = res.data;
      });
      this.game_start = 1;
      this.screen.waiting = 0;
      this.QuestionTimer();
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
      this.gamedata['uid'] = this.user.id;
      this.gamedata['channel'] = this.channel;
      this.gamedata['name'] = this.user.name;
      this.gamedata['question'] = this.questions[this.qid].question_text;
      this.gamedata['answer'] = this.getCorrectAnswertext();
      this.gamedata['selected'] = a;
      this.gamedata['isCorrect'] = rw == 1 ? Math.floor(this.progress) : 0;
      axios.post("/api/questionClick", this.gamedata);
      var clone = _objectSpread({}, this.gamedata);
      this.answered_user_data.push(clone);
      this.screen.loading = true;
      this.resultScreen();
      if (this.qid + 1 == this.questions.length) {
        var gr = {
          result: this.results,
          'share_id': this.share.id
        };
        axios.post("/api/challengeResult", gr).then(function (res) {
          return console.log(res.data);
        });
      }
    },
    getCorrectAnswertext: function getCorrectAnswertext() {
      return this.questions[this.qid].options.find(function (o) {
        return o.correct == 1;
      }).option;
    },
    resultScreen: function resultScreen() {
      console.log('resultScreen');
      this.getResult(); //Sorting this.results
      this.countDown();
      this.questionInit();
      if (this.qid + 1 == this.questions.length) {
        axios.post("/api/gameEndUser", {
          'channel': this.channel
        });
        this.end_user++;
        if (this.users.length == this.end_user) {
          this.winner();
          return;
        }
        this.screen.resultWaiting = 1;
        return;
      }
      this.qid++;
      this.current = this.questions[this.qid].id;
      this.QuestionTimer();
    },
    countDown: function countDown() {
      console.log('countDown');
      if (this.counter == 0) {
        this.questionInit();
        if (this.qid + 1 == this.questions.length) {
          this.winner();
          this.counter = 0;
          return;
        }
        this.qid++;
        this.current = this.questions[this.qid].id;
        this.QuestionTimer();
      }
      this.counter--;
    },
    getResult: function getResult() {
      var _this5 = this;
      console.log('getResult');
      this.results = [];
      this.users.forEach(function (user) {
        var score = 0;
        _this5.answered_user_data.filter(function (f) {
          return f.uid === user.id;
        }).map(function (u) {
          score += u.isCorrect;
        });
        _this5.results.push({
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
      var _this6 = this;
      this.user_ranking = this.results.findIndex(function (w) {
        return w.id == _this6.user.id;
      });
      var user_score = this.results[this.user_ranking].score;
      this.perform = Math.round(user_score / ((this.qid + 1) * 100) * 100);
      this.pm = this.gmsg.filter(function (gm) {
        return gm.perform_status >= _this6.perform;
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
      this.qt.time = 50;
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
    joinTeam: function joinTeam(id) {
      var _this7 = this;
      var obj = {
        channel: this.channel,
        team: id,
        user: this.user
      };
      this.teamUser.push({
        team: id,
        users: this.user
      });
      this.users.map(function (u) {
        if (u.id === _this7.user.id) {
          u.gid = id;
        }
      });
      axios.post("/api/jointeam", obj).then(function (res) {
        return _this7.screen.team = 0;
      });
    }
  },
  computed: {
    channel: function channel() {
      return "challenge.".concat(this.id.id, ".").concat(this.uid);
    },
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

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/TeamMember.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/TeamMember.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************************************************************/
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

/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['teams', 'user'],
  data: function data() {
    return {
      colors: ['bg-info', 'bg-danger', 'bg-success', 'bg-dark', 'bg-primary', 'bg-secondary', 'bg-warning']
    };
  },
  methods: {
    cardColor: function cardColor() {
      return this.colors[Math.floor(Math.random() * this.colors.length)];
      // colors[Math.floor(Math.random() * colors.length)];
    },
    tbe: function tbe(b, e, l) {
      if (b !== null && e !== null) {
        console.log('no null question');
        if (l === 'bd') {
          return b;
        }
        return e;
      } else if (b !== null && e === null) {
        console.log('Bangla not null');
        return b;
      } else if (b === null && e !== null) {
        console.log('English not null');
        return e;
      }
      return b;
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/moderator/waiting.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/moderator/waiting.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  props: ['user', 'uid', 'users', 'time', 'teamUser', 'teams'],
  data: function data() {
    return {
      days: '',
      hours: '',
      minutes: '',
      seconds: '',
      schedule: '',
      timer: null,
      teamUsers: this.team_users,
      colors: ['border-primary', 'border-secondary', 'border-success', 'border-danger', 'border-warning', 'border-info', 'border-dark'],
      teamData: {
        team_english: '',
        team_bangla: ''
      },
      teamsNewdata: this.teams,
      showDelete: true,
      teamId: null
    };
  },
  methods: {
    open_team_modal: function open_team_modal() {
      $('#team_modal').modal('show');
    },
    addemitTeam: function addemitTeam() {
      $('#team_modal').modal('hide');
      this.$emit('addTeam', this.teamData);
      this.teamData.team_english = '';
      this.teamData.team_bangla = '';
    },
    // animate:
    deleteTeam: function deleteTeam(id) {
      this.teamId = id, $('#deleteModal').modal('show');
    },
    deleteSubmit: function deleteSubmit() {
      $('#deleteModal').modal('hide');
      this.$emit('deleteTeam', this.teamId);
      this.teamId = null;
    },
    cardColor: function cardColor(index) {
      return this.colors[Math.floor(Math.random() * this.colors.length)];
    },
    getTeamUsers: function getTeamUsers(team) {
      var users = this.users.map(function (u) {
        if (u.gid === team) return u;
      });
      if (_typeof(users !== 'undefined')) return users;
      return [];
    },
    kickingUser: function kickingUser(id) {
      this.$emit("kickingUser", id);
    },
    getTeamMember: function getTeamMember(team_id) {
      this.users.map(function (user) {
        if (user.team_id == team_id) {
          return "".concat(user.name);
        }
      });
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
    },
    tbe: function tbe(b, e, l) {
      if (b !== null && e !== null) {
        console.log('no null question');
        if (l === 'bd') {
          return b;
        }
        return e;
      } else if (b !== null && e === null) {
        console.log('Bangla not null');
        return b;
      } else if (b === null && e !== null) {
        console.log('English not null');
        return e;
      }
      return b;
    }
  },
  created: function created() {
    // this.swa()
    this.scheduledTimer();
    console.log('scheduledTimer started');
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

/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['results', 'lastQuestion', 'resultDetail', 'user'],
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
    selectUid: function selectUid(id) {
      console.log('id data..', id);
      this.makeUid = id;
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

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/TeamMember.vue?vue&type=style&index=0&lang=css&":
/*!********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/TeamMember.vue?vue&type=style&index=0&lang=css& ***!
  \********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ (function(module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, "\n.pointer{\r\n    cursor: pointer;\n}\n.pointer :hover{\r\n    background:grey !important;\n}\r\n", ""]);
// Exports
/* harmony default export */ __webpack_exports__["default"] = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/moderator/waiting.vue?vue&type=style&index=0&lang=css&":
/*!***************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/moderator/waiting.vue?vue&type=style&index=0&lang=css& ***!
  \***************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ (function(module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, "\n.circle{\n        width: 40px;\n        height: 40px;\n        border-radius: 50%;\n        text-align: center;\n        position: absolute;\n        top: 4px;\n        left: 15px;\n        font-size: 1.5rem;\n        background: gray;\n        color: white;\n}\n.flag{\n\t\tposition: absolute;\n\t\tright: 15px;\n\t\ttop: 8px;\n}\n.close{\n    \tposition: absolute;\n    \ttop: -5px;\n    \tright: 0px;\n    \tcolor: red;\n}\n.ds-btn li{ list-style:none; padding:10px;\n}\n#team_modal {\n        background: linear-gradient(to right, #0083B0, #00B4DB);\n}\n#btn_cls {\n        font-size: 30px;\n        position: absolute;\n        right: -7px;\n        top: -3px;\n        background: white;\n        border: 1px solid;\n        border-radius: 50%;\n        width: 35px;\n        /* z-index: 999999; */\n}\n\n", ""]);
// Exports
/* harmony default export */ __webpack_exports__["default"] = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/TeamMember.vue?vue&type=style&index=0&lang=css&":
/*!************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/TeamMember.vue?vue&type=style&index=0&lang=css& ***!
  \************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_TeamMember_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./TeamMember.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/TeamMember.vue?vue&type=style&index=0&lang=css&");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_TeamMember_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"], options);



/* harmony default export */ __webpack_exports__["default"] = (_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_TeamMember_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"].locals || {});

/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/moderator/waiting.vue?vue&type=style&index=0&lang=css&":
/*!*******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/moderator/waiting.vue?vue&type=style&index=0&lang=css& ***!
  \*******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_waiting_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./waiting.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/moderator/waiting.vue?vue&type=style&index=0&lang=css&");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_waiting_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"], options);



/* harmony default export */ __webpack_exports__["default"] = (_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_waiting_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"].locals || {});

/***/ }),

/***/ "./resources/js/components/games/TeamQuiz.vue":
/*!****************************************************!*\
  !*** ./resources/js/components/games/TeamQuiz.vue ***!
  \****************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _TeamQuiz_vue_vue_type_template_id_4b6fa5ea___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./TeamQuiz.vue?vue&type=template&id=4b6fa5ea& */ "./resources/js/components/games/TeamQuiz.vue?vue&type=template&id=4b6fa5ea&");
/* harmony import */ var _TeamQuiz_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./TeamQuiz.vue?vue&type=script&lang=js& */ "./resources/js/components/games/TeamQuiz.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _TeamQuiz_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _TeamQuiz_vue_vue_type_template_id_4b6fa5ea___WEBPACK_IMPORTED_MODULE_0__.render,
  _TeamQuiz_vue_vue_type_template_id_4b6fa5ea___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/games/TeamQuiz.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/helper/TeamMember.vue":
/*!*******************************************************!*\
  !*** ./resources/js/components/helper/TeamMember.vue ***!
  \*******************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _TeamMember_vue_vue_type_template_id_2d9fe5bd___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./TeamMember.vue?vue&type=template&id=2d9fe5bd& */ "./resources/js/components/helper/TeamMember.vue?vue&type=template&id=2d9fe5bd&");
/* harmony import */ var _TeamMember_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./TeamMember.vue?vue&type=script&lang=js& */ "./resources/js/components/helper/TeamMember.vue?vue&type=script&lang=js&");
/* harmony import */ var _TeamMember_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./TeamMember.vue?vue&type=style&index=0&lang=css& */ "./resources/js/components/helper/TeamMember.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");



;


/* normalize component */

var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _TeamMember_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _TeamMember_vue_vue_type_template_id_2d9fe5bd___WEBPACK_IMPORTED_MODULE_0__.render,
  _TeamMember_vue_vue_type_template_id_2d9fe5bd___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/helper/TeamMember.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/helper/moderator/waiting.vue":
/*!**************************************************************!*\
  !*** ./resources/js/components/helper/moderator/waiting.vue ***!
  \**************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _waiting_vue_vue_type_template_id_334cfd26___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./waiting.vue?vue&type=template&id=334cfd26& */ "./resources/js/components/helper/moderator/waiting.vue?vue&type=template&id=334cfd26&");
/* harmony import */ var _waiting_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./waiting.vue?vue&type=script&lang=js& */ "./resources/js/components/helper/moderator/waiting.vue?vue&type=script&lang=js&");
/* harmony import */ var _waiting_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./waiting.vue?vue&type=style&index=0&lang=css& */ "./resources/js/components/helper/moderator/waiting.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! !../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");



;


/* normalize component */

var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _waiting_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _waiting_vue_vue_type_template_id_334cfd26___WEBPACK_IMPORTED_MODULE_0__.render,
  _waiting_vue_vue_type_template_id_334cfd26___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/helper/moderator/waiting.vue"
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

/***/ "./resources/js/components/games/TeamQuiz.vue?vue&type=script&lang=js&":
/*!*****************************************************************************!*\
  !*** ./resources/js/components/games/TeamQuiz.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_TeamQuiz_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./TeamQuiz.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/TeamQuiz.vue?vue&type=script&lang=js&");
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_TeamQuiz_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/helper/TeamMember.vue?vue&type=script&lang=js&":
/*!********************************************************************************!*\
  !*** ./resources/js/components/helper/TeamMember.vue?vue&type=script&lang=js& ***!
  \********************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_TeamMember_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./TeamMember.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/TeamMember.vue?vue&type=script&lang=js&");
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_TeamMember_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/helper/moderator/waiting.vue?vue&type=script&lang=js&":
/*!***************************************************************************************!*\
  !*** ./resources/js/components/helper/moderator/waiting.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_waiting_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./waiting.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/moderator/waiting.vue?vue&type=script&lang=js&");
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_waiting_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

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

/***/ "./resources/js/components/helper/TeamMember.vue?vue&type=style&index=0&lang=css&":
/*!****************************************************************************************!*\
  !*** ./resources/js/components/helper/TeamMember.vue?vue&type=style&index=0&lang=css& ***!
  \****************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_TeamMember_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader/dist/cjs.js!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./TeamMember.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/TeamMember.vue?vue&type=style&index=0&lang=css&");


/***/ }),

/***/ "./resources/js/components/helper/moderator/waiting.vue?vue&type=style&index=0&lang=css&":
/*!***********************************************************************************************!*\
  !*** ./resources/js/components/helper/moderator/waiting.vue?vue&type=style&index=0&lang=css& ***!
  \***********************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_waiting_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/style-loader/dist/cjs.js!../../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./waiting.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/moderator/waiting.vue?vue&type=style&index=0&lang=css&");


/***/ }),

/***/ "./resources/js/components/games/TeamQuiz.vue?vue&type=template&id=4b6fa5ea&":
/*!***********************************************************************************!*\
  !*** ./resources/js/components/games/TeamQuiz.vue?vue&type=template&id=4b6fa5ea& ***!
  \***********************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_TeamQuiz_vue_vue_type_template_id_4b6fa5ea___WEBPACK_IMPORTED_MODULE_0__.render; },
/* harmony export */   "staticRenderFns": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_TeamQuiz_vue_vue_type_template_id_4b6fa5ea___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns; }
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_TeamQuiz_vue_vue_type_template_id_4b6fa5ea___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./TeamQuiz.vue?vue&type=template&id=4b6fa5ea& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/TeamQuiz.vue?vue&type=template&id=4b6fa5ea&");


/***/ }),

/***/ "./resources/js/components/helper/TeamMember.vue?vue&type=template&id=2d9fe5bd&":
/*!**************************************************************************************!*\
  !*** ./resources/js/components/helper/TeamMember.vue?vue&type=template&id=2d9fe5bd& ***!
  \**************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_TeamMember_vue_vue_type_template_id_2d9fe5bd___WEBPACK_IMPORTED_MODULE_0__.render; },
/* harmony export */   "staticRenderFns": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_TeamMember_vue_vue_type_template_id_2d9fe5bd___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns; }
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_TeamMember_vue_vue_type_template_id_2d9fe5bd___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./TeamMember.vue?vue&type=template&id=2d9fe5bd& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/TeamMember.vue?vue&type=template&id=2d9fe5bd&");


/***/ }),

/***/ "./resources/js/components/helper/moderator/waiting.vue?vue&type=template&id=334cfd26&":
/*!*********************************************************************************************!*\
  !*** ./resources/js/components/helper/moderator/waiting.vue?vue&type=template&id=334cfd26& ***!
  \*********************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_waiting_vue_vue_type_template_id_334cfd26___WEBPACK_IMPORTED_MODULE_0__.render; },
/* harmony export */   "staticRenderFns": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_waiting_vue_vue_type_template_id_334cfd26___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns; }
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_waiting_vue_vue_type_template_id_334cfd26___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./waiting.vue?vue&type=template&id=334cfd26& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/moderator/waiting.vue?vue&type=template&id=334cfd26&");


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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/TeamQuiz.vue?vue&type=template&id=4b6fa5ea&":
/*!**************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/TeamQuiz.vue?vue&type=template&id=4b6fa5ea& ***!
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
  return _c(
    "div",
    { staticClass: "container" },
    [
      _vm.screen.resultWaiting
        ? _c("div", { staticClass: "result-waiting" }, [_vm._m(0)])
        : _vm._e(),
      _vm._v(" "),
      _c(
        "transition",
        { attrs: { name: "fade" } },
        [
          _vm.screen.result
            ? _c("result", {
                attrs: {
                  results: _vm.results,
                  lastQuestion: _vm.qid + 1 == _vm.questions.length,
                },
              })
            : _vm._e(),
        ],
        1
      ),
      _vm._v(" "),
      _vm.screen.winner
        ? _c("div", { staticClass: "winner" }, [
            _vm.user_ranking == 0
              ? _c("div", [
                  _c("h3", { staticClass: "text-center" }, [
                    _vm._v(_vm._s(_vm.pm.perform_message) + " "),
                  ]),
                  _vm._v(" "),
                  _c("h3", [
                    _c("b", [_vm._v(_vm._s(_vm.user.name))]),
                    _vm._v(", you won this game."),
                  ]),
                ])
              : _vm.user_ranking == 1
              ? _c("div", [
                  _c("h3", { staticClass: "text-center" }, [
                    _vm._v(_vm._s(_vm.pm.perform_message)),
                  ]),
                  _vm._v(" "),
                  _c("h3", [
                    _c("b", [_vm._v(_vm._s(_vm.user.name))]),
                    _vm._v(", you got second place"),
                  ]),
                ])
              : _c("div", [
                  _c("h3", { staticClass: "text-center" }, [
                    _c("b", [_vm._v(_vm._s(_vm.user.name))]),
                    _vm._v(", you need more concentration "),
                  ]),
                ]),
            _vm._v(" "),
            _c(
              "button",
              {
                staticClass: "btn btn-sm btn-secondary",
                on: {
                  click: function ($event) {
                    _vm.screen.winner = 0
                  },
                },
              },
              [_vm._v("More Result")]
            ),
            _vm._v(" "),
            _c("img", {
              staticClass: "card-img img-responsive my-3",
              staticStyle: { width: "500px !important" },
              attrs: {
                src: _vm.getUrl("challengeShareResult/" + _vm.share.link),
                type: "image/png",
              },
            }),
            _vm._v(" "),
            _c("iframe", {
              staticStyle: { border: "none", overflow: "hidden" },
              attrs: {
                src: _vm.getShareLink("challengeShareResult/" + _vm.share.link),
                width: "77",
                height: "28",
                scrolling: "no",
                frameborder: "0",
                allowfullscreen: "true",
                allow:
                  "autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share",
              },
            }),
          ])
        : _vm._e(),
      _vm._v(" "),
      _vm.screen.waiting
        ? _c("waiting", {
            attrs: {
              teams: _vm.teams,
              teamUser: _vm.teamUser,
              uid: _vm.uid,
              users: _vm.users,
              user: _vm.user,
              time: _vm.id.schedule,
            },
            on: {
              kickingUser: function ($event) {
                return _vm.kickUser($event)
              },
              gameStart: _vm.gameStart,
              gameReset: _vm.gameReset,
            },
          })
        : _vm._e(),
      _vm._v(" "),
      _vm.screen.team == 1
        ? _c("team-member", {
            attrs: { teams: _vm.teams, user: _vm.user },
            on: {
              joinTeam: function ($event) {
                return _vm.joinTeam($event)
              },
            },
          })
        : _vm._e(),
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
                      "\n                "
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
                        question.more_info_link
                          ? _c("img", {
                              staticClass: "image w-100 mt-1 rounded",
                              staticStyle: { "max-height": "70vh" },
                              attrs: { src: question.more_info_link },
                            })
                          : _vm._e(),
                        _vm._v(" "),
                        _c("p", {
                          staticClass: "my-2 font-bold",
                          domProps: {
                            innerHTML: _vm._s(
                              _vm.tbe(
                                question.bd_question_text,
                                question.question_text,
                                _vm.user.lang
                              )
                            ),
                          },
                        }),
                        _vm._v(" "),
                        _vm._l(question.options, function (option) {
                          return _c("ul", { staticClass: "list-group" }, [
                            _c(
                              "li",
                              {
                                staticClass:
                                  "list-group-item list-group-item-action cursor my-1",
                                on: {
                                  click: function ($event) {
                                    return _vm.checkAnswer(
                                      question.id,
                                      option.option,
                                      option.correct
                                    )
                                  },
                                },
                              },
                              [
                                _c("span", {
                                  domProps: {
                                    innerHTML: _vm._s(
                                      _vm.tbe(
                                        option.bd_option,
                                        option.option,
                                        _vm.user.lang
                                      )
                                    ),
                                  },
                                }),
                              ]
                            ),
                          ])
                        }),
                      ],
                      2
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
              _vm._v("\n                    Score Board\n                    "),
              _vm.user.id == _vm.uid && _vm.qid > 0
                ? _c(
                    "a",
                    {
                      staticClass: "btn btn-sm btn-danger float-right",
                      on: { click: _vm.gameResetCall },
                    },
                    [_vm._v("RESET")]
                  )
                : _vm._e(),
            ]),
            _vm._v(" "),
            _vm.results.length > 0
              ? _c(
                  "div",
                  { staticClass: "card-body" },
                  [
                    _c(
                      "transition-group",
                      {
                        staticClass: "list-group",
                        attrs: { name: "slide-up", tag: "ul", appear: "" },
                      },
                      _vm._l(_vm.results, function (res, index) {
                        return _c(
                          "li",
                          {
                            key: res.id,
                            staticClass: "list-group-item user-list",
                            class: { active: res.id == _vm.user.id },
                          },
                          [
                            _c("span", {
                              domProps: {
                                innerHTML: _vm._s(_vm.getMedel(index)),
                              },
                            }),
                            _vm._v(
                              "\n                            " +
                                _vm._s(res.name) +
                                " "
                            ),
                            _c(
                              "span",
                              {
                                staticClass:
                                  "badge badge-dark float-right mt-1",
                              },
                              [_vm._v(_vm._s(res.score))]
                            ),
                          ]
                        )
                      }),
                      0
                    ),
                  ],
                  1
                )
              : _vm._e(),
          ]),
        ]),
      ]),
    ],
    1
  )
}
var staticRenderFns = [
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "text-center bg-light" }, [
      _c("img", {
        attrs: {
          src: "/img/quiz/result-waiting.gif",
          alt: "Waiting for game end.",
        },
      }),
      _vm._v(" "),
      _c("p", { staticClass: "text-center px-5" }, [
        _vm._v("Please wait result is processing.."),
      ]),
    ])
  },
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/TeamMember.vue?vue&type=template&id=2d9fe5bd&":
/*!*****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/TeamMember.vue?vue&type=template&id=2d9fe5bd& ***!
  \*****************************************************************************************************************************************************************************************************************************/
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
  return _c(
    "div",
    { staticClass: "waiting bg-team text-center" },
    [
      _c("h2", [
        _vm._v(
          _vm._s(
            _vm.tbe(
              "দয়া করে আপনার দল নির্বাচন করুন",
              "Please Select Your Team",
              _vm.user.lang
            )
          )
        ),
      ]),
      _vm._v(" "),
      _vm._l(_vm.teams, function (team, index) {
        return _c(
          "div",
          {
            key: team.id,
            staticClass: "card mb-2 pointer",
            staticStyle: { width: "24rem" },
            on: {
              click: function ($event) {
                return _vm.$emit("joinTeam", team.id)
              },
            },
          },
          [
            _c(
              "div",
              {
                staticClass: "card-body bg-secondary",
                staticStyle: { "max-height": "90vh", overflow: "auto" },
              },
              [
                _c("h1", { staticClass: "text-center text-white" }, [
                  _vm._v(
                    "\n                        " +
                      _vm._s(team.name) +
                      "\n                    "
                  ),
                ]),
              ]
            ),
          ]
        )
      }),
    ],
    2
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/moderator/waiting.vue?vue&type=template&id=334cfd26&":
/*!************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/moderator/waiting.vue?vue&type=template&id=334cfd26& ***!
  \************************************************************************************************************************************************************************************************************************************/
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
    _c("div", { staticClass: "card", staticStyle: { width: "24rem" } }, [
      _vm.user.id != _vm.uid
        ? _c("div", { staticClass: "card-header" }, [
            _c("span", { staticClass: "ml-1 text-primary" }, [
              _vm._v(
                _vm._s(
                  _vm.tbe(
                    "দয়া করে অপেক্ষা করুন, কুইজ মাস্টার শীঘ্রই গেমটি শুরু করবে ..",
                    "Please wait, the Quiz Master will start the game soon..",
                    _vm.user.lang
                  )
                )
              ),
            ]),
          ])
        : _vm._e(),
      _vm._v(" "),
      _c(
        "div",
        {
          staticClass: "card-body",
          staticStyle: { "max-height": "90vh", overflow: "auto" },
        },
        [
          _c("h3", { staticClass: "p-2" }, [
            _c("i", {
              staticClass: "fa fa-trophy",
              attrs: { "aria-hidden": "true" },
            }),
            _vm._v(
              "\n                    " +
                _vm._s(
                  _vm.tbe("অংশগ্রহণকারী দল", "Participant Group", _vm.user.lang)
                ) +
                "\n                "
            ),
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "row" }, [
            _c(
              "div",
              { staticClass: "col-md-12" },
              _vm._l(_vm.teamsNewdata, function (team, index) {
                return _c(
                  "div",
                  {
                    key: index,
                    staticClass: "card mt-2",
                    class: _vm.cardColor(),
                  },
                  [
                    _c("div", { staticClass: "card-body" }, [
                      _c("div", { staticClass: "news-title" }, [
                        _c("h2", { staticClass: "title-small" }, [
                          _vm._v(_vm._s(team.name) + " "),
                          _vm.user.id == _vm.uid
                            ? _c(
                                "span",
                                {
                                  staticClass: "text-danger float-right",
                                  staticStyle: { cursor: "pointer" },
                                  on: {
                                    click: function ($event) {
                                      return _vm.deleteTeam(team.id)
                                    },
                                  },
                                },
                                [_vm._v("X")]
                              )
                            : _vm._e(),
                        ]),
                      ]),
                      _vm._v(" "),
                      _c(
                        "p",
                        { staticClass: "card-text" },
                        _vm._l(_vm.getTeamUsers(team.id), function (user) {
                          return !!user
                            ? _c(
                                "span",
                                {
                                  key: user.id,
                                  staticClass: "badge badge-info mr-1",
                                },
                                [_vm._v(_vm._s(user.name))]
                              )
                            : _vm._e()
                        }),
                        0
                      ),
                    ]),
                  ]
                )
              }),
              0
            ),
          ]),
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
                  [_vm._v(_vm._s(_vm.tbe("শুরু করুন", "START", _vm.user.lang)))]
                )
              : _vm._e(),
            _vm._v(" "),
            _vm.user.id == _vm.uid
              ? _c(
                  "a",
                  {
                    staticClass: "btn btn-sm btn-outline-info mt-4 pull-right",
                    on: { click: _vm.open_team_modal },
                  },
                  [
                    _vm._v(
                      _vm._s(
                        _vm.tbe("দল যুক্ত করুন", "Add Team", _vm.user.lang)
                      )
                    ),
                  ]
                )
              : _vm._e(),
          ]),
        ]
      ),
    ]),
    _vm._v(" "),
    _c(
      "div",
      {
        staticClass: "modal animate__animated animate__backInUp",
        attrs: {
          tabindex: "-1",
          "data-backdrop": "false",
          role: "dialog",
          id: "team_modal",
        },
      },
      [
        _c(
          "div",
          {
            staticClass: "modal-dialog modal-lg modal-dialog-centered",
            attrs: { role: "document" },
          },
          [
            _c("div", { staticClass: "modal-content" }, [
              _c("div", { staticClass: "modal-header" }, [
                _c("h5", { staticClass: "modal-title" }, [
                  _vm._v(
                    _vm._s(_vm.tbe("দল যুক্ত করুন", "ADD TEAM", _vm.user.lang))
                  ),
                ]),
                _vm._v(" "),
                _vm._m(0),
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "modal-body" }, [
                _c("div", { staticClass: "row" }, [
                  _c("div", { staticClass: "form-group col-md-6 col-sm-6" }, [
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.teamData.team_english,
                          expression: "teamData.team_english",
                        },
                      ],
                      staticClass: "form-control",
                      attrs: {
                        type: "text",
                        min: "1",
                        max: "10",
                        placeholder: _vm.tbe(
                          "ইংরেজিতে লিখুন",
                          "Type in English",
                          _vm.user.lang
                        ),
                      },
                      domProps: { value: _vm.teamData.team_english },
                      on: {
                        input: function ($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(
                            _vm.teamData,
                            "team_english",
                            $event.target.value
                          )
                        },
                      },
                    }),
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group col-md-6 col-sm-6" }, [
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.teamData.team_bangla,
                          expression: "teamData.team_bangla",
                        },
                      ],
                      staticClass: "form-control",
                      attrs: {
                        type: "text",
                        min: "1",
                        max: "10",
                        placeholder: _vm.tbe(
                          "বাংলায় লিখুন",
                          "Type in Bangla",
                          _vm.user.lang
                        ),
                      },
                      domProps: { value: _vm.teamData.team_bangla },
                      on: {
                        input: function ($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(
                            _vm.teamData,
                            "team_bangla",
                            $event.target.value
                          )
                        },
                      },
                    }),
                  ]),
                ]),
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "modal-footer" }, [
                _c(
                  "button",
                  {
                    staticClass: "btn btn-primary",
                    attrs: { type: "button" },
                    on: { click: _vm.addemitTeam },
                  },
                  [
                    _vm._v(
                      _vm._s(
                        _vm.tbe("দল যুক্ত করুন", "ADD TEAM", _vm.user.lang)
                      )
                    ),
                  ]
                ),
                _vm._v(" "),
                _c(
                  "button",
                  {
                    staticClass: "btn btn-danger",
                    attrs: { type: "button", "data-dismiss": "modal" },
                  },
                  [
                    _vm._v(
                      _vm._s(_vm.tbe("বাতিল করুন", "Cancel", _vm.user.lang))
                    ),
                  ]
                ),
              ]),
            ]),
          ]
        ),
      ]
    ),
    _vm._v(" "),
    _c(
      "div",
      {
        staticClass: "modal animate__animated animate__backInLeft",
        attrs: {
          tabindex: "-1",
          "data-backdrop": "false",
          role: "dialog",
          id: "deleteModal",
        },
      },
      [
        _c(
          "div",
          {
            staticClass: "modal-dialog modal-dialog-centered",
            attrs: { role: "document" },
          },
          [
            _c("div", { staticClass: "modal-content" }, [
              _c("div", { staticClass: "modal-header" }, [
                _c("h5", { staticClass: "modal-title" }, [
                  _vm._v(
                    _vm._s(
                      _vm.tbe("দল ডিলিট করুন", "DELETE TEAM", _vm.user.lang)
                    )
                  ),
                ]),
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "modal-body" }, [
                _c("p", [
                  _vm._v(
                    _vm._s(
                      _vm.tbe(
                        "আপনি কি এই দলটিকে মুছে ফেলার বিষয়ে নিশ্চিত?",
                        "Are you sure to delete this team?",
                        _vm.user.lang
                      )
                    )
                  ),
                ]),
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "modal-footer" }, [
                _c(
                  "button",
                  {
                    staticClass: "btn btn-primary",
                    attrs: { type: "button" },
                    on: { click: _vm.deleteSubmit },
                  },
                  [
                    _vm._v(
                      _vm._s(
                        _vm.tbe("দল ডিলিট করুন", "DELETE TEAM", _vm.user.lang)
                      )
                    ),
                  ]
                ),
                _vm._v(" "),
                _c(
                  "button",
                  {
                    staticClass: "btn btn-danger",
                    attrs: { type: "button", "data-dismiss": "modal" },
                  },
                  [
                    _vm._v(
                      _vm._s(_vm.tbe("বাতিল করুন", "CANCEL", _vm.user.lang))
                    ),
                  ]
                ),
              ]),
            ]),
          ]
        ),
      ]
    ),
  ])
}
var staticRenderFns = [
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "button",
      {
        staticClass: "close",
        attrs: {
          type: "button",
          "data-dismiss": "modal",
          "aria-label": "Close",
        },
      },
      [
        _c("span", { attrs: { id: "btn_cls", "aria-hidden": "true" } }, [
          _vm._v("×"),
        ]),
      ]
    )
  },
]
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
    _vm.showResult
      ? _c(
          "div",
          { staticClass: "card mt-1", staticStyle: { width: "24rem" } },
          [
            _c("div", { staticClass: "d-flex justify-content-between p-2" }, [
              _c(
                "button",
                {
                  staticClass: "btn btn-primary",
                  attrs: { type: "button" },
                  on: {
                    click: function ($event) {
                      return _vm.$emit("playAgain")
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
                      return _vm.$emit("newQuiz")
                    },
                  },
                },
                [_vm._v("New quiz")]
              ),
              _vm._v(" "),
              _c(
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
                [_vm._v("Make host")]
              ),
            ]),
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
                      _vm._v("\n                        " + _vm._s(v.name)),
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
                                      _c(
                                        "span",
                                        {
                                          staticClass:
                                            "list-group-item list-group-item-action my-1",
                                        },
                                        [
                                          _vm._v(
                                            "\n                                              " +
                                              _vm._s(result.selected) +
                                              " (your answer is correct)\n                                          "
                                          ),
                                        ]
                                      ),
                                    ])
                                  : _c("div", { staticClass: "list-group" }, [
                                      _c(
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
                                            attrs: { "aria-hidden": "true" },
                                          }),
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c("div", { staticClass: "list-group" }, [
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
                                              attrs: { "aria-hidden": "true" },
                                            }),
                                          ]
                                        ),
                                      ]),
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
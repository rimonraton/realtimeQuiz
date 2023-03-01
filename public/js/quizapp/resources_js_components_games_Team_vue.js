"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_components_games_Team_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/Team.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/Team.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
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

/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['id', 'uid', 'user', 'questions'],
  data: function data() {
    return {
      qt: {
        ms: 0,
        time: 30,
        timer: null
      },
      users: [],
      answered: 0,
      answered_user: 0,
      answered_user_data: [],
      results: [],
      counter: 3,
      timer: null,
      current: 0,
      qid: 0,
      screen: {
        waiting: 1,
        loading: 0,
        result: 0,
        winner: 0
      },
      gamedata: {},
      score: [],
      user_ranking: null,
      game_start: 0,
      progress: 100
    };
  },
  created: function created() {
    var _this = this;
    Echo.channel(this.channel).listen('GameStartEvent', function (data) {
      console.log('GameStartEvent.............');
      _this.game_start = 1; // Game Start from Game Owner...
      _this.screen.waiting = 0;
      _this.QuestionTimer(); // Set and Start QuestionTimer
    }).listen('QuestionClickedEvent', function (data) {
      console.log('QuestionClickedEvent.............');
      _this.answered_user_data.push(data);
      _this.answered_user++;
      _this.loadingScreen();
    }).listen('KickUserEvent', function (data) {
      console.log('KickUserEvent.............');
      _this.users = _this.users.filter(function (u) {
        return u.id !== data.uid;
      });
      if (_this.user.id == data.uid) {
        window.location.href = "http://quiz.erendevu.net";
      }
    });
  },
  mounted: function mounted() {
    var _this2 = this;
    Echo.join("game.".concat(this.id, ".").concat(this.uid)).here(function (users) {
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
  beforeMount: function beforeMount() {
    var _this3 = this;
    window.addEventListener("beforeunload", this.preventNav);
    this.$once("hook:beforeDestroy", function () {
      window.removeEventListener("beforeunload", _this3.preventNav);
    });
  },
  beforeRouteLeave: function beforeRouteLeave(to, from, next) {
    if (this.game_start) {
      if (!window.confirm("Do You Realy Want to Leave This Game?")) {
        return;
      }
    }
    next();
  },
  methods: {
    preventNav: function preventNav(event) {
      if (!this.game_start) return;
      event.preventDefault();
      // Chrome requires returnValue to be set.
      event.returnValue = "";
    },
    gameStart: function gameStart() {
      var gd = {
        channel: this.channel,
        gameStart: 1
      };
      axios.post("/api/gameStart", gd);
      this.game_start = 1;
      this.screen.waiting = 0;
      this.QuestionTimer();
    },
    gameReset: function gameReset() {},
    QuestionTimer: function QuestionTimer() {
      var _this4 = this;
      var pdec = 100 / (10 * this.qt.time);
      console.log('QuestionTimer started');
      this.qt.timer = setInterval(function () {
        if (_this4.qt.time == 0) {
          if (!_this4.answered) {
            _this4.checkAnswer(_this4.qid, 'Not Answered', 0);
          }
          _this4.questionInit();
          _this4.resultScreen();
        } else {
          _this4.qt.ms++;
          _this4.progress -= pdec;
          if (_this4.qt.ms == 10) {
            _this4.qt.time--;
            _this4.qt.ms = 0;
          }
        }
      }, 100);
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
      this.answered_user++;
      this.loadingScreen();
    },
    getCorrectAnswertext: function getCorrectAnswertext() {
      return this.questions[this.qid].options.find(function (o) {
        return o.correct == 1;
      }).option;
    },
    loadingScreen: function loadingScreen() {
      if (this.users.length == this.answered_user) {
        this.screen.loading = false;
        this.resultScreen();
      }
    },
    resultScreen: function resultScreen() {
      console.log('resultScreen');
      this.getResult();
      this.screen.result = true;
      this.startTimer();
    },
    startTimer: function startTimer() {
      var _this5 = this;
      console.log('startTimer');
      this.screen.result = 1;
      this.timer = setInterval(function () {
        _this5.countDown();
      }, 1000);
    },
    countDown: function countDown() {
      console.log('countDown');
      if (this.counter == 0) {
        this.questionInit();
        if (this.qid + 1 == this.questions.length) {
          this.winner();
          return;
        }
        this.qid++;
        this.current = this.questions[this.qid].id;
        this.QuestionTimer();
      }
      this.counter--;
    },
    getResult: function getResult() {
      var _this6 = this;
      console.log('getResult');
      this.results = [];
      this.users.forEach(function (user) {
        var score = 0;
        _this6.answered_user_data.filter(function (f) {
          return f.uid === user.id;
        }).map(function (u) {
          score += u.isCorrect;
        });
        _this6.results.push({
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
      var _this7 = this;
      this.user_ranking = this.results.findIndex(function (w) {
        return w.id == _this7.user.id;
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
    getAvatarAlt: function getAvatarAlt(name) {
      return name.substring(0, 2);
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
      this.answered_user = 0;
      this.counter = 3;
      this.screen.waiting = 0;
      this.screen.loading = 0;
      this.screen.result = 0;
      this.screen.winner = 0;
    },
    gameStarted: function gameStarted(user) {
      console.log(['user', user]);
    }
  },
  computed: {
    channel: function channel() {
      return "game.".concat(this.id, ".").concat(this.uid);
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

/***/ "./resources/js/components/games/Team.vue":
/*!************************************************!*\
  !*** ./resources/js/components/games/Team.vue ***!
  \************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Team_vue_vue_type_template_id_bbe26fd4___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Team.vue?vue&type=template&id=bbe26fd4& */ "./resources/js/components/games/Team.vue?vue&type=template&id=bbe26fd4&");
/* harmony import */ var _Team_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Team.vue?vue&type=script&lang=js& */ "./resources/js/components/games/Team.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Team_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Team_vue_vue_type_template_id_bbe26fd4___WEBPACK_IMPORTED_MODULE_0__.render,
  _Team_vue_vue_type_template_id_bbe26fd4___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/games/Team.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/games/Team.vue?vue&type=script&lang=js&":
/*!*************************************************************************!*\
  !*** ./resources/js/components/games/Team.vue?vue&type=script&lang=js& ***!
  \*************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Team_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Team.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/Team.vue?vue&type=script&lang=js&");
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Team_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/games/Team.vue?vue&type=template&id=bbe26fd4&":
/*!*******************************************************************************!*\
  !*** ./resources/js/components/games/Team.vue?vue&type=template&id=bbe26fd4& ***!
  \*******************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Team_vue_vue_type_template_id_bbe26fd4___WEBPACK_IMPORTED_MODULE_0__.render; },
/* harmony export */   "staticRenderFns": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Team_vue_vue_type_template_id_bbe26fd4___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns; }
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Team_vue_vue_type_template_id_bbe26fd4___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Team.vue?vue&type=template&id=bbe26fd4& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/Team.vue?vue&type=template&id=bbe26fd4&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/Team.vue?vue&type=template&id=bbe26fd4&":
/*!**********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/Team.vue?vue&type=template&id=bbe26fd4& ***!
  \**********************************************************************************************************************************************************************************************************************/
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
      _vm.screen.waiting
        ? _c("div", { staticClass: "waiting" }, [
            _c(
              "div",
              { staticClass: "card", staticStyle: { width: "24rem" } },
              [
                _c("div", { staticClass: "card-header" }, [
                  _vm._v("Player Joined.\n                "),
                  _vm.user.id != _vm.uid
                    ? _c("code", { staticClass: "ml-2" }, [
                        _vm._v("Please Wait until Game Start.."),
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
                                src: u.avatar,
                                alt: _vm.getAvatarAlt(u.name),
                              },
                            }),
                            _vm._v(" "),
                            _c("span", { staticClass: "ml-5" }, [
                              _vm._v(_vm._s(u.name)),
                            ]),
                            _vm._v(" "),
                            u.id != _vm.user.id && _vm.user.id == _vm.uid
                              ? _c(
                                  "button",
                                  {
                                    staticClass:
                                      "float-right btn btn-sm btn-outline-danger",
                                    on: {
                                      click: function ($event) {
                                        return _vm.kickUser(u.id)
                                      },
                                    },
                                  },
                                  [
                                    _vm._v(
                                      "\n                            Kick\n                        "
                                    ),
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
                      ? _c(
                          "a",
                          {
                            staticClass: "btn btn-sm btn-outline-danger mt-4",
                            on: { click: _vm.gameReset },
                          },
                          [_vm._v("RESET")]
                        )
                      : _vm._e(),
                    _vm._v(" "),
                    _vm.user.id == _vm.uid
                      ? _c(
                          "a",
                          {
                            staticClass:
                              "btn btn-sm btn-outline-success mt-4 pull-right",
                            on: { click: _vm.gameStart },
                          },
                          [_vm._v("START")]
                        )
                      : _vm._e(),
                  ]
                ),
                _vm._v(" "),
                _c("div", { staticClass: "card-footer" }, [
                  _vm.user.id == _vm.uid
                    ? _c("div", {
                        staticClass: "sharethis-inline-share-buttons",
                      })
                    : _vm._e(),
                ]),
              ]
            ),
          ])
        : _vm._e(),
      _vm._v(" "),
      _vm.screen.loading
        ? _c("div", { staticClass: "loading" }, [
            _c("div", { staticClass: "row justify-content-center" }, [
              _c("div", { staticClass: "col-md-8" }, [
                _c("h2", { staticClass: "text-center" }, [
                  _vm._v("Waiting for other user response."),
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "progress m-2" }, [
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
                _c("img", {
                  staticClass: "m-2",
                  attrs: { src: "/images/loading/bar.svg" },
                }),
              ]),
            ]),
          ])
        : _vm._e(),
      _vm._v(" "),
      _c("transition", { attrs: { name: "fade" } }, [
        _vm.screen.result
          ? _c("div", { staticClass: "result" }, [
              _c(
                "div",
                { staticClass: "card", staticStyle: { width: "24rem" } },
                [
                  _c("div", { staticClass: "card-header" }, [
                    _vm._v("Results"),
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "card-body" }, [
                    _c(
                      "ul",
                      { staticClass: "list-group" },
                      _vm._l(_vm.results, function (v, i) {
                        return _c(
                          "li",
                          { key: i, staticClass: "list-group-item" },
                          [
                            _vm._v(
                              "\n                        " +
                                _vm._s(v.name + " : " + v.score) +
                                "\n                    "
                            ),
                          ]
                        )
                      }),
                      0
                    ),
                    _vm._v(" "),
                    _vm.counter
                      ? _c(
                          "div",
                          { staticClass: "mt-5", attrs: { id: "counter" } },
                          [
                            _c(
                              "h1",
                              {
                                staticClass: "text-center",
                                staticStyle: {
                                  color: "#1BAA8F",
                                  height: "4rem",
                                },
                              },
                              [
                                _vm._v(
                                  "\n                        " +
                                    _vm._s(_vm.counter) +
                                    "\n                    "
                                ),
                              ]
                            ),
                          ]
                        )
                      : _vm._e(),
                    _vm._v(" "),
                    _c("h1"),
                  ]),
                  _vm._v(" "),
                  _vm.qid + 1 == _vm.questions.length
                    ? _c("div", { staticClass: "card-footer" }, [
                        _c(
                          "a",
                          {
                            staticClass: "btn btn-sm btn-secondary text-center",
                            attrs: { href: "http://quiz.erendevu.net/" },
                          },
                          [_vm._v("Game List")]
                        ),
                      ])
                    : _vm._e(),
                ]
              ),
            ])
          : _vm._e(),
      ]),
      _vm._v(" "),
      _vm.screen.winner
        ? _c("div", { staticClass: "winner" }, [
            _vm.user_ranking == 0
              ? _c("div", [
                  _c("h1", { staticClass: "text-center" }, [
                    _vm._v("Congratulation ! "),
                  ]),
                  _vm._v(" "),
                  _c("h3", [
                    _c("b", [_vm._v(_vm._s(_vm.user.name))]),
                    _vm._v(", you won this game."),
                  ]),
                ])
              : _vm.user_ranking == 1
              ? _c("div", [
                  _c("h1", { staticClass: "text-center" }, [
                    _vm._v("Well Played ! "),
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
              [_vm._v("Close")]
            ),
          ])
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
                      { staticClass: "card-body" },
                      [
                        _c(
                          "span",
                          { staticClass: "q_num text-right text-muted" },
                          [
                            _vm._v(
                              "Question " +
                                _vm._s(_vm.qid + 1) +
                                " of " +
                                _vm._s(_vm.questions.length)
                            ),
                          ]
                        ),
                        _vm._v(" "),
                        _c("p", {
                          staticClass: "mb-2",
                          domProps: {
                            innerHTML: _vm._s(question.question_text),
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
                                    innerHTML: _vm._s(option.option),
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
            _c("div", { staticClass: "card-header" }, [_vm._v("User List")]),
            _vm._v(" "),
            _c("div", { staticClass: "card-body" }, [
              _c(
                "ul",
                { staticClass: "list-group" },
                _vm._l(_vm.users, function (u) {
                  return _c(
                    "li",
                    {
                      key: u.id,
                      staticClass: "list-group-item user-list",
                      class: { active: u.id == _vm.user.id },
                    },
                    [
                      _vm._v(
                        "\n                            " +
                          _vm._s(u.name) +
                          "\n                        "
                      ),
                    ]
                  )
                }),
                0
              ),
            ]),
          ]),
        ]),
      ]),
    ],
    1
  )
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
"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_components_games_Practice_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/Practice.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/Practice.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helper_practice_resultdetails__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../helper/practice/resultdetails */ "./resources/js/components/helper/practice/resultdetails.vue");
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


/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['id', 'user', 'questions', 'gmsg', 'quiz'],
  components: {
    resultdetails: _helper_practice_resultdetails__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  data: function data() {
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
      sqo: true
    };
  },
  watch: {
    questions: {
      handler: function handler(newQuestion) {
        console.log('newQuestion', newQuestion[0].fileType);
        this.showQuestionOptions(newQuestion[0].fileType, 'first');
      },
      // force eager callback execution
      immediate: true
    }
  },
  mounted: function mounted() {
    // console.log('timer start')
    this.current = this.questions[this.qid].id;
    var confetti = document.createElement('script');
    confetti.setAttribute('src', 'https://cdn.jsdelivr.net/npm/canvas-confetti@1.3.0/dist/confetti.browser.min.js');
    document.head.appendChild(confetti);
    // this.startTimer()
  },

  methods: {
    checkAnswer: function checkAnswer(q, a, rw) {
      this.right_wrong = rw;
      this.gamedata['id'] = this.qid + 1;
      this.gamedata['question'] = this.tbe(this.questions[this.qid].bd_question_text, this.questions[this.qid].question_text, this.user.lang);
      this.gamedata['answer'] = this.getCorrectAnswertext();
      this.gamedata['selected'] = a;
      this.gamedata['isCorrect'] = rw;
      this.gamedata['time'] = this.answer_minutes + ':' + this.answer_seconds;
      rw == 1 ? this.correct++ : this.wrong++;
      var clone = _objectSpread({}, this.gamedata);
      this.results.push(clone);
      this.answer_minutes = 0;
      this.answer_seconds = 0;
      if (this.qid + 1 === this.questions.length) {
        clearInterval(this.timer);
        this.winner();
        return;
      }
      this.qid++;
      this.current = this.questions[this.qid].id;
      // this.sqo = false
      this.showQuestionOptions(null);
    },
    getCorrectAnswertext: function getCorrectAnswertext() {
      var qco = this.questions[this.qid].options.find(function (o) {
        return o.correct == 1;
      });
      if (qco.flag == 'img') return qco.img_link;
      return this.tbe(qco.bd_option, qco.option, this.user.lang);
    },
    firstPlace: function firstPlace() {
      this.place = 1;
      confetti({
        zIndex: 999999,
        particleCount: 200,
        spread: 120,
        origin: {
          y: 0.6
        }
      });
      setTimeout(function () {
        confetti({
          zIndex: 999999,
          particleCount: 200,
          spread: 120,
          origin: {
            y: 0.6
          }
        });
      }, 500);
    },
    secondPlace: function secondPlace() {
      this.place = 2;
      var colors = ['#bb0000', '#0AE84E'];
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
    },
    thirdPlace: function thirdPlace() {
      this.place = 3;
      var defaults = {
        spread: 360,
        ticks: 50,
        gravity: 0,
        decay: 0.94,
        startVelocity: 30,
        shapes: ["star"],
        colors: ["FFE400", "FFBD00", "E89400", "FFCA6C", "FDFFB8"]
      };
      confetti(_objectSpread(_objectSpread({}, defaults), {}, {
        zIndex: 999999,
        particleCount: 400,
        scalar: 1.2,
        shapes: ["star"]
      }));
      confetti(_objectSpread(_objectSpread({}, defaults), {}, {
        zIndex: 999999,
        particleCount: 100,
        scalar: 0.75,
        shapes: ["circle"]
      }));
    },
    winner: function winner() {
      var perform = this.correct / this.questions.length * 100;
      this.pm = this.gmsg.filter(function (g) {
        return g.perform_status >= perform;
      }).reduce(function (prev, curr) {
        return prev.perform_status < curr.perform_status ? prev : curr;
      });
      this.winner_screen = 1;
      if (perform === 100) {
        this.firstPlace();
      }
      if (perform >= 75) {
        this.secondPlace();
      }
      if (!this.user.log > 0) {
        this.saveQuiz();
      }
    },
    saveQuiz: function saveQuiz() {
      var gd = {
        user_id: this.user.id,
        game_id: this.gmsg[0].game_id,
        quiz_id: this.id,
        answers: JSON.stringify(this.results),
        start_at: this.user.start_at,
        pm_id: this.pm.id
      };
      axios.post("/api/savePractice", gd).then(function (response) {
        return console.log(response.data);
      });
    },
    reloadPage: function reloadPage() {
      window.location.reload();
    },
    tbe: function tbe(b, e, l) {
      // console.log(b,e,l)
      return l === 'bd' ? !!b ? b : e : !!e ? e : b;
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
    qne2b: function qne2b(q, qn, l) {
      if (l === 'gb') return "Question ".concat(q + 1, " of ").concat(qn, " ");
      return "\u09AA\u09CD\u09B0\u09B6\u09CD\u09A8 ".concat(this.q2bNumber(qn), " \u098F\u09B0 ").concat(this.q2bNumber(q + 1), " ");
    },
    onEnd: function onEnd() {
      console.log('onEnded....');
      this.av = true;
      this.showQuestionOptions(null);
    },
    onStart: function onStart() {
      console.log('onStart....');
      clearInterval(this.timer);
      this.av = false;
      // this.sqo = false
    },
    audioVideoError: function audioVideoError() {
      console.log('audioVideoError....');
      this.onEnd();
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
    imageOption: function imageOption(objArray) {
      var data = objArray.some(function (a) {
        return a.flag == 'img';
      });
      // const data = objArray.find(a => a.flag == 'img');
      return data;
    },
    showQuestionOptions: function showQuestionOptions(question, f) {
      var _this = this;
      console.log('first time', f, question);
      var timeout = 0;
      if (this.quiz.quiz_time != 0) {
        timeout = 3000; // this.quiz.quiz_time * 1000
        if (f == 'first') {
          timeout = timeout / 2;
        }
      }
      if (!question || question == 'image') {
        clearInterval(this.timer);
        setTimeout(function () {
          // this.sqo = true
          _this.startTimer();
        }, timeout);
      }
    },
    startTimer: function startTimer() {
      var _this2 = this;
      if (this.av == true) {
        this.timer = setInterval(function () {
          _this2.seconds++;
          if (_this2.seconds > 59) {
            _this2.seconds = 0;
            _this2.minutes++;
          }
          _this2.answer_seconds++;
          if (_this2.answer_seconds > 59) {
            _this2.answer_seconds = 0;
            _this2.answer_minutes++;
          }
        }, 1000);
      }
    },
    getOptionClass: function getOptionClass(index, qtime) {
      if (qtime > 0) {
        if (index == 0) {
          return 'animate__animated animate__lightSpeedInRight';
        }
        return 'animate__animated animate__lightSpeedInRight animate__delay-' + index + 's';
      }
      return '';
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/practice/resultdetails.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/practice/resultdetails.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************************************************************************/
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

/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['results', 'ws', 'correct', 'wrong', 'lang'],
  methods: {
    reloadPage: function reloadPage() {
      window.location.reload();
    },
    back: function back() {
      window.history.back();
      // window.history.back()
    },
    isImg: function isImg(link) {
      return link.match(/\.(jpeg|jpg|gif|png)$/) != null;
      // let data = link.split('.')
      // console.log(data.length > 1)
      // return data.length > 1
    },
    tbe: function tbe(b, e, l) {
      return l === 'bd' ? !!b ? b : e : !!e ? e : b;
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/Practice.vue?vue&type=style&index=0&lang=css&":
/*!*****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/Practice.vue?vue&type=style&index=0&lang=css& ***!
  \*****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ (function(module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, "\n#ar {\n    position: absolute;\n    background: transparent;\n    width: 60%;\n    height: 50px;\n    top: 18px;\n}\n.shadow-1:before {\n    content: \"\";\n    position: absolute;\n    left: 0;\n    right: 0;\n    top: 0;\n    bottom: 0;\n    width: inherit;\n    height: inherit;\n    z-index: -2;\n    box-sizing: border-box;\n    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.13);\n}\n.shadow-1:after {\n    content: \"\";\n    position: absolute;\n    left: 0;\n    right: 0;\n    top: 0;\n    bottom: 0;\n    width: inherit;\n    height: inherit;\n    z-index: -2;\n    box-sizing: border-box;\n    box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.08);\n}\n.imageDiv:hover {\n    background-color: #38c172\n}\n.imageOption {\n    height: 100px;\n    width: 100%;\n}\n@media screen and (min-width: 480px) {\n.imageOption {\n        height: 170px;\n        width: 100%;\n}\n}\n\n", ""]);
// Exports
/* harmony default export */ __webpack_exports__["default"] = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/practice/resultdetails.vue?vue&type=style&index=0&lang=css&":
/*!********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/practice/resultdetails.vue?vue&type=style&index=0&lang=css& ***!
  \********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ (function(module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, "\n#accordion{\r\n    max-width: 500px !important;\n}\r\n\r\n", ""]);
// Exports
/* harmony default export */ __webpack_exports__["default"] = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/Practice.vue?vue&type=style&index=0&lang=css&":
/*!*********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/Practice.vue?vue&type=style&index=0&lang=css& ***!
  \*********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Practice_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Practice.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/Practice.vue?vue&type=style&index=0&lang=css&");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Practice_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"], options);



/* harmony default export */ __webpack_exports__["default"] = (_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Practice_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"].locals || {});

/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/practice/resultdetails.vue?vue&type=style&index=0&lang=css&":
/*!************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/practice/resultdetails.vue?vue&type=style&index=0&lang=css& ***!
  \************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_resultdetails_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./resultdetails.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/practice/resultdetails.vue?vue&type=style&index=0&lang=css&");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_resultdetails_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"], options);



/* harmony default export */ __webpack_exports__["default"] = (_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_resultdetails_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"].locals || {});

/***/ }),

/***/ "./resources/js/components/games/Practice.vue":
/*!****************************************************!*\
  !*** ./resources/js/components/games/Practice.vue ***!
  \****************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Practice_vue_vue_type_template_id_2e0baf74___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Practice.vue?vue&type=template&id=2e0baf74& */ "./resources/js/components/games/Practice.vue?vue&type=template&id=2e0baf74&");
/* harmony import */ var _Practice_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Practice.vue?vue&type=script&lang=js& */ "./resources/js/components/games/Practice.vue?vue&type=script&lang=js&");
/* harmony import */ var _Practice_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Practice.vue?vue&type=style&index=0&lang=css& */ "./resources/js/components/games/Practice.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");



;


/* normalize component */

var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _Practice_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Practice_vue_vue_type_template_id_2e0baf74___WEBPACK_IMPORTED_MODULE_0__.render,
  _Practice_vue_vue_type_template_id_2e0baf74___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/games/Practice.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/helper/practice/resultdetails.vue":
/*!*******************************************************************!*\
  !*** ./resources/js/components/helper/practice/resultdetails.vue ***!
  \*******************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _resultdetails_vue_vue_type_template_id_e17e6c12___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./resultdetails.vue?vue&type=template&id=e17e6c12& */ "./resources/js/components/helper/practice/resultdetails.vue?vue&type=template&id=e17e6c12&");
/* harmony import */ var _resultdetails_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./resultdetails.vue?vue&type=script&lang=js& */ "./resources/js/components/helper/practice/resultdetails.vue?vue&type=script&lang=js&");
/* harmony import */ var _resultdetails_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./resultdetails.vue?vue&type=style&index=0&lang=css& */ "./resources/js/components/helper/practice/resultdetails.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! !../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");



;


/* normalize component */

var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _resultdetails_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _resultdetails_vue_vue_type_template_id_e17e6c12___WEBPACK_IMPORTED_MODULE_0__.render,
  _resultdetails_vue_vue_type_template_id_e17e6c12___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/helper/practice/resultdetails.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/games/Practice.vue?vue&type=script&lang=js&":
/*!*****************************************************************************!*\
  !*** ./resources/js/components/games/Practice.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Practice_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Practice.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/Practice.vue?vue&type=script&lang=js&");
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Practice_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/helper/practice/resultdetails.vue?vue&type=script&lang=js&":
/*!********************************************************************************************!*\
  !*** ./resources/js/components/helper/practice/resultdetails.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_resultdetails_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./resultdetails.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/practice/resultdetails.vue?vue&type=script&lang=js&");
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_resultdetails_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/games/Practice.vue?vue&type=style&index=0&lang=css&":
/*!*************************************************************************************!*\
  !*** ./resources/js/components/games/Practice.vue?vue&type=style&index=0&lang=css& ***!
  \*************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Practice_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader/dist/cjs.js!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Practice.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/Practice.vue?vue&type=style&index=0&lang=css&");


/***/ }),

/***/ "./resources/js/components/helper/practice/resultdetails.vue?vue&type=style&index=0&lang=css&":
/*!****************************************************************************************************!*\
  !*** ./resources/js/components/helper/practice/resultdetails.vue?vue&type=style&index=0&lang=css& ***!
  \****************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_resultdetails_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/style-loader/dist/cjs.js!../../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./resultdetails.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/practice/resultdetails.vue?vue&type=style&index=0&lang=css&");


/***/ }),

/***/ "./resources/js/components/games/Practice.vue?vue&type=template&id=2e0baf74&":
/*!***********************************************************************************!*\
  !*** ./resources/js/components/games/Practice.vue?vue&type=template&id=2e0baf74& ***!
  \***********************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Practice_vue_vue_type_template_id_2e0baf74___WEBPACK_IMPORTED_MODULE_0__.render; },
/* harmony export */   "staticRenderFns": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Practice_vue_vue_type_template_id_2e0baf74___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns; }
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Practice_vue_vue_type_template_id_2e0baf74___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Practice.vue?vue&type=template&id=2e0baf74& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/Practice.vue?vue&type=template&id=2e0baf74&");


/***/ }),

/***/ "./resources/js/components/helper/practice/resultdetails.vue?vue&type=template&id=e17e6c12&":
/*!**************************************************************************************************!*\
  !*** ./resources/js/components/helper/practice/resultdetails.vue?vue&type=template&id=e17e6c12& ***!
  \**************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_resultdetails_vue_vue_type_template_id_e17e6c12___WEBPACK_IMPORTED_MODULE_0__.render; },
/* harmony export */   "staticRenderFns": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_resultdetails_vue_vue_type_template_id_e17e6c12___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns; }
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_resultdetails_vue_vue_type_template_id_e17e6c12___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./resultdetails.vue?vue&type=template&id=e17e6c12& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/practice/resultdetails.vue?vue&type=template&id=e17e6c12&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/Practice.vue?vue&type=template&id=2e0baf74&":
/*!**************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/Practice.vue?vue&type=template&id=2e0baf74& ***!
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
  return _c("div", { staticClass: "container" }, [
    _vm.winner_screen
      ? _c(
          "div",
          { staticClass: "winner" },
          [
            _vm.place == 1
              ? _c("img", {
                  staticStyle: { width: "100px", "margin-right": "15px" },
                  attrs: { src: "/img/quiz/position/1st.gif", alt: "" },
                })
              : _vm._e(),
            _vm._v(" "),
            _vm.place == 2
              ? _c("img", {
                  staticStyle: { width: "100px", "margin-right": "15px" },
                  attrs: { src: "/img/quiz/position/2nd.gif", alt: "" },
                })
              : _vm._e(),
            _vm._v(" "),
            _vm.place == 3
              ? _c("img", {
                  staticStyle: { width: "100px", margin: "15px" },
                  attrs: { src: "/img/quiz/position/3rd.gif", alt: "" },
                })
              : _vm._e(),
            _vm._v(" "),
            _c("div", { staticClass: "d-flex" }, [
              _c("button", { on: { click: _vm.firstPlace } }, [
                _vm._v("First"),
              ]),
              _vm._v(" "),
              _c("button", { on: { click: _vm.secondPlace } }, [
                _vm._v("Second"),
              ]),
              _vm._v(" "),
              _c("button", { on: { click: _vm.thirdPlace } }, [
                _vm._v("Third"),
              ]),
            ]),
            _vm._v(" "),
            _c("h2", { staticClass: "text-center" }, [
              _vm._v("Quiz Game Over"),
            ]),
            _vm._v(" "),
            _c("h3", [_vm._v(_vm._s(_vm.pm.perform_message))]),
            _vm._v(" "),
            _c("resultdetails", {
              attrs: {
                results: _vm.results,
                ws: _vm.winner_screen,
                correct: _vm.correct,
                wrong: _vm.wrong,
              },
            }),
          ],
          1
        )
      : _vm._e(),
    _vm._v(" "),
    _c("div", { staticClass: "row justify-content-center" }, [
      _c(
        "div",
        { staticClass: "col-md-7" },
        _vm._l(_vm.questions, function (question) {
          return question.id === _vm.current
            ? _c("div", { staticClass: "card my-4" }, [
                _c(
                  "div",
                  {
                    key: _vm.qid,
                    staticClass:
                      "card-body animate__animated animate__backInDown animate__faster",
                  },
                  [
                    _c("span", { staticClass: "q_num text-right text-muted" }, [
                      _vm._v(
                        "\n                            " +
                          _vm._s(
                            _vm.qne2b(
                              _vm.qid,
                              _vm.questions.length,
                              _vm.user.lang
                            )
                          ) +
                          "\n                        "
                      ),
                    ]),
                    _vm._v(" "),
                    question.fileType == "image"
                      ? _c("img", {
                          staticClass: "image w-50 mt-1 rounded img-thumbnail",
                          staticStyle: { "max-height": "50vh" },
                          attrs: {
                            src: "/" + question.question_file_link,
                            alt: "",
                          },
                        })
                      : _vm._e(),
                    _vm._v(" "),
                    question.fileType == "video"
                      ? _c("div", { staticClass: "video" }, [
                          _vm._v(
                            "\n                            " +
                              _vm._s() +
                              "\n                            "
                          ),
                          question.fileType == "video"
                            ? _c("video", {
                                staticClass:
                                  "image w-100 mt-1 rounded img-thumbnail",
                                attrs: {
                                  id: "myVideo",
                                  src: "/" + question.question_file_link,
                                  autoplay: "",
                                  controls: "",
                                },
                                on: {
                                  error: function ($event) {
                                    return _vm.audioVideoError()
                                  },
                                  ended: function ($event) {
                                    return _vm.onEnd()
                                  },
                                  play: function ($event) {
                                    return _vm.onStart()
                                  },
                                },
                              })
                            : _vm._e(),
                        ])
                      : _vm._e(),
                    _vm._v(" "),
                    question.fileType == "audio"
                      ? _c("div", { staticClass: "audio" }, [
                          _c("audio", {
                            attrs: {
                              src: "/" + question.question_file_link,
                              controls: "",
                              autoplay: "",
                            },
                            on: {
                              error: function ($event) {
                                return _vm.audioVideoError()
                              },
                              ended: function ($event) {
                                return _vm.onEnd()
                              },
                              play: function ($event) {
                                return _vm.onStart()
                              },
                            },
                          }),
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
                                _c("h3", { staticClass: "text-danger" }, [
                                  _vm._v("Q."),
                                ]),
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
                              _vm._l(question.options, function (option, i) {
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
                                              _vm.quiz.quiz_time
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
                                                click: function ($event) {
                                                  _vm.checkAnswer(
                                                    question.id,
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
                                            staticClass: "cursor my-1 imageDiv",
                                            class: _vm.getOptionClass(
                                              i,
                                              _vm.quiz.quiz_time
                                            ),
                                            on: {
                                              click: function ($event) {
                                                return _vm.checkAnswer(
                                                  question.id,
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
                                                src: "/" + option.img_link,
                                                alt: "",
                                              },
                                            }),
                                          ]
                                        ),
                                  ]
                                )
                              }),
                              0
                            )
                          : _c("div", { staticClass: "text-center" }, [
                              _c("img", {
                                staticStyle: { width: "200px" },
                                attrs: {
                                  src: "/img/loading.gif",
                                  alt: "Loading...",
                                },
                              }),
                            ]),
                      ]
                    ),
                  ]
                ),
              ])
            : _vm._e()
        }),
        0
      ),
      _vm._v(" "),
      _c("div", { staticClass: "col-md-5" }, [
        _c("div", { staticClass: "card my-4" }, [
          _c(
            "div",
            { staticClass: "card-header text-center card-title py-1" },
            [
              _c("strong", [_vm._v(_vm._s(_vm.__("games.information")))]),
              _vm._v(" "),
              _vm.qid > 0
                ? _c(
                    "div",
                    {
                      staticClass: "btn btn-sm btn-warning float-right",
                      on: { click: _vm.reloadPage },
                    },
                    [_vm._v("Reset\n                        ")]
                  )
                : _vm._e(),
            ]
          ),
          _vm._v(" "),
          _c("div", { staticClass: "card-body" }, [
            _c("ul", { staticClass: "list-group text-dark" }, [
              _c(
                "li",
                {
                  staticClass:
                    "list-group-item d-flex justify-content-between align-items-center",
                },
                [
                  _vm._v(
                    "\n                                " +
                      _vm._s(_vm.__("games.time_taken")) +
                      "\n                                "
                  ),
                  _c("span", { staticClass: "badge badge-light badge-pill" }, [
                    _vm._v(
                      "\n                            " +
                        _vm._s(_vm.minutes) +
                        ": " +
                        _vm._s(
                          _vm.seconds > 9 ? _vm.seconds : "0" + _vm.seconds
                        ) +
                        "\n                        "
                    ),
                  ]),
                ]
              ),
              _vm._v(" "),
              _c(
                "li",
                {
                  staticClass:
                    "list-group-item d-flex justify-content-between align-items-center",
                },
                [
                  _vm._v(
                    "\n                                " +
                      _vm._s(_vm.__("games.correct")) +
                      "\n                                "
                  ),
                  _c(
                    "span",
                    { staticClass: "badge badge-success badge-pill" },
                    [_vm._v(_vm._s(_vm.correct))]
                  ),
                ]
              ),
              _vm._v(" "),
              _c(
                "li",
                {
                  staticClass:
                    "list-group-item d-flex justify-content-between align-items-center",
                },
                [
                  _vm._v(
                    "\n                                " +
                      _vm._s(_vm.__("games.wrong")) +
                      "\n                                "
                  ),
                  _c("span", { staticClass: "badge badge-danger badge-pill" }, [
                    _vm._v(_vm._s(_vm.wrong)),
                  ]),
                ]
              ),
              _vm._v(" "),
              _vm.qid > 0
                ? _c(
                    "li",
                    {
                      staticClass:
                        "list-group-item d-flex justify-content-between align-items-center p-0",
                    },
                    [
                      _c("resultdetails", {
                        attrs: {
                          results: _vm.results,
                          ws: _vm.winner_screen,
                          lang: _vm.user.lang,
                        },
                      }),
                    ],
                    1
                  )
                : _vm._e(),
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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/practice/resultdetails.vue?vue&type=template&id=e17e6c12&":
/*!*****************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/practice/resultdetails.vue?vue&type=template&id=e17e6c12& ***!
  \*****************************************************************************************************************************************************************************************************************************************/
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
  return _c("div", { staticClass: "w-100", attrs: { id: "accordion" } }, [
    _c("div", { staticClass: "card" }, [
      _vm._m(0),
      _vm._v(" "),
      _c(
        "div",
        {
          staticClass: "collapse show",
          attrs: {
            id: "collapseOne",
            "aria-labelledby": "headingOne",
            "data-parent": "#accordion",
          },
        },
        [
          _c("div", { staticClass: "card-body p-0" }, [
            _c(
              "ul",
              {
                staticClass: "list-group text-dark",
                staticStyle: { "max-height": "380px", overflow: "auto" },
              },
              _vm._l(_vm.results, function (result) {
                return _c(
                  "li",
                  {
                    key: result.id,
                    staticClass:
                      "list-group-item d-flex justify-content-between align-items-center p-1",
                  },
                  [
                    _c("div", { staticClass: "font-weight-light f-13" }, [
                      _c("span", {
                        staticClass: "font-weight-bold",
                        domProps: { innerHTML: _vm._s(result.question) },
                      }),
                      _vm._v(" "),
                      result.isCorrect != 0
                        ? _c("p", [
                            _c("span", [
                              _vm._v(
                                "  " +
                                  _vm._s(
                                    _vm.tbe(
                                      "আপনার উত্তরটি সঠিক হয়েছেঃ ",
                                      "Your answer is correct: ",
                                      _vm.lang
                                    )
                                  )
                              ),
                            ]),
                            _vm._v(" "),
                            _vm.isImg(result.selected)
                              ? _c(
                                  "span",
                                  {
                                    staticClass:
                                      "font-weight-light font-italic",
                                  },
                                  [
                                    _c("img", {
                                      staticClass:
                                        "image mt-1 rounded img-thumbnail",
                                      staticStyle: { "max-height": "10vh" },
                                      attrs: {
                                        src: "/" + result.selected,
                                        alt: "",
                                      },
                                    }),
                                  ]
                                )
                              : _c("span", {
                                  staticClass: "font-weight-light font-italic",
                                  domProps: {
                                    innerHTML: _vm._s(result.selected),
                                  },
                                }),
                            _vm._v(" "),
                            _c("i", {
                              staticClass: "fa fa-check text-success",
                              attrs: { "aria-hidden": "true" },
                            }),
                          ])
                        : _c("p", [
                            _c("span", [
                              _vm._v(
                                " " +
                                  _vm._s(
                                    _vm.tbe(
                                      "আপনার দেয়া উত্তরঃ ",
                                      "Your answer: ",
                                      _vm.lang
                                    )
                                  ) +
                                  " "
                              ),
                            ]),
                            _vm._v(" "),
                            _vm.isImg(result.selected)
                              ? _c(
                                  "span",
                                  {
                                    staticClass:
                                      "font-weight-light font-italic",
                                  },
                                  [
                                    _c("img", {
                                      staticClass:
                                        "image mt-1 rounded img-thumbnail",
                                      staticStyle: { "max-height": "10vh" },
                                      attrs: {
                                        src: "/" + result.selected,
                                        alt: "",
                                      },
                                    }),
                                  ]
                                )
                              : _c("span", {
                                  staticClass: "font-weight-light font-italic",
                                  domProps: {
                                    innerHTML: _vm._s(result.selected),
                                  },
                                }),
                            _vm._v(" "),
                            _c("i", {
                              staticClass: "fa fa-times text-danger",
                              attrs: { "aria-hidden": "true" },
                            }),
                            _vm._v(" "),
                            _c("br"),
                            _vm._v(" "),
                            _c("span", [
                              _vm._v(
                                _vm._s(
                                  _vm.tbe(
                                    "সঠিক উত্তরঃ ",
                                    "Correct answer: ",
                                    _vm.lang
                                  )
                                )
                              ),
                            ]),
                            _vm._v(" "),
                            _vm.isImg(result.answer)
                              ? _c(
                                  "span",
                                  {
                                    staticClass:
                                      "font-weight-light font-italic",
                                  },
                                  [
                                    _c("img", {
                                      staticClass:
                                        "image mt-1 rounded img-thumbnail",
                                      staticStyle: { "max-height": "10vh" },
                                      attrs: {
                                        src: "/" + result.answer,
                                        alt: "",
                                      },
                                    }),
                                  ]
                                )
                              : _c("span", {
                                  staticClass: "font-weight-light font-italic",
                                  domProps: {
                                    innerHTML: _vm._s(result.answer),
                                  },
                                }),
                            _vm._v(" "),
                            _c("i", {
                              staticClass: "fa fa-check text-success",
                              attrs: { "aria-hidden": "true" },
                            }),
                          ]),
                    ]),
                    _vm._v(" "),
                    _c(
                      "span",
                      { staticClass: "badge badge-light badge-pill" },
                      [
                        _vm._v(
                          "\n                        " +
                            _vm._s(result.time) +
                            "\n                    "
                        ),
                      ]
                    ),
                  ]
                )
              }),
              0
            ),
          ]),
        ]
      ),
      _vm._v(" "),
      _vm.ws == 1
        ? _c(
            "div",
            { staticClass: "card-footer d-flex justify-content-between" },
            [
              _c(
                "button",
                {
                  staticClass: "btn btn-sm btn-success",
                  on: { click: _vm.back },
                },
                [_vm._v("New Quiz")]
              ),
              _vm._v(" "),
              _c(
                "div",
                {
                  staticClass: "btn-group mr-2",
                  attrs: { role: "group", "aria-label": "Right Wrong" },
                },
                [
                  _c(
                    "button",
                    {
                      staticClass: "btn btn-sm btn-success",
                      attrs: {
                        type: "button",
                        "data-toggle": "tooltip",
                        "data-placement": "top",
                        title: "Correct Answer",
                      },
                    },
                    [_vm._v(_vm._s(_vm.correct))]
                  ),
                  _vm._v(" "),
                  _c(
                    "button",
                    {
                      staticClass: "btn btn-sm btn-danger",
                      attrs: {
                        type: "button",
                        "data-toggle": "tooltip",
                        "data-placement": "top",
                        title: "Wrong Answer",
                      },
                    },
                    [_vm._v(_vm._s(_vm.wrong))]
                  ),
                ]
              ),
              _vm._v(" "),
              _c(
                "button",
                {
                  staticClass: "btn btn-sm btn-secondary",
                  on: { click: _vm.reloadPage },
                },
                [_vm._v("Replay")]
              ),
            ]
          )
        : _vm._e(),
    ]),
  ])
}
var staticRenderFns = [
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass: "card-header py-1",
        attrs: {
          id: "headingOne",
          "data-toggle": "collapse",
          "data-target": "#collapseOne",
          "aria-expanded": "true",
          "aria-controls": "collapseOne",
        },
      },
      [
        _c("small", { staticClass: "mb-0 cursor" }, [
          _vm._v("\n              Result Details\n          "),
        ]),
      ]
    )
  },
]
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
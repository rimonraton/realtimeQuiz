"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_components_games_ExamResult_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/ExamResult.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/ExamResult.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helper_Examination_option__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../helper/Examination/option */ "./resources/js/components/helper/Examination/option.vue");
function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }
function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }
function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  components: {
    OptionComponent: _helper_Examination_option__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  props: ['exam', 'user'],
  data: function data() {
    return {
      screen: {
        exam: true,
        examSubmit: false
      },
      formData: {
        topics: 0,
        q_number: null
      },
      questiondata: this.questions,
      countDown: this.examTime,
      timer: {
        hours: 0,
        minutes: 0,
        seconds: 0
      },
      results: []
    };
  },
  methods: {
    countDownTimer: function countDownTimer() {
      var _this = this;
      if (this.countDown > 0) {
        setTimeout(function () {
          _this.countDown -= 1;
          _this.timer.minutes = Math.floor(_this.countDown / 60);
          _this.timer.seconds = Math.floor(_this.countDown % 60);
          _this.timer.hours = _this.countDown > 3600 ? Math.floor(_this.countDown / 3600) : 0;
          _this.countDownTimer();
        }, 1000);
      }
    },
    onnoFunc: function onnoFunc() {
      $('#qmodal').modal('hide');
      this.$emit('addQuestion', this.formData);
      this.clear();
    },
    clear: function clear() {
      this.formData = {
        topics: 0,
        q_number: null
      };
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
        9: '৯',
        '.': '.'
      };
      _toConsumableArray(numbString).forEach(function (n) {
        return bn += eb[n];
      });
      return bn;
    },
    tbe: function tbe(b, e, l) {
      if (b !== null && e !== null) {
        if (l === 'bd') {
          return b;
        }
        return e;
      } else if (b !== null && e === null) {
        return b;
      } else if (b === null && e !== null) {
        return e;
      }
      return b;
    },
    showModal: function showModal() {
      $('#qmodal').modal('show');
      this.isModalVisible = true;
    },
    ToText: function ToText(input) {
      return input.replace(/<(style|script|iframe)[^>]*?>[\s\S]+?<\/\1\s*>/gi, '').replace(/<[^>]+?>/g, '').replace(/\s+/g, ' ').replace(/ /g, ' ').replace(/>/g, ' ').replace(/&nbsp;/g, '').replace(/&rsquo;/g, '');
    },
    imageOption: function imageOption(objArray) {
      var data = objArray.some(function (a) {
        return a.flag == 'img';
      });
      // const data = objArray.find(a => a.flag == 'img');
      return data;
    },
    fileType: function fileType(fileT) {
      if (fileT == 'image' || fileT == 'video' || fileT == 'audio') {
        return true;
      }
      return false;
    },
    fileText: function fileText(file, lang) {
      if (lang == 'gb') {
        return file == 'image' ? 'This is image question' : file == 'video' ? 'This is video question' : 'This is audio question';
      }
      return file == 'image' ? 'এটি ইমেজ প্রশ্ন' : file == 'video' ? 'এটি ভিডিও প্রশ্ন' : 'এটি অডিও প্রশ্ন';
    },
    // totalTime(){
    //     const hours = this.examTime > 3600 ? Math.floor(this.examTime/3600) : 0
    //     const minutes = Math.floor(this.examTime/60)
    //     const seconds = Math.floor(this.examTime % 60)
    //     if(this.user.lang == 'gb') {
    //         return hours + 'h' +' '+ minutes + 'm' +' '+ seconds + 's'
    //     }
    //     return this.q2bNumber(hours) + 'ঘণ্টা' +' '+ this.q2bNumber(minutes) + 'মিনিট' +' '+ this.q2bNumber(seconds) + 'সেকেন্ড'
    // }
    totalTime: function totalTime() {
      var hasHours;
      var hasMinutes;
      var hasSeconds;
      var hours = this.examTime > 3600 ? Math.floor(this.examTime / 3600) : 0;
      var minutes = Math.floor(this.examTime / 60);
      var seconds = Math.floor(this.examTime % 60);
      // console.log(hours, minutes, seconds , 'times...')
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
    answer: function answer(data) {
      if (this.results.length > 0) {
        var found = this.results.some(function (el) {
          return el.id === data.id;
        });
        if (found) {
          var itemToRemoveIndex = this.results.findIndex(function (item) {
            return item.id === data.id;
          });
          if (data.selected == null) {
            if (itemToRemoveIndex !== -1) {
              this.results.splice(itemToRemoveIndex, 1);
            }
          } else {
            this.results[itemToRemoveIndex] = data;
          }
        } else {
          this.results.push(data);
        }
      } else {
        this.results.push(data);
      }
      console.log(this.results, 'results');

      // proceed to remove an item only if it exists.
      // if(itemToRemoveIndex !== -1){
      //     myArray.splice(itemToRemoveIndex, 1);
      // }
      // this.results.push(data)
    },
    submitExam: function submitExam() {
      var _this2 = this;
      var resultValue = {
        'user_id': this.user.id,
        'examination_id': this.qid.id,
        'results': this.results
      };
      axios.post('/api/save-results', resultValue).then(function (res) {
        console.log(res, 'response from server');
        _this2.screen.exam = false;
        _this2.screen.examSubmit = true;
      });
      console.log(this.results);
    },
    totalMark: function totalMark() {
      console.log(this.exam);
      var ca = JSON.parse(this.exam.results[0].result).filter(function (item) {
        return item.correct == 1;
      }).length;
      var wa = JSON.parse(this.exam.results[0].result).filter(function (item) {
        return item.correct == 0;
      }).length;
      var nm = this.exam.negative_mark > 0 ? this.exam.each_question_mark * this.exam.negative_mark / 100 : 0;
      var sub_total_mark = ca * this.exam.each_question_mark;
      var for_wrong_answer_negative_sub_total_mark = wa * nm;
      var total = sub_total_mark - for_wrong_answer_negative_sub_total_mark;
      return total > 0 ? total : 0;
    }
  },
  created: function created() {
    this.countDownTimer();
    console.log('created');
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/Examination/option.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/Examination/option.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************************************************************************/
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

/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['options', 'user', 'question'],
  data: function data() {
    return {
      qoption: {
        selected: null,
        id: null,
        option: null,
        correct: null,
        question: this.question,
        correctOption: null,
        img_link: null,
        correct_img_link: null
      }
    };
  },
  methods: {
    clickSelect: function clickSelect(index, option) {
      if (this.qoption.selected == index) {
        this.qoption.selected = null;
        this.qoption.id = option.question_id;
        this.qoption.option = null;
        this.qoption.img_link = null;
        this.qoption.correct = null;
        this.qoption.correctOption = null;
      } else {
        this.qoption.selected = index;
        this.qoption.id = option.question_id;
        this.qoption.option = this.tbe(option.bd_option, option.option, this.user.lang);
        this.qoption.img_link = option.img_link;
        this.qoption.correct_img_link = option.flag == 'img' ? option.correct == 0 ? this.options.find(function (o) {
          return o.correct == 1;
        }).img_link : null : null;
        this.qoption.correct = option.correct;
        this.qoption.correctOption = option.correct == 0 ? this.tbe(this.options.find(function (o) {
          return o.correct == 1;
        }).bd_option, this.options.find(function (o) {
          return o.correct == 1;
        }).option, this.user.lang) : null;
      }
      this.$emit('answer', this.qoption);
      // console.log(this.isPredict())
    },
    tbe: function tbe(b, e, l) {
      if (b && e) {
        if (l === 'bd') {
          return b;
        }
        return e;
      } else if (b) {
        return b;
      } else if (e) {
        return e;
      }
      return;
    },
    imageOption: function imageOption(objArray) {
      var data = objArray.some(function (a) {
        return a.flag == 'img';
      });
      // const data = objArray.find(a => a.flag == 'img');
      return data;
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/ExamResult.vue?vue&type=style&index=0&lang=css&":
/*!*******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/ExamResult.vue?vue&type=style&index=0&lang=css& ***!
  \*******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ (function(module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, "\n#qmodal {\n    background: linear-gradient(to right, #0083B0, #00B4DB);\n}\n#btn_cls_q {\n    font-size: 30px;\n    position: absolute;\n    right: -7px;\n    top: -3px;\n    background: white;\n    border: 1px solid;\n    border-radius: 50%;\n    width: 35px;\n    /* z-index: 999999; */\n}\n.imgTick{\n    position: absolute;\n    right: 24px;\n    top: 15px;\n}\n.imageOption {\n    height: 100px;\n    width: 100%;\n}\n@media screen and (min-width: 480px) {\n.imageOption {\n        height: 170px;\n        width: 100%;\n}\n}\n.imageDiv{\n    width: 300px;\n}\n", ""]);
// Exports
/* harmony default export */ __webpack_exports__["default"] = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/Examination/option.vue?vue&type=style&index=0&id=78a10eb9&scoped=true&lang=css&":
/*!****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/Examination/option.vue?vue&type=style&index=0&id=78a10eb9&scoped=true&lang=css& ***!
  \****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ (function(module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, "\n.Tick[data-v-78a10eb9]{\n    position: absolute;\n    width: 100%;\n    height: 100%;\n    top: 0;\n    background-color: gray;\n    opacity: .7;\n}\n", ""]);
// Exports
/* harmony default export */ __webpack_exports__["default"] = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/ExamResult.vue?vue&type=style&index=0&lang=css&":
/*!***********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/ExamResult.vue?vue&type=style&index=0&lang=css& ***!
  \***********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ExamResult_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./ExamResult.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/ExamResult.vue?vue&type=style&index=0&lang=css&");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ExamResult_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"], options);



/* harmony default export */ __webpack_exports__["default"] = (_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ExamResult_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"].locals || {});

/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/Examination/option.vue?vue&type=style&index=0&id=78a10eb9&scoped=true&lang=css&":
/*!********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/Examination/option.vue?vue&type=style&index=0&id=78a10eb9&scoped=true&lang=css& ***!
  \********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_option_vue_vue_type_style_index_0_id_78a10eb9_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./option.vue?vue&type=style&index=0&id=78a10eb9&scoped=true&lang=css& */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/Examination/option.vue?vue&type=style&index=0&id=78a10eb9&scoped=true&lang=css&");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_option_vue_vue_type_style_index_0_id_78a10eb9_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"], options);



/* harmony default export */ __webpack_exports__["default"] = (_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_option_vue_vue_type_style_index_0_id_78a10eb9_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"].locals || {});

/***/ }),

/***/ "./resources/js/components/games/ExamResult.vue":
/*!******************************************************!*\
  !*** ./resources/js/components/games/ExamResult.vue ***!
  \******************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ExamResult_vue_vue_type_template_id_008b2a95___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ExamResult.vue?vue&type=template&id=008b2a95& */ "./resources/js/components/games/ExamResult.vue?vue&type=template&id=008b2a95&");
/* harmony import */ var _ExamResult_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ExamResult.vue?vue&type=script&lang=js& */ "./resources/js/components/games/ExamResult.vue?vue&type=script&lang=js&");
/* harmony import */ var _ExamResult_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./ExamResult.vue?vue&type=style&index=0&lang=css& */ "./resources/js/components/games/ExamResult.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");



;


/* normalize component */

var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _ExamResult_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ExamResult_vue_vue_type_template_id_008b2a95___WEBPACK_IMPORTED_MODULE_0__.render,
  _ExamResult_vue_vue_type_template_id_008b2a95___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/games/ExamResult.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/helper/Examination/option.vue":
/*!***************************************************************!*\
  !*** ./resources/js/components/helper/Examination/option.vue ***!
  \***************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _option_vue_vue_type_template_id_78a10eb9_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./option.vue?vue&type=template&id=78a10eb9&scoped=true& */ "./resources/js/components/helper/Examination/option.vue?vue&type=template&id=78a10eb9&scoped=true&");
/* harmony import */ var _option_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./option.vue?vue&type=script&lang=js& */ "./resources/js/components/helper/Examination/option.vue?vue&type=script&lang=js&");
/* harmony import */ var _option_vue_vue_type_style_index_0_id_78a10eb9_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./option.vue?vue&type=style&index=0&id=78a10eb9&scoped=true&lang=css& */ "./resources/js/components/helper/Examination/option.vue?vue&type=style&index=0&id=78a10eb9&scoped=true&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! !../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");



;


/* normalize component */

var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _option_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _option_vue_vue_type_template_id_78a10eb9_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render,
  _option_vue_vue_type_template_id_78a10eb9_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  "78a10eb9",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/helper/Examination/option.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/games/ExamResult.vue?vue&type=script&lang=js&":
/*!*******************************************************************************!*\
  !*** ./resources/js/components/games/ExamResult.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ExamResult_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./ExamResult.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/ExamResult.vue?vue&type=script&lang=js&");
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ExamResult_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/helper/Examination/option.vue?vue&type=script&lang=js&":
/*!****************************************************************************************!*\
  !*** ./resources/js/components/helper/Examination/option.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_option_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./option.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/Examination/option.vue?vue&type=script&lang=js&");
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_option_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/games/ExamResult.vue?vue&type=style&index=0&lang=css&":
/*!***************************************************************************************!*\
  !*** ./resources/js/components/games/ExamResult.vue?vue&type=style&index=0&lang=css& ***!
  \***************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ExamResult_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader/dist/cjs.js!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./ExamResult.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/ExamResult.vue?vue&type=style&index=0&lang=css&");


/***/ }),

/***/ "./resources/js/components/helper/Examination/option.vue?vue&type=style&index=0&id=78a10eb9&scoped=true&lang=css&":
/*!************************************************************************************************************************!*\
  !*** ./resources/js/components/helper/Examination/option.vue?vue&type=style&index=0&id=78a10eb9&scoped=true&lang=css& ***!
  \************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_option_vue_vue_type_style_index_0_id_78a10eb9_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/style-loader/dist/cjs.js!../../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./option.vue?vue&type=style&index=0&id=78a10eb9&scoped=true&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/Examination/option.vue?vue&type=style&index=0&id=78a10eb9&scoped=true&lang=css&");


/***/ }),

/***/ "./resources/js/components/games/ExamResult.vue?vue&type=template&id=008b2a95&":
/*!*************************************************************************************!*\
  !*** ./resources/js/components/games/ExamResult.vue?vue&type=template&id=008b2a95& ***!
  \*************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ExamResult_vue_vue_type_template_id_008b2a95___WEBPACK_IMPORTED_MODULE_0__.render; },
/* harmony export */   "staticRenderFns": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ExamResult_vue_vue_type_template_id_008b2a95___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns; }
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ExamResult_vue_vue_type_template_id_008b2a95___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./ExamResult.vue?vue&type=template&id=008b2a95& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/ExamResult.vue?vue&type=template&id=008b2a95&");


/***/ }),

/***/ "./resources/js/components/helper/Examination/option.vue?vue&type=template&id=78a10eb9&scoped=true&":
/*!**********************************************************************************************************!*\
  !*** ./resources/js/components/helper/Examination/option.vue?vue&type=template&id=78a10eb9&scoped=true& ***!
  \**********************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_option_vue_vue_type_template_id_78a10eb9_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render; },
/* harmony export */   "staticRenderFns": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_option_vue_vue_type_template_id_78a10eb9_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns; }
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_option_vue_vue_type_template_id_78a10eb9_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./option.vue?vue&type=template&id=78a10eb9&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/Examination/option.vue?vue&type=template&id=78a10eb9&scoped=true&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/ExamResult.vue?vue&type=template&id=008b2a95&":
/*!****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/ExamResult.vue?vue&type=template&id=008b2a95& ***!
  \****************************************************************************************************************************************************************************************************************************/
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
    _vm.exam.results.length > 0
      ? _c("div", { staticClass: "row justify-content-center" }, [
          _c(
            "div",
            { staticClass: "col-md-8" },
            [
              _vm._l(
                JSON.parse(_vm.exam.results[0].result),
                function (result, index) {
                  return _c(
                    "div",
                    {
                      staticClass: "w-100 mb-2",
                      attrs: { id: "accordion" + index },
                    },
                    [
                      _c("div", { staticClass: "card text-white" }, [
                        _c(
                          "div",
                          {
                            staticClass: "card-header p-1 cursor",
                            class:
                              result.correct == 1 ? "bg-success" : "bg-danger",
                            attrs: {
                              id: "heading" + index,
                              "data-toggle": "collapse",
                              "data-target": "#collapse" + index,
                              "aria-expanded": "true",
                              "aria-controls": "collapse" + index,
                            },
                          },
                          [
                            _c(
                              "span",
                              {
                                staticClass: "text-white rounded-circle",
                                class: { qid: index == _vm.qid },
                              },
                              [
                                _vm._v(
                                  "\n                        " +
                                    _vm._s(
                                      _vm.user.lang == "gb"
                                        ? index + 1
                                        : _vm.q2bNumber(index + 1)
                                    ) +
                                    "\n                    "
                                ),
                              ]
                            ),
                            _vm._v(" "),
                            _vm._v(
                              "\n                    " +
                                _vm._s(result.question) +
                                "\n\t\t        "
                            ),
                          ]
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            class: { show: index == result.id },
                            attrs: {
                              id: "collapse" + index,
                              "aria-labelledby": "heading" + index,
                              "data-parent": "#accordion" + index,
                            },
                          },
                          [
                            _c("div", { staticClass: "card-body" }, [
                              _c("div", { staticClass: "px-1" }, [
                                result.option != null
                                  ? _c("div", { staticClass: "list-group" }, [
                                      _c(
                                        "span",
                                        {
                                          staticClass:
                                            "list-group-item list-group-item-action my-1",
                                        },
                                        [
                                          _vm._v(
                                            "\n                                " +
                                              _vm._s(result.option) +
                                              " (your answer)\n                                "
                                          ),
                                          result.correct == 1
                                            ? _c("i", {
                                                staticClass:
                                                  "fa fa-check text-success",
                                                attrs: {
                                                  "aria-hidden": "true",
                                                },
                                              })
                                            : _c("i", {
                                                staticClass:
                                                  "fa fa-times text-danger",
                                                attrs: {
                                                  "aria-hidden": "true",
                                                },
                                              }),
                                        ]
                                      ),
                                      _vm._v(" "),
                                      result.correct == 0
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
                                                  _vm._v(
                                                    "\n                                    " +
                                                      _vm._s(
                                                        result.correctOption
                                                      ) +
                                                      " (correct answer)\n                                    "
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
                                        : _vm._e(),
                                    ])
                                  : _c("div", { staticClass: "cursor my-1" }, [
                                      _c("div", { staticClass: "d-flex" }, [
                                        _c("div", [
                                          _c(
                                            "p",
                                            { staticClass: "text-dark" },
                                            [
                                              _vm._v(
                                                "(Your answer)\n                                          "
                                              ),
                                              result.correct == 1
                                                ? _c("i", {
                                                    staticClass:
                                                      "fa fa-check text-success",
                                                    attrs: {
                                                      "aria-hidden": "true",
                                                    },
                                                  })
                                                : _c("i", {
                                                    staticClass:
                                                      "fa fa-times text-danger",
                                                    attrs: {
                                                      "aria-hidden": "true",
                                                    },
                                                  }),
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c("img", {
                                            staticClass:
                                              "imageOption mt-1 rounded img-thumbnail",
                                            attrs: {
                                              src: "/" + result.img_link,
                                              alt: "",
                                            },
                                          }),
                                        ]),
                                        _vm._v(" "),
                                        result.correct == 0
                                          ? _c("div", [
                                              _vm._m(0, true),
                                              _vm._v(" "),
                                              _c("img", {
                                                staticClass:
                                                  "imageOption mt-1 rounded img-thumbnail",
                                                attrs: {
                                                  src:
                                                    "/" +
                                                    result.correct_img_link,
                                                  alt: "",
                                                },
                                              }),
                                            ])
                                          : _vm._e(),
                                      ]),
                                    ]),
                              ]),
                            ]),
                          ]
                        ),
                      ]),
                    ]
                  )
                }
              ),
              _vm._v(" "),
              _c("div", { staticClass: "d-flex justify-content-center py-2" }, [
                _c(
                  "a",
                  {
                    staticClass: "btn btn-sm btn-info rounded border",
                    attrs: { href: "/exam-result/" + _vm.exam.id },
                  },
                  [
                    _vm._v(
                      _vm._s(_vm.tbe("ফিরে যান", "Go Back", _vm.user.lang))
                    ),
                  ]
                ),
              ]),
            ],
            2
          ),
          _vm._v(" "),
          _c("div", { staticClass: "col-md-4" }, [
            _c("div", { staticClass: "card my-4 d-sm-none d-md-block" }, [
              _c("div", { staticClass: "card-header" }, [
                _vm._v(
                  "\n                    " +
                    _vm._s(_vm.user.lang == "gb" ? "Result" : "ফলাফল") +
                    "\n                "
                ),
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "card-body" }, [
                _c("p", [
                  _vm._v(
                    _vm._s(
                      _vm.user.lang == "gb" ? "Correct Answer" : "সঠিক উত্তর"
                    ) +
                      ": " +
                      _vm._s(
                        _vm.user.lang == "gb"
                          ? JSON.parse(_vm.exam.results[0].result).filter(
                              function (item) {
                                return item.correct == 1
                              }
                            ).length
                          : _vm.q2bNumber(
                              JSON.parse(_vm.exam.results[0].result).filter(
                                function (item) {
                                  return item.correct == 1
                                }
                              ).length
                            )
                      )
                  ),
                ]),
                _vm._v(" "),
                _c("p", [
                  _vm._v(
                    _vm._s(
                      _vm.user.lang == "gb" ? "Wrong Answer" : "ভূল উত্তর"
                    ) +
                      " : " +
                      _vm._s(
                        _vm.user.lang == "gb"
                          ? JSON.parse(_vm.exam.results[0].result).filter(
                              function (item) {
                                return item.correct == 0
                              }
                            ).length
                          : _vm.q2bNumber(
                              JSON.parse(_vm.exam.results[0].result).filter(
                                function (item) {
                                  return item.correct == 0
                                }
                              ).length
                            )
                      )
                  ),
                ]),
                _vm._v(" "),
                _c("p", [
                  _vm._v(
                    _vm._s(
                      _vm.user.lang == "gb" ? "Total Number" : "মোট নম্বর"
                    ) +
                      ": " +
                      _vm._s(
                        _vm.user.lang == "gb"
                          ? _vm.totalMark()
                          : _vm.q2bNumber(_vm.totalMark())
                      )
                  ),
                ]),
              ]),
            ]),
          ]),
        ])
      : _vm._e(),
  ])
}
var staticRenderFns = [
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("p", { staticClass: "text-dark" }, [
      _vm._v("(Correct answer)\n                                          "),
      _c("i", {
        staticClass: "fa fa-check text-success",
        attrs: { "aria-hidden": "true" },
      }),
    ])
  },
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/Examination/option.vue?vue&type=template&id=78a10eb9&scoped=true&":
/*!*************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/Examination/option.vue?vue&type=template&id=78a10eb9&scoped=true& ***!
  \*************************************************************************************************************************************************************************************************************************************************/
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
    {
      staticClass:
        "animate__animated animate__zoomIn animate__faster d-flex flex-wrap",
      class: {
        "row justify-content-center justify-item-center": _vm.imageOption(
          _vm.options
        ),
      },
    },
    _vm._l(_vm.options, function (option, index) {
      return _c(
        "div",
        {
          staticClass: "col-md-6 px-1",
          class: [option.flag == "img" ? "col-6" : " col-12"],
        },
        [
          option.flag != "img"
            ? _c("div", { staticClass: "list-group" }, [
                _c(
                  "span",
                  {
                    staticClass:
                      "list-group-item list-group-item-action cursor my-1",
                    class: [
                      "element-animation" + (index + 1),
                      { selected: _vm.qoption.selected == index },
                    ],
                    on: {
                      click: function ($event) {
                        return _vm.clickSelect(index, option)
                      },
                    },
                  },
                  [
                    _vm._v(
                      "\n            " +
                        _vm._s(
                          _vm.tbe(
                            option.bd_option,
                            option.option,
                            _vm.user.lang
                          )
                        ) +
                        "\n    "
                    ),
                  ]
                ),
              ])
            : _c(
                "div",
                {
                  staticClass: "cursor my-1",
                  on: {
                    click: function ($event) {
                      return _vm.clickSelect(index, option)
                    },
                  },
                },
                [
                  _c("img", {
                    staticClass: "imageOption mt-1 rounded img-thumbnail",
                    attrs: { src: "/" + option.img_link, alt: "" },
                  }),
                  _vm._v(" "),
                  _vm.qoption.selected == index
                    ? _c(
                        "div",
                        {
                          staticClass:
                            "Tick d-flex justify-content-center align-items-center",
                        },
                        [
                          _c("img", {
                            attrs: {
                              src: "/img/icons/tick.png",
                              width: "100px",
                              height: "100px",
                            },
                          }),
                        ]
                      )
                    : _vm._e(),
                ]
              ),
        ]
      )
    }),
    0
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
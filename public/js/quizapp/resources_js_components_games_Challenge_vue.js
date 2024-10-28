(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_components_games_Challenge_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/Challenge.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/Challenge.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helper_waiting__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../helper/waiting */ "./resources/js/components/helper/waiting.vue");
/* harmony import */ var _helper_result__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../helper/result */ "./resources/js/components/helper/result.vue");
/* harmony import */ var _helper_Chat__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../helper/Chat */ "./resources/js/components/helper/Chat.vue");
/* harmony import */ var _mixins_quizHelpers__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../mixins/quizHelpers */ "./resources/js/components/mixins/quizHelpers.js");
/* harmony import */ var _helper_practice_resultdetails_vue__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../helper/practice/resultdetails.vue */ "./resources/js/components/helper/practice/resultdetails.vue");
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
function _regeneratorRuntime() { "use strict"; /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */ _regeneratorRuntime = function _regeneratorRuntime() { return exports; }; var exports = {}, Op = Object.prototype, hasOwn = Op.hasOwnProperty, defineProperty = Object.defineProperty || function (obj, key, desc) { obj[key] = desc.value; }, $Symbol = "function" == typeof Symbol ? Symbol : {}, iteratorSymbol = $Symbol.iterator || "@@iterator", asyncIteratorSymbol = $Symbol.asyncIterator || "@@asyncIterator", toStringTagSymbol = $Symbol.toStringTag || "@@toStringTag"; function define(obj, key, value) { return Object.defineProperty(obj, key, { value: value, enumerable: !0, configurable: !0, writable: !0 }), obj[key]; } try { define({}, ""); } catch (err) { define = function define(obj, key, value) { return obj[key] = value; }; } function wrap(innerFn, outerFn, self, tryLocsList) { var protoGenerator = outerFn && outerFn.prototype instanceof Generator ? outerFn : Generator, generator = Object.create(protoGenerator.prototype), context = new Context(tryLocsList || []); return defineProperty(generator, "_invoke", { value: makeInvokeMethod(innerFn, self, context) }), generator; } function tryCatch(fn, obj, arg) { try { return { type: "normal", arg: fn.call(obj, arg) }; } catch (err) { return { type: "throw", arg: err }; } } exports.wrap = wrap; var ContinueSentinel = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} var IteratorPrototype = {}; define(IteratorPrototype, iteratorSymbol, function () { return this; }); var getProto = Object.getPrototypeOf, NativeIteratorPrototype = getProto && getProto(getProto(values([]))); NativeIteratorPrototype && NativeIteratorPrototype !== Op && hasOwn.call(NativeIteratorPrototype, iteratorSymbol) && (IteratorPrototype = NativeIteratorPrototype); var Gp = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(IteratorPrototype); function defineIteratorMethods(prototype) { ["next", "throw", "return"].forEach(function (method) { define(prototype, method, function (arg) { return this._invoke(method, arg); }); }); } function AsyncIterator(generator, PromiseImpl) { function invoke(method, arg, resolve, reject) { var record = tryCatch(generator[method], generator, arg); if ("throw" !== record.type) { var result = record.arg, value = result.value; return value && "object" == _typeof(value) && hasOwn.call(value, "__await") ? PromiseImpl.resolve(value.__await).then(function (value) { invoke("next", value, resolve, reject); }, function (err) { invoke("throw", err, resolve, reject); }) : PromiseImpl.resolve(value).then(function (unwrapped) { result.value = unwrapped, resolve(result); }, function (error) { return invoke("throw", error, resolve, reject); }); } reject(record.arg); } var previousPromise; defineProperty(this, "_invoke", { value: function value(method, arg) { function callInvokeWithMethodAndArg() { return new PromiseImpl(function (resolve, reject) { invoke(method, arg, resolve, reject); }); } return previousPromise = previousPromise ? previousPromise.then(callInvokeWithMethodAndArg, callInvokeWithMethodAndArg) : callInvokeWithMethodAndArg(); } }); } function makeInvokeMethod(innerFn, self, context) { var state = "suspendedStart"; return function (method, arg) { if ("executing" === state) throw new Error("Generator is already running"); if ("completed" === state) { if ("throw" === method) throw arg; return doneResult(); } for (context.method = method, context.arg = arg;;) { var delegate = context.delegate; if (delegate) { var delegateResult = maybeInvokeDelegate(delegate, context); if (delegateResult) { if (delegateResult === ContinueSentinel) continue; return delegateResult; } } if ("next" === context.method) context.sent = context._sent = context.arg;else if ("throw" === context.method) { if ("suspendedStart" === state) throw state = "completed", context.arg; context.dispatchException(context.arg); } else "return" === context.method && context.abrupt("return", context.arg); state = "executing"; var record = tryCatch(innerFn, self, context); if ("normal" === record.type) { if (state = context.done ? "completed" : "suspendedYield", record.arg === ContinueSentinel) continue; return { value: record.arg, done: context.done }; } "throw" === record.type && (state = "completed", context.method = "throw", context.arg = record.arg); } }; } function maybeInvokeDelegate(delegate, context) { var methodName = context.method, method = delegate.iterator[methodName]; if (undefined === method) return context.delegate = null, "throw" === methodName && delegate.iterator["return"] && (context.method = "return", context.arg = undefined, maybeInvokeDelegate(delegate, context), "throw" === context.method) || "return" !== methodName && (context.method = "throw", context.arg = new TypeError("The iterator does not provide a '" + methodName + "' method")), ContinueSentinel; var record = tryCatch(method, delegate.iterator, context.arg); if ("throw" === record.type) return context.method = "throw", context.arg = record.arg, context.delegate = null, ContinueSentinel; var info = record.arg; return info ? info.done ? (context[delegate.resultName] = info.value, context.next = delegate.nextLoc, "return" !== context.method && (context.method = "next", context.arg = undefined), context.delegate = null, ContinueSentinel) : info : (context.method = "throw", context.arg = new TypeError("iterator result is not an object"), context.delegate = null, ContinueSentinel); } function pushTryEntry(locs) { var entry = { tryLoc: locs[0] }; 1 in locs && (entry.catchLoc = locs[1]), 2 in locs && (entry.finallyLoc = locs[2], entry.afterLoc = locs[3]), this.tryEntries.push(entry); } function resetTryEntry(entry) { var record = entry.completion || {}; record.type = "normal", delete record.arg, entry.completion = record; } function Context(tryLocsList) { this.tryEntries = [{ tryLoc: "root" }], tryLocsList.forEach(pushTryEntry, this), this.reset(!0); } function values(iterable) { if (iterable) { var iteratorMethod = iterable[iteratorSymbol]; if (iteratorMethod) return iteratorMethod.call(iterable); if ("function" == typeof iterable.next) return iterable; if (!isNaN(iterable.length)) { var i = -1, next = function next() { for (; ++i < iterable.length;) if (hasOwn.call(iterable, i)) return next.value = iterable[i], next.done = !1, next; return next.value = undefined, next.done = !0, next; }; return next.next = next; } } return { next: doneResult }; } function doneResult() { return { value: undefined, done: !0 }; } return GeneratorFunction.prototype = GeneratorFunctionPrototype, defineProperty(Gp, "constructor", { value: GeneratorFunctionPrototype, configurable: !0 }), defineProperty(GeneratorFunctionPrototype, "constructor", { value: GeneratorFunction, configurable: !0 }), GeneratorFunction.displayName = define(GeneratorFunctionPrototype, toStringTagSymbol, "GeneratorFunction"), exports.isGeneratorFunction = function (genFun) { var ctor = "function" == typeof genFun && genFun.constructor; return !!ctor && (ctor === GeneratorFunction || "GeneratorFunction" === (ctor.displayName || ctor.name)); }, exports.mark = function (genFun) { return Object.setPrototypeOf ? Object.setPrototypeOf(genFun, GeneratorFunctionPrototype) : (genFun.__proto__ = GeneratorFunctionPrototype, define(genFun, toStringTagSymbol, "GeneratorFunction")), genFun.prototype = Object.create(Gp), genFun; }, exports.awrap = function (arg) { return { __await: arg }; }, defineIteratorMethods(AsyncIterator.prototype), define(AsyncIterator.prototype, asyncIteratorSymbol, function () { return this; }), exports.AsyncIterator = AsyncIterator, exports.async = function (innerFn, outerFn, self, tryLocsList, PromiseImpl) { void 0 === PromiseImpl && (PromiseImpl = Promise); var iter = new AsyncIterator(wrap(innerFn, outerFn, self, tryLocsList), PromiseImpl); return exports.isGeneratorFunction(outerFn) ? iter : iter.next().then(function (result) { return result.done ? result.value : iter.next(); }); }, defineIteratorMethods(Gp), define(Gp, toStringTagSymbol, "Generator"), define(Gp, iteratorSymbol, function () { return this; }), define(Gp, "toString", function () { return "[object Generator]"; }), exports.keys = function (val) { var object = Object(val), keys = []; for (var key in object) keys.push(key); return keys.reverse(), function next() { for (; keys.length;) { var key = keys.pop(); if (key in object) return next.value = key, next.done = !1, next; } return next.done = !0, next; }; }, exports.values = values, Context.prototype = { constructor: Context, reset: function reset(skipTempReset) { if (this.prev = 0, this.next = 0, this.sent = this._sent = undefined, this.done = !1, this.delegate = null, this.method = "next", this.arg = undefined, this.tryEntries.forEach(resetTryEntry), !skipTempReset) for (var name in this) "t" === name.charAt(0) && hasOwn.call(this, name) && !isNaN(+name.slice(1)) && (this[name] = undefined); }, stop: function stop() { this.done = !0; var rootRecord = this.tryEntries[0].completion; if ("throw" === rootRecord.type) throw rootRecord.arg; return this.rval; }, dispatchException: function dispatchException(exception) { if (this.done) throw exception; var context = this; function handle(loc, caught) { return record.type = "throw", record.arg = exception, context.next = loc, caught && (context.method = "next", context.arg = undefined), !!caught; } for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i], record = entry.completion; if ("root" === entry.tryLoc) return handle("end"); if (entry.tryLoc <= this.prev) { var hasCatch = hasOwn.call(entry, "catchLoc"), hasFinally = hasOwn.call(entry, "finallyLoc"); if (hasCatch && hasFinally) { if (this.prev < entry.catchLoc) return handle(entry.catchLoc, !0); if (this.prev < entry.finallyLoc) return handle(entry.finallyLoc); } else if (hasCatch) { if (this.prev < entry.catchLoc) return handle(entry.catchLoc, !0); } else { if (!hasFinally) throw new Error("try statement without catch or finally"); if (this.prev < entry.finallyLoc) return handle(entry.finallyLoc); } } } }, abrupt: function abrupt(type, arg) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.tryLoc <= this.prev && hasOwn.call(entry, "finallyLoc") && this.prev < entry.finallyLoc) { var finallyEntry = entry; break; } } finallyEntry && ("break" === type || "continue" === type) && finallyEntry.tryLoc <= arg && arg <= finallyEntry.finallyLoc && (finallyEntry = null); var record = finallyEntry ? finallyEntry.completion : {}; return record.type = type, record.arg = arg, finallyEntry ? (this.method = "next", this.next = finallyEntry.finallyLoc, ContinueSentinel) : this.complete(record); }, complete: function complete(record, afterLoc) { if ("throw" === record.type) throw record.arg; return "break" === record.type || "continue" === record.type ? this.next = record.arg : "return" === record.type ? (this.rval = this.arg = record.arg, this.method = "return", this.next = "end") : "normal" === record.type && afterLoc && (this.next = afterLoc), ContinueSentinel; }, finish: function finish(finallyLoc) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.finallyLoc === finallyLoc) return this.complete(entry.completion, entry.afterLoc), resetTryEntry(entry), ContinueSentinel; } }, "catch": function _catch(tryLoc) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.tryLoc === tryLoc) { var record = entry.completion; if ("throw" === record.type) { var thrown = record.arg; resetTryEntry(entry); } return thrown; } } throw new Error("illegal catch attempt"); }, delegateYield: function delegateYield(iterable, resultName, nextLoc) { return this.delegate = { iterator: values(iterable), resultName: resultName, nextLoc: nextLoc }, "next" === this.method && (this.arg = undefined), ContinueSentinel; } }, exports; }
function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }
function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  mixins: [_mixins_quizHelpers__WEBPACK_IMPORTED_MODULE_3__.quizHelpers],
  props: ['challenge', 'hostid', 'user', 'quizquestions', 'gmsg', 'teams'],
  components: {
    resultdetails: _helper_practice_resultdetails_vue__WEBPACK_IMPORTED_MODULE_4__["default"],
    waiting: _helper_waiting__WEBPACK_IMPORTED_MODULE_0__["default"],
    result: _helper_result__WEBPACK_IMPORTED_MODULE_1__["default"],
    chat: _helper_Chat__WEBPACK_IMPORTED_MODULE_2__["default"]
  },
  data: function data() {
    return {
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
      questions: this.quizquestions,
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
      preventClick: true,
      shortAnswer: null,
      requestHost: false,
      requestHostUser: null,
      endAVWait: false,
      gameEnded: false,
      timerTimeOut: 100
    };
  },
  created: function created() {
    var _this = this;
    // console.log('challenge created')
    Echo.channel(this.channel).listen('GameStartEvent', function (data) {
      if (_this.game_start === 1) return;
      console.log(['GameStartEvent.............', data.gameData]);
      _this.share = data.gameData['share'];
      _this.game_start = 1; // Game Start from Game Owner...
      _this.screen.waiting = 0;
      _this.sqo = true;
      _this.showQuestionOptions(null);
      _this.qt.defaultTime = data.gameData['defaultTime'];
      _this.qt.time = data.gameData['defaultTime'];
    }).listen('GameResetEvent', function (data) {
      console.log(['GameResetEvent.............', data]);
      _this.gameReset();
    }).listen('GameEndUserEvent', function (data) {
      console.log(['GameEndUserEvent.............', data]);
      _this.end_user++;
      if (_this.users.length == _this.end_user) {
        _this.winner();
      }
    }).listen('GameEndByHostEvent', function (data) {
      console.log(['GameEndByHostEvent.............', data]);
      _this.winner();
    }).listen('QuestionClickedEvent', function (data) {
      console.log('QuestionClickedEvent.............');
      _this.answered_user_data.push(data);
      _this.getResult();
    }).listen('MakeHostEvent', function (data) {
      console.log('MakeHostEvent.............', data);
      if (data.status == 'accept') {
        _this.uid = data.user.id;
        _this.requestHostUser = null;
      } else if (data.status == 'deny') {
        _this.requestHostUser = null;
      } else {
        _this.requestHostUser = data.user;
      }
    }).listen('ChangeQuestionEvent', function (data) {
      console.log('ChangeQuestionEvent.............', data);
      _this.questions = data.questions;
    }).listen('KickUserEvent', function (data) {
      console.log('KickUserEvent.............');
      _this.users = _this.users.filter(function (u) {
        return u.id !== data.uid;
      });
      if (_this.user.id == data.uid) {
        window.location.href = "/";
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
  mounted: function mounted() {
    var _this2 = this;
    Echo.join(this.channel).here(function (users) {
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
    document.addEventListener("blur", function () {
      return _this2.preventLeave();
    });
    document.addEventListener("visibilitychange", function () {
      if (document.hidden) {
        _this2.preventLeave();
      }
    });
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
    gameStart: function gameStart() {
      var _this3 = this;
      var defaultTime = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 30;
      console.log('gameStart...');
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
        host_id: this.uid,
        defaultTime: defaultTime,
        mode: 'challenge'
      };
      this.qt.defaultTime = defaultTime;
      this.qt.time = defaultTime;
      // console.log(gd);
      axios.post("/api/gameStart", gd).then(function (res) {
        console.log('res.data', res.data);
        _this3.share = res.data;
        _this3.game_start = 1;
        _this3.screen.waiting = 0;
        _this3.showQuestionOptions(_this3.questions[0].fileType);
      });
      // this.QuestionTimer()
    },
    showQuestionOptions: function showQuestionOptions(question) {
      var _this4 = this;
      if (this.gameEnded) return;
      console.log('showQuestionOptions...');
      var timeout = 1000;
      if (this.challenge.option_view_time != 0) {
        // this.quiz.quiz_time * 1000
        timeout = 3500;
      }
      if (question !== 'onEnd') {
        //onEnd is made up text to check audioVideo end
        if (this.currentQuestionType == 'audio' || this.currentQuestionType == 'video') {
          timeout += 3000;
          this.av = false;
          setTimeout(function () {
            _this4.endAVWait = true;
          }, timeout); //3000
        }
      }

      setTimeout(function () {
        // this.sqo = true
        _this4.preventClick = false;
        _this4.QuestionTimer();
      }, timeout);
    },
    QuestionTimer: function QuestionTimer() {
      var _this5 = this;
      console.log('QuestionTimer...');
      if (this.qid == this.questions.length || this.av == false || this.gameEnded === true) {
        return;
      }
      var pdec = 100 / (10 * this.qt.time);
      // console.log('pdec', pdec)
      // this.preventClick = false
      this.qt.timer = setInterval(function () {
        console.log('this.qt.time', _this5.qt.time);
        if (_this5.qt.time <= 0) {
          _this5.questionInit(_this5.qt.defaultTime);
          _this5.checkAnswer(_this5.qid, 'Not Answered', 0);
          // this.resultScreen();
        } else {
          _this5.qt.ms++;
          _this5.progress -= pdec;
          if (_this5.qt.ms == 10) {
            _this5.qt.time--;
            _this5.qt.ms = 0;
          }
        }
      }, this.timerTimeOut);
    },
    checkAnswer: function checkAnswer(q, a, rw) {
      var _this6 = this;
      if (this.gameEnded) return;
      this.preventClick = true;
      console.log('checkAnswer...', q, a, rw);
      // if(this.gameEnded === true) {
      //     this.stop();
      //     return
      // }
      this.shortAnswer = null;
      this.answered = 1;
      this.right_wrong = rw;
      this.gamedata['uid'] = this.user.id;
      this.gamedata['channel'] = this.channel;
      this.gamedata['name'] = this.user.name;
      this.gamedata['question'] = this.tbe(this.questions[this.qid].bd_question_text, this.questions[this.qid].question_text, this.user.lang);
      this.gamedata['answer'] = this.getCorrectAnswerText();
      this.gamedata['selected'] = a;
      this.gamedata['isCorrect'] = rw == 1 ? Math.floor(this.progress) : 0;
      var clone = _objectSpread({}, this.gamedata);
      this.questionInit(this.qt.defaultTime);
      axios.post("/api/questionClick", clone).then(function (res) {
        _this6.resultScreen();
      });
      this.answered_user_data.push(clone);
      this.screen.loading = true;
    },
    getResult: function getResult() {
      var _this7 = this;
      console.log('getResult...');
      this.results = [];
      this.users.forEach(function (user) {
        var score = 0;
        _this7.answered_user_data.filter(function (f) {
          return f.uid === user.id;
        }).map(function (u) {
          score += u.isCorrect;
        });
        _this7.results.push({
          id: user.id,
          name: user.name,
          score: score,
          user: user
        });
      });
      this.results.sort(function (a, b) {
        return b.score - a.score;
      });
    },
    smtAnswer: function smtAnswer(qid, qopt, data) {
      console.log('smtAnswer...');
      if (this.gameEnded === true) {
        this.stop();
        return;
      }
      if (data == null) return;
      var correct = qopt.some(function (opt) {
        return opt.option.toLowerCase() == data.toLowerCase() || opt.bd_option == data;
      });
      // console.log(qid, qopt, data, correct)

      if (correct) {
        this.checkAnswer(qid, data, 1);
      } else {
        this.checkAnswer(qid, data, 0);
      }
    },
    preventNav: function preventNav(event) {
      if (!this.game_start) return;
      event.preventDefault();
      // Chrome requires returnValue to be set.
      event.returnValue = "";
    },
    preventLeave: function preventLeave() {
      console.log('new notification leave from quiz. blur');
      Notification.requestPermission().then(function (param) {
        if (param === 'granted') {
          new Notification('Leave from Quiz', {
            body: 'You should not exit this screen without completing the Exam/quiz.!',
            tag: 'Leave from Quiz'
          });
        }
      });
    },
    gameResetCall: function gameResetCall() {
      var isStart = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;
      console.log('gameResetCall....');
      axios.post("/api/gameReset", {
        channel: this.channel
      }).then(function (res) {
        return console.log(res.data);
      });
      this.gameReset();
      // this.screen.waiting = 0
      // if (isStart) this.gameStart();
    },
    gameReset: function gameReset() {
      console.log('gameReset....');
      this.questionInit(this.qt.defaultTime);
      this.screen.waiting = 1;
      this.screen.loading = 0;
      this.screen.result = 0;
      this.screen.resultWaiting = 0;
      this.screen.winner = 0;
      this.end_user = 0;
      this.answered_user_data = [];
      this.results = [];
      this.qid = 0;
      this.gamedata = {};
      this.score = [];
      this.user_ranking = null;
      this.game_start = 0;
      this.current = this.questions[this.qid].id;
      this.endAVWait = false;
      this.preventClick = true;
      this.gameEnded = false;
    },
    getCorrectAnswerText: function getCorrectAnswerText() {
      console.log('getCorrectAnswerText....');
      var correctOption = this.questions[this.qid].options.find(function (o) {
        return o.correct == 1;
      });
      // console.log('correctOption....', correctOption)
      if (correctOption.flag == 'img') {
        return correctOption.img_link;
      } else {
        var correctEngOption = correctOption.option;
        var correctBanOption = correctOption.bd_option;
        return this.tbe(correctBanOption, correctEngOption, this.user.lang);
      }
    },
    resultScreen: function resultScreen() {
      console.log('resultScreen...');
      this.questionInit(this.qt.defaultTime);
      this.getResult(); //Sorting this.results
      this.countDown();
      if (this.qid + 1 == this.questions.length) {
        console.log('......resultScreen');
        this.quizEnd();
      } else {
        console.log('resultScreen preventClick True');
        // this.preventClick = true
        this.qid++;
        this.current = this.questions[this.qid].id;
        this.showQuestionOptions(null);
      }
    },
    countDown: function countDown() {
      if (this.gameEnded) return;
      console.log('countDown');
      if (this.counter == 0) {
        this.qid++;
        this.current = this.questions[this.qid].id;
        this.showQuestionOptions(null);
      } else {
        this.counter--;
      }
    },
    winner: function winner() {
      var _this8 = this;
      console.log('winer....');
      this.user_ranking = this.results.findIndex(function (w) {
        return w.id == _this8.user.id;
      });
      var user_score = this.results[this.user_ranking].score;
      this.perform = Math.round(user_score / ((this.qid + 1) * 100) * 100);
      this.pm = this.gmsg.filter(function (gm) {
        return gm.perform_status >= _this8.perform;
      }).reduce(function (prev, curr) {
        return prev.perform_status < curr.perform_status ? prev : curr;
      });
      this.questionInit(this.qt.defaultTime);
      this.screen.result = 1;
      this.screen.winner = 1;
      this.game_start = 0;
      if (this.user_ranking === 0) {
        this.firstPlace();
      } else if (this.user_ranking === 1) {
        this.secondPlace();
      } else if (this.user_ranking === 2) {
        this.thirdPlace();
      }
      setTimeout(function () {
        _this8.screen.winner = 0;
      }, 5000);
    },
    getPerform: function getPerform() {
      return "".concat(this.pm.perform_message, " (").concat(this.questions.length * 100, "/").concat(this.results[this.user_ranking].score, " ").concat(this.perform, "% )");
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
    gameStarted: function gameStarted(user) {
      console.log(['gameStarted, user', user]);
    },
    getShareLink: function getShareLink(path) {
      console.log(['urlencode', encodeURI(this.getUrl(path))]);
      return 'https://www.facebook.com/plugins/share_button.php?href=' + encodeURI(this.getUrl(path)) + '&layout=button&size=large&appId=1086594171698024&width=77&height=28';
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
    makeHost: function makeHost(uid) {
      var _arguments = arguments,
        _this9 = this;
      return _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee() {
        var status;
        return _regeneratorRuntime().wrap(function _callee$(_context) {
          while (1) switch (_context.prev = _context.next) {
            case 0:
              status = _arguments.length > 1 && _arguments[1] !== undefined ? _arguments[1] : null;
              console.log('user id..', _this9.isHost());
              if (_this9.isHost() && status == null) {
                _this9.uid = uid;
                _this9.requestHostUser = null;
                status = 'accept';
                // this.makeHost(uid, 'accept')
              } else {
                if (status == 'accept') {
                  _this9.uid = uid;
                  _this9.requestHostUser = null;
                } else if (status == 'deny') {
                  _this9.requestHostUser = null;
                } else {
                  _this9.requestHostUser = _this9.user;
                }
              }
              _context.next = 5;
              return axios.post("/api/makeHost/".concat(uid, "/").concat(_this9.channel, "/").concat(status));
            case 5:
              return _context.abrupt("return", _context.sent);
            case 6:
            case "end":
              return _context.stop();
          }
        }, _callee);
      }))();
    },
    newQuiz: function newQuiz(uid) {
      var _this10 = this;
      return _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee2() {
        var makeHostStatus, data;
        return _regeneratorRuntime().wrap(function _callee2$(_context2) {
          while (1) switch (_context2.prev = _context2.next) {
            case 0:
              _context2.next = 2;
              return _this10.makeHost(uid);
            case 2:
              makeHostStatus = _context2.sent;
              console.log('makeHostStatus..', makeHostStatus.status);
              if (makeHostStatus.status === 200) {
                console.log('inside..', makeHostStatus.status);
                data = {
                  channel: _this10.channel,
                  id: _this10.challenge.id
                };
                axios.post("/api/newGameQuiz", data).then(function (res) {
                  _this10.questions = res.data;
                  _this10.gameResetCall(true);
                  // console.log('result...', res)
                  // this.share = res.data
                  // this.game_start = 1
                  // this.screen.waiting = 0
                  // this.showQuestionOptions(this.questions[0].fileType)
                });
              } else {
                console.log('makeHostStatus status is not 200');
              }
            case 5:
            case "end":
              return _context2.stop();
          }
        }, _callee2);
      }))();
    },
    quizEnd: function quizEnd() {
      var _this11 = this;
      console.log('gameEnded quizEnd end');
      if (this.gameEnded) {
        console.log('gameEnded quizEnd end');
        return;
      } else {
        // axios.post(`/api/gameEndUser`, {'channel': this.channel})
        var gameResult = {
          result: this.results,
          'share_id': this.share.id,
          'channel': this.channel
        };
        axios.post("/api/challengeResult", gameResult).then(function (res) {
          _this11.end_user++;
          console.log('users + end user', _this11.users.length, _this11.end_user);
          if (_this11.users.length <= _this11.end_user) {
            _this11.winner();
            return;
          } else {
            _this11.gameEnded = true;
            _this11.questionInit(_this11.qt.defaultTime);
            _this11.screen.resultWaiting = 1;
          }
        });
      }
    },
    gameEndHost: function gameEndHost() {
      var _this12 = this;
      var gameResult = {
        result: this.results,
        'share_id': this.share.id,
        'channel': this.channel,
        'host_end': 1
      };
      axios.post("/api/challengeResult", gameResult).then(function (res) {
        _this12.winner();
        _this12.gameEnded = true;
        _this12.screen.resultWaiting = 0;
      });
    }
  },
  computed: {
    currentQuestionType: function currentQuestionType() {
      return this.quizquestions[this.qid].fileType;
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/Chat.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/Chat.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
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

/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['user', 'uid', 'channel', 'challenge'],
  data: function data() {
    return {
      message: null,
      messages: [],
      show: false,
      chat_count: 0,
      audio: new Audio('/audios/chat_notification.mp3')
    };
  },
  created: function created() {
    var _this = this;
    console.log('challenge created');
    Echo.channel(this.channel).listen('SendMessageEvent', function (data) {
      _this.messages.push(data);
      console.log('SendMessageEvent.............', data);
      _this.scrollToElement();
      _this.chat_count++;
      console.log('this.show', _this.show);
      if (!_this.show) {
        _this.audio.play();
      }
    }).listen('DeleteMessageEvent', function (data) {
      _this.messages = [];
      console.log('DeleteMessageEvent.............', data);
    });
  },
  mounted: function mounted() {
    this.getMessage();
    this.scrollToElement();
  },
  methods: {
    showChat: function showChat() {
      this.show = !this.show;
      this.chat_count = 0;
      var input = this.$refs.type_msg;
      console.log('input message', input);
      input.focus();
    },
    scrollToElement: function scrollToElement() {
      var el = document.getElementsByClassName('msg_card_body');
      if (el) {
        setTimeout(function () {
          el[0].scrollTop = el[0].scrollHeight;
        }, 100);
      }
    },
    getMessage: function getMessage() {
      var _this2 = this;
      axios.post("/api/getMessage", {
        channel: this.channel
      }).then(function (res) {
        console.log('Get Chat message', res.data);
        _this2.messages = res.data;
      });
    },
    getAvatar: function getAvatar(link) {
      if (link) return link;
      return '/img/avatar.png';
    },
    hasAvatar: function hasAvatar(link) {
      if (link) return true;
      return false;
    },
    getAvatarAlt: function getAvatarAlt(name) {
      return name.substring(0, 2);
    },
    sendMessage: function sendMessage() {
      var _this3 = this;
      this.message = this.message.trim();
      var data = {
        channel: this.channel,
        user: this.user,
        message: this.message,
        time: this.currentTime()
      };
      this.messages.push(_objectSpread({}, data));
      if (this.message !== '' && this.message !== null) {
        this.message = '';
        axios.post("/api/sendMessage", data).then(function (res) {
          _this3.scrollToElement();
        });
      }
    },
    deleteMessage: function deleteMessage() {
      var _this4 = this;
      axios.post("/api/deleteMessage/".concat(this.channel)).then(function (res) {
        _this4.messages = [];
      });
    },
    currentTime: function currentTime() {
      var d = new Date();
      var weekday = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
      return weekday[d.getDay()] + ' ' + d.toLocaleString([], {
        hour: '2-digit',
        minute: '2-digit'
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/moderator/info.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/moderator/info.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
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

/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['progress', 'color', 'users', 'answered', 'results', 'correct'],
  data: function data() {
    return {};
  },
  methods: {
    getClass: function getClass(index) {
      var bgClas = 'list-group-item-success';
      switch (index) {
        case 0:
          bgClas = 'list-group-item-primary';
          break;
        case 1:
          bgClas = 'list-group-item-success';
          break;
        case 2:
          bgClas = 'list-group-item-warning';
          break;
        default:
          bgClas = 'list-group-item-info';
      }
      return bgClas;
    }
  },
  computed: {
    getBackground: function getBackground() {
      return "conic-gradient(".concat(this.color, " ").concat(100 - this.progress, "%, transparent ").concat(100 - this.progress, "%)");
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/practice/resultdetails.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/practice/resultdetails.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
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
  props: ['results', 'ws', 'correct', 'wrong', 'lang', 'vh'],
  methods: {
    getStyle: function getStyle() {
      var Hight = '50vh';
      if (this.vh) Hight = this.vh;
      return {
        'max-height': Hight,
        overflow: 'auto'
      };
    },
    reloadPage: function reloadPage() {
      window.location.reload();
    },
    back: function back() {
      window.location.replace("/Practice");
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

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/result.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/result.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
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
//
//
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
  props: ['results', 'lastQuestion', 'resultDetail', 'user', 'uid', 'requestHostUser', 'mode'],
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
    makeHostByHost: function makeHostByHost() {
      this.$emit('makeHost', this.makeUid);
      this.makeUid = this.user.id;
    },
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
      // console.log('id data..', id)
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
      var path = window.location.pathname.split('/');
      // `${path[1]}.${path[2]}.${path[3]}`
      window.location = "/".concat(path[1]);
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

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var qrcode_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! qrcode.vue */ "./node_modules/qrcode.vue/dist/qrcode.vue.esm.js");
/* harmony import */ var _helper_moderator_info_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../helper/moderator/info.vue */ "./resources/js/components/helper/moderator/info.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  props: ['user', 'uid', 'users', 'time', 'challenge', 'defTime'],
  components: {
    QrcodeVue: qrcode_vue__WEBPACK_IMPORTED_MODULE_0__["default"],
    info: _helper_moderator_info_vue__WEBPACK_IMPORTED_MODULE_1__["default"]
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
      share: false,
      size: 300,
      defaultTime: this.defTime,
      value: window.location.toString()
    };
  },
  methods: {
    back: function back() {
      window.history.back();
      //window.location = '/game/practice/challenge';
    },
    isHost: function isHost() {
      console.log('isHost =>', this.uid === this.user.id);
      return this.uid === this.user.id;
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
    // getQr(){
    //     return 'https://api.qrserver.com/v1/create-qr-code/?size=430x430&data='+window.location;
    // },
    getShareLink: function getShareLink() {
      return window.location + '/share';
    }
  }
});

/***/ }),

/***/ "./resources/js/components/mixins/quizHelpers.js":
/*!*******************************************************!*\
  !*** ./resources/js/components/mixins/quizHelpers.js ***!
  \*******************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "quizHelpers": function() { return /* binding */ quizHelpers; }
/* harmony export */ });
/* harmony import */ var lodash_lang__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! lodash/lang */ "./node_modules/lodash/lang.js");
/* harmony import */ var lodash_lang__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(lodash_lang__WEBPACK_IMPORTED_MODULE_0__);
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }
function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { _defineProperty(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }
function _defineProperty(obj, key, value) { key = _toPropertyKey(key); if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }
function _toPropertyKey(arg) { var key = _toPrimitive(arg, "string"); return _typeof(key) === "symbol" ? key : String(key); }
function _toPrimitive(input, hint) { if (_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }
function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }
function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }
function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }

var quizHelpers = {
  data: function data() {
    return {};
  },
  created: function created() {
    // console.log('Mixin loaded')
  },
  mounted: function mounted() {
    this.externalJS();
  },
  methods: {
    questionInit: function questionInit() {
      var time = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 30;
      clearInterval(this.qt.timer);
      this.qt.timer = null;
      clearInterval(this.timer);
      this.timer = null;
      this.qt.ms = 0;
      this.qt.time = time;
      this.progress = 100;
      // this.answered = 0
      this.counter = 2;
      this.screen.waiting = 0;
      this.screen.loading = 0;
      this.screen.result = 0;
      this.screen.winner = 0;
      this.endAVWait = false;
    },
    isEmpty: function isEmpty(val) {
      return val === undefined || val == null || val.length <= 0 ? true : false;
    },
    tbe: function tbe(b, e, l) {
      if ((0,lodash_lang__WEBPACK_IMPORTED_MODULE_0__.isEmpty)(b) && (0,lodash_lang__WEBPACK_IMPORTED_MODULE_0__.isEmpty)(e)) {
        return 'No options found!';
      }
      if (l !== 'bd') {
        if ((0,lodash_lang__WEBPACK_IMPORTED_MODULE_0__.isEmpty)(e)) return b;
        return e;
      }
      return b;
    },
    qne2b: function qne2b(q, qn, l) {
      if (l === 'gb') {
        return "Question ".concat(q + 1, " of ").concat(qn, " ");
      }
      return "\u09AA\u09CD\u09B0\u09B6\u09CD\u09A8 ".concat(this.q2bNumber(qn), " \u098F\u09B0 ").concat(this.q2bNumber(q + 1), " ");
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
    getUrl: function getUrl(path) {
      return location.origin + '/' + path;
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
    onEnd: function onEnd(api) {
      if (api == 'apiCall') {
        axios.post("/api/audioVideoEnd", {
          channel: this.channel
        }).then(function (res) {
          return console.log('apiCallThen ..', res.data);
        });
      }
      this.av = true;
      this.showQuestionOptions('onEnd');
    },
    onStart: function onStart() {
      this.av = false;
    },
    audioVideoError: function audioVideoError() {
      // console.log('audioVideoError....')
      this.onEnd();
    },
    stop: function stop() {
      this.questionInit();
      console.log('stop()');
    },
    firstPlace: function firstPlace() {
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
    externalJS: function externalJS() {
      var confetti = document.createElement('script');
      confetti.setAttribute('src', 'https://cdn.jsdelivr.net/npm/canvas-confetti@1.3.0/dist/confetti.browser.min.js');
      document.head.appendChild(confetti);
    },
    isHost: function isHost() {
      return this.uid === this.user.id;
    }
  },
  computed: {
    channel: function channel() {
      var path = window.location.pathname.split('/');
      // console.log(path, 'path...........')
      return "".concat(path[1], ".").concat(path[2], ".").concat(path[3]);
    },
    progressClass: function progressClass() {
      return this.progress > 66 ? 'bg-success' : this.progress > 33 ? 'bg-info' : 'bg-danger';
    },
    progressWidth: function progressWidth() {
      return {
        'width': this.progress + '%'
      };
    },
    currentQuestionType: function currentQuestionType() {
      if (!this.questions) return;
      return this.questions[this.qid].fileType;
    },
    isLastQuestion: function isLastQuestion() {
      if (!this.questions) return;
      return this.questions.length > this.qid + 1;
    }
  }
};

/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/Challenge.vue?vue&type=style&index=0&id=6a184f0c&scoped=true&lang=css&":
/*!******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/Challenge.vue?vue&type=style&index=0&id=6a184f0c&scoped=true&lang=css& ***!
  \******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, "\n.imageOption[data-v-6a184f0c] {\n  height: 100px;\n  width: 100%;\n}\n.preventClick[data-v-6a184f0c] {\n  position: absolute;\n  height: 100%;\n  background: rgba(0, 0, 0, 0.1);\n  width: 100%;\n  z-index: 999;\n  left: 0px;\n  top: 0px;\n}\n.share-result-image[data-v-6a184f0c] {\n  max-width: -moz-fit-content;\n  max-width: fit-content;\n}\n.col-md-6.col-6[data-v-6a184f0c]:hover {\n  background-color: #38c172 !important;\n}\n@media screen and (min-width: 480px) {\n.imageOption[data-v-6a184f0c] {\n    height: 170px;\n    width: 100%;\n}\n}\n", ""]);
// Exports
/* harmony default export */ __webpack_exports__["default"] = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/Chat.vue?vue&type=style&index=0&id=4c9c3884&scoped=true&lang=css&":
/*!**************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/Chat.vue?vue&type=style&index=0&id=4c9c3884&scoped=true&lang=css& ***!
  \**************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, "\n.chat-count[data-v-4c9c3884] {\r\n    background: red;\r\n    width: 30px;\r\n    height: 30px;\r\n    position: absolute;\r\n    color: white;\r\n    top: -16px;\r\n    right: 0px;\n}\n.chat-min[data-v-4c9c3884]{\r\n    position: fixed;\r\n    bottom: 20px;\r\n    right: 20px;\r\n    cursor: pointer;\r\n    z-index: 99999;\n}\n.chat[data-v-4c9c3884]{\r\n    width: 24rem;\r\n    position: fixed;\r\n    right: 20px;\r\n    bottom: 20px;\r\n    z-index: 99999\n}\n.card[data-v-4c9c3884]{\r\n    height: 500px;\r\n    border-radius: 15px !important;\r\n    background-color: rgba(0,0,0,0.8) !important;\n}\n.msg_card_body[data-v-4c9c3884]{\r\n    padding: 8px;\r\n    overflow-y: auto;\n}\n.card-header[data-v-4c9c3884]{\r\n    border-radius: 15px 15px 0 0 !important;\r\n    border-bottom: 0 !important;\n}\n.card-footer[data-v-4c9c3884]{\r\n    border-radius: 0 0 15px 15px !important;\r\n    border-top: 0 !important;\n}\n.type_msg[data-v-4c9c3884]{\r\n    background-color: rgba(0,0,0,0.3) !important;\r\n    border:0 !important;\r\n    color:white !important;\r\n    height: 60px !important;\r\n    overflow-y: auto;\n}\n.type_msg[data-v-4c9c3884]:focus{\r\n    box-shadow:none !important;\r\n    outline:0px !important;\n}\n.attach_btn[data-v-4c9c3884]{\r\n    border-radius: 15px 0 0 15px !important;\r\n    background-color: rgba(0,0,0,0.3) !important;\r\n    border:0 !important;\r\n    color: white !important;\r\n    cursor: pointer;\n}\n.send_btn[data-v-4c9c3884]{\r\n    border-radius: 0 15px 15px 0 !important;\r\n    background-color: rgba(0,0,0,0.3) !important;\r\n    border:0 !important;\r\n    color: white !important;\r\n    cursor: pointer;\n}\n.contacts li[data-v-4c9c3884]{\r\n    width: 100% !important;\r\n    padding: 5px 10px;\r\n    margin-bottom: 15px !important;\n}\n.user_img_msg[data-v-4c9c3884]{\r\n    height: 40px;\r\n    width: 40px;\r\n    background: gray;\r\n    color: white;\r\n    font-size: 1.2rem;\r\n    padding: 5px;\n}\n.img_cont_msg[data-v-4c9c3884]{\r\n    height: 40px;\r\n    width: 40px;\n}\n.user_info[data-v-4c9c3884]{\r\n    margin-top: auto;\r\n    margin-bottom: auto;\r\n    margin-left: 15px;\n}\n.user_info span[data-v-4c9c3884]{\r\n    font-size: 20px;\r\n    color: white;\n}\n.user_info p[data-v-4c9c3884]{\r\n    font-size: 10px;\r\n    color: rgba(255,255,255,0.6);\n}\n.msg_cotainer[data-v-4c9c3884]{\r\n    margin-top: auto;\r\n    margin-bottom: auto;\r\n    margin-left: 10px;\r\n    border-radius: 25px;\r\n    background-color: #82ccdd;\r\n    padding: 10px;\r\n    position: relative;\r\n    min-width: 100px;\n}\n.msg_cotainer_send[data-v-4c9c3884]{\r\n    margin-top: auto;\r\n    margin-bottom: auto;\r\n    margin-right: 10px;\r\n    border-radius: 25px;\r\n    background-color: #78e08f;\r\n    padding: 10px;\r\n    position: relative;\r\n    min-width: 100px;\n}\n.msg_time[data-v-4c9c3884]{\r\n    position: absolute;\r\n    left: 0;\r\n    bottom: -15px;\r\n    color: rgba(255,255,255,0.5);\r\n    font-size: 10px;\n}\n.msg_time_send[data-v-4c9c3884]{\r\n    position: absolute;\r\n    right:0;\r\n    bottom: -15px;\r\n    color: rgba(255,255,255,0.5);\r\n    font-size: 10px;\n}\n.msg_head[data-v-4c9c3884]{\r\n    position: relative;\n}\n@media(max-width: 576px){\n.contacts_card[data-v-4c9c3884]{\r\n        margin-bottom: 15px !important;\n}\n.fa-5x[data-v-4c9c3884] {\r\n        font-size: 3em;\n}\n}\r\n", ""]);
// Exports
/* harmony default export */ __webpack_exports__["default"] = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/moderator/info.vue?vue&type=style&index=0&lang=css&":
/*!************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/moderator/info.vue?vue&type=style&index=0&lang=css& ***!
  \************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, "\n.progress-circle {\r\n  width: 100px;\r\n  height: 100px;\r\n  border-radius: 50%;\r\n  font-size: 2rem;\r\n//background: conic-gradient(red 25%, transparent 25%); display: flex;\r\n  transition: ease-in;\n}\n.progress-circle .number {\r\n  background: #e3e3e3;\r\n  width: 90%;\r\n  height: 90%;\r\n  border-radius: inherit;\r\n  display: flex;\r\n  align-items: center;\r\n  justify-content: center;\r\n  margin: auto;\r\n  color: black;\r\n  transition: ease-in;\n}\r\n\r\n", ""]);
// Exports
/* harmony default export */ __webpack_exports__["default"] = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/practice/resultdetails.vue?vue&type=style&index=0&lang=css&":
/*!********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/practice/resultdetails.vue?vue&type=style&index=0&lang=css& ***!
  \********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, "\n#accordion{\n    max-width: 500px !important;\n}\n\n", ""]);
// Exports
/* harmony default export */ __webpack_exports__["default"] = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/waiting.vue?vue&type=style&index=0&lang=css&":
/*!*****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/waiting.vue?vue&type=style&index=0&lang=css& ***!
  \*****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, "\n.circle {\r\n    width: 40px;\r\n    height: 40px;\r\n    border-radius: 50%;\r\n    text-align: center;\r\n    position: absolute;\r\n    top: 4px;\r\n    left: 15px;\r\n    font-size: 1.5rem;\r\n    background: gray;\r\n    color: white;\n}\n.flag {\r\n    position: absolute;\r\n    right: 15px;\r\n    top: 8px;\n}\n.close {\r\n    position: absolute;\r\n    top: -5px;\r\n    right: 0px;\r\n    color: red;\n}\n.activeItem {\r\n    z-index: 2;\r\n    color: #20c899;\r\n    border-color: #3490dc;\r\n    border-radius: 5px;\n}\n.iframe-size {\r\n    width: 90vw;\r\n    height: 90vh;\r\n    left: 3vw;\n}\n.show_share {\r\n    position: absolute;\r\n    right: 0;\r\n    height: 40px;\r\n    width: 300px;\r\n    overflow: hidden;\r\n    transition: .5s linear;\r\n    opacity: 1;\r\n    top: -45px;\n}\n.todos {\r\n    position: relative;\n}\n.todos ul {\r\n    position: relative;\n}\n.todos li {\r\n    display: block;\r\n    margin-bottom: 5px;\n}\n.list-move {\r\n    transition: all 0.4s ease;\n}\n.list-enter-from {\r\n    opacity: 0;\r\n    transform: scale(0.5);\n}\n.list-enter-to {\r\n    opacity: 1;\r\n    transform: scale(1.2);\n}\n.list-enter-active {\r\n    transition: all 0.4s ease;\n}\n.list-leave-from {\r\n    opacity: 1;\r\n    transform: scale(.8);\n}\n.list-leave-to {\r\n    opacity: 0;\r\n    transform: scale(0.5);\n}\n.list-leave-active {\r\n    transition: all 0.4s ease;\r\n    position: absolute;\n}\r\n", ""]);
// Exports
/* harmony default export */ __webpack_exports__["default"] = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/lodash/_DataView.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/_DataView.js ***!
  \******************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var getNative = __webpack_require__(/*! ./_getNative */ "./node_modules/lodash/_getNative.js"),
    root = __webpack_require__(/*! ./_root */ "./node_modules/lodash/_root.js");

/* Built-in method references that are verified to be native. */
var DataView = getNative(root, 'DataView');

module.exports = DataView;


/***/ }),

/***/ "./node_modules/lodash/_Hash.js":
/*!**************************************!*\
  !*** ./node_modules/lodash/_Hash.js ***!
  \**************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var hashClear = __webpack_require__(/*! ./_hashClear */ "./node_modules/lodash/_hashClear.js"),
    hashDelete = __webpack_require__(/*! ./_hashDelete */ "./node_modules/lodash/_hashDelete.js"),
    hashGet = __webpack_require__(/*! ./_hashGet */ "./node_modules/lodash/_hashGet.js"),
    hashHas = __webpack_require__(/*! ./_hashHas */ "./node_modules/lodash/_hashHas.js"),
    hashSet = __webpack_require__(/*! ./_hashSet */ "./node_modules/lodash/_hashSet.js");

/**
 * Creates a hash object.
 *
 * @private
 * @constructor
 * @param {Array} [entries] The key-value pairs to cache.
 */
function Hash(entries) {
  var index = -1,
      length = entries == null ? 0 : entries.length;

  this.clear();
  while (++index < length) {
    var entry = entries[index];
    this.set(entry[0], entry[1]);
  }
}

// Add methods to `Hash`.
Hash.prototype.clear = hashClear;
Hash.prototype['delete'] = hashDelete;
Hash.prototype.get = hashGet;
Hash.prototype.has = hashHas;
Hash.prototype.set = hashSet;

module.exports = Hash;


/***/ }),

/***/ "./node_modules/lodash/_ListCache.js":
/*!*******************************************!*\
  !*** ./node_modules/lodash/_ListCache.js ***!
  \*******************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var listCacheClear = __webpack_require__(/*! ./_listCacheClear */ "./node_modules/lodash/_listCacheClear.js"),
    listCacheDelete = __webpack_require__(/*! ./_listCacheDelete */ "./node_modules/lodash/_listCacheDelete.js"),
    listCacheGet = __webpack_require__(/*! ./_listCacheGet */ "./node_modules/lodash/_listCacheGet.js"),
    listCacheHas = __webpack_require__(/*! ./_listCacheHas */ "./node_modules/lodash/_listCacheHas.js"),
    listCacheSet = __webpack_require__(/*! ./_listCacheSet */ "./node_modules/lodash/_listCacheSet.js");

/**
 * Creates an list cache object.
 *
 * @private
 * @constructor
 * @param {Array} [entries] The key-value pairs to cache.
 */
function ListCache(entries) {
  var index = -1,
      length = entries == null ? 0 : entries.length;

  this.clear();
  while (++index < length) {
    var entry = entries[index];
    this.set(entry[0], entry[1]);
  }
}

// Add methods to `ListCache`.
ListCache.prototype.clear = listCacheClear;
ListCache.prototype['delete'] = listCacheDelete;
ListCache.prototype.get = listCacheGet;
ListCache.prototype.has = listCacheHas;
ListCache.prototype.set = listCacheSet;

module.exports = ListCache;


/***/ }),

/***/ "./node_modules/lodash/_Map.js":
/*!*************************************!*\
  !*** ./node_modules/lodash/_Map.js ***!
  \*************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var getNative = __webpack_require__(/*! ./_getNative */ "./node_modules/lodash/_getNative.js"),
    root = __webpack_require__(/*! ./_root */ "./node_modules/lodash/_root.js");

/* Built-in method references that are verified to be native. */
var Map = getNative(root, 'Map');

module.exports = Map;


/***/ }),

/***/ "./node_modules/lodash/_MapCache.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/_MapCache.js ***!
  \******************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var mapCacheClear = __webpack_require__(/*! ./_mapCacheClear */ "./node_modules/lodash/_mapCacheClear.js"),
    mapCacheDelete = __webpack_require__(/*! ./_mapCacheDelete */ "./node_modules/lodash/_mapCacheDelete.js"),
    mapCacheGet = __webpack_require__(/*! ./_mapCacheGet */ "./node_modules/lodash/_mapCacheGet.js"),
    mapCacheHas = __webpack_require__(/*! ./_mapCacheHas */ "./node_modules/lodash/_mapCacheHas.js"),
    mapCacheSet = __webpack_require__(/*! ./_mapCacheSet */ "./node_modules/lodash/_mapCacheSet.js");

/**
 * Creates a map cache object to store key-value pairs.
 *
 * @private
 * @constructor
 * @param {Array} [entries] The key-value pairs to cache.
 */
function MapCache(entries) {
  var index = -1,
      length = entries == null ? 0 : entries.length;

  this.clear();
  while (++index < length) {
    var entry = entries[index];
    this.set(entry[0], entry[1]);
  }
}

// Add methods to `MapCache`.
MapCache.prototype.clear = mapCacheClear;
MapCache.prototype['delete'] = mapCacheDelete;
MapCache.prototype.get = mapCacheGet;
MapCache.prototype.has = mapCacheHas;
MapCache.prototype.set = mapCacheSet;

module.exports = MapCache;


/***/ }),

/***/ "./node_modules/lodash/_Promise.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/_Promise.js ***!
  \*****************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var getNative = __webpack_require__(/*! ./_getNative */ "./node_modules/lodash/_getNative.js"),
    root = __webpack_require__(/*! ./_root */ "./node_modules/lodash/_root.js");

/* Built-in method references that are verified to be native. */
var Promise = getNative(root, 'Promise');

module.exports = Promise;


/***/ }),

/***/ "./node_modules/lodash/_Set.js":
/*!*************************************!*\
  !*** ./node_modules/lodash/_Set.js ***!
  \*************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var getNative = __webpack_require__(/*! ./_getNative */ "./node_modules/lodash/_getNative.js"),
    root = __webpack_require__(/*! ./_root */ "./node_modules/lodash/_root.js");

/* Built-in method references that are verified to be native. */
var Set = getNative(root, 'Set');

module.exports = Set;


/***/ }),

/***/ "./node_modules/lodash/_SetCache.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/_SetCache.js ***!
  \******************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var MapCache = __webpack_require__(/*! ./_MapCache */ "./node_modules/lodash/_MapCache.js"),
    setCacheAdd = __webpack_require__(/*! ./_setCacheAdd */ "./node_modules/lodash/_setCacheAdd.js"),
    setCacheHas = __webpack_require__(/*! ./_setCacheHas */ "./node_modules/lodash/_setCacheHas.js");

/**
 *
 * Creates an array cache object to store unique values.
 *
 * @private
 * @constructor
 * @param {Array} [values] The values to cache.
 */
function SetCache(values) {
  var index = -1,
      length = values == null ? 0 : values.length;

  this.__data__ = new MapCache;
  while (++index < length) {
    this.add(values[index]);
  }
}

// Add methods to `SetCache`.
SetCache.prototype.add = SetCache.prototype.push = setCacheAdd;
SetCache.prototype.has = setCacheHas;

module.exports = SetCache;


/***/ }),

/***/ "./node_modules/lodash/_Stack.js":
/*!***************************************!*\
  !*** ./node_modules/lodash/_Stack.js ***!
  \***************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var ListCache = __webpack_require__(/*! ./_ListCache */ "./node_modules/lodash/_ListCache.js"),
    stackClear = __webpack_require__(/*! ./_stackClear */ "./node_modules/lodash/_stackClear.js"),
    stackDelete = __webpack_require__(/*! ./_stackDelete */ "./node_modules/lodash/_stackDelete.js"),
    stackGet = __webpack_require__(/*! ./_stackGet */ "./node_modules/lodash/_stackGet.js"),
    stackHas = __webpack_require__(/*! ./_stackHas */ "./node_modules/lodash/_stackHas.js"),
    stackSet = __webpack_require__(/*! ./_stackSet */ "./node_modules/lodash/_stackSet.js");

/**
 * Creates a stack cache object to store key-value pairs.
 *
 * @private
 * @constructor
 * @param {Array} [entries] The key-value pairs to cache.
 */
function Stack(entries) {
  var data = this.__data__ = new ListCache(entries);
  this.size = data.size;
}

// Add methods to `Stack`.
Stack.prototype.clear = stackClear;
Stack.prototype['delete'] = stackDelete;
Stack.prototype.get = stackGet;
Stack.prototype.has = stackHas;
Stack.prototype.set = stackSet;

module.exports = Stack;


/***/ }),

/***/ "./node_modules/lodash/_Symbol.js":
/*!****************************************!*\
  !*** ./node_modules/lodash/_Symbol.js ***!
  \****************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var root = __webpack_require__(/*! ./_root */ "./node_modules/lodash/_root.js");

/** Built-in value references. */
var Symbol = root.Symbol;

module.exports = Symbol;


/***/ }),

/***/ "./node_modules/lodash/_Uint8Array.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_Uint8Array.js ***!
  \********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var root = __webpack_require__(/*! ./_root */ "./node_modules/lodash/_root.js");

/** Built-in value references. */
var Uint8Array = root.Uint8Array;

module.exports = Uint8Array;


/***/ }),

/***/ "./node_modules/lodash/_WeakMap.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/_WeakMap.js ***!
  \*****************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var getNative = __webpack_require__(/*! ./_getNative */ "./node_modules/lodash/_getNative.js"),
    root = __webpack_require__(/*! ./_root */ "./node_modules/lodash/_root.js");

/* Built-in method references that are verified to be native. */
var WeakMap = getNative(root, 'WeakMap');

module.exports = WeakMap;


/***/ }),

/***/ "./node_modules/lodash/_arrayEach.js":
/*!*******************************************!*\
  !*** ./node_modules/lodash/_arrayEach.js ***!
  \*******************************************/
/***/ (function(module) {

/**
 * A specialized version of `_.forEach` for arrays without support for
 * iteratee shorthands.
 *
 * @private
 * @param {Array} [array] The array to iterate over.
 * @param {Function} iteratee The function invoked per iteration.
 * @returns {Array} Returns `array`.
 */
function arrayEach(array, iteratee) {
  var index = -1,
      length = array == null ? 0 : array.length;

  while (++index < length) {
    if (iteratee(array[index], index, array) === false) {
      break;
    }
  }
  return array;
}

module.exports = arrayEach;


/***/ }),

/***/ "./node_modules/lodash/_arrayFilter.js":
/*!*********************************************!*\
  !*** ./node_modules/lodash/_arrayFilter.js ***!
  \*********************************************/
/***/ (function(module) {

/**
 * A specialized version of `_.filter` for arrays without support for
 * iteratee shorthands.
 *
 * @private
 * @param {Array} [array] The array to iterate over.
 * @param {Function} predicate The function invoked per iteration.
 * @returns {Array} Returns the new filtered array.
 */
function arrayFilter(array, predicate) {
  var index = -1,
      length = array == null ? 0 : array.length,
      resIndex = 0,
      result = [];

  while (++index < length) {
    var value = array[index];
    if (predicate(value, index, array)) {
      result[resIndex++] = value;
    }
  }
  return result;
}

module.exports = arrayFilter;


/***/ }),

/***/ "./node_modules/lodash/_arrayLikeKeys.js":
/*!***********************************************!*\
  !*** ./node_modules/lodash/_arrayLikeKeys.js ***!
  \***********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseTimes = __webpack_require__(/*! ./_baseTimes */ "./node_modules/lodash/_baseTimes.js"),
    isArguments = __webpack_require__(/*! ./isArguments */ "./node_modules/lodash/isArguments.js"),
    isArray = __webpack_require__(/*! ./isArray */ "./node_modules/lodash/isArray.js"),
    isBuffer = __webpack_require__(/*! ./isBuffer */ "./node_modules/lodash/isBuffer.js"),
    isIndex = __webpack_require__(/*! ./_isIndex */ "./node_modules/lodash/_isIndex.js"),
    isTypedArray = __webpack_require__(/*! ./isTypedArray */ "./node_modules/lodash/isTypedArray.js");

/** Used for built-in method references. */
var objectProto = Object.prototype;

/** Used to check objects for own properties. */
var hasOwnProperty = objectProto.hasOwnProperty;

/**
 * Creates an array of the enumerable property names of the array-like `value`.
 *
 * @private
 * @param {*} value The value to query.
 * @param {boolean} inherited Specify returning inherited property names.
 * @returns {Array} Returns the array of property names.
 */
function arrayLikeKeys(value, inherited) {
  var isArr = isArray(value),
      isArg = !isArr && isArguments(value),
      isBuff = !isArr && !isArg && isBuffer(value),
      isType = !isArr && !isArg && !isBuff && isTypedArray(value),
      skipIndexes = isArr || isArg || isBuff || isType,
      result = skipIndexes ? baseTimes(value.length, String) : [],
      length = result.length;

  for (var key in value) {
    if ((inherited || hasOwnProperty.call(value, key)) &&
        !(skipIndexes && (
           // Safari 9 has enumerable `arguments.length` in strict mode.
           key == 'length' ||
           // Node.js 0.10 has enumerable non-index properties on buffers.
           (isBuff && (key == 'offset' || key == 'parent')) ||
           // PhantomJS 2 has enumerable non-index properties on typed arrays.
           (isType && (key == 'buffer' || key == 'byteLength' || key == 'byteOffset')) ||
           // Skip index properties.
           isIndex(key, length)
        ))) {
      result.push(key);
    }
  }
  return result;
}

module.exports = arrayLikeKeys;


/***/ }),

/***/ "./node_modules/lodash/_arrayMap.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/_arrayMap.js ***!
  \******************************************/
/***/ (function(module) {

/**
 * A specialized version of `_.map` for arrays without support for iteratee
 * shorthands.
 *
 * @private
 * @param {Array} [array] The array to iterate over.
 * @param {Function} iteratee The function invoked per iteration.
 * @returns {Array} Returns the new mapped array.
 */
function arrayMap(array, iteratee) {
  var index = -1,
      length = array == null ? 0 : array.length,
      result = Array(length);

  while (++index < length) {
    result[index] = iteratee(array[index], index, array);
  }
  return result;
}

module.exports = arrayMap;


/***/ }),

/***/ "./node_modules/lodash/_arrayPush.js":
/*!*******************************************!*\
  !*** ./node_modules/lodash/_arrayPush.js ***!
  \*******************************************/
/***/ (function(module) {

/**
 * Appends the elements of `values` to `array`.
 *
 * @private
 * @param {Array} array The array to modify.
 * @param {Array} values The values to append.
 * @returns {Array} Returns `array`.
 */
function arrayPush(array, values) {
  var index = -1,
      length = values.length,
      offset = array.length;

  while (++index < length) {
    array[offset + index] = values[index];
  }
  return array;
}

module.exports = arrayPush;


/***/ }),

/***/ "./node_modules/lodash/_arraySome.js":
/*!*******************************************!*\
  !*** ./node_modules/lodash/_arraySome.js ***!
  \*******************************************/
/***/ (function(module) {

/**
 * A specialized version of `_.some` for arrays without support for iteratee
 * shorthands.
 *
 * @private
 * @param {Array} [array] The array to iterate over.
 * @param {Function} predicate The function invoked per iteration.
 * @returns {boolean} Returns `true` if any element passes the predicate check,
 *  else `false`.
 */
function arraySome(array, predicate) {
  var index = -1,
      length = array == null ? 0 : array.length;

  while (++index < length) {
    if (predicate(array[index], index, array)) {
      return true;
    }
  }
  return false;
}

module.exports = arraySome;


/***/ }),

/***/ "./node_modules/lodash/_asciiToArray.js":
/*!**********************************************!*\
  !*** ./node_modules/lodash/_asciiToArray.js ***!
  \**********************************************/
/***/ (function(module) {

/**
 * Converts an ASCII `string` to an array.
 *
 * @private
 * @param {string} string The string to convert.
 * @returns {Array} Returns the converted array.
 */
function asciiToArray(string) {
  return string.split('');
}

module.exports = asciiToArray;


/***/ }),

/***/ "./node_modules/lodash/_assignValue.js":
/*!*********************************************!*\
  !*** ./node_modules/lodash/_assignValue.js ***!
  \*********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseAssignValue = __webpack_require__(/*! ./_baseAssignValue */ "./node_modules/lodash/_baseAssignValue.js"),
    eq = __webpack_require__(/*! ./eq */ "./node_modules/lodash/eq.js");

/** Used for built-in method references. */
var objectProto = Object.prototype;

/** Used to check objects for own properties. */
var hasOwnProperty = objectProto.hasOwnProperty;

/**
 * Assigns `value` to `key` of `object` if the existing value is not equivalent
 * using [`SameValueZero`](http://ecma-international.org/ecma-262/7.0/#sec-samevaluezero)
 * for equality comparisons.
 *
 * @private
 * @param {Object} object The object to modify.
 * @param {string} key The key of the property to assign.
 * @param {*} value The value to assign.
 */
function assignValue(object, key, value) {
  var objValue = object[key];
  if (!(hasOwnProperty.call(object, key) && eq(objValue, value)) ||
      (value === undefined && !(key in object))) {
    baseAssignValue(object, key, value);
  }
}

module.exports = assignValue;


/***/ }),

/***/ "./node_modules/lodash/_assocIndexOf.js":
/*!**********************************************!*\
  !*** ./node_modules/lodash/_assocIndexOf.js ***!
  \**********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var eq = __webpack_require__(/*! ./eq */ "./node_modules/lodash/eq.js");

/**
 * Gets the index at which the `key` is found in `array` of key-value pairs.
 *
 * @private
 * @param {Array} array The array to inspect.
 * @param {*} key The key to search for.
 * @returns {number} Returns the index of the matched value, else `-1`.
 */
function assocIndexOf(array, key) {
  var length = array.length;
  while (length--) {
    if (eq(array[length][0], key)) {
      return length;
    }
  }
  return -1;
}

module.exports = assocIndexOf;


/***/ }),

/***/ "./node_modules/lodash/_baseAssign.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_baseAssign.js ***!
  \********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var copyObject = __webpack_require__(/*! ./_copyObject */ "./node_modules/lodash/_copyObject.js"),
    keys = __webpack_require__(/*! ./keys */ "./node_modules/lodash/keys.js");

/**
 * The base implementation of `_.assign` without support for multiple sources
 * or `customizer` functions.
 *
 * @private
 * @param {Object} object The destination object.
 * @param {Object} source The source object.
 * @returns {Object} Returns `object`.
 */
function baseAssign(object, source) {
  return object && copyObject(source, keys(source), object);
}

module.exports = baseAssign;


/***/ }),

/***/ "./node_modules/lodash/_baseAssignIn.js":
/*!**********************************************!*\
  !*** ./node_modules/lodash/_baseAssignIn.js ***!
  \**********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var copyObject = __webpack_require__(/*! ./_copyObject */ "./node_modules/lodash/_copyObject.js"),
    keysIn = __webpack_require__(/*! ./keysIn */ "./node_modules/lodash/keysIn.js");

/**
 * The base implementation of `_.assignIn` without support for multiple sources
 * or `customizer` functions.
 *
 * @private
 * @param {Object} object The destination object.
 * @param {Object} source The source object.
 * @returns {Object} Returns `object`.
 */
function baseAssignIn(object, source) {
  return object && copyObject(source, keysIn(source), object);
}

module.exports = baseAssignIn;


/***/ }),

/***/ "./node_modules/lodash/_baseAssignValue.js":
/*!*************************************************!*\
  !*** ./node_modules/lodash/_baseAssignValue.js ***!
  \*************************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var defineProperty = __webpack_require__(/*! ./_defineProperty */ "./node_modules/lodash/_defineProperty.js");

/**
 * The base implementation of `assignValue` and `assignMergeValue` without
 * value checks.
 *
 * @private
 * @param {Object} object The object to modify.
 * @param {string} key The key of the property to assign.
 * @param {*} value The value to assign.
 */
function baseAssignValue(object, key, value) {
  if (key == '__proto__' && defineProperty) {
    defineProperty(object, key, {
      'configurable': true,
      'enumerable': true,
      'value': value,
      'writable': true
    });
  } else {
    object[key] = value;
  }
}

module.exports = baseAssignValue;


/***/ }),

/***/ "./node_modules/lodash/_baseClamp.js":
/*!*******************************************!*\
  !*** ./node_modules/lodash/_baseClamp.js ***!
  \*******************************************/
/***/ (function(module) {

/**
 * The base implementation of `_.clamp` which doesn't coerce arguments.
 *
 * @private
 * @param {number} number The number to clamp.
 * @param {number} [lower] The lower bound.
 * @param {number} upper The upper bound.
 * @returns {number} Returns the clamped number.
 */
function baseClamp(number, lower, upper) {
  if (number === number) {
    if (upper !== undefined) {
      number = number <= upper ? number : upper;
    }
    if (lower !== undefined) {
      number = number >= lower ? number : lower;
    }
  }
  return number;
}

module.exports = baseClamp;


/***/ }),

/***/ "./node_modules/lodash/_baseClone.js":
/*!*******************************************!*\
  !*** ./node_modules/lodash/_baseClone.js ***!
  \*******************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var Stack = __webpack_require__(/*! ./_Stack */ "./node_modules/lodash/_Stack.js"),
    arrayEach = __webpack_require__(/*! ./_arrayEach */ "./node_modules/lodash/_arrayEach.js"),
    assignValue = __webpack_require__(/*! ./_assignValue */ "./node_modules/lodash/_assignValue.js"),
    baseAssign = __webpack_require__(/*! ./_baseAssign */ "./node_modules/lodash/_baseAssign.js"),
    baseAssignIn = __webpack_require__(/*! ./_baseAssignIn */ "./node_modules/lodash/_baseAssignIn.js"),
    cloneBuffer = __webpack_require__(/*! ./_cloneBuffer */ "./node_modules/lodash/_cloneBuffer.js"),
    copyArray = __webpack_require__(/*! ./_copyArray */ "./node_modules/lodash/_copyArray.js"),
    copySymbols = __webpack_require__(/*! ./_copySymbols */ "./node_modules/lodash/_copySymbols.js"),
    copySymbolsIn = __webpack_require__(/*! ./_copySymbolsIn */ "./node_modules/lodash/_copySymbolsIn.js"),
    getAllKeys = __webpack_require__(/*! ./_getAllKeys */ "./node_modules/lodash/_getAllKeys.js"),
    getAllKeysIn = __webpack_require__(/*! ./_getAllKeysIn */ "./node_modules/lodash/_getAllKeysIn.js"),
    getTag = __webpack_require__(/*! ./_getTag */ "./node_modules/lodash/_getTag.js"),
    initCloneArray = __webpack_require__(/*! ./_initCloneArray */ "./node_modules/lodash/_initCloneArray.js"),
    initCloneByTag = __webpack_require__(/*! ./_initCloneByTag */ "./node_modules/lodash/_initCloneByTag.js"),
    initCloneObject = __webpack_require__(/*! ./_initCloneObject */ "./node_modules/lodash/_initCloneObject.js"),
    isArray = __webpack_require__(/*! ./isArray */ "./node_modules/lodash/isArray.js"),
    isBuffer = __webpack_require__(/*! ./isBuffer */ "./node_modules/lodash/isBuffer.js"),
    isMap = __webpack_require__(/*! ./isMap */ "./node_modules/lodash/isMap.js"),
    isObject = __webpack_require__(/*! ./isObject */ "./node_modules/lodash/isObject.js"),
    isSet = __webpack_require__(/*! ./isSet */ "./node_modules/lodash/isSet.js"),
    keys = __webpack_require__(/*! ./keys */ "./node_modules/lodash/keys.js"),
    keysIn = __webpack_require__(/*! ./keysIn */ "./node_modules/lodash/keysIn.js");

/** Used to compose bitmasks for cloning. */
var CLONE_DEEP_FLAG = 1,
    CLONE_FLAT_FLAG = 2,
    CLONE_SYMBOLS_FLAG = 4;

/** `Object#toString` result references. */
var argsTag = '[object Arguments]',
    arrayTag = '[object Array]',
    boolTag = '[object Boolean]',
    dateTag = '[object Date]',
    errorTag = '[object Error]',
    funcTag = '[object Function]',
    genTag = '[object GeneratorFunction]',
    mapTag = '[object Map]',
    numberTag = '[object Number]',
    objectTag = '[object Object]',
    regexpTag = '[object RegExp]',
    setTag = '[object Set]',
    stringTag = '[object String]',
    symbolTag = '[object Symbol]',
    weakMapTag = '[object WeakMap]';

var arrayBufferTag = '[object ArrayBuffer]',
    dataViewTag = '[object DataView]',
    float32Tag = '[object Float32Array]',
    float64Tag = '[object Float64Array]',
    int8Tag = '[object Int8Array]',
    int16Tag = '[object Int16Array]',
    int32Tag = '[object Int32Array]',
    uint8Tag = '[object Uint8Array]',
    uint8ClampedTag = '[object Uint8ClampedArray]',
    uint16Tag = '[object Uint16Array]',
    uint32Tag = '[object Uint32Array]';

/** Used to identify `toStringTag` values supported by `_.clone`. */
var cloneableTags = {};
cloneableTags[argsTag] = cloneableTags[arrayTag] =
cloneableTags[arrayBufferTag] = cloneableTags[dataViewTag] =
cloneableTags[boolTag] = cloneableTags[dateTag] =
cloneableTags[float32Tag] = cloneableTags[float64Tag] =
cloneableTags[int8Tag] = cloneableTags[int16Tag] =
cloneableTags[int32Tag] = cloneableTags[mapTag] =
cloneableTags[numberTag] = cloneableTags[objectTag] =
cloneableTags[regexpTag] = cloneableTags[setTag] =
cloneableTags[stringTag] = cloneableTags[symbolTag] =
cloneableTags[uint8Tag] = cloneableTags[uint8ClampedTag] =
cloneableTags[uint16Tag] = cloneableTags[uint32Tag] = true;
cloneableTags[errorTag] = cloneableTags[funcTag] =
cloneableTags[weakMapTag] = false;

/**
 * The base implementation of `_.clone` and `_.cloneDeep` which tracks
 * traversed objects.
 *
 * @private
 * @param {*} value The value to clone.
 * @param {boolean} bitmask The bitmask flags.
 *  1 - Deep clone
 *  2 - Flatten inherited properties
 *  4 - Clone symbols
 * @param {Function} [customizer] The function to customize cloning.
 * @param {string} [key] The key of `value`.
 * @param {Object} [object] The parent object of `value`.
 * @param {Object} [stack] Tracks traversed objects and their clone counterparts.
 * @returns {*} Returns the cloned value.
 */
function baseClone(value, bitmask, customizer, key, object, stack) {
  var result,
      isDeep = bitmask & CLONE_DEEP_FLAG,
      isFlat = bitmask & CLONE_FLAT_FLAG,
      isFull = bitmask & CLONE_SYMBOLS_FLAG;

  if (customizer) {
    result = object ? customizer(value, key, object, stack) : customizer(value);
  }
  if (result !== undefined) {
    return result;
  }
  if (!isObject(value)) {
    return value;
  }
  var isArr = isArray(value);
  if (isArr) {
    result = initCloneArray(value);
    if (!isDeep) {
      return copyArray(value, result);
    }
  } else {
    var tag = getTag(value),
        isFunc = tag == funcTag || tag == genTag;

    if (isBuffer(value)) {
      return cloneBuffer(value, isDeep);
    }
    if (tag == objectTag || tag == argsTag || (isFunc && !object)) {
      result = (isFlat || isFunc) ? {} : initCloneObject(value);
      if (!isDeep) {
        return isFlat
          ? copySymbolsIn(value, baseAssignIn(result, value))
          : copySymbols(value, baseAssign(result, value));
      }
    } else {
      if (!cloneableTags[tag]) {
        return object ? value : {};
      }
      result = initCloneByTag(value, tag, isDeep);
    }
  }
  // Check for circular references and return its corresponding clone.
  stack || (stack = new Stack);
  var stacked = stack.get(value);
  if (stacked) {
    return stacked;
  }
  stack.set(value, result);

  if (isSet(value)) {
    value.forEach(function(subValue) {
      result.add(baseClone(subValue, bitmask, customizer, subValue, value, stack));
    });
  } else if (isMap(value)) {
    value.forEach(function(subValue, key) {
      result.set(key, baseClone(subValue, bitmask, customizer, key, value, stack));
    });
  }

  var keysFunc = isFull
    ? (isFlat ? getAllKeysIn : getAllKeys)
    : (isFlat ? keysIn : keys);

  var props = isArr ? undefined : keysFunc(value);
  arrayEach(props || value, function(subValue, key) {
    if (props) {
      key = subValue;
      subValue = value[key];
    }
    // Recursively populate clone (susceptible to call stack limits).
    assignValue(result, key, baseClone(subValue, bitmask, customizer, key, value, stack));
  });
  return result;
}

module.exports = baseClone;


/***/ }),

/***/ "./node_modules/lodash/_baseConformsTo.js":
/*!************************************************!*\
  !*** ./node_modules/lodash/_baseConformsTo.js ***!
  \************************************************/
/***/ (function(module) {

/**
 * The base implementation of `_.conformsTo` which accepts `props` to check.
 *
 * @private
 * @param {Object} object The object to inspect.
 * @param {Object} source The object of property predicates to conform to.
 * @returns {boolean} Returns `true` if `object` conforms, else `false`.
 */
function baseConformsTo(object, source, props) {
  var length = props.length;
  if (object == null) {
    return !length;
  }
  object = Object(object);
  while (length--) {
    var key = props[length],
        predicate = source[key],
        value = object[key];

    if ((value === undefined && !(key in object)) || !predicate(value)) {
      return false;
    }
  }
  return true;
}

module.exports = baseConformsTo;


/***/ }),

/***/ "./node_modules/lodash/_baseCreate.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_baseCreate.js ***!
  \********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var isObject = __webpack_require__(/*! ./isObject */ "./node_modules/lodash/isObject.js");

/** Built-in value references. */
var objectCreate = Object.create;

/**
 * The base implementation of `_.create` without support for assigning
 * properties to the created object.
 *
 * @private
 * @param {Object} proto The object to inherit from.
 * @returns {Object} Returns the new object.
 */
var baseCreate = (function() {
  function object() {}
  return function(proto) {
    if (!isObject(proto)) {
      return {};
    }
    if (objectCreate) {
      return objectCreate(proto);
    }
    object.prototype = proto;
    var result = new object;
    object.prototype = undefined;
    return result;
  };
}());

module.exports = baseCreate;


/***/ }),

/***/ "./node_modules/lodash/_baseGetAllKeys.js":
/*!************************************************!*\
  !*** ./node_modules/lodash/_baseGetAllKeys.js ***!
  \************************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var arrayPush = __webpack_require__(/*! ./_arrayPush */ "./node_modules/lodash/_arrayPush.js"),
    isArray = __webpack_require__(/*! ./isArray */ "./node_modules/lodash/isArray.js");

/**
 * The base implementation of `getAllKeys` and `getAllKeysIn` which uses
 * `keysFunc` and `symbolsFunc` to get the enumerable property names and
 * symbols of `object`.
 *
 * @private
 * @param {Object} object The object to query.
 * @param {Function} keysFunc The function to get the keys of `object`.
 * @param {Function} symbolsFunc The function to get the symbols of `object`.
 * @returns {Array} Returns the array of property names and symbols.
 */
function baseGetAllKeys(object, keysFunc, symbolsFunc) {
  var result = keysFunc(object);
  return isArray(object) ? result : arrayPush(result, symbolsFunc(object));
}

module.exports = baseGetAllKeys;


/***/ }),

/***/ "./node_modules/lodash/_baseGetTag.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_baseGetTag.js ***!
  \********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var Symbol = __webpack_require__(/*! ./_Symbol */ "./node_modules/lodash/_Symbol.js"),
    getRawTag = __webpack_require__(/*! ./_getRawTag */ "./node_modules/lodash/_getRawTag.js"),
    objectToString = __webpack_require__(/*! ./_objectToString */ "./node_modules/lodash/_objectToString.js");

/** `Object#toString` result references. */
var nullTag = '[object Null]',
    undefinedTag = '[object Undefined]';

/** Built-in value references. */
var symToStringTag = Symbol ? Symbol.toStringTag : undefined;

/**
 * The base implementation of `getTag` without fallbacks for buggy environments.
 *
 * @private
 * @param {*} value The value to query.
 * @returns {string} Returns the `toStringTag`.
 */
function baseGetTag(value) {
  if (value == null) {
    return value === undefined ? undefinedTag : nullTag;
  }
  return (symToStringTag && symToStringTag in Object(value))
    ? getRawTag(value)
    : objectToString(value);
}

module.exports = baseGetTag;


/***/ }),

/***/ "./node_modules/lodash/_baseGt.js":
/*!****************************************!*\
  !*** ./node_modules/lodash/_baseGt.js ***!
  \****************************************/
/***/ (function(module) {

/**
 * The base implementation of `_.gt` which doesn't coerce arguments.
 *
 * @private
 * @param {*} value The value to compare.
 * @param {*} other The other value to compare.
 * @returns {boolean} Returns `true` if `value` is greater than `other`,
 *  else `false`.
 */
function baseGt(value, other) {
  return value > other;
}

module.exports = baseGt;


/***/ }),

/***/ "./node_modules/lodash/_baseIsArguments.js":
/*!*************************************************!*\
  !*** ./node_modules/lodash/_baseIsArguments.js ***!
  \*************************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseGetTag = __webpack_require__(/*! ./_baseGetTag */ "./node_modules/lodash/_baseGetTag.js"),
    isObjectLike = __webpack_require__(/*! ./isObjectLike */ "./node_modules/lodash/isObjectLike.js");

/** `Object#toString` result references. */
var argsTag = '[object Arguments]';

/**
 * The base implementation of `_.isArguments`.
 *
 * @private
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is an `arguments` object,
 */
function baseIsArguments(value) {
  return isObjectLike(value) && baseGetTag(value) == argsTag;
}

module.exports = baseIsArguments;


/***/ }),

/***/ "./node_modules/lodash/_baseIsArrayBuffer.js":
/*!***************************************************!*\
  !*** ./node_modules/lodash/_baseIsArrayBuffer.js ***!
  \***************************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseGetTag = __webpack_require__(/*! ./_baseGetTag */ "./node_modules/lodash/_baseGetTag.js"),
    isObjectLike = __webpack_require__(/*! ./isObjectLike */ "./node_modules/lodash/isObjectLike.js");

var arrayBufferTag = '[object ArrayBuffer]';

/**
 * The base implementation of `_.isArrayBuffer` without Node.js optimizations.
 *
 * @private
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is an array buffer, else `false`.
 */
function baseIsArrayBuffer(value) {
  return isObjectLike(value) && baseGetTag(value) == arrayBufferTag;
}

module.exports = baseIsArrayBuffer;


/***/ }),

/***/ "./node_modules/lodash/_baseIsDate.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_baseIsDate.js ***!
  \********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseGetTag = __webpack_require__(/*! ./_baseGetTag */ "./node_modules/lodash/_baseGetTag.js"),
    isObjectLike = __webpack_require__(/*! ./isObjectLike */ "./node_modules/lodash/isObjectLike.js");

/** `Object#toString` result references. */
var dateTag = '[object Date]';

/**
 * The base implementation of `_.isDate` without Node.js optimizations.
 *
 * @private
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a date object, else `false`.
 */
function baseIsDate(value) {
  return isObjectLike(value) && baseGetTag(value) == dateTag;
}

module.exports = baseIsDate;


/***/ }),

/***/ "./node_modules/lodash/_baseIsEqual.js":
/*!*********************************************!*\
  !*** ./node_modules/lodash/_baseIsEqual.js ***!
  \*********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseIsEqualDeep = __webpack_require__(/*! ./_baseIsEqualDeep */ "./node_modules/lodash/_baseIsEqualDeep.js"),
    isObjectLike = __webpack_require__(/*! ./isObjectLike */ "./node_modules/lodash/isObjectLike.js");

/**
 * The base implementation of `_.isEqual` which supports partial comparisons
 * and tracks traversed objects.
 *
 * @private
 * @param {*} value The value to compare.
 * @param {*} other The other value to compare.
 * @param {boolean} bitmask The bitmask flags.
 *  1 - Unordered comparison
 *  2 - Partial comparison
 * @param {Function} [customizer] The function to customize comparisons.
 * @param {Object} [stack] Tracks traversed `value` and `other` objects.
 * @returns {boolean} Returns `true` if the values are equivalent, else `false`.
 */
function baseIsEqual(value, other, bitmask, customizer, stack) {
  if (value === other) {
    return true;
  }
  if (value == null || other == null || (!isObjectLike(value) && !isObjectLike(other))) {
    return value !== value && other !== other;
  }
  return baseIsEqualDeep(value, other, bitmask, customizer, baseIsEqual, stack);
}

module.exports = baseIsEqual;


/***/ }),

/***/ "./node_modules/lodash/_baseIsEqualDeep.js":
/*!*************************************************!*\
  !*** ./node_modules/lodash/_baseIsEqualDeep.js ***!
  \*************************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var Stack = __webpack_require__(/*! ./_Stack */ "./node_modules/lodash/_Stack.js"),
    equalArrays = __webpack_require__(/*! ./_equalArrays */ "./node_modules/lodash/_equalArrays.js"),
    equalByTag = __webpack_require__(/*! ./_equalByTag */ "./node_modules/lodash/_equalByTag.js"),
    equalObjects = __webpack_require__(/*! ./_equalObjects */ "./node_modules/lodash/_equalObjects.js"),
    getTag = __webpack_require__(/*! ./_getTag */ "./node_modules/lodash/_getTag.js"),
    isArray = __webpack_require__(/*! ./isArray */ "./node_modules/lodash/isArray.js"),
    isBuffer = __webpack_require__(/*! ./isBuffer */ "./node_modules/lodash/isBuffer.js"),
    isTypedArray = __webpack_require__(/*! ./isTypedArray */ "./node_modules/lodash/isTypedArray.js");

/** Used to compose bitmasks for value comparisons. */
var COMPARE_PARTIAL_FLAG = 1;

/** `Object#toString` result references. */
var argsTag = '[object Arguments]',
    arrayTag = '[object Array]',
    objectTag = '[object Object]';

/** Used for built-in method references. */
var objectProto = Object.prototype;

/** Used to check objects for own properties. */
var hasOwnProperty = objectProto.hasOwnProperty;

/**
 * A specialized version of `baseIsEqual` for arrays and objects which performs
 * deep comparisons and tracks traversed objects enabling objects with circular
 * references to be compared.
 *
 * @private
 * @param {Object} object The object to compare.
 * @param {Object} other The other object to compare.
 * @param {number} bitmask The bitmask flags. See `baseIsEqual` for more details.
 * @param {Function} customizer The function to customize comparisons.
 * @param {Function} equalFunc The function to determine equivalents of values.
 * @param {Object} [stack] Tracks traversed `object` and `other` objects.
 * @returns {boolean} Returns `true` if the objects are equivalent, else `false`.
 */
function baseIsEqualDeep(object, other, bitmask, customizer, equalFunc, stack) {
  var objIsArr = isArray(object),
      othIsArr = isArray(other),
      objTag = objIsArr ? arrayTag : getTag(object),
      othTag = othIsArr ? arrayTag : getTag(other);

  objTag = objTag == argsTag ? objectTag : objTag;
  othTag = othTag == argsTag ? objectTag : othTag;

  var objIsObj = objTag == objectTag,
      othIsObj = othTag == objectTag,
      isSameTag = objTag == othTag;

  if (isSameTag && isBuffer(object)) {
    if (!isBuffer(other)) {
      return false;
    }
    objIsArr = true;
    objIsObj = false;
  }
  if (isSameTag && !objIsObj) {
    stack || (stack = new Stack);
    return (objIsArr || isTypedArray(object))
      ? equalArrays(object, other, bitmask, customizer, equalFunc, stack)
      : equalByTag(object, other, objTag, bitmask, customizer, equalFunc, stack);
  }
  if (!(bitmask & COMPARE_PARTIAL_FLAG)) {
    var objIsWrapped = objIsObj && hasOwnProperty.call(object, '__wrapped__'),
        othIsWrapped = othIsObj && hasOwnProperty.call(other, '__wrapped__');

    if (objIsWrapped || othIsWrapped) {
      var objUnwrapped = objIsWrapped ? object.value() : object,
          othUnwrapped = othIsWrapped ? other.value() : other;

      stack || (stack = new Stack);
      return equalFunc(objUnwrapped, othUnwrapped, bitmask, customizer, stack);
    }
  }
  if (!isSameTag) {
    return false;
  }
  stack || (stack = new Stack);
  return equalObjects(object, other, bitmask, customizer, equalFunc, stack);
}

module.exports = baseIsEqualDeep;


/***/ }),

/***/ "./node_modules/lodash/_baseIsMap.js":
/*!*******************************************!*\
  !*** ./node_modules/lodash/_baseIsMap.js ***!
  \*******************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var getTag = __webpack_require__(/*! ./_getTag */ "./node_modules/lodash/_getTag.js"),
    isObjectLike = __webpack_require__(/*! ./isObjectLike */ "./node_modules/lodash/isObjectLike.js");

/** `Object#toString` result references. */
var mapTag = '[object Map]';

/**
 * The base implementation of `_.isMap` without Node.js optimizations.
 *
 * @private
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a map, else `false`.
 */
function baseIsMap(value) {
  return isObjectLike(value) && getTag(value) == mapTag;
}

module.exports = baseIsMap;


/***/ }),

/***/ "./node_modules/lodash/_baseIsMatch.js":
/*!*********************************************!*\
  !*** ./node_modules/lodash/_baseIsMatch.js ***!
  \*********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var Stack = __webpack_require__(/*! ./_Stack */ "./node_modules/lodash/_Stack.js"),
    baseIsEqual = __webpack_require__(/*! ./_baseIsEqual */ "./node_modules/lodash/_baseIsEqual.js");

/** Used to compose bitmasks for value comparisons. */
var COMPARE_PARTIAL_FLAG = 1,
    COMPARE_UNORDERED_FLAG = 2;

/**
 * The base implementation of `_.isMatch` without support for iteratee shorthands.
 *
 * @private
 * @param {Object} object The object to inspect.
 * @param {Object} source The object of property values to match.
 * @param {Array} matchData The property names, values, and compare flags to match.
 * @param {Function} [customizer] The function to customize comparisons.
 * @returns {boolean} Returns `true` if `object` is a match, else `false`.
 */
function baseIsMatch(object, source, matchData, customizer) {
  var index = matchData.length,
      length = index,
      noCustomizer = !customizer;

  if (object == null) {
    return !length;
  }
  object = Object(object);
  while (index--) {
    var data = matchData[index];
    if ((noCustomizer && data[2])
          ? data[1] !== object[data[0]]
          : !(data[0] in object)
        ) {
      return false;
    }
  }
  while (++index < length) {
    data = matchData[index];
    var key = data[0],
        objValue = object[key],
        srcValue = data[1];

    if (noCustomizer && data[2]) {
      if (objValue === undefined && !(key in object)) {
        return false;
      }
    } else {
      var stack = new Stack;
      if (customizer) {
        var result = customizer(objValue, srcValue, key, object, source, stack);
      }
      if (!(result === undefined
            ? baseIsEqual(srcValue, objValue, COMPARE_PARTIAL_FLAG | COMPARE_UNORDERED_FLAG, customizer, stack)
            : result
          )) {
        return false;
      }
    }
  }
  return true;
}

module.exports = baseIsMatch;


/***/ }),

/***/ "./node_modules/lodash/_baseIsNative.js":
/*!**********************************************!*\
  !*** ./node_modules/lodash/_baseIsNative.js ***!
  \**********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var isFunction = __webpack_require__(/*! ./isFunction */ "./node_modules/lodash/isFunction.js"),
    isMasked = __webpack_require__(/*! ./_isMasked */ "./node_modules/lodash/_isMasked.js"),
    isObject = __webpack_require__(/*! ./isObject */ "./node_modules/lodash/isObject.js"),
    toSource = __webpack_require__(/*! ./_toSource */ "./node_modules/lodash/_toSource.js");

/**
 * Used to match `RegExp`
 * [syntax characters](http://ecma-international.org/ecma-262/7.0/#sec-patterns).
 */
var reRegExpChar = /[\\^$.*+?()[\]{}|]/g;

/** Used to detect host constructors (Safari). */
var reIsHostCtor = /^\[object .+?Constructor\]$/;

/** Used for built-in method references. */
var funcProto = Function.prototype,
    objectProto = Object.prototype;

/** Used to resolve the decompiled source of functions. */
var funcToString = funcProto.toString;

/** Used to check objects for own properties. */
var hasOwnProperty = objectProto.hasOwnProperty;

/** Used to detect if a method is native. */
var reIsNative = RegExp('^' +
  funcToString.call(hasOwnProperty).replace(reRegExpChar, '\\$&')
  .replace(/hasOwnProperty|(function).*?(?=\\\()| for .+?(?=\\\])/g, '$1.*?') + '$'
);

/**
 * The base implementation of `_.isNative` without bad shim checks.
 *
 * @private
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a native function,
 *  else `false`.
 */
function baseIsNative(value) {
  if (!isObject(value) || isMasked(value)) {
    return false;
  }
  var pattern = isFunction(value) ? reIsNative : reIsHostCtor;
  return pattern.test(toSource(value));
}

module.exports = baseIsNative;


/***/ }),

/***/ "./node_modules/lodash/_baseIsRegExp.js":
/*!**********************************************!*\
  !*** ./node_modules/lodash/_baseIsRegExp.js ***!
  \**********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseGetTag = __webpack_require__(/*! ./_baseGetTag */ "./node_modules/lodash/_baseGetTag.js"),
    isObjectLike = __webpack_require__(/*! ./isObjectLike */ "./node_modules/lodash/isObjectLike.js");

/** `Object#toString` result references. */
var regexpTag = '[object RegExp]';

/**
 * The base implementation of `_.isRegExp` without Node.js optimizations.
 *
 * @private
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a regexp, else `false`.
 */
function baseIsRegExp(value) {
  return isObjectLike(value) && baseGetTag(value) == regexpTag;
}

module.exports = baseIsRegExp;


/***/ }),

/***/ "./node_modules/lodash/_baseIsSet.js":
/*!*******************************************!*\
  !*** ./node_modules/lodash/_baseIsSet.js ***!
  \*******************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var getTag = __webpack_require__(/*! ./_getTag */ "./node_modules/lodash/_getTag.js"),
    isObjectLike = __webpack_require__(/*! ./isObjectLike */ "./node_modules/lodash/isObjectLike.js");

/** `Object#toString` result references. */
var setTag = '[object Set]';

/**
 * The base implementation of `_.isSet` without Node.js optimizations.
 *
 * @private
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a set, else `false`.
 */
function baseIsSet(value) {
  return isObjectLike(value) && getTag(value) == setTag;
}

module.exports = baseIsSet;


/***/ }),

/***/ "./node_modules/lodash/_baseIsTypedArray.js":
/*!**************************************************!*\
  !*** ./node_modules/lodash/_baseIsTypedArray.js ***!
  \**************************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseGetTag = __webpack_require__(/*! ./_baseGetTag */ "./node_modules/lodash/_baseGetTag.js"),
    isLength = __webpack_require__(/*! ./isLength */ "./node_modules/lodash/isLength.js"),
    isObjectLike = __webpack_require__(/*! ./isObjectLike */ "./node_modules/lodash/isObjectLike.js");

/** `Object#toString` result references. */
var argsTag = '[object Arguments]',
    arrayTag = '[object Array]',
    boolTag = '[object Boolean]',
    dateTag = '[object Date]',
    errorTag = '[object Error]',
    funcTag = '[object Function]',
    mapTag = '[object Map]',
    numberTag = '[object Number]',
    objectTag = '[object Object]',
    regexpTag = '[object RegExp]',
    setTag = '[object Set]',
    stringTag = '[object String]',
    weakMapTag = '[object WeakMap]';

var arrayBufferTag = '[object ArrayBuffer]',
    dataViewTag = '[object DataView]',
    float32Tag = '[object Float32Array]',
    float64Tag = '[object Float64Array]',
    int8Tag = '[object Int8Array]',
    int16Tag = '[object Int16Array]',
    int32Tag = '[object Int32Array]',
    uint8Tag = '[object Uint8Array]',
    uint8ClampedTag = '[object Uint8ClampedArray]',
    uint16Tag = '[object Uint16Array]',
    uint32Tag = '[object Uint32Array]';

/** Used to identify `toStringTag` values of typed arrays. */
var typedArrayTags = {};
typedArrayTags[float32Tag] = typedArrayTags[float64Tag] =
typedArrayTags[int8Tag] = typedArrayTags[int16Tag] =
typedArrayTags[int32Tag] = typedArrayTags[uint8Tag] =
typedArrayTags[uint8ClampedTag] = typedArrayTags[uint16Tag] =
typedArrayTags[uint32Tag] = true;
typedArrayTags[argsTag] = typedArrayTags[arrayTag] =
typedArrayTags[arrayBufferTag] = typedArrayTags[boolTag] =
typedArrayTags[dataViewTag] = typedArrayTags[dateTag] =
typedArrayTags[errorTag] = typedArrayTags[funcTag] =
typedArrayTags[mapTag] = typedArrayTags[numberTag] =
typedArrayTags[objectTag] = typedArrayTags[regexpTag] =
typedArrayTags[setTag] = typedArrayTags[stringTag] =
typedArrayTags[weakMapTag] = false;

/**
 * The base implementation of `_.isTypedArray` without Node.js optimizations.
 *
 * @private
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a typed array, else `false`.
 */
function baseIsTypedArray(value) {
  return isObjectLike(value) &&
    isLength(value.length) && !!typedArrayTags[baseGetTag(value)];
}

module.exports = baseIsTypedArray;


/***/ }),

/***/ "./node_modules/lodash/_baseKeys.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/_baseKeys.js ***!
  \******************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var isPrototype = __webpack_require__(/*! ./_isPrototype */ "./node_modules/lodash/_isPrototype.js"),
    nativeKeys = __webpack_require__(/*! ./_nativeKeys */ "./node_modules/lodash/_nativeKeys.js");

/** Used for built-in method references. */
var objectProto = Object.prototype;

/** Used to check objects for own properties. */
var hasOwnProperty = objectProto.hasOwnProperty;

/**
 * The base implementation of `_.keys` which doesn't treat sparse arrays as dense.
 *
 * @private
 * @param {Object} object The object to query.
 * @returns {Array} Returns the array of property names.
 */
function baseKeys(object) {
  if (!isPrototype(object)) {
    return nativeKeys(object);
  }
  var result = [];
  for (var key in Object(object)) {
    if (hasOwnProperty.call(object, key) && key != 'constructor') {
      result.push(key);
    }
  }
  return result;
}

module.exports = baseKeys;


/***/ }),

/***/ "./node_modules/lodash/_baseKeysIn.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_baseKeysIn.js ***!
  \********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var isObject = __webpack_require__(/*! ./isObject */ "./node_modules/lodash/isObject.js"),
    isPrototype = __webpack_require__(/*! ./_isPrototype */ "./node_modules/lodash/_isPrototype.js"),
    nativeKeysIn = __webpack_require__(/*! ./_nativeKeysIn */ "./node_modules/lodash/_nativeKeysIn.js");

/** Used for built-in method references. */
var objectProto = Object.prototype;

/** Used to check objects for own properties. */
var hasOwnProperty = objectProto.hasOwnProperty;

/**
 * The base implementation of `_.keysIn` which doesn't treat sparse arrays as dense.
 *
 * @private
 * @param {Object} object The object to query.
 * @returns {Array} Returns the array of property names.
 */
function baseKeysIn(object) {
  if (!isObject(object)) {
    return nativeKeysIn(object);
  }
  var isProto = isPrototype(object),
      result = [];

  for (var key in object) {
    if (!(key == 'constructor' && (isProto || !hasOwnProperty.call(object, key)))) {
      result.push(key);
    }
  }
  return result;
}

module.exports = baseKeysIn;


/***/ }),

/***/ "./node_modules/lodash/_baseLt.js":
/*!****************************************!*\
  !*** ./node_modules/lodash/_baseLt.js ***!
  \****************************************/
/***/ (function(module) {

/**
 * The base implementation of `_.lt` which doesn't coerce arguments.
 *
 * @private
 * @param {*} value The value to compare.
 * @param {*} other The other value to compare.
 * @returns {boolean} Returns `true` if `value` is less than `other`,
 *  else `false`.
 */
function baseLt(value, other) {
  return value < other;
}

module.exports = baseLt;


/***/ }),

/***/ "./node_modules/lodash/_baseTimes.js":
/*!*******************************************!*\
  !*** ./node_modules/lodash/_baseTimes.js ***!
  \*******************************************/
/***/ (function(module) {

/**
 * The base implementation of `_.times` without support for iteratee shorthands
 * or max array length checks.
 *
 * @private
 * @param {number} n The number of times to invoke `iteratee`.
 * @param {Function} iteratee The function invoked per iteration.
 * @returns {Array} Returns the array of results.
 */
function baseTimes(n, iteratee) {
  var index = -1,
      result = Array(n);

  while (++index < n) {
    result[index] = iteratee(index);
  }
  return result;
}

module.exports = baseTimes;


/***/ }),

/***/ "./node_modules/lodash/_baseToString.js":
/*!**********************************************!*\
  !*** ./node_modules/lodash/_baseToString.js ***!
  \**********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var Symbol = __webpack_require__(/*! ./_Symbol */ "./node_modules/lodash/_Symbol.js"),
    arrayMap = __webpack_require__(/*! ./_arrayMap */ "./node_modules/lodash/_arrayMap.js"),
    isArray = __webpack_require__(/*! ./isArray */ "./node_modules/lodash/isArray.js"),
    isSymbol = __webpack_require__(/*! ./isSymbol */ "./node_modules/lodash/isSymbol.js");

/** Used as references for various `Number` constants. */
var INFINITY = 1 / 0;

/** Used to convert symbols to primitives and strings. */
var symbolProto = Symbol ? Symbol.prototype : undefined,
    symbolToString = symbolProto ? symbolProto.toString : undefined;

/**
 * The base implementation of `_.toString` which doesn't convert nullish
 * values to empty strings.
 *
 * @private
 * @param {*} value The value to process.
 * @returns {string} Returns the string.
 */
function baseToString(value) {
  // Exit early for strings to avoid a performance hit in some environments.
  if (typeof value == 'string') {
    return value;
  }
  if (isArray(value)) {
    // Recursively convert values (susceptible to call stack limits).
    return arrayMap(value, baseToString) + '';
  }
  if (isSymbol(value)) {
    return symbolToString ? symbolToString.call(value) : '';
  }
  var result = (value + '');
  return (result == '0' && (1 / value) == -INFINITY) ? '-0' : result;
}

module.exports = baseToString;


/***/ }),

/***/ "./node_modules/lodash/_baseTrim.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/_baseTrim.js ***!
  \******************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var trimmedEndIndex = __webpack_require__(/*! ./_trimmedEndIndex */ "./node_modules/lodash/_trimmedEndIndex.js");

/** Used to match leading whitespace. */
var reTrimStart = /^\s+/;

/**
 * The base implementation of `_.trim`.
 *
 * @private
 * @param {string} string The string to trim.
 * @returns {string} Returns the trimmed string.
 */
function baseTrim(string) {
  return string
    ? string.slice(0, trimmedEndIndex(string) + 1).replace(reTrimStart, '')
    : string;
}

module.exports = baseTrim;


/***/ }),

/***/ "./node_modules/lodash/_baseUnary.js":
/*!*******************************************!*\
  !*** ./node_modules/lodash/_baseUnary.js ***!
  \*******************************************/
/***/ (function(module) {

/**
 * The base implementation of `_.unary` without support for storing metadata.
 *
 * @private
 * @param {Function} func The function to cap arguments for.
 * @returns {Function} Returns the new capped function.
 */
function baseUnary(func) {
  return function(value) {
    return func(value);
  };
}

module.exports = baseUnary;


/***/ }),

/***/ "./node_modules/lodash/_baseValues.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_baseValues.js ***!
  \********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var arrayMap = __webpack_require__(/*! ./_arrayMap */ "./node_modules/lodash/_arrayMap.js");

/**
 * The base implementation of `_.values` and `_.valuesIn` which creates an
 * array of `object` property values corresponding to the property names
 * of `props`.
 *
 * @private
 * @param {Object} object The object to query.
 * @param {Array} props The property names to get values for.
 * @returns {Object} Returns the array of property values.
 */
function baseValues(object, props) {
  return arrayMap(props, function(key) {
    return object[key];
  });
}

module.exports = baseValues;


/***/ }),

/***/ "./node_modules/lodash/_cacheHas.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/_cacheHas.js ***!
  \******************************************/
/***/ (function(module) {

/**
 * Checks if a `cache` value for `key` exists.
 *
 * @private
 * @param {Object} cache The cache to query.
 * @param {string} key The key of the entry to check.
 * @returns {boolean} Returns `true` if an entry for `key` exists, else `false`.
 */
function cacheHas(cache, key) {
  return cache.has(key);
}

module.exports = cacheHas;


/***/ }),

/***/ "./node_modules/lodash/_cloneArrayBuffer.js":
/*!**************************************************!*\
  !*** ./node_modules/lodash/_cloneArrayBuffer.js ***!
  \**************************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var Uint8Array = __webpack_require__(/*! ./_Uint8Array */ "./node_modules/lodash/_Uint8Array.js");

/**
 * Creates a clone of `arrayBuffer`.
 *
 * @private
 * @param {ArrayBuffer} arrayBuffer The array buffer to clone.
 * @returns {ArrayBuffer} Returns the cloned array buffer.
 */
function cloneArrayBuffer(arrayBuffer) {
  var result = new arrayBuffer.constructor(arrayBuffer.byteLength);
  new Uint8Array(result).set(new Uint8Array(arrayBuffer));
  return result;
}

module.exports = cloneArrayBuffer;


/***/ }),

/***/ "./node_modules/lodash/_cloneBuffer.js":
/*!*********************************************!*\
  !*** ./node_modules/lodash/_cloneBuffer.js ***!
  \*********************************************/
/***/ (function(module, exports, __webpack_require__) {

/* module decorator */ module = __webpack_require__.nmd(module);
var root = __webpack_require__(/*! ./_root */ "./node_modules/lodash/_root.js");

/** Detect free variable `exports`. */
var freeExports =  true && exports && !exports.nodeType && exports;

/** Detect free variable `module`. */
var freeModule = freeExports && "object" == 'object' && module && !module.nodeType && module;

/** Detect the popular CommonJS extension `module.exports`. */
var moduleExports = freeModule && freeModule.exports === freeExports;

/** Built-in value references. */
var Buffer = moduleExports ? root.Buffer : undefined,
    allocUnsafe = Buffer ? Buffer.allocUnsafe : undefined;

/**
 * Creates a clone of  `buffer`.
 *
 * @private
 * @param {Buffer} buffer The buffer to clone.
 * @param {boolean} [isDeep] Specify a deep clone.
 * @returns {Buffer} Returns the cloned buffer.
 */
function cloneBuffer(buffer, isDeep) {
  if (isDeep) {
    return buffer.slice();
  }
  var length = buffer.length,
      result = allocUnsafe ? allocUnsafe(length) : new buffer.constructor(length);

  buffer.copy(result);
  return result;
}

module.exports = cloneBuffer;


/***/ }),

/***/ "./node_modules/lodash/_cloneDataView.js":
/*!***********************************************!*\
  !*** ./node_modules/lodash/_cloneDataView.js ***!
  \***********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var cloneArrayBuffer = __webpack_require__(/*! ./_cloneArrayBuffer */ "./node_modules/lodash/_cloneArrayBuffer.js");

/**
 * Creates a clone of `dataView`.
 *
 * @private
 * @param {Object} dataView The data view to clone.
 * @param {boolean} [isDeep] Specify a deep clone.
 * @returns {Object} Returns the cloned data view.
 */
function cloneDataView(dataView, isDeep) {
  var buffer = isDeep ? cloneArrayBuffer(dataView.buffer) : dataView.buffer;
  return new dataView.constructor(buffer, dataView.byteOffset, dataView.byteLength);
}

module.exports = cloneDataView;


/***/ }),

/***/ "./node_modules/lodash/_cloneRegExp.js":
/*!*********************************************!*\
  !*** ./node_modules/lodash/_cloneRegExp.js ***!
  \*********************************************/
/***/ (function(module) {

/** Used to match `RegExp` flags from their coerced string values. */
var reFlags = /\w*$/;

/**
 * Creates a clone of `regexp`.
 *
 * @private
 * @param {Object} regexp The regexp to clone.
 * @returns {Object} Returns the cloned regexp.
 */
function cloneRegExp(regexp) {
  var result = new regexp.constructor(regexp.source, reFlags.exec(regexp));
  result.lastIndex = regexp.lastIndex;
  return result;
}

module.exports = cloneRegExp;


/***/ }),

/***/ "./node_modules/lodash/_cloneSymbol.js":
/*!*********************************************!*\
  !*** ./node_modules/lodash/_cloneSymbol.js ***!
  \*********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var Symbol = __webpack_require__(/*! ./_Symbol */ "./node_modules/lodash/_Symbol.js");

/** Used to convert symbols to primitives and strings. */
var symbolProto = Symbol ? Symbol.prototype : undefined,
    symbolValueOf = symbolProto ? symbolProto.valueOf : undefined;

/**
 * Creates a clone of the `symbol` object.
 *
 * @private
 * @param {Object} symbol The symbol object to clone.
 * @returns {Object} Returns the cloned symbol object.
 */
function cloneSymbol(symbol) {
  return symbolValueOf ? Object(symbolValueOf.call(symbol)) : {};
}

module.exports = cloneSymbol;


/***/ }),

/***/ "./node_modules/lodash/_cloneTypedArray.js":
/*!*************************************************!*\
  !*** ./node_modules/lodash/_cloneTypedArray.js ***!
  \*************************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var cloneArrayBuffer = __webpack_require__(/*! ./_cloneArrayBuffer */ "./node_modules/lodash/_cloneArrayBuffer.js");

/**
 * Creates a clone of `typedArray`.
 *
 * @private
 * @param {Object} typedArray The typed array to clone.
 * @param {boolean} [isDeep] Specify a deep clone.
 * @returns {Object} Returns the cloned typed array.
 */
function cloneTypedArray(typedArray, isDeep) {
  var buffer = isDeep ? cloneArrayBuffer(typedArray.buffer) : typedArray.buffer;
  return new typedArray.constructor(buffer, typedArray.byteOffset, typedArray.length);
}

module.exports = cloneTypedArray;


/***/ }),

/***/ "./node_modules/lodash/_copyArray.js":
/*!*******************************************!*\
  !*** ./node_modules/lodash/_copyArray.js ***!
  \*******************************************/
/***/ (function(module) {

/**
 * Copies the values of `source` to `array`.
 *
 * @private
 * @param {Array} source The array to copy values from.
 * @param {Array} [array=[]] The array to copy values to.
 * @returns {Array} Returns `array`.
 */
function copyArray(source, array) {
  var index = -1,
      length = source.length;

  array || (array = Array(length));
  while (++index < length) {
    array[index] = source[index];
  }
  return array;
}

module.exports = copyArray;


/***/ }),

/***/ "./node_modules/lodash/_copyObject.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_copyObject.js ***!
  \********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var assignValue = __webpack_require__(/*! ./_assignValue */ "./node_modules/lodash/_assignValue.js"),
    baseAssignValue = __webpack_require__(/*! ./_baseAssignValue */ "./node_modules/lodash/_baseAssignValue.js");

/**
 * Copies properties of `source` to `object`.
 *
 * @private
 * @param {Object} source The object to copy properties from.
 * @param {Array} props The property identifiers to copy.
 * @param {Object} [object={}] The object to copy properties to.
 * @param {Function} [customizer] The function to customize copied values.
 * @returns {Object} Returns `object`.
 */
function copyObject(source, props, object, customizer) {
  var isNew = !object;
  object || (object = {});

  var index = -1,
      length = props.length;

  while (++index < length) {
    var key = props[index];

    var newValue = customizer
      ? customizer(object[key], source[key], key, object, source)
      : undefined;

    if (newValue === undefined) {
      newValue = source[key];
    }
    if (isNew) {
      baseAssignValue(object, key, newValue);
    } else {
      assignValue(object, key, newValue);
    }
  }
  return object;
}

module.exports = copyObject;


/***/ }),

/***/ "./node_modules/lodash/_copySymbols.js":
/*!*********************************************!*\
  !*** ./node_modules/lodash/_copySymbols.js ***!
  \*********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var copyObject = __webpack_require__(/*! ./_copyObject */ "./node_modules/lodash/_copyObject.js"),
    getSymbols = __webpack_require__(/*! ./_getSymbols */ "./node_modules/lodash/_getSymbols.js");

/**
 * Copies own symbols of `source` to `object`.
 *
 * @private
 * @param {Object} source The object to copy symbols from.
 * @param {Object} [object={}] The object to copy symbols to.
 * @returns {Object} Returns `object`.
 */
function copySymbols(source, object) {
  return copyObject(source, getSymbols(source), object);
}

module.exports = copySymbols;


/***/ }),

/***/ "./node_modules/lodash/_copySymbolsIn.js":
/*!***********************************************!*\
  !*** ./node_modules/lodash/_copySymbolsIn.js ***!
  \***********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var copyObject = __webpack_require__(/*! ./_copyObject */ "./node_modules/lodash/_copyObject.js"),
    getSymbolsIn = __webpack_require__(/*! ./_getSymbolsIn */ "./node_modules/lodash/_getSymbolsIn.js");

/**
 * Copies own and inherited symbols of `source` to `object`.
 *
 * @private
 * @param {Object} source The object to copy symbols from.
 * @param {Object} [object={}] The object to copy symbols to.
 * @returns {Object} Returns `object`.
 */
function copySymbolsIn(source, object) {
  return copyObject(source, getSymbolsIn(source), object);
}

module.exports = copySymbolsIn;


/***/ }),

/***/ "./node_modules/lodash/_coreJsData.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_coreJsData.js ***!
  \********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var root = __webpack_require__(/*! ./_root */ "./node_modules/lodash/_root.js");

/** Used to detect overreaching core-js shims. */
var coreJsData = root['__core-js_shared__'];

module.exports = coreJsData;


/***/ }),

/***/ "./node_modules/lodash/_createRelationalOperation.js":
/*!***********************************************************!*\
  !*** ./node_modules/lodash/_createRelationalOperation.js ***!
  \***********************************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var toNumber = __webpack_require__(/*! ./toNumber */ "./node_modules/lodash/toNumber.js");

/**
 * Creates a function that performs a relational operation on two values.
 *
 * @private
 * @param {Function} operator The function to perform the operation.
 * @returns {Function} Returns the new relational operation function.
 */
function createRelationalOperation(operator) {
  return function(value, other) {
    if (!(typeof value == 'string' && typeof other == 'string')) {
      value = toNumber(value);
      other = toNumber(other);
    }
    return operator(value, other);
  };
}

module.exports = createRelationalOperation;


/***/ }),

/***/ "./node_modules/lodash/_defineProperty.js":
/*!************************************************!*\
  !*** ./node_modules/lodash/_defineProperty.js ***!
  \************************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var getNative = __webpack_require__(/*! ./_getNative */ "./node_modules/lodash/_getNative.js");

var defineProperty = (function() {
  try {
    var func = getNative(Object, 'defineProperty');
    func({}, '', {});
    return func;
  } catch (e) {}
}());

module.exports = defineProperty;


/***/ }),

/***/ "./node_modules/lodash/_equalArrays.js":
/*!*********************************************!*\
  !*** ./node_modules/lodash/_equalArrays.js ***!
  \*********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var SetCache = __webpack_require__(/*! ./_SetCache */ "./node_modules/lodash/_SetCache.js"),
    arraySome = __webpack_require__(/*! ./_arraySome */ "./node_modules/lodash/_arraySome.js"),
    cacheHas = __webpack_require__(/*! ./_cacheHas */ "./node_modules/lodash/_cacheHas.js");

/** Used to compose bitmasks for value comparisons. */
var COMPARE_PARTIAL_FLAG = 1,
    COMPARE_UNORDERED_FLAG = 2;

/**
 * A specialized version of `baseIsEqualDeep` for arrays with support for
 * partial deep comparisons.
 *
 * @private
 * @param {Array} array The array to compare.
 * @param {Array} other The other array to compare.
 * @param {number} bitmask The bitmask flags. See `baseIsEqual` for more details.
 * @param {Function} customizer The function to customize comparisons.
 * @param {Function} equalFunc The function to determine equivalents of values.
 * @param {Object} stack Tracks traversed `array` and `other` objects.
 * @returns {boolean} Returns `true` if the arrays are equivalent, else `false`.
 */
function equalArrays(array, other, bitmask, customizer, equalFunc, stack) {
  var isPartial = bitmask & COMPARE_PARTIAL_FLAG,
      arrLength = array.length,
      othLength = other.length;

  if (arrLength != othLength && !(isPartial && othLength > arrLength)) {
    return false;
  }
  // Check that cyclic values are equal.
  var arrStacked = stack.get(array);
  var othStacked = stack.get(other);
  if (arrStacked && othStacked) {
    return arrStacked == other && othStacked == array;
  }
  var index = -1,
      result = true,
      seen = (bitmask & COMPARE_UNORDERED_FLAG) ? new SetCache : undefined;

  stack.set(array, other);
  stack.set(other, array);

  // Ignore non-index properties.
  while (++index < arrLength) {
    var arrValue = array[index],
        othValue = other[index];

    if (customizer) {
      var compared = isPartial
        ? customizer(othValue, arrValue, index, other, array, stack)
        : customizer(arrValue, othValue, index, array, other, stack);
    }
    if (compared !== undefined) {
      if (compared) {
        continue;
      }
      result = false;
      break;
    }
    // Recursively compare arrays (susceptible to call stack limits).
    if (seen) {
      if (!arraySome(other, function(othValue, othIndex) {
            if (!cacheHas(seen, othIndex) &&
                (arrValue === othValue || equalFunc(arrValue, othValue, bitmask, customizer, stack))) {
              return seen.push(othIndex);
            }
          })) {
        result = false;
        break;
      }
    } else if (!(
          arrValue === othValue ||
            equalFunc(arrValue, othValue, bitmask, customizer, stack)
        )) {
      result = false;
      break;
    }
  }
  stack['delete'](array);
  stack['delete'](other);
  return result;
}

module.exports = equalArrays;


/***/ }),

/***/ "./node_modules/lodash/_equalByTag.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_equalByTag.js ***!
  \********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var Symbol = __webpack_require__(/*! ./_Symbol */ "./node_modules/lodash/_Symbol.js"),
    Uint8Array = __webpack_require__(/*! ./_Uint8Array */ "./node_modules/lodash/_Uint8Array.js"),
    eq = __webpack_require__(/*! ./eq */ "./node_modules/lodash/eq.js"),
    equalArrays = __webpack_require__(/*! ./_equalArrays */ "./node_modules/lodash/_equalArrays.js"),
    mapToArray = __webpack_require__(/*! ./_mapToArray */ "./node_modules/lodash/_mapToArray.js"),
    setToArray = __webpack_require__(/*! ./_setToArray */ "./node_modules/lodash/_setToArray.js");

/** Used to compose bitmasks for value comparisons. */
var COMPARE_PARTIAL_FLAG = 1,
    COMPARE_UNORDERED_FLAG = 2;

/** `Object#toString` result references. */
var boolTag = '[object Boolean]',
    dateTag = '[object Date]',
    errorTag = '[object Error]',
    mapTag = '[object Map]',
    numberTag = '[object Number]',
    regexpTag = '[object RegExp]',
    setTag = '[object Set]',
    stringTag = '[object String]',
    symbolTag = '[object Symbol]';

var arrayBufferTag = '[object ArrayBuffer]',
    dataViewTag = '[object DataView]';

/** Used to convert symbols to primitives and strings. */
var symbolProto = Symbol ? Symbol.prototype : undefined,
    symbolValueOf = symbolProto ? symbolProto.valueOf : undefined;

/**
 * A specialized version of `baseIsEqualDeep` for comparing objects of
 * the same `toStringTag`.
 *
 * **Note:** This function only supports comparing values with tags of
 * `Boolean`, `Date`, `Error`, `Number`, `RegExp`, or `String`.
 *
 * @private
 * @param {Object} object The object to compare.
 * @param {Object} other The other object to compare.
 * @param {string} tag The `toStringTag` of the objects to compare.
 * @param {number} bitmask The bitmask flags. See `baseIsEqual` for more details.
 * @param {Function} customizer The function to customize comparisons.
 * @param {Function} equalFunc The function to determine equivalents of values.
 * @param {Object} stack Tracks traversed `object` and `other` objects.
 * @returns {boolean} Returns `true` if the objects are equivalent, else `false`.
 */
function equalByTag(object, other, tag, bitmask, customizer, equalFunc, stack) {
  switch (tag) {
    case dataViewTag:
      if ((object.byteLength != other.byteLength) ||
          (object.byteOffset != other.byteOffset)) {
        return false;
      }
      object = object.buffer;
      other = other.buffer;

    case arrayBufferTag:
      if ((object.byteLength != other.byteLength) ||
          !equalFunc(new Uint8Array(object), new Uint8Array(other))) {
        return false;
      }
      return true;

    case boolTag:
    case dateTag:
    case numberTag:
      // Coerce booleans to `1` or `0` and dates to milliseconds.
      // Invalid dates are coerced to `NaN`.
      return eq(+object, +other);

    case errorTag:
      return object.name == other.name && object.message == other.message;

    case regexpTag:
    case stringTag:
      // Coerce regexes to strings and treat strings, primitives and objects,
      // as equal. See http://www.ecma-international.org/ecma-262/7.0/#sec-regexp.prototype.tostring
      // for more details.
      return object == (other + '');

    case mapTag:
      var convert = mapToArray;

    case setTag:
      var isPartial = bitmask & COMPARE_PARTIAL_FLAG;
      convert || (convert = setToArray);

      if (object.size != other.size && !isPartial) {
        return false;
      }
      // Assume cyclic values are equal.
      var stacked = stack.get(object);
      if (stacked) {
        return stacked == other;
      }
      bitmask |= COMPARE_UNORDERED_FLAG;

      // Recursively compare objects (susceptible to call stack limits).
      stack.set(object, other);
      var result = equalArrays(convert(object), convert(other), bitmask, customizer, equalFunc, stack);
      stack['delete'](object);
      return result;

    case symbolTag:
      if (symbolValueOf) {
        return symbolValueOf.call(object) == symbolValueOf.call(other);
      }
  }
  return false;
}

module.exports = equalByTag;


/***/ }),

/***/ "./node_modules/lodash/_equalObjects.js":
/*!**********************************************!*\
  !*** ./node_modules/lodash/_equalObjects.js ***!
  \**********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var getAllKeys = __webpack_require__(/*! ./_getAllKeys */ "./node_modules/lodash/_getAllKeys.js");

/** Used to compose bitmasks for value comparisons. */
var COMPARE_PARTIAL_FLAG = 1;

/** Used for built-in method references. */
var objectProto = Object.prototype;

/** Used to check objects for own properties. */
var hasOwnProperty = objectProto.hasOwnProperty;

/**
 * A specialized version of `baseIsEqualDeep` for objects with support for
 * partial deep comparisons.
 *
 * @private
 * @param {Object} object The object to compare.
 * @param {Object} other The other object to compare.
 * @param {number} bitmask The bitmask flags. See `baseIsEqual` for more details.
 * @param {Function} customizer The function to customize comparisons.
 * @param {Function} equalFunc The function to determine equivalents of values.
 * @param {Object} stack Tracks traversed `object` and `other` objects.
 * @returns {boolean} Returns `true` if the objects are equivalent, else `false`.
 */
function equalObjects(object, other, bitmask, customizer, equalFunc, stack) {
  var isPartial = bitmask & COMPARE_PARTIAL_FLAG,
      objProps = getAllKeys(object),
      objLength = objProps.length,
      othProps = getAllKeys(other),
      othLength = othProps.length;

  if (objLength != othLength && !isPartial) {
    return false;
  }
  var index = objLength;
  while (index--) {
    var key = objProps[index];
    if (!(isPartial ? key in other : hasOwnProperty.call(other, key))) {
      return false;
    }
  }
  // Check that cyclic values are equal.
  var objStacked = stack.get(object);
  var othStacked = stack.get(other);
  if (objStacked && othStacked) {
    return objStacked == other && othStacked == object;
  }
  var result = true;
  stack.set(object, other);
  stack.set(other, object);

  var skipCtor = isPartial;
  while (++index < objLength) {
    key = objProps[index];
    var objValue = object[key],
        othValue = other[key];

    if (customizer) {
      var compared = isPartial
        ? customizer(othValue, objValue, key, other, object, stack)
        : customizer(objValue, othValue, key, object, other, stack);
    }
    // Recursively compare objects (susceptible to call stack limits).
    if (!(compared === undefined
          ? (objValue === othValue || equalFunc(objValue, othValue, bitmask, customizer, stack))
          : compared
        )) {
      result = false;
      break;
    }
    skipCtor || (skipCtor = key == 'constructor');
  }
  if (result && !skipCtor) {
    var objCtor = object.constructor,
        othCtor = other.constructor;

    // Non `Object` object instances with different constructors are not equal.
    if (objCtor != othCtor &&
        ('constructor' in object && 'constructor' in other) &&
        !(typeof objCtor == 'function' && objCtor instanceof objCtor &&
          typeof othCtor == 'function' && othCtor instanceof othCtor)) {
      result = false;
    }
  }
  stack['delete'](object);
  stack['delete'](other);
  return result;
}

module.exports = equalObjects;


/***/ }),

/***/ "./node_modules/lodash/_freeGlobal.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_freeGlobal.js ***!
  \********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

/** Detect free variable `global` from Node.js. */
var freeGlobal = typeof __webpack_require__.g == 'object' && __webpack_require__.g && __webpack_require__.g.Object === Object && __webpack_require__.g;

module.exports = freeGlobal;


/***/ }),

/***/ "./node_modules/lodash/_getAllKeys.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_getAllKeys.js ***!
  \********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseGetAllKeys = __webpack_require__(/*! ./_baseGetAllKeys */ "./node_modules/lodash/_baseGetAllKeys.js"),
    getSymbols = __webpack_require__(/*! ./_getSymbols */ "./node_modules/lodash/_getSymbols.js"),
    keys = __webpack_require__(/*! ./keys */ "./node_modules/lodash/keys.js");

/**
 * Creates an array of own enumerable property names and symbols of `object`.
 *
 * @private
 * @param {Object} object The object to query.
 * @returns {Array} Returns the array of property names and symbols.
 */
function getAllKeys(object) {
  return baseGetAllKeys(object, keys, getSymbols);
}

module.exports = getAllKeys;


/***/ }),

/***/ "./node_modules/lodash/_getAllKeysIn.js":
/*!**********************************************!*\
  !*** ./node_modules/lodash/_getAllKeysIn.js ***!
  \**********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseGetAllKeys = __webpack_require__(/*! ./_baseGetAllKeys */ "./node_modules/lodash/_baseGetAllKeys.js"),
    getSymbolsIn = __webpack_require__(/*! ./_getSymbolsIn */ "./node_modules/lodash/_getSymbolsIn.js"),
    keysIn = __webpack_require__(/*! ./keysIn */ "./node_modules/lodash/keysIn.js");

/**
 * Creates an array of own and inherited enumerable property names and
 * symbols of `object`.
 *
 * @private
 * @param {Object} object The object to query.
 * @returns {Array} Returns the array of property names and symbols.
 */
function getAllKeysIn(object) {
  return baseGetAllKeys(object, keysIn, getSymbolsIn);
}

module.exports = getAllKeysIn;


/***/ }),

/***/ "./node_modules/lodash/_getMapData.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_getMapData.js ***!
  \********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var isKeyable = __webpack_require__(/*! ./_isKeyable */ "./node_modules/lodash/_isKeyable.js");

/**
 * Gets the data for `map`.
 *
 * @private
 * @param {Object} map The map to query.
 * @param {string} key The reference key.
 * @returns {*} Returns the map data.
 */
function getMapData(map, key) {
  var data = map.__data__;
  return isKeyable(key)
    ? data[typeof key == 'string' ? 'string' : 'hash']
    : data.map;
}

module.exports = getMapData;


/***/ }),

/***/ "./node_modules/lodash/_getMatchData.js":
/*!**********************************************!*\
  !*** ./node_modules/lodash/_getMatchData.js ***!
  \**********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var isStrictComparable = __webpack_require__(/*! ./_isStrictComparable */ "./node_modules/lodash/_isStrictComparable.js"),
    keys = __webpack_require__(/*! ./keys */ "./node_modules/lodash/keys.js");

/**
 * Gets the property names, values, and compare flags of `object`.
 *
 * @private
 * @param {Object} object The object to query.
 * @returns {Array} Returns the match data of `object`.
 */
function getMatchData(object) {
  var result = keys(object),
      length = result.length;

  while (length--) {
    var key = result[length],
        value = object[key];

    result[length] = [key, value, isStrictComparable(value)];
  }
  return result;
}

module.exports = getMatchData;


/***/ }),

/***/ "./node_modules/lodash/_getNative.js":
/*!*******************************************!*\
  !*** ./node_modules/lodash/_getNative.js ***!
  \*******************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseIsNative = __webpack_require__(/*! ./_baseIsNative */ "./node_modules/lodash/_baseIsNative.js"),
    getValue = __webpack_require__(/*! ./_getValue */ "./node_modules/lodash/_getValue.js");

/**
 * Gets the native function at `key` of `object`.
 *
 * @private
 * @param {Object} object The object to query.
 * @param {string} key The key of the method to get.
 * @returns {*} Returns the function if it's native, else `undefined`.
 */
function getNative(object, key) {
  var value = getValue(object, key);
  return baseIsNative(value) ? value : undefined;
}

module.exports = getNative;


/***/ }),

/***/ "./node_modules/lodash/_getPrototype.js":
/*!**********************************************!*\
  !*** ./node_modules/lodash/_getPrototype.js ***!
  \**********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var overArg = __webpack_require__(/*! ./_overArg */ "./node_modules/lodash/_overArg.js");

/** Built-in value references. */
var getPrototype = overArg(Object.getPrototypeOf, Object);

module.exports = getPrototype;


/***/ }),

/***/ "./node_modules/lodash/_getRawTag.js":
/*!*******************************************!*\
  !*** ./node_modules/lodash/_getRawTag.js ***!
  \*******************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var Symbol = __webpack_require__(/*! ./_Symbol */ "./node_modules/lodash/_Symbol.js");

/** Used for built-in method references. */
var objectProto = Object.prototype;

/** Used to check objects for own properties. */
var hasOwnProperty = objectProto.hasOwnProperty;

/**
 * Used to resolve the
 * [`toStringTag`](http://ecma-international.org/ecma-262/7.0/#sec-object.prototype.tostring)
 * of values.
 */
var nativeObjectToString = objectProto.toString;

/** Built-in value references. */
var symToStringTag = Symbol ? Symbol.toStringTag : undefined;

/**
 * A specialized version of `baseGetTag` which ignores `Symbol.toStringTag` values.
 *
 * @private
 * @param {*} value The value to query.
 * @returns {string} Returns the raw `toStringTag`.
 */
function getRawTag(value) {
  var isOwn = hasOwnProperty.call(value, symToStringTag),
      tag = value[symToStringTag];

  try {
    value[symToStringTag] = undefined;
    var unmasked = true;
  } catch (e) {}

  var result = nativeObjectToString.call(value);
  if (unmasked) {
    if (isOwn) {
      value[symToStringTag] = tag;
    } else {
      delete value[symToStringTag];
    }
  }
  return result;
}

module.exports = getRawTag;


/***/ }),

/***/ "./node_modules/lodash/_getSymbols.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_getSymbols.js ***!
  \********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var arrayFilter = __webpack_require__(/*! ./_arrayFilter */ "./node_modules/lodash/_arrayFilter.js"),
    stubArray = __webpack_require__(/*! ./stubArray */ "./node_modules/lodash/stubArray.js");

/** Used for built-in method references. */
var objectProto = Object.prototype;

/** Built-in value references. */
var propertyIsEnumerable = objectProto.propertyIsEnumerable;

/* Built-in method references for those with the same name as other `lodash` methods. */
var nativeGetSymbols = Object.getOwnPropertySymbols;

/**
 * Creates an array of the own enumerable symbols of `object`.
 *
 * @private
 * @param {Object} object The object to query.
 * @returns {Array} Returns the array of symbols.
 */
var getSymbols = !nativeGetSymbols ? stubArray : function(object) {
  if (object == null) {
    return [];
  }
  object = Object(object);
  return arrayFilter(nativeGetSymbols(object), function(symbol) {
    return propertyIsEnumerable.call(object, symbol);
  });
};

module.exports = getSymbols;


/***/ }),

/***/ "./node_modules/lodash/_getSymbolsIn.js":
/*!**********************************************!*\
  !*** ./node_modules/lodash/_getSymbolsIn.js ***!
  \**********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var arrayPush = __webpack_require__(/*! ./_arrayPush */ "./node_modules/lodash/_arrayPush.js"),
    getPrototype = __webpack_require__(/*! ./_getPrototype */ "./node_modules/lodash/_getPrototype.js"),
    getSymbols = __webpack_require__(/*! ./_getSymbols */ "./node_modules/lodash/_getSymbols.js"),
    stubArray = __webpack_require__(/*! ./stubArray */ "./node_modules/lodash/stubArray.js");

/* Built-in method references for those with the same name as other `lodash` methods. */
var nativeGetSymbols = Object.getOwnPropertySymbols;

/**
 * Creates an array of the own and inherited enumerable symbols of `object`.
 *
 * @private
 * @param {Object} object The object to query.
 * @returns {Array} Returns the array of symbols.
 */
var getSymbolsIn = !nativeGetSymbols ? stubArray : function(object) {
  var result = [];
  while (object) {
    arrayPush(result, getSymbols(object));
    object = getPrototype(object);
  }
  return result;
};

module.exports = getSymbolsIn;


/***/ }),

/***/ "./node_modules/lodash/_getTag.js":
/*!****************************************!*\
  !*** ./node_modules/lodash/_getTag.js ***!
  \****************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var DataView = __webpack_require__(/*! ./_DataView */ "./node_modules/lodash/_DataView.js"),
    Map = __webpack_require__(/*! ./_Map */ "./node_modules/lodash/_Map.js"),
    Promise = __webpack_require__(/*! ./_Promise */ "./node_modules/lodash/_Promise.js"),
    Set = __webpack_require__(/*! ./_Set */ "./node_modules/lodash/_Set.js"),
    WeakMap = __webpack_require__(/*! ./_WeakMap */ "./node_modules/lodash/_WeakMap.js"),
    baseGetTag = __webpack_require__(/*! ./_baseGetTag */ "./node_modules/lodash/_baseGetTag.js"),
    toSource = __webpack_require__(/*! ./_toSource */ "./node_modules/lodash/_toSource.js");

/** `Object#toString` result references. */
var mapTag = '[object Map]',
    objectTag = '[object Object]',
    promiseTag = '[object Promise]',
    setTag = '[object Set]',
    weakMapTag = '[object WeakMap]';

var dataViewTag = '[object DataView]';

/** Used to detect maps, sets, and weakmaps. */
var dataViewCtorString = toSource(DataView),
    mapCtorString = toSource(Map),
    promiseCtorString = toSource(Promise),
    setCtorString = toSource(Set),
    weakMapCtorString = toSource(WeakMap);

/**
 * Gets the `toStringTag` of `value`.
 *
 * @private
 * @param {*} value The value to query.
 * @returns {string} Returns the `toStringTag`.
 */
var getTag = baseGetTag;

// Fallback for data views, maps, sets, and weak maps in IE 11 and promises in Node.js < 6.
if ((DataView && getTag(new DataView(new ArrayBuffer(1))) != dataViewTag) ||
    (Map && getTag(new Map) != mapTag) ||
    (Promise && getTag(Promise.resolve()) != promiseTag) ||
    (Set && getTag(new Set) != setTag) ||
    (WeakMap && getTag(new WeakMap) != weakMapTag)) {
  getTag = function(value) {
    var result = baseGetTag(value),
        Ctor = result == objectTag ? value.constructor : undefined,
        ctorString = Ctor ? toSource(Ctor) : '';

    if (ctorString) {
      switch (ctorString) {
        case dataViewCtorString: return dataViewTag;
        case mapCtorString: return mapTag;
        case promiseCtorString: return promiseTag;
        case setCtorString: return setTag;
        case weakMapCtorString: return weakMapTag;
      }
    }
    return result;
  };
}

module.exports = getTag;


/***/ }),

/***/ "./node_modules/lodash/_getValue.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/_getValue.js ***!
  \******************************************/
/***/ (function(module) {

/**
 * Gets the value at `key` of `object`.
 *
 * @private
 * @param {Object} [object] The object to query.
 * @param {string} key The key of the property to get.
 * @returns {*} Returns the property value.
 */
function getValue(object, key) {
  return object == null ? undefined : object[key];
}

module.exports = getValue;


/***/ }),

/***/ "./node_modules/lodash/_hasUnicode.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_hasUnicode.js ***!
  \********************************************/
/***/ (function(module) {

/** Used to compose unicode character classes. */
var rsAstralRange = '\\ud800-\\udfff',
    rsComboMarksRange = '\\u0300-\\u036f',
    reComboHalfMarksRange = '\\ufe20-\\ufe2f',
    rsComboSymbolsRange = '\\u20d0-\\u20ff',
    rsComboRange = rsComboMarksRange + reComboHalfMarksRange + rsComboSymbolsRange,
    rsVarRange = '\\ufe0e\\ufe0f';

/** Used to compose unicode capture groups. */
var rsZWJ = '\\u200d';

/** Used to detect strings with [zero-width joiners or code points from the astral planes](http://eev.ee/blog/2015/09/12/dark-corners-of-unicode/). */
var reHasUnicode = RegExp('[' + rsZWJ + rsAstralRange  + rsComboRange + rsVarRange + ']');

/**
 * Checks if `string` contains Unicode symbols.
 *
 * @private
 * @param {string} string The string to inspect.
 * @returns {boolean} Returns `true` if a symbol is found, else `false`.
 */
function hasUnicode(string) {
  return reHasUnicode.test(string);
}

module.exports = hasUnicode;


/***/ }),

/***/ "./node_modules/lodash/_hashClear.js":
/*!*******************************************!*\
  !*** ./node_modules/lodash/_hashClear.js ***!
  \*******************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var nativeCreate = __webpack_require__(/*! ./_nativeCreate */ "./node_modules/lodash/_nativeCreate.js");

/**
 * Removes all key-value entries from the hash.
 *
 * @private
 * @name clear
 * @memberOf Hash
 */
function hashClear() {
  this.__data__ = nativeCreate ? nativeCreate(null) : {};
  this.size = 0;
}

module.exports = hashClear;


/***/ }),

/***/ "./node_modules/lodash/_hashDelete.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_hashDelete.js ***!
  \********************************************/
/***/ (function(module) {

/**
 * Removes `key` and its value from the hash.
 *
 * @private
 * @name delete
 * @memberOf Hash
 * @param {Object} hash The hash to modify.
 * @param {string} key The key of the value to remove.
 * @returns {boolean} Returns `true` if the entry was removed, else `false`.
 */
function hashDelete(key) {
  var result = this.has(key) && delete this.__data__[key];
  this.size -= result ? 1 : 0;
  return result;
}

module.exports = hashDelete;


/***/ }),

/***/ "./node_modules/lodash/_hashGet.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/_hashGet.js ***!
  \*****************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var nativeCreate = __webpack_require__(/*! ./_nativeCreate */ "./node_modules/lodash/_nativeCreate.js");

/** Used to stand-in for `undefined` hash values. */
var HASH_UNDEFINED = '__lodash_hash_undefined__';

/** Used for built-in method references. */
var objectProto = Object.prototype;

/** Used to check objects for own properties. */
var hasOwnProperty = objectProto.hasOwnProperty;

/**
 * Gets the hash value for `key`.
 *
 * @private
 * @name get
 * @memberOf Hash
 * @param {string} key The key of the value to get.
 * @returns {*} Returns the entry value.
 */
function hashGet(key) {
  var data = this.__data__;
  if (nativeCreate) {
    var result = data[key];
    return result === HASH_UNDEFINED ? undefined : result;
  }
  return hasOwnProperty.call(data, key) ? data[key] : undefined;
}

module.exports = hashGet;


/***/ }),

/***/ "./node_modules/lodash/_hashHas.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/_hashHas.js ***!
  \*****************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var nativeCreate = __webpack_require__(/*! ./_nativeCreate */ "./node_modules/lodash/_nativeCreate.js");

/** Used for built-in method references. */
var objectProto = Object.prototype;

/** Used to check objects for own properties. */
var hasOwnProperty = objectProto.hasOwnProperty;

/**
 * Checks if a hash value for `key` exists.
 *
 * @private
 * @name has
 * @memberOf Hash
 * @param {string} key The key of the entry to check.
 * @returns {boolean} Returns `true` if an entry for `key` exists, else `false`.
 */
function hashHas(key) {
  var data = this.__data__;
  return nativeCreate ? (data[key] !== undefined) : hasOwnProperty.call(data, key);
}

module.exports = hashHas;


/***/ }),

/***/ "./node_modules/lodash/_hashSet.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/_hashSet.js ***!
  \*****************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var nativeCreate = __webpack_require__(/*! ./_nativeCreate */ "./node_modules/lodash/_nativeCreate.js");

/** Used to stand-in for `undefined` hash values. */
var HASH_UNDEFINED = '__lodash_hash_undefined__';

/**
 * Sets the hash `key` to `value`.
 *
 * @private
 * @name set
 * @memberOf Hash
 * @param {string} key The key of the value to set.
 * @param {*} value The value to set.
 * @returns {Object} Returns the hash instance.
 */
function hashSet(key, value) {
  var data = this.__data__;
  this.size += this.has(key) ? 0 : 1;
  data[key] = (nativeCreate && value === undefined) ? HASH_UNDEFINED : value;
  return this;
}

module.exports = hashSet;


/***/ }),

/***/ "./node_modules/lodash/_initCloneArray.js":
/*!************************************************!*\
  !*** ./node_modules/lodash/_initCloneArray.js ***!
  \************************************************/
/***/ (function(module) {

/** Used for built-in method references. */
var objectProto = Object.prototype;

/** Used to check objects for own properties. */
var hasOwnProperty = objectProto.hasOwnProperty;

/**
 * Initializes an array clone.
 *
 * @private
 * @param {Array} array The array to clone.
 * @returns {Array} Returns the initialized clone.
 */
function initCloneArray(array) {
  var length = array.length,
      result = new array.constructor(length);

  // Add properties assigned by `RegExp#exec`.
  if (length && typeof array[0] == 'string' && hasOwnProperty.call(array, 'index')) {
    result.index = array.index;
    result.input = array.input;
  }
  return result;
}

module.exports = initCloneArray;


/***/ }),

/***/ "./node_modules/lodash/_initCloneByTag.js":
/*!************************************************!*\
  !*** ./node_modules/lodash/_initCloneByTag.js ***!
  \************************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var cloneArrayBuffer = __webpack_require__(/*! ./_cloneArrayBuffer */ "./node_modules/lodash/_cloneArrayBuffer.js"),
    cloneDataView = __webpack_require__(/*! ./_cloneDataView */ "./node_modules/lodash/_cloneDataView.js"),
    cloneRegExp = __webpack_require__(/*! ./_cloneRegExp */ "./node_modules/lodash/_cloneRegExp.js"),
    cloneSymbol = __webpack_require__(/*! ./_cloneSymbol */ "./node_modules/lodash/_cloneSymbol.js"),
    cloneTypedArray = __webpack_require__(/*! ./_cloneTypedArray */ "./node_modules/lodash/_cloneTypedArray.js");

/** `Object#toString` result references. */
var boolTag = '[object Boolean]',
    dateTag = '[object Date]',
    mapTag = '[object Map]',
    numberTag = '[object Number]',
    regexpTag = '[object RegExp]',
    setTag = '[object Set]',
    stringTag = '[object String]',
    symbolTag = '[object Symbol]';

var arrayBufferTag = '[object ArrayBuffer]',
    dataViewTag = '[object DataView]',
    float32Tag = '[object Float32Array]',
    float64Tag = '[object Float64Array]',
    int8Tag = '[object Int8Array]',
    int16Tag = '[object Int16Array]',
    int32Tag = '[object Int32Array]',
    uint8Tag = '[object Uint8Array]',
    uint8ClampedTag = '[object Uint8ClampedArray]',
    uint16Tag = '[object Uint16Array]',
    uint32Tag = '[object Uint32Array]';

/**
 * Initializes an object clone based on its `toStringTag`.
 *
 * **Note:** This function only supports cloning values with tags of
 * `Boolean`, `Date`, `Error`, `Map`, `Number`, `RegExp`, `Set`, or `String`.
 *
 * @private
 * @param {Object} object The object to clone.
 * @param {string} tag The `toStringTag` of the object to clone.
 * @param {boolean} [isDeep] Specify a deep clone.
 * @returns {Object} Returns the initialized clone.
 */
function initCloneByTag(object, tag, isDeep) {
  var Ctor = object.constructor;
  switch (tag) {
    case arrayBufferTag:
      return cloneArrayBuffer(object);

    case boolTag:
    case dateTag:
      return new Ctor(+object);

    case dataViewTag:
      return cloneDataView(object, isDeep);

    case float32Tag: case float64Tag:
    case int8Tag: case int16Tag: case int32Tag:
    case uint8Tag: case uint8ClampedTag: case uint16Tag: case uint32Tag:
      return cloneTypedArray(object, isDeep);

    case mapTag:
      return new Ctor;

    case numberTag:
    case stringTag:
      return new Ctor(object);

    case regexpTag:
      return cloneRegExp(object);

    case setTag:
      return new Ctor;

    case symbolTag:
      return cloneSymbol(object);
  }
}

module.exports = initCloneByTag;


/***/ }),

/***/ "./node_modules/lodash/_initCloneObject.js":
/*!*************************************************!*\
  !*** ./node_modules/lodash/_initCloneObject.js ***!
  \*************************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseCreate = __webpack_require__(/*! ./_baseCreate */ "./node_modules/lodash/_baseCreate.js"),
    getPrototype = __webpack_require__(/*! ./_getPrototype */ "./node_modules/lodash/_getPrototype.js"),
    isPrototype = __webpack_require__(/*! ./_isPrototype */ "./node_modules/lodash/_isPrototype.js");

/**
 * Initializes an object clone.
 *
 * @private
 * @param {Object} object The object to clone.
 * @returns {Object} Returns the initialized clone.
 */
function initCloneObject(object) {
  return (typeof object.constructor == 'function' && !isPrototype(object))
    ? baseCreate(getPrototype(object))
    : {};
}

module.exports = initCloneObject;


/***/ }),

/***/ "./node_modules/lodash/_isIndex.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/_isIndex.js ***!
  \*****************************************/
/***/ (function(module) {

/** Used as references for various `Number` constants. */
var MAX_SAFE_INTEGER = 9007199254740991;

/** Used to detect unsigned integer values. */
var reIsUint = /^(?:0|[1-9]\d*)$/;

/**
 * Checks if `value` is a valid array-like index.
 *
 * @private
 * @param {*} value The value to check.
 * @param {number} [length=MAX_SAFE_INTEGER] The upper bounds of a valid index.
 * @returns {boolean} Returns `true` if `value` is a valid index, else `false`.
 */
function isIndex(value, length) {
  var type = typeof value;
  length = length == null ? MAX_SAFE_INTEGER : length;

  return !!length &&
    (type == 'number' ||
      (type != 'symbol' && reIsUint.test(value))) &&
        (value > -1 && value % 1 == 0 && value < length);
}

module.exports = isIndex;


/***/ }),

/***/ "./node_modules/lodash/_isKeyable.js":
/*!*******************************************!*\
  !*** ./node_modules/lodash/_isKeyable.js ***!
  \*******************************************/
/***/ (function(module) {

/**
 * Checks if `value` is suitable for use as unique object key.
 *
 * @private
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is suitable, else `false`.
 */
function isKeyable(value) {
  var type = typeof value;
  return (type == 'string' || type == 'number' || type == 'symbol' || type == 'boolean')
    ? (value !== '__proto__')
    : (value === null);
}

module.exports = isKeyable;


/***/ }),

/***/ "./node_modules/lodash/_isMaskable.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_isMaskable.js ***!
  \********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var coreJsData = __webpack_require__(/*! ./_coreJsData */ "./node_modules/lodash/_coreJsData.js"),
    isFunction = __webpack_require__(/*! ./isFunction */ "./node_modules/lodash/isFunction.js"),
    stubFalse = __webpack_require__(/*! ./stubFalse */ "./node_modules/lodash/stubFalse.js");

/**
 * Checks if `func` is capable of being masked.
 *
 * @private
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `func` is maskable, else `false`.
 */
var isMaskable = coreJsData ? isFunction : stubFalse;

module.exports = isMaskable;


/***/ }),

/***/ "./node_modules/lodash/_isMasked.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/_isMasked.js ***!
  \******************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var coreJsData = __webpack_require__(/*! ./_coreJsData */ "./node_modules/lodash/_coreJsData.js");

/** Used to detect methods masquerading as native. */
var maskSrcKey = (function() {
  var uid = /[^.]+$/.exec(coreJsData && coreJsData.keys && coreJsData.keys.IE_PROTO || '');
  return uid ? ('Symbol(src)_1.' + uid) : '';
}());

/**
 * Checks if `func` has its source masked.
 *
 * @private
 * @param {Function} func The function to check.
 * @returns {boolean} Returns `true` if `func` is masked, else `false`.
 */
function isMasked(func) {
  return !!maskSrcKey && (maskSrcKey in func);
}

module.exports = isMasked;


/***/ }),

/***/ "./node_modules/lodash/_isPrototype.js":
/*!*********************************************!*\
  !*** ./node_modules/lodash/_isPrototype.js ***!
  \*********************************************/
/***/ (function(module) {

/** Used for built-in method references. */
var objectProto = Object.prototype;

/**
 * Checks if `value` is likely a prototype object.
 *
 * @private
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a prototype, else `false`.
 */
function isPrototype(value) {
  var Ctor = value && value.constructor,
      proto = (typeof Ctor == 'function' && Ctor.prototype) || objectProto;

  return value === proto;
}

module.exports = isPrototype;


/***/ }),

/***/ "./node_modules/lodash/_isStrictComparable.js":
/*!****************************************************!*\
  !*** ./node_modules/lodash/_isStrictComparable.js ***!
  \****************************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var isObject = __webpack_require__(/*! ./isObject */ "./node_modules/lodash/isObject.js");

/**
 * Checks if `value` is suitable for strict equality comparisons, i.e. `===`.
 *
 * @private
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` if suitable for strict
 *  equality comparisons, else `false`.
 */
function isStrictComparable(value) {
  return value === value && !isObject(value);
}

module.exports = isStrictComparable;


/***/ }),

/***/ "./node_modules/lodash/_iteratorToArray.js":
/*!*************************************************!*\
  !*** ./node_modules/lodash/_iteratorToArray.js ***!
  \*************************************************/
/***/ (function(module) {

/**
 * Converts `iterator` to an array.
 *
 * @private
 * @param {Object} iterator The iterator to convert.
 * @returns {Array} Returns the converted array.
 */
function iteratorToArray(iterator) {
  var data,
      result = [];

  while (!(data = iterator.next()).done) {
    result.push(data.value);
  }
  return result;
}

module.exports = iteratorToArray;


/***/ }),

/***/ "./node_modules/lodash/_listCacheClear.js":
/*!************************************************!*\
  !*** ./node_modules/lodash/_listCacheClear.js ***!
  \************************************************/
/***/ (function(module) {

/**
 * Removes all key-value entries from the list cache.
 *
 * @private
 * @name clear
 * @memberOf ListCache
 */
function listCacheClear() {
  this.__data__ = [];
  this.size = 0;
}

module.exports = listCacheClear;


/***/ }),

/***/ "./node_modules/lodash/_listCacheDelete.js":
/*!*************************************************!*\
  !*** ./node_modules/lodash/_listCacheDelete.js ***!
  \*************************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var assocIndexOf = __webpack_require__(/*! ./_assocIndexOf */ "./node_modules/lodash/_assocIndexOf.js");

/** Used for built-in method references. */
var arrayProto = Array.prototype;

/** Built-in value references. */
var splice = arrayProto.splice;

/**
 * Removes `key` and its value from the list cache.
 *
 * @private
 * @name delete
 * @memberOf ListCache
 * @param {string} key The key of the value to remove.
 * @returns {boolean} Returns `true` if the entry was removed, else `false`.
 */
function listCacheDelete(key) {
  var data = this.__data__,
      index = assocIndexOf(data, key);

  if (index < 0) {
    return false;
  }
  var lastIndex = data.length - 1;
  if (index == lastIndex) {
    data.pop();
  } else {
    splice.call(data, index, 1);
  }
  --this.size;
  return true;
}

module.exports = listCacheDelete;


/***/ }),

/***/ "./node_modules/lodash/_listCacheGet.js":
/*!**********************************************!*\
  !*** ./node_modules/lodash/_listCacheGet.js ***!
  \**********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var assocIndexOf = __webpack_require__(/*! ./_assocIndexOf */ "./node_modules/lodash/_assocIndexOf.js");

/**
 * Gets the list cache value for `key`.
 *
 * @private
 * @name get
 * @memberOf ListCache
 * @param {string} key The key of the value to get.
 * @returns {*} Returns the entry value.
 */
function listCacheGet(key) {
  var data = this.__data__,
      index = assocIndexOf(data, key);

  return index < 0 ? undefined : data[index][1];
}

module.exports = listCacheGet;


/***/ }),

/***/ "./node_modules/lodash/_listCacheHas.js":
/*!**********************************************!*\
  !*** ./node_modules/lodash/_listCacheHas.js ***!
  \**********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var assocIndexOf = __webpack_require__(/*! ./_assocIndexOf */ "./node_modules/lodash/_assocIndexOf.js");

/**
 * Checks if a list cache value for `key` exists.
 *
 * @private
 * @name has
 * @memberOf ListCache
 * @param {string} key The key of the entry to check.
 * @returns {boolean} Returns `true` if an entry for `key` exists, else `false`.
 */
function listCacheHas(key) {
  return assocIndexOf(this.__data__, key) > -1;
}

module.exports = listCacheHas;


/***/ }),

/***/ "./node_modules/lodash/_listCacheSet.js":
/*!**********************************************!*\
  !*** ./node_modules/lodash/_listCacheSet.js ***!
  \**********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var assocIndexOf = __webpack_require__(/*! ./_assocIndexOf */ "./node_modules/lodash/_assocIndexOf.js");

/**
 * Sets the list cache `key` to `value`.
 *
 * @private
 * @name set
 * @memberOf ListCache
 * @param {string} key The key of the value to set.
 * @param {*} value The value to set.
 * @returns {Object} Returns the list cache instance.
 */
function listCacheSet(key, value) {
  var data = this.__data__,
      index = assocIndexOf(data, key);

  if (index < 0) {
    ++this.size;
    data.push([key, value]);
  } else {
    data[index][1] = value;
  }
  return this;
}

module.exports = listCacheSet;


/***/ }),

/***/ "./node_modules/lodash/_mapCacheClear.js":
/*!***********************************************!*\
  !*** ./node_modules/lodash/_mapCacheClear.js ***!
  \***********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var Hash = __webpack_require__(/*! ./_Hash */ "./node_modules/lodash/_Hash.js"),
    ListCache = __webpack_require__(/*! ./_ListCache */ "./node_modules/lodash/_ListCache.js"),
    Map = __webpack_require__(/*! ./_Map */ "./node_modules/lodash/_Map.js");

/**
 * Removes all key-value entries from the map.
 *
 * @private
 * @name clear
 * @memberOf MapCache
 */
function mapCacheClear() {
  this.size = 0;
  this.__data__ = {
    'hash': new Hash,
    'map': new (Map || ListCache),
    'string': new Hash
  };
}

module.exports = mapCacheClear;


/***/ }),

/***/ "./node_modules/lodash/_mapCacheDelete.js":
/*!************************************************!*\
  !*** ./node_modules/lodash/_mapCacheDelete.js ***!
  \************************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var getMapData = __webpack_require__(/*! ./_getMapData */ "./node_modules/lodash/_getMapData.js");

/**
 * Removes `key` and its value from the map.
 *
 * @private
 * @name delete
 * @memberOf MapCache
 * @param {string} key The key of the value to remove.
 * @returns {boolean} Returns `true` if the entry was removed, else `false`.
 */
function mapCacheDelete(key) {
  var result = getMapData(this, key)['delete'](key);
  this.size -= result ? 1 : 0;
  return result;
}

module.exports = mapCacheDelete;


/***/ }),

/***/ "./node_modules/lodash/_mapCacheGet.js":
/*!*********************************************!*\
  !*** ./node_modules/lodash/_mapCacheGet.js ***!
  \*********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var getMapData = __webpack_require__(/*! ./_getMapData */ "./node_modules/lodash/_getMapData.js");

/**
 * Gets the map value for `key`.
 *
 * @private
 * @name get
 * @memberOf MapCache
 * @param {string} key The key of the value to get.
 * @returns {*} Returns the entry value.
 */
function mapCacheGet(key) {
  return getMapData(this, key).get(key);
}

module.exports = mapCacheGet;


/***/ }),

/***/ "./node_modules/lodash/_mapCacheHas.js":
/*!*********************************************!*\
  !*** ./node_modules/lodash/_mapCacheHas.js ***!
  \*********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var getMapData = __webpack_require__(/*! ./_getMapData */ "./node_modules/lodash/_getMapData.js");

/**
 * Checks if a map value for `key` exists.
 *
 * @private
 * @name has
 * @memberOf MapCache
 * @param {string} key The key of the entry to check.
 * @returns {boolean} Returns `true` if an entry for `key` exists, else `false`.
 */
function mapCacheHas(key) {
  return getMapData(this, key).has(key);
}

module.exports = mapCacheHas;


/***/ }),

/***/ "./node_modules/lodash/_mapCacheSet.js":
/*!*********************************************!*\
  !*** ./node_modules/lodash/_mapCacheSet.js ***!
  \*********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var getMapData = __webpack_require__(/*! ./_getMapData */ "./node_modules/lodash/_getMapData.js");

/**
 * Sets the map `key` to `value`.
 *
 * @private
 * @name set
 * @memberOf MapCache
 * @param {string} key The key of the value to set.
 * @param {*} value The value to set.
 * @returns {Object} Returns the map cache instance.
 */
function mapCacheSet(key, value) {
  var data = getMapData(this, key),
      size = data.size;

  data.set(key, value);
  this.size += data.size == size ? 0 : 1;
  return this;
}

module.exports = mapCacheSet;


/***/ }),

/***/ "./node_modules/lodash/_mapToArray.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_mapToArray.js ***!
  \********************************************/
/***/ (function(module) {

/**
 * Converts `map` to its key-value pairs.
 *
 * @private
 * @param {Object} map The map to convert.
 * @returns {Array} Returns the key-value pairs.
 */
function mapToArray(map) {
  var index = -1,
      result = Array(map.size);

  map.forEach(function(value, key) {
    result[++index] = [key, value];
  });
  return result;
}

module.exports = mapToArray;


/***/ }),

/***/ "./node_modules/lodash/_nativeCreate.js":
/*!**********************************************!*\
  !*** ./node_modules/lodash/_nativeCreate.js ***!
  \**********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var getNative = __webpack_require__(/*! ./_getNative */ "./node_modules/lodash/_getNative.js");

/* Built-in method references that are verified to be native. */
var nativeCreate = getNative(Object, 'create');

module.exports = nativeCreate;


/***/ }),

/***/ "./node_modules/lodash/_nativeKeys.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_nativeKeys.js ***!
  \********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var overArg = __webpack_require__(/*! ./_overArg */ "./node_modules/lodash/_overArg.js");

/* Built-in method references for those with the same name as other `lodash` methods. */
var nativeKeys = overArg(Object.keys, Object);

module.exports = nativeKeys;


/***/ }),

/***/ "./node_modules/lodash/_nativeKeysIn.js":
/*!**********************************************!*\
  !*** ./node_modules/lodash/_nativeKeysIn.js ***!
  \**********************************************/
/***/ (function(module) {

/**
 * This function is like
 * [`Object.keys`](http://ecma-international.org/ecma-262/7.0/#sec-object.keys)
 * except that it includes inherited enumerable properties.
 *
 * @private
 * @param {Object} object The object to query.
 * @returns {Array} Returns the array of property names.
 */
function nativeKeysIn(object) {
  var result = [];
  if (object != null) {
    for (var key in Object(object)) {
      result.push(key);
    }
  }
  return result;
}

module.exports = nativeKeysIn;


/***/ }),

/***/ "./node_modules/lodash/_nodeUtil.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/_nodeUtil.js ***!
  \******************************************/
/***/ (function(module, exports, __webpack_require__) {

/* module decorator */ module = __webpack_require__.nmd(module);
var freeGlobal = __webpack_require__(/*! ./_freeGlobal */ "./node_modules/lodash/_freeGlobal.js");

/** Detect free variable `exports`. */
var freeExports =  true && exports && !exports.nodeType && exports;

/** Detect free variable `module`. */
var freeModule = freeExports && "object" == 'object' && module && !module.nodeType && module;

/** Detect the popular CommonJS extension `module.exports`. */
var moduleExports = freeModule && freeModule.exports === freeExports;

/** Detect free variable `process` from Node.js. */
var freeProcess = moduleExports && freeGlobal.process;

/** Used to access faster Node.js helpers. */
var nodeUtil = (function() {
  try {
    // Use `util.types` for Node.js 10+.
    var types = freeModule && freeModule.require && freeModule.require('util').types;

    if (types) {
      return types;
    }

    // Legacy `process.binding('util')` for Node.js < 10.
    return freeProcess && freeProcess.binding && freeProcess.binding('util');
  } catch (e) {}
}());

module.exports = nodeUtil;


/***/ }),

/***/ "./node_modules/lodash/_objectToString.js":
/*!************************************************!*\
  !*** ./node_modules/lodash/_objectToString.js ***!
  \************************************************/
/***/ (function(module) {

/** Used for built-in method references. */
var objectProto = Object.prototype;

/**
 * Used to resolve the
 * [`toStringTag`](http://ecma-international.org/ecma-262/7.0/#sec-object.prototype.tostring)
 * of values.
 */
var nativeObjectToString = objectProto.toString;

/**
 * Converts `value` to a string using `Object.prototype.toString`.
 *
 * @private
 * @param {*} value The value to convert.
 * @returns {string} Returns the converted string.
 */
function objectToString(value) {
  return nativeObjectToString.call(value);
}

module.exports = objectToString;


/***/ }),

/***/ "./node_modules/lodash/_overArg.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/_overArg.js ***!
  \*****************************************/
/***/ (function(module) {

/**
 * Creates a unary function that invokes `func` with its argument transformed.
 *
 * @private
 * @param {Function} func The function to wrap.
 * @param {Function} transform The argument transform.
 * @returns {Function} Returns the new function.
 */
function overArg(func, transform) {
  return function(arg) {
    return func(transform(arg));
  };
}

module.exports = overArg;


/***/ }),

/***/ "./node_modules/lodash/_root.js":
/*!**************************************!*\
  !*** ./node_modules/lodash/_root.js ***!
  \**************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var freeGlobal = __webpack_require__(/*! ./_freeGlobal */ "./node_modules/lodash/_freeGlobal.js");

/** Detect free variable `self`. */
var freeSelf = typeof self == 'object' && self && self.Object === Object && self;

/** Used as a reference to the global object. */
var root = freeGlobal || freeSelf || Function('return this')();

module.exports = root;


/***/ }),

/***/ "./node_modules/lodash/_setCacheAdd.js":
/*!*********************************************!*\
  !*** ./node_modules/lodash/_setCacheAdd.js ***!
  \*********************************************/
/***/ (function(module) {

/** Used to stand-in for `undefined` hash values. */
var HASH_UNDEFINED = '__lodash_hash_undefined__';

/**
 * Adds `value` to the array cache.
 *
 * @private
 * @name add
 * @memberOf SetCache
 * @alias push
 * @param {*} value The value to cache.
 * @returns {Object} Returns the cache instance.
 */
function setCacheAdd(value) {
  this.__data__.set(value, HASH_UNDEFINED);
  return this;
}

module.exports = setCacheAdd;


/***/ }),

/***/ "./node_modules/lodash/_setCacheHas.js":
/*!*********************************************!*\
  !*** ./node_modules/lodash/_setCacheHas.js ***!
  \*********************************************/
/***/ (function(module) {

/**
 * Checks if `value` is in the array cache.
 *
 * @private
 * @name has
 * @memberOf SetCache
 * @param {*} value The value to search for.
 * @returns {number} Returns `true` if `value` is found, else `false`.
 */
function setCacheHas(value) {
  return this.__data__.has(value);
}

module.exports = setCacheHas;


/***/ }),

/***/ "./node_modules/lodash/_setToArray.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_setToArray.js ***!
  \********************************************/
/***/ (function(module) {

/**
 * Converts `set` to an array of its values.
 *
 * @private
 * @param {Object} set The set to convert.
 * @returns {Array} Returns the values.
 */
function setToArray(set) {
  var index = -1,
      result = Array(set.size);

  set.forEach(function(value) {
    result[++index] = value;
  });
  return result;
}

module.exports = setToArray;


/***/ }),

/***/ "./node_modules/lodash/_stackClear.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_stackClear.js ***!
  \********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var ListCache = __webpack_require__(/*! ./_ListCache */ "./node_modules/lodash/_ListCache.js");

/**
 * Removes all key-value entries from the stack.
 *
 * @private
 * @name clear
 * @memberOf Stack
 */
function stackClear() {
  this.__data__ = new ListCache;
  this.size = 0;
}

module.exports = stackClear;


/***/ }),

/***/ "./node_modules/lodash/_stackDelete.js":
/*!*********************************************!*\
  !*** ./node_modules/lodash/_stackDelete.js ***!
  \*********************************************/
/***/ (function(module) {

/**
 * Removes `key` and its value from the stack.
 *
 * @private
 * @name delete
 * @memberOf Stack
 * @param {string} key The key of the value to remove.
 * @returns {boolean} Returns `true` if the entry was removed, else `false`.
 */
function stackDelete(key) {
  var data = this.__data__,
      result = data['delete'](key);

  this.size = data.size;
  return result;
}

module.exports = stackDelete;


/***/ }),

/***/ "./node_modules/lodash/_stackGet.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/_stackGet.js ***!
  \******************************************/
/***/ (function(module) {

/**
 * Gets the stack value for `key`.
 *
 * @private
 * @name get
 * @memberOf Stack
 * @param {string} key The key of the value to get.
 * @returns {*} Returns the entry value.
 */
function stackGet(key) {
  return this.__data__.get(key);
}

module.exports = stackGet;


/***/ }),

/***/ "./node_modules/lodash/_stackHas.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/_stackHas.js ***!
  \******************************************/
/***/ (function(module) {

/**
 * Checks if a stack value for `key` exists.
 *
 * @private
 * @name has
 * @memberOf Stack
 * @param {string} key The key of the entry to check.
 * @returns {boolean} Returns `true` if an entry for `key` exists, else `false`.
 */
function stackHas(key) {
  return this.__data__.has(key);
}

module.exports = stackHas;


/***/ }),

/***/ "./node_modules/lodash/_stackSet.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/_stackSet.js ***!
  \******************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var ListCache = __webpack_require__(/*! ./_ListCache */ "./node_modules/lodash/_ListCache.js"),
    Map = __webpack_require__(/*! ./_Map */ "./node_modules/lodash/_Map.js"),
    MapCache = __webpack_require__(/*! ./_MapCache */ "./node_modules/lodash/_MapCache.js");

/** Used as the size to enable large array optimizations. */
var LARGE_ARRAY_SIZE = 200;

/**
 * Sets the stack `key` to `value`.
 *
 * @private
 * @name set
 * @memberOf Stack
 * @param {string} key The key of the value to set.
 * @param {*} value The value to set.
 * @returns {Object} Returns the stack cache instance.
 */
function stackSet(key, value) {
  var data = this.__data__;
  if (data instanceof ListCache) {
    var pairs = data.__data__;
    if (!Map || (pairs.length < LARGE_ARRAY_SIZE - 1)) {
      pairs.push([key, value]);
      this.size = ++data.size;
      return this;
    }
    data = this.__data__ = new MapCache(pairs);
  }
  data.set(key, value);
  this.size = data.size;
  return this;
}

module.exports = stackSet;


/***/ }),

/***/ "./node_modules/lodash/_stringToArray.js":
/*!***********************************************!*\
  !*** ./node_modules/lodash/_stringToArray.js ***!
  \***********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var asciiToArray = __webpack_require__(/*! ./_asciiToArray */ "./node_modules/lodash/_asciiToArray.js"),
    hasUnicode = __webpack_require__(/*! ./_hasUnicode */ "./node_modules/lodash/_hasUnicode.js"),
    unicodeToArray = __webpack_require__(/*! ./_unicodeToArray */ "./node_modules/lodash/_unicodeToArray.js");

/**
 * Converts `string` to an array.
 *
 * @private
 * @param {string} string The string to convert.
 * @returns {Array} Returns the converted array.
 */
function stringToArray(string) {
  return hasUnicode(string)
    ? unicodeToArray(string)
    : asciiToArray(string);
}

module.exports = stringToArray;


/***/ }),

/***/ "./node_modules/lodash/_toSource.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/_toSource.js ***!
  \******************************************/
/***/ (function(module) {

/** Used for built-in method references. */
var funcProto = Function.prototype;

/** Used to resolve the decompiled source of functions. */
var funcToString = funcProto.toString;

/**
 * Converts `func` to its source code.
 *
 * @private
 * @param {Function} func The function to convert.
 * @returns {string} Returns the source code.
 */
function toSource(func) {
  if (func != null) {
    try {
      return funcToString.call(func);
    } catch (e) {}
    try {
      return (func + '');
    } catch (e) {}
  }
  return '';
}

module.exports = toSource;


/***/ }),

/***/ "./node_modules/lodash/_trimmedEndIndex.js":
/*!*************************************************!*\
  !*** ./node_modules/lodash/_trimmedEndIndex.js ***!
  \*************************************************/
/***/ (function(module) {

/** Used to match a single whitespace character. */
var reWhitespace = /\s/;

/**
 * Used by `_.trim` and `_.trimEnd` to get the index of the last non-whitespace
 * character of `string`.
 *
 * @private
 * @param {string} string The string to inspect.
 * @returns {number} Returns the index of the last non-whitespace character.
 */
function trimmedEndIndex(string) {
  var index = string.length;

  while (index-- && reWhitespace.test(string.charAt(index))) {}
  return index;
}

module.exports = trimmedEndIndex;


/***/ }),

/***/ "./node_modules/lodash/_unicodeToArray.js":
/*!************************************************!*\
  !*** ./node_modules/lodash/_unicodeToArray.js ***!
  \************************************************/
/***/ (function(module) {

/** Used to compose unicode character classes. */
var rsAstralRange = '\\ud800-\\udfff',
    rsComboMarksRange = '\\u0300-\\u036f',
    reComboHalfMarksRange = '\\ufe20-\\ufe2f',
    rsComboSymbolsRange = '\\u20d0-\\u20ff',
    rsComboRange = rsComboMarksRange + reComboHalfMarksRange + rsComboSymbolsRange,
    rsVarRange = '\\ufe0e\\ufe0f';

/** Used to compose unicode capture groups. */
var rsAstral = '[' + rsAstralRange + ']',
    rsCombo = '[' + rsComboRange + ']',
    rsFitz = '\\ud83c[\\udffb-\\udfff]',
    rsModifier = '(?:' + rsCombo + '|' + rsFitz + ')',
    rsNonAstral = '[^' + rsAstralRange + ']',
    rsRegional = '(?:\\ud83c[\\udde6-\\uddff]){2}',
    rsSurrPair = '[\\ud800-\\udbff][\\udc00-\\udfff]',
    rsZWJ = '\\u200d';

/** Used to compose unicode regexes. */
var reOptMod = rsModifier + '?',
    rsOptVar = '[' + rsVarRange + ']?',
    rsOptJoin = '(?:' + rsZWJ + '(?:' + [rsNonAstral, rsRegional, rsSurrPair].join('|') + ')' + rsOptVar + reOptMod + ')*',
    rsSeq = rsOptVar + reOptMod + rsOptJoin,
    rsSymbol = '(?:' + [rsNonAstral + rsCombo + '?', rsCombo, rsRegional, rsSurrPair, rsAstral].join('|') + ')';

/** Used to match [string symbols](https://mathiasbynens.be/notes/javascript-unicode). */
var reUnicode = RegExp(rsFitz + '(?=' + rsFitz + ')|' + rsSymbol + rsSeq, 'g');

/**
 * Converts a Unicode `string` to an array.
 *
 * @private
 * @param {string} string The string to convert.
 * @returns {Array} Returns the converted array.
 */
function unicodeToArray(string) {
  return string.match(reUnicode) || [];
}

module.exports = unicodeToArray;


/***/ }),

/***/ "./node_modules/lodash/castArray.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/castArray.js ***!
  \******************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var isArray = __webpack_require__(/*! ./isArray */ "./node_modules/lodash/isArray.js");

/**
 * Casts `value` as an array if it's not one.
 *
 * @static
 * @memberOf _
 * @since 4.4.0
 * @category Lang
 * @param {*} value The value to inspect.
 * @returns {Array} Returns the cast array.
 * @example
 *
 * _.castArray(1);
 * // => [1]
 *
 * _.castArray({ 'a': 1 });
 * // => [{ 'a': 1 }]
 *
 * _.castArray('abc');
 * // => ['abc']
 *
 * _.castArray(null);
 * // => [null]
 *
 * _.castArray(undefined);
 * // => [undefined]
 *
 * _.castArray();
 * // => []
 *
 * var array = [1, 2, 3];
 * console.log(_.castArray(array) === array);
 * // => true
 */
function castArray() {
  if (!arguments.length) {
    return [];
  }
  var value = arguments[0];
  return isArray(value) ? value : [value];
}

module.exports = castArray;


/***/ }),

/***/ "./node_modules/lodash/clone.js":
/*!**************************************!*\
  !*** ./node_modules/lodash/clone.js ***!
  \**************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseClone = __webpack_require__(/*! ./_baseClone */ "./node_modules/lodash/_baseClone.js");

/** Used to compose bitmasks for cloning. */
var CLONE_SYMBOLS_FLAG = 4;

/**
 * Creates a shallow clone of `value`.
 *
 * **Note:** This method is loosely based on the
 * [structured clone algorithm](https://mdn.io/Structured_clone_algorithm)
 * and supports cloning arrays, array buffers, booleans, date objects, maps,
 * numbers, `Object` objects, regexes, sets, strings, symbols, and typed
 * arrays. The own enumerable properties of `arguments` objects are cloned
 * as plain objects. An empty object is returned for uncloneable values such
 * as error objects, functions, DOM nodes, and WeakMaps.
 *
 * @static
 * @memberOf _
 * @since 0.1.0
 * @category Lang
 * @param {*} value The value to clone.
 * @returns {*} Returns the cloned value.
 * @see _.cloneDeep
 * @example
 *
 * var objects = [{ 'a': 1 }, { 'b': 2 }];
 *
 * var shallow = _.clone(objects);
 * console.log(shallow[0] === objects[0]);
 * // => true
 */
function clone(value) {
  return baseClone(value, CLONE_SYMBOLS_FLAG);
}

module.exports = clone;


/***/ }),

/***/ "./node_modules/lodash/cloneDeep.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/cloneDeep.js ***!
  \******************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseClone = __webpack_require__(/*! ./_baseClone */ "./node_modules/lodash/_baseClone.js");

/** Used to compose bitmasks for cloning. */
var CLONE_DEEP_FLAG = 1,
    CLONE_SYMBOLS_FLAG = 4;

/**
 * This method is like `_.clone` except that it recursively clones `value`.
 *
 * @static
 * @memberOf _
 * @since 1.0.0
 * @category Lang
 * @param {*} value The value to recursively clone.
 * @returns {*} Returns the deep cloned value.
 * @see _.clone
 * @example
 *
 * var objects = [{ 'a': 1 }, { 'b': 2 }];
 *
 * var deep = _.cloneDeep(objects);
 * console.log(deep[0] === objects[0]);
 * // => false
 */
function cloneDeep(value) {
  return baseClone(value, CLONE_DEEP_FLAG | CLONE_SYMBOLS_FLAG);
}

module.exports = cloneDeep;


/***/ }),

/***/ "./node_modules/lodash/cloneDeepWith.js":
/*!**********************************************!*\
  !*** ./node_modules/lodash/cloneDeepWith.js ***!
  \**********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseClone = __webpack_require__(/*! ./_baseClone */ "./node_modules/lodash/_baseClone.js");

/** Used to compose bitmasks for cloning. */
var CLONE_DEEP_FLAG = 1,
    CLONE_SYMBOLS_FLAG = 4;

/**
 * This method is like `_.cloneWith` except that it recursively clones `value`.
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to recursively clone.
 * @param {Function} [customizer] The function to customize cloning.
 * @returns {*} Returns the deep cloned value.
 * @see _.cloneWith
 * @example
 *
 * function customizer(value) {
 *   if (_.isElement(value)) {
 *     return value.cloneNode(true);
 *   }
 * }
 *
 * var el = _.cloneDeepWith(document.body, customizer);
 *
 * console.log(el === document.body);
 * // => false
 * console.log(el.nodeName);
 * // => 'BODY'
 * console.log(el.childNodes.length);
 * // => 20
 */
function cloneDeepWith(value, customizer) {
  customizer = typeof customizer == 'function' ? customizer : undefined;
  return baseClone(value, CLONE_DEEP_FLAG | CLONE_SYMBOLS_FLAG, customizer);
}

module.exports = cloneDeepWith;


/***/ }),

/***/ "./node_modules/lodash/cloneWith.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/cloneWith.js ***!
  \******************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseClone = __webpack_require__(/*! ./_baseClone */ "./node_modules/lodash/_baseClone.js");

/** Used to compose bitmasks for cloning. */
var CLONE_SYMBOLS_FLAG = 4;

/**
 * This method is like `_.clone` except that it accepts `customizer` which
 * is invoked to produce the cloned value. If `customizer` returns `undefined`,
 * cloning is handled by the method instead. The `customizer` is invoked with
 * up to four arguments; (value [, index|key, object, stack]).
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to clone.
 * @param {Function} [customizer] The function to customize cloning.
 * @returns {*} Returns the cloned value.
 * @see _.cloneDeepWith
 * @example
 *
 * function customizer(value) {
 *   if (_.isElement(value)) {
 *     return value.cloneNode(false);
 *   }
 * }
 *
 * var el = _.cloneWith(document.body, customizer);
 *
 * console.log(el === document.body);
 * // => false
 * console.log(el.nodeName);
 * // => 'BODY'
 * console.log(el.childNodes.length);
 * // => 0
 */
function cloneWith(value, customizer) {
  customizer = typeof customizer == 'function' ? customizer : undefined;
  return baseClone(value, CLONE_SYMBOLS_FLAG, customizer);
}

module.exports = cloneWith;


/***/ }),

/***/ "./node_modules/lodash/conformsTo.js":
/*!*******************************************!*\
  !*** ./node_modules/lodash/conformsTo.js ***!
  \*******************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseConformsTo = __webpack_require__(/*! ./_baseConformsTo */ "./node_modules/lodash/_baseConformsTo.js"),
    keys = __webpack_require__(/*! ./keys */ "./node_modules/lodash/keys.js");

/**
 * Checks if `object` conforms to `source` by invoking the predicate
 * properties of `source` with the corresponding property values of `object`.
 *
 * **Note:** This method is equivalent to `_.conforms` when `source` is
 * partially applied.
 *
 * @static
 * @memberOf _
 * @since 4.14.0
 * @category Lang
 * @param {Object} object The object to inspect.
 * @param {Object} source The object of property predicates to conform to.
 * @returns {boolean} Returns `true` if `object` conforms, else `false`.
 * @example
 *
 * var object = { 'a': 1, 'b': 2 };
 *
 * _.conformsTo(object, { 'b': function(n) { return n > 1; } });
 * // => true
 *
 * _.conformsTo(object, { 'b': function(n) { return n > 2; } });
 * // => false
 */
function conformsTo(object, source) {
  return source == null || baseConformsTo(object, source, keys(source));
}

module.exports = conformsTo;


/***/ }),

/***/ "./node_modules/lodash/eq.js":
/*!***********************************!*\
  !*** ./node_modules/lodash/eq.js ***!
  \***********************************/
/***/ (function(module) {

/**
 * Performs a
 * [`SameValueZero`](http://ecma-international.org/ecma-262/7.0/#sec-samevaluezero)
 * comparison between two values to determine if they are equivalent.
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to compare.
 * @param {*} other The other value to compare.
 * @returns {boolean} Returns `true` if the values are equivalent, else `false`.
 * @example
 *
 * var object = { 'a': 1 };
 * var other = { 'a': 1 };
 *
 * _.eq(object, object);
 * // => true
 *
 * _.eq(object, other);
 * // => false
 *
 * _.eq('a', 'a');
 * // => true
 *
 * _.eq('a', Object('a'));
 * // => false
 *
 * _.eq(NaN, NaN);
 * // => true
 */
function eq(value, other) {
  return value === other || (value !== value && other !== other);
}

module.exports = eq;


/***/ }),

/***/ "./node_modules/lodash/gt.js":
/*!***********************************!*\
  !*** ./node_modules/lodash/gt.js ***!
  \***********************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseGt = __webpack_require__(/*! ./_baseGt */ "./node_modules/lodash/_baseGt.js"),
    createRelationalOperation = __webpack_require__(/*! ./_createRelationalOperation */ "./node_modules/lodash/_createRelationalOperation.js");

/**
 * Checks if `value` is greater than `other`.
 *
 * @static
 * @memberOf _
 * @since 3.9.0
 * @category Lang
 * @param {*} value The value to compare.
 * @param {*} other The other value to compare.
 * @returns {boolean} Returns `true` if `value` is greater than `other`,
 *  else `false`.
 * @see _.lt
 * @example
 *
 * _.gt(3, 1);
 * // => true
 *
 * _.gt(3, 3);
 * // => false
 *
 * _.gt(1, 3);
 * // => false
 */
var gt = createRelationalOperation(baseGt);

module.exports = gt;


/***/ }),

/***/ "./node_modules/lodash/gte.js":
/*!************************************!*\
  !*** ./node_modules/lodash/gte.js ***!
  \************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var createRelationalOperation = __webpack_require__(/*! ./_createRelationalOperation */ "./node_modules/lodash/_createRelationalOperation.js");

/**
 * Checks if `value` is greater than or equal to `other`.
 *
 * @static
 * @memberOf _
 * @since 3.9.0
 * @category Lang
 * @param {*} value The value to compare.
 * @param {*} other The other value to compare.
 * @returns {boolean} Returns `true` if `value` is greater than or equal to
 *  `other`, else `false`.
 * @see _.lte
 * @example
 *
 * _.gte(3, 1);
 * // => true
 *
 * _.gte(3, 3);
 * // => true
 *
 * _.gte(1, 3);
 * // => false
 */
var gte = createRelationalOperation(function(value, other) {
  return value >= other;
});

module.exports = gte;


/***/ }),

/***/ "./node_modules/lodash/isArguments.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/isArguments.js ***!
  \********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseIsArguments = __webpack_require__(/*! ./_baseIsArguments */ "./node_modules/lodash/_baseIsArguments.js"),
    isObjectLike = __webpack_require__(/*! ./isObjectLike */ "./node_modules/lodash/isObjectLike.js");

/** Used for built-in method references. */
var objectProto = Object.prototype;

/** Used to check objects for own properties. */
var hasOwnProperty = objectProto.hasOwnProperty;

/** Built-in value references. */
var propertyIsEnumerable = objectProto.propertyIsEnumerable;

/**
 * Checks if `value` is likely an `arguments` object.
 *
 * @static
 * @memberOf _
 * @since 0.1.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is an `arguments` object,
 *  else `false`.
 * @example
 *
 * _.isArguments(function() { return arguments; }());
 * // => true
 *
 * _.isArguments([1, 2, 3]);
 * // => false
 */
var isArguments = baseIsArguments(function() { return arguments; }()) ? baseIsArguments : function(value) {
  return isObjectLike(value) && hasOwnProperty.call(value, 'callee') &&
    !propertyIsEnumerable.call(value, 'callee');
};

module.exports = isArguments;


/***/ }),

/***/ "./node_modules/lodash/isArray.js":
/*!****************************************!*\
  !*** ./node_modules/lodash/isArray.js ***!
  \****************************************/
/***/ (function(module) {

/**
 * Checks if `value` is classified as an `Array` object.
 *
 * @static
 * @memberOf _
 * @since 0.1.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is an array, else `false`.
 * @example
 *
 * _.isArray([1, 2, 3]);
 * // => true
 *
 * _.isArray(document.body.children);
 * // => false
 *
 * _.isArray('abc');
 * // => false
 *
 * _.isArray(_.noop);
 * // => false
 */
var isArray = Array.isArray;

module.exports = isArray;


/***/ }),

/***/ "./node_modules/lodash/isArrayBuffer.js":
/*!**********************************************!*\
  !*** ./node_modules/lodash/isArrayBuffer.js ***!
  \**********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseIsArrayBuffer = __webpack_require__(/*! ./_baseIsArrayBuffer */ "./node_modules/lodash/_baseIsArrayBuffer.js"),
    baseUnary = __webpack_require__(/*! ./_baseUnary */ "./node_modules/lodash/_baseUnary.js"),
    nodeUtil = __webpack_require__(/*! ./_nodeUtil */ "./node_modules/lodash/_nodeUtil.js");

/* Node.js helper references. */
var nodeIsArrayBuffer = nodeUtil && nodeUtil.isArrayBuffer;

/**
 * Checks if `value` is classified as an `ArrayBuffer` object.
 *
 * @static
 * @memberOf _
 * @since 4.3.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is an array buffer, else `false`.
 * @example
 *
 * _.isArrayBuffer(new ArrayBuffer(2));
 * // => true
 *
 * _.isArrayBuffer(new Array(2));
 * // => false
 */
var isArrayBuffer = nodeIsArrayBuffer ? baseUnary(nodeIsArrayBuffer) : baseIsArrayBuffer;

module.exports = isArrayBuffer;


/***/ }),

/***/ "./node_modules/lodash/isArrayLike.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/isArrayLike.js ***!
  \********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var isFunction = __webpack_require__(/*! ./isFunction */ "./node_modules/lodash/isFunction.js"),
    isLength = __webpack_require__(/*! ./isLength */ "./node_modules/lodash/isLength.js");

/**
 * Checks if `value` is array-like. A value is considered array-like if it's
 * not a function and has a `value.length` that's an integer greater than or
 * equal to `0` and less than or equal to `Number.MAX_SAFE_INTEGER`.
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is array-like, else `false`.
 * @example
 *
 * _.isArrayLike([1, 2, 3]);
 * // => true
 *
 * _.isArrayLike(document.body.children);
 * // => true
 *
 * _.isArrayLike('abc');
 * // => true
 *
 * _.isArrayLike(_.noop);
 * // => false
 */
function isArrayLike(value) {
  return value != null && isLength(value.length) && !isFunction(value);
}

module.exports = isArrayLike;


/***/ }),

/***/ "./node_modules/lodash/isArrayLikeObject.js":
/*!**************************************************!*\
  !*** ./node_modules/lodash/isArrayLikeObject.js ***!
  \**************************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var isArrayLike = __webpack_require__(/*! ./isArrayLike */ "./node_modules/lodash/isArrayLike.js"),
    isObjectLike = __webpack_require__(/*! ./isObjectLike */ "./node_modules/lodash/isObjectLike.js");

/**
 * This method is like `_.isArrayLike` except that it also checks if `value`
 * is an object.
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is an array-like object,
 *  else `false`.
 * @example
 *
 * _.isArrayLikeObject([1, 2, 3]);
 * // => true
 *
 * _.isArrayLikeObject(document.body.children);
 * // => true
 *
 * _.isArrayLikeObject('abc');
 * // => false
 *
 * _.isArrayLikeObject(_.noop);
 * // => false
 */
function isArrayLikeObject(value) {
  return isObjectLike(value) && isArrayLike(value);
}

module.exports = isArrayLikeObject;


/***/ }),

/***/ "./node_modules/lodash/isBoolean.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/isBoolean.js ***!
  \******************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseGetTag = __webpack_require__(/*! ./_baseGetTag */ "./node_modules/lodash/_baseGetTag.js"),
    isObjectLike = __webpack_require__(/*! ./isObjectLike */ "./node_modules/lodash/isObjectLike.js");

/** `Object#toString` result references. */
var boolTag = '[object Boolean]';

/**
 * Checks if `value` is classified as a boolean primitive or object.
 *
 * @static
 * @memberOf _
 * @since 0.1.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a boolean, else `false`.
 * @example
 *
 * _.isBoolean(false);
 * // => true
 *
 * _.isBoolean(null);
 * // => false
 */
function isBoolean(value) {
  return value === true || value === false ||
    (isObjectLike(value) && baseGetTag(value) == boolTag);
}

module.exports = isBoolean;


/***/ }),

/***/ "./node_modules/lodash/isBuffer.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/isBuffer.js ***!
  \*****************************************/
/***/ (function(module, exports, __webpack_require__) {

/* module decorator */ module = __webpack_require__.nmd(module);
var root = __webpack_require__(/*! ./_root */ "./node_modules/lodash/_root.js"),
    stubFalse = __webpack_require__(/*! ./stubFalse */ "./node_modules/lodash/stubFalse.js");

/** Detect free variable `exports`. */
var freeExports =  true && exports && !exports.nodeType && exports;

/** Detect free variable `module`. */
var freeModule = freeExports && "object" == 'object' && module && !module.nodeType && module;

/** Detect the popular CommonJS extension `module.exports`. */
var moduleExports = freeModule && freeModule.exports === freeExports;

/** Built-in value references. */
var Buffer = moduleExports ? root.Buffer : undefined;

/* Built-in method references for those with the same name as other `lodash` methods. */
var nativeIsBuffer = Buffer ? Buffer.isBuffer : undefined;

/**
 * Checks if `value` is a buffer.
 *
 * @static
 * @memberOf _
 * @since 4.3.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a buffer, else `false`.
 * @example
 *
 * _.isBuffer(new Buffer(2));
 * // => true
 *
 * _.isBuffer(new Uint8Array(2));
 * // => false
 */
var isBuffer = nativeIsBuffer || stubFalse;

module.exports = isBuffer;


/***/ }),

/***/ "./node_modules/lodash/isDate.js":
/*!***************************************!*\
  !*** ./node_modules/lodash/isDate.js ***!
  \***************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseIsDate = __webpack_require__(/*! ./_baseIsDate */ "./node_modules/lodash/_baseIsDate.js"),
    baseUnary = __webpack_require__(/*! ./_baseUnary */ "./node_modules/lodash/_baseUnary.js"),
    nodeUtil = __webpack_require__(/*! ./_nodeUtil */ "./node_modules/lodash/_nodeUtil.js");

/* Node.js helper references. */
var nodeIsDate = nodeUtil && nodeUtil.isDate;

/**
 * Checks if `value` is classified as a `Date` object.
 *
 * @static
 * @memberOf _
 * @since 0.1.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a date object, else `false`.
 * @example
 *
 * _.isDate(new Date);
 * // => true
 *
 * _.isDate('Mon April 23 2012');
 * // => false
 */
var isDate = nodeIsDate ? baseUnary(nodeIsDate) : baseIsDate;

module.exports = isDate;


/***/ }),

/***/ "./node_modules/lodash/isElement.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/isElement.js ***!
  \******************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var isObjectLike = __webpack_require__(/*! ./isObjectLike */ "./node_modules/lodash/isObjectLike.js"),
    isPlainObject = __webpack_require__(/*! ./isPlainObject */ "./node_modules/lodash/isPlainObject.js");

/**
 * Checks if `value` is likely a DOM element.
 *
 * @static
 * @memberOf _
 * @since 0.1.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a DOM element, else `false`.
 * @example
 *
 * _.isElement(document.body);
 * // => true
 *
 * _.isElement('<body>');
 * // => false
 */
function isElement(value) {
  return isObjectLike(value) && value.nodeType === 1 && !isPlainObject(value);
}

module.exports = isElement;


/***/ }),

/***/ "./node_modules/lodash/isEmpty.js":
/*!****************************************!*\
  !*** ./node_modules/lodash/isEmpty.js ***!
  \****************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseKeys = __webpack_require__(/*! ./_baseKeys */ "./node_modules/lodash/_baseKeys.js"),
    getTag = __webpack_require__(/*! ./_getTag */ "./node_modules/lodash/_getTag.js"),
    isArguments = __webpack_require__(/*! ./isArguments */ "./node_modules/lodash/isArguments.js"),
    isArray = __webpack_require__(/*! ./isArray */ "./node_modules/lodash/isArray.js"),
    isArrayLike = __webpack_require__(/*! ./isArrayLike */ "./node_modules/lodash/isArrayLike.js"),
    isBuffer = __webpack_require__(/*! ./isBuffer */ "./node_modules/lodash/isBuffer.js"),
    isPrototype = __webpack_require__(/*! ./_isPrototype */ "./node_modules/lodash/_isPrototype.js"),
    isTypedArray = __webpack_require__(/*! ./isTypedArray */ "./node_modules/lodash/isTypedArray.js");

/** `Object#toString` result references. */
var mapTag = '[object Map]',
    setTag = '[object Set]';

/** Used for built-in method references. */
var objectProto = Object.prototype;

/** Used to check objects for own properties. */
var hasOwnProperty = objectProto.hasOwnProperty;

/**
 * Checks if `value` is an empty object, collection, map, or set.
 *
 * Objects are considered empty if they have no own enumerable string keyed
 * properties.
 *
 * Array-like values such as `arguments` objects, arrays, buffers, strings, or
 * jQuery-like collections are considered empty if they have a `length` of `0`.
 * Similarly, maps and sets are considered empty if they have a `size` of `0`.
 *
 * @static
 * @memberOf _
 * @since 0.1.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is empty, else `false`.
 * @example
 *
 * _.isEmpty(null);
 * // => true
 *
 * _.isEmpty(true);
 * // => true
 *
 * _.isEmpty(1);
 * // => true
 *
 * _.isEmpty([1, 2, 3]);
 * // => false
 *
 * _.isEmpty({ 'a': 1 });
 * // => false
 */
function isEmpty(value) {
  if (value == null) {
    return true;
  }
  if (isArrayLike(value) &&
      (isArray(value) || typeof value == 'string' || typeof value.splice == 'function' ||
        isBuffer(value) || isTypedArray(value) || isArguments(value))) {
    return !value.length;
  }
  var tag = getTag(value);
  if (tag == mapTag || tag == setTag) {
    return !value.size;
  }
  if (isPrototype(value)) {
    return !baseKeys(value).length;
  }
  for (var key in value) {
    if (hasOwnProperty.call(value, key)) {
      return false;
    }
  }
  return true;
}

module.exports = isEmpty;


/***/ }),

/***/ "./node_modules/lodash/isEqual.js":
/*!****************************************!*\
  !*** ./node_modules/lodash/isEqual.js ***!
  \****************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseIsEqual = __webpack_require__(/*! ./_baseIsEqual */ "./node_modules/lodash/_baseIsEqual.js");

/**
 * Performs a deep comparison between two values to determine if they are
 * equivalent.
 *
 * **Note:** This method supports comparing arrays, array buffers, booleans,
 * date objects, error objects, maps, numbers, `Object` objects, regexes,
 * sets, strings, symbols, and typed arrays. `Object` objects are compared
 * by their own, not inherited, enumerable properties. Functions and DOM
 * nodes are compared by strict equality, i.e. `===`.
 *
 * @static
 * @memberOf _
 * @since 0.1.0
 * @category Lang
 * @param {*} value The value to compare.
 * @param {*} other The other value to compare.
 * @returns {boolean} Returns `true` if the values are equivalent, else `false`.
 * @example
 *
 * var object = { 'a': 1 };
 * var other = { 'a': 1 };
 *
 * _.isEqual(object, other);
 * // => true
 *
 * object === other;
 * // => false
 */
function isEqual(value, other) {
  return baseIsEqual(value, other);
}

module.exports = isEqual;


/***/ }),

/***/ "./node_modules/lodash/isEqualWith.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/isEqualWith.js ***!
  \********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseIsEqual = __webpack_require__(/*! ./_baseIsEqual */ "./node_modules/lodash/_baseIsEqual.js");

/**
 * This method is like `_.isEqual` except that it accepts `customizer` which
 * is invoked to compare values. If `customizer` returns `undefined`, comparisons
 * are handled by the method instead. The `customizer` is invoked with up to
 * six arguments: (objValue, othValue [, index|key, object, other, stack]).
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to compare.
 * @param {*} other The other value to compare.
 * @param {Function} [customizer] The function to customize comparisons.
 * @returns {boolean} Returns `true` if the values are equivalent, else `false`.
 * @example
 *
 * function isGreeting(value) {
 *   return /^h(?:i|ello)$/.test(value);
 * }
 *
 * function customizer(objValue, othValue) {
 *   if (isGreeting(objValue) && isGreeting(othValue)) {
 *     return true;
 *   }
 * }
 *
 * var array = ['hello', 'goodbye'];
 * var other = ['hi', 'goodbye'];
 *
 * _.isEqualWith(array, other, customizer);
 * // => true
 */
function isEqualWith(value, other, customizer) {
  customizer = typeof customizer == 'function' ? customizer : undefined;
  var result = customizer ? customizer(value, other) : undefined;
  return result === undefined ? baseIsEqual(value, other, undefined, customizer) : !!result;
}

module.exports = isEqualWith;


/***/ }),

/***/ "./node_modules/lodash/isError.js":
/*!****************************************!*\
  !*** ./node_modules/lodash/isError.js ***!
  \****************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseGetTag = __webpack_require__(/*! ./_baseGetTag */ "./node_modules/lodash/_baseGetTag.js"),
    isObjectLike = __webpack_require__(/*! ./isObjectLike */ "./node_modules/lodash/isObjectLike.js"),
    isPlainObject = __webpack_require__(/*! ./isPlainObject */ "./node_modules/lodash/isPlainObject.js");

/** `Object#toString` result references. */
var domExcTag = '[object DOMException]',
    errorTag = '[object Error]';

/**
 * Checks if `value` is an `Error`, `EvalError`, `RangeError`, `ReferenceError`,
 * `SyntaxError`, `TypeError`, or `URIError` object.
 *
 * @static
 * @memberOf _
 * @since 3.0.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is an error object, else `false`.
 * @example
 *
 * _.isError(new Error);
 * // => true
 *
 * _.isError(Error);
 * // => false
 */
function isError(value) {
  if (!isObjectLike(value)) {
    return false;
  }
  var tag = baseGetTag(value);
  return tag == errorTag || tag == domExcTag ||
    (typeof value.message == 'string' && typeof value.name == 'string' && !isPlainObject(value));
}

module.exports = isError;


/***/ }),

/***/ "./node_modules/lodash/isFinite.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/isFinite.js ***!
  \*****************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var root = __webpack_require__(/*! ./_root */ "./node_modules/lodash/_root.js");

/* Built-in method references for those with the same name as other `lodash` methods. */
var nativeIsFinite = root.isFinite;

/**
 * Checks if `value` is a finite primitive number.
 *
 * **Note:** This method is based on
 * [`Number.isFinite`](https://mdn.io/Number/isFinite).
 *
 * @static
 * @memberOf _
 * @since 0.1.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a finite number, else `false`.
 * @example
 *
 * _.isFinite(3);
 * // => true
 *
 * _.isFinite(Number.MIN_VALUE);
 * // => true
 *
 * _.isFinite(Infinity);
 * // => false
 *
 * _.isFinite('3');
 * // => false
 */
function isFinite(value) {
  return typeof value == 'number' && nativeIsFinite(value);
}

module.exports = isFinite;


/***/ }),

/***/ "./node_modules/lodash/isFunction.js":
/*!*******************************************!*\
  !*** ./node_modules/lodash/isFunction.js ***!
  \*******************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseGetTag = __webpack_require__(/*! ./_baseGetTag */ "./node_modules/lodash/_baseGetTag.js"),
    isObject = __webpack_require__(/*! ./isObject */ "./node_modules/lodash/isObject.js");

/** `Object#toString` result references. */
var asyncTag = '[object AsyncFunction]',
    funcTag = '[object Function]',
    genTag = '[object GeneratorFunction]',
    proxyTag = '[object Proxy]';

/**
 * Checks if `value` is classified as a `Function` object.
 *
 * @static
 * @memberOf _
 * @since 0.1.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a function, else `false`.
 * @example
 *
 * _.isFunction(_);
 * // => true
 *
 * _.isFunction(/abc/);
 * // => false
 */
function isFunction(value) {
  if (!isObject(value)) {
    return false;
  }
  // The use of `Object#toString` avoids issues with the `typeof` operator
  // in Safari 9 which returns 'object' for typed arrays and other constructors.
  var tag = baseGetTag(value);
  return tag == funcTag || tag == genTag || tag == asyncTag || tag == proxyTag;
}

module.exports = isFunction;


/***/ }),

/***/ "./node_modules/lodash/isInteger.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/isInteger.js ***!
  \******************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var toInteger = __webpack_require__(/*! ./toInteger */ "./node_modules/lodash/toInteger.js");

/**
 * Checks if `value` is an integer.
 *
 * **Note:** This method is based on
 * [`Number.isInteger`](https://mdn.io/Number/isInteger).
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is an integer, else `false`.
 * @example
 *
 * _.isInteger(3);
 * // => true
 *
 * _.isInteger(Number.MIN_VALUE);
 * // => false
 *
 * _.isInteger(Infinity);
 * // => false
 *
 * _.isInteger('3');
 * // => false
 */
function isInteger(value) {
  return typeof value == 'number' && value == toInteger(value);
}

module.exports = isInteger;


/***/ }),

/***/ "./node_modules/lodash/isLength.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/isLength.js ***!
  \*****************************************/
/***/ (function(module) {

/** Used as references for various `Number` constants. */
var MAX_SAFE_INTEGER = 9007199254740991;

/**
 * Checks if `value` is a valid array-like length.
 *
 * **Note:** This method is loosely based on
 * [`ToLength`](http://ecma-international.org/ecma-262/7.0/#sec-tolength).
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a valid length, else `false`.
 * @example
 *
 * _.isLength(3);
 * // => true
 *
 * _.isLength(Number.MIN_VALUE);
 * // => false
 *
 * _.isLength(Infinity);
 * // => false
 *
 * _.isLength('3');
 * // => false
 */
function isLength(value) {
  return typeof value == 'number' &&
    value > -1 && value % 1 == 0 && value <= MAX_SAFE_INTEGER;
}

module.exports = isLength;


/***/ }),

/***/ "./node_modules/lodash/isMap.js":
/*!**************************************!*\
  !*** ./node_modules/lodash/isMap.js ***!
  \**************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseIsMap = __webpack_require__(/*! ./_baseIsMap */ "./node_modules/lodash/_baseIsMap.js"),
    baseUnary = __webpack_require__(/*! ./_baseUnary */ "./node_modules/lodash/_baseUnary.js"),
    nodeUtil = __webpack_require__(/*! ./_nodeUtil */ "./node_modules/lodash/_nodeUtil.js");

/* Node.js helper references. */
var nodeIsMap = nodeUtil && nodeUtil.isMap;

/**
 * Checks if `value` is classified as a `Map` object.
 *
 * @static
 * @memberOf _
 * @since 4.3.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a map, else `false`.
 * @example
 *
 * _.isMap(new Map);
 * // => true
 *
 * _.isMap(new WeakMap);
 * // => false
 */
var isMap = nodeIsMap ? baseUnary(nodeIsMap) : baseIsMap;

module.exports = isMap;


/***/ }),

/***/ "./node_modules/lodash/isMatch.js":
/*!****************************************!*\
  !*** ./node_modules/lodash/isMatch.js ***!
  \****************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseIsMatch = __webpack_require__(/*! ./_baseIsMatch */ "./node_modules/lodash/_baseIsMatch.js"),
    getMatchData = __webpack_require__(/*! ./_getMatchData */ "./node_modules/lodash/_getMatchData.js");

/**
 * Performs a partial deep comparison between `object` and `source` to
 * determine if `object` contains equivalent property values.
 *
 * **Note:** This method is equivalent to `_.matches` when `source` is
 * partially applied.
 *
 * Partial comparisons will match empty array and empty object `source`
 * values against any array or object value, respectively. See `_.isEqual`
 * for a list of supported value comparisons.
 *
 * @static
 * @memberOf _
 * @since 3.0.0
 * @category Lang
 * @param {Object} object The object to inspect.
 * @param {Object} source The object of property values to match.
 * @returns {boolean} Returns `true` if `object` is a match, else `false`.
 * @example
 *
 * var object = { 'a': 1, 'b': 2 };
 *
 * _.isMatch(object, { 'b': 2 });
 * // => true
 *
 * _.isMatch(object, { 'b': 1 });
 * // => false
 */
function isMatch(object, source) {
  return object === source || baseIsMatch(object, source, getMatchData(source));
}

module.exports = isMatch;


/***/ }),

/***/ "./node_modules/lodash/isMatchWith.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/isMatchWith.js ***!
  \********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseIsMatch = __webpack_require__(/*! ./_baseIsMatch */ "./node_modules/lodash/_baseIsMatch.js"),
    getMatchData = __webpack_require__(/*! ./_getMatchData */ "./node_modules/lodash/_getMatchData.js");

/**
 * This method is like `_.isMatch` except that it accepts `customizer` which
 * is invoked to compare values. If `customizer` returns `undefined`, comparisons
 * are handled by the method instead. The `customizer` is invoked with five
 * arguments: (objValue, srcValue, index|key, object, source).
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {Object} object The object to inspect.
 * @param {Object} source The object of property values to match.
 * @param {Function} [customizer] The function to customize comparisons.
 * @returns {boolean} Returns `true` if `object` is a match, else `false`.
 * @example
 *
 * function isGreeting(value) {
 *   return /^h(?:i|ello)$/.test(value);
 * }
 *
 * function customizer(objValue, srcValue) {
 *   if (isGreeting(objValue) && isGreeting(srcValue)) {
 *     return true;
 *   }
 * }
 *
 * var object = { 'greeting': 'hello' };
 * var source = { 'greeting': 'hi' };
 *
 * _.isMatchWith(object, source, customizer);
 * // => true
 */
function isMatchWith(object, source, customizer) {
  customizer = typeof customizer == 'function' ? customizer : undefined;
  return baseIsMatch(object, source, getMatchData(source), customizer);
}

module.exports = isMatchWith;


/***/ }),

/***/ "./node_modules/lodash/isNaN.js":
/*!**************************************!*\
  !*** ./node_modules/lodash/isNaN.js ***!
  \**************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var isNumber = __webpack_require__(/*! ./isNumber */ "./node_modules/lodash/isNumber.js");

/**
 * Checks if `value` is `NaN`.
 *
 * **Note:** This method is based on
 * [`Number.isNaN`](https://mdn.io/Number/isNaN) and is not the same as
 * global [`isNaN`](https://mdn.io/isNaN) which returns `true` for
 * `undefined` and other non-number values.
 *
 * @static
 * @memberOf _
 * @since 0.1.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is `NaN`, else `false`.
 * @example
 *
 * _.isNaN(NaN);
 * // => true
 *
 * _.isNaN(new Number(NaN));
 * // => true
 *
 * isNaN(undefined);
 * // => true
 *
 * _.isNaN(undefined);
 * // => false
 */
function isNaN(value) {
  // An `NaN` primitive is the only value that is not equal to itself.
  // Perform the `toStringTag` check first to avoid errors with some
  // ActiveX objects in IE.
  return isNumber(value) && value != +value;
}

module.exports = isNaN;


/***/ }),

/***/ "./node_modules/lodash/isNative.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/isNative.js ***!
  \*****************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseIsNative = __webpack_require__(/*! ./_baseIsNative */ "./node_modules/lodash/_baseIsNative.js"),
    isMaskable = __webpack_require__(/*! ./_isMaskable */ "./node_modules/lodash/_isMaskable.js");

/** Error message constants. */
var CORE_ERROR_TEXT = 'Unsupported core-js use. Try https://npms.io/search?q=ponyfill.';

/**
 * Checks if `value` is a pristine native function.
 *
 * **Note:** This method can't reliably detect native functions in the presence
 * of the core-js package because core-js circumvents this kind of detection.
 * Despite multiple requests, the core-js maintainer has made it clear: any
 * attempt to fix the detection will be obstructed. As a result, we're left
 * with little choice but to throw an error. Unfortunately, this also affects
 * packages, like [babel-polyfill](https://www.npmjs.com/package/babel-polyfill),
 * which rely on core-js.
 *
 * @static
 * @memberOf _
 * @since 3.0.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a native function,
 *  else `false`.
 * @example
 *
 * _.isNative(Array.prototype.push);
 * // => true
 *
 * _.isNative(_);
 * // => false
 */
function isNative(value) {
  if (isMaskable(value)) {
    throw new Error(CORE_ERROR_TEXT);
  }
  return baseIsNative(value);
}

module.exports = isNative;


/***/ }),

/***/ "./node_modules/lodash/isNil.js":
/*!**************************************!*\
  !*** ./node_modules/lodash/isNil.js ***!
  \**************************************/
/***/ (function(module) {

/**
 * Checks if `value` is `null` or `undefined`.
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is nullish, else `false`.
 * @example
 *
 * _.isNil(null);
 * // => true
 *
 * _.isNil(void 0);
 * // => true
 *
 * _.isNil(NaN);
 * // => false
 */
function isNil(value) {
  return value == null;
}

module.exports = isNil;


/***/ }),

/***/ "./node_modules/lodash/isNull.js":
/*!***************************************!*\
  !*** ./node_modules/lodash/isNull.js ***!
  \***************************************/
/***/ (function(module) {

/**
 * Checks if `value` is `null`.
 *
 * @static
 * @memberOf _
 * @since 0.1.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is `null`, else `false`.
 * @example
 *
 * _.isNull(null);
 * // => true
 *
 * _.isNull(void 0);
 * // => false
 */
function isNull(value) {
  return value === null;
}

module.exports = isNull;


/***/ }),

/***/ "./node_modules/lodash/isNumber.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/isNumber.js ***!
  \*****************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseGetTag = __webpack_require__(/*! ./_baseGetTag */ "./node_modules/lodash/_baseGetTag.js"),
    isObjectLike = __webpack_require__(/*! ./isObjectLike */ "./node_modules/lodash/isObjectLike.js");

/** `Object#toString` result references. */
var numberTag = '[object Number]';

/**
 * Checks if `value` is classified as a `Number` primitive or object.
 *
 * **Note:** To exclude `Infinity`, `-Infinity`, and `NaN`, which are
 * classified as numbers, use the `_.isFinite` method.
 *
 * @static
 * @memberOf _
 * @since 0.1.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a number, else `false`.
 * @example
 *
 * _.isNumber(3);
 * // => true
 *
 * _.isNumber(Number.MIN_VALUE);
 * // => true
 *
 * _.isNumber(Infinity);
 * // => true
 *
 * _.isNumber('3');
 * // => false
 */
function isNumber(value) {
  return typeof value == 'number' ||
    (isObjectLike(value) && baseGetTag(value) == numberTag);
}

module.exports = isNumber;


/***/ }),

/***/ "./node_modules/lodash/isObject.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/isObject.js ***!
  \*****************************************/
/***/ (function(module) {

/**
 * Checks if `value` is the
 * [language type](http://www.ecma-international.org/ecma-262/7.0/#sec-ecmascript-language-types)
 * of `Object`. (e.g. arrays, functions, objects, regexes, `new Number(0)`, and `new String('')`)
 *
 * @static
 * @memberOf _
 * @since 0.1.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is an object, else `false`.
 * @example
 *
 * _.isObject({});
 * // => true
 *
 * _.isObject([1, 2, 3]);
 * // => true
 *
 * _.isObject(_.noop);
 * // => true
 *
 * _.isObject(null);
 * // => false
 */
function isObject(value) {
  var type = typeof value;
  return value != null && (type == 'object' || type == 'function');
}

module.exports = isObject;


/***/ }),

/***/ "./node_modules/lodash/isObjectLike.js":
/*!*********************************************!*\
  !*** ./node_modules/lodash/isObjectLike.js ***!
  \*********************************************/
/***/ (function(module) {

/**
 * Checks if `value` is object-like. A value is object-like if it's not `null`
 * and has a `typeof` result of "object".
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is object-like, else `false`.
 * @example
 *
 * _.isObjectLike({});
 * // => true
 *
 * _.isObjectLike([1, 2, 3]);
 * // => true
 *
 * _.isObjectLike(_.noop);
 * // => false
 *
 * _.isObjectLike(null);
 * // => false
 */
function isObjectLike(value) {
  return value != null && typeof value == 'object';
}

module.exports = isObjectLike;


/***/ }),

/***/ "./node_modules/lodash/isPlainObject.js":
/*!**********************************************!*\
  !*** ./node_modules/lodash/isPlainObject.js ***!
  \**********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseGetTag = __webpack_require__(/*! ./_baseGetTag */ "./node_modules/lodash/_baseGetTag.js"),
    getPrototype = __webpack_require__(/*! ./_getPrototype */ "./node_modules/lodash/_getPrototype.js"),
    isObjectLike = __webpack_require__(/*! ./isObjectLike */ "./node_modules/lodash/isObjectLike.js");

/** `Object#toString` result references. */
var objectTag = '[object Object]';

/** Used for built-in method references. */
var funcProto = Function.prototype,
    objectProto = Object.prototype;

/** Used to resolve the decompiled source of functions. */
var funcToString = funcProto.toString;

/** Used to check objects for own properties. */
var hasOwnProperty = objectProto.hasOwnProperty;

/** Used to infer the `Object` constructor. */
var objectCtorString = funcToString.call(Object);

/**
 * Checks if `value` is a plain object, that is, an object created by the
 * `Object` constructor or one with a `[[Prototype]]` of `null`.
 *
 * @static
 * @memberOf _
 * @since 0.8.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a plain object, else `false`.
 * @example
 *
 * function Foo() {
 *   this.a = 1;
 * }
 *
 * _.isPlainObject(new Foo);
 * // => false
 *
 * _.isPlainObject([1, 2, 3]);
 * // => false
 *
 * _.isPlainObject({ 'x': 0, 'y': 0 });
 * // => true
 *
 * _.isPlainObject(Object.create(null));
 * // => true
 */
function isPlainObject(value) {
  if (!isObjectLike(value) || baseGetTag(value) != objectTag) {
    return false;
  }
  var proto = getPrototype(value);
  if (proto === null) {
    return true;
  }
  var Ctor = hasOwnProperty.call(proto, 'constructor') && proto.constructor;
  return typeof Ctor == 'function' && Ctor instanceof Ctor &&
    funcToString.call(Ctor) == objectCtorString;
}

module.exports = isPlainObject;


/***/ }),

/***/ "./node_modules/lodash/isRegExp.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/isRegExp.js ***!
  \*****************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseIsRegExp = __webpack_require__(/*! ./_baseIsRegExp */ "./node_modules/lodash/_baseIsRegExp.js"),
    baseUnary = __webpack_require__(/*! ./_baseUnary */ "./node_modules/lodash/_baseUnary.js"),
    nodeUtil = __webpack_require__(/*! ./_nodeUtil */ "./node_modules/lodash/_nodeUtil.js");

/* Node.js helper references. */
var nodeIsRegExp = nodeUtil && nodeUtil.isRegExp;

/**
 * Checks if `value` is classified as a `RegExp` object.
 *
 * @static
 * @memberOf _
 * @since 0.1.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a regexp, else `false`.
 * @example
 *
 * _.isRegExp(/abc/);
 * // => true
 *
 * _.isRegExp('/abc/');
 * // => false
 */
var isRegExp = nodeIsRegExp ? baseUnary(nodeIsRegExp) : baseIsRegExp;

module.exports = isRegExp;


/***/ }),

/***/ "./node_modules/lodash/isSafeInteger.js":
/*!**********************************************!*\
  !*** ./node_modules/lodash/isSafeInteger.js ***!
  \**********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var isInteger = __webpack_require__(/*! ./isInteger */ "./node_modules/lodash/isInteger.js");

/** Used as references for various `Number` constants. */
var MAX_SAFE_INTEGER = 9007199254740991;

/**
 * Checks if `value` is a safe integer. An integer is safe if it's an IEEE-754
 * double precision number which isn't the result of a rounded unsafe integer.
 *
 * **Note:** This method is based on
 * [`Number.isSafeInteger`](https://mdn.io/Number/isSafeInteger).
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a safe integer, else `false`.
 * @example
 *
 * _.isSafeInteger(3);
 * // => true
 *
 * _.isSafeInteger(Number.MIN_VALUE);
 * // => false
 *
 * _.isSafeInteger(Infinity);
 * // => false
 *
 * _.isSafeInteger('3');
 * // => false
 */
function isSafeInteger(value) {
  return isInteger(value) && value >= -MAX_SAFE_INTEGER && value <= MAX_SAFE_INTEGER;
}

module.exports = isSafeInteger;


/***/ }),

/***/ "./node_modules/lodash/isSet.js":
/*!**************************************!*\
  !*** ./node_modules/lodash/isSet.js ***!
  \**************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseIsSet = __webpack_require__(/*! ./_baseIsSet */ "./node_modules/lodash/_baseIsSet.js"),
    baseUnary = __webpack_require__(/*! ./_baseUnary */ "./node_modules/lodash/_baseUnary.js"),
    nodeUtil = __webpack_require__(/*! ./_nodeUtil */ "./node_modules/lodash/_nodeUtil.js");

/* Node.js helper references. */
var nodeIsSet = nodeUtil && nodeUtil.isSet;

/**
 * Checks if `value` is classified as a `Set` object.
 *
 * @static
 * @memberOf _
 * @since 4.3.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a set, else `false`.
 * @example
 *
 * _.isSet(new Set);
 * // => true
 *
 * _.isSet(new WeakSet);
 * // => false
 */
var isSet = nodeIsSet ? baseUnary(nodeIsSet) : baseIsSet;

module.exports = isSet;


/***/ }),

/***/ "./node_modules/lodash/isString.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/isString.js ***!
  \*****************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseGetTag = __webpack_require__(/*! ./_baseGetTag */ "./node_modules/lodash/_baseGetTag.js"),
    isArray = __webpack_require__(/*! ./isArray */ "./node_modules/lodash/isArray.js"),
    isObjectLike = __webpack_require__(/*! ./isObjectLike */ "./node_modules/lodash/isObjectLike.js");

/** `Object#toString` result references. */
var stringTag = '[object String]';

/**
 * Checks if `value` is classified as a `String` primitive or object.
 *
 * @static
 * @since 0.1.0
 * @memberOf _
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a string, else `false`.
 * @example
 *
 * _.isString('abc');
 * // => true
 *
 * _.isString(1);
 * // => false
 */
function isString(value) {
  return typeof value == 'string' ||
    (!isArray(value) && isObjectLike(value) && baseGetTag(value) == stringTag);
}

module.exports = isString;


/***/ }),

/***/ "./node_modules/lodash/isSymbol.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/isSymbol.js ***!
  \*****************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseGetTag = __webpack_require__(/*! ./_baseGetTag */ "./node_modules/lodash/_baseGetTag.js"),
    isObjectLike = __webpack_require__(/*! ./isObjectLike */ "./node_modules/lodash/isObjectLike.js");

/** `Object#toString` result references. */
var symbolTag = '[object Symbol]';

/**
 * Checks if `value` is classified as a `Symbol` primitive or object.
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a symbol, else `false`.
 * @example
 *
 * _.isSymbol(Symbol.iterator);
 * // => true
 *
 * _.isSymbol('abc');
 * // => false
 */
function isSymbol(value) {
  return typeof value == 'symbol' ||
    (isObjectLike(value) && baseGetTag(value) == symbolTag);
}

module.exports = isSymbol;


/***/ }),

/***/ "./node_modules/lodash/isTypedArray.js":
/*!*********************************************!*\
  !*** ./node_modules/lodash/isTypedArray.js ***!
  \*********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseIsTypedArray = __webpack_require__(/*! ./_baseIsTypedArray */ "./node_modules/lodash/_baseIsTypedArray.js"),
    baseUnary = __webpack_require__(/*! ./_baseUnary */ "./node_modules/lodash/_baseUnary.js"),
    nodeUtil = __webpack_require__(/*! ./_nodeUtil */ "./node_modules/lodash/_nodeUtil.js");

/* Node.js helper references. */
var nodeIsTypedArray = nodeUtil && nodeUtil.isTypedArray;

/**
 * Checks if `value` is classified as a typed array.
 *
 * @static
 * @memberOf _
 * @since 3.0.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a typed array, else `false`.
 * @example
 *
 * _.isTypedArray(new Uint8Array);
 * // => true
 *
 * _.isTypedArray([]);
 * // => false
 */
var isTypedArray = nodeIsTypedArray ? baseUnary(nodeIsTypedArray) : baseIsTypedArray;

module.exports = isTypedArray;


/***/ }),

/***/ "./node_modules/lodash/isUndefined.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/isUndefined.js ***!
  \********************************************/
/***/ (function(module) {

/**
 * Checks if `value` is `undefined`.
 *
 * @static
 * @since 0.1.0
 * @memberOf _
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is `undefined`, else `false`.
 * @example
 *
 * _.isUndefined(void 0);
 * // => true
 *
 * _.isUndefined(null);
 * // => false
 */
function isUndefined(value) {
  return value === undefined;
}

module.exports = isUndefined;


/***/ }),

/***/ "./node_modules/lodash/isWeakMap.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/isWeakMap.js ***!
  \******************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var getTag = __webpack_require__(/*! ./_getTag */ "./node_modules/lodash/_getTag.js"),
    isObjectLike = __webpack_require__(/*! ./isObjectLike */ "./node_modules/lodash/isObjectLike.js");

/** `Object#toString` result references. */
var weakMapTag = '[object WeakMap]';

/**
 * Checks if `value` is classified as a `WeakMap` object.
 *
 * @static
 * @memberOf _
 * @since 4.3.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a weak map, else `false`.
 * @example
 *
 * _.isWeakMap(new WeakMap);
 * // => true
 *
 * _.isWeakMap(new Map);
 * // => false
 */
function isWeakMap(value) {
  return isObjectLike(value) && getTag(value) == weakMapTag;
}

module.exports = isWeakMap;


/***/ }),

/***/ "./node_modules/lodash/isWeakSet.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/isWeakSet.js ***!
  \******************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseGetTag = __webpack_require__(/*! ./_baseGetTag */ "./node_modules/lodash/_baseGetTag.js"),
    isObjectLike = __webpack_require__(/*! ./isObjectLike */ "./node_modules/lodash/isObjectLike.js");

/** `Object#toString` result references. */
var weakSetTag = '[object WeakSet]';

/**
 * Checks if `value` is classified as a `WeakSet` object.
 *
 * @static
 * @memberOf _
 * @since 4.3.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a weak set, else `false`.
 * @example
 *
 * _.isWeakSet(new WeakSet);
 * // => true
 *
 * _.isWeakSet(new Set);
 * // => false
 */
function isWeakSet(value) {
  return isObjectLike(value) && baseGetTag(value) == weakSetTag;
}

module.exports = isWeakSet;


/***/ }),

/***/ "./node_modules/lodash/keys.js":
/*!*************************************!*\
  !*** ./node_modules/lodash/keys.js ***!
  \*************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var arrayLikeKeys = __webpack_require__(/*! ./_arrayLikeKeys */ "./node_modules/lodash/_arrayLikeKeys.js"),
    baseKeys = __webpack_require__(/*! ./_baseKeys */ "./node_modules/lodash/_baseKeys.js"),
    isArrayLike = __webpack_require__(/*! ./isArrayLike */ "./node_modules/lodash/isArrayLike.js");

/**
 * Creates an array of the own enumerable property names of `object`.
 *
 * **Note:** Non-object values are coerced to objects. See the
 * [ES spec](http://ecma-international.org/ecma-262/7.0/#sec-object.keys)
 * for more details.
 *
 * @static
 * @since 0.1.0
 * @memberOf _
 * @category Object
 * @param {Object} object The object to query.
 * @returns {Array} Returns the array of property names.
 * @example
 *
 * function Foo() {
 *   this.a = 1;
 *   this.b = 2;
 * }
 *
 * Foo.prototype.c = 3;
 *
 * _.keys(new Foo);
 * // => ['a', 'b'] (iteration order is not guaranteed)
 *
 * _.keys('hi');
 * // => ['0', '1']
 */
function keys(object) {
  return isArrayLike(object) ? arrayLikeKeys(object) : baseKeys(object);
}

module.exports = keys;


/***/ }),

/***/ "./node_modules/lodash/keysIn.js":
/*!***************************************!*\
  !*** ./node_modules/lodash/keysIn.js ***!
  \***************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var arrayLikeKeys = __webpack_require__(/*! ./_arrayLikeKeys */ "./node_modules/lodash/_arrayLikeKeys.js"),
    baseKeysIn = __webpack_require__(/*! ./_baseKeysIn */ "./node_modules/lodash/_baseKeysIn.js"),
    isArrayLike = __webpack_require__(/*! ./isArrayLike */ "./node_modules/lodash/isArrayLike.js");

/**
 * Creates an array of the own and inherited enumerable property names of `object`.
 *
 * **Note:** Non-object values are coerced to objects.
 *
 * @static
 * @memberOf _
 * @since 3.0.0
 * @category Object
 * @param {Object} object The object to query.
 * @returns {Array} Returns the array of property names.
 * @example
 *
 * function Foo() {
 *   this.a = 1;
 *   this.b = 2;
 * }
 *
 * Foo.prototype.c = 3;
 *
 * _.keysIn(new Foo);
 * // => ['a', 'b', 'c'] (iteration order is not guaranteed)
 */
function keysIn(object) {
  return isArrayLike(object) ? arrayLikeKeys(object, true) : baseKeysIn(object);
}

module.exports = keysIn;


/***/ }),

/***/ "./node_modules/lodash/lang.js":
/*!*************************************!*\
  !*** ./node_modules/lodash/lang.js ***!
  \*************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

module.exports = {
  'castArray': __webpack_require__(/*! ./castArray */ "./node_modules/lodash/castArray.js"),
  'clone': __webpack_require__(/*! ./clone */ "./node_modules/lodash/clone.js"),
  'cloneDeep': __webpack_require__(/*! ./cloneDeep */ "./node_modules/lodash/cloneDeep.js"),
  'cloneDeepWith': __webpack_require__(/*! ./cloneDeepWith */ "./node_modules/lodash/cloneDeepWith.js"),
  'cloneWith': __webpack_require__(/*! ./cloneWith */ "./node_modules/lodash/cloneWith.js"),
  'conformsTo': __webpack_require__(/*! ./conformsTo */ "./node_modules/lodash/conformsTo.js"),
  'eq': __webpack_require__(/*! ./eq */ "./node_modules/lodash/eq.js"),
  'gt': __webpack_require__(/*! ./gt */ "./node_modules/lodash/gt.js"),
  'gte': __webpack_require__(/*! ./gte */ "./node_modules/lodash/gte.js"),
  'isArguments': __webpack_require__(/*! ./isArguments */ "./node_modules/lodash/isArguments.js"),
  'isArray': __webpack_require__(/*! ./isArray */ "./node_modules/lodash/isArray.js"),
  'isArrayBuffer': __webpack_require__(/*! ./isArrayBuffer */ "./node_modules/lodash/isArrayBuffer.js"),
  'isArrayLike': __webpack_require__(/*! ./isArrayLike */ "./node_modules/lodash/isArrayLike.js"),
  'isArrayLikeObject': __webpack_require__(/*! ./isArrayLikeObject */ "./node_modules/lodash/isArrayLikeObject.js"),
  'isBoolean': __webpack_require__(/*! ./isBoolean */ "./node_modules/lodash/isBoolean.js"),
  'isBuffer': __webpack_require__(/*! ./isBuffer */ "./node_modules/lodash/isBuffer.js"),
  'isDate': __webpack_require__(/*! ./isDate */ "./node_modules/lodash/isDate.js"),
  'isElement': __webpack_require__(/*! ./isElement */ "./node_modules/lodash/isElement.js"),
  'isEmpty': __webpack_require__(/*! ./isEmpty */ "./node_modules/lodash/isEmpty.js"),
  'isEqual': __webpack_require__(/*! ./isEqual */ "./node_modules/lodash/isEqual.js"),
  'isEqualWith': __webpack_require__(/*! ./isEqualWith */ "./node_modules/lodash/isEqualWith.js"),
  'isError': __webpack_require__(/*! ./isError */ "./node_modules/lodash/isError.js"),
  'isFinite': __webpack_require__(/*! ./isFinite */ "./node_modules/lodash/isFinite.js"),
  'isFunction': __webpack_require__(/*! ./isFunction */ "./node_modules/lodash/isFunction.js"),
  'isInteger': __webpack_require__(/*! ./isInteger */ "./node_modules/lodash/isInteger.js"),
  'isLength': __webpack_require__(/*! ./isLength */ "./node_modules/lodash/isLength.js"),
  'isMap': __webpack_require__(/*! ./isMap */ "./node_modules/lodash/isMap.js"),
  'isMatch': __webpack_require__(/*! ./isMatch */ "./node_modules/lodash/isMatch.js"),
  'isMatchWith': __webpack_require__(/*! ./isMatchWith */ "./node_modules/lodash/isMatchWith.js"),
  'isNaN': __webpack_require__(/*! ./isNaN */ "./node_modules/lodash/isNaN.js"),
  'isNative': __webpack_require__(/*! ./isNative */ "./node_modules/lodash/isNative.js"),
  'isNil': __webpack_require__(/*! ./isNil */ "./node_modules/lodash/isNil.js"),
  'isNull': __webpack_require__(/*! ./isNull */ "./node_modules/lodash/isNull.js"),
  'isNumber': __webpack_require__(/*! ./isNumber */ "./node_modules/lodash/isNumber.js"),
  'isObject': __webpack_require__(/*! ./isObject */ "./node_modules/lodash/isObject.js"),
  'isObjectLike': __webpack_require__(/*! ./isObjectLike */ "./node_modules/lodash/isObjectLike.js"),
  'isPlainObject': __webpack_require__(/*! ./isPlainObject */ "./node_modules/lodash/isPlainObject.js"),
  'isRegExp': __webpack_require__(/*! ./isRegExp */ "./node_modules/lodash/isRegExp.js"),
  'isSafeInteger': __webpack_require__(/*! ./isSafeInteger */ "./node_modules/lodash/isSafeInteger.js"),
  'isSet': __webpack_require__(/*! ./isSet */ "./node_modules/lodash/isSet.js"),
  'isString': __webpack_require__(/*! ./isString */ "./node_modules/lodash/isString.js"),
  'isSymbol': __webpack_require__(/*! ./isSymbol */ "./node_modules/lodash/isSymbol.js"),
  'isTypedArray': __webpack_require__(/*! ./isTypedArray */ "./node_modules/lodash/isTypedArray.js"),
  'isUndefined': __webpack_require__(/*! ./isUndefined */ "./node_modules/lodash/isUndefined.js"),
  'isWeakMap': __webpack_require__(/*! ./isWeakMap */ "./node_modules/lodash/isWeakMap.js"),
  'isWeakSet': __webpack_require__(/*! ./isWeakSet */ "./node_modules/lodash/isWeakSet.js"),
  'lt': __webpack_require__(/*! ./lt */ "./node_modules/lodash/lt.js"),
  'lte': __webpack_require__(/*! ./lte */ "./node_modules/lodash/lte.js"),
  'toArray': __webpack_require__(/*! ./toArray */ "./node_modules/lodash/toArray.js"),
  'toFinite': __webpack_require__(/*! ./toFinite */ "./node_modules/lodash/toFinite.js"),
  'toInteger': __webpack_require__(/*! ./toInteger */ "./node_modules/lodash/toInteger.js"),
  'toLength': __webpack_require__(/*! ./toLength */ "./node_modules/lodash/toLength.js"),
  'toNumber': __webpack_require__(/*! ./toNumber */ "./node_modules/lodash/toNumber.js"),
  'toPlainObject': __webpack_require__(/*! ./toPlainObject */ "./node_modules/lodash/toPlainObject.js"),
  'toSafeInteger': __webpack_require__(/*! ./toSafeInteger */ "./node_modules/lodash/toSafeInteger.js"),
  'toString': __webpack_require__(/*! ./toString */ "./node_modules/lodash/toString.js")
};


/***/ }),

/***/ "./node_modules/lodash/lt.js":
/*!***********************************!*\
  !*** ./node_modules/lodash/lt.js ***!
  \***********************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseLt = __webpack_require__(/*! ./_baseLt */ "./node_modules/lodash/_baseLt.js"),
    createRelationalOperation = __webpack_require__(/*! ./_createRelationalOperation */ "./node_modules/lodash/_createRelationalOperation.js");

/**
 * Checks if `value` is less than `other`.
 *
 * @static
 * @memberOf _
 * @since 3.9.0
 * @category Lang
 * @param {*} value The value to compare.
 * @param {*} other The other value to compare.
 * @returns {boolean} Returns `true` if `value` is less than `other`,
 *  else `false`.
 * @see _.gt
 * @example
 *
 * _.lt(1, 3);
 * // => true
 *
 * _.lt(3, 3);
 * // => false
 *
 * _.lt(3, 1);
 * // => false
 */
var lt = createRelationalOperation(baseLt);

module.exports = lt;


/***/ }),

/***/ "./node_modules/lodash/lte.js":
/*!************************************!*\
  !*** ./node_modules/lodash/lte.js ***!
  \************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var createRelationalOperation = __webpack_require__(/*! ./_createRelationalOperation */ "./node_modules/lodash/_createRelationalOperation.js");

/**
 * Checks if `value` is less than or equal to `other`.
 *
 * @static
 * @memberOf _
 * @since 3.9.0
 * @category Lang
 * @param {*} value The value to compare.
 * @param {*} other The other value to compare.
 * @returns {boolean} Returns `true` if `value` is less than or equal to
 *  `other`, else `false`.
 * @see _.gte
 * @example
 *
 * _.lte(1, 3);
 * // => true
 *
 * _.lte(3, 3);
 * // => true
 *
 * _.lte(3, 1);
 * // => false
 */
var lte = createRelationalOperation(function(value, other) {
  return value <= other;
});

module.exports = lte;


/***/ }),

/***/ "./node_modules/lodash/stubArray.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/stubArray.js ***!
  \******************************************/
/***/ (function(module) {

/**
 * This method returns a new empty array.
 *
 * @static
 * @memberOf _
 * @since 4.13.0
 * @category Util
 * @returns {Array} Returns the new empty array.
 * @example
 *
 * var arrays = _.times(2, _.stubArray);
 *
 * console.log(arrays);
 * // => [[], []]
 *
 * console.log(arrays[0] === arrays[1]);
 * // => false
 */
function stubArray() {
  return [];
}

module.exports = stubArray;


/***/ }),

/***/ "./node_modules/lodash/stubFalse.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/stubFalse.js ***!
  \******************************************/
/***/ (function(module) {

/**
 * This method returns `false`.
 *
 * @static
 * @memberOf _
 * @since 4.13.0
 * @category Util
 * @returns {boolean} Returns `false`.
 * @example
 *
 * _.times(2, _.stubFalse);
 * // => [false, false]
 */
function stubFalse() {
  return false;
}

module.exports = stubFalse;


/***/ }),

/***/ "./node_modules/lodash/toArray.js":
/*!****************************************!*\
  !*** ./node_modules/lodash/toArray.js ***!
  \****************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var Symbol = __webpack_require__(/*! ./_Symbol */ "./node_modules/lodash/_Symbol.js"),
    copyArray = __webpack_require__(/*! ./_copyArray */ "./node_modules/lodash/_copyArray.js"),
    getTag = __webpack_require__(/*! ./_getTag */ "./node_modules/lodash/_getTag.js"),
    isArrayLike = __webpack_require__(/*! ./isArrayLike */ "./node_modules/lodash/isArrayLike.js"),
    isString = __webpack_require__(/*! ./isString */ "./node_modules/lodash/isString.js"),
    iteratorToArray = __webpack_require__(/*! ./_iteratorToArray */ "./node_modules/lodash/_iteratorToArray.js"),
    mapToArray = __webpack_require__(/*! ./_mapToArray */ "./node_modules/lodash/_mapToArray.js"),
    setToArray = __webpack_require__(/*! ./_setToArray */ "./node_modules/lodash/_setToArray.js"),
    stringToArray = __webpack_require__(/*! ./_stringToArray */ "./node_modules/lodash/_stringToArray.js"),
    values = __webpack_require__(/*! ./values */ "./node_modules/lodash/values.js");

/** `Object#toString` result references. */
var mapTag = '[object Map]',
    setTag = '[object Set]';

/** Built-in value references. */
var symIterator = Symbol ? Symbol.iterator : undefined;

/**
 * Converts `value` to an array.
 *
 * @static
 * @since 0.1.0
 * @memberOf _
 * @category Lang
 * @param {*} value The value to convert.
 * @returns {Array} Returns the converted array.
 * @example
 *
 * _.toArray({ 'a': 1, 'b': 2 });
 * // => [1, 2]
 *
 * _.toArray('abc');
 * // => ['a', 'b', 'c']
 *
 * _.toArray(1);
 * // => []
 *
 * _.toArray(null);
 * // => []
 */
function toArray(value) {
  if (!value) {
    return [];
  }
  if (isArrayLike(value)) {
    return isString(value) ? stringToArray(value) : copyArray(value);
  }
  if (symIterator && value[symIterator]) {
    return iteratorToArray(value[symIterator]());
  }
  var tag = getTag(value),
      func = tag == mapTag ? mapToArray : (tag == setTag ? setToArray : values);

  return func(value);
}

module.exports = toArray;


/***/ }),

/***/ "./node_modules/lodash/toFinite.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/toFinite.js ***!
  \*****************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var toNumber = __webpack_require__(/*! ./toNumber */ "./node_modules/lodash/toNumber.js");

/** Used as references for various `Number` constants. */
var INFINITY = 1 / 0,
    MAX_INTEGER = 1.7976931348623157e+308;

/**
 * Converts `value` to a finite number.
 *
 * @static
 * @memberOf _
 * @since 4.12.0
 * @category Lang
 * @param {*} value The value to convert.
 * @returns {number} Returns the converted number.
 * @example
 *
 * _.toFinite(3.2);
 * // => 3.2
 *
 * _.toFinite(Number.MIN_VALUE);
 * // => 5e-324
 *
 * _.toFinite(Infinity);
 * // => 1.7976931348623157e+308
 *
 * _.toFinite('3.2');
 * // => 3.2
 */
function toFinite(value) {
  if (!value) {
    return value === 0 ? value : 0;
  }
  value = toNumber(value);
  if (value === INFINITY || value === -INFINITY) {
    var sign = (value < 0 ? -1 : 1);
    return sign * MAX_INTEGER;
  }
  return value === value ? value : 0;
}

module.exports = toFinite;


/***/ }),

/***/ "./node_modules/lodash/toInteger.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/toInteger.js ***!
  \******************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var toFinite = __webpack_require__(/*! ./toFinite */ "./node_modules/lodash/toFinite.js");

/**
 * Converts `value` to an integer.
 *
 * **Note:** This method is loosely based on
 * [`ToInteger`](http://www.ecma-international.org/ecma-262/7.0/#sec-tointeger).
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to convert.
 * @returns {number} Returns the converted integer.
 * @example
 *
 * _.toInteger(3.2);
 * // => 3
 *
 * _.toInteger(Number.MIN_VALUE);
 * // => 0
 *
 * _.toInteger(Infinity);
 * // => 1.7976931348623157e+308
 *
 * _.toInteger('3.2');
 * // => 3
 */
function toInteger(value) {
  var result = toFinite(value),
      remainder = result % 1;

  return result === result ? (remainder ? result - remainder : result) : 0;
}

module.exports = toInteger;


/***/ }),

/***/ "./node_modules/lodash/toLength.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/toLength.js ***!
  \*****************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseClamp = __webpack_require__(/*! ./_baseClamp */ "./node_modules/lodash/_baseClamp.js"),
    toInteger = __webpack_require__(/*! ./toInteger */ "./node_modules/lodash/toInteger.js");

/** Used as references for the maximum length and index of an array. */
var MAX_ARRAY_LENGTH = 4294967295;

/**
 * Converts `value` to an integer suitable for use as the length of an
 * array-like object.
 *
 * **Note:** This method is based on
 * [`ToLength`](http://ecma-international.org/ecma-262/7.0/#sec-tolength).
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to convert.
 * @returns {number} Returns the converted integer.
 * @example
 *
 * _.toLength(3.2);
 * // => 3
 *
 * _.toLength(Number.MIN_VALUE);
 * // => 0
 *
 * _.toLength(Infinity);
 * // => 4294967295
 *
 * _.toLength('3.2');
 * // => 3
 */
function toLength(value) {
  return value ? baseClamp(toInteger(value), 0, MAX_ARRAY_LENGTH) : 0;
}

module.exports = toLength;


/***/ }),

/***/ "./node_modules/lodash/toNumber.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/toNumber.js ***!
  \*****************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseTrim = __webpack_require__(/*! ./_baseTrim */ "./node_modules/lodash/_baseTrim.js"),
    isObject = __webpack_require__(/*! ./isObject */ "./node_modules/lodash/isObject.js"),
    isSymbol = __webpack_require__(/*! ./isSymbol */ "./node_modules/lodash/isSymbol.js");

/** Used as references for various `Number` constants. */
var NAN = 0 / 0;

/** Used to detect bad signed hexadecimal string values. */
var reIsBadHex = /^[-+]0x[0-9a-f]+$/i;

/** Used to detect binary string values. */
var reIsBinary = /^0b[01]+$/i;

/** Used to detect octal string values. */
var reIsOctal = /^0o[0-7]+$/i;

/** Built-in method references without a dependency on `root`. */
var freeParseInt = parseInt;

/**
 * Converts `value` to a number.
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to process.
 * @returns {number} Returns the number.
 * @example
 *
 * _.toNumber(3.2);
 * // => 3.2
 *
 * _.toNumber(Number.MIN_VALUE);
 * // => 5e-324
 *
 * _.toNumber(Infinity);
 * // => Infinity
 *
 * _.toNumber('3.2');
 * // => 3.2
 */
function toNumber(value) {
  if (typeof value == 'number') {
    return value;
  }
  if (isSymbol(value)) {
    return NAN;
  }
  if (isObject(value)) {
    var other = typeof value.valueOf == 'function' ? value.valueOf() : value;
    value = isObject(other) ? (other + '') : other;
  }
  if (typeof value != 'string') {
    return value === 0 ? value : +value;
  }
  value = baseTrim(value);
  var isBinary = reIsBinary.test(value);
  return (isBinary || reIsOctal.test(value))
    ? freeParseInt(value.slice(2), isBinary ? 2 : 8)
    : (reIsBadHex.test(value) ? NAN : +value);
}

module.exports = toNumber;


/***/ }),

/***/ "./node_modules/lodash/toPlainObject.js":
/*!**********************************************!*\
  !*** ./node_modules/lodash/toPlainObject.js ***!
  \**********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var copyObject = __webpack_require__(/*! ./_copyObject */ "./node_modules/lodash/_copyObject.js"),
    keysIn = __webpack_require__(/*! ./keysIn */ "./node_modules/lodash/keysIn.js");

/**
 * Converts `value` to a plain object flattening inherited enumerable string
 * keyed properties of `value` to own properties of the plain object.
 *
 * @static
 * @memberOf _
 * @since 3.0.0
 * @category Lang
 * @param {*} value The value to convert.
 * @returns {Object} Returns the converted plain object.
 * @example
 *
 * function Foo() {
 *   this.b = 2;
 * }
 *
 * Foo.prototype.c = 3;
 *
 * _.assign({ 'a': 1 }, new Foo);
 * // => { 'a': 1, 'b': 2 }
 *
 * _.assign({ 'a': 1 }, _.toPlainObject(new Foo));
 * // => { 'a': 1, 'b': 2, 'c': 3 }
 */
function toPlainObject(value) {
  return copyObject(value, keysIn(value));
}

module.exports = toPlainObject;


/***/ }),

/***/ "./node_modules/lodash/toSafeInteger.js":
/*!**********************************************!*\
  !*** ./node_modules/lodash/toSafeInteger.js ***!
  \**********************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseClamp = __webpack_require__(/*! ./_baseClamp */ "./node_modules/lodash/_baseClamp.js"),
    toInteger = __webpack_require__(/*! ./toInteger */ "./node_modules/lodash/toInteger.js");

/** Used as references for various `Number` constants. */
var MAX_SAFE_INTEGER = 9007199254740991;

/**
 * Converts `value` to a safe integer. A safe integer can be compared and
 * represented correctly.
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to convert.
 * @returns {number} Returns the converted integer.
 * @example
 *
 * _.toSafeInteger(3.2);
 * // => 3
 *
 * _.toSafeInteger(Number.MIN_VALUE);
 * // => 0
 *
 * _.toSafeInteger(Infinity);
 * // => 9007199254740991
 *
 * _.toSafeInteger('3.2');
 * // => 3
 */
function toSafeInteger(value) {
  return value
    ? baseClamp(toInteger(value), -MAX_SAFE_INTEGER, MAX_SAFE_INTEGER)
    : (value === 0 ? value : 0);
}

module.exports = toSafeInteger;


/***/ }),

/***/ "./node_modules/lodash/toString.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/toString.js ***!
  \*****************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseToString = __webpack_require__(/*! ./_baseToString */ "./node_modules/lodash/_baseToString.js");

/**
 * Converts `value` to a string. An empty string is returned for `null`
 * and `undefined` values. The sign of `-0` is preserved.
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to convert.
 * @returns {string} Returns the converted string.
 * @example
 *
 * _.toString(null);
 * // => ''
 *
 * _.toString(-0);
 * // => '-0'
 *
 * _.toString([1, 2, 3]);
 * // => '1,2,3'
 */
function toString(value) {
  return value == null ? '' : baseToString(value);
}

module.exports = toString;


/***/ }),

/***/ "./node_modules/lodash/values.js":
/*!***************************************!*\
  !*** ./node_modules/lodash/values.js ***!
  \***************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var baseValues = __webpack_require__(/*! ./_baseValues */ "./node_modules/lodash/_baseValues.js"),
    keys = __webpack_require__(/*! ./keys */ "./node_modules/lodash/keys.js");

/**
 * Creates an array of the own enumerable string keyed property values of `object`.
 *
 * **Note:** Non-object values are coerced to objects.
 *
 * @static
 * @since 0.1.0
 * @memberOf _
 * @category Object
 * @param {Object} object The object to query.
 * @returns {Array} Returns the array of property values.
 * @example
 *
 * function Foo() {
 *   this.a = 1;
 *   this.b = 2;
 * }
 *
 * Foo.prototype.c = 3;
 *
 * _.values(new Foo);
 * // => [1, 2] (iteration order is not guaranteed)
 *
 * _.values('hi');
 * // => ['h', 'i']
 */
function values(object) {
  return object == null ? [] : baseValues(object, keys(object));
}

module.exports = values;


/***/ }),

/***/ "./node_modules/qrcode.vue/dist/qrcode.vue.esm.js":
/*!********************************************************!*\
  !*** ./node_modules/qrcode.vue/dist/qrcode.vue.esm.js ***!
  \********************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
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

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/Challenge.vue?vue&type=style&index=0&id=6a184f0c&scoped=true&lang=css&":
/*!**********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/Challenge.vue?vue&type=style&index=0&id=6a184f0c&scoped=true&lang=css& ***!
  \**********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Challenge_vue_vue_type_style_index_0_id_6a184f0c_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Challenge.vue?vue&type=style&index=0&id=6a184f0c&scoped=true&lang=css& */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/Challenge.vue?vue&type=style&index=0&id=6a184f0c&scoped=true&lang=css&");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Challenge_vue_vue_type_style_index_0_id_6a184f0c_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"], options);



/* harmony default export */ __webpack_exports__["default"] = (_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Challenge_vue_vue_type_style_index_0_id_6a184f0c_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"].locals || {});

/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/Chat.vue?vue&type=style&index=0&id=4c9c3884&scoped=true&lang=css&":
/*!******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/Chat.vue?vue&type=style&index=0&id=4c9c3884&scoped=true&lang=css& ***!
  \******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Chat_vue_vue_type_style_index_0_id_4c9c3884_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Chat.vue?vue&type=style&index=0&id=4c9c3884&scoped=true&lang=css& */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/Chat.vue?vue&type=style&index=0&id=4c9c3884&scoped=true&lang=css&");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Chat_vue_vue_type_style_index_0_id_4c9c3884_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"], options);



/* harmony default export */ __webpack_exports__["default"] = (_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Chat_vue_vue_type_style_index_0_id_4c9c3884_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"].locals || {});

/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/moderator/info.vue?vue&type=style&index=0&lang=css&":
/*!****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/moderator/info.vue?vue&type=style&index=0&lang=css& ***!
  \****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_info_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./info.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/moderator/info.vue?vue&type=style&index=0&lang=css&");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_info_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"], options);



/* harmony default export */ __webpack_exports__["default"] = (_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_info_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"].locals || {});

/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/practice/resultdetails.vue?vue&type=style&index=0&lang=css&":
/*!************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/practice/resultdetails.vue?vue&type=style&index=0&lang=css& ***!
  \************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
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

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/waiting.vue?vue&type=style&index=0&lang=css&":
/*!*********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/waiting.vue?vue&type=style&index=0&lang=css& ***!
  \*********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
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

/***/ "./resources/js/components/games/Challenge.vue":
/*!*****************************************************!*\
  !*** ./resources/js/components/games/Challenge.vue ***!
  \*****************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Challenge_vue_vue_type_template_id_6a184f0c_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Challenge.vue?vue&type=template&id=6a184f0c&scoped=true& */ "./resources/js/components/games/Challenge.vue?vue&type=template&id=6a184f0c&scoped=true&");
/* harmony import */ var _Challenge_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Challenge.vue?vue&type=script&lang=js& */ "./resources/js/components/games/Challenge.vue?vue&type=script&lang=js&");
/* harmony import */ var _Challenge_vue_vue_type_style_index_0_id_6a184f0c_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Challenge.vue?vue&type=style&index=0&id=6a184f0c&scoped=true&lang=css& */ "./resources/js/components/games/Challenge.vue?vue&type=style&index=0&id=6a184f0c&scoped=true&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");



;


/* normalize component */

var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _Challenge_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Challenge_vue_vue_type_template_id_6a184f0c_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render,
  _Challenge_vue_vue_type_template_id_6a184f0c_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  "6a184f0c",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/games/Challenge.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/helper/Chat.vue":
/*!*************************************************!*\
  !*** ./resources/js/components/helper/Chat.vue ***!
  \*************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Chat_vue_vue_type_template_id_4c9c3884_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Chat.vue?vue&type=template&id=4c9c3884&scoped=true& */ "./resources/js/components/helper/Chat.vue?vue&type=template&id=4c9c3884&scoped=true&");
/* harmony import */ var _Chat_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Chat.vue?vue&type=script&lang=js& */ "./resources/js/components/helper/Chat.vue?vue&type=script&lang=js&");
/* harmony import */ var _Chat_vue_vue_type_style_index_0_id_4c9c3884_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Chat.vue?vue&type=style&index=0&id=4c9c3884&scoped=true&lang=css& */ "./resources/js/components/helper/Chat.vue?vue&type=style&index=0&id=4c9c3884&scoped=true&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");



;


/* normalize component */

var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _Chat_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Chat_vue_vue_type_template_id_4c9c3884_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render,
  _Chat_vue_vue_type_template_id_4c9c3884_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  "4c9c3884",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/helper/Chat.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/helper/moderator/info.vue":
/*!***********************************************************!*\
  !*** ./resources/js/components/helper/moderator/info.vue ***!
  \***********************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _info_vue_vue_type_template_id_d558f384___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./info.vue?vue&type=template&id=d558f384& */ "./resources/js/components/helper/moderator/info.vue?vue&type=template&id=d558f384&");
/* harmony import */ var _info_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./info.vue?vue&type=script&lang=js& */ "./resources/js/components/helper/moderator/info.vue?vue&type=script&lang=js&");
/* harmony import */ var _info_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./info.vue?vue&type=style&index=0&lang=css& */ "./resources/js/components/helper/moderator/info.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! !../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");



;


/* normalize component */

var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _info_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _info_vue_vue_type_template_id_d558f384___WEBPACK_IMPORTED_MODULE_0__.render,
  _info_vue_vue_type_template_id_d558f384___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/helper/moderator/info.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/helper/practice/resultdetails.vue":
/*!*******************************************************************!*\
  !*** ./resources/js/components/helper/practice/resultdetails.vue ***!
  \*******************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
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

/***/ "./resources/js/components/helper/result.vue":
/*!***************************************************!*\
  !*** ./resources/js/components/helper/result.vue ***!
  \***************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
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

"use strict";
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

/***/ "./resources/js/components/games/Challenge.vue?vue&type=script&lang=js&":
/*!******************************************************************************!*\
  !*** ./resources/js/components/games/Challenge.vue?vue&type=script&lang=js& ***!
  \******************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Challenge_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Challenge.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/Challenge.vue?vue&type=script&lang=js&");
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Challenge_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/helper/Chat.vue?vue&type=script&lang=js&":
/*!**************************************************************************!*\
  !*** ./resources/js/components/helper/Chat.vue?vue&type=script&lang=js& ***!
  \**************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Chat_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Chat.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/Chat.vue?vue&type=script&lang=js&");
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Chat_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/helper/moderator/info.vue?vue&type=script&lang=js&":
/*!************************************************************************************!*\
  !*** ./resources/js/components/helper/moderator/info.vue?vue&type=script&lang=js& ***!
  \************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_info_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./info.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/moderator/info.vue?vue&type=script&lang=js&");
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_info_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/helper/practice/resultdetails.vue?vue&type=script&lang=js&":
/*!********************************************************************************************!*\
  !*** ./resources/js/components/helper/practice/resultdetails.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_resultdetails_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./resultdetails.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/practice/resultdetails.vue?vue&type=script&lang=js&");
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_resultdetails_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/helper/result.vue?vue&type=script&lang=js&":
/*!****************************************************************************!*\
  !*** ./resources/js/components/helper/result.vue?vue&type=script&lang=js& ***!
  \****************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_result_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./result.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/result.vue?vue&type=script&lang=js&");
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_result_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/helper/waiting.vue?vue&type=script&lang=js&":
/*!*****************************************************************************!*\
  !*** ./resources/js/components/helper/waiting.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_waiting_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./waiting.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/waiting.vue?vue&type=script&lang=js&");
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_waiting_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/games/Challenge.vue?vue&type=style&index=0&id=6a184f0c&scoped=true&lang=css&":
/*!**************************************************************************************************************!*\
  !*** ./resources/js/components/games/Challenge.vue?vue&type=style&index=0&id=6a184f0c&scoped=true&lang=css& ***!
  \**************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Challenge_vue_vue_type_style_index_0_id_6a184f0c_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader/dist/cjs.js!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Challenge.vue?vue&type=style&index=0&id=6a184f0c&scoped=true&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/Challenge.vue?vue&type=style&index=0&id=6a184f0c&scoped=true&lang=css&");


/***/ }),

/***/ "./resources/js/components/helper/Chat.vue?vue&type=style&index=0&id=4c9c3884&scoped=true&lang=css&":
/*!**********************************************************************************************************!*\
  !*** ./resources/js/components/helper/Chat.vue?vue&type=style&index=0&id=4c9c3884&scoped=true&lang=css& ***!
  \**********************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Chat_vue_vue_type_style_index_0_id_4c9c3884_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader/dist/cjs.js!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Chat.vue?vue&type=style&index=0&id=4c9c3884&scoped=true&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/Chat.vue?vue&type=style&index=0&id=4c9c3884&scoped=true&lang=css&");


/***/ }),

/***/ "./resources/js/components/helper/moderator/info.vue?vue&type=style&index=0&lang=css&":
/*!********************************************************************************************!*\
  !*** ./resources/js/components/helper/moderator/info.vue?vue&type=style&index=0&lang=css& ***!
  \********************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_info_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/style-loader/dist/cjs.js!../../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./info.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/moderator/info.vue?vue&type=style&index=0&lang=css&");


/***/ }),

/***/ "./resources/js/components/helper/practice/resultdetails.vue?vue&type=style&index=0&lang=css&":
/*!****************************************************************************************************!*\
  !*** ./resources/js/components/helper/practice/resultdetails.vue?vue&type=style&index=0&lang=css& ***!
  \****************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_resultdetails_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/style-loader/dist/cjs.js!../../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./resultdetails.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/practice/resultdetails.vue?vue&type=style&index=0&lang=css&");


/***/ }),

/***/ "./resources/js/components/helper/waiting.vue?vue&type=style&index=0&lang=css&":
/*!*************************************************************************************!*\
  !*** ./resources/js/components/helper/waiting.vue?vue&type=style&index=0&lang=css& ***!
  \*************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_waiting_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader/dist/cjs.js!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./waiting.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/waiting.vue?vue&type=style&index=0&lang=css&");


/***/ }),

/***/ "./resources/js/components/games/Challenge.vue?vue&type=template&id=6a184f0c&scoped=true&":
/*!************************************************************************************************!*\
  !*** ./resources/js/components/games/Challenge.vue?vue&type=template&id=6a184f0c&scoped=true& ***!
  \************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Challenge_vue_vue_type_template_id_6a184f0c_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render; },
/* harmony export */   "staticRenderFns": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Challenge_vue_vue_type_template_id_6a184f0c_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns; }
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Challenge_vue_vue_type_template_id_6a184f0c_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Challenge.vue?vue&type=template&id=6a184f0c&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/Challenge.vue?vue&type=template&id=6a184f0c&scoped=true&");


/***/ }),

/***/ "./resources/js/components/helper/Chat.vue?vue&type=template&id=4c9c3884&scoped=true&":
/*!********************************************************************************************!*\
  !*** ./resources/js/components/helper/Chat.vue?vue&type=template&id=4c9c3884&scoped=true& ***!
  \********************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Chat_vue_vue_type_template_id_4c9c3884_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render; },
/* harmony export */   "staticRenderFns": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Chat_vue_vue_type_template_id_4c9c3884_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns; }
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Chat_vue_vue_type_template_id_4c9c3884_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Chat.vue?vue&type=template&id=4c9c3884&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/Chat.vue?vue&type=template&id=4c9c3884&scoped=true&");


/***/ }),

/***/ "./resources/js/components/helper/moderator/info.vue?vue&type=template&id=d558f384&":
/*!******************************************************************************************!*\
  !*** ./resources/js/components/helper/moderator/info.vue?vue&type=template&id=d558f384& ***!
  \******************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_info_vue_vue_type_template_id_d558f384___WEBPACK_IMPORTED_MODULE_0__.render; },
/* harmony export */   "staticRenderFns": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_info_vue_vue_type_template_id_d558f384___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns; }
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_info_vue_vue_type_template_id_d558f384___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./info.vue?vue&type=template&id=d558f384& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/moderator/info.vue?vue&type=template&id=d558f384&");


/***/ }),

/***/ "./resources/js/components/helper/practice/resultdetails.vue?vue&type=template&id=e17e6c12&":
/*!**************************************************************************************************!*\
  !*** ./resources/js/components/helper/practice/resultdetails.vue?vue&type=template&id=e17e6c12& ***!
  \**************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_resultdetails_vue_vue_type_template_id_e17e6c12___WEBPACK_IMPORTED_MODULE_0__.render; },
/* harmony export */   "staticRenderFns": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_resultdetails_vue_vue_type_template_id_e17e6c12___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns; }
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_resultdetails_vue_vue_type_template_id_e17e6c12___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./resultdetails.vue?vue&type=template&id=e17e6c12& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/practice/resultdetails.vue?vue&type=template&id=e17e6c12&");


/***/ }),

/***/ "./resources/js/components/helper/result.vue?vue&type=template&id=3dc21663&":
/*!**********************************************************************************!*\
  !*** ./resources/js/components/helper/result.vue?vue&type=template&id=3dc21663& ***!
  \**********************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
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

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_waiting_vue_vue_type_template_id_8d50a412___WEBPACK_IMPORTED_MODULE_0__.render; },
/* harmony export */   "staticRenderFns": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_waiting_vue_vue_type_template_id_8d50a412___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns; }
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_waiting_vue_vue_type_template_id_8d50a412___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./waiting.vue?vue&type=template&id=8d50a412& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/waiting.vue?vue&type=template&id=8d50a412&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/Challenge.vue?vue&type=template&id=6a184f0c&scoped=true&":
/*!***************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/Challenge.vue?vue&type=template&id=6a184f0c&scoped=true& ***!
  \***************************************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
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
      _c("div", { class: { preventClick: _vm.preventClick } }),
      _vm._v(" "),
      _vm.screen.resultWaiting
        ? _c("div", { staticClass: "result-waiting" }, [
            _c("div", { staticClass: "text-center bg-light" }, [
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
              _vm._v(" "),
              _vm.user.id === _vm.uid
                ? _c(
                    "button",
                    {
                      staticClass: "btn btn-sm btn-danger m-3",
                      on: { click: _vm.gameEndHost },
                    },
                    [_vm._v("End Game")]
                  )
                : _vm._e(),
            ]),
          ])
        : _vm._e(),
      _vm._v(" "),
      _vm.screen.result
        ? _c(
            "transition",
            { attrs: { name: "fade" } },
            [
              _c("result", {
                attrs: {
                  results: _vm.results,
                  lastQuestion: _vm.qid == _vm.questions.length,
                  resultDetail: _vm.answered_user_data,
                  requestHostUser: _vm.requestHostUser,
                  uid: _vm.uid,
                  user: _vm.user,
                },
                on: {
                  playAgain: _vm.gameResetCall,
                  newQuiz: _vm.newQuiz,
                  makeHost: _vm.makeHost,
                },
              }),
            ],
            1
          )
        : _vm._e(),
      _vm._v(" "),
      _c(
        "transition",
        {
          attrs: {
            id: "Chat",
            name: "custom-classes",
            "enter-active-class":
              "animate__animated animate__fadeIn animate__slow",
            "leave-active-class":
              "animate__animated animate__fadeOut animate__slow",
          },
        },
        [
          _c("chat", {
            attrs: {
              channel: _vm.channel,
              uid: _vm.uid,
              user: _vm.user,
              challenge: _vm.challenge,
            },
          }),
        ],
        1
      ),
      _vm._v(" "),
      _vm.screen.winner
        ? _c("div", { staticClass: "winner" }, [
            _vm.user_ranking == 0
              ? _c("img", {
                  staticStyle: { width: "100px", "margin-right": "15px" },
                  attrs: { src: "/img/quiz/position/1st.gif", alt: "" },
                })
              : _vm._e(),
            _vm._v(" "),
            _vm.user_ranking == 1
              ? _c("img", {
                  staticStyle: { width: "100px", "margin-right": "15px" },
                  attrs: { src: "/img/quiz/position/2nd.gif", alt: "" },
                })
              : _vm._e(),
            _vm._v(" "),
            _vm.user_ranking == 2
              ? _c("img", {
                  staticStyle: { width: "100px", margin: "15px" },
                  attrs: { src: "/img/quiz/position/3rd.gif", alt: "" },
                })
              : _vm._e(),
            _vm._v(" "),
            _c("h3", { staticClass: "text-center" }, [
              _vm._v(_vm._s(_vm.getPerform()) + " "),
            ]),
            _vm._v(" "),
            _vm.user_ranking == 0
              ? _c("div", [
                  _c("h3", [
                    _c("b", [_vm._v(_vm._s(_vm.user.name))]),
                    _vm._v(", you won this game."),
                  ]),
                ])
              : _vm.user_ranking == 1
              ? _c("div", [
                  _c("h3", [
                    _c("b", [_vm._v(_vm._s(_vm.user.name))]),
                    _vm._v(", you got second place"),
                  ]),
                ])
              : _vm.user_ranking == 2
              ? _c("div", [
                  _c("h3", [
                    _c("b", [_vm._v(_vm._s(_vm.user.name))]),
                    _vm._v(", you got third place"),
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
          ])
        : _vm._e(),
      _vm._v(" "),
      _vm.screen.waiting
        ? _c("waiting", {
            attrs: {
              uid: _vm.uid,
              users: _vm.users,
              user: _vm.user,
              time: _vm.challenge.schedule,
              challenge: _vm.challenge,
              defTime: _vm.qt.defaultTime,
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
      _c("div", { staticClass: "row justify-content-center" }, [
        _c(
          "div",
          { staticClass: "col-md-8 pxs-0" },
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
                    " " + _vm._s(Math.floor(_vm.progress)) + "\n          "
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
                        _c("div", [
                          _vm.endAVWait
                            ? _c("div", [
                                question.fileType == "video"
                                  ? _c("video", {
                                      staticClass:
                                        "image w-100 mt-1 rounded img-thumbnail",
                                      attrs: {
                                        src: "/" + question.question_file_link,
                                        controls: "controls",
                                        playsinline: "",
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
                                    })
                                  : _vm._e(),
                                _vm._v(" "),
                                question.fileType == "audio"
                                  ? _c("div", { staticClass: "audio" }, [
                                      _c("audio", {
                                        attrs: {
                                          src:
                                            "/" + question.question_file_link,
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
                                      _vm._v(" "),
                                      _c("div", { attrs: { id: "ar" } }),
                                    ])
                                  : _vm._e(),
                              ])
                            : _c("div", [
                                _vm.currentQuestionType == "audio"
                                  ? _c("div", [
                                      _c("h1", [_vm._v("Audio Question... ")]),
                                    ])
                                  : _vm._e(),
                                _vm._v(" "),
                                _vm.currentQuestionType == "video"
                                  ? _c("div", [
                                      _c("h1", [_vm._v("Video Question... ")]),
                                    ])
                                  : _vm._e(),
                              ]),
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
                                        "d-flex align-items-center question-title",
                                    },
                                    [
                                      _c("h3", { staticClass: "text-danger" }, [
                                        _vm._v("Q."),
                                      ]),
                                      _vm._v(" "),
                                      _c("h5", { staticClass: "mt-1 ml-2" }, [
                                        _vm._v(
                                          "\n                        " +
                                            _vm._s(
                                              _vm.tbe(
                                                question.bd_question_text,
                                                question.question_text,
                                                _vm.user.lang
                                              )
                                            ) +
                                            "\n                      "
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
                                          _vm.imageOption(question["options"]),
                                      },
                                    },
                                    [
                                      question.short_answer > 0
                                        ? _c(
                                            "div",
                                            { staticClass: "col-md-12 mt-4" },
                                            [
                                              _c(
                                                "form",
                                                {
                                                  on: {
                                                    submit: function ($event) {
                                                      $event.preventDefault()
                                                      return _vm.smtAnswer(
                                                        question.id,
                                                        question.options,
                                                        _vm.shortAnswer
                                                      )
                                                    },
                                                  },
                                                },
                                                [
                                                  _c(
                                                    "div",
                                                    {
                                                      staticClass:
                                                        "input-group",
                                                    },
                                                    [
                                                      _c("input", {
                                                        directives: [
                                                          {
                                                            name: "model",
                                                            rawName: "v-model",
                                                            value:
                                                              _vm.shortAnswer,
                                                            expression:
                                                              "shortAnswer",
                                                          },
                                                        ],
                                                        staticClass:
                                                          "form-control",
                                                        attrs: {
                                                          type: "text",
                                                          placeholder:
                                                            "Type Your Answer",
                                                        },
                                                        domProps: {
                                                          value:
                                                            _vm.shortAnswer,
                                                        },
                                                        on: {
                                                          input: function (
                                                            $event
                                                          ) {
                                                            if (
                                                              $event.target
                                                                .composing
                                                            ) {
                                                              return
                                                            }
                                                            _vm.shortAnswer =
                                                              $event.target.value
                                                          },
                                                        },
                                                      }),
                                                      _vm._v(" "),
                                                      _c(
                                                        "div",
                                                        {
                                                          staticClass:
                                                            "input-group-append",
                                                        },
                                                        [
                                                          _c(
                                                            "button",
                                                            {
                                                              staticClass:
                                                                "btn btn-primary",
                                                              attrs: {
                                                                disabled:
                                                                  _vm.shortAnswer !=
                                                                  null
                                                                    ? false
                                                                    : true,
                                                                type: "submit",
                                                              },
                                                            },
                                                            [
                                                              _vm._v(
                                                                "Submit\n                          "
                                                              ),
                                                            ]
                                                          ),
                                                        ]
                                                      ),
                                                    ]
                                                  ),
                                                ]
                                              ),
                                            ]
                                          )
                                        : _vm._l(
                                            question.options,
                                            function (option, i) {
                                              return _c(
                                                "div",
                                                {
                                                  staticClass: "col-md-6 px-1",
                                                  class: [
                                                    option.flag == "img"
                                                      ? "col-6"
                                                      : "col-12",
                                                  ],
                                                },
                                                [
                                                  option.flag != "img"
                                                    ? _c(
                                                        "div",
                                                        {
                                                          staticClass:
                                                            "list-group",
                                                          class:
                                                            _vm.getOptionClass(
                                                              i,
                                                              _vm.challenge
                                                                .option_view_time
                                                            ),
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "list-group-item list-group-item-action cursor my-1",
                                                              domProps: {
                                                                innerHTML:
                                                                  _vm._s(
                                                                    _vm.tbe(
                                                                      option.bd_option,
                                                                      option.option,
                                                                      _vm.user
                                                                        .lang
                                                                    )
                                                                  ),
                                                              },
                                                              on: {
                                                                "~click":
                                                                  function (
                                                                    $event
                                                                  ) {
                                                                    _vm.checkAnswer(
                                                                      question.id,
                                                                      _vm.tbe(
                                                                        option.bd_option,
                                                                        option.option,
                                                                        _vm.user
                                                                          .lang
                                                                      ),
                                                                      option.correct
                                                                    )
                                                                  },
                                                              },
                                                            },
                                                            [
                                                              _vm._v(
                                                                "\n                        " +
                                                                  _vm._s(
                                                                    _vm.tbe(
                                                                      option.bd_option +
                                                                        "Raton",
                                                                      option.option +
                                                                        "Rimon",
                                                                      _vm.user
                                                                        .lang
                                                                    )
                                                                  ) +
                                                                  "\n\n                      "
                                                              ),
                                                            ]
                                                          ),
                                                        ]
                                                      )
                                                    : _c(
                                                        "div",
                                                        {
                                                          staticClass:
                                                            "cursor my-1",
                                                          class:
                                                            _vm.getOptionClass(
                                                              i,
                                                              _vm.challenge
                                                                .option_view_time
                                                            ),
                                                          on: {
                                                            click: function (
                                                              $event
                                                            ) {
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
                                    ],
                                    2
                                  )
                                : _vm._e(),
                            ]
                          ),
                        ]),
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
          _vm.results.length > 0
            ? _c("div", { staticClass: "card my-4" }, [
                _c("div", { staticClass: "card-header" }, [
                  _vm._v("\n            Score Board\n            "),
                  _vm._v(" "),
                  _vm.user.id == _vm.uid && _vm.qid > 0
                    ? _c(
                        "a",
                        {
                          staticClass: "btn btn-sm btn-danger float-right",
                          on: { click: _vm.gameResetCall },
                        },
                        [_vm._v("\n                RESET\n            ")]
                      )
                    : _vm._e(),
                ]),
                _vm._v(" "),
                _c(
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
                              "\n                " + _vm._s(res.name) + " "
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
                ),
              ])
            : _vm._e(),
        ]),
      ]),
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/Chat.vue?vue&type=template&id=4c9c3884&scoped=true&":
/*!***********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/Chat.vue?vue&type=template&id=4c9c3884&scoped=true& ***!
  \***********************************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
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
    _c(
      "div",
      {
        directives: [
          {
            name: "show",
            rawName: "v-show",
            value: _vm.show,
            expression: "show",
          },
        ],
        staticClass: "card chat",
      },
      [
        _c("div", { staticClass: "card-header msg_head" }, [
          _c(
            "div",
            {
              staticClass: "btn-group",
              staticStyle: { position: "absolute", right: "5px", top: "5px" },
              attrs: { role: "group" },
            },
            [
              _vm.uid === _vm.user.id
                ? _c(
                    "button",
                    {
                      staticClass: "btn btn-xs btn-dark px-1 py-0",
                      attrs: { type: "button" },
                      on: { click: _vm.deleteMessage },
                    },
                    [_c("i", { staticClass: "fa fa-trash-alt" })]
                  )
                : _vm._e(),
              _vm._v(" "),
              _c(
                "button",
                {
                  staticClass: "btn btn-xs btn-dark px-1 py-0",
                  attrs: { type: "button" },
                  on: {
                    click: function ($event) {
                      _vm.show = !_vm.show
                      _vm.chat_count = 0
                    },
                  },
                },
                [_c("i", { staticClass: "fa fa-minus fa-lg" })]
              ),
            ]
          ),
          _vm._v(" "),
          _c("div", { staticClass: "d-flex bd-highlight" }, [
            _c("div", { staticClass: "user_info" }, [
              _c("span", [
                _vm._v(
                  "\n                        " +
                    _vm._s(_vm.challenge.name) +
                    "\n                    "
                ),
              ]),
            ]),
          ]),
        ]),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "card-body msg_card_body" },
          _vm._l(_vm.messages, function (message) {
            return _c(
              "div",
              { key: message.id, attrs: { id: "chatMessage" } },
              [
                message.user.id !== _vm.user.id
                  ? _c(
                      "div",
                      { staticClass: "d-flex justify-content-start mb-4" },
                      [
                        _c("div", { staticClass: "img_cont_msg" }, [
                          _vm.hasAvatar(message.user.avatar)
                            ? _c("img", {
                                staticClass: "rounded-circle user_img_msg",
                                attrs: {
                                  src: _vm.getAvatar(message.user.avatar),
                                  alt: _vm.getAvatarAlt(message.user.name),
                                },
                              })
                            : _c(
                                "div",
                                { staticClass: "rounded-circle user_img_msg" },
                                [
                                  _vm._v(
                                    "\n                            " +
                                      _vm._s(
                                        _vm.getAvatarAlt(message.user.name)
                                      ) +
                                      "\n                        "
                                  ),
                                ]
                              ),
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "msg_cotainer" }, [
                          _vm._v(
                            "\n                        " +
                              _vm._s(message.message) +
                              "\n                        "
                          ),
                          _c("span", { staticClass: "msg_time" }, [
                            _vm._v(_vm._s(message.time)),
                          ]),
                        ]),
                      ]
                    )
                  : _c(
                      "div",
                      { staticClass: "d-flex justify-content-end mb-4" },
                      [
                        _c("div", { staticClass: "msg_cotainer_send" }, [
                          _vm._v(
                            "\n                        " +
                              _vm._s(message.message) +
                              "\n                        "
                          ),
                          _c("span", { staticClass: "msg_time_send" }, [
                            _vm._v(_vm._s(message.time ? message.time : "")),
                          ]),
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "img_cont_msg" }, [
                          _vm.hasAvatar(message.user.avatar)
                            ? _c("img", {
                                staticClass: "rounded-circle user_img_msg",
                                attrs: {
                                  src: _vm.getAvatar(message.user.avatar),
                                  alt: _vm.getAvatarAlt(message.user.name),
                                },
                              })
                            : _c(
                                "div",
                                { staticClass: "rounded-circle user_img_msg" },
                                [
                                  _vm._v(
                                    "\n                            " +
                                      _vm._s(
                                        _vm.getAvatarAlt(message.user.name)
                                      ) +
                                      "\n                        "
                                  ),
                                ]
                              ),
                        ]),
                      ]
                    ),
              ]
            )
          }),
          0
        ),
        _vm._v(" "),
        _c("div", { staticClass: "card-footer" }, [
          _c("div", { staticClass: "input-group" }, [
            _c("textarea", {
              directives: [
                {
                  name: "model",
                  rawName: "v-model",
                  value: _vm.message,
                  expression: "message",
                },
              ],
              ref: "type_msg",
              staticClass: "form-control type_msg attach_btn",
              attrs: { id: "type_msg", placeholder: "Type your message..." },
              domProps: { value: _vm.message },
              on: {
                keyup: function ($event) {
                  if (
                    !$event.type.indexOf("key") &&
                    _vm._k($event.keyCode, "enter", 13, $event.key, "Enter")
                  ) {
                    return null
                  }
                  return _vm.sendMessage.apply(null, arguments)
                },
                input: function ($event) {
                  if ($event.target.composing) {
                    return
                  }
                  _vm.message = $event.target.value
                },
              },
            }),
            _vm._v(" "),
            _c("div", { staticClass: "input-group-append" }, [
              _c(
                "span",
                {
                  staticClass: "input-group-text send_btn",
                  on: { click: _vm.sendMessage },
                },
                [_c("i", { staticClass: "fas fa-location-arrow" })]
              ),
            ]),
          ]),
        ]),
      ]
    ),
    _vm._v(" "),
    _c(
      "div",
      {
        directives: [
          {
            name: "show",
            rawName: "v-show",
            value: !_vm.show,
            expression: "!show",
          },
        ],
        staticClass: "chat-min",
      },
      [
        _vm.chat_count > 0
          ? _c(
              "div",
              {
                staticClass:
                  "chat-count rounded-circle d-flex justify-content-center align-items-center",
                on: { click: _vm.showChat },
              },
              [_vm._v("\n            " + _vm._s(_vm.chat_count) + "\n        ")]
            )
          : _vm._e(),
        _vm._v(" "),
        _c("i", {
          staticClass: "far fa-comments fa-5x",
          on: { click: _vm.showChat },
        }),
      ]
    ),
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/moderator/info.vue?vue&type=template&id=d558f384&":
/*!*********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/moderator/info.vue?vue&type=template&id=d558f384& ***!
  \*********************************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": function() { return /* binding */ render; },
/* harmony export */   "staticRenderFns": function() { return /* binding */ staticRenderFns; }
/* harmony export */ });
var render = function () {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "row" }, [
    _c("div", { staticClass: "col-md" }, [
      _c(
        "div",
        { staticClass: "d-flex justify-content-center align-items-center" },
        [
          _c(
            "div",
            {
              staticClass: "progress-circle",
              style: { background: _vm.getBackground },
            },
            [
              _c("div", { staticClass: "number" }, [
                _vm.answered > 0
                  ? _c("span", [
                      _vm._v(
                        "\n                    " +
                          _vm._s(_vm.users + "/" + _vm.answered) +
                          "\n                "
                      ),
                    ])
                  : _vm._e(),
              ]),
            ]
          ),
        ]
      ),
      _vm._v(" "),
      _vm.users == _vm.answered
        ? _c("div", [
            _c(
              "ul",
              { staticClass: "list-group" },
              _vm._l(_vm.results, function (result, index) {
                return _c(
                  "li",
                  {
                    staticClass:
                      "d-flex justify-content-between align-items-center list-group-item",
                    class: _vm.getClass(index),
                  },
                  [
                    result.flag === "img"
                      ? _c("img", {
                          staticClass: "image rounded img-thumbnail",
                          staticStyle: { width: "100px" },
                          attrs: { src: "/" + result.option, alt: "" },
                        })
                      : _c("span", [_vm._v(_vm._s(result.option))]),
                    _vm._v(" "),
                    _c(
                      "span",
                      {
                        staticClass: "badge badge-pill",
                        class: [
                          result.option === _vm.correct
                            ? "badge-success"
                            : "badge-primary",
                        ],
                      },
                      [
                        result.option === _vm.correct
                          ? _c("i", { staticClass: "fas fa-check" })
                          : _vm._e(),
                        _vm._v(
                          "\n              " + _vm._s(result.score) + "\n"
                        ),
                      ]
                    ),
                  ]
                )
              }),
              0
            ),
          ])
        : _vm._e(),
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

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": function() { return /* binding */ render; },
/* harmony export */   "staticRenderFns": function() { return /* binding */ staticRenderFns; }
/* harmony export */ });
var render = function () {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "w-100 px-1", attrs: { id: "accordion" } }, [
    _c("div", { staticClass: "card" }, [
      _c(
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
          _c("strong", { staticClass: "mb-0 cursor" }, [
            _vm._v(
              "\n            " +
                _vm._s(_vm.tbe("ফলাফল", "Result Details", _vm.lang)) +
                "\n          "
            ),
          ]),
        ]
      ),
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
              { staticClass: "list-group text-dark", style: _vm.getStyle() },
              _vm._l(_vm.results.slice().reverse(), function (result) {
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
                                      staticStyle: { "max-height": "30px" },
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
                                      staticStyle: { "max-height": "40px" },
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
                                      staticStyle: { "max-height": "40px" },
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
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/result.vue?vue&type=template&id=3dc21663&":
/*!*************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/result.vue?vue&type=template&id=3dc21663& ***!
  \*************************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
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
            _vm.mode !== "moderator"
              ? _c("div", [
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
                                    "\n                Make host\n              "
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
                                      return _vm.makeHostByHost()
                                    },
                                  },
                                },
                                [
                                  _vm._v(
                                    "\n                Make host\n              "
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
                                    "\n                Request Pending\n              "
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
                                    "\n                Make host\n              "
                                  ),
                                ]
                              ),
                        ]
                      ),
                ])
              : _vm._e(),
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
                        "\n                        " + _vm._s(v.name) + " "
                      ),
                      v.id == _vm.user.id
                        ? _c("span", [_vm._v("(You)")])
                        : _vm._e(),
                      _vm._v(" "),
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
                                "\n                        " +
                                  _vm._s(
                                    v.id == _vm.requestHostUser.id
                                      ? "Requested"
                                      : ""
                                  ) +
                                  "\n                      "
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
                        [
                          _vm._v(
                            "\n                        " +
                              _vm._s(v.score) +
                              "\n                      "
                          ),
                        ]
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
                _vm.mode !== "moderator"
                  ? _c(
                      "button",
                      {
                        staticClass: "btn btn-sm btn-info",
                        on: { click: _vm.showDetail },
                      },
                      [
                        _vm._v(
                          "\n                      Show your result\n                    "
                        ),
                      ]
                    )
                  : _vm._e(),
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

"use strict";
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
          directives: [
            {
              name: "show",
              rawName: "v-show",
              value: _vm.share,
              expression: "share",
            },
          ],
          staticClass: "show_share shareBtnDiv",
          attrs: { id: "shareBtn" },
        },
        [
          _c("iframe", {
            staticClass: "iframe-size",
            attrs: {
              id: "shareFrame",
              src: _vm.getShareLink,
              frameborder: "0",
            },
          }),
        ]
      ),
      _vm._v(" "),
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
            [_vm._v("\n                Back\n            ")]
          ),
          _vm._v(" "),
          !_vm.isHost()
            ? _c("span", { staticClass: "ml-1 text-primary" }, [
                _vm._v(
                  "\n                Please wait, the Quiz Host will start the game soon.\n            "
                ),
              ])
            : _c("span", { staticClass: "ml-1 text-primary" }, [
                _vm.users.length
                  ? _c(
                      "i",
                      {
                        staticClass: "fa fa-users fa-2x",
                        attrs: { "aria-hidden": "true" },
                      },
                      [
                        _vm._v(
                          "\n                    " +
                            _vm._s(_vm.users.length) +
                            "\n                "
                        ),
                      ]
                    )
                  : _vm._e(),
              ]),
          _vm._v(" "),
          _vm.user.id === _vm.uid
            ? _c("div", [
                _c(
                  "button",
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
                        _vm._s(_vm.qr ? "Close QR" : "QR") +
                        "s\n                "
                    ),
                  ]
                ),
                _vm._v(" "),
                _c(
                  "button",
                  {
                    staticClass: "btn btn-sm btn-outline-info",
                    on: {
                      click: function ($event) {
                        _vm.share = !_vm.share
                      },
                    },
                  },
                  [_vm._v("\n                    Share\n                ")]
                ),
              ])
            : _vm._e(),
        ]
      ),
      _vm._v(" "),
      _c(
        "div",
        {
          staticClass: "card-body todos",
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
            "transition-group",
            { attrs: { tag: "ul", name: "list" } },
            _vm._l(_vm.users, function (u) {
              return _c(
                "li",
                {
                  key: u.id,
                  staticClass: "list-group-item rounded-lg",
                  class: {
                    "border border-success text-success": u.id == _vm.user.id,
                  },
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
                  _c("span", { staticClass: "ml-5" }, [
                    _vm._v(_vm._s(u.name) + " "),
                    u.id == _vm.user.id
                      ? _c("span", [_vm._v("(You)")])
                      : _vm._e(),
                  ]),
                  _vm._v(" "),
                  u.id == _vm.uid
                    ? _c("span", { staticClass: "ml-1 badge badge-danger" }, [
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
                _vm._v(" "),
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
                  [_vm._v("\n                    START\n                ")]
                ),
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

"use strict";
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
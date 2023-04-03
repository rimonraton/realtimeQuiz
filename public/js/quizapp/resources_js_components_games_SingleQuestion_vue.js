"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_components_games_SingleQuestion_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/SingleQuestion.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/SingleQuestion.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helper_singleDisplay_Qrcode__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../helper/singleDisplay/Qrcode */ "./resources/js/components/helper/singleDisplay/Qrcode.vue");
/* harmony import */ var _helper_singleDisplay_UserName__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../helper/singleDisplay/UserName */ "./resources/js/components/helper/singleDisplay/UserName.vue");
/* harmony import */ var _helper_singleDisplay_waiting__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../helper/singleDisplay/waiting */ "./resources/js/components/helper/singleDisplay/waiting.vue");
/* harmony import */ var _helper_result__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../helper/result */ "./resources/js/components/helper/result.vue");
/* harmony import */ var _mixins_quizHelpers__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../mixins/quizHelpers */ "./resources/js/components/mixins/quizHelpers.js");
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }
function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { _defineProperty(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }
function _defineProperty(obj, key, value) { key = _toPropertyKey(key); if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }
function _toPropertyKey(arg) { var key = _toPrimitive(arg, "string"); return _typeof(key) === "symbol" ? key : String(key); }
function _toPrimitive(input, hint) { if (_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }
function _regeneratorRuntime() { "use strict"; /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */ _regeneratorRuntime = function _regeneratorRuntime() { return exports; }; var exports = {}, Op = Object.prototype, hasOwn = Op.hasOwnProperty, defineProperty = Object.defineProperty || function (obj, key, desc) { obj[key] = desc.value; }, $Symbol = "function" == typeof Symbol ? Symbol : {}, iteratorSymbol = $Symbol.iterator || "@@iterator", asyncIteratorSymbol = $Symbol.asyncIterator || "@@asyncIterator", toStringTagSymbol = $Symbol.toStringTag || "@@toStringTag"; function define(obj, key, value) { return Object.defineProperty(obj, key, { value: value, enumerable: !0, configurable: !0, writable: !0 }), obj[key]; } try { define({}, ""); } catch (err) { define = function define(obj, key, value) { return obj[key] = value; }; } function wrap(innerFn, outerFn, self, tryLocsList) { var protoGenerator = outerFn && outerFn.prototype instanceof Generator ? outerFn : Generator, generator = Object.create(protoGenerator.prototype), context = new Context(tryLocsList || []); return defineProperty(generator, "_invoke", { value: makeInvokeMethod(innerFn, self, context) }), generator; } function tryCatch(fn, obj, arg) { try { return { type: "normal", arg: fn.call(obj, arg) }; } catch (err) { return { type: "throw", arg: err }; } } exports.wrap = wrap; var ContinueSentinel = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} var IteratorPrototype = {}; define(IteratorPrototype, iteratorSymbol, function () { return this; }); var getProto = Object.getPrototypeOf, NativeIteratorPrototype = getProto && getProto(getProto(values([]))); NativeIteratorPrototype && NativeIteratorPrototype !== Op && hasOwn.call(NativeIteratorPrototype, iteratorSymbol) && (IteratorPrototype = NativeIteratorPrototype); var Gp = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(IteratorPrototype); function defineIteratorMethods(prototype) { ["next", "throw", "return"].forEach(function (method) { define(prototype, method, function (arg) { return this._invoke(method, arg); }); }); } function AsyncIterator(generator, PromiseImpl) { function invoke(method, arg, resolve, reject) { var record = tryCatch(generator[method], generator, arg); if ("throw" !== record.type) { var result = record.arg, value = result.value; return value && "object" == _typeof(value) && hasOwn.call(value, "__await") ? PromiseImpl.resolve(value.__await).then(function (value) { invoke("next", value, resolve, reject); }, function (err) { invoke("throw", err, resolve, reject); }) : PromiseImpl.resolve(value).then(function (unwrapped) { result.value = unwrapped, resolve(result); }, function (error) { return invoke("throw", error, resolve, reject); }); } reject(record.arg); } var previousPromise; defineProperty(this, "_invoke", { value: function value(method, arg) { function callInvokeWithMethodAndArg() { return new PromiseImpl(function (resolve, reject) { invoke(method, arg, resolve, reject); }); } return previousPromise = previousPromise ? previousPromise.then(callInvokeWithMethodAndArg, callInvokeWithMethodAndArg) : callInvokeWithMethodAndArg(); } }); } function makeInvokeMethod(innerFn, self, context) { var state = "suspendedStart"; return function (method, arg) { if ("executing" === state) throw new Error("Generator is already running"); if ("completed" === state) { if ("throw" === method) throw arg; return doneResult(); } for (context.method = method, context.arg = arg;;) { var delegate = context.delegate; if (delegate) { var delegateResult = maybeInvokeDelegate(delegate, context); if (delegateResult) { if (delegateResult === ContinueSentinel) continue; return delegateResult; } } if ("next" === context.method) context.sent = context._sent = context.arg;else if ("throw" === context.method) { if ("suspendedStart" === state) throw state = "completed", context.arg; context.dispatchException(context.arg); } else "return" === context.method && context.abrupt("return", context.arg); state = "executing"; var record = tryCatch(innerFn, self, context); if ("normal" === record.type) { if (state = context.done ? "completed" : "suspendedYield", record.arg === ContinueSentinel) continue; return { value: record.arg, done: context.done }; } "throw" === record.type && (state = "completed", context.method = "throw", context.arg = record.arg); } }; } function maybeInvokeDelegate(delegate, context) { var methodName = context.method, method = delegate.iterator[methodName]; if (undefined === method) return context.delegate = null, "throw" === methodName && delegate.iterator["return"] && (context.method = "return", context.arg = undefined, maybeInvokeDelegate(delegate, context), "throw" === context.method) || "return" !== methodName && (context.method = "throw", context.arg = new TypeError("The iterator does not provide a '" + methodName + "' method")), ContinueSentinel; var record = tryCatch(method, delegate.iterator, context.arg); if ("throw" === record.type) return context.method = "throw", context.arg = record.arg, context.delegate = null, ContinueSentinel; var info = record.arg; return info ? info.done ? (context[delegate.resultName] = info.value, context.next = delegate.nextLoc, "return" !== context.method && (context.method = "next", context.arg = undefined), context.delegate = null, ContinueSentinel) : info : (context.method = "throw", context.arg = new TypeError("iterator result is not an object"), context.delegate = null, ContinueSentinel); } function pushTryEntry(locs) { var entry = { tryLoc: locs[0] }; 1 in locs && (entry.catchLoc = locs[1]), 2 in locs && (entry.finallyLoc = locs[2], entry.afterLoc = locs[3]), this.tryEntries.push(entry); } function resetTryEntry(entry) { var record = entry.completion || {}; record.type = "normal", delete record.arg, entry.completion = record; } function Context(tryLocsList) { this.tryEntries = [{ tryLoc: "root" }], tryLocsList.forEach(pushTryEntry, this), this.reset(!0); } function values(iterable) { if (iterable) { var iteratorMethod = iterable[iteratorSymbol]; if (iteratorMethod) return iteratorMethod.call(iterable); if ("function" == typeof iterable.next) return iterable; if (!isNaN(iterable.length)) { var i = -1, next = function next() { for (; ++i < iterable.length;) if (hasOwn.call(iterable, i)) return next.value = iterable[i], next.done = !1, next; return next.value = undefined, next.done = !0, next; }; return next.next = next; } } return { next: doneResult }; } function doneResult() { return { value: undefined, done: !0 }; } return GeneratorFunction.prototype = GeneratorFunctionPrototype, defineProperty(Gp, "constructor", { value: GeneratorFunctionPrototype, configurable: !0 }), defineProperty(GeneratorFunctionPrototype, "constructor", { value: GeneratorFunction, configurable: !0 }), GeneratorFunction.displayName = define(GeneratorFunctionPrototype, toStringTagSymbol, "GeneratorFunction"), exports.isGeneratorFunction = function (genFun) { var ctor = "function" == typeof genFun && genFun.constructor; return !!ctor && (ctor === GeneratorFunction || "GeneratorFunction" === (ctor.displayName || ctor.name)); }, exports.mark = function (genFun) { return Object.setPrototypeOf ? Object.setPrototypeOf(genFun, GeneratorFunctionPrototype) : (genFun.__proto__ = GeneratorFunctionPrototype, define(genFun, toStringTagSymbol, "GeneratorFunction")), genFun.prototype = Object.create(Gp), genFun; }, exports.awrap = function (arg) { return { __await: arg }; }, defineIteratorMethods(AsyncIterator.prototype), define(AsyncIterator.prototype, asyncIteratorSymbol, function () { return this; }), exports.AsyncIterator = AsyncIterator, exports.async = function (innerFn, outerFn, self, tryLocsList, PromiseImpl) { void 0 === PromiseImpl && (PromiseImpl = Promise); var iter = new AsyncIterator(wrap(innerFn, outerFn, self, tryLocsList), PromiseImpl); return exports.isGeneratorFunction(outerFn) ? iter : iter.next().then(function (result) { return result.done ? result.value : iter.next(); }); }, defineIteratorMethods(Gp), define(Gp, toStringTagSymbol, "Generator"), define(Gp, iteratorSymbol, function () { return this; }), define(Gp, "toString", function () { return "[object Generator]"; }), exports.keys = function (val) { var object = Object(val), keys = []; for (var key in object) keys.push(key); return keys.reverse(), function next() { for (; keys.length;) { var key = keys.pop(); if (key in object) return next.value = key, next.done = !1, next; } return next.done = !0, next; }; }, exports.values = values, Context.prototype = { constructor: Context, reset: function reset(skipTempReset) { if (this.prev = 0, this.next = 0, this.sent = this._sent = undefined, this.done = !1, this.delegate = null, this.method = "next", this.arg = undefined, this.tryEntries.forEach(resetTryEntry), !skipTempReset) for (var name in this) "t" === name.charAt(0) && hasOwn.call(this, name) && !isNaN(+name.slice(1)) && (this[name] = undefined); }, stop: function stop() { this.done = !0; var rootRecord = this.tryEntries[0].completion; if ("throw" === rootRecord.type) throw rootRecord.arg; return this.rval; }, dispatchException: function dispatchException(exception) { if (this.done) throw exception; var context = this; function handle(loc, caught) { return record.type = "throw", record.arg = exception, context.next = loc, caught && (context.method = "next", context.arg = undefined), !!caught; } for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i], record = entry.completion; if ("root" === entry.tryLoc) return handle("end"); if (entry.tryLoc <= this.prev) { var hasCatch = hasOwn.call(entry, "catchLoc"), hasFinally = hasOwn.call(entry, "finallyLoc"); if (hasCatch && hasFinally) { if (this.prev < entry.catchLoc) return handle(entry.catchLoc, !0); if (this.prev < entry.finallyLoc) return handle(entry.finallyLoc); } else if (hasCatch) { if (this.prev < entry.catchLoc) return handle(entry.catchLoc, !0); } else { if (!hasFinally) throw new Error("try statement without catch or finally"); if (this.prev < entry.finallyLoc) return handle(entry.finallyLoc); } } } }, abrupt: function abrupt(type, arg) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.tryLoc <= this.prev && hasOwn.call(entry, "finallyLoc") && this.prev < entry.finallyLoc) { var finallyEntry = entry; break; } } finallyEntry && ("break" === type || "continue" === type) && finallyEntry.tryLoc <= arg && arg <= finallyEntry.finallyLoc && (finallyEntry = null); var record = finallyEntry ? finallyEntry.completion : {}; return record.type = type, record.arg = arg, finallyEntry ? (this.method = "next", this.next = finallyEntry.finallyLoc, ContinueSentinel) : this.complete(record); }, complete: function complete(record, afterLoc) { if ("throw" === record.type) throw record.arg; return "break" === record.type || "continue" === record.type ? this.next = record.arg : "return" === record.type ? (this.rval = this.arg = record.arg, this.method = "return", this.next = "end") : "normal" === record.type && afterLoc && (this.next = afterLoc), ContinueSentinel; }, finish: function finish(finallyLoc) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.finallyLoc === finallyLoc) return this.complete(entry.completion, entry.afterLoc), resetTryEntry(entry), ContinueSentinel; } }, "catch": function _catch(tryLoc) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.tryLoc === tryLoc) { var record = entry.completion; if ("throw" === record.type) { var thrown = record.arg; resetTryEntry(entry); } return thrown; } } throw new Error("illegal catch attempt"); }, delegateYield: function delegateYield(iterable, resultName, nextLoc) { return this.delegate = { iterator: values(iterable), resultName: resultName, nextLoc: nextLoc }, "next" === this.method && (this.arg = undefined), ContinueSentinel; } }, exports; }
function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }
function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  mixins: [_mixins_quizHelpers__WEBPACK_IMPORTED_MODULE_4__.quizHelpers],
  props: ['challenge', 'uid', 'propuser', 'questions', 'gmsg', 'teams'],
  components: {
    wait: _helper_singleDisplay_waiting__WEBPACK_IMPORTED_MODULE_2__["default"],
    result: _helper_result__WEBPACK_IMPORTED_MODULE_3__["default"],
    user_info: _helper_singleDisplay_UserName__WEBPACK_IMPORTED_MODULE_1__["default"],
    qrcode: _helper_singleDisplay_Qrcode__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  data: function data() {
    return {
      qt: {
        ms: 0,
        time: 10,
        timer: null
      },
      users: [],
      user: this.propuser,
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
      preventClick: true,
      question_time: 60
    };
  },
  created: function created() {
    var _this = this;
    Echo.channel(this.channel).listen('SingleDisplay.UserJoinEvent', function (data) {
      console.log(['UserJoinEvent.............', data]);
      _this.au = true;
      !_this.users.some(function (u) {
        return u.id === data.user.id;
      }) ? _this.users.push(data.user) : '';
    }).listen('SingleDisplay.UserJoinUsersEvent', function (data) {
      console.log(['UserJoinUsersEvent.............', data]);
      !_this.users.some(function (u) {
        return u.id === data.user.id;
      }) ? _this.users.push(data.user) : '';
      _this.au = true;
    }).listen('GameStartEvent', function (data) {
      console.log(['GameStartEvent.............', data]);
      _this.share = data.share;
      // this.users = data.users
      _this.game_start = 1; // Game Start from Game Owner...
      _this.screen.waiting = 0;
      _this.sqo = true;
      _this.showQuestionOptions(null);
      // this.QuestionTimer() // Set and Start QuestionTimer
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
        window.location.href = "/";
      }
    }).listen('NextQuestionEvent', function (data) {
      console.log('NextQuestionEvent.............', data);
      _this.nextQuestion();
    });
  },
  mounted: function mounted() {
    this.joinUser();

    // Echo.join(this.channel)
    //     .here(() => {
    //         console.log('SingleQuestionDisplay...join Mounted')
    //         //this.users = users;
    //     })
    //     .joining(() => {
    //         console.log( 'useruser Joining')
    //         //this.users.push(user);
    //         // if(this.game_start){
    //         //     this.kickUser(user.id)
    //         // }
    //     })
    //     .leaving(() => {
    //         console.log( 'useruser leaving')
    //         // this.users = this.users.filter(u => u.id != user.id);
    //         // console.log(`${user.name} leaving`);
    //     });

    this.current = this.questions[this.qid].id;
    // document.addEventListener("blur", () =>  this.preventLeave());
    // document.addEventListener("visibilitychange", () => {
    //     if(document.hidden) {
    //         this.preventLeave()
    //     }
    // })
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
  //         if (!window.confirm("Do You Realy Want to Leave This Game?")) {
  //             return;
  //         }
  //     }
  //     next();
  // },

  methods: {
    joinUser: function joinUser() {
      var _this2 = this;
      return _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee() {
        var SingleGameUser;
        return _regeneratorRuntime().wrap(function _callee$(_context) {
          while (1) switch (_context.prev = _context.next) {
            case 0:
              SingleGameUser = JSON.parse(sessionStorage.getItem("SingleGameUser"));
              if (!SingleGameUser) {
                _context.next = 6;
                break;
              }
              _this2.user = SingleGameUser;
              _context.next = 5;
              return axios.post("/api/userJoin", {
                user: _this2.user
              });
            case 5:
              return _context.abrupt("return");
            case 6:
              if (!('id' in _this2.user && _this2.uid !== _this2.user.id)) {
                _context.next = 10;
                break;
              }
              _this2.user['channel'] = _this2.channel;
              _context.next = 10;
              return axios.post("/api/userJoin", {
                user: _this2.user
              });
            case 10:
            case "end":
              return _context.stop();
          }
        }, _callee);
      }))();
    },
    insertUser: function insertUser(newUser) {
      this.user['name'] = newUser.name;
      this.user['mobile'] = newUser.mobile;
      this.user['id'] = Date.now();
      this.user['channel'] = this.channel;
      this.user['avatar'] = '';
      sessionStorage.setItem("SingleGameUser", JSON.stringify(this.user));
      this.joinUser();

      // axios.post(`/api/userJoin`, {user:this.user})
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
    gameStart: function gameStart() {
      var _this3 = this;
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
      axios.post("/api/gameStart", gd).then(function (res) {
        _this3.share = res.data;
        _this3.game_start = 1;
        _this3.screen.waiting = 0;
        _this3.showQuestionOptions(_this3.questions[0].fileType);
      });
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
      var _this4 = this;
      this.answered = 1;
      this.right_wrong = rw;
      this.gamedata['uid'] = this.user.id;
      this.gamedata['channel'] = this.channel;
      this.gamedata['name'] = this.user.name;
      this.gamedata['question'] = this.questions[this.qid].question_text;
      this.gamedata['answer'] = this.getCorrectAnswertext();
      this.gamedata['selected'] = a;
      this.gamedata['isCorrect'] = rw == 1 ? Math.floor(this.progress) : 0;
      var clone = _objectSpread({}, this.gamedata);
      this.questionInit();
      console.log('this.questionInit() call.........');
      axios.post("/api/questionClick", clone).then(function (res) {
        _this4.resultScreen();
      });
      this.answered_user_data.push(clone);
      this.screen.loading = true;
    },
    getCorrectAnswertext: function getCorrectAnswertext() {
      return this.questions[this.qid].options.find(function (o) {
        return o.correct == 1;
      }).option;
    },
    resultScreen: function resultScreen() {
      var _this5 = this;
      // console.log('resultScreen')
      this.questionInit();
      this.getResult(); //Sorting this.results
      this.countDown();
      if (this.qid + 1 == this.questions.length) {
        console.log('......resultScreen');
        this.quizEnd();
      } else {
        console.log('resultScreen preventClick True');
        if (this.isHost()) {
          this.preventClick = true;
          this.qid++;
          this.current = this.questions[this.qid].id;
          var next = {
            channel: this.channel,
            qid: this.qid,
            qtime: this.question_time
          };
          axios.post("/api/nextQuestion", next).then(function () {
            _this5.showQuestionOptions(_this5.questions[_this5.qid].fileType);
          });
        } else {
          this.screen.resultWaiting = 1;
        }
      }
    },
    QuestionTimer: function QuestionTimer() {
      var _this6 = this;
      if (this.qid == this.questions.length) return;
      if (this.av == false) return;
      var pdec = 100 / (5 * this.qt.time);
      // console.log('pdec', pdec)
      this.preventClick = false;
      this.qt.timer = setInterval(function () {
        // console.log('this.qt.time', this.qt.time)
        if (_this6.qt.time <= 0) {
          _this6.questionInit();
          _this6.checkAnswer(_this6.qid, 'Not Answered', 0);
          // this.resultScreen();
        } else {
          _this6.qt.ms++;
          _this6.progress -= pdec;
          if (_this6.qt.ms == 5) {
            _this6.qt.time--;
            _this6.qt.ms = 0;
          }
        }
      }, 200);
    },
    countDown: function countDown() {
      // console.log('countDown')
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
      var _this7 = this;
      // console.log('getResult')
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
          score: score
        });
      });
      this.results.sort(function (a, b) {
        return b.score - a.score;
      });
    },
    winner: function winner() {
      var _this8 = this;
      this.user_ranking = this.results.findIndex(function (w) {
        return w.id == _this8.user.id;
      });
      this.questionInit();
      this.screen.result = 1;
      this.game_start = 0;
      if (this.user_ranking === -1) return;
      var user_score = this.results[this.user_ranking].score;
      this.perform = Math.round(user_score / ((this.qid + 1) * 100) * 100);
      this.pm = this.gmsg.filter(function (gm) {
        return gm.perform_status >= _this8.perform;
      }).reduce(function (prev, curr) {
        return prev.perform_status < curr.perform_status ? prev : curr;
      });
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
      console.log(['user', user]);
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
    showQuestionOptions: function showQuestionOptions(question) {
      var _this9 = this;
      // console.log('showQuestionOptions', question)
      var timeout = 3000;
      if (this.challenge.option_view_time != 0) {
        timeout = 3500; // this.quiz.quiz_time * 1000
      }

      if (question == null || question == 'image') {
        clearInterval(this.qt.timer);
        setTimeout(function () {
          // this.sqo = true
          _this9.preventClick = false;
          _this9.QuestionTimer();
        }, timeout);
      }
    },
    quizEnd: function quizEnd() {
      var _this10 = this;
      // axios.post(`/api/gameEndUser`, {'channel': this.channel})
      var gameResult = {
        result: this.results,
        'share_id': this.share.id,
        'channel': this.channel
      };
      axios.post("/api/challengeResult", gameResult).then(function (res) {
        _this10.end_user++;
        console.log('users + end user', _this10.users.length, _this10.end_user);
        if (_this10.users.length <= _this10.end_user) {
          _this10.winner();
          return;
        } else {
          _this10.screen.resultWaiting = 1;
          return;
        }
      });
    },
    isHost: function isHost() {
      return this.uid === this.user.id;
    },
    nextQuestion: function nextQuestion() {
      this.preventClick = true;
      this.qid++;
      this.current = this.questions[this.qid].id;
      this.screen.resultWaiting = 0;
      this.showQuestionOptions(this.questions[this.qid].fileType);
      // this.showQuestionOptions(null)
    } // nextQuestion(){
    //     if(this.qid + 1 == this.questions.length){
    //         clearInterval(this.timer);
    //         this.winner()
    //         return
    //     }
    //
    //     this.qid ++
    //     this.current = this.questions[this.qid].id
    //     this.fillPie()
    //     this.answered_group = []
    //     let next = { channel: this.channel, qid: this.qid,qtime:this.question_time }
    //     axios.post(`/api/nextQuestion`, next)
    // },
  },

  computed: {

    // channel(){
    //     return `challenge.${this.challenge.id}.${this.uid}`
    // },
    // progressClass(){
    //     return this.progress > 66? 'bg-success': this.progress > 33? 'bg-info': 'bg-danger'
    // },
    // progressWidth(){
    //     return {'width':this.progress + '%', }
    // }
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

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/singleDisplay/Qrcode.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/singleDisplay/Qrcode.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************************************************************************/
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

/* harmony default export */ __webpack_exports__["default"] = ({
  computed: {
    getQr: function getQr() {
      return 'https://api.qrserver.com/v1/create-qr-code/?size=430x430&data=' + window.location;
    }
  },
  data: function data() {
    return {
      name: ''
    };
  },
  methods: {}
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/singleDisplay/UserName.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/singleDisplay/UserName.vue?vue&type=script&lang=js& ***!
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

/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['user', 'uid', 'users', 'time'],
  data: function data() {
    return {
      newUser: {
        name: '',
        mobile: ''
      },
      days: '',
      hours: '',
      minutes: '',
      seconds: '',
      schedule: '',
      timer: null
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
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/singleDisplay/waiting.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/singleDisplay/waiting.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************************************************************************************/
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

/***/ "./resources/js/components/mixins/quizHelpers.js":
/*!*******************************************************!*\
  !*** ./resources/js/components/mixins/quizHelpers.js ***!
  \*******************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "quizHelpers": function() { return /* binding */ quizHelpers; }
/* harmony export */ });
function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }
function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }
function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }
var quizHelpers = {
  created: function created() {
    // console.log('Mixin loaded')
  },
  mounted: function mounted() {
    this.externalJS();
  },
  methods: {
    questionInit: function questionInit() {
      clearInterval(this.timer);
      clearInterval(this.qt.timer);
      this.qt.ms = 0;
      this.qt.time = 10;
      this.progress = 100;
      this.answered = 0;
      this.counter = 2;
      this.screen.waiting = 0;
      this.screen.loading = 0;
      this.screen.result = 0;
      this.screen.winner = 0;
    },
    tbe: function tbe(b, e, l) {
      if (b !== null && e !== null) {
        if (l === 'bd') return b;
        return e;
      } else if (b !== null && e === null) return b;else if (b === null && e !== null) return e;
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
    onEnd: function onEnd() {
      this.av = true;
      this.showQuestionOptions(null);
    },
    onStart: function onStart() {
      this.av = false;
    },
    stop: function stop() {
      this.questionInit();
      console.log('stop()');
    },
    externalJS: function externalJS() {
      var confetti = document.createElement('script');
      confetti.setAttribute('src', 'https://cdn.jsdelivr.net/npm/canvas-confetti@1.3.0/dist/confetti.browser.min.js');
      document.head.appendChild(confetti);
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
    }
  }
};

/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/SingleQuestion.vue?vue&type=style&index=0&id=5d74a772&scoped=true&lang=css&":
/*!***********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/SingleQuestion.vue?vue&type=style&index=0&id=5d74a772&scoped=true&lang=css& ***!
  \***********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ (function(module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, "\n.imageOption[data-v-5d74a772] {\n    height: 100px;\n    width: 100%;\n}\n.preventClick[data-v-5d74a772] {\n    position: absolute;\n    height: 100%;\n    background: rgba(0, 0, 0, 0.1);\n    width: 100%;\n    z-index: 999;\n    left: 0px;\n    top: 0px;\n}\n.share-result-image[data-v-5d74a772] {\n    max-width: -moz-fit-content;\n    max-width: fit-content;\n}\n@media screen and (min-width: 480px) {\n.imageOption[data-v-5d74a772] {\n        height: 170px;\n        width: 100%;\n}\n}\n", ""]);
// Exports
/* harmony default export */ __webpack_exports__["default"] = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/singleDisplay/waiting.vue?vue&type=style&index=0&lang=css&":
/*!*******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/singleDisplay/waiting.vue?vue&type=style&index=0&lang=css& ***!
  \*******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ (function(module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, "\n.circle{\n        width: 40px;\n        height: 40px;\n        border-radius: 50%;\n        text-align: center;\n        position: absolute;\n        top: 4px;\n        left: 15px;\n        font-size: 1.5rem;\n        background: gray;\n        color: white;\n}\n.flag{\n\t\tposition: absolute;\n\t\tright: 15px;\n\t\ttop: 8px;\n}\n.close{\n    \tposition: absolute;\n    \ttop: -5px;\n    \tright: 0px;\n    \tcolor: red;\n}\n", ""]);
// Exports
/* harmony default export */ __webpack_exports__["default"] = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/SingleQuestion.vue?vue&type=style&index=0&id=5d74a772&scoped=true&lang=css&":
/*!***************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/SingleQuestion.vue?vue&type=style&index=0&id=5d74a772&scoped=true&lang=css& ***!
  \***************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_SingleQuestion_vue_vue_type_style_index_0_id_5d74a772_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./SingleQuestion.vue?vue&type=style&index=0&id=5d74a772&scoped=true&lang=css& */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/SingleQuestion.vue?vue&type=style&index=0&id=5d74a772&scoped=true&lang=css&");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_SingleQuestion_vue_vue_type_style_index_0_id_5d74a772_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"], options);



/* harmony default export */ __webpack_exports__["default"] = (_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_SingleQuestion_vue_vue_type_style_index_0_id_5d74a772_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"].locals || {});

/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/singleDisplay/waiting.vue?vue&type=style&index=0&lang=css&":
/*!***********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/singleDisplay/waiting.vue?vue&type=style&index=0&lang=css& ***!
  \***********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_waiting_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./waiting.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/singleDisplay/waiting.vue?vue&type=style&index=0&lang=css&");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_waiting_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"], options);



/* harmony default export */ __webpack_exports__["default"] = (_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_waiting_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"].locals || {});

/***/ }),

/***/ "./resources/js/components/games/SingleQuestion.vue":
/*!**********************************************************!*\
  !*** ./resources/js/components/games/SingleQuestion.vue ***!
  \**********************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _SingleQuestion_vue_vue_type_template_id_5d74a772_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./SingleQuestion.vue?vue&type=template&id=5d74a772&scoped=true& */ "./resources/js/components/games/SingleQuestion.vue?vue&type=template&id=5d74a772&scoped=true&");
/* harmony import */ var _SingleQuestion_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./SingleQuestion.vue?vue&type=script&lang=js& */ "./resources/js/components/games/SingleQuestion.vue?vue&type=script&lang=js&");
/* harmony import */ var _SingleQuestion_vue_vue_type_style_index_0_id_5d74a772_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./SingleQuestion.vue?vue&type=style&index=0&id=5d74a772&scoped=true&lang=css& */ "./resources/js/components/games/SingleQuestion.vue?vue&type=style&index=0&id=5d74a772&scoped=true&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");



;


/* normalize component */

var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _SingleQuestion_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _SingleQuestion_vue_vue_type_template_id_5d74a772_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render,
  _SingleQuestion_vue_vue_type_template_id_5d74a772_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  "5d74a772",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/games/SingleQuestion.vue"
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

/***/ "./resources/js/components/helper/singleDisplay/Qrcode.vue":
/*!*****************************************************************!*\
  !*** ./resources/js/components/helper/singleDisplay/Qrcode.vue ***!
  \*****************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Qrcode_vue_vue_type_template_id_09562ec9___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Qrcode.vue?vue&type=template&id=09562ec9& */ "./resources/js/components/helper/singleDisplay/Qrcode.vue?vue&type=template&id=09562ec9&");
/* harmony import */ var _Qrcode_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Qrcode.vue?vue&type=script&lang=js& */ "./resources/js/components/helper/singleDisplay/Qrcode.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Qrcode_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Qrcode_vue_vue_type_template_id_09562ec9___WEBPACK_IMPORTED_MODULE_0__.render,
  _Qrcode_vue_vue_type_template_id_09562ec9___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/helper/singleDisplay/Qrcode.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/helper/singleDisplay/UserName.vue":
/*!*******************************************************************!*\
  !*** ./resources/js/components/helper/singleDisplay/UserName.vue ***!
  \*******************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _UserName_vue_vue_type_template_id_0f101771___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./UserName.vue?vue&type=template&id=0f101771& */ "./resources/js/components/helper/singleDisplay/UserName.vue?vue&type=template&id=0f101771&");
/* harmony import */ var _UserName_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./UserName.vue?vue&type=script&lang=js& */ "./resources/js/components/helper/singleDisplay/UserName.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _UserName_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _UserName_vue_vue_type_template_id_0f101771___WEBPACK_IMPORTED_MODULE_0__.render,
  _UserName_vue_vue_type_template_id_0f101771___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/helper/singleDisplay/UserName.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/helper/singleDisplay/waiting.vue":
/*!******************************************************************!*\
  !*** ./resources/js/components/helper/singleDisplay/waiting.vue ***!
  \******************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _waiting_vue_vue_type_template_id_c341117c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./waiting.vue?vue&type=template&id=c341117c& */ "./resources/js/components/helper/singleDisplay/waiting.vue?vue&type=template&id=c341117c&");
/* harmony import */ var _waiting_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./waiting.vue?vue&type=script&lang=js& */ "./resources/js/components/helper/singleDisplay/waiting.vue?vue&type=script&lang=js&");
/* harmony import */ var _waiting_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./waiting.vue?vue&type=style&index=0&lang=css& */ "./resources/js/components/helper/singleDisplay/waiting.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! !../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");



;


/* normalize component */

var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _waiting_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _waiting_vue_vue_type_template_id_c341117c___WEBPACK_IMPORTED_MODULE_0__.render,
  _waiting_vue_vue_type_template_id_c341117c___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/helper/singleDisplay/waiting.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/games/SingleQuestion.vue?vue&type=script&lang=js&":
/*!***********************************************************************************!*\
  !*** ./resources/js/components/games/SingleQuestion.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SingleQuestion_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./SingleQuestion.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/SingleQuestion.vue?vue&type=script&lang=js&");
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SingleQuestion_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

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

/***/ "./resources/js/components/helper/singleDisplay/Qrcode.vue?vue&type=script&lang=js&":
/*!******************************************************************************************!*\
  !*** ./resources/js/components/helper/singleDisplay/Qrcode.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Qrcode_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Qrcode.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/singleDisplay/Qrcode.vue?vue&type=script&lang=js&");
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Qrcode_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/helper/singleDisplay/UserName.vue?vue&type=script&lang=js&":
/*!********************************************************************************************!*\
  !*** ./resources/js/components/helper/singleDisplay/UserName.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_UserName_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./UserName.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/singleDisplay/UserName.vue?vue&type=script&lang=js&");
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_UserName_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/helper/singleDisplay/waiting.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************!*\
  !*** ./resources/js/components/helper/singleDisplay/waiting.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_waiting_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./waiting.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/singleDisplay/waiting.vue?vue&type=script&lang=js&");
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_waiting_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/games/SingleQuestion.vue?vue&type=style&index=0&id=5d74a772&scoped=true&lang=css&":
/*!*******************************************************************************************************************!*\
  !*** ./resources/js/components/games/SingleQuestion.vue?vue&type=style&index=0&id=5d74a772&scoped=true&lang=css& ***!
  \*******************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_SingleQuestion_vue_vue_type_style_index_0_id_5d74a772_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader/dist/cjs.js!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./SingleQuestion.vue?vue&type=style&index=0&id=5d74a772&scoped=true&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/SingleQuestion.vue?vue&type=style&index=0&id=5d74a772&scoped=true&lang=css&");


/***/ }),

/***/ "./resources/js/components/helper/singleDisplay/waiting.vue?vue&type=style&index=0&lang=css&":
/*!***************************************************************************************************!*\
  !*** ./resources/js/components/helper/singleDisplay/waiting.vue?vue&type=style&index=0&lang=css& ***!
  \***************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_waiting_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/style-loader/dist/cjs.js!../../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./waiting.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/singleDisplay/waiting.vue?vue&type=style&index=0&lang=css&");


/***/ }),

/***/ "./resources/js/components/games/SingleQuestion.vue?vue&type=template&id=5d74a772&scoped=true&":
/*!*****************************************************************************************************!*\
  !*** ./resources/js/components/games/SingleQuestion.vue?vue&type=template&id=5d74a772&scoped=true& ***!
  \*****************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SingleQuestion_vue_vue_type_template_id_5d74a772_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render; },
/* harmony export */   "staticRenderFns": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SingleQuestion_vue_vue_type_template_id_5d74a772_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns; }
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SingleQuestion_vue_vue_type_template_id_5d74a772_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./SingleQuestion.vue?vue&type=template&id=5d74a772&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/SingleQuestion.vue?vue&type=template&id=5d74a772&scoped=true&");


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

/***/ "./resources/js/components/helper/singleDisplay/Qrcode.vue?vue&type=template&id=09562ec9&":
/*!************************************************************************************************!*\
  !*** ./resources/js/components/helper/singleDisplay/Qrcode.vue?vue&type=template&id=09562ec9& ***!
  \************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Qrcode_vue_vue_type_template_id_09562ec9___WEBPACK_IMPORTED_MODULE_0__.render; },
/* harmony export */   "staticRenderFns": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Qrcode_vue_vue_type_template_id_09562ec9___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns; }
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Qrcode_vue_vue_type_template_id_09562ec9___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Qrcode.vue?vue&type=template&id=09562ec9& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/singleDisplay/Qrcode.vue?vue&type=template&id=09562ec9&");


/***/ }),

/***/ "./resources/js/components/helper/singleDisplay/UserName.vue?vue&type=template&id=0f101771&":
/*!**************************************************************************************************!*\
  !*** ./resources/js/components/helper/singleDisplay/UserName.vue?vue&type=template&id=0f101771& ***!
  \**************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_UserName_vue_vue_type_template_id_0f101771___WEBPACK_IMPORTED_MODULE_0__.render; },
/* harmony export */   "staticRenderFns": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_UserName_vue_vue_type_template_id_0f101771___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns; }
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_UserName_vue_vue_type_template_id_0f101771___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./UserName.vue?vue&type=template&id=0f101771& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/singleDisplay/UserName.vue?vue&type=template&id=0f101771&");


/***/ }),

/***/ "./resources/js/components/helper/singleDisplay/waiting.vue?vue&type=template&id=c341117c&":
/*!*************************************************************************************************!*\
  !*** ./resources/js/components/helper/singleDisplay/waiting.vue?vue&type=template&id=c341117c& ***!
  \*************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_waiting_vue_vue_type_template_id_c341117c___WEBPACK_IMPORTED_MODULE_0__.render; },
/* harmony export */   "staticRenderFns": function() { return /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_waiting_vue_vue_type_template_id_c341117c___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns; }
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_waiting_vue_vue_type_template_id_c341117c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./waiting.vue?vue&type=template&id=c341117c& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/singleDisplay/waiting.vue?vue&type=template&id=c341117c&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/SingleQuestion.vue?vue&type=template&id=5d74a772&scoped=true&":
/*!********************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/games/SingleQuestion.vue?vue&type=template&id=5d74a772&scoped=true& ***!
  \********************************************************************************************************************************************************************************************************************************************/
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
      _c("div", { class: { preventClick: _vm.preventClick } }),
      _vm._v(" "),
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
                  lastQuestion: _vm.qid == _vm.questions.length,
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
            _c("div", { staticClass: "px-2" }, [
              _c("img", {
                staticClass:
                  "card-img img-responsive my-3 lazy share-result-image",
                attrs: {
                  src: _vm.getUrl("challengeShareResult/" + _vm.share.link),
                  type: "image/png",
                },
              }),
            ]),
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
        ? _c("wait", {
            attrs: {
              uid: _vm.uid,
              users: _vm.users,
              user: _vm.user,
              time: _vm.challenge.schedule,
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
      !_vm.user.id
        ? _c("user_info", {
            attrs: {
              uid: _vm.uid,
              users: _vm.users,
              user: _vm.user,
              time: _vm.challenge.schedule,
            },
            on: { insertUser: _vm.insertUser },
          })
        : _vm._e(),
      _vm._v(" "),
      _c("div", { staticClass: "row justify-content-center" }, [
        _c(
          "div",
          { staticClass: "col-md-12" },
          [
            _vm.uid === _vm.user.id
              ? _c("div", { staticClass: "progress" }, [
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
                ])
              : _vm._e(),
            _vm._v(" "),
            _vm._l(_vm.questions, function (question) {
              return question.id == _vm.current
                ? _c("div", { staticClass: "my-4" }, [
                    _c("div", { staticClass: "text-center text-muted" }, [
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
                    _c(
                      "div",
                      {
                        staticClass:
                          "pb-1 animate__animated animate__backInRight animate__faster",
                      },
                      [
                        _vm.uid === _vm.user.id
                          ? _c("div", [
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
                                      attrs: { autoplay: "", controls: "" },
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
                            _vm.uid === _vm.user.id
                              ? _c("div", { staticClass: "mt-2" }, [
                                  _c("div", { staticClass: "question-title" }, [
                                    _c(
                                      "div",
                                      {
                                        staticClass:
                                          "alert alert-info d-flex px-4 py-5 justify-content-center",
                                      },
                                      [
                                        _c("h1", { staticClass: "ml-1" }, [
                                          _vm._v(
                                            "\n                                            " +
                                              _vm._s(
                                                _vm.tbe(
                                                  question.bd_question_text,
                                                  question.question_text,
                                                  _vm.user.lang
                                                )
                                              ) +
                                              "\n                                        "
                                          ),
                                        ]),
                                      ]
                                    ),
                                  ]),
                                ])
                              : _vm._e(),
                            _vm._v(" "),
                            _vm.sqo && _vm.uid !== _vm.user.id
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
                                                  staticClass: "cursor my-1",
                                                  class: _vm.getOptionClass(
                                                    i,
                                                    _vm.challenge
                                                      .option_view_time
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
                                                      src:
                                                        "/" + option.img_link,
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
        _vm.uid === _vm.user.id
          ? _c("div", { staticClass: "col-md-12 border-bottom" }, [
              _c("div", { staticClass: "my-4" }, [
                _c("div", {}, [
                  _vm._v("\n                        Score Board\n"),
                  _vm._v(" "),
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
                                  "\n                                " +
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
            ])
          : _vm._e(),
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
        _vm._v("Please wait for next question..."),
      ]),
    ])
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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/singleDisplay/Qrcode.vue?vue&type=template&id=09562ec9&":
/*!***************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/singleDisplay/Qrcode.vue?vue&type=template&id=09562ec9& ***!
  \***************************************************************************************************************************************************************************************************************************************/
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
    _c("div", { staticClass: "card" }, [
      _vm._m(0),
      _vm._v(" "),
      _c("div", { staticClass: "card-body px-3 text-center" }, [
        _c("img", {
          staticClass: "img-thumbnail",
          attrs: { src: _vm.getQr, alt: "QR Code" },
        }),
      ]),
    ]),
  ])
}
var staticRenderFns = [
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "card-header text-center" }, [
      _c("h4", { staticClass: "ml-1 text-primary" }, [
        _vm._v("\n                    Scan this QR-Code\n                "),
      ]),
    ])
  },
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/singleDisplay/UserName.vue?vue&type=template&id=0f101771&":
/*!*****************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/singleDisplay/UserName.vue?vue&type=template&id=0f101771& ***!
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
  return _c("div", { staticClass: "waiting" }, [
    _c("div", { staticClass: "card", staticStyle: { width: "24rem" } }, [
      _vm._m(0),
      _vm._v(" "),
      _c(
        "div",
        {
          staticClass: "card-body",
          staticStyle: { "max-height": "90vh", overflow: "auto" },
        },
        [
          _c("div", { staticClass: "d-flex justify-content-between" }, [
            _c("input", {
              directives: [
                {
                  name: "model",
                  rawName: "v-model",
                  value: _vm.newUser.name,
                  expression: "newUser.name",
                },
              ],
              staticClass: "form-control",
              attrs: { type: "text", placeholder: "Your Name", autofocus: "" },
              domProps: { value: _vm.newUser.name },
              on: {
                input: function ($event) {
                  if ($event.target.composing) {
                    return
                  }
                  _vm.$set(_vm.newUser, "name", $event.target.value)
                },
              },
            }),
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "d-flex justify-content-between mt-2" }, [
            _c("input", {
              directives: [
                {
                  name: "model",
                  rawName: "v-model",
                  value: _vm.newUser.mobile,
                  expression: "newUser.mobile",
                },
              ],
              staticClass: "form-control",
              attrs: { type: "phone", placeholder: "Mobile No." },
              domProps: { value: _vm.newUser.mobile },
              on: {
                input: function ($event) {
                  if ($event.target.composing) {
                    return
                  }
                  _vm.$set(_vm.newUser, "mobile", $event.target.value)
                },
              },
            }),
          ]),
          _vm._v(" "),
          _vm.newUser.name.length > 2 && _vm.newUser.mobile.length == 11
            ? _c("div", { staticClass: "d-flex justify-content-center" }, [
                _c(
                  "a",
                  {
                    staticClass: "btn btn-sm btn-success mt-4 pull-right",
                    on: {
                      click: function ($event) {
                        return _vm.$emit("insertUser", _vm.newUser)
                      },
                    },
                  },
                  [_vm._v("JOIN ")]
                ),
              ])
            : _vm._e(),
        ]
      ),
    ]),
  ])
}
var staticRenderFns = [
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "card-header text-center" }, [
      _c("h4", { staticClass: "ml-1 text-primary" }, [
        _vm._v(
          "\n                    Please insert your name & mobile\n                "
        ),
      ]),
    ])
  },
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/singleDisplay/waiting.vue?vue&type=template&id=c341117c&":
/*!****************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/helper/singleDisplay/waiting.vue?vue&type=template&id=c341117c& ***!
  \****************************************************************************************************************************************************************************************************************************************/
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
      _c("div", { staticClass: "card-header text-center" }, [
        _vm.user.id != _vm.uid
          ? _c("span", { staticClass: "ml-1 text-primary" }, [
              _vm._v(
                "\n                    Please wait, the Quiz Host will start the game soon..\n                "
              ),
            ])
          : _c("span", { staticClass: "ml-1 text-primary" }, [
              _vm._v("\n                    User List\n                "),
            ]),
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "card-body" }, [
        _vm.qr
          ? _c("img", {
              staticClass: "img-thumbnail",
              attrs: { src: _vm.getQr, alt: "QR Code" },
            })
          : _vm._e(),
        _vm._v(" "),
        _c("div", { staticStyle: { "max-height": "50vh", overflow: "auto" } }, [
          _vm.uid === _vm.user.id
            ? _c(
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
                      _c("span", { staticClass: "ml-5" }, [
                        _vm._v(_vm._s(u.name)),
                      ]),
                      _vm._v(" "),
                      _c("span", { staticClass: "ml-1 badge badge-info" }, [
                        _vm._v(_vm._s(u.mobile)),
                      ]),
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
              )
            : _c("ul", { staticClass: "list-group" }, [
                _vm.user.name
                  ? _c("li", { staticClass: "list-group-item active" }, [
                      _c("img", {
                        staticClass: "circle mr-2",
                        attrs: {
                          src: _vm.getAvatar(_vm.user.avatar),
                          alt: _vm.getAvatarAlt(_vm.user.name),
                        },
                      }),
                      _vm._v(" "),
                      _c("span", { staticClass: "ml-5" }, [
                        _vm._v(_vm._s(_vm.user.name)),
                      ]),
                      _vm._v(" "),
                      _c("span", { staticClass: "ml-1 badge badge-info" }, [
                        _vm._v(_vm._s(_vm.user.mobile)),
                      ]),
                      _vm._v(" "),
                      _c("span", { staticClass: "flag" }, [
                        _c("img", {
                          attrs: { src: _vm.getFlag(_vm.user.country) },
                        }),
                      ]),
                    ])
                  : _vm._e(),
              ]),
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "d-flex justify-content-between" }, [
          _vm.user.id == _vm.uid
            ? _c(
                "a",
                {
                  staticClass: "btn btn-sm btn-outline-success mt-4 pull-right",
                  on: {
                    click: function ($event) {
                      return _vm.$emit("gameStart")
                    },
                  },
                },
                [_vm._v("START\n                    ")]
              )
            : _vm._e(),
          _vm._v(" "),
          _c(
            "a",
            {
              staticClass: "btn btn-sm btn-outline-success mt-4",
              on: {
                click: function ($event) {
                  _vm.qr = !_vm.qr
                },
              },
            },
            [_c("i", { staticClass: "fa-solid text-dark fa-qrcode" })]
          ),
        ]),
      ]),
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
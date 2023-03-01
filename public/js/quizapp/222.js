"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[222,184,187],{8342:function(t,e,s){function n(t){return function(t){if(Array.isArray(t))return i(t)}(t)||function(t){if("undefined"!=typeof Symbol&&null!=t[Symbol.iterator]||null!=t["@@iterator"])return Array.from(t)}(t)||function(t,e){if(!t)return;if("string"==typeof t)return i(t,e);var s=Object.prototype.toString.call(t).slice(8,-1);"Object"===s&&t.constructor&&(s=t.constructor.name);if("Map"===s||"Set"===s)return Array.from(t);if("Arguments"===s||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(s))return i(t,e)}(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function i(t,e){(null==e||e>t.length)&&(e=t.length);for(var s=0,n=new Array(e);s<e;s++)n[s]=t[s];return n}s.d(e,{r:function(){return r}});var r={created:function(){},mounted:function(){this.externalJS()},methods:{questionInit:function(){clearInterval(this.timer),clearInterval(this.qt.timer),this.qt.ms=0,this.qt.time=30,this.progress=100,this.answered=0,this.counter=2,this.screen.waiting=0,this.screen.loading=0,this.screen.result=0,this.screen.winner=0},tbe:function(t,e,s){return null!==t&&null!==e?"bd"===s?t:e:null!==t&&null===e?t:null===t&&null!==e?e:t},qne2b:function(t,e,s){return"gb"===s?"Question ".concat(t+1," of ").concat(e," "):"প্রশ্ন ".concat(this.q2bNumber(e)," এর ").concat(this.q2bNumber(t+1)," ")},q2bNumber:function(t){var e=t.toString(),s="",i={0:"০",1:"১",2:"২",3:"৩",4:"৪",5:"৫",6:"৬",7:"৭",8:"৮",9:"৯"};return n(e).forEach((function(t){return s+=i[t]})),s},getUrl:function(t){return location.origin+"/"+t},getMedel:function(t){return 0==t?'<i class="fas fa-award fa-lg" style="color: gold"></i>':1==t?'<i class="fas fa-award" style="color: silver"></i>':2==t?'<i class="fas fa-award fa-sm" style="color: #CD7F32"></i>':""},waitingResult:function(){return"waiting-result"},imageOption:function(t){return t.some((function(t){return"img"==t.flag}))},onEnd:function(){this.av=!0,this.showQuestionOptions(null)},onStart:function(){this.av=!1},stop:function(){this.questionInit(),console.log("stop()")},externalJS:function(){var t=document.createElement("script");t.setAttribute("src","https://cdn.jsdelivr.net/npm/canvas-confetti@1.3.0/dist/confetti.browser.min.js"),document.head.appendChild(t)}},computed:{channel:function(){var t=window.location.pathname.split("/");return"".concat(t[1],".").concat(t[2],".").concat(t[3])},progressClass:function(){return this.progress>66?"bg-success":this.progress>33?"bg-info":"bg-danger"},progressWidth:function(){return{width:this.progress+"%"}}}}},1070:function(t,e,s){var n=s(3645),i=s.n(n)()((function(t){return t[1]}));i.push([t.id,".imageOption[data-v-305fef9b]{height:100px;width:100%}.preventClick[data-v-305fef9b]{background:rgba(0,0,0,.1);height:100%;left:0;position:absolute;top:0;width:100%;z-index:999}.share-result-image[data-v-305fef9b]{max-width:-moz-fit-content;max-width:fit-content}@media screen and (min-width:480px){.imageOption[data-v-305fef9b]{height:170px;width:100%}}",""]),e.Z=i},7907:function(t,e,s){var n=s(3645),i=s.n(n)()((function(t){return t[1]}));i.push([t.id,".circle{background:gray;border-radius:50%;color:#fff;font-size:1.5rem;height:40px;left:15px;text-align:center;top:4px;width:40px}.circle,.flag{position:absolute}.flag{right:15px;top:8px}.close{color:red;position:absolute;right:0;top:-5px}",""]),e.Z=i},3222:function(t,e,s){s.r(e),s.d(e,{default:function(){return p}});var n=s(4187),i=s(2184),r=s(2583),a=s(7873);function o(t){return o="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},o(t)}function c(t,e){var s=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),s.push.apply(s,n)}return s}function u(t,e,s){return(e=function(t){var e=function(t,e){if("object"!==o(t)||null===t)return t;var s=t[Symbol.toPrimitive];if(void 0!==s){var n=s.call(t,e||"default");if("object"!==o(n))return n;throw new TypeError("@@toPrimitive must return a primitive value.")}return("string"===e?String:Number)(t)}(t,"string");return"symbol"===o(e)?e:String(e)}(e))in t?Object.defineProperty(t,e,{value:s,enumerable:!0,configurable:!0,writable:!0}):t[e]=s,t}var l={mixins:[s(8342).r],props:["challenge","uid","propuser","questions","gmsg","teams"],components:{waiting:r.Z,result:a.Z,user_info:i.default,qrcode:n.default},data:function(){return{au:!1,qt:{ms:0,time:30,timer:null},users:[],user:this.propuser,answered:0,end_user:0,answered_user_data:[],results:[],counter:2,timer:null,current:0,av:!0,sqo:!1,qid:0,screen:{waiting:1,loading:0,result:0,resultWaiting:0,winner:0},gamedata:{},score:[],user_ranking:null,game_start:0,progress:100,share:null,pm:"",perform:0,preventClick:!0}},created:function(){var t=this;Echo.channel(this.channel).listen("SingleDisplay.UserJoinEvent",(function(e){console.log(["UserJoinEvent.............",e]),!t.users.some((function(t){return t.id===e.user.id}))&&t.users.push(e.user),t.au=!0})).listen("GameStartEvent",(function(e){console.log(["GameStartEvent.............",e]),t.share=e.share,t.game_start=1,t.screen.waiting=0,t.sqo=!0,t.showQuestionOptions(null)})).listen("GameResetEvent",(function(e){console.log(["GameResetEvent.............",e]),t.gameReset()})).listen("GameEndUserEvent",(function(e){console.log(["GameEndUserEvent.............",e]),t.end_user++,t.users.length==t.end_user&&t.winner()})).listen("QuestionClickedEvent",(function(e){console.log("QuestionClickedEvent............."),t.answered_user_data.push(e),t.getResult()})).listen("KickUserEvent",(function(e){console.log("KickUserEvent............."),t.users=t.users.filter((function(t){return t.id!==e.uid})),t.user.id==e.uid&&(window.location.href="/")}))},mounted:function(){var t=this,e=JSON.parse(sessionStorage.getItem("SingleGameUser"));e&&(this.user=e,axios.post("/api/userJoin",{user:this.user}).then((function(){t.isAuthUser()}))),this.isAuthUser(),console.log("mounted...",e),Echo.channel(this.channel).subscribed((function(t){console.log("SingleQuestionDisplay subscribed",t)})),this.current=this.questions[this.qid].id},methods:{isAuthUser:function(){return this.au="id"in this.user,console.log("au....",this.au),this.au},insertUser:function(t){this.user.name=t,this.user.id=Date.now(),this.user.channel=this.channel,this.user.avatar="",sessionStorage.setItem("SingleGameUser",JSON.stringify(this.user)),axios.post("/api/userJoin",{user:this.user})},preventNav:function(t){this.game_start&&(t.preventDefault(),t.returnValue="")},preventLeave:function(){console.log("new notification leave from quiz. blur"),Notification.requestPermission().then((function(t){"granted"===t&&new Notification("Leave from Quiz",{body:"You should not exit this screen without completing the Exam/quiz.!",tag:"Leave from Quiz"})}))},gameStart:function(){var t=this;this.sqo=!0;var e=this.users.map((function(t){return t.id})),s={channel:this.channel,gameStart:1,uid:e,id:this.challenge.id,users:this.users,host_id:this.uid};console.log(s),axios.post("/api/gameStart",s).then((function(e){t.share=e.data,t.game_start=1,t.screen.waiting=0,t.showQuestionOptions(t.questions[0].fileType)}))},gameResetCall:function(){axios.post("/api/gameReset",{channel:this.channel}).then((function(t){return console.log(t.data)})),this.gameReset()},gameReset:function(){this.questionInit(),this.screen.waiting=1,this.answered_user_data=[],this.results=[],this.qid=0,this.gamedata={},this.score=[],this.user_ranking=null,this.game_start=0,this.current=this.questions[this.qid].id},checkAnswer:function(t,e,s){var n=this;this.answered=1,this.right_wrong=s,this.gamedata.uid=this.user.id,this.gamedata.channel=this.channel,this.gamedata.name=this.user.name,this.gamedata.question=this.questions[this.qid].question_text,this.gamedata.answer=this.getCorrectAnswertext(),this.gamedata.selected=e,this.gamedata.isCorrect=1==s?Math.floor(this.progress):0;var i=function(t){for(var e=1;e<arguments.length;e++){var s=null!=arguments[e]?arguments[e]:{};e%2?c(Object(s),!0).forEach((function(e){u(t,e,s[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(s)):c(Object(s)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(s,e))}))}return t}({},this.gamedata);this.questionInit(),console.log("this.questionInit() call........."),axios.post("/api/questionClick",i).then((function(t){n.resultScreen()})),this.answered_user_data.push(i),this.screen.loading=!0},getCorrectAnswertext:function(){return this.questions[this.qid].options.find((function(t){return 1==t.correct})).option},resultScreen:function(){this.questionInit(),this.getResult(),this.countDown(),this.qid+1==this.questions.length?(console.log("......resultScreen"),this.quizEnd()):(console.log("resultScreen preventClick True"),this.preventClick=!0,this.qid++,this.current=this.questions[this.qid].id,this.showQuestionOptions(null))},QuestionTimer:function(){var t=this;if(this.qid!=this.questions.length&&0!=this.av){var e=100/(5*this.qt.time);this.preventClick=!1,this.qt.timer=setInterval((function(){t.qt.time<=0?(t.questionInit(),t.checkAnswer(t.qid,"Not Answered",0)):(t.qt.ms++,t.progress-=e,5==t.qt.ms&&(t.qt.time--,t.qt.ms=0))}),200)}},countDown:function(){this.counter<=0?(this.qid++,this.current=this.questions[this.qid].id,this.showQuestionOptions(null)):this.counter--},getResult:function(){var t=this;this.results=[],this.users.forEach((function(e){var s=0;t.answered_user_data.filter((function(t){return t.uid===e.id})).map((function(t){s+=t.isCorrect})),t.results.push({id:e.id,name:e.name,score:s})})),this.results.sort((function(t,e){return e.score-t.score}))},winner:function(){var t=this;this.user_ranking=this.results.findIndex((function(e){return e.id==t.user.id}));var e=this.results[this.user_ranking].score;if(this.perform=Math.round(e/(100*(this.qid+1))*100),this.pm=this.gmsg.filter((function(e){return e.perform_status>=t.perform})).reduce((function(t,e){return t.perform_status<e.perform_status?t:e})),this.questionInit(),this.screen.result=1,this.screen.winner=1,this.game_start=0,0==this.user_ranking)confetti({zIndex:999999,particleCount:200,spread:120,origin:{y:.6}});else{var s=["#bb0000","#ffffff"];confetti({zIndex:999999,particleCount:100,angle:60,spread:55,origin:{x:0},colors:s}),confetti({zIndex:999999,particleCount:100,angle:120,spread:55,origin:{x:1},colors:s})}},kickUser:function(t){if(t!=this.uid){this.users=this.users.filter((function(e){return e.id!==t}));var e={channel:this.channel,uid:t};axios.post("/api/kickUser",e)}},gameStarted:function(t){console.log(["user",t])},getShareLink:function(t){return console.log(["urlencode",encodeURI(this.getUrl(t))]),"https://www.facebook.com/plugins/share_button.php?href="+encodeURI(this.getUrl(t))+"&layout=button&size=large&appId=1086594171698024&width=77&height=28"},getOptionClass:function(t,e){return e>0?0==t?"animate__animated animate__lightSpeedInRight":"animate__animated animate__lightSpeedInRight animate__delay-"+t+"s":""},showQuestionOptions:function(t){var e=this,s=1e3;0!=this.challenge.option_view_time&&(s=3500),null!=t&&"image"!=t||(clearInterval(this.qt.timer),setTimeout((function(){e.preventClick=!1,e.QuestionTimer()}),s))},quizEnd:function(){var t=this,e={result:this.results,share_id:this.share.id,channel:this.channel};axios.post("/api/challengeResult",e).then((function(e){return t.end_user++,console.log("users + end user",t.users.length,t.end_user),t.users.length<=t.end_user?void t.winner():void(t.screen.resultWaiting=1)}))}},computed:{}},d=l,h=s(3379),m=s.n(h),f=s(1070),g={insert:"head",singleton:!1},p=(m()(f.Z,g),f.Z.locals,(0,s(1900).Z)(d,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"container"},[s("div",{class:{preventClick:t.preventClick}}),t._v(" "),t.screen.resultWaiting?s("div",{staticClass:"result-waiting"},[t._m(0)]):t._e(),t._v(" "),s("transition",{attrs:{name:"fade"}},[t.screen.result?s("result",{attrs:{results:t.results,lastQuestion:t.qid==t.questions.length}}):t._e()],1),t._v(" "),t.screen.winner?s("div",{staticClass:"winner"},[0==t.user_ranking?s("div",[s("h3",{staticClass:"text-center"},[t._v(t._s(t.pm.perform_message)+" ")]),t._v(" "),s("h3",[s("b",[t._v(t._s(t.user.name))]),t._v(", you won this game.")])]):1==t.user_ranking?s("div",[s("h3",{staticClass:"text-center"},[t._v(t._s(t.pm.perform_message))]),t._v(" "),s("h3",[s("b",[t._v(t._s(t.user.name))]),t._v(", you got second place")])]):s("div",[s("h3",{staticClass:"text-center"},[s("b",[t._v(t._s(t.user.name))]),t._v(", you need more concentration ")])]),t._v(" "),s("button",{staticClass:"btn btn-sm btn-secondary",on:{click:function(e){t.screen.winner=0}}},[t._v("More Result")]),t._v(" "),s("div",{staticClass:"px-2"},[s("img",{staticClass:"card-img img-responsive my-3 lazy share-result-image",attrs:{src:t.getUrl("challengeShareResult/"+t.share.link),type:"image/png"}})]),t._v(" "),s("iframe",{staticStyle:{border:"none",overflow:"hidden"},attrs:{src:t.getShareLink("challengeShareResult/"+t.share.link),width:"77",height:"28",scrolling:"no",frameborder:"0",allowfullscreen:"true",allow:"autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"}})]):t._e(),t._v(" "),t.screen.waiting?s("waiting",{attrs:{uid:t.uid,users:t.users,user:t.user,time:t.challenge.schedule},on:{kickingUser:function(e){return t.kickUser(e)},gameStart:t.gameStart,gameReset:t.gameReset}}):t._e(),t._v(" "),t.au?t._e():s("user_info",{attrs:{uid:t.uid,users:t.users,user:t.user,time:t.challenge.schedule},on:{insertUser:t.insertUser}}),t._v(" "),s("div",{staticClass:"row justify-content-center"},[s("div",{staticClass:"col-md-8"},[s("div",{staticClass:"progress"},[s("div",{staticClass:"progress-bar progress-bar-striped",class:t.progressClass,style:t.progressWidth},[t._v(" "+t._s(Math.floor(t.progress))+"\n                    ")])]),t._v(" "),t._l(t.questions,(function(e){return e.id==t.current?s("div",{staticClass:"card my-4"},[s("div",{staticClass:"card-body animate__animated animate__backInRight animate__faster"},[s("span",{staticClass:"q_num text-right text-muted"},[t._v("\n                            "+t._s(t.qne2b(t.qid,t.questions.length,t.user.lang))+"\n                        ")]),t._v(" "),"image"==e.fileType?s("img",{staticClass:"image w-100 mt-1 rounded img-thumbnail",staticStyle:{"max-height":"70vh"},attrs:{src:"/"+e.question_file_link,alt:""}}):t._e(),t._v(" "),"video"==e.fileType?s("video",{staticClass:"image w-100 mt-1 rounded img-thumbnail",attrs:{autoplay:"",controls:""},on:{ended:function(e){return t.onEnd()},play:function(e){return t.onStart()}}},[s("source",{attrs:{src:"/"+e.question_file_link,type:"video/mp4"}})]):t._e(),t._v(" "),"audio"==e.fileType?s("div",{staticClass:"audio"},[s("audio",{attrs:{controls:"",autoplay:""},on:{ended:function(e){return t.onEnd()},play:function(e){return t.onStart()}}},[s("source",{attrs:{src:"/"+e.question_file_link,type:"audio/mpeg"}})]),t._v(" "),s("div",{attrs:{id:"ar"}})]):t._e(),t._v(" "),s("div",{directives:[{name:"show",rawName:"v-show",value:t.av,expression:"av"}]},[s("div",{staticClass:"card"},[s("div",{staticClass:"card-header"},[s("div",{staticClass:"d-flex align-items-center question-title"},[s("h3",{staticClass:"text-danger"},[t._v("Q.")]),t._v(" "),s("h5",{staticClass:"mt-1 ml-2"},[t._v(t._s(t.tbe(e.bd_question_text,e.question_text,t.user.lang)))])])])]),t._v(" "),t.sqo?s("div",{staticClass:"animate__animated animate__zoomIn animate__faster d-flex flex-wrap",class:{"row justify-content-center justify-item-center":t.imageOption(e.options)}},t._l(e.options,(function(n,i){return s("div",{staticClass:"col-md-6 px-1",class:["img"==n.flag?"col-6":" col-12"]},["img"!=n.flag?s("div",{staticClass:"list-group",class:t.getOptionClass(i,t.challenge.option_view_time)},[s("span",{staticClass:"list-group-item list-group-item-action cursor my-1",domProps:{innerHTML:t._s(t.tbe(n.bd_option,n.option,t.user.lang))},on:{click:function(s){t.checkAnswer(e.id,t.tbe(n.bd_option,n.option,t.user.lang),n.correct)}}})]):s("div",{staticClass:"cursor my-1",class:t.getOptionClass(i,t.challenge.option_view_time),on:{click:function(s){return t.checkAnswer(e.id,n.img_link,n.correct)}}},[s("img",{staticClass:"imageOption mt-1 rounded img-thumbnail",attrs:{src:"/"+n.img_link,alt:""}})])])})),0):t._e()])])]):t._e()}))],2),t._v(" "),s("div",{staticClass:"col-md-4"},[s("div",{staticClass:"card my-4"},[s("div",{staticClass:"card-header"},[t._v("\n                        Score Board\n                        "),s("a",{staticClass:"btn btn-sm btn-danger float-left",on:{click:t.stop}},[t._v("STOP")]),t._v(" "),t.user.id==t.uid&&t.qid>0?s("a",{staticClass:"btn btn-sm btn-danger float-right",on:{click:t.gameResetCall}},[t._v("RESET")]):t._e()]),t._v(" "),t.results.length>0?s("div",{staticClass:"card-body"},[s("transition-group",{staticClass:"list-group",attrs:{name:"slide-up",tag:"ul",appear:""}},t._l(t.results,(function(e,n){return s("li",{key:e.id,staticClass:"list-group-item user-list",class:{active:e.id==t.user.id}},[s("span",{domProps:{innerHTML:t._s(t.getMedel(n))}}),t._v("\n                                "+t._s(e.name)+" "),s("span",{staticClass:"badge badge-dark float-right mt-1"},[t._v(t._s(e.score))])])})),0)],1):t._e()])])])],1)}),[function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"text-center bg-light"},[s("img",{attrs:{src:"/img/quiz/result-waiting.gif",alt:"Waiting for game end."}}),t._v(" "),s("p",{staticClass:"text-center px-5"},[t._v("Please wait result is processing..")])])}],!1,null,"305fef9b",null).exports)},7873:function(t,e,s){s.d(e,{Z:function(){return i}});var n={props:["results","lastQuestion"],methods:{addImage:function(){var t=Math.floor(4*Math.random())+1;return"/images/gp/".concat(t,".jpg")},back:function(){window.location="/game/mode/challenge"},getMedel:function(t){return 0==t?'<span class="badge badge-success m-1">1<sup>st</sup></span> <i class="fas fa-award fa-lg ml-1" style="color: gold"></i>':1==t?'<span class="badge badge-primary m-1">2<sup>nd</sup></span><i class="fas fa-award ml-1" style="color: silver"></i>':2==t?'<span class="badge badge-info m-1">3<sup>rd</sup></span><i class="fas fa-award fa-sm ml-1" style="color: #CD7F32"></i>':t>2?'<span class="badge badge-secondary m-1">'.concat(t+1,"</span>"):void 0}}},i=(0,s(1900).Z)(n,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"result"},[s("div",{staticClass:"card mt-1",staticStyle:{width:"24rem"}},[s("div",{staticClass:"card-header"},[t._v("Results")]),t._v(" "),s("div",{staticClass:"card-body"},[s("ul",{staticClass:"list-group"},t._l(t.results,(function(e,n){return s("li",{key:n,staticClass:"list-group-item"},[s("span",{domProps:{innerHTML:t._s(t.getMedel(n))}}),t._v("\n                        "+t._s(e.name)),s("span",{staticClass:"badge badge-primary float-right mt-1 text-white"},[t._v(t._s(e.score))])])})),0)]),t._v(" "),s("div",{staticClass:"card-footer"},[s("button",{staticClass:"btn btn-sm btn-success",on:{click:t.back}},[t._v("Dashboard")])])])])}),[],!1,null,null,null).exports},4187:function(t,e,s){s.r(e),s.d(e,{default:function(){return i}});var n={computed:{getQr:function(){return"https://api.qrserver.com/v1/create-qr-code/?size=430x430&data="+window.location}},data:function(){return{name:""}},methods:{}},i=(0,s(1900).Z)(n,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"waiting"},[s("div",{staticClass:"card"},[t._m(0),t._v(" "),s("div",{staticClass:"card-body px-3 text-center"},[s("img",{staticClass:"img-thumbnail",attrs:{src:t.getQr,alt:"QR Code"}})])])])}),[function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"card-header text-center"},[s("h4",{staticClass:"ml-1 text-primary"},[t._v("\n                    Scan this QR-Code\n                ")])])}],!1,null,null,null).exports},2184:function(t,e,s){s.r(e),s.d(e,{default:function(){return i}});var n={props:["user","uid","users","time"],data:function(){return{name:"",days:"",hours:"",minutes:"",seconds:"",schedule:"",timer:null}},methods:{kickingUser:function(t){this.$emit("kickingUser",t)},getAvatar:function(t){return t||"/img/avatar.png"},getAvatarAlt:function(t){return t.substring(0,2)},getFlag:function(t){return"https://flagcdn.com/40x30/"+t+".png"},scheduledTimer:function(){var t=this,e=new Date(this.time).getTime();this.timer=setInterval((function(){var s=(new Date).getTime(),n=e-s;t.days=Math.floor(n/864e5),t.hours=Math.floor(n%864e5/36e5),t.minutes=Math.floor(n%36e5/6e4),t.seconds=Math.floor(n%6e4/1e3),t.schedule=t.days+"d "+t.hours+"h "+t.minutes+"m "+t.seconds+"s ",n<0&&(clearInterval(t.timer),t.schedule='<i class="fas fa-check"></i>')}),1e3)}},created:function(){this.scheduledTimer()}},i=(0,s(1900).Z)(n,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"waiting"},[s("div",{staticClass:"card",staticStyle:{width:"24rem"}},[t._m(0),t._v(" "),s("div",{staticClass:"card-body",staticStyle:{"max-height":"90vh",overflow:"auto"}},[s("div",{staticClass:"d-flex justify-content-between"},[s("input",{directives:[{name:"model",rawName:"v-model",value:t.name,expression:"name"}],staticClass:"form-control",attrs:{type:"text",autofocus:""},domProps:{value:t.name},on:{input:function(e){e.target.composing||(t.name=e.target.value)}}})]),t._v(" "),s("div",{staticClass:"d-flex justify-content-center"},[s("a",{staticClass:"btn btn-sm btn-success mt-4 pull-right",class:{disabled:t.name.length<3},on:{click:function(e){return t.$emit("insertUser",t.name)}}},[t._v("SUBMIT")])])])])])}),[function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"card-header text-center"},[s("h4",{staticClass:"ml-1 text-primary"},[t._v("\n                    Please insert your name\n                ")])])}],!1,null,null,null).exports},2583:function(t,e,s){s.d(e,{Z:function(){return c}});var n={props:["user","uid","users","time"],data:function(){return{days:"",hours:"",minutes:"",seconds:"",schedule:"",timer:null,qr:!1}},methods:{kickingUser:function(t){this.$emit("kickingUser",t)},getAvatar:function(t){return t||"/img/avatar.png"},getAvatarAlt:function(t){return t.substring(0,2)},getFlag:function(t){return"https://flagcdn.com/40x30/"+t+".png"},scheduledTimer:function(){var t=this,e=new Date(this.time).getTime();this.timer=setInterval((function(){var s=(new Date).getTime(),n=e-s;t.days=Math.floor(n/864e5),t.hours=Math.floor(n%864e5/36e5),t.minutes=Math.floor(n%36e5/6e4),t.seconds=Math.floor(n%6e4/1e3),t.schedule=t.days+"d "+t.hours+"h "+t.minutes+"m "+t.seconds+"s ",n<0&&(clearInterval(t.timer),t.schedule='<i class="fas fa-check"></i>')}),1e3)}},created:function(){this.scheduledTimer()},computed:{getQr:function(){return"https://api.qrserver.com/v1/create-qr-code/?size=430x430&data="+window.location}}},i=s(3379),r=s.n(i),a=s(7907),o={insert:"head",singleton:!1},c=(r()(a.Z,o),a.Z.locals,(0,s(1900).Z)(n,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"waiting"},[s("div",{staticClass:"card",staticStyle:{"min-width":"24rem"}},[s("div",{staticClass:"card-header"},[t.user.id!=t.uid?s("span",{staticClass:"ml-1 text-primary"},[t._v("Please wait, the Quiz Host will start the game soon..")]):t._e()]),t._v(" "),s("div",{staticClass:"card-body",staticStyle:{"max-height":"90vh",overflow:"auto"}},[t.qr?s("img",{staticClass:"img-thumbnail",attrs:{src:t.getQr,alt:"QR Code"}}):t._e(),t._v(" "),s("ul",{staticClass:"list-group"},t._l(t.users,(function(e){return s("li",{key:e.id,staticClass:"list-group-item",class:{active:e.id==t.user.id}},[s("img",{staticClass:"circle mr-2",attrs:{src:t.getAvatar(e.avatar),alt:t.getAvatarAlt(e.name)}}),t._v(" "),s("span",{staticClass:"ml-5"},[t._v(t._s(e.name))]),t._v(" "),e.id==t.uid?s("span",{staticClass:"ml-1 badge badge-info"},[t._v("Host")]):t._e(),t._v(" "),s("span",{staticClass:"flag"},[s("img",{attrs:{src:t.getFlag(e.country)}})]),t._v(" "),e.id!=t.user.id&&t.user.id==t.uid?s("button",{staticClass:"close",on:{click:function(s){return t.kickingUser(e.id)}}},[s("span",{attrs:{title:"Kick User"}},[t._v("×")])]):t._e()])})),0),t._v(" "),s("div",{staticClass:"d-flex justify-content-between"},[t.user.id==t.uid?s("a",{staticClass:"btn btn-sm btn-outline-success mt-4 pull-right",on:{click:function(e){return t.$emit("gameStart")}}},[t._v("START")]):t._e(),t._v(" "),s("a",{staticClass:"btn btn-sm btn-outline-danger mt-4",on:{click:function(e){t.qr=!t.qr}}},[s("i",{staticClass:"fas fa-check"})])])])])])}),[],!1,null,null,null).exports)},1900:function(t,e,s){function n(t,e,s,n,i,r,a,o){var c,u="function"==typeof t?t.options:t;if(e&&(u.render=e,u.staticRenderFns=s,u._compiled=!0),n&&(u.functional=!0),r&&(u._scopeId="data-v-"+r),a?(c=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),i&&i.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(a)},u._ssrRegister=c):i&&(c=o?function(){i.call(this,(u.functional?this.parent:this).$root.$options.shadowRoot)}:i),c)if(u.functional){u._injectStyles=c;var l=u.render;u.render=function(t,e){return c.call(e),l(t,e)}}else{var d=u.beforeCreate;u.beforeCreate=d?[].concat(d,c):[c]}return{exports:t,options:u}}s.d(e,{Z:function(){return n}})}}]);
"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[392],{9242:function(t,e,s){var n=s(3645),i=s.n(n)()((function(t){return t[1]}));i.push([t.id,".pointer{cursor:pointer}.pointer :hover{background:grey!important}",""]),e.Z=i},1907:function(t,e,s){var n=s(3645),i=s.n(n)()((function(t){return t[1]}));i.push([t.id,".circle{background:gray;border-radius:50%;color:#fff;font-size:1.5rem;height:40px;left:15px;text-align:center;top:4px;width:40px}.circle,.flag{position:absolute}.flag{right:15px;top:8px}.close{color:red;position:absolute;right:0;top:-5px}.ds-btn li{list-style:none;padding:10px}#team_modal{background:linear-gradient(90deg,#0083b0,#00b4db)}#btn_cls{background:#fff;border:1px solid;border-radius:50%;font-size:30px;position:absolute;right:-7px;top:-3px;width:35px}",""]),e.Z=i},8392:function(t,e,s){s.r(e),s.d(e,{default:function(){return h}});var n=s(9018),i=s(5876),a=s(9193);function r(t){return r="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},r(t)}function o(t){return function(t){if(Array.isArray(t))return l(t)}(t)||function(t){if("undefined"!=typeof Symbol&&null!=t[Symbol.iterator]||null!=t["@@iterator"])return Array.from(t)}(t)||function(t,e){if(!t)return;if("string"==typeof t)return l(t,e);var s=Object.prototype.toString.call(t).slice(8,-1);"Object"===s&&t.constructor&&(s=t.constructor.name);if("Map"===s||"Set"===s)return Array.from(t);if("Arguments"===s||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(s))return l(t,e)}(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function l(t,e){(null==e||e>t.length)&&(e=t.length);for(var s=0,n=new Array(e);s<e;s++)n[s]=t[s];return n}function c(t,e){var s=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),s.push.apply(s,n)}return s}function u(t,e,s){return(e=function(t){var e=function(t,e){if("object"!==r(t)||null===t)return t;var s=t[Symbol.toPrimitive];if(void 0!==s){var n=s.call(t,e||"default");if("object"!==r(n))return n;throw new TypeError("@@toPrimitive must return a primitive value.")}return("string"===e?String:Number)(t)}(t,"string");return"symbol"===r(e)?e:String(e)}(e))in t?Object.defineProperty(t,e,{value:s,enumerable:!0,configurable:!0,writable:!0}):t[e]=s,t}var d={props:["id","uid","user","questions","gmsg","teams"],components:{waiting:n.Z,result:a.Z,TeamMember:i.Z},data:function(){return{qt:{ms:0,time:50,timer:null},users:[],answered:0,end_user:0,answered_user_data:[],results:[],counter:2,timer:null,current:0,qid:0,screen:{waiting:1,loading:0,result:0,resultWaiting:0,winner:0,team:1},gamedata:{},score:[],user_ranking:null,game_start:0,progress:100,share:null,pm:"",perform:0,teamUser:[]}},created:function(){var t=this;Echo.channel("challenge.".concat(this.id.id,".").concat(this.uid)).listen("GameStartEvent",(function(e){console.log(["GameStartEvent.............",e]),t.share=e.share,t.game_start=1,t.screen.waiting=0,t.QuestionTimer()})).listen("GameResetEvent",(function(e){console.log(["GameResetEvent.............",e]),t.gameReset()})).listen("GameEndUserEvent",(function(e){console.log(["GameEndUserEvent.............",e]),t.end_user++,t.users.length==t.end_user&&t.winner()})).listen("QuestionClickedEvent",(function(e){console.log("QuestionClickedEvent............."),t.answered_user_data.push(e),t.getResult()})).listen("KickUserEvent",(function(e){console.log("KickUserEvent............."),t.users=t.users.filter((function(t){return t.id!==e.uid})),t.user.id==e.uid&&(window.location.href="http://quiz.test")})).listen("TeamJoin",(function(e){console.log(["Team Join.............",e]),t.teamUser.push({team:e.team,users:e.user}),t.users.map((function(t){t.id===e.user.id&&(t.gid=e.team)})),t.teams.find((function(t){return t.id===e.team})).users.push({user:e.user})}))},mounted:function(){var t=this;Echo.join("challenge.".concat(this.id.id,".").concat(this.uid)).here((function(e){t.users=e})).joining((function(e){t.users.push(e),t.game_start&&t.kickUser(e.id)})).leaving((function(e){t.users=t.users.filter((function(t){return t.id!=e.id})),console.log("".concat(e.name," leaving"))})),this.current=this.questions[this.qid].id,this.externalJS()},methods:{QuestionTimer:function(){var t=this,e=100/(10*this.qt.time);console.log("QuestionTimer started"),this.qt.timer=setInterval((function(){0==t.qt.time?(t.answered||t.checkAnswer(t.qid,"Not Answered",0),t.questionInit(),t.resultScreen()):(t.qt.ms++,t.progress-=e,10==t.qt.ms&&(t.qt.time--,t.qt.ms=0))}),100)},gameStart:function(){var t=this,e=this.users.map((function(t){return t.id})),s={channel:this.channel,gameStart:1,uid:e,id:this.id.id,users:this.users,host_id:this.uid};console.log(s),axios.post("/api/gameStart",s).then((function(e){return t.share=e.data})),this.game_start=1,this.screen.waiting=0,this.QuestionTimer()},gameResetCall:function(){axios.post("/api/gameReset",{channel:this.channel}).then((function(t){return console.log(t.data)})),this.gameReset()},gameReset:function(){this.questionInit(),this.screen.waiting=1,this.answered_user_data=[],this.results=[],this.qid=0,this.gamedata={},this.score=[],this.user_ranking=null,this.game_start=0,this.current=this.questions[this.qid].id},checkAnswer:function(t,e,s){this.answered=1,this.right_wrong=s,this.gamedata.uid=this.user.id,this.gamedata.channel=this.channel,this.gamedata.name=this.user.name,this.gamedata.question=this.questions[this.qid].question_text,this.gamedata.answer=this.getCorrectAnswertext(),this.gamedata.selected=e,this.gamedata.isCorrect=1==s?Math.floor(this.progress):0,axios.post("/api/questionClick",this.gamedata);var n=function(t){for(var e=1;e<arguments.length;e++){var s=null!=arguments[e]?arguments[e]:{};e%2?c(Object(s),!0).forEach((function(e){u(t,e,s[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(s)):c(Object(s)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(s,e))}))}return t}({},this.gamedata);if(this.answered_user_data.push(n),this.screen.loading=!0,this.resultScreen(),this.qid+1==this.questions.length){var i={result:this.results,share_id:this.share.id};axios.post("/api/challengeResult",i).then((function(t){return console.log(t.data)}))}},getCorrectAnswertext:function(){return this.questions[this.qid].options.find((function(t){return 1==t.correct})).option},resultScreen:function(){if(console.log("resultScreen"),this.getResult(),this.countDown(),this.questionInit(),this.qid+1==this.questions.length)return axios.post("/api/gameEndUser",{channel:this.channel}),this.end_user++,this.users.length==this.end_user?void this.winner():void(this.screen.resultWaiting=1);this.qid++,this.current=this.questions[this.qid].id,this.QuestionTimer()},countDown:function(){if(console.log("countDown"),0==this.counter){if(this.questionInit(),this.qid+1==this.questions.length)return this.winner(),void(this.counter=0);this.qid++,this.current=this.questions[this.qid].id,this.QuestionTimer()}this.counter--},getResult:function(){var t=this;console.log("getResult"),this.results=[],this.users.forEach((function(e){var s=0;t.answered_user_data.filter((function(t){return t.uid===e.id})).map((function(t){s+=t.isCorrect})),t.results.push({id:e.id,name:e.name,score:s})})),this.results.sort((function(t,e){return e.score-t.score}))},winner:function(){var t=this;this.user_ranking=this.results.findIndex((function(e){return e.id==t.user.id}));var e=this.results[this.user_ranking].score;if(this.perform=Math.round(e/(100*(this.qid+1))*100),this.pm=this.gmsg.filter((function(e){return e.perform_status>=t.perform})).reduce((function(t,e){return t.perform_status<e.perform_status?t:e})),this.questionInit(),this.screen.result=1,this.screen.winner=1,this.game_start=0,0==this.user_ranking)confetti({zIndex:999999,particleCount:200,spread:120,origin:{y:.6}});else{var s=["#bb0000","#ffffff"];confetti({zIndex:999999,particleCount:100,angle:60,spread:55,origin:{x:0},colors:s}),confetti({zIndex:999999,particleCount:100,angle:120,spread:55,origin:{x:1},colors:s})}},externalJS:function(){var t=document.createElement("script");t.setAttribute("src","https://cdn.jsdelivr.net/npm/canvas-confetti@1.3.0/dist/confetti.browser.min.js"),document.head.appendChild(t)},kickUser:function(t){if(t!=this.uid){this.users=this.users.filter((function(e){return e.id!==t}));var e={channel:this.channel,uid:t};axios.post("/api/kickUser",e)}},questionInit:function(){clearInterval(this.timer),clearInterval(this.qt.timer),this.qt.ms=0,this.qt.time=50,this.progress=100,this.answered=0,this.counter=2,this.screen.waiting=0,this.screen.loading=0,this.screen.result=0,this.screen.winner=0},gameStarted:function(t){console.log(["user",t])},q2bNumber:function(t){var e=t.toString(),s="",n={0:"০",1:"১",2:"২",3:"৩",4:"৪",5:"৫",6:"৬",7:"৭",8:"৮",9:"৯"};return o(e).forEach((function(t){return s+=n[t]})),s},tbe:function(t,e,s){return null!==t&&null!==e?"bd"===s?t:e:null!==t&&null===e?t:null===t&&null!==e?e:t},qne2b:function(t,e,s){return"gb"===s?"Question ".concat(t+1," of ").concat(e," "):"প্রশ্ন ".concat(this.q2bNumber(e)," এর ").concat(this.q2bNumber(t+1)," ")},getUrl:function(t){return location.origin+"/"+t},getShareLink:function(t){return console.log(["urlencode",encodeURI(this.getUrl(t))]),"https://www.facebook.com/plugins/share_button.php?href="+encodeURI(this.getUrl(t))+"&layout=button&size=large&appId=1086594171698024&width=77&height=28"},getMedel:function(t){return 0==t?'<i class="fas fa-award fa-lg" style="color: gold"></i>':1==t?'<i class="fas fa-award" style="color: silver"></i>':2==t?'<i class="fas fa-award fa-sm" style="color: #CD7F32"></i>':""},waitingResult:function(){return"waiting-result"},joinTeam:function(t){var e=this,s={channel:this.channel,team:t,user:this.user};this.teamUser.push({team:t,users:this.user}),this.users.map((function(s){s.id===e.user.id&&(s.gid=t)})),axios.post("/api/jointeam",s).then((function(t){return e.screen.team=0}))}},computed:{channel:function(){return"challenge.".concat(this.id.id,".").concat(this.uid)},progressClass:function(){return this.progress>66?"bg-success":this.progress>33?"bg-info":"bg-danger"},progressWidth:function(){return{width:this.progress+"%"}}}},m=d,h=(0,s(1900).Z)(m,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"container"},[t.screen.resultWaiting?s("div",{staticClass:"result-waiting"},[t._m(0)]):t._e(),t._v(" "),s("transition",{attrs:{name:"fade"}},[t.screen.result?s("result",{attrs:{results:t.results,lastQuestion:t.qid+1==t.questions.length}}):t._e()],1),t._v(" "),t.screen.winner?s("div",{staticClass:"winner"},[0==t.user_ranking?s("div",[s("h3",{staticClass:"text-center"},[t._v(t._s(t.pm.perform_message)+" ")]),t._v(" "),s("h3",[s("b",[t._v(t._s(t.user.name))]),t._v(", you won this game.")])]):1==t.user_ranking?s("div",[s("h3",{staticClass:"text-center"},[t._v(t._s(t.pm.perform_message))]),t._v(" "),s("h3",[s("b",[t._v(t._s(t.user.name))]),t._v(", you got second place")])]):s("div",[s("h3",{staticClass:"text-center"},[s("b",[t._v(t._s(t.user.name))]),t._v(", you need more concentration ")])]),t._v(" "),s("button",{staticClass:"btn btn-sm btn-secondary",on:{click:function(e){t.screen.winner=0}}},[t._v("More Result")]),t._v(" "),s("img",{staticClass:"card-img img-responsive my-3",staticStyle:{width:"500px !important"},attrs:{src:t.getUrl("challengeShareResult/"+t.share.link),type:"image/png"}}),t._v(" "),s("iframe",{staticStyle:{border:"none",overflow:"hidden"},attrs:{src:t.getShareLink("challengeShareResult/"+t.share.link),width:"77",height:"28",scrolling:"no",frameborder:"0",allowfullscreen:"true",allow:"autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"}})]):t._e(),t._v(" "),t.screen.waiting?s("waiting",{attrs:{teams:t.teams,teamUser:t.teamUser,uid:t.uid,users:t.users,user:t.user,time:t.id.schedule},on:{kickingUser:function(e){return t.kickUser(e)},gameStart:t.gameStart,gameReset:t.gameReset}}):t._e(),t._v(" "),1==t.screen.team?s("team-member",{attrs:{teams:t.teams,user:t.user},on:{joinTeam:function(e){return t.joinTeam(e)}}}):t._e(),t._v(" "),s("div",{staticClass:"row justify-content-center"},[s("div",{staticClass:"col-md-8"},[s("div",{staticClass:"progress"},[s("div",{staticClass:"progress-bar progress-bar-striped",class:t.progressClass,style:t.progressWidth},[t._v(" "+t._s(Math.floor(t.progress))+"\n                ")])]),t._v(" "),t._l(t.questions,(function(e){return e.id==t.current?s("div",{staticClass:"card my-4"},[s("div",{staticClass:"card-body animate__animated animate__backInRight animate__faster"},[s("span",{staticClass:"q_num text-right text-muted"},[t._v("\n                        "+t._s(t.qne2b(t.qid,t.questions.length,t.user.lang))+"\n                    ")]),t._v(" "),e.more_info_link?s("img",{staticClass:"image w-100 mt-1 rounded",staticStyle:{"max-height":"70vh"},attrs:{src:e.more_info_link}}):t._e(),t._v(" "),s("p",{staticClass:"my-2 font-bold",domProps:{innerHTML:t._s(t.tbe(e.bd_question_text,e.question_text,t.user.lang))}}),t._v(" "),t._l(e.options,(function(n){return s("ul",{staticClass:"list-group"},[s("li",{staticClass:"list-group-item list-group-item-action cursor my-1",on:{click:function(s){return t.checkAnswer(e.id,n.option,n.correct)}}},[s("span",{domProps:{innerHTML:t._s(t.tbe(n.bd_option,n.option,t.user.lang))}})])])}))],2)]):t._e()}))],2),t._v(" "),s("div",{staticClass:"col-md-4"},[s("div",{staticClass:"card my-4"},[s("div",{staticClass:"card-header"},[t._v("\n                    Score Board\n                    "),t.user.id==t.uid&&t.qid>0?s("a",{staticClass:"btn btn-sm btn-danger float-right",on:{click:t.gameResetCall}},[t._v("RESET")]):t._e()]),t._v(" "),t.results.length>0?s("div",{staticClass:"card-body"},[s("transition-group",{staticClass:"list-group",attrs:{name:"slide-up",tag:"ul",appear:""}},t._l(t.results,(function(e,n){return s("li",{key:e.id,staticClass:"list-group-item user-list",class:{active:e.id==t.user.id}},[s("span",{domProps:{innerHTML:t._s(t.getMedel(n))}}),t._v("\n                            "+t._s(e.name)+" "),s("span",{staticClass:"badge badge-dark float-right mt-1"},[t._v(t._s(e.score))])])})),0)],1):t._e()])])])],1)}),[function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"text-center bg-light"},[s("img",{attrs:{src:"/img/quiz/result-waiting.gif",alt:"Waiting for game end."}}),t._v(" "),s("p",{staticClass:"text-center px-5"},[t._v("Please wait result is processing..")])])}],!1,null,null,null).exports},5876:function(t,e,s){s.d(e,{Z:function(){return l}});var n={props:["teams","user"],data:function(){return{colors:["bg-info","bg-danger","bg-success","bg-dark","bg-primary","bg-secondary","bg-warning"]}},methods:{cardColor:function(){return this.colors[Math.floor(Math.random()*this.colors.length)]},tbe:function(t,e,s){return null!==t&&null!==e?(console.log("no null question"),"bd"===s?t:e):null!==t&&null===e?(console.log("Bangla not null"),t):null===t&&null!==e?(console.log("English not null"),e):t}}},i=s(3379),a=s.n(i),r=s(9242),o={insert:"head",singleton:!1},l=(a()(r.Z,o),r.Z.locals,(0,s(1900).Z)(n,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"waiting bg-team text-center"},[s("h2",[t._v(t._s(t.tbe("দয়া করে আপনার দল নির্বাচন করুন","Please Select Your Team",t.user.lang)))]),t._v(" "),t._l(t.teams,(function(e,n){return s("div",{key:e.id,staticClass:"card mb-2 pointer",staticStyle:{width:"24rem"},on:{click:function(s){return t.$emit("joinTeam",e.id)}}},[s("div",{staticClass:"card-body bg-secondary",staticStyle:{"max-height":"90vh",overflow:"auto"}},[s("h1",{staticClass:"text-center text-white"},[t._v("\n                        "+t._s(e.name)+"\n                    ")])])])}))],2)}),[],!1,null,null,null).exports)},9018:function(t,e,s){s.d(e,{Z:function(){return c}});function n(t){return n="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},n(t)}var i={props:["user","uid","users","time","teamUser","teams"],data:function(){return{days:"",hours:"",minutes:"",seconds:"",schedule:"",timer:null,teamUsers:this.team_users,colors:["border-primary","border-secondary","border-success","border-danger","border-warning","border-info","border-dark"],teamData:{team_english:"",team_bangla:""},teamsNewdata:this.teams,showDelete:!0,teamId:null}},methods:{open_team_modal:function(){$("#team_modal").modal("show")},addemitTeam:function(){$("#team_modal").modal("hide"),this.$emit("addTeam",this.teamData),this.teamData.team_english="",this.teamData.team_bangla=""},deleteTeam:function(t){this.teamId=t,$("#deleteModal").modal("show")},deleteSubmit:function(){$("#deleteModal").modal("hide"),this.$emit("deleteTeam",this.teamId),this.teamId=null},cardColor:function(t){return this.colors[Math.floor(Math.random()*this.colors.length)]},getTeamUsers:function(t){var e=this.users.map((function(e){if(e.gid===t)return e}));return n("undefined"!==e)?e:[]},kickingUser:function(t){this.$emit("kickingUser",t)},getTeamMember:function(t){this.users.map((function(e){if(e.team_id==t)return"".concat(e.name)}))},getAvatar:function(t){return t||"/img/avatar.png"},getAvatarAlt:function(t){return t.substring(0,2)},getFlag:function(t){return"https://flagcdn.com/40x30/"+t+".png"},scheduledTimer:function(){var t=this,e=new Date(this.time).getTime();this.timer=setInterval((function(){var s=(new Date).getTime(),n=e-s;t.days=Math.floor(n/864e5),t.hours=Math.floor(n%864e5/36e5),t.minutes=Math.floor(n%36e5/6e4),t.seconds=Math.floor(n%6e4/1e3),t.schedule=t.days+"d "+t.hours+"h "+t.minutes+"m "+t.seconds+"s ",n<0&&(clearInterval(t.timer),t.schedule='<i class="fas fa-check"></i>')}),1e3)},tbe:function(t,e,s){return null!==t&&null!==e?(console.log("no null question"),"bd"===s?t:e):null!==t&&null===e?(console.log("Bangla not null"),t):null===t&&null!==e?(console.log("English not null"),e):t}},created:function(){this.scheduledTimer(),console.log("scheduledTimer started")}},a=s(3379),r=s.n(a),o=s(1907),l={insert:"head",singleton:!1},c=(r()(o.Z,l),o.Z.locals,(0,s(1900).Z)(i,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"waiting"},[s("div",{staticClass:"card",staticStyle:{width:"24rem"}},[t.user.id!=t.uid?s("div",{staticClass:"card-header"},[s("span",{staticClass:"ml-1 text-primary"},[t._v("\n                    "+t._s(t.tbe("দয়া করে অপেক্ষা করুন, কুইজ মাস্টার শীঘ্রই গেমটি শুরু করবে ..","Please wait, the Quiz Master will start the game soon..",t.user.lang))+"\n                ")])]):t._e(),t._v(" "),s("div",{staticClass:"card-body",staticStyle:{"max-height":"90vh",overflow:"auto"}},[s("h3",{staticClass:"p-2"},[s("i",{staticClass:"fa fa-trophy",attrs:{"aria-hidden":"true"}}),t._v("\n                    "+t._s(t.tbe("অংশগ্রহণকারী দল","Participant Group",t.user.lang))+"\n                ")]),t._v(" "),s("div",{staticClass:"row"},[s("div",{staticClass:"col-md-12"},t._l(t.teamsNewdata,(function(e,n){return s("div",{key:n,staticClass:"card mt-2",class:t.cardColor()},[s("div",{staticClass:"card-body"},[s("div",{staticClass:"news-title"},[s("h2",{staticClass:"title-small"},[t._v("\n                                        "+t._s(e.name)+"\n                                        "),t.user.id==t.uid?s("span",{staticClass:"text-danger float-right",staticStyle:{cursor:"pointer"},on:{click:function(s){return t.deleteTeam(e.id)}}},[t._v("\n                                            X\n                                        ")]):t._e()])]),t._v(" "),s("p",{staticClass:"card-text"},t._l(t.getTeamUsers(e.id),(function(e){return e?s("span",{key:e.id,staticClass:"badge badge-info mr-1"},[t._v(t._s(e.name))]):t._e()})),0)])])})),0)]),t._v(" "),s("div",{staticClass:"d-flex justify-content-between"},[t.user.id==t.uid?s("a",{staticClass:"btn btn-sm btn-outline-success mt-4 pull-right",on:{click:function(e){return t.$emit("gameStart")}}},[t._v("\n                        "+t._s(t.tbe("শুরু করুন","START",t.user.lang))+"\n                    ")]):t._e(),t._v(" "),t.user.id==t.uid?s("a",{staticClass:"btn btn-sm btn-outline-info mt-4 pull-right",on:{click:t.open_team_modal}},[t._v("\n                        "+t._s(t.tbe("দল যুক্ত করুন","Add Team",t.user.lang))+"\n                    ")]):t._e()])])]),t._v(" "),s("div",{staticClass:"modal animate__animated animate__backInUp",attrs:{tabindex:"-1","data-backdrop":"false",role:"dialog",id:"team_modal"}},[s("div",{staticClass:"modal-dialog modal-lg modal-dialog-centered",attrs:{role:"document"}},[s("div",{staticClass:"modal-content"},[s("div",{staticClass:"modal-header"},[s("h5",{staticClass:"modal-title"},[t._v(t._s(t.tbe("দল যুক্ত করুন","ADD TEAM",t.user.lang)))]),t._v(" "),t._m(0)]),t._v(" "),s("div",{staticClass:"modal-body"},[s("div",{staticClass:"row"},[s("div",{staticClass:"form-group col-md-6 col-sm-6"},[s("input",{directives:[{name:"model",rawName:"v-model",value:t.teamData.team_english,expression:"teamData.team_english"}],staticClass:"form-control",attrs:{type:"text",min:"1",max:"10",placeholder:t.tbe("ইংরেজিতে লিখুন","Type in English",t.user.lang)},domProps:{value:t.teamData.team_english},on:{input:function(e){e.target.composing||t.$set(t.teamData,"team_english",e.target.value)}}})]),t._v(" "),s("div",{staticClass:"form-group col-md-6 col-sm-6"},[s("input",{directives:[{name:"model",rawName:"v-model",value:t.teamData.team_bangla,expression:"teamData.team_bangla"}],staticClass:"form-control",attrs:{type:"text",min:"1",max:"10",placeholder:t.tbe("বাংলায় লিখুন","Type in Bangla",t.user.lang)},domProps:{value:t.teamData.team_bangla},on:{input:function(e){e.target.composing||t.$set(t.teamData,"team_bangla",e.target.value)}}})])])]),t._v(" "),s("div",{staticClass:"modal-footer"},[s("button",{staticClass:"btn btn-primary",attrs:{type:"button"},on:{click:t.addemitTeam}},[t._v("\n                            "+t._s(t.tbe("দল যুক্ত করুন","ADD TEAM",t.user.lang))+"\n                        ")]),t._v(" "),s("button",{staticClass:"btn btn-danger",attrs:{type:"button","data-dismiss":"modal"}},[t._v("\n                            "+t._s(t.tbe("বাতিল করুন","Cancel",t.user.lang))+"\n                        ")])])])])]),t._v(" "),s("div",{staticClass:"modal animate__animated animate__backInLeft",attrs:{tabindex:"-1","data-backdrop":"false",role:"dialog",id:"deleteModal"}},[s("div",{staticClass:"modal-dialog modal-dialog-centered",attrs:{role:"document"}},[s("div",{staticClass:"modal-content"},[s("div",{staticClass:"modal-header"},[s("h5",{staticClass:"modal-title"},[t._v(t._s(t.tbe("দল ডিলিট করুন","DELETE TEAM",t.user.lang)))])]),t._v(" "),s("div",{staticClass:"modal-body"},[s("p",[t._v(t._s(t.tbe("আপনি কি এই দলটিকে মুছে ফেলার বিষয়ে নিশ্চিত?","Are you sure to delete this team?",t.user.lang)))])]),t._v(" "),s("div",{staticClass:"modal-footer"},[s("button",{staticClass:"btn btn-primary",attrs:{type:"button"},on:{click:t.deleteSubmit}},[t._v(t._s(t.tbe("দল ডিলিট করুন","DELETE TEAM",t.user.lang)))]),t._v(" "),s("button",{staticClass:"btn btn-danger",attrs:{type:"button","data-dismiss":"modal"}},[t._v(t._s(t.tbe("বাতিল করুন","CANCEL",t.user.lang)))])])])])])])}),[function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("button",{staticClass:"close",attrs:{type:"button","data-dismiss":"modal","aria-label":"Close"}},[s("span",{attrs:{id:"btn_cls","aria-hidden":"true"}},[t._v("×")])])}],!1,null,null,null).exports)},9193:function(t,e,s){s.d(e,{Z:function(){return a}});var n={props:["results","lastQuestion","resultDetail","user","uid","requestHostUser","mode"],data:function(){return{showResult:!0,resultDetailData:null,makeUid:this.user.id}},mounted:function(){console.log("result data",this.resultDetailData)},methods:{makeHostByHost:function(){this.$emit("makeHost",this.makeUid),this.makeUid=this.user.id},isDisabledHost:function(){return this.uid==this.makeUid},isDisabled:function(){return null!=this.requestHostUser},checkURL:function(t){return null!=t.match(/\.(jpeg|jpg|gif|png)$/)},selectUid:function(t){this.uid==this.user.id&&(this.makeUid=t)},showDetail:function(){var t=this;null!=this.resultDetailData||(this.resultDetailData=this.resultDetail.filter((function(e){return e.uid==t.user.id}))),this.showResult=!this.showResult},addImage:function(){var t=Math.floor(4*Math.random())+1;return"/images/gp/".concat(t,".jpg")},back:function(){var t=window.location.pathname.split("/");window.location="/".concat(t[1])},getMedel:function(t){return 0==t?'<span class="badge badge-success m-1">1<sup>st</sup></span> <i class="fas fa-award fa-lg ml-1" style="color: gold"></i>':1==t?'<span class="badge badge-primary m-1">2<sup>nd</sup></span><i class="fas fa-award ml-1" style="color: silver"></i>':2==t?'<span class="badge badge-info m-1">3<sup>rd</sup></span><i class="fas fa-award fa-sm ml-1" style="color: #CD7F32"></i>':t>2?'<span class="badge badge-secondary m-1">'.concat(t+1,"</span>"):void 0}}},i=(0,s(1900).Z)(n,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"result"},[t.requestHostUser&&t.uid==t.user.id?s("div",{staticClass:"d-flex px-2"},[s("div",{staticClass:"alert alert-success page-alert text-center",attrs:{id:"alert-1"}},[s("strong",[t._v(t._s(t.requestHostUser.name))]),t._v(" requested to host the quiz.\n        "),s("hr"),t._v(" "),s("button",{staticClass:"btn btn-sm btn-success",on:{click:function(e){return t.$emit("makeHost",t.requestHostUser.id,"accept")}}},[t._v("Accept")]),t._v(" "),s("button",{staticClass:"btn btn-sm btn-danger",on:{click:function(e){return t.$emit("makeHost",t.requestHostUser.id,"deny")}}},[t._v("Deny")])])]):t._e(),t._v(" "),t.showResult?s("div",{staticClass:"card mt-1",staticStyle:{width:"24rem"}},["moderator"!==t.mode?s("div",[t.uid==t.user.id?s("div",{staticClass:"d-flex justify-content-between p-2"},[s("button",{staticClass:"btn btn-primary",attrs:{type:"button"},on:{click:function(e){return t.$emit("playAgain",!0)}}},[t._v("Play again")]),t._v(" "),s("button",{staticClass:"btn btn-secondary",attrs:{type:"button"},on:{click:function(e){return t.$emit("newQuiz",t.makeUid)}}},[t._v("New quiz")]),t._v(" "),t.isDisabledHost()?s("button",{staticClass:"btn btn-secondary disabled",attrs:{type:"button"}},[t._v("\n                Make host\n              ")]):s("button",{staticClass:"btn btn-success",attrs:{type:"button"},on:{click:function(e){return t.makeHostByHost()}}},[t._v("\n                Make host\n              ")])]):s("div",{staticClass:"d-flex justify-content-between p-2"},[t.isDisabled()?s("button",{staticClass:"btn btn-secondary disabled",attrs:{type:"button"}},[t._v("\n                Request Pending\n              ")]):s("button",{staticClass:"btn btn-success",attrs:{type:"button"},on:{click:function(e){return t.$emit("makeHost",t.makeUid)}}},[t._v("\n                Make host\n              ")])])]):t._e(),t._v(" "),s("div",{staticClass:"card-header"},[t._v("Results")]),t._v(" "),s("div",{staticClass:"card-body"},[s("ul",{staticClass:"list-group"},t._l(t.results,(function(e,n){return s("li",{key:n,staticClass:"list-group-item",class:[e.id==t.makeUid?"bg-success":""],staticStyle:{cursor:"pointer"},on:{click:function(s){return t.selectUid(e.id)}}},[s("span",{domProps:{innerHTML:t._s(t.getMedel(n))}}),t._v("\n                        "+t._s(e.name)+" "),e.id==t.user.id?s("span",[t._v("(You)")]):t._e(),t._v(" "),e.id==t.uid?s("span",{staticClass:"ml-1 badge badge-info"},[t._v("Host")]):t._e(),t._v(" "),t.requestHostUser?s("span",{staticClass:"ml-1 badge badge-danger"},[t._v("\n                        "+t._s(e.id==t.requestHostUser.id?"Requested":"")+"\n                      ")]):t._e(),t._v(" "),s("span",{staticClass:"badge badge-primary float-right mt-1 text-white"},[t._v("\n                        "+t._s(e.score)+"\n                      ")])])})),0)]),t._v(" "),s("div",{staticClass:"card-footer"},[s("div",{staticClass:"d-flex justify-content-between"},[s("button",{staticClass:"btn btn-sm btn-success",on:{click:t.back}},[t._v("Dashboard")]),t._v(" "),"moderator"!==t.mode?s("button",{staticClass:"btn btn-sm btn-info",on:{click:t.showDetail}},[t._v("\n                      Show your result\n                    ")]):t._e()])])]):s("div",{staticClass:"card mt-1",staticStyle:{width:"24rem"}},[s("div",{staticClass:"card-header"},[t._v("Result Detail")]),t._v(" "),s("div",{staticClass:"card-body overflow-auto",staticStyle:{height:"500px"}},t._l(t.resultDetailData,(function(e,n){return s("div",{key:"resD"+n},[s("div",{staticClass:"w-100 mb-2",attrs:{id:"accordion"+n}},[s("div",{staticClass:"card text-white"},[s("div",{staticClass:"card-header p-1 cursor",class:[e.isCorrect>0?"bg-success":"bg-danger"],attrs:{id:"heading"+n,"data-toggle":"collapse","data-target":"#collapse"+n,"aria-expanded":"true","aria-controls":"collapse"+n}},[s("span",{staticClass:"text-white rounded-circle"},[t._v(t._s(n+1))]),t._v("\n                                "+t._s(e.question)+"\n                            ")]),t._v(" "),s("div",{staticClass:"collapse show",attrs:{id:"collapse"+n,"aria-labelledby":"heading"+n,"data-parent":"#accordion"+n}},[s("div",{staticClass:"card-body"},[s("div",{staticClass:"px-1"},[e.isCorrect>0?s("div",{staticClass:"list-group"},[t.checkURL(e.selected)?s("span",{staticClass:"list-group-item list-group-item-action my-1"},[s("img",{staticClass:"imageOption mt-1 rounded img-thumbnail",attrs:{src:"/"+e.selected,alt:""}}),t._v("\n                                              (your answer is correct)\n                                              "),s("i",{staticClass:"fa fa-check text-success",attrs:{"aria-hidden":"true"}})]):s("span",{staticClass:"list-group-item list-group-item-action my-1"},[t._v("\n                                              "+t._s(e.selected)+" (your answer is correct)\n                                              "),s("i",{staticClass:"fa fa-check text-success",attrs:{"aria-hidden":"true"}})])]):s("div",{staticClass:"list-group"},[t.checkURL(e.selected)?s("span",{staticClass:"list-group-item list-group-item-action my-1"},[s("img",{staticClass:"imageOption mt-1 rounded img-thumbnail",attrs:{src:"/"+e.selected,alt:""}}),t._v("\n                                              (your answer)\n                                              "),s("i",{staticClass:"fa fa-times text-danger",attrs:{"aria-hidden":"true"}})]):s("span",{staticClass:"list-group-item list-group-item-action my-1"},[t._v("\n                                              "+t._s(e.selected)+" (your answer)\n                                              "),s("i",{staticClass:"fa fa-times text-danger",attrs:{"aria-hidden":"true"}})]),t._v(" "),t.checkURL(e.answer)?s("div",{staticClass:"list-group"},[s("span",{staticClass:"list-group-item list-group-item-action my-1"},[s("img",{staticClass:"imageOption mt-1 rounded img-thumbnail",attrs:{src:"/"+e.answer,alt:""}}),t._v("\n                                                    (correct answer)\n                                                    "),s("i",{staticClass:"fa fa-check text-success",attrs:{"aria-hidden":"true"}})])]):s("div",{staticClass:"list-group"},[s("span",{staticClass:"list-group-item list-group-item-action my-1"},[t._v("\n                                                    "+t._s(e.answer)+" (correct answer)\n                                                    "),s("i",{staticClass:"fa fa-check text-success",attrs:{"aria-hidden":"true"}})])])])])])])])])])})),0),t._v(" "),s("div",{staticClass:"card-footer"},[s("button",{staticClass:"btn btn-sm btn-success",on:{click:t.showDetail}},[t._v("Close")])])])])}),[],!1,null,null,null),a=i.exports},1900:function(t,e,s){function n(t,e,s,n,i,a,r,o){var l,c="function"==typeof t?t.options:t;if(e&&(c.render=e,c.staticRenderFns=s,c._compiled=!0),n&&(c.functional=!0),a&&(c._scopeId="data-v-"+a),r?(l=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),i&&i.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(r)},c._ssrRegister=l):i&&(l=o?function(){i.call(this,(c.functional?this.parent:this).$root.$options.shadowRoot)}:i),l)if(c.functional){c._injectStyles=l;var u=c.render;c.render=function(t,e){return l.call(e),u(t,e)}}else{var d=c.beforeCreate;c.beforeCreate=d?[].concat(d,l):[l]}return{exports:t,options:c}}s.d(e,{Z:function(){return n}})}}]);
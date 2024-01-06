"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[152],{3682:function(t,n,e){var i=e(3645),o=e.n(i)()((function(t){return t[1]}));o.push([t.id,"#qmodal{background:linear-gradient(90deg,#0083b0,#00b4db)}#btn_cls_q{background:#fff;border:1px solid;border-radius:50%;font-size:30px;position:absolute;right:-7px;top:-3px;width:35px}.imgTick{position:absolute;right:24px;top:15px}.imageOption{height:100px;width:100%}@media screen and (min-width:480px){.imageOption{height:170px;width:100%}}.imageDiv{width:300px}",""]),n.Z=o},402:function(t,n,e){var i=e(3645),o=e.n(i)()((function(t){return t[1]}));o.push([t.id,".Tick[data-v-16c6670c]{background-color:gray;height:100%;opacity:.7;position:absolute;top:0;width:100%}",""]),n.Z=o},3152:function(t,n,e){e.r(n),e.d(n,{default:function(){return a}});function i(t){return function(t){if(Array.isArray(t))return o(t)}(t)||function(t){if("undefined"!=typeof Symbol&&null!=t[Symbol.iterator]||null!=t["@@iterator"])return Array.from(t)}(t)||function(t,n){if(!t)return;if("string"==typeof t)return o(t,n);var e=Object.prototype.toString.call(t).slice(8,-1);"Object"===e&&t.constructor&&(e=t.constructor.name);if("Map"===e||"Set"===e)return Array.from(t);if("Arguments"===e||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(e))return o(t,n)}(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function o(t,n){(null==n||n>t.length)&&(n=t.length);for(var e=0,i=new Array(n);e<n;e++)i[e]=t[e];return i}var r={components:{OptionComponent:e(5378).Z},props:["questions","exam","user"],data:function(){return{screen:{exam:!0,examSubmit:!1},formData:{topics:0,q_number:null},questiondata:this.questions,countDown:this.examTime,timer:{hours:0,minutes:0,seconds:0},results:[]}},methods:{countDownTimer:function(){var t=this;this.countDown>0&&setTimeout((function(){t.countDown-=1,t.timer.minutes=Math.floor(t.countDown/60),t.timer.seconds=Math.floor(t.countDown%60),t.timer.hours=t.countDown>3600?Math.floor(t.countDown/3600):0,t.countDownTimer()}),1e3)},onnoFunc:function(){$("#qmodal").modal("hide"),this.$emit("addQuestion",this.formData),this.clear()},clear:function(){this.formData={topics:0,q_number:null}},q2bNumber:function(t){var n=t.toString(),e="",o={0:"০",1:"১",2:"২",3:"৩",4:"৪",5:"৫",6:"৬",7:"৭",8:"৮",9:"৯",".":"."};return i(n).forEach((function(t){return e+=o[t]})),e},tbe:function(t,n,e){return null!==t&&null!==n?"bd"===e?t:n:null!==t&&null===n?t:null===t&&null!==n?n:t},showModal:function(){$("#qmodal").modal("show"),this.isModalVisible=!0},ToText:function(t){return t.replace(/<(style|script|iframe)[^>]*?>[\s\S]+?<\/\1\s*>/gi,"").replace(/<[^>]+?>/g,"").replace(/\s+/g," ").replace(/ /g," ").replace(/>/g," ").replace(/&nbsp;/g,"").replace(/&rsquo;/g,"")},imageOption:function(t){return t.some((function(t){return"img"==t.flag}))},fileType:function(t){return"image"==t||"video"==t||"audio"==t},fileText:function(t,n){return"gb"==n?"image"==t?"This is image question":"video"==t?"This is video question":"This is audio question":"image"==t?"এটি ইমেজ প্রশ্ন":"video"==t?"এটি ভিডিও প্রশ্ন":"এটি অডিও প্রশ্ন"},totalTime:function(){var t,n,e,i=this.examTime>3600?Math.floor(this.examTime/3600):0,o=Math.floor(this.examTime/60),r=Math.floor(this.examTime%60);return"gb"==this.user.lang?(i&&(t=i+this.hourOrHours(i)),o&&(n=o+this.minuteOrMinutes(o)),r&&(e=r+this.secondOrSeconds(r)),(null==t?"":t)+(null==n?"":n)+(null==e?"":e)):(i&&(t=this.q2bNumber(i)+" ঘণ্টা"),o&&(n=this.q2bNumber(o)+" মিনিট"),r&&(e=this.q2bNumber(r)+" সেকেন্ড"),(null==t?"":t)+(null==n?"":n)+(null==e?"":e))},hourOrHours:function(t){return t>1?" hours":" hour"},minuteOrMinutes:function(t){return t>1?" minutes":" minute"},secondOrSeconds:function(t){return t>1?" seconds":" second"},answer:function(t){if(this.results.length>0)if(this.results.some((function(n){return n.id===t.id}))){var n=this.results.findIndex((function(n){return n.id===t.id}));null==t.selected?-1!==n&&this.results.splice(n,1):this.results[n]=t}else this.results.push(t);else this.results.push(t);console.log(this.results,"results")},submitExam:function(){var t=this,n={user_id:this.user.id,examination_id:this.qid.id,results:this.results};axios.post("/api/save-results",n).then((function(n){console.log(n,"response from server"),t.screen.exam=!1,t.screen.examSubmit=!0})),console.log(this.results)},totalMark:function(){console.log(this.exam);var t=JSON.parse(this.exam.results[0].result).filter((function(t){return 1==t.correct})).length,n=JSON.parse(this.exam.results[0].result).filter((function(t){return 0==t.correct})).length,e=this.exam.negative_mark>0?this.exam.each_question_mark*this.exam.negative_mark/100:0,i=t*this.exam.each_question_mark-n*e;return i>0?i:0}},created:function(){this.countDownTimer(),console.log("created")}},s=e(3379),u=e.n(s),l=e(3682),c={insert:"head",singleton:!1},a=(u()(l.Z,c),l.Z.locals,(0,e(1900).Z)(r,(function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("div",[e("div",{staticClass:"row justify-content-center"},[e("div",{staticClass:"border border-2 p-2 rounded-lg text-center"},[e("div",[t._v(t._s("gb"==t.user.lang?"Result":"ফলাফল")+" :  "+t._s("gb"==t.user.lang?"Total Number":"মোট নম্বর")+" - "+t._s("gb"==t.user.lang?0:t.q2bNumber(0)))]),t._v(" "),e("br"),t._v(" "),e("div",[e("a",{staticClass:"btn btn-outline-primary btn-sm",attrs:{href:"/exams"}},[t._v(t._s(t.tbe("ফিরে যান","Go Back",t.user.lang)))])])])])])}),[],!1,null,null,null).exports)},5378:function(t,n,e){e.d(n,{Z:function(){return l}});var i={props:["options","user","question"],data:function(){return{qoption:{selected:null,id:null,option:null,correct:null,question:this.question,correctOption:null,img_link:null,correct_img_link:null}}},methods:{clickSelect:function(t,n){this.qoption.selected==t?(this.qoption.selected=null,this.qoption.id=n.question_id,this.qoption.option=null,this.qoption.img_link=null,this.qoption.correct=null,this.qoption.correctOption=null):(this.qoption.selected=t,this.qoption.id=n.question_id,this.qoption.option=this.tbe(n.bd_option,n.option,this.user.lang),this.qoption.img_link=n.img_link,this.qoption.correct_img_link="img"==n.flag&&0==n.correct?this.options.find((function(t){return 1==t.correct})).img_link:null,this.qoption.correct=n.correct,this.qoption.correctOption=0==n.correct?this.tbe(this.options.find((function(t){return 1==t.correct})).bd_option,this.options.find((function(t){return 1==t.correct})).option,this.user.lang):null),this.$emit("answer",this.qoption)},tbe:function(t,n,e){return t&&n?"bd"===e?t:n:t||(n||void 0)},imageOption:function(t){return t.some((function(t){return"img"==t.flag}))}}},o=e(3379),r=e.n(o),s=e(402),u={insert:"head",singleton:!1},l=(r()(s.Z,u),s.Z.locals,(0,e(1900).Z)(i,(function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("div",{staticClass:"animate__animated animate__zoomIn animate__faster d-flex flex-wrap",class:{"row justify-content-center justify-item-center":t.imageOption(t.options)}},t._l(t.options,(function(n,i){return e("div",{staticClass:"col-md-6 px-1",class:["img"==n.flag?"col-6":" col-12"]},["img"!=n.flag?e("div",{staticClass:"list-group"},[e("span",{staticClass:"list-group-item list-group-item-action cursor my-1",class:["element-animation"+(i+1),{selected:t.qoption.selected==i}],on:{click:function(e){return t.clickSelect(i,n)}}},[t._v("\n            "+t._s(t.tbe(n.bd_option,n.option,t.user.lang))+"\n    ")])]):e("div",{staticClass:"cursor my-1",on:{click:function(e){return t.clickSelect(i,n)}}},[e("img",{staticClass:"imageOption mt-1 rounded img-thumbnail",attrs:{src:"/"+n.img_link,alt:""}}),t._v(" "),t.qoption.selected==i?e("div",{staticClass:"Tick d-flex justify-content-center align-items-center"},[e("img",{attrs:{src:"/img/icons/tick.png",width:"100px",height:"100px"}})]):t._e()])])})),0)}),[],!1,null,"16c6670c",null).exports)},1900:function(t,n,e){function i(t,n,e,i,o,r,s,u){var l,c="function"==typeof t?t.options:t;if(n&&(c.render=n,c.staticRenderFns=e,c._compiled=!0),i&&(c.functional=!0),r&&(c._scopeId="data-v-"+r),s?(l=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),o&&o.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(s)},c._ssrRegister=l):o&&(l=u?function(){o.call(this,(c.functional?this.parent:this).$root.$options.shadowRoot)}:o),l)if(c.functional){c._injectStyles=l;var a=c.render;c.render=function(t,n){return l.call(n),a(t,n)}}else{var m=c.beforeCreate;c.beforeCreate=m?[].concat(m,l):[l]}return{exports:t,options:c}}e.d(n,{Z:function(){return i}})}}]);
"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[184],{2184:function(t,e,n){n.r(e),n.d(e,{default:function(){return i}});var s={props:["user","uid","users","time"],data:function(){return{name:"",days:"",hours:"",minutes:"",seconds:"",schedule:"",timer:null}},methods:{kickingUser:function(t){this.$emit("kickingUser",t)},getAvatar:function(t){return t||"/img/avatar.png"},getAvatarAlt:function(t){return t.substring(0,2)},getFlag:function(t){return"https://flagcdn.com/40x30/"+t+".png"},scheduledTimer:function(){var t=this,e=new Date(this.time).getTime();this.timer=setInterval((function(){var n=(new Date).getTime(),s=e-n;t.days=Math.floor(s/864e5),t.hours=Math.floor(s%864e5/36e5),t.minutes=Math.floor(s%36e5/6e4),t.seconds=Math.floor(s%6e4/1e3),t.schedule=t.days+"d "+t.hours+"h "+t.minutes+"m "+t.seconds+"s ",s<0&&(clearInterval(t.timer),t.schedule='<i class="fas fa-check"></i>')}),1e3)}},created:function(){this.scheduledTimer()}},i=(0,n(1900).Z)(s,(function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"waiting"},[n("div",{staticClass:"card",staticStyle:{width:"24rem"}},[t._m(0),t._v(" "),n("div",{staticClass:"card-body",staticStyle:{"max-height":"90vh",overflow:"auto"}},[n("div",{staticClass:"d-flex justify-content-between"},[n("input",{directives:[{name:"model",rawName:"v-model",value:t.name,expression:"name"}],staticClass:"form-control",attrs:{type:"text",autofocus:""},domProps:{value:t.name},on:{input:function(e){e.target.composing||(t.name=e.target.value)}}})]),t._v(" "),n("div",{staticClass:"d-flex justify-content-center"},[n("a",{staticClass:"btn btn-sm btn-success mt-4 pull-right",class:{disabled:t.name.length<3},on:{click:function(e){return t.$emit("insertUser",t.name)}}},[t._v("SUBMIT")])])])])])}),[function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"card-header text-center"},[n("h4",{staticClass:"ml-1 text-primary"},[t._v("\n                    Please insert your name\n                ")])])}],!1,null,null,null).exports},1900:function(t,e,n){function s(t,e,n,s,i,r,a,o){var c,u="function"==typeof t?t.options:t;if(e&&(u.render=e,u.staticRenderFns=n,u._compiled=!0),s&&(u.functional=!0),r&&(u._scopeId="data-v-"+r),a?(c=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),i&&i.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(a)},u._ssrRegister=c):i&&(c=o?function(){i.call(this,(u.functional?this.parent:this).$root.$options.shadowRoot)}:i),c)if(u.functional){u._injectStyles=c;var l=u.render;u.render=function(t,e){return c.call(e),l(t,e)}}else{var d=u.beforeCreate;u.beforeCreate=d?[].concat(d,c):[c]}return{exports:t,options:u}}n.d(e,{Z:function(){return s}})}}]);
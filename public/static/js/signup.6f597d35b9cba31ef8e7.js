webpackJsonp([25,0],{0:function(t,e,i){"use strict";function a(t){return t&&t.__esModule?t:{default:t}}var n=i(11),s=a(n),o=i(214),r=a(o);new s.default({el:"#app",template:"<App/>",components:{App:r.default}})},1:function(t,e,i){"use strict";function a(t){return t&&t.__esModule?t:{default:t}}Object.defineProperty(e,"__esModule",{value:!0});var n=i(12),s=a(n),o={};e.default=o;var r=s.default.create({baseURL:"http://s2.chilunyc.com:8012/",timeout:1e3,headers:{"content-type":"application/json"}}),l=location.href.indexOf("localhost")>0?0:1;o.site_links=function(){switch(l){case 0:return{index:"index.html",articledetail:"articledetail.html",forum:"forum.html",forumdetail:"forumdetail.html",signin:"signin.html",signup:"signup.html",logout:"",signinfo:"signinfo.html",usertype:"usertype.html",doctorinfo:"doctorinfo.html",baseinfo:"baseinfo.html",pathologyinfo:"pathologyinfo.html",tomour:"tomour.html",liver_function:"liverfunction.html",renal_function:"renalfunction.html",heart:"heart.html",immune:"immune.html",userpage_router:"",userpage:"userpage.html",doctorpage:"doctorpage.html",new_choices:"new-choices.html",new_index:"new-index.html",new_sub_index:"new-sub-index.html",edit_baseinfo:"edit-baseinfo.html",edit_doctorinfo:"edit-doctorinfo.html",edit_pathologyinfo:"edit-pathologyinfo.html",edit_index:"edit-index.html"};case 1:return{index:"/home",articledetail:"/article/detail",forum:"/forum",forumdetail:"/forum/post/detail",signin:"/login",signup:"/register",logout:"/logout",signinfo:"/user/supplementary_information",usertype:"/user/role",doctorinfo:"/user/basic_information/doctor",baseinfo:"/user/basic_information/user",pathologyinfo:"/user/pathologic_information",tomour:"/user/tumor_function_index/first_add",liver_function:"/user/liver_function_index/first_add",renal_function:"/user/renal_function_index/first_add",heart:"/user/heart_function_index/first_add",immune:"/user/immunity_function_index/first_add",userpage_router:"/user/home",new_choices:"/user/index_information/add/function_choose",new_index:"/user/index_information/add/important",new_sub_index:"/user/index_information/add/secondary",edit_userpage:"/user/basic_information/update",edit_pathologyinfo:"/user/pathologic_information/update",edit_index:"/user/index_information/update"}}}(),o.getArticle=function(t){switch(t){case 0:return{has_login:0,articles:[{id:"1",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"2",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"3",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"4",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"5",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"6",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"}],banners:[{title:"",image:"",labels:["ss","tt"],url:""}]};case 1:return{has_login:0,articles:[{id:"1",title:"casdcasdcas22222",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"2",title:"casdcasdcas2222",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"3",title:"casdcasdcas2222",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"4",title:"casdcasdcas22222",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"5",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"6",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"}],banners:[{title:"",image:"",labels:["ss","tt"],url:""}]};case 2:return{has_login:0,articles:[{id:"1",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"2",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"3",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"4",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"5",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"6",title:"casdcasdcas3333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"}],banners:[{title:"",image:"",labels:["ss","tt"],url:""}]}}},o.init_index=function(t){return r.get("home/init?article_category_id="+t+"&page=1&size=6")},o.load_more_index=function(t,e){return r.get("home/article?article_category_id="+e+"&page="+t+"&size=6")},o.init_article=function(t){return r.get("article/detail/init/"+t)},o.load_more_article=function(t,e,i,a,n,s){return r.get("forum/post?sub_section_id="+i+"&order="+e+"&genic_mutation="+a+"&disease_stage="+n+"&treatment="+s+"&page="+t+"&size=6")},o.init_forum=function(){return r.get("forum/init")},o.init_forum_detail=function(t){return r.get("forum/post/detail/init/"+t)},o.article_comment=function(t,e,i,a){return console.log(e+"-"+i),r.post("article/comment",{id:t,comment_id:e,comment_response_id:i,content:a})},o.post_comment=function(t,e,i,a){return r.post("forum/post/comment",{id:t,comment_id:e,comment_response_id:i,content:a})},o.article_cheer=function(t){return r.get("article/cheer/"+t)},o.post_cheer=function(t){return r.get("forum/post/cheer/"+t)},o.login=function(t,e){return r.post("login",{mobile:t,password:e})},o.logout=function(){return r.post("logout")},o.authcode=function(t,e){return r.get("verification_sms/"+t+"/"+e)},o.quicklogin=function(t,e){return r.post("quick_login",{mobile:t,verification_code:e})},o.register=function(t,e,i,a){return r.post("register",{nickname:t,mobile:e,verification_code:i,password:a})},o.supplementary_info=function(t,e){return r.post("user/supplementary_information",{nickname:t,password:e})},o.user_info=function(t){return r.post("user/basic_information",t)},o.get_index=function(t,e){return r.get("index/"+t+"/"+e)},o.get_pathologic=function(){return r.get("pathologic_data")},o.pathologic=function(t){return r.post("user/pathologic_information",t)},o.tumour=function(t){return r.post("user/tumor_function_index/first_add",{data:t})},o.liver_function=function(t){return r.post("user/liver_function_index/first_add",{data:t})},o.renal_function=function(t){return r.post("user/renal_function_index/first_add",{data:t})},o.immune=function(t){return r.post("user/immunity_function_index/first_add",{data:t})},o.heart=function(t){return r.post("user/heart_function_index/first_add",{data:t})},o.update_index=function(t,e,i){return r.post("user/index_information/update",{function:t,index:e,data:i})},o.userinfo=function(){return r.get("user/home/init")}},2:function(t,e){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.default={props:["msg"],data:function(){return{}}}},3:function(t,e){"use strict";function i(t){return t.replace(/^(\s|\u00A0)+/,"").replace(/(\s|\u00A0)+$/,"")}function a(t){return/^1(3|4|5|7|8)\d{9}$/.test(t)}function n(){var t=location.search,e=new Object;if(t.indexOf("?")!=-1)for(var i=t.substr(1),a=i.split("&"),n=0;n<a.length;n++)e[a[n].split("=")[0]]=unescape(a[n].split("=")[1]);return e}t.exports={trim:i,checkphone:a,get_request:n}},4:function(t,e){},5:function(t,e,i){var a,n;i(4),a=i(2);var s=i(6);n=a=a||{},"object"!=typeof a.default&&"function"!=typeof a.default||(n=a=a.default),"function"==typeof n&&(n=n.options),n.render=s.render,n.staticRenderFns=s.staticRenderFns,t.exports=a},6:function(t,e){t.exports={render:function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"wxl-toast"},[i("div",{staticClass:"wxl-toast-text"},[t._v(t._s(t.msg))])])},staticRenderFns:[]}},14:function(t,e){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.default={name:"hello",data:function(){return{msg:"Welcome to Your Vue.js App"}}}},15:function(t,e){},16:function(t,e,i){var a,n;i(15),a=i(14);var s=i(17);n=a=a||{},"object"!=typeof a.default&&"function"!=typeof a.default||(n=a=a.default),"function"==typeof n&&(n=n.options),n.render=s.render,n.staticRenderFns=s.staticRenderFns,n._scopeId="data-v-38f8f3cc",t.exports=a},17:function(t,e){t.exports={render:function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"hello"},[i("h1",[t._v(t._s(t.msg))]),t._v(" "),i("h2",[t._v("Essential Links")]),t._v(" "),t._m(0),t._v(" "),i("h2",[t._v("Ecosystem")]),t._v(" "),t._m(1)])},staticRenderFns:[function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("ul",[i("li",[i("a",{attrs:{href:"https://vuejs.org",target:"_blank"}},[t._v("Core Docs")])]),t._v(" "),i("li",[i("a",{attrs:{href:"https://forum.vuejs.org",target:"_blank"}},[t._v("Forum")])]),t._v(" "),i("li",[i("a",{attrs:{href:"https://gitter.im/vuejs/vue",target:"_blank"}},[t._v("Gitter Chat")])]),t._v(" "),i("li",[i("a",{attrs:{href:"https://twitter.com/vuejs",target:"_blank"}},[t._v("Twitter")])]),t._v(" "),i("br"),t._v(" "),i("li",[i("a",{attrs:{href:"http://vuejs-templates.github.io/webpack/",target:"_blank"}},[t._v("Docs for This Template")])])])},function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("ul",[i("li",[i("a",{attrs:{href:"http://router.vuejs.org/",target:"_blank"}},[t._v("vue-router")])]),t._v(" "),i("li",[i("a",{attrs:{href:"http://vuex.vuejs.org/",target:"_blank"}},[t._v("vuex")])]),t._v(" "),i("li",[i("a",{attrs:{href:"http://vue-loader.vuejs.org/",target:"_blank"}},[t._v("vue-loader")])]),t._v(" "),i("li",[i("a",{attrs:{href:"https://github.com/vuejs/awesome-vue",target:"_blank"}},[t._v("awesome-vue")])])])}]}},114:function(t,e,i){"use strict";function a(t){return t&&t.__esModule?t:{default:t}}Object.defineProperty(e,"__esModule",{value:!0});var n=i(16),s=a(n),o=i(5),r=a(o),l=i(1),u=a(l),c=i(3),d=a(c);e.default={name:"app",data:function(){return{toastshow:!1,toast_text:"",nickname:"",phone:"",authcode:"",password:"",timer:60,code_sent:!1,signin_link:u.default.site_links.signin}},methods:{signupHandler:function(){var t=this,e=d.default.trim(t.nickname),i=d.default.trim(t.phone),a=d.default.trim(t.authcode),n=d.default.trim(t.password);return""==e||void 0==e?(t.toastText="昵称不能为空！",void t.showToast()):""==i||void 0==i?(t.toastText="手机号不能为空！",void t.showToast()):""==a||void 0==a?(t.toastText="验证码不能为空！",void t.showToast()):""==n||void 0==n?(t.toastText="密码不能为空！",void t.showToast()):void u.default.register(e,i,a,n).then(function(e){console.log(e),0==e.data.code?location.href=u.default.site_links.usertype:(t.toast_text=e.data.message,t.showToast())}).catch(function(t){console.log(t)})},showToast:function(){var t=this;t.toastshow||(t.toastshow=!0,setTimeout(function(){t.toastshow=!1},3e3))},sendcodeHandler:function(){var t=this,e=t.phone;return""!=e&&void 0!=e&&d.default.checkphone(e)?void u.default.authcode("register",e).then(function(e){console.log(e),0==e.data.code?(t.code_sent=!0,t.$nextTick(function(){t.initTimer()}),t.toast_text="验证码已经发送，请查看手机短信！",t.showToast()):(t.toast_text=e.data.message,t.showToast())}).catch(function(t){console.log(t)}):(t.toastText="请输入正确的手机号码！",void t.showToast())},initTimer:function(){var t=this;t.timerInterval=setInterval(function(){t.timer>0?t.timer=t.timer-1:t.stopTimer()},1e3)},stopTimer:function(){var t=this;clearInterval(t.timerInterval),t.timer=60}},components:{Hello:s.default,Toast:r.default}}},160:function(t,e){},214:function(t,e,i){var a,n;i(160),a=i(114);var s=i(228);n=a=a||{},"object"!=typeof a.default&&"function"!=typeof a.default||(n=a=a.default),"function"==typeof n&&(n=n.options),n.render=s.render,n.staticRenderFns=s.staticRenderFns,t.exports=a},228:function(t,e){t.exports={render:function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{attrs:{id:"app"}},[t._m(0),t._v(" "),i("div",{staticClass:"signup-form"},[i("input",{directives:[{name:"model",rawName:"v-model",value:t.nickname,expression:"nickname"}],staticClass:"input-sign",attrs:{type:"",name:"",placeholder:"请输入昵称"},domProps:{value:t._s(t.nickname)},on:{input:function(e){e.target.composing||(t.nickname=e.target.value)}}}),t._v(" "),i("input",{directives:[{name:"model",rawName:"v-model",value:t.phone,expression:"phone"}],staticClass:"input-sign",attrs:{type:"",name:"",placeholder:"请输入手机号"},domProps:{value:t._s(t.phone)},on:{input:function(e){e.target.composing||(t.phone=e.target.value)}}}),t._v(" "),i("div",{staticClass:"authcode-input"},[i("input",{directives:[{name:"model",rawName:"v-model",value:t.authcode,expression:"authcode"}],staticClass:"input-sign",attrs:{type:"",name:"",placeholder:"请输入验证码"},domProps:{value:t._s(t.authcode)},on:{input:function(e){e.target.composing||(t.authcode=e.target.value)}}}),t._v(" "),t.code_sent?i("div",{staticClass:"authcode-trigger"},[t._v("重新获取"+t._s(t.timer))]):i("div",{staticClass:"authcode-trigger",on:{click:t.sendcodeHandler}},[t._v("获取验证码")])]),t._v(" "),i("input",{directives:[{name:"model",rawName:"v-model",value:t.password,expression:"password"}],staticClass:"input-sign",attrs:{type:"password",name:"",placeholder:"请输入密码"},domProps:{value:t._s(t.password)},on:{input:function(e){e.target.composing||(t.password=e.target.value)}}}),t._v(" "),i("button",{staticClass:"button-default button-signup",on:{click:t.signupHandler}},[t._v("注册")]),t._v(" "),i("a",{staticClass:"login-entry",attrs:{href:t.signin_link}},[t._v("或“登录”")])]),t._v(" "),i("transition",{attrs:{name:"fade"}},[t.toastshow?i("Toast",{attrs:{msg:t.toast_text}}):t._e()],1)],1)},staticRenderFns:[function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"sign-bg"},[i("div",{staticClass:"signup-tabs"},[i("div",{staticClass:"signup-container"},[i("div",{staticClass:"signup-tab"},[i("span",[t._v("账号密码登录")]),t._v(" "),i("i",{staticClass:"icon-tri"})])])])])}]}}});
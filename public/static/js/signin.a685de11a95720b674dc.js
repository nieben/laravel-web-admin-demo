webpackJsonp([25,0],{0:function(t,e,i){"use strict";function a(t){return t&&t.__esModule?t:{default:t}}var n=i(11),s=a(n),o=i(206),r=a(o);new s.default({el:"#app",template:"<App/>",components:{App:r.default}})},1:function(t,e,i){"use strict";function a(t){return t&&t.__esModule?t:{default:t}}Object.defineProperty(e,"__esModule",{value:!0});var n=i(12),s=a(n),o={};e.default=o;var r=s.default.create({baseURL:"http://s2.chilunyc.com:8012/",timeout:1e3,headers:{"content-type":"application/json"}}),l=location.href.indexOf("localhost")>0?0:1;o.site_links=function(){switch(l){case 0:return{index:"index.html",articledetail:"articledetail.html",forum:"forum.html",forumdetail:"forumdetail.html",signin:"signin.html",signup:"signup.html",logout:"",signinfo:"signinfo.html",usertype:"usertype.html",doctorinfo:"doctorinfo.html",baseinfo:"baseinfo.html",pathologyinfo:"pathologyinfo.html",tomour:"tomour.html",liver_function:"liverfunction.html",renal_function:"renalfunction.html",heart:"heart.html",immune:"immune.html",edit_choices:"edit-choices.html",edit_sub_index:"edit-sub-index.html"};case 1:return{index:"/home",articledetail:"/article/detail",forum:"/forum",forumdetail:"/forum/post/detail",signin:"/login",signup:"/register",logout:"/logout",signinfo:"/user/supplementary_information",usertype:"/user/role",doctorinfo:"/user/basic_information/doctor",baseinfo:"/user/basic_information/user",pathologyinfo:"/user/pathologic_information",tomour:"/user/tumor_function_index/first_add",liver_function:"/user/liver_function_index/first_add",renal_function:"/user/renal_function_index/first_add",heart:"/user/heart_function_index/first_add",immune:"/user/immunity_function_index/first_add"}}}(),o.getArticle=function(t){switch(t){case 0:return{has_login:0,articles:[{id:"1",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"2",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"3",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"4",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"5",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"6",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"}],banners:[{title:"",image:"",labels:["ss","tt"],url:""}]};case 1:return{has_login:0,articles:[{id:"1",title:"casdcasdcas22222",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"2",title:"casdcasdcas2222",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"3",title:"casdcasdcas2222",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"4",title:"casdcasdcas22222",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"5",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"6",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"}],banners:[{title:"",image:"",labels:["ss","tt"],url:""}]};case 2:return{has_login:0,articles:[{id:"1",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"2",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"3",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"4",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"5",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"6",title:"casdcasdcas3333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"}],banners:[{title:"",image:"",labels:["ss","tt"],url:""}]}}},o.init_index=function(t){return r.get("home/init?article_category_id="+t+"&page=1&size=6")},o.load_more_index=function(t,e){return r.get("home/article?article_category_id="+e+"&page="+t+"&size=6")},o.init_article=function(t){return r.get("article/detail/init/"+t)},o.load_more_article=function(t,e,i,a,n,s){return r.get("forum/post?sub_section_id="+i+"&order="+e+"&genic_mutation="+a+"&disease_stage="+n+"&treatment="+s+"&page="+t+"&size=6")},o.init_forum=function(){return r.get("forum/init")},o.article_comment=function(t,e,i,a){return console.log(e+"-"+i),r.post("article/comment",{id:t,comment_id:e,comment_response_id:i,content:a})},o.post_comment=function(t,e,i,a){return r.post("forum/post/comment",{id:t,comment_id:e,comment_response_id:i,content:a})},o.article_cheer=function(t){return r.get("article/cheer/"+t)},o.post_cheer=function(t){return r.get("forum/post/cheer/"+t)},o.login=function(t,e){return r.post("login",{mobile:t,password:e})},o.logout=function(){return r.post("logout")},o.authcode=function(t,e){return r.get("verification_sms/"+t+"/"+e)},o.quicklogin=function(t,e){return r.post("quick_login",{mobile:t,verification_code:e})},o.register=function(t,e,i,a){return r.post("register",{nickname:t,mobile:e,verification_code:i,password:a})},o.supplementary_info=function(t,e){return r.post("user/supplementary_information",{nickname:t,password:e})},o.user_info=function(t){return r.post("user/basic_information",t)},o.get_index=function(t,e){return r.get("index/"+t+"/"+e)},o.get_pathologic=function(){return r.get("pathologic_data")},o.pathologic=function(t){return r.post("user/pathologic_information",t)},o.tumour=function(t){return r.post("user/tumor_function_index/first_add",{data:t})},o.liver_function=function(t){return r.post("user/liver_function_index/first_add",{data:t})},o.renal_function=function(t){return r.post("user/renal_function_index/first_add",{data:t})},o.immune=function(t){return r.post("user/immunity_function_index/first_add",{data:t})},o.heart=function(t){return r.post("user/heart_function_index/first_add",{data:t})}},2:function(t,e){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.default={props:["msg"],data:function(){return{}}}},3:function(t,e){"use strict";function i(t){return t.replace(/^(\s|\u00A0)+/,"").replace(/(\s|\u00A0)+$/,"")}function a(t){return/^1(3|4|5|7|8)\d{9}$/.test(t)}function n(){var t=location.search,e=new Object;if(t.indexOf("?")!=-1)for(var i=t.substr(1),a=i.split("&"),n=0;n<a.length;n++)e[a[n].split("=")[0]]=unescape(a[n].split("=")[1]);return e}t.exports={trim:i,checkphone:a,get_request:n}},4:function(t,e){},5:function(t,e,i){var a,n;i(4),a=i(2);var s=i(6);n=a=a||{},"object"!=typeof a.default&&"function"!=typeof a.default||(n=a=a.default),"function"==typeof n&&(n=n.options),n.render=s.render,n.staticRenderFns=s.staticRenderFns,t.exports=a},6:function(t,e){t.exports={render:function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"wxl-toast"},[i("div",{staticClass:"wxl-toast-text"},[t._v(t._s(t.msg))])])},staticRenderFns:[]}},110:function(t,e,i){"use strict";function a(t){return t&&t.__esModule?t:{default:t}}Object.defineProperty(e,"__esModule",{value:!0});var n=i(5),s=a(n),o=i(1),r=a(o),l=i(3),c=a(l);e.default={name:"app",data:function(){return{toastshow:!1,toast_text:"",phone:"",authcode:"",timer:60,code_sent:!1,password:"",tab_index:0,signup_link:r.default.site_links.signup,tab_array:[{name:"账号密码登录"},{name:"快捷登陆"}]}},methods:{tabToggle:function(t){this.tab_index=t},signinHandler:function(){var t=this,e=c.default.trim(t.phone),i=(c.default.trim(t.authcode),c.default.trim(t.password));return""==e||void 0==e?(t.toast_text="手机号不能为空！",void t.showToast()):c.default.checkphone(e)?""==i||void 0==i?(t.toast_text="密码不能为空！",void t.showToast()):void r.default.login(e,i).then(function(e){console.log(e),0==e.data.code?location.href=r.default.site_links.index:(t.toast_text=e.data.message,t.showToast())}).catch(function(t){console.log(t)}):(t.toast_text="请填写正确的手机号！",void t.showToast())},quickSigninHandler:function(){var t=this,e=c.default.trim(t.phone),i=c.default.trim(t.authcode);return""==e||void 0==e?(t.toast_text="手机号不能为空！",void t.showToast()):c.default.checkphone(e)?""==i||void 0==i?(t.toast_text="验证码不能为空！",void t.showToast()):void r.default.quicklogin(e,i).then(function(e){console.log(e),0==e.data.code?location.href=r.default.site_links.signinfo:(t.toast_text=e.data.message,t.showToast())}).catch(function(t){console.log(t)}):(t.toast_text="请填写正确的手机号！",void t.showToast())},showToast:function(){var t=this;t.toastshow||(t.toastshow=!0,setTimeout(function(){t.toastshow=!1},3e3))},getData:function(){var t=this,e={};return 0==t.tab_index?(e.mobile=t.phone,e.password=t.password,e):void(1==t.tab_index)},initTimer:function(){var t=this;t.timerInterval=setInterval(function(){t.timer>0?t.timer=t.timer-1:t.stopTimer()},1e3)},stopTimer:function(){var t=this;clearInterval(t.timerInterval),t.timer=60},sendcodeHandler:function(){var t=this,e=c.default.trim(t.phone);return""==e||void 0==e?(t.toast_text="手机号不能为空！",void t.showToast()):c.default.checkphone(e)?void r.default.authcode("login",e).then(function(e){console.log(e),0==e.data.code?(t.code_sent=!0,t.$nextTick(function(){t.initTimer()})):(t.toast_text=e.data.message,t.showToast())}).catch(function(t){console.log(t)}):(t.toast_text="请填写正确的手机号！",void t.showToast())}},components:{Toast:s.default}}},156:function(t,e){},206:function(t,e,i){var a,n;i(156),a=i(110);var s=i(220);n=a=a||{},"object"!=typeof a.default&&"function"!=typeof a.default||(n=a=a.default),"function"==typeof n&&(n=n.options),n.render=s.render,n.staticRenderFns=s.staticRenderFns,t.exports=a},220:function(t,e){t.exports={render:function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{attrs:{id:"app"}},[i("div",{staticClass:"sign-bg"},[i("div",{staticClass:"login-tabs"},[i("div",{staticClass:"login-tabs-container"},[t._l(t.tab_array,function(e,a){return[i("div",{staticClass:"login-tab",class:[a==t.tab_index?"login-tab-cur":""],on:{click:function(e){t.tabToggle(a)}}},[i("span",[t._v(t._s(e.name))]),t._v(" "),i("i",{staticClass:"icon-tri"})])]})],2)])]),t._v(" "),i("div",{staticClass:"login-form",class:[1==t.tab_index?"hidden":""]},[i("input",{directives:[{name:"model",rawName:"v-model",value:t.phone,expression:"phone"}],staticClass:"input-sign",attrs:{type:"",name:"",placeholder:"请输入手机号"},domProps:{value:t._s(t.phone)},on:{input:function(e){e.target.composing||(t.phone=e.target.value)}}}),t._v(" "),i("input",{directives:[{name:"model",rawName:"v-model",value:t.password,expression:"password"}],staticClass:"input-sign",attrs:{type:"password",name:"",placeholder:"请输入密码"},domProps:{value:t._s(t.password)},on:{input:function(e){e.target.composing||(t.password=e.target.value)}}}),t._v(" "),i("button",{staticClass:"button-default button-login",on:{click:t.signinHandler}},[t._v("登录")]),t._v(" "),i("a",{staticClass:"login-entry",attrs:{href:t.signup_link}},[t._v("或“注册”")])]),t._v(" "),i("div",{staticClass:"login-form",class:[0==t.tab_index?"hidden":""]},[i("input",{directives:[{name:"model",rawName:"v-model",value:t.phone,expression:"phone"}],staticClass:"input-sign",attrs:{type:"",name:"",placeholder:"请输入手机号"},domProps:{value:t._s(t.phone)},on:{input:function(e){e.target.composing||(t.phone=e.target.value)}}}),t._v(" "),i("div",{staticClass:"authcode-input"},[i("input",{directives:[{name:"model",rawName:"v-model",value:t.authcode,expression:"authcode"}],staticClass:"input-sign",attrs:{type:"",name:"",placeholder:"请输入验证码"},domProps:{value:t._s(t.authcode)},on:{input:function(e){e.target.composing||(t.authcode=e.target.value)}}}),t._v(" "),t.code_sent?i("div",{staticClass:"authcode-trigger"},[t._v("重新获取"+t._s(t.timer))]):i("div",{staticClass:"authcode-trigger",on:{click:t.sendcodeHandler}},[t._v("获取验证码")])]),t._v(" "),i("button",{staticClass:"button-default button-login",on:{click:t.quickSigninHandler}},[t._v("登录")]),t._v(" "),i("a",{staticClass:"login-entry",attrs:{href:t.signup_link}},[t._v("或“注册”")])]),t._v(" "),i("transition",{attrs:{name:"fade"}},[t.toastshow?i("Toast",{attrs:{msg:t.toast_text}}):t._e()],1)],1)},staticRenderFns:[]}}});
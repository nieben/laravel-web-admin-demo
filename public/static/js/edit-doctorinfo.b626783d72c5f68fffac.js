webpackJsonp([20,0],{0:function(e,t,a){"use strict";function i(e){return e&&e.__esModule?e:{default:e}}var n=a(11),o=i(n),s=a(197),r=i(s);new o.default({el:"#app",template:"<App/>",components:{App:r.default}})},1:function(e,t,a){"use strict";function i(e){return e&&e.__esModule?e:{default:e}}Object.defineProperty(t,"__esModule",{value:!0});var n=a(12),o=i(n),s={};t.default=s;var r=o.default.create({baseURL:"http://s2.chilunyc.com:8012/",timeout:1e3,headers:{"content-type":"application/json"}}),c=location.href.indexOf("localhost")>0?0:1;s.site_links=function(){switch(c){case 0:return{index:"index.html",articledetail:"articledetail.html",forum:"forum.html",forumdetail:"forumdetail.html",signin:"signin.html",signup:"signup.html",logout:"",signinfo:"signinfo.html",usertype:"usertype.html",doctorinfo:"doctorinfo.html",baseinfo:"baseinfo.html",pathologyinfo:"pathologyinfo.html",tomour:"tomour.html",liver_function:"liverfunction.html",renal_function:"renalfunction.html",heart:"heart.html",immune:"immune.html",userpage_router:"",userpage:"userpage.html",doctorpage:"doctorpage.html",new_choices:"new-choices.html",new_index:"new-index.html",new_sub_index:"new-sub-index.html",edit_baseinfo:"edit-baseinfo.html",edit_doctorinfo:"edit-doctorinfo.html",edit_pathologyinfo:"edit-pathologyinfo.html",edit_index:"edit-index.html"};case 1:return{index:"/home",articledetail:"/article/detail",forum:"/forum",forumdetail:"/forum/post/detail",signin:"/login",signup:"/register",logout:"/logout",signinfo:"/user/supplementary_information",usertype:"/user/role",doctorinfo:"/user/basic_information/doctor",baseinfo:"/user/basic_information/user",pathologyinfo:"/user/pathologic_information",tomour:"/user/tumor_function_index/first_add",liver_function:"/user/liver_function_index/first_add",renal_function:"/user/renal_function_index/first_add",heart:"/user/heart_function_index/first_add",immune:"/user/immunity_function_index/first_add",userpage_router:"/user/home",new_choices:"/user/index_information/add/function_choose",new_index:"/user/index_information/add/important",new_sub_index:"/user/index_information/add/secondary",edit_userpage:"/user/basic_information/update",edit_pathologyinfo:"/user/pathologic_information/update",edit_index:"/user/index_information/update"}}}(),s.getArticle=function(e){switch(e){case 0:return{has_login:0,articles:[{id:"1",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"2",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"3",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"4",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"5",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"6",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"}],banners:[{title:"",image:"",labels:["ss","tt"],url:""}]};case 1:return{has_login:0,articles:[{id:"1",title:"casdcasdcas22222",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"2",title:"casdcasdcas2222",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"3",title:"casdcasdcas2222",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"4",title:"casdcasdcas22222",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"5",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"6",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"}],banners:[{title:"",image:"",labels:["ss","tt"],url:""}]};case 2:return{has_login:0,articles:[{id:"1",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"2",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"3",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"4",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"5",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"6",title:"casdcasdcas3333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"}],banners:[{title:"",image:"",labels:["ss","tt"],url:""}]}}},s.init_index=function(e){return r.get("home/init?article_category_id="+e+"&page=1&size=6")},s.load_more_index=function(e,t){return r.get("home/article?article_category_id="+t+"&page="+e+"&size=6")},s.init_article=function(e){return r.get("article/detail/init/"+e)},s.load_more_article=function(e,t,a,i,n,o){return r.get("forum/post?sub_section_id="+a+"&order="+t+"&genic_mutation="+i+"&disease_stage="+n+"&treatment="+o+"&page="+e+"&size=6")},s.init_forum=function(){return r.get("forum/init")},s.article_comment=function(e,t,a,i){return console.log(t+"-"+a),r.post("article/comment",{id:e,comment_id:t,comment_response_id:a,content:i})},s.post_comment=function(e,t,a,i){return r.post("forum/post/comment",{id:e,comment_id:t,comment_response_id:a,content:i})},s.article_cheer=function(e){return r.get("article/cheer/"+e)},s.post_cheer=function(e){return r.get("forum/post/cheer/"+e)},s.login=function(e,t){return r.post("login",{mobile:e,password:t})},s.logout=function(){return r.post("logout")},s.authcode=function(e,t){return r.get("verification_sms/"+e+"/"+t)},s.quicklogin=function(e,t){return r.post("quick_login",{mobile:e,verification_code:t})},s.register=function(e,t,a,i){return r.post("register",{nickname:e,mobile:t,verification_code:a,password:i})},s.supplementary_info=function(e,t){return r.post("user/supplementary_information",{nickname:e,password:t})},s.user_info=function(e){return r.post("user/basic_information",e)},s.get_index=function(e,t){return r.get("index/"+e+"/"+t)},s.get_pathologic=function(){return r.get("pathologic_data")},s.pathologic=function(e){return r.post("user/pathologic_information",e)},s.tumour=function(e){return r.post("user/tumor_function_index/first_add",{data:e})},s.liver_function=function(e){return r.post("user/liver_function_index/first_add",{data:e})},s.renal_function=function(e){return r.post("user/renal_function_index/first_add",{data:e})},s.immune=function(e){return r.post("user/immunity_function_index/first_add",{data:e})},s.heart=function(e){return r.post("user/heart_function_index/first_add",{data:e})},s.update_index=function(e,t,a){return r.post("user/index_information/update",{function:e,index:t,data:a})},s.userinfo=function(){return r.get("user/home/init")}},2:function(e,t){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default={props:["msg"],data:function(){return{}}}},3:function(e,t){"use strict";function a(e){return e.replace(/^(\s|\u00A0)+/,"").replace(/(\s|\u00A0)+$/,"")}function i(e){return/^1(3|4|5|7|8)\d{9}$/.test(e)}function n(){var e=location.search,t=new Object;if(e.indexOf("?")!=-1)for(var a=e.substr(1),i=a.split("&"),n=0;n<i.length;n++)t[i[n].split("=")[0]]=unescape(i[n].split("=")[1]);return t}e.exports={trim:a,checkphone:i,get_request:n}},4:function(e,t){},5:function(e,t,a){var i,n;a(4),i=a(2);var o=a(6);n=i=i||{},"object"!=typeof i.default&&"function"!=typeof i.default||(n=i=i.default),"function"==typeof n&&(n=n.options),n.render=o.render,n.staticRenderFns=o.staticRenderFns,e.exports=i},6:function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"wxl-toast"},[a("div",{staticClass:"wxl-toast-text"},[e._v(e._s(e.msg))])])},staticRenderFns:[]}},7:function(e,t){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default={props:["title"],methods:{headerBackHandler:function(){}}}},8:function(e,t){},9:function(e,t,a){var i,n;a(8),i=a(7);var o=a(10);n=i=i||{},"object"!=typeof i.default&&"function"!=typeof i.default||(n=i=i.default),"function"==typeof n&&(n=n.options),n.render=o.render,n.staticRenderFns=o.staticRenderFns,e.exports=i},10:function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"header"},[a("a",{staticClass:"header-arrow-left",attrs:{href:"javascript:history.back()"},on:{click:e.headerBackHandler}}),e._v(" "),a("div",{staticClass:"header-title"},[e._v(e._s(e.title))])])},staticRenderFns:[]}},97:function(e,t,a){"use strict";function i(e){return e&&e.__esModule?e:{default:e}}Object.defineProperty(t,"__esModule",{value:!0});var n=a(9),o=i(n),s=a(5),r=i(s),c=a(1),l=i(c),d=a(3),u=i(d);t.default={name:"app",data:function(){return{toastshow:!1,toast_text:"",header_title:"医生信息",nextlink:"http://www.baidu.com",doctor_name:"",hospital:"",section:"",gender_array:[{name:"男",selected:!1},{name:"女",selected:!1}]}},methods:{genderHandler:function(e){for(var t=this,a=0;a<t.gender_array.length;a++)t.gender_array[a].selected=!1;t.gender_array[e].selected=!0},showToast:function(){var e=this;e.toastshow||(e.toastshow=!0,setTimeout(function(){e.toastshow=!1},1500))},initInfo:function(){var e=this;l.default.userinfo().then(function(t){console.log(t),0==t.data.code?e.dealData(t.data.data.user):(e.toast_text=t.data.message,e.showToast())}).catch(function(e){console.log(e)})},dealData:function(e){var t=this;t.doctor_name=t.real_name,"F"==e.sex?t.gender_array[1].selected=!0:t.gender_array[0].selected=!0,t.hospital=e.hospital,t.section=e.department},nextHandler:function(){var e=this,t=e.getFormData();return""==t.real_name||void 0==t.real_name?(e.toast_text="请填写您的姓名！",void e.showToast()):""==t.sex||void 0==t.sex?(e.toast_text="请选择您的性别！",void e.showToast()):""==t.hospital||void 0==t.hospital?(e.toast_text="请填写所在医院！",void e.showToast()):""==t.department||void 0==t.department?(e.toast_text="请填写所在科室！",void e.showToast()):void l.default.user_info(t).then(function(t){0==t.data.code?(e.toast_text=t.data.message,e.showToast(),location.href=l.default.site_links.userpage_router):(e.toast_text=t.data.message,e.showToast())}).catch(function(e){console.log(e)})},getFormData:function(){for(var e=this,t={},a=0;a<e.gender_array.length;a++)e.gender_array[a].selected&&(t.sex=1==a?"F":"M");return t.birthday="",t.diagnosis_time="",t.real_name=u.default.trim(e.doctor_name),t.hospital=u.default.trim(e.hospital),t.department=u.default.trim(e.section),t}},components:{Fheader:o.default,Toast:r.default}}},170:function(e,t){},197:function(e,t,a){var i,n;a(170),i=a(97);var o=a(238);n=i=i||{},"object"!=typeof i.default&&"function"!=typeof i.default||(n=i=i.default),"function"==typeof n&&(n=n.options),n.render=o.render,n.staticRenderFns=o.staticRenderFns,e.exports=i},238:function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{attrs:{id:"app"}},[a("Fheader",{attrs:{title:e.header_title}}),e._v(" "),a("div",{staticClass:"doctor-form"},[a("div",{staticClass:"piece"},[e._v("姓名")]),e._v(" "),a("div",{staticClass:"info-card"},[a("input",{directives:[{name:"model",rawName:"v-model",value:e.doctor_name,expression:"doctor_name"}],staticClass:"input-info",attrs:{type:"",name:"",placeholder:"请输入姓名"},domProps:{value:e._s(e.doctor_name)},on:{input:function(t){t.target.composing||(e.doctor_name=t.target.value)}}})]),e._v(" "),a("div",{staticClass:"piece"},[e._v("性别")]),e._v(" "),a("div",{staticClass:"info-card"},[e._l(e.gender_array,function(t,i){return[a("div",{staticClass:"custom-radio",class:[t.selected?"custom-radio-filled":""],on:{click:function(t){e.genderHandler(i)}}},[e._v(e._s(t.name))])]})],2),e._v(" "),a("div",{staticClass:"piece"},[e._v("所在医院")]),e._v(" "),a("div",{staticClass:"info-card"},[a("input",{directives:[{name:"model",rawName:"v-model",value:e.hospital,expression:"hospital"}],staticClass:"input-info",attrs:{type:"",name:"",placeholder:"请输入所在医院"},domProps:{value:e._s(e.hospital)},on:{input:function(t){t.target.composing||(e.hospital=t.target.value)}}})]),e._v(" "),a("div",{staticClass:"piece"},[e._v("所在科室")]),e._v(" "),a("div",{staticClass:"info-card"},[a("input",{directives:[{name:"model",rawName:"v-model",value:e.section,expression:"section"}],staticClass:"input-info",attrs:{type:"",name:"",placeholder:"请输入所在科室"},domProps:{value:e._s(e.section)},on:{input:function(t){t.target.composing||(e.section=t.target.value)}}})])]),e._v(" "),a("div",{staticClass:"ft-bar-next",on:{click:e.nextHandler}},[e._v("保存")]),e._v(" "),a("transition",{attrs:{name:"fade"}},[e.toastshow?a("Toast",{attrs:{msg:e.toast_text}}):e._e()],1)],1)},staticRenderFns:[]}}});
webpackJsonp([6,0],{0:function(e,t,i){"use strict";function a(e){return e&&e.__esModule?e:{default:e}}var n=i(11),s=a(n),r=i(175),o=a(r);new s.default({el:"#app",template:"<App/>",components:{App:o.default}})},1:function(e,t,i){"use strict";function a(e){return e&&e.__esModule?e:{default:e}}Object.defineProperty(t,"__esModule",{value:!0});var n=i(12),s=a(n),r={};t.default=r;var o=s.default.create({baseURL:"http://s2.chilunyc.com:8012/",timeout:1e3,headers:{"content-type":"application/json"}}),l=location.href.indexOf("localhost")>0?0:1;r.site_links=function(){switch(l){case 0:return{index:"index.html",articledetail:"articledetail.html",forum:"forum.html",forumdetail:"forumdetail.html",signin:"signin.html",signup:"signup.html",signinfo:"signinfo.html",usertype:"usertype.html",doctorinfo:"doctorinfo.html",baseinfo:"baseinfo.html",pathologyinfo:"pathologyinfo.html",tomour:"tomour.html",liver_function:"liverfunction.html",renal_function:"renalfunction.html",heart:"heart.html",immune:"immune.html"};case 1:return{index:"/home",articledetail:"/article/detail",forum:"/forum",forumdetail:"/forum/post/detail",signin:"/login",signup:"/register",signinfo:"/user/supplementary_information",usertype:"/user/role",doctorinfo:"/user/basic_information/doctor",baseinfo:"/user/basic_information/user",pathologyinfo:"/user/pathological_information",tomour:"/user/tumor_function_index/first_add",liver_function:"/user/liver_function_index/first_add",renal_function:"/user/renal_function_index/first_add",heart:"/user/heart_function_index/first_add",immune:"/user/immunity_function_index/first_add"}}}(),r.getArticle=function(e){switch(e){case 0:return{has_login:0,articles:[{id:"1",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"2",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"3",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"4",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"5",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"6",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"}],banners:[{title:"",image:"",labels:["ss","tt"],url:""}]};case 1:return{has_login:0,articles:[{id:"1",title:"casdcasdcas22222",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"2",title:"casdcasdcas2222",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"3",title:"casdcasdcas2222",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"4",title:"casdcasdcas22222",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"5",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"6",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"}],banners:[{title:"",image:"",labels:["ss","tt"],url:""}]};case 2:return{has_login:0,articles:[{id:"1",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"2",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"3",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"4",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"5",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"6",title:"casdcasdcas3333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"}],banners:[{title:"",image:"",labels:["ss","tt"],url:""}]}}},r.init_index=function(){return o.get("home/init?article_category_id=1&page=1&size=6")},r.init_article=function(e){return o.get("article/detail/init/"+e)},r.init_forum=function(){return o.get("forum/init")},r.article_comment=function(e,t,i,a){return o.post("",{id:e,comment_id:t,comment_response_id:i,comment:a})},r.thumb_up=function(e){return o.get("forum/post/cheer/"+e)},r.login=function(e,t){return o.post("login",{mobile:e,password:t})},r.authcode=function(e,t){return o.get("verification_sms/"+e+"/"+t)},r.quicklogin=function(e,t){return o.post("quick_login",{mobile:e,verification_code:t})},r.register=function(e,t,i,a){return o.post("register",{nickname:e,mobile:t,verification_code:i,password:a})},r.supplementary_info=function(e,t){return o.post({nickname:e,password:t})},r.user_info=function(e){return o.post("user/basic_information",e)},r.get_index=function(e){return o.get("index/"+e)},r.get_pathologic=function(){return o.get("pathologic_data")},r.pathologic=function(e){return o.post("user/pathologic_information",e)},r.tumour=function(e){return o.post("user/tumor_function_index/first_add",{data:e})},r.liver_function=function(e){return o.post("user/liver_function_index/first_add",{data:e})},r.renal_function=function(e){return o.post("user/renal_function_index/first_add",{data:e})},r.immune=function(e){return o.post("user/immunity_function_index/first_add",{data:e})},r.heart=function(e){return o.post("user/heart_function_index/first_add",{data:e})}},2:function(e,t){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default={props:["msg"],data:function(){return{}}}},3:function(e,t){"use strict";function i(e){return e.replace(/^(\s|\u00A0)+/,"").replace(/(\s|\u00A0)+$/,"")}function a(e){return/^1(3|4|5|7|8)\d{9}$/.test(e)}function n(){var e=location.search,t=new Object;if(e.indexOf("?")!=-1)for(var i=e.substr(1),a=i.split("&"),n=0;n<a.length;n++)t[a[n].split("=")[0]]=unescape(a[n].split("=")[1]);return t}e.exports={trim:i,checkphone:a,get_request:n}},4:function(e,t){},5:function(e,t,i){var a,n;i(4),a=i(2);var s=i(6);n=a=a||{},"object"!=typeof a.default&&"function"!=typeof a.default||(n=a=a.default),"function"==typeof n&&(n=n.options),n.render=s.render,n.staticRenderFns=s.staticRenderFns,e.exports=a},6:function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,i=e._self._c||t;return i("div",{staticClass:"wxl-toast"},[i("div",{staticClass:"wxl-toast-text"},[e._v(e._s(e.msg))])])},staticRenderFns:[]}},7:function(e,t){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default={props:["title"]}},8:function(e,t){},9:function(e,t,i){var a,n;i(8),a=i(7);var s=i(10);n=a=a||{},"object"!=typeof a.default&&"function"!=typeof a.default||(n=a=a.default),"function"==typeof n&&(n=n.options),n.render=s.render,n.staticRenderFns=s.staticRenderFns,e.exports=a},10:function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,i=e._self._c||t;return i("div",{staticClass:"header"},[i("a",{staticClass:"header-arrow-left",attrs:{href:"javascript:history.back()"}}),e._v(" "),i("div",{staticClass:"header-title"},[e._v(e._s(e.title))])])},staticRenderFns:[]}},107:function(e,t,i){"use strict";function a(e){return e&&e.__esModule?e:{default:e}}Object.defineProperty(t,"__esModule",{value:!0});var n=i(9),s=a(n),r=i(5),o=a(r),l=i(1),c=a(l),u=i(3);a(u);t.default={name:"app",data:function(){return{toastshow:!1,toast_text:"",header_title:"身份选择",next_link:"javascript:void(0);",usertype_array:[{name:"患者或家属",selected:!1},{name:"医生",selected:!1}]}},methods:{usertypeHandler:function(e){for(var t=this,i=0;i<t.usertype_array.length;i++)t.usertype_array[i].selected=!1;t.usertype_array[e].selected=!0,t.next_link=0==e?c.default.site_links.baseinfo:c.default.site_links.doctorinfo},showToast:function(){var e=this;e.toastshow||(e.toastshow=!0,setTimeout(function(){e.toastshow=!1},3e3))},nextHandler:function(){var e=this,t=e.getFormData();return t.usertype<0?(e.toast_text="请选择您的身份！",void e.showToast()):void(location.href=0==t.usertype?"baseinfo.html":"doctorinfo.html")},getFormData:function(){for(var e=this,t={usertype:-1},i=0;i<e.usertype_array.length;i++)e.usertype_array[i].selected&&(t.usertype=i);return t}},components:{Fheader:s.default,Toast:o.default}}},155:function(e,t){},175:function(e,t,i){var a,n;i(155),a=i(107);var s=i(191);n=a=a||{},"object"!=typeof a.default&&"function"!=typeof a.default||(n=a=a.default),"function"==typeof n&&(n=n.options),n.render=s.render,n.staticRenderFns=s.staticRenderFns,e.exports=a},191:function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,i=e._self._c||t;return i("div",{attrs:{id:"app"}},[i("Fheader",{attrs:{title:e.header_title}}),e._v(" "),i("p",{staticClass:"text-center usertype-tip"},[e._v("请选择身份")]),e._v(" "),i("div",{staticClass:"usertype-form"},[e._l(e.usertype_array,function(t,a){return[i("div",{staticClass:"usertype-radio",class:[t.selected?"usertype-radio-selected":""],on:{click:function(t){e.usertypeHandler(a)}}},[e._v("\n                    "+e._s(t.name)+"\n                ")])]})],2),e._v(" "),i("a",{staticClass:"ft-bar-next",attrs:{href:e.next_link},on:{click:e.nextHandler}},[e._v("下一步")]),e._v(" "),i("transition",{attrs:{name:"fade"}},[e.toastshow?i("Toast",{attrs:{msg:e.toast_text}}):e._e()],1)],1)},staticRenderFns:[]}}});
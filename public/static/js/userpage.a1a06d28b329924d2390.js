webpackJsonp([8,0],{0:function(e,t,i){"use strict";function a(e){return e&&e.__esModule?e:{default:e}}var s=i(11),n=a(s),o=i(216),r=a(o);new n.default({el:"#app",template:"<App/>",components:{App:r.default}})},1:function(e,t,i){"use strict";function a(e){return e&&e.__esModule?e:{default:e}}Object.defineProperty(t,"__esModule",{value:!0});var s=i(12),n=a(s),o={};t.default=o;var r=n.default.create({baseURL:"http://s2.chilunyc.com:8012/",timeout:1e3,headers:{"content-type":"application/json"}}),l=location.href.indexOf("localhost")>0?0:1;o.site_links=function(){switch(l){case 0:return{index:"index.html",articledetail:"articledetail.html",forum:"forum.html",forumdetail:"forumdetail.html",signin:"signin.html",signup:"signup.html",logout:"",signinfo:"signinfo.html",usertype:"usertype.html",doctorinfo:"doctorinfo.html",baseinfo:"baseinfo.html",pathologyinfo:"pathologyinfo.html",tomour:"tomour.html",liver_function:"liverfunction.html",renal_function:"renalfunction.html",heart:"heart.html",immune:"immune.html",userpage_router:"",userpage:"userpage.html",doctorpage:"doctorpage.html",new_choices:"new-choices.html",new_index:"new-index.html",new_sub_index:"new-sub-index.html",edit_baseinfo:"edit-baseinfo.html",edit_doctorinfo:"edit-doctorinfo.html",edit_pathologyinfo:"edit-pathologyinfo.html",edit_index:"edit-index.html"};case 1:return{index:"/home",articledetail:"/article/detail",forum:"/forum",forumdetail:"/forum/post/detail",signin:"/login",signup:"/register",logout:"/logout",signinfo:"/user/supplementary_information",usertype:"/user/role",doctorinfo:"/user/basic_information/doctor",baseinfo:"/user/basic_information/user",pathologyinfo:"/user/pathologic_information",tomour:"/user/tumor_function_index/first_add",liver_function:"/user/liver_function_index/first_add",renal_function:"/user/renal_function_index/first_add",heart:"/user/heart_function_index/first_add",immune:"/user/immunity_function_index/first_add",userpage_router:"/user/home",new_choices:"/user/index_information/add/function_choose",new_index:"/user/index_information/add/important",new_sub_index:"/user/index_information/add/secondary",edit_userpage:"/user/basic_information/update",edit_pathologyinfo:"/user/pathological_information/update",edit_index:"/user/index_information/update"}}}(),o.getArticle=function(e){switch(e){case 0:return{has_login:0,articles:[{id:"1",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"2",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"3",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"4",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"5",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"6",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"}],banners:[{title:"",image:"",labels:["ss","tt"],url:""}]};case 1:return{has_login:0,articles:[{id:"1",title:"casdcasdcas22222",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"2",title:"casdcasdcas2222",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"3",title:"casdcasdcas2222",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"4",title:"casdcasdcas22222",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"5",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"6",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"}],banners:[{title:"",image:"",labels:["ss","tt"],url:""}]};case 2:return{has_login:0,articles:[{id:"1",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"2",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"3",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"4",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"5",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"6",title:"casdcasdcas3333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"}],banners:[{title:"",image:"",labels:["ss","tt"],url:""}]}}},o.init_index=function(e){return r.get("home/init?article_category_id="+e+"&page=1&size=6")},o.load_more_index=function(e,t){return r.get("home/article?article_category_id="+t+"&page="+e+"&size=6")},o.init_article=function(e){return r.get("article/detail/init/"+e)},o.load_more_article=function(e,t,i,a,s,n){return r.get("forum/post?sub_section_id="+i+"&order="+t+"&genic_mutation="+a+"&disease_stage="+s+"&treatment="+n+"&page="+e+"&size=6")},o.init_forum=function(){return r.get("forum/init")},o.article_comment=function(e,t,i,a){return console.log(t+"-"+i),r.post("article/comment",{id:e,comment_id:t,comment_response_id:i,content:a})},o.post_comment=function(e,t,i,a){return r.post("forum/post/comment",{id:e,comment_id:t,comment_response_id:i,content:a})},o.article_cheer=function(e){return r.get("article/cheer/"+e)},o.post_cheer=function(e){return r.get("forum/post/cheer/"+e)},o.login=function(e,t){return r.post("login",{mobile:e,password:t})},o.logout=function(){return r.post("logout")},o.authcode=function(e,t){return r.get("verification_sms/"+e+"/"+t)},o.quicklogin=function(e,t){return r.post("quick_login",{mobile:e,verification_code:t})},o.register=function(e,t,i,a){return r.post("register",{nickname:e,mobile:t,verification_code:i,password:a})},o.supplementary_info=function(e,t){return r.post("user/supplementary_information",{nickname:e,password:t})},o.user_info=function(e){return r.post("user/basic_information",e)},o.get_index=function(e,t){return r.get("index/"+e+"/"+t)},o.get_pathologic=function(){return r.get("pathologic_data")},o.pathologic=function(e){return r.post("user/pathologic_information",e)},o.tumour=function(e){return r.post("user/tumor_function_index/first_add",{data:e})},o.liver_function=function(e){return r.post("user/liver_function_index/first_add",{data:e})},o.renal_function=function(e){return r.post("user/renal_function_index/first_add",{data:e})},o.immune=function(e){return r.post("user/immunity_function_index/first_add",{data:e})},o.heart=function(e){return r.post("user/heart_function_index/first_add",{data:e})},o.update_index=function(e,t,i){return r.post("user/index_information/update",{function:e,index_name:t,data:i})},o.userinfo=function(){return r.get("user/home/init")}},2:function(e,t){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default={props:["msg"],data:function(){return{}}}},3:function(e,t){"use strict";function i(e){return e.replace(/^(\s|\u00A0)+/,"").replace(/(\s|\u00A0)+$/,"")}function a(e){return/^1(3|4|5|7|8)\d{9}$/.test(e)}function s(){var e=location.search,t=new Object;if(e.indexOf("?")!=-1)for(var i=e.substr(1),a=i.split("&"),s=0;s<a.length;s++)t[a[s].split("=")[0]]=unescape(a[s].split("=")[1]);return t}e.exports={trim:i,checkphone:a,get_request:s}},4:function(e,t){},5:function(e,t,i){var a,s;i(4),a=i(2);var n=i(6);s=a=a||{},"object"!=typeof a.default&&"function"!=typeof a.default||(s=a=a.default),"function"==typeof s&&(s=s.options),s.render=n.render,s.staticRenderFns=n.staticRenderFns,e.exports=a},6:function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,i=e._self._c||t;return i("div",{staticClass:"wxl-toast"},[i("div",{staticClass:"wxl-toast-text"},[e._v(e._s(e.msg))])])},staticRenderFns:[]}},7:function(e,t){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default={props:["title"],methods:{headerBackHandler:function(){}}}},8:function(e,t){},9:function(e,t,i){var a,s;i(8),a=i(7);var n=i(10);s=a=a||{},"object"!=typeof a.default&&"function"!=typeof a.default||(s=a=a.default),"function"==typeof s&&(s=s.options),s.render=n.render,s.staticRenderFns=n.staticRenderFns,e.exports=a},10:function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,i=e._self._c||t;return i("div",{staticClass:"header"},[i("a",{staticClass:"header-arrow-left",attrs:{href:"javascript:history.back()"},on:{click:e.headerBackHandler}}),e._v(" "),i("div",{staticClass:"header-title"},[e._v(e._s(e.title))])])},staticRenderFns:[]}},116:function(e,t,i){"use strict";function a(e){return e&&e.__esModule?e:{default:e}}Object.defineProperty(t,"__esModule",{value:!0});var s=i(9),n=a(s),o=i(5),r=a(o),l=i(1),d=a(l),c=i(3);a(c);t.default={name:"app",data:function(){return{toastshow:!1,toast_text:"",header_title:"个人主页",nextlink:"http://www.baidu.com",edit_index_link:d.default.site_links.edit_index,new_index_link:d.default.site_links.new_choices,edit_info_link:d.default.site_links.edit_userpage,edit_pathologyinfo_link:d.default.site_links.edit_pathologyinfo,smoke_array:["无吸烟史","5年以下","5-10年","10年以上"],user_data:{user:{avatar:"",nickname:"wxl",birthday:"2012-01-01",sex:"F",smoke_history:"2",diagnosis_time:"",diagnosis_time_generated:"11"},pathological_info:{pathologic_type:"casdc",disease_stage:"casd",metastatic_lesion:["cads","casdc"],genic_mutation:"",test_method:""},index_data:[{name:"肿瘤",selected:!0,data:[{name:"CEA",alias:"CEA",important:0,opened:!0,data:[{time:"2016-12-01",value:"103"},{time:"2016-12-01",value:"103"}]}]},{name:"肝功能",selected:!1,data:[{name:"CEA",opened:!0,alias:"",important:0,data:[]}]},{name:"肾功能",selected:!1,data:[]},{name:"心脏功能",selected:!1,data:[]},{name:"免疫功能",selected:!1},{name:"血常规",selected:!1,data:[]}]}}},mounted:function(){},methods:{showToast:function(){var e=this;e.toastshow||(e.toastshow=!0,setTimeout(function(){e.toastshow=!1},3e3))},initInfo:function(){var e=this;d.default.userinfo().then(function(t){0==t.data.code?e.user_data=t.data.data:(e.toast_text=t.data.message,e.showToast())}).catch(function(e){console.log(e)})},indexTabHandler:function(e){for(var t=this,i=0;i<t.user_data.index_data.length;i++)t.user_data.index_data[i].selected=!1;t.user_data.index_data[e].selected=!0},logoutHandler:function(){var e=this;d.default.logout().then(function(t){console.log(t),e.toast_text=t.data.message,e.showToast()}).catch(function(e){console.log(e)})}},filters:{dealLink:function(e,t,i,a){return e+"?alias="+t+"&index="+i+"&child_index="+a}},components:{Fheader:n.default,Toast:r.default}}},152:function(e,t){},216:function(e,t,i){var a,s;i(152),a=i(116);var n=i(220);s=a=a||{},"object"!=typeof a.default&&"function"!=typeof a.default||(s=a=a.default),"function"==typeof s&&(s=s.options),s.render=n.render,s.staticRenderFns=n.staticRenderFns,e.exports=a},220:function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,i=e._self._c||t;return i("div",{attrs:{id:"app"}},[i("Fheader",{attrs:{title:e.header_title}}),e._v(" "),i("div",{staticClass:"userpage-container"},[i("div",{staticClass:"userinfo-card"},[i("div",{staticClass:"userinfo-avar"}),e._v(" "),i("div",{staticClass:"userinfo-profile"},[i("p",[i("span",{staticClass:"userinfo-name"},[e._v(e._s(e.user_data.user.nickname))]),e._v(" "),i("span",{staticClass:"userinfo-gender"},[e._v(e._s("F"==e.user_data.user.sex?"女":"男"))]),e._v(" "),i("a",{staticClass:"userinfo-edit-link",attrs:{href:e.edit_info_link}},[e._v("修改")])]),e._v(" "),i("p",[i("span",{staticClass:"userinfo-detail"},[e._v(e._s(e.smoke_array[e.user_data.user.smoke_history])+" "+e._s(e.user_data.user.diagnosis_time_generated))])])])]),e._v(" "),i("div",{staticClass:"userinfo-edit-card"},[i("div",{staticClass:"userinfo-title"},[i("p",[i("span",{staticClass:"userinfo-title-tip"},[e._v("病理信息")]),e._v(" "),i("a",{staticClass:"userinfo-edit-link",attrs:{href:e.edit_pathologyinfo_link}},[e._v("修改")])])]),e._v(" "),i("div",{staticClass:"userinfo-edit-content"},[i("div",{staticClass:"userinfo-profile-item"},[i("div",{staticClass:"profile-item-label"},[e._v("病理类型：")]),e._v(" "),i("div",{staticClass:"profile-item-info"},[e._v(e._s(e.user_data.pathological_info.pathologic_type))])]),e._v(" "),i("div",{staticClass:"userinfo-profile-item"},[i("div",{staticClass:"profile-item-label"},[e._v("病理分期：")]),e._v(" "),i("div",{staticClass:"profile-item-info"},[e._v(e._s(e.user_data.pathological_info.disease_stage))])]),e._v(" "),i("div",{staticClass:"userinfo-profile-item"},[i("div",{staticClass:"profile-item-label"},[e._v("转移病灶：")]),e._v(" "),i("div",{staticClass:"profile-item-info"},[e._v(e._s(e.user_data.pathological_info.genic_mutation))])]),e._v(" "),i("div",{staticClass:"userinfo-profile-item"},[i("div",{staticClass:"profile-item-label"},[e._v("基因突变：")]),e._v(" "),i("div",{staticClass:"profile-item-info"},[e._v(e._s(e.user_data.pathological_info.genic_mutation))])]),e._v(" "),i("div",{staticClass:"userinfo-profile-item"},[i("div",{staticClass:"profile-item-label"},[e._v("检测方法：")]),e._v(" "),i("div",{staticClass:"profile-item-info"},[e._v(e._s(e.user_data.pathological_info.test_method))])])])]),e._v(" "),i("div",{staticClass:"userinfo-edit-card"},[i("div",{staticClass:"userinfo-title userinfo-title-noborder"},[i("p",[i("span",{staticClass:"userinfo-title-tip"},[e._v("核心数据")]),e._v(" "),i("a",{staticClass:"userinfo-edit-link",attrs:{href:e.new_index_link}},[e._v("新增报告单")])])]),e._v(" "),i("div",{staticClass:"userinfo-index-tab"},[e._l(e.user_data.index_data,function(t,a){return[i("div",{staticClass:"index-item",class:t.selected?"index-item-cur":"",on:{click:function(t){e.indexTabHandler(a)}}},[e._v(e._s(t.name))])]})],2),e._v(" "),i("div",{staticClass:"userinfo-edit-content"},[i("div",{staticClass:"userinfo-index-area"},[e._l(e.user_data.index_data,function(t,a){return[i("div",{directives:[{name:"show",rawName:"v-show",value:t.selected,expression:"tab.selected"}]},[e._l(t.data,function(t,s){return[i("div",{staticClass:"userinfo-index-title"},[i("span",[e._v(e._s(t.name)+" "+e._s(t.alias)+"（重要）")]),e._v(" "),i("a",{staticClass:"icon icon-edit",attrs:{href:e._f("dealLink")(e.edit_index_link,t.alias,a,s)}}),e._v(" "),t.data.length>0?i("a",{staticClass:"icon icon-eye-close",on:{click:function(e){t.opened=!t.opened}}}):e._e()]),e._v(" "),i("div",{directives:[{name:"show",rawName:"v-show",value:t.data.length>0&&t.opened,expression:"data.data.length>0 && data.opened"}],staticClass:"userinfo-index-list"},[e._l(t.data,function(t,a){return[i("div",{staticClass:"userinfo-index-item"},[i("span",[e._v(e._s(t.time))]),e._v(" : "),i("span",[e._v(e._s(t.value))])])]})],2)]})],2)]})],2)])]),e._v(" "),i("button",{staticClass:"button-logout",on:{click:e.logoutHandler}},[e._v("退出登录")])]),e._v(" "),i("transition",{attrs:{name:"fade"}},[e.toastshow?i("Toast",{attrs:{msg:e.toast_text}}):e._e()],1)],1)},staticRenderFns:[]}}});
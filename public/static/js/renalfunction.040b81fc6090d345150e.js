webpackJsonp([8,0],{0:function(t,e,a){"use strict";function i(t){return t&&t.__esModule?t:{default:t}}var n=a(11),s=i(n),r=a(170),o=i(r);new s.default({el:"#app",template:"<App/>",components:{App:o.default}})},1:function(t,e,a){"use strict";function i(t){return t&&t.__esModule?t:{default:t}}Object.defineProperty(e,"__esModule",{value:!0});var n=a(12),s=i(n),r={};e.default=r;var o=s.default.create({baseURL:"http://s2.chilunyc.com:8012/",timeout:1e3,headers:{"content-type":"application/json"}}),l=location.href.indexOf("localhost")>0?0:1;r.site_links=function(){switch(l){case 0:return{index:"index.html",articledetail:"articledetail.html",forum:"forum.html",forumdetail:"forumdetail.html",signin:"signin.html",signup:"signup.html",signinfo:"signinfo.html",usertype:"usertype.html",doctorinfo:"doctorinfo.html",baseinfo:"baseinfo.html",pathologyinfo:"pathologyinfo.html",tomour:"tomour.html",liver_function:"liverfunction.html",renal_function:"renalfunction.html",heart:"heart.html",immune:"immune.html"};case 1:return{index:"/home",articledetail:"/article/detail/",forum:"/forum",forumdetail:"/forum/post/detail/{id}",signin:"/login",signup:"/register",signinfo:"/user/supplementary_information",usertype:"/user/role",doctorinfo:"/user/basic_information/doctor",baseinfo:"/user/basic_information/user",pathologyinfo:"/user/pathological_information",tomour:"/user/tumor_function_index/first_add",liver_function:"/user/liver_function_index/first_add",renal_function:"/user/renal_function_index/first_add",heart:"/user/heart_function_index/first_add",immune:"/user/immunity_function_index/first_add"}}}(),r.getArticle=function(t){switch(t){case 0:return{has_login:0,articles:[{id:"1",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"2",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"3",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"4",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"5",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"6",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"}],banners:[{title:"",image:"",labels:["ss","tt"],url:""}]};case 1:return{has_login:0,articles:[{id:"1",title:"casdcasdcas22222",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"2",title:"casdcasdcas2222",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"3",title:"casdcasdcas2222",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"4",title:"casdcasdcas22222",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"5",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"6",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"}],banners:[{title:"",image:"",labels:["ss","tt"],url:""}]};case 2:return{has_login:0,articles:[{id:"1",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"2",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"3",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"4",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"5",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"6",title:"casdcasdcas3333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"}],banners:[{title:"",image:"",labels:["ss","tt"],url:""}]}}},r.init_index=function(){return o.get("home/init?article_category_id=1&page=1&size=6")},r.init_article=function(t){return o.get("article/detail/init/"+t)},r.init_forum=function(){return o.get("forum/init")},r.article_comment=function(t,e,a,i){return o.post("",{id:t,comment_id:e,comment_response_id:a,comment:i})},r.thumb_up=function(t){return o.get("forum/post/cheer/"+t)},r.login=function(t,e){return o.post("login",{mobile:t,password:e})},r.authcode=function(t,e){return o.get("verification_sms/"+t+"/"+e)},r.quicklogin=function(t,e){return o.post("quick_login",{mobile:t,verification_code:e})},r.register=function(t,e,a,i){return o.post("register",{nickname:t,mobile:e,verification_code:a,password:i})},r.supplementary_info=function(t,e){return o.post({nickname:t,password:e})},r.user_info=function(t){return o.post("user/basic_information",t)},r.get_index=function(t){return o.get("index/"+t)},r.get_pathologic=function(){return o.get("pathologic_data")},r.pathologic=function(t){return o.post("user/pathologic_information",t)},r.tumour=function(t){return o.post("user/tumor_function_index/first_add",{data:t})},r.liver_function=function(t){return o.post("user/liver_function_index/first_add",{data:t})},r.renal_function=function(t){return o.post("user/renal_function_index/first_add",{data:t})},r.immune=function(t){return o.post("user/immunity_function_index/first_add",{data:t})},r.heart=function(t){return o.post("user/heart_function_index/first_add",{data:t})}},2:function(t,e){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.default={props:["msg"],data:function(){return{}}}},3:function(t,e){"use strict";function a(t){return t.replace(/^(\s|\u00A0)+/,"").replace(/(\s|\u00A0)+$/,"")}function i(t){return/^1(3|4|5|7|8)\d{9}$/.test(t)}function n(){var t=location.search,e=new Object;if(t.indexOf("?")!=-1)for(var a=t.substr(1),i=a.split("&"),n=0;n<i.length;n++)e[i[n].split("=")[0]]=unescape(i[n].split("=")[1]);return e}t.exports={trim:a,checkphone:i,get_request:n}},4:function(t,e){},5:function(t,e,a){var i,n;a(4),i=a(2);var s=a(6);n=i=i||{},"object"!=typeof i.default&&"function"!=typeof i.default||(n=i=i.default),"function"==typeof n&&(n=n.options),n.render=s.render,n.staticRenderFns=s.staticRenderFns,t.exports=i},6:function(t,e){t.exports={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"wxl-toast"},[a("div",{staticClass:"wxl-toast-text"},[t._v(t._s(t.msg))])])},staticRenderFns:[]}},7:function(t,e){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.default={props:["title"]}},8:function(t,e){},9:function(t,e,a){var i,n;a(8),i=a(7);var s=a(10);n=i=i||{},"object"!=typeof i.default&&"function"!=typeof i.default||(n=i=i.default),"function"==typeof n&&(n=n.options),n.render=s.render,n.staticRenderFns=s.staticRenderFns,t.exports=i},10:function(t,e){t.exports={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"header"},[a("a",{staticClass:"header-arrow-left",attrs:{href:"javascript:history.back()"}}),t._v(" "),a("div",{staticClass:"header-title"},[t._v(t._s(t.title))])])},staticRenderFns:[]}},102:function(t,e,a){"use strict";function i(t){return t&&t.__esModule?t:{default:t}}Object.defineProperty(e,"__esModule",{value:!0});var n=a(9),s=i(n),r=a(5),o=i(r),l=a(1),c=i(l),d=a(3),u=i(d);e.default={name:"app",data:function(){return{toastshow:!1,toast_text:"",header_title:"关注指标",nextlink:"http://www.baidu.com",picker_arr:[],index_data:[{index:"尿素氮 BUN",value:"",date:""},{index:"肌酐 Cre",value:"",date:""},{index:"尿酸 Uric acid",value:"",date:""},{index:"B2微球蛋白 B2M",value:"",date:""},{index:"胱抑素C CysC",value:"",date:""},{index:"钾 K",value:"",date:""},{index:"钙 Ca",value:"",date:""},{index:"血红蛋白 HGB",value:"",date:""}]}},mounted:function(){var t=this;t.initRenalFunction()},methods:{showToast:function(){var t=this;t.toastshow||(t.toastshow=!0,setTimeout(function(){t.toastshow=!1},3e3))},initRenalFunction:function(){var t=this;c.default.get_index("renal").then(function(e){if(console.log(e),0==e.data.code){for(var a=[],i=0;i<e.data.data.length;i++)a[i]={index:e.data.data[i].name,value:"",date:""};t.index_data=a,t.$nextTick(function(){t.initEvent()})}else t.toast_text=e.data.message,t.showToast()}).catch(function(t){console.log(t)})},initEvent:function(){for(var t=this,e=0;e<t.index_data.length;e++)!function(e){var a=".piece-date-picker-"+e,i={picker:new MobileSelectDate,picked:!1};t.picker_arr[e]=i,t.picker_arr[e].picker.init({trigger:a,value:"2014/06/07",min:"1990/01/01",position:"bottom",callback:function(){var a=$(".piece-date-picker-"+e).attr("data-value");t.index_data[e].date=a.replace(/\,/g,"-"),t.picker_arr[e].picked=!0;for(var i=0;i<t.picker_arr.length;i++)!function(e,a){if(!t.picker_arr[e].picked){var i=a.split(",");t.picker_arr[e].picker.value=i}}(i,a)}})}(e)},nextHandler:function(){for(var t=this,e=!1,a=0;a<t.index_data.length;a++){if(u.default.trim(t.index_data[a].value)&&!t.index_data[a].date)return t.toast_text="第"+(a+1)+"项"+t.index_data[a].index+"报告时间还未指定！",void t.showToast();if(u.default.trim(t.index_data[a].date)&&!t.index_data[a].value)return t.toast_text="第"+(a+1)+"项"+t.index_data[a].index+"还未填写！",void t.showToast();u.default.trim(t.index_data[a].value)&&u.default.trim(t.index_data[a].date)&&(e=!0)}e&&c.default.renal_function(t.index_data).then(function(e){console.log(e),0==e.data.code||(t.toast_text=e.data.message,t.showToast())}).catch(function(t){console.log(t)})},skipHandler:function(){location.href=c.default.site_links.heart}},components:{Fheader:s.default,Toast:o.default}}},144:function(t,e){},170:function(t,e,a){var i,n;a(144),i=a(102);var s=a(180);n=i=i||{},"object"!=typeof i.default&&"function"!=typeof i.default||(n=i=i.default),"function"==typeof n&&(n=n.options),n.render=s.render,n.staticRenderFns=s.staticRenderFns,t.exports=i},180:function(t,e){t.exports={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{attrs:{id:"app"}},[a("Fheader",{attrs:{title:t.header_title}}),t._v(" "),t._m(0),t._v(" "),a("div",{staticClass:"doctor-form"},[t._l(t.index_data,function(e,i){return[a("div",{staticClass:"piece piece-with-date"},[a("p",[t._v("\n                        "+t._s(e.index)+"\n                    ")]),t._v(" "),a("div",{staticClass:"piece-date-picker",class:"piece-date-picker-"+i},[""==e.date?[t._m(1,!0)]:[a("div",{staticClass:"picker-yes"},[a("span",[t._v("已选择")]),t._v(" "),a("span",[t._v("“"+t._s(e.date)+"”")])])]],2)]),t._v(" "),a("div",{staticClass:"info-card"},[a("input",{directives:[{name:"model",rawName:"v-model",value:e.value,expression:"renal.value"}],staticClass:"input-info",attrs:{type:"",name:"",placeholder:"请填写指标信息"},domProps:{value:t._s(e.value)},on:{input:function(t){t.target.composing||(e.value=t.target.value)}}})])]})],2),t._v(" "),a("div",{staticClass:"ft-bar-skip-next"},[a("div",{staticClass:"ft-bar-tab",on:{click:t.skipHandler}},[t._v("跳过")]),t._v(" "),a("div",{staticClass:"ft-bar-tab",on:{click:t.nextHandler}},[t._v("下一步（3/5）")])]),t._v(" "),a("transition",{attrs:{name:"fade"}},[t.toastshow?a("Toast",{attrs:{msg:t.toast_text}}):t._e()],1)],1)},staticRenderFns:[function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"steps-bar"},[a("div",{staticClass:"steps-wrapper"},[a("div",{staticClass:"steps-flex"},[a("div",{staticClass:"steps-item"},[a("div",{staticClass:"steps-dot"}),t._v(" "),a("div",{staticClass:"steps-text"},[t._v("肝功能")])]),t._v(" "),a("div",{staticClass:"steps-item steps-item-cur"},[a("div",{staticClass:"steps-dot"}),t._v(" "),a("div",{staticClass:"steps-text"},[t._v("肾功能")])]),t._v(" "),a("div",{staticClass:"steps-item"},[a("div",{staticClass:"steps-dot"}),t._v(" "),a("div",{staticClass:"steps-text"},[t._v("心脏功能")])])])])])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"picker-not"},[a("i",{staticClass:"icon-calendar"}),t._v(" "),a("span",[t._v("请选择出报告时间")])])}]}}});
webpackJsonp([14,0],{0:function(t,e,i){"use strict";function a(t){return t&&t.__esModule?t:{default:t}}var n=i(11),s=a(n),r=i(200),o=a(r);new s.default({el:"#app",template:"<App/>",components:{App:o.default}})},1:function(t,e,i){"use strict";function a(t){return t&&t.__esModule?t:{default:t}}Object.defineProperty(e,"__esModule",{value:!0});var n=i(12),s=a(n),r={};e.default=r;var o=s.default.create({baseURL:"http://s2.chilunyc.com:8012/",timeout:1e3,headers:{"content-type":"application/json"}}),c=location.href.indexOf("localhost")>0?0:1;r.site_links=function(){switch(c){case 0:return{index:"index.html",articledetail:"articledetail.html",forum:"forum.html",forumdetail:"forumdetail.html",signin:"signin.html",signup:"signup.html",logout:"",signinfo:"signinfo.html",usertype:"usertype.html",doctorinfo:"doctorinfo.html",baseinfo:"baseinfo.html",pathologyinfo:"pathologyinfo.html",tomour:"tomour.html",liver_function:"liverfunction.html",renal_function:"renalfunction.html",heart:"heart.html",immune:"immune.html",edit_choices:"edit-choices.html",edit_sub_index:"edit-sub-index.html"};case 1:return{index:"/home",articledetail:"/article/detail",forum:"/forum",forumdetail:"/forum/post/detail",signin:"/login",signup:"/register",logout:"/logout",signinfo:"/user/supplementary_information",usertype:"/user/role",doctorinfo:"/user/basic_information/doctor",baseinfo:"/user/basic_information/user",pathologyinfo:"/user/pathologic_information",tomour:"/user/tumor_function_index/first_add",liver_function:"/user/liver_function_index/first_add",renal_function:"/user/renal_function_index/first_add",heart:"/user/heart_function_index/first_add",immune:"/user/immunity_function_index/first_add"}}}(),r.getArticle=function(t){switch(t){case 0:return{has_login:0,articles:[{id:"1",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"2",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"3",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"4",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"5",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"6",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"}],banners:[{title:"",image:"",labels:["ss","tt"],url:""}]};case 1:return{has_login:0,articles:[{id:"1",title:"casdcasdcas22222",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"2",title:"casdcasdcas2222",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"3",title:"casdcasdcas2222",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"4",title:"casdcasdcas22222",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"5",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"6",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"}],banners:[{title:"",image:"",labels:["ss","tt"],url:""}]};case 2:return{has_login:0,articles:[{id:"1",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"2",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"3",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"4",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"5",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"6",title:"casdcasdcas3333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"}],banners:[{title:"",image:"",labels:["ss","tt"],url:""}]}}},r.init_index=function(t){return o.get("home/init?article_category_id="+t+"&page=1&size=6")},r.load_more_index=function(t,e){return o.get("home/article?article_category_id="+e+"&page="+t+"&size=6")},r.init_article=function(t){return o.get("article/detail/init/"+t)},r.load_more_article=function(t,e,i,a,n,s){return o.get("forum/post?sub_section_id="+i+"&order="+e+"&genic_mutation="+a+"&disease_stage="+n+"&treatment="+s+"&page="+t+"&size=6")},r.init_forum=function(){return o.get("forum/init")},r.article_comment=function(t,e,i,a){return console.log(e+"-"+i),o.post("article/comment",{id:t,comment_id:e,comment_response_id:i,content:a})},r.post_comment=function(t,e,i,a){return o.post("forum/post/comment",{id:t,comment_id:e,comment_response_id:i,content:a})},r.article_cheer=function(t){return o.get("article/cheer/"+t)},r.post_cheer=function(t){return o.get("forum/post/cheer/"+t)},r.login=function(t,e){return o.post("login",{mobile:t,password:e})},r.logout=function(){return o.post("logout")},r.authcode=function(t,e){return o.get("verification_sms/"+t+"/"+e)},r.quicklogin=function(t,e){return o.post("quick_login",{mobile:t,verification_code:e})},r.register=function(t,e,i,a){return o.post("register",{nickname:t,mobile:e,verification_code:i,password:a})},r.supplementary_info=function(t,e){return o.post("user/supplementary_information",{nickname:t,password:e})},r.user_info=function(t){return o.post("user/basic_information",t)},r.get_index=function(t,e){return o.get("index/"+t+"/"+e)},r.get_pathologic=function(){return o.get("pathologic_data")},r.pathologic=function(t){return o.post("user/pathologic_information",t)},r.tumour=function(t){return o.post("user/tumor_function_index/first_add",{data:t})},r.liver_function=function(t){return o.post("user/liver_function_index/first_add",{data:t})},r.renal_function=function(t){return o.post("user/renal_function_index/first_add",{data:t})},r.immune=function(t){return o.post("user/immunity_function_index/first_add",{data:t})},r.heart=function(t){return o.post("user/heart_function_index/first_add",{data:t})}},2:function(t,e){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.default={props:["msg"],data:function(){return{}}}},3:function(t,e){"use strict";function i(t){return t.replace(/^(\s|\u00A0)+/,"").replace(/(\s|\u00A0)+$/,"")}function a(t){return/^1(3|4|5|7|8)\d{9}$/.test(t)}function n(){var t=location.search,e=new Object;if(t.indexOf("?")!=-1)for(var i=t.substr(1),a=i.split("&"),n=0;n<a.length;n++)e[a[n].split("=")[0]]=unescape(a[n].split("=")[1]);return e}t.exports={trim:i,checkphone:a,get_request:n}},4:function(t,e){},5:function(t,e,i){var a,n;i(4),a=i(2);var s=i(6);n=a=a||{},"object"!=typeof a.default&&"function"!=typeof a.default||(n=a=a.default),"function"==typeof n&&(n=n.options),n.render=s.render,n.staticRenderFns=s.staticRenderFns,t.exports=a},6:function(t,e){t.exports={render:function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"wxl-toast"},[i("div",{staticClass:"wxl-toast-text"},[t._v(t._s(t.msg))])])},staticRenderFns:[]}},7:function(t,e){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.default={props:["title"]}},8:function(t,e){},9:function(t,e,i){var a,n;i(8),a=i(7);var s=i(10);n=a=a||{},"object"!=typeof a.default&&"function"!=typeof a.default||(n=a=a.default),"function"==typeof n&&(n=n.options),n.render=s.render,n.staticRenderFns=s.staticRenderFns,t.exports=a},10:function(t,e){t.exports={render:function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"header"},[i("a",{staticClass:"header-arrow-left",attrs:{href:"javascript:history.back()"}}),t._v(" "),i("div",{staticClass:"header-title"},[t._v(t._s(t.title))])])},staticRenderFns:[]}},104:function(t,e,i){"use strict";function a(t){return t&&t.__esModule?t:{default:t}}Object.defineProperty(e,"__esModule",{value:!0});var n=i(9),s=a(n),r=i(5),o=a(r),c=i(1),l=a(c),d=i(3),u=a(d);e.default={name:"app",data:function(){return{toastshow:!1,toast_text:"",header_title:"关注指标",nextlink:"http://www.baidu.com",picker_arr:[],index_data:[{index:"白细胞计数 WBC",value:"",date:""},{index:"肌酐 Cre",value:"",date:""},{index:"淋巴细胞比值 LYMPH%",value:"",date:""},{index:"乳酸脱氢酶 LDH/LD",value:"",date:""},{index:"a-丁酸脱氢酶 HBDH",value:"",date:""},{index:"中性粒细胞(绝) NEUT#",value:"",date:""}]}},mounted:function(){var t=this;t.initImmuneFunction()},methods:{showToast:function(){var t=this;t.toastshow||(t.toastshow=!0,setTimeout(function(){t.toastshow=!1},3e3))},initImmuneFunction:function(){var t=this;l.default.get_index("immunity",1).then(function(e){if(console.log(e),0==e.data.code){for(var i=[],a=0;a<e.data.data.length;a++)i[a]={index:e.data.data[a].name,value:"",date:""};t.index_data=i,t.$nextTick(function(){t.initEvent()})}else t.toast_text=e.data.message,t.showToast()}).catch(function(t){console.log(t)})},initEvent:function(){for(var t=this,e=0;e<t.index_data.length;e++)!function(e){var i=".piece-date-picker-"+e,a={picker:new MobileSelectDate,picked:!1};t.picker_arr[e]=a,t.picker_arr[e].picker.init({trigger:i,value:"2014/06/07",min:"1990/01/01",position:"bottom",callback:function(){var i=$(".piece-date-picker-"+e).attr("data-value");t.index_data[e].date=i.replace(/\,/g,"-"),t.picker_arr[e].picked=!0;for(var a=0;a<t.picker_arr.length;a++)!function(e,i){if(!t.picker_arr[e].picked){var a=i.split(",");t.picker_arr[e].picker.value=a}}(a,i)}})}(e)},nextHandler:function(){for(var t=this,e=!1,i=0;i<t.index_data.length;i++){if(u.default.trim(t.index_data[i].value)&&!t.index_data[i].date)return t.toast_text="第"+(i+1)+"项"+t.index_data[i].index+"报告时间还未指定！",void t.showToast();if(u.default.trim(t.index_data[i].date)&&!t.index_data[i].value)return t.toast_text="第"+(i+1)+"项"+t.index_data[i].index+"还未填写！",void t.showToast();u.default.trim(t.index_data[i].value)&&u.default.trim(t.index_data[i].date)&&(e=!0)}e&&l.default.immune(t.index_data).then(function(e){console.log(e),0==e.data.code?(t.toast_text=e.data.message,t.showToast()):(t.toast_text=e.data.message,t.showToast())}).catch(function(t){console.log(t)})}},components:{Fheader:s.default,Toast:o.default}}},151:function(t,e){},200:function(t,e,i){var a,n;i(151),a=i(104);var s=i(215);n=a=a||{},"object"!=typeof a.default&&"function"!=typeof a.default||(n=a=a.default),"function"==typeof n&&(n=n.options),n.render=s.render,n.staticRenderFns=s.staticRenderFns,t.exports=a},215:function(t,e){t.exports={render:function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{attrs:{id:"app"}},[i("Fheader",{attrs:{title:t.header_title}}),t._v(" "),t._m(0),t._v(" "),i("div",{staticClass:"doctor-form"},[t._l(t.index_data,function(e,a){return[i("div",{staticClass:"piece piece-with-date"},[i("p",[t._v("\n                        "+t._s(e.index)+"\n                    ")]),t._v(" "),i("div",{staticClass:"piece-date-picker",class:"piece-date-picker-"+a},[""==e.date?[t._m(1,!0)]:[i("div",{staticClass:"picker-yes"},[i("span",[t._v("已选择")]),t._v(" "),i("span",[t._v("“"+t._s(e.date)+"”")])])]],2)]),t._v(" "),i("div",{staticClass:"info-card"},[i("input",{directives:[{name:"model",rawName:"v-model",value:e.value,expression:"immune.value"}],staticClass:"input-info",attrs:{type:"",name:"",placeholder:"请填写指标信息"},domProps:{value:t._s(e.value)},on:{input:function(t){t.target.composing||(e.value=t.target.value)}}})])]})],2),t._v(" "),i("div",{staticClass:"ft-bar-next",on:{click:t.nextHandler}},[t._v("完成（5/5）")]),t._v(" "),i("transition",{attrs:{name:"fade"}},[t.toastshow?i("Toast",{attrs:{msg:t.toast_text}}):t._e()],1)],1)},staticRenderFns:[function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"steps-bar"},[i("div",{staticClass:"steps-wrapper"},[i("div",{staticClass:"steps-flex"},[i("div",{staticClass:"steps-item"},[i("div",{staticClass:"steps-dot"}),t._v(" "),i("div",{staticClass:"steps-text"},[t._v("心脏功能")])]),t._v(" "),i("div",{staticClass:"steps-item steps-item-cur"},[i("div",{staticClass:"steps-dot"}),t._v(" "),i("div",{staticClass:"steps-text"},[t._v("免疫")])]),t._v(" "),i("div",{staticClass:"steps-item"})])])])},function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"picker-not"},[i("i",{staticClass:"icon-calendar"}),t._v(" "),i("span",[t._v("请选择出报告时间")])])}]}}});
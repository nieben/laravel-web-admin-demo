webpackJsonp([9,0],{0:function(e,t,a){"use strict";function i(e){return e&&e.__esModule?e:{default:e}}var s=a(11),n=i(s),o=a(169),l=i(o);new n.default({el:"#app",template:"<App/>",components:{App:l.default}})},1:function(e,t,a){"use strict";function i(e){return e&&e.__esModule?e:{default:e}}Object.defineProperty(t,"__esModule",{value:!0});var s=a(12),n=i(s),o={};t.default=o;var l=n.default.create({baseURL:"http://s2.chilunyc.com:8012/",timeout:1e3,headers:{"content-type":"application/json"}}),c=location.href.indexOf("localhost")>0?0:1;o.site_links=function(){switch(c){case 0:return{index:"index.html",articledetail:"articledetail.html",forum:"forum.html",forumdetail:"forumdetail.html",signin:"signin.html",signup:"signup.html",signinfo:"signinfo.html",usertype:"usertype.html",doctorinfo:"doctorinfo.html",baseinfo:"baseinfo.html",pathologyinfo:"pathologyinfo.html",tomour:"tomour.html",liver_function:"liverfunction.html",renal_function:"renalfunction.html",heart:"heart.html",immune:"immune.html"};case 1:return{index:"/home",articledetail:"/article/detail/",forum:"/forum",forumdetail:"/forum/post/detail/{id}",signin:"/login",signup:"/register",signinfo:"/user/supplementary_information",usertype:"/user/role",doctorinfo:"/user/basic_information/doctor",baseinfo:"/user/basic_information/user",pathologyinfo:"/user/pathological_information",tomour:"/user/tumor_function_index/first_add",liver_function:"/user/liver_function_index/first_add",renal_function:"/user/renal_function_index/first_add",heart:"/user/heart_function_index/first_add",immune:"/user/immunity_function_index/first_add"}}}(),o.getArticle=function(e){switch(e){case 0:return{has_login:0,articles:[{id:"1",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"2",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"3",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"4",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"5",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"6",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"}],banners:[{title:"",image:"",labels:["ss","tt"],url:""}]};case 1:return{has_login:0,articles:[{id:"1",title:"casdcasdcas22222",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"2",title:"casdcasdcas2222",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"3",title:"casdcasdcas2222",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"4",title:"casdcasdcas22222",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"5",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"6",title:"casdcasdcas1111",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"}],banners:[{title:"",image:"",labels:["ss","tt"],url:""}]};case 2:return{has_login:0,articles:[{id:"1",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"2",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"3",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"4",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"5",title:"casdcasdcas33333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"},{id:"6",title:"casdcasdcas3333",title_image:"",labels:["aa","bb"],release_time:"2016-03-01 10:00:00"}],banners:[{title:"",image:"",labels:["ss","tt"],url:""}]}}},o.init_index=function(){return l.get("home/init?article_category_id=1&page=1&size=6")},o.init_article=function(e){return l.get("article/detail/init/"+e)},o.init_forum=function(){return l.get("forum/init")},o.article_comment=function(e,t,a,i){return l.post("",{id:e,comment_id:t,comment_response_id:a,comment:i})},o.thumb_up=function(e){return l.get("forum/post/cheer/"+e)},o.login=function(e,t){return l.post("login",{mobile:e,password:t})},o.authcode=function(e,t){return l.get("verification_sms/"+e+"/"+t)},o.quicklogin=function(e,t){return l.post("quick_login",{mobile:e,verification_code:t})},o.register=function(e,t,a,i){return l.post("register",{nickname:e,mobile:t,verification_code:a,password:i})},o.supplementary_info=function(e,t){return l.post({nickname:e,password:t})},o.user_info=function(e){return l.post("user/basic_information",e)},o.get_index=function(e){return l.get("index/"+e)},o.get_pathologic=function(){return l.get("pathologic_data")},o.pathologic=function(e){return l.post("user/pathologic_information",e)},o.tumour=function(e){return l.post("user/tumor_function_index/first_add",{data:e})},o.liver_function=function(e){return l.post("user/liver_function_index/first_add",{data:e})},o.renal_function=function(e){return l.post("user/renal_function_index/first_add",{data:e})},o.immune=function(e){return l.post("user/immunity_function_index/first_add",{data:e})},o.heart=function(e){return l.post("user/heart_function_index/first_add",{data:e})}},2:function(e,t){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default={props:["msg"],data:function(){return{}}}},3:function(e,t){"use strict";function a(e){return e.replace(/^(\s|\u00A0)+/,"").replace(/(\s|\u00A0)+$/,"")}function i(e){return/^1(3|4|5|7|8)\d{9}$/.test(e)}function s(){var e=location.search,t=new Object;if(e.indexOf("?")!=-1)for(var a=e.substr(1),i=a.split("&"),s=0;s<i.length;s++)t[i[s].split("=")[0]]=unescape(i[s].split("=")[1]);return t}e.exports={trim:a,checkphone:i,get_request:s}},4:function(e,t){},5:function(e,t,a){var i,s;a(4),i=a(2);var n=a(6);s=i=i||{},"object"!=typeof i.default&&"function"!=typeof i.default||(s=i=i.default),"function"==typeof s&&(s=s.options),s.render=n.render,s.staticRenderFns=n.staticRenderFns,e.exports=i},6:function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"wxl-toast"},[a("div",{staticClass:"wxl-toast-text"},[e._v(e._s(e.msg))])])},staticRenderFns:[]}},7:function(e,t){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default={props:["title"]}},8:function(e,t){},9:function(e,t,a){var i,s;a(8),i=a(7);var n=a(10);s=i=i||{},"object"!=typeof i.default&&"function"!=typeof i.default||(s=i=i.default),"function"==typeof s&&(s=s.options),s.render=n.render,s.staticRenderFns=n.staticRenderFns,e.exports=i},10:function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"header"},[a("a",{staticClass:"header-arrow-left",attrs:{href:"javascript:history.back()"}}),e._v(" "),a("div",{staticClass:"header-title"},[e._v(e._s(e.title))])])},staticRenderFns:[]}},101:function(e,t,a){"use strict";function i(e){return e&&e.__esModule?e:{default:e}}Object.defineProperty(t,"__esModule",{value:!0});var s=a(9),n=i(s),o=a(5),l=i(o),c=a(1),d=i(c),r=a(3),u=i(r);t.default={name:"app",data:function(){return{toastshow:!1,toast_text:"",header_title:"病理信息",nextlink:"http://www.baidu.com",type_value:"",stage_value:"",lesion_value:"",gene_value:"",detection_value:"",pathologic_data:{pathologic_types:[{name:"小细胞肺癌",selected:!1},{name:"肺鳞癌",selected:!1},{name:"肺腺癌",selected:!1},{name:"混合癌",selected:!1}],disease_stages:[{name:"I",selected:!1,childs:[{name:"Ia",selected:!1},{name:"Ib",selected:!1}]},{name:"II",selected:!1,childs:[{name:"IIa",selected:!1},{name:"IIb",selected:!1}]},{name:"III",selected:!1,childs:[{name:"IIIa",selected:!1},{name:"IIIb",selected:!1}]},{name:"IV",selected:!1,childs:[]}],metastatic_lesion:[{name:"脑部",selected:!1},{name:"肝肾",selected:!1},{name:"淋巴",selected:!1},{name:"胸膜",selected:!1},{name:"骨转移",selected:!1}],genic_mutations:[{name:"EGFR",selected:!1,childs:[{name:"EGFR18",selected:!1},{name:"EGFR19",selected:!1},{name:"EGFR20",selected:!1},{name:"EGFR21",selected:!1}]},{name:"ALK",selected:!1,childs:[]},{name:"ROS1",selected:!1,childs:[]},{name:"HER2",selected:!1,childs:[]},{name:"BRAF",selected:!1,childs:[]},{name:"KARS",selected:!1,childs:[]},{name:"RET",selected:!1,childs:[]},{name:"ERCC1",selected:!1,childs:[]},{name:"RRM1",selected:!1,childs:[]},{name:"cEMT",selected:!1,childs:[]},{name:"T790M",selected:!1,childs:[]}],test_method:[{name:"组织标本（活检）",selected:!1},{name:"血液标本",selected:!1},{name:"胸水蜡块",selected:!1}]}}},mounted:function(){var e=this;e.initData()},methods:{showToast:function(){var e=this;e.toastshow||(e.toastshow=!0,setTimeout(function(){e.toastshow=!1},1500))},initData:function(){var e=this;d.default.get_pathologic().then(function(t){console.log(t),0==t.data.code&&(e.pathologic_data=t.data.data)}).catch(function(e){console.log(e)})},typeHandler:function(e){var t=this;t.type_value="";for(var a=0;a<t.pathologic_data.pathologic_types.length;a++)t.pathologic_data.pathologic_types[a].selected=!1;t.pathologic_data.pathologic_types[e].selected=!0},stageHandler:function(e){for(var t=this,a=0;a<t.pathologic_data.disease_stages.length;a++)t.pathologic_data.disease_stages[a].selected=!1;t.pathologic_data.disease_stages[e].selected=!0},childStageHandler:function(e,t){for(var a=this,i=0;i<a.pathologic_data.disease_stages[e].childs.length;i++)a.pathologic_data.disease_stages[e].childs[i].selected=!1;a.pathologic_data.disease_stages[e].childs[t].selected=!0},lesionHandler:function(e){var t=this;t.pathologic_data.metastatic_lesion[e].selected=!t.pathologic_data.metastatic_lesion[e].selected},geneHandler:function(e){var t=this;t.gene_value="";for(var a=0;a<t.pathologic_data.genic_mutations.length;a++)t.pathologic_data.genic_mutations[a].selected=!1;t.pathologic_data.genic_mutations[e].selected=!0},geneChildHandler:function(e,t){for(var a=this,i=0;i<a.pathologic_data.genic_mutations[e].childs.length;i++)a.pathologic_data.genic_mutations[e].childs[i].selected=!1;a.pathologic_data.genic_mutations[e].childs[t].selected=!0},detectionHandler:function(e){for(var t=this,a=0;a<t.pathologic_data.test_method.length;a++)t.pathologic_data.test_method[a].selected=!1;t.pathologic_data.test_method[e].selected=!0},inputHander:function(e){var t=this;switch(e){case"type":if(u.default.trim(t.type_value))for(var a=0;a<t.pathologic_data.pathologic_types.length;a++)t.pathologic_data.pathologic_types[a].selected=!1;break;case"stage":if(u.default.trim(t.stage_value))for(var a=0;a<t.pathologic_data.disease_stages.length;a++)t.pathologic_data.disease_stages[a].selected=!1;break;case"gene":if(u.default.trim(t.gene_value))for(var a=0;a<t.pathologic_data.genic_mutations.length;a++)if(t.pathologic_data.genic_mutations[a].selected=!1,t.pathologic_data.genic_mutations[a].childs.length>0)for(var i=0;i<t.pathologic_data.genic_mutations[a].childs.length;i++)t.pathologic_data.genic_mutations[a].childs[i].selected=!1;break;case"detection":if(u.default.trim(t.detection_value))for(var a=0;a<t.pathologic_data.test_method.length;a++)t.pathologic_data.test_method[a].selected=!1}},nextHandler:function(){var e=this,t=e.getFormData();return console.log(t),t.pathologic_type?t.disease_stage?t.metastatic_lesion.length<=0?(e.toast_text="请选择转移病灶！",void e.showToast()):t.genic_mutation?t.test_method?void d.default.pathologic(t).then(function(t){console.log(t),0==t.data.code?location.href=d.default.site_links.tomour:(e.toast_text=t.data.message,e.showToast())}).catch(function(e){console.log(e)}):(e.toast_text="请选择检测方法！",void e.showToast()):(e.toast_text="请选择基因突变！",void e.showToast()):(e.toast_text="请选择病理分期！",void e.showToast()):(e.toast_text="请选择病理类型！",void e.showToast())},getFormData:function(){var e=this,t={},a=u.default.trim(e.type_value),i=(u.default.trim(e.stage_value),u.default.trim(e.lesion_value)),s=u.default.trim(e.gene_value);if(t.metastatic_lesion=[],a)t.pathologic_type=a;else for(var n=0;n<e.pathologic_data.pathologic_types.length;n++)e.pathologic_data.pathologic_types[n].selected&&(t.pathologic_type=e.pathologic_data.pathologic_types[n].name);for(var n=0;n<e.pathologic_data.disease_stages.length;n++)if(e.pathologic_data.disease_stages[n].childs.length<=0)e.pathologic_data.disease_stages[n].selected&&(t.disease_stage=e.pathologic_data.disease_stages[n].name);else for(var o=0;o<e.pathologic_data.disease_stages[n].childs.length;o++)e.pathologic_data.disease_stages[n].childs[o].selected&&(t.disease_stage=e.pathologic_data.disease_stages[n].childs[o].name);i&&t.metastatic_lesion.push(i);for(var n=0;n<e.pathologic_data.metastatic_lesion.length;n++)e.pathologic_data.metastatic_lesion[n].selected&&t.metastatic_lesion.push(e.pathologic_data.metastatic_lesion[n].name);if(s)t.genic_mutation=e.gene_value;else for(var n=0;n<e.pathologic_data.genic_mutations.length;n++)if(e.pathologic_data.genic_mutations[n].childs.length<=0)e.pathologic_data.genic_mutations[n].selected&&(t.genic_mutation=e.pathologic_data.genic_mutations[n].name);else for(var o=0;o<e.pathologic_data.genic_mutations[n].childs.length;o++)e.pathologic_data.genic_mutations[n].childs[o].selected&&(t.genic_mutation=e.pathologic_data.genic_mutations[n].childs[o].name);for(var n=0;n<e.pathologic_data.test_method.length;n++)e.pathologic_data.test_method[n].selected&&(t.test_method=e.pathologic_data.test_method[n].name);return t}},components:{Fheader:n.default,Toast:l.default}}},156:function(e,t){},169:function(e,t,a){var i,s;a(156),i=a(101);var n=a(192);s=i=i||{},"object"!=typeof i.default&&"function"!=typeof i.default||(s=i=i.default),"function"==typeof s&&(s=s.options),s.render=n.render,s.staticRenderFns=n.staticRenderFns,e.exports=i},192:function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{attrs:{id:"app"}},[a("Fheader",{attrs:{title:e.header_title}}),e._v(" "),a("div",{staticClass:"doctor-form"},[a("div",{staticClass:"piece"},[e._v("病理类型")]),e._v(" "),a("div",{staticClass:"info-card"},[e._l(e.pathologic_data.pathologic_types,function(t,i){return[a("div",{staticClass:"custom-radio",class:[t.selected?"custom-radio-filled":""],on:{click:function(t){e.typeHandler(i)}}},[e._v(e._s(t.name))])]}),e._v(" "),a("input",{directives:[{name:"model",rawName:"v-model",value:e.type_value,expression:"type_value"}],staticClass:"input-info",attrs:{placeholder:"其他类型肺癌（请填写）"},domProps:{value:e._s(e.type_value)},on:{input:[function(t){t.target.composing||(e.type_value=t.target.value)},function(t){e.inputHander("type")}]}})],2),e._v(" "),a("div",{staticClass:"piece"},[e._v("疾病分期")]),e._v(" "),a("div",{staticClass:"info-card"},[a("div",[e._l(e.pathologic_data.disease_stages,function(t,i){return[a("div",{staticClass:"custom-radio",class:[t.selected?"custom-checkbox-filled":""],on:{click:function(t){e.stageHandler(i)}}},[e._v(e._s(t.name))])]})],2),e._v(" "),a("div",[e._l(e.pathologic_data.disease_stages,function(t,i){return[t.selected?[e._l(t.childs,function(t,s){return[a("div",{staticClass:"custom-radio",class:[t.selected?"custom-checkbox-filled":""],on:{click:function(t){e.childStageHandler(i,s)}}},[e._v(e._s(t.name))])]})]:e._e()]})],2)]),e._v(" "),a("div",{staticClass:"piece"},[e._v("转移病灶（可多选）")]),e._v(" "),a("div",{staticClass:"info-card"},[e._l(e.pathologic_data.metastatic_lesion,function(t,i){return[a("div",{staticClass:"custom-radio",class:[t.selected?"custom-radio-filled":""],on:{click:function(t){e.lesionHandler(i)}}},[e._v(e._s(t.name))])]}),e._v(" "),a("input",{directives:[{name:"model",rawName:"v-model",value:e.lesion_value,expression:"lesion_value"}],staticClass:"input-info",attrs:{placeholder:"其他类型肺癌（请填写）"},domProps:{value:e._s(e.lesion_value)},on:{input:function(t){t.target.composing||(e.lesion_value=t.target.value)}}})],2),e._v(" "),a("div",{staticClass:"piece"},[e._v("基因突变")]),e._v(" "),a("div",{staticClass:"info-card"},[a("div",[e._l(e.pathologic_data.genic_mutations,function(t,i){return[a("div",{staticClass:"custom-radio",class:[t.selected?"custom-radio-filled":""],on:{click:function(t){e.geneHandler(i)}}},[e._v(e._s(t.name))])]})],2),e._v(" "),a("div",[e._l(e.pathologic_data.genic_mutations,function(t,i){return[t.selected?[e._l(t.childs,function(t,s){return[a("div",{staticClass:"custom-radio",class:[t.selected?"custom-checkbox-filled":""],on:{click:function(t){e.geneChildHandler(i,s)}}},[e._v(e._s(t.name))])]})]:e._e()]})],2),e._v(" "),a("input",{directives:[{name:"model",rawName:"v-model",value:e.gene_value,expression:"gene_value"}],staticClass:"input-info",attrs:{placeholder:"其他类型肺癌（请填写）"},domProps:{value:e._s(e.gene_value)},on:{input:[function(t){t.target.composing||(e.gene_value=t.target.value)},function(t){e.inputHander("gene")}]}})]),e._v(" "),a("div",{staticClass:"piece"},[e._v("检测方法")]),e._v(" "),a("div",{staticClass:"info-card"},[e._l(e.pathologic_data.test_method,function(t,i){return[a("div",{staticClass:"custom-radio",class:[t.selected?"custom-radio-filled":""],on:{click:function(t){e.detectionHandler(i)}}},[e._v(e._s(t.name))])]})],2)]),e._v(" "),a("div",{staticClass:"ft-bar-next",on:{click:e.nextHandler}},[e._v("下一步")]),e._v(" "),a("transition",{attrs:{name:"fade"}},[e.toastshow?a("Toast",{attrs:{msg:e.toast_text}}):e._e()],1)],1)},staticRenderFns:[]}}});
//# sourceMappingURL=pathologyinfo.8a4af9390c2c585ac965.js.map
(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-7bca706c"],{2171:function(e,t,a){},"6f08":function(e,t,a){"use strict";var o=a("2171"),n=a.n(o);n.a},"87dc":function(e,t,a){"use strict";a.r(t);var o=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"active-card"},[e.form?a("div",{staticClass:"content"},[a("div",{staticClass:"head"},[a("vue-scroll",[a("p",{staticClass:"tit"},[e._v(e._s(e.$L("我的信息")))]),a("el-form",{staticClass:"info-msg",attrs:{size:"small",model:e.form,"label-width":"60px","label-position":"left"}},[e._l(e.form,(function(t,o){return a("el-form-item",{key:o,attrs:{label:e.formListLang(t.name)}},["radio"===t.type?a("el-select",{model:{value:e.info[o],callback:function(t){e.$set(e.info,o,t)},expression:"info[index]"}},e._l(t.value,(function(t,o){return a("el-option",{key:o,attrs:{label:t,value:t}},[e._v(e._s(t))])})),1):"date"===t.type?a("el-date-picker",{attrs:{"value-format":"yyyy-MM-dd",placeholder:e.$L("请选择生日日期")},model:{value:e.info[o],callback:function(t){e.$set(e.info,o,t)},expression:"info[index]"}}):t.name!==e.$L("手机号")?a("el-input",{attrs:{value:"item.user_value",placeholder:e.$L("请输入")+e.formListLang(t.name)},model:{value:e.info[o],callback:function(t){e.$set(e.info,o,t)},expression:"info[index]"}}):a("el-input",{staticClass:"input",attrs:{type:"text",placeholder:e.$L("请输入您的手机号码")},model:{value:e.info[o],callback:function(t){e.$set(e.info,o,t)},expression:"info[index]"}})],1)})),1==e.authCode?a("el-form-item",{staticClass:"code",attrs:{label:e.$L("验证码")}},[a("el-input",{staticClass:"code",style:{width:"100px"},attrs:{type:"text"},model:{value:e.code,callback:function(t){e.code=t},expression:"code"}}),a("el-button",{staticClass:"get-code",attrs:{type:"primary"},on:{click:e.getCodeFunc}},[e._v("\n                                "+e._s(e.$L("获取验证码")))])],1):e._e(),a("div",{staticClass:"btn-submit"},[a("el-button",{staticClass:"btn",attrs:{type:"primary"},on:{click:e.submitFunc}},[e._v(e._s(e.$L("立即激活")))])],1)],2)],1)],1)]):e._e()])},n=[],i={name:"activeCard",data:function(){return{info:{},code:""}},props:{routerData:{type:Object,default:function(){return{}}}},inject:["reload"],computed:{form:{get:function(){return this.routerData.hasOwnProperty("data")&&this.routerData.data.hasOwnProperty("form")?this.routerData.data.form:{}}},isCreateVip:{get:function(){return this.routerData.hasOwnProperty("data")&&this.routerData.data.hasOwnProperty("isCreateVip")?this.routerData.data.isCreateVip:""}},isHasCard:{get:function(){return this.routerData.hasOwnProperty("data")&&this.routerData.data.hasOwnProperty("isHasCard")?this.routerData.data.isCreateVip:""}},authCode:{get:function(){return this.routerData.hasOwnProperty("data")&&this.routerData.data.hasOwnProperty("code")?this.routerData.data.code:""}}},methods:{submitFunc:function(){var e=this,t=[];for(var a in e.form)t[e.form[a]["fieldname"]]=void 0!=e.info[a]?e.info[a]:"";if(""!==t.user_form_info_flag_mobile&&void 0!=t.user_form_info_flag_mobile){if(""!==t.user_form_info_flag_mobile){var o=/^1[0-9]{10}$/;if(!o.test(t.user_form_info_flag_mobile))return void e.$message.error(e.$L("手机号码不正确"))}if(1!=e.authCode||e.code.trim()){var n={type:"active_user",param:t,code:e.code};e.$api("activeCard",n,(function(t){1===t.flag?(e.$message({type:"success",message:e.$L("成功领取会员卡!")}),e.$router.push({name:"userCardMobile"}),e.loading=!1):-1===t.flag?e.$confirm(e.$L("请重新登录"),e.$L("登录超时"),{confirmButtonText:e.$L("重新登录"),cancelButtonText:e.$L("返回首页"),type:"error",distinguishCancelAndClose:!0}).then((function(){e.$router.push({name:"login",query:{redirect:e.$route.fullPath}})})).catch((function(t){e.backFunc()})):e.$confirm(e.$L(t.msg),e.$L("出错了"),{confirmButtonText:e.$L("点击重试"),cancelButtonText:e.$L("返回首页"),type:"error",distinguishCancelAndClose:!0}).then((function(){e.getData()})).catch((function(t){"cancel"===t?e.$router.push({name:"home"}):(e.loading=!1,e.showError(e.$L("网络请求失败"),e.$L("请刷新页面重试"),"error"))}))}),(function(t){e.$confirm(e.$L("请重新登录"),e.$L("登录超时"),{confirmButtonText:e.$L("重新登录"),cancelButtonText:e.$L("返回首页"),type:"error",distinguishCancelAndClose:!0}).then((function(){e.$router.push({name:"login",query:{redirect:e.$route.fullPath}})})).catch((function(t){e.backFunc()}))}))}else e.$message({type:"info",message:e.$L("请输入验证码!")})}else e.$message({type:"info",message:e.$L("请输入手机号!")})},getCodeFunc:function(){var e=this,t=[];for(var a in e.form)t[e.form[a]["fieldname"]]=e.info[a];if(""!==t.user_form_info_flag_mobile&&void 0!=t.user_form_info_flag_mobile||e.$message({type:"info",message:e.$L("请输入手机号!")}),""!==t.user_form_info_flag_mobile){var o=/^1[0-9]{10}$/;if(!o.test(t.user_form_info_flag_mobile))return void e.$message.error(e.$L("手机号码不正确"))}e.loading=!0;var n={send_mobile:1,mobile:t.user_form_info_flag_mobile};e.$api("sendCode",n,(function(t){if(1===t.flag){e.tableData=t.data;var a=e.tableData.limitTime;e.timer||(e.count=a,e.show=!1,e.timer=setInterval((function(){e.count>0&&e.count<=a?e.count--:(e.show=!0,clearInterval(e.timer),e.timer=null)}),1e3)),console.log("false:",e.show),e.$message({message:e.$L("新手机验证码发送成功咯！"),type:"success"}),e.loading=!1}else-1===t.flag?e.$confirm(e.$L("请重新登录"),e.$L("登录超时"),{confirmButtonText:e.$L("重新登录"),cancelButtonText:e.$L("取消"),type:"error",distinguishCancelAndClose:!0}).then((function(){e.$router.push({name:"login",query:{redirect:e.$route.fullPath}})})).catch((function(t){e.$gotoWebHome(),e.$emit("closeDialog")})):e.$confirm(e.$L(t.msg),e.$L("出错了"),{confirmButtonText:e.$L("点击重试"),cancelButtonText:e.$L("返回首页"),type:"error",distinguishCancelAndClose:!0}).then((function(){e.reload(),e.$emit("closeDialog")})).catch((function(t){"cancel"==t?e.$gotoWebHome():e.reload(),e.$emit("closeDialog")}))}),(function(t){e.$confirm(e.$L(t.msg),e.$L("出错了"),{confirmButtonText:e.$L("点击重试"),cancelButtonText:e.$L("返回首页"),type:"error",distinguishCancelAndClose:!0}).then((function(){e.reload(),e.$emit("closeDialog")})).catch((function(t){e.$gotoWebHome(),e.$emit("closeDialog")}))}))},backFunc:function(){this.$router.push({name:"userCardMobile"})},formListLang:function(e){var t;switch(e){case"姓名":t=this.$L(" 姓名");break;case"性别":t=this.$L("性别");break;case"生日":t=this.$L("生日");break;case"邮箱":t=this.$L("邮箱");break;case"详细地址":t=this.$L("详细地址");break;case"学历":t=this.$L("学历");break;case"行业":t=this.$L("行业");break;case"收入":t=this.$L("收入");break;case"爱好":t=this.$L("爱好");break;case"手机号":t=this.$L("手机号");break;default:t=this.$L("未知");break}return t}}},r=i,s=(a("6f08"),a("4023")),c=Object(s["a"])(r,o,n,!1,null,"4b616655",null);t["default"]=c.exports}}]);
//# sourceMappingURL=chunk-7bca706c.9ff92698.js.map
(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-d7a98b14"],{"1a28":function(e,t,o){"use strict";var n=o("6cd5"),s=o.n(n);s.a},"23c1":function(e,t,o){"use strict";var n=function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("div",{staticClass:"bindPassword"},[o("el-form",{staticClass:"password-form"},[0===e.data.isset?o("div",[o("div",{staticClass:"phone-box"},[o("el-input",{attrs:{size:"medium","show-password":"",placeholder:e.$L("请输入6-20位字母和数字组合新密码")},model:{value:e.oldPassWord,callback:function(t){e.oldPassWord=t},expression:"oldPassWord"}}),o("el-input",{attrs:{size:"medium","show-password":"",placeholder:e.$L("请再次输入新密码")},model:{value:e.newPassWord,callback:function(t){e.newPassWord=t},expression:"newPassWord"}}),o("el-button",{attrs:{type:"primary"},on:{click:function(t){return e.bindFunc(0)}}},[e._v(e._s(e.$L("确认")))])],1)]):1===e.data.isset?o("div",[o("div",{staticClass:"phone-box"},[o("el-input",{attrs:{size:"medium","show-password":"",placeholder:e.$L("请输入原密码")},model:{value:e.oldPassWord,callback:function(t){e.oldPassWord=t},expression:"oldPassWord"}}),o("el-input",{attrs:{size:"medium","show-password":"",placeholder:e.$L("请输入6-20位字母和数字组合新密码")},model:{value:e.newPassWord,callback:function(t){e.newPassWord=t},expression:"newPassWord"}}),1==e.data.phoneSet?o("p",{staticClass:"tips mainFontColor",on:{click:e.forgotOldFunc}},[e._v(" "+e._s(e.$L("忘记旧密码")))]):e._e(),o("el-button",{attrs:{type:"primary"},on:{click:function(t){return e.bindFunc(2)}}},[e._v(e._s(e.$L("确认修改")))])],1)]):e._e()])],1)},s=[],i=function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("div",{staticClass:"bindPassword"},[o("el-form",{staticClass:"password-form"},[o("div",[o("div",{staticClass:"phone-box"},[o("el-input",{attrs:{size:"medium","show-password":"",placeholder:e.$L("请输入6-20位字母和数字组合新密码")},model:{value:e.oldPassWord,callback:function(t){e.oldPassWord=t},expression:"oldPassWord"}}),o("el-input",{attrs:{size:"medium","show-password":"",placeholder:e.$L("请再次输入新密码")},model:{value:e.newPassWord,callback:function(t){e.newPassWord=t},expression:"newPassWord"}})],1),o("div",{staticClass:"phone-box"},[o("el-input",{attrs:{placeholder:e.$L("输入手机号"),disabled:""},model:{value:e.encryptionPhone,callback:function(t){e.encryptionPhone=t},expression:"encryptionPhone"}}),o("el-input",{attrs:{placeholder:e.$L("输入手机验证码")},model:{value:e.mobileCode,callback:function(t){e.mobileCode=t},expression:"mobileCode"}},[o("el-button",{directives:[{name:"show",rawName:"v-show",value:e.show,expression:"show"}],staticClass:"getMess",attrs:{slot:"append"},on:{click:e.getPhoneMessage},slot:"append"},[e._v(e._s(e.$L(" 获取验证码")))]),o("el-button",{directives:[{name:"show",rawName:"v-show",value:!e.show,expression:"!show"}],staticClass:"getMess",attrs:{slot:"append"},slot:"append"},[e._v(e._s(e.count))])],1),o("el-button",{attrs:{type:"primary"},on:{click:function(t){return e.bindFunc(0)}}},[e._v(e._s(e.$L("确认修改")))])],1)])])],1)},a=[],r={name:"bindOldPassword",inject:["reload"],props:{data:{type:Object,default:{}}},data:function(){return{isBind:1,phoneNumber:"",oldPassWord:"",newPassWord:"",mobileCode:"",count:"",show:!0,encryptionPhone:""}},created:function(){this.getData()},methods:{getData:function(){var e=this;e.loading=!0,e.$getApi("forgetPassword",{},(function(t){e.encryptionPhone=t.mobileNum,e.phoneNumber=t.trueMobileNum,e.loading=!1}),(function(t){t&&-2==t.flag?e.$alert(e.$L("尚未设置登录密码！无法解绑！"),e.$L("解绑QQ失败!"),{confirmButtonText:e.$L("确定"),type:"error",showClose:!1}).then((function(){e.loading=!1,e.getData()})):e.$confirm(e.$L("解绑QQ失败!"),e.$L("出错了"),{confirmButtonText:e.$L("点击重试"),cancelButtonText:e.$L("取消"),type:"error",distinguishCancelAndClose:!0}).then((function(){e.untiedQQ()})).catch((function(t){e.loading=!1,e.getData()}))}))},bindFunc:function(e){if(""!==this.mobileCode.trim())if(""!==this.oldPassWord.trim()&&""!==this.newPassWord.trim())if(this.oldPassWord.trim()===this.newPassWord.trim()||0!=e){if(""!==this.oldPassWord.trim()||""!==this.newPassWord.trim()){var t=/^[a-zA-Z0-9]{6,20}$/;if(!t.test(this.newPassWord.trim()))return void this.$message.error(this.$L("抱歉, 请设置6-20位包含字母数字组合的密码"));if(!t.test(this.oldPassWord.trim()))return void this.$message.error(this.$L("抱歉, 请设置6-20位包含字母数字组合的密码"))}var o=this;o.loading=!0;var n={oldPassWord:o.oldPassWord,newPassWord:o.newPassWord,isSetPassword:1,isPhone:1,type:1,mobile:o.phoneNumber,code_type:"sms",code:o.mobileCode};o.$api("setPassWord",n,(function(e){1===e.flag?(o.$message({message:o.$L("密码设置成功！"),type:"success"}),o.$emit("closeDialog"),o.loading=!1,o.reload()):-1===e.flag?o.$confirm(o.$L("请重新登录"),o.$L("登录超时"),{confirmButtonText:o.$L("重新登录"),cancelButtonText:o.$L("取消"),type:"error",distinguishCancelAndClose:!0}).then((function(){o.$router.push({name:"login",query:{redirect:o.$route.fullPath}})})).catch((function(e){o.$gotoWebHome()})):o.$confirm(o.$L(e.msg),o.$L("出错了"),{confirmButtonText:o.$L("点击重试"),cancelButtonText:o.$L("返回首页"),type:"error",distinguishCancelAndClose:!0}).then((function(){o.reload(),o.$emit("closeDialog")})).catch((function(e){o.$gotoWebHome()}))}),(function(e){o.$confirm(o.$L(e.msg),o.$L("出错了"),{confirmButtonText:o.$L("点击重试"),cancelButtonText:o.$L("返回首页"),type:"error",distinguishCancelAndClose:!0}).then((function(){o.reload(),o.$emit("closeDialog")})).catch((function(e){o.$gotoWebHome()}))}))}else this.$message.error(this.$L("密码不一致"));else this.$message.error(this.$L("请输入密码"));else this.$message.error(this.$L("请输入验证码"))},getPhoneMessage:function(){var e=this;e.loading=!0;var t={send_mobile:1};e.$api("sendCodeChange",t,(function(t){if(1===t.flag){e.tableData=t.data;var o=e.tableData.limitTime;e.timer||(e.count=o,e.show=!1,e.timer=setInterval((function(){e.count>0&&e.count<=o?e.count--:(e.show=!0,clearInterval(e.timer),e.timer=null)}),1e3)),e.$message({message:e.$L("手机验证码发送成功咯！"),type:"success"}),e.loading=!1}else-1===t.flag?e.$confirm(e.$L("请重新登录"),e.$L("登录超时"),{confirmButtonText:e.$L("重新登录"),cancelButtonText:e.$L("取消"),type:"error",distinguishCancelAndClose:!0}).then((function(){e.$router.push({name:"login",query:{redirect:e.$route.fullPath}})})).catch((function(t){e.$gotoWebHome(),e.$emit("closeDialog")})):e.$confirm(e.$L(t.msg),e.$L("出错了"),{confirmButtonText:e.$L("点击重试"),cancelButtonText:e.$L("返回首页"),type:"error",distinguishCancelAndClose:!0}).then((function(){e.reload(),e.$emit("closeDialog")})).catch((function(t){"cancel"==t?e.$gotoWebHome():e.reload(),e.$emit("closeDialog")}))}),(function(t){e.$confirm(e.$L(t.msg),e.$L("出错了"),{confirmButtonText:e.$L("点击重试"),cancelButtonText:e.$L("返回首页"),type:"error",distinguishCancelAndClose:!0}).then((function(){e.reload(),e.$emit("closeDialog")})).catch((function(t){e.$gotoWebHome(),e.$emit("closeDialog")}))}))}}},c=r,l=(o("6372"),o("4023")),d=Object(l["a"])(c,i,a,!1,null,"427a831e",null),u=d.exports,m={name:"bindPassword",inject:["reload"],props:{data:{type:Object,default:{}}},components:{bindOldPassword:u},data:function(){return{isBind:1,oldPassWord:"",newPassWord:"",isSetPassword:0}},methods:{bindFunc:function(e){switch(e){case 0:this.isSetPassword=1;break;case 1:break;case 2:break}if(""!==this.oldPassWord.trim()&&""!==this.newPassWord.trim())if(this.oldPassWord.trim()===this.newPassWord.trim()||0!=e){if(""!==this.oldPassWord.trim()||""!==this.newPassWord.trim()){var t=/^[a-zA-Z0-9]{6,20}$/;if(!t.test(this.newPassWord.trim()))return void this.$message.error(this.$L("抱歉, 请设置6-20位包含字母数字组合的密码"));if(!t.test(this.oldPassWord.trim()))return void this.$message.error(this.$L("抱歉, 请设置6-20位包含字母数字组合的密码"))}var o=this;o.loading=!0;var n={oldPassWord:o.oldPassWord,newPassWord:o.newPassWord,isSetPassword:o.isSetPassword};o.$api("setPassWord",n,(function(e){1===e.flag?(o.$message({message:o.$L("密码设置成功！"),type:"success"}),o.$emit("closeDialog"),o.loading=!1,o.reload()):-1===e.flag?o.$confirm(o.$L("请重新登录"),o.$L("登录超时"),{confirmButtonText:o.$L("重新登录"),cancelButtonText:o.$L("取消"),type:"error",distinguishCancelAndClose:!0}).then((function(){o.$router.push({name:"login",query:{redirect:o.$route.fullPath}})})).catch((function(e){o.$gotoWebHome()})):o.$confirm(o.$L(e.msg),o.$L("出错了"),{confirmButtonText:o.$L("点击重试"),cancelButtonText:o.$L("返回"),type:"error",distinguishCancelAndClose:!0}).then((function(){o.bindFunc()})).catch((function(e){}))}),(function(e){o.$confirm(o.$L(e.msg),o.$L("出错了"),{confirmButtonText:o.$L("点击重试"),cancelButtonText:o.$L("返回"),type:"error",distinguishCancelAndClose:!0}).then((function(){o.reload(),o.$emit("closeDialog")})).catch((function(e){}))}))}else this.$message.error(this.$L("密码不一致"));else this.$message.error(this.$L("请输入密码"))},forgotOldFunc:function(){this.$store.commit("setDialogObj",{name:this.$L("设置密码"),view:u,width:"500px",data:{}})}}},f=m,h=(o("1a28"),Object(l["a"])(f,n,s,!1,null,"6c4b8f56",null));t["a"]=h.exports},"4f83":function(e,t,o){"use strict";var n=o("f772"),s=o.n(n);s.a},"503c":function(e,t,o){"use strict";var n=o("a5dd"),s=o.n(n);s.a},6372:function(e,t,o){"use strict";var n=o("b448"),s=o.n(n);s.a},"6cd5":function(e,t,o){},"990d":function(e,t,o){"use strict";var n=function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("div",{directives:[{name:"loading",rawName:"v-loading",value:e.loading,expression:"loading"}],staticClass:"bind-we-chat"},[e.loading?e._e():o("div",[e.url?o("div",{staticClass:"window"},[o("span",{staticClass:"spanFont"},[e._v(" "+e._s(e.isWx?e.$L("长按识别二维码"):e.$L("请使用微信扫描二维码"))+" ")]),o("br"),o("img",{staticClass:"image",attrs:{src:e.url}})]):o("div",{staticClass:"window"},[o("span",{staticClass:"spanFont"},[e._v(e._s(e.errorMsg))])])])])},s=[],i=(o("9e76"),{name:"bindWeChat",data:function(){return{loading:!0,url:null,errorMsg:this.$L("数据加载失败")}},computed:{isWx:{get:function(){var e=navigator.userAgent.toLowerCase();return"micromessenger"==e.match(/MicroMessenger/i)}}},created:function(){this.getUrl()},methods:{getUrl:function(){var e=this;e.loading=!0,e.$getApi("bindWeChat",{localUrl:window.location.href},(function(t){e.url=t.url,e.loading=!1}),(function(t){t&&t.hasOwnProperty("msg")&&(e.errorMsg=t.msg),e.loading=!1}))}}}),a=i,r=(o("503c"),o("4023")),c=Object(r["a"])(a,n,s,!1,null,"74aec47e",null);t["a"]=c.exports},a5dd:function(e,t,o){},b448:function(e,t,o){},cb4d:function(e,t,o){"use strict";var n=function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("div",{directives:[{name:"loading",rawName:"v-loading",value:e.loading,expression:"loading"}],staticClass:"bind-qq"},[e.loading?e._e():o("iframe",{staticClass:"window",attrs:{src:e.url}})])},s=[],i=(o("9e76"),{name:"bindQQ",inject:["reload"],data:function(){return{loading:!0,url:""}},computed:{needOpen:{get:function(){var e=navigator.userAgent.toLowerCase();return e.indexOf(" qq")>-1&&e.indexOf("mqqbrowser")<0||(e.indexOf("mqqbrowser")>-1&&e.indexOf(" qq")<0||"micromessenger"==e.match(/MicroMessenger/i))}}},created:function(){this.getUrl()},methods:{getUrl:function(){var e=this;e.loading=!0,e.$api("bindQQ",{domain:e.$getLocationUrl(),localUrl:window.location.href},(function(t){1===t.flag?e.needOpen?window.top.location.href=t.data.url:(e.url=t.data.url,e.loading=!1):-1===t.flag?e.$confirm(e.$L("请重新登录"),e.$L("登录超时"),{confirmButtonText:e.$L("重新登录"),cancelButtonText:e.$L("返回首页"),type:"error",distinguishCancelAndClose:!0}).then((function(){e.$router.push({name:"login",query:{redirect:e.$route.fullPath}})})).catch((function(t){e.$gotoWebHome()})):e.$confirm(e.$L(t.msg),e.$L("出错了"),{confirmButtonText:e.$L("点击重试"),cancelButtonText:e.$L("返回首页"),type:"error",distinguishCancelAndClose:!0}).then((function(){e.reload(),e.$emit("closeDialog")})).catch((function(t){"cancel"==t&&e.$gotoWebHome(),e.$emit("closeDialog")}))}),(function(t){e.$confirm(e.$L("数据加载失败"),e.$L("出错了"),{confirmButtonText:e.$L("点击重试"),cancelButtonText:e.$L("返回首页"),type:"error",distinguishCancelAndClose:!0}).then((function(){e.reload(),e.$emit("closeDialog")})).catch((function(t){e.$gotoWebHome(),e.$emit("closeDialog")}))}))}}}),a=i,r=(o("4f83"),o("4023")),c=Object(r["a"])(a,n,s,!1,null,"359ad082",null);t["a"]=c.exports},f772:function(e,t,o){}}]);
//# sourceMappingURL=chunk-d7a98b14.90e519fc.js.map
(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-c565a158"],{"339f":function(t,a,o){},e189:function(t,a,o){"use strict";o.r(a);var e=function(){var t=this,a=t.$createElement,o=t._self._c||a;return o("div",{directives:[{name:"loading",rawName:"v-loading",value:t.loading,expression:"loading"}],staticClass:"store"},[o("vue-scroll",[o("div",{staticClass:"store-settings"},[o("el-form",{ref:"form",staticClass:"form",attrs:{model:t.applyForm,rules:t.rules,size:"small"}},[o("el-form-item",[o("span",{staticClass:"title float-l"},[t._v(t._s(t.$L("店铺地址"))+":")]),o("a",{staticClass:"link float-l mainFontColor",attrs:{href:t.applyForm.shareLink,target:"_blank"}},[t._v("\n                        "+t._s(t.applyForm.shareLink)+"\n                    ")]),o("span",{staticClass:"state mainFontColor float-l",on:{click:t.storeCodeFunc}})]),o("el-form-item",[o("span",{staticClass:"title"},[t._v(t._s(t.$L("使用独立域名"))+":")]),o("el-input",{attrs:{placeholder:t.$L("类似 www.test.com 的域名")},model:{value:t.applyForm.shopDomain,callback:function(a){t.$set(t.applyForm,"shopDomain",a)},expression:"applyForm.shopDomain"}}),o("p",{staticClass:"domain-tips"},[t._v("\n                        *"+t._s(t.$L("更换店铺域名后，请将CNAME地址解析到"))+"，\n                        "),o("a",{attrs:{href:t.applyForm.bindDomain,target:"_blank"}},[o("span",{staticClass:"mainFontColor"},[t._v("\n                            "+t._s(t.applyForm.bindDomain)+"\n                        ")])]),t._v("\n                        "+t._s(t.$L("等待2个小时后即可访问您的店铺"))+"！\n                    ")])],1),o("el-form-item",[o("span",{staticClass:"title"},[t._v(t._s(t.$L("店铺LOGO"))+":")]),o("div",{staticClass:"logo-img"},[o("label",{staticClass:"img-box"},[o("img",{staticClass:"img",attrs:{src:t.applyForm.shopImg}}),o("input",{attrs:{id:"fileinp",type:"file",name:"CommentsPic",placeholder:t.$L("上传图片"),multiple:"",accept:"image/png,image/jpeg,image/jpg"},on:{change:t.upImgFunc}})]),o("p",{staticClass:"tips"},[o("span",[t._v(t._s(t.$L("建议尺寸：200 x 200 像素小于120KB，支持jpg、gif、png格式")))])])])]),o("el-form-item",[o("span",{staticClass:"title"},[t._v(t._s(t.$L("店铺名称"))+":")]),o("el-input",{model:{value:t.applyForm.shopName,callback:function(a){t.$set(t.applyForm,"shopName",a)},expression:"applyForm.shopName"}})],1)],1)],1),o("div",{staticClass:"bottom-btns"},[o("el-button",{staticClass:"btn",attrs:{type:"primary"},on:{click:t.saveSettingFunc}},[t._v(t._s(t.$L("保存")))])],1),o("el-dialog",{staticClass:"crash-dialog",attrs:{visible:t.storeCode,width:"80%",modal:!0,"modal-append-to-body":!1,"append-to-body":""},on:{"update:visible":function(a){t.storeCode=a}}},[o("div",{staticClass:"dialog-header",staticStyle:{display:"none"},attrs:{slot:"title"},slot:"title"}),o("div",{staticClass:"dialog-item"},[o("img",{staticClass:"img",attrs:{src:t.qrcodeLink}}),o("p",{staticClass:"title"},[t._v(t._s(t.$L("店铺二维码")))])]),o("div",{staticClass:"dialog-footer",staticStyle:{display:"none"},attrs:{slot:"footer"},slot:"footer"})])],1)],1)},n=[],i={name:"storeSettings",data:function(){return{loading:!0,errorType:"error",errorTitle:this.$L("出错了"),errorTips:null,errorShow:!1,applyForm:{shopName:"",shopImg:"",shopDomain:"",shareLink:"",bindDomain:""},rules:{shopName:[{required:!0}]},storeCode:!1,qrcodeLink:"",uploadImg:[]}},inject:["reload"],created:function(){this.getData()},methods:{showError:function(t,a,o){this.errorType="warning"===o?"warning":"error",this.errorTitle=t&&""!==t?t:this.$L("出错了"),this.errorTips=a&&""!==a?a:null,this.loading=!1,this.errorShow=!0},getData:function(){var t=this;t.loading=!0,t.$api("distributionshopSetting",{isMobile:0},(function(a){1===a.flag?(t.applyForm.shopName=a.data.shopName,t.applyForm.shopImg=a.data.shopImg,t.applyForm.shopDomain=a.data.shopDomain,t.applyForm.shareLink=a.data.shareLink,t.qrcodeLink=a.data.qrcodeLink,t.applyForm.bindDomain=a.data.bindDomain,t.loading=!1):-1===a.flag?t.$confirm(t.$L("请重新登录"),t.$L("登录超时"),{confirmButtonText:t.$L("重新登录"),cancelButtonText:t.$L("取消"),type:"error",distinguishCancelAndClose:!0}).then((function(){t.$router.push({name:"login",query:{redirect:t.$route.fullPath}})})).catch((function(a){t.$gotoWebHome()})):t.$confirm(t.$L("数据加载失败"),t.$L("出错了"),{confirmButtonText:t.$L("点击重试"),cancelButtonText:t.$L("返回首页"),type:"error",distinguishCancelAndClose:!0}).then((function(){t.getData()})).catch((function(a){t.$router.push({name:"distributorMain"})}))}),(function(a){t.$confirm(t.$L("网络请求失败"),t.$L("出错了"),{confirmButtonText:t.$L("点击重试"),cancelButtonText:t.$L("返回首页"),type:"error",distinguishCancelAndClose:!0}).then((function(){t.getData()})).catch((function(a){t.$router.push({name:"distributorMain"})}))}))},upImgFunc:function(t){var a=this,o=t.target.files[0],e=Math.floor(o.size/1024),n=o.type.substring(6);if(e>2097152)return a.$Message.info("请选择2M以内的图片！"),!1;if("png"!==n&&"jpeg"!==n&&"jpg"!==n)return a.$Message.info("请选择png、jpeg、jpg的图片格式！"),!1;a.uploadImg={file:o};var i=new FileReader;i.readAsDataURL(o),i.onload=function(t){a.applyForm.shopImg=t.target.result}},saveSettingFunc:function(){var t=this;if(t.loading=!0,""==t.applyForm.shopName)return t.$message({message:t.$L("店铺名称不能为空!"),type:"error"}),void(t.loading=!1);t.applyForm.img=t.uploadImg;var a={shopName:t.applyForm.shopName,shopDomain:t.applyForm.shopDomain,BindLogo:t.applyForm.img},o=t.$objToFormData(a);t.$api("distributionShopSettingBtn",o,(function(a){1===a.flag?(t.$message({type:"success",message:t.$L("保存成功!")}),t.getData(),t.loading=!1):0===a.flag?(t.$message({type:"info",message:a.msg}),t.loading=!1):-1===a.flag?t.$confirm(t.$L("请重新登录"),t.$L("登录超时"),{confirmButtonText:t.$L("重新登录"),cancelButtonText:t.$L("取消"),type:"error",distinguishCancelAndClose:!0}).then((function(){t.$router.push({name:"login",query:{redirect:t.$route.fullPath}})})).catch((function(t){})):t.$confirm(t.$L(a.msg),t.$L("出错了"),{confirmButtonText:t.$L("点击重试"),cancelButtonText:t.$L("返回首页"),type:"error",distinguishCancelAndClose:!0}).then((function(){t.getData()})).catch((function(a){"cancel"==a?t.$gotoWebHome():t.getData()}))}),(function(a){t.$confirm(t.$L("网络请求失败"),t.$L("出错了"),{confirmButtonText:t.$L("点击重试"),cancelButtonText:t.$L("返回首页"),type:"error",distinguishCancelAndClose:!0}).then((function(){t.getData()})).catch((function(a){t.$router.push({name:"distributorUserOrder"})}))}),!0)},storeCodeFunc:function(){this.storeCode=!0}}},s=i,r=(o("f759"),o("4023")),l=Object(r["a"])(s,e,n,!1,null,"650fc0db",null);a["default"]=l.exports},f759:function(t,a,o){"use strict";var e=o("339f"),n=o.n(e);n.a}}]);
//# sourceMappingURL=chunk-c565a158.b47943a4.js.map
(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-70021264"],{6834:function(t,e,s){},"80e8":function(t,e,s){"use strict";var a=s("6834"),r=s.n(a);r.a},b817:function(t,e,s){"use strict";s.r(e);var a=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{directives:[{name:"loading",rawName:"v-loading",value:t.loading,expression:"loading"}],staticClass:"service"},[t.orderList?s("div",{staticClass:"service-content"},[s("div",{staticClass:"box"},t._l(t.orderList.getProductInfo,(function(e,a){return s("div",{key:a,staticClass:"info"},[s("img",{staticClass:"img",attrs:{src:e.smallImg,alt:""}}),s("div",{staticClass:"text"},[s("p",{staticClass:"orderInfo"},[t._v(t._s(e.chrName))]),s("p",{staticClass:"gray"},[t._v(t._s(e.goodsSpec))]),s("p",{staticClass:"gray"},[t._v("×"+t._s(e.goodsNumber))])])])})),0),s("div",{staticClass:"box"},[s("span",{staticClass:"black"},[t._v(t._s(t.$L("可退金额"))+"：")]),s("span",{staticClass:"red"},[t._v(t._s(t.orderList.actualPrice))])]),s("div",{staticClass:"box gray"},[t._v("\n                "+t._s(t.$L("*该产品仅退回产品金额，已使用的积分,优惠券和快递费用将不予退还"))+"\n            ")]),s("div",{staticClass:"reason"},[s("p",{staticClass:"title"},[t._v(t._s(t.$L("退货/退款原因")))]),s("el-input",{staticClass:"remarks",attrs:{maxlength:"500",rows:7,type:"textarea",resize:"none",placeholder:t.$L("请输入原因")},model:{value:t.remarks,callback:function(e){t.remarks=e},expression:"remarks"}}),s("div",{staticClass:"up-load-pic"},[s("ul",{staticClass:"img-list"},[t._l(t.showImgArr,(function(e,a){return s("li",{key:a,staticClass:"load-img"},[s("div",{staticClass:"upload-list-cover"},[s("span",{staticClass:"bbx-font bbx-icon-shanchu",on:{click:function(e){return t.handleRemove(a)}}})]),s("img",{staticClass:"img",attrs:{src:e}})])})),t.showImgArr.length<t.maxNum?s("li",{staticClass:"load-img up-load-img"},[s("span",{staticClass:"bbx-font bbx-icon-jiahao"}),s("input",{staticClass:"upload",attrs:{type:"file",name:"CommentsPic",multiple:"",accept:"image/png,image/jpeg,image/jpg"},on:{change:t.upImgFunc}})]):t._e()],2)]),s("p",{staticClass:"size gray"},[t._v("*"+t._s(t.$L("图片大于2M将无法上传")))]),s("el-button",{attrs:{type:"primary"},on:{click:t.submitFunc}},[t._v(t._s(t.$L("申请退款")))])],1)]):t._e()])},r=[],n=(s("163d"),s("4f54")),i={name:"orderService",data:function(){return{loading:!0,errorType:"error",errorTitle:this.$L("出错了"),errorTips:null,errorShow:!1,remarks:"",showImgArr:[],maxNum:4,uploadList:[],uploadImgArr:[],orderList:{},imgList:[],uploadLen:0}},created:function(){this.getData()},methods:{showError:function(t,e,s){this.errorType="warning"===s?"warning":"error",this.errorTitle=t&&""!==t?t:this.$L("出错了"),this.errorTips=e&&""!==e?e:null,this.loading=!1,this.errorShow=!0},backFunc:function(){this.$router.back(-1)},getData:function(){var t=this;t.loading=!0;var e=t.$route.params.id;t.$api("applyRefund",{orderId:e},(function(e){1===e.flag?(t.orderList=e.data,t.loading=!1):-1===e.flag?t.$confirm(t.$L("请重新登录"),t.$L("登录超时"),{confirmButtonText:t.$L("重新登录"),cancelButtonText:t.$L("取消"),type:"error",distinguishCancelAndClose:!0}).then((function(){t.$router.push({name:"login",query:{redirect:t.$route.fullPath}})})).catch((function(e){t.$gotoWebHome()})):t.$confirm(t.$L("数据加载失败"),t.$L("出错了"),{confirmButtonText:t.$L("点击重试"),cancelButtonText:t.$L("返回首页"),type:"error",distinguishCancelAndClose:!0}).then((function(){t.getData()})).catch((function(e){t.$router.push({name:"orderList",params:{type:"all"}})}))}),(function(e){t.$confirm(t.$L("网络请求失败"),t.$L("出错了"),{confirmButtonText:t.$L("点击重试"),cancelButtonText:t.$L("返回首页"),type:"error",distinguishCancelAndClose:!0}).then((function(){t.getData()})).catch((function(e){t.$router.push({name:"orderList",params:{type:"all"}})}))}))},submitFunc:function(){var t=this;if(t.loading=!0,""!==t.remarks){var e=t.orderList.orderId;t.imgList[e]={fileList:t.uploadList};var s={orderId:e,refundResult:t.remarks,choose_img:{fileList:t.imgList}},a=t.$objToFormData(s);t.$api("addApplyRefund",a,(function(s){1===s.flag?(t.getData(),t.$message({type:"success",message:t.$L("提交成功!")}),t.$router.push({name:"orderServiceInfo",parmars:{orderId:e}}),t.loading=!1):-1===s.flag?t.$confirm(t.$L("请重新登录"),t.$L("登录超时"),{confirmButtonText:t.$L("重新登录"),cancelButtonText:t.$L("取消"),type:"error",distinguishCancelAndClose:!0}).then((function(){t.$router.push({name:"login",query:{redirect:t.$route.fullPath}})})).catch((function(e){t.$gotoWebHome()})):t.$confirm(t.$L("数据加载失败"),t.$L("出错了"),{confirmButtonText:t.$L("点击重试"),cancelButtonText:t.$L("返回首页"),type:"error",distinguishCancelAndClose:!0}).then((function(){t.getData()})).catch((function(e){t.$router.push({name:"orderList",params:{type:"all"}})}))}),(function(e){t.$confirm(t.$L("网络请求失败"),t.$L("出错了"),{confirmButtonText:t.$L("点击重试"),cancelButtonText:t.$L("返回首页"),type:"error",distinguishCancelAndClose:!0}).then((function(){t.getData()})).catch((function(e){t.$router.push({name:"orderList",params:{type:"all"}})}))}),!0)}else t.$message({type:"error",message:t.$L("请填写退款申请原因!")}),t.loading=!1},upImgFunc:function(t){var e=this,s=t.target.files,a=e.uploadLen,r=s.length+a;if(r<e.maxNum&&e.$message({showClose:!0,message:"最多可上传"+e.maxNum+"张，您还可以上传"+(e.maxNum-r)+"张",type:"success"}),s.length<=e.maxNum)for(var i=function(t){var a=null,r=Math.floor(s[t].size/1024),n=s[t].type.substring(6);if(r>2097152)return e.$Message({showClose:!0,message:"请选择2M以内的图片！",type:"warning"}),{v:!1};if("png"!==n&&"jpeg"!==n&&"jpg"!==n)return e.$Message({showClose:!0,message:"请选择png、jpeg、jpg的图片格式！",type:"warning"}),{v:!1};e.uploadList.push({file:s[t]}),e.uploadLen++;var i=new FileReader;i.readAsDataURL(s[t]),Number(e.showImgArr.length+s.length)<=e.maxNum?i.onload=function(t){a=t.target.result,e.showImgArr.push(a)}:e.showImgArr.length<=e.maxNum&&e.$message({showClose:!0,message:"最多可上传"+e.maxNum+"张",type:"success"})},o=0;o<s.length;o++){var c=i(o);if("object"===Object(n["a"])(c))return c.v}else e.$message({showClose:!0,message:"最多可上传"+e.maxNum+"张!",type:"success"})},handleRemove:function(t){this.uploadList.splice(t,1),this.showImgArr.splice(t,1),this.uploadLen=this.showImgArr.length}}},o=i,c=(s("ec95"),s("80e8"),s("4023")),l=Object(c["a"])(o,a,r,!1,null,"256a3545",null);e["default"]=l.exports},ec95:function(t,e,s){"use strict";var a=s("fa1f"),r=s.n(a);r.a},fa1f:function(t,e,s){}}]);
//# sourceMappingURL=chunk-70021264.68f54a04.js.map
(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-1ebf6dc3"],{"29a9":function(t,s,a){"use strict";a.r(s);var e=function(){var t=this,s=t.$createElement,a=t._self._c||s;return t.listData?a("div",{directives:[{name:"loading",rawName:"v-loading",value:t.loading,expression:"loading"}],staticClass:"reservation-info"},[a("div",{staticClass:"content-top"},[a("p",{staticClass:"order-sn"},[t._v(t._s(t.$L("订单编号"))+"："+t._s(t.listData.orderSn))]),"预约已取消"==t.listData.statusDetail?a("div",{staticClass:"order-sn"},[t._v(t._s(t.$L("订单状态"))+":："+t._s(t.listData.statusDetail))]):t.prepaidFunc(t.listData.moneyPaid)?a("el-steps",{staticClass:"steps",attrs:{active:t.stepStatus,"finish-status":"success"}},[a("el-step",{attrs:{title:t.$L("提交订单"),description:t.listData.addTime}}),a("el-step",{attrs:{title:t.$L("支付预定金")}}),a("el-step",{attrs:{title:t.$L("到店服务")}}),a("el-step",{attrs:{title:t.$L("评价")}})],1):a("el-steps",{staticClass:"steps",attrs:{active:t.stepStatus,"finish-status":"success"}},[a("el-step",{attrs:{title:t.$L("提交订单"),description:t.listData.addTime}}),a("el-step",{attrs:{title:t.$L("到店服务")}}),a("el-step",{attrs:{title:t.$L("评价")}})],1)],1),a("div",{staticClass:"order-details"},[a("p",{staticClass:"title"},[t._v(t._s(t.$L("订单信息")))]),a("ul",{staticClass:"order-ul"},t._l(t.listData.fromDetail,(function(s){return a("li",{staticClass:"order-li"},[a("span",[t._v(t._s(s))])])})),0)]),a("div",{staticClass:"prod-info"},[a("el-table",{staticClass:"table",staticStyle:{width:"100%"},attrs:{data:t.listData.goodsArr,"header-cell-style":{background:"#f0f1f5",padding:"10px",color:"#666"}}},[a("el-table-column",{attrs:{label:t.$L("产品信息"),align:"left","min-width":"200"},scopedSlots:t._u([{key:"default",fn:function(s){return a("div",{staticClass:"info"},[a("div",{staticClass:"list-main-left"},[a("img",{staticClass:"img",attrs:{src:s.row.pic,alt:""}})]),a("div",{staticClass:"list-main-right"},[a("p",{staticClass:"name"},[t._v(t._s(s.row.goodsName))]),a("p",{staticClass:"name",domProps:{innerHTML:t._s(s.row.goodsSpec)}})])])}}],null,!1,2037013286)}),a("el-table-column",{attrs:{label:t.$L("价格"),align:"center"},scopedSlots:t._u([{key:"default",fn:function(s){return a("div",{},[t._v("\n                    "+t._s(s.row.goodsPrice)+"\n                ")])}}],null,!1,1216661312)}),a("el-table-column",{attrs:{label:t.$L("类型"),align:"center"},scopedSlots:t._u([{key:"default",fn:function(s){return a("div",{},[t._v("\n                    "+t._s(s.row.type)),a("br")])}}],null,!1,932792253)}),a("el-table-column",{attrs:{label:t.$L("状态"),align:"center"},scopedSlots:t._u([{key:"default",fn:function(s){return a("div",{staticClass:"status"},[1===t.listData.order_status?a("div",{staticClass:"font font-red"},[t._v(t._s(t.$L("待处理")))]):2===t.listData.order_status?a("div",{staticClass:"font"},[t._v(t._s(t.$L("已消费")))]):3===t.listData.order_status?a("div",{staticClass:"font"},[t._v(t._s(t.$L("已取消预约")))]):4===t.listData.order_status&&0===t.listData.commentStatus?a("div",{staticClass:"font"},[t._v(t._s(t.$L("待评价")))]):4===t.listData.order_status&&1===t.listData.commentStatus?a("div",{staticClass:"font"},[t._v(t._s(t.$L("已评价")))]):5===t.listData.order_status?a("div",{staticClass:"font"},[t._v(t._s(t.$L("已逾期")))]):a("div",{staticClass:"font"},[t._v(t._s(t.$L("未知状态")))])])}}],null,!1,2827355914)})],1)],1),a("div",{staticClass:"prod-bottom"},[a("div",{staticClass:"right-box"},[a("ul",{staticClass:"ul"},[a("li",{staticClass:"li"},[a("span",[t._v(t._s(t.$L("订单总额"))+":")]),a("span",[t._v(t._s(t.listData.orderAmount))])]),a("li",{staticClass:"li"},[a("span",[t._v(t._s(t.$L("店铺优惠"))+":")]),a("span",[t._v(t._s(t.listData.discount))])]),a("li",{staticClass:"li"},[a("span",[t._v(t._s(t.$L("到店支付"))+":")]),a("span",[t._v(t._s(t.listData.prepaidAmount))])]),a("li",{staticClass:"li"},[a("span",{staticClass:"font-black"},[t._v(t._s(t.$L("预付金额"))+":")]),a("span",{staticClass:"font-red"},[t._v(t._s(t.listData.moneyPaid))])])])])]),a("div",{staticClass:"bottom-btns"},[a("el-button",{on:{click:t.backFunc}},[t._v(t._s(t.$L("返回")))]),1===t.listData.order_status&&0===t.listData.payStatus?a("el-button",{attrs:{type:"primary"},on:{click:function(s){return t.changeOrderType(t.listData,"pay")}}},[t._v(t._s(t.$L("立即支付")))]):t._e(),1===t.listData.order_status?a("el-button",{attrs:{type:"default"},on:{click:function(s){return t.changeOrderType(t.listData,"cancel")}}},[t._v(t._s(t.$L("取消预约")))]):t.listData.order_status>=3?a("el-button",{attrs:{type:"default"},on:{click:function(s){return t.changeOrderType(t.listData,"del")}}},[t._v(t._s(t.$L("删除订单")))]):t._e(),t.listData.order_status>=3&&0===t.listData.commentStatus?a("el-button",{attrs:{type:"primary"},on:{click:function(s){return t.changeOrderType(t.listData,"evaluate")}}},[t._v(t._s(t.$L("去评价")))]):t._e(),t.listData.order_status>=3&&1===t.listData.commentStatus?a("el-button",{attrs:{type:"primary"},on:{click:function(s){return t.changeOrderType(t.listData,"evaluateInfo")}}},[t._v(t._s(t.$L("查看评价")))]):t._e()],1)]):t._e()},i=[],n=(a("f548"),{name:"reservationInfo",data:function(){return{loading:!0,errorType:"error",errorTitle:this.$L("出错了"),errorTips:null,errorShow:!1,listData:{},stepStatus:1}},created:function(){this.getData()},methods:{showError:function(t,s,a){this.errorType="warning"===a?"warning":"error",this.errorTitle=t&&""!==t?t:this.$L("出错了"),this.errorTips=s&&""!==s?s:null,this.loading=!1,this.errorShow=!0},getData:function(){if(""!==this.$route.params.id){var t=this;t.loading=!0;var s=t.$route.params.id;t.$api("bookOrderInfo",{bookId:s},(function(s){1===s.flag?(t.listData=s.data,t.stepFunc(t.listData.statusDetail,t.prepaidFunc(t.listData.moneyPaid)),t.loading=!1):-1===s.flag?t.$confirm(t.$L("请重新登录"),t.$L("登录超时"),{confirmButtonText:t.$L("重新登录"),cancelButtonText:t.$L("取消"),type:"error",distinguishCancelAndClose:!0}).then((function(){t.$router.push({name:"login",query:{redirect:t.$route.fullPath}})})).catch((function(s){t.$gotoWebHome()})):t.$confirm(t.$L("数据加载失败"),t.$L("出错了"),{confirmButtonText:t.$L("点击重试"),cancelButtonText:t.$L("返回首页"),type:"error",distinguishCancelAndClose:!0}).then((function(){t.getData()})).catch((function(s){t.$router.push({name:"reservation",params:{type:"all"}})}))}),(function(s){t.$confirm(t.$L("网络请求失败"),t.$L("出错了"),{confirmButtonText:t.$L("点击重试"),cancelButtonText:t.$L("返回首页"),type:"error",distinguishCancelAndClose:!0}).then((function(){t.getData()})).catch((function(s){t.$router.push({name:"reservation",params:{type:"all"}})}))}))}},statusFunc:function(t){var s;switch(t){case 0:s={text:this.$L("待付款"),color:"font-red"};break;default:s={text:this.$L("已付款"),color:"font-green"};break}return s},changeOrderType:function(t,s){var a=this;switch(s){case"pay":0!==t.order_status&&1!==t.pay_status||this.$store.commit("setDialogObj",{name:this.$L("订单支付"),view:orderPay,width:"900px",loading:!0});break;case"cancel":1===t.order_status&&this.$confirm(this.$L("确认取消订单吗？"),this.$L("取消订单"),{confirmButtonText:this.$L("立即取消"),cancelButtonText:this.$L("我再想想"),type:"warning",distinguishCancelAndClose:!0}).then((function(){a.showLoad(!0),a.$api("cancleReservation",{orderId:t.orderId},(function(t){a.showLoad(!1),t&&1===t.flag?(a.$message.success(a.$L("操作成功！")),a.getData()):(console.log(t),a.$message.error(a.$L("操作失败！请稍后重试！")))}),(function(t){console.log(t),a.$message.error(a.$L("操作失败！请稍后重试！")),a.showLoad(!1)}))})).catch((function(t){}));break;case"del":t.order_status>=3&&this.$confirm(this.$L("是否确认删除订单？"),this.$L("删除订单"),{confirmButtonText:this.$L("立即删除"),cancelButtonText:this.$L("我再想想"),type:"warning",distinguishCancelAndClose:!0}).then((function(){a.showLoad(!0),a.$api("delReservation",{orderId:t.orderId},(function(t){a.showLoad(!1),t&&1===t.flag?(a.$message.success(a.$L("操作成功！")),a.getData()):(console.log(t),a.$message.error(a.$L("操作失败！请稍后重试！")))}),(function(t){console.log(t),a.$message.error(a.$L("操作失败！请稍后重试！")),a.showLoad(!1)}))})).catch((function(t){}));break;case"evaluate":t.order_status>=3&&0===t.commentStatus&&this.$router.push({name:"resOrderComment",params:{id:t.orderId}});break;case"evaluateInfo":t.order_status>=3&&1===t.commentStatus&&this.$router.push({name:"resCheckComment",params:{id:t.orderId}});break}},showLoad:function(t){"undefined"===typeof t||t?this.loading=this.$loading({lock:!0}):this.loading&&(this.loading.close(),this.loading=null)},backFunc:function(){this.$router.back(-1)},prepaidFunc:function(t){var s=parseInt(String(t).replace(/￥|$/,""));return s>0?s:""},stepFunc:function(t,s){switch(t){case"预约待处理":this.stepStatus=1;break;case"预约已消费":this.stepStatus=s>0?3:2;break;case"预约已完成":this.stepStatus=4;break}}}}),r=n,o=(a("59f9"),a("4023")),l=Object(o["a"])(r,e,i,!1,null,"49c1936e",null);s["default"]=l.exports},"59f9":function(t,s,a){"use strict";var e=a("efd3"),i=a.n(e);i.a},efd3:function(t,s,a){}}]);
//# sourceMappingURL=chunk-1ebf6dc3.d48e7f08.js.map
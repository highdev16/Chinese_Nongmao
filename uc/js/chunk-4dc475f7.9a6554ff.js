(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-4dc475f7"],{"150a":function(t,a,s){},"1e51":function(t,a,s){"use strict";var e=function(){var t=this,a=t.$createElement,s=t._self._c||a;return t.tabList&&t.tabList.hasOwnProperty("list")&&t.tabList.list.length>0?s("div",{staticClass:"rank-tab"},[s("el-button-group",{staticClass:"btn-group"},t._l(t.tabList.list,(function(a,e){return s("el-button",{key:e,staticClass:"btn-item",attrs:{type:t.tabList.type==a.type?"primary":"default",size:"small"},on:{click:function(t){"function"===typeof a.func&&a.func()}}},[t._v(t._s(a.text))])})),1)],1):t._e()},i=[],n={name:"rankTab",props:{tabList:{type:Object,default:function(){return{}}}}},r=n,o=(s("7929"),s("4023")),l=Object(o["a"])(r,e,i,!1,null,null,null);a["a"]=l.exports},4953:function(t,a,s){"use strict";s.r(a);var e=function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("div",{staticClass:"withdrawal",class:{showSearch:t.showSearch}},[s("div",{staticClass:"search-box"},[s("el-input",{staticClass:"input-with-select",attrs:{placeholder:t.$L("输入订单编号"),size:"small",clearable:""},on:{change:t.searchFunc},nativeOn:{keyup:function(a){return!a.type.indexOf("key")&&t._k(a.keyCode,"enter",13,a.key,"Enter")?null:a.target.blur(a)}},model:{value:t.inputValue,callback:function(a){t.inputValue=a},expression:"inputValue"}},[s("el-button",{attrs:{slot:"append",icon:"el-icon-search"},slot:"append"})],1),s("div",{staticClass:"search-close",on:{click:function(a){return t.doSearch(!1)}}},[s("i",{staticClass:"el-icon-close"})])],1),s("vue-scroll",[s("div",{staticClass:"main-table"},[t.tableData?s("div",{staticClass:"withdrawal-head"},[s("div",{staticClass:"top"},[s("p",{staticClass:"p",staticStyle:{"font-weight":"700"}},[t._v(t._s(t.$L("分销商用户"))+"："+t._s(t.tableData.username?t.tableData.username:"-"))]),s("p",{staticClass:"p"},[t._v(t._s(t.$L("姓名"))+"："+t._s(t.tableData.contact?t.tableData.contact:"-"))]),s("p",{staticClass:"p"},[t._v(t._s(t.$L("手机"))+"："+t._s(t.tableData.mobile?t.tableData.mobile:"-"))]),s("p",{staticClass:"p"},[t._v(t._s(t.$L("分销商等级"))+"："+t._s(t.tableData.grade?t.tableData.grade:"-"))]),s("p",{staticClass:"p",staticStyle:{width:"100%"}},[t._v(t._s(t.$L("成为分销商时间"))+"："+t._s(t.tableData.createTime?t.tableData.createTime:"-"))])]),s("div",{staticClass:"main-box"},[s("div",{staticClass:"main-item"},[s("i",{staticClass:"bbx-font mainFontColor bbx-icon-weibiaoti--5"}),s("div",{staticClass:"info"},[s("p",{staticClass:"p"},[t._v(t._s(t.$L("分销订单总额")))]),s("p",{staticClass:"font-large"},[t._v(t._s(t.tableData.totalAmount))])])]),s("div",{staticClass:"main-item"},[s("i",{staticClass:"bbx-font mainFontColor bbx-icon-weibiaoti--6"}),s("div",{staticClass:"info"},[s("p",{staticClass:"p"},[t._v(t._s(t.$L("佣金提成总额")))]),s("p",{staticClass:"font-large"},[t._v(t._s(t.tableData.fullCommission))])])]),s("div",{staticClass:"main-item"},[s("i",{staticClass:"bbx-font mainFontColor bbx-icon-wodefenxiao"}),s("div",{staticClass:"info"},[s("p",{staticClass:"p"},[t._v(t._s(t.$L("下级分销商数")))]),s("p",{staticClass:"font-large"},[t._v(t._s(t.tableData.subordinateCount))])])]),s("div",{staticClass:"main-item"},[s("i",{staticClass:"bbx-font mainFontColor bbx-icon-fenxiaozhongxin"}),s("div",{staticClass:"info"},[s("p",{staticClass:"p"},[t._v(t._s(t.$L("子会员数")))]),s("p",{staticClass:"font-large"},[t._v(t._s(t.tableData.memberCount))])])])])]):t._e(),s("div",{staticClass:"list"},[s("rank-tab",{attrs:{"tab-list":t.theadName}}),t.tableData.orderList&&t.tableData.orderList.length>0?s("div",[t._l(t.tableData.orderList,(function(a){return s("div",{staticClass:"table-box"},[s("div",{staticClass:"box"},[s("div",{staticClass:"top"},[s("span",[t._v(t._s(t.$L("订单编号"))+":"+t._s(a.orderSn))]),s("span",{class:t.statusFunc(a.pendingStatus).color,staticStyle:{float:"right"}},[t._v(t._s(t.statusFunc(a.pendingStatus).text))])]),t._l(a.productList,(function(a,e){return s("div",{staticClass:"item"},[s("div",{staticClass:"l-box"},[s("img",{staticClass:"img",attrs:{src:a.img}}),s("div",{staticClass:"msg"},[s("p",{staticClass:"tit mainFontColor"},[t._v(t._s(a.prodName))])])]),s("div",{staticClass:"r-box"},[s("p",[t._v(t._s(a.goodsPrice))]),s("p",[t._v("x"+t._s(a.goodsNum))])])])})),s("div",{staticClass:"total"},[s("span",[t._v(t._s(t.$L("共"))+t._s(a.countNum)+t._s(t.$L("件商品"))+" "+t._s(t.$L("合计"))+":"+t._s(a.orderAmount))])])],2),s("div",{staticClass:"bottom"},[s("span",{staticClass:"relation"},[t._v(t._s(t.$L("关系"))+"："+t._s(a.relation))]),s("span",[t._v(t._s(t.$L("下单用户"))+"："+t._s(a.username))]),s("br"),s("span",{staticClass:"commission"},[t._v(t._s(t.$L("我所得的佣金"))+" "),s("b",{staticClass:"font-red"},[t._v(t._s(a.commissionPrice))])])])])})),t.tableData.allNum>t.pageSize?s("div",{staticClass:"list-pages"},[s("el-pagination",{attrs:{small:"",background:!0,"current-page":t.currentPage,"page-size":t.pageSize,layout:"prev, pager, next",total:t.tableData.allNum},on:{"size-change":t.handdleSizeChange,"current-change":t.handdleCurrentChange}})],1):t._e()],2):s("div",{staticClass:"no-data"},[t._v("\n\t\t\t\t\t    "+t._s(t.$L("暂无数据"))+"\n\t\t\t\t\t")])],1)])])],1)},i=[],n=s("1e51"),r={name:"withdrawal",data:function(){var t=this;return{showSearch:!1,loading:!0,errorType:"error",errorTitle:this.$L("出错了"),errorTips:null,errorShow:!1,inputValue:"",theadName:{type:"all",list:[{text:this.$L("全部订单"),type:"all",func:function(){t.$route.params.hasOwnProperty("id")?t.$router.push({params:{type:"all",id:t.$route.params.id}}):t.$router.push({params:{type:"all"}})}},{text:this.$L("已结算"),type:"settlement",func:function(){t.$route.params.hasOwnProperty("id")?t.$router.push({params:{type:"settlement",id:t.$route.params.id}}):t.$router.push({params:{type:"settlement"}})}},{text:this.$L("未结算"),type:"unSettlement",func:function(){t.$route.params.hasOwnProperty("id")?t.$router.push({params:{type:"unSettlement",id:t.$route.params.id}}):t.$router.push({params:{type:"unSettlement"}})}}]},tableData:{},pageSize:10,currentPage:1,userId:"",sortBy:""}},components:{rankTab:n["a"]},computed:{mobileTopBtn:{get:function(){return this.$store.state.mobileTopBtn},set:function(t){this.$store.commit("setMobileTopBtn",t)}}},beforeRouteUpdate:function(t,a,s){this.currentPage=1,this.getData(t),this.makeTop(),s()},created:function(){this.getData(),this.makeTop()},beforeDestroy:function(){this.mobileTopBtn=null},methods:{showError:function(t,a,s){this.errorType="warning"===s?"warning":"error",this.errorTitle=t&&""!==t?t:this.$L("出错了"),this.errorTips=a&&""!==a?a:null,this.loading=!1,this.errorShow=!0},getData:function(t){var a=this;a.loading=!0,t||(t=a.$route),a.theadName.type=t.params.hasOwnProperty("type")?t.params.type:"all",a.userId=t.params.hasOwnProperty("id")?t.params.id:"";var s={p:a.currentPage,num:a.pageSize,settlementStatus:a.theadName.type,keyword:a.inputValue,distributorId:a.userId};a.$api("distributorInfo",s,(function(t){1===t.flag?(a.tableData=t.data,a.loading=!1):-1===t.flag?a.$confirm(a.$L("请重新登录"),a.$L("登录超时"),{confirmButtonText:a.$L("重新登录"),cancelButtonText:a.$L("取消"),type:"error",distinguishCancelAndClose:!0}).then((function(){a.$router.push({name:"login",query:{redirect:a.$route.fullPath}})})).catch((function(t){a.$gotoWebHome()})):a.$confirm(a.$L("数据加载失败"),a.$L("出错了"),{confirmButtonText:a.$L("点击重试"),cancelButtonText:a.$L("返回首页"),type:"error",distinguishCancelAndClose:!0}).then((function(){a.getData()})).catch((function(t){a.$router.push({name:"distributorMain"})}))}),(function(t){a.$confirm(a.$L("网络请求失败"),a.$L("出错了"),{confirmButtonText:a.$L("点击重试"),cancelButtonText:a.$L("返回首页"),type:"error",distinguishCancelAndClose:!0}).then((function(){a.getData()})).catch((function(t){a.$router.push({name:"distributorMain"})}))}))},makeTop:function(){var t=this;this.mobileTopBtn=[{icon:"bbx-icon-sousuo",func:function(){t.doSearch(!0)}}]},doSearch:function(t){t?this.showSearch=!0:(this.searchType="all",this.showSearch=!1)},handdleSizeChange:function(t){this.pageSize=t,this.getData()},handdleCurrentChange:function(t){this.currentPage=t,this.getData()},changeTypeFunc:function(t){this.type=t,this.getData()},searchFunc:function(t){this.inputValue=t,this.getData()},statusFunc:function(t){var a;switch(t){case 0:a={text:this.$L("未结算"),color:"font-red"};break;default:a={text:this.$L("已结算"),color:"font-green"};break}return a}}},o=r,l=(s("f1a0"),s("4023")),c=Object(l["a"])(o,e,i,!1,null,"3a5b3eb8",null);a["default"]=c.exports},"52ac":function(t,a,s){},7929:function(t,a,s){"use strict";var e=s("150a"),i=s.n(e);i.a},f1a0:function(t,a,s){"use strict";var e=s("52ac"),i=s.n(e);i.a}}]);
//# sourceMappingURL=chunk-4dc475f7.9a6554ff.js.map
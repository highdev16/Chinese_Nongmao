(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-9e0f822a"],{"5c29":function(t,e,a){},"9cc7":function(t,e,a){"use strict";var n=a("5c29"),r=a.n(n);r.a},b700:function(t,e,a){"use strict";a.r(e);var n=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"distributor-main"},[a("div",{staticClass:"list-top"},[a("div",{staticClass:"right-font"},[a("el-input",{staticClass:"input-with-select",attrs:{placeholder:t.$L("输入用户名称/姓名"),size:"small",clearable:""},on:{change:t.searchFunc},nativeOn:{keyup:function(e){return!e.type.indexOf("key")&&t._k(e.keyCode,"enter",13,e.key,"Enter")?null:e.target.blur(e)}},model:{value:t.inputValue,callback:function(e){t.inputValue=e},expression:"inputValue"}},[a("el-button",{attrs:{slot:"append",icon:"el-icon-search"},slot:"append"})],1)],1)]),t.tableData&&t.tableData.hasOwnProperty("list")?a("div",{staticClass:"main-table"},[a("el-table",{directives:[{name:"loading",rawName:"v-loading",value:t.loading,expression:"loading"}],staticClass:"table",staticStyle:{width:"100%"},attrs:{"empty-text":t.$L("暂无数据"),data:t.tableData.list,"header-cell-style":{background:"#f0f1f5",padding:"10px",color:"#666"}}},[a("el-table-column",{attrs:{prop:"grade",label:t.$L("等级"),align:"center"}}),a("el-table-column",{attrs:{label:t.$L("用户"),align:"center"},scopedSlots:t._u([{key:"default",fn:function(e){return a("div",{},[a("p",[t._v(t._s(e.row.contact?e.row.contact:e.row.userName)+t._s(e.row.mobile?"/"+e.row.mobile:""))])])}}],null,!1,1932112142)}),a("el-table-column",{attrs:{prop:"subordinateCount",label:t.$L("下级分销商数"),align:"center"}}),a("el-table-column",{attrs:{prop:"memberCount",label:t.$L("子会员数"),align:"center"}}),a("el-table-column",{attrs:{prop:"totalAmount",label:t.$L("订单总金额"),align:"center"}}),a("el-table-column",{attrs:{prop:"fullCommission",label:t.$L("产生佣金总额"),align:"center"}}),a("el-table-column",{attrs:{label:t.$L("状态"),align:"center"},scopedSlots:t._u([{key:"default",fn:function(e){return a("div",{staticClass:"status"},[a("span",{class:t.statusFunc(e.row.status).color},[t._v(t._s(t.statusFunc(e.row.status).text))])])}}],null,!1,2370015200)}),a("el-table-column",{attrs:{label:t.$L("操作"),"min-width":"120",align:"center"},scopedSlots:t._u([{key:"default",fn:function(e){return a("div",{staticClass:"button"},[a("a",{staticClass:"btns",attrs:{href:e.row.fxUrl,target:"_blank"}},[a("el-button",{attrs:{size:"small"}},[t._v(t._s(t.$L("进入平台")))])],1),a("router-link",{attrs:{to:{name:"distributorDetails",params:{id:e.row.distributorId,type:"all"}}}},[a("el-button",{attrs:{type:"primary",size:"small"}},[t._v(t._s(t.$L("查看详情")))])],1)],1)}}],null,!1,2959650984)})],1),t.tableData.allNum>t.pageSize?a("div",{staticClass:"list-pages"},[a("el-pagination",{attrs:{background:"","current-page":t.currentPage,"page-size":t.pageSize,layout:"prev, pager, next, total, jumper",total:t.tableData.allNum},on:{"current-change":t.handleCurrentChange}})],1):t._e()],1):t._e()])},r=[],l={name:"distributorList",props:{distributormain:{type:Boolean}},data:function(){return{loading:!1,errorType:"error",errorTitle:this.$L("出错了"),errorTips:null,errorShow:!1,btnSize:"small",inputValue:"",type:"",cur:1,messageType:"all",theadName:[],messageTypelist:[{type:"all",name:this.$L("全部状态")},{type:"valid",name:this.$L("生效")},{type:"stop",name:this.$L("停用")}],tableData:{},isMyMember:0,pageSize:10,currentPage:1}},beforeRouteUpdate:function(t,e,a){this.getData(t),this.currentPage=1,a()},created:function(){this.getData()},methods:{showError:function(t,e,a){this.errorType="warning"===a?"warning":"error",this.errorTitle=t&&""!==t?t:this.$L("出错了"),this.errorTips=e&&""!==e?e:null,this.loading=!1,this.errorShow=!0},getData:function(t){var e=this;e.loading=!0;var a={p:e.currentPage,keyword:e.inputValue?e.inputValue:""};t||(t=e.$route),e.$api("distributionList",a,(function(t){1===t.flag?(e.tableData=t.data,e.theadName=t.data.group,e.loading=!1):-1===t.flag?e.$confirm(e.$L("请重新登录"),e.$L("登录超时"),{confirmButtonText:e.$L("重新登录"),cancelButtonText:e.$L("取消"),type:"error",distinguishCancelAndClose:!0}).then((function(){e.$router.push({name:"login",query:{redirect:e.$route.fullPath}})})).catch((function(t){e.$router.push({name:"home"})})):e.$confirm(e.$L("数据加载失败"),e.$L("出错了"),{confirmButtonText:e.$L("点击重试"),cancelButtonText:e.$L("返回首页"),type:"error",distinguishCancelAndClose:!0}).then((function(){e.getData()})).catch((function(t){e.$router.push({name:"home"})}))}),(function(t){e.$confirm(e.$L("网络请求失败"),e.$L("出错了"),{confirmButtonText:e.$L("点击重试"),cancelButtonText:e.$L("返回首页"),type:"error",distinguishCancelAndClose:!0}).then((function(){e.getData()})).catch((function(t){e.$router.push({name:"home"})}))}))},handleCurrentChange:function(t){this.currentPage=t,this.getData()},searchFunc:function(t){this.inputValue=t,this.getData()},changeTypeFunc:function(t){this.messageType=t,this.getData()},statusFunc:function(t){var e;switch(t){case-1:e={text:this.$L("停用"),color:"font-red"};break;default:e={text:this.$L("生效"),color:"font-green"};break}return e}}},i=l,s=(a("9cc7"),a("4023")),o=Object(s["a"])(i,n,r,!1,null,"060f6060",null);e["default"]=o.exports}}]);
//# sourceMappingURL=chunk-9e0f822a.d9d58c32.js.map
(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-12eb5078"],{b9d8:function(t,e,a){"use strict";var r=a("e634"),o=a.n(r);o.a},bb9c:function(t,e,a){"use strict";var r=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"tab-box"},[t.topMenu&&t.topMenu.hasOwnProperty("menuList")?a("div",{staticClass:"box-title"},[a("vue-scroll",{staticClass:"mainBorderColor",attrs:{ops:t.ops}},[a("div",{staticClass:"title-box"},t._l(t.topMenu.menuList,(function(e){return e.hasOwnProperty("hide")&&!1!==e.hide&&t.$route.name!==e.router?t._e():a("div",{staticClass:"title-item",class:{mainFontColor:t.checkActive(e)},on:{click:function(a){return t.gotoRouter(e)}}},[t._v(t._s(e.text)+"\n                ")])})),0)])],1):t._e(),t.topMenu.hasOwnProperty("fullView")&&t.topMenu.fullView?a("router-view",{staticClass:"box-body",class:{"no-title":!t.topMenu||!t.topMenu.hasOwnProperty("menuList")},attrs:{"router-data":t.routerData},on:{action:t.action}}):a("div",{staticClass:"box-body",class:{"no-title":!t.topMenu||!t.topMenu.hasOwnProperty("menuList")}},[a("vue-scroll",[a("router-view",{staticClass:"box-content",attrs:{"router-data":t.routerData},on:{action:t.action}})],1)],1)],1)},o=[],s=(a("cc57"),{name:"tabBoxM",data:function(){return{ops:{scrollPanel:{scrollingX:!0,scrollingY:!1},rail:{opacity:0},bar:{opacity:0}}}},props:{topMenu:{type:Object,default:function(){return{}}},routerData:{type:Object,default:function(){return{}}}},methods:{action:function(t){this.$emit("action",t)},checkActive:function(t){return!!(!t.hasOwnProperty("router")||this.$route.name===t.router||t.hasOwnProperty("checkRouter")&&this.$in_array(this.$route.name,t.checkRouter))&&!(t.hasOwnProperty("params")&&!this.$compareObj(t.params,this.$route.params))},gotoRouter:function(t){if(t&&t.hasOwnProperty("router")){var e={};t.hasOwnProperty("params")&&Object.assign(e,t.params),t.hasOwnProperty("paramsData")&&Object.assign(e,t.paramsData),this.$router.push({name:t.router,params:e})}else if(t&&"function"===typeof t.func)t.hasOwnProperty("funcData")?t.func(t.funcData):t.func();else if(t&&t.hasOwnProperty("params")||t&&t.hasOwnProperty("paramsData")){var a={};t.hasOwnProperty("params")&&Object.assign(a,t.params),t.hasOwnProperty("paramsData")&&Object.assign(a,t.paramsData),this.$router.push({params:a})}}}}),n=s,i=(a("b9d8"),a("4023")),u=Object(i["a"])(n,r,o,!1,null,"92ae351a",null);e["a"]=u.exports},e634:function(t,e,a){},fd16:function(t,e,a){"use strict";a.r(e);var r=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("tab-box-m",{attrs:{"top-menu":t.topMenu}})},o=[],s=a("bb9c"),n={name:"prize",components:{TabBoxM:s["a"]},data:function(){return{topMenu:{menuList:[{text:this.$L("产品"),router:"prizeList",params:{type:"prod"}},{text:this.$L("礼品"),router:"prizeList",params:{type:"gift"}},{text:this.$L("积分"),router:"prizeList",params:{type:"point"}},{text:this.$L("优惠券"),router:"prizeList",params:{type:"coupon"}},{text:this.$L("奖品详情"),router:"prizeInfo",hide:!0}]}}}},i=n,u=a("4023"),c=Object(u["a"])(i,r,o,!1,null,"54674a42",null);e["default"]=c.exports}}]);
//# sourceMappingURL=chunk-12eb5078.452d0656.js.map
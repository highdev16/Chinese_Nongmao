(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-75cc5b12"],{"69f6":function(t,e,s){"use strict";s.r(e);var n=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{directives:[{name:"loading",rawName:"v-loading",value:t.loading,expression:"loading"}],staticClass:"shop-cart"},[s("iframe",{ref:"ifr",staticClass:"windows",staticStyle:{height:"100%"},attrs:{src:t.url},on:{load:t.onLoad}})])},a=[],i={name:"shopCart",props:{height:{type:String,default:""},loading:{type:Boolean,default:!1}},created:function(){this.$isMobile()&&this.$router.push({name:"cart"})},computed:{url:{get:function(){return this.$C("serverUrlAjax")+"/exusers/u_cart.php?idweb="+this.$getWebId()+"&act=show&lang="+this.$langID()+"&v=9"}}},methods:{onLoad:function(){this.$refs.ifr.contentWindow.postMessage({msg:"isVue"},this.$C("serverUrlAjax"))}}},r=i,o=(s("c6d5"),s("4023")),c=Object(o["a"])(r,n,a,!1,null,"bd239e5e",null);e["default"]=c.exports},c4f5:function(t,e,s){},c6d5:function(t,e,s){"use strict";var n=s("c4f5"),a=s.n(n);a.a}}]);
//# sourceMappingURL=chunk-75cc5b12.f6d53089.js.map
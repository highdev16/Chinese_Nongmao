(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-2d0e490b"],{9185:function(e,r,t){"use strict";t.r(r);var i=function(){var e=this,r=e.$createElement,t=e._self._c||r;return t("div")},s=[],o={name:"oem",inject:["reloadSetup"],created:function(){var e=this;if(this.showLoading(),this.$route.query.hasOwnProperty("idweb")){var r=this.$route.query.idweb;r=parseInt(r),isNaN(r)||this.$setConfig("web_id",r)}if(this.$route.query.hasOwnProperty("lang")){var t=this.$route.query.lang;t=parseInt(t),isNaN(t)||this.$lang("lang_"+t)}this.$route.query.hasOwnProperty("type")?this.$oem(1==this.$route.query.type):this.$oem(!1),this.$route.query.hasOwnProperty("server")?this.$serverUrl(this.$route.query.server):this.$serverUrl(null);var i=null;this.$route.query.hasOwnProperty("redirect")&&(i=this.$route.query.redirect),this.$isPublish(!0),this.reloadSetup((function(){i?window.location.href=i:e.$router.push({name:"home"})}))},methods:{showLoading:function(){this.$loading({lock:!0})}}},n=o,u=t("4023"),h=Object(u["a"])(n,i,s,!1,null,null,null);r["default"]=h.exports}}]);
//# sourceMappingURL=chunk-2d0e490b.3de05336.js.map
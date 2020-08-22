<?php
session_start();
$_SESSION['login'] = 0;
$_SESSION['username'] = '';
$_SESSION['nickname'] = '';
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="建站">
<title>迷你控制面板</title>
<link rel="shortcut icon"  type="image/x-icon" href="http://s138.nicebox.cn/agentimg/234_ccmm.ico" />
<script src='js/jquery.js'></script>
<script src='js/set_cav.js'></script>
<style>
	*{margin:0;padding:0;}
	body {font:12px/1.8 Verdana,Arial,Helvetica,sans-serif; margin:0; padding:5px; color:#000; height:100%;}
	ul,li {list-style:none;}
	table{background-color:#fff}
	tr {line-height:180%;font-size: 12px;}
	form {margin:0;} textarea {overflow:auto;}
	img {border:0;}

	a.ngray{text-decoration:none;color:#666;}
	a.ngray:hover{text-decoration:none;color:#000000;}

	/*==== layout ======*/
	.left{float:left}.right {float:right;}
	.clear {clear:both;}
	/*common*/
	input,textarea {font-size:12px;padding:2px 2px 2px 2px; font-family:Verdana,Arial,Helvetica,sans-serif; }
	.note {color:#888;}/*涓€鑸敞閲�*/
	.notice {color:#f60;} /*璀﹀憡璇�*/
	.redfont {color:red;} .greenfont{color:#090;} .gray{color:#666;}
	.smfont{font-family:"Tahoma","Lucida Console","Arial";font-size:11px;}
	.webDings{font-family:Webdings;font-size:10px;}
	.price{font-size:24px;color:Red;}

	.shadow {/*闃村奖*/box-shadow:2px 2px 10px #06C;filter: progid:DXImageTransform.Microsoft.Shadow(Strength=3, Direction=0, Color='#0066CC');}
	.alpha {/*閫忔槑搴�*/opacity:0.7; filter:alpha(opacity=70); -moz-opacity:0.7; -khtml-opacity:0.7;}

	/*V3*/
	#menubar{height:30px;}
	#menubar #menu{float:left;font-size:11px;color:white;}
	#menubar span{padding:5px 8px 3px 8px;float:left;display:block;}
	#menubar #logout{float:right;padding-right:10px;}
	#menubar #logout span{float:left;}

	/*椤堕儴*/
	#top{width:100%;color:#D0D0D0;clear:both;}
	#top a{color:#fff;text-decoration:none;}
	#top a:hover{color:#fff;}
	/*smmenu*/
	#smenu{height:24px;}
	#smenu .logout{float:right;padding:3px 8px 0 3px;}
	#smenu .slink li{float:left;}
	#smenu .slink a{background:url(/images/v3/sb.gif) no-repeat top center;display:block;margin-top:2px;text-align:center;width:38px;}
	#smenu .slink a:hover{background-image:url(/images/v3/sbh.gif);color:#ccc;}
	/*menu*/
	#link{height:34px;clear:both;}
	#link .menu {width:100%;position:relative; clear:both;padding:0;margin:0;z-index:100;}
	#link .menu li {float:left;position:relative;}
	#link .menu span{float:left;}
	#link .menu .line{background:none;width:6px;height:30px;}
	#link .menu a {float:left;text-decoration:none;line-height:100%;padding:0 0 0 7px;background:url(/images/v5/tb.png) left bottom no-repeat;color:white;font-size:14px;cursor:pointer;}
	#link .menu a span {padding:13px 8px 7px 0px;background:url(/images/v5/tb.png) right bottom no-repeat;}
	#link .menu .enarr {background:url(/images/v5/arr_w.gif) center right no-repeat;padding:0px 0px 0px 3px;}
	#link .menu a.cur {color:#fff;background:url(/images/v5/tbhover.png) left bottom no-repeat;}
	#link .menu a.cur span{background:url(/images/v5/tbhover.png) right bottom no-repeat;float:left;color:#fff;cursor:pointer;} 
	#link .menu a.hotTop {background:url(/images/v5/tbh.png) bottom left no-repeat;color:#000;}
	#link .menu a.hotTop span{background:url(/images/v5/tbh.png) right bottom no-repeat;color:#000;}
	#link .menu a.hotTop .enarr{background:url(/images/v5/arr_b.gif) center right no-repeat;padding:0px 0px 0px 3px;}
	#link .menu iframe {position:absolute;top:34px;left:1px;width:122px;height:120px;background:none;z-index:-1;display:none;}
	/*dmenu*/
	#link .dmenu {display:none;position:absolute;z-index:100; top:34px;margin-left:1px; clear:left;border:1px solid #357193;border-top:none;}
	#link .dmenu li {clear:both;height:27px;font-size:12px;padding:0;margin:0}
	#link .dmenu a {display:block;background:#244D64 none;width:100px;height:13px;font-size:12px;margin:0;padding:8px 10px 6px 10px;color:#FFF;} 
	#link .dmenu a:hover {background:#eee;color:#000;}
	#link .dmenu .line{height:0px;width:120px;border-top:1px solid #16313F;border-bottom:1px solid #357193;font-size:0;line-height:0;overflow:hidden;}
	/*page-title-list*/
	#link .dmenu2 {display:none;width:168px; position:absolute;z-index:100; top:34px;margin-left:1px; clear:left;border:1px solid #357193;border-top:none;border-bottom:none}
	#link .dmenu2 a {font-size:12px;line-height:27px;background:none;}
	#link .dmenu2 dt {height:27px;background:#244D64;border-bottom:1px solid #193545;}
	#link .dmenu2 dt a,
	#link .dmenu2 dt a:hover {float:left;width:56px;background:#193545;padding:0;margin:0;text-align:center;}
	#link .dmenu2 dd {background:#244D64;height:27px;border-top:1px solid #357193;border-bottom:1px solid #16313F;}
	#link .dmenu2 dd.hover {background:#eee;}
	#link .dmenu2 dd.hover a {color:#000}
	#link .dmenu2 dd.hover a:hover {color:#f00;}
	#link .dmenu2 .a2 {float:right;padding-right:5px;color:#00CCFF}
	#link .dmenu2 .cur2,
	#link .dmenu2 .cur2:hover {background:#244D64; color:#00CCFF}

	#menuline{height:1px;width:100%;font-size:1px;padding:0;}

	#title{font-size:14px;padding:0px 0px 5px 8px;font-weight:bold;text-align:left;margin-bottom:4px;border-bottom:1px solid #C0C9D5;}

	#main{width:100%;background:#ffffff;}
	/*
	#main .bt{background:url(../images/v3/bt.gif) no-repeat;border:0;color:#DAEBF6;cursor:pointer;font-size:14px;margin-right:0;padding:3px 0;width:100px;}
	#main .bt:hover{color:#FFF;}
	#main .bts{background:url(../images/v3/bts.jpg) repeat-x;border:1px solid #000;color:#333;cursor:pointer;font-size:12px;margin-bottom:2px;margin-right:0;padding:3px 3px 0;}
	#main .bts:hover{color:#000;}
	*/
	#main .title{color:#000;font-weight:700;}

	#mod{background:url(/images/v5/modtitle.jpg);height:35px;padding-left:6px;overflow:hidden;}
	#mod .hot{background:url(/images/v5/modtitle_hot.jpg) top right no-repeat;padding-right:16px;font-weight:bold;cursor:pointer; margin-right:6px;}
	#mod .hot a{background:url(/images/v5/modtitle_hot.jpg) top left no-repeat;padding:8px 0px 6px 16px;display:block;color:#000000; text-decoration:none;}
	#mod li{float:left;}
	#mod #modInfo{float:right;padding:5px 6px 0px 0px;color:#525552;}

	#mod .normal{background:url(/images/v5/modtitle_normal.jpg) top right no-repeat;padding-right:16px;font-weight:bold;cursor:pointer; margin-right:4px;}
	#mod .normal a{background:url(/images/v5/modtitle_normal.jpg) top left no-repeat;padding:8px 0px 6px 16px;display:block;font-weight:normal;color:#525552;text-decoration:none;}

	.ititle{font-weight:bold;padding:0px;margin-top:5px;text-align:left}
	.mi{width:250px;}
	.mc{width:257px;}
	#modButton{background:url(/images/v5/modtitle_bottom.jpg) #ccc;padding:4px 6px 0px 0px;height:29px;text-align:right;border-top:1px solid #ADBEDE;}

	#modtable{border-left:1px solid #eee;border-top:1px solid #eee;}
	#modtable td{border-bottom:1px solid #eee;border-right:1px solid #eee;}

	#leftlist{border-right:1px solid #C0C9D5; border-top:1px solid #C0C9D5;}
	#leftlist li {list-style:none;}
	#leftlist a{float:left;width:105px;background:url(/images/v5/leftlist.png) left bottom repeat-x;padding:5px 10px 5px 15px;text-decoration:none;color:#333;border-top:1px solid #E6EEF8;}
	#leftlist a:hover{font-weight:bold;}

	.listinfo{width:160px; padding:8px; border:1px solid #C0C9D5;color:#666;}
	.listinfo img{border:1px solid #C0C9D5;padding:1px;}

	#mainindex{width:100%;}
	#mainindex ul{margin:0px 3%;padding:0px;list-style:none;}
	#mainindex li{float:left;width:16%;text-align:center;padding:2px;}

	/*搴曢儴*/
	#bottom{text-align:right;font-family: "Tahoma","Lucida Console","Arial";font-size:10px;padding:3px 10px 3px 0px;color:#999;}
	#wizard{text-align:right; overflow:hidden;border-top:1px solid #C0C9D5;border-bottom:1px solid #C0C9D5;padding:0px 8px;
		background:url(/images/v5/leftlist.png) left bottom repeat-x #eee;}
	#wizard input{width:100px; margin-right:50px; padding:7px 0px;font-size:12px;font-weight:bold;color:white;border:0px;cursor:pointer;text-align:center;
		background:url(../images/bt.jpg) no-repeat;}
	#wizard .bt{margin-right:0px; background:url(../images/bt2.jpg) no-repeat;}
	#winzardinfo{list-style:none;float:left;padding:5px 0px;color:#666;}
	#winzardinfo img{padding-right:5px;}

	#page{font-size:11px;}
	#page a{color:#666;font-size:11px;}
	#page a:hover{color:#f30;}
	#pagelist{border:1px solid #ccc;height:260px;padding:5px;width:190px;}
	#pagelist input{border:0;margin:5px 0 -2px;width:18px;}
	#templatelist #hot #tdl{background:url("../images/th1.gif") no-repeat;width:3px;}
	#templatelist #hot #tdr{background:url("../images/th3.gif") no-repeat;width:3px;}
	#templatelist #hot #templateshow{border:1px solid #f30;padding:1px 1px 0;}
	#templatelist #hot table{background:url("../images/th2.gif") repeat-x;}
	#templatelist #tdl{background:url("../images/t1.gif") no-repeat;width:3px;}
	#templatelist #tdr{background:url("../images/t3.gif") no-repeat;width:3px;}
	#templatelist #templateshow{border:1px solid #ccc;padding:1px 1px 0;}
	#templatelist a{color:#FFF;display:block;text-decoration:none;width:100%;}
	#templatelist li{float:left;padding:5px 5px 0 0;text-align:center;width:14%;}
	#templatelist table{background:url("../images/t2.gif") repeat-x;color:#FFF;}
	#templatelist ul{margin:0;padding:0;}

	#listCount ul,li {margin:0px;}
	#listCount li{float:left;width:100%;text-align:left;font-weight:100;margin:5px 0px; border-bottom:1px solid #eee;padding-bottom:5px;}

	/*
	.btb{background:url(../images/btb.gif) no-repeat;border:1px solid #666;cursor:pointer;font-size:12px;margin-right:0;padding:2px 3px 0;}
	*/
	.formstyle{border:1px solid #666;font-family:Verdana, Arial, Helvetica, sans-serif;}
	.maininfo{border:1px solid #eee;cursor:pointer;margin:0 5px 5px;padding:0;}
	.menuedit{background:#eee;padding:5px;width:100%;}
	.menuedit #pageTitle{margin:0 0 5px;width:95%;}
	.tm td{color:red;}

	/*link*/
	a.mainlist{background:#F7F7F7;border:3px solid #fff;color:#666;display:block;height:250px;padding:3px;text-decoration:none;}
	a.mainlist img{border:0;margin-bottom:25px;}
	a.mainlist:hover{border:3px solid #FC3;}
	a{color:#06c;}
	a:hover{color:#f00;}
	#pages a{display:inline;border:0px;padding-left:0px;}
	#pages a:hover{background:#fff;}

	#mainTypeIndex .mainlist{height:100px;width:45%;float:left;margin-left:1.5%;background:url(../images/typeback.gif);margin-bottom:5px;}
	#mainTypeIndex a.mainlist{border:3px solid #f3f3f3;}
	#mainTypeIndex a.mainlist:hover{border:3px solid #FFCC33;}
	#mainTypeIndex a.hot{border:3px solid #ff3300;background:url(../images/typehot.gif) right no-repeat}

	#rt{font-weight:bold;color:#000;}
	#ri{background:url(/images/v3/rib.gif)  bottom no-repeat;padding:0px 0px 9px 0px; width:155px;color:#000;}
	#ri #ri2{background:url(/images/v3/ri.gif) no-repeat;padding:3px 8px 0px 8px;}
	#rc{background:url(/images/v3/ria.gif) center no-repeat;height:36px;}
	#ri .number{color:#f30;font-size:20px;padding-right:5px;}
	#ri a{text-decoration:none;}

	#tLink{background:url(/images/v3/pb.jpg) left top repeat-x;padding-left:10px;height:29px;margin:5px 0px;}
	#tLink span{cursor:pointer;padding:4px 8px 6px 8px;height:18px;display:block;float:left;}
	#tLink .hot{border:1px solid #999;border-bottom:0px;background:#fff;}
	#tLink a{text-decoration:none;color:#000;}

	/*tip 鎻愮ず*/
	#messinfo{display:none;padding:6px;border:1px solid #FFB380;margin-bottom:5px;background:url(/images/v5/messinfo.png) left bottom repeat-x #FFFFcc;display:nosne;cursor:pointer;}
	.messerr{background:url(../images/w.gif) no-repeat;padding-left:20px;color:red;text-align:left;list-style:none;float:left;}
	.messsuccessful{background:url(../images/s.gif) no-repeat;padding-left:20px;color:#090;text-align:left;list-style:none;float:left;}
	.success {color:#264409}
	.error {color:#8a1f11}
	.mess{padding:6px;border:1px solid #FFB380;margin-bottom:5px;background:url(/images/v5/messinfo.png) left bottom repeat-x #FFFFcc;}
	.mess2{font-size:14px;padding:5px 5px 5px 6px;border:1px solid #49A4D9;background:#F2FFC1;text-align:center;font-weight:bold;margin:5px 0px;}

	/*鏄剧ず闅愯棌宸︿晶涓诲鑸�*/
	#sh {width:11px; height:50px; background-image:url(/images/v5/switch.gif); background-repeat:no-repeat;cursor:pointer;}
	.tol {background-position:0 0;}
	.tor {background-position:0 -50px;}
	/*鍒嗛〉*/
	.pagenav {text-align:center;}
	/*寮瑰嚭灞俤ialog*/
	#dialogBg {display:none;width:100%;height:100%;background:#808080;position:absolute;top:0;left:0;z-index:10000000}/*閬僵*/
	.dialog {padding:8px;position:absolute;top:250px;z-index:10000001;background:url(/images/v5/borderBg.png);}
	.dialog .title{height:20px;padding:5px 10px 0;background:#fff;overflow:hidden;}
	.dialog .title h4{float:left;font-size:12px;}
	.dialog .title span {float:right;cursor:pointer;color:#c00; font:600 18px/20px verdana,arial;}/*X*/
	.dialog .content{padding:10px;background:#fff;overflow:hidden;}
	/*csstable*/
	.csstable {border:1px solid #C0C9D5;margin-bottom:8px;}
	.csstable .t td{background:url(/images/v5/leftlist.png) left bottom repeat-x;font-weight:bold;border-bottom:1px solid #C0C9D5;}
	.csstable .l{background:#F1F5FB;border-right:1px solid #C0C9D5;text-align:right;padding-right:3px;}
	.csstable #tl,#tm,#tr{background:url(/images/v5/leftlist.png) left bottom repeat-x;font-weight:bold;border-bottom:1px solid #C0C9D5;}
	.csstable #tl{background-position:left center;}
	.csstable #tl,.csstable #tm,.csstable #tr{background-repeat:repeat-x!important;}
	.csstable .tline{border-right:1px solid #C0C9D5;}
	.csstable td{border-bottom:1px solid #DFE4EA;padding:4px 4px 4px 4px;}
	.csstable .tdl{border-left:1px solid #eee;};
	.csstable .sbar td{background:#f3f4f5;color:#000;font-weight:bold;border-bottom:1px solid #ccc;border-top:1px solid #ccc;}
	.csstable u {color:#d00; text-decoration:none;} /*绾�*/
	.csstable .w100 {width:99%;}
	/*extend*/
	.main{padding-right:8px;}
	.subTitle{margin:3px 0px 8px 10px;}
	.subLink{margin:3px 0px 8px 10px;}
	body{padding:0;margin:0;}
	.error {background: #fbe3e4; color: #f00; text-align:center;padding: 0.8em; margin-bottom: 1em; border:1px solid #fbc2c4;}
	#login {position:fixed;top:50%;left:50%;margin:-215px 0 0 -200px;width:400px;height:430px;background:#fff;t;overflow:hidden;}
	#login .formstyle{outline:none;padding:0 0 0 2px;font-size:14px;height:40px;line-height:40px;width:100%;text-indent:5px;border:1px solid #C6C5C3;}
	#login input.formstyle {padding-bottom:2px;}
	#code {width:180px;border:0px;font-size:14px;height:40px;background:none;padding:0;outline:none;}
	.loginBtn{margin-top:22px;}
	.subBtn{  background: #288ADD;width: 100%;border: 0px;height: 45px;cursor: pointer;line-height: 45px;font-size: 16px;color: #fff;}
	.loginTitle{  height: 60px;line-height: 60px;text-align: center;font-size: 18px;font-family: 'Microsoft YaHei';color: #fff;background: #288ADD;}
  .padding20{padding:20px 30px 30px 30px;}
  .loginT{  height: 35px;line-height: 35px;margin-top: 5px;font-size: 14px;}
  .inputP{}
  #V8LoginBox{position:fixed;left:0px;top:0;width:100%;height:100%;z-index:1000;_position:absolute;left:0px;top:0px;_top:expression(eval(document.documentElement.scrollTop || document.body.scrollTop))}
</style>
</head>
<body>

<script>
$(function(){
   	$("#container").height($(window).height());

})
</script>

<div id="container" style="width:100%">
    <div id="anitOut"></div>
</div>


<div id="V8LoginBox">
<br>
  <br>

<div id="login">
<form action="logintry.php" method="post">
<div class="loginTitle">网站管理后台</div>
<div class="padding20">
<p class="loginT">管理员:</p>
<p class="inputP"><input name="username" tabindex="1" type="text" class="formstyle" id="loginname" placeholder="请输入管理员账号" size="20" value=""></p>
<p class="loginT">密　码:</p>
<p class="inputP"><input name="password" tabindex="2" type="password" class="formstyle" id="loginpwd" placeholder="请输入密码" size="20" value=""></p>
<p class="loginT">验证码:</p>
<div class="formstyle inputP"><input name="code" tabindex="3" type="text" id="code"  placeholder="请输入验证码"><img src="captcha.php" align="absmiddle" onclick="this.src='captcha.php?'+Math.random();" style="cursor:pointer;margin-left:15px;width:130px" title="更换验证码"/></div> 
<div class="loginBtn">
	<input type="submit" value="登  陆" tabindex="4" class="subBtn">
	<input type="hidden" name="act" id="act" value="login"/>
</div>
</div>
</form>
</div>
</div>

</body>
</html>
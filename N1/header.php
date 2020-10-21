<?php
error_reporting(0);
$url = basename($_SERVER['REQUEST_URI']);
$url = explode('?', $url);
$t = explode('/' . $url[0], $_SERVER['REQUEST_URI']);
$dirname = ($t[0]);
$filename = strtolower($url[0]);
$oname = explode('.', $dirname . "/" . $filename);
$oname = $oname[0];
?><!DOCTYPE html>
<html style="font-size: 16px;" lang='cn'>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="菜源佳佳营运合作, 智能菜场大数据应用, 电商免费入驻-新零售, 光影集团专注农贸行业 19年, 不是任何设计公司都叫专业农贸市场设计, Design, 装修设计百科2">
    <meta name="description" content="abc">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title><?php echo $bigTitle; ?></title>
    <link rel="stylesheet" href="/N1/p2.css" media="screen">
    <link rel="stylesheet" href="/N1/nicepage.css" media="screen">
    <link rel="stylesheet" href="/N1/images/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="<?php echo $oname; ?>.css" media="screen">
    <script src="/js/jquery1.js"></script>
    <script class="u-script" type="text/javascript" src="/N1/jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="/N1/nicepage.js" defer=""></script>
    <link id="u-theme-google-font" rel="stylesheet" href="/css/googleapifont.css">
    <meta property="og:title" content="<?php echo $bigTitle; ?>">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#478ac9">
    <meta property="og:url" content="index.html">
    <style>
      @media (max-width: 990px) {
        nav.u-menu {
          right: 0px;
          margin-right: 0px !important;
        }
        .u-custom-menu {
          display: none !Important;
        }
      }
      div.titlebar{
        margin-top: 0px !Important;
        padding-top: 0px !important;
        height: 80px;
      }
      img.article-image:hover {
        transition: transform .2s linear;
        -o-transition: transform .2s linear;
        -moz-transition: transform .2s linear;
        -webkit-transition: transform .2s linear;
      }
      img.article-image:hover {
        transform: scale(1.1, 1.1);
        -o-transform: scale(1.1, 1.1);
        -moz-transform: scale(1.1, 1.1);
        -webkit-transform: scale(1.1, 1.1);
      }
      .features-area > div:hover {
        transform: scale(1.05, 1.05);
        z-index:9999;
      }
      div.partner-area {
        grid-gap: 17px 31.4px !important;
        display: grid; grid-template-columns: auto auto auto auto auto auto auto auto !important;
      }
      .circles-area > div img {
        transition: transform .2s;
      }
      .circles-area > div:hover img {
        transform: scale(1.1);
      }
      .cross-text-image1 {
        margin-left: 100px !Important;
      }
      .circles-area > div:hover {
        opacity: 1;
        cursor: pointer;
      }
      .u-section-5 {
        margin-bottom: 80px !important;
      }
      .circle-text {
        font-size: 1.5rem; font-weight: lighter !important; width:100%; height: 100%; background: #0005;
        border-radius: 50%;
        line-height: 252px;
      }
      .circle-text:hover {
        background: #0000;
      }
      div.gridimage11 {
        flex: none !Important;
        width: 45.8% !important;
      }
      div.gridimage21 {
        flex: none !Important;
        width: 54% !important;
        max-width: 54% !important;
      }
      .circles-area > div {
        border-radius:50%;
        background-color: black;
      }
      a.selected-a-button {
        border: 2px solid #ff6500;
        background: #ff6500;
        margin-top: 20px;
        color: white;
        float:left;
        padding: 5px 20px 5px 20px;
        margin-right: 20px;
      }
      a.unselected-a-button {
        padding: 5px 20px 5px 20px;
        float:left;
        margin-top: 20px;
        margin-right: 20px;
        border: 2px solid black;
        background: white;
        color: black;
      }
      div.bigcontainer {
        width: 1500px !important;
      }
      .image-cell {
        float:left;
        width: 30%;
        margin-left: 0%;
        margin-right: 0%;
        margin-top: 20px;
        overflow:hidden;
        min-width: 300px;
      }

      div.image_cell_area {
        height: 300px !important;
      }
      div.image_cell_area img {
        height: 300px !important;
        width:100% !important;
        max-height: 300px !important;
      }
      .features-area > div:hover{
        transition: transform 0.2s;
        cursor: pointer;
      }
      footer * {
        font-family: "Microsoft YaHei" !important;
      }
      body * {
        font-family: "Microsoft YaHei" !important;
      }
      section.titlesubmenu.narrow {
        top: 62px;
      }      
      header *, section.titlesubmenu {
        font-size: 16px !important;
        font-family: "Microsoft Yahei" !important; /*, "Helvetica Neue", Helvetica, "PingFang SC","Microsoft YaHei", 微软雅黑, "Hiragino Sans GB", Arial, sans-serif !important;*/
      }
      * {
        font-weight: 400 !important;
      }
      body {
        font-family: "Microsoft Yahei"; /*, "Helvetica Neue", Helvetica, "PingFang SC","Microsoft YaHei", 微软雅黑, "Hiragino Sans GB", Arial, sans-serif !important;*/
      }
      .active1 {
          border-width: 0px !important;
          border-color: #ff6500 !important;
      }
      .active-submenu {
          color: #ff6500 !important;
      }
      .titlesubmenu {
          width: 100% !important;
          top: 80px;
      }
      section.titlesubmenu p.u-text {
          font-size: 14px;
      }
      header {
        border-bottom: 1px solid #ddd;
      }
      header.narrow,header.narrow div.titlebar {
        height: 62px;
        min-height: 62px;
      }
      header.narrow a.logo-image {
        margin-top: 0px;
      }
      .u-custom-menu {
        height: 100% !important;
        min-height: 0px !Important;
      }
      @media (min-width: 1500px) {
        .u-sheet {
            width: 1500px;
        }
      }
      div.image_cell_area {
        height: 300px !important;
      }
      div.image_cell_area img {
        height: 300px !important;
        width:100% !important;
        max-height: 300px !important;
      }
      .u-header .u-menu-1 {
        margin: 0px 250px 0px;
        position: absolute;
        top: 0px; bottom: 0px;
      }
      div.u-custom-menu.u-nav-container {
        height: 100%;
      }
      li.u-nav-item a.titlemainmenu {
        height: 100%;
        line-height: 80px;
        border-width: 0px;
        display: flex;
        display: -webkit-flex;
        flex-direction: column;
      }
      li.u-nav-item a.titlemainmenu.active:after{
        content: '';
        width: 100%;
        height: 5px;
        background: #ff6500;
        position: absolute;
        bottom: -1px;
        left: 0px;
      }
      header.narrow li.u-nav-item a.titlemainmenu {
        line-height: 62px;
        font-family: "Microsoft Yahei" !important;
      }
      body *.element-center {
        margin-left: auto !important;
        margin-right: auto !important;
      }
      body *.yahei {
        font-family: "Microsoft Yahei" !important;
      }
      headeronly {
        box-shadow: 0 5px 10px rgba(0,0,0,.1);
      }
      section.titlesubmenu {
        background: white !important;
      }
      section.titlesubmenu p.u-text {
        font-family: "Microsoft Yahei" !important;
      }
      header.narrow  div.free-consultation {
        line-height: 62px;        
      }
      div.free-consultation {
        line-height: 80px;
        font-family: "Roboto" !important;
        margin-left: 50px;
        margin-right: 50px;
        font-weight: 1000 !important;
        color: #000;
        opacity: 0.7;
        display: flex;
        display: -webkit-flex;
      }
    </style>
  </head>
  <body class="u-body">
      <header class="u-align-left u-clearfix u-header u-sticky u-white u-header" id="sec-0bb0" style=' z-index:9999999'>
      <div class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-xl u-sheet-1 titlebar">
        <a href="/" class="logo-image u-image u-logo u-image-1" data-image-width="349" data-image-height="98" style='height: 100%;display: flex; flex-direction: column; justify-content: space-around;'>
          <img src="/N1/images/logo.png" class="u-logo-image u-logo-image-1" data-image-width="242.1137">
        </a>
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1" style='display: flex; display: -webkit-flex; flex-direction: column; justify-content: space-around; -webkit-justify-content: space-around'>
          <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0; font-weight: 700; text-transform: uppercase;">
            <a class="u-border-4 u-border-active-custom-color-1 u-border-hover-custom-color-1 u-border-no-left u-border-no-right u-border-no-top u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-palette-2-base" href="#">
              <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><symbol id="menu-hamburger" viewBox="0 0 16 16" style="width: 16px; height: 16px;"><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
                </symbol>
                </defs></svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container" style='display: flex; flex-direction: row; justify-content: space-around'>
            <ul class="u-nav u-spacing-30 u-unstyled u-nav-1" style='height:100%'>
                <li class="u-nav-item">     <a class="titlemainmenu mainmenu1 u-border-4 u-border-active-custom-color-1 u-border-hover-custom-color-1 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-1 u-text-grey-90 u-text-hover-custom-color-1" href="/" style="padding: 0px 0;">首页</a>
                </li><li class="u-nav-item"><a class="titlemainmenu mainmenu2 u-border-4 u-border-active-custom-color-1 u-border-hover-custom-color-1 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-1 u-text-grey-90 u-text-hover-custom-color-1" style="padding: 0px 0;">农贸市场设计</a>
                </li><li class="u-nav-item"><a class="titlemainmenu mainmenu3 u-border-4 u-border-active-custom-color-1 u-border-hover-custom-color-1 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-1 u-text-grey-90 u-text-hover-custom-color-1" style="padding: 0px 0; cursor:pointer">农贸市场运营</a>
                </li><li class="u-nav-item"><a class="titlemainmenu mainmenu4 u-border-4 u-border-active-custom-color-1 u-border-hover-custom-color-1 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-1 u-text-grey-90 u-text-hover-custom-color-1" style="padding: 0px 0; cursor:pointer">智能菜场</a>
                </li><li class="u-nav-item"><a class="titlemainmenu mainmenu5 u-border-4 u-border-active-custom-color-1 u-border-hover-custom-color-1 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-1 u-text-grey-90 u-text-hover-custom-color-1" style="padding: 0px 0; cursor:pointer">农贸市场投资</a>
                </li><li class="u-nav-item"><a class="titlemainmenu mainmenu6 u-border-4 u-border-active-custom-color-1 u-border-hover-custom-color-1 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-1 u-text-grey-90 u-text-hover-custom-color-1" style="padding: 0px 0; cursor:pointer">农贸新闻资讯</a>
                </li><li class="u-nav-item"><a class="titlemainmenu mainmenu7 u-border-4 u-border-active-custom-color-1 u-border-hover-custom-color-1 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-1 u-text-grey-90 u-text-hover-custom-color-1" style="padding: 0px 0; cursor:pointer;">光影集团</a></li>
            </ul>
            <div class='free-consultation'>
              <img src='/N1/images/phonering.png' style='margin:auto 5px auto 0; height: 20px'><span style='font-style: italic'>19957895916</span>
            </div>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-menu-close"></div>
              <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                  <li class="u-nav-item"><a class="u-button-style u-nav-link titlemainmenu mainmenu1" href="/" style="padding: 10px 0;">首页</a></li>
                  <li class="u-nav-item"><a class="u-button-style u-section-1 titlemainmenu mainmenu2" style="padding: 10px 0;">农贸市场设计</a></li>
                  <li class="u-nav-item"><a class="u-button-style u-section-1 titlemainmenu mainmenu3" style="padding: 10px 0;">农贸市场运营</a></li>
                  <li class="u-nav-item"><a class="u-button-style u-section-1 titlemainmenu mainmenu4" style="padding: 10px 0;">智能菜场</a></li>
                  <li class="u-nav-item"><a class="u-button-style u-section-1 titlemainmenu mainmenu5" style="padding: 10px 0;">农贸市场投资</a></li>
                  <li class="u-nav-item"><a class="u-button-style u-section-1 titlemainmenu mainmenu6" style="padding: 10px 0;">农贸新闻资讯</a></li>
                  <li class="u-nav-item"><a class="u-button-style u-section-1 titlemainmenu mainmenu7" style="padding: 10px 0;">光影集团</a></li>
              </ul>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div>
    </header>
    <section class="u-clearfix u-grey-5 u-section-1 titlesubmenu mainmenu2" style='position: fixed; display:none' id="carousel_80dd">
      <div class="u-clearfix u-sheet u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-sheet-1">
        <div class="u-clearfix u-expanded-width-xs u-gutter-4 u-layout-wrap u-layout-wrap-1" style="width:800px">
          <div class="u-gutter-0 u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-left-cell u-size-10 u-size-20-md u-layout-cell-1" data-href="/sj/c1.html">
                <div class="u-container-layout u-valign-middle-lg u-container-layout-1">
                  <img class="u-image u-image-contain u-image-1" SRC="/N1/images/books.png">
                  <p class="u-align-center u-text u-text-1">农贸市场设计案例</p>
                </div>
              </div>
              <div class="u-container-style u-layout-cell u-size-10 u-size-20-md u-layout-cell-2" data-href="/sj/c2.html">
                <div class="u-container-layout u-valign-middle-lg u-valign-middle-xl u-container-layout-2">
                  <img SRC="/N1/images/_new85.png" alt="" class="u-image u-image-contain u-image-default u-image-2">
                  <p class="u-align-center u-text u-text-2">农贸建筑设计</p>
                </div>
              </div>
              <div class="u-align-left u-container-style u-layout-cell u-size-10 u-size-20-md u-layout-cell-3" data-href="/sj/c3.html">
                <div class="u-container-layout u-container-layout-3">
                  <img SRC="/N1/images/world.png" alt="" class="u-image u-image-contain u-image-default u-image-3">
                  <p class="u-align-center u-text u-text-3">5G智能设计</p>
                </div>
              </div>
              <div class="u-align-center-lg u-align-center-xl u-container-style u-layout-cell u-size-10 u-size-30-md u-layout-cell-4" data-href="/sj/sjhz.html">
                <div class="u-container-layout u-valign-middle-xl u-container-layout-4">
                  <img SRC="/N1/images/menu.png" alt="" class="u-image u-image-contain u-image-default u-image-4">
                  <p class="u-align-center-lg u-align-center-md u-align-center-sm u-align-center-xs u-text u-text-4">设计合作流程</p>
                </div>
              </div>
              <div class="u-align-center-lg u-align-center-xl u-container-style u-layout-cell u-right-cell u-size-10 u-size-30-md u-layout-cell-5" data-href="/sj/zfhz.html">
                <div class="u-container-layout u-valign-middle-xl u-container-layout-5">
                  <img SRC="/N1/images/Handshake.png" alt="" class="u-image u-image-contain u-image-default u-image-5">
                  <p class="u-align-center-lg u-align-center-md u-align-center-sm u-align-center-xs u-text u-text-5">城市智慧菜场建设</p>
                </div>
              </div>
              <div class="u-align-center-lg u-align-center-xl u-container-style u-layout-cell u-right-cell u-size-10 u-size-30-md u-layout-cell-5" data-href="/sj/nmscdw.html">
                <div class="u-container-layout u-valign-middle-xl u-container-layout-5">
                  <img SRC="/N1/images/world.png" alt="" class="u-image u-image-contain u-image-default u-image-5">
                  <p class="u-align-center-lg u-align-center-md u-align-center-sm u-align-center-xs u-text u-text-5">农贸市场定位策划</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-grey-5 u-section-1 titlesubmenu mainmenu3" style='position: fixed; display:none' id="carousel_80dd1">
      <div class="u-clearfix u-sheet u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-sheet-1">
        <div class="u-clearfix u-expanded-width-xs u-gutter-4 u-layout-wrap u-layout-wrap-1" style="width:800px">
          <div class="u-gutter-0 u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-left-cell u-size-10 u-size-20-md u-layout-cell-1" data-href="/N2/p10.php">
                <div class="u-container-layout u-valign-middle-lg u-container-layout-1">
                  <img class="u-image u-image-contain u-image-1" SRC="/N1/images/books.png">
                  <p class="u-align-center u-text u-text-1">农贸运营模式</p>
                </div>
              </div>
              <div class="u-container-style u-layout-cell u-size-10 u-size-20-md u-layout-cell-2" data-href="/N2/p11.php">
                <div class="u-container-layout u-valign-middle-lg u-valign-middle-xl u-container-layout-2">
                  <img SRC="/N1/images/_new85.png" alt="" class="u-image u-image-contain u-image-default u-image-2">
                  <p class="u-align-center u-text u-text-2">农贸市场招商</p>
                </div>
              </div>
              <div class="u-align-left u-container-style u-layout-cell u-size-10 u-size-20-md u-layout-cell-3" data-href="/N2/p12.php">
                <div class="u-container-layout u-container-layout-3">
                  <img SRC="/N1/images/world.png" alt="" class="u-image u-image-contain u-image-default u-image-3">
                  <p class="u-align-center u-text u-text-3">农贸市场电商</p>
                </div>
              </div>
              <div class="u-align-center-lg u-align-center-xl u-container-style u-layout-cell u-size-10 u-size-30-md u-layout-cell-4" data-href="/N3/p13.php">
                <div class="u-container-layout u-valign-middle-xl u-container-layout-4">
                  <img SRC="/N1/images/menu.png" alt="" class="u-image u-image-contain u-image-default u-image-4">
                  <p class="u-align-center-lg u-align-center-md u-align-center-sm u-align-center-xs u-text u-text-4">农贸综合体</p>
                </div>
              </div>
              <div class="u-align-center-lg u-align-center-xl u-container-style u-layout-cell u-right-cell u-size-10 u-size-30-md u-layout-cell-5" data-href="/N3/p14.php">
                <div class="u-container-layout u-valign-middle-xl u-container-layout-5">
                  <img SRC="/N1/images/Handshake.png" alt="" class="u-image u-image-contain u-image-default u-image-5">
                  <p class="u-align-center-lg u-align-center-md u-align-center-sm u-align-center-xs u-text u-text-5"> 菜原佳佳加盟 </p>
                </div>
              </div>
              <div class="u-align-center-lg u-align-center-xl u-container-style u-layout-cell u-right-cell u-size-10 u-size-30-md u-layout-cell-6" data-href="/sj/c4.html">
                <div class="u-container-layout u-valign-middle-xl u-container-layout-5">
                  <img SRC="/N1/images/world.png" alt="" class="u-image u-image-contain u-image-default u-image-5">
                  <p class="u-align-center-lg u-align-center-md u-align-center-sm u-align-center-xs u-text u-text-5"> 农贸运营案例 </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-grey-5 u-section-1 titlesubmenu mainmenu4" style='position: fixed; display:none' id="carousel_80dd12">
      <div class="u-clearfix u-sheet u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-sheet-1">
        <div class="u-clearfix u-expanded-width-xs u-gutter-4 u-layout-wrap u-layout-wrap-1">
          <div class="u-gutter-0 u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-left-cell u-size-15 u-size-20-md u-layout-cell-1" data-href="/N3/p17.php">
                <div class="u-container-layout u-valign-middle-lg u-container-layout-1">
                  <img class="u-image u-image-contain u-image-1" SRC="/N1/images/books.png">
                  <p class="u-align-center u-text u-text-1">5G智能设备</p>
                </div>
              </div>
              <div class="u-container-style u-layout-cell u-size-15 u-size-20-md u-layout-cell-2" data-href="/N3/p18.php">
                <div class="u-container-layout u-valign-middle-lg u-valign-middle-xl u-container-layout-2">
                  <img SRC="/N1/images/_new85.png" alt="" class="u-image u-image-contain u-image-default u-image-2">
                  <p class="u-align-center u-text u-text-2">智能软件</p>
                </div>
              </div>
              <div class="u-align-left u-container-style u-layout-cell u-size-15 u-size-20-md u-layout-cell-3" data-href="/N3/p19.php">
                <div class="u-container-layout u-container-layout-3">
                  <img SRC="/N1/images/world.png" alt="" class="u-image u-image-contain u-image-default u-image-3">
                  <p class="u-align-center u-text u-text-3">智能城市应用</p>
                </div>
              </div>
              <div class="u-align-center-lg u-align-center-xl u-container-style u-layout-cell u-size-15 u-size-30-md u-layout-cell-4" data-href="/N1/p20.php?category=3">
                <div class="u-container-layout u-valign-middle-xl u-container-layout-4">
                  <img SRC="/N1/images/menu.png" alt="" class="u-image u-image-contain u-image-default u-image-4">
                  <p class="u-align-center-lg u-align-center-md u-align-center-sm u-align-center-xs u-text u-text-4">5G智能设计</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-grey-5 u-section-1 titlesubmenu mainmenu5" style='position: fixed; display:none' id="carousel_80dd123">
      <div class="u-clearfix u-sheet u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-sheet-1">
        <div class="u-clearfix u-expanded-width-xs u-gutter-4 u-layout-wrap u-layout-wrap-1">
          <div class="u-gutter-0 u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-left-cell u-size-15 u-size-20-md u-layout-cell-1" data-href="/N4/p21.php">
                <div class="u-container-layout u-valign-middle-lg u-container-layout-1">
                  <img class="u-image u-image-contain u-image-1" SRC="/N1/images/books.png">
                  <p class="u-align-center u-text u-text-1">我要投资农贸</p>
                </div>
              </div>
              <div class="u-container-style u-layout-cell u-size-15 u-size-20-md u-layout-cell-2" data-href="/N4/p22.php">
                <div class="u-container-layout u-valign-middle-lg u-valign-middle-xl u-container-layout-2">
                  <img SRC="/N1/images/_new85.png" alt="" class="u-image u-image-contain u-image-default u-image-2">
                  <p class="u-align-center u-text u-text-2">我有农贸项目</p>
                </div>
              </div>
              <div class="u-align-left u-container-style u-layout-cell u-size-15 u-size-20-md u-layout-cell-3" data-href="/N4/p23.php">
                <div class="u-container-layout u-container-layout-3">
                  <img SRC="/N1/images/world.png" alt="" class="u-image u-image-contain u-image-default u-image-3">
                  <p class="u-align-center u-text u-text-3">政府投资合作</p>
                </div>
              </div>
              <div class="u-align-center-lg u-align-center-xl u-container-style u-layout-cell u-size-15 u-size-30-md u-layout-cell-4" data-href="/N4/p24.php">
                <div class="u-container-layout u-valign-middle-xl u-container-layout-4">
                  <img SRC="/N1/images/menu.png" alt="" class="u-image u-image-contain u-image-default u-image-4">
                  <p class="u-align-center-lg u-align-center-md u-align-center-sm u-align-center-xs u-text u-text-4">建设光影置业</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-grey-5 u-section-1 titlesubmenu mainmenu6" style='position: fixed; display:none' id="carousel_80dd1234">
      <div class="u-clearfix u-sheet u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-sheet-1">
        <div class="u-clearfix u-expanded-width-xs u-gutter-4 u-layout-wrap u-layout-wrap-1">
          <div class="u-gutter-0 u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-left-cell u-size-15 u-size-20-md u-layout-cell-1" data-href="/N1/p25.php?category=1">
                <div class="u-container-layout u-valign-middle-lg u-container-layout-1">
                  <img class="u-image u-image-contain u-image-1" SRC="/N1/images/books.png">
                  <p class="u-align-center u-text u-text-1">农贸设计百科</p>
                </div>
              </div>
              <div class="u-container-style u-layout-cell u-size-15 u-size-20-md u-layout-cell-2" data-href="/N1/p25.php?category=2">
                <div class="u-container-layout u-valign-middle-lg u-valign-middle-xl u-container-layout-2">
                  <img SRC="/N1/images/_new85.png" alt="" class="u-image u-image-contain u-image-default u-image-2">
                  <p class="u-align-center u-text u-text-2">农贸新闻资讯</p>
                </div>
              </div>
              <div class="u-align-left u-container-style u-layout-cell u-size-15 u-size-20-md u-layout-cell-3" data-href="/N1/p25.php?category=3">
                <div class="u-container-layout u-container-layout-3">
                  <img SRC="/N1/images/world.png" alt="" class="u-image u-image-contain u-image-default u-image-3">
                  <p class="u-align-center u-text u-text-3">光影新闻动态</p>
                </div>
              </div>
              <div class="u-align-center-lg u-align-center-xl u-container-style u-layout-cell u-size-15 u-size-30-md u-layout-cell-4" data-href="/N1/p25.php?category=4">
                <div class="u-container-layout u-valign-middle-xl u-container-layout-4">
                  <img SRC="/N1/images/menu.png" alt="" class="u-image u-image-contain u-image-default u-image-4">
                  <p class="u-align-center-lg u-align-center-md u-align-center-sm u-align-center-xs u-text u-text-4">政府政策文件</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-grey-5 u-section-1 titlesubmenu mainmenu7" style='position: fixed; display:none' id="carousel_80dd12345">
      <div class="u-clearfix u-sheet u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-sheet-1">
        <div class="u-clearfix u-expanded-width-xs u-gutter-4 u-layout-wrap u-layout-wrap-1">
          <div class="u-gutter-0 u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-left-cell u-size-20 u-size-20-md u-layout-cell-1" data-href="/N4/p34.php">
                <div class="u-container-layout u-valign-middle-lg u-container-layout-1">
                  <img class="u-image u-image-contain u-image-1" SRC="/N1/images/books.png">
                  <p class="u-align-center u-text u-text-1">公司简介</p>
                </div>
              </div>
              <div class="u-container-style u-layout-cell u-size-20 u-size-20-md u-layout-cell-2" data-href="/N5/p35.php">
                <div class="u-container-layout u-valign-middle-lg u-valign-middle-xl u-container-layout-2">
                  <img SRC="/N1/images/_new85.png" alt="" class="u-image u-image-contain u-image-default u-image-2">
                  <p class="u-align-center u-text u-text-2">团队</p>
                </div>
              </div>
              <div class="u-align-left u-container-style u-layout-cell u-size-20 u-size-20-md u-layout-cell-3" data-href="/N5/p36.php">
                <div class="u-container-layout u-container-layout-3">
                  <img SRC="/N1/images/world.png" alt="" class="u-image u-image-contain u-image-default u-image-3">
                  <p class="u-align-center u-text u-text-3">联系我们</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script>
        $(window).scroll(function(event) {
          if ($(window).scrollTop() >= 40) $("header, .titlesubmenu").addClass('narrow');
          else if ($(window).scrollTop() <= 0) $("header, .titlesubmenu").removeClass('narrow');
        })
        $(document).ready(function() {
            let mousemove = false;
            $(".titlemainmenu").each(function(ind, ele) {
                if (ind == 0) {
                    $(this).attr('href','/N1/p1.php');
                } else {
                    $(this).attr('href','javascript:void(0)');
                }
            });
            let isMouseOnSubMenu = false;
            $(".titlemainmenu").hover(function() {
              $("section.titlesubmenu").css('display', 'none');
                mousemove = 0;
                for (let i = 1; i <= 7; i++) {
                    if ($(this).hasClass('mainmenu' + i)) {
                        $(this).css('color','#ff6500');
                        $('section.mainmenu' + i).css('box-shadow', ' 0 10px 15px rgba(0,0,0,.1)').css('z-index', '9999').slideDown();
                        // mousemove = i;
                    }
                }
                $('.active1').removeClass('active1');
                $(this).addClass('active1')
            }, function() {
                for (let i = 1; i <= 7; i++) {
                    if ($(this).hasClass('mainmenu' + i)) {
                        $('section.mainmenu' + i).css('z-index', '999');
                        setTimeout(() => {
                          if (mousemove == i && i > 1) return;
                          if (i == 1) {
                              $(this).removeClass('active1'); return;
                          }
                          if (isMouseOnSubMenu) return;
                          $(this).css('color','');
                          $(this).removeClass('active1');
                          $('section.mainmenu' + i).css('display', 'none');
                        }, 100);
                    }
                }
            });

            $("section.titlesubmenu").hover(function() {
              $(this).css('box-shadow', ' 0 10px 15px rgba(0,0,0,.1)').slideDown();
              for (let i = 1; i <= 7; i++) {
                  if ($(this).hasClass('mainmenu' + i)) {
                      mousemove = i;
                      $('.active1').removeClass('active1')
                      $("a.mainmenu" + i).addClass('active1');
                      break;
                  }
              }
              isMouseOnSubMenu = true;
            }, function() {
              $("section.titlesubmenu").css('display', 'none');
              $(".active1").removeClass('active1');
              mousemove = -1;
              isMouseOnSubMenu = false;
            });

            $("section.titlesubmenu div.u-layout-cell").hover(function() {
              $(this).css('cursor', 'pointer').find('p').css('color','#ff6500');
            }, function() {
                $(this).find('p').css('color','');
            });
            $('section.titlesubmenu div[data-href]').click(function() {
                window.open($(this).attr('data-href'), '_blank');
            });

            $("section.titlesubmenu div.u-layout-row > div").each(function() {
                if (window.location.href.toLowerCase().indexOf(($(this).attr('data-href') || "nothinghref").toLowerCase()) != -1) {
                    $(this).find("p").addClass('active-submenu');
                }
            })

        })

    </script>

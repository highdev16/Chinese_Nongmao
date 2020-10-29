<?php
error_reporting(0);
$url = basename($_SERVER['REQUEST_URI']);
$url = explode('?', $url);
$t = explode('/' . $url[0], $_SERVER['REQUEST_URI']);
$dirname = ($t[0]);
$filename = strtolower($url[0]);
$oname = explode('.', $dirname . "/" . $filename);
$oname = $oname[0];
?><!DOCTYPE html><html style="font-size: 16px;" lang='cn'><head>
<?php
$arr = array(1,2,5,6,37,10,11,12,13,14,17,18,19,21,22,23,24,25,34,35,36);
$origin_url = ($_SERVER['REQUEST_URI']);
$flag = false;
foreach ($arr as $urlNumber) {
  if (strpos($origin_url, "p$urlNumber.php") !== FALSE) {
    $flag = true;
    if (!file_exists("../title_description_keywords.txt")) {
      file_put_contents("../title_description_keywords.txt", "{}");
    }
    $tdkFile = json_decode(file_get_contents("../title_description_keywords.txt"), true);
    $key = $urlNumber;
    if ($urlNumber == 2 || $urlNumber == 25) {
      for ($k = 1; $k <= 4; $k++) {
        if (strpos($origin_url, "category=" . $k) !== FALSE) {
          $urlNumber .= ".$k"; break;
        }
      } 
      if ($k > 4) exit;
    }    
    if (array_key_exists("$urlNumber", $tdkFile) && sizeof(array_keys($tdkFile["$urlNumber"])) == 3) {
      $metaData = $tdkFile["$urlNumber"];
    }
    else $metaData = array("keywords" => "", "title" => "", "description" => "");
    echo "<meta name='keywords' content='" . htmlspecialchars($metaData['keywords']) . "'>";
    echo "<meta name='description' content='" . htmlspecialchars($metaData['description']) . "'>";    
    echo "<title>" .  htmlspecialchars($metaData['title']) . "</title>";
    break;
  }
}

if (!$flag) {
  if (strpos($origin_url, "p7.php") !== FALSE) {
    include ('../N1/dbconfig.php');
    $db = getDbInstance();
    $rows = $db->query("SELECT * FROM cases WHERE id = " . $_REQUEST['r']);
    $data = $rows[0];
    echo "<meta name='keywords' content='" . htmlspecialchars($data['keywords']) . "'>";
    echo "<meta name='description' content='" . htmlspecialchars($data['description']) . "'>";
    echo "<title>" . htmlspecialchars($data['name']) . "</title>";
  } else if (strpos($origin_url, "p26.php") !== FALSE) {
    include ('../N1/dbconfig.php');
    $db = getDbInstance();
    $rows = $db->query("SELECT * FROM news WHERE id = " . $_REQUEST['r']);
    $data = $rows[0];
    echo "<meta name='keywords' content='" . htmlspecialchars($data['keywords']) . "'>";
    echo "<meta name='description' content='" . htmlspecialchars($data['description']) . "'>";
    echo "<title>" . htmlspecialchars($data['title']) . "</title>";
  }
}
?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">        
    <meta name="page_type" content="np-template-header-footer-from-plugin">    
    <link rel="stylesheet" href="/N1/p2.css" media="screen">
    <link rel="stylesheet" href="/N1/nicepage.css" media="screen">
    <link rel="stylesheet" href="/N1/images/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="<?php echo $oname; ?>.css" media="screen">    
    <script class="u-script" type="text/javascript" src="/N1/jquery.js" defer=""></script>
    <script src="/js/jquery1.js"></script>
    <script class="u-script" type="text/javascript" src="/N1/nicepage.js" defer=""></script>
    <link id="u-theme-google-font" rel="stylesheet" href="/css/googleapifont.css">
    <meta property="og:title" content="<?php echo $bigTitle; ?>">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#478ac9">
    <meta property="og:url" content="index.html">
    <link rel="stylesheet" href="/N1/header.css" media="screen">   
    <link rel="stylesheet" href="<?php echo $oname; ?>_mobile.css" media="screen">                 
  </head>
  <body class="u-body">
      <header class="u-align-left u-clearfix u-header u-sticky u-white u-header" id="sec-0bb0" style=' z-index:9999999'>
      <div class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-xl u-sheet-1 titlebar">
        <a href="/" class="logo-image u-image u-logo u-image-1" data-image-width="349" data-image-height="98" style='height: 100%;display: flex; flex-direction: column; justify-content: space-around;'>
          <img src="/N1/images/logo.png" class="u-logo-image u-logo-image-1" data-image-width="242.1137">
        </a>
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1" style='opacity: 1; display: flex; display: -webkit-flex; flex-direction: column; justify-content: space-around; -webkit-justify-content: space-around'>
          <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0; font-weight: 700; text-transform: uppercase;">
            <a class="u-border-4  u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-palette-2-base" href="#">
              <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><symbol id="menu-hamburger" viewBox="0 0 16 16" style="width: 16px; height: 16px;"><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
                </symbol>
                </defs></svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container" style='display: flex; flex-direction: row; justify-content: space-around'>
            <ul class="u-nav u-spacing-30 u-unstyled u-nav-1" style='height:100%'>
                <li class="u-nav-item"><a class="titlemainmenu mainmenu1  u-button-style u-nav-link u-text-active-custom-color-1 " href="/" style="padding: 0px 0;">首页</a></li>
                <li class="u-nav-item"><a class="titlemainmenu mainmenu2  u-button-style u-nav-link u-text-active-custom-color-1 " style="padding: 0px 0;">农贸市场设计</a></li>
                <li class="u-nav-item"><a class="titlemainmenu mainmenu3  u-button-style u-nav-link u-text-active-custom-color-1 " style="padding: 0px 0; cursor:pointer">农贸市场运营</a></li>
                <li class="u-nav-item"><a class="titlemainmenu mainmenu4  u-button-style u-nav-link u-text-active-custom-color-1 " style="padding: 0px 0; cursor:pointer">智能菜场</a></li>
                <li class="u-nav-item"><a class="titlemainmenu mainmenu5  u-button-style u-nav-link u-text-active-custom-color-1 " style="padding: 0px 0; cursor:pointer">农贸市场投资</a></li>
                <li class="u-nav-item"><a class="titlemainmenu mainmenu6  u-button-style u-nav-link u-text-active-custom-color-1 " style="padding: 0px 0; cursor:pointer">农贸新闻资讯</a></li>
                <li class="u-nav-item"><a class="titlemainmenu mainmenu7  u-button-style u-nav-link u-text-active-custom-color-1 " style="padding: 0px 0; cursor:pointer;">光影集团</a></li>
            </ul>
            <div class='free-consultation'>
              <img src='/N1/images/phonering.png' style='margin:auto 5px auto 0; height: 20px'><span style='font-style: italic'>400-000-3840</span>
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
              <div class="u-container-style u-layout-cell u-left-cell u-size-10 u-size-20-md u-layout-cell-1" my-href="/zxsj/">
                <div class="u-container-layout u-valign-middle-lg u-container-layout-1">
                  <img class="u-image u-image-contain u-image-1" SRC="/N1/images/books.png">
                  <p class="u-align-center u-text u-text-1">农贸市场设计案例</p>
                </div>
              </div>
              <div class="u-container-style u-layout-cell u-size-10 u-size-20-md u-layout-cell-2" my-href="/jzsj/">
                <div class="u-container-layout u-valign-middle-lg u-valign-middle-xl u-container-layout-2">
                  <img SRC="/N1/images/_new85.png" alt="" class="u-image u-image-contain u-image-default u-image-2">
                  <p class="u-align-center u-text u-text-2">农贸建筑设计</p>
                </div>
              </div>
              <div class="u-align-left u-container-style u-layout-cell u-size-10 u-size-20-md u-layout-cell-3" my-href="/znsj/">
                <div class="u-container-layout u-container-layout-3">
                  <img SRC="/N1/images/world.png" alt="" class="u-image u-image-contain u-image-default u-image-3">
                  <p class="u-align-center u-text u-text-3">5G智能设计</p>
                </div>
              </div>
              <div class="u-align-center-lg u-align-center-xl u-container-style u-layout-cell u-size-10 u-size-30-md u-layout-cell-4" my-href="/sj/sjhz.html">
                <div class="u-container-layout u-valign-middle-xl u-container-layout-4">
                  <img SRC="/N1/images/menu.png" alt="" class="u-image u-image-contain u-image-default u-image-4">
                  <p class="u-align-center-lg u-align-center-md u-align-center-sm u-align-center-xs u-text u-text-4">设计合作流程</p>
                </div>
              </div>
              <div class="u-align-center-lg u-align-center-xl u-container-style u-layout-cell u-right-cell u-size-10 u-size-30-md u-layout-cell-5" my-href="/sj/zfhz.html">
                <div class="u-container-layout u-valign-middle-xl u-container-layout-5">
                  <img SRC="/N1/images/Handshake.png" alt="" class="u-image u-image-contain u-image-default u-image-5">
                  <p class="u-align-center-lg u-align-center-md u-align-center-sm u-align-center-xs u-text u-text-5">城市智慧菜场建设</p>
                </div>
              </div>
              <div class="u-align-center-lg u-align-center-xl u-container-style u-layout-cell u-right-cell u-size-10 u-size-30-md u-layout-cell-5" my-href="/sj/nmscdw.html">
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
              <div class="u-container-style u-layout-cell u-left-cell u-size-10 u-size-20-md u-layout-cell-1" my-href="/yyms.html">
                <div class="u-container-layout u-valign-middle-lg u-container-layout-1">
                  <img class="u-image u-image-contain u-image-1" SRC="/N1/images/books.png">
                  <p class="u-align-center u-text u-text-1">农贸运营模式</p>
                </div>
              </div>
              <div class="u-container-style u-layout-cell u-size-10 u-size-20-md u-layout-cell-2" my-href="/nmyy/nmzs.html">
                <div class="u-container-layout u-valign-middle-lg u-valign-middle-xl u-container-layout-2">
                  <img SRC="/N1/images/_new85.png" alt="" class="u-image u-image-contain u-image-default u-image-2">
                  <p class="u-align-center u-text u-text-2">农贸市场招商</p>
                </div>
              </div>
              <div class="u-align-left u-container-style u-layout-cell u-size-10 u-size-20-md u-layout-cell-3" my-href="/nmyy/nmds.html">
                <div class="u-container-layout u-container-layout-3">
                  <img SRC="/N1/images/world.png" alt="" class="u-image u-image-contain u-image-default u-image-3">
                  <p class="u-align-center u-text u-text-3">农贸市场电商</p>
                </div>
              </div>
              <div class="u-align-center-lg u-align-center-xl u-container-style u-layout-cell u-size-10 u-size-30-md u-layout-cell-4" my-href="/nmyy/nmzht.html">
                <div class="u-container-layout u-valign-middle-xl u-container-layout-4">
                  <img SRC="/N1/images/menu.png" alt="" class="u-image u-image-contain u-image-default u-image-4">
                  <p class="u-align-center-lg u-align-center-md u-align-center-sm u-align-center-xs u-text u-text-4">农贸综合体</p>
                </div>
              </div>
              <div class="u-align-center-lg u-align-center-xl u-container-style u-layout-cell u-right-cell u-size-10 u-size-30-md u-layout-cell-5" my-href="/nmyy/cyjj.html">
                <div class="u-container-layout u-valign-middle-xl u-container-layout-5">
                  <img SRC="/N1/images/Handshake.png" alt="" class="u-image u-image-contain u-image-default u-image-5">
                  <p class="u-align-center-lg u-align-center-md u-align-center-sm u-align-center-xs u-text u-text-5"> 菜原佳佳加盟 </p>
                </div>
              </div>
              <div class="u-align-center-lg u-align-center-xl u-container-style u-layout-cell u-right-cell u-size-10 u-size-30-md u-layout-cell-6" my-href="/nmyy/">
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
              <div class="u-container-style u-layout-cell u-left-cell u-size-15 u-size-20-md u-layout-cell-1" my-href="/zn/znsb.html">
                <div class="u-container-layout u-valign-middle-lg u-container-layout-1">
                  <img class="u-image u-image-contain u-image-1" SRC="/N1/images/books.png">
                  <p class="u-align-center u-text u-text-1">5G智能设备</p>
                </div>
              </div>
              <div class="u-container-style u-layout-cell u-size-15 u-size-20-md u-layout-cell-2" my-href="/zn/znrj.html">
                <div class="u-container-layout u-valign-middle-lg u-valign-middle-xl u-container-layout-2">
                  <img SRC="/N1/images/_new85.png" alt="" class="u-image u-image-contain u-image-default u-image-2">
                  <p class="u-align-center u-text u-text-2">智能软件</p>
                </div>
              </div>
              <div class="u-align-left u-container-style u-layout-cell u-size-15 u-size-20-md u-layout-cell-3" my-href="/zn/csyy.html">
                <div class="u-container-layout u-container-layout-3">
                  <img SRC="/N1/images/world.png" alt="" class="u-image u-image-contain u-image-default u-image-3">
                  <p class="u-align-center u-text u-text-3">智能城市应用</p>
                </div>
              </div>
              <div class="u-align-center-lg u-align-center-xl u-container-style u-layout-cell u-size-15 u-size-30-md u-layout-cell-4" my-href="/znsj/">
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
              <div class="u-container-style u-layout-cell u-left-cell u-size-15 u-size-20-md u-layout-cell-1" my-href="/tz.html">
                <div class="u-container-layout u-valign-middle-lg u-container-layout-1">
                  <img class="u-image u-image-contain u-image-1" SRC="/N1/images/books.png">
                  <p class="u-align-center u-text u-text-1">我要投资农贸</p>
                </div>
              </div>
              <div class="u-container-style u-layout-cell u-size-15 u-size-20-md u-layout-cell-2" my-href="/rz.html">
                <div class="u-container-layout u-valign-middle-lg u-valign-middle-xl u-container-layout-2">
                  <img SRC="/N1/images/_new85.png" alt="" class="u-image u-image-contain u-image-default u-image-2">
                  <p class="u-align-center u-text u-text-2">我有农贸项目</p>
                </div>
              </div>
              <div class="u-align-left u-container-style u-layout-cell u-size-15 u-size-20-md u-layout-cell-3" my-href="/zhengfu.html">
                <div class="u-container-layout u-container-layout-3">
                  <img SRC="/N1/images/world.png" alt="" class="u-image u-image-contain u-image-default u-image-3">
                  <p class="u-align-center u-text u-text-3">政府投资合作</p>
                </div>
              </div>
              <div class="u-align-center-lg u-align-center-xl u-container-style u-layout-cell u-size-15 u-size-30-md u-layout-cell-4" my-href="/gyzy.html">
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
              <div class="u-container-style u-layout-cell u-left-cell u-size-15 u-size-20-md u-layout-cell-1" my-href="/sjbk/">
                <div class="u-container-layout u-valign-middle-lg u-container-layout-1">
                  <img class="u-image u-image-contain u-image-1" SRC="/N1/images/books.png">
                  <p class="u-align-center u-text u-text-1">农贸设计百科</p>
                </div>
              </div>
              <div class="u-container-style u-layout-cell u-size-15 u-size-20-md u-layout-cell-2" my-href="/news/">
                <div class="u-container-layout u-valign-middle-lg u-valign-middle-xl u-container-layout-2">
                  <img SRC="/N1/images/_new85.png" alt="" class="u-image u-image-contain u-image-default u-image-2">
                  <p class="u-align-center u-text u-text-2">农贸新闻资讯</p>
                </div>
              </div>
              <div class="u-align-left u-container-style u-layout-cell u-size-15 u-size-20-md u-layout-cell-3" my-href="/gyxw/">
                <div class="u-container-layout u-container-layout-3">
                  <img SRC="/N1/images/world.png" alt="" class="u-image u-image-contain u-image-default u-image-3">
                  <p class="u-align-center u-text u-text-3">光影新闻动态</p>
                </div>
              </div>
              <div class="u-align-center-lg u-align-center-xl u-container-style u-layout-cell u-size-15 u-size-30-md u-layout-cell-4" my-href="/gov/">
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
              <div class="u-container-style u-layout-cell u-left-cell u-size-20 u-size-20-md u-layout-cell-1" my-href="/about/certify.html">
                <div class="u-container-layout u-valign-middle-lg u-container-layout-1">
                  <img class="u-image u-image-contain u-image-1" SRC="/N1/images/books.png">
                  <p class="u-align-center u-text u-text-1">公司简介</p>
                </div>
              </div>
              <div class="u-container-style u-layout-cell u-size-20 u-size-20-md u-layout-cell-2" my-href="/about/contact.html">
                <div class="u-container-layout u-valign-middle-lg u-valign-middle-xl u-container-layout-2">
                  <img SRC="/N1/images/_new85.png" alt="" class="u-image u-image-contain u-image-default u-image-2">
                  <p class="u-align-center u-text u-text-2">团队</p>
                </div>
              </div>
              <div class="u-align-left u-container-style u-layout-cell u-size-20 u-size-20-md u-layout-cell-3" my-href="/about/">
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
                    $(this).attr('href','/');
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
                        // $(this).css('color','#ff6500');
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
            $('section.titlesubmenu div[my-href]').click(function() {
                window.open($(this).attr('my-href'), '_blank');
            });

            $("section.titlesubmenu div.u-layout-row > div").each(function() {
                if (window.location.href.toLowerCase().indexOf(($(this).attr('my-href') || "nothinghref").toLowerCase()) != -1
                  || window.location.href.toLowerCase().indexOf(($(this).attr('my-href') + "index.html").toLowerCase()) != -1
                  || window.location.href.toLowerCase().indexOf(($(this).attr('my-href') + "/index.html").toLowerCase()) != -1) {
                    $(this).find("p").addClass('active-submenu');
                    let parentObj = $(this).parent();
                    while (parentObj != null && !parentObj.hasClass('titlesubmenu')) {
                      parentObj = parentObj.parent();
                    }
                    if (parentObj == null) return;
                    for (let i = 2; i <= 7; i++) {
                      if (parentObj.hasClass('mainmenu' + i)) {
                        $("a.titlemainmenu.mainmenu" + i).addClass('active'); return;
                      }
                    }
                }
            });
        })

    </script>

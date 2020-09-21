<?php
$bigTitle = "首页";
include('header.php');
include('../N1/dbconfig.php');
?>      
<style>
  img.article-image {
    transition: transform .2s;
  }
  img.article-image:hover {
    transform: scale(1.1);
  }
  .features-area > div:hover {
    transform: scale(1.05, 1.05);
    z-index:9999;
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
    line-height: 292px;
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
    width: 1552px !important;
  }
  .image-cell {
    float:left;
    width: 30%;
    margin-left: 1.66666666666%;
    margin-right: 1.66666666666%;
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
  body * {
    font-family: "Helvetica Neue", Helvetica, "PingFang SC","Microsoft YaHei", 微软雅黑, "Hiragino Sans GB", Arial, sans-serif !important;
  }
</style>
    <section id="carousel_8f27" class="u-carousel u-carousel-duration-2250 u-slide u-block-29ef-1" data-u-ride="carousel" data-interval="5000">
      <ol class="u-absolute-hcenter u-carousel-indicators u-opacity u-opacity-55 u-block-29ef-2">
        <li data-u-target="#carousel_8f27" class="u-white" data-u-slide-to="0"></li>
      </ol>
      <div class="u-carousel-inner" role="listbox">
        <?php 
          $db = getDbInstance();
          $images = $db->query("SELECT * FROM banners ORDER BY morder");
          $flag = 0;
          foreach ($images as $image) {
            $flag++;
        ?>
        <div class="<?php echo $flag !== 1? "" : "u-active"; ?> u-align-left u-carousel-item u-clearfix u-image u-section-1-<?php echo $flag; ?>" style='background-image: url(/banners/<?php echo $image['image']; ?>);'>
          <div class="u-clearfix u-sheet u-sheet-1"></div>
        </div>        
        <?php } ?>
      </div>
      <a class="u-absolute-vcenter u-carousel-control u-carousel-control-prev u-hidden u-spacing-48 u-text-body-alt-color u-block-29ef-3" href="#carousel_8f27" role="button" data-u-slide="prev">
        <span aria-hidden="true">
          <svg viewBox="0 0 477.175 477.175"><path d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225
                    c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"></path></svg>
        </span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="u-absolute-vcenter u-carousel-control u-carousel-control-next u-hidden u-spacing-48 u-text-body-alt-color u-block-29ef-4" href="#carousel_8f27" role="button" data-u-slide="next">
        <span aria-hidden="true">
          <svg viewBox="0 0 477.175 477.175"><path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5
                    c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z"></path></svg>
        </span>
        <span class="sr-only">Next</span>
      </a>
    </section>
    <script src='../js/js/all.js'></script>
    <section class="u-clearfix u-section-2" id="sec-4fe7">
      <div class="u-clearfix u-sheet u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-sheet-1">
        <div class="features-area u-expanded-width u-list u-repeater u-list-1">
          <div class="u-align-center u-container-style u-image u-list-item u-repeater-item u-image-1">
            <div class="u-container-layout u-similar-container u-container-layout-1">
              <span class="u-icon u-icon-circle u-text-grey-50 u-icon-1">
                <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 267.5 267.5" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-a8e0"></use></svg>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 267.5 267.5" x="0px" y="0px" id="svg-a8e0" style="enable-background:new 0 0 267.5 267.5;"><path d="M256.975,100.34c0.041,0.736-0.013,1.485-0.198,2.229l-16.5,66c-0.832,3.325-3.812,5.663-7.238,5.681l-99,0.5  c-0.013,0-0.025,0-0.038,0H35c-3.444,0-6.445-2.346-7.277-5.688l-16.5-66.25c-0.19-0.764-0.245-1.534-0.197-2.289  C4.643,98.512,0,92.539,0,85.5c0-8.685,7.065-15.75,15.75-15.75S31.5,76.815,31.5,85.5c0,4.891-2.241,9.267-5.75,12.158  l20.658,20.814c5.221,5.261,12.466,8.277,19.878,8.277c8.764,0,17.12-4.162,22.382-11.135l33.95-44.984  C119.766,67.78,118,63.842,118,59.5c0-8.685,7.065-15.75,15.75-15.75s15.75,7.065,15.75,15.75c0,4.212-1.672,8.035-4.375,10.864  c0.009,0.012,0.02,0.022,0.029,0.035l33.704,45.108c5.26,7.04,13.646,11.243,22.435,11.243c7.48,0,14.514-2.913,19.803-8.203  l20.788-20.788C238.301,94.869,236,90.451,236,85.5c0-8.685,7.065-15.75,15.75-15.75s15.75,7.065,15.75,15.75  C267.5,92.351,263.095,98.178,256.975,100.34z M238.667,198.25c0-4.142-3.358-7.5-7.5-7.5h-194c-4.142,0-7.5,3.358-7.5,7.5v18  c0,4.142,3.358,7.5,7.5,7.5h194c4.142,0,7.5-3.358,7.5-7.5V198.25z"></path></svg>
              </span>
              <h5 class="u-text u-text-default u-text-1 graytitle" style='color: rgb(51, 51, 51); font-size: 18px'>市场调研</h5>
              <h3 class="u-align-center u-text u-text-2" style='color: rgb(102, 102, 102); font-size: 12px;  line-height: 20px'>调查规模人口 调查竞争对手3家 调查本地摊位大小和业态比例</h3>
            </div>
          </div>
          <div class="u-container-style u-image u-list-item u-repeater-item u-image-2" data-image-width="232" data-image-height="224">
            <div class="u-container-layout u-similar-container u-container-layout-2">
              <span class="u-icon u-icon-circle u-text-grey-50 u-icon-2">
                <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 54 54" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-82ee"></use></svg>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 54 54" x="0px" y="0px" id="svg-82ee" style="enable-background:new 0 0 54 54;"><g><path d="M51.22,21h-5.052c-0.812,0-1.481-0.447-1.792-1.197s-0.153-1.54,0.42-2.114l3.572-3.571
		c0.525-0.525,0.814-1.224,0.814-1.966c0-0.743-0.289-1.441-0.814-1.967l-4.553-4.553c-1.05-1.05-2.881-1.052-3.933,0l-3.571,3.571
		c-0.574,0.573-1.366,0.733-2.114,0.421C33.447,9.313,33,8.644,33,7.832V2.78C33,1.247,31.753,0,30.22,0H23.78
		C22.247,0,21,1.247,21,2.78v5.052c0,0.812-0.447,1.481-1.197,1.792c-0.748,0.313-1.54,0.152-2.114-0.421l-3.571-3.571
		c-1.052-1.052-2.883-1.05-3.933,0l-4.553,4.553c-0.525,0.525-0.814,1.224-0.814,1.967c0,0.742,0.289,1.44,0.814,1.966l3.572,3.571
		c0.573,0.574,0.73,1.364,0.42,2.114S8.644,21,7.832,21H2.78C1.247,21,0,22.247,0,23.78v6.439C0,31.753,1.247,33,2.78,33h5.052
		c0.812,0,1.481,0.447,1.792,1.197s0.153,1.54-0.42,2.114l-3.572,3.571c-0.525,0.525-0.814,1.224-0.814,1.966
		c0,0.743,0.289,1.441,0.814,1.967l4.553,4.553c1.051,1.051,2.881,1.053,3.933,0l3.571-3.572c0.574-0.573,1.363-0.731,2.114-0.42
		c0.75,0.311,1.197,0.98,1.197,1.792v5.052c0,1.533,1.247,2.78,2.78,2.78h6.439c1.533,0,2.78-1.247,2.78-2.78v-5.052
		c0-0.812,0.447-1.481,1.197-1.792c0.751-0.312,1.54-0.153,2.114,0.42l3.571,3.572c1.052,1.052,2.883,1.05,3.933,0l4.553-4.553
		c0.525-0.525,0.814-1.224,0.814-1.967c0-0.742-0.289-1.44-0.814-1.966l-3.572-3.571c-0.573-0.574-0.73-1.364-0.42-2.114
		S45.356,33,46.168,33h5.052c1.533,0,2.78-1.247,2.78-2.78V23.78C54,22.247,52.753,21,51.22,21z M52,30.22
		C52,30.65,51.65,31,51.22,31h-5.052c-1.624,0-3.019,0.932-3.64,2.432c-0.622,1.5-0.295,3.146,0.854,4.294l3.572,3.571
		c0.305,0.305,0.305,0.8,0,1.104l-4.553,4.553c-0.304,0.304-0.799,0.306-1.104,0l-3.571-3.572c-1.149-1.149-2.794-1.474-4.294-0.854
		c-1.5,0.621-2.432,2.016-2.432,3.64v5.052C31,51.65,30.65,52,30.22,52H23.78C23.35,52,23,51.65,23,51.22v-5.052
		c0-1.624-0.932-3.019-2.432-3.64c-0.503-0.209-1.021-0.311-1.533-0.311c-1.014,0-1.997,0.4-2.761,1.164l-3.571,3.572
		c-0.306,0.306-0.801,0.304-1.104,0l-4.553-4.553c-0.305-0.305-0.305-0.8,0-1.104l3.572-3.571c1.148-1.148,1.476-2.794,0.854-4.294
		C10.851,31.932,9.456,31,7.832,31H2.78C2.35,31,2,30.65,2,30.22V23.78C2,23.35,2.35,23,2.78,23h5.052
		c1.624,0,3.019-0.932,3.64-2.432c0.622-1.5,0.295-3.146-0.854-4.294l-3.572-3.571c-0.305-0.305-0.305-0.8,0-1.104l4.553-4.553
		c0.304-0.305,0.799-0.305,1.104,0l3.571,3.571c1.147,1.147,2.792,1.476,4.294,0.854C22.068,10.851,23,9.456,23,7.832V2.78
		C23,2.35,23.35,2,23.78,2h6.439C30.65,2,31,2.35,31,2.78v5.052c0,1.624,0.932,3.019,2.432,3.64
		c1.502,0.622,3.146,0.294,4.294-0.854l3.571-3.571c0.306-0.305,0.801-0.305,1.104,0l4.553,4.553c0.305,0.305,0.305,0.8,0,1.104
		l-3.572,3.571c-1.148,1.148-1.476,2.794-0.854,4.294c0.621,1.5,2.016,2.432,3.64,2.432h5.052C51.65,23,52,23.35,52,23.78V30.22z"></path><path d="M27,18c-4.963,0-9,4.037-9,9s4.037,9,9,9s9-4.037,9-9S31.963,18,27,18z M27,34c-3.859,0-7-3.141-7-7s3.141-7,7-7
		s7,3.141,7,7S30.859,34,27,34z"></path>
</g></svg>
              </span>
              <h5 class="u-align-center u-text u-text-default u-text-3" style='color: rgb(51, 51, 51); font-size: 18px'>业态分布</h5>
              <h3 class="u-align-center u-text u-text-default u-text-4" style='color: rgb(102, 102, 102); font-size: 12px;  line-height: 20px; margin-left: auto; margin-right: auto'>平面设计、业态分布、人流动线、<br>平衡人气设计</h3>
            </div>
          </div>
          <div class="u-align-center u-container-style u-image u-list-item u-repeater-item u-image-3" data-image-width="232" data-image-height="224">
            <div class="u-container-layout u-similar-container u-container-layout-3">
              <span class="u-icon u-icon-circle u-text-grey-50 u-icon-3">
                <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 59.999 59.999" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-ec38"></use></svg>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 59.999 59.999" x="0px" y="0px" id="svg-ec38" style="enable-background:new 0 0 59.999 59.999;"><g><path d="M36.176,49.999c-1.93,0-3.5,1.57-3.5,3.5s1.57,3.5,3.5,3.5s3.5-1.57,3.5-3.5S38.105,49.999,36.176,49.999z M36.176,54.999
		c-0.827,0-1.5-0.673-1.5-1.5s0.673-1.5,1.5-1.5s1.5,0.673,1.5,1.5S37.003,54.999,36.176,54.999z"></path><path d="M40.676,36.999c2.206,0,4-1.794,4-4s-1.794-4-4-4s-4,1.794-4,4S38.469,36.999,40.676,36.999z M40.676,30.999
		c1.103,0,2,0.897,2,2s-0.897,2-2,2s-2-0.897-2-2S39.573,30.999,40.676,30.999z"></path><path d="M16.676,11.999c0.256,0,0.512-0.098,0.707-0.293l2-2c0.391-0.391,0.391-1.023,0-1.414s-1.023-0.391-1.414,0l-2,2
		c-0.391,0.391-0.391,1.023,0,1.414C16.164,11.901,16.42,11.999,16.676,11.999z"></path><path d="M52.676,29.747c0-0.88-0.343-1.707-0.965-2.329l-0.557-0.557c0.949-0.84,1.521-2.055,1.521-3.362
		c0-2.481-2.019-4.5-4.5-4.5c-0.182,0-0.362,0.018-0.54,0.04c0.022-0.179,0.04-0.357,0.04-0.54c0-2.481-2.019-4.5-4.5-4.5
		c-0.182,0-0.362,0.018-0.54,0.04c0.022-0.179,0.04-0.357,0.04-0.54c0-2.481-2.019-4.5-4.5-4.5c-0.182,0-0.362,0.018-0.54,0.04
		c0.022-0.179,0.04-0.357,0.04-0.54c0-2.481-2.019-4.5-4.5-4.5c-1.308,0-2.522,0.573-3.362,1.521l-0.794-0.794l-3.763-3.763
		c-1.285-1.285-3.375-1.285-4.658,0L8.286,13.275c-1.283,1.285-1.283,3.374,0,4.659l3.763,3.763l4.91,4.91
		c-1.356,0.776-2.283,2.221-2.283,3.892c0,1.563,0.803,2.941,2.017,3.748c0.061,0.081,0.132,0.161,0.227,0.242l10.756,10.715v1.796
		h-2v13h18h8v-13h-2V43.97c1.913-1.621,3-3.952,3-6.471c0-1.74-0.543-3.43-1.536-4.852l0.571-0.571
		C52.333,31.454,52.676,30.627,52.676,29.747z M50.676,23.499c0,0.768-0.354,1.479-0.937,1.947l-3.511-3.511
		c0.468-0.583,1.18-0.937,1.947-0.937C49.554,20.999,50.676,22.12,50.676,23.499z M45.676,18.499c0,0.768-0.354,1.479-0.937,1.947
		l-3.511-3.511c0.468-0.583,1.18-0.937,1.947-0.937C44.554,15.999,45.676,17.12,45.676,18.499z M40.676,13.499
		c0,0.768-0.354,1.479-0.937,1.947l-3.511-3.511c0.468-0.583,1.18-0.937,1.947-0.937C39.554,10.999,40.676,12.12,40.676,13.499z
		 M33.176,5.999c1.379,0,2.5,1.121,2.5,2.5c0,0.768-0.354,1.479-0.937,1.947l-3.511-3.511C31.696,6.353,32.408,5.999,33.176,5.999z
		 M9.7,16.521c-0.504-0.505-0.504-1.326,0-1.831L22.012,2.378c0.125-0.125,0.271-0.219,0.426-0.282
		c0.07-0.029,0.149-0.028,0.223-0.044c0.178-0.038,0.354-0.038,0.532,0c0.074,0.016,0.153,0.015,0.223,0.044
		c0.155,0.063,0.3,0.157,0.426,0.282l2.349,2.349L12.049,18.869L9.7,16.521z M27.605,6.141l1.178,1.178l5,5l0.573,0.573l4.427,4.427
		l0.573,0.573l4.427,4.427l0.573,0.573l5,5l0.94,0.94c0.505,0.505,0.505,1.325,0,1.83L49.859,31.1l0,0L37.985,42.975
		c-0.503,0.504-1.326,0.506-1.831,0l-7.975-7.976h0.996c2.481,0,4.5-2.019,4.5-4.5s-2.019-4.5-4.5-4.5h-9.997l-5.716-5.716
		L27.605,6.141z M18.636,28.061l0.415-0.047c0.041-0.006,0.082-0.015,0.124-0.015h10c1.379,0,2.5,1.121,2.5,2.5s-1.121,2.5-2.5,2.5
		h-2.996h-2.828h-4.176c-1.379,0-2.5-1.121-2.5-2.5C16.676,29.306,17.517,28.309,18.636,28.061z M27.676,57.999v-9h8.426
		c3.073,0,5.574,2.501,5.574,5.574v3.426H27.676z M49.676,57.999h-6v-3.426c0-2.206-0.954-4.188-2.464-5.574h8.464V57.999z
		 M49.701,34.087c0.634,1.021,0.975,2.202,0.975,3.412c0,2.055-0.948,3.946-2.602,5.191l-0.398,0.3v4.009H36.101h-6.426v-2.718
		l-0.353-0.299c-0.045-0.039-0.093-0.075-0.18-0.14l-8.877-8.844h5.085l9.389,9.39c0.643,0.642,1.486,0.963,2.329,0.963
		c0.844,0,1.688-0.321,2.33-0.963L49.701,34.087z"></path>
</g></svg>
              </span>
              <h5 class="u-text u-text-default u-text-5" style='color: rgb(51, 51, 51); font-size: 18px'>绘效果图</h5>
              <h3 class="u-align-center u-text u-text-default u-text-6" style='color: rgb(102, 102, 102); font-size: 12px;  line-height: 20px'>五星级农贸市场设计、现代风格、农贸超市风格、工业风格效果</h3>
            </div>
          </div>
          <div class="u-container-style u-image u-list-item u-repeater-item u-image-4" data-image-width="232" data-image-height="224">
            <div class="u-container-layout u-similar-container u-container-layout-4">
              <span class="u-icon u-icon-circle u-text-grey-50 u-icon-4">
                <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 60 60" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-d644"></use></svg>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 60 60" x="0px" y="0px" id="svg-d644" style="enable-background:new 0 0 60 60;"><g><path d="M57.49,27H54v-6.268C54,19.226,52.774,18,51.268,18H50V0H10v2H7v2H4v7H2.732C1.226,11,0,12.226,0,13.732v43.687l0.006,0
		c-0.005,0.563,0.17,1.114,0.522,1.575C1.018,59.634,1.76,60,2.565,60h44.759c1.157,0,2.175-0.78,2.449-1.813L60,30.149v-0.177
		C60,28.25,58.944,27,57.49,27z M51.268,20C51.672,20,52,20.328,52,20.732V27h-2v-7H51.268z M48,2v16v9H12.731
		c-0.233,0-0.457,0.039-0.674,0.098c-0.018,0.005-0.039,0.003-0.057,0.008V2H48z M10,4v25.585l-0.063,0.173L9,32.326V4H10z M6,6h1
		v31.81l-1,2.741V11V6z M2,13.732C2,13.328,2.329,13,2.732,13H4v32.943l-2,5.455V13.732z M47.868,57.584
		C47.803,57.829,47.579,58,47.324,58H2.565c-0.243,0-0.385-0.139-0.448-0.222c-0.063-0.082-0.16-0.256-0.123-0.408L4,51.87v0.001
		l3-8.225l0,0l3-8.225v0.003l1.932-5.301L12,29.938l0,0l0.16-0.439l0.026-0.082C12.252,29.172,12.477,29,12.731,29H48h2h4h3.49
		c0.379,0,0.477,0.546,0.501,0.819L47.868,57.584z"></path><path d="M18,17h24c0.552,0,1-0.447,1-1s-0.448-1-1-1H18c-0.552,0-1,0.447-1,1S17.448,17,18,17z"></path><path d="M18,10h10c0.552,0,1-0.447,1-1s-0.448-1-1-1H18c-0.552,0-1,0.447-1,1S17.448,10,18,10z"></path><path d="M18,24h24c0.552,0,1-0.447,1-1s-0.448-1-1-1H18c-0.552,0-1,0.447-1,1S17.448,24,18,24z"></path>
</g></svg>
              </span>
              <h5 class="u-align-center u-text u-text-default u-text-7" style='color: rgb(51, 51, 51); font-size: 18px'>画施工图</h5>
              <h3 class="u-align-center u-text u-text-default u-text-8" style='color: rgb(102, 102, 102); font-size: 12px;  line-height: 20px'>农贸市场装修节点图、农贸市场消防水电暖图、农贸市场生活水电暖图</h3>
            </div>
          </div>
          <div class="u-align-center u-container-style u-image u-list-item u-repeater-item u-image-5" data-image-width="232" data-image-height="224">
            <div class="u-container-layout u-similar-container u-container-layout-5">
              <span class="u-icon u-icon-circle u-text-grey-50 u-icon-5">
                <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 54.953 54.953" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-8faf"></use></svg>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 54.953 54.953" x="0px" y="0px" id="svg-8faf" style="enable-background:new 0 0 54.953 54.953;"><g><circle cx="45.021" cy="25.976" r="1"></circle><circle cx="9.021" cy="25.976" r="1"></circle><circle cx="12.021" cy="28.976" r="1"></circle><circle cx="18.021" cy="28.976" r="1"></circle><circle cx="15.021" cy="31.976" r="1"></circle><circle cx="21.021" cy="31.976" r="1"></circle><circle cx="24.021" cy="34.976" r="1"></circle><circle cx="30.021" cy="34.976" r="1"></circle><circle cx="33.021" cy="31.976" r="1"></circle><circle cx="27.021" cy="37.976" r="1"></circle><circle cx="36.021" cy="28.976" r="1"></circle><circle cx="42.021" cy="28.976" r="1"></circle><circle cx="39.021" cy="31.976" r="1"></circle><path d="M45.559,32.796l9.394-5.367l-9.656-5.483l9.656-5.517L27.477,0.826L0,16.429l9.656,5.517L0,27.429l9.656,5.517L0,38.429   l27.477,15.698l27.477-15.698l-9.656-5.483l0.071-0.041C45.439,32.879,45.497,32.837,45.559,32.796z M27.477,3.125l23.436,13.309   l-7.637,4.364l0,0l-15.798,9.026L4.041,16.434L27.477,3.125z M11.129,23.409c0.162,0.333,0.497,0.567,0.892,0.567   c0.27,0,0.512-0.109,0.692-0.283l2.262,1.292c-0.53,0.025-0.954,0.455-0.954,0.991c0,0.552,0.448,1,1,1s1-0.448,1-1   c0-0.173-0.055-0.327-0.132-0.469l10.33,5.902c-0.116,0.163-0.198,0.352-0.198,0.567c0,0.552,0.448,1,1,1s1-0.448,1-1   c0-0.051-0.021-0.094-0.029-0.143l10.052-5.743c0.059,0.496,0.465,0.885,0.977,0.885c0.552,0,1-0.448,1-1   c0-0.325-0.165-0.601-0.406-0.783l2.202-1.258c0.068,0.015,0.132,0.041,0.204,0.041c0.444,0,0.807-0.294,0.938-0.694l0.32-0.183   l7.634,4.335l-1.983,1.133c-0.157-0.347-0.503-0.591-0.908-0.591c-0.552,0-1,0.448-1,1c0,0.216,0.083,0.405,0.199,0.568   l-3.945,2.254l0,0l-6.388,3.65c0.078-0.142,0.134-0.298,0.134-0.472c0-0.552-0.448-1-1-1s-1,0.448-1,1   c0,0.537,0.426,0.967,0.957,0.991l-2.263,1.293c-0.18-0.174-0.423-0.284-0.694-0.284c-0.552,0-1,0.448-1,1   c0,0.08,0.028,0.151,0.046,0.226l-4.59,2.622l-5.517-3.152c-0.13-0.401-0.494-0.696-0.939-0.696c-0.073,0-0.138,0.027-0.206,0.042   l-2.201-1.257c0.241-0.183,0.407-0.458,0.407-0.784c0-0.552-0.448-1-1-1c-0.512,0-0.919,0.391-0.977,0.887L6.991,29.12   c0.007-0.049,0.029-0.093,0.029-0.144c0-0.552-0.448-1-1-1c-0.239,0-0.449,0.095-0.621,0.235l-1.359-0.776L11.129,23.409z    M50.912,38.434l-23.436,13.39L4.041,38.434l7.633-4.335l15.803,9.028l15.802-9.028L50.912,38.434z"></path>
</g></svg>
              </span>
              <h5 class="u-text u-text-default u-text-9" style='color: rgb(51, 51, 51); font-size: 18px'>现场指导</h5>
              <h3 class="u-align-center u-text u-text-default u-text-10" style='color: rgb(102, 102, 102); font-size: 12px;  line-height: 20px'>现场讲解方案满意为止、现场放线指导施工图 、竣工验收通过创卫为止</h3>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-align-center u-clearfix u-section-3" id="carousel_78ab">
      <div class="u-clearfix u-sheet u-sheet-1 bigcontainer" style='min-height: 10px; margin-bottom: 100px'>
          <?php           
          
          $pageTotal = $db->rawQuery("SELECT count(id) as co FROM cases where category = " . intval($_REQUEST['category']));
          $pageTotal = $pageTotal[0]['co'];
          $query = "SELECT * FROM cases WHERE goodone=1 limit 6";
          $rows = $db->rawQuery($query);
          
          for ($i = 0; $i < sizeof($rows); $i++) {             
            $row = $rows[$i];
            $r = strpos($row['content'], '<img');
            $alt = "No Image";
            if ($r !== FALSE) {
              $d = strpos(substr($row['content'], $r + 4), 'src=') + $r + 9;
              $r = strpos(substr($row['content'], $d + 10), '"') + $d + 10;
              $r = substr($row['content'], $d, $r - $d);
              $alt = "Image";
            } else $r = '';
            
            ?>            
          <div class=" u-white u-repeater-item-3 image-cell">
            <div class="u-container-layout u-similar-container u-valign-top u-container-layout-3" style='border:1px solid #ddd; overflow:hidden'>
              <div class='image_cell_area' style='margin-top: 1px; margin-right: 1px; margin-left: 1px; width: calc(100% - 2px); overflow:hidden;
              display: flex;justify-content: center;align-items: center; background:black;'>
                <img alt="<?php echo addslashes($alt); ?>" class="article-image u-blog-control u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-image u-image-default u-image-3" 
                    src="<?php echo $r; ?>" style='background: black; object-fit: cover;  cursor:pointer;' onclick='window.location.href="p7.php?r=<?php echo $row["id"]; ?>";'>
              </div>
              <div class="u-blog-control u-post-content u-text u-text-default u-text-6" style='text-align: left; white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis; margin-left: 13px;'>
                <span style='color:#ff6500'>【案例】</span>&nbsp;&nbsp;<?php echo $row['name']; ?>
              </div>
              <div class="u-blog-control u-post-content u-text u-text-default u-text-6" style=' margin-left: 13px;'>                
                <?php 
                  for ($j = 0; $j < floatval($row['stars']); $j++) 
                    echo "<div style='float:left; margin-right: 3px; padding: 0px 2px 0px 2px; border-radius:2px; background-color:#ff6500'><i class=\"fas fa-star\" style='color:white'></i></div>";
                ?>                  
                <div style='float:left; min-width:20px; min-height: 30px;'></div>
                <div style='float:left; font-size: 12px;line-height: 24px'>
                  <i class="far fa-images"></i>&nbsp;
                  <?php echo substr_count($row['content'], '<img'); ?>
                </div>              
                <div style='float:left; min-width:20px; min-height: 30px;'></div>
                <div style='float:left;font-size: 12px;line-height: 24px'>
                  <i class="far fa-user"></i>&nbsp;
                  <?php echo $row['browse']; ?><span style='display:none'>浏览</span>
                </div>              
                <a href="../N1/consult.php" class="u-blog-control u-btn u-button-style u-custom-color-1 u-btn-6" style='border-radius: 5px; margin-bottom: 10px; margin-right:5px; float:right; margin-top: -3px; padding: 5px 10px !Important; font-size: 12px'>这样装修多少钱?</a>
              </div>
              
              
            </div>
          </div> 
          <?php } ?>
      </div>
    </section>
    <section class="u-align-center u-clearfix u-section-4" id="sec-dc3e">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="circles-area u-expanded-width u-gallery u-show-text-always u-gallery-1">
          <div class="u-gallery-item">
            <div class="u-back-slide">
              <img class="u-back-image u-expanded" src="images/7.jpg">
            </div>
            <div class="u-over-slide u-shading u-valign-middle u-over-slide-1" onclick='window.location.href="p2.php?category=1";'>
              <h3 class="u-gallery-heading" style="font-size: 1.25rem;"></h3>
              <p class="u-gallery-text circle-text" style="">室内设计</p>
            </div>
          </div>
          <div class="u-gallery-item">
            <div class="u-back-slide">
              <img class="u-back-image u-expanded" src="images/c2.jpg">
            </div>
            <div class="u-over-slide u-shading u-valign-middle u-over-slide-2" onclick='window.location.href="p2.php?category=2";'>
              <h3 class="u-gallery-heading" style="font-size: 1.25rem;"></h3>
              <p class="u-gallery-text circle-text">建筑设计</p>
            </div>
          </div>
          <div class="u-gallery-item">
            <div class="u-back-slide">
              <img class="u-back-image u-expanded" src="images/e624cbc5-e96f-6700-5942-f978bb060ac3.jpg">
            </div>
            <div class="u-over-slide u-shading u-valign-middle u-over-slide-3" onclick='window.location.href="p2.php?category=3";'>
              <h3 class="u-gallery-heading" style="font-size: 1.25rem;"></h3>
              <p class="u-gallery-text circle-text">5G智能</p>
            </div>
          </div>
          <div class="u-gallery-item">
            <div class="u-back-slide">
              <img class="u-back-image u-expanded" src="images/5td.jpg">
            </div>
            <div class="u-over-slide u-shading u-valign-middle u-over-slide-4" onclick='window.location.href="p2.php?category=4";'>
              <h3 class="u-gallery-heading" style="font-size: 1.25rem;"></h3>
              <p class="u-gallery-text circle-text">设计流程</p>
            </div>
          </div>
          <div class="u-gallery-item u-gallery-item-5" data-image-width="2000" data-image-height="1333">
            <div class="u-back-slide">
              <img class="u-back-image u-expanded" src="images/4.jpg">
            </div>
            <div class="u-over-slide u-shading u-valign-middle u-over-slide-5" onclick='window.location.href="../N4/p23.php";'>
              <p class="u-gallery-text circle-text">政府合作</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-valign-middle-lg u-valign-middle-md u-valign-middle-sm u-valign-middle-xl u-section-5" id="sec-ff71" style='margin-bottom: 30px'>
      <div class="u-clearfix u-expanded-width u-gutter-10 u-layout-wrap u-layout-wrap-1" style='width: 1500px !important; margin-left: calc(50% - 750px) !important'>
        <div class="u-layout">
          <div class="u-layout-col">
            <div class="u-size-30">
              <div class="u-layout-row">
                <div class="u-align-left u-container-style u-image u-layout-cell u-left-cell u-size-30 u-image-1 gridimage21" src="">
                  <div class="u-container-layout u-container-layout-1">
                    <h2 class="u-text u-text-1 cross-text-image1" style='font-size: 26px; margin-top: 20px; font-family: "Microsoft YaHei" !important'>菜源佳佳营运合作</h2>
                    <p class="u-text u-text-2 cross-text-image1" style='font-size: 14px; margin-top: 20px; font-family: "Microsoft YaHei" !important'>菜源佳佳颠覆传统农贸市场经营模式，创建智能菜场管理新体系</p>
                  </div>
                </div>
                <div class="u-container-style u-image u-layout-cell u-right-cell u-shading u-size-30 u-image-2  gridimage11" data-image-width="1080" data-image-height="1080">
                  <div class="u-container-layout u-valign-middle u-container-layout-2"></div>
                </div>
              </div>
            </div>
            <div class="u-size-30">
              <div class="u-layout-row">
                <div class="u-container-style u-image u-layout-cell u-left-cell u-size-30 u-image-3 gridimage11">
                  <div class="u-container-layout u-valign-middle u-container-layout-3"></div>
                </div>
                <div class="u-align-left u-container-style u-layout-cell u-right-cell u-size-30 u-layout-cell-4 gridimage21" src="" style='display:block'>
                  <div class="u-container-layout u-container-layout-4" style='padding-bottom: 0px'>
                    <h2 class="u-text u-text-3" style='font-size: 26px; margin-top: 20px; font-family: "Microsoft YaHei" !important'>智能菜场大数据应用</h2>
                    <p class="u-text u-text-4"  style='font-size: 14px; margin-top: 20px; font-family: "Microsoft YaHei" !important'>智能硬件：智能电子称、智能商户屏、智能检测仪、智能水电表、智能触摸屏、智能大数据分析屏、智能积分充值器、智能监控。<br>
                      <br>智能软件：非现金结算系统 、电子追溯系统、商户信息系统 、智能检测系统、缴费系统、查询系统 、大数据分析系统 、用户交互系统
                    </p>
                  </div>
                  <div style="display: flex; flex-direction: row; margin-left: 30px">
                    <div class="u-container-style u-effect-hover-zoom u-layout-cell u-size-12 u-size-20-md u-layout-cell-7" data-image-width="152" data-image-height="152" style='width:140px; height: 140px'>
                      <div class="u-background-effect u-expanded"  style='overflow:visible'>
                        <div class="u-background-effect-image u-expanded u-image u-image-4" data-image-width="152" data-image-height="152"></div>
                      </div>
                      <div class="u-container-layout u-container-layout-7"></div>
                    </div>
                    <div class="u-container-style u-effect-hover-zoom u-layout-cell u-size-12 u-size-30-md u-layout-cell-8" data-image-width="152" data-image-height="152" style='width:140px; height: 140px'>
                      <div class="u-background-effect u-expanded" style='overflow:visible'>
                        <div class="u-background-effect-image u-expanded u-image u-image-5" data-image-width="152" data-image-height="152"></div>
                      </div>
                      <div class="u-container-layout u-container-layout-8"></div>
                    </div>
                    <div class="u-container-style u-effect-hover-zoom u-layout-cell u-right-cell u-size-12 u-size-30-md u-layout-cell-9" data-image-width="152" data-image-height="152" style='width:140px; height: 140px'>
                      <div class="u-background-effect u-expanded" style='overflow:visible'>
                        <div class="u-background-effect-image u-expanded u-image u-image-6" data-image-width="152" data-image-height="152"></div>
                      </div>
                      <div class="u-container-layout u-container-layout-9"></div>
                    </div>
                  <div class="u-container-style u-effect-hover-zoom u-layout-cell u-size-12 u-size-20-md u-layout-cell-7" data-image-width="152" data-image-height="152" style='width:140px; height: 140px'>
                      <div class="u-background-effect u-expanded" style='overflow:visible'>
                        <div class="u-background-effect-image u-expanded u-image u-image-7" data-image-width="152" data-image-height="152"></div>
                      </div>
                  <div class="u-container-layout u-container-layout-7"></div>
                    </div><div class="u-container-style u-effect-hover-zoom u-layout-cell u-size-12 u-size-20-md u-layout-cell-7" data-image-width="152" data-image-height="152" style='width:140px; height: 140px'>
                      <div class="u-background-effect u-expanded" style='overflow:visible'>
                        <div class="u-background-effect-image u-expanded u-image u-image-8" data-image-width="152" data-image-height="152"></div>
                      </div>
                      <div class="u-container-layout u-container-layout-7"></div>
                  </div></div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
      <div class="u-clearfix u-layout-wrap u-layout-wrap-2">
        <div class="u-layout">
          
        </div>
      </div>
    </section>
    <section class="block7 u-align-center u-clearfix u-grey-5 u-section-6" id="sec-30b7">
      <h2 class="u-text u-text-1" style="font-family: 'Microsoft YaHei' !important;">电商免费入驻-新零售</h2>
      <div class="u-expanded-width u-list u-repeater u-list-1" style="
    width: 1500px !important;
    margin-left: calc(50% - 750px) !important;
">
        <div class="u-align-center-lg u-align-center-md u-align-center-xl u-container-style u-list-item u-repeater-item u-list-item-1">
          <div class="u-container-layout u-similar-container u-valign-bottom-sm u-valign-bottom-xs u-valign-top-lg u-valign-top-md u-valign-top-xl u-container-layout-1">
            <img src="images/2_1.png" alt="" class="u-image u-image-default u-image-1" data-image-width="76" data-image-height="70">
            <h4 class="u-align-center-sm u-align-center-xs u-text u-text-default u-text-2" style='font-family: "Microsoft Yahei" !important; font-size: 20px; text-decoration: none !important'>市场入驻</h4>
            <p class="u-align-center-lg u-align-center-sm u-align-center-xl u-align-center-xs u-text u-text-3">市场入驻免费,提供现场指导培训,免50去花6个时间长期养一个团队打造<br>电商的高额成本</p>
          </div>
        </div>
        <div class="u-align-center u-container-style u-list-item u-repeater-item u-list-item-2">
          <div class="u-container-layout u-similar-container u-valign-bottom-sm u-valign-bottom-xs u-valign-top-lg u-valign-top-md u-valign-top-xl u-container-layout-2">
            <img src="images/2_2.png" alt="" class="u-image u-image-default u-image-2" data-image-width="200" data-image-height="200">
            <h4 class="u-text u-text-default u-text-4"style='font-family: "Microsoft Yahei" !important; font-size: 20px; text-decoration: none !important'>商户免费入驻</h4>
            <p class="u-align-center-lg u-align-center-xl u-text u-text-default u-text-5" >不抽取任何佣金 提供现场指导培训，保证商家会使用互联网销售。</p>
          </div>
        </div>
        <div class="u-align-center u-container-style u-list-item u-repeater-item u-list-item-3">
          <div class="u-container-layout u-similar-container u-valign-bottom-sm u-valign-bottom-xs u-valign-top-lg u-valign-top-md u-valign-top-xl u-container-layout-3">
            <img src="images/2_3.png" alt="" class="u-image u-image-default u-image-3" data-image-width="200" data-image-height="200">
            <h4 class="u-text u-text-default u-text-6"style='font-family: "Microsoft Yahei" !important; font-size: 20px; text-decoration: none !important'>互联网农贸市场</h4>
            <p class="u-align-center-lg u-align-center-xl u-text u-text-default u-text-7">线上线下新零售是领导未来农贸市场<br>发展趋势。</p>
          </div>
        </div>
        <div class="u-align-center u-container-style u-list-item u-repeater-item u-list-item-4">
          <div class="u-container-layout u-similar-container u-valign-bottom-sm u-valign-bottom-xs u-valign-top-lg u-valign-top-md u-valign-top-xl u-container-layout-4">
            <img src="images/2_4.png" alt="" class="u-image u-image-default u-image-4" data-image-width="200" data-image-height="200">
            <h4 class="u-text u-text-default u-text-8" style='font-family: "Microsoft Yahei" !important; font-size: 20px; text-decoration: none !important'>先进管理高收益</h4>
            <p class="u-align-center-lg u-align-center-xl u-text u-text-default u-text-9" >智能高效管理系统，让你省时省力高收益。</p>
          </div>
        </div>
      </div>
    </section>
    <section class="u-align-left u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-clearfix u-white u-section-7" id="sec-c227">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h2 class="u-align-center u-text u-text-1" STYLE='font-size:2.25rem'> 光影集团专注农贸行业 19年 </h2>
        <div class="u-clearfix u-expanded-width u-gutter-10 u-layout-wrap u-layout-wrap-1">
          <div class="u-gutter-0 u-layout">
            <div class="u-layout-row">
              <div class="u-size-18 u-size-30-md">
                <div class="u-layout-col">
                  <div class="u-align-left u-container-style u-image u-image-contain u-layout-cell u-left-cell u-size-60 u-image-1">
                  </div>
                </div>
              </div>
              <div class="u-size-13 u-size-30-md">
                <div class="u-layout-col">
                  <div class="u-container-style u-image u-image-contain u-layout-cell u-size-40 u-image-2">
                    <div class="u-container-layout u-valign-middle u-container-layout-2"></div>
                  </div>
                  <div class="u-align-justify u-container-style u-layout-cell u-size-20 u-layout-cell-3">
                    <div class="u-container-layout u-valign-middle u-container-layout-3">
                      <p class="u-align-center u-text u-text-custom-color-1 u-text-2"> 不敢出示营业执照都是虚报年限<br>没有真正十几年的农贸行业经验 
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="u-size-25 u-size-60-md">
                <div class="u-layout-col">
                  <div class="u-container-style u-layout-cell u-right-cell u-size-60 u-layout-cell-4">
                    <div class="u-container-layout u-valign-middle u-container-layout-4">
                      <p class="u-text u-text-default u-text-3" style='font-size: 18px'>光影集团成功案例遍及全中国32个省市县，是我国从事农贸市场设计行业实力雄厚的“老字号”品牌。业务矩阵包含农贸市场研究，农贸市场定位，农贸市场室内设计，建筑设计，农贸市场运营管理，农贸市场招商，农贸市场电商O2O，农贸市场培训指导，农贸市场智能升级，智能菜场运营管理等一整套农贸市场解决方案。 </p>
                      <img src="images/12.jpg" alt="" class="u-expanded-width u-image u-image-default u-image-3" data-image-width="636" data-image-height="176">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-align-center u-clearfix u-section-8" id="sec-993c">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h2 class="u-text u-text-1"> 不是任何设计公司都叫专业农贸市场设计 </h2>
        <p class="u-text u-text-2"> 掌握核心技术才是有实力的公司 </p>
        <div class="u-clearfix u-expanded-width u-gutter-10 u-layout-wrap u-layout-wrap-1">
          <div class="u-gutter-0 u-layout">
            <div class="u-layout-col">
              <div class="u-size-40">
                <div class="u-layout-row">
                  <div class="u-size-37">
                    <div class="u-layout-col">
                      <div class="u-container-style u-image u-image-contain u-layout-cell u-left-cell u-size-60 u-image-1" src="">
                        <div class="u-container-layout u-container-layout-1"></div>
                      </div>
                    </div>
                  </div>
                  <div class="u-size-23">
                    <div class="u-layout-col">
                      <div class="u-container-style u-layout-cell u-right-cell u-size-60 u-layout-cell-2" src="">
                        <div class="u-container-layout u-container-layout-2" style='padding-top: 0px'>
                          <p class="u-text u-text-3" style='font-size: 18px'> 同行千千万，只有光影敢做以下保证：&nbsp;&nbsp;<br>真正专注农贸行业19年时间和经验；&nbsp;<br>真实营业执照时间年限；&nbsp;&nbsp;<br>真实建筑设计工程资质证书；&nbsp;&nbsp;<br>真实国家八大农贸设计专利；&nbsp;&nbsp;<br>真实真是独家星级农贸管理丛书；&nbsp;<br>真实农贸电商知识产权；&nbsp;&nbsp;<br>我们一直被模仿，从未被超越。 
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="u-size-20 u-size-60-md">
                <div class="u-layout-row">
                  <div class="u-size-34 u-size-60-md">
                    <div class="u-layout-row">
                      <div class="u-container-style u-layout-cell u-left-cell u-size-4 u-layout-cell-3">
                        <div class="u-container-layout u-container-layout-3"></div>
                      </div>
                      <div class="u-container-style u-image u-image-contain u-layout-cell u-size-14 u-size-30-md u-image-2" src="">
                        <div class="u-container-layout u-container-layout-4"></div>
                      </div>
                      <div class="u-align-left u-container-style u-image u-image-contain u-layout-cell u-size-14 u-image-3" data-image-width="711" data-image-height="1004">
                        <div class="u-container-layout u-container-layout-5"></div>
                      </div>
                      <div class="u-container-style u-image u-image-contain u-layout-cell u-size-14 u-size-30-md u-image-4" src="">
                        <div class="u-container-layout u-container-layout-6"></div>
                      </div>
                      <div class="u-container-style u-image u-image-contain u-layout-cell u-size-14 u-size-60-md u-image-5" src="">
                        <div class="u-container-layout u-container-layout-7"></div>
                      </div>
                    </div>
                  </div>
                  <div class="u-size-26 u-size-60-md">
                    <div class="u-layout-row">
                      <div class="u-container-style u-layout-cell u-right-cell u-size-60 u-layout-cell-8" src="">
                        <div class="u-container-layout u-container-layout-8">
                          <p class="u-text u-text-palette-2-base u-text-4" style='margin-left:0'> 不敢晒出自己资质的，都是挂靠公司；&nbsp;&nbsp;<br>不敢晒出营业执照的，都是虚假宣传年限；&nbsp;&nbsp;<br>不敢晒出设计专利的，都是非专业设计公司；&nbsp;&nbsp;<br>没有运营管理经验的，没有设计灵魂行业的公司；&nbsp;<br>没有电商知识产权的，都是虚假宣传电商的公司 
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-align-center u-clearfix u-section-9" id="sec-03ad">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-heading-font u-text u-text-default u-text-grey-10 u-title u-text-1" style='font-weight: 1000 !Important; font-size: 80px'>DESIGN</h1>
        <h2 class="u-text u-text-2"> 装修设计百科 </h2>
        <div style='height: 40px; width:100%'></div>
        <?php 
          $query = "SELECT * FROM news WHERE goodone = 1 limit 6";
          $rows = $db->rawQuery($query);
          for ($i = 0; $i < sizeof($rows); $i++) {             
            $row = $rows[$i];
            $r = strpos($row['content'], '<img');
            $alt = "No Image";
            if ($r !== FALSE) {
              $d = strpos(substr($row['content'], $r + 4), 'src=') + $r + 9;
              $r = strpos(substr($row['content'], $d + 10), '"') + $d + 10;
              $r = substr($row['content'], $d, $r - $d);
              $alt = "Image";
            } else $r = '';
            
            ?>            
          <div class=" u-white u-repeater-item-3 image-cell">
            <div class="u-container-layout u-similar-container u-valign-top u-container-layout-3" style='border:0px solid #ddd; overflow:hidden'><!--blog_post_image-->
            <div style='margin-top: 0px; margin-right: 0px; margin-left: 0px; width: calc(100% - 0px); height:331px; overflow:hidden;margin-bottom: 0px; display:flex'>
              <img alt="<?php echo addslashes($alt); ?>" class="article-image u-blog-control u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-image u-image-default u-image-3" 
                    src="<?php echo $r; ?>" style='background: black; object-fit: cover;  cursor:pointer; height: 331px; min-width:100%' onclick='window.location.href="p26.php?r=<?php echo $row["id"]; ?>";'>
              <div onclick='window.location.href="p26.php?r=<?php echo $row["id"]; ?>";'
                    style='bottom: 0px; position: absolute; padding-left: 10px; font-weight: 100 !Important; cursor:pointer; 
                            width: 100%; height: 30px; background:#0005; color: white; text-align: left; white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;'>
                <?php echo htmlspecialchars($row['title']); ?>
                </div>
              </div>              
            </div>
          </div> 
          <?php } ?>
      </div>
    </section>
    <section class="u-align-center u-clearfix u-section-10" id="sec-4b7e">
      <div class="u-clearfix u-sheet u-sheet-1" style='min-height: 0px'>
        <!-- <img src="images/parnter-background.png" alt="" class="u-image u-image-default u-image-1" data-image-width="393" data-image-height="77"> -->
        <h1 class="u-heading-font u-text u-text-default u-text-grey-10 u-title u-text-1" style='font-weight: 1000 !Important; font-size: 80px'>PARTNER</h1>
        <h2 class="u-text u-text-2" style='font-size: 36px; line-height: 50px'>合作伙伴</h2>
        <div class="u-expanded-width u-gallery u-lightbox u-show-text-on-hover u-gallery-1">
          <div class="u-effect-fade u-gallery-item">
            <div class="u-back-slide" data-image-width="300" data-image-height="150">
              <img class="u-back-image u-expanded u-image-contain" src="images/parnter1.jpg">
            </div>
            <div class="u-over-slide u-shading u-over-slide-1">
              <h3 class="u-gallery-heading"></h3>
              <p class="u-gallery-text"></p>
            </div>
          </div>
          <div class="u-effect-fade u-gallery-item">
            <div class="u-back-slide" data-image-width="300" data-image-height="150">
              <img class="u-back-image u-expanded u-image-contain" src="images/parnter1.jpg">
            </div>
            <div class="u-over-slide u-shading u-over-slide-2">
              <h3 class="u-gallery-heading"></h3>
              <p class="u-gallery-text"></p>
            </div>
          </div>
          <div class="u-effect-fade u-gallery-item">
            <div class="u-back-slide" data-image-width="300" data-image-height="150">
              <img class="u-back-image u-expanded u-image-contain" src="images/parnter1.jpg">
            </div>
            <div class="u-over-slide u-shading u-over-slide-3">
              <h3 class="u-gallery-heading"></h3>
              <p class="u-gallery-text"></p>
            </div>
          </div>
          <div class="u-effect-fade u-gallery-item">
            <div class="u-back-slide" data-image-width="300" data-image-height="150">
              <img class="u-back-image u-expanded u-image-contain" src="images/parnter1.jpg">
            </div>
            <div class="u-over-slide u-shading u-over-slide-4">
              <h3 class="u-gallery-heading"></h3>
              <p class="u-gallery-text"></p>
            </div>
          </div>
          <div class="u-effect-fade u-gallery-item">
            <div class="u-back-slide" data-image-width="300" data-image-height="150">
              <img class="u-back-image u-expanded u-image-contain" src="images/parnter1.jpg">
            </div>
            <div class="u-over-slide u-shading u-over-slide-5">
              <h3 class="u-gallery-heading"></h3>
              <p class="u-gallery-text"></p>
            </div>
          </div>
          <div class="u-effect-fade u-gallery-item">
            <div class="u-back-slide" data-image-width="300" data-image-height="150">
              <img class="u-back-image u-expanded u-image-contain" src="images/parnter1.jpg">
            </div>
            <div class="u-over-slide u-shading u-over-slide-6">
              <h3 class="u-gallery-heading"></h3>
              <p class="u-gallery-text"></p>
            </div>
          </div>
          <div class="u-effect-fade u-gallery-item u-gallery-item-7" data-image-width="1280" data-image-height="720">
            <div class="u-back-slide u-back-slide-7" data-image-width="300" data-image-height="150">
              <img class="u-back-image u-expanded u-image-contain u-back-image-7" src="images/parnter1.jpg">
            </div>
            <div class="u-over-slide u-shading u-over-slide-7">
              <h3 class="u-gallery-heading" style="background-image: none;"></h3>
              <p class="u-gallery-text" style="background-image: none;"></p>
            </div>
          </div>
          <div class="u-effect-fade u-gallery-item u-gallery-item-8" data-image-width="1280" data-image-height="777">
            <div class="u-back-slide u-back-slide-8" data-image-width="300" data-image-height="150">
              <img class="u-back-image u-expanded u-image-contain u-back-image-8" src="images/parnter1.jpg">
            </div>
            <div class="u-over-slide u-shading u-over-slide-8">
              <h3 class="u-gallery-heading" style="background-image: none;"></h3>
              <p class="u-gallery-text" style="background-image: none;"></p>
            </div>
          </div>
          <div class="u-effect-fade u-gallery-item" data-image-width="300" data-image-height="150">
            <div class="u-back-slide">
              <img class="u-back-image u-expanded u-image-contain" src="images/parnter1.jpg">
            </div>
            <div class="u-over-slide u-shading u-over-slide-9">
              <h3 class=" u-gallery-heading"></h3>
              <p class=" u-gallery-text"></p>
            </div>
          </div>
          <div class="u-effect-fade u-gallery-item" data-image-width="300" data-image-height="150">
            <div class="u-back-slide">
              <img class="u-back-image u-expanded u-image-contain" src="images/parnter1.jpg">
            </div>
            <div class="u-over-slide u-shading u-over-slide-10">
              <h3 class=" u-gallery-heading"></h3>
              <p class=" u-gallery-text"></p>
            </div>
          </div>
        </div>
        <div class="u-expanded-width u-gallery u-lightbox u-show-text-on-hover u-gallery-2">
          <div class="u-effect-fade u-gallery-item">
            <div class="u-back-slide" data-image-width="300" data-image-height="150">
              <img class="u-back-image u-expanded u-image-contain" src="images/parnter1.jpg">
            </div>
            <div class="u-over-slide u-shading u-over-slide-11">
              <h3 class="u-gallery-heading"></h3>
              <p class="u-gallery-text"></p>
            </div>
          </div>
          <div class="u-effect-fade u-gallery-item">
            <div class="u-back-slide" data-image-width="300" data-image-height="150">
              <img class="u-back-image u-expanded u-image-contain" src="images/parnter1.jpg">
            </div>
            <div class="u-over-slide u-shading u-over-slide-12">
              <h3 class="u-gallery-heading"></h3>
              <p class="u-gallery-text"></p>
            </div>
          </div>
          <div class="u-effect-fade u-gallery-item">
            <div class="u-back-slide" data-image-width="300" data-image-height="150">
              <img class="u-back-image u-expanded u-image-contain" src="images/parnter1.jpg">
            </div>
            <div class="u-over-slide u-shading u-over-slide-13">
              <h3 class="u-gallery-heading"></h3>
              <p class="u-gallery-text"></p>
            </div>
          </div>
          <div class="u-effect-fade u-gallery-item">
            <div class="u-back-slide" data-image-width="300" data-image-height="150">
              <img class="u-back-image u-expanded u-image-contain" src="images/parnter1.jpg">
            </div>
            <div class="u-over-slide u-shading u-over-slide-14">
              <h3 class="u-gallery-heading"></h3>
              <p class="u-gallery-text"></p>
            </div>
          </div>
          <div class="u-effect-fade u-gallery-item">
            <div class="u-back-slide" data-image-width="300" data-image-height="150">
              <img class="u-back-image u-expanded u-image-contain" src="images/parnter1.jpg">
            </div>
            <div class="u-over-slide u-shading u-over-slide-15">
              <h3 class="u-gallery-heading"></h3>
              <p class="u-gallery-text"></p>
            </div>
          </div>
          <div class="u-effect-fade u-gallery-item">
            <div class="u-back-slide" data-image-width="300" data-image-height="150">
              <img class="u-back-image u-expanded u-image-contain" src="images/parnter1.jpg">
            </div>
            <div class="u-over-slide u-shading u-over-slide-16">
              <h3 class="u-gallery-heading"></h3>
              <p class="u-gallery-text"></p>
            </div>
          </div>
          <div class="u-effect-fade u-gallery-item u-gallery-item-17" data-image-width="1280" data-image-height="720">
            <div class="u-back-slide" data-image-width="300" data-image-height="150">
              <img class="u-back-image u-expanded u-image-contain u-back-image-17" src="images/parnter1.jpg">
            </div>
            <div class="u-over-slide u-shading u-over-slide-17">
              <h3 class="u-gallery-heading" style="background-image: none;"></h3>
              <p class="u-gallery-text" style="background-image: none;"></p>
            </div>
          </div>
          <div class="u-effect-fade u-gallery-item u-gallery-item-18" data-image-width="1280" data-image-height="777">
            <div class="u-back-slide" data-image-width="300" data-image-height="150">
              <img class="u-back-image u-expanded u-image-contain u-back-image-18" src="images/parnter1.jpg">
            </div>
            <div class="u-over-slide u-shading u-over-slide-18">
              <h3 class="u-gallery-heading" style="background-image: none;"></h3>
              <p class="u-gallery-text" style="background-image: none;"></p>
            </div>
          </div>
          <div class="u-effect-fade u-gallery-item" data-image-width="300" data-image-height="150">
            <div class="u-back-slide">
              <img class="u-back-image u-expanded u-image-contain" src="images/parnter1.jpg">
            </div>
            <div class="u-over-slide u-shading u-over-slide-19">
              <h3 class="u-gallery-heading"></h3>
              <p class="u-gallery-text"></p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php include('../N1/footer.php'); ?>
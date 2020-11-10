<?php
$bigTitle = "农贸市场设计";
$label = $query = '';
switch (intval($_REQUEST['category'])) {
  case 1: $label = '所在位置／<span style="cursor:pointer" onclick="window.location.href=\'/\';">首页</span>／农贸设计案例'; break;
  case 2: $label = '所在位置／<span style="cursor:pointer" onclick="window.location.href=\'/\';">首页</span>／农贸建筑设计'; break;
  case 3: $label = '所在位置／<span style="cursor:pointer" onclick="window.location.href=\'/\';">首页</span>／5G智能设计'; break;
  case 4: $label = '所在位置／<span style="cursor:pointer" onclick="window.location.href=\'/\';">首页</span>／农贸运营案例'; $bigTitle = "农贸市场运营";  break;
  default: exit;
}

include('header.php');

?>
<link href='/css/paginaitor.css' rel="stylesheet" />
<script src='/js/js/all.js'></script>
<section class="u-align-center u-clearfix u-section-2" id="sec-7fab">
  <div class="u-clearfix u-sheet u-sheet-1" style='padding-left: 0%; margin-top: 20px'>
    <p class="u-align-left u-text u-text-1"> <?php echo $label; ?> </p>
    <a href="javascript:void(0)" class="refresh-button selected-a-button"  data-val='1'>最新发布</a>
    <a href="javascript:void(0)" class="refresh-button unselected-a-button" data-val='2' >热点案例</a>
    <a href="javascript:void(0)" class="refresh-button unselected-a-button" data-val='3'>星级排序</a>
  </div>
</section>
<section class="u-align-center u-clearfix u-section-3" id="sec-ec6c" style='margin-top: 30px'>
  <div class="u-clearfix u-sheet u-sheet-1" style='min-height: 10px; margin-bottom: 10px' id='piece_content'>
      
  </div>
</section>
<section class='class="u-align-center u-clearfix u-section-3'>
  <div class="u-clearfix u-sheet u-sheet-1" style="min-height: 10px; margin-bottom: 40px; text-align:center">
  <ul class="pagination" id="pagination1"></ul>
</div>
</section>
<script src='/js/jspaginator.js'></script>
<script src='/N1/p2.js'></script>
<?php
include('../N1/footer.php');
?>













<?php
$bigTitle = "智能菜场";
$label = $query = '';
switch (intval($_REQUEST['category'])) {
  case 1: $label = '所在位置／<span style="cursor:pointer" onclick="window.location.href=\'/\';">首页</span>／农贸设计案例'; break;
  case 2: $label = '所在位置／<span style="cursor:pointer" onclick="window.location.href=\'/\';">首页</span>／农贸建筑设计'; break;
  case 3: $label = '所在位置／<span style="cursor:pointer" onclick="window.location.href=\'/\';">首页</span>／5G智能设计'; break;
  case 4: $label = '所在位置／<span style="cursor:pointer" onclick="window.location.href=\'/\';">首页</span>／农贸运营案例'; $bigTitle = "农贸市场运营";  break;
  default: exit;
}

include('header.php');
if (!isset($_REQUEST['s'])) $_REQUEST['s'] = 1;
$mode = intval($_REQUEST['s']);
$selectedMode = 'selected-a-button';
$unselectedMode = 'unselected-a-button';

$pageIndex = isset($_REQUEST['pageIndex']) ? intval($_REQUEST['pageIndex']) - 1 : 0;
$pageNum = 15;

switch ($mode) {
  case 1: $query = "SELECT * FROM cases WHERE category = " . intval($_REQUEST['category']) . " ORDER BY created_date DESC LIMIT " . ($pageIndex * $pageNum) . ", " . $pageNum; break;
  case 2: $query = "SELECT * FROM cases WHERE category = " . intval($_REQUEST['category']) . "  ORDER BY browse DESC LIMIT " . ($pageIndex * $pageNum) . ", " . $pageNum; break;
  case 3: $query = "SELECT * FROM cases WHERE category = " . intval($_REQUEST['category']) . "  ORDER BY stars DESC LIMIT " . ($pageIndex * $pageNum) . ", " . $pageNum; break;
  default: exit;
}



include('../N1/dbconfig.php');
$db = getDbInstance();
$pageTotal = $db->rawQuery("SELECT count(id) as co FROM cases where category = " . intval($_REQUEST['category']));

$pageTotal = $pageTotal[0]['co'];

$rows = $db->rawQuery($query);

?>
 <link href='/css/paginaitor.css' rel="stylesheet" />
<style>
  img.article-image {
    transition: transform .2s;
  }
  img.article-image:hover {
    transform: scale(1.1);
  }
  a.selected-a-button, a.unselected-a-button:hover {    
    border: 1px solid #EE7D25;
    background: #EE7D25;
    margin-top: 20px;
    color: white;
    text-decoration:none;
    float:left;
    padding: 5px 20px 5px 20px;
    margin-right: 20px;
    font-size: 14px; border-radius: 4px
  }  
  a.unselected-a-button {
    text-decoration:none;
    padding: 5px 20px 5px 20px;
    float:left;
    margin-top: 20px;
    font-size: 14px; border-radius: 4px;
    margin-right: 20px;
    border: 1px solid #c4c1c1;
    background: white;
    color: black;
  }
  .u-section-3 .u-text-6 {
    margin: 13px 13px 0;
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
</style>
<script src='/js/js/all.js'></script>
    <section class="u-align-center u-clearfix u-section-2" id="sec-7fab">
      <div class="u-clearfix u-sheet u-valign-bottom-lg u-sheet-1" style='padding-left: 0%; margin-top: 20px'>
        <p class="u-align-left u-text u-text-1"> <?php echo $label; ?> </p>
        <a href="/N1/p20.php?category=<?php echo $_REQUEST['category']; ?>&s=1" class="<?php echo $mode == 1 ? $selectedMode : $unselectedMode; ?>" >最新发布</a>
        <a href="/N1/p20.php?category=<?php echo $_REQUEST['category']; ?>&s=2" class="<?php echo $mode == 2 ? $selectedMode : $unselectedMode; ?>" >热点案例</a>
        <a href="/N1/p20.php?category=<?php echo $_REQUEST['category']; ?>&s=3" class="<?php echo $mode == 3 ? $selectedMode : $unselectedMode; ?>" >面积排序</a>
      </div>
    </section>
    <section class="u-align-center u-clearfix u-section-3" id="sec-ec6c" style='margin-top: 30px'>
      <div class="u-clearfix u-sheet u-sheet-1" style='min-height: 10px; margin-bottom: 100px'>
          <?php 
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
            if ($i % 3 == 0) {
              echo "<div style='display: flex; justify-content: space-between'>";
            }
            ?>            
          <div class=" u-white u-repeater-item-3 image-cell">
            <div class="u-container-layout u-similar-container u-valign-top u-container-layout-3" style='border:1px solid #ddd; overflow:hidden'>
              <div class='image_cell_area' style='margin-top: 1px; margin-right: 1px; margin-left: 1px; width: calc(100% - 2px); overflow:hidden;
              display: flex;justify-content: center;align-items: center; background:black;'>
                <img alt="<?php echo addslashes($alt); ?>" class="article-image u-blog-control u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-image u-image-default u-image-3" 
                    src="<?php echo $r; ?>" style='background: black; object-fit: cover;  cursor:pointer;' onclick='window.location.href="/N1/p7.php?r=<?php echo $row["id"]; ?>";'>
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
                <a href="/N1/consult.php" class="u-blog-control u-btn u-button-style u-custom-color-1 u-btn-6" style='border-radius: 5px; margin-bottom: 10px; margin-right:5px; float:right; margin-top: -3px; padding: 5px 10px !Important; font-size: 12px'>这样装修多少钱?</a>
              </div>              
            </div>
          </div> 
          <?php if ($i % 3 == 2) echo "</div>"; } if (sizeof($rows) % 3 == 2) echo "<div class='u-white u-repeater-item-3 image-cell' style='height:0px'></div>";  ?>
      </div>
    </section>
    <section class='class="u-align-center u-clearfix u-section-3'>
      <div class="u-clearfix u-sheet u-sheet-1" style="min-height: 10px; margin-bottom: 100px; text-align:center">
      <ul class="pagination" id="pagination1"></ul>
    </div>
    </section>
    <script src='/js/jspaginator.js'></script>
    <script>
      if (<?php echo $pageTotal; ?> > 0) {
        $.jqPaginator('#pagination1', {
          totalPages: Math.ceil(<?php echo $pageTotal; ?> / <?php echo $pageNum; ?>),
          visiblePages: 10,
          edges: 3,
          currentPage: <?php echo $pageIndex; ?> + 1,
          onPageChange: function (num, type) {
            if (num - 1 == <?php echo $pageIndex; ?>) return;
              window.location.href = 'p2.php?category=<?php echo $_REQUEST['category']; ?>&s=<?php echo $mode; ?>&pageIndex=' + num;
          }
        });
      }
    </script>
<?php
include('../N1/footer.php');
?>

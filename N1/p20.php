<?php
$bigTitle = "智能菜场";
$label = $query = '';
switch (intval($_REQUEST['category'])) {
  case 1: $label = '所在位置／首页／农贸设计案例'; break;
  case 2: $label = '所在位置／首页／农贸建筑设计'; break;
  case 3: $label = '所在位置／首页／5G智能设计'; break;
  case 4: $label = '所在位置／首页／农贸运营案例'; $bigTitle = "农贸市场运营";  break;
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
 <link href='../css/paginaitor.css' rel="stylesheet" />
<style>
  img.article-image {
    transition: transform .2s;
  }
  img.article-image:hover {
    transform: scale(1.1);
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
  .image-cell {
    float:left;
    width: 30%;
    margin-left: 1.5%;
    margin-right: 1.5%;
    margin-top: 20px;
    overflow:hidden;
    min-width: 300px;
  }
</style>
<script src='../js/js/all.js'></script>
    <section class="u-align-center u-clearfix u-section-2" id="sec-7fab">
      <div class="u-clearfix u-sheet u-valign-bottom-lg u-sheet-1" style='padding-left: 1.5%; margin-top: 20px'>
        <p class="u-align-left u-text u-text-1"> <?php echo $label; ?> </p>
        <a href="p2.php?category=<?php echo $_REQUEST['category']; ?>&s=1" class="<?php echo $mode == 1 ? $selectedMode : $unselectedMode; ?>" >最新发布</a>
        <a href="p2.php?category=<?php echo $_REQUEST['category']; ?>&s=2" class="<?php echo $mode == 2 ? $selectedMode : $unselectedMode; ?>" >热点案例</a>
        <a href="p2.php?category=<?php echo $_REQUEST['category']; ?>&s=3" class="<?php echo $mode == 3 ? $selectedMode : $unselectedMode; ?>" >面积排序</a>
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
            
            ?>            
          <div class=" u-white u-repeater-item-3 image-cell">
            <div class="u-container-layout u-similar-container u-valign-top u-container-layout-3" style='border:1px solid #ddd; overflow:hidden'><!--blog_post_image-->
            <div style='margin-top: 10px; margin-right: 10px; margin-left: 10px; width: calc(100% - 20px); height:231px; overflow:hidden;'>
              <img alt="<?php echo addslashes($alt); ?>" class="article-image u-blog-control u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-image u-image-default u-image-3" 
                    src="<?php echo $r; ?>" style='background: black; object-fit: contain;  cursor:pointer; height: 231px' onclick='window.location.href="p7.php?r=<?php echo $row["id"]; ?>";'>
          </div>
              <div class="u-blog-control u-post-content u-text u-text-default u-text-6" style='text-align: left; white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis; margin-left: 13px;'>
                <span style='color:#ff6500'>【案例】</span>&nbsp;&nbsp;<?php echo $row['name']; ?>
              </div>
              <div class="u-blog-control u-post-content u-text u-text-default u-text-6" style=' margin-left: 13px;'>                
                <?php 
                  for ($j = 0; $j < floatval($row['stars']); $j++) 
                    echo "<div style='float:left; margin-right: 3px; padding: 0px 2px 0px 2px; border-radius:2px; background-color:#ff6500'><i class=\"fas fa-star\" style='color:white'></i></div>";
                ?>                  
                <div style='float:left; min-width:30px; min-height: 30px;'></div>
                <div style='float:left; font-size: 14px;'>
                  <i class="far fa-images"></i>&nbsp;
                  <?php echo substr_count($row['content'], '<img'); ?>
                </div>              
                <div style='float:left; min-width:30px; min-height: 30px;'></div>
                <div style='float:left;font-size: 14px;'>
                  <i class="far fa-user"></i>&nbsp;
                  <?php echo $row['browse']; ?><span style='display:none'>浏览</span>
                </div>              
              </div>
              <a href="../N1/consult.php" class="u-blog-control u-btn u-button-style u-custom-color-1 u-btn-6" style='border-radius: 5px; margin-bottom: 5px; margin-right:5px'>这样装修多少钱?
              </a>
            </div>
          </div> 
          <?php } ?>
      </div>
    </section>
    <section class='class="u-align-center u-clearfix u-section-3'>
    <div class="u-clearfix u-sheet u-sheet-1" style="min-height: 10px; margin-bottom: 100px; text-align:center">
    <ul class="pagination" id="pagination1"></ul>
    </div>
    </section>
    <script src='../js/jspaginator.js'></script>
    <script>
     if (<?php echo pageTotal; ?> > 0)
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
    $(document).ready(function() {
      
    })
    </script>
<?php
include('../N1/footer.php');
?>

<?php
  $bigTitle = "农贸新闻资讯";
  $label = $query = '';
  switch (intval($_REQUEST['category'])) {
    case 1: $label = '所在位置／<span style="cursor:pointer" onclick="window.location.href=\'/\';">首页</span>／农贸设计百科'; break;
    case 2: $label = '所在位置／<span style="cursor:pointer" onclick="window.location.href=\'/\';">首页</span>／农贸新闻资讯'; break;
    case 3: $label = '所在位置／<span style="cursor:pointer" onclick="window.location.href=\'/\';">首页</span>／光影新闻动态'; break;
    case 4: $label = '所在位置／<span style="cursor:pointer" onclick="window.location.href=\'/\';">首页</span>／政府政策文件'; break;
    default: exit;
  }

  include('header.php');
  if (!isset($_REQUEST['s'])) $_REQUEST['s'] = 1;
  $mode = intval($_REQUEST['s']);
  $selectedMode = 'selected-a-button';
  $unselectedMode = 'unselected-a-button';

  $pageIndex = isset($_REQUEST['pageIndex']) ? intval($_REQUEST['pageIndex']) - 1 : 0;
  $pageNum = 15;

  $query = "SELECT * FROM news WHERE category = " . intval($_REQUEST['category']) . " ORDER BY created_time DESC LIMIT " . ($pageIndex * $pageNum) . ", " . $pageNum;
  include('../N1/dbconfig.php');
  $db = getDbInstance();
  $pageTotal = $db->rawQuery("SELECT count(id) as co FROM news where category = " . intval($_REQUEST['category']));

  $pageTotal = $pageTotal[0]['co'];

  $rows = $db->rawQuery($query);

?>
 <link href='/css/paginaitor.css' rel="stylesheet" />
<style>
  img.article-image:hover {
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
  .image-cell:nth-child(3n + 1), .image-cell:nth-child(3n + 2) {
    margin-right:2.5%;
  }
  .image-cell:nth-child(3n + 3), .image-cell:nth-child(3n + 2) {
    margin-left:2.5%;
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
  hr {
    margin-bottom: 0px !important;
  }
</style>
<script src='/js/js/all.js'></script>
    <section class="u-align-center u-clearfix u-section-2" id="sec-7fab">
      <div class="u-clearfix u-sheet u-valign-bottom-lg u-sheet-1" style='padding-left: 0%; margin-top: 20px; min-height:0px;'>
        <p class="u-align-left u-text u-text-1"> <?php echo $label; ?> </p>
        <hr>        
      </div>
    </section>
    <section class="u-align-center u-clearfix u-section-3" id="sec-ec6c" style='margin-top: 0px'>
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
            <div style='margin-top: 0px; margin-right: 0px; margin-left: 0px; width: calc(100% - 0px); height:300px; width:100%; overflow:hidden;margin-bottom: 0px'>
              <img alt="<?php echo addslashes($alt); ?>" class="article-image u-blog-control u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-image u-image-default u-image-3" 
                    src="<?php echo $r; ?>" style='background: black; object-fit: cover;  cursor:pointer; height: 300px; width:100%;' onclick='window.location.href="/N1/p26.php?r=<?php echo $row["id"]; ?>";'>
              <div onclick='window.location.href="/N1/p26.php?r=<?php echo $row["id"]; ?>";'
                    style='margin-top: -30px; position: absolute; padding-left: 10px; font-weight: 100 !Important; cursor:pointer; 
                            width: 100%; height: 30px; background:#0005; color: white; text-align: left; white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;'>
                <?php echo htmlspecialchars($row['title']); ?>
                </div>
            </div>              
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
    <script src='/js/jspaginator.js'></script>
    <script>
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

    });
    </script>
<?php
include('../N1/footer.php');
?>
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
    <a href="javascript:void(0)" class="selected-a-button" onclick='refreshSorting(1)'>最新发布</a>
    <a href="javascript:void(0)" class="unselected-a-button" onclick='refreshSorting(2)'>热点案例</a>
    <a href="javascript:void(0)" class="unselected-a-button" onclick='refreshSorting(3)'>星级排序</a>
  </div>
</section>
<section class="u-align-center u-clearfix u-section-3" id="sec-ec6c" style='margin-top: 30px'>
  <div class="u-clearfix u-sheet u-sheet-1" style='min-height: 10px; margin-bottom: 100px' id='piece_content'>
      
  </div>
</section>
<section class='class="u-align-center u-clearfix u-section-3'>
  <div class="u-clearfix u-sheet u-sheet-1" style="min-height: 10px; margin-bottom: 100px; text-align:center">
  <ul class="pagination" id="pagination1"></ul>
</div>
</section>
<script src='/js/jspaginator.js'></script>
<script>  
  let currentCategory;
  function occurrences(string, subString, allowOverlapping) {
    string += "";
    subString += "";
    if (subString.length <= 0) return (string.length + 1);

    var n = 0,
        pos = 0,
        step = allowOverlapping ? 1 : subString.length;

    while (true) {
        pos = string.indexOf(subString, pos);
        if (pos >= 0) {
            ++n;
            pos += step;
        } else break;
    }
    return n;
  }
  function openDetail(id) {
    if (currentCategory == 1)  window.location.href="/zxsj/" + id + ".html";
    else if (currentCategory == 2)  window.location.href="/jzsj/" + id + ".html";
    else if (currentCategory == 3)  window.location.href="/znsj/" + id + ".html";
    else if (currentCategory == 4)  window.location.href="/nmyy/" + id + ".html";
  }
  function refreshSorting(mode) {
    loadPages(currentCategory, mode, 0);
  }
  function loadPages(category, sort, pageNumber) {
    $.post('/api/getpieces.php', {category, sort, pageNumber}, function(data,b) {
      if (b != 'success') return;
      if (!data || data.result != 'success') return;
      $.jqPaginator('#pagination1', {
        totalPages: Math.ceil(data.length / 15),
        visiblePages: 10,
        edges: 3,
        currentPage: pageNumber + 1,
        onPageChange: function (num, type) {
          if (num - 1 == pageNumber) return;
          loadPages(category, sort, num - 1);
        }
      });
      let htmlString = "";
      for (let i = 0; i < data.items.length; i++) {             
        let row = data.items[i];
        let r = row['content'].indexOf('<img');
        let alt = "No Image";
        if (r != -1) {
          let d = row.content.substr(r + 4).indexOf('src=') + r + 9;
          r = row.content.substr(d + 10).indexOf('"') + d + 10;
          r = row['content'].substr(d, r - d); 
          alt = "Image";
        } else r = '';
        if (i % 3 == 0) {
          htmlString += "<div style='display: flex; display: -webkit-flex; justify-content: space-between; -webkit-justify-content: space-between'>";
        }
        htmlString += `<div class=" u-white u-repeater-item-3 image-cell">
        <div class="u-container-layout u-similar-container u-valign-top u-container-layout-3" style='border:1px solid #ddd; overflow:hidden'>
          <div class='image_cell_area' style='margin-top: 1px; margin-right: 1px; margin-left: 1px; width: calc(100% - 2px); overflow:hidden;
          display: flex; display: -webkit-flex; justify-content: center; -webkit-justify-content: center; align-items: center; background:black;'>
            <img alt="` + alt + `" class="article-image u-blog-control u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-image u-image-default u-image-3" 
                src="` + r + `" style='background: black; object-fit: cover;  cursor:pointer;' onclick='openDetail(` + row['id'] + `)'>
          </div>
          <div class="u-blog-control u-post-content u-text u-text-default u-text-6" style='text-align: left; white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis; margin-left: 13px;'>
            <span style='color:#ff6500'>【案例】</span>&nbsp;&nbsp;` + row['name'] + `</div>
          <div class="u-blog-control u-post-content u-text u-text-default u-text-6" style=' margin-left: 13px;'>`;

        for (let j = 0; j < Number($row['stars']); j++) 
          htmlString += "<div style='float:left; margin-right: 3px; padding: 0px 2px 0px 2px; border-radius:2px; background-color:#ff6500'><i class=\"fas fa-star\" style='color:white'></i></div>";
        
        htmlString += `<div style='float:left; min-width:20px; min-height: 30px;'></div>
            <div style='float:left; font-size: 12px;line-height: 24px'>
              <i class="far fa-images"></i>&nbsp;` + occurrences(row['content'], '<img') + `
            </div>              
            <div style='float:left; min-width:20px; min-height: 30px;'></div>
            <div style='float:left; font-size: 12px;line-height: 24px'>
              <i class="far fa-user"></i>&nbsp;` + row['browse'] + `<span style='display:none'>浏览</span>
                  </div>              
                  <a href="/N1/consult.php" class="u-blog-control u-btn u-button-style u-custom-color-1 u-btn-6" style='border-radius: 5px; margin-bottom: 10px; margin-right:5px; float:right; margin-top: -3px; padding: 5px 10px !Important; font-size: 12px'>这样装修多少钱?</a>
                </div>
              </div>
            </div>`;
      if (i % 3 == 2) 
        htmlString += "</div>"; 
      } 
      if (rows.length % 3 == 2) htmlString += "<div class='u-white u-repeater-item-3 image-cell' style='height:0px'></div>";  
      $("#piece_content").html(htmlString);
    }).fail(function() {
      alert("失败！");
    })
  }    
  $(document).ready(function() {
    if (window.location.href.includes("/zxsj")) currentCategory = 1;
    else if (window.location.href.includes("/jzsj")) currentCategory = 2;
    else if (window.location.href.includes("/znsj")) currentCategory = 3;
    else if (window.location.href.includes("/nmyy")) currentCategory = 4;
    else {
      let cIndex = (window.location.href.indexOf("category=");
      if (cIndex == -1) { window.location.href = '/'; return; }
      currentCategory = parseInt(window.location.href.substr(cIndex+9));
    }
    loadPages(currentCategory, 0, 0);
  });
  
  if (<?php echo $pageTotal; ?> > 0) {
    $.jqPaginator('#pagination1', {
      totalPages: Math.ceil(<?php echo $pageTotal; ?> / <?php echo $pageNum; ?>),
      visiblePages: 10,
      edges: 3,
      currentPage: <?php echo $pageIndex; ?> + 1,
      onPageChange: function (num, type) {
        if (num - 1 == <?php echo $pageIndex; ?>) return;
        if (<?php echo $_REQUEST['category']; ?> == 1) {
          window.location.href = '/zxsj/<?php echo $mode; ?>_' + num + ".html";
        }
        else if (<?php echo $_REQUEST['category']; ?> == 2) {
          window.location.href = '/jzsj/<?php echo $mode; ?>_' + num + ".html";
        }
        else if (<?php echo $_REQUEST['category']; ?> == 3) {
          window.location.href = '/znsj/<?php echo $mode; ?>_' + num + ".html";
        }
        else if (<?php echo $_REQUEST['category']; ?> == 4) {
          window.location.href = '/nmyy/<?php echo $mode; ?>_' + num + ".html";
        }
      }
    });
  }      
</script>
<?php
include('../N1/footer.php');
?>






















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
          echo "<div style='display: flex; display: -webkit-flex; justify-content: space-between; -webkit-justify-content: space-between'>";
        }
        ?>            
      <div class=" u-white u-repeater-item-3 image-cell">
        <div class="u-container-layout u-similar-container u-valign-top u-container-layout-3" style='border:1px solid #ddd; overflow:hidden'>
          <div class='image_cell_area' style='margin-top: 1px; margin-right: 1px; margin-left: 1px; width: calc(100% - 2px); overflow:hidden;
          display: flex; display: -webkit-flex; justify-content: center; -webkit-justify-content: center; align-items: center; background:black;'>
            <img alt="<?php echo addslashes($alt); ?>" class="article-image u-blog-control u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-image u-image-default u-image-3" 
                src="<?php echo $r; ?>" style='background: black; object-fit: cover;  cursor:pointer;' onclick='openDetail(<?php echo $row["id"]; ?>, <?php echo $row['category']; ?>)'>
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
            <div style='float:left; font-size: 12px;line-height: 24px'>
              <i class="far fa-user"></i>&nbsp;
              <?php echo $row['browse']; ?><span style='display:none'>浏览</span>
            </div>              
            <a href="/N1/consult.php" class="u-blog-control u-btn u-button-style u-custom-color-1 u-btn-6" style='border-radius: 5px; margin-bottom: 10px; margin-right:5px; float:right; margin-top: -3px; padding: 5px 10px !Important; font-size: 12px'>这样装修多少钱?</a>
          </div>
        </div>
      </div> 
      <?php if ($i % 3 == 2) echo "</div>"; } if (sizeof($rows) % 3 == 2) echo "<div class='u-white u-repeater-item-3 image-cell' style='height:0px'></div>";  ?>
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
      <div class="u-clearfix u-sheet u-sheet-1" style='min-height: 10px; margin-bottom: 100px' id='content_area'>
          
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
      function goDetail(id) {
        if (currentCategory == 1)  window.location.href="/sjbk/" + id + ".html";
        else if (currentCategory == 2)  window.location.href="/news/" + id + ".html";
        else if (currentCategory == 3)  window.location.href="/gyxw/" + id + ".html";
        else if (currentCategory == 4)  window.location.href="/gov/" + id + ".html";
      }
      var pageFunc = ($.jqPaginator);
      function refreshPaginator(totalCount, pageNumber) {
        pageFunc('#pagination1', {
          totalPages: Math.ceil(totalCount / 15),
          visiblePages: 10,
          edges: 3,
          currentPage: pageNumber + 1,
          onPageChange: function (num, type) {
            if (num - 1 == pageNumber) return;
            loadPages(category, num - 1);
          }
        });
      }  
      function escapeHtml(text) {
        return text
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
      }
      function loadPages(category, pageNumber) {
        $.post('/api/getnews.php', {category, pageNumber}, function(data,b) {
          if (b != 'success') return;
          if (!data || data.result != 'success') return;          
          
          let htmlString = "";
          let rows = data.items;
          refreshPaginator(rows.length, pageNumber);
          
          for (let i = 0; i < rows.length; i++) {
            row = rows[i];
            let r = row['content'].indexOf('<img');
            let alt = "No Image";
            let d;
            if (r != -1) {
              d = row.content.substr(r + 4).indexOf('src=') + r + 9; //strpos(substr($row['content'], $r + 4), 'src=') + $r + 9;
              r = row.content.substr(d+10).indexOf('"') + d + 10; //strpos(substr($row['content'], $d + 10), '"') + $d + 10;
              r = row.content.substr(d, r - d); //substr($row['content'], $d, $r - $d);
              alt = "Image";
            } else r = '';
            htmlString += `<div class=" u-white u-repeater-item-3 image-cell">
                <div class="u-container-layout u-similar-container u-valign-top u-container-layout-3" style='border:1px solid #ddd; overflow:hidden'><!--blog_post_image-->
                <div style='margin-top: 0px; margin-right: 0px; margin-left: 0px; width: calc(100% - 0px); height:300px; width:100%; overflow:hidden;margin-bottom: 0px'>
                  <img alt="` + alt + `" class="article-image u-blog-control u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-image u-image-default u-image-3" 
                        src="<?php echo $r; ?>" style='background: black; object-fit: cover;  cursor:pointer; height: 300px; width:100%;' 
                        onclick='goDetail(<?php echo $row["id"]; ?>)'>
                  <div onclick='goDetail(<?php echo $row["id"]; ?>)'
                        style='margin-top: -30px; position: absolute; padding-left: 10px; font-weight: 100 !Important; cursor:pointer; 
                                width: 100%; height: 30px; background:#0005; color: white; text-align: left; white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;'>` 
                                + escapeHtml(row['title']) +`</div>
                </div>              
                </div>
              </div>`; 
          }
          if (rows.length % 3 == 2) 
            htmlString += "<div class='u-white u-repeater-item-3 image-cell' style='height:0px'>";  
          else if (rows.length % 3 == 1) 
            htmlString += "<div class='u-white u-repeater-item-3 image-cell' style='height:0px'></div><div class='u-white u-repeater-item-3 image-cell' style='height:0px'></div>";  
          $("#piece_content").html(htmlString);
        }).fail(function() {
          alert("失败！");
        })
      }

      $(document).ready(function() {        
        if (window.location.href.includes("/sjbk")) currentCategory = 1;
        else if (window.location.href.includes("/news")) currentCategory = 2;
        else if (window.location.href.includes("/gyxw")) currentCategory = 3;
        else if (window.location.href.includes("/gov")) currentCategory = 4;
        else {
          let cIndex = window.location.href.indexOf("category=");
          if (cIndex == -1) { window.location.href = '/'; return; }
          currentCategory = parseInt(window.location.href.substr(cIndex+9));
        }
        loadPages(currentCategory, 0);        
      });
    </script>
<?php
include('../N1/footer.php');
?>











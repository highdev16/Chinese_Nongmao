<?php
  $bigTitle = "农贸新闻资讯";
  $label = $query = '';
  switch (intval($_REQUEST['category'])) {
    case 1: $label = '所在位置／<span style="cursor:pointer" onclick="window.location.href=\'/\';">首页</span>／农贸设计百科'; break;
    case 2: $label = '所在位置／<span style="cursor:pointer" onclick="window.location.href=\'/\';">首页</span>／农贸新闻资讯'; break;
    case 3: $label = '所在位置／<span style="cursor:pointer" onclick="window.location.href=\'/\';">首页</span>／光影新闻动态'; break;
    case 4: $label = '所在位置／<span style="cursor:pointer" onclick="window.location.href=\'/\';">首页</span>／政府政策文件'; break;
    case 5: $label = '农贸市场运营 / 农贸培训周刊'; break;
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
  .image-cell {
    float: left;
    width: 100%;
    margin-left: 0%;
    margin-right: 0%;
    margin-top: 20px;
    overflow: hidden;
    min-width: 0px;
}
  hr {
    margin-bottom: 0px !important;
  }
</style>
    <script src='/js/js/all.js'></script>
    <section class="u-align-center u-clearfix u-section-2" id="sec-7fab">
      <div class="u-clearfix u-sheet u-valign-bottom-lg u-sheet-1" style='padding-left: 0%; margin-top: 20px; min-height:0px; width: calc(100% - 40px); margin: 20px auto 0px auto; max-width: 1500px;'>
        <p class="u-align-left u-text u-text-1" style='width: 100%'> <?php echo $label; ?> </p>
        <hr>        
      </div>
    </section>
    <section class="u-align-center u-clearfix u-section-3" id="sec-ec6c" style='margin-top: 0px'>
      <div class="grid-cell-container" style='min-height: 10px; margin-bottom: 30px; display: grid' id='piece_content'>
          
      </div>
    </section>
    <section class='class="u-align-center u-clearfix u-section-3'>
    <div class="u-clearfix u-sheet u-sheet-1" style="min-height: 10px; margin-bottom: 30px; text-align:center">
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
        else if (currentCategory == 5)  window.location.href="/nmpx/" + id + ".html";
      }
      var pageFunc = ($.jqPaginator);
      function refreshPaginator(totalCount, pageNumber) {
        pageFunc('#pagination1', {
          totalPages: Math.ceil(totalCount / 15),
          visiblePages: ($(window).width() < 500 ? 3 : 10),
          edges: 3,
          currentPage: pageNumber + 1,
          onPageChange: function (num, type) {
            if (num - 1 == pageNumber) return;
            loadPages(<?php echo $_REQUEST['category']; ?>, num - 1);
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
          refreshPaginator(data.length1, pageNumber);
          
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
                <div class="u-container-layout u-similar-container u-valign-top u-container-layout-3" style='padding-left: 0px; padding-right: 0px; border:1px solid #ddd; overflow:hidden'><!--blog_post_image-->
                <div style='margin-top: 0px; margin-right: 0px; margin-left: 0px; width: calc(100% - 0px); height:300px; width:100%; overflow:hidden;margin-bottom: 0px'>
                  <img alt="` + alt + `" class="article-image u-blog-control u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-image u-image-default u-image-3" 
                        src="` + r + `" style='background: black; object-fit: cover;  cursor:pointer; height: 300px; width:100%;' 
                        onclick='goDetail(` + row['id'] + `)'>
                  <div onclick='goDetail(` + row['id'] + `)'
                        style='margin-top: -30px; position: absolute; padding-left: 10px; font-weight: 100 !Important; cursor:pointer; 
                                width: 100%; height: 30px; background:#0005; color: white; text-align: left; white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;'>` 
                                + escapeHtml(row['title']) +`</div>
                </div>              
                </div>
              </div>`; 
          }          
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
        else if (window.location.href.includes("/nmpx")) currentCategory = 5;
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











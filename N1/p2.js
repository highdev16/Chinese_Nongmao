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
    $(".refresh-button").each(function() {
        if ($(this).attr('data-val') == mode) {
            $(this).addClass('selected-a-button').removeClass('unselected-a-button');            
        } else {
            $(this).addClass('unselected-a-button').removeClass('selected-a-button');            
        }
    })
  }
  var pageFunc = ($.jqPaginator), consulLink;
  function refreshPaginator(totalCount, pageNumber, sort) {
    pageFunc('#pagination1', {
      totalPages: Math.ceil(totalCount / 15),
      visiblePages: ($(window).width() < 500 ? 3 : 10),
      edges: 3,
      currentPage: pageNumber + 1,
      onPageChange: function (num, type) {
        if (num - 1 == pageNumber) return;
        loadPages(category, sort, num - 1);
      }
    });
  }  
  function loadPages(category, sort, pageNumber) {
    $.post('/api/getpieces.php', {category, sort, pageNumber}, function(data,b) {
      if (b != 'success') return;
      if (!data || data.result != 'success') return;
      
      
      let htmlString = "";
      let rows = data.items;
      refreshPaginator(rows.length, pageNumber, sort);
      for (let i = 0; i < rows.length; i++) {             
        let row = rows[i];
        let r = row['content'].indexOf('<img');
        let alt = "No Image";
        if (r != -1) {
          let d = row.content.substr(r + 4).indexOf('src=') + r + 9;
          r = row.content.substr(d + 10).indexOf('"') + d + 10;
          r = row['content'].substr(d, r - d); 
          alt = "Image";
        } else r = '';
        if (i == 0) {
        //   htmlString += "<div style='display: flex; display: -webkit-flex; justify-content: space-between; -webkit-justify-content: space-between'>";
            htmlString += `<div class='grid-cell-container' style="display: grid;">`;
        }
        htmlString += `<div class="u-container-layout u-similar-container u-valign-top u-container-layout-3" style='border:1px solid #ddd; overflow:hidden'>
          <div class='image_cell_area' style='margin-top: 1px; margin-right: 1px; margin-left: 1px; width: calc(100% - 2px); overflow:hidden;
          display: flex; display: -webkit-flex; justify-content: center; -webkit-justify-content: center; align-items: center; background:black;'>
            <img alt="` + alt + `" class="article-image u-blog-control u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-image u-image-default u-image-3" 
                src="` + r + `" style='background: black; object-fit: cover;  cursor:pointer;' onclick='openDetail(` + row['id'] + `)'>
          </div>
          <div class="u-blog-control u-post-content u-text u-text-default u-text-6" style='text-align: left; white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis; margin-left: 13px;'>
            <span style='color:#ff6500'>【案例】</span>&nbsp;&nbsp;` + row['name'] + `</div>
          <div class="u-blog-control u-post-content u-text u-text-default u-text-6" style=' padding-left: 13px; width: 100%; margin-left: 0px; margin-right: 0px; padding-right: 13px'>`;

        for (let j = 0; j < Number(row['stars']); j++) 
          htmlString += "<div style='float:left; margin-right: 3px; padding: 0px 2px 0px 2px; border-radius:2px; background-color:#ff6500'><i class=\"fas fa-star\" style='color:white'></i></div>";
        
        htmlString += `<div style='float:left; min-width:20px; min-height: 30px;'></div>
            <div style='float:left; font-size: 12px;line-height: 24px'  class='user-icon'>
              <i class="far fa-images"></i>&nbsp;` + occurrences(row['content'], '<img') + `
            </div>              
            <div style='float:left; min-width:20px; min-height: 30px;'></div>
            <div style='float:left; font-size: 12px;line-height: 24px'>
              <i class="far fa-user"></i>&nbsp;` + row['browse'] + `<span style='display:none'>浏览</span>
                  </div>              
                  <a href="` + consulLink + `" target='popup' class="u-blog-control u-btn u-button-style u-custom-color-1 u-btn-6 consultation-link" style='border-radius: 5px; margin-bottom: 10px; margin-right:5px; float:right; margin-top: -3px; padding: 5px 10px !Important; font-size: 12px'>这样装修多少钱?</a>
                </div>
              </div>
            `;
      } 
      $("#piece_content").html(htmlString + (rows.length > 0 && "</div>"));
    }).fail(function() {
      alert("失败！");
    })
  }    
  $.post('/api/get-consultation.php', function(a,b) {
    try {
      a = JSON.parse(a);
      if (a.result != 'success') return;
    } catch (e) {return;}
    $('.consultation-link').attr('href', consulLink = a.link).attr('target', 'popup');
  })
  $(document).ready(function() {    
    if (window.location.href.includes("/zxsj")) currentCategory = 1;
    else if (window.location.href.includes("/jzsj")) currentCategory = 2;
    else if (window.location.href.includes("/znsj")) currentCategory = 3;
    else if (window.location.href.includes("/nmyy")) currentCategory = 4;
    else {
      let cIndex = window.location.href.indexOf("category=");
      if (cIndex == -1) { window.location.href = '/'; return; }
      currentCategory = parseInt(window.location.href.substr(cIndex+9));
    }
    loadPages(currentCategory, 1, 0);
    $(".refresh-button").click(function() {
        refreshSorting(Number($(this).attr('data-val')))
    })
  });    

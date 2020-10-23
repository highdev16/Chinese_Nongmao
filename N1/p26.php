<?php
$bigTitle = "农贸新闻资讯";
include ('header.php');
if (!isset($db)) {
  include ("../N1/dbconfig.php");
  $db = getDbInstance();
}
$rows = $db->query("SELECT keywords FROM news WHERE id=" . $_REQUEST['r']);
$data = $rows[0]['keywords'];
?>
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
<link href='/css/paginaitor.css' rel="stylesheet" />
<style>
  .u-section-3 {
    background: #f0f0f0 !important;
  }
  #maincontent_area img {
    width: 100% !important;
    height: auto !important;
  }
  #thumbnail-row td {
    padding: 0;
  }
  img.thumbnail-image {
    opacity: 0.8;
    border:1px solid #ccc;
    cursor:pointer;
  }
  img.thumbnail-image:hover {
    opacity: 1;
  }
  img.thumbnail-image.selected{
    opacity: 1;
    border:1px solid red;
  }
  div.preNext:hover{
    background: #0000;
  }
  div.preNext {
    width:100%;
    height:100%;
    background: #ddd;
    top:0;
    left: 0;
    position: absolute;
  }
  td.arrowcell:hover img {
    opacity: 0.5;    
  }
  td.arrowcell {
    cursor:pointer;
    min-width: 20px;
    max-width: 20px;
    border-color: #f0f0f0;
    border: 0px solid red;
  }
  td.arrowcell img {
    margin-top: -10px;
    position: absolute;
    width:20px; height:20px;
    left:0px;
  }
    .u-form-field-error {
    border: 1px solid red;
    }
    table.class_specified tr td:first-child input {
		width: 20px;
		height: 20px;
	}
	table.class_specified tr td:first-child{
		color: orange;
		margin-right: 20px;
		vertical-align: top;
  }
  .main_content_area p {
      margin-top: 5px;
      margin-bottom: 5px;
  }
  .main_content_area{
      margin-top: 30px;
      width: 100%;
      font-weight: 100 !important;
  }
	table.class_specified tr td:last-child {
		padding-left: 20px;
    vertical-align: top;
  } 
  button.gotootherpage:hover {
    border: 0px solid #ff6500 !important;
    background-color: #ff6500 !important;
    color: white;
  }
  button.gotootherpage {
    background: white; border: 0px solid black;    
    color: rgb(0, 205, 0);
    font-weight: bold !Important;
  }
  </style>
  <script src='/js/js/all.js'></script>
    <section class="u-clearfix u-section-2" id="sec-9ff4">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <p class="u-custom-font u-text u-text-default u-text-1"> 所在位置<span style='font-family: "Helvetica Neue" !important;'>／</span>
        <span style="cursor:pointer" onclick="window.location.href='/';">首页</span><span style='font-family: "Helvetica Neue" !important;'>／</span>
        <span style="cursor:pointer" onclick="" id='categoryLabel'></span><span style='font-family: "Helvetica Neue" !important;'>／</span>
        <span id='articleTitle'></span></p>
      </div>
    </section>
    <section class="skrollable u-clearfix u-grey-10 u-section-3" id="sec-50da">
      <div class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-md u-valign-middle-xl u-sheet-1">
        <div class="u-clearfix u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-gutter-16 u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
                <div class="u-container-style u-layout-cell u-left-cell u-size-45 u-white u-layout-cell-1">                
                  <div class="u-container-layout u-container-layout-1" id='maincontent_area' style='padding: 30px 30px 30px 30px'>
                    <div class='yahei' style='font-size: 24px; font-weight: bold; text-align: center' id='titleLabel'></div>
                    <div style='font-size: 14px; font-weight: 100; color: #999; margin-top: 10px'>
                        <div style='float:left;margin-right: 10px'><i class='fa fa-clock'></i></div>
                        <div style='float:left; margin-right: 50px' id='createdTimeLabel'></div>
                        <div style='float:left;margin-right: 10px'><i class='fa fa-user'></i></div>
                        <div style='float:left;margin-right: 50px' id='writerLabel'></div>
                        <div style='float:left;margin-right: 10px'><i class='fa fa-eye'></i></div>
                        <div style='float:left;' id='browsecount'></div>
                        <div style='width: 100%; height: 30px'></div>
                    </div>
                    <div style='width: 100%;' class='main_content_area'>
                    </div>
                    <div style='width: 100%; display: flex; justify-content: space-between; margin-top: 30px'>
                      <div style='display: flex'>
                        <button class='gotootherpage' style='margin-right: 10px;' id='prevLinkButton'>上一页</button>
                        <div style='max-width: 200px; text-overflow: ellipsis;; white-space:nowrap' id='prevLinkLabel'>OKsadfsadfsafsa</div>
                      </div>
                      <div style='display: flex'>
                        <button class='gotootherpage' style='margin-right: 10px' id='currentCategoryButton'>返回</button>
                        <div style='max-width: 200px; text-overflow: ellipsis;; white-space:nowrap' id='currentCategoryLabel'>OKsadfsadfsafsa</div>
                      </div>
                      <div style='display: flex'>
                        <div style='max-width: 200px; text-overflow: ellipsis; white-space:nowrap' id='nextLinkLabel'>OKsadfsadfsafsa</div>
                        <button class='gotootherpage' style='margin-left: 10px' id='nextLinkButton'>下一页</button>                        
                      </div>
                    </div>
                    <div style='margin-top: 60px; color: #888; margin-bottom: 30px'>
                      声明：本站原创文章所有权归光影农贸市场研究院所有，转载务必注明来源；<br>
                      转载文章仅代表原作者观点，不代表本站立场；如有侵权、违规，请联系qq：712323016。
                    </div>
                </div>
              </div>
              <div class="u-container-style u-layout-cell u-right-cell u-size-15 u-white u-layout-cell-2" id='fixed_sidebar' style='height: fit-content; min-height: 0px'>
                <div class="u-container-layout u-container-layout-2">
                  <p class="u-custom-font u-text u-text-default u-text-1">我需要： （可多选)</p>
                  <div class="u-clearfix u-custom-html u-custom-html-1">
                    
                    <table class="class_specified">
                      <tbody>
                        <tr>
                          <td>
                            <input type="checkbox" id="s111111">
                          </td>
                          <td> 设计</td>
                        </tr>
                        <tr>
                          <td>
                            <input type="checkbox" id="s111112">
                          </td>
                          <td> 运营 </td>
                        </tr>
                        <tr>
                          <td>
                            <input type="checkbox" id="s111113">
                          </td>
                          <td> 投资<br>
                            <small>我有资金找农贸项目</small>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <input type="checkbox" id="s111114">
                          </td>
                          <td> 融资<br>
                            <small>我有农贸项目找资金</small>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="u-form u-form-1">
                    <form action="#" method="POST" onsubmit="return false;" class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" style="padding: 0;" source="custom" name="form">
                      <div class="u-form-group u-form-name u-form-group-1">
                        <label for="name-d35a" class="u-form-control-hidden u-label">Name</label>
                        <input type="text" placeholder="输人您的姓名" id="namefield" name="name" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                      </div>
                      <div class="u-form-email u-form-group u-form-group-2">
                        <label for="email-d35a" class="u-form-control-hidden u-label">Email</label>
                        <input type="email" placeholder="输人您的电话" id="emailfield" name="email" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                      </div>
                      <div class="u-form-group u-form-message u-form-group-3">
                        <label for="message-d35a" class="u-form-control-hidden u-label">Message</label>
                        <textarea placeholder="我需要解决的同题是" rows="4" cols="50" id="messagefield" name="message" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required=""></textarea>
                      </div>
                      <div class="u-align-center u-form-group u-form-group-4">
                        <a href="#" class="u-btn u-btn-submit u-button-style u-custom-color-1 u-btn-1" onclick='submitForm()'>立即咨询</a>
                        <input type="submit" value="submit" class="u-form-control-hidden">
                      </div>
                      <div class="u-form-send-message u-form-send-success"> 谢谢！ 您的留言已发送。 </div>
                      <div class="u-form-send-error u-form-send-message"> 无法发送您的消息。 请修正错误，然后重试。 </div>
                    </form>
                  </div>
                  <div class="u-clearfix u-custom-html u-expanded-width u-custom-html-2">
                    <p style="text-align:center">已有<big style="color: red" class='applicant_number'></big>业主申请了此服务
                    </p>
                    <p style="text-align:center; background: lightgray">7×24免费装修设计咨询<br> 0571-88776655 
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>    
    <script>
      function make2(s) {
        return s < 10? "0" + s : s;
      }
      function GetDateStringOf(s) {
        return s.getFullYear() + "-" + make2(s.getMonth() + 1) + "-" + make2(s.getDate()) + " "
              + make2(s.getHours()) + ":" + make2(s.getMinutes()) + ":" + make2(s.getSeconds());
      }
      $("img.thumbnail-image").click(function() {
        $("img.thumbnail-image.selected").removeClass('selected');
        $(this).addClass('selected');
        $("#mainImage").attr('src', $(this).attr('src'));
      });

      let sidebarFixed = null, sidebar;
      $(document).ready(function() {
        sidebar = $("#fixed_sidebar");
        let position = sidebar.offset();
        let width = Number(sidebar.width()) + 16;
        let height = sidebar.height();
        let s = sidebar.clone().insertAfter($("footer"));
        sidebarFixed = s;
        s.addClass('sidebar-fixed')
            .css('position', 'fixed')
            .css('left', position.left + "px")
            .css('top', "70px")
            .css('height', 750 + "px")
            .css('width', width + "px")
            .css('border', "8px solid #fff0")
            .css('padding', "5px 30px 30px 15px").hide();
        window.addEventListener('scroll', function(){
          let gita = ($("footer"));          
          if (document.documentElement.scrollTop < 70) {
            sidebarFixed[0].style.display = 'none';
            sidebar.show();
          }
          else {
            if (gita.offset().top - 15 < document.documentElement.scrollTop + 750) {
              sidebarFixed.css('top', gita.offset().top - 15 - 750 -document.documentElement.scrollTop + "px");
            } else sidebarFixed.css('top', "70px");
            sidebarFixed[0].style.display = 'block';
            sidebar.hide();
          }
        });

        s.find("input, textarea").each(function(ind, ele) {
          if (this.hasAttribute('id')) {
            $(this).attr('id', $(this).attr('id') + "_second");
            if (($(this).attr('type') || "").toLowerCase() == 'checkbox') {
              let self = this;

              $(this).change(function() {
                $("#" + self.id.substr(0, self.id.length - 7)).prop('checked', (this.checked));
              })
            } else {
              let self = this;
              $(this).change(function() {
                $("#" + self.id.substr(0, self.id.length - 7)).val((self.value));
              })
            }
          }
        })
        sidebar.find("input, textarea").each(function(ind, ele) {
          if (this.hasAttribute('id')) {
            if (($(this).attr('type') || "").toLowerCase() == 'checkbox') {
              let self = this;
              $(this).change(function() {
                $("#" + self.id + "_second").prop('checked', (this.checked));
              })
            } else {
              let self = this;
              $(this).change(function() {
                $("#" + self.id + "_second").val((self.value));
              })
            }
          }
        })
///------------------ content fill ------------------////
        let href = window.location.href.split('/');
        let r = href[href.length - 1].split('.');
        r = r[0];
        $.post('/api/get_applicants_number.php', function(a,b) {
          if (b == 'success') {
            try {
              a = JSON.parse(a);
              if (a['result'] == 'success') {
                $(".applicant_number").html(a.data + "");
              }
            } catch(e) {}
          }
        });
        let categoryArr = ['', '农贸设计百科', '农贸新闻资讯', '光影新闻动态', '政府政策文件'];
        $.post('/api/getarticle.php', {r}, function(a,b) {
          if (b == 'success') {
            try {
              a = JSON.parse(a);
              if (a['result'] == 'success') {
                a = a.data;
                let myCategory = a['row']['category'];
                $("section.mainmenu6 div.u-layout-row > div:nth-child(" + myCategory + ") p").addClass('active-submenu');
                $("#browsecount").html(a.row.browse + "");
                $("#categoryLabel").html(categoryArr[a.row['category']]).click(function() {
                  window.location.href="/" + categoryLabelStrings[a.row.category] + "/"; //'/N1/p25.php?category=' + a.row.category;
                });
                $("#articleTitle").html(a.row.title);
                $("#titleLabel").html(a.row.title);
                $("#createdTimeLabel").html(GetDateStringOf(new Date(a.row.created_time * 1000)));
                $("#writerLabel").html(a.row.writer);
                
                let categoryLabelStrings = ['', 'sjbk', 'news', 'gyxw', 'gov'];
                $("#currentCategoryButton").click(function() {
                    window.location.href="/" + categoryLabelStrings[a.row.category] + "/"; //'/N1/p25.php?category=' + a.row.category;
                  });
                $("#currentCategoryLabel").html(categoryArr[a.row.category]);
                if (a.next) {
                  $("#nextLinkLabel").html(a.next.title);
                  $("#nextLinkButton").click(function() {
                    window.location.href = "/" + categoryLabelStrings[a.next.category] + "/" + a.next.id + ".html";
                  });
                } else {
                  $("#nextLinkButton, #nextLinkLabel").css('opacity', 0);
                }

                if (a.prev) {
                  $("#prevLinkLabel").html(a.prev.title);
                  $("#prevLinkButton").click(function() {
                    window.location.href="/" + categoryLabelStrings[a.prev.category] + "/" + a.prev.id + ".html";
                  });
                } else {
                  $("#prevLinkButton, #prevLinkLabel").css('opacity', 0);
                }
                $("div.main_content_area").html(a.row.content);
              }
            } catch(e) {}
          }
        })
      })
   
      function submitForm() {
        $("div.u-form-send-message").hide();
        $(".u-form-field-error").removeClass('u-form-field-error');
        if ($("#namefield").val().trim().length == 0) {
          $("#namefield").addClass('u-form-field-error');
        }
        if ($("#emailfield").val().trim().length == 0 || $("#emailfield").val().indexOf('@') == -1) {
          $("#emailfield").addClass('u-form-field-error');
        }
        if ($("#messagefield").val().trim().length == 0 || $("#emailfield").val().indexOf('@') == -1) {
          $("#messagefield").addClass('u-form-field-error');
        }
        let type = [];
        if ($("#s111111")[0].checked) type.push('设计');
        if ($("#s111112")[0].checked) type.push('运营');
        if ($("#s111113")[0].checked) type.push('投资');
        if ($("#s111114")[0].checked) type.push('融资');
        $.post('/N1/save_consult.php', { data: {
              name: $("#namefield").val().trim(), 
              email: $("#emailfield").val().trim(), 
              message: $("#messagefield").val().trim(), 
              type
        }}, function(a,b) {
          if (a == 'success') {
            $("div.u-form-send-success").show(0).delay(3000).hide(0);
          } else 
            $("div.u-form-send-error").show(0).delay(3000).hide(0);
        }).fail(function() {
          alert("失败！网络错误。");
        });
      }
    </script>
    <?php include('../N1/footer.php'); ?>
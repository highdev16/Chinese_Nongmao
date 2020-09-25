<?php
$bigTitle = "农贸新闻资讯";
include('header.php');
include('../N1/dbconfig.php');
$db = getDbInstance();
if (!isset($_REQUEST['r'])) {
  header('location: /N1/p1.php');
  exit;
}
$caseIndex = intval($_REQUEST['r']);
$info = $db->rawQuery("select * from news where id = $caseIndex");
$db->rawQuery("update news set browse = browse + 1 where id = $caseIndex");
if (sizeof($info) == 0) {
  header('location: /N1/p1.php');
  exit;
}
$categoryArr = array('', '农贸设计百科', '农贸新闻资讯', '光影新闻动态', '政府政策文件');
$row = $info[0];
$temp = $row['content'];
$imageURLs = array();
while (strlen($temp) > 0) {
  $r = strpos($temp, '<img');
  if ($r !== FALSE) {
    $d = strpos(substr($temp, $r + 4), 'src=') + $r + 9;
    $r = strpos(substr($temp, $d + 10), '"') + $d + 10;
    $imageURLs[] = substr($temp, $d, $r - $d);    
    $temp = substr($temp, $r);
  } else break;
}
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
<link href='../css/paginaitor.css' rel="stylesheet" />
<style>
  .u-section-3 {
    background: #f0f0f0 !important;
  }
  #maincontent_area img {
    width: 100%;
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
      margin-top: 10px;
      width: 100%;
      font-weight: 100 !important;
  }
	table.class_specified tr td:last-child {
		padding-left: 20px;
    vertical-align: top;


  } </style>
                  <script src='../js/js/all.js'></script>
    <section class="u-clearfix u-section-2" id="sec-9ff4">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <p class="u-custom-font u-text u-text-default u-text-1"> 所在位置／<span style="cursor:pointer" onclick="window.location.href='../N1/p1.php';">首页</span>／<span style="cursor:pointer" onclick="window.location.href='../N1/P25.php?category=<?php echo $row['category']; ?>';"><?php echo $categoryArr[$row['category']]; ?></span>／<?php echo htmlspecialchars($row['title']); ?> </p>
      </div>
    </section>
    <section class="skrollable u-clearfix u-grey-10 u-section-3" id="sec-50da">
      <div class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-md u-valign-middle-xl u-sheet-1">
        <div class="u-clearfix u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-gutter-16 u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-left-cell u-size-45 u-white u-layout-cell-1">                
                <div class="u-container-layout u-container-layout-1" id='maincontent_area' style='padding: 30px 30px 30px 30px'>
                    <div style='font-size: 24px; font-weight: bold;'><?php echo htmlspecialchars($row['title']); ?> </div>
                    <div style='font-size: 14px; font-weight: 100; color: #999; margin-top: 10px'>
                        <div style='float:left;margin-right: 10px'><i class='fa fa-clock'></i></div>
                        <div style='float:left; margin-right: 50px'><?php echo date('Y-m-d H:i:s', $row['created_time']); ?></div>
                        <div style='float:left;margin-right: 10px'><i class='fa fa-user'></i></div>
                        <div style='float:left;margin-right: 50px'><?php echo htmlspecialchars($row['writer']); ?></div>
                        <div style='float:left;margin-right: 10px'><i class='fa fa-eye'></i></div>
                        <div style='float:left;'><?php echo htmlspecialchars($row['browse']); ?></div>
                        <div style='width: 100%; height: 30px'></div>
                    </div>
                    <div style='width: 100%;' class='main_content_area'>
                      <?php echo $row['content']; ?>
                    </div>
                    <div style='width: 100%;'>
                      <button style='background: white; border: 1px solid black'>上一页</button>
                      <button style='background: white; border: 1px solid black'>下一页</button>
                    </div>
                </div>
              </div>
              <div class="u-container-style u-layout-cell u-right-cell u-size-15 u-white u-layout-cell-2" style='height: fit-content; min-height: 0px'>
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
                          <td> 远营 </td>
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
                    <p style="text-align:center">已有<big style="color: red">235</big>业主申请了此服务
                    </p>
                    <p style="text-align:center; background: lightgray">7×24免费装修咨询<br> 0571-88776655 
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
      $("img.thumbnail-image").click(function() {
        $("img.thumbnail-image.selected").removeClass('selected');
        $(this).addClass('selected');
        $("#mainImage").attr('src', $(this).attr('src'));
      });

      $(document).ready(function() {
          let myCategory = <?php echo $info[0]['category']; ?>;
          $("section.mainmenu6 div.u-layout-row > div:nth-child(" + myCategory + ") p").addClass('active-submenu')
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
        if ($("#s111112")[0].checked) type.push('远营');
        if ($("#s111113")[0].checked) type.push('投资');
        if ($("#s111114")[0].checked) type.push('融资');
        $.post('save_consult.php', { data: {
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
              })
      }
    </script>
    <?php include('../N1/footer.php'); ?>
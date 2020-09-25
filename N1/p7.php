<?php
$bigTitle = "农贸市场运营";
include('header.php');
include('../N1/dbconfig.php');
$db = getDbInstance();
if (!isset($_REQUEST['r'])) {
  header('location: /N1/p1.php');
  exit;
}
$caseIndex = intval($_REQUEST['r']);
$info = $db->rawQuery("select * from cases where id = $caseIndex");
$db->rawQuery("update cases set browse = browse + 1 where id = $caseIndex");
if (sizeof($info) == 0) {
  header('location: /N1/p1.php');
  exit;
}
$categoryArr = array('', '室内设计', '建筑设计', '5G智能设计', '运营案例');
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
      .u-gutter-54 .u-layout {
        margin-left: 0px;
        margin-right: 0px;
      }
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
        margin-left: 0%;
        margin-right: 0%;
        margin-top: 20px;
        overflow:hidden;
        min-width: 300px;
      }
      div.case_detail_content {
        width: 100% !important; max-width: 100% !important; flex: auto !important; margin-right: 3px !important;
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
  #product_details tr td:nth-child(2n + 1) {
    background-color: #f5f5f5 !Important;
  }
  #product_details td {
    font-size: 16px;
    text-align: center;
    color: #646464;
    border:   1px solid #dadada;
  }
  td.arrowcell img {
    margin-top: -10px;
    position: absolute;
    width:20px; height:20px;
    left:0px;
  }
  .u-section-5 .u-text-6 {
    margin: 13px 13px 0;
}
</style>
    <section class="u-clearfix u-section-2" id="sec-9ff4">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <p class="u-custom-font u-text u-text-default u-text-1"> 所在位置／<span style="cursor:pointer" onclick="window.location.href='../N1/p1.php';">首页</span>／<span style="cursor:pointer" onclick="window.location.href='../N1/P2<?php echo $row['category'] == 4 ? 0 : ''; ?>.php?category=<?php echo $row['category']; ?>';"><?php echo $categoryArr[$row['category']]; ?></span>／<?php echo htmlspecialchars($row['name']); ?> </p>
      </div>
    </section>
    <section class="skrollable u-clearfix u-grey-10 u-section-3" id="sec-50da">
      <div class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-md u-valign-middle-xl u-sheet-1">
        <div class="u-clearfix u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-gutter-16 u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-left-cell u-size-45 u-white u-layout-cell-1" >
                <div class="u-container-layout u-container-layout-1" style='padding: 20px;'>
                  <img src="<?php echo $imageURLs[0]; ?>" id='mainImage' alt="" class="u-expanded-width u-image u-image-default u-image-1" data-image-width="609" data-image-height="480"
                      style='object-fit: cover; background: black'>
                  <div class="u-expanded-width u-table u-table-responsive u-table-1">
                    <table class="u-table-entity" style='width:100%; table-layout: fixed;' >
                      <colgroup>
                        <col width="20px">
                        <col width="auto">
                        <col width="20px">
                      </colgroup>
                      <tbody class="u-table-body">
                        <tr style="height: 46px;" id='thumbnail-row'>
                          <td class="u-border-1 u-border-grey-dark-1 u-table-cell arrowcell" style='padding:0'><div class="prev preNext" onmousedown='moveLeft(-1);' ></div><img onmousedown='moveLeft(-1);' src='../images/angle-left-solid.svg'></td>
                          <td class="u-border-1 u-border-grey-dark-1 u-table-cell" style='max-width: calc(100% - 50px); overflow: hidden; border: 0px solid #ddd' id='scrollParent'>
                            <div style='width: <?php echo sizeof($imageURLs) * 160; ?>px; height: 100px; ' id='scrollContent'>
                              <?php
                                for ($i = 0; $i < sizeof($imageURLs); $i++) {
                                  ?>
                                  <div style='width:150px; height: 100px; margin-top: 0px; margin-left:5px; margin-right: 5px; float:left; overflow: hidden; display:flex'>
                                    <img src='<?php echo $imageURLs[$i]; ?>' style='min-width:150px; height: 100px; object-fit: cover' class='thumbnail-image'>
                                  </div>
                                  <?php
                                }
                              ?>
                            </div>
                          </td>
                          <td class="u-border-1 u-border-grey-dark-1 u-table-cell arrowcell"><div class="next preNext" onclick='moveLeft(1);'></div><img onclick='moveLeft(1);' src='../images/angle-right-solid.svg'></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class='u-hidden-lg u-hidden-xl '>
                    <div style='height: 20px; width: 10px'></div>
                    <table class="u-table-entity" style='width:100%;'>
                      <thead class="u-table-header">
                        <tr style="height: 46px;">
                          <th class="u-table-cell" colspan='3'><img src='../img/1.svg' style='width: 25px; height: 25px; float:left; margin-right: 10px'> <div style='float:left'>案例信息</div></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr style="height: 47px;">
                          <td style='width: 100px;background-color:#eee;border:1px solid #ddd; padding-left:10px'>项目名称</td>
                          <td style='border:1px solid #ddd; padding-left: 10px'><?php echo htmlspecialchars($row['name']); ?></td>
                        </tr>
                        <tr style="height: 47px;">
                          <td style='background-color:#eee;border:1px solid #ddd; padding-left:10px'>项目风格</td>
                          <td style='border:1px solid #ddd; padding-left: 10px'><?php echo htmlspecialchars($row['project_style']); ?></td>
                        </tr>
                        <tr style="height: 47px;">
                          <td style='background-color:#eee;border:1px solid #ddd; padding-left:10px'>星级标准</td>
                          <td style='border:1px solid #ddd; padding-left: 10px'><?php $numberArray=array('一','二','三', '四','五'); echo $numberArray[$row['stars'] - 1] . '星级'; ?></td>
                        </tr>
                        <tr style="height: 49px;">
                          <td style='background-color:#eee;border:1px solid #ddd; padding-left:10px'>服务时间</td>
                          <td style='border:1px solid #ddd; padding-left: 10px'><?php echo htmlspecialchars($row['service_time']); ?></td>
                        </tr>
                        <tr style="height: 49px;">
                          <td style='background-color:#eee;border:1px solid #ddd; padding-left:10px'>案例面积</td>
                          <td style='border:1px solid #ddd; padding-left: 10px'><?php echo htmlspecialchars($row['areas']); ?>平方</td>
                        </tr>
                        <tr style="height: 47px;">
                          <td style='background-color:#eee;border:1px solid #ddd; padding-left:10px'>项目位置</td>
                          <td style='border:1px solid #ddd; padding-left: 10px'><?php echo htmlspecialchars($row['location']); ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="u-expanded-width-xs u-hidden-md u-hidden-sm u-hidden-xs u-table u-table-responsive u-table-3">
                    <table class="u-table-entity">
                      <colgroup>
                        <col width="15.3%">
                        <col width="17.7%">
                        <col width="18.5%">
                        <col width="17.9%">
                        <col width="15.8%">
                        <col width="14.9%">
                      </colgroup>
                      <thead class="u-table-header">
                        <tr style="height: 47px;">
                          <th class="u-table-cell" colspan='3'><img src='../img/1.svg' style='width: 25px; height: 25px; float:left; margin-right: 10px'> <div style='float:left'>案例信息</div></th>
                          <th class="u-table-cell"></th>
                          <th class="u-table-cell"></th>
                          <th class="u-table-cell"></th>
                        </tr>
                      </thead>
                      <tbody class="u-table-body" id='product_details'>
                        <tr style="height: 49px;">
                          <td class="u-border-1 u-border-grey-dark-1 u-grey-15 u-table-cell u-table-cell-31">项目名称</td>
                          <td class="u-border-1 u-border-grey-dark-1 u-table-cell"><?php echo htmlspecialchars($row['name']); ?></td>
                          <td class="u-border-1 u-border-grey-dark-1 u-grey-15 u-table-cell">星级标准</td>
                          <td class="u-border-1 u-border-grey-dark-1 u-table-cell"><?php $numberArray=array('一','二','三', '四','五'); echo $numberArray[$row['stars'] - 1] . '星级'; ?></td>
                          <td class="u-border-1 u-border-grey-dark-1 u-grey-15 u-table-cell u-table-cell-35">案例面积</td>
                          <td class="u-border-1 u-border-grey-dark-1 u-table-cell"><?php echo htmlspecialchars($row['areas']); ?>平方</td>
                        </tr>
                        <tr style="height: 49px;">
                          <td class="u-border-1 u-border-grey-dark-1 u-grey-15 u-table-cell u-table-cell-37">项目风格&nbsp;&nbsp;</td>
                          <td class="u-border-1 u-border-grey-dark-1 u-table-cell"><?php echo htmlspecialchars($row['project_style']); ?></td>
                          <td class="u-border-1 u-border-grey-dark-1 u-grey-15 u-table-cell">服务时间</td>
                          <td class="u-border-1 u-border-grey-dark-1 u-table-cell"><?php echo htmlspecialchars($row['service_time']); ?></td>
                          <td class="u-border-1 u-border-grey-dark-1 u-grey-15 u-table-cell">项目位置&nbsp;</td>
                          <td class="u-border-1 u-border-grey-dark-1 u-table-cell"><?php echo htmlspecialchars($row['location']); ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="u-container-style u-layout-cell u-right-cell u-size-15 u-white u-layout-cell-2" id='fixed_sidebar'>
                <div class="u-container-layout u-container-layout-2">
                  <p class="u-custom-font u-text u-text-default u-text-1">我需要： （可多选)</p>
                  <div class="u-clearfix u-custom-html u-custom-html-1">
                    <style> table.class_specified tr td:first-child input {
		width: 20px;
		height: 20px;
	}
	table.class_specified tr td:first-child{
		color: orange;
		margin-right: 20px;
		vertical-align: top;
  }

	table.class_specified tr td:last-child {
		padding-left: 20px;
    vertical-align: top;


  } </style>
                  <script src='../js/js/all.js'></script>
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
                        <input type="email" placeholder="输人您的电话(电子邮件)" id="emailfield" name="email" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
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
    <style>
      .u-form-field-error {
        border: 1px solid red;
      }
    </style>
    <script>
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
          let gita = ($("#gita_area"));
          if (gita.offset().top - 70 < document.documentElement.scrollTop + 750 || document.documentElement.scrollTop < 70) {
            sidebarFixed[0].style.display = 'none';
            sidebar.show();
          }
          else {
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
      })

      function submitForm() {
        $("div.u-form-send-message").hide();
        $(".u-form-field-error").removeClass('u-form-field-error');
        if ($("#namefield").val().trim().length == 0) {
          $("#namefield").addClass('u-form-field-error');
          $("#namefield_second").addClass('u-form-field-error');
        }
        if ($("#emailfield").val().trim().length == 0) {
          $("#emailfield").addClass('u-form-field-error');
          $("#emailfield_second").addClass('u-form-field-error');
        }
        if ($("#messagefield").val().trim().length == 0) {
          $("#messagefield").addClass('u-form-field-error');
          $("#messagefield_second").addClass('u-form-field-error');
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
    <section class="u-clearfix u-grey-10 u-section-4" id="sec-98a7 " style='background: #eee'>
      <div class="u-clearfix u-sheet u-valign-top u-sheet-1">
        <div class="u-clearfix u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-left-cell u-size-45 u-white u-layout-cell-1 case_detail_content" >
                <div class="u-container-layout u-container-layout-1" id='maincontent_area'>
                  <?php echo $row['content']; ?>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-white u-section-5" id="sec-3302">

      <script src='../js/jspaginator.js'></script>
      <div class="u-clearfix u-sheet u-sheet-1" style='min-height: 0px; padding-bottom: 30px'>
        <div class="u-clearfix u-expanded-width u-gutter-54 u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row" style='padding-left: 0px; font-weight:bold; font-size:22px;'>
              <div style='float: left;    min-width: 100px;    width: 100px;    max-width: 100px;'><?php echo $categoryArr[$row['category']]; ?></div>
              <div style='margin:0px 0px 0px auto;float:right;display: inline-block;'>
              <button class='btn btn-black' onclick="window.location.href='../N1/P2<?php echo $row['category'] == 4 ? 0 : ''; ?>.php?category=<?php echo $row['category']; ?>';" style='padding-left: 20px; padding-right: 20px; font-weight: 100 !important; background: black; color: white; font-size: 16px'  id='gita_area'>更多</button></div>
            </div>
            <hr style='border-top: 1px solid #ccc'>
            <div class="u-layout-row"  style='padding: 0; justify-content: space-between'>
              <?php
              $data = $db->rawQuery("select * from cases where category=" . intval($info[0]['category']) . " and id != $caseIndex order by created_date desc limit 0, 3");

              for ($k = 1; $k <= 3 && $k <= sizeof($data); $k++) {
                $row = $data[$k - 1];
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
                  <div class="u-container-layout u-similar-container u-valign-top u-container-layout-3" style='border:1px solid #ddd; overflow:hidden'>
                    <div class='image_cell_area' style='margin-top: 1px; margin-right: 1px; margin-left: 1px; width: calc(100% - 2px); overflow:hidden;
                    display: flex;justify-content: center;align-items: center; background:black;'>
                      <img alt="<?php echo addslashes($alt); ?>" class="article-image u-blog-control u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-image u-image-default u-image-3"
                          src="<?php echo $r; ?>" style='background: black; object-fit: cover;  cursor:pointer;' onclick='window.location.href="p7.php?r=<?php echo $row["id"]; ?>";'>
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
                      <a href="../N1/consult.php" class="u-blog-control u-btn u-button-style u-custom-color-1 u-btn-6" style='border-radius: 5px; margin-bottom: 10px; margin-right:5px; float:right; margin-top: -3px; padding: 5px 10px !Important; font-size: 12px'>这样装修多少钱?</a>
                    </div>


                  </div>
                </div>
              <?php } if (sizeof($data) < 3) echo "<div class='u-white u-repeater-item-3 image-cell' style='height:0px'></div>"; ?>

            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-grey-10 u-section-6" id="carousel_459a" style='max-height: 30px'>
      <div class="u-clearfix u-sheet u-sheet-1"></div>
    </section>
    <section class="u-clearfix u-white u-section-5" id="sec-3302">

      <script src='../js/jspaginator.js'></script>
      <div class="u-clearfix u-sheet u-sheet-1" style='min-height: 0px; padding-bottom: 30px'>
        <div class="u-clearfix u-expanded-width u-gutter-54 u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row" style='padding-left: 0px; font-weight:bold; font-size:22px;'>
              <div style='float: left;    min-width: 190px;    width: 260px;    max-width: 200px;' id='gita_area1'>其他精彩案例</div>
              <div style='margin:0px 0px 0px auto;float:right;display: inline-block;'><button class='btn btn-black' onclick="window.location.href='../N1/P2<?php echo $row['category'] == 3 ? 0 : ''; ?>.php?category=<?php echo $row['category'] % 4 + 1; ?>';" style='padding-left: 20px; padding-right: 20px; font-weight: 100 !important; background: black; color: white; font-size: 16px'>更多</button></div>
            </div>
            <hr style='border-top: 1px solid #ccc'>
            <?php
            $data = $db->rawQuery("select * from cases where id in (select max(id) from cases where category != " . intval($info[0]['category']) . " group by category) order by category");
            ?>
            <div class="u-layout-row" style='padding: 0; justify-content: space-between'>
            <?php
              for ($k = 1; $k <= 3 && $k <= sizeof($data); $k++) {
                $row = $data[$k - 1];
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
                  <div class="u-container-layout u-similar-container u-valign-top u-container-layout-3" style='border:1px solid #ddd; overflow:hidden'>
                    <div class='image_cell_area' style='margin-top: 1px; margin-right: 1px; margin-left: 1px; width: calc(100% - 2px); overflow:hidden;
                    display: flex;justify-content: center;align-items: center; background:black;'>
                      <img alt="<?php echo addslashes($alt); ?>" class="article-image u-blog-control u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-image u-image-default u-image-3"
                          src="<?php echo $r; ?>" style='background: black; object-fit: cover;  cursor:pointer;' onclick='window.location.href="p7.php?r=<?php echo $row["id"]; ?>";'>
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
                      <a href="../N1/consult.php" class="u-blog-control u-btn u-button-style u-custom-color-1 u-btn-6" style='border-radius: 5px; margin-bottom: 10px; margin-right:5px; float:right; margin-top: -3px; padding: 5px 10px !Important; font-size: 12px'>这样装修多少钱?</a>
                    </div>


                  </div>
                </div>
              <?php } if (sizeof($data) < 3) echo "<div class='u-white u-repeater-item-3 image-cell' style='height:0px'></div>"; ?>

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

      function moveLeft(direction) {
        let pos = parseInt($("#scrollContent").css('margin-left')) || 0;
        pos += direction * 100;
        console.log(pos + parseInt($("#scrollContent").width()), parseInt($("#scrollParent").width()))
        if (pos + parseInt($("#scrollContent").width()) < parseInt($("#scrollParent").width()))
          $("#scrollContent").animate({'margin-left' : Math.min(0, parseInt($("#scrollParent").width()) - parseInt($("#scrollContent").width()))}, 100);
        else if (pos >= 0)
          $("#scrollContent").animate({'margin-left' : 0}, 1000);

        else
        $("#scrollContent").animate({'margin-left' : pos + 'px'}, 100);
      }
    </script>

    <?php include('../N1/footer.php'); ?>
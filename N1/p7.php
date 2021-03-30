<?php
$bigTitle = "农贸市场设计";
include('header.php');
if (!isset($db)) {
  include('../N1/dbconfig.php');
  $db = getDbInstance();
}
if (!isset($_REQUEST['r'])) {
  header('location: /');
  exit;
}
$caseIndex = intval($_REQUEST['r']);
$info = $db->rawQuery("select * from cases where id = $caseIndex");
if (sizeof($info) == 0) {
  header('location: /');
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
<link href='/css/paginaitor.css' rel="stylesheet" />
<script src='/N1/p7.js'></script>
<script src='/js/js/all.js'></script>
<script src='/js/jspaginator.js'></script>
<style>
  
</style>
    <script>
      function getCategoryPath(category) {
        if (category == 4) {
          return '/nmyy/';
        } else if (category == 3) {
          return '/znsj';
        } else if (category == 2) {
          return '/jzsj';
        } else if (category == 1) {
          return '/zxsj';
        }
      }
    </script>
    <section class="u-clearfix u-section-2" id="sec-9ff4">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <p class="u-custom-font u-text u-text-default u-text-1"> 所在位置／<span style="cursor:pointer" onclick="window.location.href='/';">首页</span>／
        <span style="cursor:pointer" onclick="window.location.href=getCategoryPath(<?php echo $row['category']; ?>);">
        <?php echo $categoryArr[$row['category']]; ?></span>／<?php echo htmlspecialchars($row['name']); ?> </p>
      </div>
    </section>
    <section class="skrollable u-clearfix u-grey-10 u-section-3" id="sec-50da">
      <div class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-md u-valign-middle-xl u-sheet-1">
        <div class="u-clearfix u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-gutter-16 u-layout-wrap u-layout-wrap-1 case-content">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-left-cell  u-white u-layout-cell-1 case-left-side" id='left-summary-element'>
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
                          <td class="u-border-1 u-border-grey-dark-1 u-table-cell arrowcell"><div class="next preNext" onclick='moveLeft(1);'></div><img onclick='moveLeft(1);' src='/images/angle-right-solid.svg'></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class='u-hidden-lg u-hidden-xl '>
                    <div style='height: 20px; width: 10px'></div>
                    <table class="u-table-entity" style='width:100%;'>
                      <thead class="u-table-header">
                        <tr style="height: 46px;">
                          <th class="u-table-cell" colspan='3'><img src='/img/1.svg' style='width: 25px; height: 25px; float:left; margin-right: 10px'> <div style='float:left'>案例信息</div></th>
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
                          <th class="u-table-cell" colspan='3'><img src='/img/1.svg' style='width: 25px; height: 25px; float:left; margin-right: 10px'> <div style='float:left'>案例信息</div></th>
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
                  <p class="u-custom-font u-text u-text-default u-text-1 yahei">我需要： （可多选)</p>
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
                            <input type="checkbox" id="s111115">
                          </td>
                          <td> 农贸市场培训 </td>
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
                        <a href="javascript:void(0)" class="u-btn u-btn-submit u-button-style u-custom-color-1 u-btn-1" onclick='submitForm()'>立即咨询</a>
                        <input type="submit" value="submit" class="u-form-control-hidden">
                      </div>
                      <div class="u-form-send-message u-form-send-success"> 谢谢！ 您的留言已发送。 </div>
                      <div class="u-form-send-error u-form-send-message"> 无法发送您的消息。 请修正错误，然后重试。 </div>
                    </form>
                  </div>
                  <div class="u-clearfix u-custom-html u-expanded-width u-custom-html-2">
                    <p style="text-align:center"><span>已有</span><span style="color: red" class='applicant_number'></span><span>业主申请了此服务</span>
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
    <style>
      .u-form-field-error {
        border: 1px solid red;
      }
    </style>
    
    <section class="u-clearfix u-grey-10 u-section-4" id="sec-98a7 " style='background: #eee'>
      <div class="u-clearfix u-sheet u-valign-top u-sheet-1">
        <div class="u-clearfix u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-left-cell u-white u-layout-cell-1 case_detail_content case-left-side" >
                <div class="u-container-layout u-container-layout-1" id='maincontent_area'>
                  <?php echo $row['content']; ?>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
    <section class='u-clearfix u-white u-section-none' id='consult-form-section' style='background: #eee; padding-bottom: 20px'>
        <div class="u-container-style u-layout-cell u-right-cell u-size-15 u-white u-layout-cell-2" id='' style='width: calc(100% - 40px); margin-left: 20px; padding: 20px 20px 20px 20px'>
                <div class="u-container-layout u-container-layout-2">
                  <p class="u-custom-font u-text u-text-default u-text-1 yahei">我需要： （可多选)</p>
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
                            <input type="checkbox" id="s111115">
                          </td>
                          <td> 农贸市场培训 </td>
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
                        <a href="javascript:void(0)" class="u-btn u-btn-submit u-button-style u-custom-color-1 u-btn-1" onclick='submitForm()'>立即咨询</a>
                        <input type="submit" value="submit" class="u-form-control-hidden">
                      </div>
                      <div class="u-form-send-message u-form-send-success"> 谢谢！ 您的留言已发送。 </div>
                      <div class="u-form-send-error u-form-send-message"> 无法发送您的消息。 请修正错误，然后重试。 </div>
                    </form>
                  </div>
                  <div class="u-clearfix u-custom-html u-expanded-width u-custom-html-2">
                    <p style="text-align:center"><span>已有</span><span style="color: red" class='applicant_number'></span><span>业主申请了此服务</span>
                    </p>
                    <p style="text-align:center; background: lightgray">7×24免费装修设计咨询<br> 0571-88776655
                    </p>
                  </div>
                </div>
              </div>
    </section>
    <section class="u-clearfix u-white u-section-5" id="sec-3302">    
      <div class="u-clearfix u-sheet u-sheet-1" style='min-height: 0px; padding-bottom: 30px'>
        <div class="u-clearfix u-expanded-width u-gutter-54 u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row" style='padding-left: 0px; font-weight:bold; font-size:22px;'>
              <div style='float: left;    min-width: 300px;    width: 300px;    max-width: 300px;'><?php echo $categoryArr[$row['category']]; ?></div>
              <div style='margin:0px 0px 0px auto;float:right;display: inline-block;'>
              <button class='btn btn-black' 
                onclick="goToOtherPage(<?php echo $row['category']; ?>)" 
                style='padding-left: 20px; padding-right: 20px; font-weight: 100 !important; background: black; color: white; font-size: 16px'  
                id='gita_area'>更多</button>
            </div>
            </div>
            <hr style='border-top: 1px solid #ccc'>
            <div class="grid-cell-container" style="display: grid;padding: 0;" id='mycategory_best'>
              <script>
                var consulLink = '';
                $.post('/api/get-consultation.php', function(a,b) {
                  try {
                    a = JSON.parse(a);
                    if (a.result != 'success') return;
                  } catch (e) {return;}
                  consulLink = a.link;
                  $('.consultation-link').attr('href', a.link);
                })
                $(document).ready(function() {
                  $.post("/api/getp7part1.php", {category: <?php echo $info[0]['category']; ?>, caseIndex: <?php echo $caseIndex; ?>}, function(a,b) {
                    if (b != 'success') {
                      alert("失败！"); return;
                    }
                    try {
                      a = JSON.parse(a);
                      if (a.result != 'success') {
                        alert("失败！内容正确！"); return;
                      }
                    } catch (e) {alert("失败！内容不好！"); return;}
                    let data = a.data;
                    let htmlString = "";
                    for (let k = 1; k <= 3 && k <= data.length; k++) {
                      let row = data[k-1];
                      let r = row.content.indexOf("<img");                      
                      let alt = "No Image";
                      if (r != -1) {
                        let d = row.content.substr(r + 4).indexOf('src=') + r + 9;
                        r = row.content.substr(d + 10).indexOf('"') + d + 10;
                        r = row['content'].substr(d, r - d); 
                        alt = "Image";
                      } else r = '';
                      htmlString += `<div class=" u-white u-repeater-item-3 image-cell">
                        <div class="u-container-layout u-similar-container u-valign-top u-container-layout-3" style='border:1px solid #ddd; overflow:hidden; padding-left: 0px; padding-right: 0px'>
                          <div class='image_cell_area' style='margin-top: 1px; margin-right: 1px; margin-left: 1px; width: calc(100% - 2px); overflow:hidden;
                          display: flex;justify-content: center;align-items: center; background:black;'>
                            <img alt="` + alt + `" class="article-image u-blog-control u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-image u-image-default u-image-3"
                                src="` + r + `" style='background: black; object-fit: cover;  cursor:pointer;' 
                                onclick='goToOtherPiece(` + row['category'] + `, ` + row['id'] + `)'>
                          </div>
                          <div class="u-blog-control u-post-content u-text u-text-default u-text-6" style='text-align: left; white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis; margin-left: 13px;'>
                            <span style='color:#ff6500'>【案例】</span>&nbsp;&nbsp;` + escapeHtml(row['name']) + `</div>
                          <div class="u-blog-control u-post-content u-text u-text-default u-text-6" style=' margin-left: 13px;'>`;
                      for (let j = 0; j < Number(row['stars']); j++) 
                        htmlString += "<div style='float:left; margin-right: 3px; padding: 0px 2px 0px 2px; border-radius:2px; background-color:#ff6500'><i class=\"fas fa-star\" style='color:white'></i></div>";
                      htmlString += `<div style='float:left; min-width:20px; min-height: 30px;'></div>
                            <div style='float:left; font-size: 12px;line-height: 24px' class='user-icon'>
                            <i class="far fa-images"></i>&nbsp;` + occurrences(row['content'], '<img') + `
                            </div>
                            <div style='float:left; min-width:20px; min-height: 30px;'></div>
                            <div style='float:left;font-size: 12px;line-height: 24px'>
                              <i class="far fa-user"></i>&nbsp;` + row['browse'] + `<span style='display:none'>浏览</span>
                            </div>
                            <a target='popup' href="` + consulLink + `" class="consultation-link u-blog-control u-btn u-button-style u-custom-color-1 u-btn-6" style='border-radius: 5px; margin-bottom: 10px; margin-right:5px; float:right; margin-top: -3px; padding: 5px 10px !Important; font-size: 12px'>这样装修多少钱?</a>
                          </div>
                        </div>
                      </div>`;
                    } 
                    $("#mycategory_best").html(htmlString);
                  })
                });
              </script>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-grey-10 u-section-6" id="carousel_459a" style='max-height: 30px'>
      <div class="u-clearfix u-sheet u-sheet-1"></div>
    </section>
    <section class="u-clearfix u-white u-section-5" id="sec-3302">
      <div class="u-clearfix u-sheet u-sheet-1" style='min-height: 0px; padding-bottom: 30px'>
        <div class="u-clearfix u-expanded-width u-gutter-54 u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row" style='padding-left: 0px; font-weight:bold; font-size:22px;'>
              <div style='float: left;    min-width: 190px;    width: 260px;    max-width: 200px;' id='gita_area1'>其他精彩案例</div>
              <div style='margin:0px 0px 0px auto;float:right;display: inline-block;'>
              <button class='btn btn-black' 
                  onclick="goToOtherPage(<?php echo $row['category'] % 4 + 1; ?>)" 
                  style='padding-left: 20px; padding-right: 20px; font-weight: 100 !important; background: black; color: white; font-size: 16px'>
                    更多
                </button>
              </div>
            </div>
            <hr style='border-top: 1px solid #ccc'>            
            <div class="grid-cell-container" style="display: grid;padding: 0;" id='othercategory_best'>
              <script>
                $(document).ready(function() {                  
                  $.post("/api/getp7part2.php", {category: <?php echo $info[0]['category']; ?>, increase: 1, caseIndex: <?php echo $caseIndex; ?>}, function(a,b) {
                    if (b != 'success') {
                      alert("失败！"); return;
                    }
                    try {
                      a = JSON.parse(a);
                      if (a.result != 'success') {
                        alert("失败！内容正确！"); return;
                      }
                    } catch (e) {alert("失败！内容不好！"); return;}
                    let data = a.data;
                    let htmlString = "";
                    for (let k = 1; k <= 3 && k <= data.length; k++) {
                      let row = data[k-1];
                      let r = row.content.indexOf("<img");                      
                      let alt = "No Image";
                      if (r != -1) {
                        let d = row.content.substr(r + 4).indexOf('src=') + r + 9;
                        r = row.content.substr(d + 10).indexOf('"') + d + 10;
                        r = row['content'].substr(d, r - d); 
                        alt = "Image";
                      } else r = '';
                      htmlString += `<div class=" u-white u-repeater-item-3 image-cell">
                        <div class="u-container-layout u-similar-container u-valign-top u-container-layout-3" style='border:1px solid #ddd; overflow:hidden;  padding-left: 0px; padding-right: 0px'>
                          <div class='image_cell_area' style='margin-top: 1px; margin-right: 1px; margin-left: 1px; width: calc(100% - 2px); overflow:hidden;
                          display: flex;justify-content: center;align-items: center; background:black;'>
                            <img alt="` + alt + `" class="article-image u-blog-control u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-image u-image-default u-image-3"
                                src="` + r + `" style='background: black; object-fit: cover;  cursor:pointer;' 
                                onclick='goToOtherPiece(` + row['category'] + `, ` + row['id'] + `)'>
                          </div>
                          <div class="u-blog-control u-post-content u-text u-text-default u-text-6" style='text-align: left; white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis; margin-left: 13px;'>
                            <span style='color:#ff6500'>【案例】</span>&nbsp;&nbsp;` + escapeHtml(row['name']) + `</div>
                          <div class="u-blog-control u-post-content u-text u-text-default u-text-6" style=' margin-left: 13px;'>`;
                      for (let j = 0; j < Number(row['stars']); j++) 
                        htmlString += "<div style='float:left; margin-right: 3px; padding: 0px 2px 0px 2px; border-radius:2px; background-color:#ff6500'><i class=\"fas fa-star\" style='color:white'></i></div>";
                      htmlString += `<div style='float:left; min-width:20px; min-height: 30px;'></div>
                            <div style='float:left; font-size: 12px;line-height: 24px' class='user-icon'>
                            <i class="far fa-images"></i>&nbsp;` + occurrences(row['content'], '<img') + `
                            </div>
                            <div style='float:left; min-width:20px; min-height: 30px;'></div>
                            <div style='float:left;font-size: 12px;line-height: 24px'>
                              <i class="far fa-user"></i>&nbsp;` + row['browse'] + `<span style='display:none'>浏览</span>
                            </div>
                            <a href="` + consulLink + `" target='popup' class="consultation-link u-blog-control u-btn u-button-style u-custom-color-1 u-btn-6" style='border-radius: 5px; margin-bottom: 10px; margin-right:5px; float:right; margin-top: -3px; padding: 5px 10px !Important; font-size: 12px'>这样装修多少钱?</a>
                          </div>
                        </div>
                      </div>`;
                    }                     
                    $("#othercategory_best").html(htmlString);
                  })
                });
              </script>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div style='position:fixed; left:0; right:0; bottom:0; top: 0; z-index:999999; display: flex; flex-direction: column; justify-content: space-between; visibility: hidden;' id='captcha'>
        <div style='width: 100%; height: 100%; left: 0; top: 0; position: absolute; z-index:9999999; background-color:rgba(0,0,0,0.5)' onclick='$("#captcha").css("visibility", "hidden");'></div>
        <div style='width: 90%; max-width: 400px; margin: auto auto auto auto; display:block; z-index:19000000; height: 150px; position: relative; background-color: white'>
          <table style='width: calc(100% - 40px); margin: 30px 20px 20px 20px'><tr><td>
          <img src='data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==' onclick="getotherpicture()" id='cap_image' 
              style="cursor:pointer;margin-left:15px;width:130px; height: 30px" title="更换验证码">
              </td><td><input type='text' id='captcha_value' style='max-width: calc(100% ); width: max-width: calc(100%)' placeholder='验证码'></td></tr>
              <tr><td colspan='2'><a href="javascript:void(0)" style='display: block; margin-left: auto; margin-right: auto; max-width: 120px;' 
              class="u-btn u-btn-submit u-button-style u-custom-color-1 u-btn-1" onclick='submitForm1(document.getElementById("captcha_value").value)'>立即咨询</a></td></tr></table>
                <script> function getotherpicture() {
                  document.getElementById('cap_image').src = '/admin/captcha.php?length=4&a=' + Math.random();
                }</script>
        </div>
    </div>
    <?php include('../N1/footer.php'); ?>
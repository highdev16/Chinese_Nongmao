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
<link href='/css/paginaitor.css' rel="stylesheet" />
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
                    <div style='font-size: 14px; font-weight: 100; color: #999; margin-top: 10px' class='subtitleinfo'>
                        <div style='display: flex; flex-direction:row'>
                          <div style='float:left;margin-right: 10px'><i class='fa fa-clock'></i></div>
                          <div style='float:left;margin-right: 50px' id='createdTimeLabel'></div>
                        </div>
                        <div style='display: flex; flex-direction:row'>
                          <div style='float:left;margin-right: 10px'><i class='fa fa-user'></i></div>
                          <div style='float:left;margin-right: 50px' id='writerLabel'></div>
                        </div>
                        <div style='display: flex; flex-direction:row'>
                          <div style='float:left;margin-right: 10px'><i class='fa fa-eye'></i></div>
                          <div style='float:left;' id='browsecount'></div>
                        </div>
                    </div>
                    <div style='width: 100%;' class='main_content_area'>
                    </div>
                    <div style='width: 100%; display: flex; justify-content: space-between; margin-top: 30px' class='nextprevpagebutton'>
                      <div style='display: flex'>
                        <button class='gotootherpage' style='margin-right: 10px;' id='prevLinkButton'>上一页</button>
                        <div style='max-width: 200px; text-overflow: ellipsis;; white-space:nowrap; overflow: hidden' id='prevLinkLabel'></div>
                      </div>
                      <div style='display: flex'>
                        <button class='gotootherpage' style='margin-right: 10px' id='currentCategoryButton'>返回</button>
                        <div style='max-width: 200px; text-overflow: ellipsis;; white-space:nowrap' id='currentCategoryLabel'></div>
                      </div>
                      <div style='display: flex'>
                        <div style='max-width: 200px; text-overflow: ellipsis; white-space:nowrap; overflow: hidden' id='nextLinkLabel'></div>
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
                        <input type="email" placeholder="输人您的电话" id="emailfield" name="email" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
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
    <section style='background:#eee; padding-top: 20px; padding-left: 20px; padding-bottom: 30px; padding-bottom: 30px; padding-right: 20px'>
    <div class="u-container-style u-layout-cell u-right-cell u-size-15 u-white u-layout-cell-2" id='hidden_sidebar' style='height: fit-content; min-height: 0px; padding: 20px 20px 0px 20px'>
                <div class="u-container-layout u-container-layout-2" style='margin-bottom: 30px;'>
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
                        <input type="email" placeholder="输人您的电话" id="emailfield" name="email" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
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
                    <p style="text-align:center">已有<big style="color: red" class='applicant_number'></big>业主申请了此服务
                    </p>
                    <p style="text-align:center; background: lightgray">7×24免费装修设计咨询<br> 0571-88776655 
                    </p>
                  </div>
                </div>
              </div>
</section>
    <script src='/N1/p26.js'></script>
    <div style='position:fixed; left:0; right:0; bottom:0; top: 0; z-index:999999; display: flex; flex-direction: column; justify-content: space-between; visibility: hidden;' id='captcha'>
        <div style='width: 100%; height: 100%; left: 0; top: 0; position: absolute; z-index:9999999; background-color:rgba(0,0,0,0.5)' onclick='$("#captcha").css("visibility", "hidden");'></div>
        <div style='width: 90%; max-width: 400px; margin: auto auto auto auto; display:block; z-index:19000000; height: 150px; position: relative; background-color: white'>
          <table style='width: calc(100% - 40px); margin: 30px 20px 20px 20px'><tr><td>
          <img src='data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==' onclick="getotherpicture()" id='cap_image' 
              style="cursor:pointer;margin-left:15px;width:130px; height: 30px" title="更换验证码">
              </td><td><input type='text' id='captcha_value' style='max-width: calc(100% ); width: max-width: calc(100%)' placeholder='验证码'></td></tr>
              <tr><td colspan='2'><a href="javascript:void(0)" style='display: block; margin-left: auto; margin-right: auto; max-width: 120px;' 
              class="u-btn  u-button-style u-custom-color-1 u-btn-1" onclick='submitForm1(document.getElementById("captcha_value").value)'>立即咨询</a></td></tr></table>
                <script> function getotherpicture() {
                  document.getElementById('cap_image').src = '/admin/captcha.php?length=4&a=' + Math.random();
                }</script>
        </div>
    </div>   
    <?php include('../N1/footer.php'); ?>
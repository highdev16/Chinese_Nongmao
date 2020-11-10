<?php 
      if (!isset($db)) {
        include('../N1/dbconfig.php');
        $db = getDbInstance();
        $rows = $db->rawQuery("select * from links");
      } else $rows = $db->rawQuery("select * from links");
    ?>
    <style>
    .u-footer .u-image-1 { margin: 0px 0px 0px 0px !important;}
    .u-footer .u-table-2 { margin-top: 0px !important; float: left; }
    .u-footer .u-image-1 { width: 96px; height: 96px; margin-top: 30px !important;}
    .u-footer .u-text-2 { margin: 0 0 0 0; width: 100%; text-align: center}
      .friend_link, table.footertable tr:not(:first-child) td{
        color: #999999 !important;
      }
      table.footertable tr{
        height: 30px !Important;
      }
      table.footertable tr td {
        padding-top: 0px !Important; padding-bottom: 0px !Important;
      }
      div.friendly_links div  {
        float: left;
        padding-top: 5px; padding-bottom: 5px;
        font-size: 14px;
      }
      @media(max-width: 1000px) {
        div.friendly_links a {
          width: 20%;
        }
      }
      @media(max-width: 700px) {
        div.friendly_links a {
          width: 33%;
        }
      }
      @media(max-width: 500px) {
        div.friendly_links a {
          width: 100%;
        }
      }
      .u-table th, .u-table td {
        padding-left: 0px;
      }
      .u-footer .u-table-2 {
        width: 1120px;
      }
      .u-footer .u-sheet-1 {
        min-height: auto;
      }
      span#cnzz_stat_icon_1279380584 {
        display:none
      }
    </style>
    <footer class="u-align-left-lg u-align-left-md u-align-left-sm u-align-left-xl u-clearfix u-footer u-grey-80 u-footer" id="sec-dc14">
      <div class="u-clearfix u-sheet u-sheet-1" style='margin-top: 20px'>
        <h3 class="u-text u-text-default u-text-1"  style='margin-bottom: 0px; margin-left:0px !Important;'>友情链接:</h3>
        <div class='friendly_links' style='margin-bottom: 40px'>        	
          <?php
              for ($i = 0; $i < sizeof($rows);) {                 
                for ($k = 0; $k < 9 && $i < sizeof($rows); $k++, $i++) { ?>
                  <div style='width: 11.1%; min-width: 165px'>
                    <a href="<?php echo $rows[$i]['url']; ?>" target='_blank' style='color: white;' class='friend_link'>
                      <?php echo htmlspecialchars($rows[$i]['title']); ?>
                    </a>
                  </div>
                <?php } ?>
              <?php } ?>          
        </div>
        <div style='clear:both; display: block'></div>
        <div class="u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-table u-table-responsive u-table-2" style='display:block; overflow: auto'>
          <table class="u-table-entity footertable" style='margin-top: 30px; min-width: 1000px'>
            <colgroup>
              <col width="14.1%">
              <col width="14.1%">
              <col width="14.1%">
              <col width="14.1%">
              <col width="14.1%">
              <col width="14.1%">
              <col width="14.1%">
            </colgroup>
            <tbody class="u-table-body">
              <tr style="height: 55px;">
                <td class="u-table-cell">经营范围</td>
                <td class="u-table-cell">设计案例</td>
                <td class="u-table-cell">市场营运</td>
                <td class="u-table-cell">智能菜场</td>
                <td class="u-table-cell">农贸市场投资</td>
                <td class="u-table-cell">农贸行业资讯</td>
                <td class="u-table-cell">关于我们</td>
              </tr>
              <tr style="height: 51px;">
                <td class="u-table-cell u-table-cell-52" style='cursor:pointer' title="http://www.gggyyy.cn/zxsj/">&gt; 农贸市场设计</td>
                <td class="u-table-cell u-table-cell-53" style='cursor:pointer' title="http://www.gggyyy.cn/zxsj/">&gt; 农贸装修设计</td>
                <td class="u-table-cell u-table-cell-54" style='cursor:pointer' title="http://www.gggyyy.cn/yyms.html">&gt; 农贸运营模式</td>
                <td class="u-table-cell u-table-cell-55" style='cursor:pointer' title="http://www.gggyyy.cn/zn/znsb.html">&gt; 5G智能设备</td>
                <td class="u-table-cell u-table-cell-56" style='cursor:pointer' title="http://www.gggyyy.cn/tz.html">&gt; 我要投资农贸</td>
                <td class="u-table-cell u-table-cell-57" style='cursor:pointer' title="http://www.gggyyy.cn/sjbk/">&gt; 农贸设计百科</td>
                <td class="u-table-cell u-table-cell-57" style='cursor:pointer' title="http://www.gggyyy.cn/about/certify.html">&gt; 公司简介</td>
              </tr>
              <tr style="height: 56px;">
                <td class="u-table-cell u-table-cell-58" style='cursor:pointer' title="http://www.gggyyy.cn/jzsj/">&gt; 农贸建筑设计</td>
                <td class="u-table-cell u-table-cell-59" style='cursor:pointer' title="http://www.gggyyy.cn/znsj/">&gt; 5G智能设计</td>
                <td class="u-table-cell u-table-cell-60" style='cursor:pointer' title="http://www.gggyyy.cn/nmyy/nmzs.html">&gt; 农贸市场招商</td>
                <td class="u-table-cell u-table-cell-61" style='cursor:pointer' title="http://www.gggyyy.cn/zn/znrj.html">&gt; 智能软件系统</td>
                <td class="u-table-cell u-table-cell-62" style='cursor:pointer' title="http://www.gggyyy.cn/rz.html">&gt; 我有农贸项目</td>
                <td class="u-table-cell u-table-cell-63" style='cursor:pointer' title="http://www.gggyyy.cn/news/">&gt; 农贸新闻资讯</td>
                <td class="u-table-cell u-table-cell-63" style='cursor:pointer' title="http://www.gggyyy.cn/about/contact.html">&gt; 团队</td>
              </tr>
              <tr style="height: 56px;">
                <td class="u-table-cell u-table-cell-64" style='cursor:pointer' title="http://www.gggyyy.cn/znsj/">&gt; 5G 智能设计</td>
                <td class="u-table-cell u-table-cell-65" style='cursor:pointer' title="http://www.gggyyy.cn/jzsj/">&gt; 农贸建筑设计</td>
                <td class="u-table-cell u-table-cell-66" style='cursor:pointer' title="http://www.gggyyy.cn/nmyy/nmds.html">&gt; 农贸市场电商</td>
                <td class="u-table-cell u-table-cell-67" style='cursor:pointer' title="http://www.gggyyy.cn/zn/csyy.html">&gt; 智能城市应用</td>
                <td class="u-table-cell u-table-cell-68" style='cursor:pointer' title="http://www.gggyyy.cn/zhengfu.html">&gt; 政府合作</td>
                <td class="u-table-cell u-table-cell-69" style='cursor:pointer' title="http://www.gggyyy.cn/gyxw/" >&gt; 光影新闻动态</td>
                <td class="u-table-cell u-table-cell-69" style='cursor:pointer' title="http://www.gggyyy.cn/about/">&gt; 联系我们</td>
              </tr>
              <tr style="height: 56px;">
                <td class="u-table-cell u-table-cell-70" style='cursor:pointer' title="http://www.gggyyy.cn/yyms.html">&gt; 农贸市场运营</td>
                <td class="u-table-cell u-table-cell-71" style='cursor:pointer' title="http://www.gggyyy.cn/sj/sjhz.html">&gt; 设计合作流程</td>
                <td class="u-table-cell u-table-cell-72" style='cursor:pointer' title="http://www.gggyyy.cn/nmyy/nmzht.html">&gt; 农贸商业综合体</td>
                <td class="u-table-cell u-table-cell-73" style='cursor:pointer' title="http://www.gggyyy.cn/znsj/">&gt; 智能菜场案例</td>
                <td class="u-table-cell u-table-cell-74" style='cursor:pointer' title="http://www.gggyyy.cn/gyzy.html">&gt; 光影置业</td>
                <td class="u-table-cell u-table-cell-75" style='cursor:pointer' title="http://www.gggyyy.cn/gov/">&gt; 政府政策文件</td>
              </tr>
              <tr style="height: 27px;">
                <td class="u-table-cell u-table-cell-76" style='cursor:pointer' title="http://www.gggyyy.cn/tz.html">&gt; 农贸项目投资</td>
                <td class="u-table-cell u-table-cell-77"style='cursor:pointer' title="http://www.gggyyy.cn/zhengfu.html">&gt; 政府合作</td>
                <td class="u-table-cell" style='cursor:pointer' title="http://www.gggyyy.cn/nmyy/cyjj.html">&gt; 加盟菜源佳佳</td>
                <td class="u-table-cell"></td>
                <td class="u-table-cell"></td>
                <td class="u-table-cell"></td>
              </tr>
              <tr style="height: 50px;">
                <td class="u-table-cell u-table-cell-82" style='cursor:pointer' title="http://www.gggyyy.cn/nmyy/nmds.html">&gt; 农贸市场电商</td>
                <td class="u-table-cell"></td>
                <td class="u-table-cell"></td>
                <td class="u-table-cell"></td>
                <td class="u-table-cell"></td>
                <td class="u-table-cell"></td>
              </tr>
            </tbody>
          </table>
        </div>
        <table style='margin: 0 auto 0 auto;'><tr><td>
          <img src="/N1/images/2019012910555628.jpg" alt="" class="u-image u-image-default u-image-1" data-image-width="1280" data-image-height="1280">
          </td></tr><tr><td><p class="u-text u-text-default u-text-2">官方微信</p></td></tr>
        </table>
        <div style='clear:both; display: block'></div>
        <p class="u-text u-text-3" style='font-weight: 200 !important; margin-top: 30px; margin-bottom: 10px !important'>
        联系电话: 0571-88776655           0571-28120373           19957895916<br>地址:杭州市拱墅区通益路861号録景国际杭州光影<br>Copyright光影农贸市场设计研究院 版权所有<br><SPAN STYLE='cursor:pointer;' onclick='window.open("https://beian.miit.gov.cn/", "_blank");'>浙ICP备1049450号-1</span><br>
          <br>
        </p>
      </div></footer>
      <script>
        $(document).ready(function() {
          $("#sec-dc14 table.footertable td[title]").each(function() {
            let link = $(this).attr('title');
            $(this).click(() => {
              window.location.href = link;
            });
          })
        })
      </script>
      <script type="text/javascript">document.write(unescape("%3Cspan id='cnzz_stat_icon_1279380584'%3E%3C/span%3E%3Cscript src='https://s9.cnzz.com/z_stat.php%3Fid%3D1279380584' type='text/javascript'%3E%3C/script%3E"));</script>
  </body>
</html>

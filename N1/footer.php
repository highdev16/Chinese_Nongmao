<?php 
      if (!isset($db)) {
        include('../N1/dbconfig.php');
        $db = getDbInstance();
        $rows = $db->rawQuery("select * from links");
      } else $rows = $db->rawQuery("select * from links");
    ?>
    <style>
      table.footertable tr{
        height: 30px !Important;
      }
      table.footertable tr td {
        padding-top: 0px !Important; padding-bottom: 0px !Important;
      }
      div.friendly_links a {
        width: 11%; 
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
    </style>
    <footer class="u-align-center-xs u-align-left-lg u-align-left-md u-align-left-sm u-align-left-xl u-clearfix u-footer u-grey-80 u-footer" id="sec-dc14">
      <div class="u-clearfix u-sheet u-sheet-1" style='margin-top: 20px'>
        <h3 class="u-text u-text-default u-text-1"  style='margin-bottom: 20px; '>友情链接:</h3>
        <div class='friendly_links' style='margin-bottom: 40px'>
        	<table style='width:100%'>
          <?php
              for ($i = 0; $i < sizeof($rows);) { 
                echo "<tr>";
                for ($k = 0; $k < 9 && $i < sizeof($rows); $k++, $i++) { ?>
                  <td style='width: 11.1%'>
                    <a href="<?php echo $rows[$i]['url']; ?>" target='_blank' style='color: white;' class='friend_link'>
                      <?php echo htmlspecialchars($rows[$i]['title']); ?>
                    </a>
                  </td>
                <?php } ?>
                </tr>
              <?php } ?>
          </table>
        </div>
          
        <img src="/N1/images/2019012910555628.jpg" alt="" class="u-image u-image-default u-image-1" data-image-width="1280" data-image-height="1280">
        <div class="u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-table u-table-responsive u-table-2">
          <table class="u-table-entity footertable">
            <colgroup>
              <col width="14%">
              <col width="14%">
              <col width="14%">
              <col width="15%">
              <col width="15%">
              <col width="14%">
              <col width="14%">
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
                <td class="u-table-cell u-table-cell-52">&gt; 农贸市场设计</td>
                <td class="u-table-cell u-table-cell-53">&gt; 农贸装修设计</td>
                <td class="u-table-cell u-table-cell-54">&gt; 农贸运营模式</td>
                <td class="u-table-cell u-table-cell-55">&gt; 5G智能设备</td>
                <td class="u-table-cell u-table-cell-56">&gt; 我要投资农贸</td>
                <td class="u-table-cell u-table-cell-57">&gt; 农贸设计百科</td>
                <td class="u-table-cell u-table-cell-57">&gt; 公司简介</td>
              </tr>
              <tr style="height: 56px;">
                <td class="u-table-cell u-table-cell-58">&gt; 农贸建筑设计</td>
                <td class="u-table-cell u-table-cell-59">&gt; 5G智能设计</td>
                <td class="u-table-cell u-table-cell-60">&gt; 农贸市场招商</td>
                <td class="u-table-cell u-table-cell-61">&gt; 智能软件系统</td>
                <td class="u-table-cell u-table-cell-62">&gt; 我有农贸项目</td>
                <td class="u-table-cell u-table-cell-63">&gt; 农贸新闻资讯</td>
                <td class="u-table-cell u-table-cell-63">&gt; 团队</td>
              </tr>
              <tr style="height: 56px;">
                <td class="u-table-cell u-table-cell-64">&gt; 5G 智能设计</td>
                <td class="u-table-cell u-table-cell-65">&gt; 农贸建筑设计</td>
                <td class="u-table-cell u-table-cell-66">&gt; 农贸市场电商</td>
                <td class="u-table-cell u-table-cell-67">&gt; 智能城市应用</td>
                <td class="u-table-cell u-table-cell-68">&gt; 政府合作</td>
                <td class="u-table-cell u-table-cell-69">&gt; 光影新闻动态</td>
                <td class="u-table-cell u-table-cell-69">&gt; 联系我们</td>
              </tr>
              <tr style="height: 56px;">
                <td class="u-table-cell u-table-cell-70">&gt; 农贸市场运营</td>
                <td class="u-table-cell u-table-cell-71">&gt; 设计合作流程</td>
                <td class="u-table-cell u-table-cell-72">&gt; 农贸商业综合体</td>
                <td class="u-table-cell u-table-cell-73">&gt; 智能菜场案例</td>
                <td class="u-table-cell u-table-cell-74">&gt; 光影置业</td>
                <td class="u-table-cell u-table-cell-75">&gt; 政府政策文件</td>
              </tr>
              <tr style="height: 27px;">
                <td class="u-table-cell u-table-cell-76">&gt; 农贸项目投资</td>
                <td class="u-table-cell u-table-cell-77">&gt; 政府合作</td>
                <td class="u-table-cell">&gt; 加盟菜源佳佳</td>
                <td class="u-table-cell"></td>
                <td class="u-table-cell"></td>
                <td class="u-table-cell"></td>
              </tr>
              <tr style="height: 50px;">
                <td class="u-table-cell u-table-cell-82">&gt;农贸市场电商</td>
                <td class="u-table-cell"></td>
                <td class="u-table-cell"></td>
                <td class="u-table-cell"></td>
                <td class="u-table-cell"></td>
                <td class="u-table-cell"></td>
              </tr>
            </tbody>
          </table>
        </div>
        <p class="u-text u-text-default u-text-2">官方微信</p>
        <p class="u-text u-text-3" style='font-weight: 200 !important; margin-top: 180px; margin-bottom: 10px !important'>
        联系电话: 0571-88776655           0571-28120373           19957895916<br>地址:杭州市拱墅区通益路861号録景国际杭州光影<br>Copyright光影农贸市场设计研究院 版权所有<br><SPAN STYLE='cursor:pointer;' onclick='window.open("https://beian.miit.gov.cn/", "_blank");'>浙ICP备1049450号-1</span><br>
          <br>
        </p>
      </div></footer>
  </body>
</html>

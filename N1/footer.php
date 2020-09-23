<?php 
      if (!isset($db)) {
        include('../N1/dbconfig.php');
        $db = getDbInstance();
        $rows = $db->rawQuery("select * from links");
      } else $rows = $db->rawQuery("select * from links");
    ?>
    <style>

      div.friendly_links a {
        width: 11%; float:left;
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
        <h3 class="u-text u-text-default u-text-1"  style='margin-bottom: 30px; '>友情链接:</h3>
        <div class='friendly_links' style='margin-bottom: 30px'>
        	<table style='width:100%'>
        <?php
          for ($i = 0; $i < sizeof($rows);) { ?>
            <tr style="height: 33px;">
              <?php 
                for ($k = 0; $k < 9 && $i < sizeof($rows); $k++, $i++) { ?>
                <a href="<?php echo $rows[$i]['url']; ?>" target='_blank' style='color: white;' class='friend_link'>
                  <?php echo htmlspecialchars($rows[$i]['title']); ?>
                </a>
                <?php } ?>
            </tr>
          <?php } ?>
      </table>
          </div>
          
        <img src="../N1/images/2019012910555628.jpg" alt="" class="u-image u-image-default u-image-1" data-image-width="1280" data-image-height="1280">
        <div class="u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-table u-table-responsive u-table-2">
          <table class="u-table-entity">
            <colgroup>
              <col width="16.6%">
              <col width="16.6%">
              <col width="16.6%">
              <col width="16.6%">
              <col width="16.6%">
              <col width="17.000000000000004%">
            </colgroup>
            <tbody class="u-table-body">
              <tr style="height: 55px;">
                <td class="u-table-cell">经营范围</td>
                <td class="u-table-cell">设计案例</td>
                <td class="u-table-cell">市场营运</td>
                <td class="u-block-undefined--Infinity u-table-cell">市场资讯</td>
                <td class="u-block-undefined--Infinity u-table-cell">智能菜场</td>
                <td class="u-block-undefined--Infinity u-table-cell">关于我们</td>
              </tr>
              <tr style="height: 51px;">
                <td class="u-table-cell u-table-cell-52">&gt; 农贸市场设计<br></td>
                <td class="u-table-cell u-table-cell-53">&gt;&nbsp;农贸市场设计例</td>
                <td class="u-table-cell u-table-cell-54">&gt; 农贸市场招商</td>
                <td class="u-block-undefined--Infinity u-table-cell u-table-cell-55">&gt; 我要投资农贸</td>
                <td class="u-block-undefined--Infinity u-table-cell u-table-cell-56">&gt; 农贸设计百科</td>
                <td class="u-block-undefined--Infinity u-table-cell u-table-cell-57">&gt; 联系我们</td>
              </tr>
              <tr style="height: 56px;">
                <td class="u-table-cell u-table-cell-58">&gt; 农贸市场建筑设计</td>
                <td class="u-table-cell u-table-cell-59">&gt; 5G智能设计</td>
                <td class="u-table-cell u-table-cell-60">&gt; 农贸市场运营</td>
                <td class="u-block-undefined--Infinity u-table-cell u-table-cell-61">&gt; 我有农贸项目</td>
                <td class="u-block-undefined--Infinity u-table-cell u-table-cell-62">&gt; 农图新国资讯</td>
                <td class="u-block-undefined--Infinity u-table-cell u-table-cell-63">&gt; 光影简介</td>
              </tr>
              <tr style="height: 56px;">
                <td class="u-table-cell u-table-cell-64">&gt; 5G 智能设计</td>
                <td class="u-table-cell u-table-cell-65">&gt; 农贸市场建筑设计</td>
                <td class="u-table-cell u-table-cell-66">&gt; 农贸市场电商</td>
                <td class="u-block-undefined--Infinity u-table-cell u-table-cell-67">&gt; 政府合作</td>
                <td class="u-block-undefined--Infinity u-table-cell u-table-cell-68">&gt; 政府政策文件</td>
                <td class="u-block-undefined--Infinity u-table-cell u-table-cell-69">&gt; 资料专区</td>
              </tr>
              <tr style="height: 56px;">
                <td class="u-table-cell u-table-cell-70">&gt;农贸市场运营</td>
                <td class="u-table-cell u-table-cell-71">&gt;设计合作流程</td>
                <td class="u-table-cell u-table-cell-72">&gt; 农贸市场综合体</td>
                <td class="u-block-undefined--Infinity u-table-cell u-table-cell-73">&gt;光影置业</td>
                <td class="u-block-undefined--Infinity u-table-cell u-table-cell-74">&gt; 光影新闻动态</td>
                <td class="u-block-undefined--Infinity u-table-cell u-table-cell-75"></td>
              </tr>
              <tr style="height: 27px;">
                <td class="u-table-cell u-table-cell-76">&gt; 农图投资加盟</td>
                <td class="u-table-cell u-table-cell-77">&gt; 政府合作</td>
                <td class="u-table-cell"></td>
                <td class="u-block-undefined--Infinity u-table-cell"></td>
                <td class="u-block-undefined--Infinity u-table-cell"></td>
                <td class="u-block-undefined--Infinity u-table-cell"></td>
              </tr>
              <tr style="height: 50px;">
                <td class="u-table-cell u-table-cell-82">&gt;&nbsp;农贸市场电商</td>
                <td class="u-table-cell"></td>
                <td class="u-table-cell"></td>
                <td class="u-block-undefined--Infinity u-table-cell"></td>
                <td class="u-block-undefined--Infinity u-table-cell"></td>
                <td class="u-block-undefined--Infinity u-table-cell"></td>
              </tr>
            </tbody>
          </table>
        </div>
        <p class="u-text u-text-default u-text-2">官方微信</p>
        <p class="u-text u-text-3" style='font-weight: 200 !important'>联系电话: 0571-887766550571-28120373<br>地址:杭州市拱墅区通益路861号録景国际杭州光影<br>Copyright光影农贸市场设计研究院 版权所有<br><SPAN STYLE='cursor:pointer;' onclick='window.open("https://beian.miit.gov.cn/", "_blank");'>浙ICP备1049450号-1</span><br>
          <br>
        </p>
      </div></footer>
  </body>
</html>

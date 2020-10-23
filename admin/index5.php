<?php
$ACTIVE = 6;
session_start();
function get_value($array, $key, $default = '') {
	if (array_key_exists($key, $array)) return $array[$key];
	else return $default;
}

if (get_value($_SESSION, 'login') != 1) {
	header('location: login.php');
	exit;
}
include ('config.php');
?><!DOCTYPE html>
<html lang="cn">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="农贸市场设计|改造|效果图_智能菜场设计|升级|运营_农贸市场研究院 网站管理后台">
	<meta name="author" content="李日振">
	<meta name="keywords" content="adminkit, bootstrap, web ui kit, dashboard template, admin template">

	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<title>农贸市场设计|改造|效果图_智能菜场设计|升级|运营_农贸市场研究院 网站管理后台</title>

	
	<link href="css/jquery.min.css" rel="stylesheet" />
	<link href="css/dt.css" rel="stylesheet" />
	<link href="css/bs.css" rel="stylesheet" />
	<link href="css/app.css" rel="stylesheet" />
	<link href="css/sweetalert.css" rel="stylesheet" />	
	<style>
		#sidebar * {
			font-size: 16px !Important;
		}
		.swal2-title {
			font-size: 1.875em !Important;
		}
		* {
			font-size: 14px !Important;
		}
		#phones_paginate a {
			margin-left: 20px;
		}
		ul.sidebar-nav li a.sidebar-link {
			font-size: 130%;
		}
		::-webkit-input-placeholder {
		color: #ddd;
		}
		:-moz-placeholder { /* Upto Firefox 18, Deprecated in Firefox 19  */
		color: #ddd;  
		}
		::-moz-placeholder {  /* Firefox 19+ */
		color: #ddd;  
		}
		:-ms-input-placeholder {  
		color: #ddd;  
		}
		#sortable { 
		    list-style-type: none; 
		    margin: 0; 
		    padding: 0; 
		    width: 90%; 
		  }
		  #sortable li { 		    
		    float: left; 
		    cursor: pointer;

		  }
		#sortable li img:first-child {
			width: 180px;
		    height: 100px;
		    border: 1px solid #dbdbdb;
		}
		#sortable li {
		    width: 180px;
		    height: 100px;
		    margin: 10px 10px 10px 10px;
	  	}
	  	li.imgplusbutton {	  		
		    position: relative;
		    background: #f7f7f7;
		    font-size: 42px;
		    text-align: center;
		    line-height: 100px;
		    color: #e1e1e7;
		    border: 1px solid #dbdbdb;
		}
		table textarea {
			width: 100%; height: 100%;
			min-width: 100%; min-height: 100%;
			max-width: 50px; max-height: 50px;
			resize: none;
			border: 0px solid white;
		}  
		table td { border: 1px solid #bbb; padding: 2px 2px 2px 2px; text-align: center;}
	  </style>
	  <script src="js/app.js"></script>
	  <!-- <script src="js/jquery.1.12.4.js"></script> -->
	<script src="js/jquery.ui.min.js"></script>
	<script src="js/jquery.ui.touch-punch.min.js"></script>
</head>
<script src='js/dt.js'></script>
<script src='js/bs.js'></script>
<script src='js/sweetalert.js'></script>
<body>
	<div class="wrapper">
		<?php include('sidebar.php'); ?>

		<div class="main">
			<?php include('nav.php'); ?>			
			<?php
				if (!file_exists("../title_description_keywords.txt")) {
					file_put_contents("../title_description_keywords.txt", "{}");
				}
				$title_description_keywords = json_decode(trim(file_get_contents('../title_description_keywords.txt')), true);
				// pageID => {title, keywords, description}
				$arr = array(
					array(	"1" , "/", "主页" ),
					array(	"2.1" , "/zxsj", "农贸设计案例" ),
					array(	"2.2" , '/jzsj', "农贸建筑设计"),
					array(	"2.3" , '/znsj', "5G智能设计"),
					array(	"2.4" , '/nmyy', "农贸市场运营案例"),
					array(	"5" , '/sj/sjhz.html', "设计合作流程"),
					array(	"6" , "/sj/zfhz.html", "城市智慧菜场建设"),
					array(	"37" , "/sj/nmscdw.html", "农贸市场定位"),
					array(	"10" , "/yyms.html", "农贸市场运营模式"),
					array(	"11" , "/nmyy/nmzs.html", "农贸市场招商"),
					array(	"12" , "/nmyy/nmds.html", "农贸电商"),
					array(	"13" , "/nmyy/nmzht.html", "农贸综合体"),
					array(	"14" , "/nmyy/cyjj.html", "菜源佳佳加盟"),
					array(	"17" , "/zn/znsb.html", "5G智能设备"),
					array(	"18" , "/zn/znrj.html", "智能软件"),
					array(	"19" , "/zn/csyy.html", "智能城市应用"),
					array(	"21" , "/tz.html", "我要投资农贸"),
					array(	"22" , "/rz.html", "我有农贸项目"),
					array(	"23" , "/zhengfu.html", "政府合作"),
					array(	"24" , "/gyzy.html", "光影置业"),
					array(	"25.1" , "/sjbk", "装修设计百科"),
					array(	"25.2" , "/news", "农贸新闻资讯"),
					array(	"25.3" , "/gyxw", "光影新闻动态"),
					array(	"25.4" , "/gov", "政府政策文件"),														
					array(	"36" , "/about", "联系我们"),
					array(	"35" , "/about/contact.html", "团队"),
					array(	"34" , "/about/certify.html", "公司简介")
					);
				$no = 1;
				$htmlString = "";
				foreach ($arr as $i => $v) {
					$row = $v[0];
					$url = $v[1];
					$text = $v[2];
					if (array_key_exists($row, $title_description_keywords))
						$value = $title_description_keywords[$row];
					else $value = array();
					if (isset($value) && sizeof($value) == 3) {}
					else $value = array('keywords' => '', 'title' => '', 'description' => '');

					$htmlString .= "<tr id='r_$row'><td>$no</td><td><span style='color:#999'>" . $text . "</span><br><b>" . htmlspecialchars($url) . "</b></td><td><textarea placeholder='无内容' class='title'>"
									. htmlspecialchars($value['title']) . "</textarea></td><td><textarea placeholder='无内容' class='keywords'>"
									. htmlspecialchars($value['keywords']) . "</textarea></td><td><textarea placeholder='无内容' class='description'>". htmlspecialchars($value['description']) . "</textarea></td><td>"
									. "<button class='btn btn-danger' type='button' onclick='resetThisRow(this)'>重启</button></td></tr>";
					$no++;
				}
            ?>
			<main class="content">				
				<div class="container-fluid p-0">					
                    <div class='row'>
					    <button type='button' class='btn btn-primary' onclick='SaveData();' id='submitButton'>保存</button>					    
					</div>
					<div class='row'>
					    <table id='maintable' style='width:100%; border: 1px solid #bbb'>
							<colgroup>
								<col width="7%">
								<col width="15%">
								<col width="20%">
								<col width="20%">
								<col width="20%">
								<col width="3%">
							</colgroup>
							<thead>
								<tr style='background-color: #ccc'> <td>No.</td> <td>URL</td><td>标题</td> <td>关键字</td> <td>说明</td> <td></td></tr>
							</thead>
							<tbody><?php echo $htmlString; ?></tbody>
						</table>
					</div>
				</div>
			</main>
			
		</div>
	</div>
	
</body>
<script>
    function SaveData() {
		let arrData = {};
		$("#maintable tbody tr").each(function() {
			let id = this.id.substr(2);
			arrData[id] = {
				title: $(this).find("textarea.title").val(),
				keywords: $(this).find("textarea.keywords").val(),
				description: $(this).find("textarea.description").val()
			};
		})
        $.post('save_keyword.php', {data: arrData}, function(a,b) {
            if (a == 'success') alert("成功！");
            else alert("失败！");
        })
	}
	
	function resetThisRow(obj) {
		$(obj).parent().parent().find('textarea').val("");
		
	}
</script>
</html>
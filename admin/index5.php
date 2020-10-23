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
			max-width: 100%; max-height: 100%;
			border: 0px solid white;
		}  
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
							"1" => "/",
							"2.1" => "/zxsj",
							"2.2" => '/jzsj',
							"2.3" => '/znsj',
							"2.4" => '/nmyy',
							"5" => '/sj/sjhz.html',
							"6" => "/sj/zfhz.html",
							"10" => "/yyms.html",
							"11" => "/nmyy/nmzs.html",
							"12" => "/nmyy/nmds.html",
							"13" => "/nmyy/nmzht.html",
							"14" => "/nmyy/cyjj.html",
							"17" => "/zn/znsb.html",
							"18" => "/zn/znrj.html",
							"19" => "/zn/csyy.html",
							"21" => "/tz.html",
							"22" => "/rz.html",
							"23" => "/zhengfu.html",
							"24" => "/gyzy.html",
							"25.1" => "/sjbk",
							"25.2" => "/news",
							"25.3" => "/gyxw",
							"25.4" => "/gov",														
							"36" => "/about",
							"35" => "/about/contact.html",
							"34" => "/about/certify.html",
							"37" => "/sj/nmscdw.html");
				$arr = array(); $no = 1;
				$htmlString = "";
				foreach ($arr as $row => $v) {
					$value = $title_description_keywords[$row];
					if (isset($value) && sizeof($value) == 3) {}
					else $value = array('keywords' => '', 'title' => '', 'description' => '');

					$htmlString .= "<tr id='r_$row'><td>$no</td><td>" . htmlspecialchars($v) . "</td><td><textarea class='title'>"
									. htmlspecialchars($value['title']) . "</textarea></td><td><textarea class='keywords'>"
									. htmlspecialchars($value['keywords']) . "</textarea></td><td><textarea class='description'>". htmlspecialchars($value['description']) . "</textarea></td><td>"
									. "<button class='btn btn-danger' type='button'>X</button></td></tr>";
				}
            ?>
			<main class="content">				
				<div class="container-fluid p-0">					
                    <div class='row'>
					    <button type='button' class='btn btn-primary' onclick='SaveData();' id='submitButton'>保存</button>					    
					</div>
					<div class='row'>
					    <table id='maintable'>
							<colgroup>
								<col width="7%">
								<col width="30%">
								<col width="30%">
								<col width="30%">
								<col width="3%">
							</colgroup>
							<tbody>
								<?php echo $htmlString; ?>
							</tbody>
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
		$("#maintable tr").each(function() {
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
</script>
</html>
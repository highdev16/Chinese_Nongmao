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
				$keywords = trim(file_get_contents('../keyword.txt'));
				$description = trim(file_get_contents('../description.txt'));
            ?>
			<main class="content">				
				<div class="container-fluid p-0">
					<div class="row">
						<div>
                            <table>
                                <tr>
                                    <td style='width: 120px; font-weight: bold'>关键词</td>
                                    <td>
                                    <textarea id='keywords' style='width: 500px; height: 100px'><?php echo htmlspecialchars($keywords); ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style='width: 120px; font-weight: bold'>描述</td>
                                    <td>
                                        <textarea id='description' style='width: 500px; height: 100px'><?php echo htmlspecialchars($description); ?></textarea>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class='row'>
					    <div style="margin-top: 50px;">
					        <button type='button' class='btn btn-primary' onclick='SaveData();' id='submitButton'>保存</button>
					    </div>
					</div>
				</div>
			</main>
			
		</div>
	</div>
	
</body>
<script>
    function SaveData() {
        $.post('save_keyword.php', {keywords: $("#keywords").val(), description: $("#description").val()}, function(a,b) {
            if (a == 'success') alert("成功！");
            else alert("失败！");
        })
    }
</script>
</html>
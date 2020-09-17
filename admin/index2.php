<?php
$ACTIVE = 3;
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

	
	<link href="css/jquery.min.css" rel="stylesheet">
		<link href="css/dt.css" rel="stylesheet">
		<link href="css/bs.css" rel="stylesheet">
		<link href="css/app.css" rel="stylesheet">
	<style>
		#sidebar * {
			font-size: 16px !Important;
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
<body>
	<div class="wrapper">
		<?php include('sidebar.php'); ?>

		<div class="main">
			<?php include('nav.php'); ?>			

			<main class="content">				
				<div class="container-fluid p-0">
					<div class="row">
						<div style='float: left; width: 100%;'>
						<table id='phones' class='table table-striped table-bordered db-show-table' style='width: 100%;'>
							<thead>
								<tr>
									<th style='width: 5%'>No</th>
									<th style='width: 50%'>资讯标题</th>
									<th style='width: 10%'>资讯作家</th>
									<th style='width: 10%'>图片</th>
									<th style='width: 5%'>最好的资讯</th>																		
									<th style='width: 10%'></th>
								</tr>
							</thead>
							
						</table>

					    </div>
					    <div style="clear: both; margin-top: 50px;">
					        <button type='button' class='btn btn-primary' onclick='window.location.href="index2_detail.php?id=-1";' id='submitButton'>添加</button>
					    </div>
					</div>
				</div>
			</main>
			<input type='file' style='position: absolute; left: -10000px; top: -10000px' id='fileselect'>
		</div>
	</div>
	
</body>
<script>
	var phoneTable = $("#phones").DataTable({
		"language": {
			"url": "js/chinese.json"
		},
		"ajax" : "index2_table.php"
	});
	function deleteThis(id) {
		if (!confirm("确定要删除吗?")) return;
		$.post('save_news.php', {del_id: id}, function(a,b) {
			if (a == 'success') {
				phoneTable.ajax.reload(null, false);
			}
		})
	}
	
</script>
</html>
<?php
$ACTIVE = 5;
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

			<main class="content">				
				<div class="container-fluid p-0">
					<div class="row">
						<div style='float: left; width: 100%;'>
						<table id='phones' class='table table-striped table-bordered db-show-table' style='width: 100%;'>
							<thead>
								<tr>
									<th style='width: 5%'>No</th>
									<th style='width: 25%'>输人您的姓名</th>
									<th style='width: 25%'>输人您的电话</th>
									<th style='width: 25%'>我需要解决的同题是</th>
									<th style='width: 20%'></th>
								</tr>
							</thead>
							<tbody>
							<?php
								$categoryArr = array('', '室内设计', '建筑设计', '5G智能设计', '运营案例');
								$db = getDbInstance();
								$rows = $db->rawQuery("select * from consultation order by id desc");
								for ($i = 0; $i < sizeof($rows); $i++) {	
                                    $row = $rows[$i];								
							?> <tr id='row_<?php echo $rows[$i]['id']; ?>' customdata="<?php echo addslashes($rows[$i]['customdata']); ?>" onclick='showInfo(this)'>
								<td style='width: 5%; cursor:pointer'><?php echo $i + 1; ?></td>
								<td style='width: 25%; cursor:pointer'><?php echo htmlspecialchars($row['name']); ?></td>
								<td style='width: 25%; cursor:pointer'><?php echo htmlspecialchars($row['email']); ?></td>
								<td style='width: 25%; cursor:pointer; text-align: left; white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;'>
									<?php echo htmlspecialchars($row['message']); ?>
								</td>
								<td style='width: 20%; cursor:pointer'><button type='button' onclick='deleteThis(<?php echo $rows[$i]["id"]; ?>)' class='btn btn-danger'>删除</button></td>
								</tr>
							<?php } ?>
							</tbody>
						</table>

					    </div>
					    <div style="clear: both; margin-top: 50px;">
					        <button type='button' class='btn btn-primary' onclick='addNewPicture();' id='submitButton'>添加</button>
					    </div>
					</div>
				</div>
			</main>
			<input type='file' style='position: absolute; left: -10000px; top: -10000px' id='fileselect'>
		</div>
	</div>
	
</body>
<style>
	table.mail_detail_table tr td:first-child {
		font-weight: bold;
	}
	table.mail_detail_table tr td {
		max-width: 500px;
	}
	table.mail_detail_table tr td {
		text-align: left;
		vertical-align: top;
	}
	table.mail_detail_table tr {
		height: 35px;
	}
</style>
<script>
	function showInfo(ele) {
		Swal.fire({
			title: "表单",
			width: 600,
			html: "<table class='mail_detail_table'><tr><td style='width: 150px'>姓名</td><td>" + $(ele).find("td:nth-child(2)").html() + "</td></tr>"
					+ "<tr><td style='width: 150px'>电话(电子邮件)</td><td>" + $(ele).find("td:nth-child(3)").html() + "</td></tr>"
					+ "<tr><td style='width: 150px'>题是</td><td>" + $(ele).find("td:nth-child(4)").html() + "</td></tr>"
					+ "<tr><td style='width: 150px'>需要</td><td>" + $(ele).attr("customdata") + "</td></tr></table>"
		})
	}
	var phoneTable = $("#phones").DataTable({
		"language": {
			"url": "js/chinese.json"
		}
	});
	function deleteThis(id) {
		if (!confirm("确定要删除吗?")) return;
		$.post('save_email.php', {del_id: id}, function(a,b) {
			if (a == 'success') {
				phoneTable.row("#row_" + id).remove().draw();
			}
		})
	}	
</script>
</html>
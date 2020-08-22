<?php
$ACTIVE = 7;
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
									<th style='width: 20%'>图片</th>
									<th style='width: 20%'>文件名</th>
									<th style='width: 20%'>URL</td>
									<th style='width: 20%'>说明</td>
									<th style='width: 15%'></th>
								</tr>
							</thead>
							<tbody>
							<?php
								$categoryArr = array('', '室内设计', '建筑设计', '5G智能设计', '运营案例');
								$db = getDbInstance();
								$rows = $db->rawQuery("select * from images order by id desc");
								for ($i = 0; $i < sizeof($rows); $i++) {									
							?> <tr id='row_<?php echo $rows[$i]['id']; ?>'>
								<td style='width: 5%; cursor:pointer'><?php echo $i + 1; ?></td>
								<td style='width: 20%; cursor:pointer'><img src='<?php echo $rows[$i]['url']; ?>' style='width: 80%; margin: 3px 10% 3px 10%;' onclick='window.open(this.src, "_blank")'></td>
								<td style='width: 20%; cursor:pointer'><?php echo $rows[$i]['filename']; ?></td>
								<td style='width: 20%; cursor:pointer'><?php echo $rows[$i]['url']; ?></td>
								<td style='width: 20%; cursor:pointer'><?php echo htmlspecialchars($rows[$i]['description']); ?></td>
								<td style='width: 15%; cursor:pointer'><button type='button' onclick='deleteThis(<?php echo $rows[$i]["id"]; ?>)' class='btn btn-danger'>删除</button></td>
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
<script>
	var phoneTable = $("#phones").DataTable({
		"language": {
			"url": "js/chinese.json"
		}
	});
	function deleteThis(id) {
		if (!confirm("确定要删除吗?")) return;
		$.post('save_image.php', {del_id: id}, function(a,b) {
			if (a == 'success') {
				phoneTable.row("#row_" + id).remove().draw();
			}
		})
	}
	function addNewPicture() {
		Swal.fire({
			title: "新图片",
			width: 600,
			html: "<div style='font-size:1.125em !important; text-align:left'>选择文件。</div><input type='file' id='image'><br style='height:20px'>\
			<div style='font-size:1.125em !important; text-align:left'>输入说明。</div><div><textarea style='width:500px; height: 200px' id='description'></textarea>"
		}).then(result => {
			let description = $("#description").val();
			var formData = new FormData();
			formData.append("image", $("#image")[0].files[0]);
			formData.append("description", description);
			formData.append('id', '-1');
			$.ajax({
				url: 'save_image.php',
				type: 'post',
				data: formData,
				processData: false,
				contentType: false,
				success: function(data) {
					console.log(data);
					try {
						data = JSON.parse(data);
					} catch (e) {}
					if (data['result'] == 'success') {
						alert("成功！");
						data = data.data;
						let jRow = $("<tr id='row_" + data.id + "'>").append("<td>" + (phoneTable.rows().count() + 1) + "</td>"
								+ "<td><img src='" + data.url + "' style='width: 80%; margin: 3px 10% 3px 10%;' onclick='window.open(this.src, \"_blank\")'></td>"
								+ "<td>" + data.filename + "</td>"
								+ "<td>" + data.url + "</td>"
								+ "<td>" + data.description + "</td>"
								+ "<td style='width: 15%; cursor:pointer'><button type='button' onclick='deleteThis(" + data.id + ")' class='btn btn-danger'>删除</button></td>")
						phoneTable.row.add(jRow).draw();
					}
				},
				error: function(error) {
					alert("保存内容时出错。");
				}
			});
		})
	}
</script>
</html>
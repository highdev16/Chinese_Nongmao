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
	<link rel="stylesheet" href="dist/themes/default/style.min.css" />
	<script src="dist/jstree.min.js"></script>
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
						<div  style='float: left; width:20%; max-width: 20%; overflow: auto'>
							<table>
								<tr>
									<td><div>
										<table>
											<tr>
												<td><button class='btn btn-primary' onclick='addnewfolder()'>+创建</button></td>
												<td><button class='btn btn-success' style='margin-left: 10px' onclick='renamefolder()'>更改</button></td>
												<td><button class='btn btn-danger' style='margin-left: 10px' onclick='deletefolder()'>-删除</button></td>
											</tr>
										</table></div>
									</td>
								<tr>
									<td>
										<div style='max-width: 100%; overflow: auto' id='jsTree'>
										</div>
									</td>
								</tr>
							</table>
						</div>
						<div style='float: left; width: 80%;'>
							<table id='phones' class='table table-striped table-bordered db-show-table' style='width: 100%;'>
								<thead>
									<tr>
										<th style='width: 5%'>No</th>
										<th style='width: 20%'>图片</th>
										<th style='width: 50%'>文件名</th>										
										<th style='width: 5%'></th>
									</tr>
								</thead>
								<tbody>
								<!-- < ?php
									$categoryArr = array('', '室内设计', '建筑设计', '5G智能设计', '运营案例');
									$db = getDbInstance();
									$rows = $db->rawQuery("select * from images order by id desc");
									for ($i = 0; $i < sizeof($rows); $i++) {									
								?> <tr id='row_< ?php echo $rows[$i]['id']; ?>'>
									<td style='width: 5%; cursor:pointer'>< ?php echo $i + 1; ?></td>
									<td style='width: 20%; cursor:pointer'><img src='< ?php echo $rows[$i]['url']; ?>' style='max-width: 80%; margin: 3px 10% 3px 10%; height: 50px' onclick='window.open(this.src, "_blank")'></td>
									<td style='width: 50%; cursor:pointer'>< ? php echo $rows[$i]['filename']; ?></td>
									<td style='width: 20%; cursor:pointer; display:none'>< ?php echo $rows[$i]['url']; ?></td> 
									<td style='width: 20%; cursor:pointer'>< ?php echo htmlspecialchars($rows[$i]['description']); ?></td> 
									<td style='width: 5%; cursor:pointer'><button type='button' onclick='deleteThis(< ?php echo $rows[$i]["id"]; ?>)' class='btn btn-danger'>删除</button></td>
									</tr>
								< ?php } ?> -->
								</tbody>
							</table>

					    </div>
					    
					</div>
					<div class='row' style='flex-direction: row-reverse'>
					<div style="clear: both; margin-top: 50px;">
					        <button type='button' class='btn btn-primary' style='width: 100px; height: 50px; float:right' onclick='addNewPicture();' id='submitButton'>添加</button>
						</div>
									</div>
				</div>
			</main>
			<input type='file' style='position: absolute; left: -10000px; top: -10000px' id='fileselect'>
		</div>
	</div>
	
</body>
<script>
var foldertree, selectedItem = {id: "allimages"};	
	var phoneTable = $("#phones").DataTable({
		"language": {
			"url": "js/chinese.json"
		},
		"ajax" : "load_all_images.php?path=allimages",
		"lengthMenu": [[5, 10, 20, 50, 100, -1], ["5个", "10个", "20个", "50个", "100个", "查看全部"]],
		"pageLength": 10
	});
	function deleteThis(id) {
		if (!confirm("确定要删除吗?")) return;
		$.post('save_image.php', {del_id: id}, function(a,b) {
			if (a == 'success') {
				phoneTable.ajax.reload(null, false);
			} else {
				alert ("失败");
			}
		})
	}
	function addNewPicture() {
		Swal.fire({
			title: "新图片",
			width: 600,
			html: "<div style='font-size:1.125em !important; text-align:left'>选择文件。(*.jpg, *.jpeg, *.png, *.gif, *.bmp)</div><input type='file' id='image'><br style='height:20px'>\
			<div style='font-size:1.125em !important; text-align:left'>资料夹路径:  /" + selectedItem.id + "</div>"
		}).then(result => {
			var formData = new FormData();
			formData.append("image", $("#image")[0].files[0]);
			formData.append("path", selectedItem.id);
			formData.append('id', '-1');
			$.ajax({
				url: 'save_image.php',
				type: 'post',
				data: formData,
				processData: false,
				contentType: false,
				success: function(data) {
					if (data == 'success') {
						alert("成功！");
						phoneTable.ajax.reload(null, false);
					} else {
						alert("失败！");
					}
				},
				error: function(error) {
					alert("保存内容时出错。");
				}
			});
		})
	}

	
	$(document).ready(function() {
		foldertree = $("#jsTree").jstree({
			'core' : {
				'data' : {
					'url' : 'get_tree_image.php',
					'data' : function (node) {
						return { 'id' : node.id };
					}
				}
			}
		});
		$('#jsTree')
			// listen for event
			.on('changed.jstree', function (e, data) {
				selectedItem = data && data.node;
				if (!selectedItem || !selectedItem.id) selectedItem = {id: "allimages"};
				phoneTable.ajax.url("load_all_images.php?path=" + encodeURIComponent(selectedItem.id));
				phoneTable.ajax.reload(null, true);
			})
	})

	function addnewfolder() {
		if (!selectedItem) return;
		let location = selectedItem.id;
		let newname = prompt("您将在  “/" + location + "”  中添加新文件夹。 输入文件夹的名称。", "");
		if (!newname || newname.trim().length == 0) {
			return;
		}
		$.post("create_new_folder.php", {path: location, name: newname.trim()}, function(a,b) {
			if (b == 'success' && a == b) {
				foldertree.jstree("refresh");
				alert("成功！"); return;
			}
			else alert(a); return;
		}).fail(function() {
			alert("失败！"); return;
		})
	}
	function renamefolder() {
		if (!selectedItem) return;
		let location = selectedItem.id;
		if (location == 'allimages') {
			alert("您无法更改根文件夹。"); return;
		}
		let newname = prompt("您将在  “/" + location + "”  中添加新文件夹。 输入文件夹的名称。", "");
		if (!newname || newname.trim().length == 0) {
			alert("空名称。失败！"); return;
		}
		$.post("create_new_folder.php", {mode: 1, path: location, name: newname.trim()}, function(a,b) {
			if (b == 'success' && a == b) {
				foldertree.jstree("refresh");
				alert("成功！"); return;
			}
			else alert(a); return;
		}).fail(function() {
			alert("失败！"); return;
		})
	}
	function deletefolder() {
		if (!selectedItem) return;
		let location = selectedItem.id;
		if (location == 'allimages') {
			alert("您无法删除根文件夹。"); return;
		}
		if (!confirm("您确定要删除此文件夹吗？")) return;
		$.post("create_new_folder.php", {mode: 2, path: location, name: ""}, function(a,b) {
			if (b == 'success' && a == b) {
				foldertree.jstree("refresh");
				alert("成功！"); return;
			}
			else alert(a); return;
		}).fail(function() {
			alert("失败！"); return;
		})
	}
</script>
</html>
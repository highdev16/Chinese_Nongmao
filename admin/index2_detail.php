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
	
	<link href="css/dt.css" rel="stylesheet" />
	<link href="css/bs.css" rel="stylesheet" />
	<link href="css/app.css" rel="stylesheet">
	<link href="css/trumbowyg.min.css" rel="stylesheet">
	<link href="css/sweetalert.css" rel="stylesheet" />	
	
	<style>
        #sidebar * {
			font-size: 16px !Important;
		}
		* {
			font-size: 14px !Important;
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
		  .swal2-title {
			font-size: 1.875em !Important;
		}
		* {
			font-size: 14px !Important;
		}
		.swal2-container {
			z-index:99999 !important;
		}
	  </style>
	  <script src="js/app.js"></script>
	  <!-- <script src="js/jquery.1.12.4.js"></script> -->
	<script src="js/jquery.ui.min.js"></script>
	<script src="js/jquery.ui.touch-punch.min.js"></script>
	<script src='js/dt.js'></script>
<script src='js/bs.js'></script>
</head>

<body>
	<div class="wrapper">
		<?php include('sidebar.php'); ?>

		<div class="main">
			<?php include('nav.php'); ?>			

			<main class="content">				
				<div class="container-fluid p-0">
					<div class="row">
						<div style='float: left; width: 400px;'>					        
							<?php
								$db = getDbInstance();
								$banners = $db->query("select * from news where id = " . intval($_REQUEST["id"]));
								$no = 1;
								$text = '';
								$row = array();
								if (sizeof($banners) > 0) $row = $banners[0];
							?>
							<div style='float: left; width: 100px'>资讯标题</div>
							<div style='width: 350px'><input type='text' id='name' style='width: 250px'></div>														
                            <div style='height: 20px'></div>
                            <div style='float: left; width: 100px'>资讯作家</div>
							<div style='width: 350px'><input type='text' id='writer' style='width: 250px'></div>														
							<div style='height: 20px'></div>
							<div style='float: left; width: 100px'>类别</div>
                            <div style='width: 350px'><select id='category' style='width: 250px'><option value=1>农贸设计百科</option><option value=2>农贸新闻资讯</option>
										<option value=3>光影新闻动态</option><option value=4>运营案例</option></select></div>
							<div style='height: 10px'></div>
							<div style='float: left; width: 180px;line-height: 35px;'>最好的案例(1个在首页)</div>
							<div><input type='checkbox' id='goodone' style='width: 25px; height:25px'></div>
							<div style='height: 20px'></div>
							<div>内容</div>
							<div id='editor'>
								  <?php echo isset($row['content']) ? $row['content'] : ""; ?>
							</div>
					    </div>
						<div style='float:left; width: 420px'>
							<div>
								<label for='keywords' style='width: 100px; '>关键词</label>
								<textarea id='keywords' style='width: 300px'><?php if ($row['keywords'] != null) echo htmlspecialchars($row['keywords']); ?></textarea>
							</div>
							<div style='margin-top: 40px;'>
								<label for='description' style='width: 100px; '>描述</label>
								<textarea id='description' style='width: 300px'><?php if ($row['description'] != null) echo htmlspecialchars($row['description']); ?></textarea>
							</div>
						</div>
					</div>
					<div class='row'>
						<div style="clear: both; margin-top: 20px;">
					        <button type='button' onclick='submitForm()' id='submitButton' class='btn btn-primary'>修改</button>
						</div>
					</div>
				</div>
			</main>
			<input type='file' style='position: absolute; left: -10000px; top: -10000px' id='fileselect'>
		</div>
	</div>
	<script src='js/trumbowyg.min.js'></script>
	<script src='js/langs/zh_cn.min.js'></script>
	<script src='js/sweetalert.js'></script>
	<script>
	var data = <?php echo json_encode($row); ?>;
	$(document).ready(function() {
		$('#editor').trumbowyg({lang: 'zh_cn'});
		$("#name").val(data['title'] || "");
        $("#writer").val(data['writer'] || "");
		$("#category").val(data['category'] || "");
		$("#goodone").prop('checked', (data['goodone'] || 0) ? true : false);

		let buttonTimer = setInterval(function() {
			if ($("button.trumbowyg-insertImage-button")[0]) {
				$("button.trumbowyg-insertImage-button").on('click', function() {
					let enableTimer = setInterval(function() {
						if ($("input[name=url]")[0]) {
							$("input[name=url]").next().append(`<input type="button" name="ok" value="..." style="width: 50px;" onclick='BrowseImage()'>`);
							clearInterval(enableTimer);
						}
					}, 100);
				});
				clearInterval(buttonTimer);
			}
		}, 100);
		
	});

	function BrowseImage() {
		Swal.fire({
			title: "选择一个图片。",
			html: "<table id='imagetable' class='table table-striped table-bordered' style='min-width:700px; max-width:700px'><thead>" + 
					`<tr>
						<th style='width: 5%'>No</th>
						<th style='width: 20%'>图片</th>
						<th style='width: 20%'>文件名</th>
						<th style='width: 20%'>URL</td>
						<th style='width: 20%'>说明</td>
						<th style='width: 15%'></th>
					</tr></thead></table>`,
			width: 800
		})
		$("#imagetable").DataTable({
			"language": {
				"url": "js/chinese.json"
			},
			"ajax" : "index7_images.php",
			"lengthMenu": [[5, 10, 20, 50, 100, -1], [5, 10, 20, 50, 100, "看都"]],
			"pageLength" : 5
		});
	}

	function SelectImage(url) {
		$("input[name=url]").val(url);
		Swal.close();
	}

	function submitForm() {
		let counterror = 0;
		if ($("#name").val().trim().length == 0) {
			$("#name").css('border-color', 'red');
			counterror++;
		} else {
			$("#name").css('border-color', '');
		}
        if ($("#writer").val().trim().length == 0) {
			$("#writer").css('border-color', 'red');
			counterror++;
		} else {
			$("#writer").css('border-color', '');
		}

		if (counterror > 0) {
			alert("保存内容时出错。确认值。"); return;
		}
		$.post('save_news.php', {
				id: <?php echo intval($_REQUEST["id"]); ?>, 
				title: $("#name").val(),
                writer: $("#writer").val(),
				text: $("#editor").html(),
				category: $("#category").val(),
				keyword: $("#keywords").val(),
				description: $("#description").val(),
				goodone: $("#goodone")[0].checked ? 1 : 0,				
			}, function(a,b) {
			try {
				a = JSON.parse(a);
				if (a['result'] === 'success') {
					if (a['data'] > 0) {
                        alert("成功！");
						window.location.href = 'index2_detail.php?id=' + a['data'];
					} else {
						alert("保存内容时出错。确认值。");
					}
					return;
				}
			} catch (e) {

			}
			alert("保存内容时出错。");
		})
	}
	</script>
</body>
</html>
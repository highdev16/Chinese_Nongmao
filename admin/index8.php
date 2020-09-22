<?php
$ACTIVE = 8;
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

	<link href="css/app.css" rel="stylesheet">
	<link href="css/jquery.min.css" rel="stylesheet">
	<style>
		* {
			font-size: 14px !Important;
		}
		#sidebar * {
			font-size: 16px !Important;
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

<body>
	<div class="wrapper">
		<?php include('sidebar.php'); ?>

		<div class="main">
			<?php include('nav.php'); ?>			

			<main class="content">				
				<div class="container-fluid p-0">
					<div style='font-weight: bold; font-size: 120%'>旗帜图片</div>
					<div class="row">
						<div style='float: left; width: 100%;'>
					        <!-- List Images -->
					        <ul id="sortable" >
<?php
    $db = getDbInstance();
    $db->query("CREATE TABLE IF NOT EXISTS partners (id bigint auto_increment primary key, image text, morder int)");
	$banners = $db->query("select * from partners");
	$no = 1;
	if (sizeof($banners) > 0)
		foreach ($banners as $banner) {			
?>
					            <li class="ui-state-default" data-id="<?php echo $no; ?>" style='position: relative'>
			                        <img src="../banners/<?php echo $banner['image']; ?>" title="image <?php echo $no++; ?>" >
			                        <img src='../banners/close.png' style='position: absolute; right: -10px; width: 20px; height: 20px; top: -10px; cursor: pointer' onclick='$(this).parent().remove();'>
			                        <input type='hidden' name='field<?php echo $no - 1; ?>' value="<?php echo $banner['image']; ?>">
			                    </li> 
<?php 	} ?>
								<li class="imgplusbutton ui-state-default" data-id="<?php echo $no; ?>">+</li> 
			                </ul>
					    </div>
					    <div style="clear: both; margin-top: 20px;">
					        <input type='button' value='修改' onclick='submitForm()' id='submitButton'>
					    </div>
					</div>
				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-left">
							<p class="mb-0">
								<!-- <a href="index.html" class="text-muted"><strong>AdminKit Demo</strong></a> &copy; -->
							</p>
						</div>
						<div class="col-6 text-right">
							<ul class="list-inline">
								<li class="list-inline-item">
									<!-- <a class="text-muted" href="#">Support</a> -->
								</li>
								<li class="list-inline-item">
									<!-- <a class="text-muted" href="#">Help Center</a> -->
								</li>
								<li class="list-inline-item">
									<!-- <a class="text-muted" href="#">Privacy</a> -->
								</li>
								<li class="list-inline-item">
									<!-- <a class="text-muted" href="#">Terms</a> -->
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
			<input type='file' style='position: absolute; left: -10000px; top: -10000px' id='fileselect'>
		</div>
	</div>
	
	<script>
		var focusedImage = null;
		var totalCount = <?php echo sizeof($banners) + 1; ?>;
		$("#fileselect").change(function(e) {
		    for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {
		        var file = e.originalEvent.srcElement.files[i];
		        if ($(focusedImage).find('img').length == 0) {
		        	$(focusedImage).html(`<img src="" title="image ` + $(focusedImage).attr('data-id') + `" ><img src='../banners/close.png' style='position: absolute; right: -10px; width: 20px; height: 20px; top: -10px; cursor: pointer' onclick='$(this).parent().remove();'><input type='hidden' name='field` + (totalCount++) + `' value="">`);
		        	$(focusedImage).removeClass('imgplusbutton').css('position', 'relative');
		        	$(focusedImage).after(`<li class="imgplusbutton ui-state-default" data-id="` + ($(".ui-state-default").length + 1) + `">+</li>`);
		        }
		        var img = $(focusedImage).find("img:first-child");
		        var reader = new FileReader();
		        reader.onloadend = function() {
		            $(img).attr('src', reader.result);
		            $(focusedImage).find("input").val(reader.result);
                    focusedImage = null;
		        }
		        reader.readAsDataURL(file);		        		
		        $("#fileselect").val(null);
		        return;
		    }
		});		
		

		function submitForm() {
			let images = {};
			$("#submitButton").attr('disabled', 'disabled');
			$("#sortable li input[type='hidden']").each(function(ind, ele) {
				images["field" + ind] = (this.value);
			});
			$.post('savepartner.php', images, function(a,b) {
				if (a == b && b == 'success') {
					alert("成功");
				} else {
					alert("失败");
				}
				$("#submitButton").removeAttr('disabled');
			}).fail(function() {
				alert("失败");
				$("#submitButton").removeAttr('disabled');
			});
		}

		$(document).ready(function(){
			$("#sortable").on('click', 'li', function() {
				focusedImage = this;
				$("#fileselect").click();
			});
			// Initialize sortable
			$( "#sortable" ).sortable();
		});
    </script>

	
</body>

</html>
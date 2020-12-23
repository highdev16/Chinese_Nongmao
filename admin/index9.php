<?php
$ACTIVE = 9;
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
					<div style='font-weight: bold; font-size: 120%'>咨询的链接</div>
					<div class="row">
                        <input type='text' id='consultation' style='width:400px' value="<?php
                            if (file_exists('../api/consultation_link.txt')) {
                                $e = file_get_contents('../api/consultation_link.txt');
                                echo htmlspecialchars($e);
                            }
                        ?>">					        
					</div>
                    <div class='row'>
                        <input type='button' style='background-color: #3b7ddd; color: white; width: 80px; height: 30px; border:0px solid white' value='修改' onclick='submitForm()' id='submitButton'>
                    </div>
				</div>
			</main>

		</div>
	</div>
	
	<script>
        function submitForm() {
            $.post('/api/set-consultation.php', {t: $("#consultation").val()}, function(a,b) {
                if (a == b && b == 'success') alert("OK");
                else alert("失败！");
            });
        }
    </script>
</body>

</html>
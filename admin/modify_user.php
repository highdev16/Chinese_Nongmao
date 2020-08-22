<?php
$ACTIVE = 0;
session_start();
function get_value($array, $key, $default = '') {
	if (array_key_exists($key, $array)) return $array[$key];
	else return $default;
}

if (get_value($_SESSION, 'login') != 1 || get_value($_SESSION, 'username') == '' || get_value($_SESSION, 'nickname') == '') {
	header('location: login.php');
	exit;
}
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
	<style>
		/*csstable*/
.csstable {border:1px solid #C0C9D5;margin-bottom:8px;}
.csstable .t td{background:url(/images/v5/leftlist.png) left bottom repeat-x;font-weight:bold;border-bottom:1px solid #C0C9D5;}
.csstable .l{background:#F1F5FB;border-right:1px solid #C0C9D5;text-align:right;padding-right:3px;}
.csstable #tl,#tm,#tr{background:url(/images/v5/leftlist.png) left bottom repeat-x;font-weight:bold;border-bottom:1px solid #C0C9D5;}
.csstable #tl{background-position:left center;}
.csstable #tl,.csstable #tm,.csstable #tr{background-repeat:repeat-x!important;}
.csstable .tline{border-right:1px solid #C0C9D5;}
.csstable td{border-bottom:1px solid #DFE4EA;padding:4px 4px 4px 4px;}
.csstable .tdl{border-left:1px solid #eee;};
.csstable .sbar td{background:#f3f4f5;color:#000;font-weight:bold;border-bottom:1px solid #ccc;border-top:1px solid #ccc;}
.csstable u {color:#d00; text-decoration:none;} /*红*/
.csstable .w100 {width:99%;}
		ul.sidebar-nav li a.sidebar-link {
			font-size: 130%;
		}
	</style>
</head>

<body>
	<div class="wrapper">
		<?php include ("sidebar.php"); ?>

		<div class="main">
			<?php include ('nav.php'); ?>

			<main class="content">
				<div class="container-fluid p-0">
					<div class="row">
						<form action="modify_user_api.php" method="post">
							<div style="margin-bottom:10px">
								<div id="title" class="pageColor" style='font-weight: bold; font-size: 150%'> 修改资料</div>
								<div style='color:red'><?php echo get_value($_SESSION, 'changepwd_error'); ?></div>
								<table width="100%" border="0" cellspacing="0" cellpadding="0" class="csstable" style="font-size:12px">
									<tbody><tr>
									    <td align="right" class="l">用户名:</td>
									    <td align="left"><?php echo htmlspecialchars($_SESSION['username']); ?></td>
									</tr>
									<tr>
									    <td align="right" width="65" valign="top" class="l">当前密码:</td>
									    <td align="left" valign="top"><input id="adminpwd" name="adminpwd" size="30" class="txt" type="password"><br>
										<span style="color:#666666">*如不修改请留空,6-20位英文数字</span></td>
									</tr>
									<tr>
									    <td align="right" width="65" valign="top" class="l">新密码:</td>
									    <td align="left" valign="top"><input id="adminpwd1" name="adminpwd_new" size="30" class="txt" type="password"><br>
										<span style="color:#666666">*如不修改请留空,6-20位英文数字</span></td>
									</tr>
									<tr>
									    <td align="right" width="65" valign="top" class="l">确认密码:</td>
									    <td align="left" valign="top"><input id="adminpwd2" name="adminpwd_confirm" size="30" class="txt" type="password"><br>
										<span style="color:#666666">*如不修改请留空,6-20位英文数字</span></td>
									</tr>
									<tr>
									    <td align="right" class="l">昵称:</td>
									    <td align="left"><input id="nickname" name="nickname" size="30" class="txt" type="text" value="<?php echo htmlspecialchars($_SESSION['nickname']); ?>"></td>
									</tr>
									</tbody></table>
								<div style="margin-left:80px">
								<input type="submit" value="修改" class="btv5">
								&nbsp;
								<input type="button" onclick="top.location.reload();" value="返回">
								</div>
							</div>
						</form>
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
		</div>
	</div>
	<script src="js/vendor.js"></script>
	<script src="js/app.js"></script>
</body>

</html>
<?php $_SESSION['changepwd_error'] = ''; ?>
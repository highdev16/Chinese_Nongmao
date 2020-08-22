<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') exit;
session_start();
function get_value($array, $key, $default = '') {
	if (array_key_exists($key, $array)) return $array[$key];
	else return $default;
}
if (get_value($_SESSION, 'login') != 1) {
	header('location: login.php');
	exit;
}

if (strcmp($_REQUEST['adminpwd_new'], $_REQUEST['adminpwd_confirm'])) {
	$_SESSION['changepwd_error'] = "密码不匹配。";
	header('location: modify_user.php');
	exit;
}
if (strlen($_REQUEST['adminpwd_new']) < 6) {
	$_SESSION['changepwd_error'] = "密码太短。";
	header('location: modify_user.php');
	exit;	
}
include ('config.php');

$db = getDbInstance();

$username = $db->escape($_SESSION['username']);
$nickname = $db->escape($_REQUEST['nickname']);
$password = md5($_REQUEST['adminpwd']);
$newpassword = md5($_REQUEST['adminpwd_new']);

$users = $db->query("select * from admin_users where username like '$username' and password like '$password'");
if (sizeof($users) == 1) {
	$d = $db->query("update admin_users set password='$newpassword', nickname='$nickname' where username like '$username'");
	header('location: index.php');
	exit;
} else {
	$_SESSION['changepwd_error'] = "无效的密码。";
	header('location: modify_user.php');
}

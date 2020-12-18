<?php
session_start();
function get_value($array, $key, $default = '') {
	if (array_key_exists($key, $array)) return $array[$key];
	else return $default;
}
if (get_value($_SESSION, 'login') == 1) {
	header('location: index.php');
	exit;
}

include ('config.php');

$db = getDbInstance();

$username = $db->escape($_REQUEST['username']);
$password = md5($_REQUEST['password']);
if (!strcmp(strtolower(get_value($_SESSION, 'captcha_text')), strtolower($_REQUEST['code']))) {
	$users = $db->query("select * from admin_users where username='$username' and lower(password)=lower('$password')");
	if (sizeof($users) > 0) {
		$_SESSION['login'] = 1;
		$_SESSION['username'] = $users[0]['username'];
		$_SESSION['nickname'] = $users[0]['nickname'];
		header('location: index.php');
	} else {
		$_SESSION['login'] = 0;
		$_SESSION['username'] = $_SESSION['nickname'] = "";
		header('location: login.php');
	}
} else {
	$_SESSION['login'] = 0;
	$_SESSION['username'] = $_SESSION['nickname'] = "";
	header('location: login.php');
}
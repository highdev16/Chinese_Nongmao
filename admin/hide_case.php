<?php
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

$db = getDbInstance();
if (isset($_REQUEST['id'])) {
    $db->rawQuery("update cases set hidden={$_REQUEST['hiddenValue']} where id={$_REQUEST['id']}");
    echo 'success' ;exit;
} else echo json_encode(array('result'=>'error'));
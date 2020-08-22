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
if (isset($_REQUEST['del_id'])) {
    $db->rawQuery("delete from consultation where id=" . intval($_REQUEST['del_id']));
    echo 'success' ;exit;
} 
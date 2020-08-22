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
    $db->rawQuery("delete from links where id=" . intval($_REQUEST['del_id']));
    echo 'success' ;exit;
}

$db->rawQuery("insert into links(url,title) values(?,?)",
array($_REQUEST['url'], $_REQUEST['title']));
$id = $db->getInsertId();

echo json_encode(array('result' => 'success', 'data' => array('url' => $_REQUEST['url'], 'id' => $id, 'title' => htmlspecialchars($_REQUEST['title']))));
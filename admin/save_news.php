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
    $db->rawQuery("delete from news where id=" . intval($_REQUEST['del_id']));
    echo 'success' ;exit;
} else if (!isset($_REQUEST['id'])) exit;
$id = intval($_REQUEST['id']);
$text = $_REQUEST['text'];

if ($id < 0) {
    $db->rawQuery("insert into news(title,category,browse,content,created_time,writer,goodone) values(?,?,?,?,?,?,?)",
    array($_REQUEST['title'],$_REQUEST['category'],0,$_REQUEST['text'], time(), $_REQUEST['writer'], $_REQUEST['goodone']));
    $id = $db->getInsertId();
} else {
    $db->rawQuery("update news set title=?,category=?,browse=0,content=?,writer=?, goodone=? where id = $id",
    array($_REQUEST['title'], $_REQUEST['category'],$_REQUEST['text'], $_REQUEST['writer'], $_REQUEST['writer']));
}

echo json_encode(array('result' => 'success', 'data' => $id));
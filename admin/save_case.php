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
    $db->rawQuery("delete from cases where id=" . intval($_REQUEST['del_id']));
    echo 'success' ;exit;
} else if (!isset($_REQUEST['id'])) exit;
$id = intval($_REQUEST['id']);
$text = $_REQUEST['text'];

if ($id < 0) {
    $db->rawQuery("insert into cases(name,stars,areas,project_style,service_time,location,category,browse,content,created_date,goodone,keywords,description,title) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)",
    array($_REQUEST['name'], $_REQUEST['stars'], $_REQUEST['areas'], $_REQUEST['project_style'],$_REQUEST['service_time'],$_REQUEST['location'],$_REQUEST['category'],0,$_REQUEST['text'], time(), $_REQUEST['goodone'], $_REQUEST['keywords'], $_REQUEST['description'], $_REQUEST['title']));
    $id = $db->getInsertId();
} else {
    $db->rawQuery("update cases set name=?,stars=?,areas=?,project_style=?,service_time=?,location=?,category=?,browse=0,content=?,goodone=?,keywords=?,description=?,title=? where id = $id",
    array($_REQUEST['name'], $_REQUEST['stars'], $_REQUEST['areas'], $_REQUEST['project_style'],$_REQUEST['service_time'],$_REQUEST['location'],$_REQUEST['category'],$_REQUEST['text'], $_REQUEST['goodone'], $_REQUEST['keywords'], $_REQUEST['description'], $_REQUEST['title']));
}
$result = file_get_contents("http://localhost:8080/generatecase/$id/{$_REQUEST['category']}");
echo json_encode(array('result' => 'success', 'data' => $id));
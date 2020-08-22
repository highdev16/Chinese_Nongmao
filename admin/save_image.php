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
    $img = $db->rawQuery("select * from images where id=" . intval($_REQUEST['del_id']));
    if (sizeof($img) == 0) {echo 'success'; exit;}
    if (file_exists('..' . $img[0]['url'])) unlink('..' . $img[0]['url']);    
    $db->rawQuery("delete from images where id=" . intval($_REQUEST['del_id']));
    echo 'success' ;exit;
} else if (!isset($_REQUEST['id'])) exit;

$id = intval($_REQUEST['id']);

if ($id < 0) {
    $url = '/img/customs/' . time(). ".jpg";
    move_uploaded_file($_FILES['image']['tmp_name'], '..' . $url);
    $db->rawQuery("insert into images(url,description,filename) values(?,?,?)",
    array($url, $_REQUEST['description'], $_FILES['image']['name']));
    $id = $db->getInsertId();
}

echo json_encode(array('result' => 'success', 'data' => array('url' => $url, 'id' => $id, 'filename' => $_FILES['image']['name'], 'description' => htmlspecialchars($_REQUEST['description']))));
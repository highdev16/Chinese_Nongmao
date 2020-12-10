<?php
session_start();
include('../N1/dbconfig.php');
$db = getDbInstance();
$data = $_REQUEST['data'];
if (!array_key_exists('data', $_REQUEST)) exit;
if ($_REQUEST['c'] == $_SESSION['captcha_text']) {
    $db->rawQuery("insert into consultation(name,email,message,customdata) values(?,?,?,?)", array($data['name'], $data['email'], $data['message'], 
    (array_key_exists('type', $data) && is_array($data['type'])) ? 
    "我需要： （可多选)  ->  " . implode(',', $data['type']) : "" ));
    if ($db->getInsertId() > 0) echo 'success';
} else echo 'caperror';
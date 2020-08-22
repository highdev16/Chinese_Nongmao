<?php
include('../N1/dbconfig.php');
$db = getDbInstance();
$data = $_REQUEST['data'];
$db->rawQuery("insert into consultation(name,email,message,customdata) values(?,?,?,?)", array($data['name'], $data['email'], $data['message'], 
is_array($data['type']) ? 
"我需要： （可多选)  ->  " . implode(',', $data['type']) : "" ));
if ($db->getInsertId() > 0) echo 'success';
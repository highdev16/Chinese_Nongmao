<?php
if ($_SERVER['REQUEST_METHOD'] != 'GET') exit;
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

$rows = $db->query("show tables");
$tmpFolder = '/tmp/' . date('Y-m-d') . '/';
if (!file_exists($tmpFolder)) mkdir($tmpFolder);
for ($i = 0; $i < sizeof($rows); $i++) {    
    $tableName = $rows[$i]['Tables_in_nongmao'];
    $backup_file = $tmpFolder . $tableName . '.sql';
    $db->rawQuery("select * into OUTFILE '$backup_file' from $tableName");
}

echo 'success';
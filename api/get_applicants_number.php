<?php
include('../N1/dbconfig.php');
$db = getDbInstance();
$initVal = file_get_contents("consult_initvalue.txt");
$info = $db->rawQuery("select count(id) as `c` from consultation");

echo json_encode(array('data' => intval($initVal) + $info[0]['c'], 'result' => 'success'));
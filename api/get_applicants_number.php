<?php
include('../N1/dbconfig.php');
$db = getDbInstance();
$info = $db->rawQuery("select count(id) as `c` from consultation");

echo json_encode(array('data' => $info[0]['c'], 'result' => 'success'));
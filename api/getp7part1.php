<?php
include ("../N1/dbconfig.php");
$db = getDbInstance();
$data = $db->rawQuery("select * from cases where category=" . intval($_REQUEST['category']) . " and id != {$_REQUEST['caseIndex']} order by created_date desc limit 0, 3");
echo json_encode(array('result' => 'success', 'data' => $data));
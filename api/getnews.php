<?php
header('Content-Type: application/json');
include('../N1/dbconfig.php');
$db = getDbInstance();
$pageTotal = $db->rawQuery("SELECT count(id) as co FROM news where category = " . intval($_REQUEST['category']));
$pageTotal = $pageTotal[0]['co'];

$pageNum = 15;
$pageIndex = $_REQUEST['pageNumber'];
$query = "SELECT * FROM news WHERE category = " . intval($_REQUEST['category']) . " ORDER BY created_time DESC LIMIT " . ($pageIndex * $pageNum) . ", " . $pageNum;
$rows = $db->rawQuery($query);

echo json_encode(array('result' => 'success', 'length' => $pageTotal, 'items' => $rows));
  
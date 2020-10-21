<?php
header('Content-Type: application/json');
include('../N1/dbconfig.php');
$db = getDbInstance();
$pageTotal = $db->rawQuery("SELECT count(id) as co FROM cases where category = " . intval($_REQUEST['category']));
$pageTotal = $pageTotal[0]['co'];
$rows = $db->rawQuery($query);
$pageNum = 15;
$pageIndex = $_REQUEST['pageNumber'];
$mode = $_REQUEST['sort'];
switch ($mode) {
    case 1: $query = "SELECT * FROM cases WHERE category = " . intval($_REQUEST['category']) . " ORDER BY created_date DESC LIMIT " . ($pageIndex * $pageNum) . ", " . $pageNum; break;
    case 2: $query = "SELECT * FROM cases WHERE category = " . intval($_REQUEST['category']) . "  ORDER BY browse DESC LIMIT " . ($pageIndex * $pageNum) . ", " . $pageNum; break;
    case 3: $query = "SELECT * FROM cases WHERE category = " . intval($_REQUEST['category']) . "  ORDER BY stars DESC LIMIT " . ($pageIndex * $pageNum) . ", " . $pageNum; break;
    default: exit;
}
$rows = $db->rawQuery($query);

echo json_encode(array('result' => 'success', 'length' => $pageTotal, 'items' => $rows));
  
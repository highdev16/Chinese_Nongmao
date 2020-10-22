<?php
include ("../N1/dbconfig.php");
$db = getDbInstance();
$data = $db->rawQuery("select * from cases where id in (select max(id) from cases where category != " . intval($_REQUEST['category']) . " group by category) order by category");
if (array_key_exists('increase', $_REQUEST) && $_REQUEST['increase'] == 1) {
    $db->rawQuery("update cases set browse = browse + 1 where id = " . intval($_REQUEST['caseIndex']));
}
echo json_encode(array('result' => 'success', 'data' => $data));
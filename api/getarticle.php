<?php
include('../N1/dbconfig.php');
$db = getDbInstance();
if (!isset($_REQUEST['r'])) {  
  exit;
}
$caseIndex = intval($_REQUEST['r']);
$db->rawQuery("update news set browse = browse + 1 where id = $caseIndex");
$info = $db->rawQuery("select * from news where category in (select category from news where id = $caseIndex)");
if (sizeof($info) == 0) {
  header('location: /N1/p1.php');
  exit;
}
$categoryArr = array('', '农贸设计百科', '农贸新闻资讯', '光影新闻动态', '政府政策文件'， "农贸培训周刊");
$row = null;
$prev = null;
$next = null;

for ($index = sizeof($info) - 1; $index >= 0; $index--) {
    if ($info[$index]['id'] == $caseIndex) {
        if ($index > 0) $prev = $info[$index - 1];
        if ($index < sizeof($info) - 1) $next = $info[$index + 1];
        $row = $info[$index]; break;
    }
}

if ($row == null) {
    header('location: /N1/p1.php');
    exit;
}

// $temp = $row['content'];
// $imageURLs = array();

// while (strlen($temp) > 0) {
//   $r = strpos($temp, '<img');
//   if ($r !== FALSE) {
//     $d = strpos(substr($temp, $r + 4), 'src=') + $r + 9;
//     $r = strpos(substr($temp, $d + 10), '"') + $d + 10;
//     $imageURLs[] = substr($temp, $d, $r - $d);    
//     $temp = substr($temp, $r);
//   } else break;
// }

echo json_encode(array('result' => 'success', 'data' => array(
    'prev' => $prev == null ? null : array('id' => $prev['id'], 'title' => $prev['title'], 'category' => $prev['category']),
    'next' => $next == null ? null : array('id' => $next['id'], 'title' => $next['title'], 'category' => $next['category']),
    'category' => array('id' => $row['category'], 'title' => $categoryArr[$row['category']]),
    'row' => $row
)));
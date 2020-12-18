<?php
include('config.php');
$categoryArr = array('', '室内设计', '建筑设计', '5G智能设计', '运营案例');
$db = getDbInstance();
$rows = $db->rawQuery("select id,name,stars,hidden,category,location,content,goodone from cases order by id desc");
$result = array();
for ($i = 0; $i < sizeof($rows); $i++) {									
    $ab = array();

    $ab[] =  $i + 1;
    //<td style='width: 20%; cursor:pointer' onclick="window.location.href='index1_detail.php?id=<?php echo $rows[$i]['id']; 
    $ab[] = htmlspecialchars($rows[$i]['name']);
    $ab[] = $rows[$i]['stars'];
    $ab[] = $categoryArr[$rows[$i]['category']];
    $ab[] = htmlspecialchars($rows[$i]['location']);
    $ab[] = ($rows[$i]['created_date']);
    $ab[] = substr_count(strtolower($rows[$i]['content']), '<img ');
    $ab[] = $rows[$i]['goodone'] ? "<input type='checkbox' checked disabled onclick='setBestOne({$rows[$i]['id']})'>" : '';
    $ab[] = $rows[$i]['hidden'] ? "<input type='checkbox' checked onclick='setHidden({$rows[$i]['id']},this)'>" : "<input type='checkbox' onclick='setHidden({$rows[$i]['id']}, this)'>";
    $ab[] = "<button type='button' onclick=\"window.location.href='index1_detail.php?id={$rows[$i]['id']}';\" class='btn btn-success' style='float:left; margin-right: 20px;'>编辑</button><button type='button' onclick='deleteThis({$rows[$i]['id']})' class='btn btn-danger' style='float:left'>删除</button>";
    $result[] = $ab;
} 

echo json_encode(array('data' => $result));
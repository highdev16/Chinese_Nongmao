<?php
include('config.php');
$categoryArr = array('', '农贸设计百科', '农贸新闻资讯', '光影新闻动态', '政府政策文件');
$db = getDbInstance();
$rows = $db->rawQuery("select * from news order by id desc");
$result = array();
for ($i = 0; $i < sizeof($rows); $i++) {									
    $ab = array();

    $ab[] =  $i + 1;
    $ab[] = htmlspecialchars($rows[$i]['title']);
    $ab[] = $categoryArr[$rows[$i]['category']];
    $ab[] = substr_count(strtolower($rows[$i]['content']), '<img ');
    $ab[] = $rows[$i]['goodone'] ? "<input type='checkbox' checked disabled onclick='setBestOne({$rows[$i]['id']})'>" : '';
    $ab[] = "<button type='button' onclick=\"window.open('index2_detail.php?id={$rows[$i]['id']}', '_blank');\" class='btn btn-success' style='float:left; margin-right: 20px;'>编辑</button><button type='button' onclick='deleteThis({$rows[$i]['id']})' class='btn btn-danger' style='float:left'>删除</button>";
    $result[] = $ab;
} 

echo json_encode(array('data' => $result));
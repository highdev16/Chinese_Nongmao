<?php
include('config.php');
$db = getDbInstance();
$rows = $db->rawQuery("select * from images");
$result = array();
for ($i = 0; $i < sizeof($rows); $i++) {									
    $ab = array();

    $ab[] =  $i + 1;
    //<td style='width: 20%; cursor:pointer' onclick="window.location.href='index1_detail.php?id=<?php echo $rows[$i]['id']; 
    $ab[] = "<img src='" . $rows[$i]['url'] . "' style='width:100%; max-height: 100px;'>";
    $ab[] = $rows[$i]['filename'];
    $ab[] = $rows[$i]['url'];
    $ab[] = htmlspecialchars($rows[$i]['description']);    
    $ab[] = "<button type='button' class='btn btn-success' onclick='SelectImage(\"{$rows[$i]['url']}\")'>选择</button>";
    $result[] = $ab;
} 

echo json_encode(array('data' => $result));
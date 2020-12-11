<?php

if (!array_key_exists('path', $_REQUEST)) {
    echo json_encode(array('data' => array())); exit;
}
$path = $_REQUEST['path'];
function listFolderFiles($dir){
    $ffs = scandir("../" . $dir);

    unset($ffs[array_search('.', $ffs, true)]);
    unset($ffs[array_search('..', $ffs, true)]);

    // prevent empty ordered elements
    if (count($ffs) < 1)
        return array();

    $retVal = array();
    $no = 0;
    foreach($ffs as $ff){
        if(is_dir("../" . $dir.'/'.$ff)) continue;
        if (substr($ff, strlen($ff) - 13, 13) == '.jpgthumb.jpg') continue;
        if (substr($ff, strlen($ff) - 5, 5) == '.jpgt') continue;
        $retVal[] = array(
            ++$no, 
            "<img src='../$dir/{$ff}thumb.jpg' style='height: 50px; width: 100%'>", 
            file_exists('../' . $dir.'/'. $ff . "t") ? file_get_contents('../' . $dir.'/'. $ff . "t") : $ff,
            '/' . $dir.'/'. $ff, 
            "<button type='button' class='btn btn-success' onclick='SelectImage(\"../$dir/{$ff}\")'>选择</button>");
    }    
    return $retVal;
}

echo json_encode(array('data' => listFolderFiles($path)));

// include('config.php');
// $db = getDbInstance();
// $rows = $db->rawQuery("select * from images");
// $result = array();
// for ($i = 0; $i < sizeof($rows); $i++) {									
//     $ab = array();

//     $ab[] =  $i + 1;
//     //<td style='width: 20%; cursor:pointer' onclick="window.location.href='index1_detail.php?id=<?php echo $rows[$i]['id']; 
//     $ab[] = "<img src='" . $rows[$i]['url'] . "' style='width:100%; max-height: 100px;'>";
//     $ab[] = $rows[$i]['filename'];
//     $ab[] = $rows[$i]['url'];
//     $ab[] = htmlspecialchars($rows[$i]['description']);    
//     $ab[] = "<button type='button' class='btn btn-success' onclick='SelectImage(\"{$rows[$i]['url']}\")'>选择</button>";
//     $result[] = $ab;
// } 

// echo json_encode(array('data' => $result));
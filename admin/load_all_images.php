<?php
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
        $retVal[] = array(
            ++$no, 
            "<img src='../$dir/{$ff}thumb.jpg' style='height: 80px; max-width: 80%'>", 
            '/' . $dir.'/'. $ff, 
            isset($_REQUEST['mode']) ? "<button type='button' onclick='SelectImage(\"/$dir/$ff\")' class='btn btn-success'>选择</button>" : "<button type='button' onclick='deleteThis(\"../$dir/$ff\")' class='btn btn-danger'>删除</button>"
        ); 
    }    
    return $retVal;
}

echo json_encode(array('data' => listFolderFiles($path)));
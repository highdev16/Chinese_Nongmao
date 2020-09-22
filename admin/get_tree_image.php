<?php
function listFolderFiles($dir){
    $ffs = scandir("../" . $dir);

    unset($ffs[array_search('.', $ffs, true)]);
    unset($ffs[array_search('..', $ffs, true)]);

    // prevent empty ordered elements
    $retVal = array();
    $retVal['id'] = $dir;
    $retVal['text'] = basename($dir);
    $retVal['children'] = array();
    if (count($ffs) < 1)
        return $retVal;

    foreach($ffs as $ff){
        if(is_dir("../" . $dir.'/'.$ff)) $retVal['children'][] = listFolderFiles($dir.'/'.$ff);        
    }
    return $retVal;
}
header('Content-Type: text/json');
echo json_encode(listFolderFiles("allimages"));
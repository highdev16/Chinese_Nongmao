<?php
function delTree($dir) {
    $files = array_diff(scandir($dir), array('.','..'));
    foreach ($files as $file) {
        if (is_dir("$dir/$file")) 
            delTree("$dir/$file"); 
        else unlink("$dir/$file");
    }
    return rmdir($dir);
}
$foldername = $_REQUEST['name'];
if (!isset($_REQUEST['mode']) && mkdir("../" . $_REQUEST['path'] . "/" . $foldername)) echo 'success';
else if ($_REQUEST['mode'] == 1 && rename("../" . $_REQUEST['path'], dirname("../" . $_REQUEST['path']) . "/" . $_REQUEST['name']))  echo 'success';
else if ($_REQUEST['mode'] == 2 && substr($_REQUEST['path'], 0, 9) == 'allimages' && delTree("../" . $_REQUEST['path'])) echo 'success';
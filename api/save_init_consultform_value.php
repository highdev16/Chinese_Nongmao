<?php
if ($_REQUEST['method'] == 'save') {
    file_put_contents("consult_initvalue.txt", $_REQUEST['value'] . "");
    echo 'success';
} else if ($_REQUEST['method'] == 'load') {
    $initVal = file_get_contents("consult_initvalue.txt");
    echo "success";
    echo $initVal;
}
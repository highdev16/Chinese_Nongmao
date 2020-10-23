<?php
if (array_key_exists('data', $_REQUEST) && sizeof(array_keys($_REQUEST['data'])) == 27) {}
else exit;
file_put_contents("../title_description_keywords.txt", json_encode($_REQUEST['data']));
file_get_contents("http://localhost:8080/generatestaticpages");
echo 'success';
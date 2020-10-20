<?php
$data = explode(PHP_EOL, file_get_contents('../N1/header.php'));
$data[14] = '   <meta name="keywords" content="' . addslashes($_REQUEST['keywords']) . '">';
$data[15] = '   <meta name="description" content="' . addslashes($_REQUEST['description']) . '">';
file_put_contents('../N1/header.php', implode(PHP_EOL, $data));
echo 'success';
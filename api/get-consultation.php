<?php
if (!file_exists('consultation_link.txt')) exit;
$e = file_get_contents('consultation_link.txt');
echo json_encode(array('result' => 'success', 'link' => $e));
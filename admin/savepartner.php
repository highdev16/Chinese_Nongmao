<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') exit;
session_start();
function get_value($array, $key, $default = '') {
	if (array_key_exists($key, $array)) return $array[$key];
	else return $default;
}
if (get_value($_SESSION, 'login') != 1) {
	header('location: login.php');
	exit;
}

include ('config.php');

$db = getDbInstance();

$db->query("truncate partners");

$allImages = array();
foreach ($_REQUEST as $key => $value) {
	if (substr($key, 0, 5) == 'field') {
		$allImages[intval(substr($key, 5))] = $value;
	}
}

$filenames = array();
foreach ($allImages as $key => $value) {
	if ($value[0] == 'd') {
		$content = explode(',', $value);
		$content = base64_decode($content[1]);
		$filename = "b" . date("Y-m-d-H-i-s") . rand(0, 99999999) . ".jpg";
		$d = file_put_contents("../banners/$filename", $content);
		if ($d === false) {
			echo "Creating file..." . "../banners/$filename"; continue;
		}
		$filenames[] = $filename;
	} else $filenames[] = $value;
}

if (sizeof($filenames) > 0) {
	foreach ($filenames as $key => $value) {
		$filenames[$key] = "('$value', 0)";
	}

	$filenames = implode(',', $filenames);
	$db->query("insert into partners(image, morder) values $filenames");
}

echo 'success';
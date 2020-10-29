<?php
ini_set('memory_limit', '-1');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
function make_thumb($src, $dest, $desired_height) {

    /* read the source image */
    $filetype = exif_imagetype($src);
    echo "filetype : $filetype";
    if ($filetype == 2)
        $source_image=imagecreatefromjpeg($src);
    else if ($filetype == 3)
        $source_image=imagecreatefrompng($src);
    else if ($filetype == 1)
        $source_image=imagecreatefromgif($src);
    else if ($filetype == 6)
        $source_image=imagecreatefrombmp($src);
    else {
        unlink($src); echo 1;
        exit;
    }
    
    $width = imagesx($source_image);
    $height = imagesy($source_image);

    /* find the "desired height" of this thumbnail, relative to the desired width  */
    $desired_width = floor($width * ($desired_height / $height));

    /* create a new, "virtual" image */
    $virtual_image = imagecreatetruecolor($desired_width, $desired_height);

    /* copy source image at a resized size */
    imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);

    /* create the physical thumbnail image to its destination */
    imagejpeg($virtual_image, $dest);
}

function get_value($array, $key, $default = '') {
	if (array_key_exists($key, $array)) return $array[$key];
	else return $default;
}

if (get_value($_SESSION, 'login') != 1) {
	header('location: login.php');
	exit;
}
if (isset($_REQUEST['del_id'])) {
    if (substr($_REQUEST['del_id'], 0, 13) == '../allimages/') {
        if (unlink($_REQUEST['del_id'])) {
            unlink($_REQUEST['del_id'] . "thumb.jpg");
            echo 'success'; exit;
        }
    }    
    exit;
} else if (!isset($_REQUEST['id'])) exit;

$id = intval($_REQUEST['id']);
echo 0;
if ($id < 0) {
    $url = $_REQUEST['path'];
    echo 1;
    if (substr("../" . $_REQUEST['path'], 0, 13) == '../allimages/' || $_REQUEST['path'] == 'allimages') {
        echo 2;
        $t = time();
        if (move_uploaded_file($_FILES['image']['tmp_name'], '../' . $url . "/"  . $t . ".jpg")) {
            echo 3;
            make_thumb('../' . $url . "/"  . $t . ".jpg", '../' . $url . "/"  . $t . ".jpgthumb.jpg", 80);
            echo 'success'; exit;
        }
    }
}

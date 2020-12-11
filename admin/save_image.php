<?php
ini_set('memory_limit', '-1');
session_start();
function get_image_type ( $filename ) {
    $img = getimagesize( $filename );
    if ( !empty( $img[2] ) )
        return image_type_to_mime_type( $img[2] );
    return false;
}
function make_thumb($src, $dest, $desired_height) {

    /* read the source image */
    $filetype = get_image_type($src);
    
    if (strpos($filetype, "jpeg") !== FALSE || strpos($filetype, "jpg") !== FALSE)
        $source_image=imagecreatefromjpeg($src);
    else if (strpos($filetype, "png") !== FALSE)
        $source_image=imagecreatefrompng($src);
    else if (strpos($filetype, "gif") !== FALSE)
        $source_image=imagecreatefromgif($src);
    else if (strpos($filetype, "bmp") !== FALSE)
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
            if (file_exists($_REQUEST['del_id'] . "thumb.jpg")) 
                unlink($_REQUEST['del_id'] . "thumb.jpg");
            echo 'success'; exit;
        }
    }    
    exit;
} else if (!isset($_REQUEST['id'])) exit;

$id = intval($_REQUEST['id']);
if ($id < 0) {
    $url = $_REQUEST['path'];
    if (substr("../" . $_REQUEST['path'], 0, 13) == '../allimages/' || $_REQUEST['path'] == 'allimages') {
        $ts = time();
        $count = 0;
        for ($i = 0; $i < sizeof($_FILES['image']); $i++) {
            $t = $ts . "$i";
            if (move_uploaded_file($_FILES['image']['tmp_name'][$i], '../' . $url . "/"  . $t . ".jpg")) {
                make_thumb('../' . $url . "/"  . $t . ".jpg", '../' . $url . "/"  . $t . ".jpgthumb.jpg", 80);
                file_put_contents('../' . $url . "/"  . $t . ".jpgt", $_FILES['image']['name'][$i]);
                $count++;
            }
        }
        echo "success$count"; exit;
    }
}

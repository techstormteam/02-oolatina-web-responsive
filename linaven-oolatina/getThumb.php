<?php

include "class/image_api.php";
$filename = $_REQUEST['filename'];
$width = $_REQUEST['width'];
$height = $_REQUEST['height'];

$imgapi = new image_api();
$imgapi->loadImage($filename);
$imgapi->respectRatioResize2($width,$height,'jpg');

?>
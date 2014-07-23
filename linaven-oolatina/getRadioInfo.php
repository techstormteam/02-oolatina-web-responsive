<?php

$flux = $_REQUEST['flux'];
$width = $_REQUEST['width'];
$height = $_REQUEST['height'];

$data = file_get_contents("http://webradio.oolatina.com/getInfoFlux.php?flux=$flux&command=getRadioMobileInfo2&width=$width&height=$height");
echo $data;
exit;

$cover = file_get_contents("http://webradio.oolatina.com/getInfoFlux.php?flux=$flux&command=getCover");
$cover = str_replace('<img src="','',$cover);
$cover = str_replace('" width=110 height=110>','',$cover);
if($cover == 'images/no_cover.png')
{
	$cover = 'http://webradio.oolatina.com/images/no_cover.png';
}
$array['cover'] = $cover;

$title = file_get_contents("http://webradio.oolatina.com/getInfoFlux.php?flux=$flux&command=getTitleMobile");
$array['song_artist'] = utf8_encode($title);

$json = json_encode($array);
echo $json;

?>
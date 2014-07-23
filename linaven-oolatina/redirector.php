<?php 

$link = $_REQUEST['link'];
$link = explode("/",$link);
$nlink = $link[count($link)-1];

header("Location: http://www.oolatina.com/videos-$nlink-full.html");

?> 
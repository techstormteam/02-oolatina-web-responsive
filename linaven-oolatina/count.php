<?php

include "config.php";

if(isset($_GET['uo'])) {
$current_time = time();
//connect to database
include "config.php";
//create database table if not exist
$sql = "CREATE TABLE IF NOT EXISTS `users_online` (
   `id` int(11) unsigned NOT NULL auto_increment,
   `session_id` varchar(40) NOT NULL default '',
   `last_seen` varchar(20) NOT NULL default '',
   PRIMARY KEY  (`id`)
   ) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
mysql_query($sql);


//alter mysql table if it becomes overflow
$alter = mysql_query("SELECT * FROM users_online");
$at_id = mysql_fetch_assoc($alter);
if($at_id['id'] > 9999) {
mysql_query("TRUNCATE `users_online`",$conn) or mysql_error();
}

//delete offline users
$dt_time = time()-60*5;
mysql_query("DELETE from users_online where last_seen < '".$dt_time."'") or mysql_error();


//create a unique session id
$query = mysql_query("SELECT * FROM users_online");
$row_id = mysql_fetch_assoc($query);
$session_id = sha1($row_id['id']);

//select a user by session id
if(isset($_COOKIE['_ses_id'])) {
$sess = $_COOKIE['_ses_id'];
$chk_session = mysql_query("SELECT * from users_online where session_id = '".$sess."'");
if(mysql_num_rows($chk_session) > 0) {
mysql_query("UPDATE users_online SET last_seen = '".$current_time."'  WHERE session_id = '".$sess."'") or mysql_error();
setcookie("_ses_id", $session_id, time()+60*5, "/");
} else {
mysql_query("insert into users_online(session_id,last_seen) values('$session_id','$current_time')") or mysql_error();
setcookie("_ses_id", $session_id, time()+60*5, "/");
}
} else {
mysql_query("insert into users_online(session_id,last_seen) values('$session_id','$current_time')") or mysql_error();
setcookie("_ses_id", $session_id, time()+60*5, "/");
}

//finally print the online user number
$l = mysql_query("SELECT COUNT(id) AS id FROM `users_online`");
$x = mysql_fetch_array($l, MYSQL_ASSOC);
echo $x['id'];
}

//decode json from url
$url="http://webradio.oolatina.com/getInfoFlux.php?command=getStatInformation";
$json = file_get_contents($url);
$obj = json_decode($json);
if(isset($_GET['ec'])) 
{
	$SQL = "SELECT COUNT(*) FROM event";
	$reponse = mysql_query($SQL);
	$req = mysql_fetch_array($reponse);
	echo $req[0];
}
if(isset($_GET['pc'])) 
{
	$SQL = "SELECT COUNT(*) FROM photo";
	$reponse = mysql_query($SQL);
	$req = mysql_fetch_array($reponse);
	echo $req[0];
}
if(isset($_GET['vc'])) 
{
	$SQL = "SELECT COUNT(*) FROM video";
	$reponse = mysql_query($SQL);
	$req = mysql_fetch_array($reponse);
	echo $req[0];
}
if(isset($_GET['ac'])) 
{
	$SQL = "SELECT COUNT(*) FROM piste";
	$reponse = mysql_query($SQL);
	$req = mysql_fetch_array($reponse);
	echo $req[0];
}
if(isset($_GET['tc'])) 
{
	// Nombre de TV
	echo "0";
}
if(isset($_GET['rc'])) 
{
	// Nombre de radio
	echo "5";
}
if(isset($_GET['cn'])) {
echo $obj->count_country;
}
?>
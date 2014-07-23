<?php

include "config.php";

$email = mysql_real_escape_string($_REQUEST['email']);

$SQL = "SELECT COUNT(*) FROM newsletter WHERE email = '$email'";
$reponse = mysql_query($SQL);
$req = mysql_fetch_array($reponse);

if($req[0] == 0)
{
	$SQL = "INSERT INTO newsletter VALUES ('','$email')";
	mysql_query($SQL);
	
	echo "<font color=green size=2><b>Votre email à bien été ajouter</b></font>";
}
else
{
	echo "<font color=red size=2><b>Vous êtes déjà inscrit.</b></font>";
}

?>
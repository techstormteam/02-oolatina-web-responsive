<?php include "config.php";

$name=trim($_REQUEST['name']);
$name=utf8_decode($name);
$lastname=trim($_REQUEST['lastname']);
$lastname=utf8_decode($lastname);
$email=trim($_REQUEST['email']);

$address=trim($_REQUEST['address']);
$city=trim($_REQUEST['city']);
$zipcode=trim($_REQUEST['zipcode']);
$country=trim($_REQUEST['country']);
$username=trim($_REQUEST['rusername']);
$rpassword=trim($_REQUEST['rpassword']);
$profession=$_REQUEST['profession'];



$password=$rpassword;


$sqlCheck=mysql_query("select * from user where email='".$email."' ");
if(mysql_num_rows($sqlCheck)==0)
{
	$serialize = serialize($profession);
	$SQL = "INSERT INTO user VALUES ('','$username','$password','$name','$lastname','$serialize','$email','$address','$city','$zipcode','$country','','','','','','','','','')";
	mysql_query($SQL);

	// Code de merde
	//$result=mysql_query("insert into user set username='".$username."',password='".$password."',firstname='".$name."',email='".$email."',adresse='".$address."',ville='".$city."',code_postal='".$zipcode."',pays='".$country."',oauth_provider='',oauth_id='',dnt=''");
	echo '1';
}
else
{
echo '2';
}




?>

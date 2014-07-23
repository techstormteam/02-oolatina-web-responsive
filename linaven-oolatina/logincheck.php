<?php include "config.php";
$username=trim($_REQUEST['username']);
$password=trim($_REQUEST['password']);

$sqlCheck=mysql_query("select * from user where username='".$username."' and password='".$password."'");
if(mysql_num_rows($sqlCheck)>0)
{
session_start();
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
echo '1';

}
else
{
echo '2';
}




?>

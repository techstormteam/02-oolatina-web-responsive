<?php include "config.php";
$email=trim($_REQUEST['email']);


$sqlCheck=mysql_query("select * from user where email='".$email."' ");
if(mysql_num_rows($sqlCheck)>0)
{
		$row=mysql_fetch_array($sqlCheck);
		$username=$row['username'];
		$password=$row['password'];
		
		
		$to = $email;
		$subject = "Password Recovery";
		
		$body = '
Password :'.$password;
		
		
		
		
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers = "From: info@test.net\r\n"."X-Mailer: php";

mail($to, $subject, $body, $headers);
		

echo '1';

}
else
{
echo '2';
}




?>

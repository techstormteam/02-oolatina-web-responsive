<?php

// Send Contact Form

$email = $_REQUEST['email'];
$subjet = $_REQUEST['subjet'];
$msg = $_REQUEST['msg'];

if($email != '')
{
	mail('contact@linaven.fr','[CONTACT OOLATINA]'.$subject,'Message du formulaire de contact OOLATINA :'."\n".$msg);
}

?>
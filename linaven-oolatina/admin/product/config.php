<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL ^ E_STRICT);
		
date_default_timezone_set('America/New_York');

	//common settings
	define('FROM_EMAIL', 'no-reply@website.com');
	define('PASSWORD_SEED', 'MySuperSeedWebsite');
	  

    // Database Settings
    define('DB_HOST', 'localhost');
    define('DB_USER', 'linavenf_ecommer');
    define('DB_PASS', '0ekle4iens0aqdr');
    define('DB_NAME', 'linavenf_ecommerce');
	
	
	//Database Connection
    $db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if(!$db){
		exit('Database connection failed - '.mysqli_error());
	}
	
	
	//product categories
	$categories = array('Fashion', 'Mobiles', 'Gadgets', 'Beauty');
	
	
	//some common functions
	function dnt_format($dnt){
		return date("d-m-Y", strtotime($dnt));
	}
	
	function get_main_url(){
		$url = strtok($_SERVER["REQUEST_URI"],'?');
		return $url;
	}
	
	function is_selected($db_val, $opt_val){
		if($db_val == $opt_val) return 'selected';
	}
	
	function redirect_to($location, $status = false) {
		if(!headers_sent()) {
			
			switch($status) {
				case '404':
					header("HTTP/1.1 404 Not Found");
					header('Location: ' . $location);
					break;
				case '301':
					header("HTTP/1.1 301 Moved Permanently");
					header('Location: ' . $location);
					break;
				default:
					header('Location: ' . $location);
					exit;
			} 
			
		}
		else {
			echo "<script type=\"text/javascript\">window.location='$location';</script>";
			exit;
		}
}


?>
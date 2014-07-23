<?php

// Connection Database Shua-Creation.com

define('DB_HOST',		'localhost');
define('DB_USER',		'linavenf_ecommer');
define('DB_PASSWORD',	'0ekle4iens0aqdr');
define('DB_DATABASE',	'linavenf_ecommerce');

mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
mysql_select_db(DB_DATABASE);

define('ROW_PER_PAGE', 10);
define('WEBSITE_DEFAULT_NUMBER_LINK', 10);

//define path for image
define('IMAGE_PRODUCT_PATH',		'assets/product_images/');
define('IMAGE_PRODUCT_URL',			'assets/product_images/');

//do not edit below lines------------------------------------
session_start();
require_once 'common_functions.php';

?>
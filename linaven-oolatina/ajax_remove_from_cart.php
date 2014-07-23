<?php

	require 'config.php';
	require 'CartHelper.php';

	//no item
	if(!isset($_GET['id']))
	{
		echo jsonEncode('No product', false);
		die;
	}

	//connect db
	connectDatabase();

	$productId	= escapseString($_GET['id']);

	$cart = new CartHelper();
	$cart->removeItem($productId);

	closeConnection();
	echo jsonEncode('Product has been removed from your shopping cart.');
	die;

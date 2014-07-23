<?php

	require 'config.php';
	require 'CartHelper.php';

	//no item
	if(!isset($_GET['id']))
	{
		echo jsonEncode('No product added', false);
		die;
	}

	//connect db
	connectDatabase();

	$productId	= escapseString($_GET['id']);
	$quantity	= escapseString($_GET['quantity']);

	$cart = new CartHelper();

	if($cart->checkStock($productId, $quantity) === FALSE)
	{
		closeConnection();

		echo jsonEncode('Quantity is over stock', false);
		die;
	}


	$cart->addItem($productId, $quantity);

	closeConnection();
	echo jsonEncode('Product has been added to your shopping cart.');
	die;

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

	//get current
	$cartList = $cart->getShopcartContent();

	//backup
	$quantityBackup = $cartList[$productId]['quantity'];

	//remove
	$cart->removeItem($productId);


	//check if can add
	if($cart->checkStock($productId, $quantity) === FALSE)
	{
		closeConnection();

		//add back
		$cart->addItem($productId, $quantityBackup);

		echo jsonEncode('Quantity is over stock', false);
		die;
	}


	$cart->addItem($productId, $quantity);

	closeConnection();
	echo jsonEncode('Product has been updated success.');
	die;

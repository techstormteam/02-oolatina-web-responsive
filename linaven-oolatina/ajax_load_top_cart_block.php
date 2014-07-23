<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

	require 'config.php';
	require 'CartHelper.php';
	require 'ProductHelper.php';

	$cart = new CartHelper();
	$cartList = $cart->getShopcartContent();

	//no cart
	if($cartList === FALSE)
	{
			$data = <<<MYDATA



                <div class="cart-info">
                    <a href="javascript:void(0);" class="cart-info-count">0 item</a>
                    <a href="javascript:void(0);" class="cart-info-value">$</a>
                </div>
MYDATA;
			echo utf8_encode(jsonEncode(($data)));
			die;
	}


	//get item
	connectDatabase();

	$productHelper = new ProductHelper();

	$totalPrice = 0;
	$productList = array();
	$itemCount = 0;

	foreach($cartList as $productId => $mixedData)
	{
		$quantity = $mixedData['quantity'];
		$itemCount += $quantity;

		$product = $productHelper->getProductDetails($productId);

		//product is not existed, remove out of cart
		if($product === FALSE)
		{
			$cart->removeItem($productId);
		}
		else
		{
			$price		= $product['price'];
			$name		= $product['title'];

			$subPrice	= $price*$quantity;
			$totalPrice += $subPrice;

			$mainImage = $productHelper->getProductMainImage($productId);
			if($mainImage !== FALSE)
			{
				$image		= IMAGE_PRODUCT_URL.$mainImage['img_url'];
			}
			else
			{
				$image		= IMAGE_PRODUCT_URL.'no_image.png';
			}


			$productList[] = '<li>
                       <a href="product.php?id='.$productId.'"><img src="'.$image.'" alt="'.$name.'" width="37" height="34"></a>
                        <span class="cart-content-count">x '.$quantity.'</span>
                        <strong><a href="product.php?id='.$productId.'">'.$name.'</a></strong>
                        <em>$'.$subPrice.'</em>
                        <a href="javascript:void(0);" class="del-goods removeItemFromCart" rel='.$productId.'><i class="fa fa-times"></i></a>
                      </li>';
		}

	}

	closeConnection();

	if(empty($productList))
	{
		$data = <<<MYDATA



                <div class="cart-info">
                    <a href="javascript:void(0);" class="cart-info-count">0 item</a>
                    <a href="javascript:void(0);" class="cart-info-value">$0</a>
                </div>
MYDATA;
			echo utf8_encode(jsonEncode(($data)));
			die;
	}

	$productList = implode('', $productList);
	//$itemCount	= count($productList);
	$totalPrice = '$'.$totalPrice;

	$data = <<<MYDATA



                <div class="cart-info">
                    <a href="javascript:void(0);" class="cart-info-count">$itemCount item(s)</a>
					<a href="javascript:void(0);" class="cart-info-value">$totalPrice</a>
                </div>
                <i class="fa fa-shopping-cart"></i>
                <!-- BEGIN CART CONTENT -->
                <div class="cart-content-wrapper">
                  <div class="cart-content">
                    <ul class="scroller" style="height: 250px;">
                     $productList
                    </ul>
                    <div class="text-right">
                      <a href="shopping-cart.php" class="btn btn-default">View Cart</a>
                      <a href="checkout.php" class="btn btn-primary">Checkout</a>
                    </div>
                  </div>
                </div>
                <!-- END CART CONTENT -->

MYDATA;


	echo utf8_encode(jsonEncode(($data)));


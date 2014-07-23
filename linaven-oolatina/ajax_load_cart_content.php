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

					Your cart is empty

MYDATA;
			echo jsonEncode(utf8_encode($data));
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
			$description= $product['short_description'];

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


			$productList[] = '<tr>
                    <td class="shopping-cart-image">
                      <a href="'.$image.'" class="fancybox-button"><img src="'.$image.'" alt="'.$name.'"></a>
                    </td>
                    <td class="shopping-cart-description">
                      <h3><a href="product.php?id='.$productId.'">'.$name.'</a></h3>
                      <p>'.$name.'</p>
                      <em>'.$description.'</em>
                    </td>

                    <td class="shopping-cart-quantity">
                      <div class="product-quantity">
                          <input id="product-quantity-'.$productId.'" type="text" value="'.$quantity.'" readonly class="form-control input-sm">
                      </div>

					<button class="btn red-stripe" style="margin-left:10px;" type="button" id="btnUpdateCart" rel="'.$productId.'">Update <i class="fa fa-check"></i></button>

                    </td>
                    <td class="shopping-cart-price">
                      <strong><span>$</span>'.$price.'</strong>
                    </td>
                    <td class="shopping-cart-total">
                      <strong><span>$</span>'.$subPrice.'</strong>
                    </td>
                    <td class="del-goods-col">
					  <a href="javascript:void(0);" class="del-goods removeItemFromCart" rel='.$productId.'><i class="fa fa-times"></i></a>
                    </td>
                  </tr>';
		}

	}

	closeConnection();

	if(empty($productList))
	{
		$data = <<<MYDATA

			Your cart is empty
MYDATA;
			echo jsonEncode(utf8_encode($data));
			die;
	}

	$productList = implode('', $productList);
	//$itemCount	= count($productList);

	$data = <<<MYDATA



                 <div class="shopping-cart-data clearfix">
                <div class="table-wrapper-responsive">
                <table summary="Shopping cart">
                  <tr>
                    <th class="shopping-cart-image">Image</th>
                    <th class="shopping-cart-description">Description</th>
                    <th class="shopping-cart-quantity">Quantity</th>
                    <th class="shopping-cart-price">Unit price</th>
                    <th class="shopping-cart-total" colspan="2">Total</th>
                  </tr>

				  $productList


                </table>
                </div>

                <div class="shopping-total">
                  <ul>
                    <li>
                      <em>Sub total</em>
                      <strong class="price"><span>$</span>{$totalPrice}</strong>
                    </li>
                    <li>
                      <em>Shipping cost</em>
                      <strong class="price"><span>$</span>0.00</strong>
                    </li>
                    <li class="shopping-total-price">
                      <em>Total</em>
                      <strong class="price"><span>$</span>{$totalPrice}</strong>
                    </li>
                  </ul>
                </div>
              </div>
              <button class="btn btn-default" type="button" id="btnContinueShopping">Continue shopping <i class="fa fa-shopping-cart"></i></button>

              <button class="btn btn-primary" type="button" id="btnCheckout">Checkout <i class="fa fa-check"></i></button>

MYDATA;


	echo jsonEncode(utf8_encode($data));


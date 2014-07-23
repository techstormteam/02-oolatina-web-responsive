<?php

	require 'config.php';
	require 'ProductHelper.php';

	connectDatabase();
	$productHelper = new ProductHelper();

	$categoryId = escapseString($_POST['categoryID']);

	if($categoryId != -1)
	{
		$query	= "SELECT * FROM tbl_category WHERE cat_id = $categoryId";
		$result	= mysql_query($query);
		$row	= mysql_fetch_assoc($result);
		$categoryName = $row['cat_name'];
	}
	else
	{
		$categoryName = '';
	}

	//get product list status UP and has stock
	if($categoryId != -1)
	{
		$query = "SELECT * FROM products WHERE category = $categoryId AND status = 'UP' AND stock_quantity > 0";
	}
	else
	{
		$query = "SELECT * FROM products WHERE status = 'UP' AND stock_quantity > 0";
	}

	$result	= mysql_query($query);


	//no product found
	if(mysql_num_rows($result) == 0)
	{
		closeConnection();
		echo json_encode((array(
			'result'	=> true,
			'top'		=> 'No product found',
			'list'		=> 'No product found'
		)));
		die;
	}

	$slideProduct	= array();
	$listProduct	= array();

	$i = 1;
	$j = 1;
	while($row = mysql_fetch_assoc($result))
	{
		$productName	= $row['title'];
		$productId		= $row['id'];
		$price			= $row['price'];
		$currency		= $row['currency'];

		$mainImage = $productHelper->getProductMainImage($productId);
		if($mainImage !== FALSE)
		{
			$image		= IMAGE_PRODUCT_URL.$mainImage['img_url'];
		}
		else
		{
			$image		= IMAGE_PRODUCT_URL.'no_image.png';
		}

		if($i <= 3)
		{
			$slideProduct[] = '<li>
                  <div class="product-item">
                    <div class="pi-img-wrapper">
                      <img src="'.$image.'" class="img-responsive" alt="'.$productName.'">
                      <div>
                        <a href="'.$image.'" class="btn btn-default fancybox-button">Zoom</a>
                        <a href="ajax_load_popup_product_detail.php?id='.$productId.'" class="btn btn-default fancybox-fast-view">View</a>
                      </div>
                    </div>
                    <h3><a href="product.php?id='.$productId.'">'.$productName.'</a></h3>
                    <div class="pi-price">$'.$price.'</div>
                    <a href="#" class="btn btn-default add2cart addToCart1Item" rel='.$productId.'>Add to cart</a>

                  </div>
                </li>';
		}
		else
		{
			//head
			if( ($i%4) == 0)
			{
				$listProduct[] = '
								<div class="row margin-bottom-35 ">
								<div class="col-md-12 sale-product">
									<div class="bxslider-wrapper">
									<ul class="bxslider" data-slides-phone="1" data-slides-tablet="2" data-slides-desktop="4" data-slide-margin="15">';
				$j = 1;
			}

			//add product
			$listProduct[] = '<li>
                  <div class="product-item">
                    <div class="pi-img-wrapper">
                      <img src="'.$image.'" class="img-responsive" alt="'.$productName.'">
                      <div>
                        <a href="'.$image.'" class="btn btn-default fancybox-button">Zoom</a>
                        <a href="ajax_load_popup_product_detail.php?id='.$productId.'" class="btn btn-default fancybox-fast-view">View</a>
                      </div>
                    </div>
                    <h3><a href="product.php?id='.$productId.'">'.$productName.'</a></h3>
                    <div class="pi-price">$'.$price.'</div>
                    <a href="#" class="btn btn-default add2cart addToCart1Item" rel='.$productId.'>Add to cart</a>
                  </div>
                </li>';

			if($j == 4)
			{
				$listProduct[] = '</ul>
								</div>
								</div>
								</div>';
			}
		}

		$i++;
		$j++;
	}

	$slideProduct = implode('', $slideProduct);
	$listProduct = implode('', $listProduct);


	//top slide
	$top = <<<MYDATA
				<h2>{$categoryName}</h2>
				<div class="bxslider-wrapper">
              <ul class="bxslider" data-slides-phone="1" data-slides-tablet="2" data-slides-desktop="3" data-slide-margin="15">
				$slideProduct
              </ul>
            </div>

MYDATA;

	//list
	$list = <<<MYDATA
			$listProduct
MYDATA;


	closeConnection();

	echo json_encode((array(
		'result'	=> true,
		'top'		=> utf8_encode($top),
		'list'		=> utf8_encode($list)
	)));


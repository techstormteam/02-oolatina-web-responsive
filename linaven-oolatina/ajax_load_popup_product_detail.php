<?php

	require 'config.php';
	require 'ProductHelper.php';


	connectDatabase();
	$productHelper = new ProductHelper();

	$productId = escapseString($_GET['id']);

	$row = $productHelper->getProductDetails($productId);
	if($row === FALSE)
	{
		closeConnection();

		echo 'Product record does not exist';
		die;
	}


	$name			= $row['title'];
	$description	= $row['description'];
	$price			= $row['price'];
	$stock			= intval($row['stock_quantity']);
	if($stock > 0)
	{
		$stock = 'In Stock';
	}
	else
	{
		$stock = 'Sold Out';
	}

	$productImages = array();

	$productImagesList = $productHelper->getProductImages($productId);
	if($productImagesList !== FALSE)
	{
		foreach($productImagesList as $rowImage)
		{
			$productImages[] = IMAGE_PRODUCT_URL.$rowImage['img_url'];
		}
	}
	else
	{
		$productImages[] = IMAGE_PRODUCT_URL.'no_image.png';
	}
	$mainImage = array_shift($productImages);

	$productImageThumb = array();
	if(!empty($productImages))
	{
		foreach($productImages as $image)
		{
			$productImageThumb[] = '<a href="#" class="productPopupThumb"><img alt="$name" src="'.$image.'"></a>';
		}
	}
	$productImageThumb = implode('', $productImageThumb);

	$listImage = '<div class="product-other-images">
						<a href="#" class="active productPopupThumb"><img alt="'.$name.'" src="'.$mainImage.'"></a>
						'.$productImageThumb.'
                  </div>';

	//top slide
	$data = <<<MYDATA

			<!-- BEGIN fast view of a product -->
    <div id="product-pop-up" style="width: 700px;">
            <div class="product-page product-pop-up">
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-3">
                  <div class="product-main-image">
                    <img src="$mainImage" alt="$name" class="img-responsive">
                  </div>
                  $listImage
                </div>
                <div class="col-md-6 col-sm-6 col-xs-9">
                  <h1>$name</h1>
                  <div class="price-availability-block clearfix">
                    <div class="price">
                      <strong><span>$</span>$price</strong>
                      <!-- <em>$<span>$price</span></em> -->
                    </div>
                    <div class="availability">
                      Availability: <strong>$stock</strong>
                    </div>
                  </div>
                  <div class="description">
                    <p>
						$description
					</p>
                  </div>
			<!--
                  <div class="product-page-options">
                    <div class="pull-left">
                      <label class="control-label">Size:</label>
                      <select class="form-control input-sm">
                        <option>L</option>
                        <option>M</option>
                        <option>XL</option>
                      </select>
                    </div>
                    <div class="pull-left">
                      <label class="control-label">Color:</label>
                      <select class="form-control input-sm">
                        <option>Red</option>
                        <option>Blue</option>
                        <option>Black</option>
                      </select>
                    </div>
                  </div>

			-->
                  <div class="product-page-cart">
                    <div class="product-quantity">
                        <input id="product-quantity" type="text" value="1" readonly name="product-quantity" class="form-control input-sm">
                    </div>
                    <button class="btn btn-primary" id="addToCart" data-productId="$productId" type="button">Add to cart</button>
                    <button class="btn btn-default viewProductDetails"  data-productId="$productId" type="button">More details</button>
                  </div>
                </div>

                <!-- <div class="sticker sticker-sale"></div> -->

              </div>
            </div>
    </div>
    <!-- END fast view of a product -->

MYDATA;

	closeConnection();
	echo ($data);


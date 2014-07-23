//SonIT

$(document).ready(function(){

	//first load cart top block
	loadCartBlock();

	//load list of product
	//product list page
	if($('#topProductSlideDiv').length > 0)
	{
		loadListOfProduct();
	}

	//click to category
	$('a.categoryItem').click(function(){
		categoryId = $(this).attr('rel');
		loadListOfProduct();

		return false;
	});

	//cart list page
	if($('#cartListDiv').length > 0)
	{
		loadCartContent();
	}

	//popular products
	$('a.addToCart1Item').click(function(e){
		e.preventDefault();

		addToCart($(this).attr('rel'), 1);

		return false;
	});

	//cart list of checkout page
	if($('#confirm-content').length > 0)
	{
		loadCartContentCheckout();
	}

});



//load cart block
function loadCartBlock()
{
	callAjax('POST',
	'topCartBlockDiv' ,
	'ajax_load_top_cart_block.php',
	'',
	loadCartBlockBeforeSend,
	loadCartBlockSuccess);
}

function loadCartBlockBeforeSend()
{

}

function loadCartBlockSuccess(returnData)
{
	$('#topCartBlockDiv').html(returnData.data);

	$('a.removeItemFromCart').click(function(){

		removeItemFromCart($(this).attr('rel'));

	});
}

function loadListOfProduct(catID)
{
	callAjax('POST',
	'topCartBlockDiv' ,
	'ajax_load_product_list.php',
	'categoryID=' + categoryId,
	loadListOfProductBeforeSend,
	loadListOfProductSuccess);
}

function loadListOfProductBeforeSend()
{

}


function loadListOfProductSuccess(returnData)
{
	if(returnData.result)
	{
		$('#topProductSlideDiv').html(returnData.top);

		$('#productListDiv').html(returnData.list);
	}

	//need this, else all image will expand too big size
	//and handle click to Zoom (FancyBox)
	AppModified.init();
	AppModified.initBxSlider();

	$('a.addToCart1Item').click(function(e){
		e.preventDefault();

		addToCart($(this).attr('rel'), 1);

		return false;
	});

}

function addToCart(id, quantity)
{
	callAjax('GET',
	'topCartBlockDiv' ,
	'ajax_add_to_cart.php',
	'id=' + id + '&quantity=' + quantity,
	addToCartBeforeSend,
	addToCartSuccess);
}

function addToCartBeforeSend()
{
	$.blockUI({ message: '<h1><img src="images/bx_loader.gif" /> <br/>Processing...<br/></h1>' });
}

function addToCartSuccess(returnData)
{
	$.unblockUI();

	//close popup
	if($('a.fancybox-close').length > 0)
	{
		$('a.fancybox-close').click();
	}

	if(returnData.result == false)
	{
		window.location.href=window.location.href;
	}
	else
	{
		alert(returnData.data);

		//load cart block
		loadCartBlock();

		//cart list page
		if($('#cartListDiv').length > 0)
		{
			loadCartContent();
		}
	}
}


function removeItemFromCart(id)
{
	callAjax('GET',
	'topCartBlockDiv' ,
	'ajax_remove_from_cart.php',
	'id=' + id,
	removeItemFromCartBeforeSend,
	removeItemFromCartSuccess);
}

function removeItemFromCartBeforeSend()
{
	$.blockUI({ message: '<h1><img src="images/bx_loader.gif" /> <br/>Processing...<br/></h1>' });
}

function removeItemFromCartSuccess(returnData)
{
	$.unblockUI();

	if(returnData.result == false)
	{
		window.location.reload = true;
	}
	else
	{
		alert(returnData.data);

		//load cart block
		loadCartBlock();

		//cart list page
		if($('#cartListDiv').length > 0)
		{
			loadCartContent();
		}
	}
}


function updateCart(id, quantity)
{
	callAjax('GET',
	'topCartBlockDiv' ,
	'ajax_update_cart.php',
	'id=' + id + '&quantity=' + quantity,
	updateCartBeforeSend,
	updateCartSuccess);
}

function updateCartBeforeSend()
{
	$.blockUI({ message: '<h1><img src="images/bx_loader.gif" /> <br/>Processing...<br/></h1>' });
}

function updateCartSuccess(returnData)
{
	$.unblockUI();

	if(returnData.result == false)
	{
		window.location.href=window.location.href;
	}
	else
	{
		alert(returnData.data);

		//load cart block
		loadCartBlock();

		//cart list page
		if($('#cartListDiv').length > 0)
		{
			loadCartContent();
		}
	}
}


//cart page
//load cart block
function loadCartContent()
{
	callAjax('POST',
	'cartListDiv' ,
	'ajax_load_cart_content.php',
	'',
	loadCartContentBeforeSend,
	loadCartContentSuccess);
}

function loadCartContentBeforeSend()
{
	$('#cartListDiv').html('<center><img src="images/bx_loader.gif" /></center>');
}

function loadCartContentSuccess(returnData)
{
	$('#cartListDiv').html(returnData.data);

	$('a.removeItemFromCart').click(function(){

		removeItemFromCart($(this).attr('rel'));

	});

	AppModified.initImageZoom();
	AppModified.initTouchspin();


	$('#btnUpdateCart').click(function(){

		var productId	= $(this).attr('rel');
		var quantity	= $('#product-quantity-' + productId).val();
		if(quantity == 0)
		{
			alert('Quantity can not be zero');
			return false;
		}

		updateCart(productId, quantity);

		return false;
	});

	$('#btnContinueShopping').click(function(){
		window.location = 'boutique.php';
	});

	$('#btnCheckout').click(function(){
		window.location = 'checkout.php';
	});

}

//checkout
//load cart block
function loadCartContentCheckout()
{
	callAjax('POST',
	'confirm-content' ,
	'ajax_load_cart_content_checkout.php',
	'',
	loadCartContentCheckoutBeforeSend,
	loadCartContentCheckoutSuccess);
}

function loadCartContentCheckoutBeforeSend()
{
	$('#confirm-content').html('<center><img src="images/bx_loader.gif" /></center>');
}

function loadCartContentCheckoutSuccess(returnData)
{
	$('#confirm-content').html(returnData.data);

	if (jQuery(".fancybox-button").size() > 0) {
		jQuery(".fancybox-button").fancybox({
			groupAttr: 'data-rel',
			prevEffect: 'none',
			nextEffect: 'none',
			closeBtn: true,
			helpers: {
				title: {
					type: 'inside'
				}
			}
		});

		$('.fancybox-video').fancybox({
			type: 'iframe'
		});
	}


	$('#button-confirm').click(function(){
		formCheckoutSubmit();
	});

}



var ajaxObject		= null;
var ajaxTimeOut		= 99999999;
var categoryId		= -1;

function callAjax(type, id_div_content,link_action,param, beforeSend, callback_success,callback_error)
{
    if (param == null) param = '';
    $.ajax({
			url: link_action,
			type: type,
			data: param,
			dataType: 'json',
			timeout: ajaxTimeOut,
			beforeSend: function(){
					beforeSend();
			},
			error: function(data){
				if(callback_error!=null) callback_error(data);
			},
			success: function(returnData) {
				if(callback_success!=null) callback_success(returnData);
			}
	});
}
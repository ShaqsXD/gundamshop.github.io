<?php
session_start();
include_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View shopping cart</title>
<link href="style/style.css" rel="stylesheet" type="text/css">

<style>

.check-out-txt{
	float:right;
}

////View Cart////
.view-cart{
	width: 100%;
	float: left;
	background:
	padding: 10px
	border: 1px sold #DDD;
	border-radius: 5px;
}
.view-cart .p-price{
	float: right;
	margin: right;
	font-size: 12px;
	font-weight: Iori;
}
.view-cart .product-info{width:60%;}

</style>

</head>
<body>
<div id="product-wrapper">
	<h1>View Cart</h1>
	<?php 
	$current_url =base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	if(isset($_SESSION["product"]))
	{
		$total = 0;
		echo '<form method="post" action="paypal-express-checkout/process.php">';
		echo '<ul>';
		$cart_items = 0;
		foreach ($_SESSION["products"] as $cart_itm)
		{
			$product_code = $cart_itm["code"];
			$results = $mysqli->("SELECT product_name,product_desc, price FROM products WHERE product_code='$product_code' LIMIT 1");
			$obj = $results->fetch_object();
			
			echo '<li class="cart-itm">';
			echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>';
			echo '<div class="p-price">'.$currency.$obj->price.'</div>';
			echo '<div class="product-info">';
			echo '<h3>'.$obj->product_name.'(code :'.$product_code.')</h3> ';
			echo '<div class="p-qty">Qty : '.$cart_itm["qty"].'</div>';
			echo '<div>'.$obj->product_desc.'</div>';
			echo '</div>';
			echo '</li>';
			$subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
			$total = ($total + $subtotal);
			
			echo '<input type="hidden" name="item_name['.$cart_itmes.']" value="'.$obj->product_name.'" />';
			echo '<input type="hidden" name="item_code['.$cart_itmes.']" value="'.$product_code.'" />';
			echo '<input type="hidden" name="item_desc['.$cart_itmes.']" value="'.$obj->product_desc.'" />';
			echo '<input type="hidden" name="item_qty['.$cart_itmes.']" value="'.$cart_itm["qty"].'" />';
			$cart_items ++;
			
		
		}
		echo '</ul>';
		echo '<span class="check-out-txt">';
		echo '<strong>Total : '.$currency.$total.'</strong> ';
		echo '</span>';
		echo '</form>';
		
	}else{
		echo 'Your Cart is empty';
	}

	?>
	</div>
</div>
</body>
</html>
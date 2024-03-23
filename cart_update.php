<?php 
session_start();
include_once("config.php");

if(isset ($_GET["emptycart"]) && $_GET["emptycart"]==1)
{
	$return_url =base64_decode($_GET["return_url"]);
	session_destroy();
	header('Location:'.$return_url);
}

//add item in the cart
if(isset($_POST["type"]) && $_POST["type"]=='add')
{
	$product_code = filter_var($_POST["product_code"], FILTER_SANITIZE_STRING);//product code
	$product_qyt  = filter_var($_POST["product_qty"], FILTER_SANITIZE_STRING); //product code
	$return_url   =base64_decode($_POST["return_url"]); //pagbalik url
	
	//limit of the product
	if($product_qty > 10){
		die ('<div align="center"> This demo does not allowed more that 10 quantity!<b /><a href=""http://sanwebe.com/assets/paypal-shopping-cart-integration/">Back To Products</a>.</div>');
	}
	
	$reslts = $mysqli->query("SELECT product_name,price FROM product WHERE product_code='$product_code' LIMIT 1");
	$obj = $results->fetch_object ();
	
	if ($results) { //product info
	
		$new_product = array(array('name'=>$obj->product_name, 'code'=>$product_code, 'qty'=>$product_qty, 'price'=>$obj->price));
		
		if (isset($_SESSION["products"])) 
		{
			$found = false; 
			
			foreach ($_SESSION["product"] as $cart_itm)
			{
				if($cart_itm["code"] == $product_code){
				
					$product []= array('name'=>$cart_itm["name"], 'code'=>$cart_itm['code'], 'qty'=>$cart_itm["qty"], 'price'=>$cart_itm["price"]);
					$found = true;
				}else{
					$product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'qty'=>$cart_itm["qty"], 'price'=>$cart_itm["price"]);
					
				}
			}
			
			if ($found == false) 
			{
				// add a new user item in array
				$_SESSION["product"]= array_merge($product, $new_product);
			}else{
				$_SESSION["product"] = $product;
			}
			
		}else{
		
			$_SESSION["product"] = $new_product;
		}   
	}
	
	header('Location:'.$return_url);
	
}
//remove item from the cart
if(isset)$_GET["removep"]) && isset($_SESSION["products"]))
{
	$product_code = $_GET["removep"];
	$return_url   = base64_decode($_GET["return_url"]);
	
	foreach ($_SESSION["products"] as $cart_itm)
	{
		if($cart_itm["code"] !=$product_code){
			$product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'qty'=>$cart_itm["qty"], 'price'=>$cart_itm ["price"]);
	
		}

		$_SESSION["product"] =$product;
	}
	
	//back to the original page
	header('Location:'.$return_url);
}
?>	
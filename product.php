<?php
session_start();
include_once("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Gundam Online Shop</title>
		<font face="Iori">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link rel="shortcut icon" href="image/barbatos.jpg">
		<link href="css/animate.css" rel="stylesheet">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="style/style.css" rel="stylesheet" type="text/css">
	<style type="text/css">
	body{
		.shopping-cart .remove-itm{
			float:right;
			margin-right: 10px;
			color: black;
		}			
	}
	.thumbnail {
		position: relative;
		padding: 20px;
		margin-bottom: 20px;
		height: 400px;

	}
	body{
		font-family: 'Iori', Arial, sans-serif;
	}
	.thumbnail img {
		width: 80%;
	}
	body{
		font-size: 11px;
		width: 100%;
	{
	</style>
	<!------------------------------------------------------------------------------>
	<script type="text/javascript" src="js/gallery/jquery.easing.min.js"></script>	
	<script type="text/javascript" src="js/gallery/jquery.mixitup.min.js"></script>
	
	<script type="text/javascript">
			$(function () {
				
				var filterList = {
				
					init: function () {
					
						// MixItUp plugin
						// http://mixitup.io
						$('#portfoliolist').mixitup({
							targetSelector: '.portfolio',
							filterSelector: '.filter',
							effects: ['fade'],
							easing: 'snap',
							// call the hover effect
							onMixEnd: filterList.hoverEffect()
						});				
					
					},
					
					hoverEffect: function () {
					
						// Simple parallax effect
						$('#portfoliolist .portfolio').hover(
							function () {
								$(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
								$(this).find('img').stop().animate({top: -20}, 500, 'easeOutQuad');				
							},
							function () {
								$(this).find('.label').stop().animate({bottom: 0}, 300, 'easeInQuad');
								$(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');								
							}		
						);				
					
					}

				};
				
				// Run the show!
				filterList.init();
				
				
			});	
	</script>
	
	<script>
		$(function(){
		  // Fix input element click problem
		  $('.dropdown input, .dropdown label').click(function(e) {
			e.stopPropagation();
		  });
		});
	</script>
</head>
	
<body>
	<!----------------------------------------------------------------------------------------------------->
<div id="navigator">
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">
				
		  </a>
        </div>
	<div class="collapse navbar-collapse" id="navbar-collapse-2">
          <ul class="nav navbar-nav navbar-right">
            <li>
				<a href="index.html">Home</a> 
			</li>
            <li>
				<a href="product.php">Products</a> 
			</li>
            <li>		<?php
							
						include("removeerrors.php");
						
						if(!isset ($_SESSION['name'] )){
							
							echo'<li><a href="signup.php">Sign up / Login</a></li>';
						}
						else{
							$active = $_SESSION['name'];

							echo'<li><a href="#"> | <b><font color="red"> Hello '.$active.'</font></b> |</a></li>';
							echo'<li><a href="logout.php">Logout</a> </li>';
							
						}
							
						?>
	</li>
	
	
	
						
						
						
					</ul>	
				</div>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>
	<!-- /.navbar -->
</div>
<!--------------------------------------------------------------------------------------------------------------->

<!--------------------------------------------------------------------------------------------------------------->
<div id="main">
	<div class="container" style="padding-top: 60px;">
				  <div class="row text-center">
							<div class="col-sm-12 col-md-12 col-md-12 animated fadeInUp">
								<h2 style="font-size: 60px;line-height: 60px;margin-bottom: 20px;font-weight: 900;">Our Products</b></h2>
								<p>Our <span class="highlight">experienced</span> and <span class="highlight">dedicated</span> staff provide these services with a smile.</p>
							</div>
						</div>
						<hr>
						<!---------------------------------------- STARTCART--------------------------->
						<center>
						<h2 style="font-size: 30px;line-height: 60px;margin-bottom: 20px;font-weight: 900;">Latest Gundam Products</h2>
						  <br></center><hr>
						  
						  
							<?php

								echo'<div class="container">';
									echo'<div class="row" clearfix>';
									
									
									echo'<ul id="filters" class="clearfix">';
											echo'<li><span class="filter" data-filter="Gundam">Gundams</span></li>';
										echo'</ul>';
									
										echo'<div class="col-xs-12 .col-md-12">';
											echo'<div id="products-wrapper">';
												echo'<div class="products">';
												
												//current URL of the Page. cart_update.php redirects back to this URL
													$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
													
													$results = $mysqli->query("SELECT * FROM products ORDER BY id ASC");
													if ($results) { 
													
													
														echo '<div class="bs-example">';
														 echo ' <div class="container">';
															echo '<div class="row">';
																	echo '<div id="portfoliolist">';
											
											
													//fetch results set as object and output HTML
													while($obj = $results->fetch_object())
													{
														 $category = $obj->category_name;
															 echo'<div class="portfolio '.$category.'" data-cat="'.$category.'">';
																		echo '<div class="col-xs-18 col-sm-12 col-md-12">';
																		 echo '<form method="post" action="cart_update.php">';
																			 echo '<div class="thumbnail  animated pulse">';
																				echo '<div class="product-thumb"><img src="images/'.$obj->product_img_name.'"></div>';
																					echo '<div class="product-content"><h3><b><font color="red">'.$obj->product_name.'</font></b></h3><hr>';
																					echo'<div class="product-desc"><p>'.$obj->product_desc.'</p>Category : '.$category.'</div>';
																					echo '<div class="product-info">';
																					echo '<p><b> <font color="red">Price '.$currency.$obj->price.'</font></b></p> ';
																					
																					if(!isset ($_SESSION['name'] )){
																						
																					}
																					else{
																						echo 'Qty <input type="text" name="product_qty" value="1" size="3" />';
																						echo '<button class="add_to_cart">Add To Cart</button>';
																						}	
																						echo '</div></div>';
																						echo '<input type="hidden" name="product_code" value="'.$obj->product_code.'" />';
																						echo '<input type="hidden" name="type" value="add" />';
																						echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';	
						
													
																					echo'<br>';													
																			 echo '</div>';		 
																		 echo '</form>';	 
																		 echo '</div>';
																echo '</div>';																		 
														}
																		echo '</div>';
																	echo '</div>';
																 echo '</div>  ';   
														echo '</div>';
														
													}
													
													echo'</div>';
												echo'</div>';
												echo'<hr>';
												?>
												
												
										</div> 
											
											
											<?php 
												
												include("removeerrors.php");
													
													if(!isset ($_SESSION['name'] )){
							
															echo'<li><a href="signup.php">Sign up / Login</a></li>';
														}
														
													else{
														
														//----WEW----//
														echo'<div class="shopping-cart">';

															echo'<center>';
															echo'<h2 style="font-size: 30px;line-height: 60px;margin-bottom: 20px;font-weight: 900;">CART LIST</h2>';
															  echo'</center><hr>';
																if(isset($_SESSION["products"]))
																{
																	$total = 0;

																	foreach ($_SESSION["products"] as $cart_itm)
																	{
																		echo'<div class="col-xs-18 col-sm-6 col-md-3">';
																			echo '<div class="panel panel-primary">';
																			echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'"><font color="white">X</font></a></span><div class="panel-heading"><h6>'.$cart_itm["name"].'</h6></div>';
																				echo '<div class="panel-body">';
																					echo '<li class="cart-itm">';
																						echo '<div class="p-code">Product code : '.$cart_itm["code"].'</div>';
																						echo '<div class="p-qty">Qty : '.$cart_itm["qty"].'</div>';
																						echo '<div class="p-price">Price :'.$currency.$cart_itm["price"].'</div>';
																					echo '</li>';
																				$subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
																				$total = ($total + $subtotal);
																				echo '</div>';
																			echo '</div>';
																		echo '</div>';
																	}
																			echo '<span class="check-out-txt"><strong>Total : '.$currency.$total.'</strong> <a href="view_cart.php">Check-out!</a></span>';
																			echo '<span class="empty-cart"><a href="cart_update.php?emptycart=1&return_url='.$current_url.'">Empty Cart</a></span>';

																}else{
																	echo '<center><h2>Your Cart is empty<hr><br></h2></center>';
																}

														
																echo'</div>';
																//--------------------------------------- End Shopping Cart --------------------------->
															
														}
															echo'<hr>';	
													?>
											
										</div>	
									</div>
									<!---------------------------------------- ENDCART--------------------------->
				</div>
		</div>

</div>
</body>
</html>
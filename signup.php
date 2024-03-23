<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Gundam Online Shop</title>
	<font face="Iori">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link rel="shortcut icon" href="image/barbatos.jpg">
		<link href="css/animate.css" rel="stylesheet">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		body{
		font-size: 11px;
		width: 100%;
		}
	</style>
</head>

<body>
<!------------------------------------------------------------------------------------------------------->
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
            <li>
            <li>
						<?php
						session_start();
						include_once("config.php");
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
<!-----------------------------------------END------------------------------------->





<div id="signupform">
		<div class="container animated fadeInUp" style="padding-top: 60px;">
			  <div class="row text-center">
						<div class="col-sm-12 col-md-12 col-md-12">
							<font face="Iori">
							<h2>What We Offer</h2>
							<!--------1---------->
							<font face="Iori">
							<h2 style="font-size: 60px;line-height: 60px;margin-bottom: 20px;font-weight: 900;">Gundam</h2>
							<!-----------2-------------->
							<font face="Iori">
							<p>Our<span class="highlight"> experienced</span> and <span class="highlight">dedicated</span>staff provide these services with a smile.</p>
						</div>
					</div>
					<hr>
			  <div class="row">
				
				<!-- edit form column -->
				<div class="col-md-8 col-sm-6 col-xs-12 personal-info">
				
				
					<!------------------------PHP----------------------->
					
					
						<?php
						include("removeerrors.php");
						$username = $_POST['username'];
						$fullname = $_POST['fullname'];
						$email = $_POST['email'];
						$cemail = $_POST['cemail'];
						$address = $_POST['address'];
						$password = md5($_POST['password']);
						$cpassword = md5($_POST['cpassword']);
						
						if ($fullname && $address && $email && $cemail && $username  && $password && $cpassword){

							if (preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) {

									if (strlen($password) > 3) {

											if ($password == $cpassword && $email == $cemail) {

												$con = mysqli_connect("localhost", "root", "" ,"db_gunpla") or die("Dae maka Connect!");
												
												$usernamechecker = mysqli_query($con,"SELECT username FROM users WHERE username ='$username' ");
												$count = mysqli_num_rows($usernamechecker);
												
												$emailchecker = mysqli_query($con ,"SELECT email FROM users WHERE email ='$email' ");
												$count2 = mysqli_num_rows($emailchecker);
												
													if($count != 0 || $count2 != 0){
														if($count != 0){
																echo '<div class="alert alert-danger alert-dismissable">';
																				echo '<a class="panel-close close" data-dismiss="alert">×</a> ';
																				echo "Username already exist! Please enter another user.";
																		  echo '</div>';
														}
														else if($count2 != 0){
																	echo '<div class="alert alert-danger alert-dismissable">';
																				echo '<a class="panel-close close" data-dismiss="alert">×</a> ';
																				echo"Username already exist! Please enter another user.";
																		  echo '</div>';
														
														}

													}
													else{
														$query = "INSERT INTO users (fullname , address , email ,username, password) VALUES ('$fullname','$address', '$email' ,'$username', '$password')";
														$result = mysqli_query($con,$query);
														
															if($result){
																echo '<div class="alert alert-success alert-dismissable">';
																	echo '<a class="panel-close close" data-dismiss="alert">×</a> ';
																	echo "User Created Successfully.";
																echo '</div>';
															}
													}
												
													

											}
											else {
												echo '<div class="alert alert-danger alert-dismissable">';
														echo '<a class="panel-close close" data-dismiss="alert">×</a> ';
														echo 'Your password does not match.';
												echo '</div>';
											}
									}
									else {
										echo '<div class="alert alert-danger alert-dismissable">';
												echo '<a class="panel-close close" data-dismiss="alert">×</a> ';
												echo "Your password is too short! You need to type a password between 4 and 15 characters!";
										echo '</div>';
									}
									
							} 
						}
						?>
		<!---------------------------------------------------------------------------------------------------------------------->

	
	
	
	
	
	
	<div class="panel panel-success">
	<div class="panel-heading"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;Sign Up</div>
	<div class="panel-body">
	
	 <form class="form-horizontal" role="form" method="post" action="signup.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-lg-3 control-label">Full Name:</label>
			<div class="col-lg-8">
			<input class="form-control"  type="text" name="fullname">
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-3 control-label">Address:</label>
			<div class="col-lg-8">
			<input class="form-control" type="text" name="address">
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-3 control-label">Email:</label>
			<div class="col-lg-8">
			<input class="form-control"  type="text" name="email">
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-3 control-label">Confirm Email:</label>
			<div class="col-lg-8">
			<input class="form-control"  type="text" name="cemail">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-md-3 control-label">Username:</label>
			<div class="col-md-8">
			<input class="form-control"  type="text" name="username">
			</div>
		</div>
		<div class="form-group">
		 <label class="col-md-3 control-label">Password:</label>
			<div class="col-md-8">
			<input class="form-control" type="password" name="password">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label">Confirm password:</label>
			<div class="col-md-8">
			<input class="form-control"  type="password" name="cpassword">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label"></label>
			<div class="col-md-8">
			<input class="btn btn-primary" value="Sign Up" type="submit">
			<span></span>
			<input class="btn btn-default" value="Cancel" type="reset">
		 </div>
		</div>
		</form>
		</div>
		
	</div>   
	

				<!-- left column -->
				<div class="col-md-4 col-sm-4 col-xs-12">
				
				  <form role="form" action="login.php" method="POST">
				  <div id="loginform">
				  
					  <div class="panel panel-success">
						  <div class="panel-heading"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;Login</div>
							<div class="panel-body">
							<center><img class="img-circle" src="image/unnamed.png"alt="" width="150" height="150"></center>
							<br><br>
								<div class="input-group">
								  <span class="input-group-addon" id="sizing-addon2"><i class="glyphicon glyphicon-pushpin"></i></span>
								  <input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon2" name="name">
								</div><br>
								
								<div class="input-group">
								  <span class="input-group-addon" id="sizing-addon2"><i class="glyphicon glyphicon-lock"></i></span>
								  <input type="password" class="form-control" placeholder="Password" aria-describedby="sizing-addon2" name="password">
								</div><br>
							
							<input class="btn btn-primary" value="Login" type="submit" id="submit">
							<span></span>
							<input class="btn btn-default" value="Cancel" type="reset">
							
							</div>
						</div>
					
					
				  </div>
				  </form>
				</div>
			  </div><hr>
			</div><br><br>
		</div>
</body>
</html>
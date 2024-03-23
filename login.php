<?php
session_start();

if($_POST){

$_SESSION['name'] = $_POST['name'];
$_SESSION['password'] = ($_POST['password']);

if ($_SESSION['name'] && $_SESSION ['password']){

	$con = mysqli_connect("localhost","root", "" ,"db_gunpla") or die ("Dae naka Connect!");
	
	$query = mysqli_query($con,"SELECT * FROM users WHERE username='".$_SESSION['name']."'");
	$numrows = mysqli_num_rows($query);
	
	if ($numrows != 0){
	
		while($row = mysqli_fetch_assoc($query)){
		
			$dbname = $row['username'];
			$dbpassword = $row['password'];
		
	    }
		if ($_SESSION['name']==$dbname){
			if($_SESSION['password']==$dbpassword){
				header('Location: index.html');
			
			}else{
				echo "Your password is incorrect!";
				
				$expire = time()-86400;
				header("Refresh:1; url=signup.php");
				setcookie('db_gunpla', $_SESSION['name'], $expire);
				session_destroy();
				
			}
		}else{
			echo "Your name is incorrect!";
			
$expire = time()-86400;
			header("Refresh:1; url=signup.php");
			setcookie('db_gunpla', $_SESSION['name'], $expire);
			session_destroy();
		}
	}else{
		echo "This name is not registered!";
		
		$expire = time ()-86400;
		header("Refresh:1; url=signup.php");
		setcookie('db_gunpla', $_SESSION['name'], $expire);
	session_destroy();
	}
}else{
	echo "You have to type a name and password!";
	
$expire = time ()-86400;
	header("Refresh:1; url=signup.php");
	setcookie('db_gunpla', $_SESSION['name'], $expire);
	session_destroy();
}
}else{

echo "Access denied!";
exit;
}
?>
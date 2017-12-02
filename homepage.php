<?php
session_start();

$con= mysqli_connect("localhost", "root", "") or die("unable to connect");
mysqli_select_db($con, 'logindb');


?>

<!DOCTYPE html>
<html>
<head>
<title>home page</title>
<link rel = "stylesheet" href= "style.css">
</head>

<body style= "background-color: #34495e">

	<div id= "main"> 
	<center>
	<h2> HOME PAGE  </h2>
	<h3> Welcome User</h3>
	<img src= "avatar.png" class= "avatar">
	</center>
	
	
	<form class= "myform" action= "homepage.php" method= "post">
	<input name= "logout" type= "submit" id= "logout_btn" value= "Log Out"/> 
		
		
	</form>
	
	<?php
	
		if(isset($_POST['logout']))
		{
		session_destroy();
		
		header('location: index.php');
		}
		
	?>
	
		
	</div>
	
</body>
</html>
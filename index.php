<?php
	session_start();
	
	
	$con= mysqli_connect("localhost", "root", "") or die("unable to connect");
	
	mysqli_select_db($con, 'logindb');


?>

<!DOCTYPE html>
<html>
<head>
<title>LOGIN PAGE</title>
<link rel = "stylesheet" href= "style.css">
</head>

<body style= "background-color: #34495e">

	<div id= "main"> 
	<center>
	<h2> LOGIN FORM </h2>
	<img src= "avatar.png" class= "avatar">
	</center>
	
	
	<form class= "myform" action= "index.php" method= "post">
		<label><b> Username: </b></label><br>
		<input name= "username" type= "text" class= "inputvalues" placeholder= "Type Your Username" required /><br>
		<label> <b>Password: </b></label><br>
		<input name= "password" type= "password" class= "inputvalues" placeholder= "Type Your Password" required /><br>
		<input name= "login" type= "submit" id= "login_btn" value= "Login" /> <br>
		<a href= "signup.php"> <input type= "button" id= "register_btn" value= "Register"/></a>
		
		
	</form>
	
	<?php
	if(isset($_POST['login']))
	{
		$username= $_POST['username']; 
		$password= $_POST['password'];
		
		$query= "select * from user_info_table WHERE username= '$username' AND password= '$password'";
		
		$query_run= mysqli_query($con, $query);
		
		if(mysqli_num_rows($query_run)>0)
			{   
				//valid
				$_SESSION['username']= $username;
				header('location: homepage.php');
		    }
		    	
		else
		{    //invalid
			echo '<script type= "text/javascript"> alert("invalid credentials") </script>';	
		}
	}
	?>
		
	</div>
	
</body>
</html>
<?php
	$con= mysqli_connect("localhost", "root", "") or die("unable to connect");
	
	mysqli_select_db($con, 'logindb');

?>




<!DOCTYPE html>
<html>
<head>
<title>registeration page</title>
<link rel = "stylesheet" href= "style.css">
</head>

<body style= "background-color: #34495e">

	<div id= "main"> 
	<center>
	<h2> REGISTER HERE!</h2>
	<img src= "avatar.png" class= "avatar">
	</center>
	
	
	<form class= "myform" action= "signup.php" method= "post">
		<label><b> Username: </b></label><br>
		<input name= "username" type= "text" class= "inputvalues" placeholder= "Type Your Username" required /><br>
		<label> <b>Password: </b></label><br>
		<input name= "password" type= "password" class= "inputvalues" placeholder= "Your Password" required /><br>
		<label><b> Confirm Password: </b></label><br>
		<input name= "cpassword" type= "password" class= "inputvalues" placeholder= " confirm password" required /><br>
		<input name= "submit_btn" type= "submit" id= "signup_btn" value= "Sign Up" /><br>
		<a href= "index.php"><input type= "button" id= "back_btn" value= "<<Back"/> </a>		
		
	</form>
		
		<?php
			if(isset($_POST['submit_btn']))
			{
				//echo '<script type= "text/javascript"> alert("signup button clicked")</script>';
				$username= $_POST['username']; 
				$password= $_POST['password'];
				$cpassword= $_POST['cpassword'];
				
				if($password==$cpassword)
				{
					$query= "select * from user_info_table WHERE username= '$username'";
					
					$query_run= mysqli_query($con, $query);
					
					if(mysqli_num_rows($query_run)>0)
					{
					
						//there is already a user with the same user name
						echo '<script type= "text/javascript" > alert("user already exist.. try another username") </script>';		
					}
				     	
					 else
					 {
						 $query= "insert into user_info_table values('$username', '$password')";
						 $query_run= mysqli_query($con, $query);
						 
						 if($query_run){
							 echo '<script type= "text/javascript">alert("user registered..go to login page to login" )</script>';
						 }
						 else
						 {
							 echo '<script type= "text/javascript">alert("error" )</script>';
						 }
						 
					 }
				}
				else
				{
					 echo '<script type= "text/javascript">alert("password and confirm password doesnot match" )</script>';
				}
			
			}
			
		?>
	</div>
	
</body>
</html>
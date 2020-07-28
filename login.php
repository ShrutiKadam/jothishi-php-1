<?php
	session_start();
	
	//connect to database
	$db = mysqli_connect("localhost", "root", "", "authentication");
	
	if (isset($_POST['login_btn'])) {
		
		$email = mysqli_real_escape_string($db,$_POST['email']);
		$password = mysqli_real_escape_string($db,$_POST['password']);
		
		$password = md5($password);
		$sql = "SELECT * FROM users Where email= '$email' AND password='$password'";
		$result = mysqli_query($db, $sql);
		
		if (mysqli_num_rows($result) == 1) {
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['email'] = $email;
			header("location: home.php");
		}else{
			$_SESSION['message'] = "Entered email id / Password is not valid";
		}
		
	    }

?>



<!DOCTYPE html>
<html>
<head>
	<title>  Login and Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
	<h1> Register, Login Page</h1> 
</div>

<form method="post" action="login.php">
	<table>
		<tr>
			<td> Email :</td>
			<td><input type="text" name="email" class="textInput"></td>
		</tr>
		
			<td> Password :</td>
			<td><input type="password" name="password" class="textInput"></td>
		</tr>
		
		<tr>
			<td>  </td>
			<td><input type="submit" name="login_btn" value="Login"></td>
		</tr>
	</table>
</form>
</body>
</html>
			
			
			
			
			
			

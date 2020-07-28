<?php
	session_start();
	
	//connect to database
	$db = mysqli_connect("localhost", "root", "", "authentication");
	
	
	if (!empty($_POST)) { //$_POST['register_btn']
		//var_dump($_POST); exit();
		$email = mysqli_real_escape_string($db,$_POST['email']);
		$firstname = mysqli_real_escape_string($db,$_POST['first_name']);
		$lastname = mysqli_real_escape_string($db,$_POST['last_name']);
		$password = mysqli_real_escape_string($db,$_POST['password']);
		$confirmpassword = mysqli_real_escape_string($db,$_POST['confirm_password']);
		$dob = mysqli_real_escape_string($db,$_POST['dob']);
		
		if ($password == $confirmpassword) {
			//create user
			$password = md5($password); //hash password before stroing for security purposes
			$sql = "INSERT INTO users(email, firstname, lastname, password, dob) VALUES('$email', '$firstname', '$lastname', '$password', '$dob')";
			//$sql = "INSERT INTO users(email) VALUES('$email')";
			if(mysqli_query($db, $sql)){
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['firstname'] = $firstname;
			header("location: home.php");
			}else {
			  echo "Error: " . $sql . "<br>" . mysqli_error($db);
			}
		
		}else {
			$_SESSION['message'] = "Password does not match";
			
		
			}
	    }

?>



<!DOCTYPE html>
<html>
<head>
	<title> Registration Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
	<h1> Register, Login and Logout Page</h1> 
</div>

<form method="post" action="register.php">
	<table>
		<tr>
			<td> Email :</td>
			<td><input type="text" name="email" class="textInput"></td>
		</tr>
		<tr>
			<td> First Name :</td>
			<td><input type="text" name="first_name" class="textInput"></td>
		</tr>
		<tr>
			<td> Last Name :</td>
			<td><input type="text" name="last_name" class="textInput"></td>
		</tr>
		<tr>
			<td> Password :</td>
			<td><input type="password" name="password" class="textInput"></td>
		</tr>
		<tr>
			<td> Confirm password :</td>
			<td><input type="password" name="confirm_password" class="textInput"></td>
		</tr>
		<tr>
			<td> Date of birth :</td>
			<td><input type="date" name="dob"  ></td>
		</tr>
		<tr>
			<td>  </td>
			<td><input type="submit" name="register_btn" value="Register"></td>
		</tr>
	</table>
</form>
</body>
</html>
			
			
			
			
			
			

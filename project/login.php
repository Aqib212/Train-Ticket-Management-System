<?php
	include('connection.php');
	
	session_start();
	
	if($_POST)
	{
		$errors = array();
		
		if(empty($_POST['email']))
		{
			$errors['email1']= "Please enter email address";
		}
		$sql1 = "select * from registration where email = '$email';";
		
		if($_POST['email']!== $sql1)
		{
			$errors['email2'] = "Enter valid email";
		}
		
		if(empty($_POST['password']))
        {
            $errors['password1'] = "Password cannot be empty";
        }
        if(strlen($_POST['password']) < 4)
        {
            $errors['password2'] = "Password must be atlest 4 characters long";
        }
		
		$email = $_POST['email'];
		$password = $_POST['password'];
		$sql = "select * from registration where email = '$email' and password='$password';";
		$select = mysqli_query($conn, $sql);
		$numrow = mysqli_num_rows($select);
		if($numrow >0)
		{
			$_SESSION['email'] = $email;
			header("Location: main.php");
			exit();
		}
	}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	</head>
<body>
	<form method="post" name="log" target="">
		<p>
		<label for="email">Email</label>
		<input type="email" name="email"/>
		</p>
		<p><?php if(isset($_POST['email1'])) echo $errors['email1']; ?></p>
		<p><?php if(isset($_POST['email2'])) echo $errors['email2']; ?></p>
		
		<p>
		<label for="password">Password</label>
		<input type="password" name="password"/>
		</p>
		<p><?php if(isset($_POST['password1'])) echo $errors['password1']; ?></p>
		<p><?php if(isset($_POST['password2'])) echo $errors['password2']; ?></p>
		
		<hr>
		
		<p>
		<input type="submit" value="Login"/>
		<a href="register.php">Register</a>
		</p>
		<p>
		<a href="index1.php">Home</a>
		</p>
	</form>
</body>
</html>
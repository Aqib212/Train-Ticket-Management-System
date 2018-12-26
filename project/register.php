<?php
	include('connection.php');
	if($_POST)              
    {
        $errors = array();
		
		if(empty($_POST['id']))
		{
			$errors['id1'] = "Id can not be empty";
		}
		
		if(empty($_POST['password']))
        {
            $errors['password1'] = "Password cannot be empty";
        }
        if(strlen($_POST['password']) < 4)
        {
            $errors['password2'] = "Password must be atlest 4 characters long";
        }
		
		if($_POST['password'] !== $_POST['cpassword'])
		{
			$errors['cpassword1'] = "password are not matched";
		}
		
        if(empty($_POST['fname']))
        {
            $errors['fname1'] = "Your first name cannot be empty";
        }

		if(empty($_POST['lname']))
		{
			$errors['lname1'] = "Your last name cannot be empty";
		}

		if(empty($_POST['email']))
		{
			$errors['email1'] = "Enter the email";
		}
		
		if (!filter_var(($_POST['email']), FILTER_VALIDATE_EMAIL)) 
		{
			$errors['email2'] = "Invalid email format"; 
		}
		
		if(empty($_POST['type']))
		{
			$errors['type1'] = "select user or admin";
		}

        if(count($errors) == 0)
        {
			$id = mysqli_real_escape_string($conn, $_POST['id']);
			$password = mysqli_real_escape_string($conn, $_POST['password']);
			$fname = mysqli_real_escape_string($conn, $_POST['fname']);
			$lname = mysqli_real_escape_string($conn, $_POST['lname']);
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$type = mysqli_real_escape_string($conn, $_POST['type']);
			$update = mysqli_query($conn, "insert into registration(id, first_name, last_name, password, email, user) values
											  ('$id', '$fname', '$lname', '$password', '$email', '$type')");
			
			if($update)
			{
				$msg="Successful.";
				echo "<script type='text/javascript'>alert('$msg');</script>";
				header('Location:login.php');
			}
			else
			{
				$errormsg="Try again";
				echo "<script type='text/javascript'>alert('$errormsg');</script>";	 
			}
			exit();
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Registration Form</title>
    </head>
    <body>
		<h1><center>Registration</center></h1>
        <form method="post" name="reg" target="">
			<p>
			<label for="fname">First name</label>
			<input type="text" name="fname" value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>"/>
			<p><?php if(isset($errors['fname1'])) echo $errors['fname1']?></p>
			
			<label for="lname">Last name</label>
			<input type="text" name="lname" value="<?php if(isset($_POST['lname'])) echo $_POST['lname']; ?>"/>
			<p><?php if(isset($errors['lname1'])) echo $errors['lname1']?></p>
			</p>
			
			<p>
			<label for="id">ID</label>
			<input type="text" name="id"/>
			</p>
			<p><?php if(isset($errors['id1'])) echo $errors['id1']; ?></p>
			
			<p>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" />
            </p>
            <p><?php if(isset($errors['password1'])) echo $errors['password1']; ?></p>
            <p><?php if(isset($errors['password2'])) echo $errors['password2']; ?></p>

            
			<p>
			<label for="cpassword">Confirm Password</label>
			<input type="password" name="cpassword" id="cpassword" value="<?php if(isset($_POST['cpassword'])) echo $_POST['cpassword']; ?>"/>
			</p>
			<p><?php if(isset($errors['cpassword1'])) echo $errors['cpassword1']; ?></p>
			
            
			<p>
			<label for="Email">Email</label>
			<input type="email" name="email" id="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"/>
			</p>
			<p><?php if(isset($errors['email1'])) echo $errors['email1']; ?></p>
			<p><?php if(isset($errors['email2'])) echo $errors['email2']; ?></p>
			
			<p>
			<label for = "type">User type</label>
			<select name="type" value="<?php if(isset($_POST['type'])) echo $_POST['type']; ?>">
			<option value="admin">Admin</option>
			<option value="user">User</option>
			</select>
			<?php if(isset($errors['type1'])) echo $errors['type1']; ?>
			</p>
			
			<p>
			<?php echo "<hr>";?>
            <input type="submit" name="reg" value="Register" />
			
			</p>
			
			<p>
			<a href="index1.php">Home</a>
			<a href="login.php">login</a>
			</p>
        </form>
    </body>
</html>
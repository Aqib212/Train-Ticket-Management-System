<?php
	include('connection.php');
	
	session_start();
	
	if($_POST)
	{
		$errors = array();
		
		if(empty($_POST['tname']))
		{
			$errors['tname1']= "Enter train name";
		}
		
        if(count($errors) == 0)
        {
			$tname = mysqli_real_escape_string($conn, $_POST['tname']);
			$cabin = mysqli_real_escape_string($conn, $_POST['cabin']);
			$normal = mysqli_real_escape_string($conn, $_POST['normal']);
			$suit = mysqli_real_escape_string($conn, $_POST['suit']);
			$update = mysqli_query($conn, "insert into train_info(name, normal, cabin, suit) values
											  ('$tname', '$normal', '$cabin', '$suit');");
			
			if($update)
			{
				$msg="Successful.";
				echo "<script type='text/javascript'>alert('$msg');</script>";
				header('Location:main.php');
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
<html>
<head>
	<title>Train Information</title>
	</head>
<body>
	<form method="post" name="tra" target="">
		<p>
		<label for="tname">Train Name</label>
		<input type="text" name="tname"/>
		<p><?php if(isset($errors['tname1'])) echo $errors['tname1'];?></p>
		</p>
		
		<p>
			<label for = "normal">Normal</label>
			<input type="text" name="normal"></input>			
		</p>
		
		<p>
			<label for = "cabin"> Cabin</label>
			<input type="text" name="cabin"></input>			
		</p>
		
		<p>
			<label for = "suit">Suit</label>
			<input type="text" name="suit"></input>			
		</p>
		
		<hr>
		
		<p>
		<input type="submit" value="Create"/>
		<a href="main.php">Return</a>
		</p>
	
	</form>
</body>
</html>
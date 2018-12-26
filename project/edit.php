<?php
	include('connection.php');
	session_start();
	$result = $_SESSION['result'];
	$errors= array();
	
	if($_POST)
	{
		
		
		if(($_POST['conpass']) != ($_POST['newpass']))
        {
            $errors['conpass2'] = "Password is not matched";
        }
		
		
		
		
		if(count($errors) == 0)
		{
			$id = $result['id'];
			$newpass = $_POST['newpass'];
			$email = $_POST['email'];
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			
			
			if(empty($_POST['newpass']))
			{
				$sql = "update registration set first_name = '$fname', last_name = '$lname' where id ='$id';";
				$update = mysqli_query($conn, $sql);
			 
				if($update){
					$result['first_name'] = $fname;
					$result['last_name'] = $lname;
					$_SESSION['result']=$result;
				}
			}
			
			else
			{
				$sql = "update registration set password = '$newpass', first_name = '$fname', last_name = '$lname' where id ='$id';";
				$update = mysqli_query($conn, $sql);
			 
				if($update){
					$result['first_name'] = $fname;
					$result['last_name'] = $lname;
					$result['password'] = $newpass;
					$_SESSION['result']=$result;
				}
			}
		}
	}
	
?>
	
	

<!DOCTYPE HTML>
<html>
<head>
<title>Edit Profile</title>
</head>
<body>
	<form method="POST" name="form">
	<p>
		<label for="fname">First Name</label>
		<?php 
		echo '<input type="text" name="fname" value = "' .$result['first_name']. '"></input>';?>
	</p>
	
	
	<p>
		<label for="lname">Last Name</label>
		<?php echo '<input type="text" name="lname" value = "' .$result['last_name']. '"></input>';?>
	</p>
			   

               <p>
                 <label  for="newpass"> New Password </label><br />
                 <input type="password" name="newpass"/>
               </p>
			   
			   <p>
                 <label  for="conpass"> Confirm New Password </label><br />
                 <input type="password" name="conpass"/>
               </p>
	           <p><?php if(isset($errors['conpass2'])) echo $errors['conpass2']; ?></p>
			   
			   <p>
					<label for="id">ID</label>
					<?php
					$id = $result['id'];
					echo '<input type="text" name="id" value="'.$id. '"disabled> </input>';
					?>
			   </p>
			   
			   <p>
					<label for="email">Email</label>
					<?php 
					echo '<input type="text" name="email" value= "'. $result['email']. '"></input>';
					?>
			   </p>
			  
			   
			   <p>
					<label for="user">User Type</label>
					<?php
					$user = $result['user'];
					echo '<input type="text" name="user" value = "' .$user. '"disabled></input>';
					?>
			   </p>
			   <p>
                 <input type="submit" name="change" value="Change"/>
				 <a href="main.php">Home</a>
               </p>
</body>
</html>
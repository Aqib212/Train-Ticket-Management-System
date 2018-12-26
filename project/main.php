<?php
	include('connection.php');
	
	session_start();
	$email = "";
		if(isset($_SESSION['email']))
		{
			$email =$_SESSION['email'];
		}
		$sql = "select * from registration where email = '$email';";
		$select = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($select);
		$_SESSION['result'] = $result;

?>


<!doctype html>
<html>
	<head>
	<title>Ticket System</title>
	</head>
	<body>
	<center>
	<h1>Welcome <?php echo ($result['first_name']. "&nbsp" . $result['last_name']); ?></h1>
	<a href = "#">Home</a><?php echo("&nbsp");?>
	<a href="profile.php">Profile</a><?php echo ("&nbsp");?>
	<?php
	if($result['user']=="admin")
	{
		echo("<a href = 'traininfo.php'> Train info</a> &nbsp");
		
	}
	if($result['user']=="user")
	{
		echo("<a href = 'ticketbook.php'>Book Ticket</a> &nbsp");
	}
	
	?>
	<a href= "available.php">Available Sits</a>
	<a href = "logout.php">Logout</a>
	</center>
	</body>

</html>
<?php
	session_start();
	$result = $_SESSION['result'];
?>

<html>
<body>
	<p><img src=""></img><?php echo ($result['first_name'] ."&nbsp". $result['last_name']);?></p>
	<p>ID : <?php echo($result['id'])?></p>
	<p>Password : <?php echo($result['password'])?></p>
	<p>Email : <?php echo($result['email'])?></p>
	<p>User Type : <?php echo($result['user'])?></p>
	<a href="edit.php">Edit Profile</a>
	<a href="main.php">Home</a>
</body>
</html>
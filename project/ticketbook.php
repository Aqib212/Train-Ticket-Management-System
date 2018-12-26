<?php
	include('connection.php');
	
	session_start();
	$result = $_SESSION['result'];
	
	if($_POST)
	{
		$errors = array();
		
		$station = $_POST['station'];
		
		if($_POST['type'] == "cabin"){
        	$select = mysqli_query($conn, "SELECT * FROM cabin WHERE station = '$station'");
			$result = mysqli_fetch_array($select);
		}
		
		if($_POST['type'] == "normal"){
        	$select = mysqli_query($conn, "SELECT * FROM normal WHERE station = '$station'");
			$result = mysqli_fetch_array($select);
		}
		
		if($_POST['type'] == "suit"){
        	$select = mysqli_query($conn, "SELECT * FROM suit WHERE station = '$station'");
			$result = mysqli_fetch_array($select);
		}
		
		if(empty($_POST['tname']))
		{
			$errors['tname1'] = "Enter train name";
		}

        if(count($errors) == 0)
        {
			$name = mysqli_real_escape_string($conn, $_POST['tname']);
			$des = mysqli_real_escape_string($conn, $_POST['station']);
			$room = mysqli_real_escape_string($conn, $_POST['type']);
			$td = mysqli_real_escape_string($conn, $result['td']);
			$dt = mysqli_real_escape_string($conn, $_POST['dt']);
			$quan = mysqli_real_escape_string($conn, $_POST['quantity']);
			$amount = $quan * $result['price'];
			
			
			$select1 = mysqli_query($conn, "SELECT * FROM train_info order by name");
	    	$userrow = mysqli_fetch_array($select1);
			
		if($room == "normal")
		{
			$total1 =  $userrow['normal'] - $quan;
			$update = mysqli_query($conn, "UPDATE train_info SET normal = '$total1' where name = '$name'"); 
		}
		
				if($room == "cabin")
		{
			$total2 =  $userrow['cabin'] - $quan;
			$update = mysqli_query($conn, "UPDATE train_info SET cabin = '$total2' where name = '$name'"); 
		}
		
				if($room == "suit")
		{
			$total3 =  $userrow['suit'] - $quan;
			$update = mysqli_query($conn, "UPDATE train_info SET suit = '$total3' where name = '$name'"); 
		}

			
			$_SESSION['res'] = $name;
			$_SESSION['quantity'] = $quan;
			$_SESSION['type'] = $room;
			
			
			$update = mysqli_query($conn, "insert into ticket(name, destination, typ, td, dt, quantity, amount) values
											  ('$name', '$des', '$room', '$td', '$dt', '$quan', '$amount')");
			
				$msg="Successful.";
				echo "<script type='text/javascript'>alert('$msg');</script>";
				header('Location:show_ticket.php');
			
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
	<form method="post" name="train" target="">
		<p>
		<label for="trainname">Train Name</label>
		<input type="text" name="tname"/>
		<p><?php if(isset($errors['tname1'])) echo $errors['tname1'];?></p>
		</p>
		
		<p>
			<label for = "station">Station</label>
			<input type="text" name="station"/>
		</p>
		
		<p>
			<label for="type">Type</label>
			<select name="type">
			<option>normal</option>
			<option>cabin</option>
			<option>suit</option>
			</select>
		</p>
		
		<p>
			<label for = "date">Date</label>
			<input type="date" name="dt"/>
		</p>
		
		<p>
			<label for="quantity">Quantity</label>
			<input type="number" name="quantity"/>
		</p>
		<hr>
		
		<p>
		<input type="submit" value="Create"/>
		<a href="main.php">Home</a>
		</p>
	
	</form>
</body>
</html>
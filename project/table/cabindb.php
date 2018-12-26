<?php
$link = mysqli_connect("localhost", "root", "", "lab");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql1 = "CREATE TABLE cabin(
		station VARCHAR(50) NOT NULL,
		td TIME NOT NULL,
		price INT(11));";

		
if(mysqli_query($link, $sql1))
{
	echo "Table created successfully";
	$sql2 = mysqli_query($link, "insert into cabin(station, td, price) values
	('Dhaka to Chittagong', '08:30:00', 1000),
	('Dhaka to Khulna', '09:30:00', 800),
	('Dhaka to Jessore', '10:30:00', 600),
	('Dhaka to Bogra', '11:30:00', 400),
	('Dhaka to Rajshahi', '12:30:00', 600),
	('Dhaka to Comilla', '13:30:00', 200);");
}
else
	echo "ERROR: Could not able to execute $sql1. " . mysqli_error($link); 
	
	
mysqli_close($link);


?>
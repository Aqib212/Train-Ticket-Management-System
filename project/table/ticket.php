<?php
$link = mysqli_connect("localhost", "root", "", "lab");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql1 = "CREATE TABLE ticket(
		name VARCHAR(50) NOT NULL,
		destination VARCHAR(500) NOT NULL,
		typ VARCHAR(50) NOT NULL,
		td TIME NOT NULL,
		dt DATE NOT NULL,
		quantity INT(11),
		amount INT(11));";

		
if(mysqli_query($link, $sql1))
	echo "Table created successfully";
else
	echo "ERROR: Could not able to execute $sql1. " . mysqli_error($link); 
	
	
mysqli_close($link);


?>
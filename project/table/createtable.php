<?php
$link = mysqli_connect("localhost", "root", "", "lab");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql1 = "CREATE TABLE registration(
		id VARCHAR(20) PRIMARY KEY NOT NULL,
		first_name VARCHAR(20) NOT NULL,
		last_name VARCHAR(20) NOT NULL,
		password VARCHAR(20) NOT NULL,
		user VARCHAR(50),
		email VARCHAR(40) NOT NULL UNIQUE);";

		
if(mysqli_query($link, $sql1))
	echo "Table created successfully";
else
	echo "ERROR: Could not able to execute $sql1. " . mysqli_error($link); 
	
	
mysqli_close($link);


?>
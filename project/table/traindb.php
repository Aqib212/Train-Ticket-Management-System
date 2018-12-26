<?php
$link = mysqli_connect("localhost", "root", "", "lab");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql1 = "CREATE TABLE train_info(
		name VARCHAR(50) PRIMARY KEY NOT NULL,
		normal INT(11),
		cabin INT(11),
		suit INT(11));";

		
if(mysqli_query($link, $sql1))
	echo "Table created successfully";
else
	echo "ERROR: Could not able to execute $sql1. " . mysqli_error($link); 
	
	
mysqli_close($link);


?>
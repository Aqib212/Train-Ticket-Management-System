<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
 

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

$sql = "CREATE DATABASE lab";
if(mysqli_query($conn, $sql)){
    echo "Database created successfully";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
mysqli_close($conn);
?>
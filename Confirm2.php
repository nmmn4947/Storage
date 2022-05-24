<?php
session_start();
include 'db.php';
	$connection=new mysqli($server_name,$user_name,$password,$database);
	if ($connection->connect_error) {
   	echo "erroro";
	}
$a=$_SESSION['Bill'];
$del = "DELETE FROM shop2 WHERE BILL = '$a'";
$connection->query($del);
header("location:Face.php");
?>
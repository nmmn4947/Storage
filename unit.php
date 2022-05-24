<?php
	include 'db.php';
	$connection=new mysqli($server_name,$user_name,$password,$database);
	if ($connection->connect_error) {
   	echo "erroro";
	}
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$IO=$_POST['uruni'];
		$OO=$_POST['hide'];
		$YO="UPDATE shop2 SET unit = '$IO' WHERE picture = '$OO'";
		if ($connection->query($YO) === TRUE) {
			echo "Success";
			header("location:shoppingcart.php");
		}
	}
?>
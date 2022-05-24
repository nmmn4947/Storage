<?php
echo "REEE";

session_start();

include 'db.php';
$connection=new mysqli($server_name,$user_name,$password,$database);
if ($connection->connect_error) {
    echo "erroro";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$mas=$_POST['mes1'];
	$ses=$_SESSION['Bill'];
	$kon="INSERT INTO messageu (`BILL`, `mess`) VALUES ('$ses','$mas')";
	echo "string";
	if ($connection->query($kon) === TRUE) {
		header("location:Face.php");
	}
	echo "Error";
}
?>
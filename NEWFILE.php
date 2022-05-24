<?php
include 'db.php';

$connection=new mysqli($server_name,$user_name,$password,$database);
if ($connection->connect_error) {
    echo "erroro";
}

$sel = "SELECT OrderID FROM Order ORDER BY OrderID DESC";
$sss = $connection->query($sel);
if ($sss->num_rows > 0){
    $sela = $sss->fetch_assoc();
    echo $sela['OrderID'];
}

?>
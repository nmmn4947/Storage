<?php
session_start();
include 'db.php';
$connection=new mysqli($server_name,$user_name,$password,$database);
if ($connection->connect_error) {
echo "erroro";
}
$pepe = 0;
$order = "INSERT INTO `customeror`(`Status`) VALUES ('กำลังดำเนินการ')";
$connection->query($order);
$sel = "SELECT OrderID FROM customeror ORDER BY OrderID DESC LIMIT 1";
$sss = $connection->query($sel);
if ($sss->num_rows > 0){
    $sela = $sss->fetch_assoc();
    $see = $sela['OrderID'];
}
$trig = 0;
		// $mas=$_POST['mes1'];
		$sa=$_SESSION['Bill'];
		$wl="SELECT * from shop2 WHERE BILL='$sa'";
		$Thefu=$connection->query($wl);
		if ($Thefu->num_rows > 0) {
			while ($ay=mysqli_fetch_assoc($Thefu)) {    
				$nama=$ay['name'];
				$asd=$ay['amount'];
				if ($asd === NULL) {
				echo "please Insert amount";
				$trig = 1;
				break;
				}else{
					$wo="SELECT * from list WHERE name='$nama'";
					$Rest=$connection->query($wo);
					if ($Rest->num_rows > 0) {
						while ($ui=mysqli_fetch_assoc($Rest)) {
							$yi=$ui['number'];
						}
					}
					$wq=$yi-$asd;
					if ($wq < 0) {
						echo "ความต้องการเกินของในคลัง : Amount is higher than Stock";
						$trig = 1;
						break;
					}else{
						$ins="UPDATE list SET number = '$wq' WHERE name = '$nama'";
						$ins2="UPDATE shop2 SET number = '$wq' WHERE name = '$nama'";
						$sen="INSERT into send (OrderID, BILL, name, price, number, amount, unit, picture, Status, mess, sendtime) SELECT OrderID, BILL, name, price, number, amount, unit, picture, Status, mess, sendtime from shop2 WHERE BILL='$sa' AND name = '$nama'";
						if ($connection->query($ins) === TRUE) {
							if ($connection->query($ins2) === TRUE) {
								$update="UPDATE shop2 SET OrderID='$see' WHERE BILL='$sa' AND name='$nama'";
								if ($connection->query($update) === TRUE){							
									if ($connection->query($sen) === TRUE){
										header("location:Confirm2.php");
									}else {
										echo "send error";
									}
								}else {
									echo "update shop2 error #2";
								}
							} else {
								echo "update shop2 error #1";
							}
					}else {
						echo "update list error";
					}
                }
		}
	
		// if ($trig == 0){
		// 	$kon="INSERT INTO `messageu`(`OrderID`, `BILL`, `mess`) VALUES ('$see','$sa','$mas')";
		// 	if ($connection->query($kon) === TRUE){
				
		// 	}
		// }else{
		// 	$ordel="DELETE FROM customeror WHERE OrderID='$see'";
		// 	$connection->query($ordel);
		// 	header("location:Confirm2.php");
		// }
	}
	}else {
		echo "shop2 has nothing";
		header("location:shoppingcart.php");
	}

?>
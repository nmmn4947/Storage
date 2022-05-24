<?php
session_start();
include 'db.php';
$connection=new mysqli($server_name,$user_name,$password,$database);
if ($connection->connect_error) {
echo "erroro";
}
		$sa=$_SESSION['Bill'];
		$wl="SELECT * from shop2 WHERE BILL='$sa'";
		$Thefu=$connection->query($wl);
		if ($Thefu->num_rows > 0) {
			while ($ay=mysqli_fetch_assoc($Thefu)) {    
				$nama=$ay['name'];
				$asd=$ay['amount'];
				if ($asd === NULL) {
				echo "please Insert amount";
				header("Refresh:3;shoppingcart.php");
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
						header("Refresh:3;shoppingcart.php");
					}else{
						header("location:Confirm1.php");
				}
                }
		}
	}

?>
<?php

session_start();

include 'db.php';

$connection=new mysqli($server_name,$user_name,$password,$database);
if ($connection->connect_error) {
    echo "erroro";
}
 	if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tres=$_SESSION['Bill'];
		$mew=$_POST['berk1'];
         $zensql="SELECT * from shop2 where picture='$mew' AND BILL='$tres'";
         $resulte = $connection->query($zensql);
         if ($resulte->num_rows > 0) {
            echo "Already in the cart you can adjust the amount in the cart";
            header("Refresh:2; Face.php");
        }
        else
        {
		$newsql="INSERT into shop2 (name, nameENG, price, number, unit, unitENG, picture, Status, mess, sendtime) SELECT name, nameENG, price, number, unit, unitENG, picture, Status, mess, sendtime FROM list WHERE picture='$mew'";
		  if ($connection->query($newsql) === TRUE) {
                $el = "SELECT ID FROM shop2 ORDER BY ID DESC LIMIT 1";
                $sps = $connection->query($el);
                if ($sps->num_rows > 0){
                    $sad = $sps->fetch_assoc();
                    $sda = $sad['ID'];
                }
                $ch="UPDATE shop2 SET BILL='$tres' WHERE picture='$mew' AND ID='$sda'";
                $connection->query($ch);
                header("location:Face.php");
            }
		    else {
		      	echo "Erorrrorororororororororo";
			 $connection->error;
		  }
    }
}
?>

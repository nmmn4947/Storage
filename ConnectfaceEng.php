<?php
include 'db.php';

$connection=new mysqli($server_name,$user_name,$password,$database);
if ($connection->connect_error) {
    echo "erroro";
}
 	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$mew=$_POST['berk1'];		echo $minecraft;
 		$zensql="SELECT * from shop2 where picture='$mew'";
                $resulte = $connection->query($zensql);

                if ($resulte->num_rows > 0) {
                    echo "already have";
                    header("location:FaceENG.php");
                }
                else{;
		$newsql="INSERT into shop2 (name, price, number, picture) SELECT name, price, number, picture from list WHERE picture='$mew'";
		if ($connection->query($newsql) === TRUE) {
		header("location:FaceENG.php");

		} else {
			echo "Erorrrorororororororororo";
			$connection->error;
		}
	}
}
?>

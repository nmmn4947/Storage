<!DOCTYPE html>
<html>
<head>
	<?php
	include 'db.php';
	$connection=new mysqli($server_name,$user_name,$password,$database);
	if ($connection->connect_error) {
   	echo "erroro";
	}

	?>
</head>
<body>

    <?php
    if (($_SERVER["REQUEST_METHOD"]) == "POST") {
    	$DI=$_POST['DI'];
        $nopesql="DELETE FROM shop2 WHERE ID='$DI'";
        if ($connection->query($nopesql) === TRUE) {
            header("location:shoppingcartENG.php");
        } else {
            echo "nope";
        }
    }
    ?>
</body>
</html>
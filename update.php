	    <?php
	    include 'db.php';
		$connection=new mysqli($server_name,$user_name,$password,$database);
		if ($connection->connect_error) {
   		echo "erroro";
		}

        if ((isset($_POST["plustext"])) and (!empty($_POST["plustext"]))) {
            $TY=$_POST['plustext'];
            $FY=$_POST['kong5'];
            echo $TY.$FY;
            $nicesql="UPDATE shop2 SET number='$TY' WHERE name='$FY';";
               if ($connection->query($nicesql) === TRUE) {
                    echo "เยส";
                    header("location:shoppingcart.php");
                } else {
                    echo "ไม่ได้อ้าาาาาาาาาก";
                    $connection->error;
                }
            }
    ?>

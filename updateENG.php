<?php
session_start();

include 'db.php';
$connection=new mysqli($server_name,$user_name,$password,$database);
if ($connection->connect_error) {
echo "erroro";
}

    if ((isset($_POST["plustext"])) and (!empty($_POST["plustext"]))) {
        $TY=$_POST['plustext'];
        $FY=$_POST['kong5'];
        $BY=$_SESSION['Bill'];
        $nicesql="UPDATE shop2 SET amount='$TY' WHERE name='$FY' AND BILL='$BY'";
           if ($connection->query($nicesql) === TRUE) {
                header("location:shoppingcartENG.php");
            } else {
                echo "nope";
                $connection->error;
            }
        }
?>

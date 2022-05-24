<?php
    include "db.php";

    $connection=new mysqli($server_name,$user_name,$password,$database);
    if ($connection->connect_error) {
        echo "errorororo";
    }
        $tr = $_POST["iyg"];
        $lll = "SELECT Status FROM list WHERE ID = '$tr'";
        $sul = "UPDATE list SET Status = 'STOP' WHERE ID = '$tr'";
        $suu = "UPDATE list SET Status = '' WHERE ID = '$tr'";
        $rre = $connection->query($lll);
        $ree = $rre->fetch_assoc();
        if ($ree['Status'] == 'STOP'){
            if($connection->query($suu) === TRUE){
                header("location:Admin.php");
            }
        } else {
            if ($connection->query($sul) === TRUE){
                header("location:Admin.php");
            } else {
                echo"E rorr r";
            }
        }
?>
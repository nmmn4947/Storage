<?php
    include "db.php";

    $connection=new mysqli($server_name,$user_name,$password,$database);
    if ($connection->connect_error) {
        echo "errorororo";
    }
        $tr = $_POST["delete1"];
        $sql = "DELETE FROM list WHERE ID='$tr'";
        
        if (($_SERVER["REQUEST_METHOD"]) == "POST") {
            if ($connection->query($sql) === TRUE) {
                header("location:Admin.php");
            } else {
                echo "something errer";
            }
        }
?>
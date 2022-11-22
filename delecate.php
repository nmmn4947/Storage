<?php
    include "db.php";

    $connection=new mysqli($server_name,$user_name,$password,$database);
    if ($connection->connect_error) {
        echo "errorororo";
    }
        $tr = $_POST["delecate"];
        $sql = "DELETE FROM category WHERE ID='$tr'";
        
        if (($_SERVER["REQUEST_METHOD"]) == "POST") {
            if ($connection->query($sql) === TRUE) {
                header("location:category.php");
            } else {
                echo "something errer";
            }
        }
?>
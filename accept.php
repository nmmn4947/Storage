<?php
    include 'db.php';
    $connection=new mysqli($server_name,$user_name,$password,$database);
    if ($connection->connect_error) {
    echo "erroro";
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $ID = $_POST["ID1"];
        $sqlacc = "UPDATE send SET Status='ยินยอม' WHERE BILL='$ID'";
        $connection->query($sqlacc);

    }
?>
<?php
include "db.php";

$connection=new mysqli($server_name,$user_name,$password,$database);
if ($connection->connect_error) {
    echo "erroro";
}

If($_SERVER["REQUEST_METHOD"] == "POST"){
    $sdd = $_POST["oh"];
    $sds = $_POST["naw"];
    if(isset($_POST["grab"])){
        $sul = "UPDATE send SET Status = 'รับของแล้ว' WHERE name = '$sdd' AND OrderID = '$sds'";
        if ($connection->query($sul) === TRUE){
            header("location:account.php");
        } else {
            echo"E ror";
        }
    } elseif(isset($_POST["sadno"])) {
        $sul = "UPDATE send SET Status = 'ปฎิเสธแล้ว' WHERE name = '$sdd' AND OrderID = '$sds'";
        if ($connection->query($sul) === TRUE){
            header("location:account.php");
        } else {
            echo"Er or";
        }
    } else {
        $sul = "UPDATE send SET Status = 'ถูกยกเลิก' WHERE name = '$sdd' AND OrderID = '$sds'";
        if ($connection->query($sul) === TRUE){
            header("location:account.php");
        } else {
            echo"Ero r";
        }
    }


}
?>

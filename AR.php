<?php
    include 'db.php';
    $connection=new mysqli($server_name,$user_name,$password,$database);
    if ($connection->connect_error) {
    echo "erroro";
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $ID = $_POST["ID1"];
        $ID2 = $_POST["ID2"];
        $fou = $_POST["foo"];
        $timmy = "UPDATE send SET sendtime = CURRENT_TIMESTAMP WHERE OrderID='$ID' AND name = '$ID2'";
        // if (is_null($ID2)){
        //     echo "AMONGUS";
        //     header("Refresh:2; Adminprogress.php");
        // }else {
        //     echo "Bruh";
        //     header("Refresh:2; Adminprogress.php");  
        // }
        if (isset($_POST['acc'])){
            $sqlacc = "UPDATE send SET Status = 'ยินยอม' WHERE OrderID='$ID' AND name = '$ID2'";
            $sym = "UPDATE send SET mess='$fou' WHERE OrderID='$ID' AND name = '$ID2'";
            $snm = "UPDATE send SET mess='รับได้เลย' WHERE OrderID='$ID' AND name = '$ID2'";
            echo $fou;
            echo $sym;
            $connection->query($sqlacc);
                if (empty($fou)){
                    $connection->query($snm);
                    $connection->query($timmy);
                    header("location:Adminprogress.php");
                }else {
                    $connection->query($sym);
                    $connection->query($timmy);
                    header("location:Adminprogress.php");
                }
        }else {
            $sqlrej = "UPDATE send SET Status='ปฎิเสธ' WHERE OrderID='$ID' AND name = '$ID2'";
            $soup = "UPDATE send SET mess='$fou' WHERE OrderID='$ID' AND name = '$ID2'";
            if (!empty($fou)){
                $connection->query($sqlrej);
                $connection->query($soup);
                $connection->query($timmy);
                header("location:Adminprogress.php");
            }else {
                echo "กรุณาให้เหตุผล";
                header("Refresh:2; Adminprogress.php");
            }
        }
    }
?>
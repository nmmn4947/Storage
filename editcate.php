<?php
session_start();
include 'db.php';

$conn=new mysqli($server_name,$user_name,$password,$database);
if ($conn->connect_error) {
    echo "errorororo";
}
    $id = $_GET['id'];  
    $sql = "SELECT * from category where ID = $id ";
    $result=$conn->query($sql);
    $row = $result->fetch_assoc();
    



 
        echo '<h1>Edit</h1>';
        echo '<form action="editcate.php" method="post" enctype="multipart/form-data">';
        echo '<br><br><input type="text" name="editcate" value = "'.$row['category'].'">';
        echo '<br><br><input type="text" name="editcateENG" value = "'.$row['categoryENG'].'">';
        echo '<input type="hidden" name="cateid" value="'.$row['id'].'"><br>';



        echo '<input type="submit" name="update" value="Update">';
        echo '</form>';

        
        $ID = $_POST['cateid'];
        $cateENG = $_POST['editcateENG'];
        $cate = $_POST['editcate'];

        $sql = "UPDATE cartegory SET category='$cate', categoryENG='$cateENG'  where id='$ID'";
        $result = $conn->query($sql);
        if($result === TRUE) {
                    echo $sql;
                     echo "Record created success fully";
                     header("Refresh:3,category.php");
                     }
            else{
                echo "Something Wrong";
            }

        $conn->close();
?>

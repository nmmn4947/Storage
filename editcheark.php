<?php
include 'db.php';
$conn=new mysqli($server_name,$user_name,$password,$database);
if ($conn->connect_error) {
    echo "errorororo";
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
//if (isset($_POST['update'])) {
        $ID = $_POST['itemid'];
        $ENG = $_POST['editnameENG'];
        $name = $_POST['editname'];
        $price = $_POST['editprice'];
        $number = $_POST['editnumber'];
        $unit = $_POST['editunit'];
        $unitENG = $_POST['editunitENG'];
        $img = $_POST['updetepic'];
        $category = $_POST['selects'];
echo $ID . $nameENG . $name . $price . $number . $unit . $unitENG . $img. $category;

//uploads image

$target_dir = "uploads/";
//$target_file = $target_dir . basename($_FILES["updatepic"]["name"]);

$imgname = $_FILES["updatepic"]["name"]; 

//$delete = "uploads/" . $Pic



$uploadOk = 1;

// Check if image file is a actual image or fake image
if(isset($_POST["update"])) {
$check = getimagesize($_FILES["updatepic"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
             $extension = pathinfo($imgname,PATHINFO_EXTENSION);
             $randomno=rand(0,100000);
             $rename='Upload'.date('Ymd').$randomno;
             $newname=$rename.'.'.$extension;
             

             $filename=$_FILES['updatepic']['tmp_name'];
             $start_updatepic = $target_dir . $newname;

//delete old img
             $sqld = "SELECT * FROM list where ID = $ID ";
                            $rowd = $conn->query($sqld);
                            $resultd = $rowd->fetch_assoc();
                            $saygoodbye = $resultd["picture"];
                            if(unlink($saygoodbye)){
                                echo "Let it gooooo!!!";
                            }

             if(move_uploaded_file($filename, $start_updatepic)) {

              //  if (move_uploaded_file($_FILES["updatepic"]["tmp_name"], $target_file)) {
                    echo "The file ". htmlspecialchars( basename( $_FILES["updatepic"]["name"])). " has been uploaded.";

                } else {
                    echo "Sorry, there was an error uploading your file.";
                            $sqlp = "SELECT * FROM list where ID = $ID ";
                            $row3 = $conn->query($sqlp);
                            $result = $row3->fetch_assoc();
                                $target_file = $result['picture'];
                                $uploadOk = 0;
                }
                        } else{
                            echo "File is not an image or you don't change image.";
                            $sqlp = "SELECT * FROM list where ID = $ID ";
                            $row3 = $conn->query($sqlp);
                            $result = $row3->fetch_assoc();
                            $start_updatepic = $result['picture'];
                                $uploadOk = 0;
            
        }
    }
       

        //ตรงนี้ update ค่า
                    $sql = "UPDATE list SET name='$name', nameENG='$ENG', price='$price', number='$number', unit='$unit', unitENG='$unitENG', picture='$start_updatepic', category='$category' where ID='$ID'";
                    $result = $conn->query($sql);

                    if($result === TRUE) {
                                echo $sql;
                                 echo "Record created success fully";
                                 header("Refresh:3,Admin.php");
                                 }
                        else{
                            echo "Something Wrong";
                        }
       // }
    }
                
?>
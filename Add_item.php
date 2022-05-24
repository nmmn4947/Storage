<?php
session_start();
include 'db.php';

$conn=new mysqli($server_name,$user_name,$password,$database);
if ($conn->connect_error) {
    echo "errorororo";
}

?>

<form action="Admin.php" method="post" value="back">
    <input type="submit" value="Back">
</form>

<form class="form" action="Add_item.php" method="post" enctype="multipart/form-data">
            <label for="nameENG">English Name</label><br>
            <input type="text" name="nameENG"><br> 
            <label for="name">Name</label><br>
            <input type="text" name="name"><br>
            <label for="price">Price</label><br>
            <input type="text" name="price"><br>
            <label for="number">Number</label><br>
            <input type="text" name="number"><br><br>
            <label for="number">unit</label><br>
            <input type="text" name="unit"><br><br>
            <label for="number">unitENG</label><br>
            <input type="text" name="unitENG"><br><br>
                    <label for="picture">
                        Select image to upload:
                        <input type="file" name="fileToUpload" id="fileToUpload">

                    </label><br><br>
                    <select id="ch" onchange="selectch()" name="category" autofocus>  <!-- ที่เลือกรูปเเบบ -->
                                    <option value=" ">---เลือก---</option>
                                    <option value="office">อุปกรณ์ใช้ในออฟฟิส</option>
                                    <option value="paper">กระดาษ</option>
                                    <option value="write">เครื่องเขียน</option>
                                    <option value="rope">เชือก</option>
                                    <option value="color">สี</option>
                                    <option value="classroom">อุปกรณ์ใช้ในห้องเรียน</option>
                    </select><br><br>
            <input type="submit" name="submit" value="Submit">


        </form>

<?php
    
// if post submit
if (isset($_POST['submit'])) {
        $ENG = $_POST['nameENG'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $number = $_POST['number'];
        $img = $_POST['picture'];
        $category = $_POST['category'];
        $unit = $_POST['unit'];
        $unitENG = $_POST['unitENG'];
        
        
      
        


    if((empty($_POST["name"])) or (empty($_POST["price"])) or (empty($_POST["number"])) or (empty($_POST["nameENG"]))){
        echo "NO moreeeeeee";

     
                }else{
                    $sql="SELECT * from list where name='$name'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo "not enough";
                        
                        
                    }else{
                    
                        $target_dir = "uploads/";
                        //$target_file = $target_dir . basename($_FILES["updatepic"]["name"]);
                        
                        $imgname = $_FILES["fileToUpload"]["name"]; 
                        
                        //$delete = "uploads/" . $Pic
                        
                        
                        
                        $uploadOk = 1;
                        
                        // Check if image file is a actual image or fake image
                        if(isset($_POST["submit"])) {
                        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                            if($check !== false) {
                                echo "File is an image - " . $check["mime"] . ".";
                                $uploadOk = 1;
                                    // if($uploadOk == 1){
                                    //     unlink($target_dir . $Pic);
                                    // }
                                     $extension = pathinfo($imgname,PATHINFO_EXTENSION);
                                     $randomno=rand(0,100000);
                                     $rename='Upload'.date('Ymd').$randomno;
                                     $newname=$rename.'.'.$extension;
                                     
                        
                                     $filename=$_FILES['fileToUpload']['tmp_name'];
                                     $target_file = $target_dir . $newname;
                        
                                     if(move_uploaded_file($filename, $target_file)) {
                        
                                      //  if (move_uploaded_file($_FILES["updatepic"]["tmp_name"], $target_file)) {
                                            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                        
                                        } 
                                          //insert to databese
                                        $sqlg = "INSERT INTO list (`name`, `nameENG`, `price`, `number`, `amount`, `unit`, `unitENG`, `picture`, `category`, `Status`, `mess`) 
                                                            VALUES('$name', '$ENG', '$price', '$number', 0, '$unit', '$unitENG', '$target_file', '$category', '',  '')";
                
                                        if($conn->query($sqlg) === TRUE) {
                                            echo "Record created success fully";
                                            } 
                                            else {
                                                    echo "EROEOROROREOR" . $conn->error;
                                            }
                                        } 
                    }
                }
            }
    
}

?>   


     



        
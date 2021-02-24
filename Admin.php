<?php

include 'db.php';

$conn=new mysqli($server_name,$user_name,$password,$database);
if ($conn->connect_error) {
    echo "errorororo";
}

?>
<!DOCTYPE html>
<html>

    <head>
        <title> Fetch Data From Database</title>
        <link rel="stylesheet" href="styles.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
        
    </head>

<body>

<h1>Admin Menu</h1>
    <button class="moveright" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-list-alt"></span> History</button>

        <form class="form" action="Admin.php" method="post" enctype="multipart/form-data">
            <label for="product">Name</label><br>
            <input type="text" name="product"><br>
            <label for="price">Price</label><br>
            <input type="text" name="price"><br>
            <label for="number">Number</label><br>
            <input type="text" name="number"><br>
                    <label for="picture">
                        Select image to upload:
                        <input type="file" name="fileToUpload" id="fileToUpload">

                    </label><br>
            <input type="submit" name="submit" value="Submit">
            <input type="submit" name="Edit" value="Edit">

        </form>


<?php 
    

    
    if ((isset($_POST['accept']))){


        $ID= $_POST['ID'];
        
        
        $sql = "UPDATE list_name SET Status='Accept' WHERE ID='$ID' ";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
          } 
        }

        if ((isset($_POST['reject']))){


            $ID= $_POST['ID'];
            
            
            $sql = "UPDATE list_name SET Status='Reject' WHERE ID='$ID' ";
            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
              } 
            }
           



        

?>









        <?php
        if (isset($_POST['Edit'])) {
            
            if((empty($_POST["product"])) or (empty($_POST["price"])) or (empty($_POST["number"]))){
                echo "NO moreeeeeee";
            } else{
                $product = $_POST['product'];
                $price = $_POST['price'];
                $number = $_POST['number'];
                
                $sql = "UPDATE list SET price='$price',number='$number' WHERE name='$product'";
        
                if($conn->query($sql) === TRUE) {
                echo "Record created success fully 2";
                } else {
                        echo "EROEOROROREOR" . $conn->error;
                }
            }
        }

        ?>
    <br></br>










        <?php

        if (isset($_POST['submit'])) {

                $product = $_POST['product'];
                $price = $_POST['price'];
                $number = $_POST['number'];
                
                
                

                
        

            if((empty($_POST["product"])) or (empty($_POST["price"])) or (empty($_POST["number"]))){
                echo "NO moreeeeeee";
            }else{
                $sql="SELECT * from list where name='$product'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "not enough";
                    
                    
                }else{
                
                        $target_dir = "uploads/";
                        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                        // Check if image file is a actual image or fake image
                        if(isset($_POST["submit"])) {
                        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                        if($check !== false) {
                            echo "File is an image - " . $check["mime"] . ".";
                            $uploadOk = 1;
                        } else {
                            echo "File is not an image.";
                            $uploadOk = 0;
                        }
                        }

                        // Check if file already exists
                        if (file_exists($target_file)) {
                        echo "Sorry, file already exists.";
                        $uploadOk = 0;
                        }


                        // Check if $uploadOk is set to 0 by an error
                        if ($uploadOk == 0) {
                        echo "Sorry, your file was not uploaded.";
                        // if everything is ok, try to upload file
                        } else {
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
                        }
                
                $picture = $target_dir . basename($_FILES["fileToUpload"]["name"]);    
                $sql = "INSERT INTO list (name, price, number , picture) VALUES('$product', '$price', '$number', '$picture')";
               
        
                        if($conn->query($sql) === TRUE) {
                        echo "Record created success fully";
                        } else {
                                echo "EROEOROROREOR" . $conn->error;
                        }
                }
            }
        }

        ?>               

               
               
               
                <table id="table"><!--ตาราง 1 -->

                <tr>
                    <th colspan="5"><h2>Stock</h2></th>
                </tr>
                <t>
                    <th> ID </th>
                    <th> Name </th>
                    <th> Price </th>
                    <th> Number </th>
                    <th> Picture </th>
                </t>
                <?php
                $sql="SELECT * from list";
                $result=$conn->query($sql);

                    while($rows=mysqli_fetch_assoc($result))
                    {
                ?>
                        <tr>
                            <td><?php echo $rows["ID"]; ?></td>
                            <td><?php echo $rows['name']; ?></td>
                            <td><?php echo $rows['price']; ?></td>
                            <td><?php echo $rows['number']; ?></td>
                            <td><img src="<?php echo $rows['picture']; ?>" width="150px" height="150px" ></td>
                        </tr>
                <?php
                    }
            
                    
                ?>
                </table>
                <br><br><br>

            

                    




                        <?php
                        echo "<table id='table1'> <!--นี้คือตารางที่ 2 -->

                        <tr>
                            <th colspan='6'><h2>ใบเบิก</h2></th>
                        </tr>
                        <tr>
                            <th> ID </th>
                            <th> Name </th>
                            <th> Item </th>
                            <th> Quantity </th>
                            <th>-</th>
                            <th>-</th>
                        </tr>";
                        
                        $sql="SELECT * from list_name where Status ='Progress'";
                        $result=$conn->query($sql);
        
                        if ($result->num_rows > 0) {
                             
                            while($rows=mysqli_fetch_assoc($result))
                            {
                                if($rows["Status"] == "Progress"){

                                
                        
                             echo   "<tr> 
                                    <td>".$rows["ID"]."</td>
                                    <td>".$rows["Name"]."</td>
                                    <td>".$rows["Item"]."</td>
                                    <td>".$rows["Quantity"]."</td>
                                    <form action='Admin.php' method = 'POST'>
                                    <td><input type='submit'  name ='accept' value='Accept'></td>
                                    <td><input type='submit' name='reject' value='Reject'></td>
                                    <input type='hidden' name='ID' value=' ".$rows["ID"]."'>                                    
                                    </form> 
                                </tr>";

                       
                                }                        
                            
                            }
                        } else {
                            echo "<tr><td colspan='6'>0 Results</td></tr>";
                          }

                            
                        ?>
                            </table>
        
        





<form action="">
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

    
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon"></span> Comment</h4>
                </div>
            <div>
                    <table class="histroy">

                        <tr>
                            <th colspan="5"><h2>ประวัติ</h2></th>
                        </tr>
                        <t>
                            <th> ID </th>
                            <th> Name </th>
                            <th> Item </th>
                            <th> Quantity </th>
                            <th> Status </th>
                        </t>
                        <?php
                        $sql="SELECT * from list_name" ;
                        $result=$conn->query($sql);


                        while($row = $result->fetch_assoc())
                            {
                                

                        ?>
                                <tr>
                                    <td><?php echo $row["ID"]; ?></td>
                                    <td><?php echo $row['Name']; ?></td>
                                    <td><?php echo $row['Item']; ?></td>
                                    <td><?php echo $row['Quantity']; ?></td>
                                    <td><?php echo $row['Status']; ?></td>
                                </tr>
                                
                        <?php
                            }
                            $conn->close();
                            
                        ?>
                    </table>





                    
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success center-block" data-dismiss="modal">
                <span class="glyphicon "></span>Enter
                </button>
                
            </div>
            </div>
        </div>
    </div>
</form>
</body>
</html>
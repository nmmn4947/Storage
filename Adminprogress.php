<?php

$AR =$_GET['AR'];
echo $AR;

include 'db.php';

$conn=new mysqli($server_name,$user_name,$password,$database);
if ($conn->connect_error) {
    echo "errorororo";
}
?>









<?php

include 'db.php';

$conn=new mysqli($server_name,$user_name,$password,$database);
if ($conn->connect_error) {
    echo "errorororo";
}

?>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form action="Admin.php">
        <input type="submit" value="Back">
    </form>
    

<?php
                        echo "<table id='table1'> <!--นี้คือตารางคำขอใบเบิก -->

                        <tr>
                            <th colspan='7'><h2>คำขอใบเบิก</h2></th>
                        </tr>
                        <tr>
                            <th> ID </th>
                            <th> Name </th>
                            <th> Item </th>
                            <th> Comment </th>
                            <th>-</th>
                            <th>-</th>
                        </tr>";
                        $sql="SELECT * from send where Status ='กำลังดำเนินการ'";

                        
                        
                        $result=$conn->query($sql);
        
                        if ($result->num_rows > 0) {
                             
                            while($rows=mysqli_fetch_assoc($result))
                            {
                                if($rows["Status"] == "กำลังดำเนินการ"){

                                
                        
                             echo   "<tr> 
                                    <td>".$rows["BILL"]."</td>
                                    <td>".$rows["name"]."</td>
                                    <form action='item.php' method = 'POST'>
                                    <td><input type='submit' name='Show' value='ใบเบิก'></td>
                                    </form>
                                    <td>".$rows["mess"]."
                                    <form action='Adminprogress.php' method = 'POST'>
                                    <textarea  name='foo' rows='4' cols='50'></textarea>
                                    </td>
                                    <td><select id='AR' onchange='selectAR()' name='selects' autofocus>
                                    <option value='selecto'>---กรุณาเลือก---</option>
                                    <option value='accept'>ยินยอม</option>
                                    <option value='reject'>ไม่ยินยอม</option>
<<<<<<< HEAD
                                  </select>
                                  <input type='submit' value='submit12' >
=======
                                    </select>
                                    </td>
                                    <td><input type='submit' name='LOL' value='submit'></td>
>>>>>>> cd35ccedc302756f5428bc2c60c59e52b8fb0b91
                                    <input type='hidden' name='ID' value=' ".$rows["BILL"]."'>       
                           
                                    </form> 
                                </tr>";
                                

                         if(isset($_POST["LOL"])){

                            $foo= $_POST["foo"];
                            $selecs = $_POST["selects"];
                            $BILL_ID = $_POST["ID"];
                            $ins = "INSERT INTO messagead (BILL, mess) VALUES('$BILL, $foo')";
                            
                            if($selecs == "accept"){
                                $sqla = "UPDATE send SET Status='ยินยอม' WHERE BILL='$BILL' ";

<<<<<<< HEAD
                                
                                if(isset($_POST['submit12'])){
=======
>>>>>>> cd35ccedc302756f5428bc2c60c59e52b8fb0b91

                                if(empty($_POST["foo"])){    //ยอมรับเเบบไม่คอมเม้น
                                    $ar = "INSERT INTO messagead (BILL, mess) VALUES ('$BILL_ID', 'รับได้เลย') ";
                                    if($conn->query($sql) == TRUE){

<<<<<<< HEAD
                                
                                            if(empty($_POST["mess"])){
                                                $ar = "INSERT INTO messagead (BILL, mess) VALUES ('$BILL, รับได้เลย')";
                                                
                                            if($conn->query($ar) === TRUE) {
                                                    echo 'Record created success fully 2';
                                                    } else {
                                                            echo 'EROEOROROREOR' . $conn->error;
                                                            }  
                                                                        }

                                            else{ if($conn->query($ins) === TRUE) {
                                                echo 'Record created success fully 2';
                                                } else {
                                                        echo 'EROEOROROREOR' . $conn->error;
                                                        }
                                                }
                                                            
                                            }


                                    if (isset($_POST['reject'])){ //ไม่ยอมรับ
                                        
                                        if(empty($_POST["mess"])){
                                                echo 'กรุณากรอกข้อความ';
                                     } else{ 
                                         if($conn->query($ins) === TRUE) {
=======
                                    
                                    
                                if($conn->query($ar) === TRUE) {
>>>>>>> cd35ccedc302756f5428bc2c60c59e52b8fb0b91
                                        echo 'Record created success fully 2';
                                        } else {
                                                echo 'EROEOROROREOR' . $conn->error;
                                                }  
                                            }
                                                            }



                                
                                    if (!empty($_POST["foo"])){
                                      if  ($conn->query($ins) === TRUE){ 
                                        echo "Record updated successfully";
                                    } else {
<<<<<<< HEAD
                                            echo 'EROEOROROREOR' . $conn->error;
                                    }  
                       
                                }
                                                   
=======
                                        echo "Error updating record: " . $conn->error;
                                    }
                                 }
                                 
                                
                                     
                                            }


                            if($selecs == "reject"){
                                $sqltr = "UPDATE send SET Status='ไม่ยินยอม' WHERE BILL='$BILL' ";
                                
                                if(empty($_POST["foo"])){  //ไม่ยอมรับเเบบไม่คอมเม้น
                                    echo 'กรุณากรอกข้อความ';
                            } else{
                                if ($conn->query($ins)){
                                if ($conn->query($sqltr) === TRUE) {
                                    echo "Record updated successfully";
                                } else {
                                    echo "Error updating record: " . $conn->error;
                                  }
                                } 
                            }
                         }

                            if($selecs == "selecto"){
                                echo "กรุณาเลือก";
                            }
                            }       
>>>>>>> cd35ccedc302756f5428bc2c60c59e52b8fb0b91
                            
                        


                            
<<<<<<< HEAD
                            if(isset($_POST['selecto'])){
                                echo 'กรุณาเลือก';
                            }
                        }
                    }
                }
            }
                         else {
                            echo "<tr><td colspan='6'>0 Results</td></tr>";
                          }
                        
                            
                        ?>
                            </table>



                            <?php 
    

    
    if (isset($_POST['accept'])){


        $ID= $_POST['ID'];
        
        
        $sql = "UPDATE send SET Status='ยินยอม' WHERE BILL='$BILL' ";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
          } 
        }

        if (isset($_POST['reject'])){


            $ID= $_POST['ID'];
            
            
            $sql = "UPDATE send SET Status='ไม่ยินยอม' WHERE BILL='$BILL' ";
            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
              } 
            }
           
        

    
        

?>
=======
                        
                        }else {
                            echo "<tr><td colspan='6'>0 Results</td></tr>";
                          }

                        }

                        
                    }
                        ?>
                            </table>

>>>>>>> cd35ccedc302756f5428bc2c60c59e52b8fb0b91
                            </body>


<script>
    function selectAR(){
        var x = document.getElementBYId("AR");
        var i = x.selectedIndex;
        window.location.href = "Adminprogress.php?AR=" +.options[i].text;
        
    }
</script>


</html>
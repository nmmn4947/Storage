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
    

<?php
                        echo "<table id='table1'> <!--นี้คือตารางที่ 2 คำขอใบเบิก -->

                        <tr>
                            <th colspan='7'><h2>ใบเบิก</h2></th>
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
                        $ins = "INSERT INTO messageu (BILL, mess, time) VALUES('$BILL, $mess, $time') where $BILL";
                        $ar = "INSERT INTO senda (BILL, mess time) VALUES('$BILL, $mess, $time')"
                        
                        $result=$conn->query($sql);
        
                        if ($result->num_rows > 0) {
                             
                            while($rows=mysqli_fetch_assoc($result))
                            {
                                if($rows["Status"] == "กำลังดำเนินการ"){

                                
                        
                             echo   "<tr> 
                                    <td>".$rows["BILL"]."</td>
                                    <td>".$rows["name"]."</td>
                                    <form action='item.php' method = 'POST'>
                                    <td><input type='submit' name='Show' value='Item'></td>
                                    </form>
                                    <td>".$rows["mess"]."
                                    <form action='Admin.php' method = 'POST'>
                                    <textarea  name='foo' rows='4' cols='50'></textarea>
                                    </td>
                                    <td><input type='submit'  name ='accept' value='ยินยอม'></td>
                                    <td><input type='submit' name='reject' value='ไม่ยินยอม'></td>
                                    <input type='hidden' name='ID' value=' ".$rows["BILL"]."'>       
                           
                                    </form> 
                                </tr>";

                                if($conn->query($ins) === TRUE) {
                                    echo 'Record created success fully 2';
                                    } else {
                                            echo 'EROEOROROREOR' . $conn->error;
                                    }  
                       
                                }                        
                            
                            }
                        } else {
                            echo "<tr><td colspan='6'>0 Results</td></tr>";
                          }

                            
                        ?>
                            </table>



                            <?php 
    

    
    if ((isset($_POST['accept']))){


        $ID= $_POST['ID'];
        
        
        $sql = "UPDATE send SET Status='ยินยอม' WHERE BILL='$BILL' ";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
          } 
        }

        if ((isset($_POST['reject']))){


            $ID= $_POST['ID'];
            
            
            $sql = "UPDATE send SET Status='ไม่ยินยอม' WHERE BILL='$BILL' ";
            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
              } 
            }
           



        

?>
                            </body>
</html>
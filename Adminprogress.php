
<?php
session_start();
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
                            <th colspan='10'><h2>คำขอใบเบิก</h2></th>
                        </tr>
                        <tr>
                            <th> เวลา </th>
                            <th> รหัสใบเบิก </th>
                            <th> ผู้สั่งเบิก </th>
                            <th> ชื่อ </th>
                            <th> จำนวน </th>
                            <th> ที่เหลือ </th>
                            <th> ราคา </th>
                            <th> ภาพ </th>
                            <th> หมายเหตุ/สาเหตุ </th>
                            <th>  </th>
                        </tr>";

                        $sql="SELECT * from send where Status ='กำลังดำเนินการ'";

                        
                        
                        $result=$conn->query($sql);
        
                        if ($result->num_rows > 0) {
                             
                            while($rows=mysqli_fetch_assoc($result))
                            {
                                if($rows["Status"] == "กำลังดำเนินการ"){

                                    $BILLA = $rows['BILL'];
                                
                                    $ddd = "SELECT Name FROM email where BILL = $BILLA";
                                    $SELE=$conn->query($ddd);
                        
                             echo   "<tr> 
                                    <td>".$rows["time"]."</td>
                                    <td>".$rows["OrderID"]."</td>
                                    <td>".$rows["BILL"]." <button> info ".$SELE. "</button></td>
                                    <td>".$rows["name"]."</td>
                                    <td>".$rows["amount"]."</td>
                                    <td>".$rows["number"]."</td>
                                    <td>".$rows["price"]."</td>
                                    <td><img src='".$rows["picture"]." 'width='150' ></td>
                                    <form action='AR.php' method = 'POST'>
                                    <td>
                                    <textarea id='foo' name='foo' rows='4' cols='50'></textarea>
                                    </td>
                                    <td>
                                    <input type='submit' name='rej' value='ปฎิเสธ'>
                                    <input type='submit' name='acc' value='ยอมรับ'>
                                    <input type='hidden' name='ID1' value='".$rows["OrderID"]."'>
                                    <input type='hidden' name='ID2' value='".$rows["name"]."'>
                                    </form>
                                    </td> </tr>";  
                                }
                            }
                        }
                                
                    //      if(isset($_POST["selects"])){

                    //         $foo= $_POST["foo"];
                    //         $selecs = $_POST["selects"];
                    //         $BILL_ID = $_POST["ID"];
                    //         echo $selecs;
                    //         echo $foo;
                    //         $ins = "INSERT INTO messagead (BILL, mess) VALUES ('$BILL_ID', '$foo') ";
                            
                    //         if($selecs == "accept"){
                    //             $sqla = "UPDATE send SET Status='ยินยอม' WHERE BILL='$BILL_ID' ";



                    //             if(empty($_POST["foo"])){    //ยอมรับเเบบไม่คอมเม้น
                    //                 $ar = "INSERT INTO messagead (BILL, mess) VALUES ('$BILL_ID', 'รับได้เลย') ";
                                    
                                    
                    //                 if($conn->query($sqla) == TRUE){
                    //                     echo 'Record Update success fully, ';
                    //                 }else {
                    //                         echo 'EROEOROROREOR' . $conn->error;
                    //                         }
                                        
                                    
                                    
                    //             if($conn->query($ar) === TRUE) {
                    //                     echo 'Record created success fully 2';
                    //                     } else {
                    //                             echo 'EROEOROROREOR' . $conn->error;
                    //                             }  
                                            
                    //                                         }



                                
                    //                 if (!empty($_POST["foo"])){
                    //                   if  ($conn->query($ins) === TRUE){ 
                    //                     echo "Record updated successfully";
                    //                 } else {
                    //                     echo "Error updating record: " . $conn->error;
                    //                 }
                    //              }
                                 
                                
                                     
                    //                         }


                    //         if($selecs == "reject"){
                    //             $sqltr = "UPDATE send SET Status='ไม่ยินยอม' WHERE BILL='$BILL' ";
                                
                    //             if(empty($_POST["foo"])){  //ไม่ยอมรับเเบบไม่คอมเม้น
                    //                 echo 'กรุณากรอกข้อความ';
                    //         } 
                    //         if (!empty($_POST["foo"])){
                    //             if  ($conn->query($ins) === TRUE){ 
                    //               echo "Record updated successfully";
                    //           } else {
                    //               echo "Error updating record: " . $conn->error;
                    //           }
                    //        }
                    //      }

                    //         if($selecs == "selecto"){
                    //             echo "กรุณาเลือก";
                    //         }
                    //         }       
                            
                        


                            
                        
                    //                                                                 }

                    //     }

                        
                    // }else {
                    //     echo "<tr><td colspan='8'>0 Results</td></tr>";
                    //   }
    ?>
        </table>
    </body>
</html>
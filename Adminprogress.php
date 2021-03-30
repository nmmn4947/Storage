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
                                    <td>
                                    <form action='Adminprogress.php' method = 'POST'>
                                    <textarea  name='foo' rows='4' cols='50'></textarea>
                                    </td>
                                    <td><select id='AR' onchange='selectAR()' name='selects' autofocus>
                                    <option value='selecto'>---กรุณาเลือก---</option>
                                    <option value='accept'>ยินยอม</option>
                                    <option value='reject'>ไม่ยินยอม</option>
                                    </select>
                                    </td>
                                    <td><input type='submit' name='LOL' value='submit'></td>
                                    <input type='hidden' name='ID' value=' ".$rows["BILL"]."'>       
                           
                                    </form> 
                                </tr>";
                                

                         if(isset($_POST["LOL"])){

                            $foo= $_POST["foo"];
                            $selecs = $_POST["selects"];
                            $BILL_ID = $_POST["ID"];
                            $ins = "INSERT INTO messagead (BILL, mess) VALUES ('$BILL_ID', '$foo') ";
                            
                            if($selecs == "accept"){
                                $sqla = "UPDATE send SET Status='ยินยอม' WHERE BILL='$BILL_ID' ";


                                if(empty($_POST["foo"])){    //ยอมรับเเบบไม่คอมเม้น
                                    $ar = "INSERT INTO messagead (BILL, mess) VALUES ('$BILL_ID', 'รับได้เลย') ";
                                    
                                    if($conn->query($sqla) == TRUE){
                                        echo 'Record Update success fully, ';
                                    }else {
                                            echo 'EROEOROROREOR' . $conn->error;
                                            }
                                        
                                    
                                    
                                if($conn->query($ar) === TRUE) {
                                        echo 'Record created success fully 2';
                                        } else {
                                                echo 'EROEOROROREOR' . $conn->error;
                                                }  
                                            
                                                            }



                                
                                    if (!empty($_POST["foo"])){
                                      if  ($conn->query($ins) === TRUE){ 
                                        echo "Record updated successfully";
                                    } else {
                                        echo "Error updating record: " . $conn->error;
                                    }
                                 }
                                 
                                
                                     
                                            }


                            if($selecs == "reject"){
                                $sqltr = "UPDATE send SET Status='ไม่ยินยอม' WHERE BILL='$BILL' ";
                                
                                if(empty($_POST["foo"])){  //ไม่ยอมรับเเบบไม่คอมเม้น
                                    echo 'กรุณากรอกข้อความ';
                            } 
                            if (!empty($_POST["foo"])){
                                if  ($conn->query($ins) === TRUE){ 
                                  echo "Record updated successfully";
                              } else {
                                  echo "Error updating record: " . $conn->error;
                              }
                           }
                         }

                            if($selecs == "selecto"){
                                echo "กรุณาเลือก";
                            }
                            }       
                            
                        


                            
                        
                        }else {
                            echo "<tr><td colspan='6'>0 Results</td></tr>";
                          }

                        }

                        
                    }
                        ?>
                            </table>

                            </body>


<script>
    function selectAR(){
        var x = document.getElementBYId("AR");
        var i = x.selectedIndex;
        window.location.href = "Adminprogress.php?AR=" +.options[i].text;
        
    }
</script>


</html>
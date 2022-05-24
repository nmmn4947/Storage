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
        <link rel="stylesheet" href="sttles.css">
    </head>
<body>
    <form action="data.php" method="post">
        <input type='text' name='wher' >
        <input type=hidden  value="<?php echo 'wher'; ?>">
        <input type="submit">
    </form>                        
        <br>
    <table>
                <?php
                            
                    if ((isset($_POST["wher"])) and (!empty($_POST["wher"]))) {
                    $where=$_POST['wher'];
                            
                ?>

        <table class="datatable">
                <?php
                $sql2="SELECT * From Email where BILL LIKE '%$wher%'";
                $result2=$conn->query($sql2);
                ?>

                        <t>
                            <th> ID </th>
                            <th> BILL </th>
                            <th> Email </th>
                            <th> Name </th>
                            <th> Picture </th>
                        </t>
                                <tr>
                                    <td><?php echo $rows["ID"]; ?></td>
                                    <td><?php echo $rows['BILL']; ?></td>
                                    <td><?php echo $rows['Email']; ?></td>
                                    <td><?php echo $rows['Name']; ?></td>
                                    <td><img src="<?php echo $rows['upic']; ?>" width="150px" height="150px" ></td>
                                </tr>

        </table><br><br>


                        <table class="datatable">
                            <tr>
                                <th colspan="5"><h2>Data</h2></th>
                            </tr>
                            <t>
                                <th> ID </th>
                                <th> BILL </th>
                                <th> Item </th>
                                <th> Quantity </th>
                                <th> Status </th>
                            </t>
                            <?php
                                $sql="SELECT * from list_name where BILL LIKE '%$where%'";
                                $result=$conn->query($sql);

                                while($rows=mysqli_fetch_assoc($result))
                                {
                            ?>



                                <tr>
                                    <td><?php echo $rows["ID"]; ?></td>
                                    <td><?php echo $rows['BILL']; ?></td>
                                    <td><?php echo $rows['Item']; ?></td>
                                    <td><?php echo $rows['Quantity']; ?></td>
                                    <td><?php echo $rows['Status']; ?></td>
                                </tr> 
                                <?php
                					
                                }
                                
                                ?> 

                        </table>
                <?php
                					
                                                                                     }
                ?>
        </table>  
</body>
</html>                        
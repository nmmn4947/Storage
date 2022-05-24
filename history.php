<?php

                include 'db.php';

                $conn=new mysqli($server_name,$user_name,$password,$database);
                if ($conn->connect_error) {
                    echo "errorororo";
                }

                ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>
        <body>
                

                <table class="histroy">

                <tr>
                    <th colspan="5"><h2>ประวัติ</h2></th>
                </tr>
                <t>
                    <th> Date </th>
                    <th> BILL </th>
                    <th> name </th>
                    <th> items </th>
                    <th> Status </th>
                </t>
                <?php
                $sql="Select BILL, name, price, Status from send 
                INNER JOIN item on send.BILL=item.BILL" ;
                $result=$conn->query($sql);


                while($row = $result->fetch_assoc())
                    {
                        

                ?>
                        <tr>
                            <td><?php echo $row['Date']; ?></td>
                            <td><?php echo $row['BILL']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['item']; ?></td>
                            <td><?php echo $row['Status']; ?></td>
                        </tr>
                        
                <?php
                    }
                    $conn->close();
                    
                ?>
                </table>
        </body>
</html>
<?php
session_start();

include 'db.php';

$connection=new mysqli($server_name,$user_name,$password,$database);
if ($connection->connect_error) {
    echo "erroro";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
	        <style>
	    main {
    		display: flex;
    	}
	    body {
		  font-family: Arial;
          max-width: 100% !important;
          width:  100%;
        }
        </style>


</head>
<body>
<form action="account.php" method="post">
	<input type="submit" name="buh" value="back">
	</form>
<table>
		<th>Sent Time</th>
		<th>item</th>
		<th>amount</th>
		<th>Message</th>
		<th>Verify time</th>
							<?php
							$billy = $_SESSION['Bill'];
							$yamum = 0;
							$sql3="SELECT * From send where BILL='$billy'";
							$result3=$connection->query($sql3);
                			if ($result3->num_rows > 0) {
                				while($row3=mysqli_fetch_assoc($result3))
                				    {?>
                				    	<tr>
										<td><?php echo $row3['time'];?></td>
										<td><?php echo $row3['name'];?></td>
										<td><?php echo $row3['amount']; echo $row3['unit'];?></td>
                						<td><?php echo $row3['mess']; ?></td>
										<td><?php echo $row3['sendtime'];?></td>
                						</tr>
                			<?php
                					}
                			}
                			 ?>
	</table>
    </body>
    </html>
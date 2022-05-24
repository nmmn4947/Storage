<?php
session_start();

include 'userhere.php';

include 'db.php';

$connection=new mysqli($server_name,$user_name,$password,$database);
if ($connection->connect_error) {
    echo "erroro";
}
?>
<!DOCTYPE html>
<html>
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
		.right {
			position: absolute;
			left: 90%;
		}
</style>
</head>
<body>
	<form action="Face.php" method="post">
	<input type="submit" name="bruh" value="back">
	</form>
	<form action="logout.php" method="post">
	<input type="submit" name="sumbit" value="logout">
	</form>
	<form action="achis.php" method="post">
	<input type="submit" name="Hs" value="History">
	</form>
	<table>
		<th>BILL</th>
		<th>Name</th>
		<th>Email</th>
			<tr>
				<td><?php echo $_SESSION['Bill']; ?></td>
                <td><?php echo $_SESSION['Name']; ?></td>
				<td><?php echo $_SESSION['Email']; ?></td>
			</tr>
	</table>
	<br><hr>
	<table>
		<th>Sent Time</th>
		<th>item</th>
		<th>amount</th>
		<th>Message</th>
		<th> </th>
		<th>Verify time</th>
							<?php
							$billy = $_SESSION['Bill'];
							$yamum = 0;
							$sql3="SELECT * From send where BILL='$billy' AND Status='ยินยอม' OR Status='ปฎิเสธ' OR Status='กำลังดำเนินการ'";
							$result3=$connection->query($sql3);
                			if ($result3->num_rows > 0) {
                				while($row3=mysqli_fetch_assoc($result3))
                				    {?>
                				    	<tr>
										<td><?php echo $row3['time'];?></td>
										<td><?php echo $row3['name'];?></td>
										<td><?php echo $row3['amount']; echo $row3['unit'];?></td>
                						<td><?php echo $row3['mess']; ?></td>
										<td><form action="grab.php" method="POST"><?php echo $row3['Status']; if($row3['Status'] == "ยินยอม"){?>
										<input type="submit" name="grab" value="รับของแล้ว">
											<?php } elseif($row3['Status'] == "ปฎิเสธ") { ?>
												<input type="submit" name="sadno" value="ทราบแล้ว">
											<?php } else {
												$yamum = 1;
											 } ?><input type="hidden" name="oh" value="<?php echo $row3['name']; ?>">
													<input type="hidden" name="naw" value="<?php echo $row3['OrderID']; ?>">
											</td>
										<td><?php echo $row3['sendtime'];?><?php if ($yamum == 1){ ?><input type="submit" name="stop" value="ยกเลิก"><?php } ?></form></td>
                						</tr>
                			<?php
                					}
                			}
                			 ?>
	</table>
</body>
</html>
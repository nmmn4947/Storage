<?php

include 'db.php';

$connection=new mysqli($server_name,$user_name,$password,$database);
if ($connection->connect_error) {
    echo "erroro";
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="Face.css">
</head>
<body>
	<h1>ประวัติ</h1>
	<form action="Admin.php" method="post">
		<button>กลับ</button>
	</form>

	<table class="table table-hover">
		<th>ใบเบิก</th>
		<th>ผู้เบิก</th>
		<th>สถานะ</th>
		<th>ชื่อ</th>
		<th>จำนวน</th>
		<th>ข้อความ</th>
		<th>เวลา</th>
		<?php
			$kk = "SELECT * FROM send";
                    $ll=$connection->query($kk);
                    while($rr=mysqli_fetch_assoc($ll))
                    {
                    	?>
                        <input type="hidden" name="plo" value="<?php echo $rr['OrderID'];?>">
                        <tr>
						<td><?php echo $rr['OrderID']; #SELECT DISTINCT OrderID FROM send?></td>
						<td><?php echo $rr['BILL']; ?></td>
						<td><?php echo $rr['name'];?></td>
						<td><?php echo $rr['number']; echo $rr['unit']; ?></td>
						<td><?php echo $rr['Status'];?></td>
						<td><?php echo $rr['mess'];?></td>
						<td><?php echo $rr['time']; ?></td>
                        </tr>
            
            <?php
        }
		?>
	</table>
</body>
</html>
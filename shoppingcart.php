<?php

	include 'db.php';

	$connection=new mysqli($server_name,$user_name,$password,$database);
	if ($connection->connect_error) {
   	echo "erroro";
	}

$sql="SELECT * from shop2";
$result=$connection->query($sql);
?>

<!DOCTYPE html>
<html>
	<head>
	    <title>shoppu</title>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	</head>
<body>
	<div>
		   <table class="table table-hover">
		   		<form action="Face.php">
				<tr>
        			<th colspan="4"><h2>รายการเบิกยืม</h2></th><th><button>back</button></th>
    			</tr>
		   		</form>
    			<t>
        			<th> name </th>
        			<th> price </th>
        			<th> number </th>
    			</t>
    			<?php
        			while($rows=mysqli_fetch_assoc($result))
        			{
                        $DI=$rows["ID"];
    			?>
            			<tr>
                			<td><?php echo $rows['name']; ?></td>
                			<td><?php echo $rows['price']; ?></td>
                			<td><?php echo $rows['number']; ?></td>
                			<td><form action="update.php" method="post">
                                <input type="number" name="plustext" min="1">
                                <input type="hidden" name="kong5" value="<?php echo $rows['name']; ?>">
                                <input type="submit" name="upu-dateto" value="UPDATE"></form></td>
                            <td><form action="bruh.php" method="post"><input type="submit" name="minustext" value="DELETE"><input type="hidden" name="DI" value="<?php echo $DI; ?>"></form></td>
            			</tr>
    			<?php
        			}
    			?>
    		</table>
	</div>
	<form action="" method="" ><input type="submit" name="confirmation" value="Confirm"></form>
</body>
</html>
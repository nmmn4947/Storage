<?php
session_start();

include 'db.php';
$connection=new mysqli($server_name,$user_name,$password,$database);
if ($connection->connect_error) {
	echo "erroro";
}

$pd="UPDATE shop2 SET Status='กำลังดำเนินการ' WHERE Status = ''";
$connection->query($pd);
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
        <style>
        main {
            display: flex;
        }

        body {
          font-family: Arial;
          max-width: 100%;
          width:  100%;

        }
        </style>
	</head>
<body>
<a href="shoppingcart.php"><img src="img/THAI.png" width="100px" height="60px"></a>
	<div>
		   <table class="table table-hover">
		   		<form action="FaceENG.php">
				<tr>
        			<th colspan="4"><h2>list of items</h2></th><th><button>back</button></th>
    			</tr>
		   		</form>
    			<t>
        			<th> name </th>
        			<th> price </th>
        			<th> amount </th>
                    <th> edit amount </th>
                    <th> unit </th>
                    <th> </th>
    			</t>
    			<?php
                	$Totap = 0;
					$ui=$_SESSION['Bill'];
					$sql="SELECT * from shop2 WHERE BILL='$ui'";
					$result=$connection->query($sql);

        			while($rows=mysqli_fetch_assoc($result))
        			{
                        $DI=$rows["ID"];
                        $qey=$rows["amount"];
    			?>
            			<tr>
                			<td><?php echo $rows['nameENG']; ?></td>
                			<td><?php echo $rows['price']; $Totap = $Totap + ($rows['price'] * $rows['amount']); ?></td>
                			<td><?php echo $rows['amount']; ?></td>
                			<td><form action="updateENG.php" method="post">
                                <input type="number" name="plustext" min="1" max="<?php echo $rows['number']; ?>">
                                <input type="hidden" name="kong5" value="<?php echo $rows['name']; ?>">
                                <input type="submit" name="upu-dateto" value="edit"></form></td>
                            <!--<td><form action="unit.php" method="post">
								<input type="text" name="uruni">
								<input type="hidden" name="hide" value="<?php //echo $rows['picture']; ?>">
								<input type="submit" name="upu-unito" value="Submit">
							</form></td>-->
							<td><?php echo $rows['unitENG']; ?></td>
                            <td><form action="bruhENG.php" method="post"><input type="submit" name="minustext" value="DELETE"><input type="hidden" name="DI" value="<?php echo $DI; ?>"></form>
                                    <form action="Confirm.php" method="post"><input type="hidden" name="par" value="<?php echo $rows['amount']?>"></form>
                            </td>
            			</tr>

                                
    			<?php
        			}
    			?>
                        <tr>
                            <td>Total</td>
                            <td><?php echo $Totap;?></td>
                        </tr>
    		</table>
	</div>
    <form action="Confirm.php" method="post">
            <input type="submit" name="confirmation" value="ตกลง">
    </form>
</body>
</html>
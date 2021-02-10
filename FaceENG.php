<style>
.modal-header, h4, .close{
	background-color: grey;
	color: #fff !important;
	text-align: center;
	font-size: 30px;
}

.modal-header, .modal-body {
	padding: 40px 50px;
	color: black;
}
.centor {
	width: 100px;
	height: 60px;
	padding: 0px 1820px;
}
</style>

<?php

include 'db.php';

$connection=new mysqli($server_name,$user_name,$password,$database);
if ($connection->connect_error) {
    echo "erroro";
}
 	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$mew = $_POST['berk1'];
 		$zensql="SELECT * from shop2 where picture='$mew'";
                $resulte = $connection->query($zensql);

                if ($resulte->num_rows > 0) {
                    echo "BRUH ma toaster is making pasta";
                }
                else{
;
		$newsql="INSERT into shop2 (name, price, number, picture) SELECT name, price, number, picture from listeng WHERE picture='$mew'";
		if ($connection->query($newsql) === TRUE) {
		} else {
			echo "Erorrrorororororororororo"; 
			$connection->error;
		}
	}
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Fetch Data From Database</title>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="Face.css">
		<style>

		body {
		  font-family: Arial;
		}

		* {
		  box-sizing: border-box;
		}

		form.example input[type=text] {
		  padding: 10px;
		  font-size: 17px;
		  border: 1px pink;
		  width: 80%;
		  background: #f1f1f1;
		}

		form.example button {
		  float: center;
		  width: 10%;
		  padding: 15px;
		  background: white;
		  color: black;
		  font-size: 17px;
		  border: 1px solid grey;
		  cursor: pointer;
		}

		form.example button:hover{
		  background: pink;
		}

		form.example::after {
		  clear: both;
		  display: table;
		}
	</style>
    </head>
<body>
	<h1>Storage</h1>
	<a href="Face.php" class="right2"><img src="img/THAI.png" width="100px" height="60px"></a>
	<form class="nice" action="shoppingcart.php">
		<button>Cart</button>
	</form>

	<form class="example" action="FaceENG.php" method="post">
  		<input type="text" placeholder="Search.." name="where">
  		<i class="fa fa-search"><input type="submit" name="where2" value="Search"></i>
  		<input type="hidden" name="no" value="<?php echo 'where'; ?>">
	</form>
	<div>
		   <table class="table table-hover">
    			<t>
        			<th> Name </th>
        			<th> Price(Bath) </th>
        			<th> Amount </th>
        			<th>  </th>
    			</t>

    		<?php
			if ((isset($_POST["where"])) and (!empty($_POST["where"]))) {
				$where=$_POST['where'];
    		?>
            			<tr>
                			<?php 

							$sql2="SELECT * From listeng where name='$where'";
							$result2=$connection->query($sql2);
                			if ($result2->num_rows > 0) { 
                				while($row2=mysqli_fetch_assoc($result2))
                				    {?>	
                				    	<form action="FaceENG.php" method="post">
                				    	<input type="hidden" name="berk1" value="<?php echo $row2['picture'];?>">
                				    	<input type="hidden" name="berk2" value="<?php echo $row2['price'];?>">
                				    	<tr>
                						<td><?php echo $row2['name']; ?></td>
                						<td><?php echo $row2['price']; ?></td>
                						<td><?php echo $row2['number']?></td>
                						<td><input type="number" name="plustext" min="1"><input type="submit" name="berk" value="Add"></td></form>
                						<td><img src="<?php echo $row2['picture']; ?>" width="150px"></td>
                						</tr>
                			<?php
                					}
                			}
                			 ?>
    			<?php
			}
			else{
					$sql="SELECT * from listeng";
					$result=$connection->query($sql);
			
        			while($rows=mysqli_fetch_assoc($result))
        			{
    		?>
    					<form action="FaceENG.php" method="post">
    					<input type="hidden" name="berk1" value="<?php echo $rows['picture'];?>">
            			<tr>
                			<td><?php echo $rows['name']; ?></td>
                			<td><?php echo $rows['price']; ?></td>
                			<td><?php echo $rows['number']; ?></td>
            				<td><input type="number" name="plustext" min="1"><input type="submit" value="Add"></td></form>
            				<td><img src="<?php echo $rows['picture']; ?>" width="150px"></td>
            			</tr>
    			<?php
        			}
        	}
    			?>
    		</table>
	</div>
</body>
</html>
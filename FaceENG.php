<?php
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
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="Face.css">
		
		<style>
        main {
            display: flex;
        }
		
		body {
		  font-family: Arial;
          max-width: 100% !important;
          width:  100%;

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

		form.example button:hover {
		  background: pink;
		}

		form.example::after {
		  clear: both;
		  display: table;
		}
	</style>
    </head>
<body>
	<h1>Mathayom Storage</h1>
	<a href="Face.php"><img src="img/THAI.png" width="100px" height="60px"></a>
    <form action="account.php" method="post" class="right">
        <input type="submit" name="acc" value="Profle">
    </form>
    <form class="example" action="FaceENG.php" method="post">
        <input type="text" placeholder="Search.." name="where">
        <i class="fa fa-search"><input type="submit" name="where2" value="Search"></i>
        <input type="hidden" value="<?php echo 'where'; ?>">
    </form>
    <form action="shoppingcartENG.php" class="right">
        <div class=""><button>cart</button></div>
    </form>
    <form action="FaceENG.php" method="post">
    <label for="cate">category</label>
    <select name="cate">
       <option value="write">Stationery</option>
       <option value="office">Office_equipments</option>
       <option value="paper">Paper_types</option>
       <option value="color">All_kinds_of_colors</option>
       <option value="room">Appliance_in_classroom</option>
       <option value="rope">Rope</option>
    </select>
    <input type="submit" value="Chose">
    </form>
	<div>
		   <table class="table table-hover">
    			<t>
        			<th> Name </th>
        			<th> Price(Bath) </th>
        			<th> Pieces </th>
					<th> unit</th>
        			<th>  </th>
        			<th> Picture </th>
    			</t>

    		<?php

			if ((isset($_POST["where"])) and (!empty($_POST["where"]))) {
				$where=$_POST['where'];
    		?>
            			<tr>
                			<?php 

							$sql2="SELECT * From list where nameENG LIKE '%$where%'";
							$result2=$connection->query($sql2);
                			if ($result2->num_rows > 0) { 
                				while($row2=mysqli_fetch_assoc($result2))
                				    {?>
                				    	<form action="Connectface.php" method="post">
                				    	<input type="hidden" name="berk1" value="<?php echo $row2['picture'];?>">
                				    	<tr>
                						<td><h3><?php echo $row2['nameENG']; ?></h3></td>
                						<td><?php echo $row2['price']; ?></td>
                						<td><?php echo $row2['number']; ?></td>
										<td><?php echo $row2['unitENG']; ?></td>
                						<td><input type="submit" name="berk" value="Add_to_cart"></td></form>
                						<td><img src="<?php echo $row2['picture']; ?>" width="150px"></td>
                					</tr>
                			<?php
                					}
                			}
                			 ?>
    			<?php
			}
            elseif ((isset($_POST["cate"])) and (!empty($_POST["cate"]))) {
                $OPO = $_POST['cate'];
                    
                    $sql7="SELECT * from list where category='$OPO'";
                    $result7=$connection->query($sql7);
                    while($rows7=mysqli_fetch_assoc($result7))
                    {?>
                        <form action="Connectface.php" method="post">
                        <input type="hidden" name="berk1" value="<?php echo $row7['picture'];?>">
                        <tr>
                        <td><h3><?php echo $rows7['nameENG']; ?></h3></td>
                        <td><?php echo $rows7['price']; ?></td>
                        <td><?php echo $rows7['number']; ?></td>
						<td><?php echo $rows7['unitENG']; ?></td>
                        <td><input type="submit" value="Add_to_cart"></td></form>
                        <td><img src="<?php echo $row7['picture']; ?>" width="150px"></td>
                        </tr>
            
            <?php
            }
            }else{
					$sql="SELECT * from list";
					$result=$connection->query($sql);
			
        			while($rows=mysqli_fetch_assoc($result))
        			{
    		?>
    					<form action="Connectface.php" method="post">
    					<input type="hidden" name="berk1" value="<?php echo $rows['picture'];?>">
            			<tr>
                			<td><h3><?php echo $rows['nameENG']; ?></h3></td>
                			<td><?php echo $rows['price']; ?></td>
                			<td><?php echo $rows['number']; ?></td>
							<td><?php echo $rows['unitENG']; ?></td>
            				<td><input type="submit" value="Add_to_cart"></td></form>
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
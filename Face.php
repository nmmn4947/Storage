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
	<h1>ศูนย์สื่อมัธยม</h1>
	<a href="FaceENG.php"><img src="img/ENG.jpg" width="100px" height="60px"></a>
    <form action="account.php" method="post" class="right">
        <input type="submit" name="acc" value="Profle">
    </form>
	<form class="example" action="Face.php" method="post">
  		<input type="text" placeholder="Search.." name="where">
  		<i class="fa fa-search"><input type="submit" name="where2" value="Search"></i>
  		<input type="hidden" value="<?php echo 'where'; ?>">
	</form>
    <form action="shoppingcart.php" class="right">
        <div class=""><button>รถเข็น</button></div>
    </form>
    <form action="Face.php" method="post">
    <label for="cate">ประเภท</label>
    <select name="cate">
       <option value="write">เครื่องเขียน</option>
       <option value="office">อุปกรณ์สำนักงาน</option>
       <option value="paper">กระดาษ</option>
       <option value="color">สีต่างๆ</option>
       <option value="room">อุปกรณ์ในครัวเรือน</option>
       <option value="rope">เชือก</option>
    </select>
    <input type="submit" value="เลือก">
    </form>
	<div>
		   <table class="table table-hover">
    			<t>
        			<th> ชื่อ </th>
        			<th> ราคา(บาท) </th>
        			<th> จำนวน(ชิ้น) </th>
        			<th> หน่วย</th>
					<th> </th>
        			<th> ภาพ </th>
    			</t>

    		<?php

			if ((isset($_POST["where"])) and (!empty($_POST["where"]))) {
				$where=$_POST['where'];
    		?>
            			<tr>
                			<?php 

							$sql2="SELECT * From list where name LIKE '%$where%'";
							$result2=$connection->query($sql2);
                			if ($result2->num_rows > 0) {
                				while($row2=mysqli_fetch_assoc($result2))
                				    {?>
                				    	<form action="Connectface.php" method="post">
                				    	<input type="hidden" name="berk1" value="<?php echo $row2['picture'];?>">
                				    	<tr>
                						<td><h3><?php echo $row2['name']; ?></h3></td>
                						<td><?php echo $row2['price']; ?></td>
                						<td><?php echo $row2['number']; ?></td>
										<td><?php echo $row2['unit']; ?></td>
                						<td><?php $amo = $row2['Status'];
										if ($amo == 'STOP'){?> 
											<h1>หยุดชั่วคราว</h1>
										<?php
										} else {
											?><input type="submit" value="เบิก">
										<?php
										}
								?></td></form>
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
                        <td><h3><?php echo $rows7['name']; ?></h3></td>
                        <td><?php echo $rows7['price']; ?></td>
                        <td><?php echo $rows7['number']; ?></td>
						<td><?php echo $rows7['unit']; ?></td>
                        <td><?php $amu = $rows7['Status'];
								if ($amu == 'STOP'){
									?> <h1>หยุดชั่วคราว</h1>
								<?php
								} else {
									?><input type="submit" value="เบิก">
								<?php
								}
								?></td></form>
                        <td><img src="<?php echo $rows7['picture']; ?>" width="150px"></td>
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
                			<td><h3><?php echo $rows['name']; ?></h3></td>
                			<td><?php echo $rows['price']; ?></td>
                			<td><?php echo $rows['number']; ?></td>
							<td><?php echo $rows['unit']; ?></td>
            				<td>
								<?php $amo = $rows['Status'];
								if ($amo == 'STOP'){
									?> <h1>หยุดชั่วคราว</h1>
								<?php
								} else {
									?><input type="submit" value="เบิก">
								<?php
								}
								?>
							</td></form>
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
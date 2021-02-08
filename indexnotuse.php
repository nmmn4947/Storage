<?php

include 'db.php';

$connection=new mysqli($server_name,$user_name,$password,$database);
if ($connection->connect_error) {
    echo "errorororo";
}

?>
<!DOCTYPE html>
<html>

    <head>
        <title> Fetch Data From Database</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">  
        <link rel="stylesheet" href="styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
 
        
        <?php
        if (isset($_POST['submit'])) {
            
            if((empty($_POST["product"])) or (empty($_POST["price"])) or (empty($_POST["number"]))){
                echo "NO moreeeeeee";
            } else{
                $product = $_POST['product'];
                $price = $_POST['price'];
                $number = $_POST['number'];
                
                $sql = "INSERT INTO list (name, price, number) VALUES('$product', '$price', '$number')";
        
                if($connection->query($sql) === TRUE) {
                echo "Record created success fully";
                } else {
                        echo "EROEOROROREOR" . $connection->error;
                }
            }
        }

        
        ?>


    <table class="table01">  

    <tr>
        <th colspan="4"><h2>Stock</h2></th>
    </tr>
    <t>
        <th> ID </th>
        <th> name </th>
        <th> price </th>
        <th> number </th>
        
    </t>
    <?php
    $sql="SELECT * from list";
    $result=$connection->query($sql);

        while($rows=mysqli_fetch_assoc($result))
        {
    ?>
        <form action="index2.html">
            <tr>
                <td><?php echo $rows["ID"]; ?></td>
                <td><?php echo $rows['name']; ?></td>
                <td><?php echo $rows['price']; ?></td>
                <td><?php echo $rows['number']; ?> <button>Buy</button></td>
            </tr>
        </form>
    <?php
        }
    
    $connection->close();
    ?>
    </table>




</body>
</html>

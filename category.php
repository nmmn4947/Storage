<?php
session_start();
include 'db.php';

$conn=new mysqli($server_name,$user_name,$password,$database);
if ($conn->connect_error) {
    echo "errorororo";
}

$cate = "SELECT * FROM category";
    $recate=$conn->query($cate);
     ?>    
     <!DOCTYPE html>
<html>       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
        <script src="jquery.tabledit.min.js"></script>

        <table id="table">  

            <th> ID </th>
            <th> Category </th>
            <th> CategoryENG </th>

            <tr>
        <?php
        
            while($rows=mysqli_fetch_assoc($recate))
                    {
        ?>
                    <td><?php echo $rows["id"]; ?></td>
                    <td><?php echo $rows['category']; ?></td>
                    <td><?php echo $rows['categoryENG']; ?></td>
                    <td><a href="editcate.php?id=<?php echo $rows["ID"]; ?>">edit</a>
                        <form action="delecate.php" method="post">
                                    <input type="submit" value="Delete">
                                    <input type="hidden" name="idcate" value="<?php echo $rows["id"]; ?>">
                        </form>
                    </td>
            <tr>
                
                <?php
                    }
                ?>   
        </table>
</html>
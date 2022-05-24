<?php
session_start();

include 'db.php';

$conn=new mysqli($server_name,$user_name,$password,$database);
if ($conn->connect_error) {
    echo "errorororo";
}

?>
<!DOCTYPE html>
<html>

    <head>
        <title> Fetch Data From Database</title>
        <link rel="stylesheet" href="styles.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
        <script src="jquery.tabledit.min.js"></script>
        

       <style>                    
        body {
            max-width: 100% !important;
            width: 100%;
        }
        </style>
        
    </head>

<body>

<h1>Admin Menu</h1>
    <form class="moveright"  action="His.php" method="post" value="ใบเบิก">
        <input type="submit" value="history" >
    </form>


<form action="Adminprogress.php" method="post" value="ใบเบิก">
    <input type="submit" value="Request">
</form>

<form action="Add_item.php" method="post" value="Add_item">
    <input type="submit" value="Add">
</form>

<form action="category.php" method="post" value="something">
    <input type="submit" value="Category">
</form>
        
    <br></br>
       
               
                <table id="table"><!--ตาราง 1 จำนวนของในคลัง-->

                <tr>
                    <th colspan="6"><h2>Stock</h2></th>
                </tr>
                <t>
                    <th> ID </th>
                    <th> Name </th>
                    <th> Price </th>
                    <th> Number </th>
                    <th> Picture </th>
                    <th> Category </th>
                </t>
                <?php
                $sql="SELECT * from list";
                $result=$conn->query($sql);

                    while($rows=mysqli_fetch_assoc($result))
                    {
                ?>
                        <tr>
                            <td><?php echo $rows["ID"]; ?></td>
                            <td><?php echo $rows['name']; ?></td>
                            <td><?php echo $rows['price']; ?></td>
                            <td><?php echo $rows['number']; ?></td>
                            <td><img src="<?php echo $rows['picture']; ?>" width="150px" height="150px" ></td>
                            <td><?php echo $rows['category']; ?></td>
                            <td><a href="edit.php?id=<?php echo $rows["ID"]; ?>">edit</a>
                            <form action="stop.php" method="post"><input type="submit" value="STOP"><input type="hidden" name="iyg" value="<?php echo $rows["ID"]; ?>"></form>
                        <?php if($rows['Status'] == 'STOP'){?>
                                <p>STOPPED</p>
                        <?php } ?>
                        <!-- ลบข้อมูลในเเต่ละ rows -->
                                <form action="Delete.php" method="post">
                                    <input type="submit" value="Delete">
                                    <input type="hidden" name="delete1" value="<?php echo $rows["ID"]; ?>">
                                </form>
                        </td>
 
                        </tr>
                <?php
                    }
            
                    
                ?>

                        </table>
                                
                <br><br><br>

            





    <script>
    function selectch(){
        var x = document.getElementBYId("ch");
        var i = x.selectedIndex;
        window.location.href = "Admin.php?ch=" + options[i].text;
        
    }



 </script>


</body>
</html>
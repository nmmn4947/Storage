<?php
session_start();
include 'db.php';

$conn=new mysqli($server_name,$user_name,$password,$database);
if ($conn->connect_error) {
    echo "errorororo";
}
    $id = $_GET['id'];  
    $sql = "SELECT * from list where ID = $id ";
    $result=$conn->query($sql);
    $row = $result->fetch_assoc();
    



   
        echo '<h1>Edit</h1>';
        echo '<form action="editcheark.php" method="post" enctype="multipart/form-data">';
        echo '<br><br><input type="text" name="editname" value = "'.$row['name'].'">';
        echo '<br><br><input type="text" name="editnameENG" value = "'.$row['nameENG'].'">';
        echo '<br><br><input type="text" name="editprice" value = "'.$row['price'].'">';
        echo '<br><br><input type="text" name="editnumber" value = "'.$row['number'].' "> ';
        echo 'Unitไทย:<input type="text" name="editunit" value = "'.$row['unit'].'">';
        echo 'UnitENG:<input type="text" name="editunitENG" value = "'.$row['unitENG'].'">';
        echo '<br><br><img name= "editpicture" src="'.$row['picture'].'" width=150>';
        echo '<br><br><input type="file" name="updatepic"> <br><br>';
        echo '<input type="hidden" name="itemid" value="'.$row['ID'].'"><br>';

        $cate = "SELECT * FROM category";
    $recate=$conn->query($cate);
            if ($recate->num_rows > 0) {
              echo  "<select id='AR' name='selects' autofocus>";

                // output data of each row
                while($rows2 = $recate->fetch_assoc()) {

                    if ($row['category']==$rows2['categoryENG']){
                        echo    "<option value='".$rows2['categoryENG']."'selected>".$rows2['category']."</option>";
                    }else{
                        echo    "<option value='".$rows2['categoryENG']."'>".$rows2['category']."</option>";
                    }
                }
                echo "</select>";
            } 
            

        echo '<input type="submit" name="update" value="Update">';
        echo '</form>';


        $conn->close();
?>

    <script>
    function selectAR(){
        var x = document.getElementBYId("AR");
        var i = x.selectedIndex;
        window.location.href = "Adminprogress.php?AR=" + .options[i].text;
        
    }
</script>
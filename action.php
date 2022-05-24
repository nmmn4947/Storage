<?php  
$connect = mysqli_connect('localhost', 'root', '', 'costimer');

$input = filter_input_array(INPUT_POST);

$Name = mysqli_real_escape_string($connect, $input["name"]);
$ENG = mysqli_real_escape_string($connect, $input["nameENG"]);
$price = mysqli_real_escape_string($connect, $input["price"]);
$number = mysqli_real_escape_string($connect, $input["number"]);

if($input["action"] === 'edit')
{
 $query = "
 UPDATE costimer 
 SET name = '".$Name."', 
 nameENG = '".$ENG."' ,
 price = '".$price."', 
 number = '".$number."', 
 WHERE id = '".$input["ID"]."'
 ";

 mysqli_query($connect, $query);

}
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM costimer 
 WHERE id = '".$input["ID"]."'
 ";
 mysqli_query($connect, $query);
}

echo json_encode($input);

?>
<?php
include 'db.php';
$connection=new mysqli($server_name,$user_name,$password,$database);
if ($connection->connect_error) {
    echo "erroro";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$W1=$_POST['urID'];
	$W2=$_POST['urName'];
	$W3=$_POST['urUser'];
	$W4=$_POST['urPass'];
						$target_dir = "FAC/";
						$filenm = basename($_FILES["fileToUpload"]["name"]);
						$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
						echo "$target_file";
						$uploadOk = 1;
						$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
						// Check if image file is a actual image or fake image
						if(isset($_POST["submit"])) {
						  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
						  if($check !== false) {
						    echo "File is an image - " . $check["mime"] . ".";
						    $uploadOk = 1;
						  } else {
						    echo "File is not an image.";
						    $uploadOk = 0;
						  }
						}
						// Check if file already exists
						if (file_exists(($_FILES["fileToUpload"]["name"]))) {
						  echo "Sorry, file already exists.";
						  $uploadOk = 0;
						}
						if ($uploadOk == 0) {
						  echo "Sorry, your file was not uploaded.";
						// if everything is ok, try to upload file
						} else {
						  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
						    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
						  } else {
						    echo "Sorry, there was an error uploading your file.";
						  }
						}

                    	$sl="INSERT into email (BILL, Password, Name, uname, Status, upic) VALUES ('$W1', '$W4', '$W2', '$W3', 'user', '$filenm')";
                    	if ($connection->query($sl) === TRUE) {
                    		header("location:index.html");
                    	}
                    	echo "AHHHHHHHHHHHHHHHH";
}

?>
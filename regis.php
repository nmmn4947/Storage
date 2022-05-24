<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Register</h1>

<form action="repro.php" method="post" enctype="multipart/form-data">
	<label for="urID">INSERT Your RA ID</label>
	<input type="text" name="urID"><br>
	<label for="urName">INSERT Your Full Name</label>
	<input type="text" name="urName"><br>
	<label for="urUser">INSERT Your Username</label>
	<input type="text" name="urUser"><br>
	<label for="urPass">INSERT Your Password</label>
	<input type="password" name="urPass"><br>
	<label for="urPic">INSERT A Picture of your beautiful face</label>
	<input type="file" name="fileToUpload" id="fileToUpload"><br>
	<input type="submit" name="submit" value="Proceed">
</form>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form action="#" method="post">
Username<br><br>
	<input type="text" name="username" placeholder="Username"><br><br>
	Password<br><br>
	<input type="text" name="password" placeholder="Enter Password"><br><br>
	Employee Category<br><br>
	<select name="category">
	  <option value="1">Doctor</option>
	  <option value="2">Stuff</option>
	  <option value="3">Patient</option>
	  
	</select><br><br>

	<input type="submit" name="submit" id="submit" value="submit">
</form>


<?php
	
	if(isset($_POST['submit'])){
		require_once 'dbclearence.php';
		$username = $_POST['username'];
		$password = $_POST['password'];
		$level = $_POST['category'];

		$sql = "INSERT INTO userpass(username, password, level) VALUES('$username', '$password' , 
		'$level') ";

		$db->insert($sql);


	}




?>

</body>
</html>
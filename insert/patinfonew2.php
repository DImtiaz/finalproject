<!DOCTYPE html>
<html>
<head>
	<title>Prescription</title>
</head>
<body>
<form action="#" method="post">
	Name :<br><input type="text" name="name" placeholder="Enter Full Name">
		<br><br>
	Age :<br><input type="number" name="age" placeholder="Age"><br><br>
		<br>
	Gender :<br><input type="radio" name="gender" value="male"> Male<br>
    	<input type="radio" name="gender" value="female"> Female<br>
    	<br><br>
    Contact No:<br> <input type="number" name="contact" placeholder="Contact No."><br><br>
    National ID No.:<br><input type="number" name="nid" placeholder="National ID No."><br><br>
    Address :<br><textarea name="address" rows="10" cols="50" placeholder="Enter Address"></textarea><br>
    <input type="submit" name="submit" id="submit" value="Add">
</form>
<?php
	
	
	if(isset($_POST['submit'])){
		require_once 'db/dbclearence.php';
		$name = $_POST['name'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];
		$contact = $_POST['contact'];
		$nid = $_POST['nid'];

		$a->insertNewInfo($name, $age, $gender, $address, $contact, $nid);
	}

	
	









?>

</body>
</html>
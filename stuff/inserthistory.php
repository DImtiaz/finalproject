<!DOCTYPE html>
<html>
<head>
	<title>Insert Medical History</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
</head>
<body>
<?php require_once 'header.php';?>
<?php require_once '../db/dbclearence.php'; ?>
<div class="container">
	
	<form action="#" method="post">
	<h3>Enter Patient ID</h3>
		<input type="number" name="id" placeholder="Enter Patient ID">
		<input type="submit" name="submit" value="submit" id="submit">

		</form><br><br>
<?php

	if (isset($_POST['submit'])) {
		$id = $_POST['id'];
		$sql = "SELECT * FROM ginfo WHERE patID = $id";
		$result = $db->select($sql);
		$count=mysqli_num_rows($result);

		if ($count > 0) {
			foreach ($result as $row) {
				$patientID = $row['patID'];
				$patientName = $row['name'];
			}
		}
		?>
		<form action="#" method="post">
		Patient ID:
			<input type="text" name="id" placeholder="<?php echo $patientID; ?>" 
			value="<?php echo $patientID; ?>" readonly><br><br>
		Patient Name:
			<input type="text" name="name" value="<?php echo $patientName; ?>" readonly><br><br>
		</form>


		<?php
	}





?>






</div>


</body>
</html>
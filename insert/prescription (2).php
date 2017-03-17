<!DOCTYPE html>
<html>
<head>
	<title>Prscription</title>
</head>
<body>
<form action="#" method="post">
	Patient Id: <br>
	<input type="number" name="patid" placeholder="Enter Patient ID">
	<br><br>
	Patient Name<br>
	<input type="text" name="patname" placeholder="Patient Name">
	<br><br>
	Doctor Name:<br>
	<input type="text" name="drname" placeholder="Enter Doctor Name">
	<br><br>
	Diagnosis: <br><textarea name="diagnosis" rows="10" cols="50" placeholder="diagnosis"></textarea><br>

	Rx:<br><textarea name="medicine" rows="10" cols="50" placeholder="Medicine Name and Dose"></textarea><br>
	<input type="submit" name="submit" value="submit" id="submit">

</form>


<?php
	

	if(isset($_POST['submit'])){
		require_once 'db/dbclearence.php';
		$patientID = $_POST['patid'];
		$patientName = $_POST['patname'];
		$doctorname = $_POST['drname'];
		$diagnosis = $_POST['diagnosis'];
		$medicine = $_POST['medicine'];



	 /*	$a->insertPrescription($patientID, $patientName, $doctorname, $diagnosis, $medicine); */
	 $sql =  "INSERT INTO prescription (patID, pname, doctorname, diagnosis, medicine) VALUES('$patientID', '$patientName', '$doctorname', '$diagnosis', '$medicine')";

	 $a->insert($sql);

		

	}






?>


</body>
</html>
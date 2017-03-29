<?php
	
		session_start();
	
		require_once '../db/dbclearence.php';
		$patID = $_GET['id'];
		$doctorname = $_SESSION['userinfo']['username'];

		$sql = "SELECT * FROM ginfo WHERE patID = '$patID'";
		$success = $db->select($sql);
		$row = $success->fetch_assoc();

		$patName = $row['name'];
		
		$diagnosis = $_POST['diagnosis'];
		$medicine = $_POST['medicine'];

		$sql2 = "INSERT INTO prescription(patID, pname, doctorname, diagnosis, medicine) VALUES('$patID', '$patName', '$doctorname', '$diagnosis', '$medicine')";

		$success = $db->insert($sql2);

		
			header('Location:index.php?msg=successinsert');
		
	







?>
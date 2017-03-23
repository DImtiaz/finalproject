<!DOCTYPE html>
<html>
<head>
	<title>Medical History</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">

</head>
<body>
<?php require_once 'header.php'; 
	session_start();
    if (!isset($_SESSION['userinfo']['userid'])){
    header('location:../index.php');
    }

?>

	<table class="table table-striped">
          <thead>
            <tr>
            	<th>History ID</th>
              <th>Patient ID</th>
              <th>Patient Name</th>
              <th>Test Reports</th>
              <th>Previous Medicine Name</th>
              <th>Previous Opertaion Info</th>
              <th>Previous Doctor Name</th>
              
            </tr>
          </thead>






<?php
	require_once '../db/dbclearence.php';
	
	$id = $_GET['id'];

	$sql = "SELECT * FROM mhistory WHERE patID = $id";

	$result = $db->select($sql);

	$count = mysqli_num_rows($result);
	if($count > 0){
		foreach ($result as $value) {

			?>
			<tbody>
				<tr>
					<td><?php echo $value['mhid']; ?></td>
					<td><?php echo $value['patID']; ?></td>
					<td><?php echo $value['pname']; ?></td>
					<td><?php echo $value['testreport']; ?></td>
					<td><?php echo $value['premedicine']; ?></td>
					<td><?php echo $value['opinfo']; ?></td>
					<td><?php echo $value['predoc']; ?></td>

				</tr>
			</tbody>

			<?php

			
		}
	}
	else{
		echo "No History Found!!";
	}



?>

</body>
</html>
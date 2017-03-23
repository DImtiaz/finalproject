<!DOCTYPE html>
<html>
<head>
	<title>Patient Details</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
</head>
<body>
<?php require_once 'header.php';

  session_start();
    if (!isset($_SESSION['userinfo']['userid'])){
    header('location:../index.php');
    }

 ?>
<div class="">
<form action="#" method="post">
	<h3>Enter Patient ID</h3>
	<input type="text" name="id" placeholder="Enter Patient ID">
	<input type="submit" name="submit" id="submit" value="submit">
</form>


<table class="table table-striped">
          <thead>
            <tr>
              <th>Patient ID</th>
              <th>Patient Name</th>
              <th>Age</th>
              <th>Gender</th>
              <th>Address</th>
              <th>Contact No</th>
              <th>National ID No</th>
              <th>Admitted Date</th>
              <th>Action</th>
            </tr>
          </thead>


<?php
	require_once '../db/dbclearence.php';
	if(isset($_POST['submit'])){
		$id = $_POST['id'];


		$sql = "SELECT * FROM ginfo WHERE patID = $id";

		$result = $db->select($sql);

		$count=mysqli_num_rows($result);
		if($count > 0){
			foreach ($result as $value) {
				?>

				<tbody>
                <tr>
                  
                  <td><?php echo $value['patID']; ?></td>
                  <td><?php echo $value['name']; ?></td>
                  <td><?php echo $value['age']; ?></td>
                  <td><?php echo $value['gender']; ?></td>
                  <td><?php echo $value['address']; ?></td>
                  <td>0<?php echo $value['contact']; ?></td>
                  <td><?php echo $value['nid']; ?></td>
                  <td><?php echo $value['time']; ?></td>  
                  <td><a href="viewhistory.php?id=<?php echo $value['patID'];?>"><button type="button" class="btn btn-info">View Medical History</button></a>&nbsp;
                  <a href="editpatient.php?id=<?php echo $value['patID'];?>"><button type="button" class="btn btn-warning">Edit Information</button></a>

                  </td>  

                  </tr>
              </tbody>
              <?php 

			}

		}

		else{
			echo "Patient Record not Found";
		}

	}





?>
</table>
</div>

</body>
</html>
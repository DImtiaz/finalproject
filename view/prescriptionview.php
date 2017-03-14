<!DOCTYPE html>
<html>
<head>
	<title>Details of patient</title>

</head>
<body>


<form action="#" method="post">
	Input Patient Id no. <br>
	<input type="number" name="pid" placeholder="Input patient ID">
	<input type="submit" name="Submin" id="submit" value="submit">
		
	</form>
		<table>
		<thead>
			<tr>
							<th>Patient ID</th>
				        	<th>Patient Name</th>
				        	<th>Age</th>
				        	<th>Gender</th>
				        	<th>Address</th>
				        	<th>Contact</th>
				        	<th>National Id No.</th>
				        	<th>Admitted date and time</th>
			</tr>
		</thead>


	<?php

		if(isset($_POST['submit'])){

			require_once 'db/dbclearence.php';

			$id = $_POST['pid'];

			$sql = "SELECT * FROM ginfo WHERE patID = '$id'";

			$a->select($sql);

			if ($success->num_rows > 0) {
    				// output data of each row
				    while($row = $success->fetch_assoc()) {
				        ?>
				        <tbody>
				        	<tr>
				        		<td><?php echo $row["patID"];  ?></td>
				        		<td><?php echo $row["name"];  ?></td>
				        		<td><?php echo $row["age"];  ?></td>
				        		<td><?php echo $row["gender"];  ?></td>
				        		<td><?php echo $row["address"];  ?></td>
				        		<td><?php echo $row["contact"];  ?></td>
				        		<td><?php echo $row["nid"];  ?></td>
				        		<td><?php echo $row["time"];  ?></td>
				        	</tr>
				        </tbody>
				        	

				        	
				        <?php 
				    }
				} else {
				    echo "0 results";
				    	}


		}





	?>
	</table>

</body>
</html>
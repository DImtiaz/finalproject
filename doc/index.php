<!DOCTYPE html>
<html>
<head>
	<title>Doctor Home</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
</head>
<body>
<?php
    require_once '../db/dbclearence.php';
    session_start();
    if (!isset($_SESSION['userinfo']['userid'])){
    header('location:../index.php');
    }
  ?>
  <?php
    $id=$_SESSION['userinfo']['userid'];
    
    $query="select * from userpass where empid=$id";
    $result = $db->select($query);

    $row=$result->fetch_assoc();

    $Name=$row['empname'];
    #var_dump($Name);
    #var_dump($_SESSION['userinfo']['username']);
    $username = $_SESSION['userinfo']['username'];
    

  ?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">HOME</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form action="#" method="post" class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" name="id" placeholder="Enter Patient ID">
        </div>
        <button type="submit" id="submi" value="submit" name="submit" class="btn btn-default">Search</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
      <li>Welcome,<?php echo $username; ?></li>
        <li><a href="logout.php">Log Out</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>




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
                  
                  

                  </td>  

                  </tr>
              </tbody>


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
              $patientname = $value['name'];

      }

    }

    else{
      echo "Patient Record not Found";
    }
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
		echo "No Medical History Found!!";
	}



  }





?>
</table>



<form action="saveprescription.php?id=<?php echo $id; ?>" method="post">
Diagnosis<br>
	<textarea name="diagnosis" rows="15" cols="70" placeholder="Write Diagnosis"></textarea><br>
	Prescribed Medicine<br>
	<textarea name="medicine" rows="15" cols="70" placeholder="Write Prescribed Medicine"></textarea>
	<br>
	<button type="submit" value="submit" class="btn btn-primary">Submit</button>
	
</form>




</body>
</html>
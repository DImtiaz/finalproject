<!DOCTYPE html>
<html>
<head>
	<title>Stuff Home</title>
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

    $Name=$row['name'];
    

  ?>
<?php require_once 'header.php' ?>


<div class="container">
	<div class="btn-group">
  <button class="btn btn-default btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Add A Patient<span class=""></span>
  </button><br><br><br>
  <button class="btn btn-default btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Add A Patient Medical Histoy<span class=""></span>
  </button><br><br><br>

  <button class="btn btn-default btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    View Medicine And Diagnosis<span class=""></span>
  </button><br><br><br>
  
</div>
	
</div>
</body>
</html>
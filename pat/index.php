<!DOCTYPE html>
<html>
<head>
	<title>Patient home</title>
</head>
<body>
<?php
    require_once '../db/dbclearence.php';
    session_start();
    if (!isset($_SESSION['id'])){
    header('location:../index.php');
    }
  ?>
  <?php
    $id=$_SESSION['id'];
    
    $query="select * from login where id=$id";
    $result = $db->select($query);

    $row=$result->fetch_assoc();

    $Name=$row['name'];
    

  ?>
<h1>Welcome to patient index</h1>
</body>
</html>
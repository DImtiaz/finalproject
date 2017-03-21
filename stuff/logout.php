<?php require_once '../db/dbclearence.php' ; 

	session_start();
	session_destroy();
	header('location:../index.php');
?>
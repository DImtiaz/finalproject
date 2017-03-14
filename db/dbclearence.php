<?php
	require_once 'dbconfig.php';
	$a = new databaseconnection;
	$a->createdb();
	$a->selectdb();
	$a->createPatientInfoTable();
	$a->createPrescriptionTable();
	$a->createMedicalHistoryTable();
	$a->createBillsTable();
	$a->createDischargeTable();
	$a->createAdminTable();






?>
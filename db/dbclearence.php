<?php
	require_once 'dbconfig.php';
	$db = new databaseconnection;
	$db->createdb();
	$db->selectdb();
	$db->createPatientInfoTable();
	$db->createPrescriptionTable();
	$db->createMedicalHistoryTable();
	$db->createBillsTable();
	$db->createDischargeTable();
	$db->createAdminTable();






?>
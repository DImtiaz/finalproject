<?php
				require_once '../db/dbclearence.php';

				if (isset($_POST['submit'])) {
					$patid = $_POST['id'];
					$patname = $_POST['name'];
					$testreport = $_POST['testreport'];
					$medicine = $_POST['medicine'];
					$operationinfo =$_POST['operationinfo'];
					$doctors = $_POST['doctors'];

					

					$db->insertPatientHistory($patid, $patname, $testreport, $medicine, $operationinfo, $doctors);

					header('location:stuff/index.php');
				}






?>
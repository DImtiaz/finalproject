<?php
	class databaseconnection{
		private $host = "localhost";
		private $dbuser = "root";
		private $dbpassword = "";

		private $dbname = "pms";
		private $connect;

		public function __construct(){
			try{
				$this->dbconnect();

			}
			catch(exception $e){
				echo $e->getmessage();
			}

		}

		public function dbconnect(){
			$this->connect = mysqli_connect($this->host, $this->dbuser, $this->dbpassword);
			if(!$this->connect){
				$this->error = "Error connecting database".$this->connect->connect_error;
				echo $this->error;
				return 0;
			}
		}


		public function createdb(){
			$createdbquery = "CREATE DATABSE IF NOT EXISTS pms";
			$createdb = $this->connect->query($createdb);
			if(!$createdb){
				echo "Error creating database";
			}
			else{
				echo "Database connection OK";
			}
		}

		public function selectdb(){
			mysqli_select_db($this->connect, $this->dbname);
		}

		public function createPatientInfoTable(){
			$createtablequery1 = "CREATE TABLE IF NOT EXISTS ginfo(
			patID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			name varchar(50) NOT NULL;
			age INT(3),
			gender VARCHAR(6),
			address VARCHAR(100),
			contact int(15),
			nid int(25),
			time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
			)";
			$createtable1 = $this->connect->query($createtablequery1);
			if(!$createtable1){
				echo "Error creating Patient info Table".mysqli_error($this->conect);
			}
			else{
				echo "Patient Info table OK";
			}
		}

		public function createPrescriptionTable(){
			$createtablequery2 = "CREATE TABLE IF NOT EXISTS prescription(
			pid INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			patID INT(10),
			FOREIGN KEY (patID) REFERS ginfo(patID),
			pname VARCHAR(50),
			doctorname varchar(50),
			diagnosis varchar(1000),
			medicine varchar(4000),
			time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
			)";
			$createtable2 = $this->connect->query($createtablequery2);
			if(!$createtable2){
				echo "Error Creating Prescription Table".mysqli_error($this->connect);
			}
			else{
				echo "Prescription Table OK";
			}

		}

		public function createMedicalHistoryTable(){
			$createtablequery3 = "CREATE Table IF NOT EXISTS mhistory(
			mhid INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			patID INT(10),
			FOREIGN KEY (patID) REFERS ginfo(patID),
			pname VARCHAR(50),
			testreport varchar(4000),
			premedicine varchar(1000),
			opinfo VARCHAR(1000),
			predoc varchar(50),
			image LONGBLOB
			)";

		}
		






	}






?>
<?php
	class databaseconnection{
		private $host = "localhost";
		private $dbuser = "root";
		private $dbpassword = "";

		private $dbname = "patient";
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
			$createdbquery = "CREATE DATABASE IF NOT EXISTS patient";
			$createdb = $this->connect->query($createdbquery);
			if(!$createdb){
				echo "Error creating database";
			}
			else{
				echo "Database connection OK<br>";
			}
		}

		public function selectdb(){
			mysqli_select_db($this->connect, $this->dbname);
		}

		public function createPatientInfoTable(){
			$createtablequery1 = "CREATE TABLE IF NOT EXISTS ginfo(
			patID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			name varchar(50) NOT NULL,
			age INT(3),
			gender VARCHAR(6),
			address VARCHAR(100),
			contact int(15),
			nid int(25),
			time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
			)";
			$createtable1 = $this->connect->query($createtablequery1);
			if(!$createtable1){
				echo "Error creating Patient info Table".mysqli_error($this->connect);
			}
			else{
				echo "Patient Info table OK<br>";
			}
		}

		public function createPrescriptionTable(){
			$createtablequery2 = "CREATE TABLE IF NOT EXISTS prescription(
			presid INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			patID INT(10),
			
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
				echo "Prescription Table OK<br>";
			}

		}

		public function createMedicalHistoryTable(){
			$createtablequery3 = "CREATE Table IF NOT EXISTS mhistory(
			mhid INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			patID INT(10),
			
			pname VARCHAR(50),
			testreport varchar(4000),
			premedicine varchar(1000),
			opinfo VARCHAR(1000),
			predoc varchar(50)
			)";
			$createtable3 = $this->connect->query($createtablequery3);
			if(!$createtable3){
				echo "Error Creating Medical History table".mysqli_error($this->connect);
			}
			else{
				echo "Medical History table OK<br>";
			}

		}

		public function createBillsTable(){
			$createtablequery4 = "CREATE TABLE IF NOT EXISTS bill(
			billId INT(10) AUTO_INCREMENT PRIMARY KEY,
			patID INT(10) NOT NULL,
			pname varchar(50),
			presId INT(10),
			amount INT(20),
			comment VARCHAR(1000)
			)";
			$createtable4 = $this->connect->query($createtablequery4);
			if(!$createtable4){
				echo "Error Creating Billing Table".mysqli_error($this->connect);
			}
			else{
				echo "Bills Table OK<br>";
			}
		}

		public function createDischargeTable(){
			$createtablequery5 = "CREATE TABLE IF NOT EXISTS discharge(
			disID INT(10) AUTO_INCREMENT PRIMARY KEY,
			patID INT(10),
			ward varchar(10),
			admitDate VARCHAR(10),
			dischargeDate VARCHAR(10)
			)";
			$createtable5 = $this->connect->query($createtablequery5);
			if(!$createtablequery5){
				echo "Error Creating Discharge Table".mysqli_error($this->connect);
			}
			else{
				echo "Discharge Table OK<br>";
			}
		}

		public function createAdminTable(){
			$createtablequery6 = "CREATE TABLE IF NOT EXISTS userpass(
			empid INT(10) AUTO_INCREMENT PRIMARY KEY,
			username VARCHAR(10),
			password VARCHAR(10),
			level INT(1) 
			) ";
			$createtable = $this->connect->query($createtablequery6);
			if(!$createtablequery6){
				echo "Error Creating login Table".mysqli_error($this->connect);
			}
			else{
				echo"Login Table OK<br>";
			}
		}
		
		public function insertNewInfo($name, $age, $gender, $address, $contact, $nid){

			$insert = "INSERT INTO ginfo(name, age, gender, address, contact, nid) VALUES 
			('$name', '$age', '$gender', '$address', '$contact', '$nid')";
			$doneinsert = $this->connect->query($insert);

			if(!$doneinsert){
				echo "Error Inserting Data".mysqli_error($this->connect);
			}

			else{
				echo "Data successfully Inserted";      
			}

		}


		public function insertPrescription($patID,$pname,$doctorname,$diagnosis,$medicine){

			$insertPresQuery = "INSERT INTO prescription (patID, pname, doctorname, diagnosis, medicine) VALUES('$patID', '$pname', '$doctorname', '$diagnosis', '$medicine')";

			$insertPres = $this->connect->query($insertPresQuery);

			if(!$insertPres){
				echo "Error Inserting Prescription Data".myqli_error($this->connect);
			}
			else{
				echo "Prescription Information Successfully Inserted";
			}
		}


		public function insert($sql){
			$successinsert = $this->connect->query($sql);
			if(!$successinsert){
				echo "Error Inserting Data".mysqli_error($this->connect);
			}
			else{
				echo "Data Successfully Inserted";
			}

		}


		public function select($sql){
			$success = $this->connect->query($sql);
			if(!$success){
				echo "Error".mysqli_error($this->connect);
			}
			else{
				return $success;
			}
		}




	}






?>
<!DOCTYPE html>
<html>
<head>
	<title>Patient Information System</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
// define variables and set to empty values
$nameErr =  $ageErr =  $addrErr = $genderErr =  $contactErr ="";
$name = $age = $address = $gender = $contact = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["age"])) {
    $ageErr = "Age is required";
  } else {
    $age = test_input($_POST["age"]);
    // check if age is well-formed
    if (preg_match("/^[a-zA-Z ]*$/",$age)) {
      $ageErr = "Input Age in Year(s)"; 
    }
  }
    
  if (empty($_POST["address"])) {
    $addrErr = "Address is required";
  } else {
    $address = test_input($_POST["address"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    
  }
  if (empty($_POST["gender"])) {
    $genderErr = "Please Select Gender";
  } else {
  $gender = test_input($_POST["gender"]);
}

  if (empty($_POST["contact"])) {
    $contactErr = "Please input a valid contact No.";
  } else {
    $contact = test_input($_POST["contact"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Enter Patient Details</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  Age:
  <input type="text" name="age" value="<?php echo $age;?>">
  <span class="error">* <?php echo $ageErr;?></span>
  <br><br>
  
  Address: <input type="text" name="address" value="<?php echo $address;?>">
  <span class="error"><?php echo $addrErr;?></span>
  <br><br>
  
  
  Contact: <input type="text" name="contact" value="<?php echo $contact;?>">
  <span class="error"><?php echo $contactErr;?></span>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $age;
echo "<br>";
echo $address;
echo "<br>";
echo $gender;
echo "<br>";
echo $contact;
?>

</body>
</html>
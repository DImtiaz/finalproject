<!DOCTYPE html>
<html >
  <head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
    
    
    
    
        <link rel="stylesheet" href="css/style.css">
        <style type="text/css">
        body,td,th {
	font-family: "Source Sans Pro", sans-serif;
}
body {
	background: url(img/2.jpg) no-repeat center center fixed;
	background-size: cover;
}
        </style>
  </head>
  

<body>

    
<div class="wrapper">
	<div class="container">
		<h1>Welcome to<br>Admin Panel</h1>
		
		<form class="form" action="#" method="post">
			<input type="text" name="username" placeholder="Username">
			<input type="password" name="password" placeholder="Password">
			<button type="submit" id="login-button" name="submit" value="submit">Login</button>
		</form>
        
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
    <?php
	require_once 'db/dbclearence.php';
	if (isset($_POST['submit'])) {
			$UserName=$_POST['username'];
			$Password=$_POST['password'];
			$result="select * from userpass where username='$UserName' and password='$Password'";

			$success = $db->select($result);
			
			$count=mysqli_num_rows($success);
			$row=$success->fetch_assoc();
		
			if ($count > 0){
			session_start();
			$userid = $row['empid'];
			$userlevel = $row['level'];
			$username = $row['empname'];
			$_SESSION['userinfo']= array('userid' => $userid, 'userlevel' => $userlevel, 'username' => $username);
			

			switch ($userlevel) {
				case '1':
					header('location:doc/index.php?id='.$row['empid'].'');
					break;
				case '2':
					header('location:stuff/index.php?id='.$row['empid'].'');
					break;
					case '3':
						header('location:pat/index.php?id='.$row['empid'].'');
						break;
				default:
					echo "enter Correct Username And Password";
					break;
			}


			
			
			}
			
}

?>

<script src="js/index.js"></script>

 <div class="footer" align="center">
 <strong>
 &copy;DEWAN IMTIAZ BEEN EMRAN</strong>
 </div>
    
    
  </body>
</html>

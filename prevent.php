<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "GET")
{
	$conn = mysqli_connect("localhost","root","","sqlinjection");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
	die('Could not connect: '.mysqli_connect_error());  
}
$myusername=mysqli_real_escape_string($conn,$_GET['username']);
			  $mypassword=mysqli_real_escape_string($conn,$_GET['password']);
$sql = "SELECT * FROM login WHERE username = '$myusername' and password = '$mypassword';";
$sql_result = mysqli_query ($conn, $sql) or die ('request "Could not execute SQL query" '.$sql);
		$user = mysqli_fetch_assoc($sql_result);
		if(!empty($user)){
		$_SESSION['login_user'] = $user['username'];
         header("location:welcome.php");
		}
		else{
			$message = 'Wrong email or password.';
		}
	echo "<script type='text/javascript'>alert('$message');</script>";
}
?>

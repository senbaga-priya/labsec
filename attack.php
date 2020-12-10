<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$conn=
mysqli_connect("localhost","root","","sqlinjection");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
	die('Could not connect: '.mysqli_connect_error());  
}		
$myusername = $_POST['username'];
$mypassword = $_POST['password'];
      $sql = "SELECT username,password FROM login WHERE username = '$myusername' and password = '$mypassword';";
$sql_result = mysqli_query ($conn, $sql) or die ('request "Could not execute SQL query" '.$sql);
		$user = mysqli_fetch_assoc($sql_result);
		if(!empty($user)){
		$_SESSION['login_user'] = $user['username'];
header("location:welcome.php");
		}
		else{
			$message = 'Wrong email or password.';
}
	echo "<script type='text/javascript'>alert('$message');</script>";}
?>
<html>
<head>
<title>Login Page</title>
<style type = "text/css">
body {
font-family:Arial, Helvetica, sans-serif;
font-size:14px;
       }
label {
font-weight:bold;
width:100px;
font-size:14px;
        }
         .box {
border:#666666 solid 1px;
         }
</style>
</head>
<body bgcolor = "#FFFFFF">
<div align = "center">
<div style = "width:300px; border: solid 1px #333333; " align = "left">
<div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div><div style = "margin:30px">
<form action = "" method = "post">
<label>UserName  :</label><input type = "text" name = "username" class = "box" required/><br /><br />
<label>Password  :</label><input type = "password" name = "password" id="p" class = "box" required /><br/><br />
<input type="checkbox" onclick="myFunction()">Show Password
<script>
function myFunction() {
  var x = document.getElementById("p");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<input type = "submit" value = "submit "/><br />
</form>
</div>			
</div>		
</div>
</body>
</html>

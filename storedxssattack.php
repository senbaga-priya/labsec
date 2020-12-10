clogin.php
<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$conn=mysqli_connect("localhost","root","","sxss");
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
		echo "<head> <meta http-equiv=\"Refresh\" content=\"0;url=home.php\" > </head>";
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
home.php
<?php 
session_start();
 if(!$_SESSION['login_user']) 
{
echo "Need to login";
}
else {
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sxss";
$conn = new mysqli($servername, $username, $password,$dbname);
if($_SERVER['REQUEST_METHOD'] == "POST") {
echo "Welcome User!!\n";
$sql="update login set username='".
$_POST['disp_name']."' where username='".
$_SESSION['login_user']."';";
$result = $conn->query($sql);
echo "Your username update is success!!\n";
}
else {
if(strcmp($_SESSION['login_user'],'admin')==0) {
echo "Welcome admin<br><hr>";
echo "List of user's are<br>";
$sql = "select username from login where username!='admin'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row=$result->fetch_assoc()){
echo " UserName: " . $row["username"]."<br>";
}
}
}
else {
echo "<form name=\"tgs\" id=\"tgs\" method=\"post\" action=\"home.php\">";
echo "Update name:<input type=\"text\" id=\"disp_name\" name=\"disp_name\" value=\"\">";
echo "<input type=\"submit\" value=\"Update\">";
}
}
}
?>
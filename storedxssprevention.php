login.html
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
<form action = "login.php" method = "post">
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
login.php
<?php
$name = $_POST['username'];
$id = $_POST['password'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sxss";
$conn = new mysqli($servername, $username, $password,$dbname);
$sql = "SELECT username,password FROM login WHERE username='$name'";
$result = $conn->query($sql);
$row=$result->fetch_assoc();
#echo $name;
#echo $id;
$user_pass = $_POST['password'];
$user_name = $row['username'];
if(strcmp($user_pass,$row['password'])!=0) {
echo "Login failed - Invalid credentials";
}
else {
session_start();
$_SESSION['USER_NAME']= $user_name;
$_SESSION['PASSWORD']= $user_pass;
echo "<head> <meta http-equiv=\"Refresh\" content=\"0;url=home.php\" > </head>";
}
?>
home.php
<?php 
session_start();
if(!isset($_SESSION['USER_NAME']))
{  
    echo "need to login";  
}
else {
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sxss";
$conn = new mysqli($servername, $username, $password,$dbname);
if($_SERVER['REQUEST_METHOD'] == "POST") {
echo "Welcome User!!\n";
#$str=;
#$name= htmlspecialchars($_POST['disp_name']);
$sql="update login set username='".htmlspecialchars($_POST['disp_name'])."' where username='".$_SESSION['USER_NAME']."';";
#$sql="update usertable set uname='".$_POST['disp_name']."' where uname='".$_SESSION['USER_NAME']."';";
$result = $conn->query($sql);
echo "Your username update is success!!";
}
else {
if(strcmp($_SESSION['USER_NAME'],'admin')==0) {
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
echo "Update uname:<input type=\"text\" id=\"disp_name\" name=\"disp_name\" >";
echo "<input type=\"submit\" value=\"Update\">";
}
}
}
?> 









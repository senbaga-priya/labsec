register.php
<?php 
include "config.php";
?>
<!DOCTYPE html>
<html>
  <head>
   <title>Registration form </title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class='container'>
      <div class='row'>
        <div class='col-md-6' >
          <form method='post' action='check.php'>
            <h1>SignUp</h1>
            <?php 
           if(!empty($error_message)){
            ?>
            <div class="alert alert-danger">
              <strong>Error!</strong> <?= $error_message ?>
            </div>
           <?php
            }
            ?>
           <?php 
           if(!empty($success_message)){
            ?>
            <div class="alert alert-success">
              <strong>Success!</strong> <?= $success_message ?>
            </div>
           <?php
            }
            ?>
           <div class="form-group">
              <label for="fname"> Name:</label>
              <input type="text" class="form-control" name="fname" id="fname"  maxlength="80">
            </div>
                      <div class="form-group">
              <label for="email">Email address:</label>
              <input type="email" class="form-control" name="email" id="email"  maxlength="80">
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" name="password" id="password"  maxlength="80">
            </div>
            <button type="submit" name="btnsignup" class="btn btn-default">Submit</button>
          </form>
        </div>
    </div>
    </div>
  </body>
</html>
config.php
<?php
session_start();
$host = “localhost";
$user = "root"; 
$password = ""; 
$dbname = "rxss"; 
$con = mysqli_connect($host, $user, $password,$dbname);
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}
check.php
<?php 
session_start();
$host = "localhost";
$user = "root"; 
$password = "";
$dbname = "rxss";
$con = mysqli_connect($host, $user, $password,$dbname);
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}
$error_message = "";
$success_message = "";
if(isset($_POST['btnsignup']))
{
   $fname = trim($_POST['fname']);
   $email = trim($_POST['email']);
   $password = trim($_POST['password']);
   $isValid = true;
if($fname == '' || $email == '' || $password == '')
{
     $isValid = false;
     $error_message = "Please fill all fields.";
        echo "Error : $error_message";
   }
   if($isValid)
   {
     if(preg_match('/^[a-zA-Z0-9]{10,}$/', $fname)) 
     {      $isValid=true;
}
else{
     $isValid = false;
     $error_message = "Invalid Username";
        echo "Error : $error_message";
}
   }
    if ($isValid && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
     $isValid = false;
     $error_message = "Invalid Email-ID.";
        echo "Error : $error_message";
  } 
   if($isValid)
   {

    $stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $result = $stmt->get_result();
     $stmt->close();
     if($result->num_rows > 0){
       $isValid = false;
       $error_message = "Email-ID is already existed.";
          echo "Error : $error_message";
     }
   }
  if($isValid){
   $sql= "INSERT INTO users(fname,email,password) VALUES (?,?,?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sss",$fname,$email,$password);
     $stmt->execute();
     $stmt->close();
    if( mysqli_query ($con, $sql))
    {
echo "Records created successfully";
    }
    else{
     echo "Records created Successfully";
     }
  }
   }
?>
rlogin.php
<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$conn=mysqli_connect("localhost","root","","rxss");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
	die('Could not connect: '.mysqli_connect_error());  
}		
$myusername = $_POST['username'];
$mypassword = $_POST['password'];
      $sql = "SELECT fname,password FROM users WHERE fname = '$myusername' and password = '$mypassword';";
$sql_result = mysqli_query ($conn, $sql) or die ('request "Could not execute SQL query" '.$sql);
		$user = mysqli_fetch_assoc($sql_result);
		echo "<head> <meta http-equiv=\"Refresh\" content=\"0;url=home.php\" > </head>";	
	}
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
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rxss";
$conn = new mysqli($servername, $username, $password,$dbname);
echo "Welcome admin<br><hr>";
		echo "<head> <meta http-equiv=\"Refresh\" content=\"0;url=users.php\" > </head>";
?> 
users.php
<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<table>
<tr>
<th>Id</th>
<th>Username</th>
<th>Password</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "rxss");
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT fname,email, password FROM users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["fname"]. "</td><td>" . $row["email"] . "</td><td>"
. $row["password"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>
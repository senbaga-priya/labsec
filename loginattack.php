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
<form action = "attacks.php" method = "get">
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

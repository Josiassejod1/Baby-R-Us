<html>
<head><title>Logging In</title></head>
<body>

<?php 
require('connect.php');

//retrieve username and password from form
$usernameret=$_POST["user"];
$passwordret=$_POST["pass"];

/*
//to prevent mysql injection
$usernameret=stripcslashes($usernameret);
$passwordret=stripcslashes($passwordret);
$usernameret=mysql_real_escape_string($usernameret);
$passwordret=mysql_real_escape_string($passwordret);
*/

//Test the username and password
echo $usernameret.":".$passwordret;

//query the database for the user
 $query = "SELECT * FROM `user` WHERE username = `a`";
$result=mysqli_query($dbcon,$query);
//or die("<br>Failed to retrieve data <br>".mysql_error());
$row=mysqli_fetch_array($result);
if($row['user']== "a"){
//&& $row['password'] ==$passwordret){
	echo "<br>Login Success! Welcome ".$row['username'];
}else{
	echo "<br>Failed to Login!";
}
?>
</body>
</html>
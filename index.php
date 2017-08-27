<?php
 include('connect.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head><title>Welcome to Babies World</title>


<?php
  
   function logout() {
	// remove all session variables
	session_unset();
	// destroy the session 
	session_destroy();   
	header('Location: index.php'); /* Redirect browser */
    exit();
  }
  if (isset($_GET['logout'])) {
    logout();
    

  }
  
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($dbcon,$_POST['user']);
      $mypassword = mysqli_real_escape_string($dbcon,$_POST['pass']); 
      $mypassword = hash("sha256", $mypassword);
      $sql = "SELECT id FROM user WHERE username = '$myusername' and password = '$mypassword'";
      $sql2= "SELECT id FROM employee WHERE username= '$myusername' and password = '$mypassword'";
      $result = mysqli_query($dbcon,$sql);
      $result2 = mysqli_query($dbcon,$sql2);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
      //$active = $row['active'];
      $count = mysqli_num_rows($result);
      $count2= mysqli_num_rows($result2);
      // If result matched $myusername and $mypassword, table row must be 1 row
$error = "";		
      if($count == 1) {
        //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         $error = "You have successfully logged in as ".$myusername;
		//header("Location: http://cyan.csam.montclair.edu/~jumhoura1/baby/home.php"); /* Redirect browser */
		header('Location: .');
		exit;
      }else if($count2 == 1){
      	//session_register employee
      	$_SESSION['login_user'] = $myusername;
      	$_SESSION['employee_user'] = $myusername;
      	 $error = "Back to work so soon, ".$myusername;
		//header("Location: http://cyan.csam.montclair.edu/~jumhoura1/baby/home.php"); /* Redirect browser */
		header('Location: .');
		exit;
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }

?>



</head>
<style type="text/css">
body{overflow-x: hidden;background-color:beige;}
#top{background-color:#712D04;width:101.5%;height:40px;margin-left:-8px;margin-top:-8px;border-bottom:solid;color:#2A2A2A;}
#middle{background-color:beige;width:101.5%;margin-left:-8px;font-size:20px;}
#login {box-shadow: 10px 10px 5px grey;margin-bottom:15px;margin-top:20px;color:#712D04;border-radius:5px;background-color:beige;width:400px;margin-left:auto;margin-right:auto;border-style:solid;}
#footer{border-top:solid;border-color:#2A2A2A;font-size:20px;text-align:center;color:white;background-color:#712D04;height:20px;width:101.5%;margin-left:-8px;position: absolute;right: 0;bottom: 0;left: 0;padding: 1rem;}
#btn{color:white;background-color:#712D04;padding: 5px;}
#pic {margin-left:auto;margin-right:auto;width:700px;margin-top:40px;}
#leftpic {margin-left:10%;margin-top:-20px;position:absolute;width:300px;height:300px;}
#rightpic {margin-left:70%;margin-top:-30px;position:absolute;width:300px;height:300px;}
#temp {color:red;}

</style>
<body>
<div id="top"></div>
<div id="pic"> <img src="img/logo.png" width="700px">
</div>
<div id="middle">
<img src="img/left.png" id="leftpic"> <img src="img/right.png" id="rightpic">
<div id="login">
<form action="" method="post">
<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
<table>
<?php
if(!empty($_SESSION['login_user'])) {
?>
<tr>
<td><h2>You're logged in as:  <?php echo ucfirst($_SESSION['login_user'])."!</h2>"; 

//temp message to dalvin

?>
<div id="temp">
<?php
if($_SESSION['login_user'] == "dalvin"){
 echo "Dalvin check out the home page and tell me what I should make better!";
 } 

?>
</div></td>
</tr>
<tr>
<td><?php
if($_SESSION['login_user'] == "alaa" OR $_SESSION['login_user'] == "dalvin"){ ?><a href="admin.php">Admin Panel</a> <?php } 
if($_SESSION['login_user'] == 'alaa' OR !empty($_SESSION['employee_user'])){?><a href="employeepanel.php">Employee Panel</a> <?php } ?>

<a href="home.php">Home</a> <a href="index.php?logout=true">Sign Out</a></td>
</tr>
<?php }else{ ?>
<tr>
<td>Please Enter Your Username and Password to Continue!</td>
</tr>
<tr>
<td>Username :&nbsp;<input type="text" name="user"></td>
</tr>
<tr>
<td>Password : &nbsp;<input type="password" name="pass"></td>
</tr>
<tr>
<td><input type="submit" id="btn" value="Login"></td>
</tr>
<tr>
<td><a href="#">Forgot?</a> <a href="register.php">Register?</a> </td>
</tr>
<?php } ?>
</table>
</form>
</div>
</div>
<div id="footer">&copy; 2016 BabiesWorld.com</div>
</body>
</html>
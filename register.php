<html>
<head><title>Welcome to Babies World</title>
<?php
	require('connect.php');
    // If the values are posted, insert them into the database.
    if (isset($_POST['user']) && isset($_POST['pass'])){
        $username = $_POST['user'];
        $password = $_POST['pass'];
 $password = hash("sha256", $password);
        $query = "INSERT INTO `user` (username, password) VALUES ('$username', '$password')";
        $result = mysqli_query($dbcon, $query);
        if($result){
            $smsg = "User Created Successfully.";
        }else{
            $fmsg ="User Registration Failed";
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
#leftpic {margin-left:150px;margin-top:-20px;position:absolute;width:300px;height:300px;}
#rightpic {margin-left:900px;margin-top:-30px;position:absolute;width:300px;height:300px;}
</style>
<body>
<div id="top"></div>
<div id="pic"> <img src="img/logo.png" width="700px">
</div>
<div id="middle">
<img src="img/left.png" id="leftpic"> <img src="img/right.png" id="rightpic">
<div id="login">
 <form method="POST">
 
       <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
 <table>
<tr>
<td>Register to be able to Sign in!</td>
</tr>
<tr>
<td>Username :&nbsp;<input type="text" name="user" placeholder="Username" required></td>
</tr>
<tr>
<td>Password : &nbsp;<input type="password" name="pass" placeholder="Password" required></td>
</tr>
<tr>
<td><button id="btn" type="submit">Register</button>
</tr>
<tr><td><a href="index.php">Login?</a></td></td></tr>
<table>
</form>
</div>
</div>
<div id="footer">&copy; 2016 BabiesWorld.com</div>
</body>
</html>
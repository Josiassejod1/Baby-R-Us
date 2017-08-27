<?php include('session2.php');
	require('connect.php');
	?> 
<html>
<head><title>Add a User</title>
<?php
    // If the values are posted, insert them into the database.
    if (isset($_POST['user']) && isset($_POST['pass'])){
        $username = $_POST['user'];
        $password = $_POST['pass'];
 $password = hash("sha256", $password);
        $query = "INSERT INTO `employee` (username, password) VALUES ('$username', '$password')";
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

html,body{overflow-x: hidden;background-color:beige;height:100%; margin:0;padding:0;color:#712D04;}
#top{background-color:#712D04;width:101.5%;height:40px;margin-left:-8px;margin-top:-8px;border-bottom:solid;color:#2A2A2A;}

#mid{
width:600px;
margin:auto;
padding:10px;
}
#btn{color:white;background-color:#712D04;padding: 5px;}
#pic {margin-left:220px;width:100%;margin-top:40px;height:50px;}
#gray {background-color:#D3D3D3; margin-top:-40px;margin-left:-10px;width:101.5%;height:50px;}
#navbar {margin-left:700px;width:500px;}
ul {list-style-type: none;margin: 0;padding: 0; background-color: #f1f1f1;width: 200px;}
li {float:left;color:#712D04;}
li a {display: block;color:#712D04;padding: 8px 16px;text-decoration: none;font-size:25px;margin-top:5px;}
li a:hover {background-color:#712D04;color: white;}
#logo {margin-top:-4px;}
#box {color:#712D04;border:solid;border-color:#712D04;float:left;width:260px;height:200px;margin:10px;}

</style>
<body>
<div id="top"></div>
<div id="gray">
<div id="pic"> <img id="logo" src="img/logo.png" width="300px" height="50px"> 


<span style="font-size:30px;color:#712D04;padding:10px;margin-left:70px;font-weight:bold;">Welcome, <?php echo ucfirst($_SESSION['login_user'])."!"; ?></span>
<ul id="navbar" style="margin-top:-50px;">
  <li><a href="index.php">Links</a></li>
  <li><a href="index.php?logout=true">Logout</a></li>
</ul>

</div>
</div>


<div id="mid">


 <form method="POST">
 
       <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
 <table>
<tr>
<td>Username :&nbsp;<input type="text" name="user" placeholder="Username" required></td>
</tr>
<tr>
<td>Password : &nbsp;<input type="password" name="pass" placeholder="Password" required></td>
</tr>
<tr>
<td><button id="btn" type="submit">Register</button>
</tr>
<table>
</form>
</div>
</body>
</html>
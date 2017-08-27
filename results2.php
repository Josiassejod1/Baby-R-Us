<?php
include ('session2.php');
require ('connect.php');
ob_start();
?>
<html>
<head><title>Welcome to Babies World</title>
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
<h1>Searching...</h1>
<?php

//call function when button is pressed
if($_POST['byeuser']) {
        byeuser($_POST['iD2Delete']);
    
     }

  // create short variable names
  $searchterm=trim($_POST['searchterm']);

function byeuser($id){
@ $db = new mysqli('localhost', 'jumhoura1', 'Google123', 'jumhoura_company');
	$query = "DELETE FROM `employee` WHERE `id`= $id";
	$result = $db->query($query);
}
 
  $query = "select * FROM employee WHERE username like '%$searchterm%'";
  $result = $dbcon->query($query);
  $num_results = $result->num_rows;
  echo "<p>Number of employee's found: ".$num_results."</p>";
  //Deleting a user
  echo "<form method='post' action='results2.php'>";   
echo "<div style = 'font-size:15px; color:#cc0000; margin-top:10px'>ID to Delete: <input type='text' size='1px' name='iD2Delete'>";
echo " <input type='submit' name='byeuser' value='Delete'></div>";
  echo "</form>";
  //Displaying users from table
  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     $array[i]=$row['id'];
     echo "<p><strong>".($i+1).". ID: ";
     echo htmlspecialchars(stripslashes($row['id']));
     echo "</strong><br />Username: ";
     echo stripslashes($row['username']);
     echo "<br />Password: ";
     echo stripslashes($row['password']);
     echo "<br/>";
     echo "</p>";
  }
  $result->free();
  $dbcon->close();
?>
</div>
</body>
</html>

<?php
   include('session2.php');
?>
<html>
<head><title>Welcome to Babies World</title>
</head>
<style type="text/css">

html,body{overflow-x: hidden;background-color:beige;height:100%; margin:0;padding:0;color:#712D04;}
#top{background-color:#712D04;width:101.5%;height:40px;margin-left:-8px;margin-top:-8px;border-bottom:solid;color:#2A2A2A;}

#mid{
width:500px;
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

<table>
<tr>
<th>All Users Search</th>
<th>Employee Search</th>
</tr>
<tr>
<td>
<form action="results.php" method="post">
<input name="searchterm" size="20" type="text" />
<input name="submit" type="submit" value="Search" /></form>
</td>
<td>
<form action="results2.php" method="post">
<input name="searchterm" size="20" type="text" />
<input name="submit" type="submit" value="Search" /></form>
</td>
</tr>

<tr>
<th>
Add a User <form action="adduser.php" method="post">
<input name="submit" type="submit" value="Add" /></form>
</th>
<th>
Add an Employee
<form action="addemployee.php" method="post">
<input name="submit" type="submit" value="Add" /></form>
</th>
</tr>
</table>

</div>


</body>
</html>
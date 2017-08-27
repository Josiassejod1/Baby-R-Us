<?php
session_start();
require ('connect.php');
ob_start();

?>

<!DOCTYPE html>
<head>
	<title></title>
</head>


<style type="text/css">
 table,td, tr{
  border: 1px solid #712D04;
 }
 
 body{
 
 background-color:beige;
 overflow-x: hidden;
 
 }
 
 #top{background-color:#712D04;width:101.5%;height:40px;margin-left:-8px;margin-top:-8px;border-bottom:solid;color:#2A2A2A;}
 #footer{border-top:solid;border-color:#2A2A2A;font-size:20px;text-align:center;color:white;background-color:#712D04;height:20px;width:101.5%;margin-left:-8px;position: absolute;right: 0;bottom: 0;left: 0;padding: 1rem;}
 #pic {margin-left:auto;margin-right:auto;width:700px;margin-top:40px;}
</style>

<body>

<div id="top"></div>
<div id="pic"> <img src="img/logo.png" width="700px">



	<h1>Stock has been Updated!</h1>
	
	<table>
	
	
	   <tr>
	   	<strong><td>Item Name</td></strong>
          	 <strong><td>Quantity Added</td></strong>
          	 <strong><td>Stock Remaining</td></strong>
   
     	</tr>
	<?php
	
	
	echo "<tr>";

	
	
	echo "<td>";
		foreach ($_SESSION["cart_item"] as $item){
	
		$name = $item["name"];
		$_SESSION["name"] = $name;
		
		$quantity = $item["quantity"];
		$_SESSION["quantity"] = $quantity;
		
		echo "".$name."</br>";
		
		}
	echo "</td>";
	
	
	echo "<td>";
	foreach ($_SESSION["cart_item"] as $item){
		
		$name = $item["name"];
		$_SESSION["name"] = $name;
		
		$quantity = $item["quantity"];
		$_SESSION["quantity"] = $quantity;
		echo "".$quantity."</br>";
		
		
		
		}
	echo "</td>";
	
	echo "<td>";
	foreach ($_SESSION["cart_item"] as $item){
		$Amount = $item["Amount"];
		$_SESSION["Amount"] = $Amount;
		$name = $item["name"];
		$_SESSION["name"] = $name;
		
		$quantity = $item["quantity"];
		$_SESSION["quantity"] = $quantity;
		$_SESSION["Amount"]= $Amount;
		
		$price = $item["price"];
		$_SESSION["price"] = $price;
		
		echo "".$Amount+$quantity."</br>";
		
		}
	echo "</td>";
	
	
	
	
	echo "</tr>";
	
	
	

	
	
	
	 
	
	  $num_results = $result->num_rows;
	  
	  
	  
	  /*
	  
	  Update Quantity in Database
	  
	  */
	  
	  foreach($_SESSION["cart_item"] as $item){
	  	
	  
	      $name = $item['name'];
	      $quantity = $item["quantity"];
		
	  $query = "SELECT * FROM tblproduct WHERE name = '$name'";
	  $result = $dbcon->query($query);
	  $row =   $result->fetch_assoc();
	  
	 
	  
	  $update = $row['Amount'] + $quantity;
	  $query = "UPDATE tblproduct SET Amount = Amount + $quantity WHERE name='$name'";
	  $result = $dbcon->query($query);
	  



	  
	  }
	  

 	 $dbcon->close();
	unset($_SESSION["cart_item"]);
	?>	
	</table>	
<div id="footer">&copy; 2016 BabiesWorld.com</div>	
</body>
</html>
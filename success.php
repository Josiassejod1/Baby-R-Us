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



	<h1>Order Processed!</h1>
	<p>Thank you for making a purchase off of our website here is what you have purchased.</p>
	
	<table>
	   <tr>
	   	<strong><td>First Name </td></strong>
	   	<strong><td>Last Name </td></strong>
	   	<strong><td>Email</td></strong>
	   	<strong><td>Phone</td></strong>
	   	<strong><td>Item Name</td></strong>
     		<strong><td>Price</td></strong>
          	 <strong><td>Quantity</td></strong>
          	 <strong><td>Sub Total</td></strong>
          	 <strong><td>Grand Total</td></strong>
     	</tr>
	<?php
	
	$subtotal = $quantity * $price;
 	$sum = $sum + $subtotal;
	
	echo "<tr>";
	
	echo "<td>".$_POST['fname']."</td>";
	echo "<td>".$_POST['lname']."</td>";
	echo "<td>".$_POST['email']."</td>";
	echo "<td>".$_POST['phone']."</td>";
		
	
	
	
	
	echo "<td>";
		foreach ($_SESSION["cart_item"] as $item){
		$Amount = $item["Amount"];
		$_SESSION["Amount"] = $Amount;
		if($Amount != 0){
		$name = $item["name"];
		$_SESSION["name"] = $name;
		
		$quantity = $item["quantity"];
		$_SESSION["quantity"] = $quantity;
		
		
		
		
		$price = $item["price"];
		$_SESSION["price"] = $price;
		
		echo "".$name."</br>";
		}
		}
	echo "</td>";
	
	
	echo "<td>";
	foreach ($_SESSION["cart_item"] as $item){
		$Amount = $item["Amount"];
		$_SESSION["Amount"] = $Amount;
		if($Amount != 0){
		$name = $item["name"];
		$_SESSION["name"] = $name;
	
		$quantity = $item["quantity"];
		$_SESSION["quantity"] = $quantity;
		
		
		$price = $item["price"];
		$_SESSION["price"] = $price;
		
		echo "$".$price."</br>";
		}
		}
	echo "</td>";
	
	echo "<td>";
	foreach ($_SESSION["cart_item"] as $item){
		$Amount = $item["Amount"];
		$_SESSION["Amount"] = $Amount;
		if($Amount != 0){
		$name = $item["name"];
		$_SESSION["name"] = $name;
		
		$quantity = $item["quantity"];
		$_SESSION["quantity"] = $quantity;
		
		$price = $item["price"];
		$_SESSION["price"] = $price;
		
		echo "".$quantity."</br>";
		}
		}
	echo "</td>";
	
	
	
	
	
	echo "<td>";
	foreach($_SESSION["cart_item"] as $item){
		$Amount = $item["Amount"];
		$_SESSION["Amount"] = $Amount;
		if($Amount != 0){
		$quantity = $item["quantity"];
		$_SESSION["quantity"] = $quantity;
		
		$price = $item["price"];
		$_SESSION["price"] = $price;
		$subtotal = $quantity * $price;
		
		$sum = $sum + $subtotal;
}
	 
	}
	
	echo "  $".$sum."";
	echo "</td>";
	
	$salesTax= 0.07;
	
	$GrandTotal = $sum + ($sum * $salesTax);
	echo "<td>$".round($GrandTotal,2)."</td>";
	
	
	echo "</tr>";
	
	echo "<em><p>* 7% New Jersey Sales Tax</p></em>";
	
	
	
	
	
	 
	
	  $num_results = $result->num_rows;
	  
	  
	  
	  /*
	  
	  Update Quantity in Database
	  
	  */
	  
	  foreach($_SESSION["cart_item"] as $item){
	  	$Amount = $item["Amount"];
		$_SESSION["Amount"] = $Amount;
		if($Amount != 0){
	  
	      $name = $item['name'];
	      $quantity = $item["quantity"];
	  $query = "SELECT * FROM tblproduct WHERE name = '$name'";
	  $result = $dbcon->query($query);
	  $row =   $result->fetch_assoc();
	  
	  $update = $row['Amount'] - $quantity;
	  $query = "UPDATE tblproduct SET Amount = Amount - $quantity WHERE name='$name'";
	  $result = $dbcon->query($query);
	  
	  }else{
	  $name = $item['name'];
	  echo "<p>".$name." is Out of Stock!</p>";
	  //printf("Errormessage: %s\n", $mysql->error);
		
	  }

}
	  
	  
	  

 	 $dbcon->close();
	unset($_SESSION["cart_item"]);
	?>	
	</table>	
<div id="footer">&copy; 2016 BabiesWorld.com</div>	
</body>
</html>
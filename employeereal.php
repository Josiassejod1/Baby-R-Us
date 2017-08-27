<?php
require('connect.php');
session_start();

function runQuery($query) {
@ $dbcon = new mysqli('localhost', 'jumhoura1', 'Google123', 'jumhoura_company');
		$result = mysqli_query($dbcon,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'Amount'=>$productByCode[0]["Amount"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],$_SESSION["cart_item"])) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k)
								$_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<HTML>
<HEAD>
<TITLE>Shopping Cart</TITLE>

</HEAD>
<style>
#heading {
padding: 5px 10px;font-size:1.1em;font-weight:bold;
}


#checkOutP{
background-color:beige;
border: 2px solid brown;
}

#checkOutTable, td{
text-align: center;
}

#total{
text-align: right;
}
#btn{background-color:#712D04;border:0;padding:1px 10px;color:#FFF; font-size:0.8em;font-weight:normal;text-decoration:none;}
#btnEmpty{background-color:#712D04;border:0;padding:1px 10px;color:#FFF; font-size:0.8em;font-weight:normal;float:right;text-decoration:none;}
#btnRemove{color:#D60202;border:0;padding:2px 10px;font-size:0.9em;}
body {
color:#712D04;
width:800px;
margin:auto;
}






#shopping-cart {border-top: #79b946 2px solid;margin-bottom:30px;}

.cart-item {border-bottom: #79b946 1px dotted;padding: 10px;}

#product-grid .txt-heading{background-color: #FFD0A6;}
.product-item {	float:left;background-color:beige;margin:15px;padding:5px;}
.product-item div{text-align:center;margin:10px;}

.product-image {height:100px;background-color:#FFF;}
;
</style>
<BODY>
<div id ="checkOutP">
<div id="heading">Shopping Cart <a id="btnEmpty" href="employeereal.php?action=empty">Empty Stock Queue</a></div>
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>	
<table id="checkOutTable" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th><strong>Name</strong></th>
<th><strong>Code</strong></th>
<th><strong>Quantity</strong></th>
<th><strong>Left in Stock</strong></th>
<th><strong>Action</strong></th>
</tr>	
<form action="success2.php" method="post">
<h1>Check Out</h1>
<hr>
<?php		


    foreach ($_SESSION["cart_item"] as $item){
		$name = $item["name"];
		$code = $item["code"];
		$quantity = $item["quantity"];
		$Amount = $item["Amount"];
		
		$_SESSION["name"] = $name;
		$_SESSION["code"] = $code;
		$_SESSION["Amount"] = $Amount;
		$_SESSION["quantity"] = $quantity;
		
		
		?>	
				
				
				<tr>
				<td><strong><?php echo $item["name"]; ?></strong></td>
				<td><?php echo $item["code"]; ?></td>
				<td><?php echo $item["quantity"];?></td> 
				<td><?php 
				if($Amount >255){
				echo "<p style='color:red'>Theres too much in Stock!</p>";
				
				}else {
				echo $item["Amount"]; 
				}
				?></td>
				</td>
				
				<td><a href="employeereal.php?action=remove&code=<?php echo $item["code"]; ?>" id="btnRemove">Remove Item</a></td>
				</tr>
				
				<?php

		}
		?>

<tr>

<td><input type="submit" name="CheckOut" id="btn" value="Add to Stock"></td>
</tr>
</tbody>



</form>
</table>
		
  <?php
}
?>
</div>

<div id="product-grid">
	<div id="heading">Products</div>
	<?php
	$product_array = runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="employeereal.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>" width="100px" height="100px"></div>
			<div><strong><?php echo $product_array[$key]["name"]; ?></strong></div>
			<div><?php echo "$".$product_array[$key]["price"]; ?></div>
			<div><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to Stock" id="btn"/></div>
			</form>
		</div>
	<?php
			}
	}
	?>
</div>
</BODY>
</HTML>
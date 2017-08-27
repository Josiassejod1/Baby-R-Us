<?php
   include('session.php');
?>
<html>
<head><title>Welcome to Babies World</title>
</head>
<style type="text/css">

html,body{overflow-x: hidden;background-color:beige;height:100%; margin:0;padding:0;color:#712D04;}
#top{background-color:#712D04;width:101.5%;height:40px;margin-left:-8px;margin-top:-8px;border-bottom:solid;color:#2A2A2A;}

#mid{
width:1000px;
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

<?php
require('connect.php');

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
#shopping-cart {border-top: #79b946 2px solid;margin-bottom:30px;}

.cart-item {border-bottom: #79b946 1px dotted;padding: 10px;}

#product-grid .txt-heading{background-color: #FFD0A6;}
.product-item {	float:left;background-color:beige;margin:15px;padding:5px;}
.product-item div{text-align:center;margin:10px;}

.product-image {height:100px;background-color:#FFF;}

</style>

<div id ="checkOutP">
<div id="heading">Shopping Cart <a id="btnEmpty" href="home.php?action=empty">Empty Cart</a></div>
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
<th><strong>Price</strong></th>
<th><strong>Action</strong></th>
</tr>	
<form action="success.php" method="post">
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
				if($Amount <= 0){
				echo "<p style='color:red'>No More Left In Stock!</p>";
				
				}else {
				echo $item["Amount"]; 
				}
				?></td>
				</td>
				<td align=right><?php echo "$".$item["price"]; ?></td>
				<td><a href="home.php?action=remove&code=<?php echo $item["code"]; ?>" id="btnRemove">Remove Item</a></td>
				</tr>
				
				<?php
        $item_total += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td id="total" colspan="" align=right><strong>Total:</strong> <?php echo "$".$item_total; ?></td>

<td><input type="submit" name="CheckOut" id="btn"></td>
</tr>
</tbody>





<tbody>
<tr>
	<td><p>First Name:</p></td>
	<td><input type="text" required placeholder="First Name" maxlength="20" name="fname"></td>
</tr>

<tr>
	<td><p>Last Name:</p></td>
	<td><input type="text" required placeholder="Last Name" maxlength="20" name="lname">
</tr>

<tr>
	<td><p>Email:</p></td>
	<td><input type="email" required placeholder="Email" name="email"></td>
</tr>

<tr>
	<td><p>Phone:</p></td>
	<td><input type="tel" required placeholder="(###)-###-###" name="phone" pattern="\d{3}-?\d{3}-?\d{4}"></td>
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
			<form method="post" action="home.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>" width="100px" height="100px"></div>
			<div><strong><?php echo $product_array[$key]["name"]; ?></strong></div>
			<div><?php echo "$".$product_array[$key]["price"]; ?></div>
			<div><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" id="btn"/></div>
			</form>
		</div>
	<?php
			}
	}
	?>

</div>
</div>

</body>
</html>
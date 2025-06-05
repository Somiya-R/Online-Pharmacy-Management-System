<?php 
	session_start();

	$conn=mysqli_connect("localhost","root","","my pharmacy");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	}

	$iCode = $_GET['iCode'];
	$item = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `item` WHERE `iCode`='$iCode'"));

	if ($_SERVER['REQUEST_METHOD']=="POST") {
		$cartItem = array($item,$_POST['iQuantity']);
		array_push($_SESSION['cart'], $cartItem);
		echo '<script type="text/javascript">window.history.back();</script>';
	}

 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add to cart</title>
	<link rel="stylesheet" type="text/css" href="../../style.css">
</head>
<body>

<div class="top">
	<div class="username">Hey <?php echo $_SESSION['cData']['cName'] ?></div>
	<nav class="navbar">
		<a href="../cart.php">View Cart (<?php if (isset($_SESSION['cart'])) {
			echo count($_SESSION['cart']);
		} ?>)</a>
		<a href="logout.php">Logout</a>
	</nav>
</div>

<div class="content">

	<div class="header">
		<div class="subheading">Add Item to Cart</div>
	</div>

	<div class="bigcard">
		
		<div style="padding: 20px;">

			<span style="font-size: 36px;font-weight: 800;"><?php echo $item['iName'] ?></span>

			<table border="0">
				<tr><td>Item Code</td><th><?php echo $item['iCode'] ?></th></tr>
				<tr><td>Item Type</td><th><?php echo $item['iType'] ?></tth></tr>
				<tr><td width="150px">Item Expiry Date</td><th><?php echo $item['iExp'] ?></th></tr>
				<tr><td>Company</td><th><?php echo $item['iCompany'] ?></th></tr>
			</table>
		</div>

		<div style="box-shadow: 3px 3px 10px #0004 inset; width:200px;padding: 0 10px;text-align: center;border-radius: 15px;">
			<span style="float:right;font-size: 36px;cursor: pointer;" onclick="window.history.back();">×</span>
			<form method="post">
				<br/><br/><br/><br/>

				Select Quantity <input type="number" name="iQuantity" style="font-size: 36px;width: 60px;border-radius: 5px;background: transparent; text-align:right;" min="1" value="1">

				<br/><br/><br/><br/><br/>

				<button class="btn btnorange" style="width:120px; height: 40px;padding: 0;font-size: 16px;">Add to Cart</button>

			</form>
		</div>

	</div>


</div>

</body>
</html>
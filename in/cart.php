<?php 

	session_start();

	$conn=mysqli_connect("localhost","root","","my pharmacy");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	}


 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View Cart Items</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>

<div class="top">
	<div class="username">Hey <?php echo $_SESSION['cData']['cName']; ?></div>
	<nav class="navbar">
		<a href="checkout.php">Checkout</a>
		<a href="customerHome.php">Catalogue</a>
		<a href="backend/logout.php">Logout</a>
	</nav>
</div>

<div class="content" style="flex-direction: column;align-items: center;">
	<div class="header">
		<div class="subheading">Cart</div>
	</div>
	<?php
	foreach ($_SESSION['cart'] as $key => $i){ ?> 
		<div class="card" style="width:700px;height: 50px;">

			<b><?php echo $i[0]['iName'];?></b><a href="backend/removeItem.php?key=<?php echo $key ?>" style="float: right;padding: 0;">Remove Item</a>

			<div style="width:100%;height: 80%;margin-top: 10px;box-sizing: border-box;">

				<span style="color: #666;font-size:14px;">
					Quantity: <?php echo $i[1]; ?><br/>
				</span>


				
			</div>
		</div>
	<?php } ?>
</div>

</body>
</html>
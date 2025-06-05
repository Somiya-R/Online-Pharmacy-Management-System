<?php 

session_start();
$total=0;
foreach ($_SESSION['cart'] as $key => $i) {
	$total = $total + $i[0]['iPrice']*$i[1];
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Checkout</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>

<div class="top">
	<div class="username">Hey <?php echo $_SESSION['cData']['cName']; ?></div>
	<nav class="navbar">
		<a href="customerHome.php">Catalogue</a>
		<a href="backend/logout.php">Logout</a>
	</nav>
</div>

<div class="content" style="flex-direction:column;align-items: center;">
	
	<div class="subheading">Checkout</div>

	<div class="box" style="position: relative;cursor: pointer;" onclick="location.href='backend/clearCart.php'">
		
		Your total bill is Rs.<?php echo $total; ?>
		Thank you for shopping with us!

	</div>

</div>

</body>
</html>
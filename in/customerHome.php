<?php
	session_start();
	if(!isset($_SESSION['cart'])){
	$_SESSION['cart']=array();}

	if (isset($_SESSION['cData'])) {
		$cData = $_SESSION['cData'];
		$cName = $cData['cName'];

		$conn=mysqli_connect("localhost","root","","my pharmacy");
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			exit();
		}

		$itemarr = mysqli_fetch_all(mysqli_query($conn,"SELECT * FROM `item` ORDER BY `iExp`"),MYSQLI_ASSOC);

		
	}
	else{
		header("Location:../login/customerLogin.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<title>Home</title>
</head>
<body>

<div class="top">
	<div class="username">Hey <?php echo $cName ?></div>
	<nav class="navbar">
		<a href="prescription.php">Prescription Portal</a>
		<a href="cart.php">View Cart (<?php if (isset($_SESSION['cart'])) {
			echo count($_SESSION['cart']);
		} ?>)</a>
		<a href="backend/logout.php">Logout</a>
	</nav>
</div>

<div class="content">
	<div class="header">
		<div class="subheading">Catalogue</div>
	</div>
	<?php
	foreach ($itemarr as $i){ ?> 
		<div class="card">

			<b><?php echo $i['iName'].' ';?></b>by <?php echo $i['iCompany'] ?>

			<div style="width:100%;height: 80%;margin-top: 10px;box-sizing: border-box;">

				<span style="color: #666;font-size:14px;">
					Type: <?php echo $i['iType']; ?><br/>
					Price: Rs.<?php echo $i['iPrice']; ?><br/>
					Quantity: <?php echo $i['iAmount']; ?><br/>
				</span>
				<a href="backend/addtocart.php?iCode=<?php echo $i['iCode'] ?>" style="float: right;padding: 0;">Add To Cart</a>
			</div>
		</div>
	<?php } ?>
</div>
</body>
</html>
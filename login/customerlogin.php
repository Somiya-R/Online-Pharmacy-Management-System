<?php
	session_start();
	if (isset($_SESSION['cData'])) {
		ob_start();
		header("Location:../in/customerHome.php");
		ob_end_flush();
	}
 ?>
<!doctype html>
<html>  
<head>  
	<title>Customer Login</title> 
	<link href="../style.css" rel="stylesheet" type="text/css">
</head>  
<body>
	<button class="btn backbtn" onclick="document.location='../loginchoice.php'">Back</button>
	<div class="center">
		<div class = "box">  
		<h1 class="subheading">CUSTOMER LOGIN</h1>
			<form name="f1" action = "backend/authenticateCustomer.php" method = "POST">
				<center>

				<table>
				<tr>
					<td><label>NIC: </label></td>
					<td><input type="text" id="nic" name="nic" required/></td>
				</tr>
				<tr>
					<td><label>Password: </label></td>
					<td><input type="password" id="pass" name="pass" required/></td>
				</tr>
				</table>
				<?php if (isset($_SESSION['cerr'])) {
					echo '<span style="color:red">'.$_SESSION['cerr'].'</span>';
				} ?>
				<input style="margin-top: 20px;" type="submit" class="btn btnorange" value = "Login" />
				<button style="margin-top: 10px" type="button" class="btn" onclick="document.location='customerSignUp.php';">Sign Up</button>
				</center>
				
		</div>
	</div>
</body> 
</html>  

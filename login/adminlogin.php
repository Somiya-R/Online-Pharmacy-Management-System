<?php
	session_start();
	if (isset($_SESSION['aData'])) {
		ob_start();
		header("Location:../in/adminHome.php");
		ob_end_flush();
	}
 ?>
<!doctype html>
<html>  
<head>  
	<title>Admin Login</title> 
	<link href="../style.css" rel="stylesheet" type="text/css">
</head>  
<body>
	<button class="btn backbtn" onclick="document.location='../loginchoice.php'">Back</button>
	<div class="center">
		<div class = "box">  
		<h1 class="subheading">ADMIN LOGIN</h1>
			<form name="f1" action = "backend/authenticateAdmin.php" onsubmit ="return validation()" method = "POST">
				<center>

				<table>
				<tr>
					<td><label>Admin ID: </label></td>
					<td><input type="text" id="aID" name="aID" required/></td>
				</tr>
				<tr>
					<td><label>Password: </label></td>
					<td><input type="password" id="pass" name="pass" required/></td>
				</tr>
				</table>
				<?php if (isset($_SESSION['aerr'])) {
					echo '<span style="color:red">'.$_SESSION['aerr'].'</span>';
				} ?>
				<input style="margin-top: 50px;" type="submit" class="btn btnorange" value = "Login" />

				</center>
				
		</div>
	</div>
</body> 
</html>  

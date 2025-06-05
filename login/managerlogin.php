<?php
	session_start();
	if (isset($_SESSION['mData'])) {
		ob_start();
		header("Location:../in/managerHome.php");
		ob_end_flush();
	}
 ?>
<!doctype html>
<html>  
<head>  
	<title>Manager Login</title> 
	<link href="../style.css" rel="stylesheet" type="text/css">
</head>  
<body>
	<button class="btn backbtn" onclick="document.location='../loginchoice.php'">Back</button>
	<div class="center">
		<div class = "box">  
		<h1 class="subheading">MANAGER LOGIN</h1>
			<form name="f1" action = "backend/authenticateManager.php" onsubmit="return validation()" method = "POST">
				<center>

				<table>
				<tr>
					<td><label>Manager ID: </label></td>
					<td><input type="text" id="mID" name="mID" required/></td>
				</tr>
				<tr>
					<td><label>Password: </label></td>
					<td><input type="password" id="pass" name="pass" required/></td>
				</tr>
				</table>
				<?php if (isset($_SESSION['merr'])) {
					echo '<span style="color:red">'.$_SESSION['merr'].'</span>';
				} ?>
				<input style="margin-top: 50px;" type="submit" class="btn btnorange" value = "Login" />

				</center>
				
		</div>
	</div>
</body> 
</html>  

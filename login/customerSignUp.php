<?php
session_start();

$conn=mysqli_connect("localhost","root","","my pharmacy");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

if ($_SERVER["REQUEST_METHOD"]=="POST") {
	$cName = $_POST['name'];
	$cNIC = $_POST['nic'];
	$cEmail = $_POST['email'];
	$cAddress = $_POST['address'];
	$cPhone = $_POST['phone'];
	$cPass1 = $_POST['pass1'];
	$cPass2 = $_POST['pass2'];

	$select = mysqli_query($conn,"SELECT * FROM `customer` WHERE `cNIC`='$cNIC'");
	if(mysqli_num_rows($select)==0){
		if ((is_numeric($cNIC) && (strlen($cNIC)==12)) || strlen($cNIC)==10) {
			if ($cPass1==$cPass2) {
				unset($err);
				$insertsql = "INSERT INTO `customer` (cName,cNIC,cPass,cAddress,cEmail,cPhone) VALUES ('$cName','$cNIC','$cPass1','$cAddress','$cEmail','$cPhone')";
				$conn->query($insertsql);
				$_SESSION['name'] = $cName;
				ob_start();
				header("location:customerLogin.php");
				ob_end_flush();
			}
			else{
				$err = "Passwords don't match";
			}
		}
		else{
			$err = "Invalid NIC format";
		}
	}
	else{
		$err = "Username already exists";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign Up Form</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
<button class="btn backbtn" onclick="document.location='../index.php'">Back</button>
<div class="center">
	<div class="box">
		<h1 class="subheading">Sign Up</h1>

		<form name="customerSignUp" method="POST">
		<table style="margin:auto;">
			<tr>
				<td><label>Name: <font color="red">*</font></label></td>
				<td><input type="text" id="name" name="name" required/></td>
			</tr>
			<tr>
				<td><label>NIC: <font color="red">*</font></label></td>
				<td><input type="text" id="nic" name="nic" required/></td>
			</tr>
			<tr>
				<td><label>Email: </label></td>
				<td><input type="email" id="email" name="email"/></td>
			</tr>
			<tr>
				<td><label>Address: <font color="red">*</font></label></td>
				<td><input type="text" id="address" name="address" required/></td>
			</tr>
			<tr>
				<td><label>Phone: <font color="red">*</font></label></td>
				<td><input type="text" id="phone" name="phone" required/></td>
			</tr>
			<tr>
				<td><label>Password: <font color="red">*</font></label></td>
				<td><input type="password" id="pass1" name="pass1" required/></td>
			</tr>
			<tr>
				<td><label>Re Enter Password: <font color="red">*</font></label></td>
				<td><input type="password" id="pass2" name="pass2" required/></td>
			</tr>
		</table><br/>
		<?php if(isset($err)){
			echo '<span style="color: red">'.$err.'</span>';
		} ?>
		<br/><br/>
		<input type="submit" name="submit" class="btn btnorange" value="Sign Up"/>
		</form>
	</div>
</div>
</body>
</html>
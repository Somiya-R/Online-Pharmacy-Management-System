<?php 
	session_start();
	$conn=mysqli_connect("localhost","root","","my pharmacy");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	}
	if ($_SERVER["REQUEST_METHOD"]=="POST") {
		$cNIC = $_POST['nic'];
		$cPass = $_POST['pass'];

		$select = mysqli_query($conn,"SELECT * FROM `customer` WHERE `cNIC`='$cNIC' && `cPass`='$cPass'");
		$rows = mysqli_num_rows($select);
		if ($rows==1) {
			$data = mysqli_fetch_assoc($select);
			$_SESSION['cData'] = $data;
			header("Location:../../in/customerHome.php");
			echo '<script type="text/javascript">window.history.forward();</script>';
		} else {
			$_SESSION['cerr'] = "Incorrect username or password";
			header("Location:../customerLogin.php");
		}
		
	}
 ?>
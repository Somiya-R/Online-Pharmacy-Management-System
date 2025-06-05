<?php 
	session_start();
	$conn=mysqli_connect("localhost","root","","my pharmacy");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	}
	if ($_SERVER["REQUEST_METHOD"]=="POST") {
		$mID = $_POST['mID'];
		$mPass = $_POST['pass'];

		$select = mysqli_query($conn,"SELECT * FROM `manager` WHERE `mID`='$mID' && `mPass`='$mPass'");
		$rows = mysqli_num_rows($select);
		if ($rows==1) {
			$data = mysqli_fetch_assoc($select);
			$_SESSION['mData'] = $data;
			header("Location:../../in/managerHome.php");
			echo '<script type="text/javascript">window.history.forward();</script>';
		} else {
			$_SESSION['merr'] = "Incorrect username or password";
			header("Location:../managerLogin.php");
		}
		
	}
 ?>
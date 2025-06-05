<?php 
	session_start();
	$conn=mysqli_connect("localhost","root","","my pharmacy");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	}
	if ($_SERVER["REQUEST_METHOD"]=="POST") {
		$aID = $_POST['aID'];
		$aPass = $_POST['pass'];

		$select = mysqli_query($conn,"SELECT * FROM `admin` WHERE `aID`='$aID' && `aPass`='$aPass'");
		$rows = mysqli_num_rows($select);
		if ($rows==1) {
			$data = mysqli_fetch_assoc($select);
			$_SESSION['aData'] = $data;
			header("Location:../../in/adminHome.php");
			echo '<script type="text/javascript">window.history.forward();</script>';
		} else {
			$_SESSION['aerr'] = "Incorrect username or password";
			header("Location:../adminLogin.php");
		}
		
	}
 ?>
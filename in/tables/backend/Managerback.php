<?php
	session_start();

	$conn=mysqli_connect("localhost","root","","my pharmacy");
	if (mysqli_connect_errno()) {
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		exit();
	}

	//-----------------------------Insert Values---------------------------//
	if (isset($_POST['insert'])) {
		$mName = $_POST['mName'];
		$mPass = $_POST['mPass'];
		$mGender = $_POST['mGender'];
		$mEmail = $_POST['mEmail'];
		$mPhone = $_POST['mPhone'];

		$insertq = "INSERT INTO `manager` (mName,mPass,mGender,mEmail,mPhone) VALUES ('$mName','$mPass','$mGender','$mEmail','$mPhone')";
		mysqli_query($conn, $insertq);
		ob_start();
		header("Location:../manager_table.php");
		ob_end_flush();
	}




	//-----------------------------Search Item---------------------------//
	if (isset($_POST['search'])) {
		$mIDsrch = $_POST['mIDsrch'];
		$manager = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `manager` WHERE `mID`='$mIDsrch'"));
		$_SESSION['manager'] = $manager;
		ob_start();
		header("Location:../manager_table.php");
		ob_end_flush();
	}




	//-----------------------------Update Values---------------------------//
	if (isset($_POST['update'])) {

		$mIDsrch = $_POST['mIDsrch'];
		$mID = $_POST['muID'];
		$mName = $_POST['muName'];
		$mPass = $_POST['muPass'];
		$mGender = $_POST['muGender'];
		$mEmail = $_POST['muEmail'];
		$mPhone = $_POST['muPhone'];

		$updateq = "UPDATE `manager` SET `mID`='$mID',`mName`='$mName',`mPass`='$mPass',`mGender`='$mGender',`mEmail`='$mEmail',`mPhone`='$mPhone' WHERE `mID`='$mIDsrch'";
		mysqli_query($conn, $updateq);
		ob_start();
		header("Location:../manager_table.php");
		ob_end_flush();
	}



	
	//-----------------------------Delete Item---------------------------//
	if (isset($_POST['delete'])) {
		$mIDsrch = $_POST['mIDsrch'];

		$deleteq = "DELETE FROM `manager` WHERE mID='$mIDsrch'";
		mysqli_query($conn, $deleteq);
		ob_start();
		header("Location:../manager_table.php");
		ob_end_flush();
	}
?>
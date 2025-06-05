<?php
	session_start();

	$conn=mysqli_connect("localhost","root","","my pharmacy");
	if (mysqli_connect_errno()) {
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		exit();
	}

	//-----------------------------Insert Values---------------------------//
	if (isset($_POST['insert'])) {
		$cName = $_POST['cName'];
		$cNIC = $_POST['cNIC'];
		$cPass = $_POST['cPass'];
		$cAddress = $_POST['cAddress'];
		$cEmail = $_POST['cEmail'];
		$cPhone = $_POST['cPhone'];

		$select = mysqli_query($conn,"SELECT * FROM `customer` WHERE `cNIC`='$cNIC'");
		if(mysqli_num_rows($select)==0){
			if ((is_numeric($cNIC) && (strlen($cNIC)==12)) || strlen($cNIC)==10) {

				$insertq = "INSERT INTO `customer` (cName,cNIC,cPass,cAddress,cEmail,cPhone) VALUES ('$cName','$cNIC','$cPass','$cAddress','$cEmail','$cPhone')";
				mysqli_query($conn, $insertq);
				ob_start();
				header("Location:../customer_table.php");
				ob_end_flush();

			}
			else{
				$_SESSION['cinserterr'] = '<script>alert("Invalid NIC")</script>';
				header("Location:../customer_table.php");
			}
		}
		else{
			$_SESSION['cinserterr'] = '<script>alert("NIC already exists")</script>';
			header("Location:../customer_table.php");
		}
	}




	//-----------------------------Search Item---------------------------//
	if (isset($_POST['search'])) {
		$cNICsrch = $_POST['cNICsrch'];
		$customer = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `customer` WHERE `cNIC`='$cNICsrch'"));
		$_SESSION['customer'] = $customer;
		ob_start();
		header("Location:../customer_table.php");
		ob_end_flush();
	}




	//-----------------------------Update Values---------------------------//
	if (isset($_POST['update'])) {

		$cNICsrch = $_POST['cNICsrch'];
		$cName = $_POST['cuName'];
		$cNIC = $_POST['cuNIC'];
		$cPass = $_POST['cuPass'];
		$cAddress = $_POST['cuAddress'];
		$cEmail = $_POST['cuEmail'];
		$cPhone = $_POST['cuPhone'];

		$updateq = "UPDATE `customer` SET `cName`='$cName',`cNIC`='$cNIC',`cPass`='$cPass',`cAddress`='$cAddress',`cEmail`='$cEmail',`cPhone`='$cPhone' WHERE `cNIC`='$cNICsrch'";
		mysqli_query($conn, $updateq);
		ob_start();
		header("Location:../customer_table.php");
		ob_end_flush();
	}



	
	//-----------------------------Delete Item---------------------------//
	if (isset($_POST['delete'])) {
		$cNICsrch = $_POST['cNICsrch'];

		$deleteq = "DELETE FROM `customer` WHERE `cNIC`='$cNICsrch'";
		mysqli_query($conn, $deleteq);
		ob_start();
		header("Location:../customer_table.php");
		ob_end_flush();
	}
?>
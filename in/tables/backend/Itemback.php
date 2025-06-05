<?php
	session_start();

	$conn=mysqli_connect("localhost","root","","my pharmacy");
	if (mysqli_connect_errno()) {
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		exit();
	}

	//-----------------------------Insert Values---------------------------//
	if (isset($_POST['insert'])) {
		$iCode = $_POST['iCode'];
		$iName = $_POST['iName'];
		$iType = $_POST['iType'];
		$iExp = $_POST['iExp'];
		$iPrice = $_POST['iPrice'];
		$iAmount = $_POST['iAmount'];
		$iCompany = $_POST['iCompany'];

		$insertq = "INSERT INTO `item` (iCode,iName,iType,iExp,iPrice,iAmount,iCompany) VALUES ('$iCode','$iName','$iType','$iExp','$iPrice','$iAmount','$iCompany')";
		mysqli_query($conn, $insertq);
		ob_start();
		header("Location:../item_table.php");
		ob_end_flush();
	}




	//-----------------------------Search Item---------------------------//
	if (isset($_POST['search'])) {
		$iCodesrch = $_POST['iCodesrch'];
		$item = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `item` WHERE `iCode`='$iCodesrch'"));
		$_SESSION['item'] = $item;
		ob_start();
		header("Location:../item_table.php");
		ob_end_flush();
	}




	//-----------------------------Update Values---------------------------//
	if (isset($_POST['update'])) {

		$iCodesrch = $_POST['iCodesrch'];
		$iCode = $_POST['iuCode'];
		$iName = $_POST['iuName'];
		$iType = $_POST['iuType'];
		$iExp = $_POST['iuExp'];
		$iPrice = $_POST['iuPrice'];
		$iAmount = $_POST['iuAmount'];
		$iCompany = $_POST['iuCompany'];

		$updateq = "UPDATE `item` SET `iCode`='$iCode',`iName`='$iName',`iType`='$iType',`iExp`='$iExp',`iPrice`='$iPrice',`iAmount`='$iAmount',`iCompany`='$iCompany' WHERE `iCode`='$iCodesrch'";
		mysqli_query($conn, $updateq);
		ob_start();
		header("Location:../item_table.php");
		ob_end_flush();
	}



	
	//-----------------------------Delete Item---------------------------//
	if (isset($_POST['delete'])) {
		$iCodesrch = $_POST['iCodesrch'];

		$deleteq = "DELETE FROM `item` WHERE iCode='$iCodesrch'";
		mysqli_query($conn, $deleteq);
		ob_start();
		header("Location:../item_table.php");
		ob_end_flush();
	}
?>
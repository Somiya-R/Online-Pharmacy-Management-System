<?php 

	session_start();
	if (isset($_SESSION['cData'])) {
		$cData = $_SESSION['cData'];
		$cName = $cData['cName'];
		$cNIC = $cData['cNIC'];

		$conn=mysqli_connect("localhost","root","","my pharmacy");
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			exit();
		}

		
		
	}
	else{
		header("Location:../loginchoice.php");
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Prescription Portal</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>

<div class="top">
	<div class="username">Hey <?php echo $cName ?></div>
	<nav class="navbar">
		<a href="customerHome.php">Catalogue</a>
		<a href="cart.php">View Cart (<?php if (isset($_SESSION['cart'])) {
			echo count($_SESSION['cart']);
		} ?>)</a>
		<a href="backend/logout.php">Logout</a>
	</nav>
</div>
<div class="content">
	<div class="header">
		<div class="subheading">Prescription Portal</div>
	</div>

	<div class="bigcard">
		<div style="margin:auto;">Upload your prescription image here</div>
		<div class="shadowbox" style="width:250px;height: 200px;">
			<form method="post" enctype="multipart/form-data">
				<br/><br/><br/><br/>

				<input type="file" name="file">

				<br/><br/>

				<input type="submit" name="pUpload" class="btn btnorange" style="width:120px; height: 40px;padding: 0;font-size: 16px;"value="Upload">

			</form>
			<?php 
				if (isset($_POST['pUpload'])) {
					$filename = $_FILES['file']['name'];
					$tempname = $_FILES['file']['tmp_name'];
					$folder = "./prescriptions/" . $filename;

					$upQuery = "INSERT INTO `prescription` (cNIC,pFile) VALUES ('$cNIC','$filename')";
					mysqli_query($conn,$upQuery);

					if (move_uploaded_file($tempname, $folder)) {
						echo "Image uploaded successfully!";
					}
					else {
						echo "Failed to upload image!";
					}
				}
			 ?>
		</div>
	</div>
</div>

</body>
</html>
<?php 
	session_start();

	$conn=mysqli_connect("localhost","root","","my pharmacy");
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
	}
	if (isset($_SESSION['cinserterr'])) {
		echo $_SESSION['cinserterr'];
		unset($_SESSION['cinserterr']);
	}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Customer Table</title>
 	<link rel="stylesheet" type="text/css" href="tablestyle.css">
 	<script type="text/javascript">
		window.onload = function(){
			mainbox = document.getElementById("opmain");
			insertbox = document.getElementById("opinsert");
			searchbox = document.getElementById("opsearch");
			updatebox = document.getElementById("opupdate");
			box = document.getElementById("dataedit");
		}
		function mainview() {
			box.style.height = "155px";
			setTimeout(function(){mainbox.style.display = "inline"}, 160);
			insertbox.style.display = "none";
			searchbox.style.display = "none";
			updatebox.style.display = "none";
		}

		function insertview() {
			box.style.height = '400px';
			mainbox.style.display = "none";
			setTimeout(function(){insertbox.style.display = "inline"}, 160);
			searchbox.style.display = "none";
			updatebox.style.display = "none";
		}

		function searchview() {
			box.style.height = "200px";
			mainbox.style.display = "none";
			insertbox.style.display = "none";
			setTimeout(function(){searchbox.style.display = "inline"}, 160);
			updatebox.style.display = "none";
		}
	</script>
 </head>
 <body>

 <div class="datatable">
	<table>
		<tr>
			<th style="width: 100px;">NIC</th>
			<th style="width: 160px;">Name</th>
			<th style="width: 80px;">Password</th>
			<th style="width: 80px;">Address</th>
			<th style="width: 180px;">Email</th>
			<th style="width: 100px;">Phone</th>
		</tr>
		<?php 
			$data = mysqli_query($conn,"SELECT * FROM customer");
			while ($row = mysqli_fetch_assoc($data)) {?>
			
			<tr>

				<td><?php echo $row['cNIC']; ?></td>
				<td><?php echo $row['cName']; ?></td>
				<td><?php echo $row['cPass']; ?></td>
				<td><?php echo $row['cAddress']; ?></td>
				<td><?php echo $row['cEmail']; ?></td>
				<td><?php echo $row['cPhone']; ?></td>

			</tr>
		<?php }
		?>
	</table>
</div>

<div class="dataedit" id="dataedit">
	<h3>Customer Operations</h3>

	<!---------------------------------Main View--------------------------------------->
	<div class="opbox" id="opmain">
		<button type="button" class="opbtn" onclick="insertview();">Insert a Customer</button><br/>
		<button type="button" class="opbtn" onclick="searchview();">Update a Customer</button><br/>
	</div>




	<!------------------------------Insert Customer View----------------------------------->
	<div class="opbox" id="opinsert">
	<form action="backend/Customerback.php" method="post">

		<label>Enter Customer name<font color="red">*</font></label><br/>
		<input type="text" name="cName" autocomplete="off" required><br/>

		<label>Enter Customer NIC<font color="red">*</font></label><br/>
		<input type="text" name="cNIC" autocomplete="off" required><br/>

		<label>Enter Password<font color="red">*</font></label><br/>
		<input type="text" name="cPass" autocomplete="off" required><br/>

		<label>Enter Address</label><br/>
		<input type="text" name="cAddress" autocomplete="off"><br/>

		<label>Enter Email</label><br/>
		<input type="email" name="cEmail" autocomplete="off"><br/>

		<label>Enter Phone</label><br/>
		<input type="text" name="cPhone" autocomplete="off"><br/><br/>

		<input type="submit" id="submit" name="insert" value="Insert"><br/>
		<button type="button" onclick="mainview();">Back</button>
	</form>
	</div>






	<!------------------------------Search/Update Customer View----------------------------------->
	<form action="backend/Customerback.php" method="post">
		<div class="opbox" id="opsearch">
			<label>Enter NIC : </label><br/>
			<input type="text" id="cNICsrch" name="cNICsrch" autocomplete="off"><br/><br/>
			<button name="search">Search</button><br/>
			<button type="button" onclick="mainview();">Back</button>

		</div>
		<div class="opbox" id="opupdate">

		<?php 
			if(isset($_SESSION['customer'])){
				echo '<script>
						document.getElementById("dataedit").style.height = "450px";
						document.getElementById("opmain").style.display = "none";
						document.getElementById("opinsert").style.display = "none";
						document.getElementById("opsearch").style.display = "none";
						setTimeout(function(){document.getElementById("opupdate").style.display = "inline";}, 160);
						document.getElementById("cNICsrch").value = "'.$_SESSION['customer']['cNIC'].'";
					</script>';

				$cName = $_SESSION['customer']['cName'];
				$cNIC = $_SESSION['customer']['cNIC'];
				$cPass = $_SESSION['customer']['cPass'];
				$cAddress = $_SESSION['customer']['cAddress'];
				$cEmail = $_SESSION['customer']['cEmail'];
				$cPhone = $_SESSION['customer']['cPhone'];

				unset($_SESSION['customer']);
			}

		?>


			<label>Enter Customer name<font color="red">*</font></label><br/>
			<input type="text" name="cuName" value="<?php echo $cName ?>" autocomplete="off" required><br/>

			<label>Enter Customer NIC<font color="red">*</font></label><br/>
			<input type="text" name="cuNIC" value="<?php echo $cNIC ?>" autocomplete="off" required><br/>

			<label>Enter Password<font color="red">*</font></label><br/>
			<input type="text" name="cuPass" value="<?php echo $cPass ?>" autocomplete="off" required><br/>

			<label>Enter Address</label><br/>
			<input type="text" name="cuAddress" value="<?php echo $cAddress ?>" autocomplete="off"><br/>

			<label>Enter Email</label><br/>
			<input type="text" name="cuEmail" value="<?php echo $cEmail ?>" autocomplete="off"><br/>

			<label>Enter Phone</label><br/>
			<input type="text" name="cuPhone" value="<?php echo $cPhone ?>" autocomplete="off"><br/><br/>

			<input type="submit" name="update" value="Update">
			<input type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure you want to delete this record ?')">
			<button type="button" onclick="searchview();">Back</button>
		</div>
	</form>

</div>

 </body>
 </html>
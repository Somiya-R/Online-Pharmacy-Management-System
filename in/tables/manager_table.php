<?php 
	session_start();

	$conn=mysqli_connect("localhost","root","","my pharmacy");
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
	}
	if (isset($_SESSION['minserterr'])) {
		echo $_SESSION['minserterr'];
		unset($_SESSION['minserterr']);
	}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Manager Table</title>
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
			box.style.height = '380px';
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
			<th style="width: 100px;">ID</th>
			<th style="width: 160px;">Name</th>
			<th style="width: 80px;">Password</th>
			<th style="width: 80px;">Gender</th>
			<th style="width: 180px;">Email</th>
			<th style="width: 100px;">Phone</th>
		</tr>
		<?php 
			$data = mysqli_query($conn,"SELECT * FROM `manager`");
			while ($row = mysqli_fetch_assoc($data)) {?>
			
			<tr>

				<td><?php echo $row['mID']; ?></td>
				<td><?php echo $row['mName']; ?></td>
				<td><?php echo $row['mPass']; ?></td>
				<td><?php echo $row['mGender']; ?></td>
				<td><?php echo $row['mEmail']; ?></td>
				<td><?php echo $row['mPhone']; ?></td>

			</tr>
		<?php }
		?>
	</table>
</div>

<div class="dataedit" id="dataedit">
	<h3>Manager Operations</h3>

	<!---------------------------------Main View--------------------------------------->
	<div class="opbox" id="opmain">
		<button type="button" class="opbtn" onclick="insertview();">Insert a Manager</button><br/>
		<button type="button" class="opbtn" onclick="searchview();">Update a Manager</button><br/>
	</div>




	<!------------------------------Insert Manager View----------------------------------->
	<div class="opbox" id="opinsert">
	<form action="backend/Managerback.php" method="post">

		<label>Enter Manager name<font color="red">*</font></label><br/>
		<input type="text" name="mName" autocomplete="off" required><br/>

		<label>Enter Password<font color="red">*</font></label><br/>
		<input type="text" name="mPass" autocomplete="off" required><br/>

		<label>Enter Gender</label><br/>
		<select name="mGender" style="text-align:center;width: 177px;">
			<option value="M">Male</option>
			<option value="F">Female</option>
			<option value="O">Other</option>
		</select><br/>

		<label>Enter Email</label><br/>
		<input type="email" name="mEmail" autocomplete="off"><br/>

		<label>Enter Phone</label><br/>
		<input type="text" name="mPhone" autocomplete="off"><br/><br/>

		<input type="submit" id="submit" name="insert" value="Insert"><br/>
		<button type="button" onclick="mainview();">Back</button>
	</form>
	</div>






	<!------------------------------Search/Update Manager View----------------------------------->
	<form action="backend/Managerback.php" method="post">
		<div class="opbox" id="opsearch">
			<label>Enter Manager ID : </label><br/>
			<input type="text" id="mIDsrch" name="mIDsrch" autocomplete="off"><br/><br/>
			<button name="search">Search</button><br/>
			<button type="button" onclick="mainview();">Back</button>

		</div>
		<div class="opbox" id="opupdate">

		<?php 
			if(isset($_SESSION['manager'])){
				echo '<script>
						document.getElementById("dataedit").style.height = "450px";
						document.getElementById("opmain").style.display = "none";
						document.getElementById("opinsert").style.display = "none";
						document.getElementById("opsearch").style.display = "none";
						setTimeout(function(){document.getElementById("opupdate").style.display = "inline";}, 160);
						document.getElementById("mIDsrch").value = "'.$_SESSION['manager']['mID'].'";
					</script>';

				$mName = $_SESSION['manager']['mName'];
				$mID = $_SESSION['manager']['mID'];
				$mPass = $_SESSION['manager']['mPass'];
				$mGender = $_SESSION['manager']['mGender'];
				$mEmail = $_SESSION['manager']['mEmail'];
				$mPhone = $_SESSION['manager']['mPhone'];

				unset($_SESSION['manager']);
			}

		?>

			<label>Enter Manager ID<font color="red">*</font></label><br/>
			<input type="text" name="muID" value="<?php echo $mID;?>" autocomplete="off" required><br/>

			<label>Enter Manager name<font color="red">*</font></label><br/>
			<input type="text" name="muName" value="<?php echo $mName;?>" autocomplete="off" required><br/>

			<label>Enter Password<font color="red">*</font></label><br/>
			<input type="text" name="muPass" value="<?php echo $mPass;?>" autocomplete="off" required><br/>

			<label>Enter Gender</label><br/>
			<select name="muGender" style="text-align:center;width: 177px;">
				<option value="M" <?php if($mGender=='M'){echo 'selected';} ?>>Male</option>
				<option value="F" <?php if($mGender=='F'){echo 'selected';} ?>>Female</option>
				<option value="O" <?php if($mGender=='O'){echo 'selected';} ?>>Other</option>
			</select><br/>

			<label>Enter Email</label><br/>
			<input type="text" name="muEmail" value="<?php echo $mEmail;?>" autocomplete="off"><br/>

			<label>Enter Phone</label><br/>
			<input type="text" name="muPhone" value="<?php echo $mPhone;?>" autocomplete="off"><br/><br/>

			<input type="submit" name="update" value="Update">
			<input type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure you want to delete this record ?')">
			<button type="button" onclick="searchview();">Back</button>
		</div>
	</form>

</div>

 </body>
 </html>
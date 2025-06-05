<?php 
	session_start();

	$conn=mysqli_connect("localhost","root","","my pharmacy");
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
	}
	if (isset($_SESSION['iinserterr'])) {
		echo $_SESSION['iinserterr'];
		unset($_SESSION['iinserterr']);
	}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Item Table</title>
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
			box.style.height = '430px';
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
			<th style="width: 100px;">Item Code</th>
			<th style="width: 160px;">Item Name</th>
			<th style="width: 80px;">Item Type</th>
			<th style="width: 120px;">Expiry</th>
			<th style="width: 100px;">Price</th>
			<th style="width: 100px;">Amount</th>
			<th style="width: 100px;">Company</th>
		</tr>
		<?php 
			$data = mysqli_query($conn,"SELECT * FROM `item`");
			while ($row = mysqli_fetch_assoc($data)) {?>
			
			<tr>

				<td><?php echo $row['iCode']; ?></td>
				<td><?php echo $row['iName']; ?></td>
				<td><?php echo $row['iType']; ?></td>
				<td><?php echo $row['iExp']; ?></td>
				<td><?php echo 'Rs.'.$row['iPrice']; ?></td>
				<td><?php echo $row['iAmount']; ?></td>
				<td><?php echo $row['iCompany']; ?></td>

			</tr>
		<?php }
		?>
	</table>
</div>

<div class="dataedit" id="dataedit">
	<h3>Item Operations</h3>

	<!---------------------------------Main View--------------------------------------->
	<div class="opbox" id="opmain">
		<button type="button" class="opbtn" onclick="insertview();">Insert an Item</button><br/>
		<button type="button" class="opbtn" onclick="searchview();">Update an Item</button><br/>
	</div>




	<!------------------------------Insert Item View----------------------------------->
	<div class="opbox" id="opinsert">
	<form action="backend/Itemback.php" method="post">

		<label>Enter Item Code<font color="red">*</font></label><br/>
		<input type="text" name="iCode" autocomplete="off" required><br/>

		<label>Enter Item Name<font color="red">*</font></label><br/>
		<input type="text" name="iName" autocomplete="off" required><br/>

		<label>Enter Item Type</label><br/>
		<select name="iType" style="text-align:center;width: 177px;">
			<option value="Capsule">Capsule</option>
			<option value="Tablet">Tablet</option>
			<option value="Tablet">Solution</option>
			<option value="Cream">Cream</option>
			<option value="Oinment">Oinment</option>
			<option value="Balm">Balm</option>
		</select><br/>

		<label>Enter Expiry Date</label><br/>
		<input type="date" name="iExp" style="width:172px;" autocomplete="off"><br/>

		<label>Enter Price</label><br/>
		Rs.<input type="number" name="iPrice" style="width:150px;" autocomplete="off"><br/>

		<label>Enter Amount</label><br/>
		<input type="number" name="iAmount" autocomplete="off"><br/>

		<label>Enter Company</label><br/>
		<input type="text" name="iCompany" autocomplete="off"><br/><br/>

		<input type="submit" id="submit" name="insert" value="Insert"><br/>
		<button type="button" onclick="mainview();">Back</button>
	</form>
	</div>






	<!------------------------------Search/Update Item View----------------------------------->
	<form action="backend/Itemback.php" method="post">
		<div class="opbox" id="opsearch">
			<label>Enter Item Code : </label><br/>
			<input type="text" id="iCodesrch" name="iCodesrch" autocomplete="off"><br/><br/>
			<button name="search">Search</button><br/>
			<button type="button" onclick="mainview();">Back</button>

		</div>
		<div class="opbox" id="opupdate">

		<?php 
			if(isset($_SESSION['item'])){
				echo '<script>
						document.getElementById("dataedit").style.height = "470px";
						document.getElementById("opmain").style.display = "none";
						document.getElementById("opinsert").style.display = "none";
						document.getElementById("opsearch").style.display = "none";
						setTimeout(function(){document.getElementById("opupdate").style.display = "inline";}, 160);
						document.getElementById("iCodesrch").value = "'.$_SESSION['item']['iCode'].'";
					</script>';

				$iCode = $_SESSION['item']['iCode'];
				$iName = $_SESSION['item']['iName'];
				$iType = $_SESSION['item']['iType'];
				$iExp = $_SESSION['item']['iExp'];
				$iPrice = $_SESSION['item']['iPrice'];
				$iAmount = $_SESSION['item']['iAmount'];
				$iCompany = $_SESSION['item']['iCompany'];

				unset($_SESSION['item']);
			}

		?>

			<label>Enter Item Code<font color="red">*</font></label><br/>
			<input type="text" name="iuCode" value="<?php echo $iCode;?>" autocomplete="off" required><br/>

			<label>Enter Item Name<font color="red">*</font></label><br/>
			<input type="text" name="iuName" value="<?php echo $iName;?>" autocomplete="off" required><br/>

			<label>Enter Item Type</label><br/>
			<select name="iuType" style="text-align:center;width: 177px;">
				<option value="Capsule" <?php if($iType=='Capsule'){echo 'selected';} ?>>Capsule</option>
				<option value="Tablet" <?php if($iType=='Tablet'){echo 'selected';} ?>>Tablet</option>
				<option value="Cream" <?php if($iType=='Cream'){echo 'selected';} ?>>Cream</option>
				<option value="Oinment" <?php if($iType=='Oinment'){echo 'selected';} ?>>Oinment</option>
				<option value="Balm" <?php if($iType=='Balm'){echo 'selected';} ?>>Balm</option>
			</select><br/>

			<label>Enter Expiry Date</label><br/>
			<input type="date" name="iuExp" value="<?php echo $iExp;?>" style="width:172px;" autocomplete="off"><br/>

			<label>Enter Price</label><br/>
			Rs.<input type="number" name="iuPrice" value="<?php echo $iPrice;?>" style="width:150px;" autocomplete="off"><br/>

			<label>Enter Amount</label><br/>
			<input type="number" name="iuAmount" value="<?php echo $iAmount;?>" autocomplete="off"><br/>

			<label>Enter Company</label><br/>
			<input type="text" name="iuCompany" value="<?php echo $iCompany;?>" autocomplete="off"><br/><br/>

			<input type="submit" name="update" value="Update">
			<input type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure you want to delete this record ?')">
			<button type="button" onclick="searchview();">Back</button>
		</div>
	</form>

</div>

 </body>
 </html>
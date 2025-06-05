<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "my pharmacy");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
if (isset($_SESSION['aData'])) {
    $ses_sql = mysqli_query($conn, "SELECT * FROM admin");
    $row = mysqli_fetch_assoc($ses_sql);

    $aData = $_SESSION['aData'];
    $aName = $row['aName'];
} else {
    header("Location:../login/customerLogin.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="backend/views.js"></script>
</head>

<body>
    <div class="top">
        <div class="username">Hey <?php echo $aName ?></div>
        <nav class="navbar">
            <a href="backend/logout.php">Logout</a>
        </nav>
    </div>

    <div class="header">
        <div class="subheading">Admin panel</div>
    </div>

    <div class="content" style="justify-content: left;flex-wrap: nowrap; height: 60%;">
        <div class="vnav">
            <button class="btn" style="width:200px;height: 50px;padding: 0;" id="cbtn">Manage Customers</button><br>
            <button class="btn" style="width:200px;height: 50px;padding: 0;" id="mbtn">Manage Managers</button><br>
            <button class="btn" style="width:200px;height: 50px;padding: 0;" id="ibtn">Manage Items</button>
        </div>

        <div class="box" style="position:relative; width: 100%;height: 100%;text-align: left;padding: 20px;">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h1>Welcome to MY PHARMEASY</h1>
                </div>
                <div>
                    <p>Date: <span id="date"></span></p>
                    <p>Time: <span id="time"></span></p>
                </div>
            </div>

            <iframe src="tables/customer_table.php" class="frame" id="cfrm">lol</iframe>
            <iframe src="tables/manager_table.php" class="frame" id="mfrm">lol</iframe>
            <iframe src="tables/item_table.php" class="frame" id="ifrm">lol</iframe>
        </div>
    </div>

    <!-- To update date and time -->
    <script type="text/javascript">
        function updateDateTime() {
            var currentDate = new Date();
            var dateElement = document.getElementById("date");
            var timeElement = document.getElementById("time");

            dateElement.innerHTML = currentDate.toDateString();
            timeElement.innerHTML = currentDate.toLocaleTimeString(undefined, {
                hour12: true
            });
        }

        // Update date and time every second
        setInterval(updateDateTime, 1000);
    </script>

</body>

</html>

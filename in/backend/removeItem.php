<?php 

session_start();

unset($_SESSION['cart'][$_GET['key']]);
header("Location:../cart.php");
 ?>
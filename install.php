<?php
	session_start();
	$server = "127.0.0.1";
	$rlg = "root";
	$rpw = "goodpass";
	$key = "awesomepass";
	$basename = "OnlineShop";	
	if (!($con = mysqli_connect($server, $rlg, $rpw)))
		exit ("Connection failed: " .mysqli_connect_error($con));
	mysqli_query($con, "DROP DATABASE $basename");
	mysqli_close($con);
	session_start();
	$_SESSION[logged_in] = NULL;
	$_SESSION[err] = NULL;
	session_destroy();
	header("Location: index.php");
?>
<?php
	session_start();
	$_SESSION[logged_in] = NULL;
	session_destroy();
	header("Location: index.php");	
?>
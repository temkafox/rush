<?php
	session_start();
	if ($_SESSION[srt] == $_GET[srt])
		$_SESSION[srt] = $_GET[srt]." DESC";
	else if ($_SESSION[srt] == ($_GET[srt]." DESC"))
		$_SESSION[srt] = $_GET[srt];
	else
		$_SESSION[srt] = $_GET[srt];
	header("Location: catalog.php");
?> 
<?php
	session_start();
	$_SESSION[basket][$_GET[id]] = 0;
	header ("Location: ".$_GET[prev]);
?>
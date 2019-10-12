<?php
	include("base.php");
	$prod = take_pid($_GET[id]);
	if ($prod[stock] > 1 && $prod[stock] > $_SESSION[basket][$_GET[id]])
		$_SESSION[basket][$_GET[id]]++;
	header ("Location: ".$_GET[prev]);
?>
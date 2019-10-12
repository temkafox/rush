<?php
	include ("base.php");
	if (!($arr = mysqli_query($con, "SELECT id, prodn FROM $table")))
		exit ("Error in selecting data from table ".$table.": ".mysqli_error($con)."\n");
	while ($prod = mysqli_fetch_assoc($arr))
		if ($prod[prodn] == $_GET[search])
			break;
	if ($_GET[search] && $prod[prodn] == $_GET[search])
		header("Location: product.php?id=".$prod[id]);
	else
		header("Location: catalog.php?search=".$_GET[search]);	
?>
<?php
	include ("base.php");
	$table = "Checkout";
	$table1 = "Products";
	$arr = take_product("prodn");
	foreach ($arr as $prod)
		if ($_SESSION[basket][$prod[id]] > 0)
		{
		/*	if (!mysqli_query($con, "INSERT INTO $table (user_log, prodn) VALUES 
			('$_SESSION[logged_in]', '$prod[prodn]')"))
				exit ("Error in insert data into table ".$table.": ".mysqli_error($con)."\n");*/
			if (!mysqli_query($con, "UPDATE $table1 SET stock=".($prod[stock] - $_SESSION[basket][$prod[id]])." WHERE id=".$prod[id]))
				exit ("Error in insert data into table ".$table1.": ".mysqli_error($con)."\n");
			$_SESSION[basket][$prod[id]] = NULL;
		}
	header("Location: index.php");
?>
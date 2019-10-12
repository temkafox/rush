<?php
	include ("base.php");
	if (!mysqli_query($con, "INSERT INTO $table (prodn, price, stock, tags, categ, img) VALUES
			('$_GET[$prodn]', '$_GET[$price]', '$_GET[$stock]', '$_GET[$tags]', '$_GET[$categ]', '$_GET[$img]')"))
		exit ("Error in insert data into table ".$table.": ".mysqli_error($con)."\n");
	header ("Location: admin.php");

?>
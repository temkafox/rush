<?php
	include ("base.php");
	$table = "AuthUsers";
	$_SESSION[logged_in] = NULL;
	if ($_POST[login] == NULL || $_POST[passwd] == NULL)
		$_SESSION[err] = "Please fill all required fields";
	else if	(!($_SESSION[err] = check_input()))
	{
		if (!($sql = mysqli_query($con, "SELECT user_log, passwd FROM $table")))
			exit ("Error in selecting data from table ".$table.": ".mysqli_error($con)."\n");
		if (mysqli_num_rows($sql))
			while ($user = mysqli_fetch_assoc($sql))
				if ($_POST[login] == $user[user_log] && $_POST[passwd] == $user[passwd])
					$_SESSION[logged_in] = $_POST[login];
		if ($_SESSION[logged_in] == NULL)
			$_SESSION[err] = "User does not exist";
	}
	if ($_POST[login] == "root" && $_POST[passwd] == "goodpass")
		header("Location: admin.php");
	else
		header("Location: index.php");	
?>
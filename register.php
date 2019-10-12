<?php
	include ("base.php");
	$table = "AuthUsers";
	if ($_POST[login] == NULL || $_POST[passwd] == NULL || $_POST[email] == NULL || $_POST[submit] == NULL)
		$_SESSION[err] = "Please fill all required fields";
	else if	($_SESSION[err] = check_input())
		return ;
	else if ($_POST[rpasswd] != $_POST[passwd])
		$_SESSION[err] = "Password and confirm password does not match";
	else if (!($sql = mysqli_query($con, "SELECT user_log, passwd, email FROM $table")))
		exit ("Error in selecting data from table ".$table.": ".mysqli_error($con)."\n");
	else if (mysqli_num_rows($sql))
	{
		while ($user = mysqli_fetch_assoc($sql))
			if ($_POST[login] == $user[user_log])
				$_SESSION[err] = "This login is already taken by another user";
			else if ($_POST[email] == $user[email])
				$_SESSION[err] = "This email adress is already used by another user";
		if (!mysqli_query($con, "INSERT INTO $table (user_log, fname, lname, passwd, email, reg_date) 
			VALUES ('$_POST[login]', '$_POST[fname]', '$_POST[lname]', '$_POST[passwd]', '$_POST[email]', now())"))
			exit ("Error in insert data into table ".$table.": ".mysqli_error($con)."\n");
	}
	header("Location: index.php");	
?>
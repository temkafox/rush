<?php
	session_start();
	$server = "127.0.0.1";
	$rlg = "root";
	$rpw = "goodpass";
	$key = "awesomepass";
	$table = "Products";
	$basename = "OnlineShop";	
	if (!($con = mysqli_connect($server, $rlg, $rpw)))
		exit ("Connection failed: ".mysqli_connect_error($con));
	$con = create_base($con, $basename);
	function	start()
	{
		if (!($con = mysqli_connect($server, $rlg, $rpw)))
			exit ("Connection failed: ".mysqli_connect_error($con));
		create_base($con, $basename);
		
		return ($con);
	}
	function	connect()
	{
		$server = "127.0.0.1";
		$rlg = "root";
		$rpw = "goodpass";
		$basename = "OnlineShop";
		if (!($con = mysqli_connect($server, $rlg, $rpw, $basename)))
			exit ("Connection failed: ".mysqli_connect_error($con));
		return ($con);
	}
	function	create_base($con, $basename)
	{
		$usertable = "AuthUsers";
		$catetable = "Products";
		$checktable = "Checkout";
		if (!mysqli_select_db($con, $basename))
		{
			$_SESSION[basket] = array();
			if (!($sql = mysqli_query($con, "CREATE DATABASE $basename")))
				exit ("Error creating database ".$bname.": ".mysqli_error($con)."\n");
			if (!mysqli_select_db($con, $basename))
				exit ("Connection to ".$basename." failed: " .mysqli_connect_error($con));
			if (!(mysqli_query($con, "CREATE TABLE $usertable
				(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				user_log VARCHAR(20) NOT NULL,
				fname VARCHAR(20) NOT NULL,
				lname VARCHAR(20) NOT NULL,
				passwd VARBINARY(30) NOT NULL,
				email VARCHAR(20) NOT NULL,
				reg_date TIMESTAMP NOT NULL,
				root_r VARCHAR(20) NULL)")))
				exit ("Error creating table ".$usertable.": ".mysqli_error($con)."\n");
			if (!mysqli_query($con, "INSERT INTO $usertable (user_log, fname, lname, passwd, email, reg_date, root_r) VALUES
			('root', '', '', 'goodpass',  'root@localhost', now(), 'root')"))
				exit ("Error in insert data into table ".$usertable.": ".mysqli_error($con)."\n");
			if (!(mysqli_query($con, "CREATE TABLE $catetable
				(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				prodn VARCHAR(20) NOT NULL,
				price int(10) NOT NULL,
				stock int(7) NOT NULL,
				tags VARCHAR(20) NOT NULL,
				categ VARCHAR(20) NOT NULL,
				img VARCHAR(30) NOT NULL,
				popul int(10) NULL)")))
				exit ("Error creating table ".$catetable.": ".mysqli_error($con)."\n");
			if (!mysqli_query($con, "INSERT INTO $catetable (prodn, price, stock, tags, categ, img) VALUES
			('New Balance 540', '10990', '10', 'sneakers', 'male', '/img/shoes.jpg'),
			('New Balance 760', '10200', '5', 'sneakers', 'male', '/img/shoes2.jpg'),
			('New Balance 780', '10300', '3', 'sneakers', 'male', '/img/shoes3.jpg'),
			('New Balance 800', '10400', '2', 'sneakers', 'male', '/img/shoes4.jpg')"))
				exit ("Error in insert data into table ".$catetable.": ".mysqli_error($con)."\n");
			if (!mysqli_query($con, "CREATE TABLE $checktable 
				(user_log VARCHAR(20) NOT NULL,
				prodn VARCHAR(20) NOT NULL,
				PRIMARY KEY(user_log, prodn))"))
				exit ("Error creating table ".$checktable.": ".mysqli_error($con)."\n");
		}
		return ($con);
	}
	function	search()
	{
		$con = connect();
		$table = "Products";
		if (!($prod = mysqli_query($con, "SELECT id, prodn, price, stock, categ, popul FROM $table")))
			exit ("Error in selecting data from table ".$table.": ".mysqli_error($con)."\n");
		while ($arr = mysqli_fetch_assoc($prod))
			if ($_GET[product] == $prod[prodn])
				$prod = $arr;
		sort($prod);
		print_r($prod);
		return ($prod);
	}
	function	take_product($sort)
	{
		$con = connect();
		$table = "Products";
		if ($sort)
			$sql = mysqli_query($con, "SELECT id, prodn, price, stock, tags, categ, img, popul FROM $table ORDER BY $sort");
		else
			$sql = mysqli_query($con, "SELECT id, prodn, price, stock, tags, categ, img, popul FROM $table");
		if (!$sql)
			exit ("Error in selecting data from table ".$table.": ".mysqli_error($con)."\n");
		while ($arr = mysqli_fetch_assoc($sql))
			$prod[] = $arr;
		return ($prod);
	}
	function	take_pid($id)
	{
		$con = connect();
		$table = "Products";
		if (!($sql = mysqli_query($con, "SELECT id, prodn, price, stock, tags, categ, img, popul FROM $table WHERE id='$id'")))
			exit ("Error in selecting data from table ".$table.": ".mysqli_error($con)."\n");
		return (mysqli_fetch_assoc($sql));
	}
	function	check_input()
	{
		if (strlen($_POST[login]) < 3)
			return ("Login must be at least 3 characters long");
		else if (strlen($_POST[login]) > 20)
			return ("Login must be maximum 20 characters long");
		else if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST[login]))
			return ("Login cannot contain special characters");
		else if (strlen($_POST[passwd]) < 6)
			return ("Password must be at least 6 characters long");
		else if (strlen($_POST[passwd]) > 20)
			return ("Password must be maximum 20 characters long");
		else 
			return (NULL);
	}
?>
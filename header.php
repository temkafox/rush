<?php
	include ("base.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:200,400,600" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
	<title>Online Shop</title>
</head>
<body>
	<script>
		function popUp() {
		    div = document.getElementById('popup');
			div.style.display = "block";
			setTimeout(function() {
				div = document.getElementById('popup').style.opacity='1'},50)
		}
		function popDown() {
		    div = document.getElementById('popup');
			div.style.display = "none";
			setTimeout(function() {
				div = document.getElementById('popup').style.opacity='0'},50)
		}
		function popUpSign() {
		    div = document.getElementById('popup-sign');
			div.style.display = "block";
			setTimeout(function() {
				div = document.getElementById('popup-sign').style.opacity='1'},50)
		}
		function popDownSign() {
		    div = document.getElementById('popup-sign');
			div.style.display = "none";
			setTimeout(function() {
				div = document.getElementById('popup-sign').style.opacity='0'},50)
		}
		function resetTable() {
		    div = document.getElementById('table');
			div.style.display = "none";
		}
		function resetProductButton() {
		    div = document.getElementById('product-button');
			div.style.display = "none";
		}
	</script>
	<div class="container-index">
		<div id="popup">
			<div class="popup-window">
				<span class="popup-close" onclick="popDown();"><img width="35px" src="/img/cancel.png" alt=""></span>
				<form class="reg-form" action="register.php" method="post">
					<div class="registration-container">
						<div class="left-reg-form">
							<label for="reg-login" class="reg-form-info">LOGIN</label>
							<span>Enter your login<span class="reg-red">*</span></span>
							<input id="reg-login" type="text" name="login" minlength="3" maxlength="12">
							<label for="fname" class="reg-form-info">FIRST NAME</label>
							<span>Enter your first name</span>
							<input id="fname" type="text" name="fname">
							<label for="lname" class="reg-form-info">LAST NAME</label>
							<span>Enter your last name</span>
							<input id="lname" type="text" name="lname">
						</div>
						<div class="right-reg-form">
							<label for="reg-email" class="reg-form-info">EMAIL</label>
							<span>Enter your e-mail address<span class="reg-red">*</span></span>
							<input id="reg-email" type="email" name="email">
							<label for="reg-password" class="reg-form-info">PASSWORD</label>
							<span>Enter your password<span class="reg-red">*</span></span>
							<input id="reg-password" type="PASSWORD" name="passwd" minlength="6" maxlength="20">
							<label for="try-reg-password" class="reg-form-info">TRY PASSWORD</label>
							<span>Try again<span class="reg-red">*</span></span>
							<input id="try-reg-password" type="PASSWORD" name="rpasswd" minlength="6" maxlength="20">
						</div>
					</div>
					<input class="reg-button" type="submit" value="Register" name="submit">
				</form>
			</div>
		</div>

		<div id="popup-sign">
			<div class="popup-window-sign">
				<span class="popup-close-sign" onclick="popDownSign();"><img width="35px" src="/img/cancel.png" alt=""></span>
				<form class="sign-form" action="login.php" method="post">
					<div class="registration-container">
						<div class="left-reg-form">
							<label for="sign-login" class="reg-form-info">LOGIN</label>
							<span>Enter your login<span class="reg-red">*</span></span>
							<input id="sign-login" type="text" name="login">
						</div>
						<div class="right-reg-form">
							<label for="sign-password" class="reg-form-info">PASSWORD</label>
							<span>Enter your password<span class="reg-red">*</span></span>
							<input id="sign-password" type="PASSWORD" name="passwd">
						</div>
					</div>
					<input class="reg-button" type="submit" value="Sign In" name="submit">
				</form>
			</div>
		</div>
		<header>
			<div class="header-menu">
				<ul>
					<li class="header-point">
						<a href="index.php" class="logo-header">Rush00</a>
					</li>
					<li class="header-point">
						<a href="catalog.php">Catalog</a>
						<ul class="hamburger">
							<li><a href="catalog.php">Sneakers</a></li>
							<li><a href="catalog.php">Sandals</a></li>
							<li><a href="catalog.php">Boot</a></li>
						</ul>	
					</li>
					<li class="header-point">
						<a href="delivery.php">Delivery</a>
					</li>



					<?php if ($_SESSION[logged_in] == 'root') { ?>
					<li class="header-point">
						<a href="admin.php">Admin</a>
					</li>
					<?php }?>

				</ul>
			</div>
			<div class="header-menu-right">
				<a class="cart" href="basket.php">
					<img width="30px" src="/img/shopping-basket.png" alt="">
					<div class="basket-info">

	
						<?php 
						$button = "Checkout";
						$arr = take_product("prodn");
						$_SESSION[basket][total] = NULL;
						$i = 0;
						foreach ($arr as $prod)
						{
							if ($_SESSION[basket][$prod[id]] != NULL)
							{
								$i += $_SESSION[basket][$prod[id]];		
						}
						}
						echo "$i";
						if (!$i){
							echo "<span class=\"count-of-product\" >".$_SESSION[basket][$prod[id]]."</span>";
						}
					?>

						<span class="cart-name">Basket</span>
					</div>
				</a>
				<div>
					<img width="30px" src="/img/login.png" alt="">
					<?php if ($_SESSION[logged_in] == NULL) { ?>
					<div class="basket-info">
						<a href="#popup" onclick="popUp();" class="cart">Join</a>
						<a class="cart" onclick="popUpSign();">Sign In</a>
					<?php } else { ?>
					<div class="basket-info">
						<a href="/basket.php" class="cart"><?php echo $_SESSION[logged_in] ?></a>
						<a href="/logout.php" class="cart">Quit</a>
					<?php } ?>
					</div>
				</div>
			</div>
		</header>
		<div class="search">
			<form action="search.php" method="get">
				<input size="150" type="text" name="search" id="" value="">
				<button type="submit">
					<img width="15px;" src="/img/search.png" alt="">
				</button>
			</form>
		</div>	
	</body>
</html>
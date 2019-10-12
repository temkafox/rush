<?php 
	include ("header.php");
?>
<!DOCTYPE html>
<html lang="en">
		<main>
			<div class="all">
				<input checked type="radio" name="respond" id="desktop">
				<article id="slider">
					<input checked type="radio" name="slider" id="switch1">
					<input type="radio" name="slider" id="switch2">
					<input type="radio" name="slider" id="switch3">
					<input type="radio" name="slider" id="switch4">
					<input type="radio" name="slider" id="switch5">
					<div id="slides">
						<div id="overflow">
							<div class="image">
								<article><img src="/img/shoes2.jpg"></article>
								<article><img src="/img/shoes3.jpg"></article>
								<article><img src="/img/shoes.jpg"></article>
								<article><img src="/img/shoes4.jpg"></article>
								<article><img src="/img/shoes5.jpeg"></article>
							</div>
						</div>
					</div>
					<div id="controls">
						<label for="switch1"></label>
						<label for="switch2"></label>
						<label for="switch3"></label>
						<label for="switch4"></label>
						<label for="switch5"></label>
					</div>
					<div id="active">
						<label for="switch1"></label>
						<label for="switch2"></label>
						<label for="switch3"></label>
						<label for="switch4"></label>
						<label for="switch5"></label>
					</div>
				</article>
			</div>
			<div class="advantages">
				<div class="advantages-content">
					<span><img src="/img/icon-1.png" alt=""></span>
					<span>DELIVERY</span>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, exercitationem!</p>
				</div>
				<div class="advantages-content">
					<span><img src="/img/icon-2.png" alt=""></span>
					<span>MONEY BACK</span>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, exercitationem!</p>
				</div>
				<div class="advantages-content">
					<span><img src="/img/icon-3.png" alt=""></span>
					<span>SECURE PAYMENT</span>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, exercitationem!</p>
				</div>
				<div class="advantages-content">
					<span><img src="/img/icon-4.png" alt=""></span>
					<span>100% GUARANTEED</span>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, exercitationem!</p>
				</div>
			</div>
			<div class="main-page">
				<div>
					<a class="main-href" href="#"><img width="90%" src="/img/shoes.jpg" alt=""></a>
				</div>
				<div>
					<a class="main-href" href="#"><img width="90%" src="/img/shoes3.jpg" alt=""></a>
				</div>
			</div>

			<div class="products-grid">
				<?php
					$button = "Buy";
					if ($_SESSION[srh] != NULL)
					{
						$con = connect();
						$table = "Products";
						if (!($arr = mysqli_query($con, "SELECT id, prodn FROM $table")))
							exit ("Error in selecting data from table ".$table.": ".mysqli_error($con)."\n");
						while ($prod = mysqli_fetch_assoc($arr))
							if ($prod[prodn] == $_GET[search])
								break;
						if ($_SESSION[srh] != $prod[search])
							echo "Product dos not exist";
						else
							$arr = $prod[prodn];
						$_SESSION[srh] = NULL;
					}
					else
						$arr = take_product($_SESSION[srt]);
					foreach ($arr as $prod)
					{
						echo "<form class=\"product\" action=\"add_in_basket.php\" method=\"get\">";
						echo	"<a href=\"product.php?id=".$prod[id]."\"><img src=\"".$prod[img]."\" alt=".$prod[prodn]."></a>";
						echo	"<div class=\"product-grid-info\">";
						echo		"<span class=\"product-name\">".$prod[prodn]."</span>";
						echo		"<span class=\"product-price\">".$prod[price]."</span>";
						echo		"<input type=\"text\"; style=\"display: none;\" name=\"prev\" value=\"catalog.php\" >";
						echo	"</div>";
						echo "</form>";
					}
				?>	
			</div>
		</main>
		<?php include ("footer.php") ?>
	</div>
</body>
</html>
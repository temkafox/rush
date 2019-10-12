<?php 
	include ("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<script>
	function listMen() {
		    div = document.getElementById('ul-men');
			if (div.style.display == "block")
			{
				div.style.display = "none";
			}
			else
			{
				div.style.display = "block";
			}
			setTimeout(function() {
				div = document.getElementById('ul-men').style.opacity='1'},50)
		}
	function listWomen() {
		    div = document.getElementById('ul-women');
			if (div.style.display == "block")
			{
				div.style.display = "none";
			}
			else
			{
				div.style.display = "block";
			}
			setTimeout(function() {
				div = document.getElementById('ul-men').style.opacity='1'},50)
		}
</script>
		<div class="catalog-container">
			<div class="catalog-menu-left">
				<form action="" oninput="level.value = flevel.valueAsNumber">
					<span>CATEGORIES</span>
					<ul class="categories-list">
						<li>
							<a onclick="listMen();" id="a_men" class="a-men">Men</a>
							<ul id="ul-men">
								<a><li>Sneakers</li></a>
								<a><li>Sandales</li></a>
								<a><li>Watches</li></a>
							</ul>
						</li>
						<li>
							<a onclick="listWomen();" class="a-women">Women</a>
							<ul id="ul-women">
								<a><li>Sneakers</li></a>
								<a><li>Sandales</li></a>
								<a><li>Watches</li></a>
							</ul>
						</li>
						<li>Sneakers</li>
						<li>Sandales</li>
						<li>Watches</li>
					</ul>
				</form>
			</div>
			<div class="catalog-menu-right">
				<form class="catalog-sort" action="<?php if ($_GET[srt]=="id" || $_GET[srt]=="prodn" || $_GET[srt]=="popul" || $_GET[srt]=="price")
															$_SESSION[srt]=$_GET[srt];
														$_GET[srt] = NULL; ?>" method="get">
					<span><button type="submit" value="id" name="srt">Sort by order</button></span>
					<span><button type="submit" value="prodn" name="srt">Sort by name</button></span>
					<span><button type="submit" value="popul" name="srt">Sort by popularity</button></span>
					<span><button type="submit" value="price" name="srt">Sort by price</button></span>
				</form>
				<div class="products-grid">
				<?php
					$button = "Buy";
					if ($_GET[search])
					{
						echo "<div class=\"empty-basket\"><span>Product '".$_GET[search]."' does not exist</span></div>";
						$_GET[search] = NULL;
					}
					else
					{
						if (!($arr = mysqli_query($con, "SELECT id, prodn FROM $table")))
							exit ("Error in selecting data from table ".$table.": ".mysqli_error($con)."\n");
						while ($prod = mysqli_fetch_assoc($arr))
							if ($prod[prodn] == $_GET[search])
								break;
						$arr = take_product($_SESSION[srt]);	
						foreach ($arr as $prod)
						{
							echo "<form class=\"product\" action=\"add_in_basket.php\" method=\"get\">";
							echo	"<a href=\"product.php?id=".$prod[id]."\"><img src=\"".$prod[img]."\" alt=".$prod[prodn]."></a>";
							echo	"<div class=\"product-grid-info\">";
							echo		"<span class=\"product-name\">".$prod[prodn]."</span>";
							echo		"<span class=\"product-price\">".$prod[price]."</span>";
							echo		"<button class=\"product-button\" type=\"submit\" name=\"id\" value=\"".$prod[id]."\">".$button."</button>";
							echo		"<input type=\"text\"; style=\"display: none;\" name=\"prev\" value=\"catalog.php\" >";
							echo	"</div>";
							echo "</form>";
						}
					}
				?>				
				</div>
			</div>
		</div>
		<?php include ("footer.php") ?>
	</div>
</body>
</html>
<?php 
	include ("header.php");
	$sql = mysqli_query($con, "SELECT id, prodn, price, stock, tags, categ, img FROM $table WHERE id='$_GET[id]'");
	$prod = mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html>
<html lang="en">
			<div class="product-container">
				<div class="product-image">
					<img src="<?php echo $prod[img] ?>" alt="">
				</div>
				<div class="product-info">
					<span class="product-name"><?php echo $prod[prodn] ?></span>
					<span class="product-price"><?php echo $prod[price]." $" ?></span>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam quae vel ducimus veniam autem cumque dicta, sit obcaecati voluptatibus dolorem tenetur ratione ab accusamus omnis minus illo, quod, architecto sint quis nemo enim non! Officiis, voluptatum ut sint rerum odio nulla delectus voluptatem, vel veritatis animi praesentium. Nobis, accusantium, similique.
					</p>
					<span class="product-span-cat"><?php echo "Categories: ".$prod[categ] ?></span>
					<span class="product-span-tag"><?php echo "Tags: ".$prod[tags] ?></span>
					<form class="product-form" action="add_in_basket.php" method="get">
						<button class="product-button" type="submit" name="id" value="<?php echo $prod[id] ?>" ><span class="product-buy">Buy</span></button>
						<input type="text"; style="display: none;" name="prev" value="<?php echo "product.php?id=".$prod[id] ?>" >
						<span class="count-in-stock"><?php echo "In stock: ".$prod[stock] ?></span>
					</form>
				</div>
			</div>
			<div class="product-container">
				<div class="product-description">
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, temporibus saepe exercitationem blanditiis nostrum harum ullam quam magni. Et consectetur rerum odit ea sunt quidem modi dolorum, ullam sed aliquam fuga, reprehenderit similique, facere asperiores assumenda nobis? Beatae assumenda at ipsam sed earum, illo. Inventore omnis maiores dicta deserunt quod libero, mollitia sunt repellendus deleniti porro dolore unde sed! Eaque inventore fuga dicta aut nostrum explicabo recusandae ut non ipsa omnis corporis hic dolore nesciunt eos tenetur, alias? Ratione distinctio iusto officiis temporibus quod soluta eos nihil quae, odio corporis ex laboriosam eveniet id magni doloremque quos iure necessitatibus commodi voluptatum, cupiditate, quaerat. Error quaerat ipsa corporis magnam nisi quia ratione eaque modi. Expedita, aut nesciunt, facilis commodi, ad numquam pariatur error neque at architecto molestiae eveniet. Obcaecati non magni repellendus delectus libero quia quo accusantium quibusdam molestias quasi rerum quae sed veritatis ex tempora dolorum sunt, voluptatem eos accusamus.
					</p>
					<span>✓ Lorem ipsum dolor sit amet.</span><br>
					<span>✓ Lorem ipsum dolor sit.</span><br>
					<span>✓ Lorem ipsum dolor.</span><br>
					<span>✓ Lorem ipsum dolor sit amet.</span><br>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus, officiis, quo! Accusantium dolores possimus, itaque nulla consequuntur fugiat dicta molestias maxime pariatur in rem, placeat nisi natus! Labore vel deleniti quibusdam inventore, sunt nam odio nulla in et ea enim explicabo. Harum earum quo deserunt libero quam quis dicta aspernatur.
					</p>
				</div>
			</div>
		<?php include ("footer.php") ?>
	</div>
</body>
</html>
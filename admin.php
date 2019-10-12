<?php 
	include ("header.php");
	$table = "Products";
	$con = connect();
	$sql = mysqli_query($con, "SELECT id, prodn, price, stock, tags, categ, img FROM $table WHERE id='$_GET[id]'");
	$prod = mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html>
<html lang="en">
			<div class="admin-container" >
				<form class="admin-form" action="add_new_prod.php" method="get">
					<input type="file" name="img" vule="">
					<span><input type="text" name="prodn">Name of product</span>
					<span><input type="number" name="price">Price of product</span>
					<span><input type="number" name="stock">Count in stock</span>
					<span><input type="text" name="tags">Tags</span>
					<span><input list="browsers" name="categ">
					<datalist id="browsers">
						<option value="Male">
						<option value="Female">
					</datalist>Category</span>
					<button type="submit" name="add">Add</button>
				</form>
			</div>
		<?php include ("footer.php") ?>
	</div>
</body>
</html>
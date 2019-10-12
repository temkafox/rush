<?php 
	include ("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<script>resetProductButton();</script>
	<div class="cart-container">
			
				<table id="table" class="cart-table">
					<tr>
						<th width="10px">№</th>
						<th width="300px">Product name</th>
						<th>Price</th>
						<th>Count</th>
						<th></th>
					</tr>
					<?php 
						$button = "Checkout";
						$arr = take_product("prodn");
						$_SESSION[basket][total] = NULL;
						$i = 0;
						foreach ($arr as $prod)
							if ($_SESSION[basket][$prod[id]] != NULL)
							{
								echo "<tr>";
								echo 	"<td>".++$i."</td>";
								echo	"<td>";
								echo		"<a href=\"product.php?id=".$prod[id]."\"><img class=\"table-img\" src=\"".$prod[img]."\" alt=".$prod[prodn]."></a>";
								echo		"<span>".$prod[prodn]."</span>";
								echo	"</td>";
								echo	"<td>".$prod[price]."$</td>";
								echo	"<td><span class=\"count-input\" >".$_SESSION[basket][$prod[id]]."</span></td>";
								echo	"<td><form action=\"del_from_basket.php\" method=\"get\">";
								echo	"<button class=\"cancel-button\" type=\"submit\" name=\"id\" value=\"".$prod[id]."\">";
								echo "<span class=\"delete\"></span>";
								echo	"<input type=\"text\"; style=\"display: none;\" name=\"prev\" value=\"basket.php\" ></form></td></button>";

								echo "</tr>";
								$_SESSION[basket][total] += $_SESSION[basket][$prod[id]] * $prod[price];
							}
						if (!$i){
								echo "<script>resetTable();</script>";
								echo "<div class=\"empty-basket\"><span>Your basket is empty</span></div>";
						}
					?>
					<tr class="table-footer">
						<td></td>
						<td>Total:</td>
						<td></td>
						<td width="20px"></td>
						<td width="60px">
							<?php
								echo $_SESSION[basket][total]; ?>
								<?php if ($_SESSION[logged_in] == NULL) { ?>
									<div class="basket-info">
										<a class="cart" onclick="popUpSign();">Check out</a>
									</div>
								<?php } else { ?>
									<form action="checkout.php" method="get">
										<button id="product-button" class="product-button"><span class="product-buy">Check out</span></button>
								</form></td>
							<?php } ?>
						</td>
					</tr>
				</table>
		</div>
		<?php include ("footer.php") ?>
	</div>
</body>
</html>
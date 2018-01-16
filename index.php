<?php
include_once 'header.php';
?>
			<main id="content-page">
				<div class="container">






<!-- View Cart Box Start -->
<?php
if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])>0)
{
	echo '<div class="col-xs-12 cart-view-table-front" id="view-cart">';
	echo '<h3 class="text-center">Korpa</h3>';
	echo '<form method="post" action="cart_update.php">';
	echo '<table class="table" cellpadding="6" cellspacing="0">';
	echo '<tbody>';

	$total =0;
	$b = 0;
	foreach ($_SESSION["cart_products"] as $cart_itm)
	{
		$product_name = $cart_itm["product_name"];
		$product_qty = $cart_itm["product_qty"];
		$product_price = $cart_itm["product_price"];
		$product_code = $cart_itm["product_code"];
		$product_color = $cart_itm["product_color"];
		$bg_color = ($b++%2==1) ? 'odd' : 'even'; //zebra stripe
		echo '<tr class="'.$bg_color.'">';
		echo '<td>Qty <input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
		echo '<td>'.$product_name.'</td>';
		echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /> Remove</td>';
		echo '</tr>';
		$subtotal = ($product_price * $product_qty);
		$total = ($total + $subtotal);
	}
	echo '<td colspan="4" class="text-center">';
	echo '<a href="view_cart.php" class="button btn btn-lg btn-success">Naruci</a><button type="submit" class="btn btn-info pull-right">Azuriraj</button>';
	echo '</td>';
	echo '</tbody>';
	echo '</table>';
	
	$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
	echo '</form>';
	echo '</div>';

}
?>
<!-- View Cart Box End -->


<!-- Products List Start -->
<?php
$results = $mysqli->query("SELECT product_code, product_name, product_desc, product_img_name, price FROM products ORDER BY id ASC");
if($results){ 
$products_item = '<div class="row">';
//fetch results set as object and output HTML
while($obj = $results->fetch_object())
{
$products_item .= <<<EOT
	<div class="col-md-4 col-sm-6 col-xs-12">
		<div class="thumbnail">
			<form method="post" action="cart_update.php">
				<div class="product-content">
					<div class="product-thumb">
						<img src="images/{$obj->product_img_name}">
					</div>
					<div class="caption">
						<h3>{$obj->product_name}</h3>
						<div class="product-desc">{$obj->product_desc}</div>
						<div class="product-info">

							<h4>
								<b>Cena: </b>
								<span class="text-danger">{$obj->price}</span>
								<i>{$currency}</i>
							</h4>

							<div class="row">
								<div class="col-xs-12">
									<label>
										<span>Boja:</span>
										<select name="product_color">
											<option value="Black">Crna</option>
											<option value="Silver">Siva</option>
										</select>
									</label>
								</div>
								
								<div class="col-xs-12">
									<label>
										<span>Kolicina:</span>
										<input type="text" size="2" maxlength="2" name="product_qty" value="1" />
									</label>
								</div>
							</div>
							<input type="hidden" name="product_code" value="{$obj->product_code}" />
							<input type="hidden" name="type" value="add" />
							<input type="hidden" name="return_url" value="{$current_url}" />
							<div align="center">
								<button type="submit" class="add_to_cart btn btn-info">Dodaj</button>
							</div>
						</div>
					</div>

				</div>
			</form>
	    </div>
	</div>
EOT;
}
$products_item .= '</div>';
echo $products_item;
}
?>    







				</div>
			</main>
<?php
include_once 'footer.php';
?>
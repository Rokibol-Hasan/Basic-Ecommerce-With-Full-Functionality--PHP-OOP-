<?php include "inc/header.php"; ?>
<?php

if (isset($_GET['delCart'])) {
	$cartId = $_GET['delCart'];
	$removeFromCart = $ct->removeFromCartById($cartId);
}
// if (!isset($_GET['id'])) {
// 	echo "<meta http-equiv='refresh' content ='0';URL=?id=live/>";
// }
if (isset($_POST['submit'])) {
	$cartId = $_POST['cartId'];
	$quantity = $_POST['quantity'];
	$updateCart = $ct->updateCart($cartId, $quantity);
}
?>
<div class="main">
	<div class="content">
		<div class="cartoption">
			<div class="cartpage">
				<h2>Your Cart</h2>
				<?php
				if (isset($updateCart)) {
					echo $updateCart;
				}
				?>
				<table class="tblone">
					<?php
					$checkCart = $ct->checkCartData();
					if ($checkCart) { ?>
						<tr>
							<th width="20%">Product Name</th>
							<th width="10%">Image</th>
							<th width="15%">Price</th>
							<th width="25%">Quantity</th>
							<th width="20%">Total Price</th>
							<th width="10%">Action</th>
						</tr>
						<?php
						$getUserCartInfo = $ct->getAllCartRow();
						if ($getUserCartInfo) {
							$sum = 0;
							$qty = 0;
							while ($userCart = $getUserCartInfo->fetch_assoc()) {
						?>
								<tr>
									<td><?php echo $userCart['productName'] ?></td>
									<td><img src="admin/<?php echo $userCart['image'] ?>" alt="" /></td>
									<td><?php echo $userCart['price'] ?>$</td>
									<td>
										<form action="" method="post">
											<input type="hidden" name="cartId" value="<?php echo $userCart['cartId'] ?>" />
											<input type="number" name="quantity" value="<?php echo $userCart['quantity'] ?>" />
											<input type="submit" name="submit" value="Update" />
										</form>
									</td>
									<td><?php $individualTotalPrice = $userCart['quantity'] * $userCart['price'];
										echo $individualTotalPrice; ?></td>
									<td><a onclick="return confirm('আসলেই উধাও করবেন?')" href="?delCart=<?php echo $userCart['cartId'] ?>">X</a></td>
									<?php
									$qty = $qty + $userCart['quantity'];
									$sum = $individualTotalPrice + $sum;
									Session::set("sum", $sum);
									Session::set("qty", $qty);
									?>
							<?php }
						} ?>
								</tr>
				</table>
				<table style="float:right;text-align:left;" width="40%">
					<tr>
						<th>Sub Total : </th>
						<td><?php echo $sum . "$"; ?></td>
					</tr>
					<tr>
						<th>VAT : </th>
						<td>5%</td>
					</tr>
					<tr>
						<th>Grand Total :</th>
						<td><?php
							$vat = $sum * 0.05;
							$grandTotal = $sum + $vat;
							Session::set("grandTotal", $grandTotal);
							echo "$grandTotal" . "$";
							?></td>
					</tr>
				</table>
			<?php } else {
						echo "Cart Is Empty";
					} ?>
			</div>
			<div class="shopping">
				<div class="shopleft">
					<a href="index.php"> <img src="images/shop.png" alt="" /></a>
				</div>
				<?php
				$cart = $ct->checkCartData();
				if (!empty($cart)) { ?>

					<div class="shopright">
						<a href="payment.php"> <img src="images/check.png" alt="" /></a>
					</div>
				<?php } ?>

			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php include "inc/footer.php"; ?>
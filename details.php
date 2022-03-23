<?php include "inc/header.php"; ?>
<?php
if (!isset($_GET['proId']) || $_GET['proId'] == NULL) {
	echo "<script> window.location = '404.php';</script>";
} else {
	$productId = $_GET['proId'];
}
if (isset($_POST['submit'])) {
	$quantity = $_POST['quantity'];
	$addToCart = $ct->addToCart($quantity, $productId);
}
?>

<div class="main">
	<div class="content">
		<div class="section group">
			<?php
				$getDetails = $pd->selectProductForDetailsPage($productId);
				if ($getDetails) {
					while ($details = $getDetails->fetch_assoc()) { ?>
						<div class="cont-desc span_1_of_2">
							<div class="mb-3">
								<?php
								if (isset($addToCart)) {
									echo "$addToCart";
								}
								?>
							</div>
							<div class="grid images_3_of_2">
								<img src="admin/<?php echo $details['image'] ?>" alt="" height="100%" width="100%" />
							</div>
							<div class="desc span_3_of_2">
								<h2><?php echo $details['productName'] ?></h2>
								<div class="price">
									<p>Price: <span><?php echo $details['price'] ?>$</span></p>
									<p>Category: <span><?php echo $details['catName'] ?></span></p>
									<p>Brand:<span><?php echo $details['brandName'] ?></span></p>
								</div>
								<div class="add-cart">
									<form action="" method="post">
										<input type="number" class="buyfield" name="quantity" value="1" />
										<input type="submit" class="buysubmit" name="submit" value="Buy Now" />
									</form>
								</div>
							</div>
							<div class="product-desc">
								<h2>Product Details</h2>
								<p><?php echo $details['body'] ?></p>
							</div>
						</div>
						<div class="rightsidebar span_3_of_1">
							<h2>CATEGORIES</h2>
							<ul>
								<?php
								$getAllCat = $cat->getAllCat();
								if ($getAllCat) {
									while ($category = $getAllCat->fetch_assoc()) { ?>
										<li><a href="productbycat.php?catId=<?php echo $category['catId'] ?>"><?php echo $category['catName'] ?></a></li>
								<?php }
								} ?>
							</ul>

						</div>
			<?php }
				}?>
		</div>
	</div>
</div>
<?php include "inc/footer.php"; ?>
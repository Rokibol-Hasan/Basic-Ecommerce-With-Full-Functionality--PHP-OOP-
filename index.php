<?php include "inc/header.php"; ?>
<?php include "inc/slider.php"; ?>
<div class="main">
	<div class="content">
		<div class="content_top">
			<div class="heading">
				<h3>Feature Products</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			$productInfo = $pd->getFeaturedProduct();
			if ($productInfo) {
				while ($getProduct = $productInfo->fetch_assoc()) { ?>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="details.php?proId=<?php echo $getProduct['productId'] ?>"><img src="admin/<?php echo $getProduct['image'] ?>" alt="Product Image" height="200px" width="200px" /></a>
						<h2><?php echo $getProduct['productName'] ?></h2>
						<p><?php echo $fm->textShorten($getProduct['body'], 80) ?></p>
						<p><span class="price"><?php echo $getProduct['price'] ?>$</span></p>
						<div class="button"><span><a href="details.php?proId=<?php echo $getProduct['productId'] ?>" class="details">Details</a></span></div>
					</div>
			<?php }
			} ?>
		</div>
		<div class="content_bottom">
			<div class="heading">
				<h3>New Products</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			$getNormalProduct = $pd->getNormalProducts();
			if ($getNormalProduct) {
				while ($normalProduct = $getNormalProduct->fetch_assoc()) { ?>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="details.php?proId=<?php echo $normalProduct['productId'] ?>"><img src="admin/<?php echo $normalProduct['image'] ?>" alt="New Product Image" height="200px" width="200px" /></a>
						<h2><?php echo $normalProduct['productName'] ?> </h2>
						<p><span class="price"><?php echo $normalProduct['price'] ?>$</span></p>
						<div class="button"><span><a href="details.php?proId=<?php echo $normalProduct['productId'] ?>" class="details">Details</a></span></div>
					</div>
			<?php }
			} ?>
		</div>
	</div>
</div>
<?php include "inc/footer.php"; ?>
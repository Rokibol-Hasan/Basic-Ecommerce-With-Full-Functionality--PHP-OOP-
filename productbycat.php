<?php include "inc/header.php"; ?>
<?php
if (!isset($_GET['catId']) || $_GET['catId'] == NULL) {
	echo "<script> window.location = '404.php';</script>";
} else {
	$catId = $_GET['catId'];
}
?>

<div class="main">
	<div class="content">
		<div class="content_top">
			<div class="heading">
				<h3>Latest From Category</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			$getProByCat = $pd->getProductByCategory($catId);
			if ($getProByCat) {
				while ($getProduct = $getProByCat->fetch_assoc()) { ?>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="details.php?proId=<?php echo $getProduct['productId'] ?>"><img src="admin/<?php echo $getProduct['image'] ?>" alt="" height="200px" width="200px" /></a>
						<h2><?php echo $getProduct['productName'] ?></h2>
						<p><?php echo $fm->textShorten($getProduct['body'], 50) ?></p>
						<p><span class="price"><?php echo $getProduct['price'] ?></span></p>
						<div class="button"><span><a href="details.php?proId=<?php echo $getProduct['productId'] ?>" class="details">Details</a></span></div>
					</div>
			<?php }
			} ?>
		</div>
	</div>
</div>
<?php include "inc/footer.php"; ?>
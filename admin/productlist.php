<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include "../classes/product.php"; ?>
<?php include "../helpers/format.php"; ?>
<?php
if (isset($_GET['editproduct'])) {
	$productId = $_GET['editProduct'];
}
$product = new Product();
$fm = new Format();
if (isset($_GET['del'])) {
	$deleteProduct = $_GET['del'];
	$deleteProductById = $product->deleteProductById($deleteProduct);
}
?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>Product List</h2>
		<div class="block">
			<a href="productadd.php " class="btn btn-primary mb-3"> Add New Product </a>
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>SL.</th>
						<th>Product Name</th>
						<th>Category</th>
						<th>Brand</th>
						<th>Body</th>
						<th>Price</th>
						<th>Image</th>
						<th>Type</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$getAllProduct = $product->getAllProduct();
					$x = 1;
					if ($getAllProduct) {
						while ($result = $getAllProduct->fetch_assoc()) { ?>
							<tr class="odd gradeX">
								<td><?php echo $x++; ?></td>
								<td><?php echo $result['productName'] ?></td>
								<td><?php echo $result['catName'] ?></td>
								<td><?php echo $result['brandName'] ?></td>
								<td><?php echo $fm->textshorten($result['body'], 20); ?></td>
								<td><?php echo $result['price'] ?></td>
								<td><img src="<?php echo $result['image'] ?>" height='40px' weight='40px'> </td>
								<td><?php
									if ($result['type'] == '0') {
										echo "Featured";
									} else {
										echo "General";
									}
									?></td>
								<td><a href="productedit.php?editProduct=<?php echo $result['productId'] ?>">Edit</a> || <a onclick="return confirm('আসলেই উধাও করবেন?')" href="?del=<?php echo $result['productId'] ?>">Delete</a></td>
						<?php }
					} ?>
							</tr>
				</tbody>
			</table>

		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		setupLeftMenu();
		$('.datatable').dataTable();
		setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php'; ?>
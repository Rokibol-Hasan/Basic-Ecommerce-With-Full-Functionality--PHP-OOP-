<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . "/../classes/cart.php");
$ct = new Cart();
$fm = new Format();
?>
<?php
if (isset($_GET['shiftid'])) {
	$orderId = $_GET['shiftid'];
	$getOrder = $ct->getAllOrderdProduct();
	if ($getOrder) {
		while ($row = $getOrder->fetch_assoc()) {
			$productId = $row['productId'];
			$stockChange = $ct->orderAndStock($productId);
		}
	}
	$updateStatus = $ct->updateStatus($orderId);
}
if (isset($_GET['removeOrder'])) {
	$id = $_GET['removeOrder'];
	$removeOrder = $ct->deleteOrderById($id);
}
?>
<div class="grid_10">
	<div class="box round first grid">
		<h2> Inbox</h2>
		<div class="block">
			<div class="mb-3">
				<?php
				if (isset($updateStatus)) {
					echo $updateStatus;
				}
				if (isset($removeOrder)) {
					echo $removeOrder;
				}
				?>
			</div>

			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>ID</th>
						<th>Date</th>
						<th>Product</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Address</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$getAllOrderdProduct = $ct->getAllOrderdProduct();
					if ($getAllOrderdProduct) {
						while ($result = $getAllOrderdProduct->fetch_assoc()) { ?>

							<tr class="odd gradeX">
								<td><?php echo $result['id'] ?></td>
								<td><?php echo $fm->formatDate($result['date']) ?></td>
								<td><?php echo  $result['productName'] ?></td>
								<td><?php echo $result['quantity'] ?></td>
								<td><?php echo $result['price'] ?></td>
								<td><a href="cmrprofile.php?customerId=<?php echo $result['customerId'] ?>">View Details</a></td>
								<?php
								if ($result['status'] == '0') { ?>
									<td><a class="btn btn-primary" href="?shiftid=<?php echo $result['id'] ?>">Mark As Shipped</a></td>
								<?php } else { ?>
									<td><a class="" href="?removeOrder=<?php echo $result['id'] ?>"><span style="color:red">X</span></a></td>
								<?php } ?>

							</tr>
					<?php }
					} ?>
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
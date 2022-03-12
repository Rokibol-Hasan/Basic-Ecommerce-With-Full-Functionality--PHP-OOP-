<?php
include 'inc/header.php';
include 'inc/sidebar.php';
include "../classes/category.php";
?>
<?php
$cat = new Category();
?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>Category List</h2>
		<div class="block">
			<a href="catadd.php" class="btn btn-info my-2">Add New Category</a>
			<?php

			if (isset($_GET['del'])) {
				$delCatId = $_GET['del'];
				$deleteCat = $cat->deleteCatById($delCatId);
			}

			?>
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Serial No.</th>
						<th>Category Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$x = 1;
					$getAllCat = $cat->getAllCat();
					if ($getAllCat) {
						while ($result = $getAllCat->fetch_assoc()) { ?>
							<tr class="odd gradeX">
								<td><?php echo $x;
									$x++; ?></td>
								<td><?php echo $result['catName'] ?></td>
								<td><a href="catedit.php?catid=<?php echo $result['catId'] ?>">Edit</a> || <a onclick="return confirm('আসলেই উধাও করবেন?')" href="?del=<?php echo $result['catId'] ?>">Delete</a></td>
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
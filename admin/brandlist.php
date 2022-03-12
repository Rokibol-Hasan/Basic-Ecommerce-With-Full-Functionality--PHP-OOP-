<?php
include 'inc/header.php';
include 'inc/sidebar.php';
include "../classes/brand.php";
?>
<?php
$brand = new Brand();
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Brand List</h2>
        <div class="block">
            <a href="brandadd.php" class="btn btn-info mb-2">Add New Brand</a>
            <?php

            if (isset($_GET['del'])) {
                $delBrandId = $_GET['del'];
                $deleteBrand = $brand->deleteBrandById($delBrandId);
            }

            ?>
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Brand Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $x = 1;
                    $getAllBrand = $brand->getAllBrand();
                    if ($getAllBrand) {
                        while ($result = $getAllBrand->fetch_assoc()) { ?>
                            <tr class="odd gradeX">
                                <td><?php echo $x;
                                    $x++; ?></td>
                                <td><?php echo $result['brandName'] ?></td>
                                <td><a href="brandedit.php?bid=<?php echo $result['brandId'] ?>">Edit</a> || <a onclick="return confirm('আসলেই উধাও করবেন?')" href="?del=<?php echo $result['brandId'] ?>">Delete</a></td>
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
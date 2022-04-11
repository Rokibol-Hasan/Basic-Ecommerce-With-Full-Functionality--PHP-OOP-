<?php
include 'inc/header.php';
include 'inc/sidebar.php';
include "../classes/supplier.php";
?>
<?php
$supplier = new Supplier();
if (isset($_GET['delsup'])) {
    $supplierId = $_GET['delsup'];
    $deleteSupplier = $supplier->deleteSupplierById($supplierId);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>All Suppliers</h2>
        <div class="block">
            <?php
            if (isset($deleteSupplier)) {
                echo $deleteSupplier;
            }
            ?>
            <a href="supplieradd.php" class="btn btn-primary mb-2">Add Supplier</a>
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Supplier Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Mail</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $x = 1;
                    $getAllSupplier = $supplier->getAllSupplier();
                    if ($getAllSupplier) {
                        while ($result = $getAllSupplier->fetch_assoc()) { ?>
                            <tr class="odd gradeX">
                                <td><?php echo $x;
                                    $x++; ?></td>
                                <td><?php echo $result['supplierName'] ?></td>
                                <td><?php echo $result['address'] ?></td>
                                <td><?php echo $result['phone'] ?></td>
                                <td><?php echo $result['mail'] ?></td>
                                <td><a onclick="return confirm('আসলেই উধাও করবেন?')" href="?delsup=<?php echo $result['supplierId'] ?>">Delete</a></td>
                            </tr>
                    <?php }
                    }
                    ?>

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
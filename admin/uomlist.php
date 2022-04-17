<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include "../classes/product.php"; ?>
<?php include "../classes/supplier.php"; ?>

<?php
$supplier = new Supplier();
if (isset($_GET['deluom'])) {
    $delUom = $_GET['deluom'];
    $delUom = $supplier->delUomById($delUom);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>UOM List</h2>
        <div class="block">
            <?php
            if (isset($delUom)) {
                echo $delUom;
            }

            ?>
            <a href="uomadd.php " class="btn btn-primary mb-3"> Add New UOM </a>
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Short Code</th>
                        <th>Description</th>
                        <th>Relative Factor</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $getAllSupplier = $supplier->getAllUom();
                    $x = 1;
                    if ($getAllSupplier) {
                        while ($result = $getAllSupplier->fetch_assoc()) { ?>
                            <tr class="odd gradeX">
                                <td><?php echo $x++; ?></td> 
                                <td><?php echo $result['shortCode'] ?></td>
                                <td><?php echo $result['description'] ?></td>
                                <td><?php echo $result['rf'] ?></td>
                                <td><a href="uomedit.php?editUom=<?php echo $result['uomId'] ?>">Edit</a> || <a onclick="return confirm('আসলেই উধাও করবেন?')" href="?deluom=<?php echo $result['uomId'] ?>">Delete</a></td>
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
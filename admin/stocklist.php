<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include "../classes/supplier.php"; ?>

<?php
if (isset($_GET['editStock'])) {
    $productId = $_GET['editStock'];
}
$supplier = new Supplier();
if (isset($_GET['del'])) {
    $deleteStock = $_GET['del'];
    $deleteStockById = $supplier->deleteStockById($deleteStock);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Stock List</h2>
        <div class="block">
            <a href="stockadd.php " class="btn btn-primary mb-3"> Add New Stock </a>
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>SL.</th>
                        <th>ShortCode</th>
                        <th>SupplierName</th>
                        <th>Relative Factor</th>
                        <th>SuppQty</th>
                        <th>ConvertedQty</th>
                        <th>SuppPrice</th>
                        <th>ConvertedPrice</th>
                        <th>Sell Price</th>
                        <th>Product Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $selectAllStock = $supplier->selectAllStock();
                    $x = 1;
                    if ($selectAllStock) {
                        while ($result = $selectAllStock->fetch_assoc()) { ?>
                            <tr class="odd gradeX">
                                <td><?php echo $x++; ?></td>
                                <td><?php echo $result['shortCode'] ?></td>
                                <td><?php echo $result['supplierName'] ?></td>
                                <td><?php echo $result['rf'] ?></td>
                                <td><?php echo $result['suppQty'] ?></td>
                                <td><?php echo $result['convertedQty'] ?></td>
                                <td><?php echo $result['suppPrice'] ?></td>
                                <td><?php echo $result['convertedPrice'] ?></td>
                                <td><?php echo $result['sellPrice'] ?></td>
                                <td><?php echo $result['productName'] ?></td>
                                <td><a href="stockedit.php?editStock=<?php echo $result['stockId'] ?>">Edit</a> || <a onclick="return confirm('আসলেই উধাও করবেন?')" href="?del=<?php echo $result['stockId'] ?>">Delete</a></td>
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
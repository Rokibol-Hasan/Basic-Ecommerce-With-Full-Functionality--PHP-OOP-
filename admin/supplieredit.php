<?php
include 'inc/header.php';
include 'inc/sidebar.php';
include "../classes/supplier.php";
?>
<?php
if (isset($_GET['editSup'])) {
    $supplierId = $_GET['editSup'];
}
$supplier = new Supplier();
if (isset($_POST['submit'])) {
    $updateSupplier = $supplier->updateSupplier($supplierId, $_POST);
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit Supplier</h2>
        <a href="supplierlist.php" class="btn btn-info mt-2">Supplier List</a>
        <div class="block copyblock">
            <?php
            if (isset($updateSupplier)) {
                echo $updateSupplier;
            }

            ?>
            <form action="" method="post">
                <table class="form">
                    <?php
                    $getSup = $supplier->getSupplierById($supplierId);
                    if ($getSup) {
                        while ($row = $getSup->fetch_assoc()) { ?>
                            <tr>
                                <td>
                                    <label>Supplier Name</label>
                                </td>
                                <td>
                                    <input type="text" value="<?php echo $row['supplierName'] ?>" name="supplierName" class="medium">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Supplier Address</label>
                                </td>
                                <td>
                                    <input type="text" name="address" value="<?php echo $row['address'] ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Supplier Phone</label>
                                </td>
                                <td>
                                    <input type="number" name="phone" value="<?php echo $row['phone'] ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Supplier Mail</label>
                                </td>
                                <td>
                                    <input type="text" name="mail" value="<?php echo $row['mail'] ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" name="submit" Value="Update">
                                </td>
                            </tr>
                    <?php }
                    } ?>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
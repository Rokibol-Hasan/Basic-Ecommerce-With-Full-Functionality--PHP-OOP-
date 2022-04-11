<?php
include 'inc/header.php';
include 'inc/sidebar.php';
include "../classes/supplier.php";
?>
<?php
$brand = new Supplier();
if (isset($_POST['submit'])) {
    $supplierName = $_POST['supplierName'];
    $insertSupplier = $brand->insertSupplier($_POST);
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Supplier</h2>
        <a href="allsupplier.php" class="btn btn-info mt-2">Supplier List</a>
        <div class="block copyblock">
            <?php
            if (isset($insertSupplier)) {
                echo $insertSupplier;
            }

            ?>
            <form action="" method="post">
                <table class="form">
                    <tr>
                        <td>
                            <label>Supplier Name</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Enter Supplier Name..." name="supplierName" class="medium">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Supplier Address</label>
                        </td>
                        <td>
                            <input type="text" name="address" placeholder="Enter your city">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Supplier Phone</label>
                        </td>
                        <td>
                            <input type="number" name="phone" placeholder="+880">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Supplier Mail</label>
                        </td>
                        <td>
                            <input type="text" name="mail" placeholder="example@gmail.com">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" Value="Save">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
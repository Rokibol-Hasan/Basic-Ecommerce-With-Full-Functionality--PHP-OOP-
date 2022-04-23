<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include "../classes/supplier.php"; ?>
<?php include "../classes/product.php"; ?>
<?php
if (isset($_GET['editStock'])) {
    $getStockId = $_GET['editStock'];
}
$pd = new Product();
$supplier = new Supplier();
if (isset($_POST['submit'])) {
    $updateStock = $supplier->updateStockById($getStockId, $_POST);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit stock</h2>
        <div class="block">
            <?php
            if (isset($updateStock)) {
                echo $updateStock;
            }
            ?>
            <a href="stocklist.php" class="btn btn-info">Stock List</a>
            <form action="" method="POST">
                <table class="form">
                    <?php
                    $getStockById = $supplier->getStockById($getStockId);
                    if ($getStockById) {
                        while ($getStock = $getStockById->fetch_assoc()) { ?>
                            <tr>
                                <td>
                                    <label>UOM ID/shortCode</label>
                                </td>
                                <td>
                                    <select name="uomId">
                                        <option>Select ShortCode</option>
                                        <?php
                                        $getShortCode = $supplier->getAllUom();
                                        if ($getShortCode) {
                                            while ($result = $getShortCode->fetch_assoc()) { ?>
                                                <option <?php
                                                        if ($result['uomId'] == $getStock['uomId']) { ?> selected="selected" <?php } ?> value="<?php echo $result['uomId'] ?>"> <?php echo $result['shortCode'] ?> </option>
                                        <?php }
                                        } ?>

                                    </select>
                                    <div id="live"> </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Supplier ID</label>
                                </td>
                                <td>
                                    <select name="supplierId">
                                        <option>Select Supplier</option>
                                        <?php
                                        $getSupplier = $supplier->getAllSupplier();
                                        if ($getSupplier) {
                                            while ($row = $getSupplier->fetch_assoc()) { ?>
                                                <option <?php
                                                        if ($row['supplierId'] == $getStock['supplierId']) { ?> selected="selected" <?php } ?> value="<?php echo $row['supplierId'] ?>"> <?php echo $row['supplierName'] ?> </option>
                                        <?php }
                                        } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Relative Factor</label>
                                </td>
                                <td>
                                    <select name="rf" onchange="calculation()" id="rf">
                                        <option>Select Relative Factor</option>
                                        <?php
                                        $getUom = $supplier->getAllUom();
                                        if ($getUom) {
                                            while ($uom = $getUom->fetch_assoc()) { ?>
                                                <option <?php
                                                        if ($uom['rf'] == $getStock['rf']) { ?> selected="selected" <?php } ?> value="<?php echo $uom['rf'] ?>"> <?php echo $uom['rf'] ?> </option>
                                        <?php }
                                        } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Supplier Quantity</label>
                                </td>
                                <td>
                                    <input type="text" onkeyup="calculation()" name="suppQty" id="sup_qty" class="input qty medium" value="<?php echo $getStock['suppQty'] ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Converted Qty</label>
                                </td>
                                <td>
                                    <input id="cqty" type="text" name="convertedQty" class="cqty medium" value="<?php echo $getStock['convertedQty'] ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Supplier Price</label>
                                </td>
                                <td>
                                    <input type="text" onkeyup="calculation()" id="sup_price" name="suppPrice" class="sp medium" value="<?php echo $getStock['suppPrice'] ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Converted Price</label>
                                </td>
                                <td>
                                    <input id="cp" type="text" name="convertedPrice" class="cp medium" value="<?php echo $getStock['convertedPrice'] ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Sell Price</label>
                                </td>
                                <td>
                                    <input id="" type="text" name="sellPrice" class="medium" value="<?php echo $getStock['sellPrice'] ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Product Name</label>
                                </td>
                                <td>
                                    <select name="productId">
                                        <option>Select Product</option>
                                        <?php
                                        $getPro = $pd->getAllProduct();
                                        if ($getPro) {
                                            while ($pro = $getPro->fetch_assoc()) {
                                                $productId = $pro['productId'];
                                        ?>
                                                <option <?php
                                                        if ($pro['productId'] == $getStock['productId']) { ?> selected="selected" <?php } ?> value="<?php echo $pro['productId'] ?>"> <?php echo $pro['productName'] ?> </option>
                                        <?php }
                                        } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="submit" Value="Update" />
                                </td>
                            </tr>
                    <?php }
                    }
                    ?>
                </table>
            </form>
        </div>
    </div>
</div>
<!-- Live Search -->
<!-- 
<script>
    $(document).ready(function() {
        $("#shortCode").keyup(function() {
            var live = $(this).val();
            if (live != "") {
                $.ajax({
                    url: "livesearch.php",
                    method: "POST",
                    data: {
                        search: live
                    },
                    dataType: "text",
                    success: function(data) {
                        $('#live').html(data);
                    }
                });
            } else {
                $('#live').html("No Data");
            }
        });
    });
</script> -->
<!-- Form Calculation Script -->
<script>
    function calculation(event) {
        var relative_factor = $('#rf').val();
        var supplier_qty = $('#sup_qty').val();
        var supplier_price = $('#sup_price').val();
        console.log(relative_factor)
        console.log(supplier_qty)
        console.log(supplier_price)
        var cqty = relative_factor * supplier_qty;
        $('#cqty').val(cqty)
    }
</script>
<!-- Load TinyMCE -->
<!-- <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script> -->
<!-- <script type="text/javascript">
    $(document).ready(function() {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script> -->
<!-- Load TinyMCE -->
<?php include 'inc/footer.php'; ?>
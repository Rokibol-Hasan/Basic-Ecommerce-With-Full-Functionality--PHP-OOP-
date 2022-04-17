<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include "../classes/supplier.php"; ?>
<?php
if (isset($_GET['editUom'])) {
    $id = $_GET['editUom'];
}
$supplier = new Supplier();
if (isset($_POST['submit'])) {
    $updateUom = $supplier->updateUom($id, $_POST);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update uom</h2>
        <div class="block">
            <?php
            if (isset($updateUom)) {
                echo $updateUom;
            }
            ?>
            <a href="uomlist.php" class="btn btn-info">UOM List</a>

            <form action="" method="post" enctype="multipart/form-data">

                <table class="form">
                    <?php
                    $getUomById = $supplier->getUomById($id);
                    if ($getUomById) {
                        while ($row = $getUomById->fetch_assoc()) { ?>
                            <tr>
                                <td>
                                    <label>ShortCode</label>
                                </td>
                                <td>
                                    <input type="text" name="shortCode" value="<?php echo $row['shortCode'] ?> ">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Desc</label>
                                </td>
                                <td>
                                    <textarea name="description" id="" rows="3"><?php echo $row['description'] ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Relative Factor</label>
                                </td>
                                <td>
                                    <input id="" type="text" name="rf" value="<?php echo $row['rf'] ?>" class=" medium" />
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="submit" Value="Update" />
                                </td>
                            </tr>
                    <?php }
                    } ?>
                </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php'; ?>
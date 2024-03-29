<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include "../classes/supplier.php"; ?>
<?php
$supplier = new Supplier();
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add new uom</h2>
        <div class="block">
            <a href="uomlist.php" class="btn btn-info">UOM List</a>
            <?php
            if (isset($_POST['submit'])) {
                $insertUom = $supplier->insertUom($_POST);
            }
            ?>
            <?php if (isset($insertUom)) {
                echo $insertUom;
            } ?>
            <form action="" method="post" enctype="multipart/form-data">

                <table class="form">
                    <tr>
                        <td>
                            <label>ShortCode</label>
                        </td>
                        <td>
                            <input type="text" name="shortCode" placeholder="Enter shortcode here..">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Desc</label>
                        </td>
                        <td>
                            <textarea name="description" id="" rows="3"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Relative Factor</label>
                        </td>
                        <td>
                            <input id="" type="text" name="rf" placeholder="relative factor" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
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
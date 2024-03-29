<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include "../classes/category.php"; ?>
<?php include "../classes/brand.php"; ?>
<?php include "../classes/product.php"; ?>
<?php
if (isset($_GET['editProduct'])) {
    $id = $_GET['editProduct'];
}
$pd = new Product();
if (isset($_POST['submit'])) {
    $updateProduct = $pd->productUpdate($_POST, $_FILES, $id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block">
            <?php
            if (isset($updateProduct)) {
                echo $updateProduct;
            }
            ?>
            <?php

            $getProductById = $pd->selectProductById($id);
            if ($getProductById) {
                while ($value = $getProductById->fetch_assoc()) { ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <table class="form">
                            <tr>
                                <td>
                                    <label>Name</label>
                                </td>
                                <td>
                                    <input type="text" name="productName" value="<?php echo $value['productName'] ?>" class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Category</label>
                                </td>
                                <td>
                                    <select id="select" name="catId">
                                        <option>Select Category</option>
                                        <?php
                                        $cat = new Category();
                                        $getAllCat = $cat->getAllCat();
                                        if ($getAllCat) {
                                            while ($result = $getAllCat->fetch_assoc()) { ?>
                                                <option <?php
                                                    if ($value['catId'] == $result['catId']) { ?> selected="selected" <?php }?> value="<?php echo $result['catId'] ?>"><?php echo $result['catName'] ?></option>
                                        <?php  }
                                        } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Brand</label>
                                </td>
                                <td>
                                    <select id="select" name="brandId">
                                        <option>Select Brand</option>
                                        <?php
                                        $brand = new Brand();
                                        $getAllBrand = $brand->getAllBrand();
                                        if ($getAllBrand) {
                                            while ($getBrand = $getAllBrand->fetch_assoc()) { ?>
                                                <option <?php if ($value['brandId'] == $getBrand['brandId']) { ?> selected="selected" <?php } ?> value="<?php echo $getBrand['brandId'] ?>"><?php echo $getBrand['brandName'] ?></option>
                                        <?php }
                                        } ?>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td style="vertical-align: top; padding-top: 9px;">
                                    <label>Description</label>
                                </td>
                                <td>
                                    <textarea class="tinymce" name="body"> <?php echo $value['body'] ?> </textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Price</label>
                                </td>
                                <td>
                                    <input type="text" name="price" value="<?php echo $value['price'] ?>" class="medium" />
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label>Upload Image</label>
                                </td>
                                <td>
                                    <input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)"><br>
                                    <img class="img" id="output" src="<?php echo $value['image']; ?>" alt="post image" width="70px" height="70px">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label>Product Type</label>
                                </td>
                                <td>
                                    <select id="select" name="type">
                                        <option>Select Type</option>
                                        <?php
                                        if ($value['type'] == 0) { ?>
                                            <option selected="selected" value="0">Featured</option>
                                            <option value="1">General</option>
                                        <?php } else { ?>
                                            <option selected="selected" value="1">General</option>
                                            <option value="0">Featured</option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="submit" Value="Save" />
                                </td>
                            </tr>
                        </table>
                <?php }
            } ?>
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
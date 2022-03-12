<?php
include 'inc/header.php';
include 'inc/sidebar.php';
include "../classes/brand.php";
?>
<?php
$brand = new Brand();
if (isset($_POST['submit'])) {
    $brandName = $_POST['brandName'];
    $insertBrand = $brand->brandInsert($brandName);
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Brand</h2>
        <a href="brandlist.php" class="btn btn-info mt-2">Brand List</a>
        <div class="block copyblock">
            <?php
            if (isset($insertBrand)) {
                echo $insertBrand;
            }

            ?>
            <form action="" method="post">
                <table class="form">
                    <tr>
                        <td>
                            <input type="text" placeholder="Enter Brand Name..." name="brandName" class="medium">
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
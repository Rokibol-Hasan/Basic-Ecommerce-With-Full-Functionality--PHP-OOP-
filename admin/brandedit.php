<?php
include 'inc/header.php';
include 'inc/sidebar.php';
include "../classes/brand.php";
?>
<?php
if (isset($_GET['bid'])) {
    $id = $_GET['bid'];
}
$brand = new Brand();
if (isset($_POST['submit'])) {
    $brandName = $_POST['brandName'];
    $brandUpdate = $brand->brandUpdate($id, $brandName);
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit Brand Name</h2>
        <div class="block copyblock">
            <?php
            if (isset($brandUpdate)) {
                echo $brandUpdate;
            }

            ?>
            <form action="" method="post">
                <table class="form">
                    <?php
                    $getAllBrand = $brand->getAllBrandById($id);
                    if ($getAllBrand) {
                        while ($result = $getAllBrand->fetch_assoc()) { ?>
                            <tr>
                                <td>
                                    <input type="text" name="brandName" value="<?php echo $result['brandName'] ?>" class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" name="submit" Value="Save" />
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
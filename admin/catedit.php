<?php
include 'inc/header.php';
include 'inc/sidebar.php';
include "../classes/category.php";
?>
<?php
if (isset($_GET['catid'])) {
    $id = $_GET['catid'];
}
$cat = new Category();
if (isset($_POST['submit'])) {
    $catName = $_POST['catName'];
    $catUpdate = $cat->catUpdate($id,$catName);
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Category</h2>
        <div class="block copyblock">
            <?php
            if (isset($catUpdate)) {
                echo $catUpdate;
            }

            ?>
            <form action="" method="post">
                <table class="form">
                    <?php 
                    $getAllCat = $cat->getAllCatById($id);
					if ($getAllCat) {
						while ($result = $getAllCat->fetch_assoc()) { ?>
                    <tr>
                        <td>
                            <input type="text" name="catName" value="<?php echo $result['catName'] ?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                    <?php }} ?>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
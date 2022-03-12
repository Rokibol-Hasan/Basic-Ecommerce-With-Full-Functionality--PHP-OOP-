<?php
include 'inc/header.php';
include 'inc/sidebar.php';
include "../classes/category.php";
?>
<?php
$cat = new Category();
if (isset($_POST['submit'])) {
    $catName = $_POST['catName'];
    $insertCat = $cat->catInsert($catName);
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Category</h2>
        <a href="catlist.php" class="btn btn-info mt-2">Category List</a>
        <div class="block copyblock">
            <?php
            if (isset($insertCat)) {
                echo $insertCat;
            }

            ?>
            <form action="catadd.php" method="post">
                <table class="form">
                    <tr>
                        <td>
                            <input type="text" placeholder="Enter Category Name..." name="catName" class="medium">
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
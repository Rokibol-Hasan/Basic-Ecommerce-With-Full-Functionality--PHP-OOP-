<?php include "inc/header.php"; ?>

<?php
if (isset($_GET['profileId'])) {
    $id = $_GET['profileId'];
    if (isset($_POST['update'])) {
        $updateProfile = $customer->updateCustomerById($id, $_POST);
    }
}
?>
<div class="main">
    <div class="content">
        <div class="register_account">
            <h3>Update Your Account</h3>
            <?php
            $getCustomerInfo = $customer->getCustomerInfo();
            if ($getCustomerInfo) {
                $result = $getCustomerInfo->fetch_assoc(); ?>
                <form method="post" action="">
                    <table>
                        <?php
                        if (isset($updateProfile)) {
                            echo $updateProfile;
                        }
                        ?>
                        <tbody>
                            <tr>
                                <td>
                                    <div>
                                        <input type="text" name="name" value="<?php echo $result['name'] ?>">
                                    </div>

                                    <div>
                                        <input type="text" name="city" value="<?php echo $result['city'] ?>">
                                    </div>

                                    <div>
                                        <input type="text" name="zip" value="<?php echo $result['zip'] ?>">
                                    </div>
                                    <div>
                                        <input type="text" name="email" value="<?php echo $result['email'] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <input type="text" name="address" value="<?php echo $result['address'] ?>">
                                    </div>
                                    <div>
                                        <input type="text" name="country" value="<?php echo $result['country'] ?>">
                                    </div>

                                    <div>
                                        <input type="text" name="phone" value="<?php echo $result['phone'] ?>">
                                    </div>
                                    <div>
                                        <input type="password" name="pass" value="<?php echo $result['pass'] ?>">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div>
                        <button class="grey btn btn-primary mt-3" name="update">Update Info</button>
                    </div>
                <?php } ?>
                </form>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php include "inc/footer.php"; ?>
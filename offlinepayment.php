<?php include "inc/header.php"; ?>
<?php
$login = Session::get("customerLogin");
if ($login == false) {
    header("Location:login.php");
}
?>
<?php
if (isset($_GET['orderId']) && $_GET['orderId'] == 'order') {
    $customerId = Session::get("customerId");
    $insertOrder = $ct->insertOrder($customerId);
    $clearCart = $ct->logoutAndClearCart();
    header("Location:success.php");
}
?>
<section class="payment card">
    <div class="container">
        <div class="row">
            <h1>
                Order Information
                <hr>
            </h1>
            <div class="col-md-6">
                <div class="payment-left card">
                    <h2>Your Cart</h2>
                    <hr>
                    <table class="tbl-payment">
                        <?php
                        $checkCart = $ct->checkCartData();
                        if ($checkCart) { ?>
                            <tr>
                                <th width="25%">Product Name</th>
                                <th width="25%">Price</th>
                                <th width="25%">Quantity</th>
                                <th width="25%">Total Price</th>
                            </tr>
                            <?php
                            $getUserCartInfo = $ct->getAllCartRow();
                            if ($getUserCartInfo) {
                                $sum = 0;
                                $qty = 0;
                                while ($userCart = $getUserCartInfo->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <td><?php echo $userCart['productName'] ?></td>
                                        <td><?php echo $userCart['price'] ?>$</td>
                                        <td><?php echo $userCart['quantity'] ?></td>
                                        <td><?php $individualTotalPrice = $userCart['quantity'] * $userCart['price'];
                                            echo $individualTotalPrice; ?></td>
                                        <?php
                                        $qty = $qty + $userCart['quantity'];
                                        $sum = $individualTotalPrice + $sum;
                                        Session::set("sum", $sum);
                                        Session::set("qty", $qty);
                                        ?>
                                <?php }
                            } ?>
                                    </tr>
                    </table>
                    <table class="ammount-details card">
                        <tr>
                            <th>Sub Total : </th>
                            <td><?php echo $sum . "$"; ?></td>
                        </tr>
                        <tr>
                            <th>VAT : </th>
                            <td>5%</td>
                        </tr>
                        <tr>
                            <th>Grand Total :</th>
                            <td><?php
                                $vat = $sum * 0.05;
                                $grandTotal = $sum + $vat;
                                echo "$grandTotal" . "$";
                                ?></td>
                        </tr>
                    </table>
                <?php } else {
                            echo "Cart Is Empty";
                        } ?>
                <div class="button-cart">
                    <a href="cart-user.php" class="btn btn-primary my-3">Go To Cart</a>
                </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="payment-right card">
                    <h3>Billing Information</h3>
                    <hr>
                    <?php
                    $getCustomerInfo = $customer->getCustomerInfo();
                    if ($getCustomerInfo) {
                        $result = $getCustomerInfo->fetch_assoc(); ?>
                        <form method="post" action="">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div>
                                                <label for="name">Name:</label>
                                                <input id="name" readonly value="<?php echo $result['name'] ?>">
                                            </div>

                                            <div>
                                                <label for="city">City:</label>
                                                <input id="city" readonly value="<?php echo $result['city'] ?>">
                                            </div>

                                            <div>
                                                <label for="zip">Zip-Code:</label>
                                                <input id="zip" readonly value="<?php echo $result['zip'] ?>">
                                            </div>
                                            <div>
                                                <label for="email">Email:</label>
                                                <input id="email" readonly value="<?php echo $result['email'] ?>">
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <label for="address">Address:</label>
                                                <input id="address" readonly value="<?php echo $result['address'] ?>">
                                            </div>
                                            <div>
                                                <label for="country">Country:</label>
                                                <input id="country" readonly value="<?php echo $result['country'] ?>">
                                            </div>
                                            <div>
                                                <label for="phone">Mobile:</label>
                                                <input id="phone" readonly value="<?php echo $result['phone'] ?>">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="update">
                                <a href="editprofile.php?profileId=<?php echo $result['id'] ?>" class="btn btn-primary my-3">Update Info</a>
                            </div>
                        <?php } ?>
                        </form>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <p>
        <a href="?orderId=order" class="btn btn-success">Order Now</a>
    </p>

    </div>


</section>
<?php include "inc/footer.php"; ?>
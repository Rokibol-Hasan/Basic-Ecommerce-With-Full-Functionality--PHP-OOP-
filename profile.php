<?php include "inc/header.php"; ?>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="userinfo card">
                <?php
                $customerInfo = $customer->getCustomerInfo();
                if ($customerInfo) {
                    $result = $customerInfo->fetch_assoc(); ?>
                    <div class="infotop">
                        <div class="usericon">
                            <i class="fa fa-user-circle-o"></i>
                        </div>
                        <div class="username">
                            <h2><?php echo $result['name'] ?></h2>
                        </div>
                        <div class="orders">

                            You Have : <?php
                                        $checkCart = $ct->checkCartData();
                                        if ($checkCart) {
                                            $qty = Session::get("qty");
                                            echo "$qty";
                                        }else {
                                            echo "0";
                                        }
                                        ?> Product In Cart
                        </div>
                    </div>

                    <div class="additionalinfo">
                        <ul class=" ">
                            <li>
                                Mail: <?php echo $result['email'] ?>
                            </li>
                            <li>
                                Phone: <?php echo $result['phone'] ?>
                            </li>
                            <li>
                                City: <?php echo $result['city'] ?>
                            </li>
                            <li>
                                Country: <?php echo $result['country'] ?>
                            </li>
                            <li>
                                Address: <?php echo $result['address'] ?>
                            </li>
                            <li>
                                Zip-Code: <?php echo $result['zip'] ?>
                            </li>

                            <a href="editprofile.php?profileId=<?php echo $result['id']?>" class="btn btn-primary">Edit Profile</a>
                        </ul>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<?php include "inc/footer.php"; ?>
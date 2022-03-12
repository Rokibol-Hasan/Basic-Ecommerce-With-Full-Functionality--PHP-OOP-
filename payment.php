<?php include "inc/header.php"; ?>
<?php
$login = Session::get("customerLogin");
if ($login == false) {
    header("Location:login.php");
}

?>
<section class="payment card">
    <div class="container">
        <div class="row">
            <div class="selectoption">
                <h1>
                    Select Your Payment Option
                    <hr>
                </h1>
            </div>
            <div class="col-md-6">
                <div class="payment-online">
                    <a name="" id="" class="btn btn-primary" href="onlinepayment.php" role="button">Online payment</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="payment-offline">
                    <a name="" id="" class="btn btn-primary" href="offlinepayment.php" role="button">Offline payment</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include "inc/footer.php"; ?>
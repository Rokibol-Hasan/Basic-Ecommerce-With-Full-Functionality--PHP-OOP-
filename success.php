<?php include "inc/header.php"; ?>
<?php
$login = Session::get("customerLogin");
if ($login == false) {
    header("Location:login.php");
}
?>
<div class="main">
    <div class="content">
        <section class="success-body">
            <div class="success-pay">
                <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
                    <i class="checkmark">✓</i>
                </div>
                <h1>Success</h1>
                <h3>You Have Orderd Product Of <?php echo Session::get("sum") ?>$</h3>
                <p>We received your purchase request;<br /> we'll be in touch shortly!</p>
            </div>
        </section>

    </div>

</div>
<?php include "inc/footer.php"; ?>
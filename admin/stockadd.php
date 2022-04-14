<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include "../classes/supplier.php"; ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add new stock</h2>
        <div class="block">
            <a href="stocklist.php" class="btn btn-info">Stock List</a>
            <form action="" method="POST">

                <table class="form">
                    <tr>
                        <td>
                            <label>UOM ID/shortCode</label>
                        </td>
                        <td>
                            <input type="text" id="shortCode" name="shortCode" class="medium" placeholder="Enter uom id here..">
                            <div id="live"> </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Supplier ID</label>
                        </td>
                        <td>
                            <input type="text" name="supplierId" class="medium" placeholder="Enter uom id here..">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Supplier Quantity</label>
                        </td>
                        <td>
                            <input type="text" name="suppQty" class="input qty medium" placeholder="Enter supplier quantity here..">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Converted Qty</label>
                        </td>
                        <td>
                            <input id="cqty" type="text" name="convertedQty" class="cqty medium" placeholder="Enter converted quantity here..">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Supplier Price</label>
                        </td>
                        <td>
                            <input id="sp" type="text" name="suppPrice" class="sp medium" placeholder="supplier price" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Converted Price</label>
                        </td>
                        <td>
                            <input id="cp" type="text" name="convertedPrice" class="cp medium" placeholder="Converted price" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Sell Price</label>
                        </td>
                        <td>
                            <input id="" type="text" name="sellPrice" class="medium" placeholder="Sell price" />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<!-- Live Search -->

<script>
    $(document).ready(function() {
        $("#shortCode").keyup(function() {
            var live = $(this).val();
            if (live != '') {
                $.ajax({
                    url: "livesearch.php",
                    method: "POST",
                    data: {
                        search: live
                    },
                    dataType: "text",
                    success: function(data) {
                        $('#live').html(data);
                    }
                });
            } else {
                $('#live').html("");
            }
        });
    });
</script>
<!-- Form Calculation Script -->
<script>
    $(document).ready(function() {
        $(".input,#sp").keyup(function() {
            var qty = $(".qty").val();
            var cqty = $("#cqty").val();
            var sp = $("#sp").val();
            if ($(".qty").val() <= 3) {
                $("#cqty").val(qty * 12);
            } else {
                $("#cqty").val(qty * 50);
            }
            $("#cp").val(sp / cqty);
        });
    })
</script>
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
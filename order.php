<?php include "inc/header.php"; ?>
<?php
$login = Session::get("customerLogin");
if ($login == false) {
    header("Location:login.php");
}

if (isset($_GET['deleteOrder'])) {
    $id = $_GET['deleteOrder'];
    $deleteOrder = $ct->deleteOrderById($id);
}
?>

<div class="main">
    <div class="content">
        <div class="section group order-table">
            <?php
            if (isset($deleteOrder)) {
                echo $deleteOrder;
            }


            ?>
            <table class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Get Invoice</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $x = 1;
                    $customerId = Session::get("customerId");
                    $getOrderdProduct = $ct->getOrderedProduct($customerId);
                    if ($getOrderdProduct) {
                        while ($order = $getOrderdProduct->fetch_assoc()) { ?>

                            <tr>
                                <td><?php echo $x;
                                    $x++ ?></td>
                                <td><?php echo $order['productName'] ?></td>
                                <td><img src="admin/<?php echo $order['image'] ?>" alt="" height="80px" width="80px"></td>
                                <td><?php echo $order['quantity'] ?></td>
                                <td><?php echo $order['price'] ?></td>
                                <td><?php echo $fm->formatDate($order['date']); ?></td>
                                <td>
                                    <?php
                                    if ($order['status'] == 0) {
                                        echo "Pending";
                                    } else {
                                        echo "Shipped";
                                    }
                                    ?>
                                </td>
                                <td><a href="pdf.php?oid=<?php echo $order['id'] ?> " class="btn btn-primary">invoice</a></td>
                                <td>
                                    <?php
                                    if ($order['status'] == '1') { ?>
                                        <a href="?deleteOrder=<?php echo $order['id'] ?> " class="btn btn-danger">Remove</a>
                                    <?php } else {
                                        echo "No Actions";
                                    }
                                    ?>
                                </td>

                            </tr>
                </tbody>
        <?php }
                    } ?>
            </table>
        </div>
    </div>

</div>
<?php include "inc/footer.php"; ?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . "/../classes/customer.php");
?>
<?php
if (isset($_GET['customerId'])) {
    $customerId = $_GET['customerId'];
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Customer Profile</h2>
        <div class="block">


            <div class="userinfo">
                <?php
                $customer = new Customer();
                $customerInfo = $customer->getCustomerById($customerId);
                if ($customerInfo) {
                    $result = $customerInfo->fetch_assoc(); ?>
                    <div class="infotop">
                    </div>
                    <div class="additionalinfo">
                        <ul class="list-group ">
                            <li class="list-group-item">
                                Customer Name: <?php echo $result['name'] ?>
                            </li>
                            <li class="list-group-item">
                                Mail: <?php echo $result['email'] ?>
                            </li>
                            <li class="list-group-item">
                                Phone: <?php echo $result['phone'] ?>
                            </li>
                            <li class="list-group-item">
                                City: <?php echo $result['city'] ?>
                            </li>
                            <li class="list-group-item">
                                Country: <?php echo $result['country'] ?>
                            </li>
                            <li class="list-group-item">
                                Address: <?php echo $result['address'] ?>
                            </li>
                            <li class="list-group-item">
                                Zip-Code: <?php echo $result['zip'] ?>
                            </li>
                            <li class="list-group-item">
                                <a href="allorder.php?customerId=<?php echo $result['customerId'] ?>" class="btn btn-primary">Orders</a>
                            </li>
                        </ul>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php'; ?>
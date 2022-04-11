<?php include "inc/header.php"; ?>
<?php

if(isset($_GET['cmprid'])){
    $cmprid = $_GET['cmprid'];
}

?>
<div class="main">
    <div class="content">
        <div class="cartoption">
            <div class="cartpage">
                <h2>Compared Product</h2>
                <table class="tblone">
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                        
                    <tr>
                        <td><?php echo $compared['productName'] ?></td>
                        <td><?php echo $compared['price'] ?>$</td>
                        <td><img src="admin/<?php echo $compared['image'] ?>" alt="" /></td>
                        <td><a onclick="return confirm('আসলেই উধাও করবেন?')" href="?delcmpr=<?php echo $compared['cartId'] ?>">X</a></td>
                    </tr>
                </table>
            </div>
            <div class="shopping">
                <div class="shopleft">
                    <a href="index.php"> <img src="images/shop.png" alt="" /></a>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php include "inc/footer.php"; ?>
<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . "/../lib/session.php");
Session::init();
include_once($filepath . "/../lib/database.php");
include_once($filepath . "/../helpers/format.php");
spl_autoload_register(function ($class) {
    include_once "classes/" . $class . ".php";
});

$db = new Database();
$fm = new Format();
$pd = new Product();
$ct = new Cart();
$cat = new Category();
$brand = new brand();
$customer = new Customer();
?>
<!DOCTYPE HTML>

<head>
    <title>Store Website</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="admin/css/layout.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/menu.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
    <script src="js/jquerymain.js"></script>
    <script src="js/script.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/nav.js"></script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript" src="js/nav-hover.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
    <script type="text/javascript">
        $(document).ready(function($) {
            $('#dc_mega-menu-orange').dcMegaMenu({
                rowItems: '4',
                speed: 'fast',
                effect: 'fade'
            });
        });
    </script>
</head>
<body>
    <div class="wrap">
        <div class="header_top">
            <div class="logo-user">
                <a href="index.php"><img src="images/logo.png" alt="" /></a>
            </div>
            <div class="header_top_right">
                <div class="search_box">
                    <form>
                        <input type="text" value="Search for Products" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}"><input type="submit" value="SEARCH">
                    </form>
                </div>
                <div class="shopping_cart">
                    <div class="cart">
                        <a href="cart-user.php" title="View my shopping cart" rel="nofollow">
                            <span class="cart_title">Cart</span>
                            <span class="no_product"><?php
                                                        $checkCart = $ct->checkCartData();
                                                        if ($checkCart) {
                                                            $sum = Session::get("sum");
                                                            $qty = Session::get("qty");
                                                            echo "Qty- " . $qty . " : " . $sum . "$";
                                                        } else {
                                                            echo "(empty)";
                                                        }

                                                        ?></span>
                        </a>
                    </div>
                </div>
                <div class="login">
                    <?php
                    if (isset($_GET['cid'])) {
                        $clearCart = $ct->logoutAndClearCart();
                        Session::destroy();
                    }
                    ?>
                    <?php
                    $login = Session::get("customerLogin");
                    if ($login == false) { ?>
                        <a href="login.php">Login</a>
                    <?php } else { ?>
                        <a href="?cid=<?php echo Session::get("customerId") ?>">Logout</a>
                    <?php } ?>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="menu">
            <ul id="dc_mega-menu-orange" class="dc_mm-orange">

                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Products</a> </li>
                <li><a href="topbrands.php">Top Brands</a></li>
                <?php
                $cart = $ct->checkCartData();
                if (!empty($cart)) { ?>
                    <li><a href="cart-user.php">Cart</a></li>
                <?php } ?>
                <?php
                $profile = Session::get("customerLogin");
                if ($profile == true) { ?>
                    <li><a href="profile.php"><i class="fa fa-user-circle-o"> Profile</i></a></li>
                <?php  } ?>
                <li><a href="contact.php"><i class="fa fa-id-badge"> Contact</i></a></li>
                <div class="clear"></div>
            </ul>
        </div>
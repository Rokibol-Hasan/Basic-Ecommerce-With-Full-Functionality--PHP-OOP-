<div class="header_bottom">
    <div class="header_bottom_left">
        <h2>Latest Products</h2>
        <div class="section group">

            <?php
            $getApple = $pd->getLatestApple();
            if ($getApple) {
                while ($apple = $getApple->fetch_assoc()) { ?>

                    <div class="listview_1_of_2 images_1_of_2">
                        <div class="listimg listimg_2_of_1">
                            <a href="details.php?proId=<?php echo $apple['productId'] ?>"> <img src="admin/<?php echo $apple['image'] ?>" alt="" /></a>
                        </div>
                        <div class="text list_2_of_1">
                            <div class="inner-proinfo">
                                <h1><?php echo "Apple Product"; ?></h1>
                                <h2><?php echo $apple['productName'] ?></h2>
                                <p><?php echo $fm->textShorten($apple['body'], 70) ?></p>
                                <div class="button"><span><a href="details.php?proId=<?php echo $apple['productId'] ?>">Add to cart</a></span></div>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>


            <?php
            $getSamsung = $pd->getLatestSamsung();
            if ($getSamsung) {
                while ($samsung = $getSamsung->fetch_assoc()) { ?>
                    <div class="listview_1_of_2 images_1_of_2">
                        <div class="listimg listimg_2_of_1">
                            <a href="details.php?proId=<?php echo $samsung['productId'] ?>"><img src="admin/<?php echo $samsung['image'] ?>" alt="" /></a>
                        </div>
                        <div class="text list_2_of_1">
                            <h1><?php echo "Samsung Product"; ?></h1>
                            <h2><?php echo $samsung['productName'] ?></h2>
                            <p><?php echo $fm->textShorten($samsung['body'], 70) ?></p>
                            <div class="button"><span><a href="details.php?proId=<?php echo $samsung['productId'] ?>">Add to cart</a></span></div>
                        </div>
                    </div>
            <?php }
            } ?>



        </div>
        <div class="section group">
            <?php
            $getAcer = $pd->getLatestAcer();
            if ($getAcer) {
                while ($acer = $getAcer->fetch_assoc()) { ?>
                    <div class="listview_1_of_2 images_1_of_2">
                        <div class="listimg listimg_2_of_1">
                            <a href="details.php?proId=<?php echo $acer['productId'] ?>"> <img src="admin/<?php echo $acer['image'] ?>" alt="" /></a>
                        </div>
                        <div class="text list_2_of_1">
                            <h1><?php echo "Acer Product"; ?></h1>
                            <h2><?php echo $acer['productName'] ?></h2>
                            <p><?php echo $fm->textShorten($acer['body'], 70) ?></p>
                            <div class="button"><span><a href="details.php?proId=<?php echo $acer['productId'] ?>">Add to cart</a></span></div>
                        </div>
                    </div>
            <?php }
            } ?>


            <?php
            $getCanon = $pd->getLatestCanon();
            if ($getCanon) {
                while ($canon = $getCanon->fetch_assoc()) { ?>

                    <div class="listview_1_of_2 images_1_of_2">
                        <div class="listimg listimg_2_of_1">
                            <a href="details.php?proId=<?php echo $canon['productId'] ?>"><img src="admin/<?php echo $canon['image'] ?>" alt="" /></a>
                        </div>
                        <div class="text list_2_of_1">
                            <h1><?php echo "Canon Product"; ?></h1>
                            <h2><?php echo $canon['productName'] ?></h2>
                            <p><?php echo $fm->textShorten($canon['body'], 70) ?></p>
                            <div class="button"><span><a href="details.php?proId=<?php echo $canon['productId'] ?>">Add to cart</a></span></div>
                        </div>
                    </div>
            <?php }
            } ?>



        </div>
        <div class="clear"></div>
    </div>
    <div class="header_bottom_right_images">
        <!-- FlexSlider -->
        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    <li><img src="images/1.jpg" alt="" /></li>
                    <li><img src="images/2.jpg" alt="" /></li>
                    <li><img src="images/3.jpg" alt="" /></li>
                    <li><img src="images/4.jpg" alt="" /></li>
                </ul>
            </div>
        </section>
        <!-- FlexSlider -->
    </div>
    <div class="clear"></div>
</div>
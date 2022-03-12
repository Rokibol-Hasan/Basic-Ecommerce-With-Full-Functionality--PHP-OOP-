<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include "../lib/database.php";?>
<?php 

$db = new Database();


?>
<div class="grid_10">
  <div class="box round first grid">
    <h2> Dashbord</h2>
    <div class="block">
      <div class="main-section">
        <div class="dashbord email-content">
          <div class="title-section">
            <p>Total Admin And Authors</p>
          </div>
          <div class="icon-text-section">
            <div class="icon-section">
              <i class="fa fa-user-o" aria-hidden="true"></i>
            </div>
            <div class="text-section">
              <?php 
              $query = "SELECT adminId FROM tbl_admin ORDER BY adminId";
              $getAllAdmin = $db->select($query);
              $row = mysqli_num_rows($getAllAdmin);
              echo '<h1>'.$row.'</h1>';
              ?>
              <span>+7% email list penetration</span>
            </div>
            <div style="clear:both;"></div>
          </div>
          <div class="detail-section">
            <a href="#">
              <p>View Detail</p>
              <i class="fa fa-arrow-right" aria-hidden="true"></i>
            </a>
          </div>
        </div>
        <div class="dashbord download-content">
          <div class="title-section">
            <p>CLOUD DOWNLOAD</p>
          </div>
          <div class="icon-text-section">
            <div class="icon-section">
              <i class="fa fa-download" aria-hidden="true"></i>
            </div>
            <div class="text-section">
              <h1>8.25 <small>k</small></h1>
              <span>12% have started download</span>
            </div>
            <div style="clear:both;"></div>
          </div>
          <div class="detail-section">
            <a href="#">
              <p>View Detail</p>
              <i class="fa fa-arrow-right" aria-hidden="true"></i>
            </a>
          </div>
        </div>
        <div class="dashbord product-content">
          <div class="title-section">
            <p>SALES FROM YOUR CREDIT-CARD</p>
          </div>
          <div class="icon-text-section">
            <div class="icon-section">
              <i class="fa fa-credit-card" aria-hidden="true"></i>
            </div>
            <div class="text-section">
              <h1>360 <small>$</small></h1>
              <span>$ 272 credit in your account</span>
            </div>
            <div style="clear:both;"></div>
          </div>
          <div class="detail-section">
            <a href="#">
              <p>View Detail</p>
              <i class="fa fa-arrow-right" aria-hidden="true"></i>
            </a>
          </div>
        </div>
        <div class="dashbord email-content">
          <div class="title-section">
            <p>SENT EMAILS</p>
          </div>
          <div class="icon-text-section">
            <div class="icon-section">
              <i class="fa fa-envelope-o" aria-hidden="true"></i>
            </div>
            <div class="text-section">
              <h1>200</h1>
              <span>+7% email list penetration</span>
            </div>
            <div style="clear:both;"></div>
          </div>
          <div class="detail-section">
            <a href="#">
              <p>View Detail</p>
              <i class="fa fa-arrow-right" aria-hidden="true"></i>
            </a>
          </div>
        </div>
        <div class="dashbord download-content">
          <div class="title-section">
            <p>CLOUD DOWNLOAD</p>
          </div>
          <div class="icon-text-section">
            <div class="icon-section">
              <i class="fa fa-download" aria-hidden="true"></i>
            </div>
            <div class="text-section">
              <h1>8.25 <small>k</small></h1>
              <span>12% have started download</span>
            </div>
            <div style="clear:both;"></div>
          </div>
          <div class="detail-section">
            <a href="#">
              <p>View Detail</p>
              <i class="fa fa-arrow-right" aria-hidden="true"></i>
            </a>
          </div>
        </div>
        <div class="dashbord product-content">
          <div class="title-section">
            <p>SALES FROM YOUR CREDIT-CARD</p>
          </div>
          <div class="icon-text-section">
            <div class="icon-section">
              <i class="fa fa-credit-card" aria-hidden="true"></i>
            </div>
            <div class="text-section">
              <h1>360 <small>$</small></h1>
              <span>$ 272 credit in your account</span>
            </div>
            <div style="clear:both;"></div>
          </div>
          <div class="detail-section">
            <a href="#">
              <p>View Detail</p>
              <i class="fa fa-arrow-right" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'inc/footer.php'; ?>
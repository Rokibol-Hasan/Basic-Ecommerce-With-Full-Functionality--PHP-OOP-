<?php include "inc/header.php"; ?>

<?php

$login = Session::get("customerLogin");
if ($login == true) {
	header("Location:order.php");
}


?>
<div class="main">
	<div class="content">
		<div class="login_panel">
			<h3>Existing Customers</h3>
			<p>Sign in with the form below.</p>
			<form action="" method="post">
				<?php
				if (isset($_POST['login'])) {
					$customerLogin = $customer->customerLogin($_POST);
				}
				?>
				<?php
				if (isset($customerLogin)) {
					echo $customerLogin;
				}
				?>
				<input type="text" name="email" placeholder="Enter Your Email">
				<input type="password" name="pass" placeholder="Enter Your Password">
				<div class="buttons">
					<div>
						<button name="login" class="grey">Sign In</button>
					</div>
				</div>
			</form>

		</div>
		<?php

		if (isset($_POST['register'])) {
			$customerRegistration = $customer->customerRegistration($_POST);
		}


		?>
		<div class="register_account">
			<h3>Register New Account</h3>
			<form method="post" action="">
				<table>
					<?php
					if (isset($customerRegistration)) {
						echo $customerRegistration;
					}
					?>
					<tbody>
						<tr>
							<td>
								<div>
									<input type="text" name="name" placeholder="Name">
								</div>

								<div>
									<input type="text" name="city" placeholder="City">
								</div>

								<div>
									<input type="text" name="zip" placeholder="Zip-Code">
								</div>
								<div>
									<input type="text" name="email" placeholder="Mail">
								</div>
							</td>
							<td>
								<div>
									<input type="text" name="address" placeholder="Address">
								</div>
								<div>
									<input type="text" name="country" placeholder="Country">
								</div>

								<div>
									<input type="text" name="phone" placeholder="Phone Number">
								</div>
								<div>
									<input type="password" name="pass" placeholder="Password">
								</div>
							</td>
						</tr>
					</tbody>
				</table>
				<div>
					<button class="grey btn btn-primary mt-3" name="register">Create Account</button>
				</div>
			</form>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php include "inc/footer.php"; ?>
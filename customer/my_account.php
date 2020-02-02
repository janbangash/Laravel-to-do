	<?php 
	session_start();
	include ("includes/db.php"); 
	include ("functions/functions.php");

	?>
<!DOCTYPE html> 

	<!-- <?php include ("functions/function.php"); ?>  -->
<html>
<head>
	<title> My Online Shop</title>

	<link rel="stylesheet" type="text/css" href="styles/style.css" media="all ">
</head>
<body>
	
	<!--  Main Container Start -->

	<div class="main_wrapper">

		<!-- Header Start -->
		<div class="header_wrapper">
			<a href="../index.php"><img src="../images/shop_logo.gif" style="float: left;"></a>
			<img src="../images/1.png" style="float: right;">
		</div>
		<!-- Header End -->

		<!-- Navagation bar Start -->
		<div id="navbar">
			<ul id="menu">
				<li><a href="../index.php">Home</a></li>
				<li><a href="../all_products.php">All Products</a></li>
				<li><a href="my_account.php">My Account</a></li>
				<?php
					 if (isset($_SESSION['customer_email'])) {
					echo "<span style='display: none;'><li><a href='../customer_register.php'>Sign Up</a></li></span>";
					 } 

					 else{

					 	echo "<li><a href='../customer_register.php'>Sign Up</a></li>";
					 }

				?> 
				
				<li><a href="../cart.php">Shopping Cart</a></li>
				<li><a href="../contact.php">Contact Us</a></li>
			</ul>

			<div id="form">
				<form method="get" action="result.php" enctype="multipart/form-data">
					
					
					<input type="text" name="user_query" placeholder="Search a Product">
					<input type="submit" name="search" value="Search">
				</form>
			</div>

		</div>
		<!-- Navagation bar End -->
		
		<div class ="content_wrapper">
			<div class ="left_sidebar">
				<div id="sidebar_title">Manage Account:</div>
				<ul id="cats">

					<?php  
						
						$customer_session = $_SESSION['customer_email'];
						$get_customer_pic = "select * from customers where customer_email = '$customer_session'";
						$run_customer = mysqli_query($con, $get_customer_pic);

						$row_customer = mysqli_fetch_array($run_customer);
						$customer_pic = $row_customer['customer_image'];

						echo "<img src= 'customer_images/$customer_pic' width= '180' height='180'>";
					?>
					
					<li><a href="my_account.php?my_orders">My Orders</a></li>
					<li><a href="my_account.php?edit_account">Edit Account</a></li>
					<li><a href="my_account.php?change_pass">Change Password</a></li>
					<li><a href="my_account.php?delete_account">Delete Account</a></li>
					<li><a href="logout.php">Logout</a></li>
					
				</ul>
			</div>
			<div class ="right_content">
			<?php cart(); ?>
				<div id="headline">
					<div id="headline_content">
					<?php
						if (isset($_SESSION['customer_email'])) {
							
							echo "<b>Welcome:" . "</b> &nbsp;" . "<b style = 'color: yellow;'>" . $_SESSION['customer_email'] . "</b>";
						}
						
					?> &nbsp;
						<?php

							if (!isset($_SESSION['customer_email'])) {

							echo "<a href='checkout.php' style='color: #F93;'>Login</a>";
							}
							else {
								echo "<a href='logout.php' style='color: #F93;'>Logout</a>";
							}

						?>
						</span>
					</div>
				</div>

				<div>
					<h2 style="background-color: #000; color: #FC9; padding: 20px; text-align: center;border-top: 2px solid #fff;">Manage Your Account Here</h2>
					<?php 

						getDefault();

						if (isset($_GET['my_orders'])) {
							
							include("my_orders.php"); 
						}

						if (isset($_GET['edit_account'])) {
							
							include("edit_account.php"); 
						}

						if (isset($_GET['change_pass'])) {
							
							include("change_pass.php"); 
						}

						if (isset($_GET['delete_account'])) {
							
							include("delete_account.php"); 
						}





					?>

				</div>
			</div>
		</div>

		<div class="footer">
			<h1 style="color: #000; padding-top: 30px; text-align: center;">Copy right 2019 - By Iqrar Bangash</h1>
		</div>

	</div>
	<!--  Main Container End -->

</body>
</html>

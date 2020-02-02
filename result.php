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
			<a href="index.php"><img src="images/shop_logo.gif" style="float: left;"></a>
			<img src="images/1.png" style="float: right;">
		</div>
		<!-- Header End -->

		<!-- Navagation bar Start -->
		<div id="navbar">
			<ul id="menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="all_products.php">All Products</a></li>
				<li><a href="my_account.php">My Account</a></li>
				<li><a href="customer_register.php">Sign Up</a></li>
				<li><a href="cart.php">Shopping Cart</a></li>
				<li><a href="contact.php">Contact Us</a></li>
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
				<div id="sidebar_title">Categories</div>
				<ul id="cats">
				<?php getCats(); ?>
					
				</ul>

				<div id="sidebar_title">Brands</div>
				<ul id="cats">
					<?php getBrands(); ?>
				</ul>
			</div>
			<div class ="right_content">
				<div id="headline">
					<div id="headline_content">
					<?php
						if (!isset($_SESSION['customer_email'])) {
							
							echo "<b>Welcome Guest!</b> <b style='color: yellow;'>Shopping Cart: </b>";
						}
						else{
							echo "<b>Welcome: &nbsp;" . "<span style = 'color: skyblue;'>" . $_SESSION['customer_email'] . "</span>" . " &nbsp;</b>" . "<b style='color: yellow;'> Your Shopping Cart: </b>";
						}
						
					?>
						<span>- Total Items: <?php items(); ?> - Totla Price: <?php total_price();?> - <a href="cart.php" style="color: #FF0;">Go To Cart</a>&nbsp;
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

				<div id="products_box">
					<?php 

						if (isset($_GET['search'])) {
							
						$user_keyword = $_GET['user_query'];

						$get_products = "select * from products where product_keywords like '%$user_keyword%'";
						$run_products = mysqli_query ($con, $get_products);
						while ($row_products = mysqli_fetch_array($run_products)) {
							
							$pro_id = $row_products['product_id'];
							$pro_title = $row_products['product_title'];
							$pro_cat = $row_products['cat_id'];
							$pro_brand = $row_products['brand_id'];
							$pro_desc = $row_products['product_desc'];
							$pro_price = $row_products['product_price'];
							$pro_image = $row_products['product_img1'];

							echo "
								<div id = 'single_product'>

								<h3>$pro_title</h3>
								<a href='details.php?pro_id=$pro_id'><img src = 'admin_area/product_images/$pro_image' width = '180' height = '180'/></a> <br>

								<p><b>Price: $ $pro_price</b></p>

								<a href ='details.php?pro_id=$pro_id' style='float: left;'>Details</a>

								<a href='index.php?add_cart=$pro_id'><button style='float: right;'>Add To Cart</button></a>

								</div>

							";
						}

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

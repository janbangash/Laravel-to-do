<!DOCTYPE html>
<html>
<head>
	<title>Insert Category</title>

<style type="text/css">
	
	form{

		margin: 10%;
	}

</style>
</head>
<body>

	<form action="" method="post">
		
		<b>Insert New Category</b>
		<input type="text" name="cat_title">
		<input type="submit" name="insert_cat" value="Insert Category">
	</form>
	<?php 
		include("includes/db.php");

		if (isset($_POST['insert_cat'])) {
			$cat_title = $_POST['cat_title'];

			$insert_cat = "insert into categories (cat_title) value('$cat_title')";
			$run_cat = mysqli_query($con, $insert_cat);

			if ($run_cat) {
				echo "<script>alert('New Category has been inserted')</script>";
				echo "<script>window.open('index.php?view_cats','_self')</script>";
			}
		}

	 ?>


</body>
</html>
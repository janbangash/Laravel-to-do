
	<form method="post" action="">
		<table width="600" align="center">
			<tr align="center">
				<td><h2>Do you really want to Delete Your Account ?</h2></td>
			</tr>
			<tr align="center">
				<td>
					<input type="submit" name="yes" value="Yes, I Want To Delete">
					<input type="submit" name="no" value="No, I Do Not Want To Delete">
				</td>
				
			</tr>
		</table>
	</form>

	<?php 

	include("includes/db.php");
	$c = $_SESSION['customer_email'];

	if (isset($_POST['yes'])) {
		
		$delete_customer = "delete from customers where customer_email='$c'";
		$run_delete = mysqli_query($con, $delete_customer);

		if ($run_delete) {

			session_destroy();
			echo "<script>alert('Your account han been deleted, Good Bye !')</script>";
			echo "<script>window.open('../index.php','_self')</script>";
		}

		}

		if (isset($_POST['no'])) {
			echo "<script>window.open('my_account.php','_self')</script>";

	}


	 ?>
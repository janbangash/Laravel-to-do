	
	<form action="" method="post">
		<table width="500" align="center">
			<tr align="center">
				<td colspan="4"><h2>Change Your Password:</h2></td>
			</tr>
			<tr>
				<td align="right">Enter Your Password:</td>
				<td><input type="password" name="old_pass" required></td>
			</tr>
			<tr>
				<td align="right">Enter New Password:</td>
				<td><input type="password" name="new_pass" required></td>
			</tr>
			<tr>
				<td align="right">Enter New Password Again:</td>
				<td><input type="password" name="new_pass_again" required></td>
			</tr>
			<tr align="center">
				<td colspan="4"><input type="submit" name="change_pass" value="Change Password"></td>
			</tr>

		</table>
	</form>

	<?php 

	include("includes/db.php");

	$c = $_SESSION['customer_email'];

	if (isset($_POST['change_pass'])) {
		
		$old_pass = $_POST['old_pass'];
		$new_pass = $_POST['new_pass'];
		$new_pass_again =$_POST['new_pass_again'];

		$update_pass = "select * from customers where customer_pass = '$old_pass'";
		$run_pass = mysqli_query($con, $update_pass);
		$check_pass = mysqli_fetch_array($run_pass);

		if ($check_pass==0) {
			
			echo "<script>alert('Your Current Password is not valid, Try again')</script>";
			exit();
		}

		if ($new_pass!=$new_pass_again) {

			echo "<script>alert('New Password did not match, Try again')</script>";
			exit();
		}
		else{
			 $update_new_pass= "update customers set customer_pass = '$new_pass' where customer_email='$c'";
			 $run_update_pass = mysqli_query($con, $update_new_pass);

			 echo "<script>alert('Your Password has Successfuly Changed. Thanks!')</script>";
			// echo "<script>window.open('my_account.php','_self')</script>";

		}
	
	}

?>
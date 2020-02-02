<?php 
	session_start();
	include("includes/db.php");

	if (isset($_GET['order_id'])) {
		
		$order_id = $_GET['order_id'];
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>My Online Shop</title>
</head>
<body bgcolor="#000">
<form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post">
	<table width="500" align="center" border="2" bgcolor="#CCCCCC">
		<tr align="center">
			<td colspan="5"><h2>Please Confirm your Payment</h2></td>
		</tr>
		<tr>
			<td>Invoice No:</td>
			<td><input type="text" name="invoice_no"></td>
		</tr>
		<tr>
			<td>Amount Paid:</td>
			<td><input type="text" name="amount"></td>
		</tr>
		<tr>
			<td>Select Payment Mode:</td>
			<td>
				<select name="payment_method"> 
					<option>Select Payment</option>
					<option>Bank Transfer</option>
					<option>Easypaisa/UBL Omni</option>
					<option>Westren Union</option>
					<option>PayPal</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Transation/Refference ID:</td>
			<td><input type="text" name="tr"></td>
		</tr>
		<tr>
			<td>Easypaisa/UBL Omni Code:</td>
			<td><input type="text" name="code"></td>
		</tr>
		<tr>
			<td>Payment Date:</td>
			<td><input type="text" name="date"></td>
		</tr>
		<tr align="center">
			<td colspan="5"><input type="submit" name="confirm" value="Confirm Payment"></td>
		</tr>
	</table>
</form>
</body>
</html>
	<?php 

	if (isset($_POST['confirm'])) {
		
		$update_id = $_GET['update_id'];
		$invoice_no = $_POST['invoice_no'];
		$amount = $_POST['amount'];
		$payment_method = $_POST['payment_method'];
		$ref_no = $_POST['tr'];
		$code = $_POST['code'];
		$date = $_POST['date'];
		$complete = 'Complete';

		$update_order = "update customer_orders SET order_status='$complete' where order_id='$update_id'";

		$run_order = mysqli_query($con, $update_order);

		$insert_payment = "insert into payments (invoice_no, amount, payment_mode, ref_no, code, payment_date) value('$invoice_no','$amount','$payment_method','$ref_no','$code','$date')";

		$run_payment = mysqli_query($con, $insert_payment);

		if ($run_payment) {
			
			echo "<h2 style='text-align:center; color:white;'>Payment receved, Your Order will be complete with in 24 hours</h2>";
			echo "<script>window.open('my_account.php','_self')</script>";
		}


	}




	 ?>
<?php
include "DB_test.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$First_Name = $_POST['FirstName'];
	$Last_Name = $_POST['LastName'];
	$Num_Address = $_POST['staddress'];
	$City = $_POST['city'];
	$Zip_Code = $_POST['zipcode'];
	$Check_In = $_POST['checkIn'];
	$Check_Out = $_POST['checkOut'];
	$Phone_Number = $_POST['phone'];
	$Email_Address = $_POST['email'];
	$Payment_Method = $_POST['Payment'];
	$Card_Number = $_POST['cardNum'];
	$Request = $_POST['request'];
	$Room_Type = $_POST['roomType'];
	$Num_People = $_POST['numOfPeople'];

	if (!filter_var($Email_Address, FILTER_VALIDATE_EMAIL)) {
		echo "Invalid email format";
	}

	$numOfNights = (strtotime($Check_Out) - strtotime($Check_In)) / 86400;
	$roomPrice = match ($Room_Type) {
		"King" => 200,
		"Queen" => 150,
		"Suite" => 300,

	};

	// Calculate the Total Charge
	$TotalCharge = $roomPrice * $numOfNights * 1.07;

	// Truncate credit card number
	function getTruncatedCCNumber($Card_Number, $makingChar = '*')
	{
		return str_repeat($makingChar, strlen($Card_Number) - 7) . substr($Card_Number, -4);
	}
	$truncatedCC = getTruncatedCCNumber($Card_Number);


	$sql = "INSERT INTO reservetb 
	(FirstName, LastName, staddress, city, zipcode, phone, email, Payment, cardNum, request, roomType, checkIn, checkOut, numOfPeople, TotalCharge, nights)
	VALUES 
	('$First_Name', '$Last_Name', '$Num_Address', '$City', '$Zip_Code', '$Phone_Number', '$Email_Address', '$Payment_Method', '$Card_Number', '$Request', '$Room_Type', '$Check_In', '$Check_Out', '$Num_People', '$TotalCharge', 0)";

	if ($conn->query($sql) === TRUE) {

	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}
?>

<?php include 'view/header.php'; ?>

<div class="container">
	<h1>Thank You
		<?php echo htmlspecialchars($First_Name . ' ' . $Last_Name); ?> for your reservation
	</h1>
	<p>The following are the details you entered:</p>
	<table class="table table-striped">
		<tbody>
			<tr>
				<td><strong>Number & Address:</strong></td>
				<td><span>
						<?php echo htmlspecialchars($Num_Address); ?>
					</span></td>
			</tr>
			<tr>
				<td><strong>City:</strong></td>
				<td><span>
						<?php echo htmlspecialchars($City); ?>
					</span></td>
			</tr>
			<tr>
				<td><strong>Zip Code:</strong></td>
				<td><span>
						<?php echo htmlspecialchars($Zip_Code); ?>
					</span></td>
			</tr>
			<tr>
				<td><strong>Check-In Date:</strong></td>
				<td><span>
						<?php echo htmlspecialchars($Check_In); ?>
					</span></td>
			</tr>
			<tr>
				<td><strong>Check-Out Date:</strong></td>
				<td><span>
						<?php echo htmlspecialchars($Check_Out); ?>
					</span></td>
			</tr>
			<tr>
				<td><strong>Number of People:</strong></td>
				<td><span>
						<?php echo htmlspecialchars($Num_People); ?>
					</span></td>
			</tr>
			<tr>
				<td><strong>Number of Days:</strong></td>
				<td><span>
						<?php echo htmlspecialchars($numOfNights); ?>
					</span></td>
			</tr>
			<tr>
				<td><strong>Room Type:</strong></td>
				<td><span>
						<?php echo htmlspecialchars($Room_Type); ?>
					</span></td>
			</tr>
			<tr>
				<td><strong>Phone Number:</strong></td>
				<td><span>
						<?php echo htmlspecialchars($Phone_Number); ?>
					</span></td>
			</tr>
			<tr>
				<td><strong>Email Address:</strong></td>
				<td><span>
						<?php echo htmlspecialchars($Email_Adddress); ?>
					</span></td>
			</tr>
			<tr>
				<td><strong>Payment Method:</strong></td>
				<td><span>
						<?php echo htmlspecialchars($Payment_Method); ?>
					</span></td>
			</tr>
			<tr>
				<td><strong>Credit Card Number:</strong></td>
				<td><span>
						<?php echo htmlspecialchars($truncatedCC); ?>
					</span></td>
			</tr>
			<tr>
				<td><strong>Special Requests:</strong></td>
				<td><span>
						<?php echo htmlspecialchars($Request); ?>
					</span></td>
			</tr>
			<tr>
				<td><strong>Total:</strong></td>
				<td><span>
						<?php echo '$' . htmlspecialchars($TotalCharge); ?>
					</span></td>
			</tr>
		</tbody>
	</table>
	<p>If you want to register, <a
			href="display_reservation.php?email=<?php echo urlencode($Email_Address); ?>&name=<?php echo urlencode($First_Name . ' ' . $Last_Name); ?>">click
			here</a> to register and create a password.</p>

</div>

<?php include 'view/footer.php'; ?>
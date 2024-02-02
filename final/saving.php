<!----- display_reservation.php ----->


<!----- display_reservation.php ----->
<?php
include "DB_test.php";
#Insert Into database 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $First_Name = $_POST['FirstName'];
    $Last_Name = $_POST['LastName'];
    $Num_Address = $_POST['Address'];
    $City = $_POST['city'];
    $Zip_Code = $_POST['zipcode'];
    $Check_In = $_POST['checkIn'];
    $Check_Out = $_POST['checkOut'];
    $Phone_Number = $_POST['phone'];
    $Email_Adddress = $_POST['email'];
    $Payment_Method = $_POST['Payment'];
    $Card_Number = $_POST['cardNum'];
    $Request = $_POST['request'];
    $Room_Type = $_POST['roomType'];
    $Num_People = $_POST['numOfPeople'];


    $numOfNights = (strtotime($Check_Out) - strtotime($Check_In)) / 86400;

    $roomPrice = match ($Room_Type) {
        "King" => 200,
        "Queen" => 150,
        "Suite" => 300,
    };

    // calculate the Total Charge
    $TotalCharge = $roomPrice * $numOfNights * 1.07;

    // Credit Card ( display only 4 last digits)
    $truncatedCC = getTruncatedCCNumber($Card_Number);
    function getTruncatedCCNumber($Card_Number, $makingChar = '*')
    {
        return str_repeat($makingChar, strlen($Card_Number) - 7) . substr($Card_Number, -4);
    }


    # SQL query for Inserting the Form Data into the reserve table.
    $sql = "INSERT INTO `reservedb` 
	(`FirstName`, `LastName`, `Address`, `city`, `zipcode`, `checkIn`, `checkOut`, `phone`, `email`, `Payment`, `cardNum`, `request`, `roomType`, `Numofpeople`, 'TotalCharge', 'nights'
	) VALUES 
	(`$First_Name`, `$Last_Name`, `$Num_Address`, `$City`, `$Zip_Code`, `$Check_In`, `$Check_Out`, `$Phone_Number`, `$Email_Adddress`, `$Payment_Method`, `$Card_Number`, `$Request,$Room_Type`, `$Num_People`, '$TotalCharge, '$numOfNights')
	)";

    # Executing the Above SQL query.
    $query = mysqli_query($db_conn, $sql);

    # Checks that the query executed successfully
    if ($query) {
        echo "New data inserted successfully.";
    } else {
        echo "Failed to insert new data.";
    }
}


?>

<?php include 'view/header.php'; ?>
<!-- ******** End of Nav bar ******** -->
<div class="conatiner">
    <h1>Thank You
        <?php echo $First_Name['FirstName']; ?>
        <?php echo $Last_Name['LastName']; ?> for your reservation
    </h1>
    <p> The following are the information that you entered:</p>
    <table class="table table-striped">
        </thead>
        <tr>
            <td>
                <label>Number & Address:</label>
            </td>
            <td>
                <span>
                    <?php echo $Num_Address['Address']; ?>
                </span>
            </td>
        </tr>
        <tr>
            <td>
                <label>City:</label>
            </td>
            <td>
                <span>
                    <?php echo $City['city']; ?>
                </span>
            </td>
        </tr>
        <tr>
            <td>
                <label>Zip Code:</label>
            </td>
            <td>
                <span>
                    <?php echo $Zip_Code['zipcode']; ?>
                </span>
            </td>
        </tr>
        <tr>
            <td>
                <label>Check-In Date:</label>
            </td>
            <td>
                <span>
                    <?php echo $Check_In['checkIn']; ?>
                </span>
            </td>
        </tr>
        <tr>
            <td>
                <label>Check-Out Date:</label>
            </td>
            <td>
                <span>
                    <?php echo $Check_Out['checkOut']; ?>
                </span>
            </td>
        </tr>
        <tr>
            <td>
                <label>Number of People:</label>
            </td>
            <td>
                <span>
                    <?php echo $Num_People['Numofpeople']; ?>
                </span>
            </td>
        </tr>
        <tr>
            <td>
                <label>Number of Days:</label>
            </td>
            <td>
                <span>
                    <?php echo $numOfNights['nights']; ?>
                </span>
            </td>
        </tr>
        <tr>
            <td>
                <label>Room Type:</label>
            </td>
            <td>
                <span>
                    <?php echo $Room_Type['roomType']; ?>
                </span>
            </td>
        </tr>
        <tr>
            <td>
                <label>Phone Number:</label>
            </td>
            <td>
                <span>
                    <?php echo $Phone_Number['phone']; ?>
                </span>
            </td>
        </tr>
        <tr>
            <td>
                <label>Email Address:</label>
            </td>
            <td>
                <span>
                    <?php echo $Email_Adddress['email']; ?>
                </span>
            </td>
        </tr>
        <tr>
            <td>
                <label>Payment Method:</label>
            </td>
            <td>
                <span>
                    <?php echo $Payment_Method['Payment']; ?>
                </span>
            </td>
        </tr>
        <tr>
            <td>
                <label>Credit Card Number:</label>
            </td>
            <td>
                <span>
                    <?php echo $truncatedCC['cardNum']; ?>
                </span>
            </td>
        </tr>
        <tr>
            <td>
                <label>Special Requests:</label>
            </td>
            <td>
                <span>
                    <?php echo $Request['request']; ?>
                </span>
            </td>
        </tr>
        <tr>
            <td>
                <label>Total:</label>
            </td>
            <td>
                <span>
                    <?php echo '$' . $TotalCharge ['TotalCharge']; ?>
                </span>
            </td>
        </tr>
        <tr>
    </table>
    <?php include 'view/footer.php'; ?>






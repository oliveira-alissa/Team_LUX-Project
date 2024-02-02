<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin View</title>
    <style>
        /* CSS styles for the table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .highlight {
            background-color: yellow;
        }

        /* Add more CSS styles as needed */
    </style>
    <script>
        function highlightNames() {
            var searchText = document.getElementById('searchText').value.toLowerCase();
            var rows = document.querySelectorAll('tr');

            rows.forEach(function (row) {
                var cells = row.querySelectorAll('td[data-name]');
                var found = false;

                cells.forEach(function (cell) {
                    if (cell.getAttribute('data-name').toLowerCase().includes(searchText)) {
                        found = true;
                    }
                });

                if (found) {
                    row.classList.add('highlight');
                } else {
                    row.classList.remove('highlight');
                }
            });
        }
    </script>

</head>

<body>
    <p>Welcome, This is the Admin Home page.</p>
    <div>
        <label for="searchText">Search by Name: </label>
        <input type="text" id="searchText">
        <button onclick="highlightNames()">Search</button>
    </div>


</body>

</html>
<?php
include "DB_test.php";

// Fetch data from reservetb
$sql = "SELECT * FROM reservetb";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Display table header
    echo "<table border='1'>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>City</th>
            <th>ZipCode</th>
            <th>Check-In</th>
            <th>Check-Out</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Card Type</th>
            <th>Card Number</th>
            <th>Requests</th>
            <th>Room Type</th>
            <th>Number of People</th>
            <th>Number of Nights</th>
            <th>Total Charge</th>
            <th> Update </th>
            <th> Delete </th>
         
            

           
        </tr>";

    // Display data rows
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td data-name='" . htmlspecialchars($row['FirstName']) . "'>" . htmlspecialchars($row['FirstName']) . "</td>
            <td data-name='" . htmlspecialchars($row['LastName']) . "'>" . htmlspecialchars($row['LastName']) . "</td>
            <td>" . htmlspecialchars($row['staddress']) . "</td>
            <td>" . htmlspecialchars($row['City']) . "</td>
            <td>" . htmlspecialchars($row['zipcode']) . "</td>
            <td>" . htmlspecialchars($row['checkin']) . "</td>
            <td>" . htmlspecialchars($row['checkout']) . "</td>
            <td>" . htmlspecialchars($row['Phone']) . "</td>
            <td>" . htmlspecialchars($row['email']) . "</td>
            <td>" . htmlspecialchars($row['payment']) . "</td>
            <td>" . htmlspecialchars($row['cardnum']) . "</td>
            <td>" . htmlspecialchars($row['request']) . "</td>
            <td>" . htmlspecialchars($row['roomType']) . "</td>
            <td>" . htmlspecialchars($row['Numofpeople']) . "</td>
            <td>" . htmlspecialchars($row['nights']) . "</td>
            <td>" . htmlspecialchars($row['TotalCharge']) . "</td>
            <td><a href='Admin_Functions/update.php?id=" . $row['id'] . "'>Update</a></td>
            <td><a href='Admin_Functions/delete.php?id=" . $row['id'] . "'>Delete</a></td>
        </tr>";

    }

    // Close table tag
    echo "</table>";
} else {
    echo "No records found";
}

mysqli_close($conn); // Close the database connection
?>
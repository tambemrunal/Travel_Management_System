<?php
session_start();

// Database connection settings
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = "Mrunal@845"; // Replace with your database password
$dbname = "project"; // Replace with your database name

// Create a new MySQLi connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to get booking details and package name for all users
$query = "
    SELECT bookingtbl.packageId, packages.packageName, bookingtbl.fromDate, bookingtbl.toDate, bookingtbl.regDate,bookingtbl.email
    FROM bookingtbl
    JOIN packages ON bookingtbl.packageId = packages.packageId
";

// Prepare the statement
$stmt = $conn->prepare($query);

// Check if prepare() was successful
if (!$stmt) {
    die("Error preparing query (fetch booking history): " . $conn->error);
}

// Execute the query
$stmt->execute();
$stmt->bind_result($package_Id, $package_name, $from_date, $to_date, $booking_date,$email);

// Include admin navigation bar
include('loginnavbar.php');

// Start the table HTML
echo "<h2>All Booking Histories</h2>";

// Add the CSS styles directly into the HTML for simplicity
echo "<style>
    h2 {
        text-align: center;
        color: #333;
        font-family: 'Arial', sans-serif;
        margin-bottom: 20px;
    }

    .booking-history-table {
        width: 80%;
        margin: 0 auto;
        border-collapse: collapse;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        font-family: 'Arial', sans-serif;
        background-color: #f9f9f9;
    }

    .booking-history-table th {
        background-color: #ff5722;
        color: white;
        padding: 12px 15px;
        text-transform: uppercase;
        font-size: 14px;
    }

    .booking-history-table td {
        padding: 10px 15px;
        text-align: center;
        border-bottom: 1px solid #e0e0e0;
        color: #555;
    }

    .booking-history-table tr:hover {
        background-color: #f1f1f1;
    }

    .booking-history-table tr:nth-child(even) {
        background-color: #f5f5f5;
    }

    .booking-history-table td, .booking-history-table th {
        border: 1px solid #ddd;
    }

    .booking-history-table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
    }
</style>";

// Generate the table

echo "<table class='booking-history-table'>";
echo "<tr><th>Email</th><th>Package Id</th><th>Package Name</th><th>From Date</th><th>To Date</th><th>Booking Date</th></tr>";

// Fetch the data and display it in the table
while ($stmt->fetch()) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($email) . "</td>";
    echo "<td>" . htmlspecialchars($package_Id) . "</td>";
    echo "<td>" . htmlspecialchars($package_name) . "</td>";
    echo "<td>" . htmlspecialchars($from_date) . "</td>";
    echo "<td>" . htmlspecialchars($to_date) . "</td>";
    echo "<td>" . htmlspecialchars($booking_date) . "</td>";
    echo "</tr>";
}

echo "</table>"; // Close the table

// Close statement and connection
$stmt->close();
$conn->close();
?>

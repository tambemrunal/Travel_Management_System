<?php
session_start(); // Start the session to access session variables

// Database connection
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = "Mrunal@845"; // Replace with your database password
$dbname = "project"; // Replace with your database name

// Create a new MySQLi connection
$conn = new mysqli($servername, $username, $password, $dbname);

$alert="";
// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (!isset($_SESSION['user_email'])) {
    $alert= "User is not logged in.<br>";
} 

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    $alert=  "Form was not submitted using POST method.<br>";
} 

if (!isset($_GET['id'])) {
    $alert= "Package ID not provided.<br>";
} 


if (isset($_SESSION['user_email']) && $_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id'])) {
    // Proceed with booking
    $user_email = $_SESSION['user_email'];
    $start_date = $_POST['from-date']; // Get the start date from the form
    $end_date = $_POST['to-date']; // Get the end date from the form
    $current_date = date("Y-m-d"); // Get the current date (YYYY-MM-DD format)
    $PackageId = intval($_GET['id']); // Get PackageId from the URL

    $bookingDetails = [
        'user_email' => htmlspecialchars($user_email),
        'start_date' => htmlspecialchars($start_date),
        'end_date' => htmlspecialchars($end_date),
        'package_id' => $PackageId
    ];
    // // Debugging output to see what's happening
    // echo "User Email: " . htmlspecialchars($user_email) . "<br>";
    // echo "Start Date: " . htmlspecialchars($start_date) . "<br>";
    // echo "End Date: " . htmlspecialchars($end_date) . "<br>";
    // echo "Package ID: " . $PackageId . "<br>";

    // Prepare SQL query to insert the booking into the database
    $stmt = $conn->prepare("INSERT INTO bookingtbl (email, fromDate, toDate, regDate, packageId) VALUES (?, ?, ?, ?, ?)");

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error); // Error handling for statement preparation
    }

    // Bind parameters
    $stmt->bind_param("ssssi", $user_email, $start_date, $end_date, $current_date, $PackageId);

    // Execute the query
    if ($stmt->execute()) {
        $submission= "Booking successful!";
    } else {
        echo "Error: " . $stmt->error; // Display any error that occurs
    }

    $stmt->close(); // Close the prepared statement
} else {
    echo "Please log in to make a booking or check your form submission.";
}


// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5dc; /* Cream background */
        color: #333; /* Dark text color for better contrast */
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .card {
        background-color: #fffaf0; /* White cream card background */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        width: 300px;
        text-align: center;
    }

    h2 {
        color: #28a745; /* Green color for heading */
    }

    .info {
        margin: 10px 0;
    }

    .info-label {
        font-weight: bold;
    }

    .success-message {
        margin-top: 20px;
        font-size: 18px;
        color: #28a745; /* Green color for success message */
    }
</style>

</head>
<body>
        <?php
        if($alert ==""){
    echo "<div class='card'>
        <h2>Booking Confirmation</h2>
        <div class='info'>
            <span class='info-label'>User Email:</span>". $bookingDetails['user_email']."
        </div>
        <div class='info'>
            <span class='info-label'>Package ID:</span> ".$bookingDetails['package_id']."
        </div>
        <div class='info'>
            <span class='info-label'>Start Date:</span>". $bookingDetails['start_date']."
        </div>
        <div class='info'>
            <span class='info-label'>End Date:</span>". $bookingDetails['end_date']."
        </div>
        <div class='success-message'> $submission</div>
        <div class='success-message'><a href='packages.php'>back</a></div>
        
    </div>";
    }else{  
    echo "<div class='card'>
        <h2 style='color:red'>
        $alert
        </h2>
    </div>";
    }
        ?>
</body>
</html>


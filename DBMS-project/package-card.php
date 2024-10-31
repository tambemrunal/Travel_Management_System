<?php
session_start(); // Start the session

$servername = "localhost";
$username = "root";
$password = "Mrunal@845";
$dbname = "project";

// Create a connection using MySQLi
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if 'id' is set in the URL and sanitize it
if (isset($_GET['id'])) {
    $PackageId = intval($_GET['id']); // Get PackageId from the URL
} else {
    die("Package ID not provided.");
}

// SQL query to fetch data for the specific PackageId
$sql = "SELECT PackageId, PackageName, PackageType, PackageLocation, PackagePrice, PackageFetures, PackageImage, PackageDetails FROM packages WHERE PackageId = $PackageId";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Package</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #fdf4dc;  ;
    padding: 20px;
}

.package-card {
    background-color: #fff;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    overflow: hidden;
    width: 80%;
    margin: auto;
    margin-top:50px;
}

.package-image img {
    width: 300px; /* Ensure the image covers the width of the card */
    height: 300px; /* Maintain aspect ratio */
}

.package-content {
    padding-left: 30px;
}

.name-crosslogo h2 {
    font-size: 30px;
    font-weight:700;
    margin-bottom: 5px;
    margin-right: 80px;
    color: #333;
    
}
.name-crosslogo{
    position: relative; /* So the button can be positioned absolutely */
        display: flex; /* Allows elements to be aligned in a row */
        justify-content: space-between; /* Pushes content to sides */
        align-items: center; /* Vertically aligns the items */
        padding: 10px;
}


.package-content p {
    margin: 5px 0;
    /* color: #666; */
}
strong{
    color: #666;
}

.package-info p {
    font-size: 18px;
    
}

.package-dates {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
    font-size:20px;
}

.date-box {
    width: 30%;
}

.date-box label {
    display: block;
    font-size: 14px;
    margin-bottom: 5px;
    color: #666;
}

.date-box input {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.total-price {
    text-align: right;
}

.total-price p {
    margin-bottom: 5px;
    color: #666;
}

.total-price h3 {
    color: green;
    font-size: 22px;
}

.package-details {
    /* background-color: #f9f9f9; */
    padding: 10px 20px 10px 20px;
    border-top: 1px solid #e0e0e0; /* Add a border for separation */
}

.package-details h3 {
    font-size: 22px;
    margin-bottom: 10px;
}

.package-details p {
    color: grey;
    font-size: 18px;
    line-height: 1.6;
}


img {
    width: 700px; /* Responsive images */
    height: 500px; /* Maintain aspect ratio */
    margin: 20px 0 0 20px;
}
.type{
    color:red;
}
.location{
    color: blue;
}

.one {
    display: flex;
    margin: 20px; /* Added margin to create space around the card */
}

.book-now {
    text-align: center;
    margin: 30px 0; /* Margin for spacing */
}

.btn-book {
    background: linear-gradient(45deg, #ff5722, #ff9800);
    color: white;
    padding: 12px 30px;
    font-size: 16px;
    font-weight: bold;
    border-radius: 5px;
    border: none;
    text-transform: uppercase;
    cursor: pointer;
    text-decoration: none;
    transition: background 0.3s ease-in-out, transform 0.2s;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.btn-book:hover {
    background: linear-gradient(45deg, #ff9800, #ff5722);
    transform: scale(1.05);
}

.btn-book:active {
    transform: scale(0.98);
}

    </style>
</head>
<body>
<div class="package-card">
    <form action="booking.php?id=<?php echo $PackageId; ?>" method="POST" onsubmit="return handleFormSubmit();">
        <?php
        if ($result->num_rows > 0) {
            // Output data of the specific package
            while($row = $result->fetch_assoc()) {
                echo "<div class='one'>";
                echo "<div class='package-image'>";
                echo "<img src='" . $row["PackageImage"] . "' alt=''>";
                echo "</div>";
                echo "<div class='package-content'>";
                echo "<div class='name-crosslogo'>";
                echo "<h2>" . $row["PackageName"] . "</h2>";
                echo " <button type='button' class='btn-close ' onclick='openNewFile()' aria-label='Close' >"."</button>";
                echo "</div>";
                echo "<div class='package-info'>";
                echo "<p class='type'><strong>Package Type:</strong> " . $row["PackageType"] . "</p>";
                echo "<p class='location'><strong>Package Location:</strong> " . $row["PackageLocation"] . "</p>";
                echo "<p ><strong>Features:</strong> " . $row["PackageFetures"] . "</p>";
                echo "</div>";
                echo "<div class='package-dates'>";
                echo "<div class='date-box'>";
                echo "<label for='from-date'>From</label>";
                echo "<input type='date' id='from-date' name='from-date' required>";
                echo "</div>";
                echo "<div class='date-box'>";
                echo "<label for='to-date'>To</label>";
                echo "<input type='date' id='to-date' name='to-date' required>";
                echo "</div>";
                echo "<div class='total-price'>";
                echo "<p>Grand Total</p>";
                echo "<h3>Rs " . $row["PackagePrice"] . "</h3>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "<div class='package-details'>";
                echo "<h3>Package Details</h3>";
                echo "<p>" . $row["PackageDetails"] . "</p>";
                echo "</div>";
                echo "<div class='book-now'>";
                echo '<button class="btn-book" type="submit">Book Now</button>';
                echo "</div>";
            }
        } else {
            echo "No data found!";
        }
    ?>
</form>
</div>
<script>
function handleFormSubmit() {
    // Get form values
    var fromDate = document.querySelector('input[name="from-date"]').value;
    var toDate = document.querySelector('input[name="to-date"]').value;

    // Simple validation: Ensure dates are not empty
    if (fromDate === "" || toDate === "") {
        alert("Please fill in both the start and end dates.");
        return false; // Prevent the form submission
    }

    // Ensure the 'from' date is not after the 'to' date
    if (new Date(fromDate) > new Date(toDate)) {
        alert("The 'from' date cannot be later than the 'to' date.");
        return false; // Prevent the form submission
    }

    // If validation passes, allow the form to submit
    return true;
}
function openNewFile() {
            window.location.href = 'packages.php';  // Replace 'newfile.php' with the target PHP file
}
</script>

</body>
</html>

<?php
$conn->close();
?>

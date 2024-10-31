<?php
 // Start the session
 session_start();
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "Mrunal@845";
$dbname = "project";

//performing route protection
if (!isset($_SESSION['user_email'])) {
    header("Location:Login-page.php") ;// Get user email from session
    exit();
}


// Create a connection using MySQLi
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch data from a table (e.g., 'packages' table)
$sql = "SELECT PackageId, PackageName, PackageType, PackageLocation, PackagePrice, PackageFetures, PackageImage FROM packages";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* General Styles */
        body{
            background-color: #fdf4dc;  
        }
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 10px;
        }
        .container h1 {
            font-size: 50px;
        }
        /* Destination Cards */
        .destination-cards {
            /* padding: 50px 0; */
            text-align: center;
        }
        .cards-grid {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }
        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
            overflow: hidden;
            width: 300px;
            /* height: 600px; */
        }
        .card-img {
            width: 100%;
            height: 200px;
        }
        .card-content {
            padding: 20px;
        }
        .name{
            font-size:23px;
            color: blue;
        }
        .type{
            font-size:22px;
            color:red;
        }
        .location{
            font-size:20px;
            font-weight:700;
            color: black;
        }
        .desc{
            color:grey;
        }
        .cost{
            color:green;
            font-weight:700;
            font-size:20px;
        }
        .details-button {
            display: inline-block;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .details-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<?php
    // include 'admin-user.php';
    include 'loginnavbar.php';

        include 'main-navbar.php';
?>
<section class="destination-cards">
<div class="container">
    <h1>Explore Our Destinations</h1>
    <div class="cards-grid">
    <?php
    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<div class='card'>";
            echo "<img class='card-img' src='" . $row["PackageImage"] . "' alt=''>";
            echo "<div class='card-content'>";
            echo "<h2 class='name'>" . $row["PackageName"] . "</h2>";
            echo "<p class='type'> " . $row["PackageType"] . "</p>";
            echo "<p class='location'> " . $row["PackageLocation"] . "</p>";
            echo "<p class='desc'> " . $row["PackageFetures"] . "</p>";
            echo "<p class='cost'> " . $row["PackagePrice"] ." Rs" ."</p>";
            // Pass PackageId in the URL
            echo "<a href='package-card.php?id=" . $row["PackageId"] . "' class='details-button'>Details</a>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "No data found!";
    }
    ?>
    </div>
</div>
</section>
<?php
   include'small-footer.php';
?>
    
</body>
</html>

<?php
$conn->close();
$_SESSION
?>
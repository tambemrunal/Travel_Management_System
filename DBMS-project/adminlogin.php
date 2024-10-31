<?php
session_start();

// Database connection settings
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = "Mrunal@845"; // Replace with your database password
$dbname = "project"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Variable to assign error
$checks = "";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $user = $_POST['username'];
    $pass = $_POST['password'];
    
    // Check if username and password are entered
    if ($user && $pass) {
        // Prepare a statement to fetch username and password from the database
        $stmt = $conn->prepare("SELECT password FROM admin WHERE username = ?");
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($db_password);
            $stmt->fetch();

            // Directly compare the entered password with the database password (not recommended for production)
            if ($pass === $db_password) {
                $_SESSION['user_email'] = $user; // Set session if login is successful
                header("Location:admin-table.php");
                // Redirect to dashboard (uncomment below line if you want to redirect)
                // header("Location: admin_dashboard.php");
                exit();
            } else {
                $checks .= "Invalid password.";
            }
        } else {
            $checks .= "Username not found.";
        }

        $stmt->close();
    } else {
        $checks .= "Please enter username and password.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
    <title>Admin Sign In</title>
    <style>
        /* Add the same CSS styles here */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4; /* Light background color */
        }
        .container {
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #007BFF;
            outline: none;
        }
        .submit-button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .submit-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Admin Sign In</h2>
        <form action="adminlogin.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="submit-button">Sign In</button>
            <div style="text-align:center;"><?php echo $checks; ?></div>
        </form>
    </div>
</body>
</html>

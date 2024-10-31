<?php
session_start();


// Database connection settings
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = "Mrunal@845"; // Replace with your database password
$dbname = "project"; // Replace with your database name

// Create a new MySQLi connection
$conn = new mysqli($servername, $username, $password, $dbname);
$heading="Login";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $input_password = $_POST['password'];

    // Prepare a SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT password, name FROM usertbl  WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // Check if the email exists in the database
    if ($stmt->num_rows > 0) {
        // Bind the result (fetch the stored password and name)
        $stmt->bind_result($stored_password, $name);
        // $_SESSION['user_email'] = $email;
        $stmt->fetch();
        // $_SESSION['user_email'] = $email;
            // header("Location: usernavbar.php");
        // Compare the plain text password (no hashing)
        if ($input_password === $stored_password) {
            // Password matches, user is authenticated
            // echo "Welcome, $name! Sign in successful.";
            $_SESSION['user_email'] = $email;
            header("Location: usernavbar.php");
            exit();
           
        } else {
            $heading= "Invalid password. Please try again.";
        }
    } else {
        $heading= "No user found with that email.";
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .signin-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            color: #333;
        }
        .alert{
            color:red;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            color: #333;
            margin-bottom: 5px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .submit-button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .submit-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="signin-container">
        <?php 
            if($heading != "Login"){
                echo "<h2 class='alert'>$heading</h2>";
            }else{
                echo "<h2>$heading</h2>";
            }
        ?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <a href="recovery-password.php">Forgot password</a>
            <button type="submit" class="submit-button">Sign In</button>
            <a href="signin-page.php">SignUp</a>
        </form>
    </div>

</body>
</html>

<?php

// Database connection
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = "Mrunal@845"; // Replace with your database password
$dbname = "project"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
  
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $new_password = $_POST['new-password'];
    $confirm_password = $_POST['confirm-password'];

    // Check if new password and confirm password match
    if ($new_password === $confirm_password) {
        // SQL to check if email and mobile number match a user
        $stmt = $conn->prepare("SELECT id FROM usertbl WHERE email = ? AND mobileno = ?");
        
        // Error handling for prepare()
        if ($stmt === false) {
            die("MySQL prepare statement failed: " . $conn->error);
        }

        $stmt->bind_param("ss", $email, $mobile);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // User exists, update the password
            $stmt->bind_result($user_id);
            $stmt->fetch();

            // Update the password for this user (no hashing for simplicity)
            $stmt = $conn->prepare("UPDATE usertbl SET password = ? WHERE id = ?");
            
            // Error handling for prepare()
            if ($stmt === false) {
                die("MySQL prepare statement failed: " . $conn->error);
            }

            $stmt->bind_param("si", $new_password, $user_id);

            if ($stmt->execute()) {
                echo "Password updated successfully!";
                // You can redirect the user here, e.g.
                // header("Location: success.php");
                // exit();
            } else {
                echo "Error updating password.";
            }
        } else {
            echo "No user found with that email and mobile number.";
        }

        $stmt->close();
    } else {
        echo "Passwords do not match!";
    }
}

$conn->close();
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Recovery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .recovery-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
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
        input[type="text"],
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
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .submit-button:hover {
            background-color: #218838;
        }

        .form-group span {
            color: red;
            font-size: 12px;
        }
    </style>
</head>
<body>

    <div class="recovery-container">
        <h2>Password Recovery</h2>
        <form id="password-recovery-form" method="POST" action="usernavbar.php">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile Number</label>
                <input type="text" id="mobile" name="mobile" placeholder="Enter your mobile number" required>
            </div>
            <div class="form-group">
                <label for="new-password">New Password</label>
                <input type="password" id="new-password" name="new-password" placeholder="Enter new password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm new password" required>
            </div>
            <button type="submit" class="submit-button">Submit</button>
        </form>
        <a href="Login-page.php">Login</a>
    </div>

</body>
</html>

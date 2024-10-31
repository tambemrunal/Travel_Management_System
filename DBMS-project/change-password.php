<?php
session_start();
$servername = "localhost"; // your server name
$username = "root"; // your database username
$password = "Mrunal@845"; // your database password
$dbname = "project"; // your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

 if($conn){
    echo "";
 }
 $alert="";
// Get the current logged-in user's email (from session)
$user_email = $_SESSION['user_email'];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $alert="";
    // Get the form inputs
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Fetch the user's current plain password from the database
    $stmt = $conn->prepare("SELECT password FROM usertbl WHERE email = ?");
    $stmt->bind_param("s", $user_email);
    $stmt->execute();
    $stmt->bind_result($current_plain_password);
    $stmt->fetch();
    $stmt->close();

    // Verify the current password (plain text comparison)
    if ($current_password !== $current_plain_password) {
        $alert.= " Current password is incorrect.";
        
    }

    // Validate the new password
    if ($new_password !== $confirm_password) {
        $alert.= " New password and confirm password do not match.";
      
        
    }

    // if (strlen($new_password) < 8) {
    //     echo "New password must be at least 8 characters long.";
    //     exit;
    // }

    // Update the password in the database
    $stmt = $conn->prepare("UPDATE usertbl SET password = ? WHERE email = ?");
    $stmt->bind_param("ss", $new_password, $user_email);

    if ($stmt->execute()) {
   
        // header("Location:Login-page.php");
        // exit();
    } else {
        $alert.= "Error updating password.";
    }
    if($alert ==""){
        header("Location:Login-page.php");
    }

    $stmt->close();
    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .change-password-form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .change-password-form h2 {
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-group input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            border: none;
        }
        .form-group input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <div class="change-password-form">
        <?php if($alert== ""){
            echo "<h2>Change Password</h2>";
        }else{
            echo "<h2 style='color:red'>".$alert."</h2>";
        }
        
        ?>
        <form id="changePasswordForm" action="change-password.php" method="POST">
            <div class="form-group">
                <label for="current_password">Current Password</label>
                <input type="password" id="current_password" name="current_password" required>
            </div>
            <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="password" id="new_password" name="new_password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm New Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
                <span id="error_message" class="error"></span>
            </div>
            <div class="form-group">
                <input type="submit" value="Change Password">
            </div>
        </form>
    </div>

    <!-- <script>
        document.getElementById('changePasswordForm').addEventListener('submit', function(event) {
            var newPassword = document.getElementById('new_password').value;
            var confirmPassword = document.getElementById('confirm_password').value;
            var errorMessage = document.getElementById('error_message');

            if (newPassword !== confirmPassword) {
                event.preventDefault();
                errorMessage.textContent = "New password and confirm password do not match.";
            } else {
                errorMessage.textContent = "";
            }
        });
    </script> -->

</body>
</html>

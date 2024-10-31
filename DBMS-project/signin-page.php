<?php
   // Database connection settings
   $servername = "localhost"; // Replace with your server name
   $username = "root";        // Replace with your database username
   $password = "Mrunal@845";            // Replace with your database password
   $dbname = "project";       // Replace with your database name
   
   // Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);
   
   // Check connection
   // if ($conn) {
   //     echo "connected successfully";
   // }
   
   $heading = "SignUp"; // Default heading
   
   // Check if the form is submitted
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       // Get the form data
       $name = $conn->real_escape_string($_POST['name']);
       $email = $conn->real_escape_string($_POST['email']);
       $phoneno = $conn->real_escape_string($_POST['mobile']);
       $password = $conn->real_escape_string($_POST['password']);
   
       // Insert data into the database
       $sql = "INSERT INTO usertbl (name, email, mobileno, password) VALUES ('$name', '$email', '$phoneno', '$password')";
   
       if ($conn->query($sql) === TRUE) {
           header("Location: Login-page.php"); // Redirect to index page
           exit(); // Important to stop further script execution
       } else {
           $heading = "Error: " . $sql . "<br>" . $conn->error; // Display SQL error
       }
   }
   
   // Close the connection
   $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp Page</title>
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

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 350px;
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
            color: #333;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
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
    </style>
</head>
<body>

    <div class="login-container">
        <h2><?php echo $heading; ?></h2>
        <form action="signin-page.php" method="POST"> <!-- Self-submitting form -->
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile Number</label>
                <input type="tel" id="mobile" name="mobile" placeholder="Enter your mobile number" minlength="10" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            
            <button type="submit" class="submit-button">SignUp</button>
            <a href="Login-page.php">Login</a>
        </form>
    </div>

</body>
</html>

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_email'])) {

    echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
    <title>Travel Website Navbar</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4; /* Light background color */
        }

        .navbar {
            background-color: #333; 
            margin: 0;
            padding: 0; /* Set padding to zero */
        }

        .navbar-container {
            display: flex;
            justify-content: space-between;
            align-items: center; 
            margin-left: 2rem; /* Reduced horizontal padding */
           /* Reduced height */
        }
        ul{
            margin:0;
            padding:0;
        }
        .navbar-menu {
            list-style: none; 
            padding: 0; 
            margin: 0; 
            display: flex; 
        }

        .navbar-item {
            color: #fff; /* White color for menu items */
            text-decoration: none; /* Remove underline from links */
            padding: 5px 7.5px; /* Reduced padding for clickable area */
            font-size: 0.9em; /* Smaller font size */
            transition: background-color 0.3s, transform 0.3s; /* Smooth transition for hover effect */
            border-radius: 5px; /* Rounded corners */
        }

        .navbar-item:hover {
            background-color: #555; /* Darken background on hover */
            color: pink;
            transform: translateY(-1px); /* Slight lift effect on hover */
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .navbar-container {
                flex-direction: column; /* Stack items vertically on small screens */
                align-items: flex-start; /* Align items to the start */
            }

            .navbar-menu {
                flex-direction: column; /* Stack menu items vertically */
                width: 100%; /* Full width for the menu */
            }

            .navbar-item {
                padding-left: 8px;
                padding-right: 8px;
                width: 100%; /* Full width for clickable area */
                text-align: center; /* Center text in mobile view */
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container">
            <ul class="navbar-menu">
                <li><a href="adminlogin.php" class="navbar-item">Admin Login</a></li>
                <li><a href="signin-page.php" class="navbar-item">Sign UP</a></li>
                <li><a href="Login-page.php" class="navbar-item">Login In</a></li>
            </ul>
        </div>
    </nav>
</body>
</html>
';
}else{
    echo
'<nav style="background-color: #007bff; padding: 10px;">
    <div style="display: flex; justify-content: space-between; align-items: center; color: white;">

        <!-- Left Side of Navbar -->
        <div style="display: flex; align-items: center; ">
            <!-- Home Icon -->
            <a href="usernavbar.php">
            <img src="images/home.png"   alt="Home" style="width: 24px; height: 24px; vertical-align: middle; margin-right: 20px">
            <!-- <a href="usernavbar.php" style="color: white; text-decoration: none; margin-right: 20px;">
            </a>
                Home
            </a> -->

            <!-- Change Password -->
            <a href="change-password.php" style="color: white; text-decoration: none; margin-right: 20px;">
                Change Password
            </a>

            <!-- My Tour History -->
            <a href="tour-history.php" style="color: white; text-decoration: none;">
                My Tour History
            </a>
        </div>

        <!-- Right Side of Navbar -->
        <div style="display: flex; align-items: center;">
            <!-- Welcome User -->
            <!-- <span style="color:"white";margin-right: 20px;">Welcome: </span> -->
            <p>Welcome: <span style="color:"white"">'.$_SESSION['user_email'].'</span></p>
            <!-- Logout Button -->
            <form  method="POST" action="usernavbar.php">
                <button style="background-color: white; color: #007bff; padding: 8px 15px; text-decoration: none; border-radius: 5px;" type="submit" name="submit_button"> Logout</button>
            </form>
           
        </div>
    </div>
</nav>';
}
?>
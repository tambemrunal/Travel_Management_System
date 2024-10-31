<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_email'])) {
    header("Location:Login-page.php") ;// Get user email from session
    
}
if (isset($_POST['submit_button'])) {
    // Handle the click event here
    unset($_SESSION['user_email']);
    header("Location:index.php") ;
    exit();
}
// echo $user_email;
//  else {
//     // Redirect to login page if not logged in
//     // 
//     echo "user login failed";
//     // header("Location: login.php");
//     exit();
// }
?> 




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
    <style>
    nav {
        background-color: #007bff; /* Primary blue color */
        padding: 10px;
    }

    nav a {
        color: white;
        text-decoration: none;
        margin-right: 20px;
    }

    nav a:hover {
        color: #ddd;
    }

    nav span {
        margin-right: 20px;
        color: white;
    }

    nav .logout-btn {
        background-color: white;
        color: #007bff;
        padding: 8px 15px;
        text-decoration: none;
        border-radius: 5px;
    }

    nav .logout-btn:hover {
        background-color: #ddd;
    }
    .context{
        background-image: url('images/pexels-ajay-donga-1113836-2174656.jpg');
        background-size: cover; background-position: center;
        height: 90vh;
        width: 100%;
    }
    footer {
                text-align: center;
                padding: 20px;
                background-color: #333;
                color: white;
                position: relative;
                bottom: 0;
                width: 100%;
            }

            /* second navbar */
            /* General Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
  
}

button {
    text-decoration: none;
    color: #fff;
}

/* Navbar Styles */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background-color: #333;
}
.context{
    background-image: url('images/bg-img.jpg');
    background-size: cover; background-position: center;
    height: 90vh;
    width: 100%;
}

.logo a {
    font-size: 1.8em;
    color: #fff;
}

.nav-links {
    display: flex;
    list-style: none;
    gap: 20px;
}

.nav-links li a {
    font-size: 1.2em;
    padding: 10px 20px;
    transition: background-color 0.3s;
}

.nav-links li a:hover {
    background-color: #555;
    border-radius: 5px;
}

/* Burger Menu for Mobile */
.burger {
    display: none;
    cursor: pointer;
}

.burger div {
    width: 25px;
    height: 3px;
    background-color: #fff;
    margin: 5px;
    transition: all 0.3s ease;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .nav-links {
        position: absolute;
        right: 0px;
        height: 100vh;
        top: 0px;
        background-color: #333;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 50%;
        transform: translateX(100%);
        transition: transform 0.5s ease-in;
    }

    .nav-links li {
        opacity: 0;
    }

    .burger {
        display: block;
    }

    .nav-active {
        transform: translateX(0);
    }

    .nav-active li {
        opacity: 1;
        transition: opacity 0.5s ease-in;
    }

    .burger.toggle .line1 {
        transform: rotate(-45deg) translate(-5px, 6px);
    }

    .burger.toggle .line2 {
        opacity: 0;
    }

    .burger.toggle .line3 {
        transform: rotate(45deg) translate(-5px, -6px);
    }
}

</style>
</head> 
<body>
    
<?php
    
    include('loginnavbar.php');
?>
<header>

        <nav class="navbar">
            <div class="logo">
                <a href="loginnavbar.php">Travel Explorer</a>
            </div>
            <ul class="nav-links">
               
                <li><a href="about.php">About</a></li>
                <li><a href="packages.php">Tour Packages</a></li>
                <li><a href="terms&condition.php">Terms & Conditions</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
                <li><a href="enquiry.php">Enquiry</a></li>
            </ul>
            <div class="burger">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        </nav>
    </header>
<div class="context">

</div>

<?php
// include('packages.php')
?>
<footer>
        <p>&copy; 2024 Travel Explorer. All Rights Reserved.</p>
</footer>
</body>
</html>



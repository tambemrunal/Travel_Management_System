

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Explorer</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        include 'loginnavbar.php';
        include 'main-navbar.php';
    ?>
    
    <!-- <header>

        <nav class="navbar">
            <div class="logo">
                <a href="#">Travel Explorer</a>
            </div>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
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
    </header> -->
    <div class="context">

    </div>
    <?php
        include 'footer.php';
    ?>

    <script >
        const burger = document.querySelector('.burger');
        const nav = document.querySelector('.nav-links');
        const navLinks = document.querySelectorAll('.nav-links li');

        // Toggle the navbar on click
        burger.addEventListener('click', () => {
            nav.classList.toggle('nav-active');
            burger.classList.toggle('toggle');
            
            // Animate links
            navLinks.forEach((link, index) => {
                if (link.style.animation) {
                    link.style.animation = '';
                } else {
                    link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.3}s`;
                }
            });
        });

    </script>
</body>
</html>

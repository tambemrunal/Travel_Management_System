<header>

<nav class="navbar">
    <div class="logo">
        <a href="usernavbar.php">Travel Explorer</a>
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
                    link.style.animation = navLinkFade 0.5s ease forwards ${index / 7 + 0.3}s;
                }
            });
        });

</script>

<style>
 a {
    text-decoration: none;
    color: #fff;
}

/* Navbar Styles */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0; /* Set padding to zero */
    margin: 0; /* Set margin to zero */
    background-color: #333;
    height: 60px; /* You can adjust the height as needed */
}

.logo a {
    font-size: 1.8em;
    color: #ffffff;
}

.nav-links {
    display: flex;
    list-style: none;
    gap: 20px;
    margin: 0; /* Remove default margin */
}

.nav-links li a {
    font-size: 1.2em;
    padding: 10px 20px;
    transition: background-color 0.3s;
}

.nav-links li a:hover {
    background-color: #555;
    color: pink;
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
        right: 0;
        height: 100vh;
        top: 0;
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
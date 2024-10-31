

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>/* General Styles */
body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    line-height: 1.6;
    background-color: #fdf4dc;  
   
}

.container {
    max-width: 1200px;
    margin: auto;
    padding: 20px;
   
}

/* About Us Section */
.about-us {
    padding: 50px 0;
    /* background-color: #f9f9f9; */
    text-align: center;
}

.about-us h1 {
    font-size: 3.5em;
    margin-bottom: 20px;
    font-weight: 700;
}

.about-us p {
    font-size: 1.2em;
    max-width: 800px;
    margin: auto;
    color: grey;
}

/* Mission Section */
.mission {
    padding: 50px 0;
    /* background-color: #fff; */
    text-align: center;
}

.mission h2 {
    font-size: 3em;
    margin-bottom: 20px;
    font-weight: 700;
}

.mission p {
    font-size: 1.1em;
    max-width: 800px;
    margin: auto;
    padding-bottom: 20px;
    color: grey;
}

/* Services Section */
.services {
    padding: 50px 0;
    /* background-color: #f9f9f9; */
    text-align: center;
}

.services h2 {
    font-size: 3em;
    margin-bottom: 40px;
    font-weight: 700;
}

.services-grid {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
}

.service {
    width: 45%;
    margin-bottom: 20px;
}

.service h3 {
    font-size: 1.5em;
    margin-bottom: 10px;
}

.service p {
    font-size: 1em;
}

/* Team Section */
.team {
    padding: 50px 0;
    /* background-color: #fff; */
    text-align: center;
}

.team h2 {
    font-size: 2em;
    margin-bottom: 40px;
}

.team-grid {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
}

.team-member {
    width: 30%;
    text-align: center;
    margin-bottom: 20px;
}

.team-member img {
    width: 100%;
    border-radius: 50%;
    max-width: 150px;
    margin-bottom: 15px;
}

.team-member h3 {
    font-size: 1.3em;
    margin-bottom: 5px;
}

.team-member p {
    font-size: 1em;
    color: grey;
}


</style>

</head>
<body>
    
<?php
        include 'loginnavbar.php';
?>

<?php
        include 'main-navbar.php';
?>

    <section class="about-us">
        <div class="container shadow-lg p-3 mb-5 bg-body rounded">
            <h1>About Travel Explorer</h1>
            <p>Welcome to Travel Explorer, your trusted partner in discovering the world's most amazing travel destinations. Whether you're seeking thrilling adventures, peaceful retreats, or cultural immersions, we're here to guide you on your journey. With our years of experience and passion for travel, we provide tailored travel experiences for adventurers, families, and explorers alike.</p>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="mission ">
        <div class="container shadow-lg p-3 mb-5 bg-body rounded">
            <h2>Our Mission</h2>
            <p>At Travel Explorer, our mission is to make the world more accessible. We believe in the transformative power of travel and aim to help people experience the joy of discovering new places. Our dedicated team works tirelessly to ensure your travels are unforgettable, safe, and personalized.</p>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services">
        <div class="container shadow-lg p-3 mb-5 bg-body rounded ">
            <h2>What We Offer</h2>
            <div class="services-grid">
                <div class="service shadow-sm p-3 mb-5 bg-body rounded border border-2 ">
                    <h3>Custom Tours</h3>
                    <p>Our custom tour packages are designed to give you the flexibility to explore destinations at your own pace. Choose from a variety of themes, including adventure, culture, or relaxation.</p>
                </div>
                <div class="service shadow-sm p-3 mb-5 bg-body rounded border border-2">
                    <h3>Flight Bookings</h3>
                    <p>We take the hassle out of finding flights. With access to exclusive deals, we provide seamless flight booking services to get you to your dream destination.</p>
                </div>
                <div class="service shadow-sm p-3 mb-5 bg-body rounded border border-2">
                    <h3>Hotel Reservations</h3>
                    <p>Whether you need budget-friendly stays or luxury resorts, we offer a wide range of accommodation options, ensuring you always have the perfect place to rest after a day of exploring.</p>
                </div>
                <div class="service shadow-sm p-3 mb-5 bg-body rounded border border-2">
                    <h3>Travel Insurance</h3>
                    <p>We prioritize your safety by offering travel insurance options that provide comprehensive coverage for your trip, giving you peace of mind on your journey.</p>
                </div>
            </div>
        </div>
    </section>
   <?php
   include'small-footer.php';
   ?>

    
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contactUs</title>
    <style>

         body{
            background-color: #fdf4dc;  
        }
        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 5px 20px ;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: black;
            font-size: 33px;
            font-weight:800;
        }
        h2 {
            color: #ff5349;
            margin-top: 30px;
        }
        p {
            line-height: 1.8;
            margin: 10px 0;
        }
        .email {
            padding: 10px;
            color: blue;
            text-decoration: underline;
        }
        .footer-col {
        flex: 1;
        min-width: 250px;
        margin-bottom: 20px;
    }

    

    .footer-col p,
    .footer-col ul,
    .footer-col ul li {
        font-size: 1em;
        margin-bottom: 10px;
        line-height: 1.6;
    }

    .footer-col ul {
        list-style-type: none;
        padding: 0;
    }

    .footer-col ul li a {
        color: #fff;
        text-decoration: none;
        transition: color 0.3s;
    }

    .footer-col ul li a:hover {
        color: #ff7f50;
    }
    
    .social-links svg{
      margin:0px 5px;
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
<section class="contact-us">
            <div class="container">
                <h1>Contact Us</h1>
               
                <div class="contact-info">
                    <h2>Get in Touch</h2>
                    <p>If you have any questions or need assistance, feel free to reach out!</p>
                    <p>Email: <a href="mailto:info@travelexplorer.com" class="email">info@travelexplorer.com</a></p>
                    <p>Phone: +91 1834786540</p>
                    <div class="footer-col">
                        <h3>Address</h3>
                            <ul>
                            <li>Swamini Building ,Near Post Office</li>
                            <li>SB Road, Dhule .</li>
                            <li>Tal - Dhule , Dist- Nashik , State- Maharashtra</li>
                            </ul>
                    </div>
                    <div class="social-links">
                        <h3 class="follow">Follow Us</h3>
                      
                        <svg width="30px" height="30px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="#000000" d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z"/>
                        </svg>


                        <svg width="30px" height="30px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                           <path fill="#000000" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                        </svg>
                        <svg width="30px" height="30px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="#000000" d="M459.4 151.7c.3 4.5 .3 9.1 .3 13.6 0 138.7-105.6 298.6-298.6 298.6-59.5 0-114.7-17.2-161.1-47.1 8.4 1 16.6 1.3 25.3 1.3 49.1 0 94.2-16.6 130.3-44.8-46.1-1-84.8-31.2-98.1-72.8 6.5 1 13 1.6 19.8 1.6 9.4 0 18.8-1.3 27.6-3.6-48.1-9.7-84.1-52-84.1-103v-1.3c14 7.8 30.2 12.7 47.4 13.3-28.3-18.8-46.8-51-46.8-87.4 0-19.5 5.2-37.4 14.3-53 51.7 63.7 129.3 105.3 216.4 109.8-1.6-7.8-2.6-15.9-2.6-24 0-57.8 46.8-104.9 104.9-104.9 30.2 0 57.5 12.7 76.7 33.1 23.7-4.5 46.5-13.3 66.6-25.3-7.8 24.4-24.4 44.8-46.1 57.8 21.1-2.3 41.6-8.1 60.4-16.2-14.3 20.8-32.2 39.3-52.6 54.3z"/>
                        </svg>

                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php
   include'small-footer.php';
   ?>

</body>
</html>
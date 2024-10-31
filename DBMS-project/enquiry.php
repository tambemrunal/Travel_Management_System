
   <?php
   // Database connection settings
   $servername = "localhost"; // Replace with your server name
   $username = "root";        // Replace with your database username
   $password = "Mrunal@845";            // Replace with your database password
   $dbname = "project";     // Replace with your database name
   
   // Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);
   
   // Check connection
//    if ($conn) {
//        echo "connected successfully";
//    }
   
   // Check if the form is submitted
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       // Get the form data
       $name = $conn->real_escape_string($_POST['name']);
       $email = $conn->real_escape_string($_POST['email']);
       $phoneno = $conn->real_escape_string($_POST['phoneno']);
       $subject = $conn->real_escape_string($_POST['subject']);
       $message = $conn->real_escape_string($_POST['message']);
   
       // Insert data into the database
       $sql = "INSERT INTO enquiry (name, email,phoneno, subject, message) VALUES ('$name', '$email','$phoneno', '$subject', '$message')";
   
       if ($conn->query($sql) === TRUE) {
           echo "Enquiry submitted successfully!";
       } else {
           echo "Error: " . $sql . "<br>" . $conn->error;
       }
   }
   
   // Close the connection
   $conn->close();
// echo "PHP is working!";
?>
   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <style>
        /* Styles for Enquiry Form */
        body{
            background-color: #fdf4dc;  
        }
       
        .container {
            max-width: 600px;
            margin: 40px auto;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: black;
            margin-bottom: 20px;
            font-size:35px;
            font-weight: 800;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input, textarea {
            margin-bottom: 15px;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        input:focus, textarea:focus {
            border-color: #007bff;
            outline: none;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 18px;
            transition: background 0.3s, transform 0.2s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
            transform: scale(1.05);
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
<section class="enquiry-form">
        <div class="container shadow-lg p-3 mb-5 bg-body rounded">
        <h1>Enquiry Form</h1>
        <form action="enquiry.php" method="POST">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <input type="phone" name="phoneno" placeholder="Your Mobile No" required>
             <input type="text" name="subject" placeholder="Subject" required>
            <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
            <input type="submit" value="Submit Enquiry">
     </form>
    </div>
</section>
<?php
   include'small-footer.php';
?>
    
 </body>
</html>
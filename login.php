<?php
session_start();
include("connect.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $contact_address = $_POST['contact_address'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

    if (!empty($email) && !empty($_POST['password']) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        $stmt = $con->prepare("INSERT INTO details (first_name, last_name, gender, contact_address, email, password) 
                                VALUES (?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("ssssss", $first_name, $last_name, $gender, $contact_address, $email, $password);

        if ($stmt->execute()) {
            echo "<script>alert('Successfully Registered!'); window.location.href='log.php';</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Please enter a valid email and password!');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>website</title>
    <link rel="stylesheet" href="style.css">
    
    <link rel="stylesheet"
  href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <header>
        <a href="#" class="logo">
            <img src="img/logo.jpg" alt="">
        </a>
        <i class='bx bx-menu' id ="menu-icon"></i>
        <ul class="navbar">
            <li><a href="sachintha.html">Home</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="new.html">New car</a></li>
            <li><a href="old.html">Old Car </a></li>
            <li><a href="cus.html">Custormers</a></li>
            <li><a href="log.php">Login</a></li>
            
        </ul>
        
        <div class="header-icon">
        <i class='bx bx-search-alt-2'id="search-icon"></i>
        <i class='bx bxs-user-account' ></i>
        </div>

        <div class="search-box">
            <input type="search" placeholder="Search Here.........">
        </div>

        

    </header>
    <div class="signup">
        <h1>sign up</h1>
        <h4>It's free and only take a minute</h4>
        <form method="POST">
    <label>First Name</label>
    <input type="text" name="first_name" required>
    
    <label>Last Name</label>
    <input type="text" name="last_name" required>
    
    <label>Gender</label>
    <select name="gender" required>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
    </select>
    
    <label>Contact Address</label>
    <input type="text" name="contact_address" required>
    
    <label>Email</label>
    <input type="email" name="email" required>
    
    <label>Password</label>
    <input type="password" name="password" required minlength="6">
    
    <input type="submit" value="Sign Up">
</form>

        <p>By clicking the sign up button,you agree to our <br>
        <a href="#">Terms and condition</a>and <a href="#">Policy privacy</a>
         </p>
         <p>Alredy have an account?<a href="log.php">Login Here</a></p>

    </div>
     
     <section class="footer">
        <div class="footer-box">
            <h3>Dream Vehicle</h3>
            <p>Buying a car is definitely a process, so customers usually value service, quality of the cars, guarantee options, financing options, and similar.</p>
        <div class="social">
            <a href="#"><i class='bx bxl-facebook-circle' ></i></a>
            <a href="#"><i class='bx bxl-twitter' ></i></a>
            <a href="#"><i class='bx bxl-instagram'></i></a>
            <a href="#"><i class='bx bxl-whatsapp' ></i></a>
        </div>
        </div>
        <div class="footer-box">
            <h3>Support</h3>
            <li><a href="#">Products</a></li>
            <li><a href="#">help & Support</a></li>
            <li><a href="#">Policy</a></li>
            <li><a href="#">terms of use</a></li>
            <li><a href="#">about</a></li>
        </div>
        <div class="footer-box">
            <h3>View Guides</h3>
            <li><a href="#">Our Branches</a></li>
            <li><a href="#">Features</a></li>
            <li><a href="#">carees</a></li>
            <li><a href="#">Blog Post</a></li>
        </div>
        <div class="footer-box">
            <h3>Contact</h3>
            <div class="contact">
                <span><i class='bx bxs-location-plus' ></i>F182,Hettiyawaththa,Bulathkohupitiya</span>
                <span><i class='bx bxs-phone-call' ></i>078-7993526</span>
                <span><i class='bx bxs-envelope' ></i>dreamvehicle@sell.com</span>
            </div>
        </div>
    </section>
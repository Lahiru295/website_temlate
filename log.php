<?php
session_start();
include("connect.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


    if (!empty($email) && !empty($password) && !is_numeric($email,)) {
       

        $query = "select * from details where email = '$email' limit 1";
        $result=mysqli_query($con,$query);

        if($result){

      

        if($result && mysqli_num_rows($result) > 0){

            $user_data = mysqli_fetch_assoc($result);

            if($user_data['password'] == $password){

                header("location:index.php");
                die;

            }

        }


        }
        echo "<script>alert('wrong username  or password');</script>";
    }
    else{
        echo "<script>alert('wrong username  or password');</script>";

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
        <!--Icons-->
        <div class="header-icon">
        <i class='bx bx-search-alt-2'id="search-icon"></i>
        <i class='bx bxs-user-account' ></i>
        </div>

        <div class="search-box">
            <input type="search" placeholder="Search Here.........">
        </div>

        

    </header>
    <div class="login">
        <h1>login</h1>
        <h4>It's free and only take a minute</h4>
        <form method="POST" action="login.php">
    <label>Email</label>
    <input type="email" name="email" required>
    
    <label>Password</label>
    <input type="password" name="password" required minlength="6">
    
    <input type="submit" name="" value="submit">
</form>
<p>Not have an account? <a href="login.php">Sign up here</a></p>

        

       
    </div>
 <!--footer-->
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



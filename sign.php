<?php
 session_start();

 include("connect.php");

 if($_SERVER['REQUEST_METHOD']=="POST"){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $contact_address = $_POST['contact_address'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($email) && !empty($password) && !is_numeric($email))
    {
        $query="insert into deta(first name,last name,gender,contact address,email,password)values(' $first_name','$last_name','$gender','$contact_address',' $email',' $password ')"

        mysqli_query($connect,$query);

        echo"<script type='text/javascript'>alert('Successfully Register')</script>";


    }
    else{
        echo"<script type='text/javascript'>alert('please enter some valid information')</script>";

    }
 }
?>
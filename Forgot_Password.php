<?php
include('sessioncart.php');
include('categoryheader.php');

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(); // Instantiate PHPMailer object
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'pateladitya130102@gmail.com';
$mail->Password = 'bgfsaefcvhourrwp';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adiax-Mail-Order Food Online</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="AdiPersonalBootstrap/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="AdiPersonalBootstrap/bootstrap.css"> -->
    <!-- Bootstrap JS -->
    <script src="AdiPersonalBootstrap/bootstrap.bundle.min.js"></script>
    <!-- <script src="AdiPersonalBootstrap/bootstrap.bundle.js"></script> -->
    <!-- Font Awesome icons-->
    <script src="AdiPersonalBootstrap/fontAdi.js"></script>
    <!-- Local CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="adi.css"> -->
</head>

<body>


    <!-- breadcrumb starts -->
    <div class="container-fluid bg-light text-primary py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php" class="text-primary">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Forgot Password ?</li>
            </ol>
        </nav>
    </div>
    <!-- breadcrumb Ends -->


    <form action="Forgot_Password.php" method="post">
        <div class="container">
            <h2>Reset Your Password ?</h2>
            <br>
            <p class="text">
                Please Enter Your Email Address. You will recieve an OTP & a link to create a new password via your Email Address.
            </p>
            <br>
            <div class="input-group w-50">
                <input type="email" name="send_email" class="form-control" placeholder="Enter Your Email ID : " required>
            </div>
            <br>
            <button type="submit" name="submit_sendmail" class="btn btn-primary">Submit</button>
        </div>
    </form>

    <div class="mailAdi">
        <?php

        if (isset($_POST['submit_sendmail'])) {

            // Recipients

            $to_email = $_POST['send_email'];
            $reset_link = " http://codeadi.000webhostapp.com/Change_Password.php ";
            $temp_password = rand(111111, 999999);
            // echo $temp_password;
            $hashing_password = password_hash($temp_password, PASSWORD_BCRYPT);
            $update_temp_pass = "UPDATE `registered_users` SET `password`='$hashing_password' WHERE `email`='$to_email';";
            $update_pass = mysqli_query($conn, $update_temp_pass);


            $subject = "Reset Your Password";
            $body = " Your OTP is $temp_password \n Click on the given link to Change Password \n \n $reset_link";

            // Content
            $mail->setFrom('pateladitya130102@gmail.com', 'Adiax');
            $mail->addAddress($to_email, 'Dear Client'); // Add a recipient
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients' . $body;


            // This portion is for verifying that the user is registered with the particular Email Address or not
            $searchingemail = "SELECT * FROM registered_users WHERE `email`='$to_email'";
            $resultmail = mysqli_query($conn, $searchingemail);
            $rowresult = mysqli_num_rows($resultmail);
            // echo "$searchingemail;";
            if ($rowresult > 0) {
                // If Email Address is found in our Database then the Email will be send 
                if ($mail->send()) {
                    echo "<script>alert('Email successfully sent to $to_email...');</script>";
                    $_SESSION['OTP'] = $temp_password;
                    echo "<script>window.location.href='Reset_password.php';</script>";
                } else {
                    echo "<script>alert('Email sending Failed to $to_email.... $mail->ErrorInfo')</script>";
                }

                // if (mail($to_email, $subject, $body, $headers)) {
                //     echo "<script>alert('Email successfully sent to $to_email...');</script>";
                //     // Here I am using Session to encrypt the page so that no one can access other pages
                //     // Other Pages includes Reset_password.php & Change_Password.php 
                //     // session_start();
                //     // So Sesssio starts
                //     $_SESSION['OTP'] = $temp_password;
                //     // $_SESSION['OTPemail'];
                //     echo "<script>window.location.href='Reset_password.php';</script>";
                // } else {
                //     // If Email is not found then the Email 
                //     echo "<script>alert('Email sending Failed to $to_email...')</script>";
                // }
            } else {
                echo "<script>alert('There is no account Registered yet with this email Address.');</script>";
            }
        }
        ?>
    </div>
</body>

</html>
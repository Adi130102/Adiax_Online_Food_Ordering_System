
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adiax - Order Food Online</title>
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
<?php
include('sessioncart.php');
include('categoryheader.php');
?>
    <?php
    unset($_SESSION['OTP']);
    if (isset($_SESSION['OTPVerifiedemail'])) {
    ?>

        <!-- breadcrumb starts -->
        <div class="container-fluid bg-light text-primary py-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php" class="text-primary">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                </ol>
            </nav>
        </div>
        <!-- breadcrumb Ends -->


        <!-- Form starts for submitting the New Password -->
        <form action="Change_Password.php" method="post">
            <div class="container bg-light mx-auto w-25 border mt-5">
                <br>
                <div class="input-group">
                    <input type="email" name="email" class="form-control" placeholder="Enter Email Address : " required>
                </div>
                <br>
                <div class="input-group">
                    <input type="password" name="New_Password" class="form-control" placeholder="Enter New Password : " required>
                </div>
                <br>
                <div class="input-group">
                    <input type="password" name="Confirm_Password" class="form-control" placeholder="Confirm Password : " required>
                </div>
                <br>
                <button type="submit" name="changing_password" class="bg-primary text-light form-control">Submit</button>
                <br>
            </div>
        </form>
        <!-- Form Ends for submitting the New Password -->

    <?php
        if (isset($_POST['changing_password'])) {
            // This portion is for verifying that the user is registered with the particular Email Address or not
            $to_email = $_POST['email'];
            $searchingemail = "SELECT * FROM registered_users WHERE `email`='$to_email'";
            $resultmail = mysqli_query($conn, $searchingemail);
            $rowresult = mysqli_num_rows($resultmail);
            // echo "$searchingemail;";
            if ($rowresult > 0) {
                $New_Password = $_POST['New_Password'];
                $Confirm_Password = $_POST['Confirm_Password'];
                if ($New_Password == $Confirm_Password) {
                    // echo "Password Matched";
                    $hashing_Confirm_Pass = password_hash($Confirm_Password, PASSWORD_BCRYPT);
                    $update_Confirm_Pass = "UPDATE `registered_users` SET `password`='$hashing_Confirm_Pass' WHERE `email`='$to_email';";
                    $update_pass = mysqli_query($conn, $update_Confirm_Pass);
                    if ($update_pass) {
                        echo "<script>alert('Password Changed Successfully :)');</script>";
                        echo "<script>window.location.href='index.php';;</script>";
                    }
                } else {
                    echo "Password Matched Incorrect !";
                }
            }
        }
    } else {
        echo "<script>alert('You can\'t Access this Page . You will be redirected to Home Page');</script>";
        echo "<script>window.location.href='index.php';</script>";
    }
    ?>

</body>

</html>
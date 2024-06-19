
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
    // if (isset($_SESSION['OTP']) && ($_SESSION['OTPemail']  == true)) {
    if (isset($_SESSION['OTP'])) {
    ?>

        <!-- breadcrumb starts -->
        <div class="container-fluid bg-light text-primary py-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php" class="text-primary">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Temp Password</li>
                </ol>
            </nav>
        </div>
        <!-- breadcrumb Ends -->

        <!-- Form starts for submitting the New Password -->
        <form action="Reset_password.php" method="post">
            <!-- div for Reset Password -->
            <div class="container-fluid mx-auto mt-5 text-secondary">
                <p class="text-start align-middle">
                    Enter Email Id and the OTP sent in your Mail Address
                </p>
            </div>
            <div class="container bg-light mx-auto w-25 border mt-5">
                <br>
                <div class="input-group">
                    <input type="email" name="email" class="form-control" placeholder="Enter Email Id : " required>
                </div>
                <br>
                <div class="input-group">
                    <input type="text" name="Temp_Password" class="form-control" placeholder="Enter OTP : " required>
                </div>
                <br>
                <button type="submit" name="temp_pass_submit" class="bg-primary text-light form-control">Submit</button>
                <br>
            </div>
            <!-- div for Reset Password -->

        </form>
        <!-- Form Ends for submitting the New Password -->



    <?php
        if (isset($_POST['temp_pass_submit'])) {
            $email = $_POST['email'];
            $Temp_Password = $_POST['Temp_Password'];
            $hashing_temp_password = password_hash($Temp_Password, PASSWORD_BCRYPT);
            // $sqlqueryupdate = "UPDATE `registered_users` SET `password`='$hashing_temp_password' WHERE `email` = '$email';";
            // $sqlquerypassing = mysqli_query($conn, $sqlqueryupdate);
            // echo $sqlqueryupdate;

            $sqlselect = "SELECT * FROM `registered_users` WHERE `email` = '$email';";
            $sqlquery1 = mysqli_query($conn, $sqlselect);
            if ($sqlquery1) {
                if (mysqli_num_rows($sqlquery1) > 0) {
                    $result_fetch_sql = mysqli_fetch_assoc($sqlquery1);
                    if (password_verify($Temp_Password, $result_fetch_sql['password']))
                    // if(password_verify($hashing_temp_password,$result_fetch_sql['password']))
                    // because here both parameters are passed that are hash encrypted.
                    // Here I am not using the above query because I am using password_verify() 
                    // Which is used for verifying normal password with hash encrypted password

                    {
                        // echo "Password Matched Successfully";
                        echo "<script>alert('OTP Verified Successfully');</script>";
                        // unset($_SESSION['OTPemail']);
                        // $_SESSION['OTPVerified'];
                        $adi = "justtemp";
                        $_SESSION['OTPVerifiedemail'] = $adi;
                        echo "<script>window.location.href='Change_Password.php';</script>";
                    } else {
                        echo "<script>alert('OTP Incorrect');</script>";
                    }
                }
            } else {
                echo "<script>alert('Query Failed');</script>";
            }
        }
    } else {
        echo "<script>alert('You can\'t Access this Page . You will be redirected to Home Page');</script>";
        echo "<script>window.location.href='index.php';</script>";
    }
    ?>


</body>

</html>
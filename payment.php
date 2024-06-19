<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adiax-Cart - Order Food Online</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="AdiPersonalBootstrap/bootstrap.min.css">
    <!-- Bootstrap JS -->
    <script src="AdiPersonalBootstrap/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome icons-->
    <script src="AdiPersonalBootstrap/fontAdi.js"></script>
    <!-- Local CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
<?php
include('sessioncart.php');
include('categoryheader.php');

?>
    <?php

    if (isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] == true)) {
        $searchrecords = "SELECT * FROM registered_users WHERE `username`='$_SESSION[username]'";
        $passrecords = mysqli_query($conn, $searchrecords);
        $searchresult = mysqli_fetch_assoc($passrecords);

        if (isset($_POST['Purchased_from_Addtocart'])) {
            // Replace placeholders with actual values
            $username = $_SESSION['username'];
            $email = $searchresult['email']; // assuming 'email' is a column in 'registered_users' table
            $pay_amount = ''; // Replace with actual payment amount
            $pay_datetime = date('Y-m-d H:i:s');

            // Prepare and execute the query to insert payment details
            $query1 = "INSERT INTO `food_payment`(`username`, `email`, `pay_amount`, `pay_datetime`) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $query1);
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "ssds", $username, $email, $pay_amount, $pay_datetime);
                $querypass1 = mysqli_stmt_execute($stmt);
                if ($querypass1) {
                    $food_ord_id = mysqli_insert_id($conn);
                    $query2 = "INSERT INTO `food_ordered`(`food_ord_id`, `food_item`, `food_qty`, `food_price`) VALUES (?,?,?,?)";
                    $stmt = mysqli_prepare($conn, $query2);
                    if ($stmt) {
                        mysqli_stmt_bind_param($stmt, "isid", $food_ord_id, $Item_name, $Quantity, $Price);
                        foreach ($_SESSION['cart'] as $key => $values) {
                            $Item_name = $values['Item_name'];
                            $Quantity = $values['Quantity'];
                            $Price = $values['Price'];
                            mysqli_stmt_execute($stmt);
                        }
                        unset($_SESSION['cart']);
                        echo "<script>alert('Order Placed Successfully');</script>";
                        // echo "<script>window.location.href='invoiceindex.php';</script>";
                        echo "<script>window.location.href='index.php';</script>";
                    }
                } else {
                    echo "Error inserting payment details: " . mysqli_error($conn);
                }
            } else {
                echo "Error preparing statement: " . mysqli_error($conn);
            }
        } else {
            echo "<script>alert('you can\'t access this page directly');</script>";
            echo "<script>window.location.href='index.php';</script>";
        }
    } else {
        echo "<div class='p-5 m-5 border bg-primary bg-opacity-10 text-center'>";
        echo "<h1>To Visit this page you must be logged in</h1>";
        echo "<br><br><p>Click here for login</p>";
        echo "<br><button class='btn btn-primary text-light' data-bs-toggle='modal' data-bs-target='#signincompulsory'>sign&nbsp;in</button></div>";
    }
    ?>

    <!-- Log in Modal Starts for Users -->
    <form action="signin_signup.php" method="post">
        <div class="modal fade" id="signincompulsory">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <!-- <div class="modal-header linear-gradient2adi"> -->
                    <div class="modal-header bg-primary">
                        <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">
                            Login to your Account
                        </h1>
                        <button type="button" class="btn btn-light btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <br><br>
                    <div class="modal-body mx-auto">
                        <center>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input type="text" name="username_email" class="form-control rounded-end" placeholder="Enter Username or Email " required>
                            </div>
                            <br>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fa fa-lock"></i>
                                </div>
                                <input type="Password" name="password" class="form-control rounded-end" placeholder="Enter Password " required>
                            </div>
                            <!-- <br> -->
                            <div class="container-fluid">
                                <a href="Forgot_Password.php" class="btn btn-outline-transparent text-dark text-smalladi">Forgot password ?</a>
                                <a class="btn btn-outline-transparent text-primary text-smalladi" data-bs-toggle="modal" data-bs-target="#signuptarget">Create new Account</a>
                                <!-- <a class="btn btn-outline-transparent text-primary text-smalladi" data-bs-toggle="modal" data-bs-target="#signuptarget">Create a new account</a> -->
                            </div>
                            <!-- <div class="input-group justify-content-end"> -->
                            <!-- <a class="btn btn-outline-transparent text-dark text-smalladi text-end" data-bs-toggle="modal" data-bs-target="#signuptarget">Forgot password ?</a> -->
                            <!-- <a class="btn btn-outline-transparent text-primary text-smalladi" data-bs-toggle="modal" data-bs-target="#signuptarget">Create a new account</a> -->
                            <!-- </div> -->
                        </center>
                    </div>
                    <br>
                    <div class="modal-footer justify-content-evenly shadow">
                        <button type="submit" class="btn btn-success" name="signin">sign&nbsp;in</button>
                        <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Close</button>

                        <!-- <button type="reset"class="btn btn-close"data-bs-dismiss="modal">Sign&nbsp;up</button> -->

                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Log in Modal Ends for Users -->
    <!-- Sign up Modal Starts for Users -->
    <form action="signin_signup.php" method="post">
        <div class="modal fade" id="signuptarget">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <!-- <div class="modal-header linear-gradient2adi"> -->
                    <div class="modal-header bg-primary">
                        <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Create
                            &nbsp;New&nbsp;Account</h1>
                        <button type="button" class="btn btn-light btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <br><br>
                    <div class="modal-body mx-auto">
                        <center>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fa fa-user-pen"></i>
                                </div>
                                <input type="text" name="fullname" class="form-control rounded-end" placeholder="Enter Your Full Name " required>
                            </div>
                            <br>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input type="text" name="username" class="form-control rounded-end" placeholder="Enter Your Username " required>
                            </div>
                            <br>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fa fa-at"></i>
                                </div>
                                <input type="email" name="email" class="form-control rounded-end" placeholder="Enter your Email id " required>
                            </div>
                            <br>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fa fa-lock"></i>
                                </div>
                                <input type="Password" name="password" class="form-control rounded-end" placeholder="Enter Your Password " required>
                            </div>
                            <br>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fa-solid fa-house"></i>
                                </div>
                                <input type="text" name="Address" class="form-control rounded-end" placeholder="Enter your Address " required>
                            </div>
                            <br>
                        </center>
                    </div>
                    <br>
                    <div class="modal-footer justify-content-evenly shadow">
                        <button type="submit" name="signup" class="btn btn-success">Sign Up</button>
                        <!-- <button type="submit" class="btn btn-warning">Sign up</button> -->
                        <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Sign up Modal Ends for Users -->
    <!-- Log out Modal Starts -->
    <form action="logout.php" method="post">
        <div class="modal fade" id="logouttarget">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <!-- <div class="modal-header linear-gradient2adi"> -->
                    <div class="modal-header bg-primary">
                        <h1 class="modal-title fs-5 text-light text-center" id="exampleModalLabel">
                            <center>
                                <?php //echo $_SESSION['username']; 
                                ?>
                                &nbsp;Logout
                                &nbsp;Your
                                &nbsp;Profile
                            </center>
                        </h1>
                        <button type="button" class="btn btn-light btn-close text-light" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <br>
                    <div class="modal-body mx-auto">
                        <center>
                            <!-- <h5 class="text-primary"><u>Your</u> <u>Profile</u></h5> -->
                        </center>
                        <!-- <br><br> -->
                        <table class="table table-striped table-hover">
                            <tbody>
                                <tr>
                                    <th scope="row"><i class="fa fa-user"></i></th>
                                    <td>Username</td>
                                    <td>:</td>
                                    <td>
                                        <?php
                                        echo $_SESSION['username'];
                                        // echo $rowforsessionprofile['username'];
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><i class="fa fa-user-pen"></i></th>
                                    <td>Full name</td>
                                    <td>:</td>
                                    <td>
                                        <?php
                                        echo $rowforsessionprofile['fullname'];
                                        // echo $rowforsessionprofile['username'];
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><i class="fa fa-at"></i></th>
                                    <td>E-mail</td>
                                    <td>:</td>
                                    <td>
                                        <?php
                                        echo $rowforsessionprofile['email'];
                                        // echo $rowforsessionprofile['username'];
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><i class="fa-solid fa-house"></i></th>
                                    <td>Address</td>
                                    <td>:</td>
                                    <td>
                                        <?php
                                        echo $rowforsessionprofile['Address'];
                                        // echo $rowforsessionprofile['username'];
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><i class="fa fa-calendar-days"></i></th>
                                    <td>Account created</td>
                                    <td>:</td>
                                    <td>
                                        <?php
                                        echo $rowforsessionprofile['datetime'];
                                        // echo $rowforsessionprofile['username'];
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <!-- <br> -->
                    <div class="modal-footer justify-content-evenly shadow">
                        <button type="submit" class="btn btn-success" name="signout">Log&nbsp;out</button>
                        <!-- <button type="submit" class="btn btn-warning">Sign up</button> -->
                        <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Log out Modal Ends -->


</body>

</html>

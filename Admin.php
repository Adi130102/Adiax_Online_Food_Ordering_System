


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="AdiPersonalBootstrap/bootstrap.min.css"> -->
    <link rel="stylesheet" href="AdiPersonalBootstrap/bootstrap.css">
    <!-- Bootstrap JS -->
    <!-- <script src="AdiPersonalBootstrap/bootstrap.bundle.min.js"></script> -->
    <script src="AdiPersonalBootstrap/bootstrap.bundle.js"></script>
    <!-- Font Awesome icons-->
    <script src="AdiPersonalBootstrap/fontAdi.js"></script>
    <!-- Local CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="adi.css"> -->
</head>

<body>
<?php
include('Connection.php');
session_start();
?>
    <?php
    if (isset($_SESSION['adminlogged_in']) && ($_SESSION['adminlogged_in'] == true)) {
        $selectingtemporary = "SELECT * FROM admin_tbl WHERE `username`='$_SESSION[adminname]'";
        $resultofselectingtemporary = mysqli_query($conn, $selectingtemporary);
        $rowforsessionprofile = mysqli_fetch_assoc($resultofselectingtemporary);
    }
    if (isset($_SESSION['adminname'])) {
    ?>

        <script>
            // alert('Welcome to Adiax - Online Food Ordering System');
            // alert('Welcome Admin to your Admin Panel');
        </script>
        <nav class="navbar navbar-expand-sm linear-gradient2adi navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="img/logo.png" width="120vw" class="img-fluid justify-content-center" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon">
                    </span>
                </button>
                <div class="collapse navbar-collapse justify-content-center text-center" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item text-white text-monotypecorsiva fs-3">
                            <!-- <a class="nav-link text-white text-monotypecorsiva fs-3" href="#"> -->
                            Welcome to Adiax - Online Food Ordering System
                            <!-- </a> -->
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid linear-gradient2adi text-end text-light">
            <i class="fa fa-user"></i>
            <?php
            echo $_SESSION['adminname'];
            ?>
        </div>




        <br>

        <div class="container-fluid">
            <div class="gy-4 row">
                <div class="col-12 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="container d-block text-center py-5" style="background-color:#081160;">
                        <a class="nav-link text-white" href="admin_tbl.php">
                            <i class="fa-solid fa-users-gear"></i>
                            Registered Admins
                        </a>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="container d-block text-center py-5" style="background-color:#300b3f;">
                        <a class="nav-link text-white" href="Admin_registered_users.php">
                            <i class="fa fa-users text-white"></i>
                            registered users
                        </a>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="container d-block text-center py-5" style="background-color:#630517;">
                        <a class="nav-link text-white" href="AdminProducts_Categories.php">
                            <i class="fa-brands fa-product-hunt text-white"></i>
                            Products
                            &nbsp;
                            &
                            &nbsp;
                            <i class="fa-solid fa-ticket text-white"></i>
                            Category
                        </a>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="container d-block text-center py-5" style="background-color:#1d0e51;">
                        <a class="nav-link text-white" href="Admin_food_Ordered.php">
                            <i class="fa fa-shopping-cart text-white"></i>
                            Order Details
                        </a>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="container d-block text-center py-5" style="background-color:#48082b;">
                        <a class="nav-link text-white" href="Admin_income.php">
                            <i class="fa-solid fa-indian-rupee-sign text-white"></i>
                            Payment Details
                        </a>

                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="container d-block text-center py-5" style="background-color:#740309;">
                        <a class="nav-link text-white" href="Admin_order_summary.php">
                            <i class="fa fa-shopping-cart text-white"></i>
                            order
                            &nbsp;
                            &
                            &nbsp;
                            <i class="fa-solid fa-indian-rupee-sign text-white"></i>
                            Payment
                        </a>

                    </div>
                </div>
                <div class="col-12">
                    <div class="container-fluid d-block text-center linear-gradient2adi py-lg-0 py-md-1 py-sm-2 py-4">
                        <span class="btn btn-outline-transparent" data-bs-toggle="modal" data-bs-target="#logouttarget">
                            <span class="Logbtn text-light text-end" id="logbtn">
                                Current Admin Details
                            </span>
                        </span>
                    </div>
                </div>
            </div>
        </div>


        <!-- Log out Modal Starts -->
        <form action="logout.php" method="post">
            <div class="modal fade" id="logouttarget">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h1 class="modal-title fs-5 text-light text-center" id="exampleModalLabel">
                                <center>
                                    <!-- <?php echo $_SESSION['adminname']; ?> -->
                                    &nbsp;Current
                                    &nbsp;Admin
                                    &nbsp;Details
                                </center>
                            </h1>
                            <button type="button" class="btn btn-light btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <br>
                        <div class="modal-body mx-auto">
                            <center>
                                <!-- <h5 class="text-primary"><u>Your</u> <u>Profile</u></h5> -->
                            </center>
                            <!-- <br><br> -->
                            <?php
                            // SELECT * FROM `registered_users` WHERE `username` = 'Aditya Patel';
                            $sqllogout = "SELECT * FROM `admin_tbl` WHERE `username` = '$_SESSION[adminname]'";
                            $resultlogout = mysqli_query($conn, $sqllogout);
                            $sr_no = 1;
                            while ($rowadmindetail = mysqli_fetch_assoc($resultlogout)) {
                            ?>

                                <table class="table table-striped table-hover">
                                    <tbody>
                                        <tr>
                                            <th scope="row"><i class="fa fa-user"></i></th>
                                            <td>Username</td>
                                            <td>:</td>
                                            <td>
                                                <?php
                                                echo $_SESSION['adminname'];
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
                                                echo $rowadmindetail['fullname'];
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
                                                echo $rowadmindetail['email'];
                                                // echo $rowforsessionprofile['username'];
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><i class="fa-solid fa-house"></i>
                                                <!-- <i class="fa fa-home "></i></th> -->
                                            <td>Address</td>
                                            <td>:</td>
                                            <td>
                                                <?php
                                                echo $rowadmindetail['Address'];
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
                                                echo $rowadmindetail['datetime'];
                                                // echo $rowforsessionprofile['username'];
                                                ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                        </div>
                    <?php } ?>
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

    <?php
    }

    if (!isset($_SESSION['adminname'])) {
        echo "
        <script>
            alert('You can\'t Open this page Directly ');
            alert('Login First ! To open this Page');
            window.location.href='index.php';
        </script>";
    }
    ?>
</body>

</html>
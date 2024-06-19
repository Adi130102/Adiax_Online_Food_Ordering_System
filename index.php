<?php
require('Connection.php');
// session_start();
include('sessioncart.php');
if (isset($_SESSION['OTP'])) {
    unset($_SESSION['OTP']);
}
if (isset($_SESSION['OTPVerifiedemail'])) {
    unset($_SESSION['OTPVerifiedemail']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adiax - Order Food Online</title>
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="AdiPersonalBootstrap/bootstrap.min.css"> -->
    <link rel="stylesheet" href="AdiPersonalBootstrap/bootstrap.css">
    <!-- Bootstrap JS -->
    <!-- <script src="AdiPersonalBootstrap/bootstrap.bu ndle.min.js"></script> -->
    <script src="AdiPersonalBootstrap/bootstrap.bundle.js"></script>
    <!-- Font Awesome icons-->
    <script src="AdiPersonalBootstrap/fontAdi.js"></script>
    <!-- Local CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="adi.css"> -->
</head>

<body class="overflow-x-hidden">
    <!-- <form action="index.php" method="post"> -->
    <!-- Top-header Starts -->
    <section class="top-header">
        <div class="container-fluid linear-gradient2adi text-center">
            <nav class="navbar navbar expand-sm navu py-0 text-smalladi mx-auto">
                <ul class="navbar nav">
                    <li class="nav-item">
                        <a href="tel:+91 9427178733" class="nav-link text-light">
                            <i class="fa fa-phone text-light pe-2"></i>
                            +91 9427178733
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="mailto:pateladitya130102@gmail.com" class="nav-link text-light">
                            <i class="fa fa-envelope text-light pe-2"></i>
                            pateladitya130102@gmail.com
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="https://goo.gl/maps/U2zkzW5zdhjiSJJKA" class="nav-link text-light">
                            <i class="fa fa-map-marker text-light pe-2"></i>
                            Modasa
                        </a>
                    </li>
                </ul>
                <ul class="navbar nav">
                    <li class="nav-item">
                        <a href="https://forms.gle/dee9hEEQxkbSJ8aA7" class="nav-link text-light">
                            <i class="fa fa-message text-light pe-2"></i>
                            Feedback
                        </a>
                    </li>
                    <li class="nav-item">
                        <div class="dropstart">
                            <button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-bs-toggle="dropdown">
                                Accounts
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <!-- <li class="dropdown-item"> -->
                                    <?php
                                    if (isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] == true)) {
                                        $selectingtemporary = "SELECT * FROM registered_users WHERE `username`='$_SESSION[username]'";
                                        $resultofselectingtemporary = mysqli_query($conn, $selectingtemporary);
                                        $rowforsessionprofile = mysqli_fetch_assoc($resultofselectingtemporary);

                                    ?>
                                        <span class="btn dropdown-item text-smalladi" data-bs-toggle="modal" data-bs-target="#logouttarget">
                                            <span class="Logbtn text-primary" id="logbtn">
                                                <?php
                                                echo "<i class='fa fa-user pe-2'></i>";
                                                echo $_SESSION['username'];
                                                ?>
                                            </span>
                                        </span>
                                    <?php
                                    } elseif (!isset($_SESSION['logged_in'])) {
                                    ?>
                                        <span class="btn dropdown-item text-smalladi" data-bs-toggle="modal" data-bs-target="#logintarget">
                                            <span class="Logbtn text-primary" id="logbtn">
                                                <i class="fa fa-user pe-2"></i>
                                                <span class="loginname">
                                                    User
                                                </span>
                                            </span>
                                        </span>
                                    <?php
                                    } else {
                                    ?>
                                        <span class="btn dropdown-item text-smalladi" data-bs-toggle="modal" data-bs-target="#logintarget">
                                            <span class="Logbtn text-primary" id="logbtn">
                                                <i class="fa fa-user pe-2"></i>
                                                <span class="loginname">
                                                    User
                                                </span>
                                            </span>
                                        </span>
                                    <?php
                                    }
                                    ?>
                                </li>
                                <li class="justify-content-center" data-bs-toggle="modal" data-bs-target="#exampleModalAdmin">
                                    <span class="btn text-primary dropdown-item text-smalladi">
                                        <i class="fa fa-user-secret pe-2 fa-lg"></i>
                                        Admin
                                    </span>
                                </li>

                            </ul>
                        </div>
                    </li>


                    <!-- User Signin, Signup, signout Span Button Starts-->
                    <!-- <li class="nav-item text-light">
                        <?php
                        if (isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] == true)) {
                            $selectingtemporary = "SELECT * FROM registered_users WHERE `username`='$_SESSION[username]'";
                            $resultofselectingtemporary = mysqli_query($conn, $selectingtemporary);
                            $rowforsessionprofile = mysqli_fetch_assoc($resultofselectingtemporary);

                        ?>
                            <span class="btn btn-outline-transparent text-light" data-bs-toggle="modal" data-bs-target="#logouttarget">
                                <span class="Logbtn" id="logbtn">
                                    <?php
                                    echo "<i class='fa fa-user pe-2'></i>";
                                    echo $_SESSION['username'];
                                    ?>
                                </span>
                            </span>
                        <?php
                        } elseif (!isset($_SESSION['logged_in'])) {
                        ?>
                            <span class="btn btn-outline-transparent text-light" data-bs-toggle="modal" data-bs-target="#logintarget">
                                <span class="Logbtn" id="logbtn">
                                    <i class="fa fa-user pe-2"></i>
                                    <span class="loginname">
                                        Sign&nbsp;in
                                    </span>
                                </span>
                            </span>
                        <?php
                        } else {
                        ?>
                            <span class="btn btn-outline-transparent text-light" data-bs-toggle="modal" data-bs-target="#logintarget">
                                <span class="Logbtn" id="logbtn">
                                    <i class="fa fa-user pe-2"></i>
                                    <span class="loginname">
                                        Sign&nbsp;in
                                    </span>
                                </span>
                            </span>
                        <?php
                        }
                        ?>
                    </li> -->
                    <!-- User Signin, Signup, signout Span Button Ends-->

                </ul>
            </nav>
        </div>
        <!-- Log in Modal Starts for Users -->
        <form action="signin_signup.php" method="post">
            <div class="modal fade" id="logintarget">
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

        <!-- Log in Modal Starts for Admin -->
        <form action="admin_signin.php" method="post">
            <div class="modal fade" id="exampleModalAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <!-- <div class="modal-header linear-gradient2adi text-light"> -->
                        <div class="modal-header bg-primary text-light">
                            <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Admin Login Panel</h1>
                            <button type="button" class="btn btn-light btn-close text-light" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body mx-auto">
                            <br><br>
                            <center>
                                <div class="container">
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input type="text" name="username_email" class="form-control" placeholder="Enter Username or Email" required>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            <i class="fa fa-lock"></i>
                                        </div>
                                        <input type="Password" name="password" class="form-control" placeholder="Enter Password" required>
                                    </div>
                                    <br>
                            </center>
                        </div>
                        <div class="modal-footer justify-content-evenly">
                            <button type="submit" name="onadminsignin" class="btn btn-success">Submit</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Log in Modal Ends for Admin -->



    </section>
    <!-- Top-header Ends -->
    <!-- hr line for leaving minor gap between two section Started -->
    <hr class="py-0 my-0">
    <!-- hr line for leaving minor gap between two section Ended -->

    <!-- NAvigation Section Started -->
    <section class="navigation d-flex linear-gradient2adi">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-sm navbar-dark d-flex py-1">


                <!-- div Adiax logo Starts -->
                <div class="nav-brand justify-content-center ms-3 ms-lg-5 ms-md-5 ms-xs-2 my-0">
                    <img src="img/logo.png" width="120vw" class="img-fluid justify-content-center" alt="">
                </div>
                <!-- div logo Ends -->


                <!-- Responsive toggler button for main navbar Starts-->
                <button type="button" class="navbar-toggler text-light justify-content-center" data-bs-toggle="collapse" data-bs-target="#collapsiblenavbar">
                    <span class="navbar-toggler-icon text-light"></span>
                </button>
                <!-- Responsive toggler button for main navbar Ends-->

                <!-- collapsible main navbar Starts-->
                <div class="collapse navbar-collapse justify-content-center" id="collapsiblenavbar">
                    <!-- <div class="collapse navbar-collapse justify-content-center" id="collapsiblenavbar"> -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link text-light text-smalladi">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="Aboutus.php" class="nav-link text-light text-smalladi">About&nbsp;Us </a>
                        </li>
                        <li class="nav-item">
                            <a href="Menu.php" class="nav-link text-light text-smalladi">Menu</a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-bs-toggle="dropdown">
                                    Our&nbsp;Services
                                </button>
                                <ul class="dropdown-menu">
                                    <li class="justify-content-center dropdown-item"><a href="DeliveryAgents.php" class="text-danger text-smalladi">Delivery Agents</a></li>
                                    <li class="justify-content-center dropdown-item"><a href="DonateUs.php" class="text-danger text-smalladi">Donate Us</a></li>
                                    <li class="justify-content-center dropdown-item"><a href="Managing_Director(MD).php" class="text-danger text-smalladi">Our's M.D.</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- Collapsible main navbar Ends -->


                <!-- Responsive for symbolic items Starts -->
                <!-- <div class="collapse navbar-collapse justify-content-center" id="collapsiblenavbar"> -->
                <div class="collapse navbar-collapse justify-content-end pe-xxl-5" id="collapsiblenavbar">
                    <ul class="navbar nav justify-content-center">
                        <!-- <ul class="navbar-nav"> -->

                        <li class="nav-item">
                            <div class="input-group input-group-sm">

                                <!-- <div class="simple"> -->
                                <div class="input-group-text " id="inputGroup-sizing-sm">
                                    <i class="fa fa-magnifying-glass"></i>
                                </div>
                                <input type="text" class="form-control rounded-end" id="search-item" onkeyup="search()" placeholder="Search">
                                <!-- </div> -->


                                <!-- Heart Button for donation Starts-->
                                <button type="button" class="btn btn-danger p-0 ">
                                    <a href="donateus.php" class="nav-link">
                                        <i class="fa fa-heart text-light text-smalladi"></i>
                                    </a>
                                </button>
                                <!-- Heart Button for donation -->

                                <!-- Cart Button for Shopping-Cart Starts-->
                                <button type="button" class="btn btn-danger p-0 ">
                                    <a href="mycart.php" class="nav-link my-auto">
                                        <i class="fa fa-shopping-cart text-light text-smalladi"></i>
                                        <sup class="text-light">
                                            <?php
                                            if (isset($_SESSION['cart'])) {
                                                if (($_SESSION['cart']) && ($count > 0) == true) {
                                                    echo '<sup><big><b>' . $count . '</b></big></sup>';
                                                    // echo "<script>alert('if');</script>";
                                                } else {
                                                    echo '<sup><big><b>0</b></big></sup>';
                                                    // echo "<script>alert('else after if');</script>";
                                                }
                                            } else {
                                                echo '<sup><big><b>0</b></big></sup>';
                                                // echo "<script>alert('else');</script>";
                                            }
                                            ?>
                                        </sup>
                                    </a>
                                </button>
                                <!-- Cart Button for Shopping-Cart -->
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- Responsive for symbolic items Ends -->
            </nav>
        </div>
    </section>
    <!-- Navigation Section Ended -->

    <!-- Main Image Section Started -->
    <section class="mainimage">
        <!-- Container4 Started -->
        <div class="container4 text-center">
            <img src="img/30.png" class="img-fluid img-thumbanil" width="100%" alt="">
        </div>
        <div class="blurryeffect">
            <!-- This div is made for giving blurry effect after the main big img i.e., in container4 -->
        </div>
        <!-- Container4 Ended -->
    </section>
    <!-- Main Image Section Ended -->

    <!-- About US Section Started -->
    <Section class="Aboutus py-5 my-3 shadow">
        <div class="row mx-auto">
            <h3 class="fst-italic fw-bolder pb-5 text-center"><u class="shadow">About</u> <u class="shadow">Us</u>
            </h3>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 justify-content-center text-center">
                <img src="img/AboutUsShop.png" width="300vw" height="auto" class="align-middle img-thumbnail img-fluid border-0" alt="">
                <br><br>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 pe-5">
                <p class="textcenteradi">
                    The <span class="ADIAX">ADIAX</span> was established on 13th January,2023 in Modasa (Gujarat).
                    The core idea behind <span class="ADIAX">ADIAX</span> is to provide wholesome food with the
                    various delicacies spread across the menu & our pizza is the most recognized food item in the
                    world. We provide you with daily self-made Pizza, sourdough pizza, burgers, pasta, and many
                    more.
                </p>
                <p class="textcenteradi">
                    <span class="ADIAX">ADIAX</span> is always looking for passionate, smart working partners to
                    help us expand into new markets as we continue to grow our brand worldwide. We provide
                    best-in-class training and development in all areas of our business, in addition to
                    on-the-ground support.
                </p>
                <p class="textcenteradi">
                    We care for every age group of people who like food. We are serving India’s Most cheesy pizza
                    burger with quality raw materials and a hygienic cooking process in our SOP(Standard Operating
                    Process).
                </p>
            </div>
        </div>
    </Section>
    <!-- About Us Section Ended -->

    <!-- Category Section Started -->
    <section class="category mt-5 pt-5">
        <h3 class="text-center fst-italic fw-bolder"><u class="shadow">Best</u> <u class="shadow">Seller</u></h3>
        <br>
        <div class="row g-5 my-auto mx-auto product-list">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 justify-content-center" data-bs-toggle="tooltip" title="Pizza">
                <!-- data-bs-toggle="tooltip" title="Pizza" is used to show item name when a mouse is hover on an item -->
                <a href="pizza.php" class="nav-link">
                    <div class="card text-center cardadimenu shadow">
                        <div class="inner">
                            <img src="img/Adiax-pizzium/Pizza/Premium Pizza/Farm Villa Pizza.jpeg" class="img-fluid img-thumbnail imgadi object-fit-contain" height="250px" width="auto" alt="">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title product">Pizza</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 product-list" data-bs-toggle="tooltip" title="Garlic Bread">
                <a href="garlicbread.php" class="nav-link">
                    <div class="card text-center cardadimenu shadow">
                        <div class="inner">
                            <img src="img/Adiax-pizzium/Garlic Breads/Plain Garlic Bread.jpeg" class="img-fluid img-thumbnail imgadi" alt="">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title product">Garlic Bread</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 product-list" data-bs-toggle="tooltip" title="Burger">
                <a href="burger.php" class="nav-link">
                    <div class="card text-center cardadimenu shadow">
                        <div class="inner">
                            <img src="img/Adiax-pizzium/Burger/Big Adiax.png" class="img-fluid img-thumbnail imgadi" alt="">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title product">Burger</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 product-list" data-bs-toggle="tooltip" title="Pasta">
                <a href="pasta.php" class="nav-link">
                    <div class="card text-center cardadimenu shadow">
                        <div class="inner">
                            <img src="img/Adiax-pizzium/Pasta Veg/Moroccan Spice Pasta Veg.png" class="img-fluid img-thumbnail imgadi" alt="">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title product">Pasta</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 product-list" data-bs-toggle="tooltip" title="Spaghetti">
                <a href="Spaghetti.php" class="nav-link">
                    <div class="card text-center cardadimenu shadow">
                        <div class="inner">
                            <img src="img/Adiax-pizzium/Spaghetti/Veg Spaghetti Pesto.jpeg" class="img-fluid img-thumbnail imgadi" alt="">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title product">Spaghetti</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 product-list" data-bs-toggle="tooltip" title="Hotdog">
                <a href="Hotdog.php" class="nav-link">
                    <div class="card text-center cardadimenu shadow">
                        <div class="inner">
                            <img src="img/Adiax-pizzium/hotdogs/Green Veg toasty hotdog.png" class="img-fluid img-thumbnail imgadi" alt="">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title product">Hotdogs</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 product-list" data-bs-toggle="tooltip" title="Sandwich">
                <a href="Sandwich.php" class="nav-link">
                    <div class="card text-center cardadimenu shadow">
                        <div class="inner">
                            <img src="img/Adiax-pizzium/Sandwiches/Sandwich.png" class="img-fluid img-thumbnail imgadi" alt="">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title product">Sandwiches</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 product-list" data-bs-toggle="tooltip" title="Quesadillas">
                <a href="Quesadillas.php" class="nav-link">
                    <div class="card text-center cardadimenu shadow">
                        <div class="inner">
                            <img src="img/Adiax-pizzium/Quesadillas/Cheese Olives Quesadillas.jpeg" class="img-fluid img-thumbnail imgadi" alt="">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title product">Cheese Olives Quesadillas</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 product-list" data-bs-toggle="tooltip" title="Tacos">
                <a href="Tacos.php" class="nav-link">
                    <div class="card text-center cardadimenu shadow">
                        <div class="inner">
                            <img src="img/Adiax-pizzium/Tacos/Tacos.png" class="img-fluid img-thumbnail imgadi" alt="">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title product">Tacos</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 product-list" data-bs-toggle="tooltip" title="South Indian Dishes">
                <a href="Southindianfood.php" class="nav-link">
                    <div class="card text-center cardadimenu shadow">
                        <div class="inner">
                            <img src="img/Adiax-pizzium/South Indian/South Indian Dish.png" class="img-fluid img-thumbnail imgadi" alt="">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title product">South Indian Food</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 product-list" data-bs-toggle="tooltip" title="Beverages">
                <a href="Beverages.php" class="nav-link">
                    <div class="card text-center cardadimenu shadow">
                        <div class="inner">
                            <img src="img/Adiax-pizzium/Beverages/Beverages.png" class="img-fluid img-thumbnail imgadi" alt="">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title product">Beverages</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 product-list" data-bs-toggle="tooltip" title="Desserts">
                <a href="Desserts.php" class="nav-link">
                    <div class="card text-center cardadimenu shadow">
                        <div class="inner">
                            <img src="img/Adiax-pizzium/Desserts/Royal-Adiax.jpg" class="img-fluid img-thumbnail imgadi" alt="">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title product">Desserts</h6>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <!-- Category Section Ended -->

    <!-- Upper Footer Section Started -->
    <section class="upper-footer mt-5">
        <div class="container-fluid linear-gradient2adi text-light textcenteradi justifycenteradi">
            <div class="row px-3">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3 py-3">
                    <br>
                    <h5>
                        <i class="fa-regular fa-lightbulb text-light">&nbsp;</i>
                        <u>Useful</u> <u>Links</u>
                    </h5>
                    <br>
                    <span class="text-smalladi">
                        <a href="Refundpolicies.php" class="nav-link">
                            Refund Policy <br>
                        </a>
                        <a href="Termsconditions.php" class="nav-link">
                            Terms & Conditions <br>
                        </a>
                        <a href="Privacypolicy.php" class="nav-link">
                            Privacy Policy <br>
                        </a>
                        <!-- <a href="" class="nav-link"> -->
                        Promo Codes <br>
                        <!-- </a> -->
                    </span>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5 py-3">
                    <h5 class=""><br>
                        <i class="fa fa-indian-rupee-sign text-mediumadi">&nbsp;</i>
                        <u>Payment</u> <u>Methods</u>
                    </h5>
                    <br>

                    <div class="row pe-5 pe-sm-0 pe-xs-0">
                        <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-3 pt-3">
                            <button type="button" class="btn p-0">
                                <!-- <a href="" class="nav-link"> -->
                                <img src="img/Payment/Cash.png" data-bs-toggle="tooltip" title="Cash on Delivery Available" class="img-fluid" width="50vw" alt="">
                                <!-- </a> -->
                            </button>
                        </div>
                        <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-3 pt-3">
                            <button type="button" class="btn p-0">
                                <!-- <a href="" class="nav-link"> -->
                                <img src="img/Payment/Bhimbtn.jpg" data-bs-toggle="tooltip" title="payment with Bhim will br available at Pay on Delivery" class="img-fluid rounded-1" width="50vw" alt="">
                                <!-- </a> -->
                            </button>
                        </div>
                        <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-3 pt-3">
                            <button type="button" class="btn p-0">
                                <!-- <a href="" class="nav-link"> -->
                                <img src="img/Payment/Gpay.png" data-bs-toggle="tooltip" title="payment with Gpay will be available at Pay on Delivery" class="img-fluid" width="50vw" alt="">
                                <!-- </a> -->
                            </button>
                        </div>
                        <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-3 pt-3">
                            <button type="button" class="btn p-0">
                                <!-- <a href="" class="nav-link"> -->
                                <img src="img/Payment/Paytm.png" data-bs-toggle="tooltip" title="payment with Paytm will be available at Pay on Delivery" class="img-fluid" width="50vw" alt="">
                                <!-- </a> -->
                            </button>
                        </div>
                        <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-3 pt-3">
                            <button type="button" class="btn p-0">
                                <!-- <a href="" class="nav-link"> -->
                                <img src="img/Payment/amazonpaybtn.jpg" data-bs-toggle="tooltip" title="payment with Amazon-Pay will be available at Pay on Delivery" class="img-fluid rounded-1" width="50vw" alt="">
                                <!-- </a> -->
                            </button>
                        </div>
                        <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-3 pt-3">
                            <button type="button" class="btn p-0">
                                <!-- <a href="" class="nav-link"> -->
                                <img src="img/Payment/UPI.png" data-bs-toggle="tooltip" title="payment with UPI will be available at Pay on Delivery" class="img-fluid" width="50vw" alt="">
                                <!-- </a> -->
                            </button>
                        </div>
                        <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-3 pt-3">
                            <button type="button" class="btn p-0">
                                <!-- <a href="" class="nav-link"> -->
                                <details>
                                    <summary class="text-light">
                                        <img src="img/Payment/Adiaxpay.png" class="img-fluid" width="50vw" alt="">
                                    </summary>
                                    <p class="text-light">If you don't have money for minimum costing food you can
                                        contact us directly without any Hesitation</p>
                                </details>
                                <!-- </a> -->
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 py-3"><br>
                    <h5>
                        @ <u>Connect</u> <u>With</u> <u>Us</u>
                    </h5>
                    <br>
                    <span class="text-mediumadi">
                        <a href="mailto:pateladitya130102@gmail.com" class="nav-link">
                            pateladitya130102@gmail.com
                        </a>
                    </span>
                    <br>
                    <div class="row">
                        <div class="col-2">
                            <a href="tel:+91 9427178733" title="Contact number">
                                <i class="fa fa-phone text-light"></i>
                            </a>
                        </div>
                        <div class="col-2">
                            <a href="whatsappadi.php" title="Whatsapp">
                                <i class="fa fa-whatsapp text-light"></i>
                            </a>
                        </div>
                        <div class="col-2">
                            <a href="https://www.instagram.com/pateladitya_1301/" title="Instagram">
                                <i class="fa fa-instagram text-light"></i>
                            </a>
                        </div>
                        <div class="col-2">
                            <a href="https://github.com/Adi130102" title="Github">
                                <i class="fa fa-github text-light"></i>
                            </a>
                        </div>
                        <div class="col-2">
                            <a href="https://www.linkedin.com/in/adityapatel130102/" title="linkedin">
                                <i class="fa fa-linkedin text-light"></i>
                            </a>
                        </div>
                        <div class="col-2">
                            <a href="https://www.snapchat.com/add/adityapatel_13" title="Snapchat">
                                <i class="fa-brands fa-snapchat text-light" style="font-weight: bold;"></i>
                            </a>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </section>

    <!-- Upper Footer Section Ended -->


    <hr class="p-0 m-0">

    <!-- Footer Section Started -->
    <section class="footer">
        <div class="bottom-footer text-light">
            <div class="row py-3 linear-gradient2adi">
                <div class="col-12 col-lg-3 col-md-3 col-sm-3 text-center">
                    <img src="img/logo.png" width="130vw" class="img-thumbnail img-fluid bg-transparent border-0" alt="" data-bs-toggle="tooltip" title="Adiax - Order Food Online">
                </div>
                <div class="col-12 col-lg-9 col-md-9 col-sm-9 text-light text-center py-3 fst-italic">
                    &copy; Adiax Online Food. All right reserved. Designed & Developed by Aditya Patel-2023
                </div>
            </div>
        </div>
    </section>
    <!-- Footer Section Started -->

    <?php
    if (isset($_SESSION['logged_in'])) {
        echo "<script>alert('Welcome $_SESSION[username] to Adiax - Online Food Ordering System');</>";
    }
    ?>
    <!-- </form> -->

    <!-- Bootstrap Javascript bootstrap@5.3.0-alpha1 js -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></> -->
</body>

</html>
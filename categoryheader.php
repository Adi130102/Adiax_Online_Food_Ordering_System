
<!DOCTYPE html>
<html lang="en">

<head>
    <!--<title>categoryheader.php</title>-->
</head>
<!-- I have removed everything from the head section because it was making error when the categoryheader.php was called on other page -->


<body>
<?php include('Connection.php'); ?>
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
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Responsive toggler button for main navbar -->

                <!-- collapsible main navbar Starts-->
                <div class="collapse navbar-collapse justify-content-center" id="collapsiblenavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link text-light text-smalladi">
                                Home
                            </a>
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
                                    <!-- <li class="justify-content-center dropdown-item"><a href="DelieveryAgents.php" class="text-danger text-smalladi">Delievery Agents</a></li>
                                    <li class="justify-content-center dropdown-item"><a href="DonateUs.php" class="text-danger text-smalladi">Donate Us</a></li>
                                    <li class="justify-content-center dropdown-item"><a href="Managing_Director(MD).php" class="text-danger text-smalladi">Our's M.D.</a></li> -->
                                    <a href="DeliveryAgents.php" class=" text-danger text-smalladi">
                                        <li class="justify-content-center dropdown-item text-danger">Delivery Agents</li>
                                    </a>
                                    <a href="DonateUs.php" class=" text-danger text-smalladi">
                                        <li class="justify-content-center dropdown-item text-danger">Donate Us</li>
                                    </a>
                                    <a href="Managing_Director(MD).php" class=" text-danger text-smalladi">
                                        <li class="justify-content-center dropdown-item text-danger">Our's M.D.</li>
                                    </a>
                                </ul>
                            </div>
                        </li>

                        <!-- <li class="nav-item">
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-bs-toggle="dropdown">
                                    Our&nbsp;Services
                                </button>
                                <ul class="dropdown-menu">
                                    <li class="justify-content-center dropdown-item"><a href="#" class="text-danger text-smalladi">Our's Special</a></li>
                                    <li class="justify-content-center dropdown-item"><a href="#" class="text-danger text-smalladi">Breakfast</a></li>
                                    <li class="justify-content-center dropdown-item"><a href="#" class="text-danger text-smalladi">Lunch</a></li>
                                    <li class="justify-content-center dropdown-item"><a href="#" class="text-danger text-smalladi">Dinner</a></li>
                                </ul>
                            </div>
                        </li> -->
                    </ul>
                </div>
                <!-- Collapsible main navbar Ends -->


                <!-- Responsive for symbolic items Starts -->
                <div class="collapse navbar-collapse justify-content-end pe-xxl-5" id="collapsiblenavbar">
                    <ul class="navbar nav justify-content-center">
                        <!-- <ul class="navbar-nav"> -->

                        <li class="nav-item text-light">
                            <div class="input-group input-group-sm bg-danger rounded">

                                <div class="dropdown">
                                    <button type="button" class="btn btn-outline-danger text-light dropdown-toggle text-smalladi" data-bs-toggle="dropdown">
                                        Category
                                    </button>
                                    <ul class="dropdown-menu">
                                        <a href="fastfood.php" class="text-danger text-smalladi">
                                            <li class="justify-content-center dropdown-item text-danger">Fast Food</li>
                                        </a>
                                        <a href="Southindianfood.php" class="text-danger text-smalladi">
                                            <li class="justify-content-center dropdown-item text-danger">South Indian Food</li>
                                        </a>
                                        <a href="Beverages.php" class="text-danger text-smalladi">
                                            <li class="justify-content-center dropdown-item text-danger">Beverages</li>
                                        </a>
                                        <a href="Desserts.php" class="text-danger text-smalladi">
                                            <li class="justify-content-center dropdown-item text-danger">Desserts</li>
                                        </a>
                                    </ul>
                                </div>

                                <!-- Sign in/out -->
                                <!-- <button type="button" class="btn btn-danger p-0 ">                                </button> -->

                                <!-- User Signin, Signup, signout Span Button Starts-->
                                <?php
                                if (isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] == true)) {
                                    $selectingtemporary = "SELECT * FROM registered_users WHERE `username`='$_SESSION[username]'";
                                    $resultofselectingtemporary = mysqli_query($conn, $selectingtemporary);
                                    $rowforsessionprofile = mysqli_fetch_assoc($resultofselectingtemporary);

                                ?>
                                    <span class="btn btn-outline-transparent text-light" data-bs-toggle="modal" data-bs-target="#logouttarget">
                                        <span class="Logbtn text-smalladi" id="logbtn">
                                            <?php
                                            echo "<i class='fa fa-user pe-2'></i>";
                                            // echo $_SESSION['username'];
                                            echo mb_substr($_SESSION['username'], 0, 1);
                                            ?>
                                        </span>
                                    </span>
                                <?php
                                } elseif (!isset($_SESSION['logged_in'])) {
                                ?>
                                    <span class="btn btn-outline-transparent text-light" data-bs-toggle="modal" data-bs-target="#logintarget">
                                        <span class="Logbtn" id="logbtn">
                                            <i class="fa fa-user pe-2"></i>
                                            <span class="loginname text-smalladi"></span>
                                        </span>
                                    </span>
                                <?php
                                } else {
                                ?>
                                    <span class="btn btn-outline-transparent text-light" data-bs-toggle="modal" data-bs-target="#logintarget">
                                        <span class="Logbtn" id="logbtn">
                                            <i class="fa fa-user pe-2"></i>
                                            <span class="loginname text-smalladi"></span>
                                        </span>
                                    </span>
                                <?php
                                }
                                ?>
                                <!-- </li> -->

                                <!-- <li class="nav-item text-light"> -->
                                <!-- Cart Button for Shopping-Cart -->
                                <button type="button" class="btn btn-danger p-0 ">
                                    <a href="mycart.php" class="nav-link my-auto text-smalladi">
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
                        </li>


                        <!-- User Signin, Signup, signout Span Button Ends-->
                        <!-- Log in Modal Starts -->
                        <form action="signin_signup.php" method="post">
                            <div class="modal fade" id="logintarget">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background:rgb(13,110,253);">
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
                                                    <a class="btn btn-outline-transparent text-dark text-smalladi" href="Forgot_Password.php">Forgot password ?</a>
                                                    <a class="btn btn-outline-transparent text-primary text-smalladi" data-bs-toggle="modal" data-bs-target="#signuptarget">Create new Account</a>
                                                    <!-- <a class="btn btn-outline-transparent text-primary text-smalladi" data-bs-toggle="modal" data-bs-target="#signuptarget">Create a new account</a> -->
                                                </div>
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
                        <!-- Log in Modal Ends -->
                        <!-- Sign up Modal Starts -->
                        <form action="signin_signup.php" method="post">
                            <div class="modal fade" id="signuptarget">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">User
                                                &nbsp;Sign&nbsp;Up</h1>
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
                        <!-- Sign up Modal Ends -->
                        <!-- Log out Modal Starts -->
                        <form action="logout.php" method="post">
                            <div class="modal fade" id="logouttarget">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <h1 class="modal-title fs-5 text-light text-center" id="exampleModalLabel">
                                                <center>
                                                    <?php echo $_SESSION['username']; ?>
                                                    &nbsp;&nbsp;Your
                                                    &nbsp;&nbsp;Profile
                                                </center>
                                            </h1>
                                            <button type="button" class="btn btn-light btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <br>
                                        <div class="modal-body mx-auto">
                                            <center>
                                                <!-- <h5 class="text-primary"><u>Your</u> <u>Profile</u></h5> -->
                                            </center>
                                            <!-- <br>
                            <br> -->
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


                        <!-- Sign in/out -->

                        <!-- </div> -->
                        <!-- </li> -->
                        <!-- </ul> -->
                        <!-- </div> -->


                    </ul>
                </div>
                <!-- Responsive for symbolic items Ends -->
            </nav>
        </div>
    </section>
    <!-- Navigation Section Ended -->

</body>

</html>
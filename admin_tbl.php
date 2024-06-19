
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Details</title>
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
                        <li class="nav-item">
                            <a class="nav-link text-white text-monotypecorsiva fs-3" href="index.php">
                                Welcome to Adiax - Online Food Ordering System
                            </a>
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



        <!-- breadcrumb starts -->
        <div class="container-fluid bg-light text-primary py-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="Admin.php" class="text-primary">Admin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Admin Details</li>
                </ol>
                <!-- <h3 class="text-center justify-content-center">
                Sign Up Details of Admin
            </h3> -->
            </nav>
        </div>
        <!-- breadcrumb Ends -->
        <!-- <hr> -->

        <h3 class="text-center justify-content-center">
            Details of Admin
        </h3>

        <div class="container-fluid">
            <a class="btn btn-outline-transparent text-primary text-mediumadi text-end" data-bs-toggle="modal" data-bs-target="#adminsignuptarget">Create New Account</a>
        </div>
        <!-- Sign up Modal Starts -->
        <form action="admin_signin.php" method="post">
            <div class="modal fade" id="adminsignuptarget">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Create
                                &nbsp;New&nbsp;Admin</h1>
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
                                        <i class="fa-solid fa-house"></i>
                                    </div>
                                    <input type="text" name="Address" class="form-control rounded-end" placeholder="Enter your Address " required>
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
                            <button type="submit" name="adminsignup" class="btn btn-success">Sign Up</button>
                            <!-- <button type="submit" class="btn btn-warning">Sign up</button> -->
                            <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Sign up Modal Ends -->



        <br>
        <br>

        <div class="container-fluid">

            <table class="table table-striped table-hover text-center border">
                <thead>
                    <tr>
                        <th scope="col">Sr No.</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Account Created on</th>
                    </tr>
                </thead>
                <?php
                $sql = "SELECT * FROM admin_tbl ORDER BY datetime ASC";
                $result = mysqli_query($conn, $sql);
                $sr_no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tbody>
                        <tr>
                            <td scope="row"><?php echo $sr_no;  ?></td>
                            <td scope="row"><?php echo $row['fullname'] ?></td>
                            <td scope="row"><?php echo $row['username'] ?></td>
                            <td scope="row"><?php echo $row['email'] ?></td>
                            <td scope="row"><?php echo $row['Address'] ?></td>
                            <!-- <td scope="row"><?php //echo $row['password'] 
                                                    ?></td> -->
                            <td scope="row"><?php echo $row['datetime'] ?></td>
                        </tr>
                    <?php
                    $sr_no++;
                }
                    ?>
                    </tbody>
            </table>
        </div>

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
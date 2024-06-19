
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Food Ordered Details</title>
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
                    <li class="breadcrumb-item active" aria-current="page">Ordered Details</li>
                </ol>
                <h3 class="text-center justify-content-center">
                    Details of Orders Completed
                </h3>
            </nav>
        </div>
        <!-- breadcrumb Ends -->
        <!-- <hr> -->

        <br>

        <div class="container-fluid">

            <table class="table table-striped table-hover text-center border border-5">
                <thead>
                    <tr>
                        <th scope="col">Sr No.</th>
                        <th scope="col">food_ord_id</th>
                        <th scope="col">food_item</th>
                        <th scope="col">food_qty</th>
                        <th scope="col">food_price</th>
                        <th scope="col">food_ord_time</th>
                    </tr>

                </thead>
                <!-- <?php
                // $sql = "SELECT food_ordered.food_ord_id, food_ordered.food_item, food_ordered.food_qty, food_ordered.food_price, food_ordered.food_ord_time, food_payment.pay_ID, food_payment.username, food_payment.email, food_payment.pay_amount, food_payment.pay_datetime FROM food_ordered INNER JOIN food_payment ON food_ordered.food_ord_id = food_payment.pay_ID where food_ordered.food_ord_id=food_payment.pay_ID;";
                // $result = mysqli_query($conn, $sql);
                // $row = mysqli_fetch_assoc($result);
                ?> -->

                <?php

                $sql = "SELECT * FROM food_ordered";
                $result = mysqli_query($conn, $sql);
                $sr_no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tbody>
                        <tr>
                            <td scope="row"><?php echo $sr_no; ?></td>
                            <td scope="row"><?php echo $row['food_ord_id'] ?></td>
                            <td scope="row"><?php echo $row['food_item'] ?></td>
                            <td scope="row"><?php echo $row['food_qty'] ?></td>
                            <td scope="row"><?php echo $row['food_price'] ?></td>
                            <td scope="row"><?php echo $row['food_ord_time'] ?></td>
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
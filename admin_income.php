
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Payment Details</title>
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
                    <li class="breadcrumb-item active" aria-current="page">Food Payment Details</li>
                </ol>
                <h3 class="text-center justify-content-center">
                    Food Payment Details
                </h3>
            </nav>
        </div>
        <!-- breadcrumb Ends -->
        <!-- <hr> -->

        <!-- <h3 class="text-center justify-content-center text-primary bg-light">
            Food Payment Details
        </h3> -->

        <br>

        <div class="container-fluid">

            <table class="table table-striped table-hover text-center border">
                <thead>
                    <tr>
                        <th scope="col">Sr No.</th>
                        <th scope="col">pay_ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">pay_amount</th>
                        <th scope="col">pay_datetime</th>
                    </tr>
                </thead>
                <?php
                $sql = "SELECT * FROM food_payment ORDER BY pay_ID ASC";
                $result = mysqli_query($conn, $sql);
                $sr_no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tbody>
                        <tr>
                            <td scope="row"><?php echo $sr_no;  ?></td>
                            <td scope="row"><?php echo $row['pay_ID'] ?></td>
                            <td scope="row"><?php echo $row['username'] ?></td>
                            <td scope="row"><?php echo $row['email'] ?></td>
                            <td scope="row"><?php echo $row['pay_amount'] ?></td>
                            <td scope="row"><?php echo $row['pay_datetime'] ?></td>
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
<?php
session_start();
include('Connection.php');

if (isset($_POST['submitupdate'])) {

    $pid = $_GET['product_id'];
    $pname = $_POST['product_name'];
    $ptype = $_POST['product_type'];
    $pprice = $_POST['product_price'];

    $updatefilename = $_FILES['product_image']['name'];
    $updatetmp_name = $_FILES['product_image']['tmp_name'];
    $updatefolder = "images/" . $updatefilename;

    if (file_exists("images/" . $updatefilename)) {
        unlink("images/" . $updatefilename);
    }

    if (move_uploaded_file($updatetmp_name, $updatefolder)) {
        echo "Image file updated successfully.";
    } else {
        echo "Failed to update the image file.";
    }

    $sql = "UPDATE `food_product` SET `product_name`='$pname', `product_type`='$ptype', `product_price`='$pprice', `product_image`='$updatefolder' WHERE `product_id`='$pid';";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $row_affected = mysqli_affected_rows($conn);
        echo "<script>alert('Database Updated and $row_affected rows affected.');
        window.location.href='AdminProducts_Categories.php';
        </script>";
    } else {
        echo "<script>alert('Not updated.');</script>";
    }
}
?>

<!-- Rest of the HTML code remains the same -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Products</title>
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

<body class="overflow-x-hidden">

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
                            <a class="nav-link text-white text-monotypecorsiva fs-2" href="index.php">
                                Welcome to Adiax - Online Food Ordering System
                                <!-- Details of Products -->
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid linear-gradient2adi text-end text-white">
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
                    <li class="breadcrumb-item active" aria-current="page">Update Product Details</li>
                </ol>
            </nav>
            <h3 class="text-center">Update Product Details</h3>
        </div>
        <!-- breadcrumb Ends -->
    <?php
    }
    ?>
    <?php
    $pid = $_GET['product_id'];
    // echo $product_id;
    $sql = "SELECT * FROM `food_product` WHERE `product_id`= '$pid'";
    // echo $sql;
    $sqlquery = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($sqlquery); {
    ?>
        <div class="container-fluid mt-5">
            <form action="edit_user.php?product_id=<?php echo $pid ?>" method="POST" enctype="multipart/form-data">
                <div class="row mx-1 justify-content-center">
                    <div class="col-lg-2 col-md-2 col-sm-12 text-center">
                        <div class="input-group">
                            <div class="input-group-text">
                                product_id :
                            </div>
                            <input type="text" class="form-control" name="product_id" value="<?php echo $row['product_id'] ?>" disabled>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 mx-2 col-sm-12 text-center">
                        <div class="input-group">
                            <div class="input-group-text">
                                product_name :
                            </div>
                            <input type="text" class="form-control" name="product_name" value="<?php echo $row['product_name'] ?>">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                        <div class="input-group">
                            <div class="input-group-text">
                                product_type :
                            </div>
                            <input type="text" class="form-control" name="product_type" value="<?php echo "$row[product_type]"; ?>">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 text-center mt-5 ms-1">
                        <div class="input-group">
                            <div class="input-group-text">
                                product image :
                            </div>
                            <input type="file" class="form-control" name="product_image" value="<?php echo "$row[product_image]"; ?>" required>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 text-center mt-5 me-1">
                        <div class="input-group">
                            <div class="input-group-text">
                                product_price :
                            </div>
                            <input type="text" class="form-control" name="product_price" value="<?php echo $row['product_price'] ?>">
                        </div>
                    </div>
                    <div class="col-12 justify-content-center text-center mt-5">
                        <button type="submit" class="btn btn-success me-5" name="submitupdate">Update</button>
                        <button class="btn btn-danger ms-5" onclick="window.location.href='AdminProducts_Categories.php'">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    <?php
    }


    ?>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adiax-Beverages Category</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="AdiPersonalBootstrap/bootstrap.min.css">
    <!-- Bootstrap JS -->
    <script src="AdiPersonalBootstrap/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome icons-->
    <script src="AdiPersonalBootstrap/fontAdi.js"></script>
    <!-- Local CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="adi.css"> -->
</head>

<body>
<?php include('sessioncart.php') ?>
<?php include('categoryheader.php') ?>
    <!-- breadcrumb starts -->
    <div class="container-fluid bg-light text-primary py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php" class="text-primary">Home</a></li>
                <li class="breadcrumb-item"><a href="Menu.php" class="text-primary">Menu</a></li>
                <li class="breadcrumb-item active" aria-current="page">Beverages</li>
            </ol>
        </nav>
    </div>
    <!-- breadcrumb Ends -->


    <section class="category">
        <h2 class="text-center fst-italic fw-bolder text-monotypecorsiva"><u class="shadow">Our's</u> <u class="shadow">Beverages</u></h2>

        <!-- Beverages direct implementation coding Started -->
        <div class="row g-5 my-auto mx-auto">
            <?php
            $sqlproduct = "SELECT * FROM `food_product` WHERE `product_type`='Beverages'";
            $sqlproductquery = mysqli_query($conn, $sqlproduct);
            while ($row = mysqli_fetch_assoc($sqlproductquery)) {

            ?>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 justify-content-center">
                    <!-- <a href="$row['product_image'].php" class="nav-link"> -->
                    <a href="<?php echo $row['product_name']; ?>.php" class="nav-link">

                        <div class="card text-center cardadimenu shadow">
                            <div class="inner">
                                <img src="<?php echo $row['product_image']; ?>" class="img-fluid img-thumbnail imgadi object-fit-contain border-0" height="250px" width="auto" alt="">
                            </div>
                            <div class="card-body">
                                <h6 class="card-title flex"><?php echo $row['product_name']; ?></h6>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>

        </div>
        <!-- Beverages direct implementation coding Ended -->
        <br><br>
    </section>
</body>
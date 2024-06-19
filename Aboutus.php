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

    <!-- breadcrumb starts -->
    <div class="container-fluid bg-light text-primary py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php" class="text-primary">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">AboutUs</li>
            </ol>
        </nav>
    </div>
    <!-- breadcrumb Ends -->




    <!-- About US Section Started -->
    <Section class="Aboutus py-2 shadow">
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
</body>

</html>
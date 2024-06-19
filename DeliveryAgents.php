
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adiax-Delivery Agents - Order Food Online</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="AdiPersonalBootstrap/bootstrap.min.css">
    <!-- Bootstrap JS -->
    <script src="AdiPersonalBootstrap/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome icons-->
    <script src="AdiPersonalBootstrap/fontAdi.js"></script>
    <!-- Bootstrap CSS bootstrap@5.3.0-alpha1 -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- Bootstrap Javascript bootstrap@5.3.0-alpha1 js -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->
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
                <li class="breadcrumb-item active" aria-current="page">Delivery Agents</li>
            </ol>
            <h3 class="text-center justify-content-center">
                Delivery Agents

            </h3>
        </nav>
    </div>
    <!-- breadcrumb Ends -->

    <div class="container text-center bg-light">
        <!-- <h3 class="text-center justify-content-center text-primary"> Be our Rider's </h3> -->
        <h2 class="text-center justify-content-center text-danger text-gabriola">
            <a href="https://forms.gle/VTTZLRriKa1XDNdB6" target="_blank" class="nav-link text-center justify-content-center text-danger text-gabriola">
                To be our Rider's Kindly fill a form by clicking on this line
            </a>
        </h2>
        <div class="container text-center bg-light">
        </div>
    </div>


    <div class="container-fluid d-flex flex-wrap mx-auto justify-content-center py-3">
        <div class="card text-center shadow my-3">
            <div class="inner pt-2">
                <img src="img/Customers.png" class="img-fluid img-thumbnail object-fit-contain border-0" height="50px" width="auto" alt="">
            </div>
            <div class="card-body">
                <h2 class="card-title product text-gabriola text-danger">2 Lakh +</h2>
                <h6 class="card-title product">Happy Customers</h6>
            </div>
        </div>
        <div class="card text-center shadow mx-2 my-3">
            <div class="inner">
                <img src="img/partners.png" class="img-fluid img-thumbnail object-fit-contain border-0" height="50px" width="auto" alt="">
            </div>
            <div class="card-body">
                <h2 class="card-title product text-gabriola text-danger">2 Lakh +</h2>
                <h6 class="card-title product">Happy Partners</h6>
            </div>
        </div>
        <div class="card text-center shadow my-3">
            <div class="inner">
                <img src="img/Delievery Agents.webp" width="300vw" alt="">
            </div>
        </div>
        <div class="card text-center shadow mx-2 my-3">
            <div class="inner">
                <img src="img/delieveries.png" class="img-fluid img-thumbnail object-fit-contain border-0" height="50px" width="auto" alt="">
            </div>
            <div class="card-body">
                <h2 class="card-title product text-gabriola text-danger">10 Crore +</h2>
                <h6 class="card-title product">Happy deliveries</h6>
            </div>
        </div>
        <div class="card text-center shadow my-3">
            <div class="inner">
                <img src="img/womenPartners.png" class="img-fluid img-thumbnail object-fit-contain border-0" height="50px" width="auto" alt="">
            </div>
            <div class="card-body">
                <h2 class="card-title product text-gabriola text-danger">1000 +</h2>
                <h6 class="card-title product">Women Delivery Partners</h6>
            </div>
        </div>
    </div>

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adiax-Fast Food - Order Food Online</title>
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

<body class="overflowxadi">
<?php
include('sessioncart.php');
include('categoryheader.php');
?>
    <!-- <form action="" method=""> -->
    <!-- Category Section Started -->
    <section class="category mt-5 pt-5">
        <h3 class="text-center fst-italic fw-bolder"><u class="shadow">Our's</u>&nbsp;&nbsp;<u class="shadow">Fast</u>&nbsp;&nbsp;<u class="shadow">Fast</u></h3>
        <div class="row g-5 my-auto mx-auto product-list">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 justify-content-center" data-bs-toggle="tooltip" title="Pizza">
                <a href="pizza.php" class="nav-link">
                    <div class="card text-center cardadimenu shadow">
                        <!-- cardadimenu class is used for card layout size of menu page only -->
                        <div class="inner">
                            <img src="img/Adiax-pizzium/Pizza/Premium Pizza/Farm Villa Pizza.jpeg" class="img-fluid img-thumbnail imgadi object-fit-contain border-0" height="250px" width="auto" alt="">
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
                        <!-- cardadimenu class is used for card layout size of menu page only -->
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
                        <!-- cardadimenu class is used for card layout size of menu page only -->
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
                        <!-- cardadimenu class is used for card layout size of menu page only -->
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
                        <!-- cardadimenu class is used for card layout size of menu page only -->
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
                        <!-- cardadimenu class is used for card layout size of menu page only -->
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
                        <!-- cardadimenu class is used for card layout size of menu page only -->
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
                        <!-- cardadimenu class is used for card layout size of menu page only -->
                        <div class="inner">
                            <img src="img/Adiax-pizzium/Quesadillas/Cheese Olives Quesadillas.jpeg" class="img-fluid img-thumbnail imgadi" alt="">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title product">Quesadillas</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 product-list" data-bs-toggle="tooltip" title="Tacos">
                <a href="Tacos.php" class="nav-link">
                    <div class="card text-center cardadimenu shadow">
                        <!-- cardadimenu class is used for card layout size of menu page only -->
                        <div class="inner">
                            <img src="img/Adiax-pizzium/Tacos/Tacos.png" class="img-fluid img-thumbnail imgadi" alt="">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title product">Tacos</h6>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <!-- Category Section Ended -->
    <br><br><br>

    <!-- </form> -->
</body>

</html>
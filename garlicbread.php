
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adiax-Garlic Bread Category</title>
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
<?php
include('sessioncart.php');
include('categoryheader.php');
?>
    <!-- breadcrumb starts -->
    <div class="container-fluid bg-light text-primary pt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php" class="text-primary">Home</a></li>
                <li class="breadcrumb-item"><a href="Menu.php" class="text-primary">Menu</a></li>
                <li class="breadcrumb-item active" aria-current="page">Garlic-Bread</li>
            </ol>
        </nav>
    </div>
    <!-- breadcrumb Ends -->



    <section class="category">
        <h3 class="text-center fst-italic fw-bolder text-monotypecorsiva"><u class="shadow">Our's</u>&nbsp;&nbsp;<u class="shadow">Garlic Breads</u>&nbsp;&nbsp;<u class="shadow">&</u>&nbsp;&nbsp;<u class="shadow">Sticks</u>&nbsp;&nbsp;</h3>
        <!-- <br> -->

        <!-- Garlic Breads Started -->
        <div class="row g-5 my-auto mx-auto">
            <?php
            $sqlproduct = "SELECT * FROM `food_product` WHERE `product_type`='Garlic Bread'";
            $sqlproductquery = mysqli_query($conn, $sqlproduct);
            while ($row = mysqli_fetch_assoc($sqlproductquery)) {
            ?>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 justify-content-center">
                    <!-- <form action="mycart.php" method="post"> -->
                    <form action="Manage_Cart.php" method="post">
                        <div class="card text-center cardadi shadow">
                            <div class="inner">
                                <img src="<?php echo $row['product_image']; ?>" class="img-fluid img-thumbnail imgadi object-fit-contain border-0" height="250px" width="auto" alt="">
                            </div>
                            <div class="card-body">
                                <h6 class="card-title flex"><?php echo $row['product_name']; ?></h6>
                                <p class="card-text"><?php echo $row['product_price']; ?>₹</p>
                                <button type="Submit" name="Add_to_cart" class="btn btn-sm btn-md btn-lg btn-outline-success">Add to Cart</button>
                                <input type="hidden" name="Item_name" <?php echo "value='$row[product_name]' "; ?>>
                                <input type="hidden" name="Price" <?php echo "value='$row[product_price]' "; ?>>
                                <input type="hidden" name="product_image" <?php echo "value='$row[product_image]' "; ?>>
                            </div>
                        </div>
                    </form>
                </div>
            <?php } ?>
        </div>
        <!-- <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 justify-content-center">
                <form action="Manage_Cart.php" method="post">
                    <div class="card text-center cardadi shadow">
                        <div class="inner">
                            <img src="img/Adiax-pizzium/Garlic Breads/Supreme Garlic Bread.jpeg" class="img-fluid img-thumbnail imgadi object-fit-contain border-0" height="250px" width="auto" alt="">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title flex">Supreme Garlic Bread</h6>
                            <p class="card-text">Price : 250₹</p>
                            <button type="Submit" name="Add_to_cart" class="btn btn-sm btn-md btn-lg btn-outline-success">Add to Cart</button>
                            <input type="hidden" name="Item_name" value="Supreme Garlic Bread">
                            <input type="hidden" name="Price" value="250₹">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 justify-content-center">
                <form action="Manage_Cart.php" method="post">
                    <div class="card text-center cardadi shadow">
                        <div class="inner">
                            <img src="img/Adiax-pizzium/Garlic Breads/Cheesy Garlic Bread.jpeg" class="img-fluid img-thumbnail imgadi object-fit-contain border-0" height="250px" width="auto" alt="">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title flex">Cheesy Garlic Bread</h6>
                            <p class="card-text">Price : 250₹</p>
                            <button type="Submit" name="Add_to_cart" class="btn btn-sm btn-md btn-lg btn-outline-success">Add to Cart</button>
                            <input type="hidden" name="Item_name" value="Cheesy Garlic Bread">
                            <input type="hidden" name="Price" value="250₹">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 justify-content-center">
                <form action="Manage_Cart.php" method="post">
                    <div class="card text-center cardadi shadow">
                        <div class="inner">
                            <img src="img/Adiax-pizzium/Garlic Breads/Plain Garlic Bread.jpeg" class="img-fluid img-thumbnail imgadi object-fit-contain border-0" height="250px" width="auto" alt="">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title flex">Plain Garlic Bread</h6>
                            <p class="card-text">Price : 250₹</p>
                            <button type="Submit" name="Add_to_cart" class="btn btn-sm btn-md btn-lg btn-outline-success">Add to Cart</button>
                            <input type="hidden" name="Item_name" value="Plain Garlic Bread">
                            <input type="hidden" name="Price" value="250₹">
                        </div>
                    </div>
                </form>
            </div> -->
        </div>
        <!-- Garlic Breads Ended -->
    </section>

    <!-- <section class="category pt-4">
        <h3 class="text-center fst-italic fw-bolder text-monotypecorsiva"><u class="shadow">Our's</u>&nbsp;&nbsp;<u class="shadow">Garlic Breads</u>&nbsp;&nbsp;<u class="shadow">&</u>&nbsp;&nbsp;<u class="shadow">Sticks</u>&nbsp;&nbsp;</h3> -->
    <!-- <br> -->

    <!-- Garlic Breads Started -->
    <!-- <h3 class="px-5 pt-4">
            Garlic Breads
        </h3> -->
    <!-- <div class="row g-5 my-auto mx-auto">
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 justify-content-center">
                <form action="Manage_Cart.php" method="post">
                    <div class="card text-center cardadi shadow">
                        <div class="inner">
                            <img src="img/Adiax-pizzium/Garlic Breads/Paneer Tikka Garlic Bread.jpeg" class="img-fluid img-thumbnail imgadi object-fit-contain border-0" height="250px" width="auto" alt="">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title flex">Paneer Tikka Garlic Bread</h6>
                            <p class="card-text">Price : 250₹</p>
                            <button type="Submit" name="Add_to_cart" class="btn btn-sm btn-md btn-lg btn-outline-success">Add to Cart</button>
                            <input type="hidden" name="Item_name" value="Paneer Tikka Garlic Bread">
                            <input type="hidden" name="Price" value="250₹">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 justify-content-center">
                <form action="Manage_Cart.php" method="post">
                    <div class="card text-center cardadi shadow">
                        <div class="inner">
                            <img src="img/Adiax-pizzium/Garlic Breads/Supreme Garlic Bread.jpeg" class="img-fluid img-thumbnail imgadi object-fit-contain border-0" height="250px" width="auto" alt="">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title flex">Supreme Garlic Bread</h6>
                            <p class="card-text">Price : 250₹</p>
                            <button type="Submit" name="Add_to_cart" class="btn btn-sm btn-md btn-lg btn-outline-success">Add to Cart</button>
                            <input type="hidden" name="Item_name" value="Supreme Garlic Bread">
                            <input type="hidden" name="Price" value="250₹">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 justify-content-center">
                <form action="Manage_Cart.php" method="post">
                    <div class="card text-center cardadi shadow">
                        <div class="inner">
                            <img src="img/Adiax-pizzium/Garlic Breads/Cheesy Garlic Bread.jpeg" class="img-fluid img-thumbnail imgadi object-fit-contain border-0" height="250px" width="auto" alt="">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title flex">Cheesy Garlic Bread</h6>
                            <p class="card-text">Price : 250₹</p>
                            <button type="Submit" name="Add_to_cart" class="btn btn-sm btn-md btn-lg btn-outline-success">Add to Cart</button>
                            <input type="hidden" name="Item_name" value="Cheesy Garlic Bread">
                            <input type="hidden" name="Price" value="250₹">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 justify-content-center">
                <form action="Manage_Cart.php" method="post">
                    <div class="card text-center cardadi shadow">
                        <div class="inner">
                            <img src="img/Adiax-pizzium/Garlic Breads/Plain Garlic Bread.jpeg" class="img-fluid img-thumbnail imgadi object-fit-contain border-0" height="250px" width="auto" alt="">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title flex">Plain Garlic Bread</h6>
                            <p class="card-text">Price : 250₹</p>
                            <button type="Submit" name="Add_to_cart" class="btn btn-sm btn-md btn-lg btn-outline-success">Add to Cart</button>
                            <input type="hidden" name="Item_name" value="Plain Garlic Bread">
                            <input type="hidden" name="Price" value="250₹">
                        </div>
                    </div>
                </form>
            </div>
        </div> -->
    <!-- Garlic Breads Ended -->

    <!-- <br> -->

    <!-- Garlic Sticks Started -->
    <!-- <h3 class="px-5 pt-4 pt-lg-5 mt-lg-5">
            Garlic Sticks
        </h3>
        <div class="row g-5 my-auto mx-auto">
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 justify-content-center">
                <form action="Manage_Cart.php" method="post">
                    <div class="card text-center cardadi shadow">
                        <div class="inner">
                            <img src="img/Adiax-pizzium/Garlic Breads/Paneer Stuffed Garlic Bread.jpeg" class="img-fluid img-thumbnail imgadi object-fit-contain border-0" height="250px" width="auto" alt="">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title flex">Paneer Stuffed Garlic Bread</h6>
                            <p class="card-text">Price : 250₹</p>
                            <button type="Submit" name="Add_to_cart" class="btn btn-sm btn-md btn-lg btn-outline-success">Add to Cart</button>
                            <input type="hidden" name="Item_name" value="Paneer Stuffed Garlic Bread">
                            <input type="hidden" name="Price" value="250₹">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 justify-content-center">
                <form action="Manage_Cart.php" method="post">
                    <div class="card text-center cardadi shadow">
                        <div class="inner">
                            <img src="img/Adiax-pizzium/Garlic Breads/Corn Stuffed Garlic Bread.jpeg" class="img-fluid img-thumbnail imgadi object-fit-contain border-0" height="250px" width="auto" alt="">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title flex">Corn Stuffed Garlic Bread</h6>
                            <p class="card-text">Price : 250₹</p>
                            <button type="Submit" name="Add_to_cart" class="btn btn-sm btn-md btn-lg btn-outline-success">Add to Cart</button>
                            <input type="hidden" name="Item_name" value="Corn Stuffed Garlic Bread">
                            <input type="hidden" name="Price" value="250₹">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 justify-content-center">
                <form action="Manage_Cart.php" method="post">
                    <div class="card text-center cardadi shadow">
                        <div class="inner">
                            <img src="img/Adiax-pizzium/Garlic Breads/Garlic Bread Sticks.jpeg" class="img-fluid img-thumbnail imgadi object-fit-contain border-0" height="250px" width="auto" alt="">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title flex">Garlic Bread Sticks</h6>
                            <p class="card-text">Price : 250₹</p>
                            <button type="Submit" name="Add_to_cart" class="btn btn-sm btn-md btn-lg btn-outline-success">Add to Cart</button>
                            <input type="hidden" name="Item_name" value="Garlic Bread Sticks">
                            <input type="hidden" name="Price" value="250₹">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 justify-content-center">
                <form action="Manage_Cart.php" method="post">
                    <div class="card text-center cardadi shadow">
                        <div class="inner">
                            <img src="img/Adiax-pizzium/Garlic Breads/Masala Galic Sticks.png" class="img-fluid img-thumbnail imgadi object-fit-contain border-0" height="250px" width="auto" alt="">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title flex">Masala Galic Sticks</h6>
                            <p class="card-text">Price : 250₹</p>
                            <button type="Submit" name="Add_to_cart" class="btn btn-sm btn-md btn-lg btn-outline-success">Add to Cart</button>
                            <input type="hidden" name="Item_name" value="Masala Galic Sticks">
                            <input type="hidden" name="Price" value="250₹">
                        </div>
                    </div>
                </form>
            </div>
        </div>
         -->
    <!-- Garlic Sticks Ended -->
    <br><br>
    </section>
</body>
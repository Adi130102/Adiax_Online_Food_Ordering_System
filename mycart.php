<?php
// include('loggout.php');
include('sessioncart.php');
include('categoryheader.php');
?>
<?php
// session_start();
// session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adiax-Cart - Order Food Online</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="AdiPersonalBootstrap/bootstrap.min.css">
    <!-- Bootstrap JS -->
    <script src="AdiPersonalBootstrap/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome icons-->
    <script src="AdiPersonalBootstrap/fontAdi.js"></script>
    <!-- Local CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="adi.css"> -->

    <!-- Sweet alerts -->
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->

</head>

<body>

    <!-- breadcrumb starts -->
    <div class="container-fluid text-primary py-2 bg-light">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php" class="text-primary">Home</a></li>
                <li class="breadcrumb-item"><a href="Menu.php" class="text-primary">Menu</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Cart</li>
            </ol>
        </nav>
    </div>
    <!-- breadcrumb Ends -->

    <?php
    if (isset($_SESSION['cart'])) {
        if (($_SESSION['cart']) && ($count > 0) == true) {
    ?>
            <div class="row mx-5">
                <h1 class="text-center bg-light text-dark py-0 text-monotypecorsiva"><u>My Cart</u></h1>

                <div class="col-lg-9 col-md-9 col-sm-12 py-5">
                    <table class="table border table-striped table-hover border-5 text-center">
                        <thead class="text-center">
                            <tr>
                                <td scope="col"><b>Sr no.</b></td>
                                <td scope="col"><b>Image</b></td>
                                <td scope="col"><b>Item name</b></td>
                                <td scope="col"><b>Price</b></td>
                                <td scope="col"><b>Quantity</b></td>
                                <td scope="col"><b>Total</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            if (isset($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $key => $value) {
                                    // print_r($_SESSION['cart']);
                                    // print_r($value);
                                    // print($value['Price']);
                                    $total = (((float)$total) + (float)$value['Price']); //Here float is used to convert the string value into float value
                                    // $total += $value['Price'];
                                    // echo $total;
                                    $sr = $key + 1;

                                    // $value['Price'] has ₹ symbol after the price eg 150₹
                                    // So it was making an error of NaN ()Not a Number
                                    // So I removed NaN with  below given function
                                    // So the actual function is preg_replace(patterns, replacements, input, limit, count)
                                    // Here I have used preg_replace(patterns, replacements, input);
                                    // Here I have used preg_replace(patterns, replacements, input);
                                    // The Special Character must be written in Delimiters;

                                    $value['Price'] = preg_replace("/₹/", "", $value['Price']);
                                    echo "
                                    <tr class='text-center'>
                                        <td class='text-center align-middle'>$sr</td>
                                        <td>
                                        "; ?>
                                    <img src="<?php echo $value['product_image']; ?>" class="object-fit-contain border-0 align-middle" height="50px" width="auto" alt="">
                            <?php
                                    echo "

                                        </td>
                                        <td class='text-center align-middle'>$value[Item_name]</td>
                                        <td class='text-center align-middle'>
                                            $value[Price]
                                            <input type='hidden' class='iprice' value='$value[Price]'>
                                        </td>
                                        <td class='text-center align-middle'>
                                        <form action='Manage_Cart.php' method='POST'>
                                            <input class='text-center iquantity' name='Changing_quantity' onchange='this.form.submit();' type='number' value='$value[Quantity]' min='1' max='100'>
                                            <input type='hidden' name='Item_name' value='$value[Item_name]'>
                                        </form>
                                        ";
                                    echo "
                                        </td>
                                        <td class='itotal text-center align-middle'></td>
                                        <td class='text-center align-middle'>
                                        <form action='Manage_Cart.php' method='POST'>
                                            
                                        <button name='remove_item'class='btn btn-sm btn-outline-danger'>Remove</button>
                                                <input type='hidden' name='Item_name' value='$value[Item_name]'>
                                            </form>
                                        </td>
                                    </tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 py-5">
                    <div class=" border border-5 bg-light text-center">
                        <h3 class="text-start m-3"> Total : </h3>
                        <span class="text-end text-dark fs-2" name="totalbill" id="GrandTotal"></span>

                        <span class="text-end text-dark fs-2">₹</span>
                        <br><br>
                        <!-- <button type="submit" name="Purchased_from_Addtocart" class="btn btn-block btn-success mb-3">Purchase</button> -->

                        <form action="payment.php" method="post">
                            <button type="submit" name="Purchased_from_Addtocart" onclick="alerta()" class="btn btn-block btn-success mb-3">Purchase</button>
                        </form>
                    </div>
                </div>
            </div>
            <script>
                var iprice = document.getElementsByClassName('iprice');
                var iquantity = document.getElementsByClassName('iquantity');
                var itotal = document.getElementsByClassName('itotal');
                var GrandTotal = document.getElementById('GrandTotal');
                var GT = 0;
                // $total = (((float)$total) + (float)$value['Price']); //Here float is used to convert the string value into float value

                function subtotal() {
                    GT = 0;
                    for (i = 0; i < iquantity.length; i++) {
                        itotal[i].innerText = (iprice[i].value) * (iquantity[i].value);
                        GT = GT + (iprice[i].value) * (iquantity[i].value);
                    }
                    GrandTotal.innerText = GT;
                };
                subtotal();

                function alerta() {
                    alert("You will be redirected to Payment Page");
                    window.open('invoiceindex.php', '_blank');
                };
            </script>
    <?php
        } else {
            echo "<div class='p-5 mx-5 my-5 border bg-primary bg-opacity-10 text-center'>";
            echo "<img src='img/Payment/emptyCart2.gif'>";
            // I have used this cart gif from following site : "https://icons8.com/icon/7ykGA0wEPoEb/shopping-cart"
            echo "<h3 class='mt-4'>Your Cart is empty!</h3>";
            // echo "<br><br><p>Click here to add items from menu</p>";
            echo "<br><a href='Menu.php'><button type='button' class='btn btn-primary text-light'>Shop Now</button></a></div>";
        }
    } else {
        echo "<div class='p-5 mx-5 my-5 border bg-primary bg-opacity-10 text-center'>";
        echo "<img src='img/Payment/emptyCart2.gif'>";
        echo "<h3 class='mt-4'>Your Cart is empty!</h3>";
        // echo "<br><br><p>Click here to add items from menu</p>";
        echo "<br><a href='Menu.php'><button type='button' class='btn btn-primary text-light'>Shop Now</button></a></div>";
    }
    ?>

</body>

</html>
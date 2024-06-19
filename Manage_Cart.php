<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adiax-Burger Category</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="AdiPersonalBootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="AdiPersonalBootstrap/bootstrap.css">
    <!-- Bootstrap JS -->
    <script src="AdiPersonalBootstrap/bootstrap.bundle.min.js"></script>
    <script src="AdiPersonalBootstrap/bootstrap.bundle.js"></script>
    <!-- Font Awesome icons-->
    <script src="AdiPersonalBootstrap/fontAdi.js"></script>
    <!-- Local CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="adi.css"> -->
</head>

<body>

    <?php
    // include('bootstrap_headerlinks.php');
    include('signin_signup.php');

    // This code is directly copied form index.php

    // if (isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] == true)) {
    //     $selectingtemporary = "SELECT * FROM registered_users WHERE `username`='$_SESSION[username]'";
    //     $resultofselectingtemporary = mysqli_query($conn, $selectingtemporary);
    //     $rowforsessionprofile = mysqli_fetch_assoc($resultofselectingtemporary);
    // }
    // This code is directly copied form index.php


    // if (isset($_SESSION['username'])) {
    // if ($_SESSION['username']) {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['Add_to_cart'])) {
            if (isset($_SESSION['cart'])) {

                $myitem = array_column($_SESSION['cart'], 'Item_name');

                if (in_array($_POST['Item_name'], $myitem)) {
                    echo "<script>
                        alert('Item Already Added !');
                        window.location.href='Menu.php';
                    </script>";
                } else {
                    $count = count($_SESSION['cart']);
                    $_SESSION['cart'][$count] = array('product_image' => $_POST['product_image'], 'Item_name' => $_POST['Item_name'], 'Price' => $_POST['Price'], 'Quantity' => 1);
                    echo "<script>
                        // alert('Item Added Successfully !');
                        window.location.href='Menu.php';
                    </script>";
                }
            } else {
                $_SESSION['cart'][0] = array('product_image' => $_POST['product_image'], 'Item_name' => $_POST['Item_name'], 'Price' => $_POST['Price'], 'Quantity' => 1);
                // $_SESSION['cart'][0]=array('Item_name' => $_POST['Item_name'], 'Price' => $_POST['Price'], 'Quantity' => 1);
                echo "<script>
                    // alert('Item Added Successfully !');
                    window.location.href='Menu.php';
                </script>";
            }
            // echo "<script>window.location.href='burger.php';</script>";
        }

        if (isset($_POST['remove_item'])) {
            foreach ($_SESSION['cart'] as $key => $value) {
                if ($value['Item_name'] == $_POST['Item_name']) {
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart'] = array_values($_SESSION['cart']);
                    echo "
                <script>
                    // alert('Item Remove Successfully !');
                    window.location.href='mycart.php';
                </script>
                    ";
                }
            }
        }

        if (isset($_POST['Changing_quantity'])) {
            foreach ($_SESSION['cart'] as $key => $value) {
                if ($value['Item_name'] == $_POST['Item_name']) {
                    $_SESSION['cart'][$key]['Quantity'] = $_POST['Changing_quantity'];
                    echo "
                <script>
                    window.location.href='mycart.php';
                </script>
                    ";
                }
            }
        }
    }
    // } elseif (!isset($_SESSION['username'])) {

    // elseif (!($_SESSION['username'])) 
    // {
    //     echo "<script> alert('You are not signed in');
    // window.location.href='Menu.php';
    // </script>";
    // } else {
    //     echo "<script> alert('You are not signed in or other error ! ');
    // window.location.href='Menu.php';
    // </script>";
    // } 
    ?>
</body>

</html>
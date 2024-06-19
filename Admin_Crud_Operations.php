

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Product & Categories</title>
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
    <!-- Insert Button functionality Starts -->
<?php
include('Connection.php');
session_start();
    if (isset($_POST['insertsubmit'])) {

        $filename = $_FILES['uploadfile']['name'];
        $tmp_name = $_FILES['uploadfile']['tmp_name'];
        $folder = "images/" . $filename;
        move_uploaded_file($tmp_name, $folder);

        $product_name_insert = $_POST['product_name_insert'];
        $product_type_insert = $_POST['product_type_insert'];
        $product_price_insert = $_POST['product_price_insert'];

        $insertSQL = "INSERT INTO `food_product` (`product_id`,`product_image`, `product_name`, `product_type`, `product_price`) VALUES (NULL, '$folder', '$product_name_insert', '$product_type_insert', '$product_price_insert');";

        $insertresult = mysqli_query($conn, $insertSQL);

        // print_r($insertresult);
        if ($insertresult) {
            echo "<script>
                alert('New Product Added Successfully');
                window.location.href='AdminProducts_Categories.php';
            </script>";
        } else {
            echo "<script>
                alert('Product is not Added');
                window.location.href='AdminProducts_Categories.php';
            </script>";
        }
    }
    ?>
    <!-- Insert Button functionality Starts -->


    <!-- Update Button functionality Starts -->
    <?php
    if (isset($_POST['updatesubmit'])) {

        $product_id_update = $_POST['product_id_update'];
        $product_name_update = $_POST['product_name_update'];
        $product_type_update = $_POST['product_type_update'];
        $product_price_update = $_POST['product_price_update'];

        $updatefilename = $_FILES['updateuploadfile']['name'];
        $updatetmp_name = $_FILES['updateuploadfile']['tmp_name'];
        $updatefolder = "images/" . $updatefilename;
        move_uploaded_file($updatetmp_name, $updatefolder);


        // To Update image file I will first update its value to null
        // Other fields will be updated except image file
        $updateSQL = "UPDATE `food_product` SET `product_image`= '$updatefolder', `product_name`='$_POST[product_name_update]', `product_type`='$_POST[product_type_update]', `product_price`='$_POST[product_price_update]' WHERE `product_id`='$_POST[product_id_update]'";
        $updateresult = mysqli_query($conn, $updateSQL);

        if ($updateresult) {
            echo "<script>
                alert('Product Details updated Successfully !..');
                window.location.href='AdminProducts_Categories.php';

            </script>";
        } else {
            echo "<script>
                alert('Unsuccessful attempt of update (:  !..');
                window.location.href='AdminProducts_Categories.php';
            </script>";
        }
    }
    ?>
    <!-- Update Button functionality Starts -->


    <!-- Delete Button functionality Starts -->
    <?php
    if (isset($_POST['deletesubmit'])) {

        $product_id_delete = $_POST['product_id_delete'];

        $deleteSQL = "DELETE FROM `food_product` WHERE `product_id`='$product_id_delete'";

        $deleteresult = mysqli_query($conn, $deleteSQL);

        if ($deleteresult) {
            echo "<script>
                alert('Product delete Successfully !..');
                window.location.href='AdminProducts_Categories.php';
            </script>";
        } else {
            echo "<script>
                alert('Unsuccessful attempt of deletion (:  !..');
                window.location.href='AdminProducts_Categories.php';
            </script>";
        }
    }
    ?>
    <!-- Delete Button functionality Starts -->


</body>

</html>

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


    <!-- Temp for pagination -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>

<body class="overflow-x-hidden">
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
                    <li class="breadcrumb-item active" aria-current="page">Food Product Details</li>
                </ol>
            </nav>
        </div>
        <!-- breadcrumb Ends -->


        <!-- PHP code for Pagination Started -->
        <?php
        include_once("Connection.php");
        $showRecordPerPage = 10;
        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $currentPage = $_GET['page'];
        } else {
            $currentPage = 1;
        }
        $startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
        $totalproductSQL = "SELECT * FROM food_product";
        $allproductResult = mysqli_query($conn, $totalproductSQL);
        $totalproduct = mysqli_num_rows($allproductResult);
        $lastPage = ceil($totalproduct / $showRecordPerPage);
        $firstPage = 1;
        $nextPage = $currentPage + 1;
        $previousPage = $currentPage - 1;
        $productSQL = "SELECT * FROM `food_product` LIMIT $startFrom, $showRecordPerPage";
        $productResult = mysqli_query($conn, $productSQL);
        ?>

        <!-- PHP code for Pagination Ended -->



        <!-- <div class="container-fluid bg-light"> -->
        <div class="row">
            <div class="container-fluid bg-light col-12 col-lg-4 col-md-4 col-sm-12">
                <nav class="navbar navbar-expand-sm navbar-dark justify-content-md-center justify-content-sm-center justifycenteradi">
                    <ul class="navbar-nav justify-content-sm-center justify-content-md-center justify-content-sm-center justifycenteradi">
                        <li class="nav-item">
                            <button type="button nav-link" class="btn btn-primary ms-3" data-bs-toggle="modal" data-bs-target="#exampleModalinsert">
                                Insert
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button nav-link" class="btn btn-warning text-white mx-3" data-bs-toggle="modal" data-bs-target="#exampleModalupdate">
                                Update
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button nav-link" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModaldelete">
                                Delete
                            </button>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="container-fluid bg-light col-12 col-lg-4 col-md-4 col-sm-12 text-end justify-content-end justify-content-sm-center">

                <h3 class="text-center text-primary justify-content-center">
                    Details of Products
                </h3>

            </div>
            <div class="container-fluid bg-light col-12 col-lg-4 col-md-4 col-sm-120">
                <nav class="navbar navbar-expand-sm navbar-dark justify-content-end justify-content-md-center justify-content-sm-center justify-content-xs-center">
                    <ul class="navbar-nav">
                        <li class="nav-item  mx-3">
                            <nav aria-label="Page navigation example align-middle">

                                <ul class="pagination justify-content-end justify-content-md-center justify-content-sm-center  justify-content-xs-center">
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?php echo $firstPage ?>" tabindex="-1" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <?php if ($currentPage >= 2) {
                                    ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?page=<?php echo $previousPage ?>">
                                                <?php echo $previousPage ?></a>
                                        </li>
                                    <?php } ?>
                                    <li class="page-item active"><a class="page-link" href="?page=<?php echo $currentPage ?>"><?php echo $currentPage; ?></a></li>
                                    <?php if ($currentPage != $lastPage) { ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?page=<?php echo $nextPage ?>"><?php echo $nextPage ?></a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="?page=<?php echo $lastPage ?>" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </nav>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        </div>


        <!-- Insert Modal Starts -->
        <form action="Admin_Crud_Operations.php" method="post" enctype="multipart/form-data">
            <!-- </form> -->
            <!-- <form action="Admin_Crud_Operations.php" method="post"> -->
            <div class="modal fade" id="exampleModalinsert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-light">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Insert any Food Product</h1>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body mx-auto">
                            <br>
                            <div class="container">
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <i class="fa-regular fa-image"></i>
                                    </div>
                                    <input type="file" name="uploadfile" class="form-control" required>
                                </div>
                                <br>
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <i class="fa-solid fa-pizza-slice"></i>
                                    </div>
                                    <input type="text" name="product_name_insert" class="form-control" placeholder="Enter Product Name" required>
                                </div>
                                <br>
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <i class="fa-solid fa-table-cells-large"></i>
                                    </div>
                                    <input type="text" name="product_type_insert" class="form-control" placeholder="Enter Product Type" required>
                                </div>
                                <br>
                                <!-- <div class="input-group">
                                    <div class="input-group-text">
                                        <i class="fa-solid fa-table-cells-large"></i>
                                    </div>
                                    <select>
                                        <options value="Pizza"class="form-select">Pizza</options>
                                        <options value="A">Garlic Breads</options>
                                        <options value="A">Burger</options>
                                        <options value="A">Pasta</options>
                                        <options value="A">Spaghetti</options>
                                        <options value="A">Hotdogs</options>
                                        <options value="A">Sandwiches</options>
                                        <options value="A">Quesadillas</options>
                                        <options value="A">Tacos</options>
                                        <options value="A">South Indian Food</options>
                                        <options value="A">Tea</options>
                                        <options value="A">Coffee</options>
                                        <options value="A">Milkshakes</options>
                                        <options value="A">Fruit Juices</options>
                                        <options value="A">Desserts</options>
                                    </select>
                                    <input type="text" name="product_type_insert" class="form-control" placeholder="Enter Product Type" required>
                                </div>
                                <br> -->
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <i class="fa-solid fa-indian-rupee-sign"></i>
                                    </div>
                                    <input type="text" name="product_price_insert" class="form-control" placeholder="Enter Product Price" required>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="modal-footer justify-content-evenly">
                            <button type="submit" name="insertsubmit" class="btn btn-success">Insert</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Insert Modal Ends -->

        <!-- Update Modal Starts -->
        <form action="Admin_Crud_Operations.php" method="post" enctype="multipart/form-data">
            <!-- </form> -->
            <!-- <form action="Admin_Crud_Operations.php" method="post"> -->
            <div class="modal fade" id="exampleModalupdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-light">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update any Food Product</h1>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <br>
                            <div class="container">
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <i class="fa-solid fa-hashtag"></i>
                                    </div>
                                    <input type="text" name="product_id_update" class="form-control" placeholder="Enter The OLD Product ID" required>
                                </div>
                                <br>
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <i class="fa-regular fa-image"></i>
                                    </div>
                                    <input type="file" name="updateuploadfile" class="form-control" required>
                                </div>
                                <br>
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <i class="fa-solid fa-pizza-slice"></i>
                                    </div>
                                    <input type="text" name="product_name_update" class="form-control" placeholder="Enter New Name of Product" required>
                                </div>
                                <br>
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <i class="fa-solid fa-table-cells-large"></i>
                                    </div>
                                    <input type="text" name="product_type_update" class="form-control" placeholder="Enter New type of Product type" required>
                                </div>
                                <br>
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <i class="fa-solid fa-indian-rupee-sign"></i>
                                    </div>
                                    <input type="text" name="product_price_update" class="form-control" placeholder="Enter New Price of Product Price" required>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="modal-footer justify-content-evenly">
                            <button type="submit" name="updatesubmit" class="btn btn-success">Update</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Update Modal Ends -->


        <!-- Delete Modal Starts -->
        <form action="Admin_Crud_Operations.php" method="post">
            <!-- </form> -->
            <!-- <form action="Admin_Crud_Operations.php" method="post"> -->
            <div class="modal fade" id="exampleModaldelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-light">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete any Food Product</h1>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <br>
                            <div class="container">
                                <br>
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <i class="fa-solid fa-hashtag"></i>
                                    </div>
                                    <input type="text" name="product_id_delete" class="form-control" placeholder="Enter The ID of Product to be Deleted" required>
                                </div>
                                <br>
                            </div>
                        </div>
                        <br>
                        <div class="modal-footer justify-content-evenly">
                            <button type="submit" name="deletesubmit" class="btn btn-danger">Delete</button>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Delete Modal Ends -->

        <br>

        <div class="conatiner-fluid">
            <table class="table display table-hover text-center border">
                <!-- <thead> -->
                <thead class="sticky-top bg-success text-light">

                    <tr>
                        <th>Sr No.</th>
                        <th>product_id</th>
                        <th>product_image</th>
                        <th>product_name</th>
                        <th>product_type</th>
                        <th>product_price</th>
                        <th scope="col" class="pe-4">
                            <i class="fa fa-pencil"></i>
                        </th>
                        <th scope="col">
                            <i class="fa fa-trash"></i>
                        </th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $srno = 1;
                    while ($product = mysqli_fetch_assoc($productResult)) {
                    ?>
                        <tr>
                            <td scope="row" class="align-middle"><?php echo $srno;  ?></td>
                            <td scope="row" class="align-middle"><?php echo $product['product_id'] ?></td>
                            <td scope="row" class="align-middle">
                                <img src="<?php echo $product['product_image']; ?>" height="100px" width="auto">
                            </td>
                            <td scope="row" class="align-middle"><?php echo $product['product_name'] ?></td>
                            <td scope="row" class="align-middle"><?php echo $product['product_type'] ?></td>
                            <td scope="row" class="align-middle"><?php echo $product['product_price'] ?></td>
                            <form action="edit_user.php" method="post" enctype="multipart/form-data">
                                <td class="align-middle"><?php echo "<a href='edit_user.php?product_id=$product[product_id]'" ?> class="fa fa-pencil text-success"></a></td>
                                <td class="align-middle"><a href="delete_user.php?product_id=<?php echo $product['product_id'] ?>" class="fa fa-trash text-danger"></a></td>

                            </form>

                        </tr>

                    <?php
                        $srno++;
                    }
                    ?>
                </tbody>
            </table>
        </div>


    <?php
    }
    ?>

    <?php
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
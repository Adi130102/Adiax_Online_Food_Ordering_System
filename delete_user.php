<?php
include "Connection.php";
$pid = $_GET['product_id'];
// if (isset($_SESSION['adminlogged_in']) && ($_SESSION['adminlogged_in'] == true)) {
if ($_GET['product_id']) {
    $deletesql = "DELETE FROM `food_product` WHERE `product_id`='$pid'";
    echo $deletesql;
    $query = mysqli_query($conn, $deletesql);
    // $result = mysqli_num_rows($query);
    if ($query) {
        echo "<script>alert('Product Deleted Successfully')
            window.location.href='AdminProducts_Categories.php';</script>";
    } else {
        echo "<script>alert('Attempt to delete failed');
            alert('Try to do it by manually clicking on delete button');
            window.location.href='AdminProducts_Categories.php';</script>";
    }
}
// }

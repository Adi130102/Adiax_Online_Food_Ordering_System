<?php
session_start();
if (isset($_SESSION['cart'])) {
    $count = count($_SESSION['cart']);
    // print_r($_SESSION['cart']);
}

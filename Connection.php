<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "food_ordering_system";
$servername = "localhost";
$username = "id21898162_aditya";
$password = "000webhostmayurAdityaAdi@12313011304";
$dbname = "id21898162_food_ordering_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  echo "<script>alert('Connection Failed');</script>";
  die("Connection failed: " . $conn->connect_error);
}

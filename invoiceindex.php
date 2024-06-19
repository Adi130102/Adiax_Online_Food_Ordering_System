<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adiax Invoice</title>
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
<?php
include('sessioncart.php');
include('categoryheader.php');
?>
    <?php

    echo "<center>";
    echo "<div class='p-5 m-5 border bg-primary bg-opacity-10 text-center'>";
    echo "<h1>Your Invoice is Generated & Downloaded</h1>";
    echo "<br><br>
            <p>Kindly Check your Download folder to get Invoice</p>";
    echo "<br><button id='myButton' class='btn btn-success text-light'>Invoice Downloaded</button>
        </div>";
    echo "</center> " ?>
    <!-- <button onclick="generateInvoice()">Generate and Download Invoice</button> -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var button = document.getElementById('myButton');
            // Your code here
            console.log("Button loaded!");
            generateInvoice();
        });

        function generateInvoice() {
            // Make an AJAX request to the PHP file that generates the PDF invoice
            var xhttp = new XMLHttpRequest();
            xhttp.open("GET", "invoice.php", true);
            xhttp.responseType = "blob";

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Create a download link for the generated PDF
                    var blob = new Blob([this.response], {
                        type: "application/pdf"
                    });
                    var url = window.URL.createObjectURL(blob);
                    var link = document.createElement("a");
                    link.href = url;
                    link.download = "invoice.pdf";
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                }
            };

            xhttp.send();
        }
    </script>

</body>

</html>
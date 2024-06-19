<?php

// Establish database connection if not already established
// Replace 'your_host', 'your_username', 'your_password', and 'your_database' with actual credentials

// Include necessary files
include 'Connection.php';
include 'sessioncart.php';
include 'categoryheader.php';

// Fetch user information
$sqlusers = "SELECT * FROM `registered_users` WHERE `username`= '" . $_SESSION['username'] . "';";
$result = mysqli_query($conn, $sqlusers);
$row = mysqli_fetch_assoc($result);

// HTML content for the invoice
$invoiceContent = '
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adiax-Cart - Order Food Online</title>
    <link rel="stylesheet" href="AdiPersonalBootstrap/bootstrap.min.css">
    <script src="AdiPersonalBootstrap/bootstrap.bundle.min.js"></script>
    <script src="AdiPersonalBootstrap/fontAdi.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 col-md-7 pt-3">
                <span class="py-5 rightside">
                    From,
                </span>
                <span class="py-5 rightsidetwo text-smalladi">
                    <br>
                    Adiax-Online Food Ordering System,
                    <br>
                    Modasa-383315.
                    <br>
                    9427178733
                    <br>
                    pateladitya130102@gmail.com
                    <br>
                    Date: ' . date('d/m/Y') . '
                    <br><br><br>
                    The Payment has to be done at the time of Delivery only.
                    <br>
                    The Payment will be done using POD (Pay On Delivery) Mode.
                    <br><br>
                    <div class="container btn w-75 bg-success text-light " data-bs-toggle="modal" data-bs-target="#Pay_POD">
                        Pay on Delivery (POD)
                    </div>
                </span>
            </div>
            <div class="col-lg-5 col-md-5 py-3">
                <div class="btn w-75 form-control bg-success text-white" onclick="print()">Save invoice</div>
                <br>
                To ,
                <br>
                <span class="text-smalladi" placeholder="Name : ">
                    ' . $_SESSION['username'] . '
                    <br>
                    ' . $row['email'] . '
                    <br>
                    ' . $row['Address'] . '
                    <h3 class="form-control w-75 mt-3"> Total Bill :
                        <b>
                            <span class="text-end text-dark fs-6" name="totalbill" id="GrandTotal"></span>
                            <span class="text-end text-dark fs-6">₹</span>
                        </b>
                    </h3>
                </span>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <br><br>
        <table class="table border table-striped table-hover border-5 text-center">
            <thead class="text-center">
                <tr>
                    <td scope="col"><b>Sr no.</b></td>
                    <td scope="col"><b>Item name</b></td>
                    <td scope="col"><b>Price (₹)</b></td>
                    <td scope="col"><b>Quantity</b></td>
                    <td scope="col"><b>Total</b></td>
                </tr>
            </thead>
            <tbody class="text-mediumadi">';
// Iterate through the cart items
$total = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        $total += floatval($value['Price']);
        $sr = $key + 1;
        $value['Price'] = preg_replace("/₹/", "", $value['Price']);
        $invoiceContent .= '
            <tr class="text-center">
                <td class="text-center align-middle">' . $sr . '</td>
                <td class="text-center align-middle">' . $value['Item_name'] . '</td>
                <td class="text-center align-middle">' . $value['Price'] . '<input type="hidden" class="iprice" value="' . $value['Price'] . '"></td>
                <td class="text-center align-middle">' . $value['Quantity'] . '<input class="text-center iquantity" type="hidden" onchange="subtotal()" value="' . $value['Quantity'] . '" min="1" max="100"></td>
                <td class="itotal text-center align-middle"></td>
            </tr>';
    }
}
$invoiceContent .= '
            </tbody>
        </table>
    </div>

    <div class="container-fluid">
        <br><br>
        This invoice is only for the reference.
        It is not the proof that you have paid the money for the above specified Items.
        We will provide you original invoice at the time of Food Delivery.
        <br><br>
        ====> Thanks for Choosing Us .
    </div>

    <div class="container-fluid text-end">
        <span class="adi fw-bold text-gabriola fs-6">
            Owner of Adiax - Online Food Ordering System,
        </span>
        <span class="adi fw-bold text-monotypecorsiva fs-5">
            <br>
            <u>Aditya</u>
            <u>Patel</u>
        </span>
    </div>
</body>

</html>';

ob_end_clean(); // Clean the output buffer

// Generate a unique filename for the invoice
$filename = 'invoice_' . date('YmdHis') . '.pdf';

// Convert HTML to PDF using a library like Dompdf
require_once './dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml($invoiceContent);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Generate and force download the PDF file
$dompdf->stream($filename, array('Attachment' => true));
?>

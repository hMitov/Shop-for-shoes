<?php
session_start();
include_once "../includes/server_connection.php";


if(isset($_POST['sellDetails'])) {
    $sellDetails = $_POST['sellDetails'];
    $barcode = $sellDetails['barcode'];
    $quantity = $sellDetails['quantity'];
    $result = mysqli_query($conn, "SELECT * FROM shoes_in_stock WHERE Barcode = '$barcode' and Quantity >= '$quantity';");

    if (mysqli_num_rows($result) > 0) {
        $data['num'] = mysqli_num_rows($result);
        $data['st'] = "valid";
    } else {
        $data['st'] = "invalid";
    }
    echo json_encode($data);
    exit();
}
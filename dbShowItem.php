<?php
session_start();
include_once "../includes/server_connection.php";


if(isset($_POST['barcodeInfo'])) {
    $barcodeInfo = $_POST['barcodeInfo'];
    $barcode = $barcodeInfo['barcode'];


    $result = mysqli_query($conn, "SELECT shoes_in_stock.Barcode, brand_model.BrandName, brand_model.Model, 
       shoes_in_stock.Size, material.Material, colors.Color, shoes_in_stock.Quantity, shoes_in_stock.Price 
       FROM shoes_in_stock 
       INNER JOIN brand_model ON shoes_in_stock.BrandNameModel = brand_model.Id  
       INNER JOIN material ON material.Id = shoes_in_stock.Material
       INNER JOIN colors ON colors.Id = shoes_in_stock.Color
       WHERE Barcode = '$barcode'");

        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $data['BrandName'] =$row['BrandName'];
        $data['Model'] = $row['Model'];
        $data['Size'] = $row['Size'];
        $data['Material'] = $row['Material'];
        $data['Color'] = $row['Color'];
        $data['Quantity'] = $row['Quantity'];
        $data['Price'] = $row['Price'];

    echo json_encode($data);
}
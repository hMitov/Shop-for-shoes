<?php
session_start();
include_once "../includes/server_connection.php";

$counter = 1;

$data = [];
$result = mysqli_query($conn, "SELECT * FROM x_report;");

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $brandName = $row['BrandName'];
    $modelName = $row['ModelName'];
    $barcode = $row['Barcode'];
    $size = $row['Size'];
    $material = $row['Material'];
    $color = $row['Color'];
    $quantity = $row['Quantity'];
    $price = $row['Price'];
    $methodOfPay = $row["Paid"];
    $sex = $row["Sex"];

    $data[$counter++] = $brandName;
    $data[$counter++] = $modelName;
    $data[$counter++] = $barcode;
    $data[$counter++] = $size;
    $data[$counter++] = $material;
    $data[$counter++] = $quantity;
    $data[$counter++] = $color;
    $data[$counter++] = $price;
    $data[$counter++] = $methodOfPay;
    $data[$counter++] = $sex;
}
$data[0] = $counter;
echo json_encode($data);





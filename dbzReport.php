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
    $date_time = date('Y-m-d H:i:s');

    $data[$counter++] = $brandName;
    $data[$counter++] = $modelName;
    $data[$counter++] = $barcode;
    $data[$counter++] = $size;
    $data[$counter++] = $material;
    $data[$counter++] = $color;
    $data[$counter++] = $quantity;
    $data[$counter++] = $price;
    $data[$counter++] = $methodOfPay;
    $data[$counter++] = $sex;
    $data[$counter++] = $date_time;

    mysqli_query($conn,"INSERT INTO z_report (BrandName, ModelName, Barcode, Size, Material, Color, Quantity, Price, Paid, Sex, Date_time)
                    VALUES('$brandName', '$modelName', '$barcode', '$size', '$material', '$color', '$quantity', '$price', '$methodOfPay', '$sex', '$date_time');");

}
$data[0] = $counter;

$result1 = mysqli_query($conn, "DELETE FROM x_report;");




echo json_encode($data);
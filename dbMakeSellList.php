<?php
session_start();
include_once "../includes/server_connection.php";


$brandName = '';
$model = '';
$barcode = '';
$size = '';
$material = '';
$color = '';
$quantity = '';
$price = '';
$sex = '';
$finalPrice = 0;

if(isset($_POST['sellDetails'])) {
    $sellDetails = $_POST['sellDetails'];
    $barcode = $sellDetails['barcode'];
    $wantedQuantity = $sellDetails['quantity'];

    $result = mysqli_query($conn, "SELECT shoes_in_stock.Barcode, brand_model.BrandName, brand_model.Model, 
       shoes_in_stock.Size, material.Material, colors.Color, shoes_in_stock.Quantity, shoes_in_stock.Price, shoes_in_stock.Sex 
       FROM shoes_in_stock 
       INNER JOIN brand_model ON shoes_in_stock.BrandNameModel = brand_model.Id  
       INNER JOIN material ON material.Id = shoes_in_stock.Material
       INNER JOIN colors ON colors.Id = shoes_in_stock.Color
       WHERE Barcode = '$barcode' and Quantity >= '$wantedQuantity';");

    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_assoc($result);
        $brandName = $row['BrandName'];
        $data['BrandName'] = $brandName;

        $model = $row['Model'];
        $data['Model'] = $model;

        $barcode = $row['Barcode'];
        $data['Barcode'] = $barcode;

        $size = $row['Size'];
        $data['Size'] = $size;

        $material = $row['Material'];
        $data['Material'] = $material;

        $color = $row['Color'];
        $data['Color'] = $color;

        $quantity = $row['Quantity'];
        $data['Quantity'] = $wantedQuantity;

        $price = $row['Price'];
        $data['Price'] = $price;

        $sex = $row['Sex'];
        $data['Sex'] = $sex;

        $finalPrice +=  $wantedQuantity * $price;

        $data['info'] = 'valid';

        $data['finalPrice'] = $finalPrice;


        function insertNewItem($brandName, $model, $barcode, $size, $material, $color, $wantedQuantity, $price, $sex, $conn)
        {
            $newItem = "INSERT INTO sell (BrandName, ModelName, Barcode, Size, Material, Color, Quantity, Price, Sex)
                        VALUES('$brandName', '$model', '$barcode', '$size', '$material', '$color', '$wantedQuantity', '$price', '$sex');";
            mysqli_query($conn, $newItem);
        }

        function increaseQuantityOfItem($barcode, $wantedQuantity, $conn)
        {
            $row1 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM shoes_in_stock WHERE Barcode = '$barcode';"), MYSQLI_ASSOC);
            $row2 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM sell WHERE Barcode = '$barcode';"), MYSQLI_ASSOC);
            if($row2['Quantity'] + $wantedQuantity <= $row1['Quantity']) {
                mysqli_query($conn, "UPDATE sell SET Quantity	= Quantity + '$wantedQuantity' WHERE Barcode = '$barcode';");
            } else {
                global $data;
                $data['info'] = 'invalid';
            }
        }

        if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM shoes_in_stock WHERE Barcode = '$barcode' and Quantity >= '$wantedQuantity'")) > 0)
        {
            if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM sell WHERE Barcode = '$barcode';")) > 0) {
                increaseQuantityOfItem($barcode, $wantedQuantity, $conn);
            } else {
                insertNewItem($brandName, $model, $barcode, $size, $material, $color, $wantedQuantity, $price, $sex, $conn);
            }
        }
    }

    if(mysqli_num_rows($result) == 0) {
        $data['info'] = 'invalid';
        $data['rowNum'] = mysqli_num_rows($result);
    }

    echo json_encode($data);
    exit();
}

if(isset($_POST['paymentMethod'])) {
    $dat['state'] = 'valid';
    $payMethod = $_POST['paymentMethod']['pay'];
    $dat['payMethod'] = $payMethod;

    while($row = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM sell;"), MYSQLI_ASSOC)) {

        $brandName = $row['BrandName'];
        $model = $row['ModelName'];
        $barcode = $row['Barcode'];
        $size = $row['Size'];
        $material = $row['Material'];
        $color = $row['Color'];
        $quantity = $row['Quantity'];
        $price = $row['Price'];
        $sex = $row['Sex'];




        mysqli_query($conn, "UPDATE shoes_in_stock SET Quantity = Quantity - '$quantity' WHERE Barcode = '$barcode';");
        mysqli_query($conn,"INSERT INTO x_report (BrandName, ModelName, Barcode, Size, Material, Color, Quantity, Price, Paid, Sex)
                VALUES('$brandName', '$model', '$barcode', '$size', '$material', '$color', '$quantity', '$price', '$payMethod', '$sex');");

        mysqli_query($conn, "DELETE FROM sell WHERE Barcode = '$barcode';");
    }
    echo json_encode($dat);
    exit();
}

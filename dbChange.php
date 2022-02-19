<?php

session_start();
include_once "../includes/server_connection.php";

if(isset($_POST['insertButton'])) {
    $oldBarcode = $_POST['oldBarcode'];
    $newBarcode = $_POST['newBarcode'];
    $quantity = $_POST['quantity'];

    $oldRes = mysqli_query($conn, "SELECT * FROM x_report WHERE Barcode = '$oldBarcode' and Quantity >= '$quantity';");
    $newRes = mysqli_query($conn, "SELECT * FROM shoes_in_stock WHERE Barcode = '$newBarcode' and Quantity >= '$quantity';");

    if(mysqli_num_rows($oldRes) > 0 && mysqli_num_rows($newRes) > 0) {

        $rowOldPrice = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM x_report WHERE Barcode = '$oldBarcode';"), MYSQLI_ASSOC);
        $oldPrice = $rowOldPrice["Price"];

        $rowNewPrice = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM shoes_in_stock WHERE Barcode = '$newBarcode';"), MYSQLI_ASSOC);
        $newPrice = $rowNewPrice["Price"];

        $row = mysqli_fetch_array(mysqli_query($conn, "SELECT shoes_in_stock.Barcode, brand_model.BrandName, brand_model.Model, 
            shoes_in_stock.Size, material.Material, colors.Color, shoes_in_stock.Quantity, shoes_in_stock.Price, shoes_in_stock.Sex
            FROM shoes_in_stock 
            INNER JOIN brand_model ON shoes_in_stock.BrandNameModel = brand_model.Id  
            INNER JOIN material ON material.Id = shoes_in_stock.Material
            INNER JOIN colors ON colors.Id = shoes_in_stock.Color
            WHERE Barcode = '$newBarcode';"));

        $brandName = $row['BrandName'];
        $modelName = $row['Model'];
        $size = $row['Size'];
        $material = $row['Material'];
        $color = $row['Color'];
        $sex = $row['Sex'];
        $payMethod = $rowOldPrice['Paid'];


        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM x_report WHERE Barcode = '$newBarcode';")) > 0) {
            mysqli_query($conn, "UPDATE x_report SET Quantity	= Quantity + '$quantity' WHERE Barcode = '$newBarcode';");
            if($rowOldPrice['Quantity'] == $quantity) {
                mysqli_query($conn, "DELETE FROM x_report WHERE Barcode = '$oldBarcode';");
            } else
                mysqli_query($conn, "UPDATE x_report SET Quantity	= Quantity - '$quantity' WHERE Barcode = '$oldBarcode';");
            mysqli_query($conn, "UPDATE shoes_in_stock SET Quantity = Quantity - '$quantity' WHERE Barcode = '$newBarcode';");
            mysqli_query($conn, "UPDATE shoes_in_stock SET Quantity = Quantity + '$quantity' WHERE Barcode = '$oldBarcode';");

        } else {
            $newItem = "INSERT INTO x_report(BrandName, ModelName, Barcode, Size, Material, Color, Quantity, Price, Paid, Sex) VALUES('$brandName', '$modelName', '$newBarcode', '$size', '$material', '$color', '$quantity', '$newPrice', '$payMethod', '$sex');";
            mysqli_query($conn, $newItem);
            if($rowOldPrice['Quantity'] == $quantity) {
                mysqli_query($conn, "DELETE FROM x_report WHERE Barcode = '$oldBarcode';");
            } else
                mysqli_query($conn, "UPDATE x_report SET Quantity	= Quantity - '$quantity' WHERE Barcode = '$oldBarcode';");
            mysqli_query($conn, "UPDATE shoes_in_stock SET Quantity = Quantity - '$quantity' WHERE Barcode = '$newBarcode';");
            mysqli_query($conn, "UPDATE shoes_in_stock SET Quantity = Quantity + '$quantity' WHERE Barcode = '$oldBarcode';");
        }
    }
    header("Location: ../change/change.php");
}
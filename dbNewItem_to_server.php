<?php
  session_start();
  include_once "../includes/server_connection.php";

  if(isset($_POST['system-insert-button'])) {
      $barcode = $_POST['barcode'];
          if (strlen($barcode) == 10) {
              $quantity = $_POST['quantity'];
              $price = $_POST['price'];

              $sex = '';
              if(substr(strval($barcode), 0, 2) === '44')
                  $sex = "men";
              if(substr(strval($barcode), 0, 2) === '43')
                  $sex = "women";

              $brandName_ModelCode = "";
              if (substr(substr(strval($barcode), 2, 3), 0, 1) === '0')
                  $brandName_ModelCode = substr(strval($barcode), 3, 2);
              else
                  $brandName_ModelCode = substr(strval($barcode), 2, 3);

              $colorCode = substr(strval($barcode), 5, 1);
              $materialCode = substr(strval($barcode), 6, 1);
              $sizeCode = substr(strval($barcode), 7, 2) . '.' . substr($barcode, 9, 1);

              $sqlBrandNameModel = mysqli_query($conn, "SELECT * FROM brand_model WHERE Id = '$brandName_ModelCode';");
              $sqlColor = mysqli_query($conn, "SELECT * FROM colors WHERE Id = '$colorCode';");
              $sqlMaterial = mysqli_query($conn, "SELECT * FROM material WHERE Id = '$materialCode';");
          }

          if (mysqli_num_rows($sqlBrandNameModel) > 0 && mysqli_num_rows($sqlColor) > 0 && mysqli_num_rows($sqlMaterial) > 0) {

              function insertNewItem($brandName_ModelCode, $barcode, $sizeCode, $materialCode, $colorCode, $quantity, $price, $sex, $conn)
              {
                  $newItem = "INSERT INTO shoes_in_stock(BrandNameModel, Barcode, Size, Material, Color,
                           Quantity, Price, Sex) VALUES('$brandName_ModelCode', '$barcode', '$sizeCode', '$materialCode', '$colorCode', '$quantity', '$price', '$sex');";
                  mysqli_query($conn, $newItem);
              }

              function increaseQuantityOfItem($barcode, $quantity, $conn)
              {
                  if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM shoes_in_stock WHERE Barcode = '$barcode';")) > 0)
                      mysqli_query($conn, "UPDATE shoes_in_stock SET Quantity	= Quantity + '$quantity' WHERE Barcode = '$barcode';");
              }


              if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM shoes_in_stock WHERE Barcode = '$barcode';")) > 0) {
                  increaseQuantityOfItem($barcode, $quantity, $conn);
              } else {
                  insertNewItem($brandName_ModelCode, $barcode, $sizeCode, $materialCode, $colorCode, $quantity, $price, $sex, $conn);
              }
          }
      header("Location: ../newItem/newItem.php");
  }


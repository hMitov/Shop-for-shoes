<?php
session_start();
include_once "../includes/checkForSession.php";
include_once "../header/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="newItem.css">
    <title>Foot Mix&reg;</title>
</head>
<body>
   <div class="new-item-container">
       <form id="form" action="../includes/dbNewItem_to_server.php" method="post">
           <div class="barcode-quantity-img-wrapper">
               <div class="barcode-insert">
                   <h3>Въведете баркод</h3>
                   <input id="barcode" name="barcode" type="text" placeholder="Баркод">
               </div>
               <div class="quantity-insert">
                   <h3>Въведете бройка</h3>
                   <input id="quantity" name="quantity" type="text" placeholder="Брой">
               </div>
               <div class="price">
                   <h3>Въведете цена</h3>
                   <input id="price" name="price" type="text" placeholder="Цена">
               </div>
               <div class="option-wrapper-upload">
                   <input id="system-insert-button" name="system-insert-button" type="submit" value="Качи в системата">
               </div>
           </div>
       </form>
       <input type="button" id="backToMenu" onclick="location.href='../main/main.php';" value="Обратно в меню">
   </div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   <script src="newItem.js"></script>
</body>
</html>
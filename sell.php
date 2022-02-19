<?php
session_start();
include_once "../includes/checkForSession.php";
include "../header/header.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="sell.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Foot Mix&reg;</title>
</head>
<body>
   <div class="sell-container">
       <div class="chosen-items-container">
           <table id="table">
               <tr>
                   <td class="intro">№</td>
                   <td class="intro">Марка</td>
                   <td class="intro">Модел</td>
                   <td class="intro">Баркод</td>
                   <td class="intro">Номер</td>
                   <td class="intro">Материал</td>
                   <td class="intro">Количество</td>
                   <td class="intro">Цвят</td>
                   <td class="intro">Ед. цена</td>
                   <td class="intro">Пол</td>
               </tr>
           </table>
       </div>
   </div>
   <div class="operations-container">
       <div class="insert-barcode">
           <input id="barcode" type="text" name="barcode" placeholder="Въведи баркод">
           <input id="quantity" type="text" name="quantity">
       </div>
       <div class="attention">
           <h4>Невалиден баркод или недостатъчна бройка от продукта!</h4>
       </div>
       <div class="pay-back-container">
           <div class="pay-back-buttons">
               <input id="payment-button" type="button" name="payment-button" value="Плащане">
               <input id="back-button" type="button" name="back-button" value="Назад">
           </div>
           <div class="cash-card-choice-container">
               <div class="cash-card-choice-container-cash">
                   <input class="cash-card" id="cash" name="cash-card" value="cash" type="radio">
                   <label for="cash">В брой</label>
               </div>
               <div class="cash-card-choice-container-card">
                   <input class="cash-card" id="card" name="cash-card" value="card" type="radio">
                   <label for="card">С карта</label>
               </div>
           </div>
           <div class="insertButton-wrapper">
               <input id="insertButton" type="submit" value="Направи продажба">
           </div>
       </div>
   </div>
   <div class="finalPriceAndPayMethod"></div>
   <input type="button" id="backToMenu" onclick="location.href='../main/main.php';" value="Обратно в меню">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   <script src="../sell/sell.js"></script>
</body>
</html>


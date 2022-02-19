<?php
session_start();
include_once "../includes/checkForSession.php";
include_once "../header/header.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="stock.css">
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
       </div>
   </div>>
   <input type="button" id="backToMenu" onclick="location.href='../main/main.php';" value="Обратно в меню">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   <script src="stock.js"></script>
</body>
</html>
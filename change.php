<?php
session_start();
include_once "../includes/checkForSession.php";
include_once "../header/header.php";
?>

<!<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Foot Mix&reg;</title>
    <link rel="stylesheet" href="change.css">
</head>
<body>
<div class="newEmployee-wrapper">
    <form id="form" action="../includes/dbChange.php" method="post">
        <div id="oldBarcode">
            <h3>Стар баркод</h3>
            <input type="text" id="oldBarcode" name="oldBarcode">
        </div>
        <div id="newBarcode">
            <h3>Нов баркод</h3>
            <input type="text" id="newBarcode" name="newBarcode">
        </div>
        <div id="quantity">
            <h3>Брой продукти</h3>
            <input type="text" id="quantity" name="quantity">
        </div>
        <input type="submit" id="insertButton" name="insertButton" value="Въведи">
    </form>
    <input type="button" id="backToMenu" onclick="location.href='../main/main.php';" value="Обратно в меню">
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="../change/change.js"></script>
</body>
</html>


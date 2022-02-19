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
    <link rel="stylesheet" href="main.css">
    <title>Foot Mix&reg;</title>
</head>
<body>
   <main>
       <div class="system-wrap">
           <input id="item1" class="item" type="submit" value="Продажба">
           <input id="item2" class="item" type="submit" value="Наличност">
           <input id="item3" class="item" type="submit" value="Нова стока">
           <input id="item4" class="item" type="submit" value="Х-отчет">
           <input id="item5" class="item" type="submit" value="Z-отчет">
           <input id="item6" class="item" type="submit" value="Замяна">
           <input id="item7" class="item" type="submit" value="Нов служител">
       </div>
   </main>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   <script type="text/javascript" src="../main/main.js"></script>
</body>
</html>

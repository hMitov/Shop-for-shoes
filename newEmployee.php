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
    <link rel="stylesheet" href="newEmployee.css">
</head>
<body>
   <div class="newEmployee-wrapper">
       <form id="form" action="../includes/dbNewEmployee.php" method="post" autocomplete="off">
           <h3>Име</h3>
           <input type="text" id="firstName" name="firstName">
           <h3>Фамилия</h3>
           <input type="text" id="lastName" name="lastName">
           <h3>Агент</h3>
           <input type="text" id="agent" name="agent">
           <input type="submit" id="insertButton" name="insertButton" value="Въведи">
       </form>
       <div class="agent-info">
           <h5>Ако служителят ще е мениджър, агентът му трубва да започва с 99, в случай, че е складов работник с 00. За касиерите агентът трябва да започва с различна от двете комбинации!</h5>
       </div>
       <input type="button" id="backToMenu" onclick="location.href='../main/main.php';" value="Обратно в меню">
   </div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   <script src="../newEmployee/newEmployee.js"></script>
</body>
</html>





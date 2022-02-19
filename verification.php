<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="verification.css">
    <title>Foot Mix&reg;</title>
</head>
<body>
   <?php
    include "../header/header.php";
   ?>
   <main>
       <div class="verification-container">
           <form action="../includes/dbVerification.php" method="POST" autocomplete="off">
               <h2>Въведете своя агент и парола за системата</h2>
               <input id="first" type="text" name="agent" placeholder="агент"><br>
               <input id="second" type="text" name="password" placeholder="парола"><br>
               <input id="third" type="submit" name="submit" value="Въведи">
           </form>
       </div>
   </main>
</body>
</html>
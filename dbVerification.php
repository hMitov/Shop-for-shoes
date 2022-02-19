<?php
   session_start();
   include_once "server_connection.php";

   if(!empty($_POST)) {
       $agent = $_POST['agent'];
       $password = $_POST['password'];

       $agentCheck = "SELECT * FROM employee WHERE Agent = '$agent';";
       $agentCheckResult = mysqli_query($conn, $agentCheck);

       $passwordCheck = "SELECT * FROM shop_password WHERE Password = '$password';";
       $passwordCheckResult = mysqli_query($conn, $passwordCheck);


       if(mysqli_num_rows($agentCheckResult) > 0 && mysqli_num_rows($passwordCheckResult) > 0) {
           $_SESSION['login'] = "1";
           if (substr((string)$agent, 0, 2) === "00")
               $_SESSION['position'] = "insider";
           else if (substr((string)$agent, 0, 2) === "99")
               $_SESSION['position'] = "manager";
           else
               $_SESSION['position'] = "cashier";
           header("Location: ../main/main.php");
       } else {
           header("Location: ../verification/verification.php");
       }
   }
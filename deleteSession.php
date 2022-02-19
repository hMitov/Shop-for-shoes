<?php
   session_start();

   if(isset($_SESSION['position'])) {
       session_destroy();
   }



   header("Location: ../verification/verification.php");
   exit();


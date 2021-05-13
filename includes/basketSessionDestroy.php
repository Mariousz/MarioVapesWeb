<?php
   session_start();

   if (isset($_SESSION['userid'])) {
     unset($_SESSION["basket"]); //removes all items from cart
     header("Location: ../basket.php"); //takes back to basket
   }else {
     session_destroy();
     header("Location: ../basket.php");
   }
?>

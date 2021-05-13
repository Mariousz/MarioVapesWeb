<?php
include "includes/config.php";
include "includes/head.php";
?>

 <head>
   <title>Mario Vapes - Product Page</title>
 </head>

 <body>
     <div class="container">
       <div class="productPage">

         <?php include "products/getProductpage.php"; //call product page script, product changes based on info passed?>

       </div>
     </div>

   <?php include "includes/footer.php"; ?>

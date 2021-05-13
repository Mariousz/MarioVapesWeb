<?php
include "includes/config.php";
include "includes/head.php";
?> <!-- Calls the header -->

 <head>
   <title>Mario Vapes - Basket</title>
 </head>

       <?php include "includes/getBasket.php"; //calls the cart fetch script ?>

       <?php
         $error = $_SESSION['error'];

         if(isset($_SESSION['error'])) {
           echo '<div class="alert alert-danger alert-dismissible fade show basketAlert" role="alert">
                 '.$error.'
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>';
           unset($_SESSION['error']);
         }
         //if there is an error adding items into basket it displays an alert
       ?>
<?php include "includes/footer.php"; ?>

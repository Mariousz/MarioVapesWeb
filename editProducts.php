<?php
include "includes/adminSession.php";
include "includes/head.php";
?>


 <head>
   <title>Mario Vapes Edit Products</title>
 </head>

 <body>


   <div class="container">

     <?php include "includes/productsfind.php"; //calls products fetch?>

     <?php
     $sucess = $_SESSION['updated'];
     $deleted = $_SESSION['deleted'];
     $error = $_SESSION['error'];

     if(isset($_SESSION['updated'])){
       echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
             '.$sucess.'
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>';
       unset($_SESSION['updated']);
     }
     elseif(isset($_SESSION['deleted'])) {
       echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
             '.$deleted.'
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>';
       unset($_SESSION['deleted']);
     }
     elseif(isset($_SESSION['error'])) {
       echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
             '.$error.'
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>';
       unset($_SESSION['error']);
     }
     //alert for sucess, deleted and error depending on outcome of script
     ?>

   </div>


 <?php include "includes/footer.php"; ?>

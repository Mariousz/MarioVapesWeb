<?php
include "includes/adminSession.php"; //calls admin session
include "includes/head.php"; //calls the header
?>

 <head>
   <title>Mario Vapes - Admin Dashboard</title>
 </head>

 <body class="">



   <div class="container">
     <div class="row">
       <div class="card-deck">

         <a href="productManagement.php">
           <div class="card mb-4">
             <i class="fas fa-clipboard-list fa-9x text-center"></i>
             <div class="card-body">
               <h5 class="card-title">Product Management</h5>
              </div>
           </div>
         </a>

         <a href="orderManagement.php">
           <div class="card mb-4">
             <i class="fas fa-box-open fa-9x text-center"></i>
             <div class="card-body">
               <h5 class="card-title">Order Management</h5>
              </div>
           </div>
         </a>

         <a href="userManagement.php">
           <div class="card mb-4">
             <i class="card-img-top fas fa-users fa-9x text-center"></i>
             <div class="card-body">
               <h5 class="card-title">User Management</h5>
              </div>
           </div>
         </a>

    </div>
  </div>
</div>


 <?php include "includes/footer.php"; //calls the footer ?>

<?php
include "includes/admin-session.php";
include "includes/head.php";
?> <!-- Calls the header -->

 <head>
   <title>Mario Vapes Bridlington - Product Mangement</title>
 </head>

 <body class="">

   <div class="container">
     <div class="row">
       <div class="card-deck">

         <a href="editProducts.php">
           <div class="card mb-4">
            <i class="fas fa-edit fa-9x text-center"></i>
             <div class="card-body">
               <h5 class="card-title">Edit Products</h5>
              </div>
           </div>
         </a>

         <a href="addProduct.php">
           <div class="card mb-4">
             <i class="fas fa-plus fa-9x text-center"></i>
             <div class="card-body">
               <h5 class="card-title">Add Products</h5>
              </div>
           </div>
         </a>

    </div>
  </div>
</div>


 <?php include "includes/footer.php"; ?>

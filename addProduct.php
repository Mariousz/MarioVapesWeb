<?php
include "includes/adminSession.php"; //calls admin session
include "includes/head.php"; //calls the header
?>

 <head>
   <title>Mario Vapes Bridlington - Add Prodcuts</title>

 </head>

<body>

   <!-- form for adding products, submits to add products -->
   <div class="container">
    <form action="includes/addProduct.php" method="post" enctype="multipart/form-data" class="addProduct">

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="product_brand">Product Brand</label>
          <input type="text" class="form-control" name="product_brand" placeholder="Product Brand" required>
        </div>

        <div class="form-group col-md-6">
          <label for="product_name">Product Name</label>
          <input type="text" class="form-control" name="product_name" placeholder="Product Name" required>
        </div>
      </div>

            <label for="product_description">Product Description</label>
            <textarea type="text" class="form-control" name="product_description" placeholder="Write description in here..." required></textarea>

      <div class="form-row">
          <div class="form-group col-md-4">
            <label for="product_category">Product Category</label>
            <select name="product_category" class="form-control">
              <option selected>Liquid</option>
              <option>Coil</option>
              <option>Kit</option>
              <option>Tank</option>
              <option>Batterie</option>

            </select>
          </div>

        <div class="form-group col-md-4">
          <label for="product_price">Product Price £</label>
          <input type="number" min="0.01" max="100.00" step="0.01" class="form-control" name="product_price" placeholder="0.00" required>
        </div>

        <div class="form-group col-md-4">
          <label for="product_stock">Product Stock Level</label>
          <input type="number" min="0.01" max="100.00" step="0.01" class="form-control" name="product_stock" placeholder="0.00" required>
        </div>
    </div>

        <div class="custom-file">
          <input type="file" class="custom-file-input" name="product_image" required>
          <label class="custom-file-label" for="product_image" required>Choose Product Image...</label>
       </div>


<div class="button" style="">
      <button type="submit" name="add_Product" value="add_Product" class="btn btn-primary">Add Product</button>
</div>
      <?php
      $added = $_SESSION['added'];
      $error = $_SESSION['error'];

      if(isset($_SESSION['added'])) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              '.$added.'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
        unset($_SESSION['added']);
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
      //displays added or error alert depending if form worked or not
      ?>

    </form>
   </div>




 <?php include "includes/footer.php"; //calls footer ?>

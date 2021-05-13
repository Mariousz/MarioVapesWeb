<?php
$sql = "SELECT * FROM products WHERE productCategory = 'Tank' ORDER BY productBrand, productName"; //gets all products with that category
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)){
    echo '<a href="../productPage.php?productId='.$row['productId'].'">
      <div class="card mb-4">
        <img class="card-img-top" src="../productImages/'.$row['productImage'].'" alt="Product Image">
        <div class="card-body">
          <h5 class="card-title">'.$row['productBrand'].'</h5>
          <h6 class="card-title">'.$row['productName'].'</h6>
           <span class="card-text">£'.$row['productPrice'].'</span>

           <form action="includes/cartSession.php" method="post"
<section>
            <input type="text" class="hide" id="product_id" name="product_id" value="'.$row['productId'].'">
            <input type="text" class="hide" id="product_brand" name="product_brand" value="'.$row['productBrand'].'">
            <input type="text" class="hide" id="product_name" name="product_name" value="'.$row['productName'].'">
            <input type="text" class="hide" id="product_price" name="product_price" value="'.$row['productPrice'].'">
            <input type="text" class="hide" id="original_price" name="original_price" value="'.$row['productPrice'].'">
            <input type="text" class="hide" id="product_image" name="product_image" value="'.$row['productImage'].'">
</section>
<div class="card-footer">
            <button type="submit" class="btn btn-primary" name="add" value="add">Add to Basket</button>
</div>
           </form>

         </div>
      </div>
    </a>';
  }
}
?>

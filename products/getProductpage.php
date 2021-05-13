<?php
$productId = $_GET['productId']; //passed from the last page

$sql = "SELECT * FROM products WHERE productId = '$productId'"; //gets product from database
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)){
    echo '

    <img class="image" alt="" src="../productImages/'.$row['productImage'].'"></img>

    <div class="card-body col-md-6 ">
    <div class="title mb-4">
      <h2>'.$row['productBrand'].'</h2>
    </div>
    <div class="title mb-2">
      <h3>'.$row['productName'].'</h3>
    </div>
      <span class="price h3 text-warning">£'.$row['productPrice'].'</span>
      <h4>Description</h4>
      <p>'.$row['productDescription'].'</p>
      <form action="../includes/basketSession.php" method="post" enctype="multipart/form-data">

        <span class="text">Quantity</span>

        <input type="text" style="display:none;" id="product_id" name="product_id" value="'.$row['productId'].'">
        <input type="number" name="quantity" id="quantity" value="1" class="col-md-2">
        <br>
        <div class="card-footer">
        <button type="submit" class="btn btn-success btn-bg " name="add" value="add">Add to Basket</button>
        </div>
        <input type="text" style="display:none" id="product_brand" name="product_brand" value="'.$row['productBrand'].'">
        <input type="text" style="display:none" id="product_name" name="product_name" value="'.$row['productName'].'">
        <input type="text" style="display:none" id="product_price" name="product_price" value="'.$row['productPrice'].'">
        <input type="text" style="display:none" id="original_price" name="original_price" value="'.$row['productPrice'].'">
        <input type="text" style="display:none" id="product_image" name="product_image" value="'.$row['productImage'].'">
      </form>
    </div>';
  }
}
?>

<?php
$total = array_column($_SESSION['basket'], 'product_price'); //gets all prices from the array of the cart
$arrTotal = array_sum($total); //does array sum

  if (!empty($_SESSION['basket'])) { //checks session is set

    foreach($_SESSION['basket'] AS $product){ //foreach product output like this

      echo '<div class="basket">
          <p style="display:none">'.$product['product_id'].'</p>
          <img src="../productImages/'.$product['product_image'].'" alt="Product Image">

          <div class="brand">
              <h5>Brand: '.$product['product_brand'].'</h5>
              <h6>Name: '.$product['product_name'].'</h6>
          </div>

            <div class="price">
              <form action="includes/cartSessionUpdate.php" method="post" enctype="multipart/form-data">
                <h5>'.money_format('%n', $product['product_price']).'</h5>
                <h6>Quantity: <span><input type="number" id="quantity" name="quantity" value="'.$product['quantity'].'"></input></span></h6>
                <!-- <h6>quantity: '.$product['quantity'].'</h6> -->

                  <div class="button">
                  <input type="text" style="display:none" id="product_id" name="product_id" value="'.$product['product_id'].'">
                  <input type="text" style="display:none" id="product_price" name="product_price" value="'.$product['product_price'].'">
                  <input type="text" style="display:none" id="original_price" name="original_price" value="'.$product['original_price'].'">


                  <button type="submit" class="btn btn-danger" name="delete" value="delete">Delete</button>
                  <button type="submit" class="btn btn-success" name="update" value="update">Update</button>
                </form>
              </div>
            </div>
        </div>';
    }

    echo '<div class="total">
      <h5>Total: '.money_format('%n', $arrTotal).'</h5>
      <div class="checkoutbutton">
        <a href="includes/cartSessionDestroy.php"><button type="submit" class="btn btn-danger" name="empty" value="Empty Basket">Empty Basket</button></a>
        <!--  <a href="checkout.php"><button type="submit" class="btn btn-primary" name="checkout" value="Checkout">Reserve</button></a> --!>
      </div>

      <div id="paypal-button-container"></div>

    </div>';

  } else {
    echo '<h5 style="text-align:center;">Your Basket is Empty<h5>';
  }





?>

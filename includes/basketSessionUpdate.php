<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL); //error reporting

 include "config.php";

  if (isset($_POST['update'])) { //if update is set
    $productID = ($conn, $_POST['product_id']); //post data
    $originalPrice = ($conn, $_POST['original_price']);
    $quantity = ($conn,$_POST['quantity']); //strips slashes from the form

    $sql = "SELECT * FROM products WHERE productId= $productId"; //selects all from products where the id is = to one submitted
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)){
        $dataQuantity = $row['productStock']; //gets the stock quantity within the database
      }
    } else {
      echo "Product doesn't exist";
    }

    $key = array_search($productID, array_column($_SESSION['basket'], 'product_id')); //creates key for what already in basket

    if (array_key_exists($key, $_SESSION['basket'])) { //if the key already exists ie product in basket
      $productPrice = $originalPrice * $quantity; //original price * quantity

      if ($dataQuantity < $quantity) { //if the quantity of the database is less than the wanted quantity
        $_SESSION['error'] = "Error: There isn't enough stock of this item.";
        header("location:../basket.php"); //redirects to main webpage
      } else {
        $_SESSION['basket'][$key]['quantity'] = $quantity; //updates quantity
        $_SESSION['basket'][$key]['product_price'] = $productPrice; //updates price

        header("location:../basket.php"); //redirects to main webpage
      }
    } else {
      unset($_SESSION['basket']); //unsets the key therfore deleting that item to stop errors
      header("location:../basket.php"); //redirects to main webpage
    }
  } elseif(isset($_POST['delete'])) { //this is to remove products one at a time from basket
    $productID = mysqli_real_escape_string($conn, $_POST['product_id']); //gets product code

    $key = array_search($productID, array_column($_SESSION['basket'], 'product_id')); //creates a key by finding the product code within array

    if (array_key_exists($key, $_SESSION['basket'])) { //checks for key
      unset($_SESSION['basket'][$key]); //unsets the key therfore deleting that item
      header("location:../basket.php"); //redirects to main webpage
    } else {
      unset($_SESSION['basket']); //if there is an error or is last item will destory the basket completely
      header("location:../basket.php"); //redirects to main webpage
    }
  } else {
    echo "There was an Error";
  }

?>

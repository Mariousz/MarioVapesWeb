<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL); //error reporting

 include "config.php";

  if (isset($_POST['add'])) {
    $productId = ($conn, $_POST['product_id']);
    $productBrand = ($conn, $_POST['product_brand']);
    $productName = ($conn, $_POST['product_name']);
    $productPrice = ($conn, $_POST['product_price']);
    $originalPrice = ($conn, $_POST['original_price']);
    $productImage = ($conn, $_POST['product_image']);

    $sql = "SELECT * FROM products WHERE productId= $productId"; //selects item from db
    $result = mysqli_query($conn, $sql);

    if (isset($conn,$_POST['quantity'])) { //if quantity is set
      $quantity = ($conn,$_POST['quantity']); //use this quantity
    } else {
      $quantity = '1'; //else set to one == only pressing add button
    }

    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)){
        $dataQuantity = $row['productStock']; //gets database quantity
        if ($dataQuantity < $quantity) { //doesn't let you add to basket if there isn't enough stock of the item
          $_SESSION['error'] = "Error: There isn't enough stock of this item.";
          header("location:../basket.php"); //redirects to main webpage
          die(); //to stop script running
        }
      }
    } else {
      echo "Product doesn't exist";
    }

    $key = array_search($productId, array_column($_SESSION['basket'], 'product_id'));//creates a key of the product being added to basket

    if (array_key_exists($key, $_SESSION['basket'])) { //if item is already in basket
      $arrayQuantity = $_SESSION['basket'][$key]['quantity']; //gets  of what is already in there

      $quantity = $quantity + $arrayQuantity; //adds new quantity to what is already in there

      if ($dataQuantity < $quantity) {
        $_SESSION['error'] = "Error: There isn't enough stock of this item."; //doesn't let it update if there isn't stock
        header("location:../basket.php"); //redirects to main webpage
      } else {
        $productPrice = $originalPrice * $quantity; //sets product price

        $_SESSION['basket'][$key]['quantity'] = $quantity; //updates the array
        $_SESSION['basket'][$key]['product_price'] = $productPrice;

        header("location:../basket.php"); //redirects to main webpage
      }
    } else {
      $_SESSION['basket'][] = array('product_id' => $productId, 'product_brand' => $productBrand, 'product_name' => $productName, 'product_price' => $productPrice, 'original_price' => $originalPrice, 'quantity' => $quantity, 'product_image' => $productImage); //adds item to basket

      header("location:../basket.php"); //redirects to main webpage
    }
  } else {
    echo "There was an Error";
  }

?>

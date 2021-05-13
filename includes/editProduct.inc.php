<?php
  // ini_set('display_errors', 1);
  // ini_set('display_startup_errors', 1);
  // error_reporting(E_ALL); //error reporting

  include 'adminSession.php';

    if (isset($_POST['save'])) {
      $productID = ($conn, $_POST['product_id']);
      $productBrand = ($conn,$_POST['product_brand']); //strips slashes from the form
      $productName = ($conn,$_POST['product_name']); //strips slashes from the form
      $productDescription = ($conn,$_POST['product_description']); //strips slashes from the form
      $productPrice = ($conn, $_POST['product_price']);
      $productStock = ($conn, $_POST['product_stock']);
      $productCategory = ($conn, $_POST['product_category']);

      if (empty($_FILES['product_Image']['name'])){ //checks to see if the image upload is empty and if it is doesn't update the image
        $sql = "UPDATE products SET productBrand = '$productBrand', productName = '$productName', productDescription = '$productDescription', productPrice = '$productPrice', productStock = '$productStock', productCategory = '$productCategory' WHERE productId = '$productID'"; //updates product

        if (mysqli_query($conn, $sql)) {
            header("location: ../editProducts.php");
            $_SESSION['updated'] = 'Successfully updated product';
        } else {
          header("location: ../editProducts.php");
          $_SESSION['error'] = "Error: ". $sql . "<br>" . mysqli_error($conn);
        }
      } else { //if the user has decided to update the image, this code handles updaing the database and uploads the image
        $productImage = mysqli_real_escape_string($conn, $_FILES['product_image']['name']);

        $target = "../productImages/".basename($productImage);

        $sql = "UPDATE products SET productBrand = '$productBrand', productName = '$productName', productDescription = '$productDescription', productPrice = '$productPrice', productStock = '$productStock', productImage = '$productImage', productCategory = '$productCategory' WHERE productId = '$productID'";

        mysqli_query($conn, $sql);

        if (move_uploaded_file($_FILES['product_image']['tmp_name'], $target)) { //moves images
            header("location: ../editProducts.php");
            $_SESSION['updated'] = 'Successfully updated product';
        } else {
          header("location: ../editProducts.php");
          $_SESSION['error'] = "Error: ". $sql . "<br>" . mysqli_error($conn);
        }
      }
    }
    elseif (isset($_POST['delete'])) { //delete product from db
      $productID = mysqli_real_escape_string($conn, $_POST['product_id']);

      $sql = "DELETE FROM products WHERE productId = '$productID'";

      if (mysqli_query($conn, $sql)) {
          header("location: ../editProducts.php");
          $_SESSION['deleted'] = 'Successfully deleted product';
      } else {
        header("location: ../editProducts.php");
        $_SESSION['error'] = "Error: ". $sql . "<br>" . mysqli_error($conn);
      }
    }

 ?>

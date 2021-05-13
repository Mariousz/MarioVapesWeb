<?php


  include 'adminSession.php';

  if (isset($_POST['add_Product'])) {
    $product_brand = ($conn,$_POST['product_brand']); //strips slashes from the form
    $product_name = ($conn,$_POST['product_name']); //strips slashes from the form
    $product_description = ($conn,$_POST['product_description']); //strips slashes from the form
    $product_price = ($conn, $_POST['product_price']);
    $product_stock = ($conn, $_POST['product_stock']);
    $product_category = ($conn, $_POST['product_category']);
    $product_image = ($conn, $_FILES['product_image']['name']);

    $target = "../productImages/".basename($product_image); //where the image from the form will be uploaded to

    $sql = "INSERT INTO products ( productName, productBrand, productDescription, productPrice, productStock, productCategory, productImage ) VALUES ( '$product_name','$product_brand', '$product_description', '$product_price', '$product_stock', '$product_category','$product_image')"; //inserts new product into data

    mysqli_query($conn, $sql); //excute

    if (move_uploaded_file($_FILES['product_image']['tmp_name'], $target)) { //moves the image
      header("location: ../addProduct.php"); //redirect
      $_SESSION['added'] = 'Product successfully added.'; //alert success
    	}else{
        header("location: ../addProduct.php"); //there was an error and alert
        $_SESSION['error'] = 'There was an error adding the product to the stock file.';
    	}
    }

 ?>

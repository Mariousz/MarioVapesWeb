<?php
  $sql = "SELECT * FROM products ORDER BY productBrand, productName"; //gets all products for editing
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)){
        echo '<div class="row">
                <div class="project">
                  <div class="card">
                    <span class="name">'.$row['productBrand'].'</span>
                    <span class="name">'.$row['productName'].'</span>
                  </div>
                  <div class="">
                  <button type="button" class="btn btn-dark toggle" data-toggle="modal" data-target="#modal'.$row['productId'].'">Edit</button>
                </div>

                <div class="modal fade" id="modal'.$row['productId'].'" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                  <div class="modal-dialog  modal-dialog-centered" role="document">
                    <form class="modal-content" action="includes/editProduct.inc.php" method="post" enctype="multipart/form-data">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modal'.$row['productId'].'">Edit Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <div class="form-group"">
                            <label for="product-brand">Brand: '.$row['productBrand'].'</label>
                            <input type="text" class="form-control" name="product-brand" placeholder="Enter New Product Brand" value="'.$row['productBrand'].'">

                            <input type="text" class="hide" id="productid" name="productid" value="'.$row['productId'].'">

                            <label for="product-name">Name: '.$row['productName'].'</label>
                            <input type="text" class="form-control" name="product-name" placeholder="Enter New Product Name" value="'.$row['productName'].'">

                            <label for="product-description">Product Description</label>
                            <input type="text" class="form-control" name="productDescription" placeholder="'.$row['productDescription'].'" value="'.$row['productDescription'].'"></input>

                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <label class="input-group-text" for="productCategory">Product Category</label>
                              </div>
                              <select class="custom-select" id="productCategory" name="productCategory" >
                                <option>Juices</option>
                                <option>Mods</option>
                              </select>
                            </div>
                          </div>

                          <label for="productPrice">Product Price £</label>
                          <input type="number" min="0.00" max="10000.00" step="0.01" class="form-control" name="productPrice" placeholder="'.$row['productPrice'].'" value="'.$row['productPrice'].'">

                          <label for="productStock">Product Stock Level</label>
                          <input type="number" min="0.00" max="10000.00" step="0.01" class="form-control" name="productStock" placeholder="'.$row['productStock'].'" value="'.$row['productStock'].'">

                          <img class="card-img-top" src="productImages/'.$row['productImage'].'" alt="Product Image">

                          <div class="input-group is-invalid">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" name="productimage">
                              <label class="custom-file-label" for="productimage">Choose Product Image...</label>
                            </div>
                          </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" name="delete" value="delete">Delete</button>
                        <button type="submit" class="btn btn-success" name="save" value="save">Save</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
          </div>';
    }
} else {
    echo '<div class="row">
            <div class="project">
              <div class="box">
                <span class="name">No Products Found</span>
              </div>
          </div>
      </div>';
}
?>

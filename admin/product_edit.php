<?php 
  
  require 'custom_function.php';
  
  if(isset($_GET['edit_product_id'])){
    $product_id = $_GET['edit_product_id'];

    $data = fetch_all_data_usingDB($db,"select * from product where id = '$product_id'");
    $category_list = fetch_all_data_usingPDO($pdo,'select * from category ORDER BY id DESC');

  }

  else{
    header("Location: product_list.php");
  }

?>



<?php require 'd_header.php' ?>

<!-- ########## START: LEFT PANEL ########## -->
<?php require 'd_leftpanel.php' ?>
<!-- ########## END: LEFT PANEL ########## -->

<!-- ########## START: HEAD PANEL ########## -->
<?php require 'd_headpanel.php' ?>
<!-- ########## END: HEAD PANEL ########## -->

    

  <!-- ########## START: MAIN PANEL ########## -->
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item">Inventory</a>
      <span class="breadcrumb-item active">Update Categories</span>
    </nav>

    <div class="sl-pagebody"><!-- MAIN CONTENT -->
		<div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Category Update</h6>
          <p class="mg-b-20 mg-sm-b-30">A form for updating categories</p>
          <form action="action.php" method="POST" enctype="multipart/form-data">
            
         
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Name: </label>
                  <input class="form-control" type="text" name="product_name" value="<?= $data['product_name'] ?>" placeholder="Enter product name" required>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Quantity: </label>
                  <input class="form-control" type="number" name="quantity" value="<?= $data['quantity'] ?>" placeholder="Enter Quantity" required>
                </div>
              </div><!-- col-4 -->
              

               <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category:</label>
                 <select class="form-control" name="category_id">
                    
                    <option >--Select Type--</option>
                    <?php

                      foreach ($category_list as $key => $cat) {
                    ?>

                       <option <?php if($data['category_id']== $cat['id']){?> selected <?php } ?> value="<?= $cat['id'] ?>"><?= $cat['category_name'] ?></option>

                    <?php 
                      }
                    ?>
                  </select>
                </div>
              </div><!-- col-8 -->
             
            </div><!-- row -->
            <input type="hidden" name="product_id" value="<?= $data['id'] ?>">
            <div class="form-layout-footer">
              <button type="submit" class="btn btn-success mg-r-5" name="btn-ProductUpdate">Update Product</button>
              
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->

          </form>
    </div>      

    </div><!-- sl-pagebody --><!-- END MAIN CONTENT -->


  <?php require 'd_footer.php' ?>
  </div><!-- sl-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->

  <?php require 'd_javascript.php' ?>
  </body>
</html>

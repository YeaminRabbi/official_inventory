<?php 
    
    require 'custom_function.php';
    if(isset($_GET['product_master_category']))
    {
      $master_category_name = $_GET['product_master_category'];

      $product_list = fetch_all_data_usingPDO($pdo,"select * from category join product on product.category_id = category.id WHERE category.master_category_name like '$master_category_name'");
    }
    else{
      header('Location: index.php');
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
      <a class="breadcrumb-item" href="index.php">Inventory</a>
      <span class="breadcrumb-item active">Product List</span>
    </nav>

    <div class="sl-pagebody"><!-- MAIN CONTENT -->
      <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Product Details</h6>
          
          <?php

            if(isset($_GET['update']))
            {
          ?>

           <div class="alert alert-success alert-dismissible" style="height: 50px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Added Successfully!
          </div>
          <?php 
            }
          ?>


          <?php

            if(isset($_GET['exist']))
            {
          ?>

           <div class="alert alert-warning alert-dismissible" style="height: 50px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
              Product Aleary Added!
          </div>
          <?php 
            }
          ?>
         
          <div class="table-wrapper">
            <table id="myTable" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th >SL</th>
                  <th >Product Name</th>
                  <th >Category Name</th>
                  <th >Available Quantity</th>
                  <th >Requisite Quantity</th>

                  <th >Action</th>
                  
                </tr>
              </thead>
              <tbody>
                
                <?php

                    foreach ($product_list as $key => $data) {
                ?>
                  
                    <tr>
                      <form action="action.php" method="POST">
                      <td><?php echo $key+1; ?></td>
                      <td><?php echo $data['product_name']; ?></td>
                      <td><?php echo $data['category_name']; ?></td>
                      <td><?php echo $data['quantity']; ?></td>
                      <td>

                        <input type="number" name="choose_quantity" value="1" min="1" max="<?= $data['quantity']; ?>" style="width: 50px;">
                      </td>

                      <td>
                         <button class="btn btn-success" type="submit" name="btn-addToCart">Add to Cart</button>
                       </td>



                      <input type="hidden" name="product_name" value="<?= $data['product_name']  ?>">
                      
                      <input type="hidden" name="category_name" value="<?= $data['category_name']  ?>">
                      <input type="hidden" name="master_category_name" value="<?= $master_category_name  ?>">
                      <input type="hidden" name="product_id" value="<?= $data['id']  ?>">

                      </form>
                    </tr>
                    
                <?php
                    }

                ?>
               
                
               
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div>    

      
    </div><!-- sl-pagebody --><!-- END MAIN CONTENT -->


  <?php require 'd_footer.php' ?>
  </div><!-- sl-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->

  <?php require 'd_javascript.php' ?>


   <script>
    $('#myTable').DataTable({
    bLengthChange: true,
    searching: true,
    responsive: true
  });
  </script>
  </body>
</html>

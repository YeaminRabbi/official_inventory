<?php require 'd_header.php' ?>

<?php 
  
    require 'custom_function.php';
  
    $user_id = $_SESSION['user_id'];

    $product_list = fetch_all_data_usingPDO($pdo,"select * from cart where user_id = '$user_id'");
    
    $product_list_count = fetch_all_data_usingDB($db,"select count(*) as 'count' from cart where user_id = '$user_id'");

  

?>

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
      <span class="breadcrumb-item active">Requisition List</span>
    </nav>

    <div class="sl-pagebody"><!-- MAIN CONTENT -->
      <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Requisition List Details</h6>
          
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

            if(isset($_GET['delete']))
            {
          ?>

           <div class="alert alert-danger alert-dismissible" style="height: 50px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
              Product(s) Removed!
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
                  <th >Quantity</th>
                  

                  <th >Action</th>
                  
                </tr>
              </thead>
              <tbody>
                
                <?php

                    foreach ($product_list as $key => $data) {
                ?>
                  
                    <tr>
                      
                      <td><?php echo $key+1; ?></td>
                      <td><?php echo $data['product_name']; ?></td>
                      <td><?php echo $data['category_name']; ?></td>
                      <td><?php echo $data['choose_quantity']; ?></td>
                      
                      <td>
                         <a href="action.php?delete_CART_productID=<?= $data['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                      </td>
                      
                    </tr>
                    
                <?php
                    }

                ?>
               
                
               
              </tbody>

            </table>

            <div class="d-flex mt-3" style="width: 200px;margin-right: 0px;">
              


              <?php 

                if($product_list_count['count'] != 0)
                {
              ?>


              <form action="action.php" method="POST">

                  <input type="hidden" name="user_id" value="<?= $user_id  ?>">
                  <button class="btn btn-primary" type="submit" name="btn_requisition_order_to_billing">Confirm Requisition</button>
              </form>
              
               &nbsp&nbsp&nbsp
              <a href="action.php?clear_cart=<?=  $user_id  ?>">
                <button class="btn btn-outline-danger">Clear Requisition List</button>
              </a>

              <?php 
                }
                else{

              ?>

              <button class="btn btn-primary" disabled>Confirm Requisition</button>
               &nbsp&nbsp&nbsp
              <button class="btn btn-outline-danger" disabled>Clear Requisition List</button>
              

              <?php 
                }

              ?>
              

             
            </div>
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

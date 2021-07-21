<?php require 'd_header.php' ?>

<?php 
  
    require 'custom_function.php';
  
    if(isset($_GET['order_id']))
    {
      $order_id = $_GET['order_id'];

      $product_list = fetch_all_data_usingPDO($pdo,"select * from requisition_order_product_list where order_id = '$order_id'");
  
    }
    else
    {
      header('Location: index.php');
    }



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
      <span class="breadcrumb-item active">Requisition Products</span>
    </nav>

    <div class="sl-pagebody"><!-- MAIN CONTENT -->
      <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Requisition Products Details</h6>
         
         
          <div class="table-wrapper">
            <table id="myTable" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th >SL</th>
                  <th >Product Name</th>
                  <th >Category Name</th>
                  <th >Quantity</th>
                 

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
                      <td><?php echo $data['quantity']; ?></td>
                      

                    </tr>
                    
                <?php
                    }

                ?>
               
                
               
              </tbody>

            </table>

        <a href="requisition_history.php" class="btn btn-dark mt-3">Back</a>
             
           
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

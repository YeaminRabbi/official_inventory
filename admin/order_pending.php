<?php require 'd_header.php' ?>

<?php 
  
    require 'custom_function.php';
    
    $requisition_list = fetch_all_data_usingPDO($pdo,"select * from requisition_order_list where status = 0");

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
      <span class="breadcrumb-item active">Requisition Pending</span>
    </nav>

    <div class="sl-pagebody"><!-- MAIN CONTENT -->
      <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Requisition Details</h6>
          
          <?php

            if(isset($_GET['orderConfirm']))
            {
          ?>

           <div class="alert alert-success alert-dismissible" style="height: 50px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Requisition Confirmed Successfully!
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
                  <th >Order Name</th>
                  <th >Order Contact</th>
                  <th >Order Placed</th>
                   <th >Status</th>

                  <th >Action</th>
                  
                </tr>
              </thead>
              <tbody>
                
                <?php

                    foreach ($requisition_list as $key => $data) {
                ?>
                  
                    <tr>
                      
                      <td><?php echo $key+1; ?></td>
                      <td><?php echo $data['order_name']; ?></td>
                      <td><?php echo $data['order_contact']; ?></td>
                      <td>
                        <?php
                          $date = date("d M, Y | h:ia", strtotime($data['created_at']));
                          echo $date;
                        ?>
                      </td>
                      <td>
                        <?php 

                          if($data['status'] != 1){
                            echo 'PENDING';
                          }
                          else{
                            echo 'DELIVERED';
                          }
                        ?>
                        
                      </td>

                      <td>
                         <a href="order_product_list.php?order_id=<?= $data['id'] ?>" class="btn btn-primary">View Products</a>


                         <a href="order_user_details.php?user_id=<?= $data['user_id'] ?>&order_id=<?= $data['id'] ?>" class="btn btn-warning">User</a>

                         <a href="action.php?confirm_order_id=<?= $data['id'] ?>" class="btn btn-success">Confirm</a>


                      </td>
                      
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

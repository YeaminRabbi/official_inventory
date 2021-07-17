<?php 
  
  require 'custom_function.php';
  
  if(isset($_GET['edit_category_id'])){
    $category_id = $_GET['edit_category_id'];

    $data = fetch_all_data_usingDB($db,"select * from category where id = '$category_id'");

  }

  else{
    header("Location: category_list.php");
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
                  <label class="form-control-label">Category Name: </label>
                  <input class="form-control" type="text" value="<?= $data['category_name'] ?>" name="category_name" placeholder="Enter product name" required>
                </div>
              </div><!-- col-4 -->
              

               <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Master Category:</label>
                 <select class="form-control" name="master_category_name">
                    
                    <option >--Select Type--</option>
                    <option <?php if($data['master_category_name']== "ELECTRONICS"){?> selected <?php } ?> value="ELECTRONICS">ELECTRONICS</option>

                    <option <?php if($data['master_category_name']== "SOFTWARE"){?> selected <?php } ?> value="SOFTWARE">SOFTWARE</option>
                    
                    <option <?php if($data['master_category_name']== "HARDWARE"){?> selected <?php } ?>  value="HARDWARE">HARDWARE</option>
                    
                    <option <?php if($data['master_category_name']== "FURNITURE"){?> selected <?php } ?>  value="FURNITURE">FURNITURE</option>
                    
                    <option <?php if($data['master_category_name']== "STATIONARY"){?> selected <?php } ?>  value="STATIONARY">STATIONARY</option>
                    
                  </select>

                  <input type="hidden" name="category_id" value="<?= $data['id'] ?>">
                </div>
              </div><!-- col-8 -->
             
            </div><!-- row -->

            <div class="form-layout-footer">
              <button type="submit" class="btn btn-success mg-r-5" name="btn-CategoryUpdate">Update Category</button>
              
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

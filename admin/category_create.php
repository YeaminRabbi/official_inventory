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
      <span class="breadcrumb-item active">Insert Categories</span>
    </nav>

    <div class="sl-pagebody"><!-- MAIN CONTENT -->
		<div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Category Insert</h6>
          <p class="mg-b-20 mg-sm-b-30">A form for inserting categories</p>
          <form action="action.php" method="POST" enctype="multipart/form-data">
            
         
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Category Name: </label>
                  <input class="form-control" type="text" name="category_name" placeholder="Enter category name" required>
                </div>
              </div><!-- col-4 -->
              

               <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Master Category:</label>
                 <select class="form-control" name="master_category_name">
                    
                    <option >--Select Type--</option>
                    <option value="ELECTRONICS">ELECTRONICS</option>
                    <option value="SOFTWARE">SOFTWARE</option>
                    <option value="HARDWARE">HARDWARE</option>
                    <option value="FURNITURE">FURNITURE</option>
                    <option value="STATIONARY">STATIONARY</option>
                    
                  </select>
                </div>
              </div><!-- col-8 -->
             
            </div><!-- row -->

            <div class="form-layout-footer">
              <button type="submit" class="btn btn-primary mg-r-5" name="btn-CategoryInsert">Insert Category</button>
              
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

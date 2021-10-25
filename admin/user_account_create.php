<?php 
  
  require '../db_config.php';

  function fetch_all_data_usingPDO($pdo,$sql)
  {
    
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $row = $statement->fetchAll();

    return $row;
  }

  $schools = fetch_all_data_usingPDO($pdo,"select * from schools");
  $division = fetch_all_data_usingPDO($pdo,"select * from division");


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
      <span class="breadcrumb-item active">Insert User Information</span>
    </nav>

    <div class="sl-pagebody"><!-- MAIN CONTENT -->
		<div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">User Account Create</h6>
          <p class="mg-b-20 mg-sm-b-30">A form for inserting User Informations</p>
          
          <?php

            if(isset($_GET['msg']))
            {
          ?>

           <div class="alert alert-success alert-dismissible" style="height: 50px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Account Created Successfully!
          </div>
          <?php 
            }
          ?>



          <form action="action.php" method="POST">

          <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Enter name">
          </div><!-- form-group -->


          <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Enter email">
          </div><!-- form-group -->

          <div class="form-group">
            <input type="text" class="form-control" name="contact" placeholder="Enter contact">
          </div><!-- form-group -->

          <div class="form-group">
            <input type="radio" value="TEACHER"  name="user_type" id="user_type1" onclick="myFunctionSchool()" > <label for="user_type1">Teacher</label>

            &nbsp&nbsp&nbsp&nbsp
            
            <input type="radio" value="OFFICIAL" name="user_type" id="user_type2" onclick="myFunctionDivision()" > <label for="user_type2">Official</label>
          </div><!-- form-group -->


                <div class="form-group mg-b-10-force" style="display: none;" id="SCHOOL">
                  <label class="form-control-label">School:</label>
                   <select class="form-control" name="school">
                      
                      <option value="">--Select Type--</option>
                      <?php

                        foreach ($schools as $key => $data) {
                      ?>

                         <option value="<?= $data['id'] ?>"><?= $data['school_name'] ?></option>

                      <?php 
                        }
                      ?>
                    </select>
                </div>

                <div class="form-group mg-b-10-force" style="display: none;" id="DIVISION">
                  <label class="form-control-label">Division:</label>
                   <select class="form-control" name="division">
                      
                      <option value="">--Select Type--</option>
                      <?php

                        foreach ($division as $key => $data) {
                      ?>

                         <option value="<?= $data['id'] ?>"><?= $data['division_name'] ?></option>

                      <?php 
                        }
                      ?>
                    </select>
                </div>
          
          <div class="form-group">
            <input type="text" class="form-control" name="designation" placeholder="Enter Designation">
          </div><!-- form-group -->

          <div class="form-group">
            <input type="text" class="form-control" name="official_id" placeholder="Enter Official ID">
          </div><!-- form-group -->

          <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Enter password">
            
          </div><!-- form-group -->
        
        <button type="submit" name="btn-USERCREATE" class="btn btn-info btn-block">Create User</button>

       
        
        
        </form>
    </div>      

    </div><!-- sl-pagebody --><!-- END MAIN CONTENT -->
 <script>
      
      function myFunctionSchool() {
          var x = document.getElementById('SCHOOL');
          var y = document.getElementById('DIVISION');
          if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
          } else {
            x.style.display = "none";
          }
        }

        function myFunctionDivision() {
          var x = document.getElementById('DIVISION');
          var y = document.getElementById('SCHOOL');
          if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
          } else {
            x.style.display = "none";
          }
        }

    </script>

  <?php require 'd_footer.php' ?>
  </div><!-- sl-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->

  <?php require 'd_javascript.php' ?>
  </body>
</html>

<?php
include('security.php');

include('includes/header.php');
include('includes/navbar.php');
?>

 
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

    <?php
      
      include('includes/topbar.php');

    ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

        <div class="container">
          <!-- Trigger the modal with a button -->
          <h3>Academics - Departments
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#myModal"> ADD</button>
          </h6>

          <?php

            if (isset($_SESSION['success']) && $_SESSION['success'] !='') {
              echo '<h2>'. $_SESSION['success']. '</h2>';
              unset($_SESSION['success']);
            }

            if (isset($_SESSION['status']) && $_SESSION['status'] !='') {
              echo '<h2 class="bg-info">'. $_SESSION['status']. '</h2>';
              unset($_SESSION['status']);
            }

          ?>

          <!-- Modal -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">

                <div class="modal-header">
                  <div>Add Departments</div>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title "></h4>
                </div>
                

                <!-- Form -->
                <form action="code.php" method="POST" enctype="multipart/form-data">
                
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="title">Dept Name:</label>
                        <input type="text" name="dept_name" class="form-control" placeholder="Enter Name">
                      </div>

                      <div class="form-group">
                        <label for="dsc">Description:</label>
                        <textarea type="text" name="description" class="form-control" >The description </textarea>
                        
                      </div>
                      <div class="form-group">
                        <label for="links">Dept Image:</label>
                        <input type="file" name="dept_image" class="form-control" placeholder="links">
                      </div> 
                           
                    </div>

                    <div class="modal-footer">
                        <button type="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button name="dept_btn" type="save" class="btn btn-primary">Save</button>
                    </div>

                </form>

            </div>
          </div>
          
        </div>
        <!-- End Modal -->

          
          
          <?php
            //1) Connect to data base
            //2) Select data base
            //3) Perform query
            //4) Use return data
            //5) Close connection
           

          ?>


                        
          <table class="table table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>

         

              <tr>
                <td>1</td>
                <td>Computer Department </td>
                <td>Department of Computer Science</td>                
                <td>Image will apear here</td>
                <td>
                  <form action="about_us_edit.php" method="POST">
                    <input type="hidden" name="edit_id" value="" >
                    <button type="submit" name="edit_btn" class="btn btn-success">EDIT</button>   
                  </form>
                </td>
                <td>
                  <form action="code.php" method="POST">
                    <input type="hidden" name="delete_id" value="">
                    <button type="submit" name="aboutus_deletebtn"  class="btn btn-danger">DELETE</button> 
                  </form>
                </td>
              </tr>

          

            </tbody>
          </table>

          

     
      </div>
      <!-- End of Main Content -->



  <?php
    include('includes/scripts.php');
    include('includes/footer.php');
  ?>
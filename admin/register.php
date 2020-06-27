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
          <h6>Admin Profile
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"> Add Admin Profile</button>
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
                  <div>Add Admin Detail</div>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title "></h4>
                </div>
                

                <!-- Form -->
                <form action="code.php" method="POST">
                
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="text">User name:</label>
                        <input type="text" name="username" class="form-control" placeholder="Enter username">
                      </div>
                      <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email">
                      </div>
                      <div class="form-group">
                       
                        <input type="hidden" name="usertype" class="form-control" value="Admin" placeholder="Enter Usertype">
                      </div>
                      <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter password">
                      </div>
                      <div class="form-group">
                        <label for="cpwd">Confirm Password:</label>
                        <input type="password" name="confirmpassword" class="form-control" placeholder="Confirmpassword">
                      </div> 
                           
                    </div>

                    <div class="modal-footer">
                        <button type="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button name="registerbtn" type="save" class="btn btn-primary">Save</button>
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
            $connection = mysqli_connect("localhost", "root", "", "adminpanel");
            if (!$connection) {
              die("Database connection fail: ". mysqli_error($connection));
            }

            $db_select = mysqli_select_db($connection, "adminpanel");
            if (!$db_select) {
              die("Database selection fail: ". mysqli_error($connection));
            }

            $result = mysqli_query($connection, "SELECT * FROM register");
            if (!$result) {
              die("Query failed: ". mysqli_error($connection));
            }

          ?>


                        
          <table class="table table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Usertype</th>
                <th>Password</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>

          <?php

            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                
          ?>

              <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['usertype']; ?></td>                
                <td><?php echo $row['password']; ?></td>
                <td>
                  <form action="register_edit.php" method="POST">
                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>" >
                    <button type="submit" name="edit_btn" class="btn btn-success">EDIT</button>   
                  </form>
                </td>
                <td>
                  <form action="code.php" method="POST">
                    <input type="hidden" name="delete_id" value="<?php echo $row['id'] ?>">
                    <button type="submit" name="deletebtn"  class="btn btn-danger">DELETE</button> 
                  </form>
                </td>
              </tr>

          <?php

              } 

            } else {

              echo "<h1><strong>". "No Record found". "</strong></h1>";

            }

          ?>

            </tbody>
          </table>

          

     
      </div>
      <!-- End of Main Content -->



  <?php
    include('includes/scripts.php');
    include('includes/footer.php');
  ?>
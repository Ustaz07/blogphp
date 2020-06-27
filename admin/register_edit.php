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

<!-- Start container edit profile -->
<div class="container">
  <h1 class=" font-weight-bold text-primary">EDIT Admin Profile</h1>  


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


            if (isset($_POST['edit_btn'])) {
              
              $id = $_POST['edit_id'];

              $result = mysqli_query($connection, "SELECT * FROM register WHERE id='$id' ");
              if (!$result) {
              die("Query failed: ". mysqli_error($connection));
              }

              while ($row = mysqli_fetch_array($result)) {
              //foreach ($result as $row) {
      

                  ?>

  <form action="code.php" method="POST">

    <input type="text" name="edit_id" value="<?php echo $row['id']; ?>">
    
    <div class="form-group">
      <label for="text">User name:</label>
      <input type="text" name="edit_username" value="<?php echo $row['username']; ?>" class="form-control" id="username" >
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" name="edit_email" value="<?php echo $row['email']; ?>" class="form-control" id="email" >
    </div>
    <div class="form-group">
    <label for="usertype" >User Type:</label>
    <select name="update_usertype" class="form-control">
      <option value="admin">Admin</option>
      <option value="user">User</option>
    </select>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" name="edit_password" value="<?php echo $row['password']; ?>" class="form-control" id="pwd" >
    </div>  
    <div class="">
      <a href="register.php" class="btn btn-danger">Cancel</a>

      <button type="update" name="updatebtn" class="btn btn-primary">Update</button>

    </div>

  </form>
 
    <?php

       }
    }
    
    ?>
  

	</div>
	<!-- End container edit profile -->

<!-- End of Main Content -->
</div>


<?php
  include('includes/scripts.php');
  include('includes/footer.php');
?>
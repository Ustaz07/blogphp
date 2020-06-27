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
  <h1 class=" font-weight-bold text-primary">EDIT Faculty</h1>  


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


            if (isset($_POST['faculty_edit_btn'])) {
              
                $id = $_POST['edit_id'];

                $result = mysqli_query($connection, "SELECT * FROM faculty WHERE id='$id' ");
                if (!$result) {
                die("Query failed: ". mysqli_error($connection));
                }

                foreach ($result as $row ) {
                  echo $row['id'];

?>



      <form action="" method="POST">

        <input type="text" name="edit_id" value="<?php echo $row['id']; ?>">

<?php
                }
            }
              
                  ?>
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" name="edit_name" value="" class="form-control" >
        </div>
        <div class="form-group">
          <label for="design">Designation:</label>
          <input type="text" name="edit_designation" value="" class="form-control" >
        </div>
        <div class="form-group">
          <label for="descrip">Description:</label>
          <input type="text" name="edit_description" value="" class="form-control" >
        </div>
        <div class="form-group">
          <label for="image">Image:</label>
          <input type="text" name="edit_image" value="" class="form-control" >
        </div>    
        <div class="">
          <a href="faculty.php" class="btn btn-danger">Cancel</a>

          <button type="update" name="update_aboutusbtn" class="btn btn-primary">Update</button>

    </div>

  </form>
   

	</div>
	<!-- End container edit profile -->

<!-- End of Main Content -->
</div>


<?php
  include('includes/scripts.php');
  include('includes/footer.php');
?>
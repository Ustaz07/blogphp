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
  <h1 class=" font-weight-bold text-primary">EDIT About Us</h1>  


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

              $result = mysqli_query($connection, "SELECT * FROM aboutus WHERE id='$id' ");
              if (!$result) {
              die("Query failed: ". mysqli_error($connection));
              }

              while ($row = mysqli_fetch_array($result)) {
              //foreach ($result as $row) {
      

                  ?>

                 

  <form action="code.php" method="POST">

    <input type="text" name="edit_id" value="<?php echo $row['id']; ?>">
    <div class="form-group">
      <label for="text">Title:</label>
      <input type="text" name="edit_title" value="<?php echo $row['title']; ?>" class="form-control" >
    </div>
    <div class="form-group">
      <label for="sub_title">Sub Title:</label>
      <input type="text" name="edit_sub_title" value="<?php echo $row['sub_title']; ?>" class="form-control" >
    </div>
    <div class="form-group">
      <label for="pwd">Description:</label>

      <textarea type="text" name="edit_description" value="" rows="7" class="form-control"> <?php echo $row['description']; ?> </textarea>

    </div>
    <div class="form-group">
      <label for="links">Links:</label>
      <input type="text" name="edit_links" value="<?php echo $row['links']; ?>" class="form-control" >
    </div>    
    <div class="">
      <a href="about_us.php" class="btn btn-danger">Cancel</a>

      <button type="update" name="update_aboutusbtn" class="btn btn-primary">Update</button>

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
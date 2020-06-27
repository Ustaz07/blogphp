<?php
include('security.php');

include('includes/header.php');
include('includes/navbar.php');
?>


	<div class="container-fluid">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="n-0 font-weight-bold text-primary">Faculty Edit</h6>
			</div>
		</div>
	<div class="card-body">


	<?php
	    
   		if (isset($_POST['edit_data_btn'])) 
   		{
      
	        $id = $_POST['edit_id'];

	        $query = " SELECT * FROM register WHERE id='$id' ";
	        $query_run = mysqli_query($connection, $query);
	        

        foreach ($query_run as $row ) {
   
	?>

	<form action="" method="POST" >

        <input type="text" name="edit_id" value="<?php echo $row['id'] ?>" >
		
		<div class="form-group">
          <label>Name:</label>
          <input type="text" name="edit_name" value="<?php echo $row['name']; ?>" class="form-control" >
        </div>
        <div class="form-group">
          <label>Designation:</label>
          <input type="text" name="edit_designation" value="<?php echo $row['design']; ?>" class="form-control" >
        </div>
        <div>
          <label>Description:</label>
          <input type="text" name="edit_description" value="<?php echo $row['descrip']; ?>" class="form-control" >
        </div>
        <div class="form-group">
          <label>Upload Image:</label>
          <input type="file" name="edit_faculty_image" id="faculty_image" value="<?php echo $row['image']; ?>" class="form-control" >
        </div> 

        <div class="">
          <a href="faculty.php" class="btn btn-danger">Cancel</a>

          <button type="update" name="update_aboutusbtn" class="btn btn-primary">Update</button>

    	</div>

    </form>

<?php
			}
		}
	?>
	

			
		</div>
	</div>

<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>
<?php
include('security.php');



	//Coding for Department Add ------------------------------------------
	if (isset($_POST['dept_btn'])) {
		// var_dump($_POST);

		$dept_name = $_POST['dept_name'];
		$description = $_POST['description'];

		$dept_image = $_FILES['dept_image']['name'];

		
		$img_types = array('image/jpg', 'image/png', 'image/jpeg');
		
		$validate_img_extension = in_array($_FILES['dept_image']['type'], $img_types);
       
        
		//print_r($validate_img_extension);
		if ($validate_img_extension) {

			if (file_exists("upload/department/" .  basename($_FILES["dept_image"]["name"]))) {
				
				$store = $_FILES["dept_image"]["name"];
				$_SESSION['status'] = "File exist! " . $store ;
				header('Location: departments.php');

			} else {

				$query = "INSERT INTO dept_category (name, description, image) VALUES ('$dept_name', '$description', '$dept_image')";
				$query_run = mysqli_query($connection, $query);

					if ($query_run) {
						//Not that there must be / has to be infront of department not at the back....
						move_uploaded_file($_FILES["dept_image"]["tmp_name"], "upload/department/" . basename($_FILES["dept_image"]["name"]));
						//echo "Saved";
						$_SESSION['success'] = "<div class='alert alert-success'><strong>". "Department Added!". "</strong></div>";
						header('Location: departments.php');

					} 	else{

						$_SESSION['status'] = "Department Not Added!";
						header('Location: departments.php');

					}

			}
			
		} else {

			$_SESSION['status'] = "Only JPG, PNG, JPEG are allowed" ;
			header('Location: departments.php');
			return;

		}

	}






	//Coding for Department Edit ------------------------------------------

	if (isset($_POST['dept_update_btn'])) {
		$id = $_POST['edit_id'];
		$edit_name = $_POST['edit_name'];
		$edit_description = $_POST['edit_description'];
		
		$edit_dept_image = $_FILES['dept_image']['name'];


		// if ($edit_faculty_image) {
		// 	die($edit_faculty_image);
		// }

		// echo "<pre>" . var_dump($_POST) . "</pre>";
		
		// <pre></pre>

		// print_r($edit_dept_image);

		// get_defined_vars($validate_img_extension);

		// gettype($validate_img_extension);

		$department_result = mysqli_query($connection, "SELECT * FROM dept_category WHERE id='$id' ");
			
		foreach ($department_result as $fa_row) {
			// echo $fa_row['image'];
			
			if ($edit_dept_image == NULL ) {
				
				// Update with existing Image
				$image_data = $fa_row['image'];

			} else {

				// Update with new Image and delete Old image
				if ($image_path = "upload/department/" . $fa_row['image']) {
					unlink($image_path);
					$image_data = $edit_dept_image;

				}
				
			}
		}

		$result = mysqli_query($connection, "UPDATE dept_category SET id='$id', name='$edit_name', description='$edit_description', image='$image_data' WHERE id= '$id' ");
		  	if (!$result) {
		  	die("Query Update failed: ". mysqli_error($connection));
		}

		if ($result) {

			if ($edit_dept_image == NULL ) {
				
				// Update with existing Image.............
				$_SESSION['success'] = "<div class='alert alert-success'><strong>". "Department Updated! with existing Image". "</strong></div>";
				header('Location: departments.php');

			} else {

				// Update with new Image and deleted Old image...........
				//Not that the / has to be infront of upload not at the back....
				move_uploaded_file($_FILES["dept_image"]["tmp_name"], "upload/department/" . basename($_FILES["dept_image"]["name"]));
				//echo "Saved";
				$_SESSION['success'] = "<div class='alert alert-success'><strong>". "Department Updated!". "</strong></div>";
				header('Location: departments.php');

			}
			

		} 	else{

			$_SESSION['status'] = "Faculty Not Updated!";
			header('Location: departments.php');

		}

	}	

	


	//Coding for Department Delete ------------------------------------------
	if (isset($_POST['dept_delete_btn'])) {
		$id = $_POST['delete_id'];

		// echo "<pre>" . var_dump($_POST) . "</pre>";

		$result = mysqli_query($connection, "DELETE FROM dept_category WHERE id='$id' ");

		if ($result) {

			$_SESSION['success'] = "<div class='alert alert-danger'><strong>". "Department Deleted!". "</strong></div>";
			header('Location: departments.php');

		} else {

			$_SESSION['status'] = "Department Not Deleted!";
			header('Location: departments.php');

		}
	}





















	//Coding for Faculty Add ------------------------------------------
	if (isset($_POST['faculty_btn'])) {

		$name = $_POST['name'];
		$designation = $_POST['designation'];
		$description = $_POST['description'];
		$image = $_FILES['faculty_image']['name'];

		// $validate_img_extension = $_FILES['faculty_image']['type']=="image/jpg" || $_FILES['faculty_image']['type']=="image/png" || $_FILES['faculty_image']['type']=="image/jpeg";

		$img_types = array('image/jpg', 'image/png', 'image/jpeg');
		
		$validate_img_extension = in_array($_FILES['faculty_image']['type'], $img_types);
       
        
		//print_r($validate_img_extension);
		if ($validate_img_extension) {

			if (file_exists("upload/" .  basename($_FILES["faculty_image"]["name"]))) {
				
				$store = $_FILES["faculty_image"]["name"];
				$_SESSION['status'] = "File exist! " . $store ;
				header('Location: faculty.php');

			} else {

				/*  //If you want to specify the path.....
				$ImageName = $_FILES['file']['name'];
				$fileElementName = 'file';
				$path = 'Users/George/Desktop/uploads/'; 
				$location = $path . $_FILES['file']['name']; 
				move_uploaded_file($_FILES['file']['tmp_name'], $location); 
				*/

				$query = "INSERT INTO faculty (name, designation, description, image) VALUES ('$name', '$designation', '$description', '$image')";
				$query_run = mysqli_query($connection, $query);

					if ($query_run) {
						//Not that the / has to be infront of upload not at the back....
						move_uploaded_file($_FILES["faculty_image"]["tmp_name"], "upload/" . basename($_FILES["faculty_image"]["name"]));
						//echo "Saved";
						$_SESSION['success'] = "<div class='alert alert-success'><strong>". "Faculty Added!". "</strong></div>";
						header('Location: faculty.php');

					} 	else{

						$_SESSION['status'] = "Faculty Not Added!";
						header('Location: faculty.php');

					}

			}
			
		} else {

			$_SESSION['status'] = "Only JPG, PNG, JPEG are allowed" ;
			header('Location: faculty.php');
			return;

		}

	}





	//Coding for Faculty Edit ------------------------------------------

	if (isset($_POST['faculty_update_btn'])) {
		$id = $_POST['edit_id'];
		$edit_name = $_POST['edit_name'];
		$edit_designation = $_POST['edit_designation'];
		$edit_description = $_POST['edit_description'];
		
		$edit_faculty_image = $_FILES['faculty_image']['name'];


		// if ($edit_faculty_image) {
		// 	die($edit_faculty_image);
		// }

		// echo "<pre>" . var_dump($_POST) . "</pre>";
		
		// <pre></pre>

		// print_r($validate_img_extension);

		// get_defined_vars($validate_img_extension);

		// gettype($validate_img_extension);

		$faculty_result = mysqli_query($connection, "SELECT * FROM faculty WHERE id='$id' ");
			
		foreach ($faculty_result as $fa_row) {
			// echo $fa_row['image'];
			
			if ($edit_faculty_image == NULL ) {
				
				// Update with existing Image
				$image_data = $fa_row['image'];

			} else {

				// Update with new Image and delete Old image
				if ($image_path = "upload/" . $fa_row['image']) {
					unlink($image_path);
					$image_data = $edit_faculty_image;

				}
				
			}
		}

		$result = mysqli_query($connection, "UPDATE faculty SET id='$id', name='$edit_name', designation='$edit_designation', description='$edit_description', image='$image_data' WHERE id= '$id' ");
		  	if (!$result) {
		  	die("Query Update failed: ". mysqli_error($connection));
		}

		if ($result) {

			if ($edit_faculty_image == NULL ) {
				
				// Update with existing Image.............
				$_SESSION['success'] = "<div class='alert alert-success'><strong>". "Faculty Updated! with existing Image". "</strong></div>";
				header('Location: faculty.php');

			} else {

				// Update with new Image and deleted Old image...........
				//Not that the / has to be infront of upload not at the back....
				move_uploaded_file($_FILES["faculty_image"]["tmp_name"], "upload/" . basename($_FILES["faculty_image"]["name"]));
				//echo "Saved";
				$_SESSION['success'] = "<div class='alert alert-success'><strong>". "Faculty Updated!". "</strong></div>";
				header('Location: faculty.php');

			}
			

		} 	else{

			$_SESSION['status'] = "Faculty Not Updated!";
			header('Location: faculty.php');

		}

	}	

												



//Coding for Faculty Delete ------------------------------------------

if (isset($_POST['faculty_deletebtn'])) {

	$id = $_POST['delete_id'];

	$result = mysqli_query($connection, "DELETE FROM faculty WHERE id='$id' ");

	if ($result) {

		$_SESSION['success'] = "<div class='alert alert-danger'><strong>". "Faculty Deleted!". "</strong></div>";
		header('Location: faculty.php');

	} else {

		$_SESSION['status'] = "Faculty Not Deleted!";
		header('Location: faculty.php');

	}
}


























	//Coding for Register------------------------------------------
	
	//$connection = mysqli_connect("localhost", "root", "", "adminpanel");

	if (isset($_POST['registerbtn'])) {
		$username = $_POST['username'];
		$email = $_POST['email'];
		$usertype = $_POST['usertype'];
		$password = $_POST['password'];
		$cpassword = $_POST['confirmpassword'];
		
		if ($password === $cpassword) {
			
			$query = "INSERT INTO register (username, email, usertype, password) VALUES ('$username', '$email', '$usertype', '$password')";
			$query_run = mysqli_query($connection, $query);

			if ($query_run) {

				//echo "Saved";
				$_SESSION['success'] = "<div class='alert alert-success'><strong>". "Admin Profile Added Successfully!". "</strong></div>";
				header('Location: register.php');

			} 	else{

				$_SESSION['status'] = "Admin Profile NOT Saved";
				header('Location: register.php');

			}
		}	else{
                           
			$_SESSION['status'] = "Password and confirmpassword does not match";
			header('Location: register.php');

		}	
	}








//Update Button Code ..............................................

//1) Connect to data base
//2) Select data base
//3) Perform query
//4) Use return data
//5) Close connection

/*$connection = mysqli_connect("localhost", "root", "", "adminpanel");
if (!$connection) {
  die("Database connection fail: ". mysqli_error($connection));
}*/

$db_select = mysqli_select_db($connection, "adminpanel");
if (!$db_select) {
  die("Database selection fail: ". mysqli_error($connection));
}


if (isset($_POST['updatebtn'])) {

	$id = $_POST['edit_id'];
	$username = $_POST['edit_username'];
	$update_usertype = $_POST['update_usertype'];
	$email = $_POST['edit_email'];
	$passsword = $_POST['edit_password'];  


      
 	$result = mysqli_query($connection, "UPDATE register SET username='$username', usertype = '$update_usertype', email='$email', password='$passsword' WHERE id='$id' ");
  	if (!$result) {
  	die("Query failed: ". mysqli_error($connection));
 	}


 	if ($result) {
 		$_SESSION['success'] = "<div class='text-success'>". " Your data is Successfully Updated!". "</div>";
 		header('Location: register.php');
 	} else{
 		$_SESSION['status'] = "Your data is NOT Successfully";
 		header('Location: register.php');
 	}

  	//while ($row = mysqli_fetch_array($result)) {
  	//foreach ($result as $row) {
  

	//}
}








//Delete Button Code..............................................
if (isset($_POST['deletebtn'])) {

	$id = $_POST['delete_id'];
	//echo $id;

	//1) Connect to data base
	//2) Select data base
	//3) Perform query
	//4) Use return data
	//5) Close connection

/*	$connection = mysqli_connect("localhost", "root", "", "adminpanel");
	if (!$connection) {
	  die("Database connection fail: ". mysqli_error($connection));
	}
*/
	
	$db_select = mysqli_select_db($connection, "adminpanel");
	if (!$db_select) {
	  die("Database selection fail: ". mysqli_error($connection));
	}

	$result = mysqli_query($connection, "DELETE FROM register WHERE id=$id ");
  	if (!$result) {
  	die("Query failed: ". mysqli_error($connection));
 	}

 	if ($result) {
 		$_SESSION['success'] = "<div class='text-danger'><strong>". " Your data is DELETED!". "</strong></div>";
 		header('Location: register.php');
 	} else{
 		$_SESSION['status'] = "Your data is NOT DELETED";
 		header('Location: register.php');
 	}


}






























//About Us Insert Button Update Code ..............................................

if (isset($_POST['about_usbtn'])) {
		$links = $_POST['title'];
		$sub_title = $_POST['sub_title'];
		//$usertype = $_POST['usertype'];
		$descrition = $_POST['descrition'];
		$links = $_POST['links'];
		
		//if ($password === $cpassword) {
			
			$query = "INSERT INTO aboutus (title, sub_title, description, links) VALUES ('$links', '$sub_title', '$descrition', '$links')";
			$query_run = mysqli_query($connection, $query);

			if ($query_run) {

				//echo "Saved";
				$_SESSION['success'] = "<div class='alert alert-success'><strong>". "Admin Profile Added Successfully!". "</strong></div>";
				header('Location: about_us.php');

			} 	else{

				$_SESSION['status'] = "Admin Profile NOT Saved";
				header('Location: about_us.php');

			}
		}	


	/*	else{
                           
			$_SESSION['status'] = "Password and confirmpassword does not match";
			header('Location: register.php');

		}	
	*/

	//}




//About Us Button Update Code ..............................................

//1) Connect to data base
//2) Select data base
//3) Perform query
//4) Use return data
//5) Close connection

/*$connection = mysqli_connect("localhost", "root", "", "adminpanel");
if (!$connection) {
  die("Database connection fail: ". mysqli_error($connection));
}*/

$db_select = mysqli_select_db($connection, "adminpanel");
if (!$db_select) {
  die("Database selection fail: ". mysqli_error($connection));
}


if (isset($_POST['update_aboutusbtn'])) {

	$id = $_POST['edit_id'];
	$edit_title = $_POST['edit_title'];
	$edit_sub_title = $_POST['edit_sub_title'];
	$edit_description = $_POST['edit_description'];
	$edit_links = $_POST['edit_links'];  


      
 	$result = mysqli_query($connection, "UPDATE aboutus SET title='$edit_title', sub_title = '$edit_sub_title', description='$edit_description', links='$edit_links' WHERE id='$id' ");
  	if (!$result) {
  	die("Query failed: ". mysqli_error($connection));
 	}


 	if ($result) {
 		$_SESSION['success'] = "<div class='text-success'>". " About Us Successfully Updated!". "</div>";
 		header('Location: about_us.php');
 	} else{
 		$_SESSION['status'] = "About Us NOT Successfully";
 		header('Location: about_us.php');
 	}

  	//while ($row = mysqli_fetch_array($result)) {
  	//foreach ($result as $row) {
  

	//}
}




//About Us Delete Button Code..............................................
if (isset($_POST['aboutus_deletebtn'])) {

	$id = $_POST['delete_id'];
	//echo $id;

	//1) Connect to data base
	//2) Select data base
	//3) Perform query
	//4) Use return data
	//5) Close connection

/*	$connection = mysqli_connect("localhost", "root", "", "adminpanel");
	if (!$connection) {
	  die("Database connection fail: ". mysqli_error($connection));
	}
*/
	
	$db_select = mysqli_select_db($connection, "adminpanel");
	if (!$db_select) {
	  die("Database selection fail: ". mysqli_error($connection));
	}

	$result = mysqli_query($connection, "DELETE FROM aboutus WHERE id=$id ");
  	if (!$result) {
  	die("Query failed: ". mysqli_error($connection));
 	}

 	if ($result) {
 		$_SESSION['success'] = "<div class='text-danger'><strong>". " About Us DELETED!". "</strong></div>";
 		header('Location: about_us.php');
 	} else{
 		$_SESSION['status'] = "About Us NOT DELETED";
 		header('Location: about_us.php');
 	}


}





?>
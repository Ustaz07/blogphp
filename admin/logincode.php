<?php
include('security.php');



//Login Registration Form..............................................

//1) Connect to data base
//2) Select data base
//3) Perform query
//4) Use return data
//5) Close connection

if (isset($_POST['login_btn'])) {

	$email_login = $_POST['email'];
	$password_login = $_POST['password'];

/*	$connection = mysqli_connect("localhost", "root", "", "adminpanel");
	if (!$connection) {
	  die("Database connection fail: ". mysqli_error($connection));
	}
*/
	$db_select = mysqli_select_db($connection, "adminpanel");
	if (!$db_select) {
	  die("Database selection fail: ". mysqli_error($connection));
	}

	$result = mysqli_query($connection, "SELECT * FROM register WHERE email = '$email_login' AND password = '$password_login' ");
  	if (!$result) {
  	die("Query failed: ". mysqli_error($connection));
 	}


 	if (mysqli_fetch_array($result)) {

 		$_SESSION['username'] = $email_login;
 		header('Location: index.php');
 	} else{
 		$_SESSION['status'] = " Wrong user email/password";
 		header('Location: login.php');
 	}


}
  

?>
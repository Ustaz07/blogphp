<link href="../css/sb-admin-2.min.css" rel="stylesheet">
<link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<?php

	$server_name = "localhost";
	$db_username = "root";
	$db_password = "";
	$db_name = "adminpanel";

	//1) Connect to data base
	//2) Select data base
	$connection = mysqli_connect($server_name, $db_username, $db_password);
	
	$dbconfig = mysqli_select_db($connection, $db_name);

	if ($dbconfig) {

	  	echo "</br>" . "Database connected and selected successfully: ";

	} else{

	  	//echo "Database connection failed: " . mysqli_error($connection);

	  	echo '
			<div class="container">
				<div class="row">
					
					<div class="col-md-8 mr-auto ml-auto text-center py-5 mt-5">
						<div class="card">
							<div class="card-body">
								<h1 class="card-title bg-danger text-white">Database Connection Failed</h1>
								<h2 class="card-title">Database Failure</h2>
								<p class="card-text">Please check your database connection</p>
								<a href="#" class="btn btn-primary">:(</a>
								<hr>
							</div>	
						</div>
					</div>	
					
				</div>
			</div>

	  	';
	
	}

?>
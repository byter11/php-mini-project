<?php
session_start();
if(!isset($_SESSION["USER_ID"]) || !$_SESSION["loggedIn"]){
	header("location: login.php");
	exit;
}
include "./services/customer.php";

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="./static/bootstrap/5.1.3/css/bootstrap.min.css">
	<script src="./static/bootstrap/5.1.3/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		.table td, .table th{vertical-align: middle;}
	</style>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  		<div class="container-fluid">
    		<a class="navbar-brand" href="#">Ticket Reservation System</a>
    		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      			<span class="navbar-toggler-icon"></span>
    		</button>
    	<div class="collapse navbar-collapse" id="navbarSupportedContent">
      		<ul class="navbar-nav me-auto mb-2 mb-lg-0">
			</ul>
			<a class="btn btn-light" 
				href="./modules/auth/logout.php">
				Logout</a>
		</div>
	</nav>
	<div style="overflow-x:auto">
	<span class="text-danger"><?php echo $_SESSION["CRUD_ERROR"]?></span>
	<table class="table table-hover">
		<thead>
			<tr>
				<th scope="col">id</th>
				<th scope="col">ticket#</th>
				<th scope="col">time</th>
				<th scope="col">type</th>
				<th scope="col">price</th>
				<th scope="col">seat#</th>
				<th scope="col">manage</th>
			</tr>
		</thead>
		<tbody><?php getOwned();getAvailable(); ?></tbody>
	</table>
</div>



</body>
</html>

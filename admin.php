<?php
session_start();
if(!isset($_SESSION["ADMIN_ID"]) || !$_SESSION["loggedIn"]){
	header("location: login.php");
	exit;
}
include "./services/admin.php";

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
    		<a class="navbar-brand" href="#">Tickets</a>
    		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      			<span class="navbar-toggler-icon"></span>
    		</button>
    	<div class="collapse navbar-collapse" id="navbarSupportedContent">
      		<ul class="navbar-nav me-auto mb-2 mb-lg-0">
        		<li class="nav-item">
					<button onclick="initCreateModal()" type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addTicketModal">
    					Add ticket
					</button>	
				</li>
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
				<th scope="col">customer#</th>
				<th scope="col">manage</th>
			</tr>
		</thead>
		<tbody><?php getAll(); ?></tbody>
	</table>


	<div class="modal fade" id="addTicketModal" tabindex="-1" aria-labelledby="addTicketModal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add ticket</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>

				<div class="modal-body">
					<form action='./modules/create.php' method="post">
						<div class="mb-3">
									<label>ID</label>
							<input readonly id="ticketIDInput" type="text" name="ticket_ID" class="form-control" value="auto"></div>

						<div class="mb-3">
									<label>Ticket#</label>
							<input type="number" name="ticket_number" class="form-control"></div>
						<div class="mb-3">
									<label>Time</label>
							<input type="time" name="accom_time" class="form-control"></div>

					<div class="mb-3">
						<label>Type</label></br>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="ticket_type" id="inlineRadio1" value="general">
							<label class="form-check-label" for="inlineRadio1">general</label></div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="ticket_type" id="inlineRadio2" value="VIP">
							<label class="form-check-label" for="inlineRadio2">VIP</label> </div>
					</div>	

					<div class="mb-3">
								<label>Price</label>
						<input type="number" name="prize" class="form-control"></div>

					<div class="mb-3">
								<label>Seat #</label>
						<input type="number" name="seat_number" class="form-control"></div>

					<input id="ticketOpInput" type="hidden" name="operation" value="CREATE">

					
					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="Save">
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	const idInput = document.getElementById('ticketIDInput');
	const opInput = document.getElementById('ticketOpInput');
	function initUpdateModal(id){
		idInput.value = id;
		opInput.value = "UPDATE";
	}
	function initCreateModal(){
		idInput.value = 'auto';
		opInput.value = "CREATE";
	}
</script>
</body>
</html>
<?php
session_start();
if($_SESSION["loggedIn"] !== true){
	header("location: login.php");
	exit;
}

function getTickets() {
	include './modules/database.php';
	if(!isset($_SESSION["USER_ID"])) {
		include 'modules/auth/logout.php';
		exit;
	}
	$id = $_SESSION["USER_ID"];
	$sql = "SELECT ticket_ID, ticket_number, accom_time, ticket_type, prize, seat_number
			FROM TICKET
			WHERE cust_ID = $id";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
		extract($row);
		echo "<tr><th scope='row'>$ticket_ID</th>
			  <td>$ticket_number</td>
			  <td>$accom_time</td>
			  <td>$ticket_type</td>
			  <td>$prize</td>
			  <td>$seat_number</td>
			  <td class='d-inline-flex px-2'><button class='btn btn-outline-primary btn-sm'>Update</button>
			  <form action='./modules/delete.php' method='post'>
			  	<input name='ticket_ID' type='hidden' value='$ticket_ID'>
				<input class='btn btn-outline-danger btn-sm' type='submit' value=' Delete '>
			  </form></td>
			  </tr>";
	}

}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="./static/bootstrap/4.0.0/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		.table td, .table th{vertical-align: middle;}
	</style>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
		<a class="navbar-brand" href="#">Tickets</a>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="#">Add Ticket</a>
				</li>
			</ul>
		</div>
		<a class="btn btn-light" 
		href="./modules/auth/logout.php">
		Logout</a>
	</nav>
	<div style="overflow-x:auto">
	<table class="table table-hover">
		<caption>Tickets</caption>
		<thead>
			<tr>
				<th scope="col">id</th>
				<th scope="col">number</th>
				<th scope="col">time</th>
				<th scope="col">type</th>
				<th scope="col">prize</th>
				<th scope="col">seat#</th>
			</tr>
		</thead>
		<tbody><?php getTickets(); ?></tbody>
	</table>
</div>
</body>
</html>

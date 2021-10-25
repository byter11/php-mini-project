<?php
session_start();
if($_SESSION["loggedIn"] !== true){
	header("location: login.php");
	exit;
}

function getTickets() {
	include './modules/database.php';
	$id = $_SESSION["USER_ID"];
	$sql = "SELECT ticket_ID, ticket_number, accom_time, ticket_type, prize, seat_number
			FROM Tickets
			WHERE cust_ID = $id";

	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
		extract($row);
		echo "<tr><th scope='row'>$ticket_ID</th>
			  <td>$ticket_number</td>
			  <td>$accom_time</td>
			  <td>$ticket_type</td>
			  <td>$prize</td>
			  <td>$seat_number</td></tr>";
	}

}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="./static/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">Navbar</a>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">List</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Create</a>
				</li>
			</ul>
		</div>
		<a class="btn btn-light" 
		href="./modules/auth/logout.php">
		Logout</a>
	</nav>

</body>
</html>

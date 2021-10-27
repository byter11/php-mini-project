<?php
session_start();
if(!isset($_SESSION["ADMIN_ID"]))	exit;
extract($_POST);
include './database.php';
$query = '';

// $ticket_ID = $conn->real_escape_string($ticket_ID);
$ticket_number = $conn->real_escape_string($ticket_number);
$accom_time = $conn->real_escape_string($accom_time);
$ticket_type = $conn->real_escape_string($ticket_type);
$prize = $conn->real_escape_string($prize);
$seat_number = $conn->real_escape_string($seat_number);

if($operation === "CREATE"){
	$query = sprintf("INSERT INTO TICKET (ticket_number, accom_time, ticket_type, prize, seat_number) 
					  VALUES (%s,'%s','%s',%s,%s)",
			// $ticket_ID,
			$ticket_number,
			$accom_time,
			$ticket_type,
			$prize,
			$seat_number
		);

} 
elseif ($operation === "UPDATE"){
	$values = sprintf("%s%s%s%s%s",
			($ticket_number) ? "ticket_number=$ticket_number," : "",
			($accom_time) 	 ? "accom_time='$accom_time'," 	   : "",
			($ticket_type)   ? "ticket_type='$ticket_type',"   : "",
			($prize) 		 ? "prize=$prize," 				   : "",
			($seat_number)   ? "seat_number=$seat_number,"     : ""
		);

	$query = sprintf("UPDATE TICKET SET %s WHERE ticket_ID = $ticket_ID",
			substr($values, 0, -1)	#remove last comma or double space
		);
}

if(!$conn->query($query)) {
	$_SESSION["CRUD_ERROR"] = "*Database error. Check your input" . $conn->error;
} else {
	$_SESSION["CRUD_ERROR"] = '';
}

header("location: /mini-project-dblab/admin.php");

$conn->close();

?>
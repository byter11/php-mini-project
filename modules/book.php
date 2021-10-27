<?php
	session_start();
	include './database.php';
	$ticket_ID = $conn->real_escape_string($_POST["ticket_ID"]);
	$cust_ID = $_SESSION['USER_ID'];
	
	$sql = "UPDATE TICKET SET cust_ID = $cust_ID WHERE ticket_ID=$ticket_ID";
	if(!$conn->query($sql)){
		$_SESSION["CRUD_ERROR"] = "A Database error occured";
	} else {
		$_SESSION["CRUD_ERROR"] = '';
	}
	$conn->close();
	header('location: ../index.php');
?>
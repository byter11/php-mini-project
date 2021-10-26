<?php
	session_start();
	$ticket_ID = $_POST["ticket_ID"];
	$cust_ID = $_SESSION["USER_ID"];
	include './database.php';
	$sql = "DELETE FROM TICKET WHERE ticket_ID='$ticket_ID' AND cust_ID='$cust_ID'";
	$result = $conn->query($sql);
	if (! $conn->query($sql) ) {
		$_SESSION["CRUD_ERROR"] = "Failed to delete ticket: " . $conn->error_get_last();
	}
	header("location: /mini-project-dblab/index.php");
?>
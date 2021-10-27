<?php
	session_start();
	if(!isset($_SESSION["ADMIN_ID"]))	exit;
	$ticket_ID = $_POST["ticket_ID"];
	include './database.php';
	$sql = "DELETE FROM TICKET WHERE ticket_ID='$ticket_ID'";
	$result = $conn->query($sql);
	if (! $conn->query($sql) ) {
		$_SESSION["CRUD_ERROR"] = "Failed to delete ticket: " . $conn->error();
	}
	header("location: /mini-project-dblab/admin.php");
?>
<?php
	$DB_URL="localhost";
	$DB_USERNAME="root";
	$DB_PASSWORD="password";
	$DB_NAME="lab-06";
	$conn= new mysqli($DB_URL, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
	if($conn->connect_error){
		die($conn->connect_error);
	}
?>
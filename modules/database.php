<?php
	$url="localhost";
	$db_username="root";
	$db_password="password";
	$dbname="lab-06";
	$conn= new mysqli($url, $db_username, $db_password, $dbname);
	if($conn->connect_error){
		die($conn->connect_error);
	}
?>
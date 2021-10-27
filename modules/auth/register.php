<?php
extract($_POST);
include "../database.php";

$sql = sprintf("INSERT INTO CUSTOMERS (fname,lname,gender,age,contact_add,cust_email,cust_pass)
				VALUES('%s','%s','%s',%s,'%s','%s','%s')",
				$conn->real_escape_string($fname),
				$conn->real_escape_string($lname),
				$conn->real_escape_string($gender),
				$conn->real_escape_string($age || 'NULL'),
				$conn->real_escape_string($contact_add),
				$conn->real_escape_string($cust_email),
				$conn->real_escape_string($cust_pass)
	);
// echo $sql;
// exit;
if($conn->query($sql)){
	echo '<script>alert("Registered successfully")</script>';
}
else{
	echo $conn->error;
	exit;
	echo '<script>alert("Registered failed")</script>';
}
header('location: ../../login.php');
?>
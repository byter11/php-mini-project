<?php
	session_start();
	extract($_POST);
	if(empty($username) || empty($password)) {
		$_SESSION["loginError"] = "Username or password field is empty.";
		header('location: ../../login.php');
		exit;
	}
	include '../database.php';
	// Check if customer
	$sql="SELECT cust_ID, cust_email, cust_pass FROM CUSTOMERS WHERE cust_email='$username' AND cust_pass='$password';";
	$result = $conn->query($sql);
	if($result){
		$row = $result->fetch_assoc();
	}
	if(is_array($row)){
		$_SESSION["loginError"] = "";
		$_SESSION["loggedIn"] = true;
		$_SESSION["USER_ID"] = $row['cust_ID'];
		
		header("location: ../../index.php");
		$conn->close();
		exit;
	}

	// Check if admin
	$sql="SELECT admin_ID, admin_pass FROM ADMINS WHERE admin_ID='$username' AND admin_pass='$password'";
	$result = $conn->query($sql);
	if($result){
		$row = $result->fetch_assoc();
	}
	if(is_array($row)){
		$_SESSION["loginError"] = "";
		$_SESSION["loggedIn"] = true;
		$_SESSION["ADMIN_ID"] = $row['admin_ID'];
		
		header("location: ../../admin.php");
		$conn->close();
		exit;
	}

	$_SESSION["loginError"] = "Invalid credentials";
	header('location: ../../login.php');
?>

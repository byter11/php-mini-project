<?php
	session_start();
	extract($_POST);
	if(empty($username) || empty($password)) {
		$_SESSION["loginError"] = "Username or password field is empty.";
		header('location: ../../login.php');
		exit;
	}
	else{
		include '../database.php';
		// $_username = $mysqli->real_escape_string($username);
		// $_password = $mysqli->real_escape_string($password);
		$sql="SELECT cust_ID, cust_email, cust_pass FROM CUSTOMERS WHERE cust_email='$username' AND cust_pass='$password';";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		if(is_array($row)){
			$_SESSION["loginError"] = "";
			$_SESSION["loggedIn"] = true;
			$_SESSION["USER_ID"] = $row['cust_ID'];
			header("location: ../../index.php");	
			exit();
		}
		else{
			$_SESSION["loginError"] = "Invalid credentials";
			header('location: ../../login.php');
			exit();
		}
			
	}
?>

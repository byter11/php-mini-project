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
		
		$sql="SELECT id, username, password FROM USERS WHERE username='$username' AND password='$password';";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		if(is_array($row)){
			$_SESSION["loginError"] = "";
			$_SESSION["loggedIn"] = true;
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

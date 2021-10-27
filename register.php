<?php
	session_start();
	if($_SESSION["loggedIn"] === true){
		header("location: index.php");
		exit;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="./static/bootstrap/5.1.3/css/bootstrap.min.css">
	<script src="./static/bootstrap/5.1.3/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Ticket Reservation System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
		</li>
      </ul>
		<a class="btn btn-light" 
			href="./login.php">
			Login</a>
		<a class="btn btn-light" 
			href="./register.php">
			Register</a>
	</div>
</nav>
<div class="container w-50">
	</br><h1> Register </h1></br>
	<span class="text-danger"><?php echo $_SESSION["loginError"] ?></span>
	<form action='./modules/auth/register.php' method="post">
		<div class="mb-3">
			<label>Username</label>
			<input required type="text" name="cust_email" class="form-control"></div>

		<div class="mb-3">
			<label>Password</label>
			<input required type="password" name="cust_pass" class="form-control"></div>
		
		<div class="mb-3">
			<label>Address</label>
			<input type="address" name="contact_add" class="form-control"></div>

		<div class="row mb-3">
			<div class="col">
			<label>First Name</label>
				<input required type="text" name="fname" class="form-control">
			</div>
			<div class="col">
			<label>Last Name</label>
				<input required type="text" name="lname" class="form-control">
			</div>
		</div>

		<div class="row mb-3">
			<div class="col">
				<label>Gender</label>
				<select name="gender" class="form-select" aria-label="Default select example">
					<option value="Rather not say" selected>Rather not say</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>
			</div>
			<div class="col">
			<label>Age</label>
				<input type="number" name="age" class="form-control">
			</div>
		</div>

		<div class="mb-3">
			<input type="submit" class="btn btn-primary" value="Register">
		</div>	
	</form>
</body>
</html
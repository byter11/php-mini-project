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
</br><h1> Login </h1></br>
<span class="text-danger"><?php echo $_SESSION["loginError"] ?></span>
	<form action='./modules/auth/login.php' method="post">
	<div class="form-group">
                <label>Username</label>
		<input type="text" name="username" class="form-control"></div>

	<div class="form-group">
                <label>Password</label>
		<input type="password" name="password" class="form-control"></div>
	
	<div class="form-group">
		<input type="submit" class="btn btn-primary" value="Login">
	</div>
	
	</form>
</div>
</body>
</html>

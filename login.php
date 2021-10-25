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
	<link rel="stylesheet" href="./static/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container w-50">
<span class="text-danger"><?php echo $_SESSION["loginError"] ?></span>
	<form action='./modules/auth/login.php' method="post">
	<div class="form-group">
                <label>Username</label>
		<input type="text" name="username" class="form-control"></div>

	<div class="form-group">
                <label>Password</label>
		<input type="text" name="password" class="form-control"></div>
	
	<div class="form-group">
		<input type="submit" class="btn btn-primary" value="Login">
	</div>
	
	</form>
</div>
</body>
</html>

<?php session_start();
unset($_SESSION["loggedIn"]);
unset($_SESSION["USER_ID"]);
unset($_SESSION["ADMIN_ID"]);
header("location: /mini-project-dblab/login.php");
exit;
?>
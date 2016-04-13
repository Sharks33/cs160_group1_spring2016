<?php
	session_start();
	$_SESSION['loggedin'] = false;
	$_SESSION['username'] = null;
	header("Location: home.php");
?>

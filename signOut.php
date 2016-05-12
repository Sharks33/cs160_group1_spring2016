<?php
	session_start();
	$_SESSION['loggedin'] = false;
	$_SESSION['username'] = null;
	$_SESSION['reshop'] = false;
	$_SESSION['creditCard'] = null;
	$_SESSION['expiration'] = null;
	$_SESSION['creditCard'] = null;
	header("Location: home.php");
?>

<?php
	session_start();
	$_SESSION['loggedin'] = false;
	$_SESSION['username'] = null;
	$_SESSION['reshop'] = false;
	header("Location: home.php");
?>

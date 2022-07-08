<?php
	session_start();
	setcookie("login", "", 1);
	header('Location: login.php');
?>
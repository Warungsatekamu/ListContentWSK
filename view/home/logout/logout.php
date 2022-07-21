<?php
	session_start();
	$_SESSION = [] ;
	session_unset();
	session_destroy();
	setcookie("login", "", 1);
	header('Location: ../../login/open_session.php');
?>
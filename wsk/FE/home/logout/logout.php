<?php
	session_start();
	session_destroy();
	setcookie("login", "", 1);
	header('Location: ../../login/open_session.php');
?>
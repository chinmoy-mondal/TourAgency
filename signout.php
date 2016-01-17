<?php
	session_start();
	
	unset($_SESSION['Email']);
	unset($_SESSION['password']);
	unset($_SESSION['option']);
	
	header("location:".'index.php');
?>
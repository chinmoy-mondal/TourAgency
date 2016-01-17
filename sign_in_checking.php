<?php
	session_start();
	require_once ('database.php');
	if (isset($_POST["Password"]) && isset($_POST["Email"]) && isset($_POST["user_type"]))
	{
		$email = $_POST["Email"];
		$password = $_POST["Password"];
		$option = $_POST["user_type"];
		
		$Data_control = new Data_control();
		$login_permission = $Data_control->sign_in_status($email,$password,$option);		
		if( $login_permission == 1 ){
			$_SESSION['Email'] = $email;
			$_SESSION['Password'] = $password;
			$_SESSION['option'] = $option;
			header("location:".'login_index.php');
		}
		else{
			header("location:".'sign_in_type.php');
		}
	} 
	else{	
		header("location:".'sign_in_type.php');
	}
?>
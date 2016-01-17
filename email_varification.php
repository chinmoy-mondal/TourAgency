<?php
	require_once ('config.php');
	require_once ('database.php');
	$Data_control = new Data_control();
	if(isset($_GET['name']))
	{
		$email = $_GET['name'];
		$result = $Data_control ->email_varification($email);		
		echo $result;
	}
	else
		echo 0;
?>
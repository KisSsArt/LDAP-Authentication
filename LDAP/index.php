<?php

	session_start();

	if (!isset($_SESSION['user_id']))
	{
		header('Location: auth.php');
		exit;
	}
	else
	{
		header('Location: main.php');
		exit;
	}

?>

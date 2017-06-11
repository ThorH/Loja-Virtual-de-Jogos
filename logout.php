<?php
	session_start();

	if (!isset($_SESSION['userID'])) 
	{
		header("Location: index.php");
	}
	else if (isset($_SESSION['userID']) != "") 
	{
		header("Location: admin.php");
	}

	if (isset($_GET['logout'])) 
	{
		unset($_SESSION['userName']);
		unset($_SESSION['userID']);
		session_unset();
		session_destroy();
		header("Location: index.php");
		exit();
	}
?>
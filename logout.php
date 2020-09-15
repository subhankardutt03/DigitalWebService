<?php

	session_start();
	
	$_SESSION['uid']="";
	
	if($_SESSION['uid']=="")
	{
		header('location:login.php');

		}
	session_destroy();
	
?>
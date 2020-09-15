<?php

	include_once "../others/config.php";
	
	$id=$_REQUEST['id'];
	
	$sql="delete from product where Id='".$id."'";
	mysqli_query($con,$sql);
	
	header("location:../others/dashboard.php");


?>
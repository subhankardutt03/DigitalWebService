<?php

	include_once "../others/config.php";
	
	$id=$_REQUEST['Id'];
	
	$sql="delete from SST where Id='".$id."'";
	mysqli_query($con,$sql);
	
	header("location:fetch.php");


?>
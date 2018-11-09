<?php 
	include_once("./controllers/common.php");
	include_once('connect.php');
	$id = safeGet('id');
	$query = "DELETE FROM `grades` WHERE `id`=$id";
	mysqli_query($link,$query);
	header("Location:grades.php");
	?>

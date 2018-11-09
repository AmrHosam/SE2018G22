<?php
	include_once("../controllers/common.php");
	include_once('../connect.php');
	$id = safeGet('id');
	$query = "DELETE FROM `courses` WHERE id = '".$id."'"; 	
	mysqli_query($link, $query);
	header('Location: ../courses.php');
?>
<?php
	include_once("../controllers/common.php");
	include_once('../connect.php');
	$id = safeGet('id');
	$query = "DELETE FROM `students` WHERE id = '".$id."'"; 	
	mysqli_query($link, $query);
	header('Location: ../students.php');
?>
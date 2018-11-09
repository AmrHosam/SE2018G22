<?php
	include_once("../controllers/common.php");
	include_once('../connect.php');
	$id = safeGet("id", 0);
	if($id==0) {
		$query = "INSERT INTO `students` (`name`) VALUES ('".mysqli_real_escape_string($link, $_POST['name'])."')"; 	
		mysqli_query($link, $query);} 
	else {
		$query = "UPDATE `students` SET `name`= '".mysqli_real_escape_string($link, $_POST['name'])."' 
		WHERE id = '".$id."'";
		mysqli_query($link, $query);}
	header('Location: ../students.php');
?>
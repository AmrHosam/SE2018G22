<?php
	include_once("../controllers/common.php");
	include_once('../connect.php');
	$id = safeGet("id", 0);
	if($id==0) {
		$query = "INSERT INTO `courses` (`name`,`max_degree`,`study_year`) VALUES ('".mysqli_real_escape_string($link, $_POST['name'])."',
		'".$_POST['max_degree']."','".$_POST['study_year']."')"; 	
		mysqli_query($link, $query);} 
	else {
		$query = "UPDATE `courses` SET `name`= '".mysqli_real_escape_string($link, $_POST['name'])."',
		`max_degree`= '".$_POST['max_degree']."',`study_year`= '".$_POST['study_year']."' WHERE id = '".$id."'";
		mysqli_query($link, $query);}
	header('Location: ../courses.php');
?>
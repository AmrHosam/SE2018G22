<?php
	include_once('../connect.php');
	$query = "INSERT INTO `requests` (`student_id`,`type`,`name_ar`,`name_en`,`address`,`reason`,`mobile_number`,
	`year`,`department`,`birth_date`,`file`)VALUES ('".mysqli_real_escape_string($link, $_POST['student_id'])."',
	'".mysqli_real_escape_string($link, $_POST['type'])."','".mysqli_real_escape_string($link, $_POST['name_ar'])."',
	'".mysqli_real_escape_string($link, $_POST['name_en'])."','".mysqli_real_escape_string($link, $_POST['address'])."',
	'".mysqli_real_escape_string($link, $_POST['reason'])."','".mysqli_real_escape_string($link, $_POST['mobile'])."',
	'".mysqli_real_escape_string($link, $_POST['year'])."','".mysqli_real_escape_string($link, $_POST['department'])."',
	'".mysqli_real_escape_string($link, $_POST['birth_date'])."','".mysqli_real_escape_string($link, $_POST['file'])."')"; 	
	mysqli_query($link, $query);
	header('Location: ../formsPage.php');
?>
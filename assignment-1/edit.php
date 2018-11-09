<?php
	include_once('connect.php');
	if(isset($_POST['edit']))
	{
	$grade = mysqli_real_escape_string($link,$_POST['grade']);
	$student_id = mysqli_real_escape_string($link,$_POST['student']);
	$course_id = mysqli_real_escape_string($link,$_POST['course']);
	$date = mysqli_real_escape_string($link,$_POST['date']);
	$id = $_POST['id'];
	if($id == "")
	{
		$update = "INSERT INTO `grades` (`course_id`,`student_id`,`degree`,`examine_at`) VALUES ($course_id,$student_id,$grade,'$date')";
	}
	else
	{
		$update = "UPDATE `grades` SET `student_id`=$student_id, `course_id`=$course_id, `degree`=$grade, `examine_at`='$date' WHERE `id` = $id";
	}
	if(mysqli_query($link,$update))
	{
		header("Location:grades.php");
	}
	else
	{
		echo "There was an error, try again.";
	}
	}?>
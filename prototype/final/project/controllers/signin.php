<?php
session_start();
include_once ("../connect.php");
if (strpos($_POST['email'], "@employees.com") !== false) {
	$query = "SELECT * FROM `employees` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";

	$result = mysqli_query($link, $query);

	$row = mysqli_fetch_array($result);
	if (isset($row)) {

		$hashedPassword = md5(md5($row['id']).$_POST['password']);

		if ($hashedPassword == $row['password']) {
			
			$_SESSION['id'] = $row['id'];
			$_SESSION['email'] = $_POST['email'];
			header("Location: ../requests.php");}
		else {
			$error = "That email/password combination could not be found.";
			header("location: ../index.php");
		}
	} 
	else {
		$error = "That email/password combination could not be found.";
		header("location: ../index.php");
	}			
	
}
else{
	 $query = "SELECT * FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";
					
	$result = mysqli_query($link, $query);

	$row = mysqli_fetch_array($result);

	if (isset($row)) {
		
		$hashedPassword = md5(md5($row['id']).$_POST['password']);
		
		if ($hashedPassword == $row['password']) {
			
			$_SESSION['id'] = $row['id'];
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['name'] = $row['full name'];
			header("Location: ../profile.php");}
		else {
			$error = "That email/password combination could not be found.";
			header("location: ../index.php");
		}
	}
	else {
		$error = "That email/password combination could not be found.";
		$_SESSION['error'] = $error;
			echo'<script type="text/javascript">
	javascript:history.go(-1);
	</script>';
	}
}      

?>
<?php
	include_once('../connect.php');
	$query = "UPDATE `requests` SET `state`= 1 WHERE id = '".$_GET['id']."'";
	mysqli_query($link, $query);
	/*$query = "SELECT * FROM `requests` WHERE `state` = 0";
	if ($results = mysqli_query($link,$query)){
	$count = mysqli_num_rows($results);}
	if($count > 0){*/
	header('Location: ../requests.php');
	/*}
	else{
		header('Location: ../homesign.php');}*/
?>

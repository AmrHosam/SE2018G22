<?php
	session_start();
	include_once('../connect.php');
	if($_GET['clear']==0){
	$query = "UPDATE `requests` SET `state`= 1 WHERE id = '".$_GET['id']."'";
	mysqli_query($link, $query);
	/*$query = "SELECT * FROM `requests` WHERE `state` = 0";
	if ($results = mysqli_query($link,$query)){
	$count = mysqli_num_rows($results);}
	if($count > 0){*/
	header('Location: ../requests.php');}
	/*}
	else{
		header('Location: ../homesign.php');}*/
	else if($_GET['clear']==1){
	$query = "UPDATE `requests` SET `seen`= 1 WHERE `state` = 1 AND student_id ='" . $_SESSION['id'] . "'";
	mysqli_query($link, $query);
	echo'<script type="text/javascript">
	javascript:history.go(-1);
	</script>';
	//header('Location: ../homesign.php');
}?>

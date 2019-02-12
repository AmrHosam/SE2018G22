<?php
session_start();
$request=0;
 if (strpos($_SESSION['email'], "@employees.com") !== false) {

include_once("connect.php");
include_once("components/EnavSign.php");
$query = "SELECT requests.id, requests.type, students.name_ar, students.year, students.department, users.division, users.`student id` FROM requests
		JOIN students ON students.student_id = requests.student_id
		JOIN users ON users.id = requests.student_id
		WHERE requests.state = 0 LIMIT 1";
if ($results = mysqli_query($link,$query)){
$count = mysqli_num_rows($results);
if($count > 0){
	$request=1;}
$row=mysqli_fetch_array($results);}
}
else{header("location: index.php");}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="keyword" content="questions,enquiries,inqiries,studentaffairs">
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Requests</title>
	<style type="text/css">
		.label
		{
			margin-left: 15px;
			font-size: 20px;
			margin-bottom: 0px;
		}
		.data
		{
			padding-top: 3px;
			font-weight: 500;
		}
		.field
		{
			height: auto;
			overflow: hidden;
			
		}
	</style>
	<link rel="stylesheet" type="text/css" href="style2.css">
						<!-- bootstrap -->
<!-- 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->

    <!--logo of the website-->
</head>
<body style="background-color: #D3D3D3">
<div class="form" style="background-color: white; border-style: outset; min-height: 300px; display: block; margin: auto; width: 80%; margin-top: 50px;">
	<div class="title">
		<p style="text-align: center; font-size: 20px; font-weight: 650; margin: 5px;"><?=($request)?$row["type"]:"No Pending Requests"?></p>
	</div>
	<hr style="border-color: black !important; border-width: 1.5px; margin: 5px;">
	<div class="field" style="margin-top: 10px;">
		<p class="label" style="float: left;margin-right: 10px; font-weight: 550;">Full Name:</p>
		<p class="data"><?=$row["name_ar"]?></p>
	</div>
	<div class="field">
		<p class="label" style="float: left;margin-right: 10px; font-weight: 550;">Year:</p>
		<p class="data"><?=$row["year"]?></p>
	</div>
	<div class="field">
		<p class="label" style="float: left;margin-right: 10px; font-weight: 550;">Department:</p>
		<p class="data"><?=$row["department"]?></p>
	</div>
	<div class="field">
		<p class="label" style="float: left;margin-right: 10px; font-weight: 550;">Major:</p>
		<p class="data"><?=$row["division"]?></p>
	</div>
	<div class="field">
		<p class="label" style="float: left;margin-right: 10px; font-weight: 550;">Student ID:</p>
		<p class="data"><?=$row["student id"]?></p>
	</div>
<!-- 	<div class="field">
	<img src="images/question.jpg" style="width:400px;height: 200px; display: block; margin:auto;">
	</div> -->
</div>
<form action="controllers/updaterequest.php" method="get">
<input type="hidden" name="clear" value="0">
<input type="hidden" name="id" value="<?=$row["id"]?>">
	<input type="submit" name="next" value="Next" style="background-color: transparent;border-width: 3px; letter-spacing: 2px; ;border-radius: 7px; border-color: brown;display: block;margin: auto; color: black; font-weight: 550; font-size: 18px; padding-bottom: 10px; padding-top: 10px; padding-right: 15px; padding-left: 15px; margin-top: 10px; ">
</form>
</body>
</html>

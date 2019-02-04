

<?php 	
session_start();
include_once('navIndex.php');
$_SESSION['msg']="";
if($_SESSION['msg']){
	$error=$_SESSION['msg'];
	echo"<p>$error</p>";
	
	
}
session_destroy();
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<!------ Include the above in your HEAD tag ---------->

<!Doctype html>
<html>
<head>
     <meta charset="UTF-8">
     <title>Registration Form</title>
     	<meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
    /*-----Background-----*/
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
body{
	 background-image:url(https://apis.mail.yahoo.com/ws/v3/mailboxes/@.id==VjN-4SYBt-AkaqRIygm9jZcjegiiKwHHcbIk8vjkqMly9QPHOlxCgsyX48ZDBlLh9p044QS589m2ULn4HOf3kMCF_g/messages/@.id==AIdrpVREpxi0W9mzDQZNSH-cPIA/content/parts/@.id==2/thumbnail?appId=YMailNorrin&downloadWhenThumbnailFails=true&pid=2);
	 background-repeat:

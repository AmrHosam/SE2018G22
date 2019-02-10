<?php
include_once ("../connect.php");

session_start();
	if (isset($_POST['submit'])){
  
if ($_POST['password'] != $_POST['Cpassword'])
	 {
	$_SESSION['msg']="no match";
	header("Location: ../RightRegistration.php");
	}
else {
            
            $query = "SELECT `id` FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";
            
            $result = mysqli_query($link, $query);
            
            if (mysqli_num_rows($result) > 0) {
                
               $_SESSION['msg']="email is taken";
				header("Location: ../RightRegistration.php");
                
            } else {

$query = "INSERT INTO `users` (`student id`,`full name`,`email`,`password`,`year`,`division`) 
  			  VALUES('".mysqli_real_escape_string($link, $_POST['lname'])."',
			  '".mysqli_real_escape_string($link, $_POST['fname'])."',
               '".mysqli_real_escape_string($link, $_POST['email'])."',
			   '".mysqli_real_escape_string($link, $_POST['password'])."',
			
			  '" .mysqli_real_escape_string($link, $_POST['year'])."',
			  '".mysqli_real_escape_string($link, $_POST['division'])."')";
 
if (mysqli_query($link, $query)) {
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['id'] = mysqli_insert_id($link);
	echo $_SESSION['id'];
	                        $query = "UPDATE `users` SET password = '".md5(md5(mysqli_insert_id($link)).$_POST['password'])."' WHERE id = ".$_SESSION['id']." LIMIT 1";

                        mysqli_query($link, $query);

              header("Location: ../profile.php");
}     

else  {echo "<p>errorrr</p>";}
	}
	}
	}

?>
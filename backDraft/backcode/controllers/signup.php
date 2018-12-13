<?php
include_once ("connect.php");

session_start();
	if (isset($_POST['submit'])){
  
if ($_POST['password'] != $_POST['Cpassword'])
	 {
	$_SESSION['msg']="no match"
	;header("Location:RightRegistration.php");
	}
else {
            
            $query = "SELECT `id` FROM `users` WHERE email = '".mysqli_real_escape_string($db, $_POST['email'])."'";
            
            $result = mysqli_query($db, $query);
            
            if (mysqli_num_rows($result) > 0) {
                
               $_SESSION['msg']="email is taken";
				header("Location:RightRegistration.php");
                
            } else {

$query = "INSERT INTO `users` (`student id`,`full name`,`email`,`password`,`year`,`division`) 
  			  VALUES('".mysqli_real_escape_string($db, $_POST['lname'])."',
			  '".mysqli_real_escape_string($db, $_POST['fname'])."',
               '".mysqli_real_escape_string($db, $_POST['email'])."',
			   '".mysqli_real_escape_string($db, $_POST['password'])."',
			
			  '" .mysqli_real_escape_string($db, $_POST['year'])."',
			  '".mysqli_real_escape_string($db, $_POST['division'])."')";
 
if (mysqli_query($db, $query)) {
	$_SESSION['email'] = $_POST['email'];
              header("Location:profile.php");
}     

else  {echo "<p>errorrr</p>";}
	}
	}
	}

?>
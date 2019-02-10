<?php
session_start();
include_once('components/navIndex.php');
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
	 background-repeat:no-repeat;
	 background-size:cover;
	 width:100%;
	 height:100vh;
	 overflow:auto;
	 
}
/*-----for border----*/
} 
.container{
	font-family:Roboto,sans-serif;
    background:gray !important;    
    border-radius: 25px;
    padding-left: 20px;
     border-style: 1px solid gray;
     margin: 0 auto;
     text-align: center;
     opacity: 0.8;
     margin-top: 67px;
   box-shadow: 2px 5px 5px 0px #eee;
     max-width: 500px;
     padding-top: 10px;
     height: 400px;
     margin-top: 166px;
}
/*--- for label of year---*/
        .year{
     margin-left: 1px;
     font-family: sans-serif;
     font-size: 14px;
     color: white;
     margin-top: 10px;
        }
                /*--- for label of department---*/
        .Department{
     margin-left: -10px;
     font-family: sans-serif;
     font-size: 14px;
     color: white;
     margin-top: 10px;
        }
                /*--- for label of Student ID---*/
.StudentID{
	 margin-left: 1px;s
     font-family: sans-serif;
     font-size: 14px;
     color: white;
     margin-top: 10px;
}
        /*--- for label of Full name---*/
.FullName{
	 margin-left: 1px;
     font-family: sans-serif;
     font-size: 14px;
     color: white;
     margin-top: 5px;
}
#lname{
	 margin-top:5px;
}
	  
/*---for heading-----*/
.heading{
	 text-decoration:bold;
	 text-align : left;
	 font-size:30px;
	 color:#F96;
	 padding-top:10px;
     color: #800000;
}
        label
        {
            color: black !important;
            display: block;
            width: 190px;
            font-family: 'Oswald', sans-serif;
            font-size: 20px !important;
            font-weight: 500 !important;
        }
/*-------for email----------*/
  /*------label----*/
#email{
	  margin-top: 5px;
}
/*-----------for Password--------*/
     /*-------label-----*/
.mail{
     font-family: sans-serif;
     color: white;
     font-size: 14px;
     margin-top: 13px;
}
.pass{
	 color: white;
     margin-top: 9px;
     font-size: 14px;
     font-family: sans-serif;
     margin-top: 9px;
}
#password{
 margin-top: 6px;
}
      /*----------label--------*/
.pno{
	 font-size: 18px;
     margin-left: -13px;
     margin-top: 10px;
     color: #ff9;
	
}	
     /*--------------label---------*/
/*------------For submit button---------*/
.sbutton{
	 color: white;
     font-size: 20px;
     border: 1px solid white;
     background-color: #080808;
     width: 32%;
     margin-left: 41%;
     margin-top: 16px;
	 box-shadow: 0px 2px 2px 0px white;
  	   
   }
   select{
    margin-top: 10px;
    padding-bottom: 3px;
    border-radius: 5px;
    height: 40px;
    font-size: 17px;
    font-weight: 400;
   }
	
}	 
	  
    </style>
</head>
    
<body>
 <div style="background-color: #f0f2f3; border-radius: 25px; padding-left: 20px; padding-bottom: 20px;display: block;margin: auto;margin-top: 50px;margin-bottom: 50px;" class="container">
    
 <!---heading---->
     <h1 class="heading" style="text-align: center; font-weight: 700;"> Registration-Form</h1><hr></hr>
	<!---Form starting----> 
	 <form action="controllers/signup.php" method="post">
	<div style="margin-left: 5%;" class="row ">
	 <!--- For Name---->
         <div class="col-sm-12">
             <div class="row form-group">
			     <div class="col-xs-4">
          	         <label class="FullName"> Full Name :</label> </div>
		         <div class="col-xs-8">
		             <input type="text" name="fname" id="fname" placeholder="Enter your full Name" class="form-control" required)>
             </div>
		      </div>
		 </div>
		 
		 
         <div class="col-sm-12">
		     <div class="row form-group">
			     <div class="col-xs-4">
                     <label class="StudentID"> Student ID :</label></div>
				<div class ="col-xs-8">	 
		             <input type="text" name="lname" id="lname" placeholder="Enter your ID" class="form-control last" required>
                </div>
		     </div>
		 </div>
     <!-----For email---->
		 <div class="col-sm-12">
		     <div class="row form-group">
			     <div class="col-xs-4">
		             <label class="mail" >Email :</label></div>
			     <div class="col-xs-8"	>	 
			          <input type="email" name="email"  id="email"placeholder="Enter your email" class="form-control" required>
		         </div>
		     </div>
		 </div>
	 <!-----For Password and confirm password---->
          <div class="col-sm-12">
		         <div class="row form-group">
				     <div class="col-xs-4">
		 	              <label class="pass">Password :</label></div>
				  <div class="col-xs-8">
			             <input type="password" name="Cpassword" id="password" placeholder="Enter your Password" class="form-control" required>
				 </div>
          </div>
		  </div>

		    <div class="col-sm-12">
		         <div class="row form-group">
				     <div class="col-xs-4">
		 	              <label class="pass">Confirm Password :</label></div>
				  <div class="col-xs-8">
			             <input type="password" name="password" id="password" placeholder="Enter your Password" class="form-control" required>
				 </div>
          </div>
		  </div>

		 	<div class="col-sm-12">
		     <div class="row form-group">
			     <div class="col-xs-4">	 
                         <p>  <label class="year" required > Year:</label></div>
                             <select name="year" >
                             <option>Prepratory</option>
                                 <option>First year</option>
                                 <option>Second year</option>
                                 <option>Third year</option>
                                 <option>Forth year</option>
                             </select>
                         </p>
                       </div>
		     </div>
    		 	<div class="col-sm-12">
		     <div class="row form-group">
			     <div class="col-xs-4">
                        <p>  <label style="margin-left: 2px;" class="Department" required > Division:</label></div>
                   <select name="division"> \\Electrical divisions
                             <option>Computer</option>
                            <option>Communication</option>
                            <option>Electrical power</option>
                             \\Mechanical divisions
                            <option>Mechatronics</option>
                             <option>Automotive Engineering</option>
                             <option>Mechanical Power Engineering</option>
                             <option>Design and Production Engineering</option>
                            \\civil divisions
                             <option>Structure Engineering</option>
                             <option>Public Works</option>
                             <option>Irrigation of Hydraulics Engineering</option>
                            \\archeticture divisions
                             <option>Architecture Engineering</option>
                            <option>Urban Design and Urban Planning</option>
                      </select>
                         </p>
                    <div class="col-sm-12">
     <button  name="submit" style="cursor: pointer; display: block; margin: auto; margin-top: 20px; border-radius: 10px; border-color:#800000;background-color: transparent;width: 95px; height: 45px;color: black; font-weight: 500;font-size: 22px;" type="submit">Submit</button>
		  </div>
                 </form>
</div>
</div>
</body>		
</html>
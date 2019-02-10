<?php 	
session_start();
 if (isset($_SESSION['email'])) {
        /// your code here
		header("location: homesign.php");
    }
else {include_once('components/navIndex.php');}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">      

    <title>Student Affairs</title>
      <style type="text/css">
         .smallImge{
             height: 49px;
             width: 49px;
              position: relative;
         }
          .Icons_Button{
              height: 150px;
              width: 150px;
              position: relative;
              float: left;
          }  
          .events{
               height: 300px;
              width: 300px;
              position: relative;
              float: left;
              background-color:aquamarine; 
              margin: 100px;
          }
          #events{
              background-color: beige;
              border: solid;
          }
          .buttons{
             border:solid;
            background-color: #800000;
            width: 200px;
             height: 200px;
              border-radius: 50%;
               opacity: 1;
              
              
          }
          .font_button{
            color:#FFFAFA; 
            position: relative;
              float: inherit;
               opacity: 1;
          }
          #rowstyle{
              position: relative;
             margin-top: 15%;
              margin-left: 15%; 
              margin-right: 0;
              
          }
          .Request_order{
              margin-left: 25%;
              margin-top: 10%;
              opacity: 1;
              position: relative;
              float: left;
          }
           .question{
              margin-left: 50%;
              margin-top: 0%;
                opacity: 1 !important ;
                 position: relative;
              float: left;
          }
           .profile{
              margin-left: 75%;
              margin-top: 0px;
                opacity: 1;
                 position: relative;
              float: left;
          }
          .navbar{
              background-color: #800000 !important;
              height: 50px;
          }
          .nav-link{
              font-weight: 700;
              font-size: 18px;
              color: #FFFAFA !important;
              margin-left: 50px;
              
          }
          .nav-item:hover{
              cursor: pointer;
              color: black !important;
          }
          .fa:hover{
              color: black !important; 
          }
          #sign{
            margin-bottom: 30px;  
          }
          body {
              opacity: 1 ;
    background-image: url("images/s3.jpg");
             
     background-repeat: no-repeat;
    background-size:100% 100%;
    height: 100%;    
    background-position: center;
    background-attachment: fixed;
               
    
}
          .bimg{
              opacity: 1;
          }
         .buttons:hover
          {
            border-style: inset !important;
              cursor: pointer;
          }
          .nav-link:hover{
              color: black !important;
          }
     </style>
  </head>
  <body>

      
      
      <div class="bimg">
<div class="row" id="rowstyle"> 
<div  class="col-sm" class="Request_order">

<button type="button" class="buttons" onclick="myFunction()" ><h2 class="font_button"><i>Extract paper</i></h2></button></div>
       
 <div  class="col-sm" class="question">

<button type="button" class="buttons" onclick="myFunction()" ><h2 class="font_button"><i>Questions</i></h2></button></div>
       
       
 <div  class="col-sm"  class="profile">

<button type="button" class="buttons" onclick="myFunction()" ><h2 class="font_button"><i>My profile</i></h2></button></div>
          
    </div>   
    
    </div>
    <script>
   function myFunction() {
     // onclick="document.getElementById('sign').style.display='block'"
     document.getElementById('sign').style.display='block';
         // document.getElementById("navbarSupportedContent").classList.toggle("show");
         if ( ($(window).width() < 974) || (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent))) {
         $('.navbar-collapse').collapse('show');
 }
 }
 </script>
  </body>
    
 
    
</html>
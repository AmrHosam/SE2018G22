<?php
session_start();
 if (isset($_SESSION['email'])) {
        
    
include_once("connect.php");

$query = "SELECT `full name`, `year`, `division`,`student id` FROM   `users` WHERE `email` = '".mysqli_real_escape_string($link, $_SESSION['email'])."' ";

$count=3;
if ($results = mysqli_query($link,$query)){
$count = mysqli_num_rows($results);}

$rows=mysqli_fetch_array($results);}

else{header("location: index.php");}
?>
<?php include_once('components/navSign.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>  
<link rel="stylesheet" type="text/css" href="style.css">   

    <title>welcome to student affairs</title>
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
.container{
     display: block;
     margin: auto !important;
     font-family:Roboto,sans-serif;
     background:gray !important;    
     border-radius: 25px;
     padding-left: 20px;
     border-style: 1px solid gray;
     margin: 0 auto;
     text-align: center;
     opacity: 0.8;
     margin-top: 67px;
     box-shadow: 2px 5px 5px 0px black;
     max-width: 500px;
     padding-top: 10px;
     height: 400px;
     margin-top: 166px;
}
.StudentID{
   margin-left: 1px;s
     font-family: sans-serif;
     font-size: 14px;
     color: white;
     margin-top: 10px;
}
        /*--- for label of Full name---*/
.FullName{
     position: relative;
     float: right;
     margin-left: 2px;
     font-family: sans-serif;
     font-size: 14px;
     color: white;
     margin-top: 5px;
     width: 140px;
     font-weight: 700 !important;
}
#lname{
   margin-top:5px;
}
    
/*---for heading-----*/
.heading{
   text-decoration:bold;
   display: block !important ;
   text-align : center !important;
   font-size:30px;
   color:#F96;
   padding-top:10px;
   color: #800000 ;
}
        label
        {
            display: block;
            width: 100px;
            font-family: Impact;
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
          .userIcon{
              height: 35px;
              width: 35px;
              margin-left: 1% ;
          margin-top: -3% !important ;              
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
          body {
              opacity: 1 ;
    background-image: url("images/s3.jpg");
    background-color:rgba(0,0,0,0.9);
             
     background-repeat: no-repeat;
    background-size:100% 100%;
      
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      
      
      <div class="bimg">
<br>
<br>
<br>
<br>
 <div style="background-color: gray; border-radius: 25px; padding-left: 20px; padding-bottom: 20px;" class="container">
    
 <!---heading---->
     <h1 class="heading" style="text-align: center; font-weight: 1000 " > USER PROFILE<img src="images/Icon2.png" class="userIcon"></h1><hr></hr>
  <!---Form starting----> 
  <div class="row ">
   <!--- For Name---->
         <div class="col-sm-12">
             <div class="row form-group">
           <div class="col-xs-4">
                     <label class="FullName"> Name :</label> </div>
             <div class="col-xs-8">
              <label class="FullName"> <?php echo $rows["full name"];?></label> </div>
                 
             </div>
          </div>
     </div>
     <div class="row ">
   <!--- For Name---->
         <div class="col-sm-12">
             <div class="row form-group">
           <div class="col-xs-4">
                     <label class="FullName"> Year:</label> </div>
             <div class="col-xs-8">
              <label class="FullName"> <?php echo $rows["year"];?></label> </div>
                 
             </div>
          </div>
     </div>
     <div class="row ">
   <!--- For Name---->
         <div class="col-sm-12">
             <div class="row form-group">
           <div class="col-xs-4">
                     <label class="FullName"> Department:</label> </div>
             <div class="col-xs-8">
              <label class="FullName"> <?php echo $rows["division"];?></label> </div>
                 
             </div>
          </div>
     </div>
     <div class="row ">
   <!--- For Name---->
         <div class="col-sm-12">
             <div class="row form-group">
           <div class="col-xs-4">
                     <label class="FullName"> Email:</label> </div>
             <div class="col-xs-8">
              <label class="FullName"><?php echo $_SESSION['email']?></label> </div>
                 
             </div>
          </div>
        </div>
          <div class="row ">
         <div class="col-sm-12">
             <div class="row form-group">
           <div class="col-xs-4">
                     <label class="FullName">student ID:</label> </div>
             <div class="col-xs-8">
              <label class="FullName"> <?php echo $rows["student id"];?></label> </div>
                 
             </div>
          </div>
     </div>
                 </form>

</div>
</body>
</html>
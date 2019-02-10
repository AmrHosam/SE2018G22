<?php
session_start();
if (isset($_SESSION['email'])) {
include_once('components/navSign.php');}
else {header("location: index.php");}
$_SESSION['new_user'] = true; //session variable to mark old and new users
include_once ('./connect.php');
$student_id = $_SESSION['id']; //this variable will be set by sign-in page
$query = "SELECT * FROM `students` WHERE student_id = $student_id";
$stmt = $link->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
    $_SESSION['new_user'] = false;
}
?>
<!doctype html>
<html dir="auto" lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
<link href="css/bootstrap.css" rel="stylesheet" />
<!-- <link href="css/bootstrap-rtl.css" rel="stylesheet" />-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!--<script src="js/bootstrap.min.js"></script>-->
    <title>Hello, world!</title>
  </head>
  <style type="text/css">
  #requests{font-size:180%;}
  h1{font-size:120%;
  display:block;
  margin:auto;}
  body    {
  }
:lang(ar)   {font-family: "Scheherazade",serif; 
                 font-size: 105%;}  
      .jumbotron{background-color:white;}
      .container{background-color:#f0f2f3;
      border-radius:20px;}
      .edge{margin-right:2px;
      margin-bottom:0;}
      .btn{text-decoration:none !important;}
      .container{padding:20px;}
  </style>
  <body>
  

<div class="bimg">
</div>

<div dir="rtl" lang="ar" class="jumbotron">
  

<div dir="rtl" class="container"> 
 <div class="form-group row" dir="rtl"  id="requests" >
    <h1 > Requests</h1>
</div>

  <hr class="my-4">
 
  
  <form action="controllers/saverequest.php" method="post">
   <div class="form-group row" dir="rtl">
    <label for="exampleFormControlSelect1" dir="ltr" style="margin-right:10px">choose your request | اختر طلبك</label>
   
  <select name="type" lang="ar" class="form-control form-control-lg" id="exampleFormControlSelect1" rows="3">
     <option value="A">بيان درجات</option>
  <option value="B">كارنيه بدل فاقد</option>
  <option value="C">كارنيه مترو</option>
 <option value="D">شهادة قيد</option>
   <option value="E">تأجيل امتحانات</option>
   <option value="F">شهادة تخرج</option>
    </select>
  </div>
</select>
  <div class="form-group row edge" dir="rtl" >
  <p class="lead">
   <a class="btn btn-primary btn-lg" href="#" role="button" onclick="showDiv()" >تنفيذ</a>
  </p>
  </div>
 <div id="welcomeDiv"  style="display:none;" class="answer_list" >
 <div class="form-row" >
    <div class="form-group col-md-6" id="arabic" >
  <div class="form-group row edge" dir="rtl" >
      <label for="inputEmail4" >الاسم باللغة العربية</label> 
    </div>
    
      <input name="name_ar" type="text" class="form-control" id="inputEmail4" >
 </div>
    <div class="form-group col-md-6 qeid">
  <div class="form-group row edge" dir="rtl">
      <label for="inputEmail4">الاسم باللغة الانجليزية</label>
      </div>
    <input name="name_en" type="text" class="form-control" id="inputEmail4"  dir="ltr">
    </div>
  </div>
 
    
 <div class="form-group" dir="rtl">
    <div class="form-group row edge" dir="rtl">
  <label for="inputAddress" >العنوان</label>
  </div>
    <input name="address" type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  
 </div>
 
<div class="form-group">
<div class="form-group row edge" dir="rtl">
    <label for="exampleFormControlTextarea1" id="reasons">سبب الاستخراج</label>
  </div>
  <textarea name="reason" class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
  </div>
  
  <div class="form-group qeid">
<div class="form-group row edge" dir="rtl">
    <label for="exampleFormControlTextarea1">الجهة الموجهة إليها</label>
  </div>
  <textarea name="qeid" class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
  </div>
  
  <div class="row">
    <div class="form-group col-md-3">
  <div class="form-group row edge" dir="rtl">
      <label for="inputCity">رقم الهاتف</label>
</div>    
  <input name="mobile" type="text" class="form-control" id="inputCity">
    
  </div>
    <div class="form-group col-md-3 student">
  <div class="form-group row edge" dir="rtl">
      <label for="inputState">الفرقة</label>
    </div>
      <select name="year" id="inputState" class="form-control" style="font-size:90%">
        <option value="1">الاعدادية</option>
    <option value="2">الاولى</option>
    <option value="3">الثانية</option>
    <option value="4">الثالثة</option>
    <option value="5">الرابعة</option>
      </select>
    </div>
  
  <div class="form-group col-md-3 graduate"  style="display:none;" >
  <div class="form-group row edge" dir="rtl">
      <label for="inputZip" >سنة التخرج</label>
    </div>
      <input name="gradyear" type="text" class="form-control" id="inputZip">
    </div>
  
  <div class="form-group col-md-3">
  <div class="form-group row edge" dir="rtl">
      <label for="inputZip" >القسم و الشعبة</label>
    </div>
      <input name="department" type="text" class="form-control" id="inputZip">
    </div>
  
  
    <div class="form-group col-md-3">
  <div class="form-group row edge" dir="rtl">
      <label for="inputZip" >تاريخ الميلاد</label>
    </div>
      <input name="birth_date" type="text" class="form-control" id="inputZip">
    </div>
  </div>
  
  
 <div class="form-group row edge" dir="rtl">
  <button type="submit" class="btn btn-primary">تأكيد</button>
  </div>
  
</form>
<script type="text/javascript">
function showDiv() {
   document.getElementById('welcomeDiv').style.display = "block";
}
$(function() { 
   
    $('#exampleFormControlSelect1').change(function(){
        if($('#exampleFormControlSelect1').val() == '6') {
      $('.graduate').show();
      $('.student').hide();
            $('.carneh').show();
      $('.qeid').hide();
      $('#arabic').removeClass('col-md-6');
      $('#arabic').addClass('col-md-12');
        } else if($('#exampleFormControlSelect1').val() == '4'){
           $('.graduate').hide();
      $('.student').show();
       $('.carneh').hide(); 
      $('.qeid').show();
      $('#arabic').removeClass('col-md-12');
      $('#arabic').addClass('col-md-6');
      
        }
      else { $('.graduate').hide();
      $('.student').show(); $('.carneh').hide(); $('.qeid').hide();
$('#arabic').removeClass('col-md-6');
      $('#arabic').addClass('col-md-12'); 
        }
    });
}); 
</script>
</div>
 
</div>
</div>  
  </body>
</html>
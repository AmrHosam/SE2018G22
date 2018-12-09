<?php   include_once('navSign.php');?>
<!doctype html>
<html dir="auto" lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
<link href="css/bootstrap.css" rel="stylesheet" />
<link href="css/bootstrap-rtl.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
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
 
  
  <form>
   <div class="form-group row" dir="rtl">
    <label for="exampleFormControlSelect1" dir="ltr" style="margin-right:10px">choose your request | اختر طلبك</label>
   
  <select lang="ar" class="form-control form-control-lg" id="exampleFormControlSelect1" rows="3">
     <option value="1">بيان درجات</option>
  <option value="2">كارنيه بدل فاقد</option>
  <option value="3">كارنيه مترو</option>
 <option value="4">شهادة قيد</option>
   <option value="5">تأجيل امتحانات</option>
   <option value="6">شهادة تخرج</option>
    </select>
  
  </div>
</select>
  </form>
  <div class="form-group row edge" dir="rtl" >
  <p class="lead">
   <a class="btn btn-primary btn-lg" href="#" role="button" onclick="showDiv()" >تنفيذ</a>
  </p>
  </div>






 


  
  
 
 
 <div id="welcomeDiv"  style="display:none;" class="answer_list" >
<form> 
 <div class="form-row" >
    <div class="form-group col-md-6" id="arabic" >
  <div class="form-group row edge" dir="rtl" >
      <label for="inputEmail4" >الاسم باللغة العربية</label> 
    </div>
    
      <input type="email" class="form-control" id="inputEmail4" >
 </div>
    <div class="form-group col-md-6 qeid">
  <div class="form-group row edge" dir="rtl">
      <label for="inputEmail4">الاسم باللغة الانجليزية</label>
      </div>
    <input type="email" class="form-control" id="inputEmail4"  dir="ltr">
    </div>
  </div>
 
    
 <div class="form-group" dir="rtl">
    <div class="form-group row edge" dir="rtl">
  <label for="inputAddress" >العنوان</label>
  </div>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  
 </div>
 
<div class="form-group">
<div class="form-group row edge" dir="rtl">
    <label for="exampleFormControlTextarea1" id="reasons">سبب الاستخراج</label>
  </div>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
  </div>
  
  <div class="form-group qeid">
<div class="form-group row edge" dir="rtl">
    <label for="exampleFormControlTextarea1">الجهة الموجهة إليها</label>
  </div>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
  </div>
  
  <div class="row">
    <div class="form-group col-md-3">
  <div class="form-group row edge" dir="rtl">
      <label for="inputCity">رقم الهاتف</label>
</div>    
  <input type="text" class="form-control" id="inputCity">
    
  </div>
    <div class="form-group col-md-3 student">
  <div class="form-group row edge" dir="rtl">
      <label for="inputState">الفرقة</label>
    </div>
      <select id="inputState" class="form-control" style="font-size:90%">
        <option selected>الاعدادية</option>
        <option>الاولى</option>
    <option>الثانية</option><option>الثالثة</option><option>الرابعة</option>
      </select>
    </div>
  
  <div class="form-group col-md-3 graduate"  style="display:none;" >
  <div class="form-group row edge" dir="rtl">
      <label for="inputZip" >سنة التخرج</label>
    </div>
      <input type="text" class="form-control" id="inputZip">
    </div>
  
  <div class="form-group col-md-3">
  <div class="form-group row edge" dir="rtl">
      <label for="inputZip" >القسم و الشعبة</label>
    </div>
      <input type="text" class="form-control" id="inputZip">
    </div>
  
  
    <div class="form-group col-md-3">
  <div class="form-group row edge" dir="rtl">
      <label for="inputZip" >تاريخ الميلاد</label>
    </div>
      <input type="text" class="form-control" id="inputZip">
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

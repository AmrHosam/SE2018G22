<!-- <pre> -->
<?php
session_start();
$_SESSION['new_user'] = true;
include_once 'navSign.php';
include_once './connect.php';
$student_id = 2;
$query = "SELECT * FROM `users` WHERE student_id = 2";
$stmt = $link->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
    $_SESSION['new_user'] = false;
}
?>
<!-- </pre> -->

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
        <title>Hello, world!</title>
    </head>
    <style type="text/css">
        #requests {
            font-size: 180%;
        }

        h1 {
            font-size: 120%;
            display: block;
            margin: auto;
        }

        :lang(ar) {
            font-family: "Scheherazade", serif;
            font-size: 105%;
        }

        .jumbotron {
            background-color: white;
        }

        .container {
            background-color: #f0f2f3;
            border-radius: 20px;
        }

        .edge {
            margin-right: 2px;
            margin-bottom: 0;
        }

        .btn {
            text-decoration: none !important;
        }

        .container {
            padding: 20px;
        }
    </style>

    <body>


        <div class="bimg">
        </div>

        <div dir="rtl" lang="ar" class="jumbotron">


            <div dir="rtl" class="container">
                <div class="form-group row" dir="rtl" id="requests">
                    <h1> Requests</h1>
                </div>

                <hr class="my-4">


                <form action="controllers/saverequest.php" method="post">        <!-- -->
                    <div class="form-group row" dir="rtl">
                        <label for="exampleFormControlSelect1" dir="ltr" style="margin-right:10px">choose your request
                            | اختر طلبك</label>

                        <select name="type" lang="ar" class="form-control form-control-lg" id="exampleFormControlSelect1"
                            rows="3">
                            <option value="A">شهادة تخرج</option>
                            <option value="B">كارنيه</option>
                            <option value="C">كارنيه مترو</option>
                            <option value="D">شهادة قيد</option>
                            <option value="E">اخر</option>
                        </select>

                    </div>
                    <div class="form-group row edge" dir="rtl">
                        <p class="lead">
                            <a class="btn btn-primary btn-lg" href="#welcomeDiv" role="button" onclick="showDiv()">تنفيذ</a>
                        </p>
                    </div>
                    </select>
                    <div id="welcomeDiv" style="display:none;" class="answer_list">
                        <input type="hidden" name="student_id" value="1">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-group row edge" dir="rtl">
                                    <label for="inputEmail4">الاسم باللغة العربية</label>
                                </div>

                                <input name="name_ar" type="text" class="form-control" id="inputEmail4" value = "<?php print_r($row["name_ar"]);?>">
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group row edge" dir="rtl">
                                    <label for="inputEmail4">الاسم باللغة الانجليزية</label>
                                </div>
                                <input name="name_en" type="text" class="form-control" id="inputEmail4" dir="ltr"  value = "<?php print_r($row["name_en"]);?>">
                            </div>
                        </div>


                        <div class="form-group" dir="rtl">
                            <div class="form-group row edge" dir="rtl">
                                <label for="inputAddress">العنوان</label>
                            </div>
                            <input name="address" type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" value = "<?php print_r($row["address"]);?>">

                        </div>

                        <div class="form-group">
                            <div class="form-group row edge" dir="rtl">
                                <label for="exampleFormControlTextarea1">سبب الاستخراج</label>
                            </div>
                            <textarea name="reason" class="form-control" id="exampleFormControlTextarea1" rows="3" value = "<?php print_r($row["reason"]);?>"></textarea>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <div class="form-group row edge" dir="rtl">
                                    <label for="inputCity">رقم الهاتف</label>
                                </div>
                                <input name="mobile" type="text" class="form-control" id="inputCity" value = "<?php print_r($row["mobile_number"]);?>">

                            </div>
                            <div class="form-group col-md-3">
                                <div class="form-group row edge" dir="rtl">
                                    <label for="inputState">الفرقة</label>
                                </div>
                                <select name="year" id="inputState" class="form-control" style="font-size:90%" value = "<?php print_r($row["year"]);?>">
                                    <option value="1" selected>الاعدادية</option>
                                    <option value="2">الاولى</option>
                                    <option value="3">الثانية</option>
                                    <option value="4">الثالثة</option>
                                    <option value="5">الرابعة</option>
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <div class="form-group row edge" dir="rtl">
                                    <label for="inputZip">القسم</label>
                                </div>
                                <input name="department" type="text" class="form-control" id="inputZip" value = "<?php print_r($row["department"]);?>">
                            </div>


                            <div class="form-group col-md-3">
                                <div class="form-group row edge" dir="rtl">
                                    <label for="inputZip">تاريخ الميلاد</label>
                                </div>
                                <input name="birth_date" type="text" class="form-control" id="inputZip" value = "<?php print_r($row["date"]);?>">
                            </div>
                        </div>
                        <div class="form-group carneh" dir="rtl">
                            <div class="form-group row edge" dir="rtl">
                                <label for="inputZip">شهادة الميلاد</label>
                            </div>
                            <div class="custom-file">
                                <input name="file" type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
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
                    $(function () {

                        $('#exampleFormControlSelect1').change(function () {
                            if ($('#exampleFormControlSelect1').val() == 'A') {
                                $('.carneh').show();
                                $('#customFile').attr('required', 'true');
                            } else {
                                $('.carneh').hide();
                                $('#customFile').removeAttr('required');
                            }
                        });
                    });
/*$(function(){
    var elements = document.getElementsByTagName("input");
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function(e) {
            e.target.setCustomValidity("This can't be left keda!");
        };
    }
});*/

                </script>
            </div>

        </div>
        </div>
    </body>

</html>

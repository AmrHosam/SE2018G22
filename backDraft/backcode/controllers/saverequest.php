<?php
session_start();
include_once '../connect.php';
/* retreive POST data */
$type = $_POST['type'];
$name_ar = $_POST['name_ar'];
$name_en = $_POST['name_en'];
$address = $_POST['address'];
$reason = $_POST['reason'];
$mobile = $_POST['mobile'];
$year = $_POST['year'];
$department = $_POST['department'];
$birth_date = null;
$student_id = 2;
/* send to database and error checking*/
if ($_SESSION['new_user'] == true) { //checks if the user already has an account to avoid entering duplicate users
    //prepare statements are used to avoid sql injection
    $stmt1 = $link->prepare("INSERT INTO `users` (student_id, name_ar,name_en,`address`,reason,mobile_number,
        `year`,department,birth_date) VALUES (?,?,?,?,?,?,?,?,?)");
} else {
    $stmt1 = $link->prepare("UPDATE `users` SET student_id=?, name_ar=?,name_en=?,`address`=?
    ,reason=?,mobile_number=?,`year`=?,department=?,birth_date=?");
}
if (false === $stmt1) {
    die('prepare() failed: ' . htmlspecialchars($link->error));
}
$stmt2 = $link->prepare("INSERT INTO `requests` (student_id, `type`) VALUES (?,?)");
if (false === $stmt2) {
    die('prepare() failed: ' . htmlspecialchars($link->error));
}
$rc1 = $stmt1->bind_param('isssssiss', $student_id, $name_ar, $name_en, $address, $reason, $mobile, $year,
    $department, $birth_date);
$rc2 = $stmt2->bind_param('is', $student_id, $type);
if (false === $rc1) {
    die('bind_param() failed: ' . htmlspecialchars($stmt1->error));
}
if (false === $rc2) {
    die('bind_param() failed: ' . htmlspecialchars($stmt2->error));
}
$rc1 = $stmt1->execute();
if (false === $rc1) {
    die('execute() failed: ' . htmlspecialchars($stmt1->error));
}
$stmt1->close();
$rc2 = $stmt2->execute();
if (false === $rc2) {
    die('execute() failed: ' . htmlspecialchars($stmt2->error));
}
$stmt2->close();
header('Location: ../formsPage.php');

<?php
session_start();
include_once '../connect.php';
/* retreive POST data */
$type = $_POST['type'];
$name_ar = $_POST['name_ar'];
$name_en = $_POST['name_en'];
$address = $_POST['address'];
//$reason = ($_POST['type'] == 4) ? $_POST['qeid'] : $_POST['reason'];
$reason = $_POST['reason'];
$destination = $_POST['qeid'];
$mobile = $_POST['mobile'];
$year = $_POST['year'];
$grad_year = $_POST['gradyear'];
$department = $_POST['department'];
$birth_date = $_POST['birth_date'];
$student_id = $_SESSION['id'];
/* send to database and error checking*/
if ($_SESSION['new_user'] === true) { //checks if the user already has an account to avoid entering duplicate users
    //prepare statements are used to avoid sql injection
    $stmt1 = $link->prepare("INSERT INTO `students` (student_id, name_ar,name_en,`address`,mobile_number,
        `year`,department,birth_date, grad_year) VALUES (?,?,?,?,?,?,?,?,?)");
} else {
    $stmt1 = $link->prepare("UPDATE `students` SET student_id=?, name_ar=?,name_en=?,`address`=?
        ,mobile_number=?,`year`=?,department=?,birth_date=?,grad_year=? WHERE student_id = " . $student_id);
}
$stmt2 = $link->prepare("INSERT INTO `requests` (student_id, `type`, reason, destination) VALUES (?,?,?,?)");
/************************************************************************/
if (false === $stmt1) {
    die('prepare() failed: ' . htmlspecialchars($link->error));
}
if (false === $stmt2) {
    die('prepare() failed: ' . htmlspecialchars($link->error));
}
/************************************************************************/
$rc1 = $stmt1->bind_param('issssissi', $student_id, $name_ar, $name_en, $address, $mobile, $year,
    $department, $birth_date, $grad_year);
$rc2 = $stmt2->bind_param('isss', $student_id, $type, $reason, $destination);
/************************************************************************/
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

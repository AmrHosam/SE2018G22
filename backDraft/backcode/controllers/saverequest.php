<?php
include_once '../connect.php';
$stmt = $link->prepare("INSERT INTO `data` (student_id, `type`, name_ar,name_en,`address`,reason,mobile_number,
 `year`,department,birth_date) VALUES (?,?,?,?,?,?,?,?,?,?)");
if (false === $stmt) {
    die('prepare() failed: ' . htmlspecialchars($mysqli->error));
}
$rc = $stmt->bind_param('issssssiss', $student_id, $type, $name_ar, $name_en, $address, $reason, $mobile, $year,
    $department, $birth_date);
if (false === $rc) {
    // again execute() is useless if you can't bind the parameters. Bail out somehow.
    die('bind_param() failed: ' . htmlspecialchars($stmt->error));
}
$type = $_POST['type'];
$name_ar = $_POST['name_ar'];
$name_en = $_POST['name_en'];
$address = $_POST['address'];
$reason = $_POST['reason'];
$mobile = $_POST['mobile'];
$year = $_POST['year'];
$department = $_POST['department'];
$birth_date = null;
$student_id = 1;
$rc = $stmt->execute();
if (false === $rc) {
    die('execute() failed: ' . htmlspecialchars($stmt->error));
}
$stmt->close();
header('Location: ../formsPage.php');

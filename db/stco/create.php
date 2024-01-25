<?php

$con = "mysql:host=localhost;dbname=tasks";
$user = "root";
$pass = "";



$student = $_POST['st_id'];
$course = $_POST['co_id'];
$vo = $_POST['vote'];

if ($student == 0 || $course == 0 || $vo == 0) {

    header("location: /pages/stco/create.php");
}

try {

    $db = new PDO($con, $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $q = "INSERT INTO `st&cu` (`student_id`, `course_id`,`vo`) VALUES ( '$student', '$course',$vo)";

    $db->exec($q);
    header("location: /pages/stco/index.php");
} catch (PDOException $e) {

    echo "Failed" . $e->getMessage();
}

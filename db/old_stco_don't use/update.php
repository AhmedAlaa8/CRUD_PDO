<?php

$con = "mysql:host=localhost;dbname=tasks";
$user = "root";
$pass = "";


$student = $_POST['st_id'];
$course = $_POST['co_id'];
$vo = $_POST['vote'];
$id = $_POST['id'];



try {

    $db = new PDO($con, $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



    $q = "UPDATE `st&cu` SET `student_id`='$student',`course_id`='$course',`vo`=$vo WHERE id=$id";

    $st = $db->prepare($q);
    $st->execute();
    header("location: /pages/stco/index.php");
} catch (PDOException $e) {

    echo "Failed" . $e->getMessage();
}

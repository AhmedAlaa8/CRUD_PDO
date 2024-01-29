<?php


use Src\data\db;

include("../../../vendor/autoload.php");


if ($student == 0 || $course == 0 || $vo == 0) {

    header("location: /pages/stco/create.php");
}



$student = $_POST['st_id'];
$course = $_POST['co_id'];
$vo = $_POST['vote'];


$tasks = new db("tasks");
$tasks->create("st&cu", "stco", ['student_id', 'course_id', 'vo'], ["$student", "$course", $vo]);

<?php



use Src\data\db;

include("../../../vendor/autoload.php");


$student = $_POST['student_id'];
$course = $_POST['course_id'];
$vo = $_POST['vo'];
$id = $_POST['id'];


if ($student == 0 || $course == 0 || $vo == 0) {

    header("location: /pages/stco/create.php");
}



$tasks = new db("tasks");
$tasks->update("st&cu", "stco", $_POST, $id);

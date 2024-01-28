<?php


use Src\data\db;

include("../../../vendor/autoload.php");

$id = $_POST['id'];

$tasks = new db("tasks");
$tasks->delete("students", "student", $id);

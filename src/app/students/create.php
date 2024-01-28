<?php


use Src\data\db;

include("../../../vendor/autoload.php");

$name = $_POST['name'];
$date = $_POST['date'];

$tasks = new db("tasks");
$tasks->create("students", "student", ['name', 'date'], ["$name", "$date"]);

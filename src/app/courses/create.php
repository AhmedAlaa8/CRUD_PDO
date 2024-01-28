<?php



use Src\data\db;

include("../../../vendor/autoload.php");

$name = $_POST['name'];
$time = $_POST['time'];

$tasks = new db("tasks");
$tasks->create("courses", ['name', 'time'], ["$name", "$time"]);

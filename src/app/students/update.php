<?php

use Src\data\db;

include("../../../vendor/autoload.php");



$name = $_POST['name'];
$time = $_POST['time'];
$id = $_POST['id'];


$tasks = new db("tasks");
$tasks->update("students", "student", $_POST, $id);

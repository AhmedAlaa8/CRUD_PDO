<?php

use Src\data\db;

include("../../../vendor/autoload.php");



$name = $_POST['name'];
$time = $_POST['time'];
$id = $_POST['id'];


$tasks = new db("tasks");
$tasks->update("courses", "courses", $_POST, $id);

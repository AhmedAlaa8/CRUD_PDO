<?php

use Src\data\db;

include("vendor/autoload.php");


$tasks = new db("tasks");
$tasks->select("courses");

<?php

$con = "mysql:host=localhost;dbname=tasks";
$user = "root";
$pass = "";


$name = $_POST['name'];
$time = $_POST['time'];

try {

    $db = new PDO($con, $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $q = "INSERT INTO `courses` (`name`, `time`) VALUES ( '$name', '$time')";

    $db->exec($q);
    header("location: /pages/courses/index.php");
} catch (PDOException $e) {

    echo "Failed" . $e->getMessage();
}

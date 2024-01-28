<?php

$con = "mysql:host=localhost;dbname=tasks";
$user = "root";
$pass = "";


$name = $_POST['name'];
$date = $_POST['date'];

try {

    $db = new PDO($con, $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $q = "INSERT INTO `students` (`name`, `date`) VALUES ( '$name', '$date')";

    $db->exec($q);
    header("location: /pages/student/index.php");
} catch (PDOException $e) {

    echo "Failed" . $e->getMessage();
}

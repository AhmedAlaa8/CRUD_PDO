<?php

$con = "mysql:host=localhost;dbname=tasks";
$user = "root";
$pass = "";


$name = $_POST['name'];
$time = $_POST['time'];
$id = $_POST['id'];


try {

    $db = new PDO($con, $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



    $q = "UPDATE courses SET `name`='$name',`time`='$time' WHERE id=$id";


    $st = $db->prepare($q);
    $st->execute();
    header("location: /pages/courses/index.php");
} catch (PDOException $e) {

    echo "Failed" . $e->getMessage();
}

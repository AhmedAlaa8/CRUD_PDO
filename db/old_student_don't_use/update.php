<?php

$con = "mysql:host=localhost;dbname=tasks";
$user = "root";
$pass = "";


$name = $_POST['name'];
$date = $_POST['date'];
$id = $_POST['id'];


try {

    $db = new PDO($con, $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



    $q = "UPDATE students SET `name`='$name',`date`='$date' WHERE id=$id";


    $st = $db->prepare($q);
    $st->execute();
    header("location: /pages/student/index.php");
} catch (PDOException $e) {

    echo "Failed" . $e->getMessage();
}

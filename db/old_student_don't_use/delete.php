<?php

$con = "mysql:host=localhost;dbname=tasks";
$user = "root";
$pass = "";


$id = $_POST['id'];

try {

    $db = new PDO($con, $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $q = "DELETE FROM students WHERE `id` = $id";

    $db->exec($q);
    header("location: /pages/student/index.php");
} catch (PDOException $e) {

    echo "Failed" . $e->getMessage();
}

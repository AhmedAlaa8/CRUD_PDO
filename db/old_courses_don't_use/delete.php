<?php

$con = "mysql:host=localhost;dbname=tasks";
$user = "root";
$pass = "";


$id = $_POST['id'];

try {

    $db = new PDO($con, $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $q = "DELETE FROM courses WHERE `id` = $id";

    $db->exec($q);
    header("location: /pages/courses/index.php");
} catch (PDOException $e) {

    echo "Failed" . $e->getMessage();
}

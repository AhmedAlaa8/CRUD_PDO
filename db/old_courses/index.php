<?php

$con = "mysql:host=localhost;dbname=tasks";
$user = "root";
$pass = "";

try {
    $db = new PDO($con, $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM courses ";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $re = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $th) {

    echo  $th->getMessage();
}

<?php

$con = "mysql:host=localhost;dbname=tasks";
$user = "root";
$pass = "";

try {
    $db = new PDO($con, $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT `st&cu`.`id` ,`courses`.`name` AS course , `students`.`name` AS student , `st&cu`.`vo` 
       FROM `st&cu` 
       INNER JOIN `students` 
       ON `st&cu`.`student_id` = `students`.`id` 
       INNER JOIN `courses` 
       ON `st&cu`.`course_id` = `courses`.`id`
       ORDER BY `st&cu`.`id`";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $re = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $th) {

    echo  $th->getMessage();
}

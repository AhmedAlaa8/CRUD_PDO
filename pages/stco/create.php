<?php

$con = "mysql:host=localhost;dbname=tasks";
$user = "root";
$pass = "";

$db = new PDO($con, $user, $pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$qs = "SELECT * FROM `students`";
$qc = "SELECT * FROM `courses`";

$results = $db->prepare($qs);
$results->execute();
$datas = $results->fetchAll(PDO::FETCH_ASSOC);

$resultc = $db->prepare($qc);
$resultc->execute();
$datac = $resultc->fetchAll(PDO::FETCH_ASSOC);


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm p-3 mb-5 bg-body-tertiary rounded">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= $_SERVER["REQUEST_URI"] = "/index.php" ?>">HOME</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./index.php">Show Data stco</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./create.php">Create stco</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <br>
    <br>
    <br>

    <div class="container">
        <form method="POST" action="/db/stco/create.php">
            <select name="st_id" class="form-select" aria-label="Default select example">
                <option selected value="0">Open this select student</option>
                <?php
                foreach ($datas as $key => $value) : ?>
                    <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>

                <?php endforeach ?>
            </select>
            <br>
            <br>
            <select name="co_id" class="form-select" aria-label="Default select example">
                <option selected value="0">Open this select course</option>
                <?php
                foreach ($datac as $key => $value) : ?>
                    <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>

                <?php endforeach ?>

            </select>
            <br>
            <br>
            <select name="vote" class="form-select" aria-label="Default select example">
                <option selected value="0">Open this select vote</option>
                <option value="1">Bad</option>
                <option value="2">Not bad</option>
                <option value="3">Somehow good</option>
                <option value="4">Good</option>
                <option value="5">Very good</option>
                <option value="6">the best thing</option>
            </select>
            <br>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
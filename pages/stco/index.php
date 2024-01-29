<?php


use Src\data\db;

include("../../vendor/autoload.php");

$tasks = new db("tasks");

$data = $tasks->selectJoin("SELECT `st&cu`.`id` ,`courses`.`name` AS course , `students`.`name` AS student , `st&cu`.`vo` 
FROM `st&cu` 
INNER JOIN `students` 
ON `st&cu`.`student_id` = `students`.`id` 
INNER JOIN `courses` 
ON `st&cu`.`course_id` = `courses`.`id`
ORDER BY `st&cu`.`id`");



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
                        <a class="nav-link active" aria-current="page" href="./index.php">Show Data SC</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./create.php">Create SC</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>


    <div class="container">
        <table class="table  table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">id</th>
                    <th scope="col">student_name</th>
                    <th scope="col">course_name</th>
                    <th scope="col">vote</th>
                    <th scope="col">Siting</th>
                </tr>

                <?php foreach ($data as $key => $value) : ?>
                    <tr>
                        <th scope="row"><?= $key++ ?></th>
                        <td><?= $value['id'] ?></td>
                        <td><?= $value['student'] ?></td>
                        <td><?= $value['course'] ?></td>
                        <?php
                        if ($value['vo'] == 1) {
                            echo "<td style='color: red;' > " . " Bad" . "</td>";
                        } elseif ($value['vo'] == 2) {
                            echo "<td style='color: #dd4b61;' > " . "Not bad" . "</td>";
                        } elseif ($value['vo'] == 3) {
                            echo "<td style='color: #c0ca33;'> " . "Somehow good" . "</td>";
                        } elseif ($value['vo'] == 4) {
                            echo "<td style='color: #0d47a1;'> " . "Good" . "</td>";
                        } elseif ($value['vo'] == 5) {
                            echo "<td style='color: #33ca33;'> " . "Very good" . "</td>";
                        } elseif ($value['vo'] == 6) {
                            echo "<td style='color: #0de9fd;'> " . "the best thing" . "</td>";
                        }
                        ?>

                        <td class="d-flex ">

                            <form action="./update.php" method="post">
                                <input type="hidden" name="id" value="<?= $value['id'] ?>">
                                <button type="submit" class="btn btn-outline-info">E</button>
                            </form>
                            <form class="ms-2" action="/src/app/stco/delete.php" method="post">
                                <input type="hidden" name="id" value="<?= $value['id'] ?>">
                                <button type="submit" class="btn btn-outline-danger">D</button>
                            </form>

                        </td>

                    </tr>
                <?php endforeach ?>
            </thead>
            <tbody>


            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
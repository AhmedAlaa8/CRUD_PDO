<?php

include("../../db/courses/index.php");



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
                        <a class="nav-link active" aria-current="page" href="./index.php">Show Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./create.php">Create</a>
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
                    <th scope="col">name</th>
                    <th scope="col">time</th>
                    <th scope="col">Siting</th>
                </tr>

                <?php foreach ($re as $key => $value) : ?>
                    <tr>
                        <th scope="row"><?= $key++ ?></th>
                        <td><?= $value['id'] ?></td>
                        <td><?= $value['name'] ?></td>
                        <td><?= $value['time'] ?></td>
                        <td class="d-flex ">

                            <form action="./update.php" method="post">
                                <input type="hidden" name="id" value="<?= $value['id'] ?>">
                                <button type="submit" class="btn btn-outline-info">E</button>
                            </form>
                            <form class="ms-2" action="../../db/courses/delete.php" method="post">
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
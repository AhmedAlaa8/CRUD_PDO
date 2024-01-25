<?php

$id = $_POST['id'];


$con = "mysql:host=localhost;dbname=tasks";
$user = "root";
$pass = "";

try {
    $db = new PDO($con, $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM students ";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $re = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($re as $key => $value) {

        if ($value['id'] == $id) {

            $selector = $value;
        }
    }
} catch (PDOException $th) {

    echo  $th->getMessage();
}


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

    <br>
    <br>
    <br>

    <div class="container">
        <form method="POST" action="/db/student/update.php">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" value="<?= $selector['name'] ?>" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">date</label>
                <input value="<?= $selector['date'] ?>" type="date" class="form-control" name="date">
            </div>
            <input type="hidden" name="id" value="<?= $id ?>">

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
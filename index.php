<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

include_once 'database.php';
$username = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>

    <title>Home</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="fonts/roboto/roboto.css">
    <link rel="stylesheet" type="text/css" href="fonts/material/material-icons.css">

    <style type="text/css">
        .container-fluid {
            padding: 0 !important;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#"><?php echo "Welcome {$username}<br>" ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="add.php">
                    <i class="material-icons">add</i> Add
                </a>
                <a class="nav-item nav-link active" href="logout.php">
                    <i class="material-icons">exit_to_app</i> Logout
                </a>
            </div>
        </div>
    </nav>
</div>

<div class="container-fluid">
    <table class="table table-striped table-hover">
        <thead class="thead-light">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Personal Info</th>
            <th scope="col">Qualifications</th>
            <th scope="col">Hobbies</th>
            <th scope="col" class="text-right">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $statement = $pdo->prepare("SELECT * FROM `interviewers`;");
        if ($statement->execute()) {
            foreach ($statement->fetchAll() as $interviewer) {
                echo "<tr>";
                foreach ($interviewer as $k => $v) {
                    if ($k == 'id') continue;
                    echo "<td>{$v}</td>";
                }
                echo "<td class='text-right'>";
                echo "<a href='update.php?id={$interviewer['id']}' class='btn btn-primary'><i class='material-icons'>edit</i></a>";
                echo "<a href='delete.php?id={$interviewer['id']}' class='btn btn-danger' style='margin-left: 10px;'><i class='material-icons'>delete</i></a>";
                echo "</td>";
                echo "</tr>";
            }
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
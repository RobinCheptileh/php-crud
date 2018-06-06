<?php
include_once 'database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>

    <title>Register</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="fonts/roboto/roboto.css">
    <link rel="stylesheet" type="text/css" href="fonts/material/material-icons.css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col col-md-4 offset-md-4 form-wrap">
            <h2 class="text-center">Register</h2>

            <div class="text-center text-danger">
                <?php
                if (isset($_POST['register'])
                    && isset($_POST['username'])
                    && isset($_POST['password'])
                    && isset($_POST['confirm_password'])) {

                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $confirm_password = $_POST['confirm_password'];

                    if ($password == $confirm_password) {
                        $statement = $pdo->prepare("INSERT INTO `users` (`username`, `password`) VALUES (?, ?);");
                        if ($statement->execute(array($username, password_hash($password, PASSWORD_DEFAULT)))) {
                            session_start();

                            $_SESSION['user'] = $username;
                            header('Location: index.php');
                            exit;
                        } else {
                            echo "An error occurred. Please try again<br>";
                        }
                    } else {
                        echo "Passwords do not match<br>";
                    }
                }
                ?>
            </div>

            <form action="" method="post" id="login-form">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="material-icons">person_outline</i>
                        </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                           aria-describedby="basic-addon1" name="username" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="material-icons">lock_outline</i>
                        </span>
                    </div>
                    <input type="password" class="form-control" placeholder="Password" aria-label="Password"
                           aria-describedby="basic-addon1" name="password" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="material-icons">vpn_key</i>
                        </span>
                    </div>
                    <input type="password" class="form-control" placeholder="Confirm Password"
                           aria-label="Confirm Password"
                           aria-describedby="basic-addon1" name="confirm_password" required>
                </div>
                <div class="input-group mb-3 text-center">
                    <input type="submit" class="btn btn-primary col-md-12" name="register" value="Register">
                </div>
                <div class="input-group mb-3 text-center">
                    <a href="login.php" class="btn col-md-12">Login</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
<script src="js/jquery-3.3.1.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.js"></script>
</html>
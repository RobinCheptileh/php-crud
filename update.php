<?php
function login()
{
    header('Location: login.php');
    exit;
}

session_start();

if (!isset($_SESSION['user']) || !isset($_GET['id'])) login();

include_once 'database.php';
$username = $_SESSION['user'];
$id = $_GET['id'];

$statement = $pdo->prepare("SELECT * FROM `interviewers` WHERE `id`=?;");
if ($statement->execute(array($id))) {
    if ($statement->rowCount() == 1) {
        $interviewer = $statement->fetch();
    } else login();
} else login();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>

    <title>Add Interviewer</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="fonts/roboto/roboto.css">
    <link rel="stylesheet" type="text/css" href="fonts/material/material-icons.css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col col-md-4 offset-md-4 form-wrap">
            <h2 class="text-center">Edit <?php echo $interviewer['name'] ?>'s details</h2>

            <div class="text-center text-danger">
                <?php
                if (isset($_POST['update'])
                    && isset($_POST['name'])
                    && isset($_POST['phone'])
                    && isset($_POST['email'])
                    && isset($_POST['personal_info'])
                    && isset($_POST['qualifications'])
                    && isset($_POST['hobbies'])) {

                    $name = $_POST['name'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    $personal_info = $_POST['personal_info'];
                    $qualifications = $_POST['qualifications'];
                    $hobbies = $_POST['hobbies'];

                    $statement = $pdo->prepare("UPDATE `interviewers` SET `name`=?,`phone`=?,`email`=?,`personal_info`=?,`qualifications`=?,`hobbies`=? WHERE `id`=?");
                    if ($statement->execute(array($name,
                        $phone,
                        $email,
                        $personal_info,
                        $qualifications,
                        $hobbies,
                        $id))) {
                        header('Location: index.php');
                        exit;
                    } else {
                        echo "An error occurred. Please try again<br>";
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
                    <input type="text" class="form-control" placeholder="Name" aria-label="Name"
                           aria-describedby="basic-addon1" name="name" value="<?php echo $interviewer['name'] ?>"
                           required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="material-icons">phone</i>
                        </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Phone" aria-label="Phone"
                           aria-describedby="basic-addon1" name="phone" value="<?php echo $interviewer['phone'] ?>"
                           required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="material-icons">email</i>
                        </span>
                    </div>
                    <input type="email" class="form-control" placeholder="Email"
                           aria-label="Email" aria-describedby="basic-addon1" name="email"
                           value="<?php echo $interviewer['email'] ?>" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="material-icons">face</i>
                        </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Personal Info"
                           aria-label="Personal Info" aria-describedby="basic-addon1" name="personal_info"
                           value="<?php echo $interviewer['personal_info'] ?>" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="material-icons">school</i>
                        </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Qualifications"
                           aria-label="Qualifications" aria-describedby="basic-addon1" name="qualifications"
                           value="<?php echo $interviewer['qualifications'] ?>" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="material-icons">pool</i>
                        </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Hobbies"
                           aria-label="Hobbies" aria-describedby="basic-addon1" name="hobbies"
                           value="<?php echo $interviewer['hobbies'] ?>" required>
                </div>

                <div class="input-group mb-3 text-center">
                    <input type="submit" class="btn btn-primary col-md-12" name="update" value="Update">
                </div>
                <div class="input-group mb-3 text-center">
                    <a href="index.php" class="btn col-md-12">Cancel</a>
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
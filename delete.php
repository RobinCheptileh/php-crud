<?php

session_start();

if (!isset($_SESSION['user']) || !isset($_GET['id'])) {
    header('Location: login.php');
    exit;
}

include_once 'database.php';
$username = $_SESSION['user'];
$id = $_GET['id'];

$statement = $pdo->prepare("DELETE FROM `interviewers` WHERE `id`=?;");
$statement->execute(array($id));
header('Location: index.php');
exit;
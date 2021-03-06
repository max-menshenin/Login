<?php
session_start();
$error = array();

$login = filter_var(trim($_POST['login']),
    FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']),
    FILTER_SANITIZE_STRING);
$pass = md5($pass."hydrochloride");

$mysql = new mysqli('localhost','root','root','register-db' );
echo mysqli_error($mysql);
echo mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");
$user = $result->fetch_assoc();
if (count($user) == 0) {
    $error[] = "login or pass wrong";
    header('Location: /Login');
}
$_SESSION['error'] = $error;
$_SESSION['user'] = $user;
$mysql->close();
header('Location: /Login');


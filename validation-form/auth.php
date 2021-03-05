<?php
session_start();
$error_arr = array();
$error_arr[] = 'check';

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
print_r($user);
if (count($user) == 0) {
    $error_arr[] = "user not found";
    //header('Location: /Login');
}

$_SESSION['user'] = $user['user'];
var_dump($error_arr);
$mysql->close();

//header('Location: /Login');

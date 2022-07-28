<?php
session_start();

$login = filter_var(trim($_POST['login']),
    FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']),
    FILTER_SANITIZE_STRING);

if (mb_strlen($login) < 5 || mb_strlen($login) > 90)
{
    echo "error login must be more than 5 and less than 90";
    exit();
}
else if (mb_strlen($pass) < 2 || mb_strlen($pass) > 6)
{
    echo "pass must be in range 2 to 6";
    exit();
}
$mysqli = new mysqli('localhost', 'root','root','register-db' );
//if ($mysqli->connect_error) {
//  die('Connect Error (' . $mysqli->conn ect_errno . ') ' . $mysqli->connect_error;
$pass = md5($pass."hydrochloride");
$mysqli->query("INSERT INTO `users`(`login`,`pass`)
VALUES ('$login','$pass')");
$mysqli->close();
header('Location: /Login');
exit();
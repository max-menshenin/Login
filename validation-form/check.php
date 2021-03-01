<?php
session_start();

$login = filter_var(trim($_POST['login']),
    FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']),
    FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']),
    FILTER_SANITIZE_STRING);

if (mb_strlen($login) < 5 || mb_strlen($login) > 90)
{
    echo "error login must be more than 5 and less than 90";
    exit();
}
else if (mb_strlen($name) < 3 || mb_strlen($name) > 100)
{
    echo "name must be in range 3 to 100";
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
$mysqli->query("INSERT INTO `users`(`login`,`pass`,`name`)
VALUES ('$login','$pass','$name')");
$mysqli->close();
header('Location: /Login');
exit();
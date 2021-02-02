<?php
$login = filter_var(trim($_POST['login']),
    FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']),
    FILTER_SANITIZE_STRING);
$pass = md5($pass."hydrochloride");
//echo mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$mysql = new mysqli('localhost','root','root','register-db' );
echo mysqli_error($mysql);
$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");
$user = $result->fetch_assoc();
print_r($user);
if (count($user) == 0) {
    echo "user not found";
    exit();
}

setcookie('user',$user['name'], time() + 3600,'/Login');
$mysql->close();
header('Location: /Login');

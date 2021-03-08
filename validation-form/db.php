<?php
$serverName = 'localhost';
$userName = 'root';
$password = 'root';
$db = 'register-db';

$con = mysqli_connect($serverName, $userName, $password, $db);
if (mysqli_connect_errno())
{
    echo "connect error";
    header('Location: /Login');
}

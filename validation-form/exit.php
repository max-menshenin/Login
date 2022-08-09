<?php
session_start();
var_dump($_SESSION['user']['login']);
session_unset($_SESSION['user']);
header('Location: /Login');

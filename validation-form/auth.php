<?php
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

$password = md5($password."nsync");

$mysql = new mysqli('localhost', 'root', '', 'register_db');

$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
$user = $result->fetch_assoc();
//echo is_array($user) ? 'yes' : 'no';
if(count($user) == 0) {
    echo "User isn't found";
    exit();
}

setcookie('user', $user['name'], time() + 3600, '/');

$mysql->close();
header('Location: /www/');
//exit();
?>

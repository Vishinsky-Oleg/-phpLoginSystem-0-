<?php
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

    if (mb_strlen($login) < 5 || mb_strlen($login) > 90) {
        echo "Lenght of login is short";
        exit();
    }
    elseif (mb_strlen($name) < 3 || mb_strlen($name) > 50) {
        echo "Lenght of name is short";
        exit();
    }
    elseif (mb_strlen($password) < 2 || mb_strlen($password) > 6) {
        echo "Lenght of password is short";
        exit();
    }

    $password = md5($password."nsync");

    $mysql = new mysqli('localhost', 'root', '', 'register_db');
    $mysql->query("INSERT INTO `users` (`login`, `password`, `name`) VALUES('$login', '$password', '$name')");
    $mysql->close();
    header('Location: /www/');
    exit();
?>

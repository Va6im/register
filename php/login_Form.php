<?php

require_once('db.php');

$login = isset($_POST['login']) ? $_POST['login'] : '';
$pass = isset($_POST['pass']) ? $_POST['pass'] : '';

var_dump($_POST);

if (empty($login) || empty($pass)) {
    echo "Заполните все поля";
} else {
    $sql = "SELECT * FROM `user` WHERE login = '$login' AND pass = '$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            session_start();
            session_destroy();
            header("Location: login.php");
            exit();
        }
    } else {
        echo "Нет такого пользователя";
    }
}
<?php

require_once('db.php');

$login = $_POST['login'];
$email = $_POST['email'];
$pass = $_POST['pass'];

if (empty($login) || empty($email) || empty($pass)) {
    echo "Заполните все поля";
} else {
    $checkSql = "SELECT * FROM `user` WHERE login='$login' OR email='$email'";
    $result = $conn->query($checkSql);

    if ($result->num_rows > 0) {
        echo "Пользователь с таким логином или email уже существует.";
    } else {
        $sql = "INSERT INTO `user` (login, email, pass) VALUES ('$login', '$email', '$pass')";
        if ($conn->query($sql) === TRUE) {
            echo "Успешная регистрация!";
        } else {
            echo "Ошибка: " . $conn->error;
        }
    }
}

?>
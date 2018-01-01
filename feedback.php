<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 31.12.2017
 * Time: 17:43
 */

/* Ваш адрес и тема сообщения */

$email = '';
$tel = '';
$message = '';
$name = '';
$bezspama = '';

$address = "mihasic@inbox.ru";
$sub = "Сообщение с сайта palchiki";

if (!empty($_POST["email"]) || !empty($_POST["tel"])) {

    if (!empty($_POST["bezspama"])) {
        $bezspama = htmlspecialchars(trim($_POST["bezspama"]));
    }

    if (empty($bezspama))
    {
        if (!empty($_POST["email"])) {
            $email = htmlspecialchars(trim($_POST["email"]));
        }

        if (!empty($_POST["tel"])) {
            $tel = htmlspecialchars(trim($_POST["tel"]));
        }

        if (!empty($_POST["message"])) {
            $message = htmlspecialchars(trim($_POST["message"]));
        }

        if (!empty($_POST["name"])) {
            $name = htmlspecialchars(trim($_POST["name"]));
        }

        $mes = "Сообщение с сайта palchiki.\n
        Имя отправителя: $name 
        Электронный адрес отправителя: $email
        Телефон отправителя: $tel
        Текст сообщения:
        $message";

        if (mail($address, $sub, $mes)) {
            echo 'Мы с Вами свяжемся!';
        }
        else {
            echo 'Отправка сообщения не удалась. Попробуйте еще раз!';
        }
    } else {
        echo 'Отправка не прошла проверку на спам';
    }
} else {
    echo 'Не указан телефон или эл. адрес для обратной связи!';
}

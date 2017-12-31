<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 31.12.2017
 * Time: 17:43
 */

$email = htmlspecialchars(trim($_POST["email"]));
$tel = htmlspecialchars(trim($_POST["tel"]));
$message = htmlspecialchars(trim($_POST["message"]));
$bezspama = htmlspecialchars(trim($_POST["bezspama"]));

/* Ваш адрес и тема сообщения */
$address = "mihasic@inbox.ru";
$sub = "Сообщение с сайта palchiki";

/* Формат письма */
$mes = "Сообщение с сайта ХХХ.\n
Имя отправителя: $name 
Электронный адрес отправителя: $email
Телефон отправителя: $tel
Текст сообщения:
$message";

if (!empty($mail || !empty($tel))) {
    if (empty($bezspama))
    {
        if (mail($address, $sub, $mes)) {
            echo 'В ближайшее время с Вами свяжется администратор!';
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

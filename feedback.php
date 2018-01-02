<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 31.12.2017
 * Time: 17:43
 */

$ADDRESS = 'mihasic@inbox.ru';
$SUBJECT = 'Сообщение с сайта palchiki';

/**
 * @return string
 */
function createMessage(): string
{
    $email = htmlspecialchars(trim($_POST["eeemail"]));
    $tel = htmlspecialchars(trim($_POST["tel"]));
    $message = htmlspecialchars(trim($_POST["message"]));
    $name = htmlspecialchars(trim($_POST["name"]));

    $mes = "Сообщение с сайта palchiki.\n
        Имя отправителя: $name 
        Электронный адрес отправителя: $email
        Телефон отправителя: $tel
        Текст сообщения:
        $message";
    return $mes;
}

if (!empty($_POST["email"]) || !empty($_POST["tel"])) {
    $bezspama = htmlspecialchars(trim($_POST["bezspama"]));
    if (empty($bezspama))
    {
        $mes = createMessage();

        if (mail($ADDRESS, $SUBJECT, $mes)) {
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

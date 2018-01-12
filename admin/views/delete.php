<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11.01.2018
 * Time: 22:46
 */
?>

<?php
if (isset($errors) && is_array($errors)) {
    foreach ($errors as $error) {
        echo $error.'<br>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
    <script src="https://use.fontawesome.com/661a533fef.js"></script>
    <title>Творческая Студия "Пальчики"</title>
</head>
<body>
<div class="container">
    <div class="header">
        <div class="logo"><a href="/index.html"><img src="/images/logo.png" alt="Пальчики"></a></div>
        <ul class='menuInfo'>
            <li><a href="/index.html">Главная</a></li>
            <li><a href="/parties.html">Галерея</a></li>
            <li><a href="/contacts.html">Контакты</a></li>
            <li><a href="/forecast.html">Анонс</a></li>
        </ul>
    </div>
    <div class="mainCircles">
        <h3>Вы действительно хотите удалить МК: <span><?php echo $masterName.' '.$date?></span> ?</h3>
        <form method="POST">
            <button name="submit" class="btnEnter buttonDelete"><i class="fa fa-trash-o" aria-hidden="true"></i>Удалить</button>
            <button name="notsubmit" class="btnEnter buttonDelete"><i class="fa fa-hand-peace-o" aria-hidden="true"></i>Не удалять</button>
        </form>
    </div>
</div>
</body>
</html>


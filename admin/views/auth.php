<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
    <title>Творческая Студия "Пальчики"</title>
</head>
<body>
<div class="container">
    <div class="header">
        <div class="logo"><img src="../../images/logo.png" alt="Пальчики">
        </div>
        <ul class='menuInfo'>
            <li class="menu"><a href="index.html">Главная</a></li>
            <li class="menu"><a href="parties.html">Галерея</a></li>
            <li class="menu"><a href="contacts.html">Контакты</a></li>
            <li class="menu"><a href="forecast.html">Анонс</a></li>
        </ul>
    </div>

    <div class="mainCircles enter">
        <p>Вход для администратора</p>
        <?php
            if (isset($errors) && is_array($errors)) {
                foreach ($errors as $error) {
                    echo $error.'<br>';
                }
            }
        ?>
        <div>
            <form action="" method="POST">
                <input type="login" size="40" name="login" placeholder="login" value="<?php echo $login ?>" required>
                <input type="password" size="40" name="password" placeholder="password" required>
                <input type="submit" name="button" class="btnEnter" value="Войти">
            </form>
        </div>
    </div>
</div>
</body>
</html>
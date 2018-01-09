<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
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

    <?php
    if (isset($errors) && is_array($errors)) {
        foreach ($errors as $error) {
            echo $error.'<br>';
        }
    }
    ?>

    <form class="adminPanel" action="" enctype="multipart/form-data" method="POST">
        <p style="text-align: center">Добавить</p>

        <label  for="title">Название мастер-класса</label>
        <input type="text" class="input" name="master_name" placeholder="Название мастер-класса" value="<?php echo $masterName ?>" maxlength="200" required>

        <label  for="description">Описание</label>
        <textarea class="input textarea" name="description" rows="10" maxlength="1000" required><?php echo $description ?></textarea>

        <label  for="name">Дата и время МК</label>
        <input type="datetime-local" class="input" name="date" placeholder="Дата и время МК" value="<?php echo $date ?>" required>

        <label  for="name">Стоимость, &#x20BD;</label>
        <input type="text" class="input" name="coast" placeholder="Стоимость" value="<?php echo $coast ?>" pattern="[0-9]{1,3}" required>

        <label  for="file">Загрузка фото</label>
        <input type="file" class="input" name="photo" multiple accept="image/*,image/jpeg">

        <input type="submit" name="button" class="btnEnter admin" value="Все ОК, добавляем на сайт">
    </form>
</div>
</body>
</html>

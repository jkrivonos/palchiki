<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 07.01.2018
 * Time: 0:43
 */
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
<div class="header">
    <div class="logo"><a href="/index.html"><img src="/images/logo.png" alt="Пальчики"></a></div>
    <ul class='menuInfo'>
        <li><a href="/index.html">Главная</a></li>
        <li><a href="/parties.html">Галерея</a></li>
        <li><a href="/contacts.html">Контакты</a></li>
        <li><a href="/forecast.html">Анонс</a></li>
    </ul>
</div>
<p style="text-align: center">Список предстоящих мастер классов</p>
<div class="flexTable">
    <div class="allTable">
        <div class="justTable">
            <div class="tableTitle">
                <div>Название МК</div>
                <div>Описание</div>
                <div>Дата и время МК</div>
                <div>Стоимость, &#x20BD;</div>
                <div class="deletEdit"></div>
            </div>
            <?php foreach ($events as $event): ?>
            <div class="tableContent">
                <div><?php echo $event['master_name']; ?></div>
                <div><?php echo $event['description']; ?></div>
                <div><?php echo $event['date']; ?></div>
                <div><?php echo $event['coast']; ?></div>
                <div class="deletEdit">
                    <a href="/admin/update/<?php echo $event['id']; ?>" class="fa fa-pencil" aria-hidden="true"></a>
                    <a href="/admin/delete/<?php echo $event['id']; ?>" class="fa fa-trash-o" aria-hidden="true"></a>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
    <form action="/admin/create/" method="post">
        <input type="submit" name="submit" class="btnEnter admin" value="Добавить новый МК">
    </form>
</div>
</body>
</html>

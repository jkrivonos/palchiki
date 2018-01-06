<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 07.01.2018
 * Time: 0:43
 */
?>
<h4>Список предстоящих мастер-классов</h4>
<table>
    <tr>
        <th>ID</th>
        <th>Наименование мастер-класса</th>
        <th>Описание</th>
        <th>Начало занятия</th>
        <th>Стоимость, &#x20bd;</th>
        <th></th>
        <th></th>
    </tr>
    <?php foreach ($events as $event): ?>
    <tr>
        <td><?php echo $event['id']; ?></td>
        <td><?php echo $event['master_name']; ?></td>
        <td><?php echo $event['description']; ?></td>
        <td><?php echo $event['date']; ?></td>
        <td><?php echo $event['coast']; ?></td>
        <td><a href="/admin/update/<?php echo $event['id']; ?>" title="редактировать">редактировать</a></td>
        <td><a href="/admin/delete/<?php echo $event['id']; ?>" title="удалить">удалить</a></td>
    </tr>
    <?php endforeach; ?>
</table>
<form action="/admin/create/" method="post">
    <input type="submit" name="submit" value="Добавить"></input>
</form>

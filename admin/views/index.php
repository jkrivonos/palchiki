<?php include ROOT.'/views/header.php'; ?>

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
</div><script src="https://use.fontawesome.com/661a533fef.js"></script>
</div>
</body>
</html>

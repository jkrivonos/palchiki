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

<?php include ROOT.'/views/header.php'; ?>

    <div class="mainCircles adminDelete">
        <h3>Вы действительно хотите удалить МК: <span><?php echo $masterName.' '.$date?></span> ?</h3>
        <form method="POST">
            <button name="submit" class="btnEnter buttonDelete"><i class="fa fa-trash-o" aria-hidden="true"></i>Удалить</button>
            <button name="notsubmit" class="btnEnter buttonDelete"><i class="fa fa-hand-peace-o" aria-hidden="true"></i>Не удалять</button>
        </form>
    </div>
</div>
</body>
</html>


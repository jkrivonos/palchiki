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
<p>Вы действительно хотите удалить предстоящий МК: <?php echo $masterName.' '.$date?></p>
<form method="POST">
    <input type="submit" name="submit" value="Удалить!">
    <input type="submit" name="notsubmit" value="Не удалять!">
</form>

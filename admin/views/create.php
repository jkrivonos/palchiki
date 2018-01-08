<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 07.01.2018
 * Time: 23:32
 */
if (isset($errors) && is_array($errors)) {
    foreach ($errors as $error) {
        echo $error.'<br>';
    }
}
?>

<form action="" method="POST">
    <input type="text" name="master_name" placeholder="Название мастер-класса" value="<?php echo $masterName ?>" required>
    <input type="text" name="description" placeholder="Описание" value="<?php echo $description ?>" required>
    <input type="text" name="date" placeholder="Начало занятия" value="<?php echo $date ?>" required>
    <input type="text" name="coast" placeholder="Стоимость" value="<?php echo $coast ?>" required>
    <input type="submit" name="button" value="Добавить">
</form>

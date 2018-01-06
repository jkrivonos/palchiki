<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 03.01.2018
 * Time: 23:07
 */
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
    <title>Title</title>
</head>
<body>
<form action="" method="POST">
    <input name="login" placeholder="login" value="<?php echo $login ?>" required>
    <input type="password" name="password" placeholder="password" required>
    <input type="submit" name="button" value="Войти">
</form>
</body>
</html>
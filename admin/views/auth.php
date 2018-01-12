<?php include ROOT.'/views/header.php'; ?>

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
<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 28.12.2017
 * Time: 0:24
 */
//include_once ROOT . '/models/Admin.php';
class AdminController
{
    public function actionIndex() {
        $this->checkAuthentication();
        echo 'actionIndex';
        return true;
    }

    public function actionCreate() {
        $this->checkAuthentication();
        echo 'actionCreate';
        return true;
    }

    public function actionUpdate($id) {
        $this->checkAuthentication();
        return true;
    }

    public function actionDelete($id) {
        $this->checkAuthentication();
        return true;
    }

    public function actionAuthentication() {
        $login = '';
        $password = '';

        if(isset($_POST['button'])) {
            $errors = '';
            if(!empty($_POST['login'])) {
                $login = htmlspecialchars(trim($_POST['login']));
            } else {
                $errors[] = 'Введите логин!';
            }

            if(!empty($_POST['password'])) {
                $password = htmlspecialchars(trim($_POST['password']));;
            } else {
                $errors[] = 'Введите пароль!';
            }

           if (Admin::checkAdmin($login, $password)) {
               Admin::setSessionAuth();
               header("Location: /admin/");
           } else {
                $errors[] = 'Неправильный логин/пароль';
           }
        }

        require_once(ROOT.'/views/auth.php');
        return true;
    }

    public function checkAuthentication()
    {
        if (!Admin::isAdminAuthenticated()) {
            header("Location: /admin/auth");
        }
    }
}
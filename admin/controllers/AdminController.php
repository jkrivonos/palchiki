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
        $events = Event::getEvents();
        require_once(ROOT.'/views/index.php');

        return true;
    }

    public function actionCreate() {
        $this->checkAuthentication();
        $masterName = '';
        $description = '';
        $date = '';
        $coast = '';

        if(isset($_POST['button'])) {
            $errors = false;
            if(!empty($_POST['master_name'])) {
                $masterName = htmlspecialchars(trim($_POST['master_name']));
            } else {
                $errors[] = 'Введите название мастер-класса!';
            }

            if(!empty($_POST['description'])) {
                $description = htmlspecialchars(trim($_POST['description']));;
            } else {
                $errors[] = 'Введите описание мастер-класса!';
            }

            if(!empty($_POST['date'])) {
                $date = htmlspecialchars(trim($_POST['date']));;
            } else {
                $errors[] = 'Введите дату проведения мастер-класса!';
            }

            if(!empty($_POST['coast'])) {
                $coast = htmlspecialchars(trim($_POST['coast']));;
            } else {
                $errors[] = 'Укажите стоимость мастер-класса!';
            }

            if($errors == false) {
                $id = Event::createEvent($masterName, $description, $date, $coast);
                if ($id) {
                    header('Location: /admin/');
                } else {
                    $errors[] = 'Внутренняя ошибка, попробуйте еще раз!';
                }
            }
        }

        require_once(ROOT.'/views/create.php');
        return true;
    }

    public function actionUpdate($id) {
        $this->checkAuthentication();

        $masterName = '';
        $description = '';
        $date = '';
        $coast = '';

        if(isset($_POST['button'])) {
            $errors = false;
            if(!empty($_POST['master_name'])) {
                $masterName = htmlspecialchars(trim($_POST['master_name']));
            } else {
                $errors[] = 'Введите название мастер-класса!';
            }

            if(!empty($_POST['description'])) {
                $description = htmlspecialchars(trim($_POST['description']));;
            } else {
                $errors[] = 'Введите описание мастер-класса!';
            }

            if(!empty($_POST['date'])) {
                $date = htmlspecialchars(trim($_POST['date']));;
            } else {
                $errors[] = 'Введите дату проведения мастер-класса!';
            }

            if(!empty($_POST['coast'])) {
                $coast = htmlspecialchars(trim($_POST['coast']));;
            } else {
                $errors[] = 'Укажите стоимость мастер-класса!';
            }

            if($errors == false) {
                $isUpdated = Event::updateEvent($id, $masterName, $description, $date, $coast);
                if ($isUpdated) {
                    header('Location: /admin/');
                } else {
                    $errors[] = 'Внутренняя ошибка, попробуйте еще раз!';
                }
            }
        } else {
            $masterClass = Event::getMasterClassById($id);
            $masterName = $masterClass['master_name'];
            $description = $masterClass['description'];
            $date = $masterClass['date'];
            $coast = $masterClass['coast'];
        }


        require_once(ROOT.'/views/update.php');
        return true;
    }

    public function actionDelete($id) {
        $this->checkAuthentication();

        if (isset($_POST['notsubmit'])) {
            header('Location: /admin/');
        }

        $masterClass = Event::getMasterNameAndDateById($id);
        $masterName = $masterClass['master_name'];
        $date = $masterClass['date'];

        if (isset($_POST['submit'])) {
            $errors = false;
            $isUpdated = Event::setIsDeleted($id);
            if ($isUpdated) {
                header('Location: /admin/');
            } else {
                $errors[] = 'Внутренняя ошибка, попробуйте еще раз!';
            }
        }

        require_once(ROOT.'/views/delete.php');
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

    private function checkAuthentication()
    {
        if (!Admin::isAdminAuthenticated()) {
            header("Location: /admin/auth");
        }
    }
}
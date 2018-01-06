<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 04.01.2018
 * Time: 2:17
 */

class Admin
{
    public static function isAdminAuthenticated() {
        $isAuth = false;
        if (!empty($_SESSION['isAdminAuth']) && $_SESSION['isAdminAuth']) {
            $isAuth = true;
        }
        return $isAuth;
    }

    public static function setSessionAuth() {
        $_SESSION['isAdminAuth'] = true;
    }

    public static function checkAdmin($login, $password) {
        $isAdmin = false;
        $adminDao = new AdminDao();
        $admin = $adminDao->getAdmin($login);

        if(!empty($admin)) {
            $salt = $admin['salt'];
        }

        if(!empty($salt)) {
            $password = md5($password.$salt);
            if($password == $admin['password']) {
                $isAdmin = true;
            }
        }
        return $isAdmin;
    }
}
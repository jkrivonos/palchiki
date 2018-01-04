<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 04.01.2018
 * Time: 9:56
 */

class AdminDao
{
    public $conn;
    public function __construct() {
        $this->conn = Db::getConnection();
    }

    public function getAdmin($login) {
       $query = 'SELECT name, password, salt FROM admins WHERE name = :login';

       $rs = $this->conn->prepare($query);
       $rs->bindParam(':login', $login, PDO::PARAM_STR);
       $rs->execute();

       $admin = $rs->fetch();
       return $admin;
    }
}
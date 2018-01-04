<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 02.01.2018
 * Time: 23:31
 */

class Db
{
    public static  function getConnection() {
        $paramPaths = ROOT.'/config/db_params.php';
        $params = include($paramPaths);

        $dsn = "mysql:host={$params['host']};dbname={$params['dbName']}";
        $conn = new PDO($dsn, $params['user'], $params['password']);

        return $conn;
    }
}
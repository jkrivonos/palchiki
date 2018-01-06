<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 27.12.2017
 * Time: 23:14
 */

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Autoload.php');
session_start();

$router = new Router();
$router->run();

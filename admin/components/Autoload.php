<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 04.01.2018
 * Time: 2:21
 */

    function __autoload($className) {
        $arrayPath = array(
            '/components/',
            '/models/',
            '/dao/',
            '/controllers/'
        );

        foreach ($arrayPath as $path) {
            $path = ROOT.$path.$className.'.php';
            if (is_file($path)) {
                include_once $path;
            }
        }
    }

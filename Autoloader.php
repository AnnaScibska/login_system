<?php

class Autoloader
{
    static function register() {
        spl_autoload_register(function($className) {
            $className = str_replace("\\", "/", $className);
            require_once $_SERVER['DOCUMENT_ROOT'] . '/php/OOP_database/Class/' . $className . '.php';
//            require_once $_SERVER['DOCUMENT_ROOT'] . '/Class/' . $className . '.php';
        });

    }
}
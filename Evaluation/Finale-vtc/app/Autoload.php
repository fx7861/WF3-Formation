<?php

namespace App;

class Autoload
{
    public static function autoloader() {
        spl_autoload_register(function ($class){
        	$class_name = str_replace(__NAMESPACE__, '', $class);
        	$path = __DIR__ . $class_name . '.php';
        	$path = str_replace('/', '\\', $path);
            require $path;
        });
    }

}
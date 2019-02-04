<?php

use App\Autoload;
use App\Controller\Controller;
use App\Database\Database;

/**
 * App
 */
class App
{
	
	private static $_instance;

	private function __construct() {}

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
	}

	public function boot() {
        require 'Autoload.php';
        Autoload::autoloader();
    }

}

?>
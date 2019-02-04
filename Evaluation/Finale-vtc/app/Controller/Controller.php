<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 01/02/2019
 * Time: 10:54
 */

namespace App\Controller;


use App\Database\Database;

abstract class Controller
{
    protected $db;
    private $template = 'default';
    private $path;

    /**
     * Controller constructor.
     * @param $db
     */
    public function __construct()
    {
        if (is_null($this->db)){
            $db = new Database('vtc', 'localhost', 'root', '');
            $this->db = $db->getPDO();
        }
        $this->path = ROOT . '\app\View\\';

    }

    protected function render($view, $attribute = []) {
        ob_start();
        extract($attribute);
        require $this->path . $view . '.php';
        $content = ob_get_clean();
        require $this->path . 'templates\\' . $this->template . '.php';
    }

}
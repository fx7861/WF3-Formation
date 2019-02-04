<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 01/02/2019
 * Time: 10:55
 */

namespace App\Database;


class Database
{
    private $dbname, $dbhost, $dbuser, $dbpass, $pdo;

    /**
     * Database constructor.
     * @param $dbname
     * @param $dbhost
     * @param $dbuser
     * @param $dbpass
     */
    public function __construct($dbname, $dbhost, $dbuser, $dbpass)
    {
        $this->dbname = $dbname;
        $this->dbhost = $dbhost;
        $this->dbuser = $dbuser;
        $this->dbpass = $dbpass;
    }

    public function getPDO() {
        if (is_null($this->pdo)) {
            try {
                $pdo = new \PDO('mysql:dbname=' . $this->dbname . ';host=' . $this->dbhost, $this->dbuser, $this->dbpass);
                $this->pdo = $pdo;
            } catch (\Exception $e) {
                echo 'Exception reçue : ',  $e->getMessage(), "\n";
            }
        }
        return $this->pdo;
    }


}
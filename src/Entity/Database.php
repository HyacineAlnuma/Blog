<?php

namespace App\Entity;

class Database
{
    public ?\PDO $database = null;

    public function getConnection(): \PDO
    {
        if ($this->database === null) {
            $this->database = new \PDO("mysql:host=localhost;dbname=php_p5;charset=utf8;port=3307", "root", "root");
        }
        return $this->database;
    }
}

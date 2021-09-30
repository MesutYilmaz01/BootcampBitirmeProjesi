<?php

namespace Project\Database;

use \Project\Repositories\DatabaseRepository as DatabaseRepository;

class Database{
    private $db;
    public function __construct()
    {
        try{
            $this->db = new \PDO("mysql:host=host.docker.internal:3306;dbname=testdb", "root", "mypassword");
        }catch(\PDOException $e){
            print $e->getMessage();
        }
    }
    public function getDb(){
        $this->db;
    }
}